<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasType;

final class HasTypeTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasType;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->type(''));
    }
}
