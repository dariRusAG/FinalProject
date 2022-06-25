<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220624111002 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE titles_book (id INT AUTO_INCREMENT NOT NULL, genre_name_id INT NOT NULL, title_name VARCHAR(255) NOT NULL, INDEX IDX_265FA0104A920F2E (genre_name_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE titles_book ADD CONSTRAINT FK_265FA0104A920F2E FOREIGN KEY (genre_name_id) REFERENCES genres_book (id)');
    }
}
