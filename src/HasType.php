<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `type` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `type` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `type` attribute.
 *
 * Key features.
 * - Designed for use in style, script, and input elements.
 * - Handles the HTML `type` attribute.
 * - Immutable method for setting or overriding the `type` attribute.
 * - Supports string, Stringable, UnitEnum, and `null` for flexible type assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/type
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasType
{
    /**
     * Sets the HTML `type` attribute for the element.
     *
     * Creates a new instance with the specified type value, supporting explicit assignment according to the HTML
     * specification for type attributes.
     *
     * @param string|Stringable|UnitEnum|null $value Type value to set for the element. Can be `null` to unset the
     * attribute.
     *
     * @return static New instance with the updated `type` attribute.
     *
     * Usage example:
     * ```php
     * $element->type('text/css');
     * $element->type(null);
     * ```
     */
    public function type(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::TYPE, $value);
    }
}
