<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201006155543 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE organisme_etablissement (organisme_id INT NOT NULL, etablissement_id INT NOT NULL, INDEX IDX_4EE760185DDD38F5 (organisme_id), INDEX IDX_4EE76018FF631228 (etablissement_id), PRIMARY KEY(organisme_id, etablissement_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE organisme_etablissement ADD CONSTRAINT FK_4EE760185DDD38F5 FOREIGN KEY (organisme_id) REFERENCES organisme (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE organisme_etablissement ADD CONSTRAINT FK_4EE76018FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE organisme_etablissement');
    }
}
