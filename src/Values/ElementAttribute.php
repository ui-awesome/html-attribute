<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

enum ElementAttribute: string
{
    /**
     * `alt` — Alternative text in case an image can't be displayed.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#alt
     */
    case ALT = 'alt';

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
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/href*
     */
    case HREF = 'href';

    /**
     * `referrerpolicy` — Referrer information to send when fetching the resource.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy
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
