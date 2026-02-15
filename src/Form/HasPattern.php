<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `pattern` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/pattern
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPattern
{
    /**
     * Sets the `pattern` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Pattern value, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `pattern` attribute.
     *
     * Usage example:
     * ```php
     * $element->pattern('[0-9]{3}-[0-9]{2}-[0-9]{4}');
     * $element->pattern('[a-z]+');
     * $element->pattern(null);
     * ```
     */
    public function pattern(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(Attribute::PATTERN, $value);
    }
}
