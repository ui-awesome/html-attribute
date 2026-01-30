<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UnitEnum;

/**
 * Trait for managing the global HTML `accesskey` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `accesskey` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of element access keys.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `accesskey` global attribute.
 * - Immutable method for setting or overriding the `accesskey` attribute.
 * - Supports string and `null` for flexible access key assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/accesskey
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasAccesskey
{
    /**
     * Sets the HTML `accesskey` attribute for the element.
     *
     * Creates a new instance with the specified access key value.
     *
     * Defines a keyboard shortcut that activates or focuses the element.
     * - The value is a single character (for example, 's' for Alt+S or Ctrl+S depending on the browser).
     * - While useful for power users, consider that access keys can conflict with screen reader shortcuts and browser
     *   defaults, so they should be used sparingly and documented clearly.
     *
     * @param string|null $value Access key character to set for the element. Use a single alphanumeric character.
     *
     * @return static New instance with the updated `accesskey` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/interaction.html#the-accesskey-attribute
     *
     * Usage example:
     * ```php
     * $element->accesskey('s');
     * $element->accesskey('1');
     * ```
     */
    public function accesskey(string|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::ACCESSKEY, $value);
    }
}
