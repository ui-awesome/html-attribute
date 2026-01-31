<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `http-equiv` attribute.
 *
 * Defines the supported `http-equiv` tokens as enum cases. The `http-equiv` attribute defines a pragma directive, which
 * are instructions for the browser for processing the document.
 *
 * Key features.
 * - Enum values map to pragma directive tokens as `string` values.
 * - Used with meta elements to simulate HTTP headers.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/http-equiv
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum HttpEquiv: string
{
    /**
     * `content-security-policy` — Specifies the content security policy for the document.
     */
    case CONTENT_SECURITY_POLICY = 'content-security-policy';

    /**
     * `content-type` — Specifies the MIME type and character encoding of the document.
     */
    case CONTENT_TYPE = 'content-type';

    /**
     * `default-style` — Specifies the preferred stylesheet to use.
     */
    case DEFAULT_STYLE = 'default-style';

    /**
     * `refresh` — Specifies the time in seconds to refresh the page or redirect to another page.
     */
    case REFRESH = 'refresh';

    /**
     * `x-ua-compatible` — Specifies the document mode for Internet Explorer.
     */
    case X_UA_COMPATIBLE = 'x-ua-compatible';
}
