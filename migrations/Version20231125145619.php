<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231125145619 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE asso_event_date_event (id INT AUTO_INCREMENT NOT NULL, horaire TIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event_date_event DROP FOREIGN KEY FK_D9B03B0471F7E88B');
        $this->addSql('ALTER TABLE event_date_event DROP FOREIGN KEY FK_D9B03B04B2C2812D');
        $this->addSql('DROP TABLE event_date_event');
        $this->addSql('ALTER TABLE date_event ADD events_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE date_event ADD CONSTRAINT FK_815EE22B9D6A1065 FOREIGN KEY (events_id) REFERENCES asso_event_date_event (id)');
        $this->addSql('CREATE INDEX IDX_815EE22B9D6A1065 ON date_event (events_id)');
        $this->addSql('ALTER TABLE event ADD date_event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7B2C2812D FOREIGN KEY (date_event_id) REFERENCES asso_event_date_event (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7B2C2812D ON event (date_event_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE date_event DROP FOREIGN KEY FK_815EE22B9D6A1065');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7B2C2812D');
        $this->addSql('CREATE TABLE event_date_event (event_id INT NOT NULL, date_event_id INT NOT NULL, INDEX IDX_D9B03B04B2C2812D (date_event_id), INDEX IDX_D9B03B0471F7E88B (event_id), PRIMARY KEY(event_id, date_event_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE event_date_event ADD CONSTRAINT FK_D9B03B0471F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE event_date_event ADD CONSTRAINT FK_D9B03B04B2C2812D FOREIGN KEY (date_event_id) REFERENCES date_event (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE asso_event_date_event');
        $this->addSql('DROP INDEX IDX_3BAE0AA7B2C2812D ON event');
        $this->addSql('ALTER TABLE event DROP date_event_id');
        $this->addSql('DROP INDEX IDX_815EE22B9D6A1065 ON date_event');
        $this->addSql('ALTER TABLE date_event DROP events_id');
    }
}
