<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Data;

use UIAwesome\Html\{Attribute\Data\HasDataBsToggle, Attribute\HasData};

final class HasDataBsToggleTest extends \PHPUnit\Framework\TestCase
{
    public function testDataBsToggle(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataBsToggle;

            public array $attributes = [];
        };

        $instance = $instance->dataBsToggle('value');

        $this->assertSame(['data-bs-toggle' => 'value'], $instance->attributes);
    }
}
