<?php
/**
 * SimpleSharing plugin for Craft CMS 3.x
 *
 * Simple Sharing generates social media share links within CP entry pages, allowing you to quickly & easily share entries.
 *
 * @link      https://github.com/wrav
 * @copyright Copyright (c) 2017 reganlawton
 */

namespace wrav\simplesharing;

use craft\web\View;
use wrav\simplesharing\variables\SimpleSharingVariable;
use wrav\simplesharing\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\UrlManager;
use craft\web\twig\variables\CraftVariable;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

/**
 * Class SimpleSharing
 *
 * @author    reganlawton
 * @package   SimpleSharing
 * @since     1.0.0
 *
 */
class SimpleSharing extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var SimpleSharing
     */
    public static $plugin;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(
            CraftVariable::class,
            CraftVariable::EVENT_INIT,
            function (Event $event) {
                /** @var CraftVariable $variable */
                $variable = $event->sender;
                $variable->set('simpleSharing', SimpleSharingVariable::class);
            }
        );

        Event::on(
            Plugins::class,
            Plugins::EVENT_AFTER_INSTALL_PLUGIN,
            function (PluginEvent $event) {
                if ($event->plugin === $this) {
                }
            }
        );

        Event::on(
            View::class,
            View::EVENT_END_PAGE,
            function(Event $event) {
                $url = Craft::$app->assetManager->getPublishedUrl('@wrav/simplesharing/assetbundles/simplesharing/dist/js/SimpleSharing.js', true);

                echo "<script src='$url'></script>";
            }
        );

        Craft::info(
            Craft::t(
                'simple-sharing',
                '{name} plugin loaded',
                ['name' => $this->name]
            ),
            __METHOD__
        );
    }

    // Protected Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        $sections = Craft::$app->sections->getAllSections('id');
        $optionsSections = [];

        foreach ($sections as $id => $section) {
            $optionsSections[$section->id] = $section->name;
        }

        $optionsPlatforms = [
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'google' => 'Google',
            'linkedin' => 'LinkedIn',
        ];

        return Craft::$app->view->renderTemplate(
            'simple-sharing/settings',
            [
                'settings' => $this->getSettings(),
                'optionsSections' => $optionsSections,
                'optionsPlatforms' => $optionsPlatforms,
            ]
        );
    }
}
