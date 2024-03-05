<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\FormControl;

use UIAwesome\Html\Helper\Validator;

use function strtoupper;

/**
 * Is used by widgets that implement the formmethod method.
 */
trait HasFormmethod
{
    /**
     * Set the HTTP method with which a UA is meant to associate this element for form submission.
     *
     * @param string $value The HTTP method with which a UA is meant to associate this element for form submission.
     *
     * @throws \InvalidArgumentException If the provided formmethod value is not one of the following values:
     * "get", "post".
     *
     * @return static A new instance of the current class with the specified formmethod value.
     */
    public function formmethod(string $value): static
    {
        Validator::inList(
            strtoupper($value),
            'Invalid value "%s" for the formmethod attribute. Allowed values are: "%s".',
            'GET',
            'POST'
        );

        $new = clone $this;
        $new->attributes['formmethod'] = $value;

        return $new;
    }
}
