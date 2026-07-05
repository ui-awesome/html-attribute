<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `loading` attribute on `<img>` and `<iframe>` elements.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#loading
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#loading
 */
enum Loading: string
{
    /**
     * Load the image immediately, regardless of whether or not the image is currently within the visible viewport
     * (`eager`).
     *
     * This is the default value.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#eager
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#eager
     */
    case EAGER = 'eager';

    /**
     * Defer loading of the image until it reaches a calculated distance from the viewport (`lazy`).
     *
     * The image will be loaded when it is needed, reducing initial page load time.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#lazy
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#lazy
     */
    case LAZY = 'lazy';
}
