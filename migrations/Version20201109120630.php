<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201109120630 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE operation_prelevement_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE operation_prelevement (id INT NOT NULL, site_id INT DEFAULT NULL, station_id INT DEFAULT NULL, point_prelevement_id INT DEFAULT NULL, mo_suivi_id INT DEFAULT NULL, protocole_id INT DEFAULT NULL, banque_stockage_id INT DEFAULT NULL, code_operation VARCHAR(255) DEFAULT NULL, date_prelevement DATE NOT NULL, interlocuteur_suivis VARCHAR(255) DEFAULT NULL, conformite_ssm BOOLEAN DEFAULT NULL, precision TEXT DEFAULT NULL, commentaire TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_70E45E19F6BD1646 ON operation_prelevement (site_id)');
        $this->addSql('CREATE INDEX IDX_70E45E1921BDB235 ON operation_prelevement (station_id)');
        $this->addSql('CREATE INDEX IDX_70E45E19BC88483 ON operation_prelevement (point_prelevement_id)');
        $this->addSql('CREATE INDEX IDX_70E45E1967083D20 ON operation_prelevement (mo_suivi_id)');
        $this->addSql('CREATE INDEX IDX_70E45E19F77FB932 ON operation_prelevement (protocole_id)');
        $this->addSql('CREATE INDEX IDX_70E45E1955F37730 ON operation_prelevement (banque_stockage_id)');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT FK_70E45E19F6BD1646 FOREIGN KEY (site_id) REFERENCES site (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT FK_70E45E1921BDB235 FOREIGN KEY (station_id) REFERENCES station (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT FK_70E45E19BC88483 FOREIGN KEY (point_prelevement_id) REFERENCES point_prelevement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT FK_70E45E1967083D20 FOREIGN KEY (mo_suivi_id) REFERENCES mo_suivis (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT FK_70E45E19F77FB932 FOREIGN KEY (protocole_id) REFERENCES protocole (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE operation_prelevement ADD CONSTRAINT FK_70E45E1955F37730 FOREIGN KEY (banque_stockage_id) REFERENCES base_stockage (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE operation_prelevement_id_seq CASCADE');
        $this->addSql('DROP TABLE operation_prelevement');
    }
}
