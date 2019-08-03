<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190803152556 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE celebrity_theme (celebrity_id INT NOT NULL, theme_id INT NOT NULL, INDEX IDX_5FF758829D12EF95 (celebrity_id), INDEX IDX_5FF7588259027487 (theme_id), PRIMARY KEY(celebrity_id, theme_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE celebrity_theme ADD CONSTRAINT FK_5FF758829D12EF95 FOREIGN KEY (celebrity_id) REFERENCES app_celebrity (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE celebrity_theme ADD CONSTRAINT FK_5FF7588259027487 FOREIGN KEY (theme_id) REFERENCES app_theme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE celebrity_theme');
    }
}
