<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Trait for managing the HTML `disabled` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `disabled` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `disabled` attribute.
 *
 * Key features.
 * - Designed for use in link elements with `rel="stylesheet"`.
 * - Handles the HTML `disabled` attribute.
 * - Immutable method for setting or overriding the `disabled` attribute.
 * - Supports bool and `null` for flexible assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#disabled
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDisabled
{
    /**
     * Sets the HTML `disabled` attribute for the element.
     *
     * Creates a new instance with the specified disabled state.
     *
     * Indicates whether the described stylesheet should be loaded and applied to the document. If `disabled` is
     * specified when the HTML is loaded, the stylesheet will not be loaded during page load. Instead, the stylesheet
     * will be loaded on-demand, if and when the `disabled` attribute is changed to `false` or removed.
     *
     * @param bool|null $value Disabled state to set for the element. Use `true` to disable, `false` to enable,
     * or `null` to unset the attribute.
     *
     * @return static New instance with the updated `disabled` attribute.
     *
     * Usage example:
     * ```php
     * $element->disabled(true);
     * $element->disabled(false);
     * $element->disabled(null);
     * ```
     */
    public function disabled(bool|null $value): static
    {
        return $this->addAttribute(Attribute::DISABLED, $value);
    }
}
