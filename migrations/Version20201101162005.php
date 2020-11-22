<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201101162005 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE etablissement_organisme (etablissement_id INT NOT NULL, organisme_id INT NOT NULL, INDEX IDX_B0D0C85AFF631228 (etablissement_id), INDEX IDX_B0D0C85A5DDD38F5 (organisme_id), PRIMARY KEY(etablissement_id, organisme_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE etablissement_organisme ADD CONSTRAINT FK_B0D0C85AFF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE etablissement_organisme ADD CONSTRAINT FK_B0D0C85A5DDD38F5 FOREIGN KEY (organisme_id) REFERENCES organisme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE etablissement_organisme');
    }
}
