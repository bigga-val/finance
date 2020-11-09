<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201109130839 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE signes_vitaux DROP FOREIGN KEY FK_241656EED5CA9E6');
        $this->addSql('DROP INDEX IDX_241656EED5CA9E6 ON signes_vitaux');
        $this->addSql('ALTER TABLE signes_vitaux CHANGE service_id cabinet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE signes_vitaux ADD CONSTRAINT FK_241656ED351EC FOREIGN KEY (cabinet_id) REFERENCES cabinet (id)');
        $this->addSql('CREATE INDEX IDX_241656ED351EC ON signes_vitaux (cabinet_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE signes_vitaux DROP FOREIGN KEY FK_241656ED351EC');
        $this->addSql('DROP INDEX IDX_241656ED351EC ON signes_vitaux');
        $this->addSql('ALTER TABLE signes_vitaux CHANGE cabinet_id service_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE signes_vitaux ADD CONSTRAINT FK_241656EED5CA9E6 FOREIGN KEY (service_id) REFERENCES service (id)');
        $this->addSql('CREATE INDEX IDX_241656EED5CA9E6 ON signes_vitaux (service_id)');
    }
}
