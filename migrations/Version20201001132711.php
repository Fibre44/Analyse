<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201001132711 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE valeurzonelibrehrs (id INT AUTO_INCREMENT NOT NULL, zone_id INT NOT NULL, code VARCHAR(255) NOT NULL, valeur VARCHAR(255) NOT NULL, INDEX IDX_1A0436299F2C3FAB (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zonelibrehrs (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, codestat VARCHAR(255) DEFAULT NULL, travailn1 VARCHAR(255) DEFAULT NULL, travailn2 VARCHAR(255) DEFAULT NULL, travailn3 VARCHAR(255) DEFAULT NULL, travailn4 VARCHAR(255) DEFAULT NULL, libre1 VARCHAR(255) DEFAULT NULL, libre2 VARCHAR(255) DEFAULT NULL, libre3 VARCHAR(255) DEFAULT NULL, libre4 VARCHAR(255) DEFAULT NULL, datelibre1 VARCHAR(255) DEFAULT NULL, datelibre2 VARCHAR(255) DEFAULT NULL, datelibre3 VARCHAR(255) DEFAULT NULL, datelibre4 VARCHAR(255) DEFAULT NULL, boite1 VARCHAR(255) DEFAULT NULL, boite2 VARCHAR(255) DEFAULT NULL, boite3 VARCHAR(255) DEFAULT NULL, boite4 VARCHAR(255) DEFAULT NULL, UNIQUE INDEX UNIQ_6E233A4BFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE valeurzonelibrehrs ADD CONSTRAINT FK_1A0436299F2C3FAB FOREIGN KEY (zone_id) REFERENCES zonelibrehrs (id)');
        $this->addSql('ALTER TABLE zonelibrehrs ADD CONSTRAINT FK_6E233A4BFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE valeurzonelibrehrs DROP FOREIGN KEY FK_1A0436299F2C3FAB');
        $this->addSql('DROP TABLE valeurzonelibrehrs');
        $this->addSql('DROP TABLE zonelibrehrs');
    }
}
