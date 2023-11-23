<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231121220301 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert ADD dispo_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D2A18C1CC9 FOREIGN KEY (dispo_id) REFERENCES dispo (id)');
        $this->addSql('CREATE INDEX IDX_D57C02D2A18C1CC9 ON concert (dispo_id)');
        $this->addSql('ALTER TABLE dispo DROP FOREIGN KEY FK_483B4D2F83C97B2E');
        $this->addSql('DROP INDEX IDX_483B4D2F83C97B2E ON dispo');
        $this->addSql('ALTER TABLE dispo DROP concert_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D2A18C1CC9');
        $this->addSql('DROP INDEX IDX_D57C02D2A18C1CC9 ON concert');
        $this->addSql('ALTER TABLE concert DROP dispo_id');
        $this->addSql('ALTER TABLE dispo ADD concert_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE dispo ADD CONSTRAINT FK_483B4D2F83C97B2E FOREIGN KEY (concert_id) REFERENCES concert (id)');
        $this->addSql('CREATE INDEX IDX_483B4D2F83C97B2E ON dispo (concert_id)');
    }
}
