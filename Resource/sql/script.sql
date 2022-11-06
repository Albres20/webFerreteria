-- MySQL Script generated by MySQL Workbench
-- Thu Nov  3 01:22:40 2022
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Venta
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Venta
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Venta` DEFAULT CHARACTER SET utf8 ;
USE `Venta` ;

-- -----------------------------------------------------
-- Table `Venta`.`rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`rol` (
  `rol_id` INT NOT NULL,
  `rol_nombre` VARCHAR(45) NOT NULL,
  `rol_estado` CHAR(1) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`rol_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Venta`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`usuario` (
  `usr_codigo` CHAR(3) NOT NULL,
  `usr_nombre` VARCHAR(50) NOT NULL,
  `usr_password` VARCHAR(255) NULL,
  `usr_fullname` VARCHAR(120) NOT NULL,
  `usr_email` VARCHAR(120) NULL,
  `usr_photo` VARCHAR(300) NULL,
  `usr_estado` CHAR(1) NOT NULL DEFAULT 'A',
  `usr_ultima_sesion` DATETIME NULL,
  `usr_agregado` DATETIME NULL,
  `rol_id` INT NULL,
  PRIMARY KEY (`usr_codigo`),
  INDEX `fk_usuario_rol1_idx` (`rol_id` ASC) VISIBLE,
  UNIQUE INDEX `usr_nombre_UNIQUE` (`usr_nombre` ASC) VISIBLE,
  UNIQUE INDEX `usr_codigo_UNIQUE` (`usr_codigo` ASC) VISIBLE,
  CONSTRAINT `fk_usuario_rol1`
    FOREIGN KEY (`rol_id`)
    REFERENCES `Venta`.`rol` (`rol_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Venta`.`clientes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`clientes` (
  `cpr_id` INT NOT NULL,
  `cpr_nombre` VARCHAR(60) NOT NULL,
  `cpr_apellido` VARCHAR(60) NOT NULL,
  `cpr_numdoc` CHAR(13) NOT NULL,
  `cpr_direccion` VARCHAR(200) NULL,
  `cpr_telefono` VARCHAR(9) NULL,
  `cpr_correo` VARCHAR(200) NULL,
  `cpr_fechacreacion` DATETIME NOT NULL,
  PRIMARY KEY (`cpr_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Venta`.`ventas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`ventas` (
  `vta_numped` CHAR(10) NOT NULL,
  `vta_val_neto` DECIMAL(10,2) NOT NULL,
  `vta_fec_ped` DATETIME NULL,
  `vta_est_ped` CHAR(1) NOT NULL,
  `usr_codigo` CHAR(3) NOT NULL,
  `cpr_cliente` INT NULL,
  PRIMARY KEY (`vta_numped`),
  INDEX `fk_ventas_usuario1_idx` (`usr_codigo` ASC) VISIBLE,
  INDEX `fk_ventas_clienteproveedores1_idx` (`cpr_cliente` ASC) VISIBLE,
  CONSTRAINT `fk_ventas_usuario1`
    FOREIGN KEY (`usr_codigo`)
    REFERENCES `Venta`.`usuario` (`usr_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ventas_clienteproveedores1`
    FOREIGN KEY (`cpr_cliente`)
    REFERENCES `Venta`.`clientes` (`cpr_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Venta`.`categoria`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`categoria` (
  `cat_id` INT NOT NULL,
  `cat_nombre` VARCHAR(50) NULL,
  `cat_color` VARCHAR(7) NULL,
  PRIMARY KEY (`cat_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Venta`.`productos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`productos` (
  `prd_codigo` CHAR(6) NOT NULL,
  `prd_nombre` VARCHAR(120) NULL,
  `prd_estado` CHAR(1) NOT NULL,
  `prd_fec_creacion` DATETIME NULL,
  `prd_imagen` VARCHAR(255) NULL,
  `cat_id` INT NULL,
  PRIMARY KEY (`prd_codigo`),
  INDEX `fk_productos_categoria1_idx` (`cat_id` ASC) VISIBLE,
  CONSTRAINT `fk_productos_categoria1`
    FOREIGN KEY (`cat_id`)
    REFERENCES `Venta`.`categoria` (`cat_id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Venta`.`ventas_det`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`ventas_det` (
  `det_prec_prod` DECIMAL(10,2) NULL,
  `det_cantidad` INT NULL,
  `det_prec_total` DECIMAL(10,2) NOT NULL,
  `det_fec_ped` DATETIME NULL,
  `det_est_ped` CHAR(1) NOT NULL,
  `vta_numped` CHAR(10) NOT NULL,
  `prd_codigo` CHAR(6) NOT NULL,
  PRIMARY KEY (`vta_numped`, `prd_codigo`),
  INDEX `fk_venta_det_venta_idx` (`vta_numped` ASC) VISIBLE,
  INDEX `fk_venta_det_producto1_idx` (`prd_codigo` ASC) VISIBLE,
  CONSTRAINT `fk_venta_det_venta`
    FOREIGN KEY (`vta_numped`)
    REFERENCES `Venta`.`ventas` (`vta_numped`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_det_producto1`
    FOREIGN KEY (`prd_codigo`)
    REFERENCES `Venta`.`productos` (`prd_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Venta`.`Producto_det`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`Producto_det` (
  `idProducto_det` INT NOT NULL,
  `Producto_detcol` VARCHAR(45) NULL,
  `dpr_stock` INT NULL,
  `dpr_prec_prod` VARCHAR(45) NULL,
  `dpr_fec_ult_modificacion` VARCHAR(45) NULL,
  `prd_codigo` CHAR(6) NOT NULL,
  PRIMARY KEY (`idProducto_det`, `prd_codigo`),
  INDEX `fk_Producto_det_productos1_idx` (`prd_codigo` ASC) VISIBLE,
  CONSTRAINT `fk_Producto_det_productos1`
    FOREIGN KEY (`prd_codigo`)
    REFERENCES `Venta`.`productos` (`prd_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Venta`.`kardex`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`kardex` (
  `krd_id` INT NOT NULL,
  `krd_stock_inicial` INT NOT NULL,
  `krd_movimiento` INT NOT NULL,
  `krd_stock_final` INT NOT NULL,
  `krd_numdocumento` VARCHAR(45) NOT NULL,
  `prd_codigo` CHAR(6) NOT NULL,
  PRIMARY KEY (`krd_id`),
  INDEX `fk_kardex_productos1_idx` (`prd_codigo` ASC) VISIBLE,
  CONSTRAINT `fk_kardex_productos1`
    FOREIGN KEY (`prd_codigo`)
    REFERENCES `Venta`.`productos` (`prd_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Venta`.`compras`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`compras` (
  `com_numero` INT NOT NULL,
  `com_fec_ped` DATETIME NULL,
  `com_val_neto` DECIMAL(10,2) NOT NULL,
  `com_estado` CHAR(1) NULL,
  PRIMARY KEY (`com_numero`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Venta`.`compras_det`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`compras_det` (
  `cde_prec_prod` DECIMAL(10,2) NULL,
  `cde_cantidad` INT NULL,
  `cde_prec_total` DECIMAL(10,2) NOT NULL,
  `cde_fec_ped` DATETIME NULL,
  `cde_est_ped` CHAR(1) NULL,
  `com_numero` INT NOT NULL,
  `prd_codigo` CHAR(6) NOT NULL,
  PRIMARY KEY (`com_numero`, `prd_codigo`),
  INDEX `fk_compras_det_productos1_idx` (`prd_codigo` ASC) VISIBLE,
  CONSTRAINT `fk_compras_det_compras1`
    FOREIGN KEY (`com_numero`)
    REFERENCES `Venta`.`compras` (`com_numero`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_compras_det_productos1`
    FOREIGN KEY (`prd_codigo`)
    REFERENCES `Venta`.`productos` (`prd_codigo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Venta`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`empresa` (
  `emp_id` INT NOT NULL,
  `emp_nombre` VARCHAR(255) NULL,
  `emp_sector` VARCHAR(100) NULL,
  `emp_tipo` VARCHAR(100) NULL,
  `emp_correo` VARCHAR(200) NULL,
  `emp_telefono` CHAR(9) NULL,
  `emp_logo` VARCHAR(255) NULL,
  `emp_region` VARCHAR(100) NULL,
  `emp_provincia` VARCHAR(100) NULL,
  `emp_distrito` VARCHAR(50) NULL,
  `emp_direccion` VARCHAR(100) NULL,
  PRIMARY KEY (`emp_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `Venta`.`empresa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Venta`.`empresa` (
  `emp_id` INT NOT NULL,
  `emp_nombre` VARCHAR(255) NULL,
  `emp_sector` VARCHAR(100) NULL,
  `emp_tipo` VARCHAR(100) NULL,
  `emp_correo` VARCHAR(200) NULL,
  `emp_telefono` CHAR(9) NULL,
  `emp_logo` VARCHAR(255) NULL,
  `emp_region` VARCHAR(100) NULL,
  `emp_provincia` VARCHAR(100) NULL,
  `emp_distrito` VARCHAR(50) NULL,
  `emp_direccion` VARCHAR(100) NULL,
  PRIMARY KEY (`emp_id`))
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `Venta`.`rol`
-- -----------------------------------------------------
START TRANSACTION;
USE `Venta`;
INSERT INTO `Venta`.`rol` (`rol_id`, `rol_nombre`, `rol_estado`) VALUES (1, 'Administrador', 'A');
INSERT INTO `Venta`.`rol` (`rol_id`, `rol_nombre`, `rol_estado`) VALUES (2, 'Cajero', 'A');
INSERT INTO `Venta`.`rol` (`rol_id`, `rol_nombre`, `rol_estado`) VALUES (3, 'Logistica', 'A');

COMMIT;


-- -----------------------------------------------------
-- Data for table `Venta`.`usuario`
-- -----------------------------------------------------
START TRANSACTION;
USE `Venta`;
INSERT INTO `Venta`.`usuario` (`usr_codigo`, `usr_nombre`, `usr_password`, `usr_fullname`, `usr_email`, `usr_photo`, `usr_estado`, `usr_ultima_sesion`, `usr_agregado`, `rol_id`) VALUES ('001', 'admin', '1234', 'LUIS RAMIREZ', NULL, NULL, 'A', NULL, NULL, 1);
INSERT INTO `Venta`.`usuario` (`usr_codigo`, `usr_nombre`, `usr_password`, `usr_fullname`, `usr_email`, `usr_photo`, `usr_estado`, `usr_ultima_sesion`, `usr_agregado`, `rol_id`) VALUES ('002', 'cajero1', '1234', 'GUSTAVO HUERTA', NULL, NULL, 'A', NULL, NULL, 2);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Venta`.`ventas`
-- -----------------------------------------------------
START TRANSACTION;
USE `Venta`;
INSERT INTO `Venta`.`ventas` (`vta_numped`, `vta_val_neto`, `vta_fec_ped`, `vta_est_ped`, `usr_codigo`, `cpr_cliente`) VALUES ('0000000001', 14.00, NULL, 'A', '002', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Venta`.`categoria`
-- -----------------------------------------------------
START TRANSACTION;
USE `Venta`;
INSERT INTO `Venta`.`categoria` (`cat_id`, `cat_nombre`, `cat_color`) VALUES (1, 'Categoria 1', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Venta`.`productos`
-- -----------------------------------------------------
START TRANSACTION;
USE `Venta`;
INSERT INTO `Venta`.`productos` (`prd_codigo`, `prd_nombre`, `prd_estado`, `prd_fec_creacion`, `prd_imagen`, `cat_id`) VALUES ('P00001', 'Producto 1', 'A', NULL, NULL, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `Venta`.`ventas_det`
-- -----------------------------------------------------
START TRANSACTION;
USE `Venta`;
INSERT INTO `Venta`.`ventas_det` (`det_prec_prod`, `det_cantidad`, `det_prec_total`, `det_fec_ped`, `det_est_ped`, `vta_numped`, `prd_codigo`) VALUES (7.00, 2, 14.0, NULL, 'A', '0000000001', 'P00001');

COMMIT;

