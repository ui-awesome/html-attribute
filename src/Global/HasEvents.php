<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Closure;
use InvalidArgumentException;
use Stringable;
use TypeError;
use UIAwesome\Html\Attribute\Exception\Message;
use UIAwesome\Html\Helper\Attributes;
use UnitEnum;

use function gettype;

/**
 * Provides an immutable API for `on*` event attributes.
 *
 * @phpstan-type Key string|UnitEnum
 * @phpstan-type Value scalar|Stringable|UnitEnum|null|Closure(): mixed
 * @method void setAttribute(Key $key, Value $value, string $prefix = '', bool $boolToString = false) Sets a single
 * attribute with prefix handling. Available via {@see \UIAwesome\Html\Mixin\HasAttributes} trait composition.
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
     * @param string|UnitEnum $event Event attribute key with or without the leading `on` prefix.
     * @param Closure|string|Stringable|UnitEnum|null $handler JavaScript handler code, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `on*` event attribute.
     *
     * @phpstan-param Closure(): mixed|string|Stringable|UnitEnum|null $handler
     *
     * Usage example:
     * ```php
     * $element->addEvent(Event::CLICK, "alert('hello')");
     * $element->addEvent('click', "alert('x')");
     * $element->addEvent('submit', static fn(): string => 'return validate()');
     * $element->addEvent(Event::CLICK, null);
     * ```
     */
    public function addEvent(string|UnitEnum $event, string|Closure|Stringable|UnitEnum|null $handler): static
    {
        $new = clone $this;

        $new->setAttribute($event, $handler, 'on', true);

        return $new;
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
        $new = clone $this;

        /** @phpstan-var array<string, string|Closure|Stringable|null> $values */
        foreach ($values as $key => $value) {
            try {
                $new->setAttribute($key, $value, 'on', true);
                // @phpstan-ignore catch.neverThrown
            } catch (TypeError) {
                throw new InvalidArgumentException(
                    Message::ATTRIBUTE_VALUE_MUST_BE_SCALAR_OR_CLOSURE->getMessage(gettype($value)),
                );
            }
        }

        return $new;
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
