<?php

declare(strict_types=1);

namespace UIAwesome\Html\Attribute\Tests;

use UIAwesome\Html\Attribute\HasRel;

final class HasRelTest extends \PHPUnit\Framework\TestCase
{
    public function testEmptyValue(): void
    {
        $instance = new class () {
            use HasRel;

            public array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'The value must not be empty. The valid values are: "alternate", "author", "bookmark", "help", "icon", "license", "next", "nofollow", "noopener", "noreferrer", "pingback", "preconnect", "prefetch", "preload", "prerender", "prev", "search", "sidebar", "stylesheet", "tag".'
        );

        $instance->rel('');
    }

    public function testInvalidValue(): void
    {
        $instance = new class () {
            use HasRel;

            public array $attributes = [];
        };

        $this->expectException(\InvalidArgumentException::class);
        $this->expectExceptionMessage(
            'Invalid value "value" for the rel attribute. Allowed values are: "alternate", "author", "bookmark", "help", "icon", "license", "next", "nofollow", "noopener", "noreferrer", "pingback", "preconnect", "prefetch", "preload", "prerender", "prev", "search", "sidebar", "stylesheet", "tag".'
        );

        $instance->rel('value');
    }

    public function testImmutability(): void
    {
        $instance = new class () {
            use HasRel;

            public array $attributes = [];
        };

        $this->assertNotSame($instance, $instance->rel('alternate'));
    }
}
