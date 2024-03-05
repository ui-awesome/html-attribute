<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests\Aria;

use UIAwesome\Html\Attribute\Aria\HasRole;

final class HasRoleTest extends \PHPUnit\Framework\TestCase
{
    public function testGenerateRole(): void
    {
        $instance = new class () {
            use HasRole;

            public array $attributes = [];

            public function getRole(): bool|string
            {
                return $this->role;
            }
        };

        $instance = $instance->role();

        $this->assertSame(true, $instance->getRole());

        $instance = $instance->role('value');

        $this->assertFalse($instance->getRole());
        $this->assertSame(['role' => 'value'], $instance->attributes);
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasRole;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->role(''));
    }
}
