<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201101140233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE station DROP CONSTRAINT fk_9f39f8b18cb31d21');
        $this->addSql('DROP INDEX idx_9f39f8b18cb31d21');
        $this->addSql('ALTER TABLE station DROP finalite_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE station ADD finalite_id INT NOT NULL');
        $this->addSql('ALTER TABLE station ADD CONSTRAINT fk_9f39f8b18cb31d21 FOREIGN KEY (finalite_id) REFERENCES finalite (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_9f39f8b18cb31d21 ON station (finalite_id)');
    }
}
