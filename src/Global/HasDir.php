<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Direction, GlobalAttribute};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the global HTML `dir` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `dir` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of text directionality and value validation.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `dir` global attribute.
 * - Immutable method for setting or overriding the `dir` attribute.
 * - Supports string, UnitEnum, and `null` for flexible direction assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/dir
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDir
{
    /**
     * Sets the HTML `dir` attribute for the element.
     *
     * Creates a new instance with the specified directionality, supporting both explicit and nullable assignment
     * according to the HTML specification for global attributes.
     *
     * While the method accepts any UnitEnum for flexibility, runtime validation ensures only values matching
     * {@see Direction::cases()} (`auto`, `ltr`, `rtl`) are accepted.
     *
     * This allows users to provide custom enums while rejecting values that are not present in the allowed token set.
     *
     * @param string|UnitEnum|null $value Directionality to set for the element. Can be `null` to unset the
     * attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `dir` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#the-dir-attribute
     * {@see Direction} for predefined enum values.
     *
     * Usage example:
     * ```php
     * $element->dir('ltr');
     * $element->dir(Direction::RTL);
     * ```
     */
    public function dir(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Direction::cases(), GlobalAttribute::DIR);

        return $this->addAttribute(GlobalAttribute::DIR, $value);
    }
}
