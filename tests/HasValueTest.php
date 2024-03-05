<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasValue;

final class HasValueTest extends \PHPUnit\Framework\TestCase
{
    public function testGetValue(): void
    {
        $instance = new class () {
            use HasValue;

            protected array $attributes = [
                'value' => 'foo',
            ];
        };

        $this->assertSame('foo', $instance->getValue());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasValue;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->value(null));
    }
}
