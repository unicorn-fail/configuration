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

final class ReadOnlyConfiguration implements ConfigurationInterface
{
    /** @var Configuration */
    private $config;

    public function __construct(Configuration $config)
    {
        $this->config = $config;
    }

    public function data(): Data
    {
        return $this->config->data();
    }

    public function exists(string $key): bool
    {
        return $this->config->exists($key);
    }

    /**
     * {@inheritDoc}
     */
    public function get(string $key)
    {
        return $this->config->get($key);
    }
}
