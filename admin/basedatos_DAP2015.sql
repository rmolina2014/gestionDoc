/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.20 : Database - se2015
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`se2015` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `se2015`;

/*Table structure for table `almacen` */

DROP TABLE IF EXISTS `almacen`;

CREATE TABLE `almacen` (
  `id` int(4) NOT NULL AUTO_INCREMENT COMMENT 'numero de registro',
  `nombre` varchar(15) DEFAULT NULL COMMENT 'plano o estanteria',
  `espaciototal` int(4) DEFAULT NULL,
  `unidad` varchar(10) DEFAULT NULL COMMENT 'mcuadrados o metros cubicos',
  `espacioocupado` int(11) DEFAULT NULL,
  `espaciodisponible` int(11) DEFAULT NULL,
  `provincia_id` int(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `almacen` */

insert  into `almacen`(`id`,`nombre`,`espaciototal`,`unidad`,`espacioocupado`,`espaciodisponible`,`provincia_id`) values (1,'Plano',200,'m2',0,50000,1),(2,'Estanteria',400,'m3',0,400,1);

/*Table structure for table `mercaderia` */

DROP TABLE IF EXISTS `mercaderia`;

CREATE TABLE `mercaderia` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(6) DEFAULT NULL,
  `tipomercaderia` varchar(80) DEFAULT NULL,
  `cantidad` int(4) DEFAULT NULL,
  `almacen_id` int(4) DEFAULT NULL,
  `espacio` int(4) DEFAULT NULL,
  `unidad` varchar(25) DEFAULT NULL,
  `fechaingreso` date DEFAULT NULL,
  `fechasalida` date DEFAULT NULL,
  `estado` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `mercaderia` */

insert  into `mercaderia`(`id`,`cliente_id`,`tipomercaderia`,`cantidad`,`almacen_id`,`espacio`,`unidad`,`fechaingreso`,`fechasalida`,`estado`) values (1,0,'tipomercaderia',0,0,0,'unidad','0000-00-00','0000-00-00','estado'),(2,0,'tipomercaderia',0,0,0,'unidad','0000-00-00','0000-00-00','estado'),(3,0,'1',5,1,5,'m2','2016-03-21','2016-03-21','Ingreso'),(4,0,'Bultos',5,1,5,'m2','2016-03-22','2016-03-22','Ingreso'),(5,1260,'Cajas',5,1,5,'m2','2016-03-21','2016-03-21','Ingreso');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
