<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasMinLength;

final class HasMinLengthTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasMinLength;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->minlength(0));
    }
}
