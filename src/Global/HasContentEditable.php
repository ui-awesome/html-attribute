<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{ContentEditable, GlobalAttribute};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

use function is_bool;

/**
 * Provides an immutable API for the `contenteditable` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/contenteditable
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasContentEditable
{
    /**
     * Sets the `contenteditable` attribute.
     *
     * @param bool|string|UnitEnum|null $value Content editability value. Use `true`, `false`, or `plaintext-only`, or
     * `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `contenteditable` attribute.
     *
     * {@see ContentEditable} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->contentEditable(true);
     * $element->contentEditable('plaintext-only');
     * $element->contentEditable(ContentEditable::TRUE);
     * ```
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
