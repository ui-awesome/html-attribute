<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasFormaction;

final class HasFormactionTest extends \PHPUnit\Framework\TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasFormaction;

            public array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The formaction attribute must be empty.');

        $instance->formaction('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFormaction;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->formaction('index'));
    }
}
