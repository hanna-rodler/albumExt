<?php

declare(strict_types=1);

namespace HannaRodler\Albums\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Hanna Rodler 
 */
class InterpretTest extends UnitTestCase
{
    /**
     * @var \HannaRodler\Albums\Domain\Model\Interpret|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \HannaRodler\Albums\Domain\Model\Interpret::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName(): void
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('name'));
    }

    /**
     * @test
     */
    public function getBiographyReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getBiography()
        );
    }

    /**
     * @test
     */
    public function setBiographyForStringSetsBiography(): void
    {
        $this->subject->setBiography('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('biography'));
    }

    /**
     * @test
     */
    public function getGalleryReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getGallery()
        );
    }

    /**
     * @test
     */
    public function setGalleryForFileReferenceSetsGallery(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setGallery($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('gallery'));
    }

    /**
     * @test
     */
    public function getBirthdateReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getBirthdate()
        );
    }

    /**
     * @test
     */
    public function setBirthdateForDateTimeSetsBirthdate(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setBirthdate($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('birthdate'));
    }

    /**
     * @test
     */
    public function getNationalityReturnsInitialValueForNationality(): void
    {
        self::assertEquals(
            null,
            $this->subject->getNationality()
        );
    }

    /**
     * @test
     */
    public function setNationalityForNationalitySetsNationality(): void
    {
        $nationalityFixture = new \HannaRodler\Albums\Domain\Model\Nationality();
        $this->subject->setNationality($nationalityFixture);

        self::assertEquals($nationalityFixture, $this->subject->_get('nationality'));
    }
}
