<?php

namespace Application\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20150910224321 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE tasks (id INT NOT NULL, description VARCHAR(255) NOT NULL, status VARCHAR(255) NOT NULL, createdAt TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, todoList_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_5058659762AB5DB6 ON tasks (todoList_id)');
        $this->addSql('CREATE TABLE todos (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE tasks ADD CONSTRAINT FK_5058659762AB5DB6 FOREIGN KEY (todoList_id) REFERENCES todos (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE tasks DROP CONSTRAINT FK_5058659762AB5DB6');
        $this->addSql('DROP TABLE tasks');
        $this->addSql('DROP TABLE todos');
    }
}
