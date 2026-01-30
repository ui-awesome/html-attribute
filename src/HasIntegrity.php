<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `integrity` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `integrity` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the Subresource Integrity attribute.
 *
 * Key features.
 * - Designed for use in script and link elements.
 * - Handles the HTML `integrity` attribute for Subresource Integrity (SRI).
 * - Immutable method for setting or overriding the `integrity` attribute.
 * - Supports string, Stringable, UnitEnum, and `null` for flexible integrity assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/integrity
 * @link https://developer.mozilla.org/en-US/docs/Web/Security/Subresource_Integrity
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasIntegrity
{
    /**
     * Sets the HTML `integrity` attribute for the element.
     *
     * Creates a new instance with the specified integrity metadata value, supporting explicit assignment according to
     * the Subresource Integrity specification. The value should contain the cryptographic hash(es) of the resource.
     *
     * @param string|Stringable|UnitEnum|null $value Integrity metadata value to set for the element. Typically contains
     * a hash algorithm and base64-encoded hash (for example, `sha384-abc123...`). Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `integrity` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/Security/Subresource_Integrity
     *
     * Usage example:
     * ```php
     * $element->integrity('sha384-oqVuAfXRKap7fdgcCY5uykM6+R9GqQ8K/uxy9rx7HNQlGYl1kPzQho1wx4JwY8wC');
     * $element->integrity(null);
     * ```
     */
    public function integrity(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::INTEGRITY, $value);
    }
}
