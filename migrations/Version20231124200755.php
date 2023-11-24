<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231124200755 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE date_event (id INT AUTO_INCREMENT NOT NULL, date_event DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE event_date_event (event_id INT NOT NULL, date_event_id INT NOT NULL, INDEX IDX_D9B03B0471F7E88B (event_id), INDEX IDX_D9B03B04B2C2812D (date_event_id), PRIMARY KEY(event_id, date_event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_date_event ADD CONSTRAINT FK_D9B03B0471F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_date_event ADD CONSTRAINT FK_D9B03B04B2C2812D FOREIGN KEY (date_event_id) REFERENCES date_event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event DROP date_event');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE event_date_event DROP FOREIGN KEY FK_D9B03B0471F7E88B');
        $this->addSql('ALTER TABLE event_date_event DROP FOREIGN KEY FK_D9B03B04B2C2812D');
        $this->addSql('DROP TABLE date_event');
        $this->addSql('DROP TABLE event_date_event');
        $this->addSql('ALTER TABLE event ADD date_event DATE NOT NULL');
    }
}
