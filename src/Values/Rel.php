<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents standardized relationship types for the HTML `rel` attribute.
 *
 * Provides a type-safe, standards-compliant set of relationship tokens for use in link, anchor, area, and form
 * elements, ensuring technical consistency with the HTML specification and IANA link relation registry.
 *
 * Key features:
 * - Designed for use in tags, components, and helpers requiring relationship assignment via the `rel` attribute.
 * - Integration-ready for tag rendering and element generation APIs.
 * - Strict mapping of relationship types for semantic markup generation and interoperability.
 * - Values follow the HTML Living Standard and IANA link relation registry.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel
 * @link https://www.iana.org/assignments/link-relations/link-relations.xhtml
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Rel: string
{
    /**
     * `alternate` — Indicates an alternate representation of the current document (for example: translated versions,
     * alternate formats, or alternate stylesheets when used with the `stylesheet` keyword).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#alternate
     */
    case ALTERNATE = 'alternate';

    /**
     * `apple-touch-icon` — Non-standard (Apple) — Icon used by iOS for Web Clips / home-screen icons.
     * Non-standard: provided for completeness only.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#non-standard-values
     */
    case APPLE_TOUCH_ICON = 'apple-touch-icon';

    /**
     * `apple-touch-startup-image` — Non-standard (Apple) — Startup image for iOS Web Apps.
     * Non-standard: provided for completeness only.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#non-standard-values
     */
    case APPLE_TOUCH_STARTUP_IMAGE = 'apple-touch-startup-image';

    /**
     * `author` — Referenced resource provides information about the author of the current document or article.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#author
     */
    case AUTHOR = 'author';

    /**
     * `bookmark` — A permalink for the nearest ancestor article or for the section the link is associated with.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#bookmark
     */
    case BOOKMARK = 'bookmark';

    /**
     * `canonical` — The preferred URL for the current document (used by search engines to reduce duplicate content).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#canonical
     */
    case CANONICAL = 'canonical';

    /**
     * `compression-dictionary` (Experimental) — Link to a compression dictionary that can be used to compress future
     * downloads for resources on this site.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#compression-dictionary
     */
    case COMPRESSION_DICTIONARY = 'compression-dictionary';

    /**
     * `dns-prefetch` — Hint to the user agent to preemptively perform DNS resolution for the target resource's origin
     * to reduce latency.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#dns-prefetch
     */
    case DNS_PREFETCH = 'dns-prefetch';

    /**
     * `expect` (Experimental) — When used with `blocking="render"`, allows the page to be render-blocked until
     * essential parts are parsed for consistent rendering.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#expect
     */
    case EXPECT = 'expect';

    /**
     * `external` — Indicates the referenced document is not part of the same site as the current document (useful to
     * style external links).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#external
     */
    case EXTERNAL = 'external';

    /**
     * `help` — Link to context-sensitive help related to the element or document.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#help
     */
    case HELP = 'help';

    /**
     * `icon` — Linked resource represents an icon for the current document (commonly used for favicons).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#icon
     */
    case ICON = 'icon';

    /**
     * `license` — Indicates the referenced document describes the licensing information that covers the main content of
     * the current document.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#license
     */
    case LICENSE = 'license';

    /**
     * `manifest` — Points to a Web App Manifest describing the web application's metadata.
     * Cross-origin fetching requires CORS.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#manifest
     */
    case MANIFEST = 'manifest';

    /**
     * `me` — Indicates that the current document represents the person who owns the linked content (commonly used for
     * identity links).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#me
     */
    case ME = 'me';

    /**
     * `modulepreload` — Preloads a module and stores it in the document's module map for later evaluation (improves
     * module loading performance).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#modulepreload
     */
    case MODULEPRELOAD = 'modulepreload';

    /**
     * `next` — Indicates the next resource in a series (useful for paginated content and as a resource hint when used
     * on `<link>`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#next
     */
    case NEXT = 'next';

    /**
     * `nofollow` — Instructs search engines not to follow or endorse the link.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#nofollow
     */
    case NOFOLLOW = 'nofollow';

    /**
     * `noopener` — Ensures a new browsing context does not have access to the `window.opener` of the originating page
     * (security measure when using `target="_blank"`).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#noopener
     */
    case NOOPENER = 'noopener';

    /**
     * `noreferrer` — Prevents sending the Referer header and implies `noopener`.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#noreferrer
     */
    case NOREFERRER = 'noreferrer';

    /**
     * `opener` — The opposite of `noopener`: allows the opened context to have a reference to the opener.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#opener
     */
    case OPENER = 'opener';

    /**
     * `pingback` — Address of the pingback server for the current document.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#pingback
     */
    case PINGBACK = 'pingback';

    /**
     * `preconnect` — Hint to open a connection to the target origin in advance to reduce latency.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#preconnect
     */
    case PRECONNECT = 'preconnect';

    /**
     * `prefetch` — Suggests the user agent preemptively fetch and cache the target resource for a likely future
     * navigation.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#prefetch
     */
    case PREFETCH = 'prefetch';

    /**
     * `preload` — Instructs the user agent to preemptively fetch a resource for the current navigation according to the
     * `as` attribute.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#preload
     */
    case PRELOAD = 'preload';

    /**
     * `prerender` (Deprecated / Non-standard) — Previously used to prefetch and process a resource for faster future
     * navigation.
     * Superseded by newer APIs (Speculation Rules API).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#prerender
     */
    case PRERENDER = 'prerender';

    /**
     * `prev` — Indicates the previous resource in a series (useful for paginated content).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#prev
     */
    case PREV = 'prev';

    /**
     * `privacy-policy` — Points to the document describing the privacy practices that apply to the current document.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#privacy-policy
     */
    case PRIVACY_POLICY = 'privacy-policy';

    /**
     * `search` — Links to a resource that provides search capabilities for the current site or document (for example
     * OpenSearch descriptions).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#search
     */
    case SEARCH = 'search';

    /**
     * `shortcut` — Obsolete / non-conforming synonym historically seen before `icon`.
     * Must not be used in new projects.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#icon
     */
    case SHORTCUT = 'shortcut';

    /**
     * `stylesheet` — Imports an external stylesheet.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#stylesheet
     */
    case STYLESHEET = 'stylesheet';

    /**
     * `tag` — Gives a tag (identified by the address) that applies to the current document.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#tag
     */
    case TAG = 'tag';

    /**
     * `terms-of-service` — Links to the Terms of Service for the content or site.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/rel#terms-of-service
     */
    case TERMS_OF_SERVICE = 'terms-of-service';
}
