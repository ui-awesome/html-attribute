<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Closure;
use InvalidArgumentException;
use Stringable;
use UnitEnum;

/**
 * Provides an immutable API for `on*` event attributes.
 *
 * @phpstan-type Key string|UnitEnum
 * @phpstan-type Value scalar|Stringable|UnitEnum|null|Closure(): mixed
 * @method static attributes(mixed[] $values, string $prefix = '') Sets multiple attributes and returns a new instance.
 * @method static remove(mixed[] &$attributes, string|UnitEnum $key, string $prefix = '') Removes an attribute and
 * returns a new instance.
 * @method static set(mixed[] &$attributes, string|UnitEnum $key, mixed $value, string $prefix = '') Sets a single
 * attribute and returns a new instance.
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
     * Usage example:
     * ```php
     * $element->addEvent(Event::CLICK, "alert('hello')");
     * $element->addEvent('click', "alert('x')");
     * $element->addEvent('submit', static fn(): string => 'return validate()');
     * $element->addEvent(Event::CLICK, null);
     * ```
     *
     * @param string|UnitEnum $key Event attribute key with or without the leading `on` prefix.
     * @param Closure|string|Stringable|UnitEnum|null $value JavaScript handler code, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `on*` event attribute.
     *
     * @phpstan-param Closure(): mixed|string|Stringable|UnitEnum|null $value
     */
    public function addEvent(string|UnitEnum $key, string|Closure|Stringable|UnitEnum|null $value): static
    {
        return $this->setAttribute($key, $value, 'on');
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
     * @param array $values Associative array of event keys and handlers. Values may be `Stringable`, `Closure`,
     * `string`, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `on*` event attributes.
     *
     * @phpstan-param mixed[] $values
     */
    public function events(array $values): static
    {
        return $this->attributes($values, 'on');
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
        return $this->removeAttribute($key, 'on');
    }
}
