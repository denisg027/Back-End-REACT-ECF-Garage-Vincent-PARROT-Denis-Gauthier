<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20240214110252 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Ajoute la table admin et insère un administrateur initial.';
    }

    public function up(Schema $schema): void
    {
        // Création de la table admin
        // $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_880E0D76E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');

        // Mise à jour de la table users
        // $this->addSql('ALTER TABLE users ADD roles JSON NOT NULL, DROP role, CHANGE created_at created_at DATETIME NOT NULL');

        // Insertion de l'administrateur initial
        // Remplacez 'votre_mot_de_passe_hache' par le hachage de mot de passe réel généré
        $this->addSql('INSERT INTO admin (email, roles, password) VALUES (\'vincent.parrot@garage-vparrot.fr\', \'["ROLE_ADMIN"]\', \'' . '$2y$13$hqUVOoayF8NfoxYs.Mmf2eqFtS9eojgJKAH28l5RY8qkpUG4OVNFa' . '\')');
    }

    public function down(Schema $schema): void
    {
        // Suppression de la table admin
        // $this->addSql('DROP TABLE admin');

        // Reversion des changements sur la table users
        $this->addSql('ALTER TABLE users ADD role VARCHAR(20) DEFAULT \'ROLE_USER\', DROP roles, CHANGE created_at created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL');
    }
}