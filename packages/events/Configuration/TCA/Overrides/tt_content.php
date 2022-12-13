<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Events',
    'Eventlist',
    'eventList'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Events',
    'Speakerlist',
    'speakerList'
);
