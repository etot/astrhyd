<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201101142250 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE site_station');
        $this->addSql('ALTER TABLE site ADD stations_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E4B1E3C4B4 FOREIGN KEY (stations_id) REFERENCES station (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_694309E4B1E3C4B4 ON site (stations_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE site_station (site_id INT NOT NULL, station_id INT NOT NULL, PRIMARY KEY(site_id, station_id))');
        $this->addSql('CREATE INDEX idx_649d1a7af6bd1646 ON site_station (site_id)');
        $this->addSql('CREATE INDEX idx_649d1a7a21bdb235 ON site_station (station_id)');
        $this->addSql('ALTER TABLE site_station ADD CONSTRAINT fk_649d1a7af6bd1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE site_station ADD CONSTRAINT fk_649d1a7a21bdb235 FOREIGN KEY (station_id) REFERENCES station (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE site DROP CONSTRAINT FK_694309E4B1E3C4B4');
        $this->addSql('DROP INDEX IDX_694309E4B1E3C4B4');
        $this->addSql('ALTER TABLE site DROP stations_id');
    }
}
