<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Aria;

use UIAwesome\Html\Helper\Validator;

/**
 * Is used by widgets that require the aria-current attribute.
 */
trait HasAriaCurrent
{
    /**
     * Set the aria-current attribute, which indicates the current item within a set of related elements.
     *
     * The aria-current attribute is used in WAI-ARIA to define the current item within a set of related elements.
     *
     * @param string $value The value of the current item.
     *
     * @return static A new instance or clone of the current object with the aria-current attribute set.
     *
     * @link https://www.w3.org/TR/wai-aria-1.1/#aria-current
     */
    public function ariaCurrent(string $value = 'false'): static
    {
        Validator::inList(
            $value,
            'Invalid value "%s" for aria-current. Allowed values are: "%s".',
            'date',
            'false',
            'location',
            'page',
            'step',
            'time',
            'true',
        );

        $new = clone $this;
        $new->attributes['aria-current'] = $value;

        return $new;
    }
}
