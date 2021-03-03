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

use Nette\Schema\Schema;

interface ConfigurationBuilderInterface
{
    /**
     * Registers a new configuration schema at the given top-level key
     */
    public function addSchema(string $key, Schema $schema): void;
}
