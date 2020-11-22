<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201001121445 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anomalierubrique (id INT AUTO_INCREMENT NOT NULL, rubrique_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_7FF092F63BD38833 (rubrique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messageanomalie (id INT AUTO_INCREMENT NOT NULL, anomalie_id INT NOT NULL, message LONGTEXT NOT NULL, auteur VARCHAR(255) NOT NULL, INDEX IDX_959A7AEDAEEAB197 (anomalie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE anomalierubrique ADD CONSTRAINT FK_7FF092F63BD38833 FOREIGN KEY (rubrique_id) REFERENCES rubrique (id)');
        $this->addSql('ALTER TABLE messageanomalie ADD CONSTRAINT FK_959A7AEDAEEAB197 FOREIGN KEY (anomalie_id) REFERENCES anomalierubrique (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE messageanomalie DROP FOREIGN KEY FK_959A7AEDAEEAB197');
        $this->addSql('DROP TABLE anomalierubrique');
        $this->addSql('DROP TABLE messageanomalie');
    }
}
