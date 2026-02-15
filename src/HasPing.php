<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Provides an immutable API for the `ping` attribute.
 *
 * @method static setAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#ping
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasPing
{
    /**
     * Sets the `ping` attribute.
     *
     * Defines the space-separated URL list for ping tracking.
     *
     * @param string|Stringable|UnitEnum|null $value Ping URL list, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `ping` attribute.
     *
     * Usage example:
     * ```php
     * $element->ping('https://example.com/track');
     * $element->ping('https://a.example/track https://b.example/track');
     * $element->ping(null);
     * ```
     */
    public function ping(string|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute(Attribute::PING, $value);
    }
}
