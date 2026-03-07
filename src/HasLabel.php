<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `label` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/option#label
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasLabel
{
    /**
     * Sets the `label` attribute.
     *
     * Usage example:
     * ```php
     * $element->label('Group label');
     * $element->label(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Label text, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `label` attribute.
     */
    public function label(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(Attribute::LABEL, $value);
    }
}
