<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasFormtarget;

final class HasFormtargetTest extends \PHPUnit\Framework\TestCase
{
    public function testEmptyValue(): void
    {
        $instance = new class () {
            use HasFormtarget;

            public array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The value must not be empty. The valid values are: "_blank", "_self", "_parent", "_top".'
        );

        $instance->formtarget('');
    }

    public function testInvalidValue(): void
    {
        $instance = new class () {
            use HasFormtarget;

            public array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid value "value" for the formtarget attribute. Allowed values are: "_blank", "_self", "_parent", "_top".'
        );

        $instance->formtarget('value');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFormtarget;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->formtarget('_blank'));
    }
}
