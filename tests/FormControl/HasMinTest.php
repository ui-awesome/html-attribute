<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasMin;

final class HasMinTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasMin;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->min(0));
    }
}
