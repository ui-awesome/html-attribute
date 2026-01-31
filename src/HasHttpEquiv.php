<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, HttpEquiv};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `http-equiv` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `http-equiv` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `http-equiv` attribute and value validation.
 *
 * Key features.
 * - Designed for use in meta elements.
 * - Handles the HTML `http-equiv` attribute.
 * - Immutable method for setting or overriding the `http-equiv` attribute.
 * - Supports string, UnitEnum, and `null` for flexible pragma directive assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/http-equiv
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasHttpEquiv
{
    /**
     * Sets the HTML `http-equiv` attribute for the element.
     *
     * Creates a new instance with the specified pragma directive value.
     *
     * Defines a pragma directive, which are instructions for the browser for processing the document. The attribute's
     * name is short for `http-equivalent` because the allowed values are names of equivalent HTTP headers.
     *
     * @param string|UnitEnum|null $value Pragma directive value to set for the element. Use valid tokens like
     * `content-type`, `default-style`, `refresh`, `x-ua-compatible`, `content-security-policy`. Can be `null` to unset
     * the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `http-equiv` attribute.
     *
     * Usage example:
     * ```php
     * $element->httpEquiv('refresh');
     * $element->httpEquiv(HttpEquiv::REFRESH);
     * $element->httpEquiv(null);
     * ```
     */
    public function httpEquiv(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, HttpEquiv::cases(), Attribute::HTTP_EQUIV);

        return $this->addAttribute(Attribute::HTTP_EQUIV, $value);
    }
}
