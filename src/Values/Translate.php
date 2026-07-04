<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `translate` global attribute.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Global_attributes/translate
 */
enum Translate: string
{
    /**
     * Indicates that the element is not translatable (`no`).
     *
     * Indicates that the element should not be translated by translation tools.
     */
    case NO = 'no';

    /**
     * Indicates that the element is explicitly translatable (`yes`).
     *
     * Indicates that the element should be translated by translation tools.
     */
    case YES = 'yes';
}
