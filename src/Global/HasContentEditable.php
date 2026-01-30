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
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasContentEditable
{
    /**
     * Sets the HTML `contenteditable` attribute for the element.
     *
     * Creates a new instance with the specified content editability value.
     *
     * Controls whether the element's content is editable by the user.
     * - Use `true` to allow full rich text editing with HTML formatting. Use `plaintext-only` to allow editing but
     *   strip HTML formatting (text only).
     * - Use `false` to disable editing. This enables building rich text editors, inline editing interfaces, or
     *   user-generated content areas directly in HTML.
     *
     * @param bool|string|UnitEnum|null $value Content editability to set for the element. Use `true` for rich text
     * editing, `plaintext-only` for text-only editing, or `false` to disable.
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
     * $element->contentEditable(true);
     * $element->contentEditable('plaintext-only');
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
