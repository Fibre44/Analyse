<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201202171206 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bibliothequemodification (id INT AUTO_INCREMENT NOT NULL, bibliothequeccn_id INT NOT NULL, demande VARCHAR(255) NOT NULL, class VARCHAR(255) NOT NULL, ancienid INT NOT NULL, ancienvaleur VARCHAR(255) NOT NULL, nouvellevaleur VARCHAR(255) DEFAULT NULL, INDEX IDX_BB36EF12170D4135 (bibliothequeccn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bibliothequemodification ADD CONSTRAINT FK_BB36EF12170D4135 FOREIGN KEY (bibliothequeccn_id) REFERENCES bibliothequeccn (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bibliothequemodification');
    }
}
