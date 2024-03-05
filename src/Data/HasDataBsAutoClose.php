<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Data;

/**
 * Is used by widgets that implement the dataBsAutoClose method.
 */
trait HasDataBsAutoClose
{
    abstract public function dataAttributes(array $values): static;

    /**
     * Set the `HTML` data-bs-auto-close attribute for the toggle.
     *
     * @param string $value The data-bs-auto-close attribute value.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataBsAutoClose(string $value): static
    {
        return $this->dataAttributes([DataAttributeValues::BS_AUTO_CLOSE => $value]);
    }
}
