<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasStyle;

final class HasStyleTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasStyle;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->style(''));
    }
}
