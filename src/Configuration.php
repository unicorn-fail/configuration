<?php

declare(strict_types=1);

/*
 * This file is part of the league/configuration package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\Configuration;

use Dflydev\DotAccessData\Data;
use Dflydev\DotAccessData\Exception\InvalidPathException;
use Dflydev\DotAccessData\Exception\MissingPathException;
use League\Configuration\Exception\InvalidConfigurationException;
use Nette\Schema\Elements\Structure;
use Nette\Schema\Expect;
use Nette\Schema\Processor;
use Nette\Schema\Schema;
use Nette\Schema\ValidationException;

final class Configuration implements ConfigurationBuilderInterface, ConfigurationInterface
{
    /** @var array<string, mixed> */
    private $cache = [];

    /**
     * @var Data
     *
     * @psalm-readonly
     */
    private $data;

    /** @var Data|null */
    private $finalConfig;

    /** @var array<string, Schema> */
    private $schemas = [];

    /**
     * @var ConfigurationInterface
     *
     * @psalm-readonly
     */
    private $reader;

    /**
     * @param array<string, Schema> $schemas
     */
    public function __construct(array $schemas = [])
    {
        $this->schemas = $schemas;
        $this->data    = new Data();

        $this->reader = new ReadOnlyConfiguration($this);
    }

    public function addSchema(string $key, Schema $schema): void
    {
        $this->invalidate();

        if ($schema instanceof Structure) {
            $schema->castTo('array');
        }

        $this->schemas[$key] = $schema;
    }

    /**
     * Applies the schema against the configuration to return the final configuration
     */
    private function build(): Data
    {
        try {
            $schema    = Expect::structure($this->schemas)->castTo('array');
            $processor = new Processor();
            /** @var array<string, mixed> $data */
            $data   = $processor->process($schema, $this->data->export());
            $config = new Data($data);

            return $this->finalConfig = $config;
        } catch (ValidationException $ex) {
            throw InvalidConfigurationException::fromValidation($ex);
        }
    }

    public function data(): Data
    {
        // Create a new Data object from the existing one to ensure an immutable copy is returned.
        return new Data($this->data->export());
    }

    public function exists(string $key): bool
    {
        if ($this->finalConfig === null) {
            $this->finalConfig = $this->build();
        } elseif (\array_key_exists($key, $this->cache)) {
            return true;
        }

        return $this->finalConfig->has($key);
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $key)
    {
        if ($this->finalConfig === null) {
            $this->finalConfig = $this->build();
        } elseif (\array_key_exists($key, $this->cache)) {
            return $this->cache[$key];
        }

        try {
            return $this->cache[$key] = $this->finalConfig->get($key);
        } catch (InvalidPathException | MissingPathException $ex) {
            throw InvalidConfigurationException::missingOption($key);
        }
    }

    private function invalidate(): void
    {
        $this->cache       = [];
        $this->finalConfig = null;
    }

    /**
     * @param array<string, mixed> $config
     */
    public function merge(array $config = []): void
    {
        $this->invalidate();

        $this->data->import($config, Data::REPLACE);
    }

    public function reader(): ConfigurationInterface
    {
        return $this->reader;
    }

    /**
     * @param mixed $value
     */
    public function set(string $key, $value): void
    {
        $this->invalidate();

        $this->data->set($key, $value);
    }
}
