<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201101143613 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site DROP CONSTRAINT fk_694309e4b1e3c4b4');
        $this->addSql('DROP INDEX idx_694309e4b1e3c4b4');
        $this->addSql('ALTER TABLE site DROP stations_id');
        $this->addSql('ALTER TABLE station ADD site_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE station ADD CONSTRAINT FK_9F39F8B1F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9F39F8B1F6BD1646 ON station (site_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE site ADD stations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT fk_694309e4b1e3c4b4 FOREIGN KEY (stations_id) REFERENCES station (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_694309e4b1e3c4b4 ON site (stations_id)');
        $this->addSql('ALTER TABLE station DROP CONSTRAINT FK_9F39F8B1F6BD1646');
        $this->addSql('DROP INDEX IDX_9F39F8B1F6BD1646');
        $this->addSql('ALTER TABLE station DROP site_id');
    }
}
