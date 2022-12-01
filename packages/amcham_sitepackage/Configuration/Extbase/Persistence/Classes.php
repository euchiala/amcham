<?php
return [
    \Evoweb\SfRegister\Domain\Model\FrontendUser::class => [
        'subclasses' => [
            0 => \Goldland\amchamSitepackage\Domain\Model\FrontendUser::class,
        ]
    ],
    \Goldland\amchamSitepackage\Domain\Model\FrontendUser::class => [
        'tableName' => 'fe_users',
        'properties' => [
            'bnsr' => [
                'fieldName' => 'bnsr'
            ]
        ]
    ]
];

