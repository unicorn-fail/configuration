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
use League\Configuration\Exception\InvalidConfigurationException;

interface ConfigurationInterface
{
    /**
     * A Data object of the raw configuration provided.
     *
     * Note: while you can set values on the Data object itself, it will not set data in the configuration object.
     */
    public function data(): Data;

    /**
     * @param string $key Configuration option path/key
     *
     * @return mixed
     *
     * @throws InvalidConfigurationException
     */
    public function get(string $key);

    public function exists(string $key): bool;
}
