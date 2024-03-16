<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Data;

/**
 * Is used by widgets that implement the dataCollapseToggle method.
 */
trait HasDataCollapseToggle
{
    protected bool|string $dataCollapseToggle = false;

    /**
     * Set the `HTML` `data-collapse-toggle` attribute for the toggle.
     *
     * @param bool|string $value The `data-collapse-toggle` attribute value. If `true`, the value of the `id` attribute
     * will be used.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataCollapseToggle(bool|string $value = true): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributeValues::COLLAPSE_TOGGLE => $value]);
        }

        $new = clone $this;
        $new->dataCollapseToggle = $value;

        return $new;
    }
}
