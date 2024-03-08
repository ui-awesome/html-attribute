<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasSize;

final class HasSizeTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasSize;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->size(0));
    }
}
