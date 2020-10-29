<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201028085912 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE acte (id INT AUTO_INCREMENT NOT NULL, service_id INT DEFAULT NULL, designation VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_9EC41326ED5CA9E6 (service_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE agent (id INT AUTO_INCREMENT NOT NULL, fonction_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, postnom VARCHAR(255) NOT NULL, genre VARCHAR(1) NOT NULL, active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_268B9C9D57889920 (fonction_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fonction (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE paiement_acte (id INT AUTO_INCREMENT NOT NULL, patient_id INT DEFAULT NULL, acte_id INT NOT NULL, user_id INT NOT NULL, date_paiement DATETIME NOT NULL, active TINYINT(1) NOT NULL, INDEX IDX_61FE598B6B899279 (patient_id), INDEX IDX_61FE598BA767B8C7 (acte_id), INDEX IDX_61FE598BA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE patient (id INT AUTO_INCREMENT NOT NULL, nom_complet VARCHAR(50) NOT NULL, numero_fiche VARCHAR(20) NOT NULL, genre VARCHAR(1) NOT NULL, type VARCHAR(20) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prescription (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, quantite INT NOT NULL, observation VARCHAR(255) NOT NULL, INDEX IDX_1FBFB8D9A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE prescription_produit (prescription_id INT NOT NULL, produit_id INT NOT NULL, INDEX IDX_5E09C05993DB413D (prescription_id), INDEX IDX_5E09C059F347EFB (produit_id), PRIMARY KEY(prescription_id, produit_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, format VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, agent_id INT NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, active TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_8D93D6493414710B (agent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE acte ADD CONSTRAINT FK_9EC41326ED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('ALTER TABLE agent ADD CONSTRAINT FK_268B9C9D57889920 FOREIGN KEY (fonction_id) REFERENCES fonction (id)');
        $this->addSql('ALTER TABLE paiement_acte ADD CONSTRAINT FK_61FE598B6B899279 FOREIGN KEY (patient_id) REFERENCES patient (id)');
        $this->addSql('ALTER TABLE paiement_acte ADD CONSTRAINT FK_61FE598BA767B8C7 FOREIGN KEY (acte_id) REFERENCES acte (id)');
        $this->addSql('ALTER TABLE paiement_acte ADD CONSTRAINT FK_61FE598BA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prescription ADD CONSTRAINT FK_1FBFB8D9A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE prescription_produit ADD CONSTRAINT FK_5E09C05993DB413D FOREIGN KEY (prescription_id) REFERENCES prescription (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE prescription_produit ADD CONSTRAINT FK_5E09C059F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6493414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE paiement_acte DROP FOREIGN KEY FK_61FE598BA767B8C7');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6493414710B');
        $this->addSql('ALTER TABLE agent DROP FOREIGN KEY FK_268B9C9D57889920');
        $this->addSql('ALTER TABLE paiement_acte DROP FOREIGN KEY FK_61FE598B6B899279');
        $this->addSql('ALTER TABLE prescription_produit DROP FOREIGN KEY FK_5E09C05993DB413D');
        $this->addSql('ALTER TABLE prescription_produit DROP FOREIGN KEY FK_5E09C059F347EFB');
        $this->addSql('ALTER TABLE acte DROP FOREIGN KEY FK_9EC41326ED5CA9E6');
        $this->addSql('ALTER TABLE paiement_acte DROP FOREIGN KEY FK_61FE598BA76ED395');
        $this->addSql('ALTER TABLE prescription DROP FOREIGN KEY FK_1FBFB8D9A76ED395');
        $this->addSql('DROP TABLE acte');
        $this->addSql('DROP TABLE agent');
        $this->addSql('DROP TABLE fonction');
        $this->addSql('DROP TABLE paiement_acte');
        $this->addSql('DROP TABLE patient');
        $this->addSql('DROP TABLE prescription');
        $this->addSql('DROP TABLE prescription_produit');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE user');
    }
}
