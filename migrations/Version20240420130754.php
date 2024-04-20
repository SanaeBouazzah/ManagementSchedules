<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240420130754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE educateur (id INT AUTO_INCREMENT NOT NULL, idemploisdutemps_id INT NOT NULL, UNIQUE INDEX UNIQ_763C012251B63D8F (idemploisdutemps_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emploidu_temps (id INT AUTO_INCREMENT NOT NULL, jour INT NOT NULL, mois INT NOT NULL, annee INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe (id INT AUTO_INCREMENT NOT NULL, nbrapprenant VARCHAR(255) NOT NULL, nomgroupe VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE groupe_salle (groupe_id INT NOT NULL, salle_id INT NOT NULL, INDEX IDX_1B3AB00C7A45358C (groupe_id), INDEX IDX_1B3AB00CDC304035 (salle_id), PRIMARY KEY(groupe_id, salle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE periodeapprentissage (id INT AUTO_INCREMENT NOT NULL, datedebut DATE NOT NULL, datefin DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE programmes (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, duree VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, nbrplaces VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance (id INT AUTO_INCREMENT NOT NULL, idemploisdutemps_id INT NOT NULL, duree VARCHAR(255) NOT NULL, INDEX IDX_DF7DFD0E51B63D8F (idemploisdutemps_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance_salle (seance_id INT NOT NULL, salle_id INT NOT NULL, INDEX IDX_51816D10E3797A94 (seance_id), INDEX IDX_51816D10DC304035 (salle_id), PRIMARY KEY(seance_id, salle_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance_groupe (seance_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_7BCC9789E3797A94 (seance_id), INDEX IDX_7BCC97897A45358C (groupe_id), PRIMARY KEY(seance_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE seance_programmes (seance_id INT NOT NULL, programmes_id INT NOT NULL, INDEX IDX_3C6F605AE3797A94 (seance_id), INDEX IDX_3C6F605AA0A1C920 (programmes_id), PRIMARY KEY(seance_id, programmes_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateurs (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE educateur ADD CONSTRAINT FK_763C012251B63D8F FOREIGN KEY (idemploisdutemps_id) REFERENCES emploidu_temps (id)');
        $this->addSql('ALTER TABLE groupe_salle ADD CONSTRAINT FK_1B3AB00C7A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE groupe_salle ADD CONSTRAINT FK_1B3AB00CDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seance ADD CONSTRAINT FK_DF7DFD0E51B63D8F FOREIGN KEY (idemploisdutemps_id) REFERENCES emploidu_temps (id)');
        $this->addSql('ALTER TABLE seance_salle ADD CONSTRAINT FK_51816D10E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seance_salle ADD CONSTRAINT FK_51816D10DC304035 FOREIGN KEY (salle_id) REFERENCES salle (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seance_groupe ADD CONSTRAINT FK_7BCC9789E3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seance_groupe ADD CONSTRAINT FK_7BCC97897A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seance_programmes ADD CONSTRAINT FK_3C6F605AE3797A94 FOREIGN KEY (seance_id) REFERENCES seance (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE seance_programmes ADD CONSTRAINT FK_3C6F605AA0A1C920 FOREIGN KEY (programmes_id) REFERENCES programmes (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE educateur DROP FOREIGN KEY FK_763C012251B63D8F');
        $this->addSql('ALTER TABLE groupe_salle DROP FOREIGN KEY FK_1B3AB00C7A45358C');
        $this->addSql('ALTER TABLE groupe_salle DROP FOREIGN KEY FK_1B3AB00CDC304035');
        $this->addSql('ALTER TABLE seance DROP FOREIGN KEY FK_DF7DFD0E51B63D8F');
        $this->addSql('ALTER TABLE seance_salle DROP FOREIGN KEY FK_51816D10E3797A94');
        $this->addSql('ALTER TABLE seance_salle DROP FOREIGN KEY FK_51816D10DC304035');
        $this->addSql('ALTER TABLE seance_groupe DROP FOREIGN KEY FK_7BCC9789E3797A94');
        $this->addSql('ALTER TABLE seance_groupe DROP FOREIGN KEY FK_7BCC97897A45358C');
        $this->addSql('ALTER TABLE seance_programmes DROP FOREIGN KEY FK_3C6F605AE3797A94');
        $this->addSql('ALTER TABLE seance_programmes DROP FOREIGN KEY FK_3C6F605AA0A1C920');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE educateur');
        $this->addSql('DROP TABLE emploidu_temps');
        $this->addSql('DROP TABLE groupe');
        $this->addSql('DROP TABLE groupe_salle');
        $this->addSql('DROP TABLE periodeapprentissage');
        $this->addSql('DROP TABLE programmes');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE seance');
        $this->addSql('DROP TABLE seance_salle');
        $this->addSql('DROP TABLE seance_groupe');
        $this->addSql('DROP TABLE seance_programmes');
        $this->addSql('DROP TABLE utilisateurs');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
