<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240110221052 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE famille_animal ADD espece_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE famille_animal ADD CONSTRAINT FK_CD658AB2D191E7A FOREIGN KEY (espece_id) REFERENCES espece (id)');
        $this->addSql('CREATE INDEX IDX_CD658AB2D191E7A ON famille_animal (espece_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE famille_animal DROP FOREIGN KEY FK_CD658AB2D191E7A');
        $this->addSql('DROP INDEX IDX_CD658AB2D191E7A ON famille_animal');
        $this->addSql('ALTER TABLE famille_animal DROP espece_id');
    }
}
