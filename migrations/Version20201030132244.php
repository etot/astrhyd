<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201030132244 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site ADD agence_id INT NOT NULL');
        $this->addSql('ALTER TABLE site ADD direction_regionale_id INT NOT NULL');
        $this->addSql('ALTER TABLE site ADD type_travaux_prevus_id INT NOT NULL');
        $this->addSql('ALTER TABLE site ADD type_travaux_realises_principal_id INT NOT NULL');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E4D725330D FOREIGN KEY (agence_id) REFERENCES agence (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E44C4A5FBB FOREIGN KEY (direction_regionale_id) REFERENCES direction_regionale (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E47B25CB1D FOREIGN KEY (type_travaux_prevus_id) REFERENCES type_travaux (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E4C129A37A FOREIGN KEY (type_travaux_realises_principal_id) REFERENCES type_travaux (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_694309E4D725330D ON site (agence_id)');
        $this->addSql('CREATE INDEX IDX_694309E44C4A5FBB ON site (direction_regionale_id)');
        $this->addSql('CREATE INDEX IDX_694309E47B25CB1D ON site (type_travaux_prevus_id)');
        $this->addSql('CREATE INDEX IDX_694309E4C129A37A ON site (type_travaux_realises_principal_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE site DROP CONSTRAINT FK_694309E4D725330D');
        $this->addSql('ALTER TABLE site DROP CONSTRAINT FK_694309E44C4A5FBB');
        $this->addSql('ALTER TABLE site DROP CONSTRAINT FK_694309E47B25CB1D');
        $this->addSql('ALTER TABLE site DROP CONSTRAINT FK_694309E4C129A37A');
        $this->addSql('DROP INDEX IDX_694309E4D725330D');
        $this->addSql('DROP INDEX IDX_694309E44C4A5FBB');
        $this->addSql('DROP INDEX IDX_694309E47B25CB1D');
        $this->addSql('DROP INDEX IDX_694309E4C129A37A');
        $this->addSql('ALTER TABLE site DROP agence_id');
        $this->addSql('ALTER TABLE site DROP direction_regionale_id');
        $this->addSql('ALTER TABLE site DROP type_travaux_prevus_id');
        $this->addSql('ALTER TABLE site DROP type_travaux_realises_principal_id');
    }
}
