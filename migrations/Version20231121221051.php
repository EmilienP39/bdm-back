<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231121221051 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert ADD interesser_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D221C8BB3A FOREIGN KEY (interesser_id) REFERENCES interesser (id)');
        $this->addSql('CREATE INDEX IDX_D57C02D221C8BB3A ON concert (interesser_id)');
        $this->addSql('ALTER TABLE interesser DROP FOREIGN KEY FK_35C9E3AC83C97B2E');
        $this->addSql('DROP INDEX IDX_35C9E3AC83C97B2E ON interesser');
        $this->addSql('ALTER TABLE interesser ADD place TINYINT(1) NOT NULL, DROP concert_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE interesser ADD concert_id INT DEFAULT NULL, DROP place');
        $this->addSql('ALTER TABLE interesser ADD CONSTRAINT FK_35C9E3AC83C97B2E FOREIGN KEY (concert_id) REFERENCES concert (id)');
        $this->addSql('CREATE INDEX IDX_35C9E3AC83C97B2E ON interesser (concert_id)');
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D221C8BB3A');
        $this->addSql('DROP INDEX IDX_D57C02D221C8BB3A ON concert');
        $this->addSql('ALTER TABLE concert DROP interesser_id');
    }
}
