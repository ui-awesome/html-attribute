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
enum AlertType: string
{
    /**
     * Type representing an error condition.
     */
    case ERROR = 'error';

    /**
     * Type representing informational messages.
     */
    case INFO = 'info';

    /**
     * Type representing success messages.
     */
    case SUCCESS = 'success';

    /**
     * Type representing warning messages.
     */
    case WARNING = 'warning';
}
