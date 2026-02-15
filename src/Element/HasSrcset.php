<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use Stringable;
use UnitEnum;

/**
 * Provides an immutable API for the `srcset` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#srcset
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/picture#the_srcset_attribute
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/source#srcset
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSrcset
{
    /**
     * Sets the `srcset` attribute.
     *
     * Usage example:
     * ```php
     * $element->srcset('small.jpg 480w, medium.jpg 800w, large.jpg 1200w');
     * $element->srcset('image-1x.jpg 1x, image-2x.jpg 2x');
     * $element->srcset(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Comma-separated image URLs with size descriptors, or `null` to
     * remove the attribute.
     *
     * @return static New instance with the updated `srcset` attribute.
     */
    public function srcset(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute('srcset', $value);
    }
}
