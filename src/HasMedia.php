<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `media` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `media` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `media` attribute.
 *
 * Key features.
 * - Designed for use in link, style, and source elements.
 * - Handles the HTML `media` attribute.
 * - Immutable method for setting or overriding the `media` attribute.
 * - Supports string, Stringable, UnitEnum, and `null` for flexible media query assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/media
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMedia
{
    /**
     * Sets the HTML `media` attribute for the element.
     *
     * Creates a new instance with the specified media query value, supporting explicit assignment according to the
     * HTML specification for media attributes.
     *
     * @param string|Stringable|UnitEnum|null $value Media query value to set for the element. Can be `null` to unset
     * the attribute.
     *
     * @return static New instance with the updated `media` attribute.
     *
     * Usage example:
     * ```php
     * $element->media('screen');
     * $element->media(null);
     * ```
     */
    public function media(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::MEDIA, $value);
    }
}
