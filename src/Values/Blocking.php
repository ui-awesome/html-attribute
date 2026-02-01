<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `blocking` attribute on `<link>`, `<script>`, and `<style>` elements.
 *
 * Defines the supported `blocking` tokens as enum cases.
 *
 * Key features.
 * - Designed for use in link, script, and style elements.
 * - Enum values map to the attribute tokens used in markup.
 * - Suitable for rendering HTML attributes in view helpers and components.
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
