<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Aria;

use UIAwesome\Html\Attribute\Aria\HasAriaDisabled;

final class HasAriaDisabledTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAriaDisabled;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->ariaDisabled(''));
    }
}
