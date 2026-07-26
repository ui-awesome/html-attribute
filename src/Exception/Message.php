<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Exception;

use function sprintf;

/**
 * Represents error message templates for attribute exceptions.
 *
 * Use {@see Message::getMessage()} to format the template with {@see sprintf()} arguments.
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
