<?php

namespace Itx\Migrator;

use Doctrine\Migrations\Configuration\Migration\ConfigurationLoader;
use Doctrine\Migrations\Configuration\Configuration;
use Doctrine\Migrations\Configuration\Migration\ConfigurationArray;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

class ArrayConfig implements ConfigurationLoader{

    public $table_name;
    public $version_column_name;
    public $version_column_length;
    public $executed_at_column_name;
    public $execution_time_column_name;
    public $all_or_nothing;
    public $transactional;
    public $check_database_platform;
    public $organize_migrations;
    public $connection;
    public $em; 

    public $configArray;

    public function __construct($table_name = 'doctrine_migration_versions', $version_column_name = 'version', $version_column_length = 191, $executed_at_column_name = 'executed_at', $execution_time_column_name = 'execution_time', $all_or_nothing = true,  $transactional = true, $check_database_platform = true, $organize_migrations = 'none', $connection = null, $em = null){
        $this->table_name = $table_name;
        $this->version_column_name = $version_column_name;
        $this->version_column_length = $version_column_length;
        $this->executed_at_column_name = $executed_at_column_name;
        $this->execution_time_column_name = $execution_time_column_name;
        $this->all_or_nothing = $all_or_nothing;
        $this->transactional = $transactional;
        $this->check_database_platform = $check_database_platform;
        $this->organize_migrations = $organize_migrations;
        $this->connection = $connection;
        $this->em = $em; 
    }

    public function getConfiguration(): Configuration {

        $config = array (
            'table_storage' => [
                'table_name' => $this->table_name,
                'version_column_name' => $this->version_column_name,
                'version_column_length' => $this->version_column_length,
                'executed_at_column_name' => $this->executed_at_column_name,
                'execution_time_column_name' => $this->execution_time_column_name,
            ],
        
            'migrations_paths' => [
                $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['migrator']['Namespace'] => ExtensionManagementUtility::extPath($GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['migrator']['ExtensionKey'], '/Classes/Migrations'),
            ],
        
            'all_or_nothing' => $this->all_or_nothing,
            'transactional' => $this->transactional,
            'check_database_platform' => $this->check_database_platform,
            'organize_migrations' => $this->organize_migrations,
            'connection' => $this->connection,
            'em' => $this->em,
        );

        return (new ConfigurationArray($config))->getConfiguration();
    }
}