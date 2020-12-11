<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201211110314 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE point_prelevement DROP CONSTRAINT fk_be1758caf6bd1646');
        $this->addSql('DROP INDEX idx_be1758caf6bd1646');
        $this->addSql('ALTER TABLE point_prelevement DROP site_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE point_prelevement ADD site_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE point_prelevement ADD CONSTRAINT fk_be1758caf6bd1646 FOREIGN KEY (site_id) REFERENCES site (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_be1758caf6bd1646 ON point_prelevement (site_id)');
    }
}
