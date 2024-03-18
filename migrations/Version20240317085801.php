<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240317085801 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE films_salles (film_id INT NOT NULL, salle_id INT NOT NULL, INDEX IDX_CEC9CE13567F5183 (film_id), INDEX IDX_CEC9CE13DC304035 (salle_id), PRIMARY KEY(film_id, salle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE films_salles ADD CONSTRAINT FK_CEC9CE13567F5183 FOREIGN KEY (film_id) REFERENCES film (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE films_salles ADD CONSTRAINT FK_CEC9CE13DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE films_salles DROP FOREIGN KEY FK_CEC9CE13567F5183');
        $this->addSql('ALTER TABLE films_salles DROP FOREIGN KEY FK_CEC9CE13DC304035');
        $this->addSql('DROP TABLE films_salles');
    }
}
