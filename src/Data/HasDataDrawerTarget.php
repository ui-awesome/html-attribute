<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Data;

/**
 * Is used by widgets that implement the dataDrawerTarget method.
 */
trait HasDataDrawerTarget
{
    protected bool|string $dataDrawerTarget = false;

    abstract public function dataAttributes(array $values): static;

    /**
     * Set the `HTML` data drawer target attribute for the toggle.
     *
     * @param bool|string $value The data-drawer-target attribute value. If true, the value of the id attribute will be
     * used.
     *
     * @return static A new instance of the current class with the specified toggle attributes.
     */
    public function dataDrawerTarget(bool|string $value): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributeValues::DRAWER_TARGET => $value]);
        }

        $new = clone $this;
        $new->dataDrawerTarget = $value;

        return $new;
    }
}
