<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Closure;
use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Helper\AttributeBag;
use UnitEnum;

/**
 * Provides an immutable API for `on*` event attributes.
 *
 * @mixin \UIAwesome\Html\Mixin\HasAttributes
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes#event_handler_attributes
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasEvents
{
    /**
     * Sets an `on*` event attribute.
     *
     * Usage example:
     * ```php
     * $element->addEvent(Event::CLICK, "alert('hello')");
     * $element->addEvent('click', "alert('x')");
     * $element->addEvent('submit', static fn(): string => 'return validate()');
     * $element->addEvent(Event::CLICK, null);
     * ```
     *
     * @param string|UnitEnum $key Event attribute key with or without the leading `on` prefix.
     * @param Closure(): mixed|string|Stringable|UnitEnum|null $value JavaScript handler code, or `null` to remove the
     * attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `on*` event attribute.
     */
    public function addEvent(string|UnitEnum $key, string|Closure|Stringable|UnitEnum|null $value): static
    {
        return $this->addAttribute(AttributeBag::normalizeKey($key, 'on'), $value);
    }

    /**
     * Sets multiple `on*` event attributes.
     *
     * Usage example:
     * ```php
     * $element->events(
     *     [
     *         'click' => "alert('Clicked!')",
     *         'mouseover' => static fn(): string => "console.log('Hover')",
     *     ],
     * );
     * ```
     *
     * @param mixed[] $values Associative array of event keys and handlers. Values may be Stringable, Closure, string,
     * or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `on*` event attributes.
     */
    public function events(array $values): static
    {
        $new = $this;

        foreach ($values as $key => $value) {
            $new = $new->addAttribute(AttributeBag::normalizeKey($key, 'on'), $value);
        }

        return $new;
    }

    /**
     * Removes an `on*` event attribute.
     *
     * Usage example:
     * ```php
     * $element->removeEvent('click');
     * $element->removeEvent(Event::SUBMIT);
     * ```
     *
     * @param string|UnitEnum $key Event name or enum case to remove.
     *
     * @throws InvalidArgumentException if the event key is invalid.
     *
     * @return static New instance with the specified `on*` event attribute removed.
     */
    public function removeEvent(string|UnitEnum $key): static
    {
        return $this->addAttribute(AttributeBag::normalizeKey($key, 'on'), null);
    }
}
