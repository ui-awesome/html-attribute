<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `name` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/name
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasName
{
    /**
     * Sets the `name` attribute.
     *
     * Defines the metadata name or form control name.
     *
     * @param string|Stringable|UnitEnum|null $value Name value, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `name` attribute.
     *
     * {@see \UIAwesome\Html\Attribute\Values\MetaName} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->name('viewport');
     * $element->name(MetaName::VIEWPORT);
     * $element->name(null);
     * ```
     */
    public function name(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::NAME, $value);
    }
}
