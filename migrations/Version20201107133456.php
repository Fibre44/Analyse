<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201107133456 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE primeanciennetepopulation (id INT AUTO_INCREMENT NOT NULL, conventioncollective_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_453A0FD78B7C9A01 (conventioncollective_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE primeanciennetevaleur (id INT AUTO_INCREMENT NOT NULL, primeanciennetepopulation_id INT NOT NULL, niveau VARCHAR(255) DEFAULT NULL, coefficient VARCHAR(255) DEFAULT NULL, indice VARCHAR(255) DEFAULT NULL, qualification VARCHAR(255) DEFAULT NULL, INDEX IDX_3B04D432AF1323BD (primeanciennetepopulation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE primeanciennetepopulation ADD CONSTRAINT FK_453A0FD78B7C9A01 FOREIGN KEY (conventioncollective_id) REFERENCES conventioncollective (id)');
        $this->addSql('ALTER TABLE primeanciennetevaleur ADD CONSTRAINT FK_3B04D432AF1323BD FOREIGN KEY (primeanciennetepopulation_id) REFERENCES primeanciennetepopulation (id)');
        $this->addSql('ALTER TABLE bibliothequecriteremaintien ADD etendu VARBINARY(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE primeanciennetevaleur DROP FOREIGN KEY FK_3B04D432AF1323BD');
        $this->addSql('DROP TABLE primeanciennetepopulation');
        $this->addSql('DROP TABLE primeanciennetevaleur');
        $this->addSql('ALTER TABLE bibliothequecriteremaintien DROP etendu');
    }
}
