<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201114153303 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE zonelibrehrs DROP FOREIGN KEY FK_6E233A4BFCF77503');
        $this->addSql('DROP INDEX UNIQ_6E233A4BFCF77503 ON zonelibrehrs');
        $this->addSql('ALTER TABLE zonelibrehrs DROP societe_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE zonelibrehrs ADD societe_id INT NOT NULL');
        $this->addSql('ALTER TABLE zonelibrehrs ADD CONSTRAINT FK_6E233A4BFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6E233A4BFCF77503 ON zonelibrehrs (societe_id)');
    }
}
