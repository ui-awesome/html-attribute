<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

use Closure;

/**
 * Is used by widgets that implement the dataAttributes method.
 *
 * Use enum classes that implement the DataAttributeValues interface to specify the data attribute keys.
 */
trait HasData
{
    /**
     * Set the data attribute.
     *
     * @param array $values The data attribute values.
     *
     * @return static A new instance of the current class with the specified data attribute values.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#attr-data-*
     */
    public function dataAttributes(array $values): static
    {
        $new = clone $this;

        foreach ($values as $key => $value) {
            if (!is_string($key) || (!is_string($value) && !$value instanceof Closure)) {
                throw new \InvalidArgumentException(
                    'The data attribute key must be a string and the value must be a string or a Closure.',
                );
            }


            $new->attributes["data-$key"] = $value;
        }

        return $new;
    }
}
