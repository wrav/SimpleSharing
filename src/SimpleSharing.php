<?php
/**
 * SimpleSharing plugin for Craft CMS 4.x
 *
 * Simple Sharing generates social media share links within CP entry pages, allowing you to quickly & easily share entries.
 *
 * @link      https://github.com/wrav
 * @copyright Copyright (c) 2017 reganlawton
 */

namespace wrav\simplesharing;

use craft\base\Model;
use craft\web\View;
use wrav\simplesharing\variables\SimpleSharingVariable;
use wrav\simplesharing\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\twig\variables\CraftVariable;

use yii\base\Event;
use yii\base\View as ViewAlias;

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
    public static SimpleSharing $plugin;

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
            View::class,
            ViewAlias::EVENT_END_PAGE,
            function() {
                if (Craft::$app->getRequest()->getIsCpRequest()) {
                    $url = Craft::$app->assetManager->getPublishedUrl('@wrav/simplesharing/assetbundles/simplesharing/dist/js/SimpleSharing.js', true);
                    echo "<script src='$url'></script>";
                }
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
    protected function createSettingsModel(): ?Model
    {
        return new Settings();
    }

    /**
     * @inheritdoc
     */
    protected function settingsHtml(): string
    {
        $sections = Craft::$app->sections->getAllSections();
        $optionsSections = [];

        foreach ($sections as $section) {
            $optionsSections[$section->id] = $section->name;
        }

        $optionsPlatforms = [
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            'linkedin' => 'LinkedIn',
            //'pinterest' => 'Pinterest',
            'mix' => 'Mix',
            'tumblr' => 'Tumblr',
            'reddit' => 'Reddit',
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
