<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasPlaceholder;

final class HasPlaceholderTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasPlaceholder;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->placeholder(''));
    }
}
