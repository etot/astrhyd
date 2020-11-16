<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201101123608 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE station_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE station (id INT NOT NULL, finalite_id INT NOT NULL, code VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, code_masse_eau VARCHAR(255) DEFAULT NULL, nom_masse_eau VARCHAR(255) DEFAULT NULL, detail_situation TEXT DEFAULT NULL, precision_positionnement TEXT DEFAULT NULL, suivi_indicateurs_fonctionnels BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9F39F8B18CB31D21 ON station (finalite_id)');
        $this->addSql('ALTER TABLE station ADD CONSTRAINT FK_9F39F8B18CB31D21 FOREIGN KEY (finalite_id) REFERENCES finalite (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE station_id_seq CASCADE');
        $this->addSql('DROP TABLE station');
    }
}
