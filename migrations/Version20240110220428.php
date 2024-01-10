<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240110220428 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espece DROP FOREIGN KEY FK_1A2A1B1AEBED700');
        $this->addSql('DROP INDEX IDX_1A2A1B1AEBED700 ON espece');
        $this->addSql('ALTER TABLE espece DROP famille_animal_id');
        $this->addSql('ALTER TABLE famille_animal ADD esp√√®ce_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE famille_animal ADD CONSTRAINT FK_CD658AB10203617 FOREIGN KEY (esp√√®ce_id) REFERENCES espece (id)');
        $this->addSql('CREATE INDEX IDX_CD658AB10203617 ON famille_animal (esp√√®ce_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE espece ADD famille_animal_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE espece ADD CONSTRAINT FK_1A2A1B1AEBED700 FOREIGN KEY (famille_animal_id) REFERENCES famille_animal (id)');
        $this->addSql('CREATE INDEX IDX_1A2A1B1AEBED700 ON espece (famille_animal_id)');
        $this->addSql('ALTER TABLE famille_animal DROP FOREIGN KEY FK_CD658AB10203617');
        $this->addSql('DROP INDEX IDX_CD658AB10203617 ON famille_animal');
        $this->addSql('ALTER TABLE famille_animal DROP esp√√®ce_id');
    }
}
