<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201115141955 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE horaire DROP lundimatindebut, DROP lundimatinfin, DROP lundiapdebut, DROP lundiapfin, DROP mardimatindebut, DROP mardimatinfin, DROP mardiapdebut, DROP mardiapfin, DROP mercredimatindebut, DROP mercredimatinfin, DROP mercrediapdebut, DROP mercrediapfin, DROP jeudimatindebut, DROP jeudimatinfin, DROP jeudiapdebut, DROP jeudiapfin, DROP vendredimatindebut, DROP vendredimatinfin, DROP vendrediapdebut, DROP vendrediapfin, DROP samedimatindebut, DROP samedimatinfin, DROP samediapdebut, DROP samediapfin, DROP dimanchematindebut, DROP dimanchematinfin, DROP dimancheapdebut, DROP dimancheapfin');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE horaire ADD lundimatindebut TIME DEFAULT NULL, ADD lundimatinfin TIME DEFAULT NULL, ADD lundiapdebut TIME DEFAULT NULL, ADD lundiapfin TIME DEFAULT NULL, ADD mardimatindebut TIME DEFAULT NULL, ADD mardimatinfin TIME DEFAULT NULL, ADD mardiapdebut TIME DEFAULT NULL, ADD mardiapfin TIME DEFAULT NULL, ADD mercredimatindebut TIME DEFAULT NULL, ADD mercredimatinfin TIME DEFAULT NULL, ADD mercrediapdebut TIME DEFAULT NULL, ADD mercrediapfin TIME DEFAULT NULL, ADD jeudimatindebut TIME DEFAULT NULL, ADD jeudimatinfin TIME DEFAULT NULL, ADD jeudiapdebut TIME DEFAULT NULL, ADD jeudiapfin TIME DEFAULT NULL, ADD vendredimatindebut TIME DEFAULT NULL, ADD vendredimatinfin TIME DEFAULT NULL, ADD vendrediapdebut TIME DEFAULT NULL, ADD vendrediapfin TIME DEFAULT NULL, ADD samedimatindebut TIME DEFAULT NULL, ADD samedimatinfin TIME DEFAULT NULL, ADD samediapdebut TIME DEFAULT NULL, ADD samediapfin TIME DEFAULT NULL, ADD dimanchematindebut TIME DEFAULT NULL, ADD dimanchematinfin TIME DEFAULT NULL, ADD dimancheapdebut TIME DEFAULT NULL, ADD dimancheapfin TIME DEFAULT NULL');
    }
}
