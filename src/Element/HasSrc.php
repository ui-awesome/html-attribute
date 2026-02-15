<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the `src` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#src
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSrc
{
    /**
     * Sets the `src` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Image source URL or path, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `src` attribute.
     *
     * Usage example:
     * ```php
     * $element->src('https://example.com/image.png');
     * $element->src('images/photo.jpg');
     * $element->src(null);
     * ```
     */
    public function src(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(ElementAttribute::SRC, $value);
    }
}
