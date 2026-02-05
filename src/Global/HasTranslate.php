<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Translate};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

use function is_bool;

/**
 * Provides an immutable API for the `translate` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/translate
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasTranslate
{
    /**
     * Sets the `translate` attribute.
     *
     * @param bool|string|UnitEnum|null $value Translation behavior. Use `yes`, `no`, `true`, `false`, or `null` to
     * remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `translate` attribute.
     *
     * {@see Translate} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->translate(true);
     * $element->translate(false);
     * $element->translate(Translate::NO);
     * ```
     */
    public function translate(bool|string|UnitEnum|null $value): static
    {
        if (is_bool($value)) {
            $value = $value ? 'yes' : 'no';
        }

        if ($value === 'true') {
            $value = 'yes';
        } elseif ($value === 'false') {
            $value = 'no';
        }

        Validator::oneOf($value, Translate::cases(), GlobalAttribute::TRANSLATE);

        return $this->addAttribute(GlobalAttribute::TRANSLATE, $value);
    }
}
