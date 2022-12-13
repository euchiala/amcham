<?php
return [
    \GeorgRinger\News\Domain\Model\News::class => [
        'subclasses' => [
            0 => \Goldland\AmchamSitepackage\Domain\Model\News::class
        ]
    ],
    Goldland\AmchamSitepackage\Domain\Model\News::class => [
        'tableName' => 'tx_news_domain_model_news',
        'recordType' => 0,
    ],   
    \Evoweb\SfRegister\Domain\Model\FrontendUser::class => [
        'subclasses' => [
            0 => \Goldland\AmchamSitepackage\Domain\Model\FrontendUser::class,
        ]
    ],
    \Goldland\AmchamSitepackage\Domain\Model\FrontendUser::class => [
        'tableName' => 'fe_users',
        'properties' => [
            'bnsr' => [
                'fieldName' => 'bnsr'
            ]
        ]
    ]
];

