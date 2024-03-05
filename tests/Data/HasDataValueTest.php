<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Data;

use UIAwesome\Html\Attribute\Data\HasDataValue;

final class HasDataValueTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasDataValue;
        };

        $this->assertNotSame($instance, $instance->dataValue(''));
    }
}
