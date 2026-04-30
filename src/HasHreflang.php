<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the `hreflang` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#hreflang
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasHreflang
{
    /**
     * Sets the `hreflang` attribute.
     *
     * Declares the language of the linked resource.
     *
     * Usage example:
     * ```php
     * $element->hreflang('en');
     * $element->hreflang('es');
     * $element->hreflang(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value BCP 47 language tag, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `hreflang` attribute.
     */
    public function hreflang(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(ElementAttribute::HREFLANG, $value);
    }
}
