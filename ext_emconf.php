<?php

/**
 * Extension Manager/Repository config file for ext "importer".
 * @phpstan-ignore-next-line
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Doctrine Migrations',
    'description' => 'TYPO3 extension for versioned migration files, integrating doctrine/migrations',
    'category' => 'extensions',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-14.3.99',
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Itx\\DoctrineMigrations\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'it.x informationssysteme gmbh',
    'author_email' => 'support@itx.de',
    'version' => '1.0.2',
];
