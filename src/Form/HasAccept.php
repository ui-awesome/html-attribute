<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `accept` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/accept
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasAccept
{
    /**
     * Sets the `accept` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Accept value, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `accept` attribute.
     *
     * Usage example:
     * ```php
     * $element->accept('image/*');
     * $element->accept('.jpg,.png,.pdf');
     * $element->accept('image/jpeg,application/pdf');
     * $element->accept(null);
     * ```
     */
    public function accept(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::ACCEPT, $value);
    }
}
