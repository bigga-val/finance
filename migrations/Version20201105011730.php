<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201105011730 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_1ADAD7EBE34CE745 ON patient');
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBF1D74413');
        $this->addSql('ALTER TABLE patient ADD created_at DATETIME NOT NULL');
        $this->addSql('DROP INDEX fk_1adad7ebf1d74413 ON patient');
        $this->addSql('CREATE INDEX IDX_1ADAD7EBF1D74413 ON patient (abonnement_id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBF1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE patient DROP FOREIGN KEY FK_1ADAD7EBF1D74413');
        $this->addSql('ALTER TABLE patient DROP created_at');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1ADAD7EBE34CE745 ON patient (numero_fiche)');
        $this->addSql('DROP INDEX idx_1adad7ebf1d74413 ON patient');
        $this->addSql('CREATE INDEX FK_1ADAD7EBF1D74413 ON patient (abonnement_id)');
        $this->addSql('ALTER TABLE patient ADD CONSTRAINT FK_1ADAD7EBF1D74413 FOREIGN KEY (abonnement_id) REFERENCES abonnement (id)');
    }
}
