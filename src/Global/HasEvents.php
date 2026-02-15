<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Closure;
use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Helper\Attributes;
use UnitEnum;

/**
 * Provides an immutable API for `on*` event attributes.
 *
 * @phpstan-type Key string|UnitEnum
 * @phpstan-type Value scalar|Stringable|UnitEnum|null|Closure(): mixed
 * @method static attributes(mixed[] $values) Sets multiple attributes and returns a new instance.
 * @method static removeAttribute(string $key) Removes an attribute and returns a new instance.
 * @method static setAttribute(Key $key, Value $value) Sets a single attribute amd returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
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
     * @param string|UnitEnum $key Event attribute key with or without the leading `on` prefix.
     * @param Closure|string|Stringable|UnitEnum|null $value JavaScript handler code, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `on*` event attribute.
     *
     * @phpstan-param Closure(): mixed|string|Stringable|UnitEnum|null $value
     *
     * Usage example:
     * ```php
     * $element->addEvent(Event::CLICK, "alert('hello')");
     * $element->addEvent('click', "alert('x')");
     * $element->addEvent('submit', static fn(): string => 'return validate()');
     * $element->addEvent(Event::CLICK, null);
     * ```
     */
    public function addEvent(string|UnitEnum $key, string|Closure|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute($key, $value);
    }

    /**
     * Sets multiple `on*` event attributes.
     *
     * @param array $values Associative array of event keys and handlers. Values may be `Stringable`, `Closure`,
     * `string`, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `on*` event attributes.
     *
     * @phpstan-param mixed[] $values
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
     */
    public function events(array $values): static
    {
        return $this->attributes($values);
    }

    /**
     * Removes an `on*` event attribute.
     *
     * @param string|UnitEnum $event Event name or enum case to remove.
     *
     * @throws InvalidArgumentException if the event key is invalid.
     *
     * @return static New instance with the specified `on*` event attribute removed.
     *
     * Usage example:
     * ```php
     * $element->removeEvent('click');
     * $element->removeEvent(Event::SUBMIT);
     * ```
     */
    public function removeEvent(string|UnitEnum $event): static
    {
        $normalizedKey = Attributes::normalizeKey($event, 'on');

        return $this->removeAttribute($normalizedKey);
    }
}
