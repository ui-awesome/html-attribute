<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Data;

/**
 * Is used by widgets that implement the dataBsTarget method.
 */
trait HasDataBsTarget
{
    protected bool|string $dataBsTarget = false;

    abstract public function dataAttributes(array $values): static;

    /**
     * Set the `HTML` data-bs-target attribute for the toggle.
     *
     * @param bool|string $value The data-bs-target attribute value. If true, the value of the id attribute will be
     * used.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataBsTarget(bool|string $value): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributeValues::BS_TARGET => $value]);
        }

        $new = clone $this;
        $new->dataBsTarget = $value;

        return $new;
    }
}
