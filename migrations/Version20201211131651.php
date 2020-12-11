<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211131651 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE operation_prelevement DROP CONSTRAINT fk_70e45e19f6bd1646');
        $this->addSql('ALTER TABLE operation_prelevement DROP CONSTRAINT fk_70e45e1921bdb235');
        $this->addSql('DROP INDEX idx_70e45e1921bdb235');
        $this->addSql('DROP INDEX idx_70e45e19f6bd1646');
        $this->addSql('ALTER TABLE operation_prelevement DROP site_id');
        $this->addSql('ALTER TABLE operation_prelevement DROP station_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE operation_prelevement ADD site_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation_prelevement ADD station_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT fk_70e45e19f6bd1646 FOREIGN KEY (site_id) REFERENCES site (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT fk_70e45e1921bdb235 FOREIGN KEY (station_id) REFERENCES station (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_70e45e1921bdb235 ON operation_prelevement (station_id)');
        $this->addSql('CREATE INDEX idx_70e45e19f6bd1646 ON operation_prelevement (site_id)');
    }
}
