<?php

/**
 * Extension Manager/Repository config file for ext "kwm2021".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'KWM 2021',
    'description' => '',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
            'fluid_styled_content' => '10.4.0-10.4.99',
            'rte_ckeditor' => '10.4.0-10.4.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'FhHagenberg\\Kwm2021\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Hanna Rodler',
    'author_email' => 's2010456026@fhooe.at',
    'author_company' => 'FH Hagenberg',
    'version' => '1.0.0',
];
