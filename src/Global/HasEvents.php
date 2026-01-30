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
 * Trait for managing the global HTML event handler attributes (the `on*` attributes).
 *
 * Provides an immutable API for setting event handler attributes on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of event handler attributes.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `on*` global event handler attributes.
 * - Immutable method for setting or overriding the event handler attributes.
 * - Supports scalar, Closure and UnitEnum for advanced dynamic event scenarios.
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
     * Sets a single global `on*` event attribute for the element.
     *
     * Creates a new instance with the specified event handler value, supporting explicit assignment according to the
     * HTML specification for global attributes.
     *
     * The event key can be provided as a raw string (for example, `'onclick'` or `'click'`) or as a `UnitEnum` (for
     * example, `Event::CLICK`).
     *
     * @param string|UnitEnum $event Event attribute key (with or without the leading `on` prefix) or enum case.
     * @param Closure|string|Stringable|UnitEnum|null $handler JavaScript handler code. Can be `null` to unset the
     * attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated event attribute.
     *
     * @phpstan-param string|Stringable|Closure(): mixed|null $handler
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
     * Sets one or more global `on*` event attributes at once.
     *
     * Creates a new instance with the specified event attributes, supporting both string and Closure, and throws an
     * exception for invalid input.
     *
     * @param array $values Associative array where keys are event names or enum cases and values are handler strings,
     * Closure, Stringable or `null`.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated event attributes.
     *
     * @phpstan-param mixed[] $values
     *
     * Usage example:
     * ```php
     * // sets multiple event attributes at once
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
     * Removes a single global `on*` event attribute from the element.
     *
     * Creates a new instance with the specified event attribute removed.
     *
     * @param string|UnitEnum $event Event name or enum case to remove.
     *
     * @throws InvalidArgumentException if the event key is invalid.
     *
     * @return static New instance with the specified event attribute removed.
     *
     * Usage example:
     * ```php
     * // removes `onclick` attribute
     * $element->removeEvent('click');
     *
     * // removes `onsubmit` attribute with an enum key
     * $element->removeEvent(Event::SUBMIT);
     * ```
     */
    public function removeEvent(string|UnitEnum $event): static
    {
        $normalizedKey = Attributes::normalizeKey($event, 'on');

        return $this->removeAttribute($normalizedKey);
    }
}
