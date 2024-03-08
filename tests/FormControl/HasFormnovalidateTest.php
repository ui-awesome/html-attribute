<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasFormnovalidate;

final class HasFormnovalidateTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFormnovalidate;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->formnovalidate());
    }

    public function testIsFormnovalidate(): void
    {
        $instance = new class () {
            use HasFormnovalidate;

            public array $attributes = [];
        };

        $this->assertFalse($instance->isFormnovalidate());
        $this->assertTrue($instance->formnovalidate()->isFormnovalidate());
    }
}
