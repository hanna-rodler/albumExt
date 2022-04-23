<?php

declare(strict_types=1);

namespace HannaRodler\Albums\Domain\Model\Dto;

class Filter{
  
  protected bool $spotifyAvailable = false;
  protected bool $appleMusicAvailable = false;
  
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