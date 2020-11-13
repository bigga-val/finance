<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201113215346 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prescription_labo ADD created_by_id INT DEFAULT NULL, ADD updated_by_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL, ADD updated_at DATETIME DEFAULT NULL, ADD resultat_examen VARCHAR(50) DEFAULT NULL');
        $this->addSql('ALTER TABLE prescription_labo ADD CONSTRAINT FK_9139FFA9B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prescription_labo ADD CONSTRAINT FK_9139FFA9896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_9139FFA9B03A8386 ON prescription_labo (created_by_id)');
        $this->addSql('CREATE INDEX IDX_9139FFA9896DBBDE ON prescription_labo (updated_by_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE prescription_labo DROP FOREIGN KEY FK_9139FFA9B03A8386');
        $this->addSql('ALTER TABLE prescription_labo DROP FOREIGN KEY FK_9139FFA9896DBBDE');
        $this->addSql('DROP INDEX IDX_9139FFA9B03A8386 ON prescription_labo');
        $this->addSql('DROP INDEX IDX_9139FFA9896DBBDE ON prescription_labo');
        $this->addSql('ALTER TABLE prescription_labo DROP created_by_id, DROP updated_by_id, DROP created_at, DROP updated_at, DROP resultat_examen');
    }
}
