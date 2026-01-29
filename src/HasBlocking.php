<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use InvalidArgumentException;
use UIAwesome\Html\Attribute\Values\{Attribute, Blocking};
use UIAwesome\Html\Helper\Validator;
use UnitEnum;

/**
 * Trait for managing the HTML `blocking` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `blocking` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `blocking` attribute and value validation.
 *
 * Key features.
 * - Designed for use in link, script, and style elements.
 * - Handles the HTML `blocking` attribute.
 * - Immutable method for setting or overriding the `blocking` attribute.
 * - Supports string, UnitEnum, and `null` for flexible token assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/style#blocking
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasBlocking
{
    /**
     * Sets the HTML `blocking` attribute for the element.
     *
     * Creates a new instance with the specified token value, supporting explicit assignment according to the
     * specification-defined token set.
     *
     * @param string|UnitEnum|null $value Token value to set for the element. Use a valid token (for example, `render`).
     * Can be `null` to unset the attribute.
     *
     * @throws InvalidArgumentException if the provided value is not valid.
     *
     * @return static New instance with the updated `blocking` attribute.
     *
     * Usage example:
     * ```php
     * $element->blocking('render');
     * $element->blocking(Blocking::RENDER);
     * $element->blocking(null);
     * ```
     */
    public function blocking(string|UnitEnum|null $value): static
    {
        Validator::oneOf($value, Blocking::cases(), Attribute::BLOCKING);

        return $this->addAttribute(Attribute::BLOCKING, $value);
    }
}
