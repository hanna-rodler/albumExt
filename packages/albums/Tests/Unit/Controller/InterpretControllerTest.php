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
class InterpretControllerTest extends UnitTestCase
{
    /**
     * @var \HannaRodler\Albums\Controller\InterpretController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\HannaRodler\Albums\Controller\InterpretController::class))
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
    public function listActionFetchesAllInterpretsFromRepositoryAndAssignsThemToView(): void
    {
        $allInterprets = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $interpretRepository = $this->getMockBuilder(\HannaRodler\Albums\Domain\Repository\InterpretRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $interpretRepository->expects(self::once())->method('findAll')->will(self::returnValue($allInterprets));
        $this->subject->_set('interpretRepository', $interpretRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('interprets', $allInterprets);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenInterpretToView(): void
    {
        $interpret = new \HannaRodler\Albums\Domain\Model\Interpret();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('interpret', $interpret);

        $this->subject->showAction($interpret);
    }
}
