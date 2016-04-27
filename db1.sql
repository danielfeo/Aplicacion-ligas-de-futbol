/*
SQLyog Ultimate v9.63 
MySQL - 5.5.24-log : Database - equipos1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`equipos1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `equipos1`;

/*Table structure for table `encuentros` */

DROP TABLE IF EXISTS `encuentros`;

CREATE TABLE `encuentros` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_equipo` bigint(20) DEFAULT NULL,
  `id_contrincante` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `encuentros` */

/*Table structure for table `equipo` */

DROP TABLE IF EXISTS `equipo`;

CREATE TABLE `equipo` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nombre` text,
  `imagen` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `equipo` */

insert  into `equipo`(`id`,`nombre`,`imagen`) values (1,'real madrid','escudo.jpg'),(14,'barcelona','b3f29d29c8f1537da640503dc3ea6a23.jpg'),(21,'ESTUDIANTES','ccf906b4547e395738e77ce94bc85ee9.jpg'),(22,'prejuvenil 3 esquinas','bc6ced2b618812a2f071e6f8fc6d8c6f.jpg'),(23,'los montaÃ±eros','3f6aa7d5b04d5a3a827be8beeef32edd.jpg'),(24,'los paisas','e797c34006b06323da06cdf6763c6e9e.jpg'),(25,'los amigos','69f45beae8b3fed208d196c1d2af3c4b.jpg'),(27,'los jaguares','c0bc4e4ff234c082ba47cbb7cc01590a.jpg'),(28,'los pitufos','71beb126bbb252652a9429f1cebbe92c.jpg'),(29,'las comadrejas','07409a16952e24f122092b9d23802ee7.jpg');

/* Procedure structure for procedure `sp_agregar_encuentro` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_agregar_encuentro` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_agregar_encuentro`(in _id_equipo bigint,in _id_contrincante bigint)
BEGIN
		INSERT INTO `equipos`.`encuentros`(`id_equipo`,`id_contrincante`) VALUES (_id_equipo,_id_contrincante);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_agregar_equipo` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_agregar_equipo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_agregar_equipo`(in _nombre text,in _imagen text)
BEGIN
    
INSERT INTO `equipos`.`equipo`(`nombre`,`imagen`) VALUES (_nombre,_imagen);
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_borrar_equipo` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_borrar_equipo` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_borrar_equipo`(in _id BIGINT)
BEGIN
    DELETE FROM `equipos`.`equipo` WHERE `id`=_id;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_cuenta` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_cuenta` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_cuenta`()
BEGIN
SELECT count(id) as cuenta from equipo ;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_encuentros` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_encuentros` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_encuentros`()
BEGIN
SELECT  DISTINCTROW a.nombre AS nom_local,a.imagen AS img_local,b.nombre AS nom_visitante,b.imagen AS img_visitante
    
FROM
    equipo AS a, equipo AS b
    
WHERE a.id <> b.id
ORDER BY a.id asc,b.id ASC;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `sp_limpiar_encuentro` */

/*!50003 DROP PROCEDURE IF EXISTS  `sp_limpiar_encuentro` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_limpiar_encuentro`()
BEGIN
     DELETE FROM `equipos`.`encuentros`;
    END */$$
DELIMITER ;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
