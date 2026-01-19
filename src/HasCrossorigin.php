<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, Crossorigin};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `crossorigin` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `crossorigin` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the CORS attribute and value validation.
 *
 * Key features.
 * - Designed for use in media elements (img, video, audio), script, link, and SVG elements.
 * - Handles the HTML `crossorigin` attribute.
 * - Immutable method for setting or overriding the `crossorigin` attribute.
 * - Supports string, UnitEnum, and `null` for flexible CORS assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/crossorigin
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasCrossorigin
{
    /**
     * Sets the HTML `crossorigin` attribute for the element.
     *
     * Creates a new instance with the specified CORS setting value, supporting explicit assignment according to the
     * HTML specification for crossorigin attributes.
     *
     * @param string|UnitEnum|null $value CORS setting value to set for the element. Use a valid CORS token (for
     * example, `anonymous`, `use-credentials`). Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `crossorigin` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/urls-and-fetching.html#cors-settings-attributes
     *
     * Usage example:
     * ```php
     * $element->crossorigin('anonymous');
     * $element->crossorigin(Crossorigin::ANONYMOUS);
     * $element->crossorigin(null);
     * ```
     */
    public function crossorigin(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Crossorigin::cases(), Attribute::CROSSORIGIN);

        return $this->addAttribute(Attribute::CROSSORIGIN, $value);
    }
}
