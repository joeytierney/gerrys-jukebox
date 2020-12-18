-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: gerrys_db
-- ------------------------------------------------------
-- Server version	5.7.20-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `albums`
--

DROP TABLE IF EXISTS `albums`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `albums` (
  `albumID` int(11) NOT NULL AUTO_INCREMENT,
  `albumName` varchar(70) NOT NULL,
  `albumImage` text NOT NULL,
  `albumRelease` varchar(70) NOT NULL,
  `albumVideo` text NOT NULL,
  `albumPrice` float NOT NULL,
  `artistID` int(11) NOT NULL,
  `albumCat` varchar(70) NOT NULL,
  PRIMARY KEY (`albumID`),
  KEY `albums_artistID_FK` (`artistID`),
  CONSTRAINT `albums_artistID_FK` FOREIGN KEY (`artistID`) REFERENCES `artists` (`artistID`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `albums`
--

LOCK TABLES `albums` WRITE;
/*!40000 ALTER TABLE `albums` DISABLE KEYS */;
INSERT INTO `albums` VALUES (1,'Judas','images/albums/fozzyjudas.png','2017-10-13','https://www.youtube.com/embed/lqURPBtGJzg',9.99,1,'Heavy Metal'),(2,'Do You Wanna Start a War','images/albums/fozzywar.png','2014-07-21','https://www.youtube.com/embed/mbrqAFxb4pE',9.99,1,'Heavy Metal'),(3,'Sin and Bones','images/albums/fozzysin.png','2012-08-13','https://www.youtube.com/embed/fEbXnhgYYYs',9.99,1,'Heavy Metal'),(4,'Chasing the Grail','images/albums/fozzygrail.png','2010-01-26','https://www.youtube.com/embed/D3aVN_gyhok',9.99,1,'Heavy Metal'),(5,'All That Remains','images/albums/fozzyremains.png','2005-01-18','https://www.youtube.com/embed/L9h16JTxOUU',9.99,1,'Heavy Metal'),(6,'Happenstance','images/albums/fozzyhappenstance.png','2002-12-10','https://www.youtube.com/embed/sExcknaQj-Q',9.99,1,'Heavy Metal'),(7,'Fozzy','images/albums/fozzyalbum.png','2000-10-24','https://www.youtube.com/embed/Xv_3xEH-axs',9.99,1,'Heavy Metal'),(8,'Interlude','images/albums/interlude.png','2014-10-06','https://www.youtube.com/embed/y76kW4vMWk4',9.99,2,'Jazz'),(9,'Momentum','images/albums/momentum.png','2013-05-20','https://www.youtube.com/embed/_Z5F9BYacfs',9.99,2,'Jazz'),(10,'The Pursuit','images/albums/pursuit.png','2009-11-10','https://www.youtube.com/embed/L-XJylC3zs8',9.99,2,'Jazz'),(11,'Catching Tales','images/albums/catchingtales.png','2005-09-26','https://www.youtube.com/embed/m0xk-UZcfrg',9.99,2,'Jazz'),(12,'Twentysomething','images/albums/twentysomething.png','2003-10-20','https://www.youtube.com/embed/QzeC5bDfHAI',9.99,2,'Jazz'),(13,'Pointless Nostalgic','images/albums/pointless.png','2002-07-15','https://www.youtube.com/embed/KtubVj0cWOA',9.99,2,'Jazz'),(14,'Ready Steady Go!','images/albums/readysteadygo.png','2014-04-24','https://www.youtube.com/embed/rQYBVPVeQn0',9.99,4,'Pop'),(15,'The Ballad of Tom and Cindy','images/albums/ballad.png','2012-07-27','https://www.youtube.com/embed/cO13lv-mXbQ',9.99,4,'Pop'),(16,'Its Only Time','images/albums/itsonlytime.png','2006-12-05','https://www.youtube.com/embed/IHPTi-SX_2s',9.99,4,'Pop'),(17,'Telegraph','images/albums/telegraph.png','2005-08-23','https://www.youtube.com/embed/mYMLFiBRD3U',9.99,4,'Pop'),(18,'The Book of Souls','images/albums/bookofsouls.png','2015-09-04','https://www.youtube.com/embed/-F7A24f6gNc',9.99,3,'Heavy Metal'),(19,'The Final Frontier','images/albums/finalfrontier.png','2010-08-13','https://www.youtube.com/embed/8S0QcINRYJs',9.99,3,'Heavy Metal'),(20,'A Matter of Life and Death','images/albums/matteroflife.png','2006-08-26','https://www.youtube.com/embed/jvnfCfWnybY',9.99,3,'Heavy Metal'),(21,'Dance of Death','images/albums/danceofdeath.png','2003-09-02','https://www.youtube.com/embed/fX5aMvCd7JE',9.99,3,'Heavy Metal'),(22,'Brave New World','images/albums/bravenewworld.png','2000-05-29','https://www.youtube.com/embed/-sQ3Af3DpeM',9.99,3,'Heavy Metal'),(23,'Virtual XI','images/albums/virtualxi.png','1998-03-23','https://www.youtube.com/embed/IhlRyxWU21s',9.99,3,'Heavy Metal'),(24,'The X Factor','images/albums/xfactor.png','1995-10-02','https://www.youtube.com/embed/iS7qykdXX8Q',9.99,3,'Heavy Metal'),(25,'Fear of the Dark','images/albums/fearofthedark.png','1992-05-11','https://www.youtube.com/embed/0c9iYZdsZMM',9.99,3,'Heavy Metal'),(26,'No Prayer For the Dying','images/albums/noprayer.png','1990-10-01','https://www.youtube.com/embed/m0J7XnbUN5o',9.99,3,'Heavy Metal'),(27,'Seventh Son of a Seventh Son','images/albums/seventhson.png','1988-04-11','https://www.youtube.com/embed/Kvqr366Op3k',9.99,3,'Heavy Metal'),(28,'Somewhere in Time','images/albums/somewhereintime.png','1986-09-29','https://www.youtube.com/embed/Ij99dud8-0A',9.99,3,'Heavy Metal'),(29,'Powerslave','images/albums/powerslave.png','1984-09-03','https://www.youtube.com/embed/9qbRHY1l0vc',9.99,3,'Heavy Metal'),(30,'Piece of Mind','images/albums/pieceofmind.png','1983-05-16','https://www.youtube.com/embed/X4bgXH3sJ2Q',9.99,3,'Heavy Metal'),(31,'The Number of the Beast','images/albums/numberof.png','1982-03-22','https://www.youtube.com/embed/86URGgqONvA',9.99,3,'Heavy Metal'),(32,'Killers','images/albums/killers.png','1981-02-02','https://www.youtube.com/embed/__j55hsCxk0',9.99,3,'Heavy Metal'),(33,'Iron Maiden','images/albums/ironmaidenalbum.png','1980-04-14','https://www.youtube.com/embed/b2krumHkU10',9.99,3,'Heavy Metal'),(34,'Damn','images/albums/damn.png','2017-04-14','https://www.youtube.com/embed/NLZRYQMLDW4',9.99,14,'Rap'),(35,'To Pimp A Butterfly','images/albums/butterfly.jpg','2015-03-15','https://www.youtube.com/embed/hRK7PVJFbS8',9.99,14,'Rap'),(36,'Pretty Girls Like Trap Music','images/albums/trap.jpg','2017-06-16','https://www.youtube.com/embed/n7P270JZg08',9.99,8,'Rap'),(37,'ColleGrove','images/albums/grove.jpg','2016-03-04','https://www.youtube.com/embed/aB_Wx477Njw',9.99,8,'Rap'),(38,'The Truth About Love','images/albums/truth.PNG','2012-09-18','https://www.youtube.com/embed/HMwm2xwoQjg',9.99,5,'Pop'),(39,'Confident','images/albums/confident.PNG','2015-10-16','https://www.youtube.com/embed/cwLRQn61oUY',9.99,6,'Pop'),(40,'Nothing Was The Same','images/albums/same.jpg','2013-09-24','https://www.youtube.com/embed/8Wl-HSl386k',9.99,7,'Rap'),(41,'American Teen','images/albums/teen.jpg','2017-03-03','https://www.youtube.com/embed/0NChtZCDCsY',9.99,9,'Rap'),(42,'Beautiful Trauma','images/albums/trauma.jpg','2013-10-13','https://www.youtube.com/embed/EBt_88nxG4c',9.99,5,'Pop'),(43,'Tell Me You Love Me','images/albums/tell.jpg','2017-09-29','https://www.youtube.com/embed/SM1w9PEQOE8',9.99,6,'Pop'),(44,'Views','images/albums/views.jpg','2016-04-26','https://www.youtube.com/embed/uxpDa-c-4Mc',9.99,7,'Rap'),(45,'Royalty','images/albums/royalty.jpg','2015-12-18','https://www.youtube.com/embed/Fq0xEpRDL9Q',9.99,10,'Rap'),(46,'Fan Of A Fan','images/albums/fan.jpg','2015-02-20','https://www.youtube.com/embed/he3DJLXbebI',9.99,10,'Rap'),(47,'Divide','images/albums/divide.jpg','2017-03-03','https://www.youtube.com/embed/2Vv-BfVoq4g',9.99,11,'Pop'),(48,'X','images/albums/x.jpg','2014-06-20','https://www.youtube.com/embed/wfWIs2gFTAM',9.99,11,'Pop'),(49,'El Gato: The Human Glacier','images/albums/human.jpg','2017-12-22','https://www.youtube.com/embed/NVCqz2BDfcQ',9.99,12,'Pop'),(50,'Everybody Looking','images/albums/look.jpg','2017-07-22','https://www.youtube.com/embed/xtSWkfjM9sc',9.99,12,'Pop'),(51,'Evolve','images/albums/evolve.jpg','2017-06-23','https://www.youtube.com/embed/gOsM-DYAEhY',9.99,13,'Pop'),(52,'Smoke and Mirrors','images/albums/smoke.jpg','2015-02-17','https://www.youtube.com/embed/6tz1_znrbmc',9.99,13,'Pop');
/*!40000 ALTER TABLE `albums` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-04-23 17:26:30
