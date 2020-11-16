<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201109112214 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE point_prelevement_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE point_prelevement (id INT NOT NULL, site_id INT DEFAULT NULL, station_id INT DEFAULT NULL, num_base VARCHAR(255) DEFAULT NULL, support VARCHAR(255) DEFAULT NULL, coord_x_l93 DOUBLE PRECISION DEFAULT NULL, coord_y_l93 DOUBLE PRECISION DEFAULT NULL, station_point VARCHAR(255) DEFAULT NULL, reseau_station_point VARCHAR(255) DEFAULT NULL, reseau_station VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_BE1758CAF6BD1646 ON point_prelevement (site_id)');
        $this->addSql('CREATE INDEX IDX_BE1758CA21BDB235 ON point_prelevement (station_id)');
        $this->addSql('ALTER TABLE point_prelevement ADD CONSTRAINT FK_BE1758CAF6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE point_prelevement ADD CONSTRAINT FK_BE1758CA21BDB235 FOREIGN KEY (station_id) REFERENCES station (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE point_prelevement_id_seq CASCADE');
        $this->addSql('DROP TABLE point_prelevement');
    }
}
