<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\FormControl;

/**
 * Is used by widgets that implement the formnovalidate method.
 */
trait HasFormnovalidate
{
    /**
     * Specifies that the element represents a control whose value is not meant to be validated during form submission.
     *
     * @return static A new instance of the current class with the specified formnovalidate value.
     */
    public function formnovalidate(): static
    {
        $new = clone $this;
        $new->attributes['formnovalidate'] = true;

        return $new;
    }

    /**
     * Check if the formnovalidate attribute is set.
     *
     * @return bool `true` if the formnovalidate attribute is set, `false` otherwise.
     */
    public function isFormnovalidate(): bool
    {
        return isset($this->attributes['formnovalidate']) && $this->attributes['formnovalidate'] === true;
    }
}
