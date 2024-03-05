<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Aria;

use UIAwesome\Html\Attribute\Aria\HasAriaDescribedBy;

final class HasAriaDescribedByTest extends \PHPUnit\Framework\TestCase
{
    public function testGenerateAriaDescribeBy(): void
    {
        $instance = new class () {
            use HasAriaDescribedBy;

            public array $attributes = [];

            public function getAriaDescribedBy(): bool|string
            {
                return $this->ariaDescribedBy;
            }
        };

        $this->assertFalse($instance->getAriaDescribedBy());
        $this->assertEmpty($instance->attributes);

        $instance = $instance->ariaDescribedBy();

        $this->assertTrue($instance->getAriaDescribedBy());

        $instance = $instance->ariaDescribedBy('value');

        $this->assertFalse($instance->getAriaDescribedBy());
        $this->assertSame(['aria-describedby' => 'value'], $instance->attributes);
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAriaDescribedBy;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->ariaDescribedBy(''));
    }
}
