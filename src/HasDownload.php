<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `download` attribute.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#download
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
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
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#download
     */
    public function download(bool|string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(Attribute::DOWNLOAD, $value);
    }
}
