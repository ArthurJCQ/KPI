<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230413170730 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE dev_sprint_config_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sprint_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE dev_sprint_config (id INT NOT NULL, sprint_id INT NOT NULL, developper_id INT NOT NULL, nb_days_off INT NOT NULL, coeff DOUBLE PRECISION NOT NULL, is_active BOOLEAN NOT NULL, is_shield BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_7B8527338C24077B ON dev_sprint_config (sprint_id)');
        $this->addSql('CREATE INDEX IDX_7B852733DA42B93 ON dev_sprint_config (developper_id)');
        $this->addSql('CREATE TABLE sprint (id INT NOT NULL, name VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, notes VARCHAR(255) DEFAULT NULL, calculated_capacity INT DEFAULT NULL, engaged_capacity INT DEFAULT NULL, effective_capacity INT DEFAULT NULL, estimated_velocity INT DEFAULT NULL, effective_velocity INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE sprint_user (sprint_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(sprint_id, user_id))');
        $this->addSql('CREATE INDEX IDX_B65179658C24077B ON sprint_user (sprint_id)');
        $this->addSql('CREATE INDEX IDX_B6517965A76ED395 ON sprint_user (user_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, nb_days_off INT NOT NULL, coeff DOUBLE PRECISION NOT NULL, is_active BOOLEAN NOT NULL, is_shield BOOLEAN NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE dev_sprint_config ADD CONSTRAINT FK_7B8527338C24077B FOREIGN KEY (sprint_id) REFERENCES sprint (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE dev_sprint_config ADD CONSTRAINT FK_7B852733DA42B93 FOREIGN KEY (developper_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sprint_user ADD CONSTRAINT FK_B65179658C24077B FOREIGN KEY (sprint_id) REFERENCES sprint (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sprint_user ADD CONSTRAINT FK_B6517965A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE dev_sprint_config_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sprint_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('ALTER TABLE dev_sprint_config DROP CONSTRAINT FK_7B8527338C24077B');
        $this->addSql('ALTER TABLE dev_sprint_config DROP CONSTRAINT FK_7B852733DA42B93');
        $this->addSql('ALTER TABLE sprint_user DROP CONSTRAINT FK_B65179658C24077B');
        $this->addSql('ALTER TABLE sprint_user DROP CONSTRAINT FK_B6517965A76ED395');
        $this->addSql('DROP TABLE dev_sprint_config');
        $this->addSql('DROP TABLE sprint');
        $this->addSql('DROP TABLE sprint_user');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
