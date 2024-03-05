<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Aria;

use UIAwesome\Html\Attribute\Aria\HasAriaLabel;

final class HasAriaLabelTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAriaLabel;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->ariaLabel(''));
    }
}
