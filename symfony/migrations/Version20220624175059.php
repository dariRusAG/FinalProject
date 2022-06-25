<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220624175059 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE books (id INT AUTO_INCREMENT NOT NULL, genre VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE catalog (id INT AUTO_INCREMENT NOT NULL, name_libr_id INT NOT NULL, INDEX IDX_1B2C32474D2EB2DB (name_libr_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE catalog_books (catalog_id INT NOT NULL, books_id INT NOT NULL, INDEX IDX_F3084B2BCC3C66FC (catalog_id), INDEX IDX_F3084B2B7DD8AC20 (books_id), PRIMARY KEY(catalog_id, books_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE library (id INT AUTO_INCREMENT NOT NULL, name_library VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE catalog ADD CONSTRAINT FK_1B2C32474D2EB2DB FOREIGN KEY (name_libr_id) REFERENCES library (id)');
        $this->addSql('ALTER TABLE catalog_books ADD CONSTRAINT FK_F3084B2BCC3C66FC FOREIGN KEY (catalog_id) REFERENCES catalog (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE catalog_books ADD CONSTRAINT FK_F3084B2B7DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE catalog_books DROP FOREIGN KEY FK_F3084B2B7DD8AC20');
        $this->addSql('ALTER TABLE catalog_books DROP FOREIGN KEY FK_F3084B2BCC3C66FC');
        $this->addSql('ALTER TABLE catalog DROP FOREIGN KEY FK_1B2C32474D2EB2DB');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE catalog');
        $this->addSql('DROP TABLE catalog_books');
        $this->addSql('DROP TABLE library');
    }
}
