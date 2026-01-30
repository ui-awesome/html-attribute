<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UnitEnum;

/**
 * Trait for managing the global HTML `nonce` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `nonce` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of cryptographic nonces.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `nonce` global attribute.
 * - Immutable method for setting or overriding the `nonce` attribute.
 * - Supports string, Stringable, UnitEnum, and `null` for flexible nonce assignment.
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
     * Sets the HTML `nonce` attribute for the element.
     *
     * Creates a new instance with the specified nonce value.
     *
     * Provides a cryptographic nonce (number used once) that allows inline scripts or styles to execute when Content
     * Security Policy (CSP) is enabled.
     * - The nonce must match the value specified in the CSP header (for example, `script-src 'nonce-abc123'`).
     * - This enables strict CSP policies while still allowing specific inline scripts that have the correct nonce,
     *   protecting against XSS attacks.
     *
     * @param string|Stringable|UnitEnum|null $value Cryptographic nonce value to set for the element. Must match the
     * nonce value in the CSP header.
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
