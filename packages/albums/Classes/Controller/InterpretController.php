<?php

declare(strict_types=1);

namespace HannaRodler\Albums\Controller;

use HannaRodler\Albums\Domain\Model\Dto\Filter;

/**
 * This file is part of the "Albums &amp; Songs" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * InterpretController
 */
class InterpretController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * interpretRepository
     *
     * @var \HannaRodler\Albums\Domain\Repository\InterpretRepository
     */
    protected $interpretRepository = null;

    /**
     * @param \HannaRodler\Albums\Domain\Repository\InterpretRepository $interpretRepository
     */
    public function injectInterpretRepository(\HannaRodler\Albums\Domain\Repository\InterpretRepository $interpretRepository)
    {
        $this->interpretRepository = $interpretRepository;
    }

    /**
     * action list
     *
     * @return string|object|null|void
     */
    public function listAction()
    {
        $filter = new Filter();
        $interprets = $this->interpretRepository->findByFilter($filter);
        $this->view->assign('interprets', $interprets);
    }

    /**
     * action show
     *
     * @param \HannaRodler\Albums\Domain\Model\Interpret $interpret
     * @return string|object|null|void
     */
    public function showAction(\HannaRodler\Albums\Domain\Model\Interpret $interpret)
    {
        $this->view->assign('interpret', $interpret);
    }
}
