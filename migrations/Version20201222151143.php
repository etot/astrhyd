<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201222151143 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE point_prelevement DROP station_point');
        $this->addSql('ALTER TABLE point_prelevement DROP reseau_station_point');
        $this->addSql('ALTER TABLE point_prelevement DROP reseau_station');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE point_prelevement ADD station_point VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE point_prelevement ADD reseau_station_point VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE point_prelevement ADD reseau_station VARCHAR(255) DEFAULT NULL');
    }
}
