<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\CSSClass;
use UnitEnum;

/**
 * Provides an immutable API for the `class` attribute.
 *
 * @property array $attributes HTML attributes array used by the implementing class.
 * @phpstan-property mixed[] $attributes
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/class
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasClass
{
    /**
     * Sets the `class` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value CSS class value, or `null` to remove the attribute.
     * @param bool $override Whether to override existing classes (`true`) or merge (`false`).
     *
     * @return static New instance with the updated `class` attribute.
     *
     * Usage example:
     * ```php
     * $element->class('my-class');
     * $element->class(Theme::PRIMARY);
     * $element->class(
     *     new class implements Stringable {
     *         public function __toString(): string
     *         {
     *            return 'stringable-class';
     *         }
     *     },
     * );
     * $element->class('another-class', true);
     * $element->class(null);
     * ```
     */
    public function class(string|Stringable|UnitEnum|null $value, bool $override = false): static
    {
        $new = clone $this;

        if ($value === null) {
            unset($new->attributes[GlobalAttribute::CLASS_CSS->value]);
        } else {
            CSSClass::add($new->attributes, $value, $override);
        }

        return $new;
    }
}
