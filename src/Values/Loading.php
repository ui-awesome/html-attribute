<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `loading` attribute on `<img>` and `<iframe>` elements.
 *
 * Defines the supported loading strategy tokens as enum cases.
 *
 * Key features.
 * - Designed for use in image elements requiring loading strategy assignment.
 * - Enum values are represented as `string` tokens.
 * - Enum values map to `eager` and `lazy`.
 * - Integration-ready for tag rendering and element generation APIs.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#loading
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#loading
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Loading: string
{
    /**
     * Load the image immediately, regardless of whether or not the image is currently within the visible viewport
     * (`eager`).
     *
     * This is the default value.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#eager
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#eager
     */
    case EAGER = 'eager';

    /**
     * Defer loading of the image until it reaches a calculated distance from the viewport (`lazy`).
     *
     * The image will be loaded when it is needed, reducing initial page load time.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#lazy
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#lazy
     */
    case LAZY = 'lazy';
}
