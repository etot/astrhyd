<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201101200733 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE station ADD finalite_id INT NOT NULL');
        $this->addSql('ALTER TABLE station ADD CONSTRAINT FK_9F39F8B18CB31D21 FOREIGN KEY (finalite_id) REFERENCES finalite (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_9F39F8B18CB31D21 ON station (finalite_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE station DROP CONSTRAINT FK_9F39F8B18CB31D21');
        $this->addSql('DROP INDEX IDX_9F39F8B18CB31D21');
        $this->addSql('ALTER TABLE station DROP finalite_id');
    }
}
