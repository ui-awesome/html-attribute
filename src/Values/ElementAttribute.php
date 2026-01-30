<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents HTML element attribute names.
 *
 * Defines a curated set of element attribute identifiers as enum cases. The enum values match the attribute names as
 * used in HTML source.
 *
 * Key features.
 * - Designed for use in tags, components, and helpers requiring element attribute assignment.
 * - Enum values map to attribute names as `string` tokens.
 * - Integration-ready for tag rendering and element generation APIs.
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
     * `referrerpolicy` — Referrer information to send when fetching the resource.
     *
     * @link https://html.spec.whatwg.org/multipage/links.html#attr-hyperlink-referrerpolicy
     */
    case REFERRERPOLICY = 'referrerpolicy';

    /**
     * `src` — URL of embeddable content.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#src
     */
    case SRC = 'src';

    /**
     * `width` — Specifies the width of certain elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#width
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/width
     */
    case WIDTH = 'width';
}
