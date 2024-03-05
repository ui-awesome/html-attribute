<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\CanBeHidden;

final class CanBeHiddenTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use CanBeHidden;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->hidden());
    }

    public function testRender(): void
    {
        $instance = new class () {
            use CanBeHidden;

            protected array $attributes = [];

            public function getHidden(): bool
            {
                return $this->attributes['hidden'] ?? false;
            }
        };

        $this->assertFalse($instance->getHidden());
        $this->assertTrue($instance->hidden()->getHidden());
    }
}
