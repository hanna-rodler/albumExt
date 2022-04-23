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
class NationalityTest extends UnitTestCase
{
    /**
     * @var \HannaRodler\Albums\Domain\Model\Nationality|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \HannaRodler\Albums\Domain\Model\Nationality::class,
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
    public function getCountryShortDesignationReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getCountryShortDesignation()
        );
    }

    /**
     * @test
     */
    public function setCountryShortDesignationForStringSetsCountryShortDesignation(): void
    {
        $this->subject->setCountryShortDesignation('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('countryShortDesignation'));
    }

    /**
     * @test
     */
    public function getCountryFullNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getCountryFullName()
        );
    }

    /**
     * @test
     */
    public function setCountryFullNameForStringSetsCountryFullName(): void
    {
        $this->subject->setCountryFullName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('countryFullName'));
    }
}
