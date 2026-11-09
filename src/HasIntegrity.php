<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `integrity` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/integrity
 * @see https://developer.mozilla.org/en-US/docs/Web/Security/Subresource_Integrity
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
     */
    public function integrity(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::INTEGRITY, $value);
    }
}
