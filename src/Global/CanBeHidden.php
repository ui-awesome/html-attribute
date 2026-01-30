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
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/hidden
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait CanBeHidden
{
    /**
     * Sets the HTML `hidden` attribute for the element.
     *
     * Creates a new instance with the specified visibility value.
     *
     * When `true`, the element is hidden from the page and not rendered visually, though it remains in the DOM.
     *
     * This is useful for temporarily hiding content that may be shown later via JavaScript, or for marking content
     * as not currently relevant to the user.
     *
     * Unlike CSS `display: none`, the `hidden` attribute is semantic and indicates the element is not yet or no longer
     * relevant.
     *
     * Note: For content that should be visually hidden but remain accessible to screen readers and other assistive
     * technologies, use CSS techniques like `.visually-hidden` classes instead of the `hidden` attribute.
     *
     * @param bool $value Whether the element should be hidden from rendering.
     *
     * @return static New instance with the updated `hidden` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/semantics.html#the-hidden-attribute
     *
     * Usage example:
     * ```php
     * $element->hidden(true);
     * $element->hidden(false);
     * ```
     */
    public function hidden(bool $value): static
    {
        return $this->addAttribute(GlobalAttribute::HIDDEN, $value);
    }
}
