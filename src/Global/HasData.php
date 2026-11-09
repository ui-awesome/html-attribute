<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Global;

use Closure;
use InvalidArgumentException;
use Stringable;
use UIAwesome\Html\Helper\AttributeBag;
use UIAwesome\Html\Mixin\HasAttributes;
use UnitEnum;

/**
 * Provides an immutable API for `data-*` attributes.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/data-*
 */
trait HasData
{
    /**
     * Sets a `data-*` attribute.
     *
     * @param string|UnitEnum $key Data attribute key without the `data-` prefix.
     * @param bool|Closure(): mixed|float|int|string|Stringable|UnitEnum|null $value Data attribute value, or `null` to
     * remove the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `data-*` attribute.
     */
    public function addDataAttribute(
        string|UnitEnum $key,
        bool|float|int|string|Closure|Stringable|UnitEnum|null $value,
    ): static {
        return $this->addAttribute(AttributeBag::normalizeKey($key, 'data-'), $value);
    }

    /**
     * Sets multiple `data-*` attributes.
     *
     * @param mixed[] $values Associative array of data keys and values. Values may be scalar, Stringable, UnitEnum,
     * Closure, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `data-*` attributes.
     */
    public function dataAttributes(array $values): static
    {
        $new = $this;

        foreach ($values as $key => $value) {
            $new = $new->addAttribute(AttributeBag::normalizeKey($key, 'data-'), $value);
        }

        return $new;
    }

    /**
     * Removes a `data-*` attribute.
     *
     * @param string|UnitEnum $key Data attribute key without the `data-` prefix.
     *
     * @return static New instance with the specified `data-*` attribute removed.
     */
    public function removeDataAttribute(string|UnitEnum $key): static
    {
        return $this->addAttribute(AttributeBag::normalizeKey($key, 'data-'), null);
    }
}
