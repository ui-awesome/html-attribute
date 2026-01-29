<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{ContentEditable, GlobalAttribute};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

use function is_bool;

/**
 * Trait for managing the global HTML `contenteditable` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `contenteditable` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of content editability and value validation.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `contenteditable` global attribute.
 * - Immutable method for setting or overriding the `contenteditable` attribute.
 * - Supports bool, string, UnitEnum, and `null` for flexible editability assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/contenteditable
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasContentEditable
{
    /**
     * Sets the HTML `contenteditable` attribute for the element.
     *
     * Creates a new instance with the specified content editability value, supporting explicit assignment according to
     * the HTML specification for global attributes.
     *
     * While the method accepts any UnitEnum for flexibility, runtime validation ensures only values matching
     * {@see ContentEditable::cases()} (`false`, `plaintext-only`, `true`) are accepted.
     *
     * This allows users to provide custom enums while rejecting values that are not present in the allowed token set.
     *
     * @param bool|string|UnitEnum|null $value Content editability to set for the element. Can be `null` to unset
     * the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `contenteditable` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#attr-contenteditable
     * {@see ContentEditable} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->contentEditable('false');
     * $element->contentEditable(ContentEditable::TRUE);
     * ```
     */
    public function contentEditable(bool|string|UnitEnum|null $value): static
    {
        if (is_bool($value)) {
            $value = $value ? 'true' : 'false';
        }

        Validator::oneOf($value, ContentEditable::cases(), GlobalAttribute::CONTENTEDITABLE);

        return $this->addAttribute(GlobalAttribute::CONTENTEDITABLE, $value);
    }
}
