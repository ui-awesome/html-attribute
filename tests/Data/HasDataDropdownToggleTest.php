<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Data;

use UIAwesome\Html\{Attribute\Data\HasDataDropdownToggle, Attribute\HasData};

final class HasDataDropdownToggleTest extends \PHPUnit\Framework\TestCase
{
    public function testDataDropdownToggle(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataDropdownToggle;

            public array $attributes = [];

            public function getDataDropdownToggle(): bool|string
            {
                return $this->dataDropdownToggle;
            }
        };

        $instance = $instance->dataDropdownToggle('value');

        $this->assertSame(['data-dropdown-toggle' => 'value'], $instance->attributes);

        $instance = $instance->dataDropdownToggle();

        $this->assertTrue($instance->getDataDropdownToggle());

        $instance = $instance->dataDropdownToggle(false);

        $this->assertFalse($instance->getDataDropdownToggle());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataDropdownToggle;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataDropdownToggle(true));
    }
}
