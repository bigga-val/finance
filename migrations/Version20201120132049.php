<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201120132049 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE prescription_produit (id INT AUTO_INCREMENT NOT NULL, produit_id INT DEFAULT NULL, created_by_id INT DEFAULT NULL, updated_by_id INT DEFAULT NULL, quantite_prescrite INT DEFAULT NULL, nombre_jours INT DEFAULT NULL, nombre_produit_jour INT DEFAULT NULL, created_at DATETIME DEFAULT NULL, update_at DATETIME DEFAULT NULL, INDEX IDX_5E09C059F347EFB (produit_id), INDEX IDX_5E09C059B03A8386 (created_by_id), INDEX IDX_5E09C059896DBBDE (updated_by_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE prescription_produit ADD CONSTRAINT FK_5E09C059F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id)');
        $this->addSql('ALTER TABLE prescription_produit ADD CONSTRAINT FK_5E09C059B03A8386 FOREIGN KEY (created_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prescription_produit ADD CONSTRAINT FK_5E09C059896DBBDE FOREIGN KEY (updated_by_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D9A76ED395');
        $this->addSql('DROP INDEX IDX_1FBFB8D9A76ED395 ON prescription');
        $this->addSql('ALTER TABLE prescription DROP user_id, DROP quantite, DROP observation');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE prescription_produit');
        $this->addSql('ALTER TABLE prescription ADD user_id INT NOT NULL, ADD quantite INT NOT NULL, ADD observation VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_1FBFB8D9A76ED395 ON prescription (user_id)');
    }
}
