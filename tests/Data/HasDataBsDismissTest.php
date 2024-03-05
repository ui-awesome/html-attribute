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
        };

        $instance = $instance->dataBsDismiss('value');

        $this->assertSame(['data-bs-dismiss' => 'value'], $instance->attributes);
    }
}
