<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Language};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Provides an immutable API for the `lang` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/lang
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasLang
{
    /**
     * Sets the `lang` attribute.
     *
     * Usage example:
     * ```php
     * $element->lang('en');
     * $element->lang('es');
     * $element->lang(Language::ENGLISH_US);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Language tag, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException If the value is not valid.
     *
     * @return static New instance with the updated `lang` attribute.
     *
     * {@see Language} for predefined enum values.
     */
    public function lang(string|Stringable|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Language::cases(), GlobalAttribute::LANG);

        return $this->addAttribute(GlobalAttribute::LANG, $value);
    }
}
