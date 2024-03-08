<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasName;

final class HasNameTest extends \PHPUnit\Framework\TestCase
{
    public function testGetName(): void
    {
        $instance = new class () {
            use HasName;

            public array $attributes = [];
        };

        $this->assertEmpty($instance->getName());
        $this->assertSame($instance, $instance->name(''));
        $this->assertSame('value', $instance->name('value')->getName());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasName;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->name('value'));
    }
}
