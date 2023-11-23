<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231121220501 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE concert_user DROP FOREIGN KEY FK_282EE28E83C97B2E');
        $this->addSql('ALTER TABLE concert_user DROP FOREIGN KEY FK_282EE28EA76ED395');
        $this->addSql('DROP TABLE concert_user');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE concert_user (concert_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_282EE28E83C97B2E (concert_id), INDEX IDX_282EE28EA76ED395 (user_id), PRIMARY KEY(concert_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE concert_user ADD CONSTRAINT FK_282EE28E83C97B2E FOREIGN KEY (concert_id) REFERENCES concert (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE concert_user ADD CONSTRAINT FK_282EE28EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
    }
}
