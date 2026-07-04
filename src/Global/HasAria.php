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
 * Provides an immutable API for `aria-*` attributes.
 *
 * @mixin HasAttributes
 * @see https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Reference/Attributes
 */
trait HasAria
{
    /**
     * Sets an `aria-*` attribute.
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
     *
     * @param string|UnitEnum $key Aria attribute key without the `aria-` prefix.
     * @param bool|Closure(): mixed|float|int|string|Stringable|UnitEnum|null $value Aria attribute value, or `null` to
     * remove the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `aria-*` attribute.
     */
    public function addAriaAttribute(
        string|UnitEnum $key,
        bool|float|int|string|Closure|Stringable|UnitEnum|null $value,
    ): static {
        return $this->addAttribute(AttributeBag::normalizeKey($key, 'aria-'), $value);
    }

    /**
     * Sets multiple `aria-*` attributes.
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
     *
     * @param mixed[] $values Associative array of aria keys and values. Values may be scalar, Stringable, UnitEnum,
     * Closure, or `null` to remove the attribute.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `aria-*` attributes.
     */
    public function ariaAttributes(array $values): static
    {
        $new = $this;

        foreach ($values as $key => $value) {
            $new = $new->addAttribute(AttributeBag::normalizeKey($key, 'aria-'), $value);
        }

        return $new;
    }

    /**
     * Removes an `aria-*` attribute.
     *
     * Usage example:
     * ```php
     * $element->removeAriaAttribute('pressed');
     * $element->removeAriaAttribute(Aria::AUTOCOMPLETE);
     * ```
     *
     * @param string|UnitEnum $key Aria attribute key without the `aria-` prefix.
     *
     * @return static New instance with the specified `aria-*` attribute removed.
     */
    public function removeAriaAttribute(string|UnitEnum $key): static
    {
        return $this->addAttribute(AttributeBag::normalizeKey($key, 'aria-'), null);
    }
}
