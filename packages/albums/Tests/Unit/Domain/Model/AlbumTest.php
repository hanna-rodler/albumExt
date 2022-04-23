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
class AlbumTest extends UnitTestCase
{
    /**
     * @var \HannaRodler\Albums\Domain\Model\Album|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \HannaRodler\Albums\Domain\Model\Album::class,
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
    public function getMediaReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getMedia()
        );
    }

    /**
     * @test
     */
    public function setMediaForFileReferenceSetsMedia(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setMedia($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('media'));
    }

    /**
     * @test
     */
    public function getTeaserReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getTeaser()
        );
    }

    /**
     * @test
     */
    public function setTeaserForStringSetsTeaser(): void
    {
        $this->subject->setTeaser('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('teaser'));
    }

    /**
     * @test
     */
    public function getDescriptionReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getDescription()
        );
    }

    /**
     * @test
     */
    public function setDescriptionForStringSetsDescription(): void
    {
        $this->subject->setDescription('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('description'));
    }

    /**
     * @test
     */
    public function getReleaseDateReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getReleaseDate()
        );
    }

    /**
     * @test
     */
    public function setReleaseDateForDateTimeSetsReleaseDate(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setReleaseDate($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('releaseDate'));
    }

    /**
     * @test
     */
    public function getSpotifyAvailableReturnsInitialValueForBool(): void
    {
        self::assertFalse($this->subject->getSpotifyAvailable());
    }

    /**
     * @test
     */
    public function setSpotifyAvailableForBoolSetsSpotifyAvailable(): void
    {
        $this->subject->setSpotifyAvailable(true);

        self::assertEquals(true, $this->subject->_get('spotifyAvailable'));
    }

    /**
     * @test
     */
    public function getAppleMusicAvailableReturnsInitialValueForBool(): void
    {
        self::assertFalse($this->subject->getAppleMusicAvailable());
    }

    /**
     * @test
     */
    public function setAppleMusicAvailableForBoolSetsAppleMusicAvailable(): void
    {
        $this->subject->setAppleMusicAvailable(true);

        self::assertEquals(true, $this->subject->_get('appleMusicAvailable'));
    }

    /**
     * @test
     */
    public function getSongsReturnsInitialValueForSong(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getSongs()
        );
    }

    /**
     * @test
     */
    public function setSongsForObjectStorageContainingSongSetsSongs(): void
    {
        $song = new \HannaRodler\Albums\Domain\Model\Song();
        $objectStorageHoldingExactlyOneSongs = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneSongs->attach($song);
        $this->subject->setSongs($objectStorageHoldingExactlyOneSongs);

        self::assertEquals($objectStorageHoldingExactlyOneSongs, $this->subject->_get('songs'));
    }

    /**
     * @test
     */
    public function addSongToObjectStorageHoldingSongs(): void
    {
        $song = new \HannaRodler\Albums\Domain\Model\Song();
        $songsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $songsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($song));
        $this->subject->_set('songs', $songsObjectStorageMock);

        $this->subject->addSong($song);
    }

    /**
     * @test
     */
    public function removeSongFromObjectStorageHoldingSongs(): void
    {
        $song = new \HannaRodler\Albums\Domain\Model\Song();
        $songsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $songsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($song));
        $this->subject->_set('songs', $songsObjectStorageMock);

        $this->subject->removeSong($song);
    }

    /**
     * @test
     */
    public function getRatingsReturnsInitialValueForRating(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getRatings()
        );
    }

    /**
     * @test
     */
    public function setRatingsForObjectStorageContainingRatingSetsRatings(): void
    {
        $rating = new \HannaRodler\Albums\Domain\Model\Rating();
        $objectStorageHoldingExactlyOneRatings = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneRatings->attach($rating);
        $this->subject->setRatings($objectStorageHoldingExactlyOneRatings);

        self::assertEquals($objectStorageHoldingExactlyOneRatings, $this->subject->_get('ratings'));
    }

    /**
     * @test
     */
    public function addRatingToObjectStorageHoldingRatings(): void
    {
        $rating = new \HannaRodler\Albums\Domain\Model\Rating();
        $ratingsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $ratingsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($rating));
        $this->subject->_set('ratings', $ratingsObjectStorageMock);

        $this->subject->addRating($rating);
    }

    /**
     * @test
     */
    public function removeRatingFromObjectStorageHoldingRatings(): void
    {
        $rating = new \HannaRodler\Albums\Domain\Model\Rating();
        $ratingsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $ratingsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($rating));
        $this->subject->_set('ratings', $ratingsObjectStorageMock);

        $this->subject->removeRating($rating);
    }

    /**
     * @test
     */
    public function getGenresReturnsInitialValueForGenre(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getGenres()
        );
    }

    /**
     * @test
     */
    public function setGenresForObjectStorageContainingGenreSetsGenres(): void
    {
        $genre = new \HannaRodler\Albums\Domain\Model\Genre();
        $objectStorageHoldingExactlyOneGenres = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneGenres->attach($genre);
        $this->subject->setGenres($objectStorageHoldingExactlyOneGenres);

        self::assertEquals($objectStorageHoldingExactlyOneGenres, $this->subject->_get('genres'));
    }

    /**
     * @test
     */
    public function addGenreToObjectStorageHoldingGenres(): void
    {
        $genre = new \HannaRodler\Albums\Domain\Model\Genre();
        $genresObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $genresObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($genre));
        $this->subject->_set('genres', $genresObjectStorageMock);

        $this->subject->addGenre($genre);
    }

    /**
     * @test
     */
    public function removeGenreFromObjectStorageHoldingGenres(): void
    {
        $genre = new \HannaRodler\Albums\Domain\Model\Genre();
        $genresObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $genresObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($genre));
        $this->subject->_set('genres', $genresObjectStorageMock);

        $this->subject->removeGenre($genre);
    }
}
