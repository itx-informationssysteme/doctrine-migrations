<?php

namespace Itx\DoctrineMigrations;

use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Doctrine\Migrations\DependencyFactory as Doctrine;
use Psr\Log\LoggerInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

class DependencyFactory
{
    public static function createFactory(LoggerInterface|null $logger = null): ?Doctrine
    {
        $dbParams = [
            'dbname' => $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['dbname'],
            'user' => $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['user'],
            'password' => $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['password'],
            'host' => $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['host'],
            'driver' => $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['driver'],
        ];

        $connection = DriverManager::getConnection($dbParams);

        $overrideConfig = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['doctrine_migrations']['overrideConfiguration'] ?? [];

        $migrationsFilesNamespace = $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['doctrine_migrations']['migrationFilesNamespace'] ?? '';
        $migrationsFilesLocation = $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['doctrine_migrations']['migrationFilesLocation'] ?? '';
        if ($migrationsFilesLocation !== '') {
            $migrationsFilesLocation = GeneralUtility::getFileAbsFileName($migrationsFilesLocation);
        }

        $config = new ArrayConfig(array_merge_recursive([
            'table_storage' => [
                'table_name' => 'doctrine_migration_versions',
                'version_column_name' => 'version',
                'version_column_length' => 191,
                'executed_at_column_name' => 'executed_at',
                'execution_time_column_name' => 'execution_time',
            ],

            'migrations_paths' => [
                $migrationsFilesNamespace => $migrationsFilesLocation,
            ],
            'all_or_nothing' => true,
            'transactional' => true,
            'check_database_platform' => true,
            'organize_migrations' => 'none',
            'connection' => null,
            'em' => null,
        ], $overrideConfig));

        return Doctrine::fromConnection($config, new ExistingConnection($connection), $logger);
    }
}
