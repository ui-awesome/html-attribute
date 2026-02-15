<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Direction, GlobalAttribute};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `dir` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/dir
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDir
{
    /**
     * Sets the `dir` attribute.
     *
     * @param string|UnitEnum|null $value Directionality value. Use `ltr`, `rtl`, or `auto`, or `null` to remove the
     * attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `dir` attribute.
     *
     * {@see Direction} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->dir('ltr');
     * $element->dir('rtl');
     * $element->dir(Direction::AUTO);
     * ```
     */
    public function dir(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Direction::cases(), GlobalAttribute::DIR);

        return $this->setAttribute(GlobalAttribute::DIR, $value);
    }
}
