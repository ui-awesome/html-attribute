<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, Rel};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `rel` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `rel` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `rel` attribute and value validation.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `rel` attribute.
 * - Immutable method for setting or overriding the `rel` attribute.
 * - Supports string, UnitEnum, and `null` for flexible relationship assignment.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRel
{
    /**
     * Sets the HTML `rel` attribute for the element.
     *
     * Creates a new instance with the specified relationship value, supporting explicit assignment according to the
     * HTML specification for link relationship types.
     *
     * @param string|UnitEnum|null $value Relationship value to set for the element. Use a valid relationship token
     * (for example, `noopener`, `noreferrer`, `canonical`, `stylesheet`). Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `rel` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#linkTypes
     *
     * Usage example:
     * ```php
     * $element->rel('noopener');
     * $element->rel(Rel::NOOPENER);
     * $element->rel(null);
     * ```
     */
    public function rel(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Rel::cases(), Attribute::REL);

        return $this->addAttribute(Attribute::REL, $value);
    }
}
