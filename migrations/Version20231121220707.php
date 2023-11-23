<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231121220707 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D2A18C1CC9');
        $this->addSql('CREATE TABLE interesser (id INT AUTO_INCREMENT NOT NULL, concert_id INT DEFAULT NULL, INDEX IDX_35C9E3AC83C97B2E (concert_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE interesser ADD CONSTRAINT FK_35C9E3AC83C97B2E FOREIGN KEY (concert_id) REFERENCES concert (id)');
        $this->addSql('ALTER TABLE dispo DROP FOREIGN KEY FK_483B4D2FA76ED395');
        $this->addSql('DROP TABLE dispo');
        $this->addSql('DROP INDEX IDX_D57C02D2A18C1CC9 ON concert');
        $this->addSql('ALTER TABLE concert DROP dispo_id');
        $this->addSql('ALTER TABLE user ADD interesser_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64921C8BB3A FOREIGN KEY (interesser_id) REFERENCES interesser (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64921C8BB3A ON user (interesser_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64921C8BB3A');
        $this->addSql('CREATE TABLE dispo (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, place TINYINT(1) NOT NULL, INDEX IDX_483B4D2FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE dispo ADD CONSTRAINT FK_483B4D2FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE interesser DROP FOREIGN KEY FK_35C9E3AC83C97B2E');
        $this->addSql('DROP TABLE interesser');
        $this->addSql('ALTER TABLE concert ADD dispo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D2A18C1CC9 FOREIGN KEY (dispo_id) REFERENCES dispo (id)');
        $this->addSql('CREATE INDEX IDX_D57C02D2A18C1CC9 ON concert (dispo_id)');
        $this->addSql('DROP INDEX IDX_8D93D64921C8BB3A ON user');
        $this->addSql('ALTER TABLE user DROP interesser_id');
    }
}
