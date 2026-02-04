<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `dirname` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `dirname` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `dirname` attribute.
 *
 * Key features.
 * - Designed for use in input and textarea elements with text content.
 * - Handles the HTML `dirname` attribute for submitting text directionality.
 * - Immutable method for setting or overriding the `dirname` attribute.
 * - Supports `string`, `Stringable`, `UnitEnum`, and `null` for flexible dirname assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/dirname
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDirname
{
    /**
     * Sets the HTML `dirname` attribute for the element.
     *
     * Creates a new instance with the specified dirname value.
     *
     * The `dirname` attribute enables submission of the element's directionality. When included, the form control will
     * submit with two name/value pairs: the first being the `name` and `value`, and the second being the value of the
     * `dirname` attribute as the name, with a value of `ltr` (left-to-right) or `rtl` (right-to-left) as set by the
     * browser.
     *
     * It is valid for `<hidden>`, `<text>`, `<search>`, `<url>`, `<tel>`, and `<email>` input types.
     *
     * For example, if you have `<input type="text" name="comment" dirname="comment-dir">`, submitting the form will
     * include both `comment=...` and `comment-dir=ltr` (or `rtl`).
     *
     * @param string|Stringable|UnitEnum|null $value Dirname value to set for the element. This becomes the name of the
     * submitted directionality field. Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `dirname` attribute.
     *
     * Usage example:
     * ```php
     * $element->dirname('comment-dir');
     * $element->dirname('text-direction');
     * $element->dirname(null);
     * ```
     */
    public function dirname(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::DIRNAME, $value);
    }
}
