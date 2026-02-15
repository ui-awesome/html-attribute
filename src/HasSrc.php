<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `src` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/src
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSrc
{
    /**
     * Sets the `src` attribute.
     *
     * Specifies the resource URL.
     *
     * @param string|Stringable|UnitEnum|null $value Resource URL, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `src` attribute.
     *
     * Usage example:
     * ```php
     * $element->src('https://example.com/script.js');
     * $element->src('./local/file.css');
     * $element->src(null);
     * ```
     */
    public function src(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(Attribute::SRC, $value);
    }
}
