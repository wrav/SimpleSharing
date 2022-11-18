<?php
/**
 * SimpleSharing plugin for Craft CMS 4.x
 *
 * Simple Sharing generates social media share links within CP entry pages, allowing you to quickly & easily share entries.
 *
 * @link      https://github.com/wrav
 * @copyright Copyright (c) 2017 reganlawton
 */

namespace wrav\simplesharing\variables;

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
     * @return string|null
     */
    public function link($url, $service): ?string
    {

    	if(!trim($url)) {
    		return null;
		}

        $encodedUrl = urlencode($url);

        return match ($service) {
            'facebook' => 'https://www.facebook.com/sharer/sharer.php?u=' . $encodedUrl,
            'twitter' => 'https://twitter.com/intent/tweet?text=' . $encodedUrl,
            'linkedin' => 'https://www.linkedin.com/shareArticle?mini=true&title=&summary=&source=&url=' . $encodedUrl,
            'mix' => 'https://mix.com/add?url=' . $encodedUrl,
            'tumblr' => 'https://www.tumblr.com/share/link?url=' . $encodedUrl,
            'reddit' => 'http://www.reddit.com/submit?url=' . $encodedUrl,
            default => null,
        };
    }
}
