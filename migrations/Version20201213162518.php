<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201213162518 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE absence (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, motif VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, motifdsn VARCHAR(255) NOT NULL, calendrier VARCHAR(255) NOT NULL, tauxheure VARCHAR(255) NOT NULL, tauxjour VARCHAR(255) NOT NULL, INDEX IDX_765AE0C9FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE analytique (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, axe VARCHAR(255) NOT NULL, section VARCHAR(255) NOT NULL, INDEX IDX_45AB6336FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE annuaireorganisme (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, codepostal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE anomalie (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, date DATETIME NOT NULL, auteur VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, descriptioncourte VARCHAR(255) NOT NULL, INDEX IDX_715AA19CC18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE anomalierubrique (id INT AUTO_INCREMENT NOT NULL, rubrique_id INT NOT NULL, titre VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_7FF092F63BD38833 (rubrique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE axe (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, axe VARCHAR(255) NOT NULL, longueursection INT NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_6C6A1E2CFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE banque (id INT AUTO_INCREMENT NOT NULL, etablissements_id INT DEFAULT NULL, iban VARCHAR(255) NOT NULL, bic VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_B1F6CB3CD23B76CD (etablissements_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequeccn (id INT AUTO_INCREMENT NOT NULL, idcc VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequeclassification (id INT AUTO_INCREMENT NOT NULL, bibliothequeccn_id INT NOT NULL, type VARCHAR(255) NOT NULL, valeur VARCHAR(255) NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_F5207A83170D4135 (bibliothequeccn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequecriteremaintien (id INT AUTO_INCREMENT NOT NULL, bibliothequeccn_id INT NOT NULL, absence VARCHAR(255) NOT NULL, population VARCHAR(255) NOT NULL, etendu TINYINT(1) NOT NULL, INDEX IDX_BFA272C8170D4135 (bibliothequeccn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequemodification (id INT AUTO_INCREMENT NOT NULL, bibliothequeccn_id INT NOT NULL, demande VARCHAR(255) NOT NULL, ancienid INT NOT NULL, ancienvaleur VARCHAR(255) NOT NULL, nouvellevaleur VARCHAR(255) DEFAULT NULL, INDEX IDX_BB36EF12170D4135 (bibliothequeccn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequeprimeanciennetepopulation (id INT AUTO_INCREMENT NOT NULL, bibliothequeccn_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, etendu TINYINT(1) NOT NULL, INDEX IDX_7263C9CD170D4135 (bibliothequeccn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequeprimeanciennetevaleur (id INT AUTO_INCREMENT NOT NULL, bibliothequeprimeanciennetepopulation_id INT NOT NULL, anciennetemois INT NOT NULL, pourcentage VARCHAR(255) NOT NULL, signe VARCHAR(1) NOT NULL, etendu TINYINT(1) NOT NULL, INDEX IDX_4BF03EFA31B59CB4 (bibliothequeprimeanciennetepopulation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequesmcpopulation (id INT AUTO_INCREMENT NOT NULL, bibliothequeccn_id INT NOT NULL, population VARCHAR(255) NOT NULL, etendu TINYINT(1) NOT NULL, INDEX IDX_BB729313170D4135 (bibliothequeccn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequesmcvaleur (id INT AUTO_INCREMENT NOT NULL, bibliothequesmcpopulation_id INT NOT NULL, coefficient VARCHAR(255) DEFAULT NULL, qualification VARCHAR(255) DEFAULT NULL, niveau VARCHAR(255) DEFAULT NULL, smc DOUBLE PRECISION NOT NULL, etendu TINYINT(1) NOT NULL, INDEX IDX_E5976EBC9C46116B (bibliothequesmcpopulation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bibliothequetablemaintien (id INT AUTO_INCREMENT NOT NULL, bibliothequecriteremaintien_id INT NOT NULL, anciennetedebut INT NOT NULL, anciennetefin INT NOT NULL, jourscarenceemployeur INT NOT NULL, dureemaximale INT NOT NULL, tauxmaintien VARCHAR(255) NOT NULL, INDEX IDX_F6649E3DDC2CDBC7 (bibliothequecriteremaintien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE calendrier (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, titre VARCHAR(255) NOT NULL, INDEX IDX_B2753CB9FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classification (id INT AUTO_INCREMENT NOT NULL, conventioncollective_id INT NOT NULL, type VARCHAR(255) NOT NULL, valeur VARCHAR(255) NOT NULL, INDEX IDX_456BD2318B7C9A01 (conventioncollective_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compteur (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, cumulacquis VARCHAR(3) NOT NULL, cumulpris VARCHAR(3) NOT NULL, dateraz VARCHAR(255) NOT NULL, rubriqueheures VARCHAR(255) NOT NULL, rubriquejours VARCHAR(255) NOT NULL, INDEX IDX_4D021BD5FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE congepaye (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, type VARCHAR(255) NOT NULL, finexercice DATE NOT NULL, reliquat VARCHAR(255) NOT NULL, cpanciennete LONGTEXT DEFAULT NULL, cpsupplementaire LONGTEXT DEFAULT NULL, arrondi VARCHAR(255) NOT NULL, arrondistc VARCHAR(255) NOT NULL, INDEX IDX_F489BD5CFF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE connexion (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT NOT NULL, etape VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_936BF99CFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE conventioncollective (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, idcc VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, origine VARCHAR(255) NOT NULL, INDEX IDX_478C5B76FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE criteremaintien (id INT AUTO_INCREMENT NOT NULL, ccn_id INT NOT NULL, absence VARCHAR(255) NOT NULL, population VARCHAR(255) NOT NULL, INDEX IDX_9A7DEBC0A3C94DD8 (ccn_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emploi (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, valeur VARCHAR(255) NOT NULL, codeemploi VARCHAR(255) NOT NULL, INDEX IDX_74A0B0FAFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etablissement (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, codepostal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, ape VARCHAR(255) NOT NULL, siren VARCHAR(9) NOT NULL, nic VARCHAR(5) NOT NULL, INDEX IDX_20FD592CFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etape (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, etape VARCHAR(255) NOT NULL, valider TINYINT(1) NOT NULL, INDEX IDX_285F75DDFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horaire (id INT AUTO_INCREMENT NOT NULL, calendrier_id INT NOT NULL, jour VARCHAR(255) NOT NULL, matindebut TIME NOT NULL, matinfin TIME NOT NULL, apfin TIME NOT NULL, apdebut TIME NOT NULL, INDEX IDX_BBC83DB6FF52FC51 (calendrier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE journalprojet (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, evenement VARCHAR(255) NOT NULL, date DATETIME NOT NULL, utilisateur VARCHAR(255) NOT NULL, INDEX IDX_39F6431FC18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maintiendesalaire (id INT AUTO_INCREMENT NOT NULL, conventioncollective_id INT NOT NULL, categorie VARCHAR(255) NOT NULL, ancienneteminimum VARCHAR(255) NOT NULL, nbremoisancienneteminimum INT NOT NULL, nbremoisanciennetemaximum INT NOT NULL, INDEX IDX_52AFC3B88B7C9A01 (conventioncollective_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messageanomalie (id INT AUTO_INCREMENT NOT NULL, anomalie_id INT NOT NULL, message LONGTEXT NOT NULL, auteur VARCHAR(255) NOT NULL, INDEX IDX_959A7AEDAEEAB197 (anomalie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE organisme (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, codepostal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, typepaiement VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, INDEX IDX_DD0F4533FF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pourcentagemaintien (id INT AUTO_INCREMENT NOT NULL, maintiensalaire_id INT NOT NULL, nbrejours INT NOT NULL, pourcentage VARCHAR(255) NOT NULL, INDEX IDX_3952F119C14B6F4D (maintiensalaire_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE primeanciennetepopulation (id INT AUTO_INCREMENT NOT NULL, conventioncollective_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, etendu TINYINT(1) NOT NULL, INDEX IDX_453A0FD78B7C9A01 (conventioncollective_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE primeanciennetevaleur (id INT AUTO_INCREMENT NOT NULL, primeanciennetepopulation_id INT NOT NULL, anciennetemois INT NOT NULL, pourcentage VARCHAR(255) NOT NULL, signe VARCHAR(1) NOT NULL, etendu TINYINT(1) NOT NULL, INDEX IDX_3B04D432AF1323BD (primeanciennetepopulation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) NOT NULL, logiciel VARCHAR(255) NOT NULL, sic VARCHAR(9) NOT NULL, create_at DATETIME NOT NULL, description LONGTEXT DEFAULT NULL, createur VARCHAR(255) NOT NULL, archive TINYINT(1) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE provision (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, type VARCHAR(255) NOT NULL, calcul VARCHAR(255) NOT NULL, comptabilite TINYINT(1) NOT NULL, extourne VARCHAR(255) NOT NULL, periodicite VARCHAR(255) NOT NULL, INDEX IDX_BA9B4290FCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rubrique (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, numero VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, nature VARCHAR(255) NOT NULL, base VARCHAR(255) DEFAULT NULL, taux VARCHAR(255) DEFAULT NULL, montant VARCHAR(255) DEFAULT NULL, profilrem VARCHAR(255) DEFAULT NULL, profilcot VARCHAR(255) DEFAULT NULL, periodeapplication VARCHAR(255) DEFAULT NULL, population VARCHAR(255) DEFAULT NULL, divers LONGTEXT DEFAULT NULL, dsnperiodeprime VARCHAR(255) DEFAULT NULL, dsnnatureprime VARCHAR(255) DEFAULT NULL, dsnautreselement VARCHAR(255) DEFAULT NULL, dsntyperappelpaie VARCHAR(255) DEFAULT NULL, INDEX IDX_8FA4097CFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE section (id INT AUTO_INCREMENT NOT NULL, axe_id INT NOT NULL, codesection VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_2D737AEF2E30CD41 (axe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE signature (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, signature TINYINT(1) NOT NULL, commentaire VARCHAR(255) DEFAULT NULL, date DATETIME NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, idutilisateur INT NOT NULL, INDEX IDX_AE880141C18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE societe (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, siren VARCHAR(9) NOT NULL, raisonsociale VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, codepostal VARCHAR(5) NOT NULL, ville VARCHAR(255) NOT NULL, fnal VARCHAR(255) NOT NULL, etendu TINYINT(1) NOT NULL, INDEX IDX_19653DBDC18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE solution (id INT AUTO_INCREMENT NOT NULL, anomalie_id INT NOT NULL, message LONGTEXT NOT NULL, date DATETIME NOT NULL, auteur VARCHAR(255) NOT NULL, INDEX IDX_9F3329DBAEEAB197 (anomalie_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tablemaintien (id INT AUTO_INCREMENT NOT NULL, criteremaintien_id INT NOT NULL, anciennetedebut INT NOT NULL, anciennetefin INT NOT NULL, jourscarenceemployeur INT NOT NULL, dureemaximale INT NOT NULL, tauxmaintien VARCHAR(255) NOT NULL, INDEX IDX_6D540E4764D0744C (criteremaintien_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tauxabsence (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, INDEX IDX_35EECCDBFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tauxat (id INT AUTO_INCREMENT NOT NULL, etablissement_id INT NOT NULL, coderisque VARCHAR(255) NOT NULL, tauxbureau TINYINT(1) NOT NULL, taux VARCHAR(255) NOT NULL, dateapplication DATE NOT NULL, INDEX IDX_A8AE360CFF631228 (etablissement_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE test (id INT AUTO_INCREMENT NOT NULL, projet_id INT NOT NULL, libelle VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, INDEX IDX_D87F7E0CC18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE testreponse (id INT AUTO_INCREMENT NOT NULL, test_id INT NOT NULL, message LONGTEXT NOT NULL, auteur VARCHAR(255) NOT NULL, date DATETIME NOT NULL, INDEX IDX_315C3E6A1E5D0459 (test_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, groupe VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur_projet (utilisateur_id INT NOT NULL, projet_id INT NOT NULL, INDEX IDX_31B8A622FB88E14F (utilisateur_id), INDEX IDX_31B8A622C18272 (projet_id), PRIMARY KEY(utilisateur_id, projet_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE valeurzonelibrehrs (id INT AUTO_INCREMENT NOT NULL, zone_id INT NOT NULL, code VARCHAR(255) NOT NULL, valeur VARCHAR(255) NOT NULL, INDEX IDX_1A0436299F2C3FAB (zone_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE zonelibrehrs (id INT AUTO_INCREMENT NOT NULL, societe_id INT NOT NULL, nature VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_6E233A4BFCF77503 (societe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE absence ADD CONSTRAINT FK_765AE0C9FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE analytique ADD CONSTRAINT FK_45AB6336FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE anomalie ADD CONSTRAINT FK_715AA19CC18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE anomalierubrique ADD CONSTRAINT FK_7FF092F63BD38833 FOREIGN KEY (rubrique_id) REFERENCES rubrique (id)');
        $this->addSql('ALTER TABLE axe ADD CONSTRAINT FK_6C6A1E2CFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE banque ADD CONSTRAINT FK_B1F6CB3CD23B76CD FOREIGN KEY (etablissements_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE bibliothequeclassification ADD CONSTRAINT FK_F5207A83170D4135 FOREIGN KEY (bibliothequeccn_id) REFERENCES bibliothequeccn (id)');
        $this->addSql('ALTER TABLE bibliothequecriteremaintien ADD CONSTRAINT FK_BFA272C8170D4135 FOREIGN KEY (bibliothequeccn_id) REFERENCES bibliothequeccn (id)');
        $this->addSql('ALTER TABLE bibliothequemodification ADD CONSTRAINT FK_BB36EF12170D4135 FOREIGN KEY (bibliothequeccn_id) REFERENCES bibliothequeccn (id)');
        $this->addSql('ALTER TABLE bibliothequeprimeanciennetepopulation ADD CONSTRAINT FK_7263C9CD170D4135 FOREIGN KEY (bibliothequeccn_id) REFERENCES bibliothequeccn (id)');
        $this->addSql('ALTER TABLE bibliothequeprimeanciennetevaleur ADD CONSTRAINT FK_4BF03EFA31B59CB4 FOREIGN KEY (bibliothequeprimeanciennetepopulation_id) REFERENCES bibliothequeprimeanciennetepopulation (id)');
        $this->addSql('ALTER TABLE bibliothequesmcpopulation ADD CONSTRAINT FK_BB729313170D4135 FOREIGN KEY (bibliothequeccn_id) REFERENCES bibliothequeccn (id)');
        $this->addSql('ALTER TABLE bibliothequesmcvaleur ADD CONSTRAINT FK_E5976EBC9C46116B FOREIGN KEY (bibliothequesmcpopulation_id) REFERENCES bibliothequesmcpopulation (id)');
        $this->addSql('ALTER TABLE bibliothequetablemaintien ADD CONSTRAINT FK_F6649E3DDC2CDBC7 FOREIGN KEY (bibliothequecriteremaintien_id) REFERENCES bibliothequecriteremaintien (id)');
        $this->addSql('ALTER TABLE calendrier ADD CONSTRAINT FK_B2753CB9FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE classification ADD CONSTRAINT FK_456BD2318B7C9A01 FOREIGN KEY (conventioncollective_id) REFERENCES conventioncollective (id)');
        $this->addSql('ALTER TABLE compteur ADD CONSTRAINT FK_4D021BD5FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE congepaye ADD CONSTRAINT FK_F489BD5CFF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE connexion ADD CONSTRAINT FK_936BF99CFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE conventioncollective ADD CONSTRAINT FK_478C5B76FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE criteremaintien ADD CONSTRAINT FK_9A7DEBC0A3C94DD8 FOREIGN KEY (ccn_id) REFERENCES conventioncollective (id)');
        $this->addSql('ALTER TABLE emploi ADD CONSTRAINT FK_74A0B0FAFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE etablissement ADD CONSTRAINT FK_20FD592CFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE etape ADD CONSTRAINT FK_285F75DDFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE horaire ADD CONSTRAINT FK_BBC83DB6FF52FC51 FOREIGN KEY (calendrier_id) REFERENCES calendrier (id)');
        $this->addSql('ALTER TABLE journalprojet ADD CONSTRAINT FK_39F6431FC18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE maintiendesalaire ADD CONSTRAINT FK_52AFC3B88B7C9A01 FOREIGN KEY (conventioncollective_id) REFERENCES conventioncollective (id)');
        $this->addSql('ALTER TABLE messageanomalie ADD CONSTRAINT FK_959A7AEDAEEAB197 FOREIGN KEY (anomalie_id) REFERENCES anomalierubrique (id)');
        $this->addSql('ALTER TABLE organisme ADD CONSTRAINT FK_DD0F4533FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE pourcentagemaintien ADD CONSTRAINT FK_3952F119C14B6F4D FOREIGN KEY (maintiensalaire_id) REFERENCES maintiendesalaire (id)');
        $this->addSql('ALTER TABLE primeanciennetepopulation ADD CONSTRAINT FK_453A0FD78B7C9A01 FOREIGN KEY (conventioncollective_id) REFERENCES conventioncollective (id)');
        $this->addSql('ALTER TABLE primeanciennetevaleur ADD CONSTRAINT FK_3B04D432AF1323BD FOREIGN KEY (primeanciennetepopulation_id) REFERENCES primeanciennetepopulation (id)');
        $this->addSql('ALTER TABLE provision ADD CONSTRAINT FK_BA9B4290FCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE rubrique ADD CONSTRAINT FK_8FA4097CFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE section ADD CONSTRAINT FK_2D737AEF2E30CD41 FOREIGN KEY (axe_id) REFERENCES axe (id)');
        $this->addSql('ALTER TABLE signature ADD CONSTRAINT FK_AE880141C18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE societe ADD CONSTRAINT FK_19653DBDC18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE solution ADD CONSTRAINT FK_9F3329DBAEEAB197 FOREIGN KEY (anomalie_id) REFERENCES anomalie (id)');
        $this->addSql('ALTER TABLE tablemaintien ADD CONSTRAINT FK_6D540E4764D0744C FOREIGN KEY (criteremaintien_id) REFERENCES criteremaintien (id)');
        $this->addSql('ALTER TABLE tauxabsence ADD CONSTRAINT FK_35EECCDBFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
        $this->addSql('ALTER TABLE tauxat ADD CONSTRAINT FK_A8AE360CFF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id)');
        $this->addSql('ALTER TABLE test ADD CONSTRAINT FK_D87F7E0CC18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE testreponse ADD CONSTRAINT FK_315C3E6A1E5D0459 FOREIGN KEY (test_id) REFERENCES test (id)');
        $this->addSql('ALTER TABLE utilisateur_projet ADD CONSTRAINT FK_31B8A622FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE utilisateur_projet ADD CONSTRAINT FK_31B8A622C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE valeurzonelibrehrs ADD CONSTRAINT FK_1A0436299F2C3FAB FOREIGN KEY (zone_id) REFERENCES zonelibrehrs (id)');
        $this->addSql('ALTER TABLE zonelibrehrs ADD CONSTRAINT FK_6E233A4BFCF77503 FOREIGN KEY (societe_id) REFERENCES societe (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE solution DROP FOREIGN KEY FK_9F3329DBAEEAB197');
        $this->addSql('ALTER TABLE messageanomalie DROP FOREIGN KEY FK_959A7AEDAEEAB197');
        $this->addSql('ALTER TABLE section DROP FOREIGN KEY FK_2D737AEF2E30CD41');
        $this->addSql('ALTER TABLE bibliothequeclassification DROP FOREIGN KEY FK_F5207A83170D4135');
        $this->addSql('ALTER TABLE bibliothequecriteremaintien DROP FOREIGN KEY FK_BFA272C8170D4135');
        $this->addSql('ALTER TABLE bibliothequemodification DROP FOREIGN KEY FK_BB36EF12170D4135');
        $this->addSql('ALTER TABLE bibliothequeprimeanciennetepopulation DROP FOREIGN KEY FK_7263C9CD170D4135');
        $this->addSql('ALTER TABLE bibliothequesmcpopulation DROP FOREIGN KEY FK_BB729313170D4135');
        $this->addSql('ALTER TABLE bibliothequetablemaintien DROP FOREIGN KEY FK_F6649E3DDC2CDBC7');
        $this->addSql('ALTER TABLE bibliothequeprimeanciennetevaleur DROP FOREIGN KEY FK_4BF03EFA31B59CB4');
        $this->addSql('ALTER TABLE bibliothequesmcvaleur DROP FOREIGN KEY FK_E5976EBC9C46116B');
        $this->addSql('ALTER TABLE horaire DROP FOREIGN KEY FK_BBC83DB6FF52FC51');
        $this->addSql('ALTER TABLE classification DROP FOREIGN KEY FK_456BD2318B7C9A01');
        $this->addSql('ALTER TABLE criteremaintien DROP FOREIGN KEY FK_9A7DEBC0A3C94DD8');
        $this->addSql('ALTER TABLE maintiendesalaire DROP FOREIGN KEY FK_52AFC3B88B7C9A01');
        $this->addSql('ALTER TABLE primeanciennetepopulation DROP FOREIGN KEY FK_453A0FD78B7C9A01');
        $this->addSql('ALTER TABLE tablemaintien DROP FOREIGN KEY FK_6D540E4764D0744C');
        $this->addSql('ALTER TABLE banque DROP FOREIGN KEY FK_B1F6CB3CD23B76CD');
        $this->addSql('ALTER TABLE congepaye DROP FOREIGN KEY FK_F489BD5CFF631228');
        $this->addSql('ALTER TABLE organisme DROP FOREIGN KEY FK_DD0F4533FF631228');
        $this->addSql('ALTER TABLE tauxat DROP FOREIGN KEY FK_A8AE360CFF631228');
        $this->addSql('ALTER TABLE pourcentagemaintien DROP FOREIGN KEY FK_3952F119C14B6F4D');
        $this->addSql('ALTER TABLE primeanciennetevaleur DROP FOREIGN KEY FK_3B04D432AF1323BD');
        $this->addSql('ALTER TABLE anomalie DROP FOREIGN KEY FK_715AA19CC18272');
        $this->addSql('ALTER TABLE journalprojet DROP FOREIGN KEY FK_39F6431FC18272');
        $this->addSql('ALTER TABLE signature DROP FOREIGN KEY FK_AE880141C18272');
        $this->addSql('ALTER TABLE societe DROP FOREIGN KEY FK_19653DBDC18272');
        $this->addSql('ALTER TABLE test DROP FOREIGN KEY FK_D87F7E0CC18272');
        $this->addSql('ALTER TABLE utilisateur_projet DROP FOREIGN KEY FK_31B8A622C18272');
        $this->addSql('ALTER TABLE anomalierubrique DROP FOREIGN KEY FK_7FF092F63BD38833');
        $this->addSql('ALTER TABLE absence DROP FOREIGN KEY FK_765AE0C9FCF77503');
        $this->addSql('ALTER TABLE analytique DROP FOREIGN KEY FK_45AB6336FCF77503');
        $this->addSql('ALTER TABLE axe DROP FOREIGN KEY FK_6C6A1E2CFCF77503');
        $this->addSql('ALTER TABLE calendrier DROP FOREIGN KEY FK_B2753CB9FCF77503');
        $this->addSql('ALTER TABLE compteur DROP FOREIGN KEY FK_4D021BD5FCF77503');
        $this->addSql('ALTER TABLE conventioncollective DROP FOREIGN KEY FK_478C5B76FCF77503');
        $this->addSql('ALTER TABLE emploi DROP FOREIGN KEY FK_74A0B0FAFCF77503');
        $this->addSql('ALTER TABLE etablissement DROP FOREIGN KEY FK_20FD592CFCF77503');
        $this->addSql('ALTER TABLE etape DROP FOREIGN KEY FK_285F75DDFCF77503');
        $this->addSql('ALTER TABLE provision DROP FOREIGN KEY FK_BA9B4290FCF77503');
        $this->addSql('ALTER TABLE rubrique DROP FOREIGN KEY FK_8FA4097CFCF77503');
        $this->addSql('ALTER TABLE tauxabsence DROP FOREIGN KEY FK_35EECCDBFCF77503');
        $this->addSql('ALTER TABLE zonelibrehrs DROP FOREIGN KEY FK_6E233A4BFCF77503');
        $this->addSql('ALTER TABLE testreponse DROP FOREIGN KEY FK_315C3E6A1E5D0459');
        $this->addSql('ALTER TABLE connexion DROP FOREIGN KEY FK_936BF99CFB88E14F');
        $this->addSql('ALTER TABLE utilisateur_projet DROP FOREIGN KEY FK_31B8A622FB88E14F');
        $this->addSql('ALTER TABLE valeurzonelibrehrs DROP FOREIGN KEY FK_1A0436299F2C3FAB');
        $this->addSql('DROP TABLE absence');
        $this->addSql('DROP TABLE analytique');
        $this->addSql('DROP TABLE annuaireorganisme');
        $this->addSql('DROP TABLE anomalie');
        $this->addSql('DROP TABLE anomalierubrique');
        $this->addSql('DROP TABLE axe');
        $this->addSql('DROP TABLE banque');
        $this->addSql('DROP TABLE bibliothequeccn');
        $this->addSql('DROP TABLE bibliothequeclassification');
        $this->addSql('DROP TABLE bibliothequecriteremaintien');
        $this->addSql('DROP TABLE bibliothequemodification');
        $this->addSql('DROP TABLE bibliothequeprimeanciennetepopulation');
        $this->addSql('DROP TABLE bibliothequeprimeanciennetevaleur');
        $this->addSql('DROP TABLE bibliothequesmcpopulation');
        $this->addSql('DROP TABLE bibliothequesmcvaleur');
        $this->addSql('DROP TABLE bibliothequetablemaintien');
        $this->addSql('DROP TABLE calendrier');
        $this->addSql('DROP TABLE classification');
        $this->addSql('DROP TABLE compteur');
        $this->addSql('DROP TABLE congepaye');
        $this->addSql('DROP TABLE connexion');
        $this->addSql('DROP TABLE conventioncollective');
        $this->addSql('DROP TABLE criteremaintien');
        $this->addSql('DROP TABLE emploi');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE etape');
        $this->addSql('DROP TABLE horaire');
        $this->addSql('DROP TABLE journalprojet');
        $this->addSql('DROP TABLE maintiendesalaire');
        $this->addSql('DROP TABLE messageanomalie');
        $this->addSql('DROP TABLE organisme');
        $this->addSql('DROP TABLE pourcentagemaintien');
        $this->addSql('DROP TABLE primeanciennetepopulation');
        $this->addSql('DROP TABLE primeanciennetevaleur');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE provision');
        $this->addSql('DROP TABLE rubrique');
        $this->addSql('DROP TABLE section');
        $this->addSql('DROP TABLE signature');
        $this->addSql('DROP TABLE societe');
        $this->addSql('DROP TABLE solution');
        $this->addSql('DROP TABLE tablemaintien');
        $this->addSql('DROP TABLE tauxabsence');
        $this->addSql('DROP TABLE tauxat');
        $this->addSql('DROP TABLE test');
        $this->addSql('DROP TABLE testreponse');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE utilisateur_projet');
        $this->addSql('DROP TABLE valeurzonelibrehrs');
        $this->addSql('DROP TABLE zonelibrehrs');
    }
}
