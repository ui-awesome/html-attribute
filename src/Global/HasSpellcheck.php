<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

use function is_bool;

/**
 * Trait for managing the global HTML `spellcheck` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `spellcheck` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of spellchecking behavior and value validation.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `spellcheck` global attribute.
 * - Immutable method for setting or overriding the `spellcheck` attribute.
 * - Supports bool, string, and `null` for flexible spellcheck assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/spellcheck
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasSpellcheck
{
    /**
     * Sets the HTML `spellcheck` attribute for the element.
     *
     * Creates a new instance with the specified spellcheck value.
     *
     * Controls whether the browser should check the element's content for spelling errors.
     * - Use `true` to enable spell-checking (typically underlines misspelled words).
     * - Use `false` to disable spell-checking, which is useful for code inputs, technical fields, or names where
     *   standard dictionary checking would be counterproductive.
     *
     * The browser uses the language specified by the `lang` attribute to determine which dictionary to use.
     *
     * @param bool|string|null $value Spellcheck state to set for the element. Use `true` to enable, `false` to disable.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `spellcheck` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/interaction.html#attr-spellcheck
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
