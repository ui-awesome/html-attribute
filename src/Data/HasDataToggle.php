<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Data;

/**
 * Is used by widgets that implement the dataToggle method.
 */
trait HasDataToggle
{
    protected bool|string $dataToggle = false;

    abstract public function dataAttributes(array $values): static;

    /**
     * Set the `HTML` data toggle attribute for the toggle.
     *
     * @param bool|string $value The data-toggle attribute value. If true, the value of the id attribute will be
     * used.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataToggle(bool|string $value): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributeValues::TOGGLE => $value]);
        }

        $new = clone $this;
        $new->dataToggle = $value;

        return $new;
    }
}
