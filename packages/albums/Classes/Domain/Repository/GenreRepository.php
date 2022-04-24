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
 * (c) 2022 Hanna Rodler
 */

/**
 * The repository for Genres
 */
class GenreRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
  public function findByFilter(Filter $filter){
    $query = $this->createQuery();
    $query->getQuerySettings()->setRespectStoragePage(false);
    
    $constraints=[];
    if($filter->getGenres()){
      $constraints[]=$query->equals('name', $filter->getGenres());
    }
  
    if(!empty($constraints)){
      $query->matching($query->logicalAnd($constraints));
    }
    
    return $query->execute();
  }
}
