<?php

declare(strict_types=1);

namespace HannaRodler\Albums\Controller;

use HannaRodler\Albums\Domain\Model\Dto\Filter;
use HannaRodler\Albums\Domain\Model\Genre;
use HannaRodler\Albums\Domain\Model\Interpret;
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
class AlbumController
  extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
  
  /**
   * albumRepository
   *
   * @var \HannaRodler\Albums\Domain\Repository\AlbumRepository
   */
  protected $albumRepository=null;
  
  /**
   * @var null
   */
  protected $genreRepository=null;
  
  /**
   * @param \HannaRodler\Albums\Domain\Repository\AlbumRepository $albumRepository
   */
  public function injectAlbumRepository(\HannaRodler\Albums\Domain\Repository\AlbumRepository $albumRepository){
    $this->albumRepository=$albumRepository;
  }
  
  /**
   * @param GenreRepository $genreRepository
   *
   * @return \HannaRodler\Albums\Domain\Repository\GenreRepository
   */
  public function injectGenreRepository(GenreRepository $genreRepository){
    $this->genreRepository=$genreRepository;
  }
  
  /**
   * action list
   *
   * @return string|object|null|void
   */
  public function listAction(array $demands=[]){
    var_dump($demands);
    $filter=new Filter();
    if($demands['beforeToday']){
      $filter->setReleased(true);
    }
    if($demands['spotifyAvailable']){
      $filter->setSpotifyAvailable(true);
    }
    if($demands['appleMusicAvailable']){
      $filter->setAppleMusicAvailable(true);
    }
    if($demands['isExplicit']){
      $filter->setIsExplicit(true);
    }else{
      $filter->setIsExplicit(false);
    }
    
    $this->view->assign('filter', $filter);
    
    $albums=$this->albumRepository->findByFilter($filter);
    $this->view->assign('albums', $albums);
    
  }
  
  /**
   * action show
   *
   * @param \HannaRodler\Albums\Domain\Model\Album $album
   *
   * @return string|object|null|void
   */
  public function showAction(\HannaRodler\Albums\Domain\Model\Album $album){
    $this->view->assign('album', $album);
  }
  
  /**
   * action availableeverywhere
   *
   * @return string|object|null|void
   */
  public function availableeverywhereAction(){
    $filter=$this->getFilter();
    $albums=$this->albumRepository->findByFilter($filter);
    $this->view->assign('albums', $albums);
  }
  
  protected function getFilter(){
    $filter=new Filter();
    $filter->setSpotifyAvailable((bool)($this->settings['filter']['spotifyAvailable']
      ?? true));
    $filter->setAppleMusicAvailable((bool)($this->settings['filter']['appleMusicAvailable']
      ?? true));
    return $filter;
  }
  
  /**
   * action funk
   *
   * @return string|object|null|void
   */
  public function funkAction(){
    $filter=$this->getGenreFilter("Funk");
    $albums=$this->albumRepository->findByFilter($filter);
    //        $albums = $this->genreRepository->findByFilter($filter);
    $this->view->assign('albums', $albums);
    
    /*$filter= new Filter();
      $filter->setGenres(['funk']);
      $funk=$this->albumRepository->findByFilter($filter);
      $this->view->assign('albums',$funk);*/
  }
  
  protected function getGenreFilter($genreName){
    $filter=new Filter();
    $filter->setGenres($genreName);
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
  public function worshipAction(){
    $filter=$this->getGenreFilter("Worship");
    $albums=$this->albumRepository->findByFilter($filter);
    $this->view->assign('albums', $albums);
  }
  
  /**
   * action released
   *
   * @return string|object|null|void
   */
  public function releasedAction(){
    $filter=$this->getReleasedFilter();
    $albums=$this->albumRepository->findByFilter($filter);
    $this->view->assign('albums', $albums);
  }
  
  protected function getReleasedFilter(){
    $filter=new Filter();
    $date=\DateTime::createFromFormat('Y-m-d', '25-04-2022');
    $timestamp=$date->getTimestamp();
    $filter->setReleaseDate($timestamp);
    return $filter;
  }
  
  /**
   * action albumsPerInterpreter
   *
   * @return string|object|null|void
   */
  public function albumsPerInterpreterAction(Interpret $interpret=null){
    /*      DebuggerUtility::var_dump($interpret);
          var_dump($interpret);
          $filter = new Filter();
          if($interpret != null){
            $filter->setInterpret($interpret->getUid());
          }
          $albums = $this->albumRepository->findByFilter($filter);
          $this -> view->assign('albums', $albums);
          $this->view->assign('filteredPerInterpreter', $interpret);*/
  }
  
  protected function getInterpretFilter(){
    
  }
}
