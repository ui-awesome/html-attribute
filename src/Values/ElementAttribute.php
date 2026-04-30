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
     * `as` — Specifies the type of content being loaded by the link element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case AS = 'as';

    /**
     * `autoplay` — Indicates that media should begin playback automatically when it can.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#autoplay
     */
    case AUTOPLAY = 'autoplay';

    /**
     * `blocking` — Indicates that certain operations should be blocked on the fetching of an external resource.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/style#blocking
     */
    case BLOCKING = 'blocking';

    /**
     * `charset` — Declares the document's character encoding.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta#charset
     */
    case CHARSET = 'charset';

    /**
     * `closedby` — Specifies which user actions can close a `<dialog>` element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/dialog#closedby
     */
    case CLOSEDBY = 'closedby';

    /**
     * `controls` — Indicates that browser playback controls should be displayed for media.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#controls
     */
    case CONTROLS = 'controls';

    /**
     * `controlslist` — Hints which built-in controls should be shown for media elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#controlslist
     */
    case CONTROLSLIST = 'controlslist';

    /**
     * `decoding` — Provides a hint to the browser for image decoding behavior.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/decoding
     */
    case DECODING = 'decoding';

    /**
     * `default` — Indicates the default track to enable for media playback.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/track#default
     */
    case DEFAULT = 'default';

    /**
     * `disableremoteplayback` — Disables remote playback controls and capability for media.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#disableremoteplayback
     */
    case DISABLEREMOTEPLAYBACK = 'disableremoteplayback';

    /**
     * `download` — Indicates that the hyperlink is to be used for downloading a resource.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#download
     */
    case DOWNLOAD = 'download';

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
     * `hreflang` — Indicates the language of the linked resource.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#hreflang
     */
    case HREFLANG = 'hreflang';

    /**
     * `http-equiv` — Defines a pragma directive for processing the document.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/http-equiv
     */
    case HTTP_EQUIV = 'http-equiv';

    /**
     * `imagesizes` — Specifies the image sizes for preload.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#imagesizes
     */
    case IMAGESIZES = 'imagesizes';

    /**
     * `imagesrcset` — Specifies the image srcset for preload.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#imagesrcset
     */
    case IMAGESRCSET = 'imagesrcset';

    /**
     * `kind` — Indicates how a text track should be used.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/track#kind
     */
    case KIND = 'kind';

    /**
     * `label` — Text used as a label for an option or option group.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/option#label
     */
    case LABEL = 'label';

    /**
     * `list` — Identifies a `<datalist>` element that provides predefined options to suggest to the user.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input#list
     */
    case LIST = 'list';

    /**
     * `loading` — Indicates how the browser should load the image.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#loading
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#loading
     */
    case LOADING = 'loading';

    /**
     * `loop` — Indicates that media should restart automatically after reaching the end.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#loop
     */
    case LOOP = 'loop';

    /**
     * `muted` — Indicates that media output is initially silenced.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#muted
     */
    case MUTED = 'muted';

    /**
     * `name` — Specifies the metadata name for the meta element.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name
     */
    case NAME = 'name';

    /**
     * `open` — Indicates whether the contents of the details element are visible.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/details#open
     */
    case OPEN = 'open';

    /**
     * `ping` — A space-separated list of URLs to which the browser will send POST requests when the link is followed.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#ping
     */
    case PING = 'ping';

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
     * `preload` — Provides a hint about preloading behavior for media resources.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#preload
     */
    case PRELOAD = 'preload';

    /**
     * `referrerpolicy` — Referrer information to send when fetching the resource.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#referrerpolicy
     */
    case REFERRERPOLICY = 'referrerpolicy';

    /**
     * `selected` — Indicates whether an option is initially selected.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/option#selected
     */
    case SELECTED = 'selected';

    /**
     * `sizes` — Defines the sizes of icons for visual media.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#sizes
     */
    case SIZES = 'sizes';

    /**
     * `src` — URL of embeddable content.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#src
     */
    case SRC = 'src';

    /**
     * `srclang` — Language of text track data.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/track#srclang
     */
    case SRCLANG = 'srclang';

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
     * `value` — Indicates the current ordinal value of the list item.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/li#value
     */
    case VALUE = 'value';

    /**
     * `width` — Specifies the width of certain elements.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#width
     * @link https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/width
     */
    case WIDTH = 'width';
}
