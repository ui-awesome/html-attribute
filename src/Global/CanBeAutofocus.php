<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UnitEnum;

/**
 * Trait for managing the global HTML `autofocus` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `autofocus` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of element focus behavior.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `autofocus` global attribute.
 * - Immutable method for setting or overriding the `autofocus` attribute.
 * - Supports bool for explicit focus control.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/autofocus
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait CanBeAutofocus
{
    /**
     * Sets the HTML `autofocus` attribute for the element.
     *
     * Creates a new instance with the specified focus value.
     *
     * When `true`, the element will automatically receive focus when the page loads, allowing users to start
     * interacting with it immediately without clicking.
     *
     * This is particularly useful for search boxes, login forms, or modal dialogs where immediate user input is
     * expected.
     *
     * Only one element per page should have autofocus for optimal user experience.
     *
     * @param bool $value Whether the element should automatically receive focus when the page loads.
     *
     * @return static New instance with the updated `autofocus` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/semantics.html#attr-autofocus
     *
     * Usage example:
     * ```php
     * $element->autofocus(true);
     * $element->autofocus(false);
     * ```
     */
    public function autofocus(bool $value): static
    {
        return $this->addAttribute(GlobalAttribute::AUTOFOCUS, $value);
    }
}
