<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231121215112 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE concert (id INT AUTO_INCREMENT NOT NULL, dispo_id INT DEFAULT NULL, groupe VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, demo VARCHAR(255) NOT NULL, date DATETIME NOT NULL, lieu VARCHAR(255) NOT NULL, liens VARCHAR(255) NOT NULL, INDEX IDX_D57C02D2A18C1CC9 (dispo_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE concert_user (concert_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_282EE28E83C97B2E (concert_id), INDEX IDX_282EE28EA76ED395 (user_id), PRIMARY KEY(concert_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dispo (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, place TINYINT(1) NOT NULL, INDEX IDX_483B4D2FA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, photo_profil VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE concert ADD CONSTRAINT FK_D57C02D2A18C1CC9 FOREIGN KEY (dispo_id) REFERENCES dispo (id)');
        $this->addSql('ALTER TABLE concert_user ADD CONSTRAINT FK_282EE28E83C97B2E FOREIGN KEY (concert_id) REFERENCES concert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE concert_user ADD CONSTRAINT FK_282EE28EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dispo ADD CONSTRAINT FK_483B4D2FA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert DROP FOREIGN KEY FK_D57C02D2A18C1CC9');
        $this->addSql('ALTER TABLE concert_user DROP FOREIGN KEY FK_282EE28E83C97B2E');
        $this->addSql('ALTER TABLE concert_user DROP FOREIGN KEY FK_282EE28EA76ED395');
        $this->addSql('ALTER TABLE dispo DROP FOREIGN KEY FK_483B4D2FA76ED395');
        $this->addSql('DROP TABLE concert');
        $this->addSql('DROP TABLE concert_user');
        $this->addSql('DROP TABLE dispo');
        $this->addSql('DROP TABLE user');
    }
}
