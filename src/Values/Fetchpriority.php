<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML/SVG `fetchpriority` attribute.
 *
 * Defines the supported fetch priority hint tokens as enum cases.
 *
 * Key features.
 * - Designed for use in img, link, and script elements.
 * - Enum values map to `auto`, `high`, and `low`.
 * - Suitable for rendering HTML attributes in view helpers and components.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/fetchpriority
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Fetchpriority: string
{
    /**
     * `auto` - Does not set a preference for the fetch priority.
     *
     * This is the default value when the attribute is not specified or when an invalid value is set. The browser
     * determines the priority based on its own heuristics.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/fetchpriority#auto
     */
    case AUTO = 'auto';
    /**
     * `high` - Fetches the external resource at a high priority relative to other external resources.
     *
     * This value should be used sparingly for resources that significantly contribute to user experience metrics
     * such as the Largest Contentful Paint (LCP).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/fetchpriority#high
     */
    case HIGH = 'high';

    /**
     * `low` - Fetches the external resource at a low priority relative to other external resources.
     *
     * This value is useful for resources that are not immediately necessary for the initial page load and can
     * be deferred.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/fetchpriority#low
     */
    case LOW = 'low';
}
