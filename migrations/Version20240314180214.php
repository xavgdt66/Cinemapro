<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240314180214 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salle DROP FOREIGN KEY FK_4E977E5CA76ED395');
        $this->addSql('DROP INDEX IDX_4E977E5CA76ED395 ON salle');
        $this->addSql('ALTER TABLE salle DROP user_id, DROP nombre_de_salle, CHANGE numerosalle numerosalle INT NOT NULL, CHANGE capacite capacite INT NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE salle ADD user_id INT NOT NULL, ADD nombre_de_salle INT DEFAULT NULL, CHANGE numerosalle numerosalle INT DEFAULT NULL, CHANGE capacite capacite INT DEFAULT NULL');
        $this->addSql('ALTER TABLE salle ADD CONSTRAINT FK_4E977E5CA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_4E977E5CA76ED395 ON salle (user_id)');
    }
}
