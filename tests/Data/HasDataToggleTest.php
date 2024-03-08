<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Data;

use UIAwesome\Html\{Attribute\Data\HasDataToggle, Attribute\HasData};

final class HasDataToggleTest extends \PHPUnit\Framework\TestCase
{
    public function testDataDataToggle(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataToggle;

            public array $attributes = [];

            public function getDataDrawerToggle(): bool|string
            {
                return $this->dataToggle;
            }
        };

        $instance = $instance->dataToggle('value');

        $this->assertSame(['data-toggle' => 'value'], $instance->attributes);

        $instance = $instance->dataToggle();

        $this->assertTrue($instance->getDataDrawerToggle());

        $instance = $instance->dataToggle(false);

        $this->assertFalse($instance->getDataDrawerToggle());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataToggle;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataToggle(true));
    }
}
