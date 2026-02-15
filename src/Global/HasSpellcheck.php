<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Validator;

use function is_bool;

/**
 * Provides an immutable API for the `spellcheck` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
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
     * Usage example:
     * ```php
     * $element->spellcheck(true);
     * $element->spellcheck(false);
     * ```
     *
     * @param bool|string|null $value Spellcheck state. Use `true` or `false`, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `spellcheck` attribute.
     */
    public function spellcheck(bool|string|null $value): static
    {
        if (is_bool($value)) {
            $value = $value ? 'true' : 'false';
        }

        Validator::oneOf($value, ['false', 'true'], GlobalAttribute::SPELLCHECK);

        return $this->setAttribute(GlobalAttribute::SPELLCHECK, $value);
    }
}
