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
 * Song
 */
class Song extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * name
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $name = '';

    /**
     * duration
     *
     * @var int
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $duration = 0;

    /**
     * explicitContent
     *
     * @var bool
     */
    protected $explicitContent = false;

    /**
     * interprets
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HannaRodler\Albums\Domain\Model\Interpret>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $interprets = null;

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
     * Returns the duration
     *
     * @return int $duration
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Sets the duration
     *
     * @param int $duration
     * @return void
     */
    public function setDuration(int $duration)
    {
        $this->duration = $duration;
    }

    /**
     * Returns the explicitContent
     *
     * @return bool $explicitContent
     */
    public function getExplicitContent()
    {
        return $this->explicitContent;
    }

    /**
     * Sets the explicitContent
     *
     * @param bool $explicitContent
     * @return void
     */
    public function setExplicitContent(bool $explicitContent)
    {
        $this->explicitContent = $explicitContent;
    }

    /**
     * Returns the boolean state of explicitContent
     *
     * @return bool
     */
    public function isExplicitContent()
    {
        return $this->explicitContent;
    }

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->interprets = $this->interprets ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Adds a Interpret
     *
     * @param \HannaRodler\Albums\Domain\Model\Interpret $interpret
     * @return void
     */
    public function addInterpret(\HannaRodler\Albums\Domain\Model\Interpret $interpret)
    {
        $this->interprets->attach($interpret);
    }

    /**
     * Removes a Interpret
     *
     * @param \HannaRodler\Albums\Domain\Model\Interpret $interpretToRemove The Interpret to be removed
     * @return void
     */
    public function removeInterpret(\HannaRodler\Albums\Domain\Model\Interpret $interpretToRemove)
    {
        $this->interprets->detach($interpretToRemove);
    }

    /**
     * Returns the interprets
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HannaRodler\Albums\Domain\Model\Interpret> $interprets
     */
    public function getInterprets()
    {
        return $this->interprets;
    }

    /**
     * Sets the interprets
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\HannaRodler\Albums\Domain\Model\Interpret> $interprets
     * @return void
     */
    public function setInterprets(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $interprets)
    {
        $this->interprets = $interprets;
    }
}
