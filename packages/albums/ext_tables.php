<?php
defined('TYPO3_MODE') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_albums_domain_model_album', 'EXT:albums/Resources/Private/Language/locallang_csh_tx_albums_domain_model_album.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_albums_domain_model_album');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_albums_domain_model_song', 'EXT:albums/Resources/Private/Language/locallang_csh_tx_albums_domain_model_song.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_albums_domain_model_song');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_albums_domain_model_interpret', 'EXT:albums/Resources/Private/Language/locallang_csh_tx_albums_domain_model_interpret.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_albums_domain_model_interpret');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_albums_domain_model_rating', 'EXT:albums/Resources/Private/Language/locallang_csh_tx_albums_domain_model_rating.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_albums_domain_model_rating');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_albums_domain_model_genre', 'EXT:albums/Resources/Private/Language/locallang_csh_tx_albums_domain_model_genre.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_albums_domain_model_genre');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_albums_domain_model_nationality', 'EXT:albums/Resources/Private/Language/locallang_csh_tx_albums_domain_model_nationality.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_albums_domain_model_nationality');
})();
