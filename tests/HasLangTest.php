<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasLang;

final class HasLangTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasLang;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->lang(''));
    }
}
