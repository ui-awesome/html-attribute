<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Closure;
use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Helper\Attributes;
use UnitEnum;

/**
 * Provides an immutable API for `aria-*` attributes.
 *
 * @phpstan-type Key string|UnitEnum
 * @phpstan-type Value scalar|Stringable|UnitEnum|null|Closure(): mixed
 * @method static attributes(mixed[] $values) Sets multiple attributes and returns a new instance.
 * @method static removeAttribute(string $key) Removes an attribute and returns a new instance.
 * @method static setAttribute(Key $key, Value $value) Sets a single attribute amd returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Reference/Attributes
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasAria
{
    /**
     * Sets an `aria-*` attribute.
     *
     * @param string|UnitEnum $key Aria attribute key without the `aria-` prefix.
     * @param bool|Closure|float|int|string|Stringable|UnitEnum|null $value Aria attribute value, or `null` to remove
     * the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `aria-*` attribute.
     *
     * @phpstan-param scalar|Stringable|UnitEnum|Closure(): mixed $value
     *
     * Usage example:
     * ```php
     * $element->addAriaAttribute('pressed', true);
     * $element->addAriaAttribute('label', 'Close');
     * $element->addAriaAttribute('controls', static fn(): string => 'modal-1');
     * $element->addAriaAttribute(Aria::AUTOCOMPLETE, 'list');
     * $element->addAriaAttribute(Aria::LIVE, 'polite');
     * $element->addAriaAttribute(Aria::DESCRIBEDBY, 'description');
     * $element->addAriaAttribute('pressed', null);
     * ```
     */
    public function addAriaAttribute(
        string|UnitEnum $key,
        bool|float|int|string|Closure|Stringable|UnitEnum|null $value,
    ): static {
        return $this->setAttribute($key, $value);
    }

    /**
     * Sets multiple `aria-*` attributes.
     *
     * @param array $values Associative array of aria keys and values. Values may be scalar, `Stringable`, `UnitEnum`,
     * `Closure`, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `aria-*` attributes.
     *
     * @phpstan-param mixed[] $values
     *
     * Usage example:
     * ```php
     * $element->ariaAttributes(
     *     [
     *         'controls' => static fn(): string => 'modal-1',
     *         'hidden' => false,
     *         'label' => 'Close',
     *     ],
     * );
     * $element->ariaAttributes(
     *     [
     *         'live' => Live::POLITE,
     *     ],
     * );
     * ```
     */
    public function ariaAttributes(array $values): static
    {
        return $this->attributes($values);
    }

    /**
     * Removes an `aria-*` attribute.
     *
     * @param string|UnitEnum $key Aria attribute key without the `aria-` prefix.
     *
     * @return static New instance with the specified `aria-*` attribute removed.
     *
     * Usage example:
     * ```php
     * $element->removeAriaAttribute('pressed');
     * $element->removeAriaAttribute(Aria::AUTOCOMPLETE);
     * ```
     */
    public function removeAriaAttribute(string|UnitEnum $key): static
    {
        $normalizedKey = Attributes::normalizeKey($key, 'aria-');

        return $this->removeAttribute($normalizedKey);
    }
}
