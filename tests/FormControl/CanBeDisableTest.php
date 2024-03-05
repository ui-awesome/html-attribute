<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\CanBeDisabled;

final class CanBeDisableTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use CanBeDisabled;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->disabled());
    }

    public function testIsDisabled(): void
    {
        $instance = new class () {
            use CanBeDisabled;

            protected array $attributes = [];
        };

        $this->assertFalse($instance->isDisabled());
        $this->assertTrue($instance->disabled()->isDisabled());
    }
}
