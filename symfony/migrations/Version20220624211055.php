<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220624211055 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bookuser (id INT AUTO_INCREMENT NOT NULL, fiobook VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bookuser_books (bookuser_id INT NOT NULL, books_id INT NOT NULL, INDEX IDX_F7EB6691778A3F9B (bookuser_id), INDEX IDX_F7EB66917DD8AC20 (books_id), PRIMARY KEY(bookuser_id, books_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE readuser (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE readuser_bookuser (readuser_id INT NOT NULL, bookuser_id INT NOT NULL, INDEX IDX_8AB77506DFBCA2A7 (readuser_id), INDEX IDX_8AB77506778A3F9B (bookuser_id), PRIMARY KEY(readuser_id, bookuser_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE userbook (id INT AUTO_INCREMENT NOT NULL, fio VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bookuser_books ADD CONSTRAINT FK_F7EB6691778A3F9B FOREIGN KEY (bookuser_id) REFERENCES bookuser (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bookuser_books ADD CONSTRAINT FK_F7EB66917DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE readuser_bookuser ADD CONSTRAINT FK_8AB77506DFBCA2A7 FOREIGN KEY (readuser_id) REFERENCES readuser (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE readuser_bookuser ADD CONSTRAINT FK_8AB77506778A3F9B FOREIGN KEY (bookuser_id) REFERENCES bookuser (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bookuser_books DROP FOREIGN KEY FK_F7EB6691778A3F9B');
        $this->addSql('ALTER TABLE readuser_bookuser DROP FOREIGN KEY FK_8AB77506778A3F9B');
        $this->addSql('ALTER TABLE readuser_bookuser DROP FOREIGN KEY FK_8AB77506DFBCA2A7');
        $this->addSql('DROP TABLE bookuser');
        $this->addSql('DROP TABLE bookuser_books');
        $this->addSql('DROP TABLE readuser');
        $this->addSql('DROP TABLE readuser_bookuser');
        $this->addSql('DROP TABLE userbook');
    }
}
