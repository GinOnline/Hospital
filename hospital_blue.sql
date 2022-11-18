-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: hospital_blue
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `user` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES ('admin','admin'),('admin','admin');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especialidades`
--

DROP TABLE IF EXISTS `especialidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especialidades` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especialidades`
--

LOCK TABLES `especialidades` WRITE;
/*!40000 ALTER TABLE `especialidades` DISABLE KEYS */;
INSERT INTO `especialidades` VALUES (1,'Enfermero'),(2,'Cirugía'),(3,'Clinico'),(4,'Pediatria'),(5,'Guardia'),(6,'Cardiologia'),(7,'Otorrinolaringologia'),(8,'Radiologia'),(9,'Anestesiologia'),(10,'Anatomia'),(11,'Dermatologia'),(12,'Ginecologia'),(13,'Urologia'),(14,'Hematologia'),(15,'Medicina de Rehabilitacion'),(16,'Neurologia'),(17,'Nefrologia'),(18,'Neumologia'),(19,'Ortopedia'),(20,'Psiquiatria');
/*!40000 ALTER TABLE `especialidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `obrassociales`
--

DROP TABLE IF EXISTS `obrassociales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `obrassociales` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `obrassociales`
--

LOCK TABLES `obrassociales` WRITE;
/*!40000 ALTER TABLE `obrassociales` DISABLE KEYS */;
INSERT INTO `obrassociales` VALUES (1,'Apros'),(2,'Osde'),(3,'Swiss Medical'),(4,'Galeno'),(5,'SanCor Salud'),(6,'Omint'),(7,'Medice'),(8,'Medius'),(9,'Acord'),(10,'No tiene');
/*!40000 ALTER TABLE `obrassociales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paciente`
--

DROP TABLE IF EXISTS `paciente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paciente` (
  `id_paciente` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_paciente` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `dire` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `obra` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  PRIMARY KEY (`id_paciente`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paciente`
--

LOCK TABLES `paciente` WRITE;
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
INSERT INTO `paciente` VALUES (2,'Juan','Molina','Av. Eden 335','3548152645',1,95172382),(3,'Roberto','Sanchez','San Martin 417','3549321982',4,36152984),(4,'Gian','Peréz','Las Américas 354','3246983513',5,454812957),(5,'Joaquin','Mendez','Av. Constitución 2500','1132465632',2,26684513),(6,'Franco','Garcia','San Martin 265','9849635',3,7226542),(7,'Rodrigo','Sanchez','Las Américas 798','3655135621',4,88654823),(8,'Federico','Alvornoz','Patria 213','8977983',10,66532135);
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prioridades`
--

DROP TABLE IF EXISTS `prioridades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prioridades` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prioridades`
--

LOCK TABLES `prioridades` WRITE;
/*!40000 ALTER TABLE `prioridades` DISABLE KEYS */;
INSERT INTO `prioridades` VALUES (1,'Emergencia'),(2,'Normal');
/*!40000 ALTER TABLE `prioridades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_123`
--

DROP TABLE IF EXISTS `profile_123`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_123` (
  `id_profile` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `biography` varchar(90) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `url_profile` varchar(50) NOT NULL,
  PRIMARY KEY (`id_profile`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_123`
--

LOCK TABLES `profile_123` WRITE;
/*!40000 ALTER TABLE `profile_123` DISABLE KEYS */;
INSERT INTO `profile_123` VALUES (1,'123','SIN DATOS ','SIN DATOS ','SIN DATOS ','./profile_name/kung.jpg'),(2,'123','SIN DATOS ','SIN DATOS ','SIN DATOS ','./profile_name/kung.jpg'),(3,'123','SIN DATOS ','SIN DATOS ','SIN DATOS ','./profile_name/kung.jpg');
/*!40000 ALTER TABLE `profile_123` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_3213`
--

DROP TABLE IF EXISTS `profile_3213`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_3213` (
  `id_profile` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `biography` varchar(90) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `url_profile` varchar(50) NOT NULL,
  PRIMARY KEY (`id_profile`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_3213`
--

LOCK TABLES `profile_3213` WRITE;
/*!40000 ALTER TABLE `profile_3213` DISABLE KEYS */;
INSERT INTO `profile_3213` VALUES (1,'Pedro','SIN DATOS ','SIN DATOS ','SIN DATOS ','./profile_name/Pañol_3.png'),(2,'Pedro','dsad','dsad','asd','./profile_name/Pañol_3.png'),(3,'Pedro','Pepe','ssad','121','./profile_name/Pañol_3.png'),(4,'Pedro','Pepe','ssad','121','./profile_name/Pañol_3.png'),(5,'Pedro','adsad','ssad','121','./profile_name/Pañol_3.png'),(6,'Pedro','1','ssad','121','./profile_name/Pañol_3.png'),(7,'Pedro','3213','ssad','121','./profile_name/Pañol_3.png');
/*!40000 ALTER TABLE `profile_3213` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile_admin`
--

DROP TABLE IF EXISTS `profile_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile_admin` (
  `id_profile` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `user` varchar(15) NOT NULL,
  `status` varchar(30) NOT NULL,
  `biography` varchar(90) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `url_profile` varchar(50) NOT NULL,
  PRIMARY KEY (`id_profile`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile_admin`
--

LOCK TABLES `profile_admin` WRITE;
/*!40000 ALTER TABLE `profile_admin` DISABLE KEYS */;
INSERT INTO `profile_admin` VALUES (1,'admin','SIN DATOS ','SIN DATOS ','SIN DATOS ','./img/default_pic.jpeg');
/*!40000 ALTER TABLE `profile_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `register` (
  `DNI` int(11) NOT NULL,
  `num_mat` int(11) NOT NULL,
  `name2` varchar(20) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `especialidad` varchar(20) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES (3213,312321,'Pedro','Alva','10','alba@gmail.com','123213','1234'),(123,123,'123','123','4','123@123.123','123','123');
/*!40000 ALTER TABLE `register` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `turnos`
--

DROP TABLE IF EXISTS `turnos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `turnos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dni` varchar(10) NOT NULL,
  `title` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `description` varchar(120) NOT NULL,
  `medicamentos` varchar(60) NOT NULL,
  `patologias` varchar(30) NOT NULL,
  `zona` varchar(15) NOT NULL,
  `fecha_turno` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `time_estimated` varchar(20) NOT NULL,
  `status` varchar(15) NOT NULL,
  `prioridad` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `turnos`
--

LOCK TABLES `turnos` WRITE;
/*!40000 ALTER TABLE `turnos` DISABLE KEYS */;
INSERT INTO `turnos` VALUES (36,'95172382','Juan','Molina','Covid-19','SIN CONSUMO DE MEDICAMENTOS','SIN PATOLOGIAS PREVIAS','18','2022-11-18','08:45:54','09:00:54','ACCEPT',2),(37,'36152984','Roberto','Sanchez','Meninguitis','Insulina 2 veces al día','Diabetes','16','2022-11-18','08:47:16','09:02:16','ACCEPT',1),(38,'454812957','Gian','Peréz','Dolor de Cabeza ','SIN CONSUMO DE MEDICAMENTOS','SIN PATOLOGIAS PREVIAS','3','2022-11-18','08:47:36','09:02:36','PENDING',2),(39,'26684513','Joaquin','Mendez','Covid-19','SIN CONSUMO DE MEDICAMENTOS','SIN PATOLOGIAS PREVIAS','18','2022-11-18','08:47:52','09:02:52','PENDING',1),(40,'26684513','Joaquin','Mendez','Otitis','Tiroxina T4','Hiperension','3','2022-11-18','08:48:44','09:03:44','ACCEPT',2),(41,'26684513','Joaquin','Mendez','Anemia','Tiroxina T4','Hiperension','20','2022-11-18','08:49:18','09:04:18','ACCEPT',2),(42,'26684513','Joaquin','Mendez','Dolor de Cabeza ','Tiroxina T4','Hiperension','17','2022-11-18','08:49:34','09:04:34','ACCEPT',2),(43,'95172382','Juan','Molina','Otitis','SIN CONSUMO DE MEDICAMENTOS','SIN PATOLOGIAS PREVIAS','14','2022-11-18','08:50:18','09:05:18','ACCEPT',2),(44,'36152984','Roberto','Sanchez','Otitis','SIN CONSUMO DE MEDICAMENTOS','SIN PATOLOGIAS PREVIAS','5','2022-11-18','08:50:33','09:05:33','PENDING',1),(45,'36152984','Roberto','Sanchez','Odinofagia','SIN CONSUMO DE MEDICAMENTOS','SIN PATOLOGIAS PREVIAS','5','2022-11-18','08:51:05','09:06:05','ACCEPT',2),(46,'36152984','Roberto','Sanchez','Disfagia','Insulina 2 veces al día','Diabetes tipo II','1','2022-11-18','08:51:49','09:06:49','ACCEPT',2),(47,'66532135','Federico','Alvornoz','Traumatismo','SIN CONSUMO DE MEDICAMENTOS','SIN PATOLOGIAS PREVIAS','1','2022-11-18','08:55:27','09:10:27','PENDING',1),(48,'88654823','Rodrigo','Sanchez','Golpe en la cabeza','SIN CONSUMO DE MEDICAMENTOS','SIN PATOLOGIAS PREVIAS','4','2022-11-18','08:55:52','09:10:52','PENDING',1),(49,'7226542','Franco','Garcia','Cancer','Clonazepan 43 Mg/dia','Ezquizofrenia','2','2022-11-18','08:57:28','09:12:28','PENDING',1),(50,'36152984','Roberto','Sanchez','Otitis','SIN CONSUMO DE MEDICAMENTOS','SIN PATOLOGIAS PREVIAS','15','2022-11-18','09:06:06','09:21:06','ACCEPT',1),(51,'26684513','Joaquin','Mendez','Dolor de Cabeza ','SIN CONSUMO DE MEDICAMENTOS','SIN PATOLOGIAS PREVIAS','4','2022-11-18','09:06:16','09:21:16','PENDING',1),(52,'95172382','Juan','Molina','Covid-19','SIN CONSUMO DE MEDICAMENTOS','SIN PATOLOGIAS PREVIAS','19','2022-11-18','09:06:24','09:21:24','PENDING',2),(53,'88654823','Rodrigo','Sanchez','Disfagia','SIN CONSUMO DE MEDICAMENTOS','SIN PATOLOGIAS PREVIAS','3','2022-11-18','09:06:38','09:21:38','PENDING',2);
/*!40000 ALTER TABLE `turnos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zonas`
--

DROP TABLE IF EXISTS `zonas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zonas` (
  `id_zona` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zonas`
--

LOCK TABLES `zonas` WRITE;
/*!40000 ALTER TABLE `zonas` DISABLE KEYS */;
INSERT INTO `zonas` VALUES (1,'Guardia','Abierto 24 Hrs'),(2,'Cardiologia','Para el corazón'),(3,'Pediatria','Para niños');
/*!40000 ALTER TABLE `zonas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-18  9:15:41
