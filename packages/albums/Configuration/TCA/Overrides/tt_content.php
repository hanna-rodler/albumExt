<?php
defined('TYPO3_MODE') || die();

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Albums',
    'Default',
    'Albums'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Albums',
    'Songs',
    'Songs'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Albums',
    'Interpreters',
    'Interpreters'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Albums',
    'Singlealbums',
    'Album with Songs'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Albums',
    'Albumsongs',
    'Songs of an Album'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    'Albums',
    'Availableeverywhere',
    'Available Everywhere'
);
