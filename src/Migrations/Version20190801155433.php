<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190801155433 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE app_question (id INT AUTO_INCREMENT NOT NULL, round_id INT DEFAULT NULL, celebrity_id INT DEFAULT NULL, random_years LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_BE7729E3A6005CA0 (round_id), INDEX IDX_BE7729E39D12EF95 (celebrity_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_question ADD CONSTRAINT FK_BE7729E3A6005CA0 FOREIGN KEY (round_id) REFERENCES app_round (id)');
        $this->addSql('ALTER TABLE app_question ADD CONSTRAINT FK_BE7729E39D12EF95 FOREIGN KEY (celebrity_id) REFERENCES app_celebrity (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE app_question');
    }
}
