<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220624192804 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE books (id INT AUTO_INCREMENT NOT NULL, genre_book VARCHAR(255) NOT NULL, name_book VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE catalog (id INT AUTO_INCREMENT NOT NULL, name_libr_id INT NOT NULL, genre_libr_id INT NOT NULL, INDEX IDX_1B2C32474D2EB2DB (name_libr_id), INDEX IDX_1B2C32477EC0649D (genre_libr_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE library (id INT AUTO_INCREMENT NOT NULL, name_library VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE catalog ADD CONSTRAINT FK_1B2C32474D2EB2DB FOREIGN KEY (name_libr_id) REFERENCES library (id)');
        $this->addSql('ALTER TABLE catalog ADD CONSTRAINT FK_1B2C32477EC0649D FOREIGN KEY (genre_libr_id) REFERENCES books (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE catalog DROP FOREIGN KEY FK_1B2C32477EC0649D');
        $this->addSql('ALTER TABLE catalog DROP FOREIGN KEY FK_1B2C32474D2EB2DB');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE catalog');
        $this->addSql('DROP TABLE library');
    }
}
