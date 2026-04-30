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
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
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
     * Usage example:
     * ```php
     * $element->dir('ltr');
     * $element->dir('rtl');
     * $element->dir(Direction::AUTO);
     * ```
     *
     * @param string|UnitEnum|null $value Directionality value. Use 'ltr', 'rtl', or 'auto', or `null` to remove the
     * attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `dir` attribute.
     *
     * {@see Direction} for predefined enum values.
     */
    public function dir(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Direction::cases(), GlobalAttribute::DIR);

        return $this->addAttribute(GlobalAttribute::DIR, $value);
    }
}
