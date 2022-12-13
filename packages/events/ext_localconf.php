<?php
defined('TYPO3') or die('Access denied.');
/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['events'] = 'EXT:events/Configuration/RTE/Default.yaml';

/***************
 * PageTS
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:events/Configuration/TsConfig/Page/All.tsconfig">');

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Events',
        'Eventlist',
        [
            \Goldland\Events\Controller\EventController::class => 'list'
        ],
        // non-cacheable actions
        [
            \Goldland\Events\Controller\EventController::class => 'list'
        ]
    );
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'Events',
        'Speakerlist',
        [
            \Goldland\Events\Controller\SpeakerController::class => 'list'
        ],
        // non-cacheable actions
        [
            \Goldland\Events\Controller\SpeakerController::class => 'list'
        ]
    );


    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    eventslist {
                        iconIdentifier = events-plugin-eventlist
                        title = LLL:EXT:events/Resources/Private/Language/locallang_db.xlf:tx_events_domain_model_event.name
                        description = LLL:EXT:events/Resources/Private/Language/locallang_db.xlf:tx_events_domain_model_event.description
                        tt_content_defValues {
                            CType = list
                            list_type = event_eventslist
                        }
                    }
                    speakerlist {
                        iconIdentifier = events-plugin-speakerlist
                        title = LLL:EXT:events/Resources/Private/Language/locallang_db.xlf:tx_speaker_domain_model_speaker.name
                        description = LLL:EXT:events/Resources/Private/Language/locallang_db.xlf:tx_speaker_domain_model_speaker.description
                        tt_content_defValues {
                            CType = list
                            list_type = events_speakerlist
                        }
                    }
                }
                show = *
            }
       }'
    );

    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'events-plugin-eventlist',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:events/Resources/Public/Img/Icons/event.svg']
    );
    $iconRegistry->registerIcon(
        'events-plugin-speakerlist',
        \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
        ['source' => 'EXT:events/Resources/Public/Img/Icons/event-speaker.svg']
    );
})();