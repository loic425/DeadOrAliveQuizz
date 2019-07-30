<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190730124302 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE app_round (id INT AUTO_INCREMENT NOT NULL, game_session_id INT DEFAULT NULL, theme_id INT DEFAULT NULL, INDEX IDX_133D67F98FE32B32 (game_session_id), INDEX IDX_133D67F959027487 (theme_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_game_session (id INT AUTO_INCREMENT NOT NULL, started_at DATETIME DEFAULT NULL, ended_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_round_score (id INT AUTO_INCREMENT NOT NULL, round_id INT DEFAULT NULL, player_id INT DEFAULT NULL, score INT DEFAULT NULL, INDEX IDX_BD0F0514A6005CA0 (round_id), INDEX IDX_BD0F051499E6F5DF (player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_player (id INT AUTO_INCREMENT NOT NULL, game_session_id INT DEFAULT NULL, customer_id INT DEFAULT NULL, score INT DEFAULT NULL, INDEX IDX_7D1A17E58FE32B32 (game_session_id), INDEX IDX_7D1A17E59395C3F3 (customer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE app_round ADD CONSTRAINT FK_133D67F98FE32B32 FOREIGN KEY (game_session_id) REFERENCES app_game_session (id)');
        $this->addSql('ALTER TABLE app_round ADD CONSTRAINT FK_133D67F959027487 FOREIGN KEY (theme_id) REFERENCES app_theme (id)');
        $this->addSql('ALTER TABLE app_round_score ADD CONSTRAINT FK_BD0F0514A6005CA0 FOREIGN KEY (round_id) REFERENCES app_round (id)');
        $this->addSql('ALTER TABLE app_round_score ADD CONSTRAINT FK_BD0F051499E6F5DF FOREIGN KEY (player_id) REFERENCES app_player (id)');
        $this->addSql('ALTER TABLE app_player ADD CONSTRAINT FK_7D1A17E58FE32B32 FOREIGN KEY (game_session_id) REFERENCES app_game_session (id)');
        $this->addSql('ALTER TABLE app_player ADD CONSTRAINT FK_7D1A17E59395C3F3 FOREIGN KEY (customer_id) REFERENCES sylius_customer (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE app_round_score DROP FOREIGN KEY FK_BD0F0514A6005CA0');
        $this->addSql('ALTER TABLE app_round DROP FOREIGN KEY FK_133D67F98FE32B32');
        $this->addSql('ALTER TABLE app_player DROP FOREIGN KEY FK_7D1A17E58FE32B32');
        $this->addSql('ALTER TABLE app_round_score DROP FOREIGN KEY FK_BD0F051499E6F5DF');
        $this->addSql('DROP TABLE app_round');
        $this->addSql('DROP TABLE app_game_session');
        $this->addSql('DROP TABLE app_round_score');
        $this->addSql('DROP TABLE app_player');
    }
}
