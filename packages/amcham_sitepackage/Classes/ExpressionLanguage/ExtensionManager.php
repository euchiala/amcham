<?php
declare(strict_types=1);


namespace Goldland\amchamSitepackage\ExpressionLanguage;


use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

/**
 * ExtensionManager
 */
class ExtensionManager
{
    /**
     * @param string $extensionKey
     * @return bool
     */
    public function isLoaded($extensionKey): bool
    {
        return ExtensionManagementUtility::isLoaded($extensionKey);
    }
}
