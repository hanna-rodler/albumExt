<?php

declare(strict_types=1);

namespace HannaRodler\Albums\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\CMS\Extbase\Mvc\View\ViewInterface;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Hanna Rodler 
 */
class GenreControllerTest extends UnitTestCase
{
    /**
     * @var \HannaRodler\Albums\Controller\GenreController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\HannaRodler\Albums\Controller\GenreController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllGenresFromRepositoryAndAssignsThemToView(): void
    {
        $allGenres = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $genreRepository = $this->getMockBuilder(\HannaRodler\Albums\Domain\Repository\GenreRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $genreRepository->expects(self::once())->method('findAll')->will(self::returnValue($allGenres));
        $this->subject->_set('genreRepository', $genreRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('genres', $allGenres);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenGenreToView(): void
    {
        $genre = new \HannaRodler\Albums\Domain\Model\Genre();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('genre', $genre);

        $this->subject->showAction($genre);
    }
}
