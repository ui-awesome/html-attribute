<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasMax;

final class HasMaxTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasMax;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->max(0));
    }
}
