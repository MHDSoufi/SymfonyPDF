<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210123093457 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE bailleur (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, name VARCHAR(255) NOT NULL, intitulet VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE bien (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, locataire_id_id INTEGER DEFAULT NULL, type VARCHAR(255) NOT NULL, etage VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, loyer_hc DOUBLE PRECISION NOT NULL, charge DOUBLE PRECISION DEFAULT NULL, paiement_caf DOUBLE PRECISION DEFAULT NULL)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_45EDC386F9C41DCF ON bien (locataire_id_id)');
        $this->addSql('CREATE TABLE locataire (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE suplement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, intitulet VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, bien_id INTEGER NOT NULL)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE bailleur');
        $this->addSql('DROP TABLE bien');
        $this->addSql('DROP TABLE locataire');
        $this->addSql('DROP TABLE suplement');
    }
}
