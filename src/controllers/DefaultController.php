<?php
/**
 * SimpleSharing plugin for Craft CMS 4.x
 *
 * Simple Sharing generates social media share links within CP entry pages, allowing you to quickly & easily share entries.
 *
 * @link      https://github.com/wrav
 * @copyright Copyright (c) 2017 reganlawton
 */

namespace wrav\simplesharing\controllers;

use Twig\Error\LoaderError;
use Twig\Error\SyntaxError;
use wrav\simplesharing\SimpleSharing;
use Craft;
use craft\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * @author    reganlawton
 * @package   SimpleSharing
 * @since     1.0.0
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================
    protected array|bool|int $allowAnonymous = true;

    // Public Methods
    // =========================================================================

    /**
     * @return string
     * @throws NotFoundHttpException
     * @throws LoaderError
     * @throws SyntaxError
     */
    public function actionUrl(): string
    {
        $data = Craft::$app->request->getQueryParams();
        $allowedSections = SimpleSharing::getInstance()->getSettings()->allowedSections;
        $allowedPlatforms = SimpleSharing::getInstance()->getSettings()->allowedPlatforms;

        if (!$allowedSections || (is_array($allowedSections) && in_array($data['sectionId'], $allowedSections))) {

            $entry = Craft::$app->getEntries()->getEntryById($data['id']);
            if (null !== $entry && trim((string) $entry->url)) {

                $btns = [];
                $encodedUrl = urlencode(trim((string) $entry->url));

                $links = [
                    'facebook' => '<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=' . $encodedUrl . '">Facebook</a>',
                    'twitter' => '<a target="_blank" href="https://twitter.com/intent/tweet?text=' . $encodedUrl . '">Twitter</a>',
                    'linkedin' => '<a target="_blank" href="https://www.linkedin.com/sharing/share-offsite/?url=' . $encodedUrl . '">LinkedIn</a>',
                    //'pinterest' => '<a target="_blank" href="http://pinterest.com/pin/create/link/?media=aaa&url=' . $encodedUrl . '">Pinterest</a>',
                    'mix' => '<a target="_blank" href="https://mix.com/add?url=' . $encodedUrl . '">Mix</a>',
                    'tumblr' => '<a target="_blank" href="https://www.tumblr.com/share/link?' . $encodedUrl . '">Tumblr</a>',
                    'reddit' => '<a target="_blank" href="http://www.reddit.com/submit?url=' . $encodedUrl . '">Reddit</a>',
                ];

                foreach ($links as $key => $link) {
                    if (!$allowedPlatforms || (is_array($allowedPlatforms) && in_array(strtolower($key), $allowedPlatforms))) {
                        $btns[] = $link;
                    }
                }

                return Craft::$app->view->renderString(
                    '{{ btns|raw }}',
                    [
                        'btns' => implode( ' | ', $btns),
                    ]
                );
            }
        }

        throw new NotFoundHttpException();
    }
}
