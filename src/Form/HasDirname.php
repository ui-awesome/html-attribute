<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `dirname` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/dirname
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDirname
{
    /**
     * Sets the `dirname` attribute.
     *
     * Usage example:
     * ```php
     * $element->dirname('comment-dir');
     * $element->dirname('text-direction');
     * $element->dirname(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Dirname value, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `dirname` attribute.
     */
    public function dirname(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(Attribute::DIRNAME, $value);
    }
}
