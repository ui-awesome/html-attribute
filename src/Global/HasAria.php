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
 * Provides an immutable API for `aria-*` attributes.
 *
 * @phpstan-type Key string|UnitEnum
 * @phpstan-type Value scalar|Stringable|UnitEnum|null|Closure(): mixed
 * @method static removeAttribute(string $key) Removes an attribute and returns a new instance.
 * @method void setAttribute(Key $key, Value $value, string $prefix = '', bool $boolToString = false) Sets a single
 * attribute with prefix handling.
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
        $new = clone $this;

        $new->setAttribute($key, $value, 'aria-', true);

        return $new;
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
        $new = clone $this;

        /** @phpstan-var array<string, scalar|Stringable|UnitEnum|Closure(): mixed|null> $values */
        foreach ($values as $key => $value) {
            try {
                $new->setAttribute($key, $value, 'aria-', true);
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
