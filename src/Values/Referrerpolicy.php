<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents referrer policy values for the `referrerpolicy` attribute and Referrer-Policy header.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy
 * @see https://w3c.github.io/webappsec-referrer-policy/
 */
enum Referrerpolicy: string
{
    /**
     * `no-referrer` - Referer header will be omitted entirely: requests do not include any referrer information.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#no-referrer_2
     */
    case NO_REFERRER = 'no-referrer';

    /**
     * `no-referrer-when-downgrade` - Send the full referrer (origin, path and query) when the security level stays the
     * same or improves. Do not send the Referer header to less secure destinations (HTTPS → HTTP).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#no-referrer-when-downgrade
     */
    case NO_REFERRER_WHEN_DOWNGRADE = 'no-referrer-when-downgrade';

    /**
     * `origin` - Send only the origin (scheme, host and port) as the Referer header value.
     * For example, `https://example.com/`.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#origin
     */
    case ORIGIN = 'origin';

    /**
     * `origin-when-cross-origin` - Send the full referrer for same-origin requests.
     * For cross-origin requests send only the origin.
     * Also send only the origin when navigating to less secure destinations (HTTPS → HTTP).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#origin-when-cross-origin
     */
    case ORIGIN_WHEN_CROSS_ORIGIN = 'origin-when-cross-origin';

    /**
     * `same-origin` - Send the full referrer for same-origin requests.
     * Do not send the Referer header for cross-origin requests.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#same-origin
     */
    case SAME_ORIGIN = 'same-origin';

    /**
     * `strict-origin` - Send only the origin when the protocol security level stays the same (HTTPS → HTTPS).
     * Do not send the Referer header to less secure destinations (HTTPS → HTTP).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#strict-origin
     */
    case STRICT_ORIGIN = 'strict-origin';

    /**
     * `strict-origin-when-cross-origin` (default) - Send the full referrer for same-origin requests.
     * For cross-origin requests send only the origin.
     * Do not send the Referer header to less secure destinations (HTTPS → HTTP).
     * This is the default policy when none is specified or when the provided value is invalid.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#strict-origin-when-cross-origin
     */
    case STRICT_ORIGIN_WHEN_CROSS_ORIGIN = 'strict-origin-when-cross-origin';

    /**
     * `unsafe-url` - Send the full URL (origin, path and query) in all cases, regardless of security.
     * Using this policy can leak potentially-sensitive information to insecure origins.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTTP/Reference/Headers/Referrer-Policy#unsafe-url
     */
    case UNSAFE_URL = 'unsafe-url';
}
