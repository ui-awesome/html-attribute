<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Link;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\Referrerpolicy;
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `referrerpolicy` attribute in tag rendering.
 *
 * Provides a standards-compliant, immutable API for setting the `referrerpolicy` attribute on HTML elements, following
 * the HTML and HTTP specification for referrer policy control.
 *
 * Intended for use in tags and components that require dynamic or programmatic manipulation of the referrer policy,
 * ensuring correct attribute handling, type safety, and value validation.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Enforces standards-compliant handling of the HTML `referrerpolicy` attribute.
 * - Immutable method for setting or overriding the `referrerpolicy` attribute.
 * - Supports string, UnitEnum, and `null` for flexible policy assignment.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy
 * @property array $attributes HTML attributes array used by the implementing class.
 * @phpstan-property mixed[] $attributes
 * {@see \UIAwesome\Html\Core\Mixin\HasAttributes} for managing the underlying attributes array.
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
     * @link https://w3c.github.io/webappsec-referrer-policy/#referrer-policy-header
     *
     * Usage example:
     * ```php
     * // sets the `referrerpolicy` attribute to `origin`
     * $element->referrerpolicy('origin');
     *
     * // sets the `referrerpolicy` attribute using enum
     * $element->referrerpolicy(Referrerpolicy::NO_REFERRER);
     *
     * // unsets the `referrerpolicy` attribute
     * $element->referrerpolicy(null);
     * ```
     */
    public function referrerpolicy(string|UnitEnum|null $value): static
    {
        $new = clone $this;

        if ($value === null) {
            unset($new->attributes['referrerpolicy']);
        } else {
            Validator::oneOf($value, Referrerpolicy::cases(), 'referrerpolicy');

            $new->attributes['referrerpolicy'] = $value;
        }

        return $new;
    }
}
