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
     * Creates a new instance with the specified nonce value, supporting explicit assignment according to the HTML
     * specification for global attributes.
     *
     * @param string|Stringable|UnitEnum|null $value Nonce value to set for the element. Can be `null` to unset the
     * attribute.
     *
     * @return static New instance with the updated `nonce` attribute.
     *
     * Usage example:
     * ```php
     * $element->nonce('nonce-value');
     * $element->nonce(null);
     * ```
     */
    public function nonce(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::NONCE, $value);
    }
}
