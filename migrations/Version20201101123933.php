<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201101123933 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE site_station (site_id INT NOT NULL, station_id INT NOT NULL, PRIMARY KEY(site_id, station_id))');
        $this->addSql('CREATE INDEX IDX_649D1A7AF6BD1646 ON site_station (site_id)');
        $this->addSql('CREATE INDEX IDX_649D1A7A21BDB235 ON site_station (station_id)');
        $this->addSql('ALTER TABLE site_station ADD CONSTRAINT FK_649D1A7AF6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE site_station ADD CONSTRAINT FK_649D1A7A21BDB235 FOREIGN KEY (station_id) REFERENCES station (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE site_station');
    }
}
