<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use UIAwesome\Html\Attribute\Values\GlobalAttribute;

/**
 * Provides an immutable API for the `id` attribute.
 *
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
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
     * @param string|null $value Element identifier, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `id` attribute.
     *
     * Usage example:
     * ```php
     * $element->id('main-navigation');
     * $element->id('user-profile-form');
     * ```
     */
    public function id(string|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ID, $value);
    }
}
