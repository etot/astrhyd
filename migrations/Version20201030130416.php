<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201030130416 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site DROP agence');
        $this->addSql('ALTER TABLE site DROP direction_regionale');
        $this->addSql('ALTER TABLE site DROP type_travaux_prevus');
        $this->addSql('ALTER TABLE site DROP type_travaux_realises_principal');
        $this->addSql('ALTER TABLE site DROP type_travaux_realises_secondaire');
        $this->addSql('ALTER TABLE site DROP type_travaux_realises_accessoire');
        $this->addSql('ALTER TABLE site DROP modalites_operation');
        $this->addSql('ALTER TABLE site DROP mesures_accompagnement');
        $this->addSql('ALTER TABLE site DROP mo_travaux');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE site ADD agence VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE site ADD direction_regionale VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE site ADD type_travaux_prevus TEXT NOT NULL');
        $this->addSql('ALTER TABLE site ADD type_travaux_realises_principal VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE site ADD type_travaux_realises_secondaire VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE site ADD type_travaux_realises_accessoire VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE site ADD modalites_operation TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE site ADD mesures_accompagnement TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE site ADD mo_travaux VARCHAR(255) DEFAULT NULL');
    }
}
