<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `accept` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `accept` attribute on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of the `accept` attribute.
 *
 * Key features.
 * - Designed for use in file input elements.
 * - Handles the HTML `accept` attribute for defining acceptable file types.
 * - Immutable method for setting or overriding the `accept` attribute.
 * - Supports `string`, `Stringable`, `UnitEnum`, and `null` for flexible file type assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/accept
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasAccept
{
    /**
     * Sets the HTML `accept` attribute for the element.
     *
     * Creates a new instance with the specified accept value.
     *
     * The `accept` attribute defines the file types the server accepts. It is valid for `file` input types only.
     *
     * The value is a comma-separated list of unique content type specifiers, which can include.
     * - A file extension starting with a period (for example, `.jpg`, `.pdf`)
     * - A valid MIME type with no extensions (for example, `image/jpeg`, `application/pdf`)
     * - `audio/*`, `video/*`, or `image/*` representing all audio, video, or image types
     *
     * @param string|Stringable|UnitEnum|null $value Accept value to set for the element. Can be `null` to unset the
     * attribute.
     *
     * @return static New instance with the updated `accept` attribute.
     *
     * Usage example:
     * ```php
     * $element->accept('image/*');
     * $element->accept('.jpg,.png,.pdf');
     * $element->accept('image/jpeg,application/pdf');
     * $element->accept(null);
     * ```
     */
    public function accept(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::ACCEPT, $value);
    }
}
