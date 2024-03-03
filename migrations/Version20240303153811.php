<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240303153811 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE horaire_film DROP FOREIGN KEY FK_DA2AA37A567F5183');
        $this->addSql('ALTER TABLE horaire_film DROP FOREIGN KEY FK_DA2AA37A58C54515');
        $this->addSql('DROP TABLE horaire_film');
        $this->addSql('ALTER TABLE horaire ADD film_id INT NOT NULL');
        $this->addSql('ALTER TABLE horaire ADD CONSTRAINT FK_BBC83DB6567F5183 FOREIGN KEY (film_id) REFERENCES film (id)');
        $this->addSql('CREATE INDEX IDX_BBC83DB6567F5183 ON horaire (film_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE horaire_film (horaire_id INT NOT NULL, film_id INT NOT NULL, INDEX IDX_DA2AA37A58C54515 (horaire_id), INDEX IDX_DA2AA37A567F5183 (film_id), PRIMARY KEY(horaire_id, film_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE horaire_film ADD CONSTRAINT FK_DA2AA37A567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE horaire_film ADD CONSTRAINT FK_DA2AA37A58C54515 FOREIGN KEY (horaire_id) REFERENCES horaire (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE horaire DROP FOREIGN KEY FK_BBC83DB6567F5183');
        $this->addSql('DROP INDEX IDX_BBC83DB6567F5183 ON horaire');
        $this->addSql('ALTER TABLE horaire DROP film_id');
    }
}
