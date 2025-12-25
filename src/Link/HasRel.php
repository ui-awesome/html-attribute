<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Link;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\Rel;
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `rel` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `rel` attribute on HTML elements, following the HTML
 * specification for link relationship types.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the `rel` attribute,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Enforces standards-compliant handling of the HTML `rel` attribute.
 * - Immutable method for setting or overriding the `rel` attribute.
 * - Supports string, UnitEnum, and `null` for flexible relationship assignment.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel
 * @property array $attributes HTML attributes array used by the implementing class.
 * @phpstan-property mixed[] $attributes
 * {@see \UIAwesome\Html\Core\Mixin\HasAttributes} for managing the underlying attributes array.
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
     * // sets the `rel` attribute to `noopener`
     * $element->rel('noopener');
     *
     * // sets the `rel` attribute using enum
     * $element->rel(Rel::NOOPENER);
     *
     * // unsets the `rel` attribute
     * $element->rel(null);
     * ```
     */
    public function rel(string|UnitEnum|null $value): static
    {
        $new = clone $this;

        if ($value === null) {
            unset($new->attributes['rel']);
        } else {
            Validator::oneOf($value, Rel::cases(), 'rel');

            $new->attributes['rel'] = $value;
        }

        return $new;
    }
}
