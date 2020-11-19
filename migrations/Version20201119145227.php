<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201119145227 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agence (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE base_stockage (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE direction_regionale (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE finalite (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mesure_accompagnement (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mo_suivis (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE mo_travaux (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE modalite_operation (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE operation_prelevement (id INT AUTO_INCREMENT NOT NULL, site_id INT DEFAULT NULL, station_id INT DEFAULT NULL, point_prelevement_id INT DEFAULT NULL, mo_suivi_id INT DEFAULT NULL, protocole_id INT DEFAULT NULL, banque_stockage_id INT DEFAULT NULL, code_operation VARCHAR(255) DEFAULT NULL, date_prelevement DATE NOT NULL, interlocuteur_suivis VARCHAR(255) DEFAULT NULL, conformite_ssm TINYINT(1) DEFAULT NULL, `precision` LONGTEXT DEFAULT NULL, commentaire LONGTEXT DEFAULT NULL, INDEX IDX_70E45E19F6BD1646 (site_id), INDEX IDX_70E45E1921BDB235 (station_id), INDEX IDX_70E45E19BC88483 (point_prelevement_id), INDEX IDX_70E45E1967083D20 (mo_suivi_id), INDEX IDX_70E45E19F77FB932 (protocole_id), INDEX IDX_70E45E1955F37730 (banque_stockage_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE point_prelevement (id INT AUTO_INCREMENT NOT NULL, site_id INT DEFAULT NULL, station_id INT DEFAULT NULL, num_base VARCHAR(255) DEFAULT NULL, support VARCHAR(255) DEFAULT NULL, coord_x_l93 DOUBLE PRECISION DEFAULT NULL, coord_y_l93 DOUBLE PRECISION DEFAULT NULL, station_point VARCHAR(255) DEFAULT NULL, reseau_station_point VARCHAR(255) DEFAULT NULL, reseau_station VARCHAR(255) DEFAULT NULL, INDEX IDX_BE1758CAF6BD1646 (site_id), INDEX IDX_BE1758CA21BDB235 (station_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE protocole (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site (id INT AUTO_INCREMENT NOT NULL, agence_id INT NOT NULL, direction_regionale_id INT NOT NULL, type_travaux_prevus_id INT NOT NULL, type_travaux_realises_principal_id INT NOT NULL, type_travaux_realises_secondaire_id INT DEFAULT NULL, type_travaux_realises_accessoire_id INT DEFAULT NULL, modalites_operation_id INT DEFAULT NULL, mesures_accompagnement_id INT DEFAULT NULL, mo_travaux_id INT NOT NULL, code_reseau VARCHAR(255) NOT NULL, code_entite_hydro VARCHAR(255) NOT NULL, toponyme VARCHAR(255) DEFAULT NULL, code_entite_hydro_2 VARCHAR(255) DEFAULT NULL, toponyme_autre VARCHAR(255) DEFAULT NULL, departement VARCHAR(255) NOT NULL, commune VARCHAR(255) NOT NULL, diagnostic VARCHAR(255) NOT NULL, interlocuteur VARCHAR(255) NOT NULL, long_lineaire_restaure INT DEFAULT NULL, largeur_plein_bords_naturelle INT DEFAULT NULL, code_roe VARCHAR(255) DEFAULT NULL, hauteur_chute_etiage_roe INT DEFAULT NULL, hauteur_chute_hors_roe INT DEFAULT NULL, annee_debut_travaux_prevus INT DEFAULT NULL, annee_fin_travaux_prevus INT DEFAULT NULL, annee_effective_debut_travaux INT DEFAULT NULL, annee_effective_fin_travaux INT DEFAULT NULL, descriptif_travaux LONGTEXT DEFAULT NULL, elements_contexte LONGTEXT DEFAULT NULL, INDEX IDX_694309E4D725330D (agence_id), INDEX IDX_694309E44C4A5FBB (direction_regionale_id), INDEX IDX_694309E47B25CB1D (type_travaux_prevus_id), INDEX IDX_694309E4C129A37A (type_travaux_realises_principal_id), INDEX IDX_694309E472559192 (type_travaux_realises_secondaire_id), INDEX IDX_694309E425DF5163 (type_travaux_realises_accessoire_id), INDEX IDX_694309E4FE8BD64A (modalites_operation_id), INDEX IDX_694309E44618468E (mesures_accompagnement_id), INDEX IDX_694309E480348AAD (mo_travaux_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE site_station (site_id INT NOT NULL, station_id INT NOT NULL, INDEX IDX_649D1A7AF6BD1646 (site_id), INDEX IDX_649D1A7A21BDB235 (station_id), PRIMARY KEY(site_id, station_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE station (id INT AUTO_INCREMENT NOT NULL, finalite_id INT NOT NULL, code VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, code_masse_eau VARCHAR(255) DEFAULT NULL, nom_masse_eau VARCHAR(255) DEFAULT NULL, detail_situation LONGTEXT DEFAULT NULL, precision_positionnement LONGTEXT DEFAULT NULL, suivi_indicateurs_fonctionnels TINYINT(1) NOT NULL, INDEX IDX_9F39F8B18CB31D21 (finalite_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type_travaux (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT FK_70E45E19F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT FK_70E45E1921BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT FK_70E45E19BC88483 FOREIGN KEY (point_prelevement_id) REFERENCES point_prelevement (id)');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT FK_70E45E1967083D20 FOREIGN KEY (mo_suivi_id) REFERENCES mo_suivis (id)');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT FK_70E45E19F77FB932 FOREIGN KEY (protocole_id) REFERENCES protocole (id)');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT FK_70E45E1955F37730 FOREIGN KEY (banque_stockage_id) REFERENCES base_stockage (id)');
        $this->addSql('ALTER TABLE point_prelevement ADD CONSTRAINT FK_BE1758CAF6BD1646 FOREIGN KEY (site_id) REFERENCES site (id)');
        $this->addSql('ALTER TABLE point_prelevement ADD CONSTRAINT FK_BE1758CA21BDB235 FOREIGN KEY (station_id) REFERENCES station (id)');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E4D725330D FOREIGN KEY (agence_id) REFERENCES agence (id)');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E44C4A5FBB FOREIGN KEY (direction_regionale_id) REFERENCES direction_regionale (id)');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E47B25CB1D FOREIGN KEY (type_travaux_prevus_id) REFERENCES type_travaux (id)');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E4C129A37A FOREIGN KEY (type_travaux_realises_principal_id) REFERENCES type_travaux (id)');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E472559192 FOREIGN KEY (type_travaux_realises_secondaire_id) REFERENCES type_travaux (id)');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E425DF5163 FOREIGN KEY (type_travaux_realises_accessoire_id) REFERENCES type_travaux (id)');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E4FE8BD64A FOREIGN KEY (modalites_operation_id) REFERENCES modalite_operation (id)');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E44618468E FOREIGN KEY (mesures_accompagnement_id) REFERENCES mesure_accompagnement (id)');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E480348AAD FOREIGN KEY (mo_travaux_id) REFERENCES mo_travaux (id)');
        $this->addSql('ALTER TABLE site_station ADD CONSTRAINT FK_649D1A7AF6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE site_station ADD CONSTRAINT FK_649D1A7A21BDB235 FOREIGN KEY (station_id) REFERENCES station (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE station ADD CONSTRAINT FK_9F39F8B18CB31D21 FOREIGN KEY (finalite_id) REFERENCES finalite (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E4D725330D');
        $this->addSql('ALTER TABLE operation_prelevement DROP FOREIGN KEY FK_70E45E1955F37730');
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E44C4A5FBB');
        $this->addSql('ALTER TABLE station DROP FOREIGN KEY FK_9F39F8B18CB31D21');
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E44618468E');
        $this->addSql('ALTER TABLE operation_prelevement DROP FOREIGN KEY FK_70E45E1967083D20');
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E480348AAD');
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E4FE8BD64A');
        $this->addSql('ALTER TABLE operation_prelevement DROP FOREIGN KEY FK_70E45E19BC88483');
        $this->addSql('ALTER TABLE operation_prelevement DROP FOREIGN KEY FK_70E45E19F77FB932');
        $this->addSql('ALTER TABLE operation_prelevement DROP FOREIGN KEY FK_70E45E19F6BD1646');
        $this->addSql('ALTER TABLE point_prelevement DROP FOREIGN KEY FK_BE1758CAF6BD1646');
        $this->addSql('ALTER TABLE site_station DROP FOREIGN KEY FK_649D1A7AF6BD1646');
        $this->addSql('ALTER TABLE operation_prelevement DROP FOREIGN KEY FK_70E45E1921BDB235');
        $this->addSql('ALTER TABLE point_prelevement DROP FOREIGN KEY FK_BE1758CA21BDB235');
        $this->addSql('ALTER TABLE site_station DROP FOREIGN KEY FK_649D1A7A21BDB235');
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E47B25CB1D');
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E4C129A37A');
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E472559192');
        $this->addSql('ALTER TABLE site DROP FOREIGN KEY FK_694309E425DF5163');
        $this->addSql('DROP TABLE agence');
        $this->addSql('DROP TABLE base_stockage');
        $this->addSql('DROP TABLE direction_regionale');
        $this->addSql('DROP TABLE finalite');
        $this->addSql('DROP TABLE mesure_accompagnement');
        $this->addSql('DROP TABLE mo_suivis');
        $this->addSql('DROP TABLE mo_travaux');
        $this->addSql('DROP TABLE modalite_operation');
        $this->addSql('DROP TABLE operation_prelevement');
        $this->addSql('DROP TABLE point_prelevement');
        $this->addSql('DROP TABLE protocole');
        $this->addSql('DROP TABLE site');
        $this->addSql('DROP TABLE site_station');
        $this->addSql('DROP TABLE station');
        $this->addSql('DROP TABLE type_travaux');
        $this->addSql('DROP TABLE `user`');
    }
}
