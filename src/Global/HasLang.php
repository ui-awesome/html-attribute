<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Language};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the global HTML `lang` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `lang` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of language identifiers and value validation.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `lang` global attribute.
 * - Immutable method for setting or overriding the `lang` attribute.
 * - Supports string, UnitEnum, and `null` for flexible language assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/lang
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasLang
{
    /**
     * Sets the HTML `lang` attribute for the element.
     *
     * Creates a new instance with the specified language, supporting both explicit and nullable assignment according to
     * the HTML specification for global attributes.
     *
     * While the method accepts any UnitEnum for flexibility, runtime validation ensures only values matching
     * {@see Language::cases()} are accepted.
     *
     * This allows users to provide custom enums while rejecting values that are not present in the allowed token set.
     *
     * @param string|UnitEnum|null $value Language to set for the element. Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `lang` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#attr-lang
     * {@see Language} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->lang('en-US');
     * $element->lang(Language::ENGLISH_US);
     * $element->lang(null);
     * ```
     */
    public function lang(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Language::cases(), GlobalAttribute::LANG);

        return $this->addAttribute(GlobalAttribute::LANG, $value);
    }
}
