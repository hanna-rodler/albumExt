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
class RatingControllerTest extends UnitTestCase
{
    /**
     * @var \HannaRodler\Albums\Controller\RatingController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\HannaRodler\Albums\Controller\RatingController::class))
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
    public function listActionFetchesAllRatingsFromRepositoryAndAssignsThemToView(): void
    {
        $allRatings = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $ratingRepository = $this->getMockBuilder(\::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $ratingRepository->expects(self::once())->method('findAll')->will(self::returnValue($allRatings));
        $this->subject->_set('ratingRepository', $ratingRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('ratings', $allRatings);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }
}
