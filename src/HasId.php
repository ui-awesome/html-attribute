<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute;

/**
 * Is used by widgets that implement the id method.
 */
trait HasId
{
    /**
     * Set the ID of the widget.
     *
     * @param string|null $value The ID of the widget.
     *
     * @return static A new instance of the current class with the specified ID value.
     *
     * @link https://html.spec.whatwg.org/multipage/dom.html#the-id-attribute
     */
    public function id(string|null $value): static
    {
        $new = clone $this;
        $new->attributes['id'] = $value;

        return $new;
    }

    /**
     * Get the ID of the widget.
     *
     * @return string|null The ID of the widget.
     */
    public function getId(): null|string
    {
        if (isset($this->attributes['id']) && is_string($this->attributes['id'])) {
            return $this->attributes['id'];
        }

        return null;
    }
}
