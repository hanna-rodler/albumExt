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
 * GenreController
 */
class GenreController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction()
    {
        $genres = $this->genreRepository->findAll();
        $this->view->assign('genres', $genres);
    }

    /**
     * action show
     *
     * @param \HannaRodler\Albums\Domain\Model\Genre $genre
     * @return string|object|null|void
     */
    public function showAction(\HannaRodler\Albums\Domain\Model\Genre $genre)
    {
        $this->view->assign('genre', $genre);
    }
}
