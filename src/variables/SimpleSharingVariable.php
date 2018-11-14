<?php
/**
 * SimpleSharing plugin for Craft CMS 3.x
 *
 * Simple Sharing generates social media share links within CP entry pages, allowing you to quickly & easily share entries.
 *
 * @link      https://github.com/wrav
 * @copyright Copyright (c) 2017 reganlawton
 */

namespace wrav\simplesharing\variables;

use wrav\simplesharing;

use Craft;

/**
 * @author    reganlawton
 * @package   SimpleSharing
 * @since     1.0.0
 */
class SimpleSharingVariable
{
    // Public Methods
    // =========================================================================

    /**
     * Call it like this:
     *
     *     {{ craft.simplesharing.link(url, service) }}
     *
     * @param $url
     * @param $service
     * @return string
     */
    public function link($url, $service)
    {
        switch ($service) {
            case 'facebook':
                return 'https://www.facebook.com/sharer/sharer.php?u='.$url;
                break;
            case 'twitter':
                return 'https://twitter.com/home?status='.$url;
                break;
            case 'google':
                return 'https://plus.google.com/share?url='.$url;
                break;
            case 'linkedin':
                return 'https://www.linkedin.com/shareArticle?mini=true&title=&summary=&source=&url='.$url;
                break;
            default:
                return null;
        }
    }
}
