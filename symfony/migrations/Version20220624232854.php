<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220624232854 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wern_books (wern_id INT NOT NULL, books_id INT NOT NULL, INDEX IDX_A5F6F4842D71808F (wern_id), INDEX IDX_A5F6F4847DD8AC20 (books_id), PRIMARY KEY(wern_id, books_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wern_books ADD CONSTRAINT FK_A5F6F4842D71808F FOREIGN KEY (wern_id) REFERENCES wern (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wern_books ADD CONSTRAINT FK_A5F6F4847DD8AC20 FOREIGN KEY (books_id) REFERENCES books (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE wern_userread');
        $this->addSql('ALTER TABLE wern DROP FOREIGN KEY FK_2EB319D9E9E9C74F');
        $this->addSql('DROP INDEX IDX_2EB319D9E9E9C74F ON wern');
        $this->addSql('ALTER TABLE wern CHANGE namebook_id nameuse_id INT NOT NULL');
        $this->addSql('ALTER TABLE wern ADD CONSTRAINT FK_2EB319D985B90204 FOREIGN KEY (nameuse_id) REFERENCES userread (id)');
        $this->addSql('CREATE INDEX IDX_2EB319D985B90204 ON wern (nameuse_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE wern_userread (wern_id INT NOT NULL, userread_id INT NOT NULL, INDEX IDX_E781906F2D71808F (wern_id), INDEX IDX_E781906FABD55EA0 (userread_id), PRIMARY KEY(wern_id, userread_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE wern_userread ADD CONSTRAINT FK_E781906F2D71808F FOREIGN KEY (wern_id) REFERENCES wern (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wern_userread ADD CONSTRAINT FK_E781906FABD55EA0 FOREIGN KEY (userread_id) REFERENCES userread (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('DROP TABLE wern_books');
        $this->addSql('ALTER TABLE wern DROP FOREIGN KEY FK_2EB319D985B90204');
        $this->addSql('DROP INDEX IDX_2EB319D985B90204 ON wern');
        $this->addSql('ALTER TABLE wern CHANGE nameuse_id namebook_id INT NOT NULL');
        $this->addSql('ALTER TABLE wern ADD CONSTRAINT FK_2EB319D9E9E9C74F FOREIGN KEY (namebook_id) REFERENCES userread (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_2EB319D9E9E9C74F ON wern (namebook_id)');
    }
}
