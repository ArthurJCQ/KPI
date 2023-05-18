<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230429103727 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dev_sprint_config ALTER nb_days_off SET DEFAULT 0');
        $this->addSql('ALTER TABLE dev_sprint_config ALTER coeff SET DEFAULT \'1\'');
        $this->addSql('ALTER TABLE dev_sprint_config ALTER is_active SET DEFAULT true');
        $this->addSql('ALTER TABLE dev_sprint_config ALTER is_shield SET DEFAULT true');
        $this->addSql('ALTER TABLE "user" ADD picture_url VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ALTER nb_days_off SET DEFAULT 0');
        $this->addSql('ALTER TABLE "user" ALTER coeff SET DEFAULT \'1\'');
        $this->addSql('ALTER TABLE "user" ALTER is_active SET DEFAULT true');
        $this->addSql('ALTER TABLE "user" ALTER is_shield SET DEFAULT true');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "user" DROP picture_url');
        $this->addSql('ALTER TABLE "user" ALTER nb_days_off DROP DEFAULT');
        $this->addSql('ALTER TABLE "user" ALTER coeff DROP DEFAULT');
        $this->addSql('ALTER TABLE "user" ALTER is_active DROP DEFAULT');
        $this->addSql('ALTER TABLE "user" ALTER is_shield DROP DEFAULT');
        $this->addSql('ALTER TABLE dev_sprint_config ALTER nb_days_off DROP DEFAULT');
        $this->addSql('ALTER TABLE dev_sprint_config ALTER coeff DROP DEFAULT');
        $this->addSql('ALTER TABLE dev_sprint_config ALTER is_active DROP DEFAULT');
        $this->addSql('ALTER TABLE dev_sprint_config ALTER is_shield DROP DEFAULT');
    }
}
