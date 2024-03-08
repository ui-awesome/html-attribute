<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasId;

final class HasIdTest extends \PHPUnit\Framework\TestCase
{
    public function testGetId(): void
    {
        $instance = new class () {
            use HasId;

            public array $attributes = [];
        };

        $this->assertNull($instance->getId());
        $this->assertSame('value', $instance->id('value')->getId());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasId;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->id(''));
    }
}
