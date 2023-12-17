<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231217222209 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE asso_event_reservation (id INT AUTO_INCREMENT NOT NULL, event_id INT NOT NULL, reservation_id INT NOT NULL, INDEX IDX_A484657A71F7E88B (event_id), INDEX IDX_A484657AB83297E7 (reservation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE billet (id INT AUTO_INCREMENT NOT NULL, nb_jours INT NOT NULL, tarif_adult DOUBLE PRECISION NOT NULL, tarif_child DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, billet_id INT NOT NULL, date_reservation DATE NOT NULL, nb_places_adult INT NOT NULL, nb_places_child INT NOT NULL, INDEX IDX_42C8495544973C78 (billet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE asso_event_reservation ADD CONSTRAINT FK_A484657A71F7E88B FOREIGN KEY (event_id) REFERENCES event (id)');
        $this->addSql('ALTER TABLE asso_event_reservation ADD CONSTRAINT FK_A484657AB83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495544973C78 FOREIGN KEY (billet_id) REFERENCES billet (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asso_event_reservation DROP FOREIGN KEY FK_A484657A71F7E88B');
        $this->addSql('ALTER TABLE asso_event_reservation DROP FOREIGN KEY FK_A484657AB83297E7');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C8495544973C78');
        $this->addSql('DROP TABLE asso_event_reservation');
        $this->addSql('DROP TABLE billet');
        $this->addSql('DROP TABLE reservation');
    }
}
