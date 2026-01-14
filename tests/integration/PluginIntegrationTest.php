<?php

namespace tests\integration;

use Codeception\Test\Unit;
use Craft;
use wrav\simplesharing\SimpleSharing;
use wrav\simplesharing\models\Settings;

class PluginIntegrationTest extends Unit
{
    public function testPluginIsInstalled(): void
    {
        $plugin = Craft::$app->plugins->getPlugin('simple-sharing');

        $this->assertNotNull($plugin);
        $this->assertInstanceOf(SimpleSharing::class, $plugin);
    }

    public function testSettingsModelHasCorrectDefaults(): void
    {
        $plugin = SimpleSharing::getInstance();
        $settings = $plugin->getSettings();

        $this->assertInstanceOf(Settings::class, $settings);
        $this->assertIsArray($settings->allowedSections);
        $this->assertIsArray($settings->allowedPlatforms);
    }

    public function testSettingsHtmlRendersWithSections(): void
    {
        $plugin = SimpleSharing::getInstance();

        $reflection = new \ReflectionMethod($plugin, 'settingsHtml');
        $reflection->setAccessible(true);

        $html = $reflection->invoke($plugin);

        $this->assertIsString($html);
        $this->assertStringContainsString('allowedSections', $html);
        $this->assertStringContainsString('allowedPlatforms', $html);

        // Verify platform options are rendered
        $this->assertStringContainsString('Facebook', $html);
        $this->assertStringContainsString('Twitter', $html);
        $this->assertStringContainsString('LinkedIn', $html);
    }

    public function testSettingsHtmlIncludesSectionsFromCraft(): void
    {
        $sections = Craft::$app->entries->getAllSections();
        $plugin = SimpleSharing::getInstance();

        $reflection = new \ReflectionMethod($plugin, 'settingsHtml');
        $reflection->setAccessible(true);

        $html = $reflection->invoke($plugin);

        // If there are sections in the system, they should appear in the settings
        foreach ($sections as $section) {
            $this->assertStringContainsString($section->name, $html);
        }
    }
}
