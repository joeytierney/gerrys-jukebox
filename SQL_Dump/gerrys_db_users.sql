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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(50) DEFAULT NULL,
  `lastName` varchar(50) DEFAULT NULL,
  `userName` varchar(50) DEFAULT NULL,
  `userRole` int(11) NOT NULL,
  `userImage` text,
  `userEmail` varchar(90) DEFAULT NULL,
  `userPassword` text,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Derek','McCarthy','derek',2,'images/userProfilePics/user.ico','derek@gerrys.com','$2y$10$F0xu/3DPQc1VglCYBpYQJeGzB0aFsC7xN5AEBm9zLFk48bzcMQVIG'),(2,'Joseph','Tierney','joey',2,'images/userProfilePics/user.ico','joey@gerrys.com','$2y$10$MMXLHbGTKekjH7kT5bl3Y.6Gfdax3sf1JEEU4YmMAYoRua71Lvbua'),(3,'Christopher','Slattery','chris',2,'images/userProfilePics/user.ico','chris@gerrys.com','$2y$10$wnpBuJKhQBH6GWTw8MhUi.TfV6SC5dSU7KZ9HqU0dONCkXTB.CT0u'),(4,'a','a','aaaaa',1,'/images/userProfilePics/0a66d752abb29aa264d988414f2c2733.jpeg','de@aa.com','$2y$10$n.Qj/poWMceiM2tbpewp0.AVJXDx6neadcSYhqNCSKKLr92NF.G5u'),(5,'aaa','aaa','roots',1,'/images/userProfilePics/user.ico','asdfs@gmail.com','$2y$10$pmrKqeK1u3r1Xk6TX20VSOtFAomQ5MNdgCTvX0H10yFFJjtonxjKi');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
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
