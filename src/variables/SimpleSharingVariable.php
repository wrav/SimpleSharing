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

    	if(!trim($url)) {
    		return null;
		}

        $encodedUrl = urlencode($url);

        switch ($service) {
            case 'facebook':
                return 'https://www.facebook.com/sharer/sharer.php?u='.$encodedUrl;
                break;
            case 'twitter':
                return 'https://twitter.com/intent/tweet?text='.$encodedUrl;
                break;
            case 'linkedin':
                return 'https://www.linkedin.com/shareArticle?mini=true&title=&summary=&source=&url='.$encodedUrl;
                break;
//            case 'pinterest':
//                return 'https://www.pinterest.com/pin/create/link/?'.$encodedUrl;
//                break;
            case 'mix':
                return 'https://mix.com/add?url='.$encodedUrl;
                break;
			case 'tumblr':
				return 'https://www.tumblr.com/share/link?'.$encodedUrl;
				break;
			case 'reddit':
				return 'http://www.reddit.com/submit?url='.$encodedUrl;
				break;
            default:
                return null;
        }
    }
}
