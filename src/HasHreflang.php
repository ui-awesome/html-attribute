<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `hreflang` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `hreflang` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `hreflang` attribute.
 *
 * Key features.
 * - Designed for use in link and anchor elements.
 * - Handles the HTML `hreflang` attribute.
 * - Immutable method for setting or overriding the `hreflang` attribute.
 * - Supports string, Stringable, UnitEnum, and `null` for flexible assignment.
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
     * Sets the HTML `hreflang` attribute for the element.
     *
     * Creates a new instance with the specified language code value.
     *
     * Indicates the language of the linked resource. It is purely advisory. Values should be valid BCP 47 language
     * tags. Use this attribute only if the `href` attribute is present.
     *
     * @param string|Stringable|UnitEnum|null $value Language code value to set for the element. Use valid BCP 47
     * language tags (for example, `en`, `es`, `fr`). Can be `null` to unset the attribute.
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
