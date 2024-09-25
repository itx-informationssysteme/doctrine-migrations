<?php

namespace Itx\Migrator;

use Doctrine\Migrations\DependencyFactory as Doctrine;
use Doctrine\DBAL\DriverManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\Configuration\Connection\ExistingConnection;
use Psr\Log\LoggerInterface;

class DependencyFactory {

    public static function createFactory(LoggerInterface|null $logger = null) : ?Doctrine
    {
        $dbParams = [
            'dbname' => $GLOBALS['TYPO3_CONF_VARS']['DB']['dbname'],
            'user' => $GLOBALS['TYPO3_CONF_VARS']['DB']['user'],
            'password' => $GLOBALS['TYPO3_CONF_VARS']['DB']['password'],
            'host' => $GLOBALS['TYPO3_CONF_VARS']['DB']['host'],
            'driver' => $GLOBALS['TYPO3_CONF_VARS']['DB']['Connections']['Default']['driver'],
        ];
        
        $connection = DriverManager::getConnection($dbParams);

        $config = new PhpFile('packages/migrator/migrations.php'); // Or use one of the Doctrine\Migrations\Configuration\Configuration\* loaders

        return Doctrine::fromConnection($config, new ExistingConnection($connection), $logger);
    }
}