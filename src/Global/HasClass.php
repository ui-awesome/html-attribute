<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\CSSClass;
use UnitEnum;

/**
 * Trait for managing the global HTML `class` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `class` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of CSS classes.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `class` global attribute.
 * - Immutable method for setting or overriding the `class` attribute.
 * - Integration with CSS class management utilities for safe and predictable value updates.
 *
 * @property array $attributes HTML attributes array used by the implementing class.
 * @phpstan-property mixed[] $attributes
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/class
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasClass
{
    /**
     * Sets the HTML `class` attribute for the element.
     *
     * Creates a new instance with the specified CSS class value, optionally overriding any existing class, supporting
     * explicit assignment according to the HTML specification for global attributes.
     *
     * Supports both additive and override semantics for the `class` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value CSS class to set for the element. Can be `null` to unset the
     * attribute.
     * @param bool $override Whether to override the existing class (`true`) or merge (`false`).
     *
     * @return static New instance with the updated `class` attribute.
     *
     * @link https://html.spec.whatwg.org/#classes
     *
     * Usage example:
     * ```php
     * $element->class('my-class');
     * $element->class(Theme::PRIMARY);
     * $element->class(
     *     new class implements Stringable {
     *         public function __toString(): string
     *         {
     *            return 'stringable-class';
     *         }
     *     },
     * );
     * $element->class('another-class', true);
     * $element->class(null);
     * ```
     */
    public function class(string|Stringable|UnitEnum|null $value, bool $override = false): static
    {
        $new = clone $this;

        if ($value === null) {
            unset($new->attributes[GlobalAttribute::CLASS_CSS->value]);
        } else {
            CSSClass::add($new->attributes, $value, $override);
        }

        return $new;
    }
}
