<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{AsValue, Attribute};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `as` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `as` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `as` attribute and value validation.
 *
 * Key features.
 * - Designed for use in link elements with `rel="preload"` or `rel="modulepreload"`.
 * - Handles the HTML `as` attribute.
 * - Immutable method for setting or overriding the `as` attribute.
 * - Supports string, UnitEnum, and `null` for flexible assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasAs
{
    /**
     * Sets the HTML `as` attribute for the element.
     *
     * Creates a new instance with the specified content type value.
     *
     * Specifies the type of content being loaded by the link element. This is necessary for request matching,
     * application of correct content security policy, and setting of correct `Accept` request header.
     *
     * Furthermore, `rel="preload"` uses this as a signal for request prioritization.
     *
     * @param string|UnitEnum|null $value Content type value to set for the element. Use valid tokens like `audio`,
     * `document`, `embed`, `fetch`, `font`, `image`, `object`, `script`, `style`, `track`, `video`, `worker`. Can be
     * `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `as` attribute.
     *
     * Usage example:
     * ```php
     * $element->as('font');
     * $element->as(AsValue::FONT);
     * $element->as(null);
     * ```
     */
    public function as(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, AsValue::cases(), Attribute::AS);

        return $this->addAttribute(Attribute::AS, $value);
    }
}
