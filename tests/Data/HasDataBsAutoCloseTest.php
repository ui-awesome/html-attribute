<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Data;

use UIAwesome\Html\{Attribute\Data\HasDataBsAutoClose, Attribute\HasData};

final class HasDataBsAutoCloseTest extends \PHPUnit\Framework\TestCase
{
    public function testDataBsAutoClose(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsAutoClose;

            public array $attributes = [];
        };

        $instance = $instance->dataBsAutoClose('value');

        $this->assertSame(['data-bs-auto-close' => 'value'], $instance->attributes);
    }
}
