<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UnitEnum;

/**
 * Provides an immutable API for the `accesskey` attribute.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/accesskey
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasAccesskey
{
    /**
     * Sets the `accesskey` attribute.
     *
     * @param string|Stringable|UnitEnum|null $value Access key character, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `accesskey` attribute.
     *
     * Usage example:
     * ```php
     * $element->accesskey('s');
     * $element->accesskey('1');
     * ```
     */
    public function accesskey(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ACCESSKEY, $value);
    }
}
