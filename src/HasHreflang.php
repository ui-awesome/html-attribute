<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `hreflang` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
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
     * @param string|Stringable|UnitEnum|null $value BCP 47 language tag, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `hreflang` attribute.
     *
     * Usage example:
     * ```php
     * $element->hreflang('en');
     * $element->hreflang('es');
     * $element->hreflang(null);
     * ```
     */
    public function hreflang(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::HREFLANG, $value);
    }
}
