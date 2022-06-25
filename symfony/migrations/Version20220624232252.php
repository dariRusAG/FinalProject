<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220624232252 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bookuser_books DROP FOREIGN KEY FK_F7EB6691778A3F9B');
        $this->addSql('ALTER TABLE readuser_bookuser DROP FOREIGN KEY FK_8AB77506778A3F9B');
        $this->addSql('ALTER TABLE readuser_bookuser DROP FOREIGN KEY FK_8AB77506DFBCA2A7');
        $this->addSql('CREATE TABLE wer (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wer_userread (wer_id INT NOT NULL, userread_id INT NOT NULL, INDEX IDX_EDBA913AE0110D2 (wer_id), INDEX IDX_EDBA913ABD55EA0 (userread_id), PRIMARY KEY(wer_id, userread_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wer_books (wer_id INT NOT NULL, books_id INT NOT NULL, INDEX IDX_E0D6B2C2AE0110D2 (wer_id), INDEX IDX_E0D6B2C27DD8AC20 (books_id), PRIMARY KEY(wer_id, books_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wern (id INT AUTO_INCREMENT NOT NULL, namebook_id INT NOT NULL, INDEX IDX_2EB319D9E9E9C74F (namebook_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wern_userread (wern_id INT NOT NULL, userread_id INT NOT NULL, INDEX IDX_E781906F2D71808F (wern_id), INDEX IDX_E781906FABD55EA0 (userread_id), PRIMARY KEY(wern_id, userread_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wer_userread ADD CONSTRAINT FK_EDBA913AE0110D2 FOREIGN KEY (wer_id) REFERENCES wer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wer_userread ADD CONSTRAINT FK_EDBA913ABD55EA0 FOREIGN KEY (userread_id) REFERENCES userread (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wer_books ADD CONSTRAINT FK_E0D6B2C2AE0110D2 FOREIGN KEY (wer_id) REFERENCES wer (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wer_books ADD CONSTRAINT FK_E0D6B2C27DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wern ADD CONSTRAINT FK_2EB319D9E9E9C74F FOREIGN KEY (namebook_id) REFERENCES userread (id)');
        $this->addSql('ALTER TABLE wern_userread ADD CONSTRAINT FK_E781906F2D71808F FOREIGN KEY (wern_id) REFERENCES wern (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wern_userread ADD CONSTRAINT FK_E781906FABD55EA0 FOREIGN KEY (userread_id) REFERENCES userread (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE bookuser');
        $this->addSql('DROP TABLE bookuser_books');
        $this->addSql('DROP TABLE readuser');
        $this->addSql('DROP TABLE readuser_bookuser');
        $this->addSql('DROP TABLE userbook');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wer_userread DROP FOREIGN KEY FK_EDBA913AE0110D2');
        $this->addSql('ALTER TABLE wer_books DROP FOREIGN KEY FK_E0D6B2C2AE0110D2');
        $this->addSql('ALTER TABLE wern_userread DROP FOREIGN KEY FK_E781906F2D71808F');
        $this->addSql('CREATE TABLE bookuser (id INT AUTO_INCREMENT NOT NULL, fiobook VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE bookuser_books (bookuser_id INT NOT NULL, books_id INT NOT NULL, INDEX IDX_F7EB6691778A3F9B (bookuser_id), INDEX IDX_F7EB66917DD8AC20 (books_id), PRIMARY KEY(bookuser_id, books_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE readuser (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE readuser_bookuser (readuser_id INT NOT NULL, bookuser_id INT NOT NULL, INDEX IDX_8AB77506778A3F9B (bookuser_id), INDEX IDX_8AB77506DFBCA2A7 (readuser_id), PRIMARY KEY(readuser_id, bookuser_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE userbook (id INT AUTO_INCREMENT NOT NULL, fio VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE bookuser_books ADD CONSTRAINT FK_F7EB6691778A3F9B FOREIGN KEY (bookuser_id) REFERENCES bookuser (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE bookuser_books ADD CONSTRAINT FK_F7EB66917DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE readuser_bookuser ADD CONSTRAINT FK_8AB77506778A3F9B FOREIGN KEY (bookuser_id) REFERENCES bookuser (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE readuser_bookuser ADD CONSTRAINT FK_8AB77506DFBCA2A7 FOREIGN KEY (readuser_id) REFERENCES readuser (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE wer');
        $this->addSql('DROP TABLE wer_userread');
        $this->addSql('DROP TABLE wer_books');
        $this->addSql('DROP TABLE wern');
        $this->addSql('DROP TABLE wern_userread');
    }
}
