<?php
/**
 * SimpleSharing plugin for Craft CMS 3.x
 *
 * Simple Sharing generates social media share links within CP entry pages, allowing you to quickly & easily share entries.
 *
 * @link      https://github.com/wrav
 * @copyright Copyright (c) 2017 reganlawton
 */

namespace wrav\simplesharing\models;

use wrav\simplesharing;

use Craft;
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

    /**
     * @var string
     */
    public $allowedSections;
    
    /**
     * @var string
     */
    public $allowedPlatforms;
}
