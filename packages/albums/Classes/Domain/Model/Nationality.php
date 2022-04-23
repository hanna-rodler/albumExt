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
 * Nationality
 */
class Nationality extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * countryShortDesignation
     *
     * @var string
     * @TYPO3\CMS\Extbase\Annotation\Validate("NotEmpty")
     */
    protected $countryShortDesignation = '';

    /**
     * countryFullName
     *
     * @var string
     */
    protected $countryFullName = '';

    /**
     * Returns the countryShortDesignation
     *
     * @return string countryShortDesignation
     */
    public function getCountryShortDesignation()
    {
        return $this->countryShortDesignation;
    }

    /**
     * Sets the countryShortDesignation
     *
     * @param string $countryShortDesignation
     * @return void
     */
    public function setCountryShortDesignation(string $countryShortDesignation)
    {
        $this->countryShortDesignation = $countryShortDesignation;
    }

    /**
     * Returns the countryFullName
     *
     * @return string $countryFullName
     */
    public function getCountryFullName()
    {
        return $this->countryFullName;
    }

    /**
     * Sets the countryFullName
     *
     * @param string $countryFullName
     * @return void
     */
    public function setCountryFullName(string $countryFullName)
    {
        $this->countryFullName = $countryFullName;
    }
}
