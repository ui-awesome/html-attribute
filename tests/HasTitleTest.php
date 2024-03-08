<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasTitle;

final class HasTitleTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasTitle;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->title(''));
    }
}
