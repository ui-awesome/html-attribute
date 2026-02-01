<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use UIAwesome\Html\Attribute\Values\Attribute;
use UnitEnum;

/**
 * Trait for managing the HTML `ping` attribute in tag rendering.
 *
 * Provides an immutable API for setting the `ping` attribute on `<a>` elements.
 *
 * Intended for use in tags and components that require manipulation of the ping attribute.
 *
 * Key features.
 * - Designed for use in anchor elements.
 * - Handles the HTML `ping` attribute.
 * - Immutable method for setting or overriding the `ping` attribute.
 * - Supports string, UnitEnum, and `null` for flexible ping assignment.
 *
 * @method static addAttribute(string|UnitEnum $key, mixed $value) Adds an attribute and returns a new instance.
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
     * Sets the HTML `ping` attribute for the element.
     *
     * Creates a new instance with the specified ping value.
     *
     * A space-separated list of URLs. When the link is followed, the browser will send POST requests with the body
     * `PING` to the URLs. Typically used for tracking.
     *
     * @param string|UnitEnum|null $value Ping value to set for the element. Use a space-separated list of URLs as a
     * `string`. Can be `null` to unset the attribute.
     *
     * @return static New instance with the updated `ping` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#ping
     *
     * Usage example:
     * ```php
     * $element->ping('https://example.com/track');
     * $element->ping('https://a.example/track https://b.example/track');
     * $element->ping(null);
     * ```
     */
    public function ping(string|UnitEnum|null $value): static
    {
        return $this->addAttribute(Attribute::PING, $value);
    }
}
