<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\CanBeReadonly;

final class CanBeReadonlyTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use CanBeReadonly;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->readonly());
    }

    public function testIsReadonly(): void
    {
        $instance = new class () {
            use CanBeReadonly;

            protected array $attributes = [];
        };

        $this->assertFalse($instance->isReadonly());
        $this->assertTrue($instance->readonly()->isReadonly());
    }
}
