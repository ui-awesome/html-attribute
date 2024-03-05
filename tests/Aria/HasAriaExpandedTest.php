<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Aria;

use UIAwesome\Html\Attribute\Aria\HasAriaExpanded;

final class HasAriaExpandedTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAriaExpanded;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->ariaExpanded(''));
    }
}
