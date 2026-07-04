<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents element-specific attribute names.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element
 */
enum ElementAttribute: string
{
    /**
     * `alt` — Alternative text in case an image can't be displayed.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#alt
     */
    case ALT = 'alt';

    /**
     * `as` — Specifies the type of content being loaded by the link element.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#as
     */
    case AS = 'as';

    /**
     * `autoplay` — Indicates that media should begin playback automatically when it can.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#autoplay
     */
    case AUTOPLAY = 'autoplay';

    /**
     * `blocking` — Indicates that certain operations should be blocked on the fetching of an external resource.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/style#blocking
     */
    case BLOCKING = 'blocking';

    /**
     * `charset` — Declares the document's character encoding.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta#charset
     */
    case CHARSET = 'charset';

    /**
     * `closedby` — Specifies which user actions can close a `<dialog>` element.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/dialog#closedby
     */
    case CLOSEDBY = 'closedby';

    /**
     * `controls` — Indicates that browser playback controls should be displayed for media.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#controls
     */
    case CONTROLS = 'controls';

    /**
     * `controlslist` — Hints which built-in controls should be shown for media elements.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#controlslist
     */
    case CONTROLSLIST = 'controlslist';

    /**
     * `decoding` — Provides a hint to the browser for image decoding behavior.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/decoding
     */
    case DECODING = 'decoding';

    /**
     * `default` — Indicates the default track to enable for media playback.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/track#default
     */
    case DEFAULT = 'default';

    /**
     * `disableremoteplayback` — Disables remote playback controls and capability for media.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#disableremoteplayback
     */
    case DISABLEREMOTEPLAYBACK = 'disableremoteplayback';

    /**
     * `download` — Indicates that the hyperlink is to be used for downloading a resource.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#download
     */
    case DOWNLOAD = 'download';

    /**
     * `height` — Specifies the height of certain elements.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#height
     * @see https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/height
     */
    case HEIGHT = 'height';

    /**
     * `href` — The URL of a linked resource.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/a#href
     * @see https://developer.mozilla.org/en-US/docs/Web/SVG/Attribute/href
     */
    case HREF = 'href';

    /**
     * `hreflang` — Indicates the language of the linked resource.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#hreflang
     */
    case HREFLANG = 'hreflang';

    /**
     * `http-equiv` — Defines a pragma directive for processing the document.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/http-equiv
     */
    case HTTP_EQUIV = 'http-equiv';

    /**
     * `imagesizes` — Specifies the image sizes for preload.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#imagesizes
     */
    case IMAGESIZES = 'imagesizes';

    /**
     * `imagesrcset` — Specifies the image srcset for preload.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#imagesrcset
     */
    case IMAGESRCSET = 'imagesrcset';

    /**
     * `kind` — Indicates how a text track should be used.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/track#kind
     */
    case KIND = 'kind';

    /**
     * `label` — Text used as a label for an option or option group.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/option#label
     */
    case LABEL = 'label';

    /**
     * `list` — Identifies a `<datalist>` element that provides predefined options to suggest to the user.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/input#list
     */
    case LIST = 'list';

    /**
     * `loading` — Indicates how the browser should load the image.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/iframe#loading
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#loading
     */
    case LOADING = 'loading';

    /**
     * `loop` — Indicates that media should restart automatically after reaching the end.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#loop
     */
    case LOOP = 'loop';

    /**
     * `muted` — Indicates that media output is initially silenced.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#muted
     */
    case MUTED = 'muted';

    /**
     * `name` — Specifies the metadata name for the meta element.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name
     */
    case NAME = 'name';

    /**
     * `open` — Indicates whether the contents of the details element are visible.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/details#open
     */
    case OPEN = 'open';

    /**
     * `ping` — A space-separated list of URLs to which the browser will send POST requests when the link is followed.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#ping
     */
    case PING = 'ping';

    /**
     * `popovertarget` — Identifies the popover element that is associated with the current element.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#popovertarget
     */
    case POPOVERTARGET = 'popovertarget';

    /**
     * `popovertargetaction` — Defines the action to be performed on the popover element when the current element is activated.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/button#popovertargetaction
     */
    case POPOVERTARGETACTION = 'popovertargetaction';

    /**
     * `preload` — Provides a hint about preloading behavior for media resources.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/audio#preload
     */
    case PRELOAD = 'preload';

    /**
     * `referrerpolicy` — Referrer information to send when fetching the resource.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/a#referrerpolicy
     */
    case REFERRERPOLICY = 'referrerpolicy';

    /**
     * `selected` — Indicates whether an option is initially selected.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/option#selected
     */
    case SELECTED = 'selected';

    /**
     * `sizes` — Defines the sizes of icons for visual media.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/link#sizes
     */
    case SIZES = 'sizes';

    /**
     * `src` — URL of embeddable content.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#src
     */
    case SRC = 'src';

    /**
     * `srclang` — Language of text track data.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/track#srclang
     */
    case SRCLANG = 'srclang';

    /**
     * `srcset` — Defines a set of images for the browser to choose from.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Element/picture#srcset
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#srcset
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/source#srcset
     */
    case SRCSET = 'srcset';

    /**
     * `usemap` — Associates the image with a `<map>` element.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#usemap
     */
    case USEMAP = 'usemap';

    /**
     * `value` — Indicates the current ordinal value of the list item.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/li#value
     */
    case VALUE = 'value';

    /**
     * `width` — Specifies the width of certain elements.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/img#width
     * @see https://developer.mozilla.org/en-US/docs/Web/SVG/Reference/Attribute/width
     */
    case WIDTH = 'width';
}
