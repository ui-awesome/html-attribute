<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `http-equiv` attribute on `<meta>` elements.
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
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/http-equiv#content-security-policy
     */
    case CONTENT_SECURITY_POLICY = 'content-security-policy';

    /**
     * `content-type` — Specifies the MIME type and character encoding of the document.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/http-equiv#content-type
     */
    case CONTENT_TYPE = 'content-type';

    /**
     * `default-style` — Specifies the preferred stylesheet to use.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/http-equiv#default-style
     */
    case DEFAULT_STYLE = 'default-style';

    /**
     * `refresh` — Specifies the time in seconds to refresh the page or redirect to another page.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/http-equiv#refresh
     */
    case REFRESH = 'refresh';

    /**
     * `x-ua-compatible` — Specifies the document mode for Internet Explorer.
     *
     * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/meta/http-equiv#x-ua-compatible
     */
    case X_UA_COMPATIBLE = 'x-ua-compatible';
}
