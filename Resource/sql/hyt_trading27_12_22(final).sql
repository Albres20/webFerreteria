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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Automotriz','#00FFFF'),(2,'Herramientas de medición','#FF00FF'),(3,'Limpieza','#4d7bac'),(4,'Construcción','#5aaaa9'),(5,'Herramientas de golpe','#00FF00'),(6,'Jardineria','#7cbb48'),(7,'Esmaltes','#e1bbdd'),(10,'Cerrajería','#ff00ff'),(14,'Eléctrico','#c7df11'),(15,'Gasfiteria','#85ee2f');
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
  CONSTRAINT `fk_det_prod_produ1` FOREIGN KEY (`prd_codigo`) REFERENCES `productos` (`prd_codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_det`
--

LOCK TABLES `producto_det` WRITE;
/*!40000 ALTER TABLE `producto_det` DISABLE KEYS */;
INSERT INTO `producto_det` VALUES (2,12.00,18.00,41,'EWRWR','2022-11-25 22:34:03','P00006'),(6,10.00,10.00,13,'ESCOBON','2022-11-27 20:43:33','P00008'),(7,4.00,6.00,80,'-',NULL,'P00001'),(8,2.00,3.50,50,'-',NULL,'P00002'),(9,4.00,6.00,75,'-',NULL,'P00003'),(10,1.00,1.50,60,'-',NULL,'P00004'),(11,12.00,15.00,25,'METUSA',NULL,'P00005'),(12,20.00,25.00,10,'METUSA',NULL,'P00007'),(13,12.00,15.00,10,'-',NULL,'P00009'),(14,8.00,10.00,15,'-',NULL,'P00010'),(15,1.50,2.50,45,'-',NULL,'P00011'),(16,5.00,8.00,18,'-',NULL,'P00012'),(17,25.00,27.00,100,'Sol',NULL,'P00013'),(18,9.50,11.90,30,'Topex',NULL,'P00014'),(19,21.00,25.00,90,'APU',NULL,'P00015'),(20,24.00,28.60,75,'Andino',NULL,'P00016'),(21,5.00,6.90,80,'LUK',NULL,'P00017'),(22,5.00,6.90,75,'LUK',NULL,'P00018'),(23,5.00,6.90,50,'LUK',NULL,'P00019'),(24,0.50,0.90,100,'Pirámide',NULL,'P00020'),(25,0.60,0.90,100,'Fortes',NULL,'P00021'),(26,2.20,2.70,100,'Ital Ladrillos',NULL,'P00022'),(27,38.00,45.00,100,'Aceros Arequipa',NULL,'P00023'),(28,21.00,25.00,100,'Aceros Arequipa',NULL,'P00024'),(29,88.00,100.00,100,'Aceros Arequipa',NULL,'P00025');
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
INSERT INTO `productos` VALUES ('P00001','Toma corriente doble','A','2022-12-27 14:40:23','',14),('P00002','Interruptor simple  para sobreponer','A','2022-12-27 14:41:18','',14),('P00003','Foco led de 9 watts económicos','A','2022-12-27 14:42:32','',14),('P00004','Teflon comercial empaque rojo','A','2022-12-27 14:44:27','',15),('P00005','Trampa lavadero cocina 1 ½”','A','2022-12-27 14:45:10','',15),('P00006','CAÑO DE JARDIN','A','2022-11-25 22:34:03','8579d67401f0bb305921b13d3c2fb9b1.png',6),('P00007','Llave paso Bronce semi pesado','A','2022-12-27 14:45:54','',15),('P00008','ESCOBA GRANDE','A','2022-11-27 16:51:19','f3a1ff1c6e6e5d615bf5f62aa113e7c3.jpg',3),('P00009','Martillo mango madera','A','2022-12-27 14:46:55','',5),('P00010','Alicate universal 8”','A','2022-12-27 14:47:36','',10),('P00011','Desarmador reversible 5mm','A','2022-12-27 14:48:23','',10),('P00012','Serrucho 18”','A','2022-12-27 14:49:07','',5),('P00013','Cemento Sol T1','A','2022-12-27 14:59:46','',4),('P00014','Mortero Pegador Ladrillo 40kg','A','2022-12-27 15:00:33','',4),('P00015','Cemento APU','A','2022-12-27 15:01:15','',4),('P00016','Cemento Andino Ultra HS','A','2022-12-27 15:01:47','',4),('P00017','Arena Gruesa 40 Kg','A','2022-12-27 15:03:07','',4),('P00018','Arena Fina 40 Kg','A','2022-12-27 15:03:32','',4),('P00019','Piedra Chancada 1/2\" 40 Kg','A','2022-12-27 15:04:11','',4),('P00020','Ladrillo Pandereta Acanalado','A','2022-12-27 15:06:19','',4),('P00021','Ladrillo King Kong 18 Huecos','A','2022-12-27 15:07:00','',4),('P00022','Ladrillo Techo 12','A','2022-12-27 15:07:42','',4),('P00023','Barras de Acero 1/2\"','A','2022-12-27 15:08:43','',4),('P00024','Barras de Acero 3/8\"','A','2022-12-27 15:09:14','',4),('P00025','Barras de Acero 3/4\"','A','2022-12-27 15:10:47','',4);
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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (001,'admin','$2y$10$MJD414C1powe7UvzDNb3geLIbMOXa9cyps/RmkrQ4tbAkYLJppprm','LUIS RAMIREZ',NULL,NULL,'A','2022-12-16 16:30:08',NULL,1),(002,'cajero1','1234','GUSTAVO HUERTA',NULL,NULL,'A',NULL,NULL,2),(004,'paolo','$2y$10$JFewOgvTyQHT3b4vypyaiOVcclNm28PZeB.oRMB7Omf1InDKv7kfi','paolo coronado','dsada@gmail.com','','A','2022-12-13 17:11:32','2022-11-13 16:25:59',2),(005,'moises','$2y$10$TyrabN5EYbuTX.ssbbfthOPEJAFLZCzpdNnjFaiqyRY6ubtAdGCdq','CRISTHOFER VENTURA','cristhofer.ventura@unmsm.edu.pe','139f072a81f00f4a8b28f0569371bb5c.jpg','A','2022-12-27 14:36:46','2022-11-13 22:34:58',1),(006,'juan carrasco','$2y$10$mqz0S98pdp8h51ghexnkFecHNJiQ0otYHYxELhsUS9hYDCbk1tNE.','JUAN CARRASCO GUZMAN','juanpa@gmail.com','','A','2022-12-13 17:13:09','2022-11-25 17:53:02',3),(008,'cristhofer','$2y$10$NLsdYaRRxZ.GDbT9Qp6LRO/AvfbHO/yE8mxraA8FsfpMi1CPxXp9y','CRISTHOFER VENTURA','cristhofer.ventura@unmsm.edu.pe','','A','2022-12-26 18:09:00','2022-12-23 15:27:43',1);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `vta_numped` int NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,14.00,'2022-12-12 18:41:50','A',002,5),(13,74.00,'2022-12-23 21:23:58','A',008,NULL),(16,50.00,'2022-12-26 20:26:39','A',008,NULL),(26,20.00,'2022-12-27 00:27:23','A',008,6);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_det`
--

DROP TABLE IF EXISTS `ventas_det`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_det` (
  `det_id` int NOT NULL AUTO_INCREMENT,
  `prd_codigo` char(6) NOT NULL,
  `usr_codigo` int(3) unsigned zerofill DEFAULT NULL,
  `det_prec_prod` decimal(10,2) DEFAULT NULL,
  `det_cantidad` int DEFAULT NULL,
  `det_prec_subtotal` decimal(10,2) NOT NULL,
  `det_fec_ped` datetime DEFAULT NULL,
  `det_est_ped` char(1) NOT NULL,
  PRIMARY KEY (`det_id`),
  KEY `fk_venta_det_producto1_idx` (`prd_codigo`),
  KEY `fk_venta_det_producto2_idx` (`usr_codigo`),
  CONSTRAINT `fk_venta_det_producto1` FOREIGN KEY (`prd_codigo`) REFERENCES `productos` (`prd_codigo`),
  CONSTRAINT `fk_venta_det_producto2` FOREIGN KEY (`usr_codigo`) REFERENCES `usuario` (`usr_codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_det`
--

LOCK TABLES `ventas_det` WRITE;
/*!40000 ALTER TABLE `ventas_det` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas_det` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas_list`
--

DROP TABLE IF EXISTS `ventas_list`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas_list` (
  `idventas_list` int NOT NULL AUTO_INCREMENT,
  `ventas_lisidventa` int DEFAULT NULL,
  `ventas_listidproducto` char(6) DEFAULT NULL,
  `ventas_listcantidad` int DEFAULT NULL,
  `ventas_listprecio` decimal(10,2) DEFAULT NULL,
  `ventas_listsubtotal` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`idventas_list`),
  KEY `fk_ventas_list_1_idx` (`ventas_lisidventa`),
  KEY `fk_ventas_list_2_idx` (`ventas_listidproducto`),
  CONSTRAINT `fk_ventas_list_1` FOREIGN KEY (`ventas_lisidventa`) REFERENCES `ventas` (`vta_numped`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_ventas_list_2` FOREIGN KEY (`ventas_listidproducto`) REFERENCES `productos` (`prd_codigo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas_list`
--

LOCK TABLES `ventas_list` WRITE;
/*!40000 ALTER TABLE `ventas_list` DISABLE KEYS */;
INSERT INTO `ventas_list` VALUES (1,13,'P00006',3,18.00,54.00),(2,13,'P00008',2,10.00,20.00),(7,16,'P00008',5,10.00,50.00),(19,26,'P00008',2,10.00,20.00);
/*!40000 ALTER TABLE `ventas_list` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-27 15:22:16
