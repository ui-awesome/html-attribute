<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the `style` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/style
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasStyle
{
    /**
     * Sets the `style` attribute.
     *
     * @param array|string|Stringable|UnitEnum|null $value Style value as a CSS `string`, an associative array of CSS
     * property-value pairs, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `style` attribute.
     *
     * @phpstan-param mixed[]|string|Stringable|UnitEnum|null $value
     *
     * Usage example:
     * ```php
     * $element->style('color: red;');
     * $element->style(
     *     [
     *         'color' => 'red',
     *         'font-size' => '16px',
     *     ]
     * );
     * $element->style(StyleEnum::RED_TEXT);
     *
     * $element->style(
     *     new class implements Stringable {
     *         public function __toString(): string {
     *             return 'color: blue;';
     *         }
     *     }
     * );
     * $element->style(null);
     * ```
     */
    public function style(array|string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(GlobalAttribute::STYLE, $value);
    }
}
