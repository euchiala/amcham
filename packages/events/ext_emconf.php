<?php

/**
 * Extension Manager/Repository config file for ext "events".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Events',
    'description' => 'displays the list of events',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
            'fluid_styled_content' => '11.5.0-11.5.99',
            'rte_ckeditor' => '11.5.0-11.5.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Goldland\\Events\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Goldland',
    'author_email' => 'info@goldland.com',
    'author_company' => 'Goldland',
    'version' => '1.0.0',
];
