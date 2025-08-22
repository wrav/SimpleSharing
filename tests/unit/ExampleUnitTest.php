<?php

namespace SimpleSharing\Tests\Unit;

use Codeception\Test\Unit;
use wrav\simplesharing\SimpleSharing;

class PluginTest extends Unit
{
    public function testPluginClassExists(): void
    {
        $this->assertTrue(class_exists(SimpleSharing::class));
    }

    public function testPluginExtendsBasePlugin(): void
    {
        $reflection = new \ReflectionClass(SimpleSharing::class);
        $this->assertTrue($reflection->isSubclassOf(\craft\base\Plugin::class));
    }
}
