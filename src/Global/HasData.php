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
 * Trait for managing the global HTML `data-*` attributes in tag rendering.
 *
 * Provides an immutable API for setting custom data attributes on HTML elements.
 *
 * Intended for use in tags and components that require manipulation of `data-*` attributes.
 *
 * Key features.
 * - Designed for use in tags and components.
 * - Handles the HTML `data-*` global attributes.
 * - Immutable method for setting or overriding `data-*` attributes.
 * - Supports scalar, Closure and UnitEnum for advanced dynamic data scenarios.
 *
 * @phpstan-type Key string|UnitEnum
 * @phpstan-type Value scalar|Stringable|UnitEnum|null|Closure(): mixed
 * @method void setAttribute(Key $key, Value $value, string $prefix = '', bool $boolToString = false) Sets a single
 * attribute with prefix handling. Available via {@see \UIAwesome\Html\Mixin\HasAttributes} trait composition.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/data-*
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
trait HasData
{
    /**
     * Sets a single HTML `data-*` attribute for the element.
     *
     * Creates a new instance with the specified custom data attribute, supporting scalar, Closure and UnitEnum values
     * as required by the HTML specification for global attributes.
     *
     * @param string|UnitEnum $key Data attribute key (without the `data-` prefix).
     * @param bool|Closure|float|int|string|Stringable|UnitEnum|null $value Data attribute value. Can be `null` to unset
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
        $new = clone $this;

        $new->setAttribute($key, $value, 'data-');

        return $new;
    }

    /**
     * Sets one or more HTML `data-*` attributes for the element.
     *
     * Creates a new instance with the specified custom data value, supporting explicit assignment according to the HTML
     * specification for global attributes.
     *
     * @param array $values Associative array of data attribute keys and values. Keys must be string; values must be
     * scalar, Closure, Stringable, UnitEnum or `null`.
     *
     * @throws InvalidArgumentException if one or more arguments are invalid, of incorrect type or format.
     *
     * @return static New instance with the updated `data-*` attributes.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#attr-data-*
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
        $new = clone $this;

        /** @phpstan-var array<string, scalar|Stringable|UnitEnum|Closure(): mixed|null> $values */
        foreach ($values as $key => $value) {
            try {
                $new->setAttribute($key, $value, 'data-');
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
     * Removes a single HTML `data-*` attribute from the element.
     *
     * Creates a new instance with the specified custom data attribute removed.
     *
     * @param string|UnitEnum $key Data attribute key (without the `data-` prefix).
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
