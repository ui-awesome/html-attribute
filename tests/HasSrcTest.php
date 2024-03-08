<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasSrc;

final class HasSrcTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasSrc;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->src(null));
    }
}
