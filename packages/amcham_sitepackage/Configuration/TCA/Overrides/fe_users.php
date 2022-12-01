<?php
defined('TYPO3_MODE') or die();

$temporaryColumns = array(
    'bnsr' => array(
        'target'=> '',
        'exclude' => 1,
        'label' => 'bnsr',
        'config' => array(
            'type' => 'input',
            'size' => 20,
            'max' => 20,
            'eval' => 'trim',
        )
    ),
);


\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $temporaryColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('fe_users', 'bnsr');