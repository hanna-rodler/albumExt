<?php
defined('TYPO3_MODE') || die();

(static function (){
  \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Albums',
    'Default',
    [
      \HannaRodler\Albums\Controller\AlbumController::class=>'list, show, availableeverywhere, funk, worship',
      \HannaRodler\Albums\Controller\SongController::class=>'list, show',
      \HannaRodler\Albums\Controller\InterpretController::class=>'list, show',
      \HannaRodler\Albums\Controller\RatingController::class=>'list',
      \HannaRodler\Albums\Controller\GenreController::class=>'list, show'
    ],
    // non-cacheable actions
    [
      \HannaRodler\Albums\Controller\AlbumController::class=>'',
      \HannaRodler\Albums\Controller\SongController::class=>'',
      \HannaRodler\Albums\Controller\InterpretController::class=>'',
      \HannaRodler\Albums\Controller\RatingController::class=>'',
      \HannaRodler\Albums\Controller\GenreController::class=>''
    ]
  );
  
  \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Albums',
    'Songs',
    [
      \HannaRodler\Albums\Controller\SongController::class=>'list, show'
    ],
    // non-cacheable actions
    [
      \HannaRodler\Albums\Controller\AlbumController::class=>'',
      \HannaRodler\Albums\Controller\SongController::class=>'',
      \HannaRodler\Albums\Controller\InterpretController::class=>'',
      \HannaRodler\Albums\Controller\RatingController::class=>'',
      \HannaRodler\Albums\Controller\GenreController::class=>''
    ]
  );
  
  \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Albums',
    'Interpreters',
    [
      \HannaRodler\Albums\Controller\InterpretController::class=>'list, show'
    ],
    // non-cacheable actions
    [
      \HannaRodler\Albums\Controller\AlbumController::class=>'',
      \HannaRodler\Albums\Controller\SongController::class=>'',
      \HannaRodler\Albums\Controller\InterpretController::class=>'',
      \HannaRodler\Albums\Controller\RatingController::class=>'',
      \HannaRodler\Albums\Controller\GenreController::class=>''
    ]
  );
  
  \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Albums',
    'Funk',
    [
      \HannaRodler\Albums\Controller\AlbumController::class=>'funk, show'
    ],
    // non-cacheable actions
    [
      \HannaRodler\Albums\Controller\AlbumController::class=>'',
      \HannaRodler\Albums\Controller\SongController::class=>'',
      \HannaRodler\Albums\Controller\InterpretController::class=>'',
      \HannaRodler\Albums\Controller\RatingController::class=>'',
      \HannaRodler\Albums\Controller\GenreController::class=>''
    ]
  );
  
  \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Albums',
    'Availableeverywhere',
    [
      \HannaRodler\Albums\Controller\AlbumController::class=>'availableeverywhere, show'
    ],
    // non-cacheable actions
    [
      \HannaRodler\Albums\Controller\AlbumController::class=>'',
      \HannaRodler\Albums\Controller\SongController::class=>'',
      \HannaRodler\Albums\Controller\InterpretController::class=>'',
      \HannaRodler\Albums\Controller\RatingController::class=>'',
      \HannaRodler\Albums\Controller\GenreController::class=>''
    ]
  );
  
  \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
    'Albums',
    'Worship',
    [
      \HannaRodler\Albums\Controller\AlbumController::class=>'worship, show'
    ],
    // non-cacheable actions
    [
      \HannaRodler\Albums\Controller\AlbumController::class=>'',
      \HannaRodler\Albums\Controller\SongController::class=>'',
      \HannaRodler\Albums\Controller\InterpretController::class=>'',
      \HannaRodler\Albums\Controller\RatingController::class=>'',
      \HannaRodler\Albums\Controller\GenreController::class=>''
    ]
  );
  
  // wizards
  \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    default {
                        iconIdentifier = albums-plugin-default
                        title = LLL:EXT:albums/Resources/Private/Language/locallang_db.xlf:tx_albums_default.name
                        description = LLL:EXT:albums/Resources/Private/Language/locallang_db.xlf:tx_albums_default.description
                        tt_content_defValues {
                            CType = list
                            list_type = albums_default
                        }
                    }
                    songs {
                        iconIdentifier = albums-plugin-songs
                        title = LLL:EXT:albums/Resources/Private/Language/locallang_db.xlf:tx_albums_songs.name
                        description = LLL:EXT:albums/Resources/Private/Language/locallang_db.xlf:tx_albums_songs.description
                        tt_content_defValues {
                            CType = list
                            list_type = albums_songs
                        }
                    }
                    interpreters {
                        iconIdentifier = albums-plugin-interpreters
                        title = LLL:EXT:albums/Resources/Private/Language/locallang_db.xlf:tx_albums_interpreters.name
                        description = LLL:EXT:albums/Resources/Private/Language/locallang_db.xlf:tx_albums_interpreters.description
                        tt_content_defValues {
                            CType = list
                            list_type = albums_interpreters
                        }
                    }
                    funk {
                        iconIdentifier = albums-plugin-funk
                        title = LLL:EXT:albums/Resources/Private/Language/locallang_db.xlf:tx_albums_funk.name
                        description = LLL:EXT:albums/Resources/Private/Language/locallang_db.xlf:tx_albums_funk.description
                        tt_content_defValues {
                            CType = list
                            list_type = albums_funk
                        }
                    }
                    availableeverywhere {
                        iconIdentifier = albums-plugin-availableeverywhere
                        title = LLL:EXT:albums/Resources/Private/Language/locallang_db.xlf:tx_albums_availableeverywhere.name
                        description = LLL:EXT:albums/Resources/Private/Language/locallang_db.xlf:tx_albums_availableeverywhere.description
                        tt_content_defValues {
                            CType = list
                            list_type = albums_availableeverywhere
                        }
                    }
                    worship {
                        iconIdentifier = albums-plugin-worship
                        title = LLL:EXT:albums/Resources/Private/Language/locallang_db.xlf:tx_albums_worship.name
                        description = LLL:EXT:albums/Resources/Private/Language/locallang_db.xlf:tx_albums_worship.description
                        tt_content_defValues {
                            CType = list
                            list_type = albums_worship
                        }
                    }
                }
                show = *
            }
       }'
  );
  
  $iconRegistry=\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
  $iconRegistry->registerIcon(
    'albums-plugin-default',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source'=>'EXT:albums/Resources/Public/Icons/user_plugin_default.svg']
  );
  $iconRegistry->registerIcon(
    'albums-plugin-songs',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source'=>'EXT:albums/Resources/Public/Icons/user_plugin_songs.svg']
  );
  $iconRegistry->registerIcon(
    'albums-plugin-interpreters',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source'=>'EXT:albums/Resources/Public/Icons/user_plugin_interpreters.svg']
  );
  $iconRegistry->registerIcon(
    'albums-plugin-funk',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source'=>'EXT:albums/Resources/Public/Icons/user_plugin_funk.svg']
  );
  $iconRegistry->registerIcon(
    'albums-plugin-availableeverywhere',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source'=>'EXT:albums/Resources/Public/Icons/user_plugin_availableeverywhere.svg']
  );
  $iconRegistry->registerIcon(
    'albums-plugin-worship',
    \TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
    ['source'=>'EXT:albums/Resources/Public/Icons/user_plugin_worship.svg']
  );
})();
