<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents element-specific attribute names.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum ElementAttribute: string
{
    /**
     * `alt` — Alternative text in case an image can't be displayed.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#alt
     */
    case ALT = 'alt';

    /**
     * `decoding` — Provides a hint to the browser for image decoding behavior.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/decoding
     */
    case DECODING = 'decoding';

    /**
     * `height` — Specifies the height of certain elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#height
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/height
     */
    case HEIGHT = 'height';

    /**
     * `href` — The URL of a linked resource.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#href
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/href
     */
    case HREF = 'href';

    /**
     * `loading` — Indicates how the browser should load the image.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#loading
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#loading
     */
    case LOADING = 'loading';

    /**
     * `popovertarget` — Identifies the popover element that is associated with the current element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#popovertarget
     */
    case POPOVERTARGET = 'popovertarget';

    /**
     * `popovertargetaction` — Defines the action to be performed on the popover element when the current element is activated.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#popovertargetaction
     */
    case POPOVERTARGETACTION = 'popovertargetaction';

    /**
     * `referrerpolicy` — Referrer information to send when fetching the resource.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#referrerpolicy
     */
    case REFERRERPOLICY = 'referrerpolicy';

    /**
     * `src` — URL of embeddable content.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#src
     */
    case SRC = 'src';


    /**
     * `srcset` — Defines a set of images for the browser to choose from.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Element/picture#srcset
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#srcset
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/source#srcset
     */
    case SRCSET = 'srcset';

    /**
     * `usemap` — Associates the image with a `<map>` element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#usemap
     */
    case USEMAP = 'usemap';

    /**
     * `width` — Specifies the width of certain elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#width
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/width
     */
    case WIDTH = 'width';
}
