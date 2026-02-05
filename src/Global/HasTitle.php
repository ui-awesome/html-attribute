<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the `title` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/title
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasTitle
{
    /**
     * Sets the `title` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Advisory title text, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `title` attribute.
     *
     * Usage example:
     * ```php
     * $element->title('Click to save changes');
     * $element->title('Enter your full name');
     * ```
     */
    public function title(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::TITLE, $value);
    }
}
