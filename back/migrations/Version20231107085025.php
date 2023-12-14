<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231107085025 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE club (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE counting (id INT AUTO_INCREMENT NOT NULL, trou_id INT NOT NULL, round_id INT NOT NULL, shots INT NOT NULL, INDEX IDX_B0A664D51D222B9C (trou_id), INDEX IDX_B0A664D5A6005CA0 (round_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE parcours (id INT AUTO_INCREMENT NOT NULL, nb_trou INT NOT NULL, distance INT NOT NULL, image VARCHAR(255) NOT NULL, trou VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE round (id INT AUTO_INCREMENT NOT NULL, parcours_id INT NOT NULL, client_id INT NOT NULL, shots_total INT NOT NULL, INDEX IDX_C5EEEA346E38C0DB (parcours_id), INDEX IDX_C5EEEA3419EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE trou (id INT AUTO_INCREMENT NOT NULL, parcours_id INT NOT NULL, distance INT NOT NULL, image VARCHAR(255) NOT NULL, par INT NOT NULL, INDEX IDX_5066A6326E38C0DB (parcours_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE counting ADD CONSTRAINT FK_B0A664D51D222B9C FOREIGN KEY (trou_id) REFERENCES trou (id)');
        $this->addSql('ALTER TABLE counting ADD CONSTRAINT FK_B0A664D5A6005CA0 FOREIGN KEY (round_id) REFERENCES round (id)');
        $this->addSql('ALTER TABLE round ADD CONSTRAINT FK_C5EEEA346E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id)');
        $this->addSql('ALTER TABLE round ADD CONSTRAINT FK_C5EEEA3419EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE trou ADD CONSTRAINT FK_5066A6326E38C0DB FOREIGN KEY (parcours_id) REFERENCES parcours (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE counting DROP FOREIGN KEY FK_B0A664D51D222B9C');
        $this->addSql('ALTER TABLE counting DROP FOREIGN KEY FK_B0A664D5A6005CA0');
        $this->addSql('ALTER TABLE round DROP FOREIGN KEY FK_C5EEEA346E38C0DB');
        $this->addSql('ALTER TABLE round DROP FOREIGN KEY FK_C5EEEA3419EB6921');
        $this->addSql('ALTER TABLE trou DROP FOREIGN KEY FK_5066A6326E38C0DB');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE club');
        $this->addSql('DROP TABLE counting');
        $this->addSql('DROP TABLE parcours');
        $this->addSql('DROP TABLE round');
        $this->addSql('DROP TABLE trou');
    }
}
