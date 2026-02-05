<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, Loading};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `loading` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#loading
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#loading
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasLoading
{
    /**
     * Sets the `loading` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Loading strategy (`eager` or `lazy`), or `null` to remove the
     * attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `loading` attribute.
     *
     * {@see Loading} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->loading('lazy');
     * $element->loading(Loading::LAZY);
     * $element->loading(null);
     * ```
     */
    public function loading(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Loading::cases(), ElementAttribute::LOADING);

        return $this->addAttribute(ElementAttribute::LOADING, $value);
    }
}
