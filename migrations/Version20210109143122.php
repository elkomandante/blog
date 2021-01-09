<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210109143122 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page ADD meta_title VARCHAR(255) NOT NULL, ADD meta_description VARCHAR(512) NOT NULL, ADD meta_keywords VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE post ADD meta_title VARCHAR(255) NOT NULL, ADD meta_description VARCHAR(512) NOT NULL, ADD meta_keywords VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page DROP meta_title, DROP meta_description, DROP meta_keywords');
        $this->addSql('ALTER TABLE post DROP meta_title, DROP meta_description, DROP meta_keywords');
    }
}
