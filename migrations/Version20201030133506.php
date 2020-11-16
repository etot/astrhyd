<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201030133506 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site ADD type_travaux_realises_accessoire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE site ADD modalites_operation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE site ADD mesures_accompagnement_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE site ADD mo_travaux_id INT NOT NULL');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E425DF5163 FOREIGN KEY (type_travaux_realises_accessoire_id) REFERENCES type_travaux (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E4FE8BD64A FOREIGN KEY (modalites_operation_id) REFERENCES modalite_operation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E44618468E FOREIGN KEY (mesures_accompagnement_id) REFERENCES mesure_accompagnement (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E480348AAD FOREIGN KEY (mo_travaux_id) REFERENCES mo_travaux (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_694309E425DF5163 ON site (type_travaux_realises_accessoire_id)');
        $this->addSql('CREATE INDEX IDX_694309E4FE8BD64A ON site (modalites_operation_id)');
        $this->addSql('CREATE INDEX IDX_694309E44618468E ON site (mesures_accompagnement_id)');
        $this->addSql('CREATE INDEX IDX_694309E480348AAD ON site (mo_travaux_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE site DROP CONSTRAINT FK_694309E425DF5163');
        $this->addSql('ALTER TABLE site DROP CONSTRAINT FK_694309E4FE8BD64A');
        $this->addSql('ALTER TABLE site DROP CONSTRAINT FK_694309E44618468E');
        $this->addSql('ALTER TABLE site DROP CONSTRAINT FK_694309E480348AAD');
        $this->addSql('DROP INDEX IDX_694309E425DF5163');
        $this->addSql('DROP INDEX IDX_694309E4FE8BD64A');
        $this->addSql('DROP INDEX IDX_694309E44618468E');
        $this->addSql('DROP INDEX IDX_694309E480348AAD');
        $this->addSql('ALTER TABLE site DROP type_travaux_realises_accessoire_id');
        $this->addSql('ALTER TABLE site DROP modalites_operation_id');
        $this->addSql('ALTER TABLE site DROP mesures_accompagnement_id');
        $this->addSql('ALTER TABLE site DROP mo_travaux_id');
    }
}
