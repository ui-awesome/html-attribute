<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `accept` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
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
     * Usage example:
     * ```php
     * $element->accept('image/*');
     * $element->accept('.jpg,.png,.pdf');
     * $element->accept('image/jpeg,application/pdf');
     * $element->accept(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Accept value, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `accept` attribute.
     */
    public function accept(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(Attribute::ACCEPT, $value);
    }
}
