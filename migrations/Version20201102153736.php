<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201102153736 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE axe (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, axe VARCHAR(255) NOT NULL, utiliser VARBINARY(255) NOT NULL, INDEX IDX_6C6A1E2CFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, axe_id INT NOT NULL, codesection VARCHAR(255) NOT NULL, INDEX IDX_2D737AEF2E30CD41 (axe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE axe ADD CONSTRAINT FK_6C6A1E2CFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF2E30CD41 FOREIGN KEY (axe_id) REFERENCES axe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF2E30CD41');
        $this->addSql('DROP TABLE axe');
        $this->addSql('DROP TABLE section');
    }
}
