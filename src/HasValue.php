<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `value` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `value` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `value` attribute.
 *
 * Key features.
 * - Designed for use in elements that require a `value` attribute (for example, `<li>`, `<input>`, `<option>`,
 *   `<progress>`, `<meter>`).
 * - Handles the HTML `value` attribute for setting element values.
 * - Immutable method for setting or overriding the `value` attribute.
 * - Supports float, int, string, Stringable, UnitEnum, and `null` for flexible value assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/value
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasValue
{
    /**
     * Sets the HTML `value` attribute for the element.
     *
     * Creates a new instance with the specified value.
     *
     * The `value` attribute contains the current value of the element. Its meaning depends on the context:
     * - For `<li>`: the ordinal value in an ordered list.
     * - For `<input>`: the current value of the form control.
     * - For `<option>`: the value to be submitted with the form.
     * - For `<progress>` and `<meter>`: the current value of the range.
     *
     * @param float|int|string|Stringable|UnitEnum|null $value The value to set for the element. Can be `null` to unset the
     * attribute.
     *
     * @return static New instance with the updated `value` attribute.
     *
     * Usage example:
     * ```php
     * $element->value(3);
     * $element->value(3.14);
     * $element->value('text');
     * $element->value(SomeEnum::VALUE);
     * $element->value(null);
     * ```
     */
    public function value(float|int|string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::VALUE, $value);
    }
}
