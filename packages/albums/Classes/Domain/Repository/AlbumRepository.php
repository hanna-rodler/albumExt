<?php

declare(strict_types=1);

namespace HannaRodler\Albums\Domain\Repository;



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
 * The repository for Albums
 */
class AlbumRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
  public function findByFilter(Filter $filter){
    $query = $this->createQuery();
    $query->getQuerySettings()->setRespectStoragePage(false);
    
    $constraints=[];
    if($filter->isSpotifyAvailable()){
      $constraints[]=$query->equals('spotifyAvailable', true);
    }
    
    if($filter->isAppleMusicAvailable()){
      $constraints[]=$query->equals('appleMusicAvailable', true);
    }
  
    if($filter->getGenres()){
      $constraints[]=$query->equals('genres', $filter->getGenres());
    }
    
    if(!empty($constraints)){
      $query->matching($query->logicalAnd($constraints));
    }
    
    return $query->execute();
  }
  
  
}
