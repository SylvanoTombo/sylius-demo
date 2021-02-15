<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210215091104 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE boldy_customer_customer_groups (customer_id INT NOT NULL, customer_group_id INT NOT NULL, INDEX IDX_99CD4B3F9395C3F3 (customer_id), INDEX IDX_99CD4B3FD2919A68 (customer_group_id), PRIMARY KEY(customer_id, customer_group_id)) DEFAULT CHARACTER SET UTF8 COLLATE `UTF8_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE boldy_customer_customer_groups ADD CONSTRAINT FK_99CD4B3F9395C3F3 FOREIGN KEY (customer_id) REFERENCES sylius_customer (id)');
        $this->addSql('ALTER TABLE boldy_customer_customer_groups ADD CONSTRAINT FK_99CD4B3FD2919A68 FOREIGN KEY (customer_group_id) REFERENCES sylius_customer_group (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE boldy_customer_customer_groups');
    }
}
