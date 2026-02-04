<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, Loading};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `loading` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `loading` attribute on HTML elements.
 *
 * Intended for use in tags elements that require manipulation of the `loading` attribute.
 *
 * Key features.
 * - Designed for use in tags elements (`<img>` and `<iframe>`).
 * - Handles the HTML `loading` attribute.
 * - Immutable method for setting or overriding the `loading` attribute.
 * - Supports `string`, `Stringable`, `UnitEnum`, and `null` for flexible loading strategy assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#loading
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#loading
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasLoading
{
    /**
     * Sets the HTML `loading` attribute for the element.
     *
     * Creates a new instance with the specified loading strategy value.
     *
     * Indicates how the browser should load the image.
     * - Use `eager` to load the image immediately, regardless of whether or not the image is currently within the
     *   visible viewport (this is the default value).
     * - Use `lazy` to defer loading of the image until it reaches a calculated distance from the viewport, as defined
     *   by the browser.
     *
     * @param string|Stringable|UnitEnum|null $value Loading strategy value to set for the element. Use `eager` for
     * immediate loading, or `lazy` for deferred loading. Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `loading` attribute.
     *
     * {@see Loading} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->loading('lazy');
     * $element->loading(Loading::LAZY);
     * $element->loading(null);
     * ```
     */
    public function loading(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Loading::cases(), ElementAttribute::LOADING);

        return $this->addAttribute(ElementAttribute::LOADING, $value);
    }
}
