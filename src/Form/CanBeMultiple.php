<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Form;

use UIAwesome\Html\Attribute\Values\Attribute;

/**
 * Provides an immutable API for the `multiple` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/multiple
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait CanBeMultiple
{
    /**
     * Sets the `multiple` attribute.
     *
     * Usage example:
     * ```php
     * $element->multiple(true);
     * $element->multiple(null);
     * ```
     *
     * @param bool|null $value Multiple state. Use `true` to allow multiple values, `false` to disallow, or `null` to
     * remove the attribute.
     *
     * @return static New instance with the updated `multiple` attribute.
     */
    public function multiple(bool|null $value): static
    {
        return $this->setAttribute(Attribute::MULTIPLE, $value);
    }
}
