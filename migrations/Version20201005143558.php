<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201005143558 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rubrique ADD profilrem VARCHAR(255) DEFAULT NULL, ADD profilcot VARCHAR(255) DEFAULT NULL, ADD periodeapplication VARCHAR(255) DEFAULT NULL, ADD population VARCHAR(255) DEFAULT NULL, ADD divers LONGTEXT DEFAULT NULL, ADD dsnperiodeprime VARCHAR(255) DEFAULT NULL, ADD dsnnatureprime VARCHAR(255) DEFAULT NULL, ADD dsnautreselement VARCHAR(255) DEFAULT NULL, ADD dsntyperappelpaie VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE rubrique DROP profilrem, DROP profilcot, DROP periodeapplication, DROP population, DROP divers, DROP dsnperiodeprime, DROP dsnnatureprime, DROP dsnautreselement, DROP dsntyperappelpaie');
    }
}
