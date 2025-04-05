<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250404203927 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dining_table (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, position INT NOT NULL, guest_count INT DEFAULT NULL, state INT NOT NULL, note VARCHAR(100) DEFAULT NULL, is_round TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dining_table_product (dining_table_id INT NOT NULL, product_id INT NOT NULL, INDEX IDX_5828C3BC695B08DC (dining_table_id), INDEX IDX_5828C3BC4584665A (product_id), PRIMARY KEY(dining_table_id, product_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, category_id INT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_D34A04AD12469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dining_table_product ADD CONSTRAINT FK_5828C3BC695B08DC FOREIGN KEY (dining_table_id) REFERENCES dining_table (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE dining_table_product ADD CONSTRAINT FK_5828C3BC4584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product ADD CONSTRAINT FK_D34A04AD12469DE2 FOREIGN KEY (category_id) REFERENCES category (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE dining_table_product DROP FOREIGN KEY FK_5828C3BC695B08DC');
        $this->addSql('ALTER TABLE dining_table_product DROP FOREIGN KEY FK_5828C3BC4584665A');
        $this->addSql('ALTER TABLE product DROP FOREIGN KEY FK_D34A04AD12469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE dining_table');
        $this->addSql('DROP TABLE dining_table_product');
        $this->addSql('DROP TABLE product');
    }
}
