<?php

declare(strict_types=1);

namespace HannaRodler\Albums\Domain\Model\Dto;

use HannaRodler\Albums\Domain\Model;

class Filter{
  
  protected bool $spotifyAvailable = false;
  protected bool $appleMusicAvailable = false;
  protected string $genre = "";
  
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
  
  
  
  
}

?>