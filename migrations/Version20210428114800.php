<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210428114800 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE game_session (id INT AUTO_INCREMENT NOT NULL, player_id INT NOT NULL, game_date DATETIME NOT NULL, nb_joker_obt INT DEFAULT NULL, nb_joker_used INT DEFAULT NULL, INDEX IDX_4586AAFB99E6F5DF (player_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE image (id INT AUTO_INCREMENT NOT NULL, ref_serie_id INT NOT NULL, image_path VARCHAR(255) NOT NULL, INDEX IDX_C53D045F5F544E3A (ref_serie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reponse (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, annee INT NOT NULL, jacquette_path VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie_reponse (serie_id INT NOT NULL, reponse_id INT NOT NULL, INDEX IDX_6B2FAD60D94388BD (serie_id), INDEX IDX_6B2FAD60CF18BB82 (reponse_id), PRIMARY KEY(serie_id, reponse_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE game_session ADD CONSTRAINT FK_4586AAFB99E6F5DF FOREIGN KEY (player_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE image ADD CONSTRAINT FK_C53D045F5F544E3A FOREIGN KEY (ref_serie_id) REFERENCES serie (id)');
        $this->addSql('ALTER TABLE serie_reponse ADD CONSTRAINT FK_6B2FAD60D94388BD FOREIGN KEY (serie_id) REFERENCES serie (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE serie_reponse ADD CONSTRAINT FK_6B2FAD60CF18BB82 FOREIGN KEY (reponse_id) REFERENCES reponse (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE serie_reponse DROP FOREIGN KEY FK_6B2FAD60CF18BB82');
        $this->addSql('ALTER TABLE image DROP FOREIGN KEY FK_C53D045F5F544E3A');
        $this->addSql('ALTER TABLE serie_reponse DROP FOREIGN KEY FK_6B2FAD60D94388BD');
        $this->addSql('DROP TABLE game_session');
        $this->addSql('DROP TABLE image');
        $this->addSql('DROP TABLE reponse');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE serie_reponse');
    }
}
