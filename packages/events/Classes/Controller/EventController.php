<?php

declare(strict_types=1);

namespace Goldland\Events\Controller;

use Goldland\Events\Domain\Model\event;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use Goldland\Events\Domain\Repository\EventRepository;

/**
 * This file is part of the "goldland/Events" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * EventController
 */
class EventController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * eventRepository
     *
     * @var EventRepository $eventRepository
     */
    protected $eventRepository = null;

    /**
     * @param EventRepository $eventRepository
     */
    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    /**
     * Action list
     *
     * @return void
     * @throws \TYPO3\CMS\Extbase\Mvc\Exception\NoSuchArgumentException
     */
    public function listAction()
    {
        $events = $this->eventRepository->findAll();
        $this->view->assign('events', $events);
    }

}
