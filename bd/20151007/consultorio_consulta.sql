CREATE DATABASE  IF NOT EXISTS `consultorio` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `consultorio`;
-- MySQL dump 10.13  Distrib 5.6.13, for osx10.6 (i386)
--
-- Host: 127.0.0.1    Database: consultorio
-- ------------------------------------------------------
-- Server version	5.6.13

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
-- Table structure for table `consulta`
--

DROP TABLE IF EXISTS `consulta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `consulta` (
  `idConsulta` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idReporte` int(10) unsigned DEFAULT NULL,
  `idServicio` bigint(20) unsigned DEFAULT NULL,
  `idTurno` tinyint(3) unsigned NOT NULL,
  `hora` time DEFAULT NULL,
  `cantidad` int(10) unsigned NOT NULL DEFAULT '0',
  `cubiculo` tinyint(3) unsigned DEFAULT '1',
  PRIMARY KEY (`idConsulta`),
  KEY `reporte` (`idReporte`),
  KEY `servicio` (`idServicio`),
  KEY `turno` (`idTurno`),
  CONSTRAINT `idReporte-reporte` FOREIGN KEY (`idReporte`) REFERENCES `reporte` (`idReporte`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idServicio-servicio` FOREIGN KEY (`idServicio`) REFERENCES `servicio` (`idServicio`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `idTurno-turno` FOREIGN KEY (`idTurno`) REFERENCES `turno` (`idTurno`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consulta`
--

LOCK TABLES `consulta` WRITE;
/*!40000 ALTER TABLE `consulta` DISABLE KEYS */;
INSERT INTO `consulta` VALUES (19,12,4,1,'21:00:40',10,1),(20,12,4,1,'21:00:44',12,1),(21,12,4,1,'21:00:47',13,1),(22,12,5,1,'21:00:52',24,1),(23,12,5,1,'21:00:56',2,1),(24,12,8,1,'21:00:57',2,1),(25,12,8,1,'21:00:58',11,1),(26,12,8,1,'21:00:59',1,1),(27,12,9,1,'21:01:03',22,1),(28,12,9,1,NULL,0,1),(29,12,9,1,'21:01:14',2,1),(30,12,9,1,NULL,0,1),(31,12,5,1,'21:01:36',3,1),(32,12,4,1,'21:08:57',10,1),(33,12,4,1,'21:08:58',20,1),(34,12,4,1,'21:09:00',21,1),(35,12,4,1,'21:11:06',20,1),(36,12,4,1,'21:11:07',20,1),(37,12,5,1,'21:11:09',20,1),(38,12,5,1,'21:11:10',20,1),(39,12,4,1,'21:12:14',20,1),(40,12,4,1,'21:14:25',11,3),(41,12,4,1,'21:14:54',14,2),(42,12,8,1,'21:15:00',22,2),(43,12,8,1,'21:15:02',21,3),(44,12,9,1,'21:15:04',33,1),(45,12,9,1,'21:15:05',1,2),(46,12,9,1,'21:15:06',11,3),(47,12,20,1,'21:15:12',21,1),(48,12,20,1,'21:15:12',12,2),(49,12,20,1,'21:15:13',12,3),(50,12,5,1,'22:24:56',22,4),(51,12,4,2,'22:25:11',12,1),(52,12,5,2,'22:25:12',12,2),(53,12,5,2,'22:25:13',1,3),(54,12,8,2,'22:25:15',12,3),(55,12,9,2,'22:25:17',12,3),(56,12,11,2,'22:25:18',12,3),(57,12,4,3,'22:25:25',222,1),(58,12,4,3,'22:25:26',22,2),(59,12,5,3,'22:25:28',2,2),(60,13,4,1,'22:25:39',10,1),(61,13,4,1,'22:25:40',1,2),(62,13,5,1,'22:25:41',1,1),(63,13,5,1,'22:25:42',1,2),(64,13,8,1,'22:25:44',1,3);
/*!40000 ALTER TABLE `consulta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-10-07 23:40:41
