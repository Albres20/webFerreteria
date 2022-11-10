-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: hyt_trading
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
-- Table structure for table `categoria`
--
create database hyt_trading;
use hyt_trading;

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `cat_id` int NOT NULL,
  `cat_nombre` varchar(50) DEFAULT NULL,
  `cat_color` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Categoria 1',NULL);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `cpr_id` int NOT NULL,
  `cpr_nombre` varchar(60) NOT NULL,
  `cpr_apellido` varchar(60) NOT NULL,
  `cpr_numdoc` char(13) NOT NULL,
  `cpr_direccion` varchar(200) DEFAULT NULL,
  `cpr_telefono` varchar(9) DEFAULT NULL,
  `cpr_correo` varchar(200) DEFAULT NULL,
  `cpr_fechacreacion` datetime NOT NULL,
  PRIMARY KEY (`cpr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras`
--

DROP TABLE IF EXISTS `compras`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras` (
  `com_numero` int NOT NULL,
  `com_fec_ped` datetime DEFAULT NULL,
  `com_val_neto` decimal(10,2) NOT NULL,
  `com_estado` char(1) DEFAULT NULL,
  PRIMARY KEY (`com_numero`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras`
--

LOCK TABLES `compras` WRITE;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras_det`
--

DROP TABLE IF EXISTS `compras_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `compras_det` (
  `cde_prec_prod` decimal(10,2) DEFAULT NULL,
  `cde_cantidad` int DEFAULT NULL,
  `cde_prec_total` decimal(10,2) NOT NULL,
  `cde_fec_ped` datetime DEFAULT NULL,
  `cde_est_ped` char(1) DEFAULT NULL,
  `com_numero` int NOT NULL,
  `prd_codigo` char(6) NOT NULL,
  PRIMARY KEY (`com_numero`,`prd_codigo`),
  KEY `fk_compras_det_productos1_idx` (`prd_codigo`),
  CONSTRAINT `fk_compras_det_compras1` FOREIGN KEY (`com_numero`) REFERENCES `compras` (`com_numero`),
  CONSTRAINT `fk_compras_det_productos1` FOREIGN KEY (`prd_codigo`) REFERENCES `productos` (`prd_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras_det`
--

LOCK TABLES `compras_det` WRITE;
/*!40000 ALTER TABLE `compras_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empresa` (
  `emp_id` int NOT NULL,
  `emp_nombre` varchar(255) DEFAULT NULL,
  `emp_sector` varchar(100) DEFAULT NULL,
  `emp_tipo` varchar(100) DEFAULT NULL,
  `emp_correo` varchar(200) DEFAULT NULL,
  `emp_telefono` char(9) DEFAULT NULL,
  `emp_logo` varchar(255) DEFAULT NULL,
  `emp_region` varchar(100) DEFAULT NULL,
  `emp_provincia` varchar(100) DEFAULT NULL,
  `emp_distrito` varchar(50) DEFAULT NULL,
  `emp_direccion` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kardex`
--

DROP TABLE IF EXISTS `kardex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kardex` (
  `krd_id` int NOT NULL,
  `krd_stock_inicial` int NOT NULL,
  `krd_movimiento` int NOT NULL,
  `krd_stock_final` int NOT NULL,
  `krd_numdocumento` varchar(45) NOT NULL,
  `prd_codigo` char(6) NOT NULL,
  PRIMARY KEY (`krd_id`),
  KEY `fk_kardex_productos1_idx` (`prd_codigo`),
  CONSTRAINT `fk_kardex_productos1` FOREIGN KEY (`prd_codigo`) REFERENCES `productos` (`prd_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kardex`
--

LOCK TABLES `kardex` WRITE;
/*!40000 ALTER TABLE `kardex` DISABLE KEYS */;
/*!40000 ALTER TABLE `kardex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_det`
--

DROP TABLE IF EXISTS `producto_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `producto_det` (
  `idProducto_det` int NOT NULL,
  `Producto_detcol` varchar(45) DEFAULT NULL,
  `dpr_stock` int DEFAULT NULL,
  `dpr_prec_prod` varchar(45) DEFAULT NULL,
  `dpr_fec_ult_modificacion` varchar(45) DEFAULT NULL,
  `prd_codigo` char(6) NOT NULL,
  PRIMARY KEY (`idProducto_det`,`prd_codigo`),
  KEY `fk_Producto_det_productos1_idx` (`prd_codigo`),
  CONSTRAINT `fk_Producto_det_productos1` FOREIGN KEY (`prd_codigo`) REFERENCES `productos` (`prd_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_det`
--

LOCK TABLES `producto_det` WRITE;
/*!40000 ALTER TABLE `producto_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `prd_codigo` char(6) NOT NULL,
  `prd_nombre` varchar(120) DEFAULT NULL,
  `prd_estado` char(1) NOT NULL,
  `prd_fec_creacion` datetime DEFAULT NULL,
  `prd_imagen` varchar(255) DEFAULT NULL,
  `cat_id` int DEFAULT NULL,
  PRIMARY KEY (`prd_codigo`),
  KEY `fk_productos_categoria1_idx` (`cat_id`),
  CONSTRAINT `fk_productos_categoria1` FOREIGN KEY (`cat_id`) REFERENCES `categoria` (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES ('P00001','Producto 1','A',NULL,NULL,1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `rol_id` int NOT NULL,
  `rol_nombre` varchar(45) NOT NULL,
  `rol_estado` char(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador','A'),(2,'Cajero','A'),(3,'Logistica','A');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `usr_codigo` char(3) NOT NULL,
  `usr_nombre` varchar(50) NOT NULL,
  `usr_password` varchar(255) DEFAULT NULL,
  `usr_fullname` varchar(120) NOT NULL,
  `usr_email` varchar(120) DEFAULT NULL,
  `usr_photo` varchar(300) DEFAULT NULL,
  `usr_estado` char(1) NOT NULL DEFAULT 'A',
  `usr_ultima_sesion` datetime DEFAULT NULL,
  `usr_agregado` datetime DEFAULT NULL,
  `rol_id` int DEFAULT NULL,
  PRIMARY KEY (`usr_codigo`),
  UNIQUE KEY `usr_nombre_UNIQUE` (`usr_nombre`),
  UNIQUE KEY `usr_codigo_UNIQUE` (`usr_codigo`),
  KEY `fk_usuario_rol1_idx` (`rol_id`),
  CONSTRAINT `fk_usuario_rol1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES ('001','admin','1234','LUIS RAMIREZ',NULL,NULL,'A',NULL,NULL,1),('002','cajero1','1234','GUSTAVO HUERTA',NULL,NULL,'A',NULL,NULL,2);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `vta_numped` char(10) NOT NULL,
  `vta_val_neto` decimal(10,2) NOT NULL,
  `vta_fec_ped` datetime DEFAULT NULL,
  `vta_est_ped` char(1) NOT NULL,
  `usr_codigo` char(3) NOT NULL,
  `cpr_cliente` int DEFAULT NULL,
  PRIMARY KEY (`vta_numped`),
  KEY `fk_ventas_usuario1_idx` (`usr_codigo`),
  KEY `fk_ventas_clienteproveedores1_idx` (`cpr_cliente`),
  CONSTRAINT `fk_ventas_clienteproveedores1` FOREIGN KEY (`cpr_cliente`) REFERENCES `clientes` (`cpr_id`),
  CONSTRAINT `fk_ventas_usuario1` FOREIGN KEY (`usr_codigo`) REFERENCES `usuario` (`usr_codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES ('0000000001',14.00,NULL,'A','002',NULL);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_det`
--

DROP TABLE IF EXISTS `ventas_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_det` (
  `det_prec_prod` decimal(10,2) DEFAULT NULL,
  `det_cantidad` int DEFAULT NULL,
  `det_prec_total` decimal(10,2) NOT NULL,
  `det_fec_ped` datetime DEFAULT NULL,
  `det_est_ped` char(1) NOT NULL,
  `vta_numped` char(10) NOT NULL,
  `prd_codigo` char(6) NOT NULL,
  PRIMARY KEY (`vta_numped`,`prd_codigo`),
  KEY `fk_venta_det_venta_idx` (`vta_numped`),
  KEY `fk_venta_det_producto1_idx` (`prd_codigo`),
  CONSTRAINT `fk_venta_det_producto1` FOREIGN KEY (`prd_codigo`) REFERENCES `productos` (`prd_codigo`),
  CONSTRAINT `fk_venta_det_venta` FOREIGN KEY (`vta_numped`) REFERENCES `ventas` (`vta_numped`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_det`
--

LOCK TABLES `ventas_det` WRITE;
/*!40000 ALTER TABLE `ventas_det` DISABLE KEYS */;
INSERT INTO `ventas_det` VALUES (7.00,2,14.00,NULL,'A','0000000001','P00001');
/*!40000 ALTER TABLE `ventas_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'venta'
--

--
-- Dumping routines for database 'venta'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-09 20:13:28
