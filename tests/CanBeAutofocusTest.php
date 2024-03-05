<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\CanBeAutofocus;

final class CanBeAutofocusTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use CanBeAutofocus;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->autofocus());
    }

    public function testRender(): void
    {
        $instance = new class () {
            use CanBeAutofocus;

            protected array $attributes = [];

            public function getAutofocus(): bool
            {
                return $this->attributes['autofocus'] ?? false;
            }
        };

        $this->assertFalse($instance->getAutofocus());
        $this->assertTrue($instance->autofocus()->getAutofocus());
    }
}
