<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201001140057 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classification (id INT AUTO_INCREMENT NOT NULL, conventioncollective_id INT NOT NULL, type VARCHAR(255) NOT NULL, valeur VARCHAR(255) NOT NULL, INDEX IDX_456BD2318B7C9A01 (conventioncollective_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conventioncollective (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, idcc VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_478C5B76FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emploi (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, valeur VARCHAR(255) NOT NULL, INDEX IDX_74A0B0FAFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maintiendesalaire (id INT AUTO_INCREMENT NOT NULL, conventioncollective_id INT NOT NULL, categorie VARCHAR(255) NOT NULL, ancienneteminimum VARCHAR(255) NOT NULL, nbremoisancienneteminimum INT NOT NULL, nbremoisanciennetemaximum INT NOT NULL, INDEX IDX_52AFC3B88B7C9A01 (conventioncollective_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pourcentagemaintien (id INT AUTO_INCREMENT NOT NULL, maintiensalaire_id INT NOT NULL, nbrejours INT NOT NULL, pourcentage VARCHAR(255) NOT NULL, INDEX IDX_3952F119C14B6F4D (maintiensalaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE classification ADD CONSTRAINT FK_456BD2318B7C9A01 FOREIGN KEY (conventioncollective_id) REFERENCES conventioncollective (id)');
        $this->addSql('ALTER TABLE conventioncollective ADD CONSTRAINT FK_478C5B76FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE emploi ADD CONSTRAINT FK_74A0B0FAFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE maintiendesalaire ADD CONSTRAINT FK_52AFC3B88B7C9A01 FOREIGN KEY (conventioncollective_id) REFERENCES conventioncollective (id)');
        $this->addSql('ALTER TABLE pourcentagemaintien ADD CONSTRAINT FK_3952F119C14B6F4D FOREIGN KEY (maintiensalaire_id) REFERENCES maintiendesalaire (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classification DROP FOREIGN KEY FK_456BD2318B7C9A01');
        $this->addSql('ALTER TABLE maintiendesalaire DROP FOREIGN KEY FK_52AFC3B88B7C9A01');
        $this->addSql('ALTER TABLE pourcentagemaintien DROP FOREIGN KEY FK_3952F119C14B6F4D');
        $this->addSql('DROP TABLE classification');
        $this->addSql('DROP TABLE conventioncollective');
        $this->addSql('DROP TABLE emploi');
        $this->addSql('DROP TABLE maintiendesalaire');
        $this->addSql('DROP TABLE pourcentagemaintien');
    }
}
