<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Media;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\Crossorigin;
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `crossorigin` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `crossorigin` attribute on HTML elements, following the
 * HTML specification for CORS (Cross-Origin Resource Sharing) settings.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the CORS attribute,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in media elements (img, video, audio), script, link, and SVG elements.
 * - Enforces standards-compliant handling of the HTML `crossorigin` attribute.
 * - Immutable method for setting or overriding the `crossorigin` attribute.
 * - Supports string, UnitEnum, and `null` for flexible CORS assignment.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/crossorigin
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
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
     * // sets the `crossorigin` attribute to `anonymous`
     * $element->crossorigin('anonymous');
     *
     * // sets the `crossorigin` attribute using enum
     * $element->crossorigin(Crossorigin::ANONYMOUS);
     *
     * // unsets the `crossorigin` attribute
     * $element->crossorigin(null);
     * ```
     */
    public function crossorigin(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Crossorigin::cases(), 'crossorigin');

        return $this->addAttribute('crossorigin', $value);
    }
}
