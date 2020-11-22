<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201113161045 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE congepaye DROP FOREIGN KEY FK_F489BD5CFF631228');
        $this->addSql('DROP INDEX UNIQ_F489BD5CFF631228 ON congepaye');
        $this->addSql('ALTER TABLE congepaye DROP etablissement_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE congepaye ADD etablissement_id INT NOT NULL');
        $this->addSql('ALTER TABLE congepaye ADD CONSTRAINT FK_F489BD5CFF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F489BD5CFF631228 ON congepaye (etablissement_id)');
    }
}
