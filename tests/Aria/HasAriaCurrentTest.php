<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Aria;

use UIAwesome\Html\Attribute\Aria\HasAriaCurrent;

final class HasAriaCurrentTest extends \PHPUnit\Framework\TestCase
{
    public function testEmptyValue(): void
    {
        $instance = new class () {
            use HasAriaCurrent;

            public array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The value must not be empty. The valid values are: "date", "false", "location", "page", "step", "time", "true".'
        );

        $instance->ariaCurrent('');
    }

    public function testInvalidValue(): void
    {
        $instance = new class () {
            use HasAriaCurrent;

            public array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid value "value" for aria-current. Allowed values are: "date", "false", "location", "page", "step", "time", "true".'
        );

        $instance->ariaCurrent('value');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAriaCurrent;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->ariaCurrent('false'));
    }
}
