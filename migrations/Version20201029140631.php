<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201029140631 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE site_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE site (id INT NOT NULL, code_reseau VARCHAR(255) NOT NULL, agence VARCHAR(255) NOT NULL, direction_regionale VARCHAR(255) NOT NULL, code_entite_hydro VARCHAR(255) NOT NULL, toponyme VARCHAR(255) DEFAULT NULL, code_entite_hydro_2 VARCHAR(255) DEFAULT NULL, toponyme_autre VARCHAR(255) DEFAULT NULL, departement VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, diagnostic VARCHAR(255) NOT NULL, type_travaux_prevus VARCHAR(255) NOT NULL, type_travaux_realises_principal VARCHAR(255) NOT NULL, type_travaux_realises_secondaire VARCHAR(255) DEFAULT NULL, type_travaux_realises_accessoire VARCHAR(255) DEFAULT NULL, modalites_operation VARCHAR(255) DEFAULT NULL, mesures_accompagnement VARCHAR(255) DEFAULT NULL, mo_travaux VARCHAR(255) DEFAULT NULL, interlocuteur VARCHAR(255) NOT NULL, long_lineaire_restaure INT DEFAULT NULL, largeur_plein_bords_naturelle INT DEFAULT NULL, code_roe VARCHAR(255) DEFAULT NULL, hauteur_chute_etiage_roe INT DEFAULT NULL, hauteur_chute_hors_roe INT DEFAULT NULL, annee_debut_travaux_prevus INT DEFAULT NULL, annee_fin_travaux_prevus INT DEFAULT NULL, annee_effective_debut_travaux INT DEFAULT NULL, annee_effective_fin_travaux INT DEFAULT NULL, descriptif_travaux TEXT DEFAULT NULL, elements_contexte TEXT DEFAULT NULL, PRIMARY KEY(id))');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE site_id_seq CASCADE');
        $this->addSql('DROP TABLE site');
    }
}
