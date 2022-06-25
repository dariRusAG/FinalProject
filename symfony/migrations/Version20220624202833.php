<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220624202833 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bookuserread (id INT AUTO_INCREMENT NOT NULL, familyuse_id INT NOT NULL, nameuse_id INT NOT NULL, UNIQUE INDEX UNIQ_D942F0FD77E8C332 (familyuse_id), UNIQUE INDEX UNIQ_D942F0FD85B90204 (nameuse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bookuserread_books (bookuserread_id INT NOT NULL, books_id INT NOT NULL, INDEX IDX_925E029D5733E46B (bookuserread_id), INDEX IDX_925E029D7DD8AC20 (books_id), PRIMARY KEY(bookuserread_id, books_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE userread (id INT AUTO_INCREMENT NOT NULL, family VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, age VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE bookuserread ADD CONSTRAINT FK_D942F0FD77E8C332 FOREIGN KEY (familyuse_id) REFERENCES userread (id)');
        $this->addSql('ALTER TABLE bookuserread ADD CONSTRAINT FK_D942F0FD85B90204 FOREIGN KEY (nameuse_id) REFERENCES userread (id)');
        $this->addSql('ALTER TABLE bookuserread_books ADD CONSTRAINT FK_925E029D5733E46B FOREIGN KEY (bookuserread_id) REFERENCES bookuserread (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bookuserread_books ADD CONSTRAINT FK_925E029D7DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bookuserread_books DROP FOREIGN KEY FK_925E029D5733E46B');
        $this->addSql('ALTER TABLE bookuserread DROP FOREIGN KEY FK_D942F0FD77E8C332');
        $this->addSql('ALTER TABLE bookuserread DROP FOREIGN KEY FK_D942F0FD85B90204');
        $this->addSql('DROP TABLE bookuserread');
        $this->addSql('DROP TABLE bookuserread_books');
        $this->addSql('DROP TABLE userread');
    }
}
