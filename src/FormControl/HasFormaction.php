<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\FormControl;

/**
 * Is used by widgets that implement the formaction method.
 */
trait HasFormaction
{
    /**
     * Set the form-submission action for the element.
     *
     * @param string $value The form-submission action.
     *
     * @throws \InvalidArgumentException If the provided form action value is empty.
     *
     * @return static A new instance of the current class with the specified formaction value.
     */
    public function formaction(string $value): static
    {
        if ($value === '') {
            throw new \InvalidArgumentException('The formaction attribute must be empty.');
        }

        $new = clone $this;
        $new->attributes['formaction'] = $value;

        return $new;
    }
}
