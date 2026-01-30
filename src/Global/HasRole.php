<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{GlobalAttribute, Role};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the global HTML `role` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `role` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of element roles and value validation.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `role` global attribute.
 * - Immutable method for setting or overriding the `role` attribute.
 * - Supports string, UnitEnum, and `null` for flexible role assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Reference/Roles
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasRole
{
    /**
     * Sets the HTML `role` attribute for the element.
     *
     * Creates a new instance with the specified role value.
     *
     * Defines the semantic role of the element for accessibility purposes, helping assistive technologies understand
     * the element's purpose.
     *
     * Common roles include `button` for clickable elements, `navigation` for nav menus, `alert` for important messages,
     * `dialog` for modal windows, and `search` for search regions.
     *
     * This is essential for building accessible custom components that don't use native HTML semantic elements.
     *
     * @param string|UnitEnum|null $value ARIA role to set for the element. Use standard ARIA roles (for example,
     * 'button', 'navigation', 'alert', 'dialog').
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `role` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/infrastructure.html#attr-aria-role
     * {@see Role} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->role('button');
     * $element->role('navigation');
     * $element->role(Role::ALERT);
     * ```
     */
    public function role(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Role::cases(), GlobalAttribute::ROLE);

        return $this->addAttribute(GlobalAttribute::ROLE, $value);
    }
}
