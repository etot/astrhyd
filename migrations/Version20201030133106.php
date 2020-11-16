<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201030133106 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site ADD type_travaux_realises_secondaire_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE site ADD CONSTRAINT FK_694309E472559192 FOREIGN KEY (type_travaux_realises_secondaire_id) REFERENCES type_travaux (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_694309E472559192 ON site (type_travaux_realises_secondaire_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE site DROP CONSTRAINT FK_694309E472559192');
        $this->addSql('DROP INDEX IDX_694309E472559192');
        $this->addSql('ALTER TABLE site DROP type_travaux_realises_secondaire_id');
    }
}
