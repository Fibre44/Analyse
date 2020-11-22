<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201107134147 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bibliothequeprimeanciennetepopulation (id INT AUTO_INCREMENT NOT NULL, bibliothequeccn_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, etendu VARBINARY(255) NOT NULL, INDEX IDX_7263C9CD170D4135 (bibliothequeccn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequeprimeanciennetevaleur (id INT AUTO_INCREMENT NOT NULL, bibliothequeprimeanciennetepopulation_id INT NOT NULL, niveau VARCHAR(255) DEFAULT NULL, coefficient VARCHAR(255) DEFAULT NULL, indice VARCHAR(255) DEFAULT NULL, qualification VARCHAR(255) DEFAULT NULL, anciennetemois INT NOT NULL, pourcentage VARCHAR(255) NOT NULL, INDEX IDX_4BF03EFA31B59CB4 (bibliothequeprimeanciennetepopulation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bibliothequeprimeanciennetepopulation ADD CONSTRAINT FK_7263C9CD170D4135 FOREIGN KEY (bibliothequeccn_id) REFERENCES bibliothequeccn (id)');
        $this->addSql('ALTER TABLE bibliothequeprimeanciennetevaleur ADD CONSTRAINT FK_4BF03EFA31B59CB4 FOREIGN KEY (bibliothequeprimeanciennetepopulation_id) REFERENCES bibliothequeprimeanciennetepopulation (id)');
        $this->addSql('ALTER TABLE primeanciennetevaleur ADD anciennetemois INT NOT NULL, ADD pourcentage VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bibliothequeprimeanciennetevaleur DROP FOREIGN KEY FK_4BF03EFA31B59CB4');
        $this->addSql('DROP TABLE bibliothequeprimeanciennetepopulation');
        $this->addSql('DROP TABLE bibliothequeprimeanciennetevaleur');
        $this->addSql('ALTER TABLE primeanciennetevaleur DROP anciennetemois, DROP pourcentage');
    }
}
