<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `sizes` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#sizes
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSizes
{
    /**
     * Sets the `sizes` attribute.
     *
     * Defines the icon size descriptors for the linked resource.
     *
     * @param string|Stringable|UnitEnum|null $value Icon size list or `any` token, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `sizes` attribute.
     *
     * Usage example:
     * ```php
     * $element->sizes('any');
     * $element->sizes('16x16 32x32');
     * $element->sizes(null);
     * ```
     */
    public function sizes(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::SIZES, $value);
    }
}
