<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Closure;
use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Helper\Attributes;
use UnitEnum;

/**
 * Provides an immutable API for `data-*` attributes.
 *
 * @phpstan-type Key string|UnitEnum
 * @phpstan-type Value scalar|Stringable|UnitEnum|null|Closure(): mixed
 * @method static attributes(mixed[] $values) Sets multiple attributes and returns a new instance.
 * @method static removeAttribute(string $key) Removes an attribute and returns a new instance.
 * @method static setAttribute(Key $key, Value $value) Sets a single attribute amd returns a new instance.
 * {@see \UIAwesome\Html\Mixin\HasAttributes} for managing the underlying attributes array.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/data-*
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasData
{
    /**
     * Sets a `data-*` attribute.
     *
     * @param string|UnitEnum $key Data attribute key without the `data-` prefix.
     * @param bool|Closure|float|int|string|Stringable|UnitEnum|null $value Data attribute value, or `null` to remove
     * the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `data-*` attribute.
     *
     * @phpstan-param scalar|Stringable|UnitEnum|Closure(): mixed $value
     *
     * Usage example:
     * ```php
     * $element->addDataAttribute('role', 'admin');
     * $element->addDataAttribute('id', static fn(): string => uniqid());
     * $element->addDataAttribute(DataProperty::ID, '12345');
     * $element->addDataAttribute('size', ButtonSize::SMALL);
     * $element->addDataAttribute('role', null);
     * ```
     */
    public function addDataAttribute(
        string|UnitEnum $key,
        bool|float|int|string|Closure|Stringable|UnitEnum|null $value,
    ): static {
        return $this->setAttribute($key, $value);
    }

    /**
     * Sets multiple `data-*` attributes.
     *
     * @param array $values Associative array of data keys and values. Values may be scalar, `Stringable`, `UnitEnum`,
     * `Closure`, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `data-*` attributes.
     *
     * @phpstan-param mixed[] $values
     *
     * Usage example:
     * ```php
     * $element->dataAttributes(
     *     [
     *         'role' => 'admin',
     *         'id' => static fn(): string => uniqid(),
     *     ],
     * );
     * $element->dataAttributes(
     *     [
     *         'status' => Status::ACTIVE,
     *     ],
     * );
     * ```
     */
    public function dataAttributes(array $values): static
    {
        return $this->attributes($values);
    }

    /**
     * Removes a `data-*` attribute.
     *
     * @param string|UnitEnum $key Data attribute key without the `data-` prefix.
     *
     * @return static New instance with the specified `data-*` attribute removed.
     *
     * Usage example:
     * ```php
     * $element->removeDataAttribute('role');
     * $element->removeDataAttribute(DataProperty::ID);
     * ```
     */
    public function removeDataAttribute(string|UnitEnum $key): static
    {
        $normalizedKey = Attributes::normalizeKey($key, 'data-');

        return $this->removeAttribute($normalizedKey);
    }
}
