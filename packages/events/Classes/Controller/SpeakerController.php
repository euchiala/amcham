<?php

declare(strict_types=1);

namespace Goldland\Events\Controller;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use Goldland\Events\Domain\Repository\SpeakerRepository;

/**
 * This file is part of the "Events" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * SpeakerController
 */
class SpeakerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * speakerRepository
     *
     * @var SpeakerRepository $speakerRepository
     */
    protected $speakerRepository = null;

    /**
     * @param SpeakerRepository $speakerRepository
     */
    public function __construct(SpeakerRepository $speakerRepository)
    {
        $this->speakerRepository = $speakerRepository;
    }

    /**
     * Action list
     *
     * @return string|object|null|void
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
     */
    public function listAction()
    {
        $speakers = $this->speakerRepository->findAll();
        debug($this->speakerRepository);

        $this->view->assign('speakers', $speakers);
    }

}
