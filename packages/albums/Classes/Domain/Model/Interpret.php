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
 * Interpret
 */
class Interpret extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * biography
     *
     * @var string
     */
    protected $biography = '';

    /**
     * gallery
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\CMS\Extbase\Domain\Model\FileReference>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $gallery = null;

    /**
     * birthdate
     *
     * @var \DateTime
     */
    protected $birthdate = null;

    /**
     * nationality
     *
     * @var \HannaRodler\Albums\Domain\Model\Nationality
     */
    protected $nationality = null;

    /**
     * Returns the name
     *
     * @return string $name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the biography
     *
     * @return string $biography
     */
    public function getBiography()
    {
        return $this->biography;
    }

    /**
     * Sets the biography
     *
     * @param string $biography
     * @return void
     */
    public function setBiography(string $biography)
    {
        $this->biography = $biography;
    }

    /**
     * Returns the gallery
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $gallery
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * Sets the gallery
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $gallery
     * @return void
     */
    public function setGallery(\TYPO3\CMS\Extbase\Domain\Model\FileReference $gallery)
    {
        $this->gallery = $gallery;
    }

    /**
     * Returns the birthdate
     *
     * @return \DateTime $birthdate
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * Sets the birthdate
     *
     * @param \DateTime $birthdate
     * @return void
     */
    public function setBirthdate(\DateTime $birthdate)
    {
        $this->birthdate = $birthdate;
    }

    /**
     * Returns the nationality
     *
     * @return \HannaRodler\Albums\Domain\Model\Nationality $nationality
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * Sets the nationality
     *
     * @param \HannaRodler\Albums\Domain\Model\Nationality $nationality
     * @return void
     */
    public function setNationality(\HannaRodler\Albums\Domain\Model\Nationality $nationality)
    {
        $this->nationality = $nationality;
    }
    
    public function getAge(){
      $now = new \DateTime();
      $interval = $now->diff($this->birthdate);
      return $interval->y;
    }
}
