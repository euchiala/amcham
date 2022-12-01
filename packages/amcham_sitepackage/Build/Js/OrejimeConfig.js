// var GTM_UA_1 = 'UA-771523-1';
var GTM_UA_1 = 'UA-XXXXX';

var lang = 'en';
var currentUrlLink = document.createElement('a');
currentUrlLink.href = location.href;

var config = {
    elementID: 'cookieNotice',
    cookieName: 'orejime',
    cookieExpiresAfterDays: 365,
    privacyPolicy: '/datenschutz',
    default: false,
    mustConsent: false,
    lang: lang,
    // mustNotice: currentUrlLink.pathname == '/',
    mustNotice: true,
    implicitConsent: false,
    logo: false,
    debug: false,
    translations: {
        de: {
                consentModal: {
                        title: 'Informationen die wir sammeln',
                        description: 'Hier k\xF6nnen Sie einsehen und anpassen, welche Information wir \xFCber Sie sammeln.\n',
                },
                consentNotice: {
                        title: 'Cookie Hinweis',
                        changeDescription: 'Es gab \xC4nderungen seit Ihrem letzten Besuch, bitte aktualisieren Sie Ihre Auswahl.',
                        description: 'Diese Website nutzt Cookies, um Ihnen den bestmöglichen Service zu bieten und die Nutzerfreundlichkeit der Webseite zu verbessern. Mit dem Klicken auf „Akzeptieren“ stimmen Sie der Verwendung von Cookies zu. Unter „Einstellungen“ können Sie die Cookies individuell anpassen. \n \n',
                        learnMore: 'Einstellungen',
                        privacyPolicy: {
                                name: 'Datenschutzerkl\xE4rung',
                                text: 'Bitte lesen Sie unsere {privacyPolicy} um weitere Details zu erfahren.\n',
                        },
                },
                accept: 'Akzeptieren',
                close: 'Ablehnen',
                saveData: 'Speichern Sie meine Konfiguration.',
                newWindow: 'neues Fenster',
                save: 'Speichern',
                decline: 'Ablehnen',
                acceptAll: 'Alles akzeptieren',
                declineAll: 'Alles ablehnen',
                enabled: "",
                disabled: "",
                purposes: {
                        marketing: 'Marketing',
                        statistics: 'Google Analytics',
                        security: 'System/Sicherheit',
                        analytics: 'Verbesserung der Webseite',
                        ads: 'Werbung',
                        video: 'Video',
                },
                basics: {
                        title: 'System Cookies',
                        description: 'Dies sind die Cookies, die für den reibungslosen Ablauf dieser Website zwingend notwendig sind.',
                },
                statistics: {
                        title: 'Google Analytics',
                        description: 'Analytics Cookies helfen Webseiten-Besitzern zu verstehen, wie Besucher mit Webseiten interagieren.',

                },
                analytics: {
                        title: 'Verbesserung der Webseite',
                        description: ''
                },
                marketing: {
                        title: 'title DE',
                        description: 'description DE',
                },
                app: {
                        required: {
                                title: '(erforderlich)',
                                description: 'description DE',
                        },
                        purposes: 'Zwecke',
                        purpose: 'Zweck'
                },
                poweredBy: ''
        },
        en: {
                consentModal: {
                        title: 'Informations that we collect',
                        description: 'Here you can see and customize the information that we collect about you.\n',

                },
                consentNotice: {
                        title: 'Cookie Notice',
                        changeDescription: 'There were changes since your last visit, please update your consent.',
                        description: 'This website uses cookies to provide you with the best possible service and to improve the user-friendliness of the website. By clicking "Accept", you consent to the use of cookies. Under "Settings" you can customize the cookies. \n \n',
                        learnMore: 'Settings',
                        privacyPolicy: {
                                name: 'privacy policy',
                                text: 'To learn more, please read our {privacyPolicy}.\n',
                        },
                },
                accept: 'Accept',
                acceptAll: 'Accept all apps',
                save: 'Save',
                saveData: 'Save my configuration on collected information',
                newWindow: 'new window',
                decline: 'Decline',
                declineAll: 'Decline all apps',
                close: 'Close',
                enabled: '',
                disabled: '',
                purposes: {
                        marketing: 'Marketing',
                        statistics: 'Google Analytics',
                        security: 'System/Security',
                        analytics: 'Website optimization',
                        ads: 'Advertisement',
                        video: 'Video',
                },
                basics: {
                        description: 'These cookies are essential for running our web sites and are the key to providing you a seamless experience.',
                },
                statistics: {
                        title: 'Google Analytics',
                        description: 'Analytics cookies help website owners understand how visitors interact with web pages.',
                },
                analytics: {
                        title: 'Website optimization',
                        description: ''
                },
                marketing: {
                        title: 'title EN',
                        description: 'description EN',
                },
                app: {
                        required: {
                                title: '(required)',
                                description: 'These cookies are necessary to use this website					',
                        },
                        purposes: 'Purposes',
                purpose: 'Purpose'
                },
                poweredBy: ''
        },
    },
    apps: [
        //---------------------------
        // essential
        //---------------------------
        {
            name: "essential",
            title: "CMS / TYPO3",
            cookies: [
                "fe_typo_user"
            ],
            purposes: ["security"],
            callback: function(consent, app){
            },
            required: true,
            optOut: false,
            default: true,
            onlyOnce: false
        },
        //---------------------------
        // google analytics
        //---------------------------
        {
            name: "google-analytics",
            title: "Google Analytics",
            cookies: [
                '_ga',
                '_gat',
                '_gid',
                '__utma',
                '__utmb',
                '__utmc',
                '__utmt',
                '__utmz',
                new RegExp("^_gat_gtag_"),
                new RegExp("^_gat_")
            ],
            purposes: ["analytics"],
            callback: function(consent, app){
            },
            required: false,
            optOut: false,
            default: true,
            onlyOnce: false
        }
    ],
};

window.orejimeConfig = config;
window.cookieManager = window.Orejime.init(window.orejimeConfig);

var cookieManagerLinks = document.querySelectorAll('a.cookie-manager'),
    cookieManagerLinkEventListener = function (event) {
        'use strict';
        event.preventDefault();
        window.cookieManager.show();
    };


for (var i = 0; i < cookieManagerLinks.length; i++) {
    if (cookieManagerLinks[i]) {
        cookieManagerLinks[i].addEventListener('click', cookieManagerLinkEventListener);
    }
}
