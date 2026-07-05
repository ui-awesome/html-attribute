<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Values;

/**
 * Represents values for the HTML `blocking` attribute on `<link>`, `<script>`, and `<style>` elements.
 *
 * @see https://developer.mozilla.org/en-US/docs/Web/HTML/Reference/Elements/style#blocking
 */
enum Blocking: string
{
    /**
     * `render` — Blocks rendering until the resource is fetched.
     */
    case RENDER = 'render';
}
