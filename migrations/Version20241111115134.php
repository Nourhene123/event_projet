<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241111115134 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user_events (user_id INT NOT NULL, events_id INT NOT NULL, INDEX IDX_36D54C77A76ED395 (user_id), INDEX IDX_36D54C779D6A1065 (events_id), PRIMARY KEY(user_id, events_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_events ADD CONSTRAINT FK_36D54C77A76ED395 FOREIGN KEY (user_id) REFERENCES user (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_events ADD CONSTRAINT FK_36D54C779D6A1065 FOREIGN KEY (events_id) REFERENCES events (id) ON DELETE CASCADE');
        $this->addSql('DROP TABLE organisateur');
        $this->addSql('DROP TABLE participant');
        $this->addSql('ALTER TABLE events ADD local_id INT NOT NULL, ADD many_to_one VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A5D5A2101 FOREIGN KEY (local_id) REFERENCES local (id)');
        $this->addSql('CREATE INDEX IDX_5387574A5D5A2101 ON events (local_id)');
        $this->addSql('ALTER TABLE local ADD louer_id INT NOT NULL');
        $this->addSql('ALTER TABLE local ADD CONSTRAINT FK_8BD688E8CD9346EB FOREIGN KEY (louer_id) REFERENCES louer (id)');
        $this->addSql('CREATE INDEX IDX_8BD688E8CD9346EB ON local (louer_id)');
        $this->addSql('ALTER TABLE reservation ADD ticket_id INT NOT NULL, ADD user_id INT NOT NULL, ADD events_id INT NOT NULL');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955700047D2 FOREIGN KEY (ticket_id) REFERENCES tickets (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849559D6A1065 FOREIGN KEY (events_id) REFERENCES events (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_42C84955700047D2 ON reservation (ticket_id)');
        $this->addSql('CREATE INDEX IDX_42C84955A76ED395 ON reservation (user_id)');
        $this->addSql('CREATE INDEX IDX_42C849559D6A1065 ON reservation (events_id)');
        $this->addSql('ALTER TABLE user ADD role LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE organisateur (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE participant (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE user_events DROP FOREIGN KEY FK_36D54C77A76ED395');
        $this->addSql('ALTER TABLE user_events DROP FOREIGN KEY FK_36D54C779D6A1065');
        $this->addSql('DROP TABLE user_events');
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A5D5A2101');
        $this->addSql('DROP INDEX IDX_5387574A5D5A2101 ON events');
        $this->addSql('ALTER TABLE events DROP local_id, DROP many_to_one');
        $this->addSql('ALTER TABLE local DROP FOREIGN KEY FK_8BD688E8CD9346EB');
        $this->addSql('DROP INDEX IDX_8BD688E8CD9346EB ON local');
        $this->addSql('ALTER TABLE local DROP louer_id');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955700047D2');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849559D6A1065');
        $this->addSql('DROP INDEX UNIQ_42C84955700047D2 ON reservation');
        $this->addSql('DROP INDEX IDX_42C84955A76ED395 ON reservation');
        $this->addSql('DROP INDEX IDX_42C849559D6A1065 ON reservation');
        $this->addSql('ALTER TABLE reservation DROP ticket_id, DROP user_id, DROP events_id');
        $this->addSql('ALTER TABLE user DROP role');
    }
}
