<?php

namespace tests\unit;

use Codeception\Test\Unit;
use Craft;
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

    public function testSettingsHtmlMethodExists(): void
    {
        $reflection = new \ReflectionClass(SimpleSharing::class);

        $this->assertTrue($reflection->hasMethod('settingsHtml'));

        $method = $reflection->getMethod('settingsHtml');
        $this->assertTrue($method->isProtected());
        $this->assertEquals('string', $method->getReturnType()->getName());
    }

    public function testCreateSettingsModelMethodExists(): void
    {
        $reflection = new \ReflectionClass(SimpleSharing::class);

        $this->assertTrue($reflection->hasMethod('createSettingsModel'));

        $method = $reflection->getMethod('createSettingsModel');
        $this->assertTrue($method->isProtected());
    }

}
