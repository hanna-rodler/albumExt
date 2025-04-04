<?php

declare(strict_types=1);

namespace HannaRodler\Albums\Domain\Model\Dto;

use HannaRodler\Albums\Domain\Model;

class Filter{
  
  protected bool $spotifyAvailable = false;
  protected bool $appleMusicAvailable = false;
  protected string $genre = "";
  protected bool $explicit = false;
  
  /**
   * @return bool
   */
  public function isExplicit(): bool{
    return $this->explicit;
  }
  
  /**
   * @param bool $explicit
   */
  public function setExplicit(bool $explicit): void{
    $this->explicit=$explicit;
  }
  /*protected bool $released = false;
  protected $releaseDate = null;*/
  protected $albums = 0;
  protected string $interpret = "";
  protected $released = false;
  
  /**
   * @return string
   */
  public function getGenre(): string{
    return $this->genre;
  }
  
  /**
   * @param string $genre
   */
  public function setGenre(string $genre): void{
    $this->genre=$genre;
  }
  
  /**
   * @return string
   */
  public function getGenres(): string{
    return $this->genre;
  }
  
  /**
   * @param string $genre
   */
  public function setGenres(string $genre): void{
    $this->genre=$genre;
  }
  

  
  /**
   * @return bool
   */
  public function isSpotifyAvailable(): bool{
    return $this->spotifyAvailable;
  }
  
  /**
   * @param bool $spotifyAvailable
   */
  public function setSpotifyAvailable(bool $spotifyAvailable): void{
    $this->spotifyAvailable=$spotifyAvailable;
  }
  
  /**
   * @return bool
   */
  public function isAppleMusicAvailable(): bool{
    return $this->appleMusicAvailable;
  }
  
  /**
   * @param bool $appleMusicAvailable
   */
  public function setAppleMusicAvailable(bool $appleMusicAvailable): void{
    $this->appleMusicAvailable=$appleMusicAvailable;
  }
  
  
  /**
   * @return bool
   */
  public function isReleased(): bool{
    return $this->released;
  }
  
  /**
   * @param bool $released
   */
  public function setReleased(bool $released): void{
    $this->released=$released;
  }
  
  /**
   * @return null
   */
  public function getReleaseDate(){
    return $this->releaseDate;
  }
  
  /**
   * @param null $releaseDate
   */
  public function setReleaseDate($releaseDate): void{
    $this->releaseDate=$releaseDate;
  }
  
  /**
   * @return int
   */
  public function getAlbums(): int{
    return $this->albums;
  }
  
  /**
   * @param int $albums
   */
  public function setAlbums(int $albums): void{
    $this->albums=$albums;
  }
  
  /**
   * @return int
   */
  public function getInterpret(): string{
    return $this->interpret;
  }
  
  /**
   * @param int $interpret
   */
  public function setInterpret(string $interpret): void{
    $this->interpret=$interpret;
  }
  
}

?>