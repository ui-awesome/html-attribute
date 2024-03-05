<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Data;

use UIAwesome\Html\{Attribute\Data\HasDataDrawerTarget, Attribute\HasData};

final class HasDataDrawerTargetTest extends \PHPUnit\Framework\TestCase
{
    public function testDataDrawerTarget(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataDrawerTarget;

            public array $attributes = [];
        };

        $instance = $instance->dataDrawerTarget('value');

        $this->assertSame(['data-drawer-target' => 'value'], $instance->attributes);
    }

    public function testDataDrawerTargetWithTrue(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataDrawerTarget;

            public array $attributes = [];

            public function getDataDrawerTarget(): bool|string
            {
                return $this->dataDrawerTarget;
            }
        };

        $instance = $instance->dataDrawerTarget(true);

        $this->assertTrue($instance->getDataDrawerTarget());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataDrawerTarget;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataDrawerTarget(true));
    }
}
