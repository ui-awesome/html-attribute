<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Stringable;
use UIAwesome\Html\Attribute\Values\ElementAttribute;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for the `ping` attribute.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#ping
 */
trait HasPing
{
    /**
     * Sets the `ping` attribute.
     *
     * Defines the space-separated URL list for ping tracking.
     *
     * Usage example:
     * ```php
     * $element->ping('https://example.com/track');
     * $element->ping('https://a.example/track https://b.example/track');
     * $element->ping(null);
     * ```
     *
     * @param string|Stringable|UnitEnum|null $value Ping URL list, or `null` to remove the attribute.
     *
     * @return static New instance with the updated `ping` attribute.
     */
    public function ping(string|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(ElementAttribute::PING, $value);
    }
}
