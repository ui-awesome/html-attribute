<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasMaxLength;

final class HasMaxLengthTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasMaxLength;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->maxlength(1));
    }
}
