<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasTabindex;

final class HasTabindexTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTabindex;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->tabindex(0));
    }
}
