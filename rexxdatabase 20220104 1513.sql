-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.22-rc-community


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema rexx
--

CREATE DATABASE IF NOT EXISTS rexx;
USE rexx;

--
-- Definition of table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `participation_id` int(10) unsigned NOT NULL,
  `employee_name` varchar(45) NOT NULL,
  `employee_mail` varchar(45) NOT NULL,
  `event_id` int(10) unsigned NOT NULL,
  `event_name` varchar(250) NOT NULL,
  `participation_fee` float NOT NULL,
  `event_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

/*!40000 ALTER TABLE `event` DISABLE KEYS */;
INSERT INTO `event` (`participation_id`,`employee_name`,`employee_mail`,`event_id`,`event_name`,`participation_fee`,`event_date`) VALUES 
 (1,'Reto Fanzen','reto.fanzen@no-reply.rexx-systems.com',1,'PHP 7 crash course',0,'2019-09-04'),
 (2,'Reto Fanzen','reto.fanzen@no-reply.rexx-systems.com',2,'International PHP Conference',1485.99,'2019-10-21'),
 (3,'Leandro BuÃŸmann','leandro.bussmann@no-reply.rexx-systems.com',2,'International PHP Conference',657.5,'2019-10-21'),
 (4,'Hans SchÃ¤fer','hans.schaefer@no-reply.rexx-systems.com',1,'PHP 7 crash course',0,'2019-09-04'),
 (5,'Mia Wyss','mia.wyss@no-reply.rexx-systems.com',1,'PHP 7 crash course',0,'2019-09-04'),
 (6,'Mia Wyss','mia.wyss@no-reply.rexx-systems.com',2,'International PHP Conference',657.5,'2019-10-21'),
 (7,'Reto Fanzen','reto.fanzen@no-reply.rexx-systems.com',3,'code.talks',474.81,'2019-10-24'),
 (8,'Hans SchÃ¤fer','hans.schaefer@no-reply.rexx-systems.com',3,'code.talks',534.31,'2019-10-24');
/*!40000 ALTER TABLE `event` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
