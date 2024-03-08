<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\CanBeRequired;

final class CanBeRequiredTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use CanBeRequired;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->required());
    }

    public function testIsRequired(): void
    {
        $instance = new class () {
            use CanBeRequired;

            public array $attributes = [];
        };

        $this->assertFalse($instance->isRequired());
        $this->assertTrue($instance->required()->isRequired());
    }
}
