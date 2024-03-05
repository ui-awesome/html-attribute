<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasHeight;

final class HasHeightTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasHeight;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->height(0));
    }
}
