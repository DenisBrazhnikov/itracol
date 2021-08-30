<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210830131210 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item ADD integer1 VARCHAR(255) DEFAULT NULL, ADD integer2 VARCHAR(255) DEFAULT NULL, ADD integer3 VARCHAR(255) DEFAULT NULL, ADD string1 VARCHAR(255) DEFAULT NULL, ADD string2 VARCHAR(255) DEFAULT NULL, ADD string3 VARCHAR(255) DEFAULT NULL, ADD text1 VARCHAR(255) DEFAULT NULL, ADD text2 VARCHAR(255) DEFAULT NULL, ADD text3 VARCHAR(255) DEFAULT NULL, ADD date1 VARCHAR(255) DEFAULT NULL, ADD date2 VARCHAR(255) DEFAULT NULL, ADD date3 VARCHAR(255) DEFAULT NULL, ADD boolean1 VARCHAR(255) DEFAULT NULL, ADD boolean2 VARCHAR(255) DEFAULT NULL, ADD boolean3 VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE user_collection CHANGE integer2_name integer2_name VARCHAR(255) DEFAULT NULL, CHANGE integer3_name integer3_name VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE item DROP integer1, DROP integer2, DROP integer3, DROP string1, DROP string2, DROP string3, DROP text1, DROP text2, DROP text3, DROP date1, DROP date2, DROP date3, DROP boolean1, DROP boolean2, DROP boolean3');
        $this->addSql('ALTER TABLE user_collection CHANGE integer2_name integer2_name VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`, CHANGE integer3_name integer3_name VARCHAR(255) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
    }
}
