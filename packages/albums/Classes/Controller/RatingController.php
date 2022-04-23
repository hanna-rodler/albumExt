<?php

declare(strict_types=1);

namespace HannaRodler\Albums\Controller;


/**
 * This file is part of the "Albums &amp; Songs" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Hanna Rodler
 */

/**
 * RatingController
 */
class RatingController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction()
    {
        $ratings = $this->ratingRepository->findAll();
        $this->view->assign('ratings', $ratings);
    }
}
