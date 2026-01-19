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
 * @method static addAttribute(string|\UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/translate
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasTranslate
{
    /**
     * Sets the HTML `translate` attribute for the element.
     *
     * Creates a new instance with the specified translate, supporting both explicit and nullable assignment according
     * to the HTML specification for global attributes.
     *
     * While the method accepts any UnitEnum for flexibility, runtime validation ensures only values matching
     * {@see Translate::cases()} (`no`, `yes`) are accepted.
     *
     * This allows users to provide custom enums while rejecting values that are not present in the allowed token set.
     *
     * @param bool|string|UnitEnum|null $value Translate to set for the element. Can be `null` to unset the attribute.
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
     * $element->translate(false);
     * $element->translate(Translate::YES);
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
