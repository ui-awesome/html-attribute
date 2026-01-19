<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, Referrerpolicy};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `referrerpolicy` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `referrerpolicy` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the referrer policy and value validation.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `referrerpolicy` attribute.
 * - Immutable method for setting or overriding the `referrerpolicy` attribute.
 * - Supports string, UnitEnum, and `null` for flexible policy assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#referrerpolicy
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/area#href
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#referrerpolicy
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#referrerpolicy
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#referrerpolicy
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/script#referrerpolicy
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasReferrerpolicy
{
    /**
     * Sets the HTML `referrerpolicy` attribute for the element.
     *
     * Creates a new instance with the specified referrer policy value, supporting explicit assignment according to the
     * HTML and HTTP specification for referrer policy attributes.
     *
     * @param string|UnitEnum|null $value Referrer policy value to set for the element. Use a valid policy token (for
     * example, `no-referrer`, `origin`, `strict-origin-when-cross-origin`). Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `referrerpolicy` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-referrerpolicy
     *
     * Usage example:
     * ```php
     * $element->referrerpolicy('origin');
     * $element->referrerpolicy(Referrerpolicy::NO_REFERRER);
     * $element->referrerpolicy(null);
     * ```
     */
    public function referrerpolicy(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Referrerpolicy::cases(), ElementAttribute::REFERRERPOLICY);

        return $this->addAttribute(ElementAttribute::REFERRERPOLICY, $value);
    }
}
