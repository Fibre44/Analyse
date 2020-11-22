<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201011154515 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE banque (id INT AUTO_INCREMENT NOT NULL, etablissements_id INT DEFAULT NULL, iban VARCHAR(255) NOT NULL, bic VARCHAR(255) NOT NULL, INDEX IDX_B1F6CB3CD23B76CD (etablissements_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE banque ADD CONSTRAINT FK_B1F6CB3CD23B76CD FOREIGN KEY (etablissements_id) REFERENCES etablissement (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE banque');
    }
}
