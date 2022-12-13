<?php

declare(strict_types=1);

namespace Goldland\AmchamSitepackage\Controller;

use GeorgRinger\News\Controller\NewsController as ControllerNewsController;
use GeorgRinger\News\Domain\Model\News;
use GeorgRinger\News\Event\NewsDetailActionEvent;
use GeorgRinger\News\Event\NewsListActionEvent;
use GeorgRinger\News\Pagination\QueryResultPaginator;
use GeorgRinger\News\Utility\Cache;
use GeorgRinger\News\Utility\Page;
use \Goldland\AmchamSitepackage\Domain\Repository\NewsRepository;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface;

/**
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 
 */

/**
 * NewsController
 */
class NewsController extends  ControllerNewsController
{
  
    /**
     * newsRepositoryExtended
     *
     * @var NewsExtendedRepository
     */

    protected $newsRepositoryExtended = null;
    protected $check = null;

    // /**
    //  * NewsController constructor.
    //  * @param \GeorgRinger\News\Domain\Repository\NewsRepository $newsRepository
    //  * @param \GeorgRinger\News\Domain\Repository\CategoryRepository $categoryRepository
    //  * @param \GeorgRinger\News\Domain\Repository\TagRepository $tagRepository
    //  * @param \Goldland\AmchamSitepackage\Domain\Repository\NewsRepository $newRepositoryExtended
    //  */
    // public function __construct(
    //     \GeorgRinger\News\Domain\Repository\NewsRepository $newsRepository,
    //     \GeorgRinger\News\Domain\Repository\CategoryRepository $categoryRepository,
    //     \GeorgRinger\News\Domain\Repository\TagRepository $tagRepository,
    //     \Goldland\AmchamSitepackage\Domain\Repository\NewsRepository $newRepositoryExtended
    // ) {
    //     $this->newsRepository = $newsRepository;
    //     $this->categoryRepository = $categoryRepository;
    //     $this->tagRepository = $tagRepository;
    //     $this->newRepositoryExtended = $newRepositoryExtended;
    // }

   

    /**
     * Output a list view of news
     *
     * @param array|null $overwriteDemand
     *
     * @return void
     */
    public function gridAction(array $overwriteDemand = null)
    {
        $this->forwardToDetailActionWhenRequested();

        $demand = $this->createDemandObjectFromSettings($this->settings);
        $demand->setActionAndClass(__METHOD__, __CLASS__);

        if ((int)($this->settings['disableOverrideDemand'] ?? 1) !== 1 && $overwriteDemand !== null) {
            $demand = $this->overwriteDemandObject($demand, $overwriteDemand);
        }
        $newsRecords = $this->newsRepository->findDemanded($demand);

        $assignedValues = [
            'news' => $newsRecords,
            'overwriteDemand' => $overwriteDemand,
            'demand' => $demand,
            'categories' => null,
            'tags' => null,
            'settings' => $this->settings,
        ];

        if ($demand->getCategories() !== '') {
            $categoriesList = $demand->getCategories();
            if (is_string($categoriesList)) {
                $categoriesList = GeneralUtility::trimExplode(',', $categoriesList);
            }
            if (!empty($categoriesList)) {
                $assignedValues['categories'] = $this->categoryRepository->findByIdList($categoriesList);
            }
        }

        if ($demand->getTags() !== '') {
            $tagList = $demand->getTags();
            if (!is_array($tagList)) {
                $tagList = GeneralUtility::trimExplode(',', $tagList);
            }
            if (!empty($tagList)) {
                $assignedValues['tags'] = $this->tagRepository->findByIdList($tagList);
            }
        }

        $event = $this->eventDispatcher->dispatch(new NewsListActionEvent($this, $assignedValues, $this->request));
        $this->view->assignMultiple($event->getAssignedValues());

        // pagination
        $paginationConfiguration = $this->settings['list']['paginate'] ?? [];
        $itemsPerPage = (int)(($paginationConfiguration['itemsPerPage'] ?? '') ?: 10);
        $maximumNumberOfLinks = (int)($paginationConfiguration['maximumNumberOfLinks'] ?? 0);

        $currentPage = max(1, $this->request->hasArgument('currentPage') ? (int)$this->request->getArgument('currentPage') : 1);
        $paginator = GeneralUtility::makeInstance(QueryResultPaginator::class, $event->getAssignedValues()['news'], $currentPage, $itemsPerPage, (int)($this->settings['limit'] ?? 0), (int)($this->settings['offset'] ?? 0));
        $paginationClass = $paginationConfiguration['class'] ?? SimplePagination::class;
        $pagination = $this->getPagination($paginationClass, $maximumNumberOfLinks, $paginator);

        $this->view->assign('pagination', [
            'currentPage' => $currentPage,
            'paginator' => $paginator,
            'pagination' => $pagination,
        ]);

        Cache::addPageCacheTagsByDemandObject($demand);
    }
     /**
     
     * @param $categories
     */
    public function filterAction()
    {   
        $objectManager = GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
        $this->newsExtendedRepository = $objectManager->get(NewsRepository::class);

        $categories = null;
        $category = null;
         if ($this->request->hasArgument('categories')) {
            $categories = $this->request->getArgument('categories');
        }
        // if($this->request->hasArgument('tx_news_pi1')){
        //     $result = $this->request->getArgument('tx_news_pi1');
        //     foreach( $result as $key => $val){
        //         $categories = $val;
        //     }
        // } else {
        //         $categories[0] = $this->request->getArgument('categories');
        // }
    
        $filtredNews = $this->newsExtendedRepository->fetchByFilter($categories);
        // debug($filtredNews[0]->getCategories());
        foreach( $filtredNews[0]->getCategories() as $key => $val){
       
            $category =  $val->getTitle();
        }
        $assignedValues = [
            'class' => $category,
            'data' => $this->configurationManager->getContentObject()->data,
            'news' => $filtredNews
        ];

        $this->view->assignMultiple($assignedValues);
        
    }
}
