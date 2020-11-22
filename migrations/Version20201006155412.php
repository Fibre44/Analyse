<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201006155412 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE organisme DROP FOREIGN KEY FK_DD0F4533FF631228');
        $this->addSql('DROP INDEX IDX_DD0F4533FF631228 ON organisme');
        $this->addSql('ALTER TABLE organisme DROP etablissement_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE organisme ADD etablissement_id INT NOT NULL');
        $this->addSql('ALTER TABLE organisme ADD CONSTRAINT FK_DD0F4533FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('CREATE INDEX IDX_DD0F4533FF631228 ON organisme (etablissement_id)');
    }
}
