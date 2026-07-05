<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, InputMode};
use UIAwesome\Html\Helper\Validator;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `inputmode` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/inputmode
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
     * @param string|UnitEnum|null $value Input mode value ('decimal', 'email', 'none', 'numeric', 'search', 'tel',
     * 'text', 'url', or `null` to remove the attribute).
     *
     * @throws InvalidArgumentException If the provided value is not valid.
     *
     * @return static New instance with the updated `inputmode` attribute.
     */
    public function inputMode(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, InputMode::cases(), GlobalAttribute::INPUTMODE);

        return $this->addAttribute(GlobalAttribute::INPUTMODE, $value);
    }
}
