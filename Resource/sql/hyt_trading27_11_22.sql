CREATE DATABASE  IF NOT EXISTS `venta` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `venta`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: venta
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

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categoria` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(50) DEFAULT NULL,
  `cat_color` varchar(7) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Automotriz','#00FFFF'),(2,'Herramientas de medición','#FF00FF'),(3,'Limpieza','#4d7bac'),(4,'Construcción','#5aaaa9'),(5,'Herramientas de golpe','#00FF00'),(6,'Jardineria','#7cbb48'),(7,'Esmaltes','#e1bbdd'),(10,'Cerrajería','#ff00ff'),(11,'UEBA','#d3a07e');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clientes` (
  `cpr_id` int NOT NULL AUTO_INCREMENT,
  `cpr_tipodocum` enum('RUC','DNI','SIN DOCUMENTO') NOT NULL,
  `cpr_nombre` varchar(200) NOT NULL,
  `cpr_numdoc` char(13) DEFAULT NULL,
  `cpr_direccion` varchar(200) DEFAULT NULL,
  `cpr_tipo` enum('CLIENTE','PROVEEDOR','CLIENTE/PROVEEDOR') NOT NULL,
  `cpr_telefono` varchar(9) DEFAULT NULL,
  `cpr_correo` varchar(200) DEFAULT NULL,
  `cpr_datosadicionales` varchar(200) DEFAULT NULL,
  `cpr_fechacreacion` datetime DEFAULT NULL,
  PRIMARY KEY (`cpr_id`),
  UNIQUE KEY `cpr_numdoc_UNIQUE` (`cpr_numdoc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'DNI','ORTIZ JARA JOSUE CARLOS','45129984','Calle manzanos 784','CLIENTE','987456231','chapo51235313@gmail.com','Servicio a domicilio',NULL),(2,'RUC','FAST ENGENHARIA E MONTAGENS S.A. SUCURSAL DEL PERU','20602003346','CAL. LOS CEDROS MZ. A LT. F-1 URB. HUERTOS DE VILLENA - LIMA LIMA LURIN','PROVEEDOR','','','Estado del contribuyente: ACTIVO',NULL),(5,'RUC','HUAMAN CHOCACA JORGE JAIME','10770767836','-','CLIENTE/PROVEEDOR','456-7890','','',NULL),(6,'SIN DOCUMENTO','URBINA ZAVALETA KELY MARISOL',NULL,'Pachacutec1098','CLIENTE/PROVEEDOR','','','',NULL);
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
  `dpr_idProducto` int NOT NULL AUTO_INCREMENT,
  `dpr_prec_compra` decimal(10,2) DEFAULT NULL,
  `dpr_prec_prod` decimal(10,2) DEFAULT NULL,
  `dpr_stock` int DEFAULT NULL,
  `dpr_marca` varchar(45) DEFAULT NULL,
  `dpr_fec_ult_modificacion` varchar(45) DEFAULT NULL,
  `prd_codigo` char(6) NOT NULL,
  PRIMARY KEY (`dpr_idProducto`,`prd_codigo`),
  KEY `fk_Producto_det_productos1_idx` (`prd_codigo`),
  CONSTRAINT `fk_Producto_det_productos1` FOREIGN KEY (`prd_codigo`) REFERENCES `productos` (`prd_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_det`
--

LOCK TABLES `producto_det` WRITE;
/*!40000 ALTER TABLE `producto_det` DISABLE KEYS */;
INSERT INTO `producto_det` VALUES (2,12.00,18.00,50,'EWRWR','2022-11-25 22:34:03','P00006');
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
INSERT INTO `productos` VALUES ('P00001','Producto 1','A',NULL,NULL,1),('P00002','Producto 2','A',NULL,NULL,2),('P00003','Product 3','A',NULL,NULL,1),('P00004','Producto 4','A',NULL,NULL,3),('P00005','CINTA METRICA','A',NULL,'937f26ce9707ccf785f076ce8e67631a.jpg',2),('P00006','CAÑO DE JARDIN','A','2022-11-25 22:34:03','8579d67401f0bb305921b13d3c2fb9b1.png',6),('P00007','ESCOBA','A','2022-11-25 22:38:49','684ecf63cdb101e1175fbd17c746e101.jpg',3);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `rol` (
  `rol_id` int NOT NULL AUTO_INCREMENT,
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
INSERT INTO `rol` VALUES (1,'administrador','A'),(2,'cajero','A'),(3,'logistica','A');
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `usr_codigo` int(3) unsigned zerofill NOT NULL AUTO_INCREMENT,
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
  CONSTRAINT `fk_usuario_rol1` FOREIGN KEY (`rol_id`) REFERENCES `rol` (`rol_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (001,'admin','$2y$10$MJD414C1powe7UvzDNb3geLIbMOXa9cyps/RmkrQ4tbAkYLJppprm','LUIS RAMIREZ',NULL,NULL,'A','2022-11-25 16:08:02',NULL,1),(002,'cajero1','1234','GUSTAVO HUERTA',NULL,NULL,'A',NULL,NULL,2),(004,'paolo','$2y$10$JFewOgvTyQHT3b4vypyaiOVcclNm28PZeB.oRMB7Omf1InDKv7kfi','paolo coronado','dsada@gmail.com','','A','2022-11-17 18:09:11','2022-11-13 16:25:59',2),(005,'moises','$2y$10$L5uo.Hgr7GMDoJ9cBiaF7OEjJb2pAUTdNWhEpKX7LItIfvPA8FnJG','CRISTHOFER VENTURA','cristhoferventurav@gmail.com','139f072a81f00f4a8b28f0569371bb5c.jpg','A','2022-11-17 18:08:46','2022-11-13 22:34:58',3),(006,'juan carrasco','$2y$10$mqz0S98pdp8h51ghexnkFecHNJiQ0otYHYxELhsUS9hYDCbk1tNE.','JUAN CARRASCO GUZMAN','juanpa@gmail.com','','I',NULL,'2022-11-25 17:53:02',3);
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
  `usr_codigo` int(3) unsigned zerofill NOT NULL,
  `cpr_cliente` int DEFAULT NULL,
  PRIMARY KEY (`vta_numped`),
  KEY `fk_ventas_clientes1_idx` (`cpr_cliente`),
  KEY `fk_ventas_usuario1_idx` (`usr_codigo`),
  CONSTRAINT `fk_ventas_clientes1` FOREIGN KEY (`cpr_cliente`) REFERENCES `clientes` (`cpr_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_ventas_usuario1` FOREIGN KEY (`usr_codigo`) REFERENCES `usuario` (`usr_codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES ('0000000001',14.00,NULL,'A',002,NULL);
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-11-27 16:25:29
