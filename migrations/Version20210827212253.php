<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210827212253 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_collection ADD integer2_name VARCHAR(255) DEFAULT NULL, ADD integer3_name VARCHAR(255) DEFAULT NULL, ADD integer2_visible TINYINT(1) NOT NULL, ADD integer3_visible TINYINT(1) NOT NULL, ADD string1_name VARCHAR(255) DEFAULT NULL, ADD string2_name VARCHAR(255) DEFAULT NULL, ADD string3_name VARCHAR(255) DEFAULT NULL, ADD string1_visible TINYINT(1) NOT NULL, ADD string2_visible TINYINT(1) NOT NULL, ADD string3_visible TINYINT(1) NOT NULL, ADD text1_name VARCHAR(255) DEFAULT NULL, ADD text2_name VARCHAR(255) DEFAULT NULL, ADD text3_name VARCHAR(255) DEFAULT NULL, ADD text1_visible TINYINT(1) NOT NULL, ADD text2_visible TINYINT(1) NOT NULL, ADD text3_visible TINYINT(1) NOT NULL, ADD date1_name VARCHAR(255) DEFAULT NULL, ADD date2_name VARCHAR(255) DEFAULT NULL, ADD date3_name VARCHAR(255) DEFAULT NULL, ADD date1_visible TINYINT(1) NOT NULL, ADD date2_visible TINYINT(1) NOT NULL, ADD date3_visible TINYINT(1) NOT NULL, ADD boolean1_name VARCHAR(255) DEFAULT NULL, ADD boolean2_name VARCHAR(255) DEFAULT NULL, ADD boolean3_name VARCHAR(255) DEFAULT NULL, ADD boolean1_visible TINYINT(1) NOT NULL, ADD boolean2_visible TINYINT(1) NOT NULL, ADD boolean3_visible TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE user_collection DROP integer2_name, DROP integer3_name, DROP integer2_visible, DROP integer3_visible, DROP string1_name, DROP string2_name, DROP string3_name, DROP string1_visible, DROP string2_visible, DROP string3_visible, DROP text1_name, DROP text2_name, DROP text3_name, DROP text1_visible, DROP text2_visible, DROP text3_visible, DROP date1_name, DROP date2_name, DROP date3_name, DROP date1_visible, DROP date2_visible, DROP date3_visible, DROP boolean1_name, DROP boolean2_name, DROP boolean3_name, DROP boolean1_visible, DROP boolean2_visible, DROP boolean3_visible');
    }
}
