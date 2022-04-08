CREATE DATABASE  IF NOT EXISTS `hyt_trading` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `hyt_trading`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: hyt_trading
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(45) DEFAULT NULL,
  `fullapellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dni` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'','','david_albres20@hotmail.com','78995887','cliente','1'),(2,'prueba meh apellido',NULL,'mehhh@gmail.com','74558996','cliente','1'),(3,'whh name','mehhhhhhh apellido','mehhhh correo','mehhhh dni ','cliente','1'),(4,'Davidsd','Mamaniasd','david_albreasds20@hotmail.com','78995887','cliente','1'),(5,'asdasdasd',NULL,'asd','09245550','proveedor','1'),(6,'Mamani',NULL,'david_albres20@hotmail.com','09245550','proveedor','1'),(7,'Mamani',NULL,'david_albres20@hotmail.com','72451866','proveedor','1'),(8,'Mamani',NULL,'david_albres20@hotmail.com','72451866','proveedor','1'),(9,'Mamani',NULL,'david_albres20@hotmail.com','72451866','proveedor','1'),(10,'Mamani',NULL,'david_albres20@hotmail.com','74227334','proveedor','1'),(11,'Mamani',NULL,'david_albres20@hotmail.com','78995887','proveedor','1'),(12,'dasdasdasdasd','asdasdasdasd','david_albressdadasda@hotmail.com','78995887','cliente','1'),(13,'prueba nomrree','prueba napellido','prueba20@hotmail.com','72451866','cliente','1');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `proveedor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fullname` varchar(45) DEFAULT NULL,
  `fullapellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `dni` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,'asdasda',NULL,'davidsdasdasd_albres20@hotmail.com','74227334','proveedor','1'),(2,'Mamani',NULL,'david_albres20@hotmail.com','72451866','proveedor','1'),(3,'Mamanidsadsdawsdasdasdasdasdasdasd',NULL,'david_albrasdasdes20@hotmail.com','74227334','proveedor','1'),(4,'prueba proveedor',NULL,'david_albresss0@hotmail.com','74227323','proveedor','1'),(5,'Davidsdsdsdsdsdsdsdsd','Mamani','david_albres20@hotmail.com','73577289','proveedor','1');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('caja','logistica','admin') NOT NULL,
  `photo` varchar(300) NOT NULL,
  `estado` int NOT NULL,
  `ultimo_login` datetime NOT NULL,
  `agregado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (88,'admin','$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG','administrador','admin@gmail.com','admin','vista/img/admin.png',1,'2022-04-08 11:25:23','2022-04-08 16:25:23');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-04-08 16:31:55
