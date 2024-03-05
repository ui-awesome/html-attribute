<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasAlt;

final class HasAltTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAlt;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->alt(''));
    }
}
