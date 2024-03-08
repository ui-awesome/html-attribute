<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasFormmethod;

final class HasFormmethodTest extends \PHPUnit\Framework\TestCase
{
    public function testEmptyValue(): void
    {
        $instance = new class () {
            use HasFormmethod;

            public array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The value must not be empty. The valid values are: "GET", "POST".'
        );

        $instance->formmethod('');
    }

    public function testInvalidValue(): void
    {
        $instance = new class () {
            use HasFormmethod;

            public array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid value "VALUE" for the formmethod attribute. Allowed values are: "GET", "POST".'
        );

        $instance->formmethod('value');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFormmethod;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->formmethod('get'));
    }
}
