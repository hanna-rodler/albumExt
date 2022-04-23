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
class AlbumControllerTest extends UnitTestCase
{
    /**
     * @var \HannaRodler\Albums\Controller\AlbumController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\HannaRodler\Albums\Controller\AlbumController::class))
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
    public function listActionFetchesAllAlbumsFromRepositoryAndAssignsThemToView(): void
    {
        $allAlbums = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $albumRepository = $this->getMockBuilder(\HannaRodler\Albums\Domain\Repository\AlbumRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $albumRepository->expects(self::once())->method('findAll')->will(self::returnValue($allAlbums));
        $this->subject->_set('albumRepository', $albumRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('albums', $allAlbums);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenAlbumToView(): void
    {
        $album = new \HannaRodler\Albums\Domain\Model\Album();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('album', $album);

        $this->subject->showAction($album);
    }
}
