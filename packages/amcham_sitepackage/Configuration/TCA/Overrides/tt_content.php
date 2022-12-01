<?php

$ll = 'LLL:EXT:amcham_sitepackage/Resources/Private/Language/locallang_db.xlf:';
$plugins = [
     'List' => [
        'flexform' => false,
        'excludelist' => 'header,header_layout,header_position,subheader,layout,select_key'
    ],
];

$columns = [
    'number' => [
        'exclude' => 1,
        'label' => $ll . 'number',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim',
        ],
    ],
    'text_on_img' => [
        'exclude' => 1,
        'label' => $ll . 'textonimg',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'eval' => 'trim',
        ],
    ],
   
    'space_before_class' => [
        'exclude' => true,
        'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:space_before_class',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.default_value', ''],
                ['mt-10', 'mt-10'],
                ['mt-20', 'mt-20'],
                ['mt-30', 'mt-30'],
                ['mt-40', 'mt-40'],
                ['mt-50', 'mt-50'],
                ['mt-60', 'mt-60'],
                ['mt-70', 'mt-70'],
                ['mt-80', 'mt-80'],
                ['mt-90', 'mt-90'],
                ['mt-100', 'mt-100'],
            ],
            'default' => ''
        ]
    ],
    'space_after_class' => [
        'exclude' => true,
        'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:space_after_class',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.default_value', ''],
                ['mb-10', 'mb-10'],
                ['mb-20', 'mb-20'],
                ['mb-30', 'mb-30'],
                ['mb-40', 'mb-40'],
                ['mb-50', 'mb-50'],
                ['mb-60', 'mb-60'],
                ['mb-70', 'mb-70'],
                ['mb-80', 'mb-80'],
                ['mb-90', 'mb-90'],
                ['mb-100', 'mb-100'],
            ],
            'default' => ''
        ]
    ],
    'space_in_top' => [
        'exclude' => true,
        'label' => $ll.'tt_content.spaceInTop',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.default_value', ''],
                ['pt-10', 'pt-10'],
                ['pt-20', 'pt-20'],
                ['pt-30', 'pt-30'],
                ['pt-40', 'pt-40'],
                ['pt-50', 'pt-50'],
                ['pt-60', 'pt-60'],
                ['pt-70', 'pt-70'],
                ['pt-80', 'pt-80'],
                ['pt-90', 'pt-90'],
                ['pt-100', 'pt-100'],
            ],
            'default' => ''
        ]
    ],
    'space_in_bottom' => [
        'exclude' => true,
        'label' => $ll.'tt_content.spaceInBottom',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.default_value', ''],
                ['pb-10', 'pb-10'],
                ['pb-20', 'pb-20'],
                ['pb-30', 'pb-30'],
                ['pb-40', 'pb-40'],
                ['pb-50', 'pb-50'],
                ['pb-60', 'pb-60'],
                ['pb-70', 'pb-70'],
                ['pb-80', 'pb-80'],
                ['pb-90', 'pb-90'],
                ['pb-100', 'pb-100'],
            ],
            'default' => '',
        ]
    ],
    'title' => [
        'label' => 'title',
        'config' => [
            'type' => 'input',
            'eval' => 'trim',
        ],
    ],
    'media_file' => [
        'label' => 'Hero image',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            'image',
            [
                'maxitems' => 6,
            ],
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
    ],
    'link' => [
        'label' => 'link',
        'config' => [
            'type' => 'input',
            'renderType' => 'inputLink',
            'size' => 50,
            'max' => 1024,
            'eval' => 'trim',
            'softref' => 'typolink'
        ],
    ],
    'link_text' => [
        'label' => 'linkText',
        'config' => [
            'type' => 'input',
            'eval' => 'trim',
        ],
    ],
    'background_color' => [
        'label' => $ll . 'background_color',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['White', 'bg-white'],
                ['Gradient Bleu', 'bg-gradient-bleu'],
                ['Light Blue', 'bg-light-blue'],
            ],

        ]
    ],
];

/**
 * OVERRIDE HEADERS PALETTE
 */
$GLOBALS['TCA']['tt_content']['palettes']['headers'] = [
    'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers',
    'showitem' => '
        header;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_formlabel,
        header_layout;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:header_layout_formlabel,
    ',
];

/**
 * tt_content palette
 */
$GLOBALS['TCA']['tt_content']['palettes']['link'] = [
    'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.link',
    'showitem' => '
        link,
        link_text
    ',
];

/**
 * Spacing palette
 */
$GLOBALS['TCA']['tt_content']['palettes']['frames'] = [
    'label' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames',
    'showitem' => '
        frame_class;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:frame_class_formlabel,
        space_before_class;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:space_before_class_formlabel,
        space_after_class;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:space_after_class_formlabel,
        --linebreak--,
        space_in_top,
        space_in_bottom,
          --linebreak--,
         background_color,

    ',
];

/**
 *
 * ADD EXTEND COLUMN TO TT_CONTENT
 *
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    $columns
);

/************
 * FLEX FORMS
 ************/
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['amchamsitepackage_cardlist'] = 'recursive, pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist']['amchamsitepackage_cardshow'] = 'recursive, pages';
$GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist']['amchamsitepackage_cardlist'] = 'pi_flexform';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
    'amchamsitepackage_cardlist',
    'FILE:EXT:amcham_sitepackage/Configuration/FlexForm/CardList.xml'
);

/*********************
 * REGISTER Card PLUGIN
 *********************/
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'amcham_sitepackage',
    'CardList',
    'Card List',
    'amchamsitepackage-cardlist'
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'amcham_sitepackage',
    'CardShow',
    'Card Detail',
    'amchamsitepackage-cardshow'
);
\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'amcham_sitepackage',
    'RelatedCards',
    'Related Cards',
    'amchamsitepackage-relatedcards'
);