<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents standard metadata names for the HTML `name` attribute on `<meta>` elements.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#meta_names_defined_in_the_html_specification
 */
enum MetaName: string
{
    /**
     * `application-name` — The name of the web application that the page represents.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#application-name
     */
    case APPLICATION_NAME = 'application-name';

    /**
     * `author` — The name of the document's author.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#author
     */
    case AUTHOR = 'author';

    /**
     * `color-scheme` — The color scheme(s) supported by the document.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#color-scheme
     */
    case COLOR_SCHEME = 'color-scheme';

    /**
     * `creator` — The name of the creator of the document.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#creator
     */
    case CREATOR = 'creator';

    /**
     * `description` — A brief description of the document.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#description
     */
    case DESCRIPTION = 'description';

    /**
     * `generator` — The identifier of the software that generated the document.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#generator
     */
    case GENERATOR = 'generator';

    /**
     * `keywords` — A comma-separated list of keywords relevant to the document.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#keywords
     */
    case KEYWORDS = 'keywords';

    /**
     * `publisher` — The name of the publisher of the document.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#publisher
     */
    case PUBLISHER = 'publisher';

    /**
     * `referrer` — The default referrer policy for the document.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#referrer
     */
    case REFERRER = 'referrer';

    /**
     * `robots` — Instructions for web crawlers about how to index or serve the document.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#robots
     */
    case ROBOTS = 'robots';

    /**
     * `theme-color` — The suggested color that user agents should use to customize the
     * display of the page or the surrounding user interface.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#theme-color
     */
    case THEME_COLOR = 'theme-color';

    /**
     * `viewport` — The viewport metadata for the document.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/name#viewport
     */
    case VIEWPORT = 'viewport';
}
