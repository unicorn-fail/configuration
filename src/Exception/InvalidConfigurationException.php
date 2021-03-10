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

namespace League\Configuration\Exception;

use Nette\Schema\ValidationException;

final class InvalidConfigurationException extends \UnexpectedValueException
{
    /**
     * @param string  $option      Name/path of the option
     * @param mixed   $valueGiven  The invalid option that was provided
     * @param ?string $description Additional text describing the issue (optional)
     */
    public static function forConfigOption(string $option, $valueGiven, ?string $description = null): self
    {
        $message = \sprintf('Invalid config option for "%s": %s', $option, self::getDebugValue($valueGiven));
        if ($description !== null) {
            $message .= \sprintf(' (%s)', $description);
        }

        return new self($message);
    }

    /**
     * @param string $option     Description of the option
     * @param mixed  $valueGiven The invalid option that was provided
     */
    public static function forParameter(string $option, $valueGiven): self
    {
        return new self(\sprintf('Invalid %s: %s', $option, self::getDebugValue($valueGiven)));
    }

    public static function fromValidation(ValidationException $ex): self
    {
        return new self($ex->getMessage(), 0, $ex);
    }

    public static function missingOption(string $option): self
    {
        return new self(\sprintf('Configuration option "%s" does not exist', $option));
    }

    /**
     * @param mixed $value
     */
    private static function getDebugValue($value): string
    {
        if (\is_object($value)) {
            return \get_class($value);
        }

        return \print_r($value, true);
    }
}
