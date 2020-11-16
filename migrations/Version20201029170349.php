<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201029170349 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE site ALTER type_travaux_prevus TYPE TEXT');
        $this->addSql('ALTER TABLE site ALTER type_travaux_prevus DROP DEFAULT');
        $this->addSql('ALTER TABLE site ALTER modalites_operation TYPE TEXT');
        $this->addSql('ALTER TABLE site ALTER modalites_operation DROP DEFAULT');
        $this->addSql('ALTER TABLE site ALTER mesures_accompagnement TYPE TEXT');
        $this->addSql('ALTER TABLE site ALTER mesures_accompagnement DROP DEFAULT');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE site ALTER type_travaux_prevus TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE site ALTER type_travaux_prevus DROP DEFAULT');
        $this->addSql('ALTER TABLE site ALTER modalites_operation TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE site ALTER modalites_operation DROP DEFAULT');
        $this->addSql('ALTER TABLE site ALTER mesures_accompagnement TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE site ALTER mesures_accompagnement DROP DEFAULT');
    }
}
