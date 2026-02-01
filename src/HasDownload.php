<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `download` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `download` attribute on `<a>` elements.
 *
 * Intended for use in tags and components that require manipulation of the download attribute.
 *
 * Key features.
 * - Designed for use in anchor elements.
 * - Handles the HTML `download` attribute.
 * - Immutable method for setting or overriding the `download` attribute.
 * - Supports bool, string, UnitEnum, and `null` for flexible download assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#download
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasDownload
{
    /**
     * Sets the HTML `download` attribute for the element.
     *
     * Creates a new instance with the specified download value.
     *
     * Causes the browser to treat the linked URL as a download. Can be used with or without a filename value:
     * - When `true`, the browser will suggest a filename/extension generated from various sources.
     * - When a string is provided, it suggests that value as the filename.
     *
     * @param bool|string|UnitEnum|null $value Download value to set for the element. Use `true` to enable download
     * without a specific filename, a string to suggest a filename, or `null` to unset the attribute.
     *
     * @return static New instance with the updated `download` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#download
     *
     * Usage example:
     * ```php
     * $element->download(true);
     * $element->download('my-file.pdf');
     * $element->download(null);
     * ```
     */
    public function download(bool|string|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::DOWNLOAD, $value);
    }
}
