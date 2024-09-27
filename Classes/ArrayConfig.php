<?php

namespace Itx\DoctrineMigrations;

use Doctrine\Migrations\Configuration\Configuration;
use Doctrine\Migrations\Configuration\Migration\ConfigurationArray;
use Doctrine\Migrations\Configuration\Migration\ConfigurationLoader;

class ArrayConfig implements ConfigurationLoader
{
    /**
     * @param array $config
     */
    public function __construct(
        protected array $config = []
    ) {}

    public function getConfiguration(): Configuration
    {
        return (new ConfigurationArray($this->config))->getConfiguration();
    }
}
