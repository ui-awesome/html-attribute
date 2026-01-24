<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UnitEnum;

/**
 * Trait for managing the global HTML `hidden` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `hidden` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of element visibility.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `hidden` global attribute.
 * - Immutable method for setting or overriding the `hidden` attribute.
 * - Supports bool for explicit visibility control.
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/hidden
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait CanBeHidden
{
    /**
     * Sets the HTML `hidden` attribute for the element.
     *
     * Creates a new instance with the specified visibility, supporting explicit assignment according to the HTML
     * specification for global attributes.
     *
     * @param bool $value Visibility to set for the element.
     *
     * @return static New instance with the updated `hidden` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/semantics.html#the-hidden-attribute
     *
     * Usage example:
     * ```php
     * $element->hidden(false);
     * $element->hidden(true);
     * ```
     */
    public function hidden(bool $value): static
    {
        return $this->addAttribute(GlobalAttribute::HIDDEN, $value);
    }
}
