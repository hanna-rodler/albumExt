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
class SongTest extends UnitTestCase
{
    /**
     * @var \HannaRodler\Albums\Domain\Model\Song|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \HannaRodler\Albums\Domain\Model\Song::class,
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
    public function getDurationReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getDuration()
        );
    }

    /**
     * @test
     */
    public function setDurationForIntSetsDuration(): void
    {
        $this->subject->setDuration(12);

        self::assertEquals(12, $this->subject->_get('duration'));
    }

    /**
     * @test
     */
    public function getExplicitContentReturnsInitialValueForBool(): void
    {
        self::assertFalse($this->subject->getExplicitContent());
    }

    /**
     * @test
     */
    public function setExplicitContentForBoolSetsExplicitContent(): void
    {
        $this->subject->setExplicitContent(true);

        self::assertEquals(true, $this->subject->_get('explicitContent'));
    }

    /**
     * @test
     */
    public function getInterpretsReturnsInitialValueForInterpret(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getInterprets()
        );
    }

    /**
     * @test
     */
    public function setInterpretsForObjectStorageContainingInterpretSetsInterprets(): void
    {
        $interpret = new \HannaRodler\Albums\Domain\Model\Interpret();
        $objectStorageHoldingExactlyOneInterprets = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneInterprets->attach($interpret);
        $this->subject->setInterprets($objectStorageHoldingExactlyOneInterprets);

        self::assertEquals($objectStorageHoldingExactlyOneInterprets, $this->subject->_get('interprets'));
    }

    /**
     * @test
     */
    public function addInterpretToObjectStorageHoldingInterprets(): void
    {
        $interpret = new \HannaRodler\Albums\Domain\Model\Interpret();
        $interpretsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $interpretsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($interpret));
        $this->subject->_set('interprets', $interpretsObjectStorageMock);

        $this->subject->addInterpret($interpret);
    }

    /**
     * @test
     */
    public function removeInterpretFromObjectStorageHoldingInterprets(): void
    {
        $interpret = new \HannaRodler\Albums\Domain\Model\Interpret();
        $interpretsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $interpretsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($interpret));
        $this->subject->_set('interprets', $interpretsObjectStorageMock);

        $this->subject->removeInterpret($interpret);
    }
}
