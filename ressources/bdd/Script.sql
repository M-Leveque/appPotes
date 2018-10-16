DROP DATABASE IF EXISTS apppotes ;
CREATE DATABASE apppotes ;
USE apppotes ;

/* Script de création de la base de données */

CREATE TABLE Utilisateur
(
	Id_U INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Niveau_U INT(1) NOT NULL,
	Mail_U VARCHAR(50) NOT NULL,
	Mdp_U VARCHAR(255) NOT NULL,
	Pseudo_U VARCHAR(255) NOT NULL,
	Photo_U VARCHAR(255) NOT NULL,
	Tmp BOOLEAN NOT NULL
) ENGINE = InnoDB CHARACTER SET UTF8 ;

CREATE TABLE Photo
(
	Id_P INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Titre_P VARCHAR(50) NOT NULL,
	Chemin_P VARCHAR(50) NOT NULL,
	Compteur_P INT(5) NOT NULL,
	Date_P DATE NOT NULL,
	DateU_P DATE NOT NULL,
	Id_User INT(5) NOT NULL,
	Id_Album INT(5) NOT NULL
) ENGINE = InnoDB CHARACTER SET UTF8 ;

CREATE TABLE Album
(
	Id_A INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Nom_A VARCHAR(50) NOT NULL,
	Description_A VARCHAR(255) NOT NULL,
	DateCreation_A DATE NOT NULL,
	Priver_A BOOLEAN NOT NULL,
	Visuel_A VARCHAR(255) NOT NULL,
	Id_E INT(5),
	Id_U INT(5) NOT NULL
) ENGINE = InnoDB CHARACTER SET UTF8 ;

CREATE TABLE Evenement
(
	Id_E INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Titre_E VARCHAR(50) NOT NULL,
	Description_E TEXT NOT NULL,
	DateCreation_E DATE NOT NULL,
	DateHeureFin_E DATETIME NOT NULL,
	Archiver_E BOOLEAN NOT NULL,
	Id_U INT(5) NOT NULL,
	Id_Em INT(5) NOT NULL
) ENGINE = InnoDB CHARACTER SET UTF8 ;

CREATE TABLE Message
(
	Id_M INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Contenu_M TEXT NOT NULL,
	Id_E INT(5) NOT NULL,
	Id_U INT(5) NOT NULL
) ENGINE = InnoDB CHARACTER SET UTF8 ;

CREATE TABLE Emoticon
(
	Id_Em INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Titre_Em VARCHAR(50) NOT NULL,
	Chemin_Em VARCHAR(255) NOT NULL
) ENGINE = InnoDB CHARACTER SET UTF8 ;

CREATE TABLE Cagnotte
(
	Id_C INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Titre_C VARCHAR(50) NOT NULL,
	Description_C TEXT NOT NULL,
	DateHeureFin_C DATETIME NOT NULL,
	ArgentR_C FLOAT(10,2),
	Id_E INT(5) NOT NULL
) ENGINE = InnoDB CHARACTER SET UTF8 ;

CREATE TABLE Acces
(
	Id_U INT(5) NOT NULL,
	Id_E INT(5) NOT NULL,
	CONSTRAINT Pk_Acces PRIMARY KEY (Id_U, Id_E)
) ENGINE = InnoDB CHARACTER SET UTF8 ;

--
-- Contraintes d'index externe
--

--
-- Contraintes pour la table `Photo`
--
ALTER TABLE `Photo`
  ADD CONSTRAINT `FK_PhotoUploadPar` FOREIGN KEY (`Id_User`) REFERENCES Utilisateur(`Id_U`),
  ADD CONSTRAINT `FK_PhotoRangerDans` FOREIGN KEY (`Id_Album`) REFERENCES Album(`Id_A`);
--
-- Contraintes pour la table `Evenement`
--
ALTER TABLE `Evenement`
  ADD CONSTRAINT `FK_EvenementCreerPar` FOREIGN KEY (`Id_U`) REFERENCES Utilisateur(`Id_U`),
	ADD CONSTRAINT `FK_EvenementIllustrePar` FOREIGN KEY (`Id_Em`) REFERENCES Emoticon(`Id_Em`);

--
-- Contraintes pour la table `Message`
--
ALTER TABLE `Message`
  ADD CONSTRAINT `FK_MessageEnvoyerPar` FOREIGN KEY (`Id_U`) REFERENCES Utilisateur(`Id_U`),
  ADD CONSTRAINT `FK_MessagePublierSur` FOREIGN KEY (`Id_E`) REFERENCES Evenement(`Id_E`);

--
-- Contraintes pour la table `Album`
--
ALTER TABLE `Album`
  ADD CONSTRAINT `FK_AlbumCreerPar` FOREIGN KEY (`Id_U`) REFERENCES Utilisateur(`Id_U`),
	ADD CONSTRAINT `FK_AlbumCreerPour` FOREIGN KEY (`Id_E`) REFERENCES Evenement(`Id_E`);

--
-- Contraintes pour la table `Cagnotte`
--
ALTER TABLE `Cagnotte`
  ADD CONSTRAINT `FK_FincanceEvenement` FOREIGN KEY (`Id_E`) REFERENCES Evenement(`Id_E`);

--
-- Contraintes pour la table `Acces`
--
ALTER TABLE `Acces`
  ADD CONSTRAINT `FK_PermetLAccesA` FOREIGN KEY (`Id_U`) REFERENCES Utilisateur(`Id_U`),
	ADD CONSTRAINT `FK_PermetLAccesPour` FOREIGN KEY (`Id_E`) REFERENCES Evenement(`Id_E`);
