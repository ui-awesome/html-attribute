<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasDirname;

final class HasDirnameTest extends \PHPUnit\Framework\TestCase
{
    public function testException(): void
    {
        $instance = new class () {
            use HasDirname;

            public array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage('The value cannot be empty.');

        $instance->dirname('');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasDirname;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->dirname('test'));
    }
}
