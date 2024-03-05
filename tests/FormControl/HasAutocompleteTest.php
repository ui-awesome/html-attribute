<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasAutocomplete;

final class HasAutocompleteTest extends \PHPUnit\Framework\TestCase
{
    public function testAutocomplete(): void
    {
        $instance = new class () {
            use HasAutocomplete;

            protected array $attributes = [];

            public function getAttributes(): array
            {
                return $this->attributes;
            }
        };

        $instance = $instance->autocomplete('off');

        $this->assertSame(['autocomplete' => 'off'], $instance->getAttributes());

        $instance = $instance->autocomplete('on');

        $this->assertSame(['autocomplete' => 'on'], $instance->getAttributes());
    }

    public function testException(): void
    {
        $instance = new class () {
            use HasAutocomplete;

            protected array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('Autocomplete must be "on" or "off".');

        $instance->autocomplete('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAutocomplete;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->autocomplete('on'));
    }
}
