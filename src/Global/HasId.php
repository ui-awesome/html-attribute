<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UnitEnum;

/**
 * Trait for managing the global HTML `id` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `id` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of element identifiers.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `id` global attribute.
 * - Immutable method for setting or overriding the `id` attribute.
 * - Supports string and `null` for flexible identifier assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/id
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasId
{
    /**
     * Sets the HTML `id` attribute for the element.
     *
     * Creates a new instance with the specified identifier value.
     *
     * Defines a unique identifier for the element within the document, which can be used for CSS styling, JavaScript
     * manipulation, or as the target of anchor links.
     *
     * The ID must be unique across the entire page - duplicate IDs will cause accessibility issues and unpredictable
     * behavior. IDs are case-sensitive and should be descriptive (for example, 'main-navigation' rather than 'id1').
     *
     * @param string|null $value Unique identifier to set for the element. Must be unique across the document.
     *
     * @return static New instance with the updated `id` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#the-id-attribute
     *
     * Usage example:
     * ```php
     * $element->id('main-navigation');
     * $element->id('user-profile-form');
     * ```
     */
    public function id(string|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ID, $value);
    }
}
