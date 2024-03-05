<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\FormControl;

use UIAwesome\Html\Helper\Utils;

/**
 * Is used by widgets that implement the field attributes method for generating the id and name attributes.
 */
trait HasFieldAttributes
{
    /**
     * Generate the id and name attributes for the input field.
     *
     * @param string $formModel The form model name.
     * @param string $property The property name or expression.
     *
     * @return static A new instance or clone of the current object with the id and name attributes set.
     */
    public function fieldAttributes(string $formModel, string $property): static
    {
        $new = clone $this;
        $new->attributes['id'] = Utils::generateInputId($formModel, $property);
        $new->attributes['name'] = Utils::generateInputName($formModel, $property);

        return $new;
    }
}
