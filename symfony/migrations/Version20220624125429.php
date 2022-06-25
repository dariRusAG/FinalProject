<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220624125429 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE headers_book (id INT AUTO_INCREMENT NOT NULL, genre_header_id INT NOT NULL, header_name VARCHAR(255) NOT NULL, INDEX IDX_750A6D809B9A8D16 (genre_header_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE headers_book ADD CONSTRAINT FK_750A6D809B9A8D16 FOREIGN KEY (genre_header_id) REFERENCES genres_book (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE headers_book');
    }
}
