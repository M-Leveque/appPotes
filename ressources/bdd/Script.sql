DROP DATABASE IF EXISTS AppPotes ;
CREATE DATABASE AppPotes ;
USE AppPotes ;

/* Script de création de la base de données */

CREATE TABLE Utilisateurs
(
	Id_U INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Mail_U VARCHAR(50) NOT NULL,
	Mdp_U VARCHAR(255) NOT NULL,
	Pseudo_U VARCHAR(255) NOT NULL,
	Photo_U VARCHAR(255) NOT NULL
) ENGINE = InnoDB CHARACTER SET UTF8 ;

CREATE TABLE Photos
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

CREATE TABLE Albums 
(
	Id_A INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Nom_A VARCHAR(50) NOT NULL
) ENGINE = InnoDB CHARACTER SET UTF8 ;

CREATE TABLE Evenements
(
	Id_E INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Titre_E VARCHAR(50) NOT NULL,
	Description_E TEXT NOT NULL,
	Id_U INT(5) NOT NULL
) ENGINE = InnoDB CHARACTER SET UTF8 ;

CREATE TABLE Messages 
(
	Id_M INT(5) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Contenu_M TEXT NOT NULL,
	Id_E INT(5) NOT NULL,
	Id_U INT(5) NOT NULL
) ENGINE = InnoDB CHARACTER SET UTF8 ;

--
-- Contraintes d'index externe
--

--
-- Contraintes pour la table `Photos`
--
ALTER TABLE `Photos`
  ADD CONSTRAINT `FK_Upload` FOREIGN KEY (`Id_User`) REFERENCES Utilisateurs(`Id_U`),
  ADD CONSTRAINT `FK_Contient` FOREIGN KEY (`Id_Album`) REFERENCES Albums(`Id_A`);
--
-- Contraintes pour la table `Evenements`
--
ALTER TABLE `Evenements`
  ADD CONSTRAINT `FK_Creer` FOREIGN KEY (`Id_U`) REFERENCES Utilisateurs(`Id_U`);

--
-- Contraintes pour la table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `FK_Envoyer` FOREIGN KEY (`Id_U`) REFERENCES Utilisateurs(`Id_U`),
  ADD CONSTRAINT `FK_Publier` FOREIGN KEY (`Id_E`) REFERENCES Evenements(`Id_E`);

