<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190803142752 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_answer ADD player_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_answer ADD CONSTRAINT FK_3FDE27A599E6F5DF FOREIGN KEY (player_id) REFERENCES app_player (id)');
        $this->addSql('CREATE INDEX IDX_3FDE27A599E6F5DF ON app_answer (player_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_answer DROP FOREIGN KEY FK_3FDE27A599E6F5DF');
        $this->addSql('DROP INDEX IDX_3FDE27A599E6F5DF ON app_answer');
        $this->addSql('ALTER TABLE app_answer DROP player_id');
    }
}
