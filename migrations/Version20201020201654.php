<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201020201654 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bibliothequeclassification (id INT AUTO_INCREMENT NOT NULL, bibliothequeccn_id INT NOT NULL, type VARCHAR(255) NOT NULL, valeur VARCHAR(255) NOT NULL, INDEX IDX_F5207A83170D4135 (bibliothequeccn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bibliothequeclassification ADD CONSTRAINT FK_F5207A83170D4135 FOREIGN KEY (bibliothequeccn_id) REFERENCES bibliothequeccn (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bibliothequeclassification');
    }
}
