<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231129145037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal ADD famille_id INT NOT NULL');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F97A77B84 FOREIGN KEY (famille_id) REFERENCES famille_animal (id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F97A77B84 ON animal (famille_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F97A77B84');
        $this->addSql('DROP INDEX IDX_6AAB231F97A77B84 ON animal');
        $this->addSql('ALTER TABLE animal DROP famille_id');
    }
}
