<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Data;

/**
 * Is used by widgets that implement the dataBsDismiss method.
 */
trait HasDataBsDismiss
{
    protected bool|string $dataBsDismiss = false;

    /**
     * Set the `HTML` `data-bs-dismiss` attribute for the toggle.
     *
     * @param bool|string $value The `data-bs-dismiss` attribute value. If `true`, the value of the `id` attribute will
     * be used.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataBsDismiss(bool|string $value = true): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributeValues::BS_DISMISS => $value]);
        }

        $new = clone $this;
        $new->dataBsDismiss = $value;

        return $new;
    }
}
