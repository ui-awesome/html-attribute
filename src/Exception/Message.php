<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Exception;

use function sprintf;

/**
 * Represents standardized error messages.
 *
 * This enum defines formatted error messages for various error conditions that may occur during operations such as
 * value validation.
 *
 * It provides a consistent and standardized way to present error messages across the system.
 *
 * Each case represents a specific type of error, with a message template that can be populated with dynamic values
 * using the {@see Message::getMessage()} method.
 *
 * This centralized approach improves the consistency of error messages and keeps formatting logic in one place.
 *
 * Key features.
 * - Can be used by call sites that need formatted messages.
 * - Centralizes message templates as enum cases.
 * - Formats templates with `sprintf()` via {@see Message::getMessage()}.
 * - Supports message formatting with dynamic parameters.
 * - Uses the enum case `value` as the template string.
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
     * Error when a attribute value is not a `scalar` or `Closure`.
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
     * @param int|string $argument Dynamic arguments to insert into the message template.
     *
     * @return string Formatted error message with interpolated arguments.
     *
     * Usage example:
     * ```php
     * throw new InvalidArgumentException(
     *     Message::ATTRIBUTE_VALUE_MUST_BE_SCALAR_OR_CLOSURE->getMessage(gettype($value)),
     * );
     * ```
     */
    public function getMessage(int|string ...$argument): string
    {
        return sprintf($this->value, ...$argument);
    }
}
