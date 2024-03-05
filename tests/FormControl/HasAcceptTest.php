<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\FormControl;

use UIAwesome\Html\Attribute\FormControl\HasAccept;

final class HasAcceptTest extends \PHPUnit\Framework\TestCase
{
    public function testImmutability(): void
    {
        $instance = new class () {
            use HasAccept;

            protected array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->accept(''));
    }
}
