<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Data;

/**
 * Is used by widgets that implement the dataDismissTarget method.
 */
trait HasDataDismissTarget
{
    protected bool|string $dataDismissTarget = false;

    /**
     * Set the `HTML` `data-dismiss-target` attribute for the toggle.
     *
     * @param bool|string $value The `data-dismiss-target` attribute value. If `true`, the value of the `id` attribute
     * will be used.
     */
    public function dataDismissTarget(bool|string $value = true): static
    {
        if (is_string($value)) {
            return $this->dataAttributes([DataAttributeValues::DISMISS_TARGET => $value]);
        }

        $new = clone $this;
        $new->dataDismissTarget = $value;

        return $new;
    }
}
