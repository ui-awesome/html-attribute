<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `accesskey` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/accesskey
 */
trait HasAccesskey
{
    /**
     * Sets the `accesskey` attribute.
     *
     * Usage example:
     * ```php
     * $element->accesskey('s');
     * $element->accesskey('1');
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Access key character, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `accesskey` attribute.
     */
    public function accesskey(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ACCESSKEY, $value);
    }
}
