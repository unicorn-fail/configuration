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

interface MutableConfigurationInterface extends ConfigurationInterface
{
    /**
     * @param array<string, mixed> $config
     */
    public function merge(array $config = []): void;

    /**
     * @param mixed $value
     */
    public function set(string $key, $value): void;
}
