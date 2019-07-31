<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190731153917 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_game_session ADD author_id INT DEFAULT NULL, ADD challenged_customer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE app_game_session ADD CONSTRAINT FK_8708B07AF675F31B FOREIGN KEY (author_id) REFERENCES sylius_customer (id)');
        $this->addSql('ALTER TABLE app_game_session ADD CONSTRAINT FK_8708B07A98315018 FOREIGN KEY (challenged_customer_id) REFERENCES sylius_customer (id)');
        $this->addSql('CREATE INDEX IDX_8708B07AF675F31B ON app_game_session (author_id)');
        $this->addSql('CREATE INDEX IDX_8708B07A98315018 ON app_game_session (challenged_customer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_game_session DROP FOREIGN KEY FK_8708B07AF675F31B');
        $this->addSql('ALTER TABLE app_game_session DROP FOREIGN KEY FK_8708B07A98315018');
        $this->addSql('DROP INDEX IDX_8708B07AF675F31B ON app_game_session');
        $this->addSql('DROP INDEX IDX_8708B07A98315018 ON app_game_session');
        $this->addSql('ALTER TABLE app_game_session DROP author_id, DROP challenged_customer_id');
    }
}
