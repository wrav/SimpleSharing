<?php
/**
 * SimpleSharing plugin for Craft CMS 3.x
 *
 * Simple Sharing generates social media share links within CP entry pages, allowing you to quickly & easily share entries.
 *
 * @link      https://github.com/wrav
 * @copyright Copyright (c) 2017 reganlawton
 */

namespace wrav\simplesharing\assetbundles\SimpleSharing;

use Craft;
use craft\web\AssetBundle;
use craft\web\assets\cp\CpAsset;

/**
 * @author    reganlawton
 * @package   SimpleSharing
 * @since     1.0.0
 */
class SimpleSharingAsset extends AssetBundle
{
    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        $this->sourcePath = "@wrav/simplesharing/assetbundles/simplesharing/dist";

        $this->depends = [
            CpAsset::class,
        ];

        $this->js = [
            'js/SimpleSharing.js',
        ];

        $this->css = [
            'css/SimpleSharing.css',
        ];

        parent::init();
    }
}
