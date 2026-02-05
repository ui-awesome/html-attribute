<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Exception;

use function sprintf;

/**
 * Represents error message templates for attribute exceptions.
 *
 * Use {@see Message::getMessage()} to format the template with `sprintf()` arguments.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Message: string
{
    /**
     * Error when an attribute value is invalid.
     *
     * Format: "Invalid value '%s' for attribute '%s'. Expected: '%s'."
     */
    case ATTRIBUTE_INVALID_VALUE = "Invalid value '%s' for attribute '%s'. Expected: '%s'.";

    /**
     * Error when an attribute value is not a `scalar` or `Closure`.
     *
     * Format: "Attribute value must be of type 'scalar' or 'Closure', '%s' given."
     */
    case ATTRIBUTE_VALUE_MUST_BE_SCALAR_OR_CLOSURE = "Attribute value must be of type 'scalar' or 'Closure', "
    . "'%s' given.";

    /**
     * Error when a key is not a non-empty string.
     *
     * Format: "Key must be a non-empty string."
     */
    case KEY_MUST_BE_NON_EMPTY_STRING = 'Key must be a non-empty string.';

    /**
     * Returns the formatted message string for the error case.
     *
     * @param int|string ...$argument Values to insert into the message template.
     *
     * @return string Formatted error message with interpolated arguments.
     *
     * Usage example:
     * ```php
     * throw new InvalidArgumentException(Message::ATTRIBUTE_INVALID_VALUE->getMessage('foo', 'bar', 'baz'));
     * ```
     */
    public function getMessage(int|string ...$argument): string
    {
        return sprintf($this->value, ...$argument);
    }
}
