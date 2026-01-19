<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Support\Stub\Values;

/**
 * Stub enum for tests.
 *
 * Provides deterministic values required by the test suite.
 *
 * @copyright Copyright (C) 2025 Terabytesoftw.
 * @license https://opensource.org/license/bsd-3-clause BSD 3-Clause License.
 */
enum ButtonSize: string
{
    /**
     * Size representing large buttons.
     */
    case LARGE = 'lg';

    /**
     * Size representing medium buttons.
     */
    case MEDIUM = 'md';

    /**
     * Size representing small buttons.
     */
    case SMALL = 'sm';
}
