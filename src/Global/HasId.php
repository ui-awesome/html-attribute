<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the `id` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/id
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasId
{
    /**
     * Sets the `id` attribute.
     *
     * Usage example:
     * ```php
     * $element->id('main-navigation');
     * $element->id('user-profile-form');
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Element identifier, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `id` attribute.
     */
    public function id(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ID, $value);
    }
}
