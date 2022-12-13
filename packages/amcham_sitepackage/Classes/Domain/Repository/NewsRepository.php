<?php

declare(strict_types=1);

namespace Goldland\AmchamSitepackage\Domain\Repository;

use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;

class NewsRepository extends \GeorgRinger\News\Domain\Repository\NewsRepository
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
     /**
     * @param $categories
     */
    public function fetchByFilter($categorie) {
      // $queryBuilder = GeneralUtility::makeInstance(ConnectionPool::class)->getQueryBuilderForTable('tx_news_domain_model_news');
      
      // return $queryBuilder->select('*')
      //     ->from('tx_news_domain_model_news','a')
      //     ->where('a.categories = :s')
      //     ->leftJoin('a','sys_category_record_mm','b','b.uid_foreign=a.uid')
      //     ->where('b.uid_local = :id')
      //     ->setParameter('id',$categorie)
      //     ->execute()
      //     ->fetchAll();
      $query = $this->createQuery();
      $constraint1 = [];
      if ($categorie) {
          $constraint1[] = $query->contains('categories', $categorie);
      }
      if (!empty($constraint1)) {
          $query
              ->matching(
                  $query->logicalAnd($constraint1)
              );
      }
      return $query->execute();
  }
}

