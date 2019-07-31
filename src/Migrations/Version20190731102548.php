<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190731102548 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_theme_translation DROP FOREIGN KEY FK_FD07FBFF2C2AC5D3');
        $this->addSql('ALTER TABLE app_theme_translation CHANGE translatable_id translatable_id INT NOT NULL');
        $this->addSql('ALTER TABLE app_theme_translation ADD CONSTRAINT FK_FD07FBFF2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES app_theme (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_theme_translation DROP FOREIGN KEY FK_FD07FBFF2C2AC5D3');
        $this->addSql('ALTER TABLE app_theme_translation CHANGE translatable_id translatable_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_theme_translation ADD CONSTRAINT FK_FD07FBFF2C2AC5D3 FOREIGN KEY (translatable_id) REFERENCES app_theme (id)');
    }
}
