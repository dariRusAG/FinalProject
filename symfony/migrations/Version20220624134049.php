<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220624134049 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE records (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE records_readers (records_id INT NOT NULL, readers_id INT NOT NULL, INDEX IDX_A23CE4EEE8A0C7B (records_id), INDEX IDX_A23CE4E5FDB0FFD (readers_id), PRIMARY KEY(records_id, readers_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE records_readers ADD CONSTRAINT FK_A23CE4EEE8A0C7B FOREIGN KEY (records_id) REFERENCES records (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE records_readers ADD CONSTRAINT FK_A23CE4E5FDB0FFD FOREIGN KEY (readers_id) REFERENCES readers (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE records_readers DROP FOREIGN KEY FK_A23CE4EEE8A0C7B');
        $this->addSql('DROP TABLE records');
        $this->addSql('DROP TABLE records_readers');
    }
}
