<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240110214527 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espece ADD famille_animal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE espece ADD CONSTRAINT FK_1A2A1B1AEBED700 FOREIGN KEY (famille_animal_id) REFERENCES famille_animal (id)');
        $this->addSql('CREATE INDEX IDX_1A2A1B1AEBED700 ON espece (famille_animal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espece DROP FOREIGN KEY FK_1A2A1B1AEBED700');
        $this->addSql('DROP INDEX IDX_1A2A1B1AEBED700 ON espece');
        $this->addSql('ALTER TABLE espece DROP famille_animal_id');
    }
}
