<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasFormenctype;

final class HasFormenctypeTest extends \PHPUnit\Framework\TestCase
{
    public function testEmptyValue(): void
    {
        $instance = new class () {
            use HasFormenctype;

            public array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The value must not be empty. The valid values are: "application/x-www-form-urlencoded", "multipart/form-data", "text/plain".'
        );

        $instance->formenctype('');
    }

    public function testFormenctype(): void
    {
        $instance = new class () {
            use HasFormenctype;

            public array $attributes = [];

            public function getFormenctype(): string
            {
                return $this->attributes['formenctype'] ?? '';
            }
        };

        $this->assertSame('', $instance->getFormenctype());
        $this->assertSame(
            'application/x-www-form-urlencoded',
            $instance->formenctype('application/x-www-form-urlencoded')->getFormenctype(),
        );
        $this->assertSame(
            'multipart/form-data',
            $instance->formenctype('multipart/form-data')->getFormenctype(),
        );
        $this->assertSame(
            'text/plain',
            $instance->formenctype('text/plain')->getFormenctype(),
        );
    }

    public function testInvalidValue(): void
    {
        $instance = new class () {
            use HasFormenctype;

            public array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid value "invalid" for the formenctype attribute. Allowed values are: "application/x-www-form-urlencoded", "multipart/form-data", "text/plain".'
        );

        $instance->formenctype('invalid');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFormenctype;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->formenctype('text/plain'));
    }
}
