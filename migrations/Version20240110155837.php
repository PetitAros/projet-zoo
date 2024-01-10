<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240110155837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE asso_habitat_famille_animal (id INT AUTO_INCREMENT NOT NULL, habitat_id INT NOT NULL, famille_animal_id INT NOT NULL, INDEX IDX_3B240128AFFE2D26 (habitat_id), INDEX IDX_3B240128AEBED700 (famille_animal_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE asso_habitat_famille_animal ADD CONSTRAINT FK_3B240128AFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id)');
        $this->addSql('ALTER TABLE asso_habitat_famille_animal ADD CONSTRAINT FK_3B240128AEBED700 FOREIGN KEY (famille_animal_id) REFERENCES famille_animal (id)');
        $this->addSql('ALTER TABLE famille_animal_habitat DROP FOREIGN KEY FK_A9F51DACAFFE2D26');
        $this->addSql('ALTER TABLE famille_animal_habitat DROP FOREIGN KEY FK_A9F51DACAEBED700');
        $this->addSql('DROP TABLE famille_animal_habitat');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE famille_animal_habitat (famille_animal_id INT NOT NULL, habitat_id INT NOT NULL, INDEX IDX_A9F51DACAFFE2D26 (habitat_id), INDEX IDX_A9F51DACAEBED700 (famille_animal_id), PRIMARY KEY(famille_animal_id, habitat_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE famille_animal_habitat ADD CONSTRAINT FK_A9F51DACAFFE2D26 FOREIGN KEY (habitat_id) REFERENCES habitat (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE famille_animal_habitat ADD CONSTRAINT FK_A9F51DACAEBED700 FOREIGN KEY (famille_animal_id) REFERENCES famille_animal (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE asso_habitat_famille_animal DROP FOREIGN KEY FK_3B240128AFFE2D26');
        $this->addSql('ALTER TABLE asso_habitat_famille_animal DROP FOREIGN KEY FK_3B240128AEBED700');
        $this->addSql('DROP TABLE asso_habitat_famille_animal');
    }
}
