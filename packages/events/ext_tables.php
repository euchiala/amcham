<?php
defined('TYPO3') or die('Access denied.');

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_events_domain_model_event', 'EXT:events/Resources/Private/Language/locallang_csh_tx_events_domain_model_event.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_events_domain_model_event');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_events_domain_model_speaker', 'EXT:events/Resources/Private/Language/locallang_csh_tx_events_domain_model_speaker.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_events_domain_model_speaker');
})();
