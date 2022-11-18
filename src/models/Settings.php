<?php
/**
 * SimpleSharing plugin for Craft CMS 4.x
 *
 * Simple Sharing generates social media share links within CP entry pages, allowing you to quickly & easily share entries.
 *
 * @link      https://github.com/wrav
 * @copyright Copyright (c) 2017 reganlawton
 */

namespace wrav\simplesharing\models;

use craft\base\Model;

/**
 * @author    reganlawton
 * @package   SimpleSharing
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================
    /** @var string[] $allowedSections */
    /** @var string[] $allowedPlatforms */
    public array $allowedSections = [];
    public array $allowedPlatforms = [];
}
