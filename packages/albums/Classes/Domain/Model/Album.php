<?php

declare(strict_types=1);

namespace HannaRodler\Albums\Domain\Model;


/**
 * This file is part of the "Albums &amp; Songs" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022
 */

/**
 * Album
 */
class Album extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
  
  /**
   * name
   *
   * @var string
   * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
   */
  protected $name='';
  
  /**
   * media
   *
   * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
   * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
   * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
   */
  protected $media=null;
  
  /**
   * teaser
   *
   * @var string
   */
  protected $teaser='';
  
  /**
   * description
   *
   * @var string
   */
  protected $description='';
  
  /**
   * releaseDate
   *
   * @var \DateTime
   * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
   */
  protected $releaseDate=null;
  
  /**
   * spotifyAvailable
   *
   * @var bool
   */
  protected $spotifyAvailable=false;
  
  /**
   * appleMusicAvailable
   *
   * @var bool
   */
  protected $appleMusicAvailable=false;
  
  /**
   * songs
   *
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HannaRodler\Albums\Domain\Model\Song>
   * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
   */
  protected $songs=null;
  
  /**
   * ratings
   *
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HannaRodler\Albums\Domain\Model\Rating>
   * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
   */
  protected $ratings=null;
  
  /**
   * genres
   *
   * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HannaRodler\Albums\Domain\Model\Genre>
   */
  protected $genres=null;
  
  /**
   * Returns the name
   *
   * @return string $name
   */
  public function getName(){
    return $this->name;
  }
  
  /**
   * Sets the name
   *
   * @param string $name
   *
   * @return void
   */
  public function setName(string $name){
    $this->name=$name;
  }
  
  /**
   * Returns the media
   *
   * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $media
   */
  public function getMedia(){
    return $this->media;
  }
  
  /**
   * Sets the media
   *
   * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $media
   *
   * @return void
   */
  public function setMedia(\TYPO3\CMS\Extbase\Domain\Model\FileReference $media){
    $this->media=$media;
  }
  
  /**
   * Returns the teaser
   *
   * @return string $teaser
   */
  public function getTeaser(){
    return $this->teaser;
  }
  
  /**
   * Sets the teaser
   *
   * @param string $teaser
   *
   * @return void
   */
  public function setTeaser(string $teaser){
    $this->teaser=$teaser;
  }
  
  /**
   * Returns the description
   *
   * @return string $description
   */
  public function getDescription(){
    return $this->description;
  }
  
  /**
   * Sets the description
   *
   * @param string $description
   *
   * @return void
   */
  public function setDescription(string $description){
    $this->description=$description;
  }
  
  /**
   * Returns the releaseDate
   *
   * @return \DateTime $releaseDate
   */
  public function getReleaseDate(){
    return $this->releaseDate;
  }
  
  /**
   * Sets the releaseDate
   *
   * @param \DateTime $releaseDate
   *
   * @return void
   */
  public function setReleaseDate(\DateTime $releaseDate){
    $this->releaseDate=$releaseDate;
  }
  
  /**
   * Returns the spotifyAvailable
   *
   * @return bool $spotifyAvailable
   */
  public function getSpotifyAvailable(){
    return $this->spotifyAvailable;
  }
  
  /**
   * Sets the spotifyAvailable
   *
   * @param bool $spotifyAvailable
   *
   * @return void
   */
  public function setSpotifyAvailable(bool $spotifyAvailable){
    $this->spotifyAvailable=$spotifyAvailable;
  }
  
  /**
   * Returns the boolean state of spotifyAvailable
   *
   * @return bool
   */
  public function isSpotifyAvailable(){
    return $this->spotifyAvailable;
  }
  
  /**
   * Returns the appleMusicAvailable
   *
   * @return bool $appleMusicAvailable
   */
  public function getAppleMusicAvailable(){
    return $this->appleMusicAvailable;
  }
  
  /**
   * Sets the appleMusicAvailable
   *
   * @param bool $appleMusicAvailable
   *
   * @return void
   */
  public function setAppleMusicAvailable(bool $appleMusicAvailable){
    $this->appleMusicAvailable=$appleMusicAvailable;
  }
  
  /**
   * Returns the boolean state of appleMusicAvailable
   *
   * @return bool
   */
  public function isAppleMusicAvailable(){
    return $this->appleMusicAvailable;
  }
  
  /**
   * __construct
   */
  public function __construct(){
    
    // Do not remove the next line: It would break the functionality
    $this->initializeObject();
  }
  
  /**
   * Initializes all ObjectStorage properties when model is reconstructed from
   * DB (where __construct is not called) Do not modify this method! It will
   * be rewritten on each save in the extension builder You may modify the
   * constructor of this class instead
   *
   * @return void
   */
  public function initializeObject(){
    $this->songs=
      $this->songs ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    $this->ratings=
      $this->ratings ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    $this->genres=
      $this->genres ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
  }
  
  /**
   * Adds a Song
   *
   * @param \HannaRodler\Albums\Domain\Model\Song $song
   *
   * @return void
   */
  public function addSong(\HannaRodler\Albums\Domain\Model\Song $song){
    $this->songs->attach($song);
  }
  
  /**
   * Removes a Song
   *
   * @param \HannaRodler\Albums\Domain\Model\Song $songToRemove The Song to be
   *                                                            removed
   *
   * @return void
   */
  public function removeSong(\HannaRodler\Albums\Domain\Model\Song $songToRemove){
    $this->songs->detach($songToRemove);
  }
  
  /**
   * Returns the songs
   *
   * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HannaRodler\Albums\Domain\Model\Song> $songs
   */
  public function getSongs(){
    return $this->songs;
  }
  
  /**
   * Sets the songs
   *
   * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HannaRodler\Albums\Domain\Model\Song> $songs
   *
   * @return void
   */
  public function setSongs(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $songs){
    $this->songs=$songs;
  }
  
  /**
   * Adds a Rating
   *
   * @param \HannaRodler\Albums\Domain\Model\Rating $rating
   *
   * @return void
   */
  public function addRating(\HannaRodler\Albums\Domain\Model\Rating $rating){
    $this->ratings->attach($rating);
  }
  
  /**
   * Removes a Rating
   *
   * @param \HannaRodler\Albums\Domain\Model\Rating $ratingToRemove The Rating
   *                                                                to be
   *                                                                removed
   *
   * @return void
   */
  public function removeRating(\HannaRodler\Albums\Domain\Model\Rating $ratingToRemove){
    $this->ratings->detach($ratingToRemove);
  }
  
  /**
   * Returns the ratings
   *
   * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HannaRodler\Albums\Domain\Model\Rating> $ratings
   */
  public function getRatings(){
    return $this->ratings;
  }
  
  /**
   * Sets the ratings
   *
   * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HannaRodler\Albums\Domain\Model\Rating> $ratings
   *
   * @return void
   */
  public function setRatings(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $ratings){
    $this->ratings=$ratings;
  }
  
  /**
   * Adds a Genre
   *
   * @param \HannaRodler\Albums\Domain\Model\Genre $genre
   *
   * @return void
   */
  public function addGenre(\HannaRodler\Albums\Domain\Model\Genre $genre){
    $this->genres->attach($genre);
  }
  
  /**
   * Removes a Genre
   *
   * @param \HannaRodler\Albums\Domain\Model\Genre $genreToRemove The Genre to
   *                                                              be removed
   *
   * @return void
   */
  public function removeGenre(\HannaRodler\Albums\Domain\Model\Genre $genreToRemove){
    $this->genres->detach($genreToRemove);
  }
  
  /**
   * Returns the genres
   *
   * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HannaRodler\Albums\Domain\Model\Genre> $genres
   */
  public function getGenres(){
    return $this->genres;
  }
  
  /**
   * Sets the genres
   *
   * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HannaRodler\Albums\Domain\Model\Genre> $genres
   *
   * @return void
   */
  public function setGenres(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $genres){
    $this->genres=$genres;
  }
  
  public function getAllInterprets(){
    $interprets=[];
    foreach($this->songs as $song){
      /** @var Song $song */
      foreach($song->getInterprets() as $interpret){
        $interprets[$interpret->getUid()]=$interpret;
      }
    }
    
    return $interprets;
  }
  
  public function getAvgRatings(){
    if(count($this->ratings)==0){
      return 0;
    }
    $sumRatings=0;
    foreach($this->ratings as $rating){
      $sumRatings+=$rating->getStars();
    }
    return $sumRatings/count($this->ratings);
  }
  
  public function getAlbumDuration(): string{
    $seconds=0;
    foreach($this->songs as $song){
      $seconds+=$song->getDuration();
    }
    $hours = floor($seconds/3600);
    $seconds-=$hours*3600;
    $minutes = floor($seconds/60);
    $seconds-=$minutes*60;
    return $hours.":".$minutes.":$seconds hrs";
  }
}
