<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201209100318 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anomalie (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date DATETIME NOT NULL, auteur VARCHAR(255) NOT NULL, INDEX IDX_715AA19CC18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compteur (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, cumulacquis VARCHAR(3) NOT NULL, cumulpris VARCHAR(3) NOT NULL, dateraz VARCHAR(255) NOT NULL, rubriqueheures VARCHAR(255) NOT NULL, rubriquejours VARCHAR(255) NOT NULL, INDEX IDX_4D021BD5FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solution (id INT AUTO_INCREMENT NOT NULL, anomalie_id INT NOT NULL, message LONGTEXT NOT NULL, date DATETIME NOT NULL, auteur VARCHAR(255) NOT NULL, INDEX IDX_9F3329DBAEEAB197 (anomalie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE anomalie ADD CONSTRAINT FK_715AA19CC18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE compteur ADD CONSTRAINT FK_4D021BD5FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE solution ADD CONSTRAINT FK_9F3329DBAEEAB197 FOREIGN KEY (anomalie_id) REFERENCES anomalie (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE solution DROP FOREIGN KEY FK_9F3329DBAEEAB197');
        $this->addSql('DROP TABLE anomalie');
        $this->addSql('DROP TABLE compteur');
        $this->addSql('DROP TABLE solution');
    }
}
