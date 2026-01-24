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
     * Creates a new instance with the specified role, supporting both explicit and nullable assignment according to the
     * HTML specification for global attributes.
     *
     * While the method accepts any UnitEnum for flexibility, runtime validation ensures only values matching
     * {@see Role::cases()} are accepted.
     *
     * This allows users to provide custom enums while rejecting values that are not present in the allowed token set.
     *
     * @param string|UnitEnum|null $value Role to set for the element. Can be `null` to unset the
     * attribute.
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
     * $element->role(Role::ALERT);
     * $element->role(null);
     * ```
     */
    public function role(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Role::cases(), GlobalAttribute::ROLE);

        return $this->addAttribute(GlobalAttribute::ROLE, $value);
    }
}
