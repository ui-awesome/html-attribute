<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Data;

/**
 * Is used by widgets that implement the dataBsDismiss method.
 */
trait HasDataBsDismiss
{
    abstract public function dataAttributes(array $values): static;

    /**
     * Set the `HTML` data-bs-dismiss attribute for the toggle.
     *
     * @param string $value The data-bs-dismiss attribute value.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataBsDismiss(string $value): static
    {
        return $this->dataAttributes([DataAttributeValues::BS_DISMISS => $value]);
    }
}
