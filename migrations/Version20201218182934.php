<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201218182934 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bibliothequeplandepaie (id INT AUTO_INCREMENT NOT NULL, bibliothequepopulationplandepaie_id INT NOT NULL, naturerub VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, base VARCHAR(255) NOT NULL, taux VARCHAR(255) NOT NULL, coefficient VARCHAR(255) NOT NULL, montant VARCHAR(255) NOT NULL, tauxsalarial VARCHAR(255) NOT NULL, tauxpatronal VARCHAR(255) NOT NULL, INDEX IDX_4FB3FC5E3A2357B0 (bibliothequepopulationplandepaie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequepopulationplandepaie (id INT AUTO_INCREMENT NOT NULL, logiciel VARCHAR(255) NOT NULL, regimess VARCHAR(255) NOT NULL, population VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bibliothequeplandepaie ADD CONSTRAINT FK_4FB3FC5E3A2357B0 FOREIGN KEY (bibliothequepopulationplandepaie_id) REFERENCES bibliothequepopulationplandepaie (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bibliothequeplandepaie DROP FOREIGN KEY FK_4FB3FC5E3A2357B0');
        $this->addSql('DROP TABLE bibliothequeplandepaie');
        $this->addSql('DROP TABLE bibliothequepopulationplandepaie');
    }
}
