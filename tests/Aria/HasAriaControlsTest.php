<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Aria;

use UIAwesome\Html\Attribute\Aria\HasAriaControls;

final class HasAriaControlsTest extends \PHPUnit\Framework\TestCase
{
    public function testGenerateAriaControls(): void
    {
        $instance = new class () {
            use HasAriaControls;

            public array $attributes = [];

            public function getAriaControls(): bool|string
            {
                return $this->ariaControls;
            }
        };

        $this->assertFalse($instance->getAriaControls());
        $this->assertEmpty($instance->attributes);

        $instance = $instance->ariaControls();

        $this->assertTrue($instance->getAriaControls());

        $instance = $instance->ariaControls('value');

        $this->assertFalse($instance->getAriaControls());
        $this->assertSame(['aria-controls' => 'value'], $instance->attributes);
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAriaControls;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->ariaControls(''));
    }
}
