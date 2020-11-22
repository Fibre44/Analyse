<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201028212328 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tauxat (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, coderisque VARCHAR(255) NOT NULL, tauxbureau TINYINT(1) NOT NULL, taux VARCHAR(255) NOT NULL, dateapplication DATE NOT NULL, INDEX IDX_A8AE360CFF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tauxat ADD CONSTRAINT FK_A8AE360CFF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE tauxat');
    }
}
