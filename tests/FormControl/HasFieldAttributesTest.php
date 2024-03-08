<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasFieldAttributes;

final class HasFieldAttributesTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasFieldAttributes;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->fieldAttributes('FormModel', 'property'));
    }
}
