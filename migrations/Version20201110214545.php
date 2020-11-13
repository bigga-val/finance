<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201110214545 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE anamnese (id INT AUTO_INCREMENT NOT NULL, consultation_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, description LONGTEXT NOT NULL, medical LONGTEXT DEFAULT NULL, chirurgical LONGTEXT DEFAULT NULL, familial LONGTEXT DEFAULT NULL, colateral LONGTEXT DEFAULT NULL, INDEX IDX_ACCF11EE62FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE antecedent (id INT AUTO_INCREMENT NOT NULL, signes_vitaux_id INT NOT NULL, active TINYINT(1) NOT NULL, description LONGTEXT DEFAULT NULL, UNIQUE INDEX UNIQ_3166BE7C3D59CDFC (signes_vitaux_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE complements_anamnese (id INT AUTO_INCREMENT NOT NULL, consultation_id INT NOT NULL, description LONGTEXT DEFAULT NULL, active TINYINT(1) NOT NULL, INDEX IDX_E67E30A462FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conclusion (id INT AUTO_INCREMENT NOT NULL, consultation_id INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, active TINYINT(1) NOT NULL, INDEX IDX_1D5819F562FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE examens_physiques (id INT AUTO_INCREMENT NOT NULL, consultation_id INT DEFAULT NULL, tete_cou VARCHAR(255) DEFAULT NULL, tronc VARCHAR(255) DEFAULT NULL, membres VARCHAR(255) DEFAULT NULL, divers VARCHAR(255) DEFAULT NULL, INDEX IDX_1CA56D2A62FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE traitement (id INT AUTO_INCREMENT NOT NULL, consultation_id INT DEFAULT NULL, description LONGTEXT DEFAULT NULL, active TINYINT(1) NOT NULL, INDEX IDX_2A356D2762FF6CDF (consultation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE anamnese ADD CONSTRAINT FK_ACCF11EE62FF6CDF FOREIGN KEY (consultation_id) REFERENCES signes_vitaux (id)');
        $this->addSql('ALTER TABLE antecedent ADD CONSTRAINT FK_3166BE7C3D59CDFC FOREIGN KEY (signes_vitaux_id) REFERENCES signes_vitaux (id)');
        $this->addSql('ALTER TABLE complements_anamnese ADD CONSTRAINT FK_E67E30A462FF6CDF FOREIGN KEY (consultation_id) REFERENCES signes_vitaux (id)');
        $this->addSql('ALTER TABLE conclusion ADD CONSTRAINT FK_1D5819F562FF6CDF FOREIGN KEY (consultation_id) REFERENCES signes_vitaux (id)');
        $this->addSql('ALTER TABLE examens_physiques ADD CONSTRAINT FK_1CA56D2A62FF6CDF FOREIGN KEY (consultation_id) REFERENCES signes_vitaux (id)');
        $this->addSql('ALTER TABLE traitement ADD CONSTRAINT FK_2A356D2762FF6CDF FOREIGN KEY (consultation_id) REFERENCES signes_vitaux (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE anamnese');
        $this->addSql('DROP TABLE antecedent');
        $this->addSql('DROP TABLE complements_anamnese');
        $this->addSql('DROP TABLE conclusion');
        $this->addSql('DROP TABLE examens_physiques');
        $this->addSql('DROP TABLE traitement');
    }
}
