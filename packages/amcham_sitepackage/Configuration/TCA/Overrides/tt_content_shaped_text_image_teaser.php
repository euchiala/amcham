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
if (!isset($GLOBALS['TCA']['tt_content']['types']['amchamsitepackage_shapedtextimageteaser'])) {
    $GLOBALS['TCA']['tt_content']['types']['amchamsitepackage_shapedtextimageteaser'] = [];
}


/***************
 * Add content element to selector list
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTcaSelectItem(
    'tt_content',
    'CType',
    [
        'LLL:EXT:amcham_sitepackage/Resources/Private/Language/locallang_db.xlf:shapedtextimageteaser',
        'amchamsitepackage_shapedtextimageteaser',
        'amchamsitepackage-shapedtextimageteaser'
    ],
    '--div--',
    'after'
);

/***************
 * Assign Icon
 */
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['amchamsitepackage_shapedtextimageteaser'] = 'amchamsitepackage-shapedtextimageteaser';


/********
 * Add new Palette
 */
$GLOBALS['TCA']['tt_content']['palettes']['linkPalette'] = ['showitem' => 'link_text,link'];


/***************
 * Configure element type
 */

$GLOBALS['TCA']['tt_content']['types']['amchamsitepackage_shapedtextimageteaser'] = array_replace_recursive(
    $GLOBALS['TCA']['tt_content']['types']['amchamsitepackage_shapedtextimageteaser'],
    [
        'showitem' => '
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
            --palette--;;headers,
            bodytext,image,image_position,
              --palette--;;linkPalette,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
            --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
        --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
        '
    ]
);
$GLOBALS['TCA']['tt_content']['types']['amchamsitepackage_shapedtextimageteaser']['columnsOverrides'] = [
    'bodytext' => [
        'config' => [
            'type' => 'text',
            'eval' => 'trim',
            'enableRichtext' => true,
            'cols' => 40,
            'rows' => 4
        ],
    ],
    'header_layout' => [
        'config' => [
            'default' => 1,
        ],
    ],
    'background_color' => [
        'config' => [
            'default' => "bg-white",
        ],
    ],
];


