<?php

/*
 *
 * For the full copyright and license information, please read the
 * LICENSE file that was distributed with this source code.
 */

defined('TYPO3_MODE') || die();
$ll = 'LLL:EXT:amcham_sitepackage/Resources/Private/Language/locallang_db.xlf:';

/***************
 * Add Content Element
 */
if (!isset($GLOBALS['TCA']['tt_content']['types']['amchamsitepackage_ceheroelement'])) {
    $GLOBALS['TCA']['tt_content']['types']['amchamsitepackage_ceheroelement'] = [];
}


/***************
 * Add content element to selector list
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:amcham_sitepackage/Resources/Private/Language/locallang_db.xlf:ceheroelement',
        'amchamsitepackage_ceheroelement',
        'amchamsitepackage-ceheroelement'
    ],
    '--div--',
    'after'
);

/***************
 * Assign Icon
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['amchamsitepackage_ceheroelement'] = 'amchamsitepackage-ceheroelement';

/********
 * Add new Palette
 */
$GLOBALS['TCA']['tt_content']['palettes']['linkPalette'] = ['showitem' => 'link_text,link'];

/***************
 * Configure element type
 */

$GLOBALS['TCA']['tt_content']['types']['amchamsitepackage_ceheroelement'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['amchamsitepackage_ceheroelement'],
    [
        'showitem' => '
        --palette--;LLL:EXT:/path/to/locallang_ttc.xlf:palette.general;
        general,
        header,
        bodytext,
        link, 
        link_text,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.media,assets,
        '
    ]
);
$GLOBALS['TCA']['tt_content']['types']['amchamsitepackage_ceheroelement']['columnsOverrides'] = [
    'bodytext' => [
        'config' => [
            'type' => 'text',
            'eval' => 'trim',
            'enableRichtext' => true,
            'cols' => 40,
            'rows' => 4
        ],
    ],
];
 