<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `src` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `src` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the source URL attribute.
 *
 * Key features.
 * - Designed for use in script, img, video, audio, iframe, input, source, track, and embed elements.
 * - Handles the HTML `src` attribute.
 * - Immutable method for setting or overriding the `src` attribute.
 * - Supports string, Stringable, UnitEnum, and `null` for flexible source assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Sets the HTML `src` attribute for the element.
     *
     * Creates a new instance with the specified source URL value, supporting explicit assignment according to the
     * HTML specification for src attributes.
     *
     * @param string|Stringable|UnitEnum|null $value Source URL value to set for the element. Can be `null` to unset the
     * attribute.
     *
     * @return static New instance with the updated `src` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/src
     *
     * Usage example:
     * ```php
     * $element->src('https://example.com/script.js');
     * $element->src(null);
     * ```
     */
    public function src(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::SRC, $value);
    }
}
