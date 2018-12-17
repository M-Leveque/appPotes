-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: apppotes
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB-0+deb9u1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Acces`
--

DROP TABLE IF EXISTS `Acces`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Acces` (
  `Id_U` int(5) NOT NULL,
  `Id_E` int(5) NOT NULL,
  PRIMARY KEY (`Id_U`,`Id_E`),
  KEY `FK_PermetLAccesPour` (`Id_E`),
  CONSTRAINT `FK_PermetLAccesA` FOREIGN KEY (`Id_U`) REFERENCES `Utilisateur` (`Id_U`),
  CONSTRAINT `FK_PermetLAccesPour` FOREIGN KEY (`Id_E`) REFERENCES `Evenement` (`Id_E`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Acces`
--

LOCK TABLES `Acces` WRITE;
/*!40000 ALTER TABLE `Acces` DISABLE KEYS */;
INSERT INTO `Acces` VALUES (1,1),(3,1),(3,2),(3,3),(3,4);
/*!40000 ALTER TABLE `Acces` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Album`
--

DROP TABLE IF EXISTS `Album`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Album` (
  `Id_A` int(5) NOT NULL AUTO_INCREMENT,
  `Nom_A` varchar(50) NOT NULL,
  `Description_A` varchar(255) NOT NULL,
  `DateCreation_A` date NOT NULL,
  `Priver_A` tinyint(1) NOT NULL,
  `Visuel_A` varchar(255) NOT NULL,
  `Id_E` int(5) DEFAULT NULL,
  `Id_U` int(5) NOT NULL,
  PRIMARY KEY (`Id_A`),
  KEY `FK_AlbumCreerPar` (`Id_U`),
  KEY `FK_AlbumCreerPour` (`Id_E`),
  CONSTRAINT `FK_AlbumCreerPar` FOREIGN KEY (`Id_U`) REFERENCES `Utilisateur` (`Id_U`),
  CONSTRAINT `FK_AlbumCreerPour` FOREIGN KEY (`Id_E`) REFERENCES `Evenement` (`Id_E`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Album`
--

LOCK TABLES `Album` WRITE;
/*!40000 ALTER TABLE `Album` DISABLE KEYS */;
INSERT INTO `Album` VALUES (1,'Vacance 2018','Album des vacances de 2018','2018-05-02',0,'ressources/img/vignettes/pic-2.jpg',1,1),(2,'Soirée anniversaire','Soirée d\'anniversaire de franck','2018-11-07',0,'ressources/img/vignettes/pic-1.jpg',1,1),(3,'Album admin','Album privé de l\'administrateur','2018-11-29',1,'ressources/img/vignettes/pic-3.jpg',1,3),(4,'Famille !','Album de famille !','2018-11-29',0,'ressources/img/vignettes/pic-2.jpg',1,3),(5,'Soirée nouvel ans 2015','!!! Attention : Accords parental obligatoire !!!','2016-01-01',0,'ressources/img/vignettes/pic-1.jpg',2,3),(6,'Session de skate','Session de skate en pleine hiver !','2016-02-01',0,'ressources/img/vignettes/pic-2.jpg',2,3);
/*!40000 ALTER TABLE `Album` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cagnotte`
--

DROP TABLE IF EXISTS `Cagnotte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cagnotte` (
  `Id_C` int(5) NOT NULL AUTO_INCREMENT,
  `Titre_C` varchar(50) NOT NULL,
  `Description_C` text NOT NULL,
  `DateHeureFin_C` datetime NOT NULL,
  `ArgentR_C` float(10,2) DEFAULT NULL,
  `Id_E` int(5) NOT NULL,
  PRIMARY KEY (`Id_C`),
  KEY `FK_FincanceEvenement` (`Id_E`),
  CONSTRAINT `FK_FincanceEvenement` FOREIGN KEY (`Id_E`) REFERENCES `Evenement` (`Id_E`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cagnotte`
--

LOCK TABLES `Cagnotte` WRITE;
/*!40000 ALTER TABLE `Cagnotte` DISABLE KEYS */;
INSERT INTO `Cagnotte` VALUES (1,'Cagnotte vacance','Mettez une petite piece pour les vacances !','2018-05-03 23:00:00',0.00,1),(2,'Cagnotte Lazer Game','Une pièce = un verre d\'eau pour les inuits','2018-05-04 23:55:55',2.35,3);
/*!40000 ALTER TABLE `Cagnotte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Emoticon`
--

DROP TABLE IF EXISTS `Emoticon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Emoticon` (
  `Id_Em` int(5) NOT NULL AUTO_INCREMENT,
  `Titre_Em` varchar(50) NOT NULL,
  `Chemin_Em` varchar(255) NOT NULL,
  PRIMARY KEY (`Id_Em`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Emoticon`
--

LOCK TABLES `Emoticon` WRITE;
/*!40000 ALTER TABLE `Emoticon` DISABLE KEYS */;
INSERT INTO `Emoticon` VALUES (1,'Sourire','ressources/images/emoticon/sourire.png');
/*!40000 ALTER TABLE `Emoticon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Evenement`
--

DROP TABLE IF EXISTS `Evenement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Evenement` (
  `Id_E` int(5) NOT NULL AUTO_INCREMENT,
  `Titre_E` varchar(50) NOT NULL,
  `Description_E` text NOT NULL,
  `DateCreation_E` date NOT NULL,
  `DateHeureFin_E` datetime NOT NULL,
  `Archiver_E` tinyint(1) NOT NULL,
  `Id_U` int(5) NOT NULL,
  `Id_Em` int(5) NOT NULL,
  PRIMARY KEY (`Id_E`),
  KEY `FK_EvenementCreerPar` (`Id_U`),
  KEY `FK_EvenementIllustrePar` (`Id_Em`),
  CONSTRAINT `FK_EvenementCreerPar` FOREIGN KEY (`Id_U`) REFERENCES `Utilisateur` (`Id_U`),
  CONSTRAINT `FK_EvenementIllustrePar` FOREIGN KEY (`Id_Em`) REFERENCES `Emoticon` (`Id_Em`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Evenement`
--

LOCK TABLES `Evenement` WRITE;
/*!40000 ALTER TABLE `Evenement` DISABLE KEYS */;
INSERT INTO `Evenement` VALUES (1,'Vancance 2018','Ete au camping','2018-01-03','2018-05-02 22:00:00',0,1,1),(2,'Anniversaire','On fête sont anniv !!!','2018-11-12','2018-11-16 00:00:00',0,3,1),(3,'Lazer Game','Que le meilleur gagne','2018-11-20','2018-11-21 21:30:00',0,3,1),(4,'Nouvelle ans','C\'est le nouvel ans !!!','2018-11-28','2019-01-01 00:00:00',0,3,1);
/*!40000 ALTER TABLE `Evenement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Message`
--

DROP TABLE IF EXISTS `Message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Message` (
  `Id_M` int(5) NOT NULL AUTO_INCREMENT,
  `Contenu_M` text NOT NULL,
  `Id_E` int(5) NOT NULL,
  `Id_U` int(5) NOT NULL,
  PRIMARY KEY (`Id_M`),
  KEY `FK_MessageEnvoyerPar` (`Id_U`),
  KEY `FK_MessagePublierSur` (`Id_E`),
  CONSTRAINT `FK_MessageEnvoyerPar` FOREIGN KEY (`Id_U`) REFERENCES `Utilisateur` (`Id_U`),
  CONSTRAINT `FK_MessagePublierSur` FOREIGN KEY (`Id_E`) REFERENCES `Evenement` (`Id_E`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Message`
--

LOCK TABLES `Message` WRITE;
/*!40000 ALTER TABLE `Message` DISABLE KEYS */;
INSERT INTO `Message` VALUES (1,'Bonjour, dans quel camping allons-nous ?',1,1);
/*!40000 ALTER TABLE `Message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Photo`
--

DROP TABLE IF EXISTS `Photo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Photo` (
  `Id_P` int(5) NOT NULL AUTO_INCREMENT,
  `Titre_P` varchar(50) NOT NULL,
  `Chemin_P` varchar(50) NOT NULL,
  `Compteur_P` int(5) NOT NULL,
  `Date_P` date NOT NULL,
  `DateU_P` date NOT NULL,
  `Id_User` int(5) NOT NULL,
  `Id_Album` int(5) NOT NULL,
  PRIMARY KEY (`Id_P`),
  KEY `FK_PhotoUploadPar` (`Id_User`),
  KEY `FK_PhotoRangerDans` (`Id_Album`),
  CONSTRAINT `FK_PhotoRangerDans` FOREIGN KEY (`Id_Album`) REFERENCES `Album` (`Id_A`),
  CONSTRAINT `FK_PhotoUploadPar` FOREIGN KEY (`Id_User`) REFERENCES `Utilisateur` (`Id_U`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Photo`
--

LOCK TABLES `Photo` WRITE;
/*!40000 ALTER TABLE `Photo` DISABLE KEYS */;
INSERT INTO `Photo` VALUES (1,'Photo1','ressources/img/album/1.jpg',0,'2018-05-02','2018-05-03',1,1),(2,'Photo2','ressources/img/album/2.jpg',0,'0000-00-00','0000-00-00',3,1),(3,'Photo3','ressources/img/album/3.jpg',0,'2018-05-01','2018-02-03',3,1),(4,'Photo4','ressources/img/album/4.jpg',0,'2018-05-01','2018-02-03',3,2),(5,'Photo5','ressources/img/album/5.jpg',0,'2018-05-01','2018-02-03',3,2);
/*!40000 ALTER TABLE `Photo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Utilisateur`
--

DROP TABLE IF EXISTS `Utilisateur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Utilisateur` (
  `Id_U` int(5) NOT NULL AUTO_INCREMENT,
  `Niveau_U` int(1) NOT NULL,
  `Mail_U` varchar(50) NOT NULL,
  `Mdp_U` varchar(255) NOT NULL,
  `Pseudo_U` varchar(255) NOT NULL,
  `Photo_U` varchar(255) NOT NULL,
  `Tmp` tinyint(1) NOT NULL,
  PRIMARY KEY (`Id_U`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Utilisateur`
--

LOCK TABLES `Utilisateur` WRITE;
/*!40000 ALTER TABLE `Utilisateur` DISABLE KEYS */;
INSERT INTO `Utilisateur` VALUES (1,0,'visiteur@visiteur.com','$2y$10$mzuH7WTRawREWsYzexbkWeXQsP864ObU0p87JgDUvv7wzQSOmHzR.','Visiteur','img.png',0),(2,1,'Utilisateur@utilisateur.com','$2y$10$Ryj1/qGlYJY9XBQe4WbUq.4O14MBSSemyIPh5eB6cIDRCsQos1YxO','Utilisateur','img.png',0),(3,2,'Administrateur@administrateur.com','$2y$10$7GujrhaRNwdJn7RuZ5O0rO1oG7UiuAvPEKFHNQR/4a/RoPofQ/p1G','Administrateur','img.png',0);
/*!40000 ALTER TABLE `Utilisateur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-17 18:49:02
