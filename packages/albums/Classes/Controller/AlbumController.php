<?php

declare(strict_types=1);

namespace HannaRodler\Albums\Controller;

use HannaRodler\Albums\Domain\Model\Dto\Filter;
use HannaRodler\Albums\Domain\Model\Genre;
use HannaRodler\Albums\Domain\Repository\GenreRepository;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility;

/**
 * This file is part of the "Albums &amp; Songs" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022
 */

/**
 * AlbumController
 */
class AlbumController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * albumRepository
     *
     * @var \HannaRodler\Albums\Domain\Repository\AlbumRepository
     */
    protected $albumRepository = null;

    /**
     * @var null
     */
    protected $genreRepository = null;

    /**
     * @param \HannaRodler\Albums\Domain\Repository\AlbumRepository $albumRepository
     */
    public function injectAlbumRepository(\HannaRodler\Albums\Domain\Repository\AlbumRepository $albumRepository)
    {
        $this->albumRepository = $albumRepository;
    }

    /**
     * @param GenreRepository $genreRepository
     * @return \HannaRodler\Albums\Domain\Repository\GenreRepository
     */
    public function injectGenreRepository(GenreRepository $genreRepository)
    {
        $this->genreRepository = $genreRepository;
    }

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction()
    {
        $filter = new Filter();
        $albums = $this->albumRepository->findByFilter($filter);
        $this->view->assign('albums', $albums);
    }

    /**
     * action show
     *
     * @param \HannaRodler\Albums\Domain\Model\Album $album
     * @return string|object|null|void
     */
    public function showAction(\HannaRodler\Albums\Domain\Model\Album $album)
    {
        $this->view->assign('album', $album);
    }

    /**
     * action availableeverywhere
     *
     * @return string|object|null|void
     */
    public function availableeverywhereAction()
    {
        $filter = $this->getFilter();
        $albums = $this->albumRepository->findByFilter($filter);
        $this->view->assign('albums', $albums);
    }
    protected function getFilter()
    {
        $filter = new Filter();
        $filter->setSpotifyAvailable((bool) ($this->settings['filter']['spotifyAvailable'] ?? true));
        $filter->setAppleMusicAvailable((bool) ($this->settings['filter']['appleMusicAvailable'] ?? true));
        return $filter;
    }

    /**
     * action funk
     *
     * @return string|object|null|void
     */
    public function funkAction()
    {
        $filter = new Filter();
        $filter->setGenres("Funk");
        $albums = $this->genreRepository->findByFilter($filter);
        $this->view->assign('albums', $albums);

        /*$filter= new Filter();
          $filter->setGenres(['funk']);
          $funk=$this->albumRepository->findByFilter($filter);
          $this->view->assign('albums',$funk);*/
    }
    protected function getFunkFilter()
    {
        $filter = new Filter();
        $filter->setGenres('Funk');
        var_dump($filter);
        return $filter;

        /*$funkFilter = new Filter();
          $genres = $this->albumRepository->findByFilter($funkFilter);
          return $genres;*/
    }

    /**
     * action worship
     *
     * @return string|object|null|void
     */
    public function worshipAction()
    {
    }

    /**
     * action released
     *
     * @return string|object|null|void
     */
    public function releasedAction()
    {
    }

    /**
     * action albumsPerInterpreter
     *
     * @return string|object|null|void
     */
    public function albumsPerInterpreterAction()
    {
    }
}
