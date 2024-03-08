<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\CanBeMultiple;

final class CanBeMultipleTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use CanBeMultiple;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->multiple());
    }

    public function testIsMultiple(): void
    {
        $instance = new class () {
            use CanBeMultiple;

            public array $attributes = [];
        };

        $this->assertFalse($instance->isMultiple());
        $this->assertTrue($instance->multiple()->isMultiple());
    }
}
