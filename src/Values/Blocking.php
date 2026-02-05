<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `blocking` attribute on `<link>`, `<script>`, and `<style>` elements.
 *
 * @link https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/style#blocking
 *
 * @copyright Copyright (C) 2026 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum Blocking: string
{
    /**
     * `render` — Blocks rendering until the resource is fetched.
     */
    case RENDER = 'render';
}
