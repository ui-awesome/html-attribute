<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl\Input;

use UIAwesome\Html\Attribute\FormControl\Input\HasStep;

final class HasStepTest extends \PHPUnit\Framework\TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasStep;

            protected array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The value must be a number.');

        $instance->step('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasStep;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->step(1));
    }
}
