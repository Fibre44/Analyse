<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201204144810 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE signature (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, signature TINYINT(1) NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, idutilisateur INT NOT NULL, INDEX IDX_AE880141C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE signature ADD CONSTRAINT FK_AE880141C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE signature');
    }
}
