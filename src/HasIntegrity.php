<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `integrity` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Sets the `integrity` attribute.
     *
     * Provides the Subresource Integrity hash for the resource.
     *
     * @param string|Stringable|UnitEnum|null $value Integrity metadata, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `integrity` attribute.
     *
     * Usage example:
     * ```php
     * $element->integrity('sha384-oqVuAfXRKap7fdgcCY5uykM6+R9GqQ8K/uxy9rx7HNQlGYl1kPzQho1wx4JwY8wC');
     * $element->integrity(null);
     * ```
     */
    public function integrity(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(Attribute::INTEGRITY, $value);
    }
}
