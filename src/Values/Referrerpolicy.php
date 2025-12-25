<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents standardized referrer policy values for the HTTP `Referrer-Policy` header and the HTML `referrerpolicy`
 * attribute.
 *
 * Provides a type-safe set of policy tokens and concise documentation aligned with the MDN reference and the Referrer
 * Policy specification.
 *
 * Key features.
 * - Designed for use in headers, attributes and helpers that need an explicit referrer policy.
 * - Suitable for rendering HTTP headers or HTML attributes in view helpers and components.
 * - Values follow the Referrer Policy tokens listed in the MDN documentation.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy
 * @link https://w3c.github.io/webappsec-referrer-policy/
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Referrerpolicy: string
{
    /**
     * `no-referrer` - Referer header will be omitted entirely: requests do not include any referrer information.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#directives
     */
    case NO_REFERRER = 'no-referrer';

    /**
     * `no-referrer-when-downgrade` - Send the full referrer (origin, path and query) when the security level stays the
     * same or improves. Do not send the Referer header to less secure destinations (HTTPS → HTTP).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#directives
     */
    case NO_REFERRER_WHEN_DOWNGRADE = 'no-referrer-when-downgrade';

    /**
     * `origin` - Send only the origin (scheme, host and port) as the Referer header value.
     * For example, `https://example.com/`.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#directives
     */
    case ORIGIN = 'origin';

    /**
     * `origin-when-cross-origin` - Send the full referrer for same-origin requests.
     * For cross-origin requests send only the origin.
     * Also send only the origin when navigating to less secure destinations (HTTPS → HTTP).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#directives
     */
    case ORIGIN_WHEN_CROSS_ORIGIN = 'origin-when-cross-origin';

    /**
     * `same-origin` - Send the full referrer for same-origin requests.
     * Do not send the Referer header for cross-origin requests.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#directives
     */
    case SAME_ORIGIN = 'same-origin';

    /**
     * `strict-origin` - Send only the origin when the protocol security level stays the same (HTTPS → HTTPS).
     * Do not send the Referer header to less secure destinations (HTTPS → HTTP).
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#directives
     */
    case STRICT_ORIGIN = 'strict-origin';

    /**
     * `strict-origin-when-cross-origin` (default) - Send the full referrer for same-origin requests.
     * For cross-origin requests send only the origin.
     * Do not send the Referer header to less secure destinations (HTTPS → HTTP).
     * This is the default policy when none is specified or when the provided value is invalid.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#directives
     */
    case STRICT_ORIGIN_WHEN_CROSS_ORIGIN = 'strict-origin-when-cross-origin';

    /**
     * `unsafe-url` - Send the full URL (origin, path and query) in all cases, regardless of security.
     * Using this policy can leak potentially-sensitive information to insecure origins.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#directives
     */
    case UNSAFE_URL = 'unsafe-url';
}
