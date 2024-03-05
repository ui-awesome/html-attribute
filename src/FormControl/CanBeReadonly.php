<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\FormControl;

/**
 * Is used by widgets that implement the readonly method.
 */
trait CanBeReadonly
{
    /**
     * Set the readonly attribute which, if present, means this field cannot be edited by the user.
     *
     * Its value can, however, still be changed by JavaScript code directly setting the HTMLInputElement.value
     * property.
     *
     * @return static A new instance of the current class with the specified readonly value.
     *
     * @link https://html.spec.whatwg.org/multipage/input.html#the-readonly-attribute
     */
    public function readonly(): static
    {
        $new = clone $this;
        $new->attributes['readonly'] = true;

        return $new;
    }

    /**
     * Check if the readonly attribute is set.
     *
     * @return bool `true` if the readonly attribute is set, `false` otherwise.
     */
    public function isReadonly(): bool
    {
        return isset($this->attributes['readonly']) && $this->attributes['readonly'] === true;
    }
}
