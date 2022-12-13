<?php
namespace Goldland\AmchamSitepackage\PageTitle;

use \TYPO3\CMS\Core\Utility\GeneralUtility;
use \TYPO3\CMS\Extbase\Object\ObjectManager;
/**
 * This class will take care of the default page title
 */
class PageTitleProvider extends \TYPO3\CMS\Core\PageTitle\AbstractPageTitleProvider
{
    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }
}