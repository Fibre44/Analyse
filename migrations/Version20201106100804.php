<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201106100804 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bibliothequecriteremaintien (id INT AUTO_INCREMENT NOT NULL, bibliothequeccn_id INT NOT NULL, absence VARCHAR(255) NOT NULL, population VARCHAR(255) NOT NULL, INDEX IDX_BFA272C8170D4135 (bibliothequeccn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequetablemaintien (id INT AUTO_INCREMENT NOT NULL, bibliothequecriteremaintien_id INT NOT NULL, anciennetedebut INT NOT NULL, anciennetefin INT NOT NULL, jourscarenceemployeur INT NOT NULL, dureemaximale INT NOT NULL, tauxmaintien VARCHAR(255) NOT NULL, INDEX IDX_F6649E3DDC2CDBC7 (bibliothequecriteremaintien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE criteremaintien (id INT AUTO_INCREMENT NOT NULL, ccn_id INT NOT NULL, absence VARCHAR(255) NOT NULL, populatin VARCHAR(255) NOT NULL, INDEX IDX_9A7DEBC0A3C94DD8 (ccn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provision (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, type VARCHAR(255) NOT NULL, calcul VARCHAR(255) NOT NULL, comptabilite TINYINT(1) NOT NULL, extourne VARCHAR(255) NOT NULL, periodicite VARCHAR(255) NOT NULL, INDEX IDX_BA9B4290FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tablemaintien (id INT AUTO_INCREMENT NOT NULL, criteremaintien_id INT NOT NULL, anciennetedebut INT NOT NULL, anciennetefin INT NOT NULL, jourscarenceemployeur INT NOT NULL, dureemaximale INT NOT NULL, tauxmaintien VARCHAR(255) NOT NULL, INDEX IDX_6D540E4764D0744C (criteremaintien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bibliothequecriteremaintien ADD CONSTRAINT FK_BFA272C8170D4135 FOREIGN KEY (bibliothequeccn_id) REFERENCES bibliothequeccn (id)');
        $this->addSql('ALTER TABLE bibliothequetablemaintien ADD CONSTRAINT FK_F6649E3DDC2CDBC7 FOREIGN KEY (bibliothequecriteremaintien_id) REFERENCES bibliothequecriteremaintien (id)');
        $this->addSql('ALTER TABLE criteremaintien ADD CONSTRAINT FK_9A7DEBC0A3C94DD8 FOREIGN KEY (ccn_id) REFERENCES conventioncollective (id)');
        $this->addSql('ALTER TABLE provision ADD CONSTRAINT FK_BA9B4290FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE tablemaintien ADD CONSTRAINT FK_6D540E4764D0744C FOREIGN KEY (criteremaintien_id) REFERENCES criteremaintien (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bibliothequetablemaintien DROP FOREIGN KEY FK_F6649E3DDC2CDBC7');
        $this->addSql('ALTER TABLE tablemaintien DROP FOREIGN KEY FK_6D540E4764D0744C');
        $this->addSql('DROP TABLE bibliothequecriteremaintien');
        $this->addSql('DROP TABLE bibliothequetablemaintien');
        $this->addSql('DROP TABLE criteremaintien');
        $this->addSql('DROP TABLE provision');
        $this->addSql('DROP TABLE tablemaintien');
    }
}
