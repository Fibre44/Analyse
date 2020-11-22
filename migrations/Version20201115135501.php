<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201115135501 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C9FCF77503');
        $this->addSql('DROP INDEX IDX_765AE0C9FCF77503 ON absence');
        $this->addSql('ALTER TABLE absence CHANGE societe_id tauxabsence_id INT NOT NULL');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C9C76048E9 FOREIGN KEY (tauxabsence_id) REFERENCES tauxabsence (id)');
        $this->addSql('CREATE INDEX IDX_765AE0C9C76048E9 ON absence (tauxabsence_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C9C76048E9');
        $this->addSql('DROP INDEX IDX_765AE0C9C76048E9 ON absence');
        $this->addSql('ALTER TABLE absence CHANGE tauxabsence_id societe_id INT NOT NULL');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C9FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('CREATE INDEX IDX_765AE0C9FCF77503 ON absence (societe_id)');
    }
}
