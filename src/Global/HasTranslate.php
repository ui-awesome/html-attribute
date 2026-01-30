<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Translate};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

use function is_bool;

/**
 * Trait for managing the global HTML `translate` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `translate` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of element translate behavior and value validation.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `translate` global attribute.
 * - Immutable method for setting or overriding the `translate` attribute.
 * - Supports bool, string, UnitEnum, and `null` for flexible translate assignment.
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
     * Sets the HTML `translate` attribute for the element.
     *
     * Creates a new instance with the specified translate value.
     *
     * Controls whether the element's content should be translated when the page is localized.
     * - Use `yes` (or `true`) to indicate the content should be translated.
     * - Use `no` (or `false`) to indicate the content should not be translated, which is useful for brand names,
     *   technical terms, code samples, or proper names that should remain in their original language across all
     *   localized versions of the page.
     *
     * @param bool|string|UnitEnum|null $value Translation behavior to set for the element. Use `yes` or `true` to
     * allow translation, `no` or `false` to prevent translation.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `translate` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/interaction.html#attr-translate
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
