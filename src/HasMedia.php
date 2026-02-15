<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `media` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/media
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasMedia
{
    /**
     * Sets the `media` attribute.
     *
     * Specifies the media query for the linked resource.
     *
     * Usage example:
     * ```php
     * $element->media('screen');
     * $element->media('screen and (min-width: 768px)');
     * $element->media(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Media query, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `media` attribute.
     */
    public function media(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(Attribute::MEDIA, $value);
    }
}
