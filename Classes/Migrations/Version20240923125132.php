<?php

declare(strict_types=1);

namespace Itx\Migrator\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240923125132 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Test';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('CREATE TABLE example_table (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE example_table');

    }
}
