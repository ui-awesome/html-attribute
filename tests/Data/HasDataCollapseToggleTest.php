<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Data;

use UIAwesome\Html\{Attribute\Data\HasDataCollapseToggle, Attribute\HasData};

final class HasDataCollapseToggleTest extends \PHPUnit\Framework\TestCase
{
    public function testDataCollapseToggle(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataCollapseToggle;

            public array $attributes = [];
        };

        $instance = $instance->dataCollapseToggle('value');

        $this->assertSame(['data-collapse-toggle' => 'value'], $instance->attributes);
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataCollapseToggle;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataCollapseToggle(''));
    }
}
