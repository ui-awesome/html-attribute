<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Data;

use UIAwesome\Html\{Attribute\Data\HasDataBsAutoClose, Attribute\HasData};

final class HasDataBsAutoCloseTest extends \PHPUnit\Framework\TestCase
{
    public function testDataBsTarget(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsAutoClose;

            public array $attributes = [];

            public function getDataBsAutoClose(): bool|string
            {
                return $this->dataBsAutoClose;
            }
        };

        $instance = $instance->dataBsAutoClose('value');

        $this->assertSame(['data-bs-auto-close' => 'value'], $instance->attributes);

        $instance = $instance->dataBsAutoClose();

        $this->assertTrue($instance->getDataBsAutoClose());

        $instance = $instance->dataBsAutoClose(false);

        $this->assertFalse($instance->getDataBsAutoClose());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsAutoClose;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataBsAutoClose());
    }
}
