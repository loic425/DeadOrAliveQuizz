<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190801205122 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_round ADD question_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_round ADD CONSTRAINT FK_133D67F91E27F6BF FOREIGN KEY (question_id) REFERENCES app_theme (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_133D67F91E27F6BF ON app_round (question_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_round DROP FOREIGN KEY FK_133D67F91E27F6BF');
        $this->addSql('DROP INDEX UNIQ_133D67F91E27F6BF ON app_round');
        $this->addSql('ALTER TABLE app_round DROP question_id');
    }
}
