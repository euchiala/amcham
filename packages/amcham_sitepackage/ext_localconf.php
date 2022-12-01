<?php
defined('TYPO3_MODE') || die();

/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['amcham_sitepackage'] = 'EXT:amcham_sitepackage/Configuration/RTE/Default.yaml';

/***************
 * PageTS
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:amcham_sitepackage/Configuration/TsConfig/Page/All.tsconfig">');
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['sf_register']['extender'][\Evoweb\SfRegister\Domain\Model\FrontendUser::class]['amchamSitepackage'] = 'EXT:amchamSitepackage/Classes/Domain/Model/FrontendUser.php';
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\Evoweb\SfRegister\Domain\Repository\FrontendUserRepository::class] = [
    'className' => \Goldland\amchamSitepackage\Domain\Repository\FrontendUserRepository::class,
];
$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\Evoweb\SfRegister\Controller\FeuserCreateController::class] = [
    'className' => \Goldland\amchamSitepackage\Controller\ExtendFeuserCreateController::class
];
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
    '@import \' EXT:amcham_sitepackage/Configuration/TypoScript/Extension/Sf_register/Fields.typoscript\''
    );
