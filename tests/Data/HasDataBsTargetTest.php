<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Data;

use UIAwesome\Html\{Attribute\Data\HasDataBsTarget, Attribute\HasData};

final class HasDataBsTargetTest extends \PHPUnit\Framework\TestCase
{
    public function testDataBsTarget(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsTarget;

            public array $attributes = [];

            public function getDataBsTarget(): bool|string
            {
                return $this->dataBsTarget;
            }
        };

        $instance = $instance->dataBsTarget('value');

        $this->assertSame(['data-bs-target' => 'value'], $instance->attributes);

        $instance = $instance->dataBsTarget();

        $this->assertTrue($instance->getDataBsTarget());

        $instance = $instance->dataBsTarget(false);

        $this->assertFalse($instance->getDataBsTarget());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsTarget;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataBsTarget());
    }
}
