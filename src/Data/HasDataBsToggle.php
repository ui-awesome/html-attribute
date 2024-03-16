<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Data;

/**
 * Is used by widgets that implement the dataBsToggle method.
 */
trait HasDataBsToggle
{
    protected bool|string $dataBsToggle = false;

    /**
     * Set the `HTML` `data-bs-toggle` attribute for the toggle.
     *
     * @param bool|string $value The `data-bs-toogle` attribute value. If `true`, the value of the `id` attribute will
     * be used.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataBsToggle(bool|string $value = true): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributeValues::BS_TOGGLE => $value]);
        }

        $new = clone $this;
        $new->dataBsToggle = $value;

        return $new;
    }
}
