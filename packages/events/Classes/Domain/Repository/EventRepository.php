<?php

declare(strict_types=1);

namespace Goldland\Events\Domain\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;

/**
 * This file is part of the "Events" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Softtodo
 */

/**
 * The repository for FrontendUser
 */

class EventRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    public function initializeObject()
    {
        // see https://docs.typo3.org/m/typo3/book-extbasefluid/main/en-us/6-Persistence/2a-creating-the-repositories.html
        
        /** @var Typo3QuerySettings $querySettings */
        $querySettings = GeneralUtility::makeInstance(Typo3QuerySettings::class);

        // don't add the pid constraint
        $querySettings->setRespectStoragePage(false);

        $this->setDefaultQuerySettings($querySettings);
    }
    public function getAll($uid)
    {
        $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_events_domain_model_event');

        return $queryBuilder->select('*')
            ->from('tx_events_domain_model_event')
            ->Where('uid =:s')
            ->setParameter('s',$uid)
            ->execute()
            ->fetchAll();
    }
}
