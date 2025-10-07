<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250922164600 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE dictionary (id SERIAL NOT NULL, user_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1FA0E526A76ED395 ON dictionary (user_id)');
        $this->addSql('CREATE TABLE "user" (id SERIAL NOT NULL, dictionary_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649AF5E5B3C ON "user" (dictionary_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME ON "user" (username)');
        $this->addSql('CREATE TABLE word (id SERIAL NOT NULL, word VARCHAR(255) NOT NULL, translate VARCHAR(255) NOT NULL, language_code VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE dictionary ADD CONSTRAINT FK_1FA0E526A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "user" ADD CONSTRAINT FK_8D93D649AF5E5B3C FOREIGN KEY (dictionary_id) REFERENCES dictionary (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE dictionary DROP CONSTRAINT FK_1FA0E526A76ED395');
        $this->addSql('ALTER TABLE "user" DROP CONSTRAINT FK_8D93D649AF5E5B3C');
        $this->addSql('DROP TABLE dictionary');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE word');
    }
}
