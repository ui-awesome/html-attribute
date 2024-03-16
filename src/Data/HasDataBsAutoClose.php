<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Data;

/**
 * Is used by widgets that implement the dataBsAutoClose method.
 */
trait HasDataBsAutoClose
{
    protected bool|string $dataBsAutoClose = false;

    /**
     * Set the `HTML` `data-bs-auto-close` attribute for the toggle.
     *
     * @param bool|string $value The `data-bs-auto-close` attribute value. If `true`, the value of the `id` attribute
     * will be used.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataBsAutoClose(bool|string $value = true): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributeValues::BS_AUTO_CLOSE => $value]);
        }

        $new = clone $this;
        $new->dataBsAutoClose = $value;

        return $new;
    }
}
