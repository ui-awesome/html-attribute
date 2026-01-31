<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `content` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `content` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `content` attribute.
 *
 * Key features.
 * - Designed for use in meta elements.
 * - Handles the HTML `content` attribute.
 * - Immutable method for setting or overriding the `content` attribute.
 * - Supports string, Stringable, UnitEnum, and `null` for flexible content assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/content
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasContent
{
    /**
     * Sets the HTML `content` attribute for the element.
     *
     * Creates a new instance with the specified content value.
     *
     * Contains the value for the `http-equiv` or `name` attribute, depending on which is used. This attribute provides
     * the actual metadata value associated with the metadata name or pragma directive.
     *
     * @param string|Stringable|UnitEnum|null $value Content value to set for the element. Use a string representing
     * the metadata value. Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `content` attribute.
     *
     * Usage example:
     * ```php
     * $element->content('width=device-width, initial-scale=1');
     * $element->content('The HTML reference describes all elements...');
     * $element->content(null);
     * ```
     */
    public function content(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::CONTENT, $value);
    }
}
