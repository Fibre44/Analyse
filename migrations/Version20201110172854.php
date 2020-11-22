<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201110172854 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bibliothequesmcpopulation (id INT AUTO_INCREMENT NOT NULL, bibliothequeccn_id INT NOT NULL, population VARCHAR(255) NOT NULL, etendu TINYINT(1) NOT NULL, INDEX IDX_BB729313170D4135 (bibliothequeccn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequesmcvaleur (id INT AUTO_INCREMENT NOT NULL, bibliothequesmcpopulation_id INT NOT NULL, coefficient VARCHAR(255) DEFAULT NULL, qualification VARCHAR(255) DEFAULT NULL, niveau VARCHAR(255) DEFAULT NULL, smc DOUBLE PRECISION NOT NULL, INDEX IDX_E5976EBC9C46116B (bibliothequesmcpopulation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bibliothequesmcpopulation ADD CONSTRAINT FK_BB729313170D4135 FOREIGN KEY (bibliothequeccn_id) REFERENCES bibliothequeccn (id)');
        $this->addSql('ALTER TABLE bibliothequesmcvaleur ADD CONSTRAINT FK_E5976EBC9C46116B FOREIGN KEY (bibliothequesmcpopulation_id) REFERENCES bibliothequesmcpopulation (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bibliothequesmcvaleur DROP FOREIGN KEY FK_E5976EBC9C46116B');
        $this->addSql('DROP TABLE bibliothequesmcpopulation');
        $this->addSql('DROP TABLE bibliothequesmcvaleur');
    }
}
