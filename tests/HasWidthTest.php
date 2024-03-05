<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasWidth;

final class HasWidthTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasWidth;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->width(0));
    }
}
