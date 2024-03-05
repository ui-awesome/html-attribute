<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\FormControl;

use UIAwesome\Html\Helper\Validator;

/**
 * Is used by widgets that implement the formtarget method.
 */
trait HasFormtarget
{
    /**
     * Specifies a browsing context name or keyword that represents the target of the control.
     *
     * @param string $value The browsing context name or keyword.
     *
     * @throws \InvalidArgumentException If the provided formtarget value is not one of the following values:
     * "_blank", "_self", "_parent" or "_top".
     *
     * @return static A new instance of the current class with the specified formtarget value.
     */
    public function formtarget(string $value): static
    {
        Validator::inList(
            $value,
            'Invalid value "%s" for the formtarget attribute. Allowed values are: "%s".',
            '_blank',
            '_self',
            '_parent',
            '_top'
        );


        $new = clone $this;
        $new->attributes['formtarget'] = $value;

        return $new;
    }
}
