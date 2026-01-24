<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Stringable;
use UIAwesome\Html\Attribute\Values\GlobalAttribute;
use UnitEnum;

/**
 * Trait for managing the global HTML `title` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `title` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of tooltip text.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `title` global attribute.
 * - Immutable method for setting or overriding the `title` attribute.
 * - Supports string, Stringable, UnitEnum, and `null` for flexible title assignment.
 *
 * @method static addAttribute((string|UnitEnum) $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/title
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasTitle
{
    /**
     * Sets the HTML `title` attribute for the element.
     *
     * Creates a new instance with the specified title, supporting both explicit and nullable assignment according to
     * the HTML specification for global attributes.
     *
     * @param string|Stringable|UnitEnum|null $value Title value to set for the element. Can be `null` to unset the
     * attribute.
     *
     * @return static New instance with the updated `title` attribute.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#attr-title
     *
     * Usage example:
     * ```php
     * $element->title('Tooltip text');
     * $element->title(TitleEnum::TOOLTIP);
     * $element->title(
     *     new class implements Stringable {
     *         public function __toString(): string {
     *             return 'Tooltip text from Stringable';
     *         }
     *     }
     * );
     * $element->title(null);
     * ```
     */
    public function title(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(GlobalAttribute::TITLE, $value);
    }
}
