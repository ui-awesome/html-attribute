<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Element;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{ElementAttribute, Referrerpolicy};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `referrerpolicy` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#referrerpolicy
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/area#href
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#referrerpolicy
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#referrerpolicy
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#referrerpolicy
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/script#referrerpolicy
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasReferrerpolicy
{
    /**
     * Sets the `referrerpolicy` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Referrer policy token, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `referrerpolicy` attribute.
     *
     * {@see Referrerpolicy} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->referrerpolicy('origin');
     * $element->referrerpolicy(Referrerpolicy::NO_REFERRER);
     * $element->referrerpolicy(null);
     * ```
     */
    public function referrerpolicy(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Referrerpolicy::cases(), ElementAttribute::REFERRERPOLICY);

        return $this->addAttribute(ElementAttribute::REFERRERPOLICY, $value);
    }
}
