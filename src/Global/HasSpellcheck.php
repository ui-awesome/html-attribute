<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

use function is_bool;

/**
 * Provides an immutable API for the `spellcheck` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/spellcheck
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSpellcheck
{
    /**
     * Sets the `spellcheck` attribute.
     *
     * @param bool|string|null $value Spellcheck state. Use `true` or `false`, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `spellcheck` attribute.
     *
     * Usage example:
     * ```php
     * $element->spellcheck(true);
     * $element->spellcheck(false);
     * ```
     */
    public function spellcheck(bool|string|null $value): static
    {
        if (is_bool($value)) {
            $value = $value ? 'true' : 'false';
        }

        Validator::oneOf($value, ['false', 'true'], GlobalAttribute::SPELLCHECK);

        return $this->addAttribute(GlobalAttribute::SPELLCHECK, $value);
    }
}
