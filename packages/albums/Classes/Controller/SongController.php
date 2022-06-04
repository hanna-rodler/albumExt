<?php

declare(strict_types=1);

namespace HannaRodler\Albums\Controller;

use HannaRodler\Albums\Domain\Model\Dto\Filter;

/**
 * This file is part of the "Albums &amp; Songs" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022
 */

/**
 * SongController
 */
class SongController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * songRepository
     *
     * @var \HannaRodler\Albums\Domain\Repository\SongRepository
     */
    protected $songRepository = null;

    /**
     * @param \HannaRodler\Albums\Domain\Repository\SongRepository $songRepository
     */
    public function injectSongRepository(\HannaRodler\Albums\Domain\Repository\SongRepository $songRepository)
    {
        $this->songRepository = $songRepository;
    }

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction(array $demands=[])
    {
        $filter = new Filter();
        if($demands['isExplicit']){
          $filter->setIsExplicit(true);
        }
        if(!$demands['isExplicit']){
          $filter->setIsExplicit(false);
        }
        
        $songs = $this->songRepository->findByFilter($filter);
        $this->view->assign('songs', $songs);
    }

    /**
     * action show
     *
     * @param \HannaRodler\Albums\Domain\Model\Song $song
     * @return string|object|null|void
     */
    public function showAction(\HannaRodler\Albums\Domain\Model\Song $song)
    {
        $this->view->assign('song', $song);
    }

    /**
     * action explicit
     *
     * @return string|object|null|void
     */
    public function explicitAction()
    {
      $filter = $this->getFilter();
      $explSongs = $this->songRepository->findByFilter($filter);
      $this->view->assign('songs', $explSongs);
    }
  
  protected function getFilter()
  {
    $filter = new Filter();
    $filter->setIsExplicit((bool) ($this->settings['filter']['explicitContent'] ??
      true));
    return $filter;
  }
}
