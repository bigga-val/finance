<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201108185746 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE signes_vitaux CHANGE temperature temperature DOUBLE PRECISION DEFAULT NULL, CHANGE tension_arterielle tension_arterielle DOUBLE PRECISION DEFAULT NULL, CHANGE poids poids DOUBLE PRECISION DEFAULT NULL, CHANGE created_at created_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE signes_vitaux CHANGE created_at created_at DATETIME NOT NULL, CHANGE tension_arterielle tension_arterielle DOUBLE PRECISION NOT NULL, CHANGE poids poids DOUBLE PRECISION NOT NULL, CHANGE temperature temperature DOUBLE PRECISION NOT NULL');
    }
}
