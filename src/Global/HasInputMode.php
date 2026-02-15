<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, InputMode};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `inputmode` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/inputmode
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasInputMode
{
    /**
     * Sets the `inputmode` attribute.
     *
     * Usage example:
     * ```php
     * $element->inputMode(InputMode::NUMERIC);
     * $element->inputMode('numeric');
     * ```
     *
     * @param string|UnitEnum|null $value Input mode value (`decimal`, `email`, `none`, `numeric`, `search`, `tel`,
     * `text`, `url`, or `null` to remove the attribute).
     *
     * @throws InvalidArgumentException If the provided value is not valid.
     *
     * @return static New instance with the updated `inputmode` attribute.
     */
    public function inputMode(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, InputMode::cases(), GlobalAttribute::INPUTMODE);

        return $this->setAttribute(GlobalAttribute::INPUTMODE, $value);
    }
}
