<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the `nonce` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Global_attributes/nonce
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasNonce
{
    /**
     * Sets the `nonce` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Cryptographic nonce value, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `nonce` attribute.
     *
     * Usage example:
     * ```php
     * $element->nonce('abc123xyz');
     * $element->nonce($cspNonce);
     * ```
     */
    public function nonce(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::NONCE, $value);
    }
}
