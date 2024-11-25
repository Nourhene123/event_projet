<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241122174831 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events DROP FOREIGN KEY FK_5387574A5D5A2101');
        $this->addSql('DROP INDEX IDX_5387574A5D5A2101 ON events');
        $this->addSql('ALTER TABLE events DROP local_id, DROP many_to_one');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE events ADD local_id INT NOT NULL, ADD many_to_one VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE events ADD CONSTRAINT FK_5387574A5D5A2101 FOREIGN KEY (local_id) REFERENCES local (id)');
        $this->addSql('CREATE INDEX IDX_5387574A5D5A2101 ON events (local_id)');
    }
}
