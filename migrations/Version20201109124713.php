<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201109124713 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE agent_cabinet (id INT AUTO_INCREMENT NOT NULL, agent_id INT DEFAULT NULL, cabinet_id INT DEFAULT NULL, active TINYINT(1) NOT NULL, INDEX IDX_9EBE671A3414710B (agent_id), INDEX IDX_9EBE671AD351EC (cabinet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE cabinet (id INT AUTO_INCREMENT NOT NULL, designation VARCHAR(3) NOT NULL, active TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agent_cabinet ADD CONSTRAINT FK_9EBE671A3414710B FOREIGN KEY (agent_id) REFERENCES agent (id)');
        $this->addSql('ALTER TABLE agent_cabinet ADD CONSTRAINT FK_9EBE671AD351EC FOREIGN KEY (cabinet_id) REFERENCES cabinet (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE agent_cabinet DROP FOREIGN KEY FK_9EBE671AD351EC');
        $this->addSql('DROP TABLE agent_cabinet');
        $this->addSql('DROP TABLE cabinet');
    }
}
