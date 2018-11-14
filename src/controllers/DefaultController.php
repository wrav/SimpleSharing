<?php
/**
 * SimpleSharing plugin for Craft CMS 3.x
 *
 * Simple Sharing generates social media share links within CP entry pages, allowing you to quickly & easily share entries.
 *
 * @link      https://github.com/wrav
 * @copyright Copyright (c) 2017 reganlawton
 */

namespace wrav\simplesharing\controllers;

use craft\elements\Entry;
use wrav\simplesharing\SimpleSharing;

use Craft;
use craft\web\Controller;

/**
 * @author    reganlawton
 * @package   SimpleSharing
 * @since     1.0.0
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    protected $allowAnonymous = true;

    // Public Methods
    // =========================================================================

    public function actionUrl()
    {
        $data = Craft::$app->request->getQueryParams();
        $allowedSections = SimpleSharing::getInstance()->getSettings()->allowedSections;
        $allowedPlatforms = SimpleSharing::getInstance()->getSettings()->allowedPlatforms;

        if (!$allowedSections || (is_array($allowedSections) && in_array($data['sectionId'], $allowedSections))) {
            /** @var Entry|null $entry */
            $entry = Craft::$app->getEntries()->getEntryById($data['id']);

            if (null !== $entry) {
                $btns = [];
                $links = [
                    'facebook' => '<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . $entry->url . '">Facebook</a>',
                    'twitter' => '<a target="_blank" href="https://twitter.com/home?status=' . $entry->url . '">Twitter</a>',
                    'linkedin' => '<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&title=' . $entry->url . '&summary=&source=&url=' . $entry->url . '">LinkedIn</a>',
                    'google' => '<a target="_blank" href="https://plus.google.com/share?url=' . $entry->url . '">Google</a>',
                ];

                foreach ($links as $key => $link) {
                    if (!$allowedPlatforms || (is_array($allowedPlatforms) && in_array(strtolower($key), $allowedPlatforms))) {
                        $btns[] = $link;
                    }
                }

                echo implode($btns, ' | ');
            }
        }

        Craft::$app->end();
    }
}
