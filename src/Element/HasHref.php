<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the HTML and SVG `href` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#href
 * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/href
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasHref
{
    /**
     * Sets the `href` attribute.
     *
     * Usage example:
     * ```php
     * $element->href('https://example.com/page');
     * $element->href('/about');
     * $element->href('#section');
     * $element->href(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value URL, path, or fragment, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `href` attribute.
     */
    public function href(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(ElementAttribute::HREF, $value);
    }
}
