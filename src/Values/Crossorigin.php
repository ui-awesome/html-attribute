<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `crossorigin` attribute.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Attributes/crossorigin
 */
enum Crossorigin: string
{
    /**
     * `anonymous` - CORS requests for this element will have the credentials flag set to 'same-origin'.
     *
     * This is the default value when the attribute is present without a value. When not specified, the resource is
     * fetched without a CORS request (i.e., without sending the Origin HTTP header).
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/crossorigin#anonymous
     */
    case ANONYMOUS = 'anonymous';

    /**
     * `use-credentials` - CORS requests for this element will have the credentials flag set to 'include'.
     *
     * This value will include credentials (cookies, authorization headers, or TLS client certificates) in CORS
     * requests.
     *
     * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Attributes/crossorigin#use-credentials
     */
    case USE_CREDENTIALS = 'use-credentials';
}
