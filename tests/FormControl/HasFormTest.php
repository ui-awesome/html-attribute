<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasForm;

final class HasFormTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasForm;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->form(''));
    }
}
