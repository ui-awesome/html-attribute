<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl\Input;

use UIAwesome\Html\Attribute\FormControl\Input\HasPattern;

final class HasPatternTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasPattern;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->pattern(''));
    }
}
