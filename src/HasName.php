<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, MetaName};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `name` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `name` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `name` attribute and value validation.
 *
 * Key features.
 * - Designed for use in meta elements.
 * - Handles the HTML `name` attribute.
 * - Immutable method for setting or overriding the `name` attribute.
 * - Supports string, UnitEnum, and `null` for flexible name assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasName
{
    /**
     * Sets the HTML `name` attribute for the element.
     *
     * Creates a new instance with the specified metadata name value.
     *
     * The `name` and `content` attributes can be used together to provide document metadata in terms of name-value
     * pairs, with the `name` attribute giving the metadata name, and the `content` attribute giving the value.
     *
     * Standard names include `application-name`, `author`, `description`, `generator`, `keywords`, `referrer`,
     * `theme-color`, `color-scheme`, `viewport`, `creator`, `publisher`, `robots`.
     *
     * @param string|UnitEnum|null $value Metadata name value to set for the element. Use standard metadata names like
     * `viewport`, `description`, `keywords`, `author`. Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `name` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/semantics.html#standard-metadata-names
     *
     * Usage example:
     * ```php
     * $element->name('viewport');
     * $element->name(MetaName::VIEWPORT);
     * $element->name(null);
     * ```
     */
    public function name(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, MetaName::cases(), Attribute::NAME);

        return $this->addAttribute(Attribute::NAME, $value);
    }
}
