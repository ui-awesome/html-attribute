<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `download` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#download
 */
trait HasDownload
{
    /**
     * Sets the `download` attribute.
     *
     * Controls whether the linked resource is treated as a download.
     *
     * Usage example:
     * ```php
     * $element->download(true);
     * $element->download('my-file.pdf');
     * $element->download(null);
     * ```
     *
     * @param bool|string|Stringable|UnitEnum|null $value Download flag or suggested filename; use `true` to enable
     * downloads without a filename, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `download` attribute.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#download
     */
    public function download(bool|string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(ElementAttribute::DOWNLOAD, $value);
    }
}
