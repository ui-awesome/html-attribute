<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{ContentEditable, GlobalAttribute};
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

use function is_bool;

/**
 * Provides an immutable API for the `contenteditable` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/contenteditable
 */
trait HasContentEditable
{
    /**
     * Sets the `contenteditable` attribute.
     *
     * Usage example:
     * ```php
     * $element->contentEditable(true);
     * $element->contentEditable('plaintext-only');
     * $element->contentEditable(ContentEditable::TRUE);
     * ```
     *
     * @param bool|string|UnitEnum|null $value Content editability value. Use `true`, `false`, or 'plaintext-only', or
     * `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `contenteditable` attribute.
     *
     * {@see ContentEditable} for predefined enum values.
     */
    public function contentEditable(bool|string|UnitEnum|null $value): static
    {
        if (is_bool($value)) {
            $value = $value ? 'true' : 'false';
        }

        Validator::oneOf($value, ContentEditable::cases(), GlobalAttribute::CONTENTEDITABLE);

        return $this->addAttribute(GlobalAttribute::CONTENTEDITABLE, $value);
    }
}
