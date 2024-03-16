<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Data;

use UIAwesome\Html\{Attribute\Data\HasDataBsDismiss, Attribute\HasData};

final class HasDataBsDismissTest extends \PHPUnit\Framework\TestCase
{
    public function testDataBsDismiss(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsDismiss;

            public array $attributes = [];

            public function getDataBsDismiss(): bool|string
            {
                return $this->dataBsDismiss;
            }
        };

        $instance = $instance->dataBsDismiss('value');

        $this->assertSame(['data-bs-dismiss' => 'value'], $instance->attributes);

        $instance = $instance->dataBsDismiss();

        $this->assertTrue($instance->getDataBsDismiss());

        $instance = $instance->dataBsDismiss(false);

        $this->assertFalse($instance->getDataBsDismiss());
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsDismiss;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataBsDismiss());
    }
}
