<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `nonce` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/nonce
 */
trait HasNonce
{
    /**
     * Sets the `nonce` attribute.
     *
     * Usage example:
     * ```php
     * $element->nonce('abc123xyz');
     * $element->nonce($cspNonce);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Cryptographic nonce value, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `nonce` attribute.
     */
    public function nonce(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::NONCE, $value);
    }
}
