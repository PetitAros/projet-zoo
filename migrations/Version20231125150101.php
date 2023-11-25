<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231125150101 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asso_event_date_event ADD event_id INT DEFAULT NULL, ADD date_event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE asso_event_date_event ADD CONSTRAINT FK_AE2ECC6471F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE asso_event_date_event ADD CONSTRAINT FK_AE2ECC64B2C2812D FOREIGN KEY (date_event_id) REFERENCES date_event (id)');
        $this->addSql('CREATE INDEX IDX_AE2ECC6471F7E88B ON asso_event_date_event (event_id)');
        $this->addSql('CREATE INDEX IDX_AE2ECC64B2C2812D ON asso_event_date_event (date_event_id)');
        $this->addSql('ALTER TABLE date_event DROP FOREIGN KEY FK_815EE22B9D6A1065');
        $this->addSql('DROP INDEX IDX_815EE22B9D6A1065 ON date_event');
        $this->addSql('ALTER TABLE date_event DROP events_id');
        $this->addSql('ALTER TABLE event DROP FOREIGN KEY FK_3BAE0AA7B2C2812D');
        $this->addSql('DROP INDEX IDX_3BAE0AA7B2C2812D ON event');
        $this->addSql('ALTER TABLE event DROP date_event_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asso_event_date_event DROP FOREIGN KEY FK_AE2ECC6471F7E88B');
        $this->addSql('ALTER TABLE asso_event_date_event DROP FOREIGN KEY FK_AE2ECC64B2C2812D');
        $this->addSql('DROP INDEX IDX_AE2ECC6471F7E88B ON asso_event_date_event');
        $this->addSql('DROP INDEX IDX_AE2ECC64B2C2812D ON asso_event_date_event');
        $this->addSql('ALTER TABLE asso_event_date_event DROP event_id, DROP date_event_id');
        $this->addSql('ALTER TABLE date_event ADD events_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE date_event ADD CONSTRAINT FK_815EE22B9D6A1065 FOREIGN KEY (events_id) REFERENCES asso_event_date_event (id)');
        $this->addSql('CREATE INDEX IDX_815EE22B9D6A1065 ON date_event (events_id)');
        $this->addSql('ALTER TABLE event ADD date_event_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7B2C2812D FOREIGN KEY (date_event_id) REFERENCES asso_event_date_event (id)');
        $this->addSql('CREATE INDEX IDX_3BAE0AA7B2C2812D ON event (date_event_id)');
    }
}
