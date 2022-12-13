<?php
defined('TYPO3_MODE') || die();

/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['amcham_sitepackage'] = 'EXT:amcham_sitepackage/Configuration/RTE/Default.yaml';

/***************
 * PageTS
 */
// $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['t3lib/class.t3lib_userauth.php']['postUserLookUp'][] = \Goldland\AmchamSitepackage\Hooks\OverwriteFlexForm::class . '->overwrite';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:amcham_sitepackage/Configuration/TsConfig/Page/All.tsconfig">');
$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['sf_register']['extender'][\Evoweb\SfRegister\Domain\Model\FrontendUser::class]['AmchamSitepackage'] = 'EXT:amcham_sitepackage/Classes/Domain/Model/FrontendUser.php';
// $GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\Evoweb\SfRegister\Domain\Repository\FrontendUserRepository::class] = [
//     'className' => \Goldland\AmchamSitepackage\Domain\Repository\FrontendUserRepository::class,
// ];

$GLOBALS['TYPO3_CONF_VARS']['SYS']['Objects'][\GeorgRinger\News\Controller\NewsController::class] = [
    'className' => \Goldland\AmchamSitepackage\Controller\NewsController::class
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
    '@import \'EXT:amcham_sitepackage/Configuration/TypoScript/Extension/SfRegister/Fields.typoscript\''
    );
    // \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
    //     '@import \'EXT:sf_register/Configuration/TypoScript/Fields.typoscript\''
    //     );

// (static function() {
//     \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
//         'amchamSitepackage',
//         'Customlist',
//         [
//             \Goldland\AmchamSitepackage\Controller\CustomListController::class => 'customList'
//         ],
//         // non-cacheable actions
//         [
//             \Goldland\AmchamSitepackage\Controller\CustomListController::class => 'customList'
//         ]
//     );

//     // wizards
//     \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
//         'mod {
//             wizards.newContentElement.wizardItems.plugins {
//                 elements {
//                     customlist {
//                         iconIdentifier = plugin-customlist
//                         title = customlist
//                         description = customlist
//                         tt_content_defValues {
//                             CType = list
//                             list_type = amchamSitepackage_customlist
//                         }
//                     }
//                 }
//                 show = *
//             }
//         }'
//     );
// })();
$boot = static function (): void {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'News',
        'Pi1',
        [
            \GeorgRinger\News\Controller\NewsController::class => 'grid,filter,list,detail,selectedList,dateMenu,searchForm,searchResult',
            \GeorgRinger\News\Controller\CategoryController::class => 'list',
            \GeorgRinger\News\Controller\TagController::class => 'list',
        ],
        [
            \GeorgRinger\News\Controller\NewsController::class => 'searchForm,searchResult',
        ]
    );
};
$GLOBALS['TYPO3_CONF_VARS']['EXT']['news']['switchableControllerActions']['newItems']['News->grid;News->detail;News->filter']='Grid filter';
