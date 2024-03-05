<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Data;

use UIAwesome\Html\{Attribute\Data\HasDataDismissTarget, Attribute\HasData};

final class HasDataDismissTargetTest extends \PHPUnit\Framework\TestCase
{
    public function testDataDismissTarget(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataDismissTarget;

            public array $attributes = [];
        };

        $instance = $instance->dataDismissTarget('value');

        $this->assertSame(['data-dismiss-target' => 'value'], $instance->attributes);
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasData;
            use HasDataDismissTarget;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dataDismissTarget(true));
    }
}
