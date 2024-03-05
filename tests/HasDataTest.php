<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\{Attribute\Data\DataAttributeValues, Attribute\HasData};

final class HasDataTest extends \PHPUnit\Framework\TestCase
{
    public function testClosure(): void
    {
        $instance = new class () {
            use HasData;

            public array $attributes = [];
        };

        $closure = fn() => 'test-action';
        $instance = $instance->dataAttributes([DataAttributeValues::ACTION => $closure]);

        $this->assertSame(['data-action' => $closure], $instance->attributes);
    }

    public function testExceptionKey(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The data attribute key must be a string and the value must be a string or a Closure.',
        );

        $instance = new class () {
            use HasData;

            protected array $attributes = [];
        };

        $instance->dataAttributes([
            1 => '',
        ]);
    }

    public function testExceptionValue(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The data attribute key must be a string and the value must be a string or a Closure.',
        );

        $instance = new class () {
            use HasData;

            protected array $attributes = [];
        };

        $instance->dataAttributes([
            '' => 1,
        ]);
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataAttributes([DataAttributeValues::ACTION => 'test-action']));
    }
}
