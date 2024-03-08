<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl\Input;

use UIAwesome\Html\Attribute\FormControl\Input\CanBeChecked;

final class CanBeCheckedTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use CanBeChecked;
        };

        $this->assertNotSame($instance, $instance->checked(false));
    }

    public function testRender(): void
    {
        $instance = new class () {
            use CanBeChecked;

            public array $attributes = [];

            public function getChecked(): bool
            {
                return $this->checked;
            }
        };

        $this->assertFalse($instance->checked(false)->getChecked());
        $this->assertTrue($instance->checked(true)->getChecked());
    }
}
