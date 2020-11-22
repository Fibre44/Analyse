<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200926174203 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE organisme (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, nature VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, codepostal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, typepaiement VARCHAR(255) NOT NULL, INDEX IDX_DD0F4533FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubique (id INT AUTO_INCREMENT NOT NULL, numero VARCHAR(255) NOT NULL, nature VARCHAR(255) NOT NULL, intitule VARCHAR(255) NOT NULL, base VARCHAR(255) DEFAULT NULL, montant VARCHAR(255) DEFAULT NULL, coefficient VARCHAR(255) DEFAULT NULL, taux VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, groupe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_projet (utilisateur_id INT NOT NULL, projet_id INT NOT NULL, INDEX IDX_31B8A622FB88E14F (utilisateur_id), INDEX IDX_31B8A622C18272 (projet_id), PRIMARY KEY(utilisateur_id, projet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE organisme ADD CONSTRAINT FK_DD0F4533FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE utilisateur_projet ADD CONSTRAINT FK_31B8A622FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_projet ADD CONSTRAINT FK_31B8A622C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE utilisateur_projet DROP FOREIGN KEY FK_31B8A622FB88E14F');
        $this->addSql('DROP TABLE organisme');
        $this->addSql('DROP TABLE rubique');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateur_projet');
    }
}
