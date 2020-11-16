<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201029155519 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE base_stockage_nomenclature_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE direction_regionale_nomenclature_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE finalite_nomenclature_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mesure_accompagnement_nomenclature_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mo_suivis_nomenclature_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE mo_travaux_nomenclature_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE modalite_operation_nomenclature_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE protocole_nomenclature_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE type_travaux_nomenclature_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE base_stockage_nomenclature (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE direction_regionale_nomenclature (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE finalite_nomenclature (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mesure_accompagnement_nomenclature (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mo_suivis_nomenclature (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE mo_travaux_nomenclature (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE modalite_operation_nomenclature (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE protocole_nomenclature (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE type_travaux_nomenclature (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE base_stockage_nomenclature_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE direction_regionale_nomenclature_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE finalite_nomenclature_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mesure_accompagnement_nomenclature_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mo_suivis_nomenclature_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE mo_travaux_nomenclature_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE modalite_operation_nomenclature_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE protocole_nomenclature_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE type_travaux_nomenclature_id_seq CASCADE');
        $this->addSql('DROP TABLE base_stockage_nomenclature');
        $this->addSql('DROP TABLE direction_regionale_nomenclature');
        $this->addSql('DROP TABLE finalite_nomenclature');
        $this->addSql('DROP TABLE mesure_accompagnement_nomenclature');
        $this->addSql('DROP TABLE mo_suivis_nomenclature');
        $this->addSql('DROP TABLE mo_travaux_nomenclature');
        $this->addSql('DROP TABLE modalite_operation_nomenclature');
        $this->addSql('DROP TABLE protocole_nomenclature');
        $this->addSql('DROP TABLE type_travaux_nomenclature');
    }
}
