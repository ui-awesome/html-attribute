<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `pattern` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `pattern` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `pattern` attribute.
 *
 * Key features.
 * - Designed for use in text input and textarea elements.
 * - Handles the HTML `pattern` attribute for validation with regular expressions.
 * - Immutable method for setting or overriding the `pattern` attribute.
 * - Supports `string`, `Stringable`, `UnitEnum`, and `null` for flexible pattern assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/pattern
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPattern
{
    /**
     * Sets the HTML `pattern` attribute for the element.
     *
     * Creates a new instance with the specified pattern value.
     *
     * The `pattern` attribute specifies a regular expression that the input's value must match for the value to pass
     * constraint validation.
     *
     * It is valid for `<input type="text">`, `<input type="search">`, `<input type="url">`, `<input type="tel">`,
     * `<input type="email">`, and `<input type="password">` input types, as well as `<textarea>`.
     *
     * The pattern must be a valid JavaScript regular expression, as used by the `RegExp` type. No forward slashes
     * should be specified around the pattern text. When compiling:
     * 1. The pattern is implicitly wrapped with `^(?:` and `)$`, matching the entire input value.
     * 2. The `'v'` flag is specified for Unicode code point treatment.
     *
     * If the `pattern` attribute is present but invalid, no regular expression is applied. If the pattern is valid and
     * a non-empty value does not match, constraint validation will prevent form submission.
     *
     * @param string|Stringable|UnitEnum|null $value Pattern (regular expression) to set for the element. Can be `null`
     * to unset the attribute.
     *
     * @return static New instance with the updated `pattern` attribute.
     *
     * Usage example:
     * ```php
     * $element->pattern('[0-9]{3}-[0-9]{2}-[0-9]{4}');
     * $element->pattern('[a-z]+');
     * $element->pattern(null);
     * ```
     */
    public function pattern(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::PATTERN, $value);
    }
}
