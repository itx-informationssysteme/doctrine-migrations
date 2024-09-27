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
            'typo3' => '12.4.0-12.4.99',
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
    'author_email' => '',
    'version' => '0.9.0',
];
