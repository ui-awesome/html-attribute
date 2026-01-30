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
     * Creates a new instance with the specified directionality value.
     *
     * Controls the text direction for the element's content.
     * - Use `ltr` for left-to-right languages (for example, English, Spanish).
     * - Use `rtl` for right-to-left languages (for example, Arabic, Hebrew).
     * - Use `auto` to let the browser determine the direction based on the first character.
     *
     * This is essential for proper rendering of multilingual content and mixed-language interfaces.
     *
     * @param string|UnitEnum|null $value Directionality to set for the element. Use `ltr`, `rtl`, or `auto`.
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
     * $element->dir('rtl');
     * $element->dir(Direction::AUTO);
     * ```
     */
    public function dir(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Direction::cases(), GlobalAttribute::DIR);

        return $this->addAttribute(GlobalAttribute::DIR, $value);
    }
}
