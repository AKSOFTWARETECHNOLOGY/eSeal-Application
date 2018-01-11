/*
SQLyog Ultimate v8.82 
MySQL - 5.5.5-10.1.16-MariaDB : Database - eseal_app
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`eseal_app` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `eseal_app`;

/*Table structure for table `brancher_info` */

DROP TABLE IF EXISTS `brancher_info`;

CREATE TABLE `brancher_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `exporter_id` int(10) NOT NULL,
  `name_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `brancher_info` */

insert  into `brancher_info`(`id`,`user_id`,`exporter_id`,`name_person`,`address`,`city`,`state`,`country`,`pincode`,`telephone`,`mobile`,`email`,`photo`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,15,7,'Vimal','Sidco Nagar, Villivakkam',15,31,99,'9841486644','','9841486644','vimal@gmail.com',NULL,1,'User','User','2017-12-15 00:00:00','2017-12-15 00:00:00');

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `city_status` tinyint(4) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `modified_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_country_foreign` (`country`),
  CONSTRAINT `cities_country_foreign` FOREIGN KEY (`country`) REFERENCES `countries` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `cities` */

insert  into `cities`(`id`,`city_name`,`country`,`city_status`,`created_by`,`modified_by`,`created_at`,`updated_at`) values (1,'AHMEDABAD',99,1,'admin','admin',NULL,NULL),(2,'ALLEPPEY',99,1,'admin','admin',NULL,NULL),(3,'ANAND',99,1,'admin','admin',NULL,NULL),(4,'AURANGABAD',99,1,'admin','admin',NULL,NULL),(5,'BACHELI',99,1,'admin','admin',NULL,NULL),(6,'BANGALORE',99,1,'admin','admin',NULL,NULL),(7,'BANNERGHATTA',99,1,'admin','admin',NULL,NULL),(8,'BELLARY',99,1,'admin','admin',NULL,NULL),(9,'BHAVNAGAR',99,1,'admin','admin',NULL,NULL),(10,'BHILAI',99,1,'admin','admin',NULL,NULL),(11,'BHUBANESHWAR',99,1,'admin','admin',NULL,NULL),(12,'BILASPUR',99,1,'admin','admin',NULL,NULL),(13,'CALICUT',99,1,'admin','admin',NULL,NULL),(14,'CHANDIGARH',99,1,'admin','admin',NULL,NULL),(15,'CHENNAI',99,1,'admin','admin',NULL,NULL),(16,'CHITOOR',99,1,'admin','admin',NULL,NULL),(17,'CITY',99,1,'admin','admin',NULL,NULL),(18,'COCHIN',99,1,'admin','admin',NULL,NULL),(19,'COIMBATORE',99,1,'admin','admin',NULL,NULL),(20,'CUTTACK',99,1,'admin','admin',NULL,NULL),(21,'DAVANGREE',99,1,'admin','admin',NULL,NULL),(22,'DEHRADUN',99,1,'admin','admin',NULL,NULL),(23,'DURGAPUR',99,1,'admin','admin',NULL,NULL),(24,'ERNAKULAM',99,1,'admin','admin',NULL,NULL),(25,'ERODE',99,1,'admin','admin',NULL,NULL),(26,'FARIDABAD',99,1,'admin','admin',NULL,NULL),(27,'GHAZIABAD',99,1,'admin','admin',NULL,NULL),(28,'GOA',99,1,'admin','admin',NULL,NULL),(29,'GORAKHPUR',99,1,'admin','admin',NULL,NULL),(30,'GULBARGA',99,1,'admin','admin',NULL,NULL),(31,'GURGAON',99,1,'admin','admin',NULL,NULL),(32,'HARIDWAR',99,1,'admin','admin',NULL,NULL),(33,'HUBLI',99,1,'admin','admin',NULL,NULL),(34,'HYDERABAD',99,1,'admin','admin',NULL,NULL),(35,'INDORE',99,1,'admin','admin',NULL,NULL),(36,'JAIPUR',99,1,'admin','admin',NULL,NULL),(37,'JALANDHAR',99,1,'admin','admin',NULL,NULL),(38,'JAMNAGAR',99,1,'admin','admin',NULL,NULL),(39,'KAKINADA',99,1,'admin','admin',NULL,NULL),(40,'KANCHEEPURAM',99,1,'admin','admin',NULL,NULL),(41,'KANNUR',99,1,'admin','admin',NULL,NULL),(42,'KARAIKUDI',99,1,'admin','admin',NULL,NULL),(43,'KARIMNAGAR',99,1,'admin','admin',NULL,NULL),(44,'KARNATAKA',99,1,'admin','admin',NULL,NULL),(45,'KARUR',99,1,'admin','admin',NULL,NULL),(46,'KOCHI',99,1,'admin','admin',NULL,NULL),(47,'KOLHAPUR',99,1,'admin','admin',NULL,NULL),(48,'KOLKATA',99,1,'admin','admin',NULL,NULL),(49,'KOLLAM',99,1,'admin','admin',NULL,NULL),(50,'KOTTAYAM',99,1,'admin','admin',NULL,NULL),(51,'KOVALAM',99,1,'admin','admin',NULL,NULL),(52,'KOZHENCHERRY',99,1,'admin','admin',NULL,NULL),(53,'KOZHIKODE',99,1,'admin','admin',NULL,NULL),(54,'KRISHNAGIRI',99,1,'admin','admin',NULL,NULL),(55,'LUCKNOW',99,1,'admin','admin',NULL,NULL),(56,'LUDHIANA',99,1,'admin','admin',NULL,NULL),(57,'MADURAI',99,1,'admin','admin',NULL,NULL),(58,'MALAKPET',99,1,'admin','admin',NULL,NULL),(59,'MALAPPURAM',99,1,'admin','admin',NULL,NULL),(60,'MANGALORE',99,1,'admin','admin',NULL,NULL),(61,'MARGAO',99,1,'admin','admin',NULL,NULL),(62,'MEERUT',99,1,'admin','admin',NULL,NULL),(63,'MOHALI',99,1,'admin','admin',NULL,NULL),(64,'MUMBAI',99,1,'admin','admin',NULL,NULL),(65,'MYSORE',99,1,'admin','admin',NULL,NULL),(66,'NAGPUR',99,1,'admin','admin',NULL,NULL),(67,'NASHIK',99,1,'admin','admin',NULL,NULL),(68,'NAVI MUMBAI',99,1,'admin','admin',NULL,NULL),(69,'NEDUMBASSERY',99,1,'admin','admin',NULL,NULL),(70,'NELLORE',99,1,'admin','admin',NULL,NULL),(71,'NEW DELHI',99,1,'admin','admin',NULL,NULL),(72,'NOIDA',99,1,'admin','admin',NULL,NULL),(73,'ONGOLE',99,1,'admin','admin',NULL,NULL),(74,'PALAKKAD',99,1,'admin','admin',NULL,NULL),(75,'PALANI',99,1,'admin','admin',NULL,NULL),(76,'PANAJI',99,1,'admin','admin',NULL,NULL),(77,'PANCHKULA',99,1,'admin','admin',NULL,NULL),(78,'PATHANAMTHITTA',99,1,'admin','admin',NULL,NULL),(79,'PATIALA',99,1,'admin','admin',NULL,NULL),(80,'PITAMPURA',99,1,'admin','admin',NULL,NULL),(81,'PONDICHERRY',99,1,'admin','admin',NULL,NULL),(82,'PORDENONE',99,1,'admin','admin',NULL,NULL),(83,'PUDUKKOTAI',99,1,'admin','admin',NULL,NULL),(84,'PUNE',99,1,'admin','admin',NULL,NULL),(85,'RAIPUR',99,1,'admin','admin',NULL,NULL),(86,'RAJAHMUNDRY',99,1,'admin','admin',NULL,NULL),(87,'RANCHI',99,1,'admin','admin',NULL,NULL),(88,'RANIPET',99,1,'admin','admin',NULL,NULL),(89,'REWARI',99,1,'admin','admin',NULL,NULL),(90,'ROHINI',99,1,'admin','admin',NULL,NULL),(91,'SALEM',99,1,'admin','admin',NULL,NULL),(92,'SALT LAKE',99,1,'admin','admin',NULL,NULL),(93,'SECUNDERABAD',99,1,'admin','admin',NULL,NULL),(94,'SHIMOGA',99,1,'admin','admin',NULL,NULL),(95,'SIVAKASI',99,1,'admin','admin',NULL,NULL),(96,'SOMAJIGUDA',99,1,'admin','admin',NULL,NULL),(97,'SURAT',99,1,'admin','admin',NULL,NULL),(98,'THANE',99,1,'admin','admin',NULL,NULL),(99,'THIRUVANANTHAPURAM',99,1,'admin','admin',NULL,NULL),(100,'THRISSUR',99,1,'admin','admin',NULL,NULL),(101,'TIRUPATI',99,1,'admin','admin',NULL,NULL),(102,'TIRUVANNAMALAI',99,1,'admin','admin',NULL,NULL),(103,'TRICHY',99,1,'admin','admin',NULL,NULL),(104,'TRIVANDRAM',99,1,'admin','admin',NULL,NULL),(105,'TUMKUR',99,1,'admin','admin',NULL,NULL),(106,'TUTICORIN',99,1,'admin','admin',NULL,NULL),(107,'VADODRA',99,1,'admin','admin',NULL,NULL),(108,'VARANASI',99,1,'admin','admin',NULL,NULL),(109,'VELLORE',99,1,'admin','admin',NULL,NULL),(110,'VIJAYAWADA',99,1,'admin','admin',NULL,NULL),(111,'VISHAKHAPATNAM',99,1,'admin','admin',NULL,NULL);

/*Table structure for table `complaint_enquiry` */

DROP TABLE IF EXISTS `complaint_enquiry`;

CREATE TABLE `complaint_enquiry` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(10) unsigned DEFAULT NULL,
  `receiver_id` int(10) unsigned DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text,
  `enquiry_id` int(10) DEFAULT NULL,
  `read_status` tinyint(10) DEFAULT '0',
  `complaint_status` tinyint(4) DEFAULT '1',
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `complaint_enquiry` */

insert  into `complaint_enquiry`(`id`,`sender_id`,`receiver_id`,`subject`,`message`,`enquiry_id`,`read_status`,`complaint_status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,7,2,'demo','demo',0,1,1,'User','EXP One India','2018-01-03 23:34:53','2018-01-03 00:00:00'),(2,7,2,'sample','sample demo',0,1,1,'User','EXP One India','2018-01-03 21:03:58','2018-01-03 00:00:00'),(4,2,7,'demo','reply message',1,0,1,'User','User','2017-12-18 17:22:57','2017-12-18 00:00:00'),(6,7,2,'demo','sdfsdgsdg',1,0,1,'User','User','2017-12-18 18:02:29','2017-12-18 00:00:00'),(7,2,7,'demo','NONE',1,0,1,'User','User','2017-12-18 00:00:00','2017-12-18 00:00:00'),(8,2,7,'demo','21122017',1,0,1,'User','User','2017-12-21 00:00:00','2017-12-21 00:00:00'),(9,2,7,'demo','121212',1,0,1,'User','User','2017-12-21 00:00:00','2017-12-21 00:00:00'),(10,2,7,'sample','NONE',2,0,1,'User','User','2017-12-21 00:00:00','2017-12-21 00:00:00'),(11,2,7,'sample','reply',2,0,1,'User','User','2017-12-22 00:00:00','2017-12-22 00:00:00'),(12,7,2,'sample','HI',2,0,1,'User','User','2018-01-03 00:00:00','2018-01-03 00:00:00');

/*Table structure for table `countries` */

DROP TABLE IF EXISTS `countries`;

CREATE TABLE `countries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phonecode` int(11) NOT NULL,
  `country_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=240 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `countries` */

insert  into `countries`(`id`,`code`,`name`,`phonecode`,`country_status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'AF','AFGHANISTAN',93,1,'Admin','Admin',NULL,NULL),(2,'AL','ALBANIA',355,1,'Admin','Admin',NULL,NULL),(3,'DZ','ALGERIA',213,1,'Admin','Admin',NULL,NULL),(4,'AS','AMERICAN SAMOA',1684,1,'Admin','Admin',NULL,NULL),(5,'AD','ANDORRA',376,1,'Admin','Admin',NULL,NULL),(6,'AO','ANGOLA',244,1,'Admin','Admin',NULL,NULL),(7,'AI','ANGUILLA',1264,1,'Admin','Admin',NULL,NULL),(8,'AQ','ANTARCTICA',0,1,'Admin','Admin',NULL,NULL),(9,'AG','ANTIGUA AND BARBUDA',1268,1,'Admin','Admin',NULL,NULL),(10,'AR','ARGENTINA',54,1,'Admin','Admin',NULL,NULL),(11,'AM','ARMENIA',374,1,'Admin','Admin',NULL,NULL),(12,'AW','ARUBA',297,1,'Admin','Admin',NULL,NULL),(13,'AU','AUSTRALIA',61,1,'Admin','Admin',NULL,NULL),(14,'AT','AUSTRIA',43,1,'Admin','Admin',NULL,NULL),(15,'AZ','AZERBAIJAN',994,1,'Admin','Admin',NULL,NULL),(16,'BS','BAHAMAS',1242,1,'Admin','Admin',NULL,NULL),(17,'BH','BAHRAIN',973,1,'Admin','Admin',NULL,NULL),(18,'BD','BANGLADESH',880,1,'Admin','Admin',NULL,NULL),(19,'BB','BARBADOS',1246,1,'Admin','Admin',NULL,NULL),(20,'BY','BELARUS',375,1,'Admin','Admin',NULL,NULL),(21,'BE','BELGIUM',32,1,'Admin','Admin',NULL,NULL),(22,'BZ','BELIZE',501,1,'Admin','Admin',NULL,NULL),(23,'BJ','BENIN',229,1,'Admin','Admin',NULL,NULL),(24,'BM','BERMUDA',1441,1,'Admin','Admin',NULL,NULL),(25,'BT','BHUTAN',975,1,'Admin','Admin',NULL,NULL),(26,'BO','BOLIVIA',591,1,'Admin','Admin',NULL,NULL),(27,'BA','BOSNIA AND HERZEGOVINA',387,1,'Admin','Admin',NULL,NULL),(28,'BW','BOTSWANA',267,1,'Admin','Admin',NULL,NULL),(29,'BV','BOUVET ISLAND',0,1,'Admin','Admin',NULL,NULL),(30,'BR','BRAZIL',55,1,'Admin','Admin',NULL,NULL),(31,'IO','BRITISH INDIAN OCEAN TERRITORY',246,1,'Admin','Admin',NULL,NULL),(32,'BN','BRUNEI DARUSSALAM',673,1,'Admin','Admin',NULL,NULL),(33,'BG','BULGARIA',359,1,'Admin','Admin',NULL,NULL),(34,'BF','BURKINA FASO',226,1,'Admin','Admin',NULL,NULL),(35,'BI','BURUNDI',257,1,'Admin','Admin',NULL,NULL),(36,'KH','CAMBODIA',855,1,'Admin','Admin',NULL,NULL),(37,'CM','CAMEROON',237,1,'Admin','Admin',NULL,NULL),(38,'CA','CANADA',1,1,'Admin','Admin',NULL,NULL),(39,'CV','CAPE VERDE',238,1,'Admin','Admin',NULL,NULL),(40,'KY','CAYMAN ISLANDS',1345,1,'Admin','Admin',NULL,NULL),(41,'CF','CENTRAL AFRICAN REPUBLIC',236,1,'Admin','Admin',NULL,NULL),(42,'TD','CHAD',235,1,'Admin','Admin',NULL,NULL),(43,'CL','CHILE',56,1,'Admin','Admin',NULL,NULL),(44,'CN','CHINA',86,1,'Admin','Admin',NULL,NULL),(45,'CX','CHRISTMAS ISLAND',61,1,'Admin','Admin',NULL,NULL),(46,'CC','COCOS (KEELING) ISLANDS',672,1,'Admin','Admin',NULL,NULL),(47,'CO','COLOMBIA',57,1,'Admin','Admin',NULL,NULL),(48,'KM','COMOROS',269,1,'Admin','Admin',NULL,NULL),(49,'CG','CONGO',242,1,'Admin','Admin',NULL,NULL),(50,'CD','CONGO, THE DEMOCRATIC REPUBLIC OF THE',242,1,'Admin','Admin',NULL,NULL),(51,'CK','COOK ISLANDS',682,1,'Admin','Admin',NULL,NULL),(52,'CR','COSTA RICA',506,1,'Admin','Admin',NULL,NULL),(53,'CI','COTE D\'IVOIRE',225,1,'Admin','Admin',NULL,NULL),(54,'HR','CROATIA',385,1,'Admin','Admin',NULL,NULL),(55,'CU','CUBA',53,1,'Admin','Admin',NULL,NULL),(56,'CY','CYPRUS',357,1,'Admin','Admin',NULL,NULL),(57,'CZ','CZECH REPUBLIC',420,1,'Admin','Admin',NULL,NULL),(58,'DK','DENMARK',45,1,'Admin','Admin',NULL,NULL),(59,'DJ','DJIBOUTI',253,1,'Admin','Admin',NULL,NULL),(60,'DM','DOMINICA',1767,1,'Admin','Admin',NULL,NULL),(61,'DO','DOMINICAN REPUBLIC',1809,1,'Admin','Admin',NULL,NULL),(62,'EC','ECUADOR',593,1,'Admin','Admin',NULL,NULL),(63,'EG','EGYPT',20,1,'Admin','Admin',NULL,NULL),(64,'SV','EL SALVADOR',503,1,'Admin','Admin',NULL,NULL),(65,'GQ','EQUATORIAL GUINEA',240,1,'Admin','Admin',NULL,NULL),(66,'ER','ERITREA',291,1,'Admin','Admin',NULL,NULL),(67,'EE','ESTONIA',372,1,'Admin','Admin',NULL,NULL),(68,'ET','ETHIOPIA',251,1,'Admin','Admin',NULL,NULL),(69,'FK','FALKLAND ISLANDS (MALVINAS)',500,1,'Admin','Admin',NULL,NULL),(70,'FO','FAROE ISLANDS',298,1,'Admin','Admin',NULL,NULL),(71,'FJ','FIJI',679,1,'Admin','Admin',NULL,NULL),(72,'FI','FINLAND',358,1,'Admin','Admin',NULL,NULL),(73,'FR','FRANCE',33,1,'Admin','Admin',NULL,NULL),(74,'GF','FRENCH GUIANA',594,1,'Admin','Admin',NULL,NULL),(75,'PF','FRENCH POLYNESIA',689,1,'Admin','Admin',NULL,NULL),(76,'TF','FRENCH SOUTHERN TERRITORIES',0,1,'Admin','Admin',NULL,NULL),(77,'GA','GABON',241,1,'Admin','Admin',NULL,NULL),(78,'GM','GAMBIA',220,1,'Admin','Admin',NULL,NULL),(79,'GE','GEORGIA',995,1,'Admin','Admin',NULL,NULL),(80,'DE','GERMANY',49,1,'Admin','Admin',NULL,NULL),(81,'GH','GHANA',233,1,'Admin','Admin',NULL,NULL),(82,'GI','GIBRALTAR',350,1,'Admin','Admin',NULL,NULL),(83,'GR','GREECE',30,1,'Admin','Admin',NULL,NULL),(84,'GL','GREENLAND',299,1,'Admin','Admin',NULL,NULL),(85,'GD','GRENADA',1473,1,'Admin','Admin',NULL,NULL),(86,'GP','GUADELOUPE',590,1,'Admin','Admin',NULL,NULL),(87,'GU','GUAM',1671,1,'Admin','Admin',NULL,NULL),(88,'GT','GUATEMALA',502,1,'Admin','Admin',NULL,NULL),(89,'GN','GUINEA',224,1,'Admin','Admin',NULL,NULL),(90,'GW','GUINEA-BISSAU',245,1,'Admin','Admin',NULL,NULL),(91,'GY','GUYANA',592,1,'Admin','Admin',NULL,NULL),(92,'HT','HAITI',509,1,'Admin','Admin',NULL,NULL),(93,'HM','HEARD ISLAND AND MCDONALD ISLANDS',0,1,'Admin','Admin',NULL,NULL),(94,'VA','HOLY SEE (VATICAN CITY STATE)',39,1,'Admin','Admin',NULL,NULL),(95,'HN','HONDURAS',504,1,'Admin','Admin',NULL,NULL),(96,'HK','HONG KONG',852,1,'Admin','Admin',NULL,NULL),(97,'HU','HUNGARY',36,1,'Admin','Admin',NULL,NULL),(98,'IS','ICELAND',354,1,'Admin','Admin',NULL,NULL),(99,'IN','INDIA',91,1,'Admin','Admin',NULL,NULL),(100,'ID','INDONESIA',62,1,'Admin','Admin',NULL,NULL),(101,'IR','IRAN, ISLAMIC REPUBLIC OF',98,1,'Admin','Admin',NULL,NULL),(102,'IQ','IRAQ',964,1,'Admin','Admin',NULL,NULL),(103,'IE','IRELAND',353,1,'Admin','Admin',NULL,NULL),(104,'IL','ISRAEL',972,1,'Admin','Admin',NULL,NULL),(105,'IT','ITALY',39,1,'Admin','Admin',NULL,NULL),(106,'JM','JAMAICA',1876,1,'Admin','Admin',NULL,NULL),(107,'JP','JAPAN',81,1,'Admin','Admin',NULL,NULL),(108,'JO','JORDAN',962,1,'Admin','Admin',NULL,NULL),(109,'KZ','KAZAKHSTAN',7,1,'Admin','Admin',NULL,NULL),(110,'KE','KENYA',254,1,'Admin','Admin',NULL,NULL),(111,'KI','KIRIBATI',686,1,'Admin','Admin',NULL,NULL),(112,'KP','KOREA, DEMOCRATIC PEOPLE\'S REPUBLIC OF',850,1,'Admin','Admin',NULL,NULL),(113,'KR','KOREA, REPUBLIC OF',82,1,'Admin','Admin',NULL,NULL),(114,'KW','KUWAIT',965,1,'Admin','Admin',NULL,NULL),(115,'KG','KYRGYZSTAN',996,1,'Admin','Admin',NULL,NULL),(116,'LA','LAO PEOPLE\'S DEMOCRATIC REPUBLIC',856,1,'Admin','Admin',NULL,NULL),(117,'LV','LATVIA',371,1,'Admin','Admin',NULL,NULL),(118,'LB','LEBANON',961,1,'Admin','Admin',NULL,NULL),(119,'LS','LESOTHO',266,1,'Admin','Admin',NULL,NULL),(120,'LR','LIBERIA',231,1,'Admin','Admin',NULL,NULL),(121,'LY','LIBYAN ARAB JAMAHIRIYA',218,1,'Admin','Admin',NULL,NULL),(122,'LI','LIECHTENSTEIN',423,1,'Admin','Admin',NULL,NULL),(123,'LT','LITHUANIA',370,1,'Admin','Admin',NULL,NULL),(124,'LU','LUXEMBOURG',352,1,'Admin','Admin',NULL,NULL),(125,'MO','MACAO',853,1,'Admin','Admin',NULL,NULL),(126,'MK','MACEDONIA, THE FORMER YUGOSLAV REPUBLIC OF',389,1,'Admin','Admin',NULL,NULL),(127,'MG','MADAGASCAR',261,1,'Admin','Admin',NULL,NULL),(128,'MW','MALAWI',265,1,'Admin','Admin',NULL,NULL),(129,'MY','MALAYSIA',60,1,'Admin','Admin',NULL,NULL),(130,'MV','MALDIVES',960,1,'Admin','Admin',NULL,NULL),(131,'ML','MALI',223,1,'Admin','Admin',NULL,NULL),(132,'MT','MALTA',356,1,'Admin','Admin',NULL,NULL),(133,'MH','MARSHALL ISLANDS',692,1,'Admin','Admin',NULL,NULL),(134,'MQ','MARTINIQUE',596,1,'Admin','Admin',NULL,NULL),(135,'MR','MAURITANIA',222,1,'Admin','Admin',NULL,NULL),(136,'MU','MAURITIUS',230,1,'Admin','Admin',NULL,NULL),(137,'YT','MAYOTTE',269,1,'Admin','Admin',NULL,NULL),(138,'MX','MEXICO',52,1,'Admin','Admin',NULL,NULL),(139,'FM','MICRONESIA, FEDERATED STATES OF',691,1,'Admin','Admin',NULL,NULL),(140,'MD','MOLDOVA, REPUBLIC OF',373,1,'Admin','Admin',NULL,NULL),(141,'MC','MONACO',377,1,'Admin','Admin',NULL,NULL),(142,'MN','MONGOLIA',976,1,'Admin','Admin',NULL,NULL),(143,'MS','MONTSERRAT',1664,1,'Admin','Admin',NULL,NULL),(144,'MA','MOROCCO',212,1,'Admin','Admin',NULL,NULL),(145,'MZ','MOZAMBIQUE',258,1,'Admin','Admin',NULL,NULL),(146,'MM','MYANMAR',95,1,'Admin','Admin',NULL,NULL),(147,'NA','NAMIBIA',264,1,'Admin','Admin',NULL,NULL),(148,'NR','NAURU',674,1,'Admin','Admin',NULL,NULL),(149,'NP','NEPAL',977,1,'Admin','Admin',NULL,NULL),(150,'NL','NETHERLANDS',31,1,'Admin','Admin',NULL,NULL),(151,'AN','NETHERLANDS ANTILLES',599,1,'Admin','Admin',NULL,NULL),(152,'NC','NEW CALEDONIA',687,1,'Admin','Admin',NULL,NULL),(153,'NZ','NEW ZEALAND',64,1,'Admin','Admin',NULL,NULL),(154,'NI','NICARAGUA',505,1,'Admin','Admin',NULL,NULL),(155,'NE','NIGER',227,1,'Admin','Admin',NULL,NULL),(156,'NG','NIGERIA',234,1,'Admin','Admin',NULL,NULL),(157,'NU','NIUE',683,1,'Admin','Admin',NULL,NULL),(158,'NF','NORFOLK ISLAND',672,1,'Admin','Admin',NULL,NULL),(159,'MP','NORTHERN MARIANA ISLANDS',1670,1,'Admin','Admin',NULL,NULL),(160,'NO','NORWAY',47,1,'Admin','Admin',NULL,NULL),(161,'OM','OMAN',968,1,'Admin','Admin',NULL,NULL),(162,'PK','PAKISTAN',92,1,'Admin','Admin',NULL,NULL),(163,'PW','PALAU',680,1,'Admin','Admin',NULL,NULL),(164,'PS','PALESTINIAN TERRITORY, OCCUPIED',970,1,'Admin','Admin',NULL,NULL),(165,'PA','PANAMA',507,1,'Admin','Admin',NULL,NULL),(166,'PG','PAPUA NEW GUINEA',675,1,'Admin','Admin',NULL,NULL),(167,'PY','PARAGUAY',595,1,'Admin','Admin',NULL,NULL),(168,'PE','PERU',51,1,'Admin','Admin',NULL,NULL),(169,'PH','PHILIPPINES',63,1,'Admin','Admin',NULL,NULL),(170,'PN','PITCAIRN',0,1,'Admin','Admin',NULL,NULL),(171,'PL','POLAND',48,1,'Admin','Admin',NULL,NULL),(172,'PT','PORTUGAL',351,1,'Admin','Admin',NULL,NULL),(173,'PR','PUERTO RICO',1787,1,'Admin','Admin',NULL,NULL),(174,'QA','QATAR',974,1,'Admin','Admin',NULL,NULL),(175,'RE','REUNION',262,1,'Admin','Admin',NULL,NULL),(176,'RO','ROMANIA',40,1,'Admin','Admin',NULL,NULL),(177,'RU','RUSSIAN FEDERATION',70,1,'Admin','Admin',NULL,NULL),(178,'RW','RWANDA',250,1,'Admin','Admin',NULL,NULL),(179,'SH','SAINT HELENA',290,1,'Admin','Admin',NULL,NULL),(180,'KN','SAINT KITTS AND NEVIS',1869,1,'Admin','Admin',NULL,NULL),(181,'LC','SAINT LUCIA',1758,1,'Admin','Admin',NULL,NULL),(182,'PM','SAINT PIERRE AND MIQUELON',508,1,'Admin','Admin',NULL,NULL),(183,'VC','SAINT VINCENT AND THE GRENADINES',1784,1,'Admin','Admin',NULL,NULL),(184,'WS','SAMOA',684,1,'Admin','Admin',NULL,NULL),(185,'SM','SAN MARINO',378,1,'Admin','Admin',NULL,NULL),(186,'ST','SAO TOME AND PRINCIPE',239,1,'Admin','Admin',NULL,NULL),(187,'SA','SAUDI ARABIA',966,1,'Admin','Admin',NULL,NULL),(188,'SN','SENEGAL',221,1,'Admin','Admin',NULL,NULL),(189,'CS','SERBIA AND MONTENEGRO',381,1,'Admin','Admin',NULL,NULL),(190,'SC','SEYCHELLES',248,1,'Admin','Admin',NULL,NULL),(191,'SL','SIERRA LEONE',232,1,'Admin','Admin',NULL,NULL),(192,'SG','SINGAPORE',65,1,'Admin','Admin',NULL,NULL),(193,'SK','SLOVAKIA',421,1,'Admin','Admin',NULL,NULL),(194,'SI','SLOVENIA',386,1,'Admin','Admin',NULL,NULL),(195,'SB','SOLOMON ISLANDS',677,1,'Admin','Admin',NULL,NULL),(196,'SO','SOMALIA',252,1,'Admin','Admin',NULL,NULL),(197,'ZA','SOUTH AFRICA',27,1,'Admin','Admin',NULL,NULL),(198,'GS','SOUTH GEORGIA AND THE SOUTH SANDWICH ISLANDS',0,1,'Admin','Admin',NULL,NULL),(199,'ES','SPAIN',34,1,'Admin','Admin',NULL,NULL),(200,'LK','SRI LANKA',94,1,'Admin','Admin',NULL,NULL),(201,'SD','SUDAN',249,1,'Admin','Admin',NULL,NULL),(202,'SR','SURINAME',597,1,'Admin','Admin',NULL,NULL),(203,'SJ','SVALBARD AND JAN MAYEN',47,1,'Admin','Admin',NULL,NULL),(204,'SZ','SWAZILAND',268,1,'Admin','Admin',NULL,NULL),(205,'SE','SWEDEN',46,1,'Admin','Admin',NULL,NULL),(206,'CH','SWITZERLAND',41,1,'Admin','Admin',NULL,NULL),(207,'SY','SYRIAN ARAB REPUBLIC',963,1,'Admin','Admin',NULL,NULL),(208,'TW','TAIWAN, PROVINCE OF CHINA',886,1,'Admin','Admin',NULL,NULL),(209,'TJ','TAJIKISTAN',992,1,'Admin','Admin',NULL,NULL),(210,'TZ','TANZANIA, UNITED REPUBLIC OF',255,1,'Admin','Admin',NULL,NULL),(211,'TH','THAILAND',66,1,'Admin','Admin',NULL,NULL),(212,'TL','TIMOR-LESTE',670,1,'Admin','Admin',NULL,NULL),(213,'TG','TOGO',228,1,'Admin','Admin',NULL,NULL),(214,'TK','TOKELAU',690,1,'Admin','Admin',NULL,NULL),(215,'TO','TONGA',676,1,'Admin','Admin',NULL,NULL),(216,'TT','TRINIDAD AND TOBAGO',1868,1,'Admin','Admin',NULL,NULL),(217,'TN','TUNISIA',216,1,'Admin','Admin',NULL,NULL),(218,'TR','TURKEY',90,1,'Admin','Admin',NULL,NULL),(219,'TM','TURKMENISTAN',7370,1,'Admin','Admin',NULL,NULL),(220,'TC','TURKS AND CAICOS ISLANDS',1649,1,'Admin','Admin',NULL,NULL),(221,'TV','TUVALU',688,1,'Admin','Admin',NULL,NULL),(222,'UG','UGANDA',256,1,'Admin','Admin',NULL,NULL),(223,'UA','UKRAINE',380,1,'Admin','Admin',NULL,NULL),(224,'AE','UNITED ARAB EMIRATES',971,1,'Admin','Admin',NULL,NULL),(225,'GB','UNITED KINGDOM',44,1,'Admin','Admin',NULL,NULL),(226,'US','UNITED STATES',1,1,'Admin','Admin',NULL,NULL),(227,'UM','UNITED STATES MINOR OUTLYING ISLANDS',1,1,'Admin','Admin',NULL,NULL),(228,'UY','URUGUAY',598,1,'Admin','Admin',NULL,NULL),(229,'UZ','UZBEKISTAN',998,1,'Admin','Admin',NULL,NULL),(230,'VU','VANUATU',678,1,'Admin','Admin',NULL,NULL),(231,'VE','VENEZUELA',58,1,'Admin','Admin',NULL,NULL),(232,'VN','VIET NAM',84,1,'Admin','Admin',NULL,NULL),(233,'VG','VIRGIN ISLANDS, BRITISH',1284,1,'Admin','Admin',NULL,NULL),(234,'VI','VIRGIN ISLANDS, U.S.',1340,1,'Admin','Admin',NULL,NULL),(235,'WF','WALLIS AND FUTUNA',681,1,'Admin','Admin',NULL,NULL),(236,'EH','WESTERN SAHARA',212,1,'Admin','Admin',NULL,NULL),(237,'YE','YEMEN',967,1,'Admin','Admin',NULL,NULL),(238,'ZM','ZAMBIA',260,1,'Admin','Admin',NULL,NULL),(239,'ZW','ZIMBABWE',263,1,'Admin','Admin',NULL,NULL);

/*Table structure for table `customs_info` */

DROP TABLE IF EXISTS `customs_info`;

CREATE TABLE `customs_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name_customs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `port` int(10) DEFAULT NULL,
  `terminal` int(10) DEFAULT NULL,
  `customs_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `customs_info` */

insert  into `customs_info`(`id`,`user_id`,`name_customs`,`address`,`city`,`state`,`country`,`pincode`,`telephone`,`mobile`,`email`,`port`,`terminal`,`customs_code`,`photo`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,13,'CHENNAI CUSTOMS','CHENNAI',15,31,99,NULL,'','','customschennai@gmail.com',1,3,'INC123456','','vendor','vendor','2017-12-14 00:00:00','2017-12-22 00:00:00');

/*Table structure for table `eseal_attachment` */

DROP TABLE IF EXISTS `eseal_attachment`;

CREATE TABLE `eseal_attachment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eseal_id` int(11) DEFAULT NULL,
  `eseal_attachment_name` varchar(255) DEFAULT NULL,
  `eseal_attachment_path` text,
  `eseal_attachment_status` int(11) DEFAULT '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `eseal_attachment` */

insert  into `eseal_attachment`(`id`,`eseal_id`,`eseal_attachment_name`,`eseal_attachment_path`,`eseal_attachment_status`) values (1,63,'eseal1','multiple_image_upload/uploads/a65f1d5d66d6f0d03dac9ee169c8da67.jpg',1),(2,64,'delivery-truck','multiple_image_upload/uploads/735b82bd28e0adc6023bddc8a9416c46.png',1),(3,64,'eseal-product','multiple_image_upload/uploads/735b82bd28e0adc6023bddc8a9416c46.png8b3ebe64b458f8f55c84f3819ee02455.png',1),(4,1,'CP-Plus-CP-NVK-70M1-SDL575134404-1-31836','multiple_image_upload/uploads/78463a7cdac75de4d89280cb1ee520c6.jpg',1),(5,1,'Land-Notice','multiple_image_upload/uploads/78463a7cdac75de4d89280cb1ee520c6.jpg8e12208fb420660bf0918e10a151e748.pdf',0),(6,2,'Land-Notice','multiple_image_upload/uploads/c0042df98971830932c1e7c80c9b0d9f.pdf',1),(7,2,'Land-Serv-1','multiple_image_upload/uploads/c0042df98971830932c1e7c80c9b0d9f.pdff1690db5a9a9597fd65d7482df0a6191.png',1),(8,2,'Land-Serv-2','multiple_image_upload/uploads/4876825ef9ba9d3111598b18afd3747f.png',1),(9,1,'Customs Admin Panel','multiple_image_upload/uploads/bd214dc66b05c75688f8262a308ba516.csv',0);

/*Table structure for table `exporter_address` */

DROP TABLE IF EXISTS `exporter_address`;

CREATE TABLE `exporter_address` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) unsigned NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `exporter_address` */

insert  into `exporter_address`(`id`,`user_id`,`name`,`address`,`city`,`state`,`country`,`pincode`,`mobile`,`status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (3,8,'Alagirivimal Kottaimuthu','Villivakkam',15,31,99,'600049','',1,'User','User','2017-12-09 00:00:00','2017-12-09 00:00:00'),(4,9,'SASIKALA','VIllivakkam',15,31,99,'600049','',1,'User','User','2017-12-09 00:00:00','2017-12-09 00:00:00'),(5,10,'Kishore','Chetpet',15,31,99,'600031','',1,'User','User','2017-12-10 00:00:00','2017-12-10 00:00:00'),(6,11,'KRISHNAN','ANNA NAGAR',15,31,99,'600040','9845698456',1,'User','User','2017-12-10 00:00:00','2017-12-10 00:00:00'),(7,12,'AMMA','MADURAI',57,31,99,'625221','',1,'vendor','vendor','2017-12-11 00:00:00','2017-12-11 00:00:00'),(8,7,'Kishore','Villivakkam ',15,31,99,'600049','9898989898',1,'User','User','2017-12-11 00:00:00','2017-12-11 00:00:00'),(9,7,'Alagirivimal','Sidco Nagar, Villivakkam',15,31,99,'600049','9841486644',1,'User','User','2017-12-15 00:00:00','2017-12-15 00:00:00'),(10,7,'Ramkumar','No :: 10, Ramapuram',15,31,99,'600030','9841498844',1,'User','User','2017-12-24 00:00:00','2017-12-24 00:00:00'),(11,17,'Raji','Tiruvottiyur',15,31,99,'600019','',1,'vendor','vendor','2017-12-29 00:00:00','2017-12-29 00:00:00');

/*Table structure for table `exporter_info` */

DROP TABLE IF EXISTS `exporter_info`;

CREATE TABLE `exporter_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name_exporter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gstin` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pan_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `iec_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `iec_code` (`iec_code`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `exporter_info` */

insert  into `exporter_info`(`id`,`user_id`,`name_exporter`,`name_person`,`address`,`city`,`state`,`country`,`pincode`,`telephone`,`mobile`,`email`,`gstin`,`pan_number`,`iec_code`,`photo`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (2,7,'EXP One India','Alagirivimal','Annanagar',15,31,99,'600040','04444444444','9898989898','alagirivimal@gmail.com','121212121212121','1212121212','12121212','','vendor','vendor','2017-12-09 00:00:00','2017-12-09 00:00:00'),(3,8,'AK Exporter','Alagirivimal Kottaimuthu','Villivakkam',15,31,99,'600049','04443831118','9940143811','akexporter@gmail.com','','','1984198744','','User','User','2017-12-09 00:00:00','2017-12-09 00:00:00'),(4,9,'SASI AND CO','SASIKALA','VIllivakkam',15,31,99,'600049','04443831118','9898989898','sasiandco@gmail.com','','','1987198466','','User','User','2017-12-09 00:00:00','2017-12-09 00:00:00'),(5,10,'Kishore Export','Kishore','Chetpet',15,31,99,'600031','09898989898','9898989898','kishore@gmail.com','','','1994199494','','User','User','2017-12-10 00:00:00','2017-12-10 00:00:00'),(6,11,'KRISHNA EXPORTER','KRISHNAN','ANNA NAGAR',15,31,99,'600040','04445612389','9845698456','krishnan@gmail.com','','','1975197519',NULL,'User','User','2017-12-10 00:00:00','2017-12-10 00:00:00'),(7,12,'AMMA EXPORTER','AMMA','MADURAI',57,31,99,'625221','','','amma@gmail.com','12121212121221','121212121','12124578',NULL,'vendor','vendor','2017-12-11 00:00:00','2017-12-11 00:00:00'),(8,17,'RL Exporter','Raji','Tiruvottiyur',15,31,99,'600019','','','rajalakshmi612@gmail.com','GST234563456789','PAN1234567','IEC9876543',NULL,'vendor','vendor','2017-12-29 00:00:00','2017-12-29 00:00:00');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`migration`,`batch`) values ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_08_05_102148_create_roles_table',1),('2016_08_05_102326_create_role_user_table',1),('2016_08_05_103313_create_countries_table',1),('2016_08_05_103336_create_cities_table',1),('2016_08_05_120352_create_hospital_table',1),('2016_08_08_092422_create_doctor_table',1),('2016_08_08_093459_create_pharmacy_table',1),('2016_08_08_094006_create_lab_table',1),('2016_08_08_094831_create_patient_table',1),('2016_08_08_095420_create_hospital_doctor_table',1),('2016_08_08_095650_create_hospital_pharmacy_table',1),('2016_08_08_100320_create_hospital_lab_table',1),('2016_08_08_100736_create_hospital_patient_table',1),('2016_08_08_101802_create_lab_tests_table',1),('2016_08_08_102210_create_drugs_table',1),('2016_08_08_104312_create_patient_prescription_table',1),('2016_08_08_105105_create_prescription_details_table',1),('2016_08_08_105715_create_patient_labtest_table',1),('2016_08_08_111408_create_labtest_details_table',1),('2016_08_09_084345_add_lab_patient_foreign_key',1),('2016_08_11_080538_create_doctor_appointment_table',1),('2016_08_21_103219_create_lab_labtest_table',1),('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_08_05_102148_create_roles_table',1),('2016_08_05_102326_create_role_user_table',1),('2016_08_05_103313_create_countries_table',1),('2016_08_05_103336_create_cities_table',1),('2016_08_05_120352_create_hospital_table',1),('2016_08_08_092422_create_doctor_table',1),('2016_08_08_093459_create_pharmacy_table',1),('2016_08_08_094006_create_lab_table',1),('2016_08_08_094831_create_patient_table',1),('2016_08_08_095420_create_hospital_doctor_table',1),('2016_08_08_095650_create_hospital_pharmacy_table',1),('2016_08_08_100320_create_hospital_lab_table',1),('2016_08_08_100736_create_hospital_patient_table',1),('2016_08_08_101802_create_lab_tests_table',1),('2016_08_08_102210_create_drugs_table',1),('2016_08_08_104312_create_patient_prescription_table',1),('2016_08_08_105105_create_prescription_details_table',1),('2016_08_08_105715_create_patient_labtest_table',1),('2016_08_08_111408_create_labtest_details_table',1),('2016_08_09_084345_add_lab_patient_foreign_key',1),('2016_08_11_080538_create_doctor_appointment_table',2),('2016_08_21_103219_create_lab_labtest_table',3);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `permission_role` */

DROP TABLE IF EXISTS `permission_role`;

CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permission_role` */

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `permissions` */

/*Table structure for table `ports` */

DROP TABLE IF EXISTS `ports`;

CREATE TABLE `ports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ports_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ports_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ports_status` tinyint(4) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `modified_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ports` */

insert  into `ports`(`id`,`ports_name`,`ports_code`,`ports_status`,`created_by`,`modified_by`,`created_at`,`updated_at`) values (1,'Chennai Port','',1,'admin','vendor',NULL,'2017-12-15 00:00:00'),(2,'Ennore Port','',1,'admin','admin',NULL,NULL),(3,'Kattupalli Port','',1,'admin','admin',NULL,NULL),(4,'Tuticorin Port','',1,'admin','admin',NULL,NULL),(5,'Cochin Port','',1,'admin','admin',NULL,NULL),(6,'Kolkata Port','',0,'admin','admin',NULL,NULL),(7,'Paradip Port','',0,'admin','admin',NULL,NULL),(8,'New Mangalore Port','',0,'admin','admin',NULL,NULL),(9,'Jawaharlal Nehru Port','',0,'admin','admin',NULL,NULL),(10,'Mumbai Port','',0,'admin','admin',NULL,NULL),(11,'Kandla Port','',0,'admin','admin',NULL,NULL),(12,'Vishakhapatnam Port','',0,'admin','admin',NULL,NULL),(13,'Mormugao Port','',0,'admin','admin',NULL,NULL),(14,'Port Blair Port','',0,'admin','admin',NULL,NULL);

/*Table structure for table `product_info` */

DROP TABLE IF EXISTS `product_info`;

CREATE TABLE `product_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `product_unicode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_sealcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_sale_price` decimal(15,2) DEFAULT NULL,
  `product_exporter_id` int(11) unsigned DEFAULT NULL,
  `product_sale_status` int(11) NOT NULL DEFAULT '0',
  `product_sale_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `product_unicode` (`product_unicode`),
  UNIQUE KEY `product_sealcode` (`product_sealcode`)
) ENGINE=InnoDB AUTO_INCREMENT=501 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_info` */

insert  into `product_info`(`id`,`user_id`,`product_id`,`product_unicode`,`product_sealcode`,`product_sale_price`,`product_exporter_id`,`product_sale_status`,`product_sale_date`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,2,1,'SSGA10000001','SSGA10000001','299.00',7,1,'2018-01-05','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(2,2,1,'SSGA10000002','SSGA10000002','299.00',7,1,'2018-01-05','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(3,2,1,'SSGA10000003','SSGA10000003','299.00',7,1,'2018-01-05','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(4,2,1,'SSGA10000004','SSGA10000004','299.00',7,1,'2018-01-05','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(5,2,1,'SSGA10000005','SSGA10000005','299.00',7,1,'2018-01-05','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(6,2,1,'SSGA10000006','SSGA10000006','299.00',7,1,'2018-01-05','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(7,2,1,'SSGA10000007','SSGA10000007','299.00',7,1,'2018-01-05','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(8,2,1,'SSGA10000008','SSGA10000008','299.00',7,1,'2018-01-05','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(9,2,1,'SSGA10000009','SSGA10000009','299.00',7,1,'2018-01-05','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(10,2,1,'SSGA10000010','SSGA10000010','299.00',7,1,'2018-01-05','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(11,2,1,'SSGA10000011','SSGA10000011','0.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(12,2,1,'SSGA10000012','SSGA10000012','0.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(13,2,1,'SSGA10000013','SSGA10000013','0.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(14,2,1,'SSGA10000014','SSGA10000014','0.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(15,2,1,'SSGA10000015','SSGA10000015','0.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(16,2,1,'SSGA10000016','SSGA10000016','0.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(17,2,1,'SSGA10000017','SSGA10000017','0.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(18,2,1,'SSGA10000018','SSGA10000018','0.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(19,2,1,'SSGA10000019','SSGA10000019','0.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(20,2,1,'SSGA10000020','SSGA10000020','0.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(21,2,1,'SSGA10000021','SSGA10000021','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(22,2,1,'SSGA10000022','SSGA10000022','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(23,2,1,'SSGA10000023','SSGA10000023','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(24,2,1,'SSGA10000024','SSGA10000024','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(25,2,1,'SSGA10000025','SSGA10000025','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(26,2,1,'SSGA10000026','SSGA10000026','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(27,2,1,'SSGA10000027','SSGA10000027','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(28,2,1,'SSGA10000028','SSGA10000028','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(29,2,1,'SSGA10000029','SSGA10000029','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(30,2,1,'SSGA10000030','SSGA10000030','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(31,2,1,'SSGA10000031','SSGA10000031','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(32,2,1,'SSGA10000032','SSGA10000032','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(33,2,1,'SSGA10000033','SSGA10000033','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(34,2,1,'SSGA10000034','SSGA10000034','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(35,2,1,'SSGA10000035','SSGA10000035','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(36,2,1,'SSGA10000036','SSGA10000036','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(37,2,1,'SSGA10000037','SSGA10000037','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(38,2,1,'SSGA10000038','SSGA10000038','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(39,2,1,'SSGA10000039','SSGA10000039','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(40,2,1,'SSGA10000040','SSGA10000040','299.00',7,1,'2018-01-06','vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(41,2,1,'SSGA10000041','SSGA10000041','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(42,2,1,'SSGA10000042','SSGA10000042','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(43,2,1,'SSGA10000043','SSGA10000043','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(44,2,1,'SSGA10000044','SSGA10000044','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(45,2,1,'SSGA10000045','SSGA10000045','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(46,2,1,'SSGA10000046','SSGA10000046','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(47,2,1,'SSGA10000047','SSGA10000047','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(48,2,1,'SSGA10000048','SSGA10000048','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(49,2,1,'SSGA10000049','SSGA10000049','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(50,2,1,'SSGA10000050','SSGA10000050','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(51,2,1,'SSGA10000051','SSGA10000051','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(52,2,1,'SSGA10000052','SSGA10000052','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(53,2,1,'SSGA10000053','SSGA10000053','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(54,2,1,'SSGA10000054','SSGA10000054','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(55,2,1,'SSGA10000055','SSGA10000055','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(56,2,1,'SSGA10000056','SSGA10000056','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(57,2,1,'SSGA10000057','SSGA10000057','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(58,2,1,'SSGA10000058','SSGA10000058','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(59,2,1,'SSGA10000059','SSGA10000059','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(60,2,1,'SSGA10000060','SSGA10000060','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(61,2,1,'SSGA10000061','SSGA10000061','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(62,2,1,'SSGA10000062','SSGA10000062','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(63,2,1,'SSGA10000063','SSGA10000063','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(64,2,1,'SSGA10000064','SSGA10000064','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(65,2,1,'SSGA10000065','SSGA10000065','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(66,2,1,'SSGA10000066','SSGA10000066','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(67,2,1,'SSGA10000067','SSGA10000067','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(68,2,1,'SSGA10000068','SSGA10000068','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(69,2,1,'SSGA10000069','SSGA10000069','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(70,2,1,'SSGA10000070','SSGA10000070','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(71,2,1,'SSGA10000071','SSGA10000071','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(72,2,1,'SSGA10000072','SSGA10000072','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(73,2,1,'SSGA10000073','SSGA10000073','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(74,2,1,'SSGA10000074','SSGA10000074','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(75,2,1,'SSGA10000075','SSGA10000075','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(76,2,1,'SSGA10000076','SSGA10000076','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(77,2,1,'SSGA10000077','SSGA10000077','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(78,2,1,'SSGA10000078','SSGA10000078','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(79,2,1,'SSGA10000079','SSGA10000079','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(80,2,1,'SSGA10000080','SSGA10000080','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(81,2,1,'SSGA10000081','SSGA10000081','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(82,2,1,'SSGA10000082','SSGA10000082','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(83,2,1,'SSGA10000083','SSGA10000083','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(84,2,1,'SSGA10000084','SSGA10000084','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(85,2,1,'SSGA10000085','SSGA10000085','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(86,2,1,'SSGA10000086','SSGA10000086','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(87,2,1,'SSGA10000087','SSGA10000087','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(88,2,1,'SSGA10000088','SSGA10000088','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(89,2,1,'SSGA10000089','SSGA10000089','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(90,2,1,'SSGA10000090','SSGA10000090','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(91,2,1,'SSGA10000091','SSGA10000091','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(92,2,1,'SSGA10000092','SSGA10000092','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(93,2,1,'SSGA10000093','SSGA10000093','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(94,2,1,'SSGA10000094','SSGA10000094','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(95,2,1,'SSGA10000095','SSGA10000095','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(96,2,1,'SSGA10000096','SSGA10000096','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(97,2,1,'SSGA10000097','SSGA10000097','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(98,2,1,'SSGA10000098','SSGA10000098','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(99,2,1,'SSGA10000099','SSGA10000099','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(100,2,1,'SSGA10000100','SSGA10000100','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(101,2,1,'SSGA10000101','SSGA10000101','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(102,2,1,'SSGA10000102','SSGA10000102','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(103,2,1,'SSGA10000103','SSGA10000103','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(104,2,1,'SSGA10000104','SSGA10000104','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(105,2,1,'SSGA10000105','SSGA10000105','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(106,2,1,'SSGA10000106','SSGA10000106','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(107,2,1,'SSGA10000107','SSGA10000107','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(108,2,1,'SSGA10000108','SSGA10000108','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(109,2,1,'SSGA10000109','SSGA10000109','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(110,2,1,'SSGA10000110','SSGA10000110','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(111,2,1,'SSGA10000111','SSGA10000111','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(112,2,1,'SSGA10000112','SSGA10000112','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(113,2,1,'SSGA10000113','SSGA10000113','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(114,2,1,'SSGA10000114','SSGA10000114','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(115,2,1,'SSGA10000115','SSGA10000115','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(116,2,1,'SSGA10000116','SSGA10000116','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(117,2,1,'SSGA10000117','SSGA10000117','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(118,2,1,'SSGA10000118','SSGA10000118','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(119,2,1,'SSGA10000119','SSGA10000119','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(120,2,1,'SSGA10000120','SSGA10000120','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(121,2,1,'SSGA10000121','SSGA10000121','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(122,2,1,'SSGA10000122','SSGA10000122','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(123,2,1,'SSGA10000123','SSGA10000123','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(124,2,1,'SSGA10000124','SSGA10000124','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(125,2,1,'SSGA10000125','SSGA10000125','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(126,2,1,'SSGA10000126','SSGA10000126','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(127,2,1,'SSGA10000127','SSGA10000127','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(128,2,1,'SSGA10000128','SSGA10000128','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(129,2,1,'SSGA10000129','SSGA10000129','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(130,2,1,'SSGA10000130','SSGA10000130','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(131,2,1,'SSGA10000131','SSGA10000131','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(132,2,1,'SSGA10000132','SSGA10000132','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(133,2,1,'SSGA10000133','SSGA10000133','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(134,2,1,'SSGA10000134','SSGA10000134','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(135,2,1,'SSGA10000135','SSGA10000135','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(136,2,1,'SSGA10000136','SSGA10000136','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(137,2,1,'SSGA10000137','SSGA10000137','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(138,2,1,'SSGA10000138','SSGA10000138','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(139,2,1,'SSGA10000139','SSGA10000139','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(140,2,1,'SSGA10000140','SSGA10000140','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(141,2,1,'SSGA10000141','SSGA10000141','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(142,2,1,'SSGA10000142','SSGA10000142','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(143,2,1,'SSGA10000143','SSGA10000143','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(144,2,1,'SSGA10000144','SSGA10000144','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(145,2,1,'SSGA10000145','SSGA10000145','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(146,2,1,'SSGA10000146','SSGA10000146','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(147,2,1,'SSGA10000147','SSGA10000147','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(148,2,1,'SSGA10000148','SSGA10000148','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(149,2,1,'SSGA10000149','SSGA10000149','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(150,2,1,'SSGA10000150','SSGA10000150','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(151,2,1,'SSGA10000151','SSGA10000151','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(152,2,1,'SSGA10000152','SSGA10000152','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(153,2,1,'SSGA10000153','SSGA10000153','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(154,2,1,'SSGA10000154','SSGA10000154','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(155,2,1,'SSGA10000155','SSGA10000155','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(156,2,1,'SSGA10000156','SSGA10000156','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(157,2,1,'SSGA10000157','SSGA10000157','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(158,2,1,'SSGA10000158','SSGA10000158','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(159,2,1,'SSGA10000159','SSGA10000159','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(160,2,1,'SSGA10000160','SSGA10000160','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(161,2,1,'SSGA10000161','SSGA10000161','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(162,2,1,'SSGA10000162','SSGA10000162','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(163,2,1,'SSGA10000163','SSGA10000163','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(164,2,1,'SSGA10000164','SSGA10000164','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(165,2,1,'SSGA10000165','SSGA10000165','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(166,2,1,'SSGA10000166','SSGA10000166','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(167,2,1,'SSGA10000167','SSGA10000167','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(168,2,1,'SSGA10000168','SSGA10000168','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(169,2,1,'SSGA10000169','SSGA10000169','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(170,2,1,'SSGA10000170','SSGA10000170','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(171,2,1,'SSGA10000171','SSGA10000171','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(172,2,1,'SSGA10000172','SSGA10000172','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(173,2,1,'SSGA10000173','SSGA10000173','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(174,2,1,'SSGA10000174','SSGA10000174','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(175,2,1,'SSGA10000175','SSGA10000175','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(176,2,1,'SSGA10000176','SSGA10000176','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(177,2,1,'SSGA10000177','SSGA10000177','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(178,2,1,'SSGA10000178','SSGA10000178','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(179,2,1,'SSGA10000179','SSGA10000179','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(180,2,1,'SSGA10000180','SSGA10000180','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(181,2,1,'SSGA10000181','SSGA10000181','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(182,2,1,'SSGA10000182','SSGA10000182','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(183,2,1,'SSGA10000183','SSGA10000183','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(184,2,1,'SSGA10000184','SSGA10000184','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(185,2,1,'SSGA10000185','SSGA10000185','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(186,2,1,'SSGA10000186','SSGA10000186','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(187,2,1,'SSGA10000187','SSGA10000187','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(188,2,1,'SSGA10000188','SSGA10000188','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(189,2,1,'SSGA10000189','SSGA10000189','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(190,2,1,'SSGA10000190','SSGA10000190','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(191,2,1,'SSGA10000191','SSGA10000191','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(192,2,1,'SSGA10000192','SSGA10000192','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(193,2,1,'SSGA10000193','SSGA10000193','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(194,2,1,'SSGA10000194','SSGA10000194','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(195,2,1,'SSGA10000195','SSGA10000195','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(196,2,1,'SSGA10000196','SSGA10000196','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(197,2,1,'SSGA10000197','SSGA10000197','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(198,2,1,'SSGA10000198','SSGA10000198','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(199,2,1,'SSGA10000199','SSGA10000199','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(200,2,1,'SSGA10000200','SSGA10000200','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(201,2,1,'SSGA10000201','SSGA10000201','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(202,2,1,'SSGA10000202','SSGA10000202','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(203,2,1,'SSGA10000203','SSGA10000203','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(204,2,1,'SSGA10000204','SSGA10000204','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(205,2,1,'SSGA10000205','SSGA10000205','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(206,2,1,'SSGA10000206','SSGA10000206','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(207,2,1,'SSGA10000207','SSGA10000207','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(208,2,1,'SSGA10000208','SSGA10000208','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(209,2,1,'SSGA10000209','SSGA10000209','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(210,2,1,'SSGA10000210','SSGA10000210','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(211,2,1,'SSGA10000211','SSGA10000211','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(212,2,1,'SSGA10000212','SSGA10000212','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(213,2,1,'SSGA10000213','SSGA10000213','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(214,2,1,'SSGA10000214','SSGA10000214','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(215,2,1,'SSGA10000215','SSGA10000215','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(216,2,1,'SSGA10000216','SSGA10000216','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(217,2,1,'SSGA10000217','SSGA10000217','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(218,2,1,'SSGA10000218','SSGA10000218','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(219,2,1,'SSGA10000219','SSGA10000219','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(220,2,1,'SSGA10000220','SSGA10000220','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(221,2,1,'SSGA10000221','SSGA10000221','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(222,2,1,'SSGA10000222','SSGA10000222','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(223,2,1,'SSGA10000223','SSGA10000223','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(224,2,1,'SSGA10000224','SSGA10000224','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(225,2,1,'SSGA10000225','SSGA10000225','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(226,2,1,'SSGA10000226','SSGA10000226','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(227,2,1,'SSGA10000227','SSGA10000227','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(228,2,1,'SSGA10000228','SSGA10000228','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(229,2,1,'SSGA10000229','SSGA10000229','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(230,2,1,'SSGA10000230','SSGA10000230','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(231,2,1,'SSGA10000231','SSGA10000231','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(232,2,1,'SSGA10000232','SSGA10000232','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(233,2,1,'SSGA10000233','SSGA10000233','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(234,2,1,'SSGA10000234','SSGA10000234','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(235,2,1,'SSGA10000235','SSGA10000235','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(236,2,1,'SSGA10000236','SSGA10000236','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(237,2,1,'SSGA10000237','SSGA10000237','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(238,2,1,'SSGA10000238','SSGA10000238','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(239,2,1,'SSGA10000239','SSGA10000239','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(240,2,1,'SSGA10000240','SSGA10000240','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(241,2,1,'SSGA10000241','SSGA10000241','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(242,2,1,'SSGA10000242','SSGA10000242','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(243,2,1,'SSGA10000243','SSGA10000243','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(244,2,1,'SSGA10000244','SSGA10000244','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(245,2,1,'SSGA10000245','SSGA10000245','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(246,2,1,'SSGA10000246','SSGA10000246','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(247,2,1,'SSGA10000247','SSGA10000247','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(248,2,1,'SSGA10000248','SSGA10000248','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(249,2,1,'SSGA10000249','SSGA10000249','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(250,2,1,'SSGA10000250','SSGA10000250','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(251,2,1,'SSGA10000251','SSGA10000251','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(252,2,1,'SSGA10000252','SSGA10000252','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(253,2,1,'SSGA10000253','SSGA10000253','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(254,2,1,'SSGA10000254','SSGA10000254','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(255,2,1,'SSGA10000255','SSGA10000255','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(256,2,1,'SSGA10000256','SSGA10000256','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(257,2,1,'SSGA10000257','SSGA10000257','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(258,2,1,'SSGA10000258','SSGA10000258','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(259,2,1,'SSGA10000259','SSGA10000259','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(260,2,1,'SSGA10000260','SSGA10000260','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(261,2,1,'SSGA10000261','SSGA10000261','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(262,2,1,'SSGA10000262','SSGA10000262','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(263,2,1,'SSGA10000263','SSGA10000263','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(264,2,1,'SSGA10000264','SSGA10000264','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(265,2,1,'SSGA10000265','SSGA10000265','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(266,2,1,'SSGA10000266','SSGA10000266','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(267,2,1,'SSGA10000267','SSGA10000267','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(268,2,1,'SSGA10000268','SSGA10000268','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(269,2,1,'SSGA10000269','SSGA10000269','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(270,2,1,'SSGA10000270','SSGA10000270','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(271,2,1,'SSGA10000271','SSGA10000271','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(272,2,1,'SSGA10000272','SSGA10000272','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(273,2,1,'SSGA10000273','SSGA10000273','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(274,2,1,'SSGA10000274','SSGA10000274','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(275,2,1,'SSGA10000275','SSGA10000275','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(276,2,1,'SSGA10000276','SSGA10000276','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(277,2,1,'SSGA10000277','SSGA10000277','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(278,2,1,'SSGA10000278','SSGA10000278','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(279,2,1,'SSGA10000279','SSGA10000279','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(280,2,1,'SSGA10000280','SSGA10000280','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(281,2,1,'SSGA10000281','SSGA10000281','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(282,2,1,'SSGA10000282','SSGA10000282','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(283,2,1,'SSGA10000283','SSGA10000283','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(284,2,1,'SSGA10000284','SSGA10000284','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(285,2,1,'SSGA10000285','SSGA10000285','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(286,2,1,'SSGA10000286','SSGA10000286','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(287,2,1,'SSGA10000287','SSGA10000287','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(288,2,1,'SSGA10000288','SSGA10000288','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(289,2,1,'SSGA10000289','SSGA10000289','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(290,2,1,'SSGA10000290','SSGA10000290','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(291,2,1,'SSGA10000291','SSGA10000291','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(292,2,1,'SSGA10000292','SSGA10000292','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(293,2,1,'SSGA10000293','SSGA10000293','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(294,2,1,'SSGA10000294','SSGA10000294','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(295,2,1,'SSGA10000295','SSGA10000295','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(296,2,1,'SSGA10000296','SSGA10000296','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(297,2,1,'SSGA10000297','SSGA10000297','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(298,2,1,'SSGA10000298','SSGA10000298','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(299,2,1,'SSGA10000299','SSGA10000299','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(300,2,1,'SSGA10000300','SSGA10000300','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(301,2,1,'SSGA10000301','SSGA10000301','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(302,2,1,'SSGA10000302','SSGA10000302','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(303,2,1,'SSGA10000303','SSGA10000303','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(304,2,1,'SSGA10000304','SSGA10000304','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(305,2,1,'SSGA10000305','SSGA10000305','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(306,2,1,'SSGA10000306','SSGA10000306','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(307,2,1,'SSGA10000307','SSGA10000307','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(308,2,1,'SSGA10000308','SSGA10000308','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(309,2,1,'SSGA10000309','SSGA10000309','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(310,2,1,'SSGA10000310','SSGA10000310','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(311,2,1,'SSGA10000311','SSGA10000311','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(312,2,1,'SSGA10000312','SSGA10000312','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(313,2,1,'SSGA10000313','SSGA10000313','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(314,2,1,'SSGA10000314','SSGA10000314','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(315,2,1,'SSGA10000315','SSGA10000315','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(316,2,1,'SSGA10000316','SSGA10000316','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(317,2,1,'SSGA10000317','SSGA10000317','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(318,2,1,'SSGA10000318','SSGA10000318','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(319,2,1,'SSGA10000319','SSGA10000319','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(320,2,1,'SSGA10000320','SSGA10000320','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(321,2,1,'SSGA10000321','SSGA10000321','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(322,2,1,'SSGA10000322','SSGA10000322','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(323,2,1,'SSGA10000323','SSGA10000323','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(324,2,1,'SSGA10000324','SSGA10000324','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(325,2,1,'SSGA10000325','SSGA10000325','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(326,2,1,'SSGA10000326','SSGA10000326','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(327,2,1,'SSGA10000327','SSGA10000327','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(328,2,1,'SSGA10000328','SSGA10000328','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(329,2,1,'SSGA10000329','SSGA10000329','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(330,2,1,'SSGA10000330','SSGA10000330','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(331,2,1,'SSGA10000331','SSGA10000331','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(332,2,1,'SSGA10000332','SSGA10000332','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(333,2,1,'SSGA10000333','SSGA10000333','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(334,2,1,'SSGA10000334','SSGA10000334','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(335,2,1,'SSGA10000335','SSGA10000335','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(336,2,1,'SSGA10000336','SSGA10000336','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(337,2,1,'SSGA10000337','SSGA10000337','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(338,2,1,'SSGA10000338','SSGA10000338','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(339,2,1,'SSGA10000339','SSGA10000339','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(340,2,1,'SSGA10000340','SSGA10000340','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(341,2,1,'SSGA10000341','SSGA10000341','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(342,2,1,'SSGA10000342','SSGA10000342','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(343,2,1,'SSGA10000343','SSGA10000343','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(344,2,1,'SSGA10000344','SSGA10000344','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(345,2,1,'SSGA10000345','SSGA10000345','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(346,2,1,'SSGA10000346','SSGA10000346','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(347,2,1,'SSGA10000347','SSGA10000347','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(348,2,1,'SSGA10000348','SSGA10000348','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(349,2,1,'SSGA10000349','SSGA10000349','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(350,2,1,'SSGA10000350','SSGA10000350','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(351,2,1,'SSGA10000351','SSGA10000351','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(352,2,1,'SSGA10000352','SSGA10000352','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(353,2,1,'SSGA10000353','SSGA10000353','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(354,2,1,'SSGA10000354','SSGA10000354','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(355,2,1,'SSGA10000355','SSGA10000355','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(356,2,1,'SSGA10000356','SSGA10000356','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(357,2,1,'SSGA10000357','SSGA10000357','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(358,2,1,'SSGA10000358','SSGA10000358','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(359,2,1,'SSGA10000359','SSGA10000359','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(360,2,1,'SSGA10000360','SSGA10000360','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(361,2,1,'SSGA10000361','SSGA10000361','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(362,2,1,'SSGA10000362','SSGA10000362','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(363,2,1,'SSGA10000363','SSGA10000363','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(364,2,1,'SSGA10000364','SSGA10000364','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(365,2,1,'SSGA10000365','SSGA10000365','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(366,2,1,'SSGA10000366','SSGA10000366','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(367,2,1,'SSGA10000367','SSGA10000367','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(368,2,1,'SSGA10000368','SSGA10000368','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(369,2,1,'SSGA10000369','SSGA10000369','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(370,2,1,'SSGA10000370','SSGA10000370','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(371,2,1,'SSGA10000371','SSGA10000371','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(372,2,1,'SSGA10000372','SSGA10000372','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(373,2,1,'SSGA10000373','SSGA10000373','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(374,2,1,'SSGA10000374','SSGA10000374','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(375,2,1,'SSGA10000375','SSGA10000375','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(376,2,1,'SSGA10000376','SSGA10000376','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(377,2,1,'SSGA10000377','SSGA10000377','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(378,2,1,'SSGA10000378','SSGA10000378','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(379,2,1,'SSGA10000379','SSGA10000379','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(380,2,1,'SSGA10000380','SSGA10000380','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(381,2,1,'SSGA10000381','SSGA10000381','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(382,2,1,'SSGA10000382','SSGA10000382','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(383,2,1,'SSGA10000383','SSGA10000383','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(384,2,1,'SSGA10000384','SSGA10000384','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(385,2,1,'SSGA10000385','SSGA10000385','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(386,2,1,'SSGA10000386','SSGA10000386','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(387,2,1,'SSGA10000387','SSGA10000387','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(388,2,1,'SSGA10000388','SSGA10000388','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(389,2,1,'SSGA10000389','SSGA10000389','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(390,2,1,'SSGA10000390','SSGA10000390','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(391,2,1,'SSGA10000391','SSGA10000391','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(392,2,1,'SSGA10000392','SSGA10000392','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(393,2,1,'SSGA10000393','SSGA10000393','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(394,2,1,'SSGA10000394','SSGA10000394','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(395,2,1,'SSGA10000395','SSGA10000395','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(396,2,1,'SSGA10000396','SSGA10000396','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(397,2,1,'SSGA10000397','SSGA10000397','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(398,2,1,'SSGA10000398','SSGA10000398','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(399,2,1,'SSGA10000399','SSGA10000399','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(400,2,1,'SSGA10000400','SSGA10000400','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(401,2,1,'SSGA10000401','SSGA10000401','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(402,2,1,'SSGA10000402','SSGA10000402','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(403,2,1,'SSGA10000403','SSGA10000403','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(404,2,1,'SSGA10000404','SSGA10000404','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(405,2,1,'SSGA10000405','SSGA10000405','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(406,2,1,'SSGA10000406','SSGA10000406','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(407,2,1,'SSGA10000407','SSGA10000407','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(408,2,1,'SSGA10000408','SSGA10000408','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(409,2,1,'SSGA10000409','SSGA10000409','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(410,2,1,'SSGA10000410','SSGA10000410','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(411,2,1,'SSGA10000411','SSGA10000411','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(412,2,1,'SSGA10000412','SSGA10000412','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(413,2,1,'SSGA10000413','SSGA10000413','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(414,2,1,'SSGA10000414','SSGA10000414','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(415,2,1,'SSGA10000415','SSGA10000415','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(416,2,1,'SSGA10000416','SSGA10000416','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(417,2,1,'SSGA10000417','SSGA10000417','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(418,2,1,'SSGA10000418','SSGA10000418','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(419,2,1,'SSGA10000419','SSGA10000419','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(420,2,1,'SSGA10000420','SSGA10000420','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(421,2,1,'SSGA10000421','SSGA10000421','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(422,2,1,'SSGA10000422','SSGA10000422','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(423,2,1,'SSGA10000423','SSGA10000423','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(424,2,1,'SSGA10000424','SSGA10000424','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(425,2,1,'SSGA10000425','SSGA10000425','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(426,2,1,'SSGA10000426','SSGA10000426','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(427,2,1,'SSGA10000427','SSGA10000427','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(428,2,1,'SSGA10000428','SSGA10000428','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(429,2,1,'SSGA10000429','SSGA10000429','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(430,2,1,'SSGA10000430','SSGA10000430','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(431,2,1,'SSGA10000431','SSGA10000431','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(432,2,1,'SSGA10000432','SSGA10000432','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(433,2,1,'SSGA10000433','SSGA10000433','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(434,2,1,'SSGA10000434','SSGA10000434','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(435,2,1,'SSGA10000435','SSGA10000435','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(436,2,1,'SSGA10000436','SSGA10000436','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(437,2,1,'SSGA10000437','SSGA10000437','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(438,2,1,'SSGA10000438','SSGA10000438','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(439,2,1,'SSGA10000439','SSGA10000439','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(440,2,1,'SSGA10000440','SSGA10000440','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(441,2,1,'SSGA10000441','SSGA10000441','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(442,2,1,'SSGA10000442','SSGA10000442','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(443,2,1,'SSGA10000443','SSGA10000443','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(444,2,1,'SSGA10000444','SSGA10000444','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(445,2,1,'SSGA10000445','SSGA10000445','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(446,2,1,'SSGA10000446','SSGA10000446','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(447,2,1,'SSGA10000447','SSGA10000447','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(448,2,1,'SSGA10000448','SSGA10000448','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(449,2,1,'SSGA10000449','SSGA10000449','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(450,2,1,'SSGA10000450','SSGA10000450','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(451,2,1,'SSGA10000451','SSGA10000451','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(452,2,1,'SSGA10000452','SSGA10000452','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(453,2,1,'SSGA10000453','SSGA10000453','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(454,2,1,'SSGA10000454','SSGA10000454','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(455,2,1,'SSGA10000455','SSGA10000455','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(456,2,1,'SSGA10000456','SSGA10000456','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(457,2,1,'SSGA10000457','SSGA10000457','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(458,2,1,'SSGA10000458','SSGA10000458','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(459,2,1,'SSGA10000459','SSGA10000459','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(460,2,1,'SSGA10000460','SSGA10000460','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(461,2,1,'SSGA10000461','SSGA10000461','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(462,2,1,'SSGA10000462','SSGA10000462','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(463,2,1,'SSGA10000463','SSGA10000463','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(464,2,1,'SSGA10000464','SSGA10000464','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(465,2,1,'SSGA10000465','SSGA10000465','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(466,2,1,'SSGA10000466','SSGA10000466','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(467,2,1,'SSGA10000467','SSGA10000467','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(468,2,1,'SSGA10000468','SSGA10000468','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(469,2,1,'SSGA10000469','SSGA10000469','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(470,2,1,'SSGA10000470','SSGA10000470','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(471,2,1,'SSGA10000471','SSGA10000471','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(472,2,1,'SSGA10000472','SSGA10000472','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(473,2,1,'SSGA10000473','SSGA10000473','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(474,2,1,'SSGA10000474','SSGA10000474','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(475,2,1,'SSGA10000475','SSGA10000475','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(476,2,1,'SSGA10000476','SSGA10000476','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(477,2,1,'SSGA10000477','SSGA10000477','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(478,2,1,'SSGA10000478','SSGA10000478','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(479,2,1,'SSGA10000479','SSGA10000479','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(480,2,1,'SSGA10000480','SSGA10000480','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(481,2,1,'SSGA10000481','SSGA10000481','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(482,2,1,'SSGA10000482','SSGA10000482','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(483,2,1,'SSGA10000483','SSGA10000483','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(484,2,1,'SSGA10000484','SSGA10000484','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(485,2,1,'SSGA10000485','SSGA10000485','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(486,2,1,'SSGA10000486','SSGA10000486','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(487,2,1,'SSGA10000487','SSGA10000487','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(488,2,1,'SSGA10000488','SSGA10000488','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(489,2,1,'SSGA10000489','SSGA10000489','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(490,2,1,'SSGA10000490','SSGA10000490','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(491,2,1,'SSGA10000491','SSGA10000491','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(492,2,1,'SSGA10000492','SSGA10000492','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(493,2,1,'SSGA10000493','SSGA10000493','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(494,2,1,'SSGA10000494','SSGA10000494','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(495,2,1,'SSGA10000495','SSGA10000495','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(496,2,1,'SSGA10000496','SSGA10000496','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(497,2,1,'SSGA10000497','SSGA10000497','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(498,2,1,'SSGA10000498','SSGA10000498','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(499,2,1,'SSGA10000499','SSGA10000499','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00'),(500,2,1,'SSGA10000500','SSGA10000500','0.00',NULL,0,NULL,'vendor','vendor','2018-01-05 00:00:00','2018-01-05 00:00:00');

/*Table structure for table `product_order` */

DROP TABLE IF EXISTS `product_order`;

CREATE TABLE `product_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_exporter_id` int(10) NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `product_order_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_sale_quantity` int(11) unsigned NOT NULL,
  `product_sale_price` decimal(15,2) NOT NULL,
  `product_sale_gst` decimal(15,2) NOT NULL,
  `product_sale_delivery` decimal(15,2) NOT NULL,
  `product_sale_discount` decimal(15,2) NOT NULL,
  `product_sale_total` decimal(15,2) NOT NULL,
  `product_sale_grand_total` decimal(15,2) NOT NULL,
  `product_sale_type` int(11) NOT NULL,
  `product_sale_status` int(11) NOT NULL DEFAULT '0',
  `product_sale_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_sale_payment_type` int(11) NOT NULL,
  `product_sale_payment_notes` text COLLATE utf8_unicode_ci NOT NULL,
  `product_delivery_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_delivery_address` text COLLATE utf8_unicode_ci NOT NULL,
  `product_delivery_city` int(11) NOT NULL,
  `product_delivery_state` int(11) NOT NULL,
  `product_delivery_country` int(11) NOT NULL,
  `product_delivery_pincode` int(11) NOT NULL,
  `product_delivery_mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_delivery_type` int(11) NOT NULL,
  `product_delivery_status` int(11) NOT NULL,
  `product_delivery_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_estimate_delivery_days` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_estimate_delivery_charge` decimal(15,2) DEFAULT NULL,
  `product_order_status` int(11) DEFAULT '0',
  `product_order_date` date DEFAULT NULL,
  `product_order_note` text COLLATE utf8_unicode_ci,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_order` */

insert  into `product_order`(`id`,`user_id`,`product_exporter_id`,`product_id`,`product_order_id`,`product_sale_quantity`,`product_sale_price`,`product_sale_gst`,`product_sale_delivery`,`product_sale_discount`,`product_sale_total`,`product_sale_grand_total`,`product_sale_type`,`product_sale_status`,`product_sale_date`,`product_sale_payment_type`,`product_sale_payment_notes`,`product_delivery_name`,`product_delivery_address`,`product_delivery_city`,`product_delivery_state`,`product_delivery_country`,`product_delivery_pincode`,`product_delivery_mobile`,`product_delivery_type`,`product_delivery_status`,`product_delivery_date`,`product_estimate_delivery_days`,`product_estimate_delivery_charge`,`product_order_status`,`product_order_date`,`product_order_note`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,7,7,1,'1000000001',10,'299.00','538.20','500.00','149.50','2990.00','3878.70',1,1,'2018-01-05',2,'NONE','Alagirivimal','Sidco Nagar, Villivakkam',15,31,99,600049,'9841486644',0,0,'0',NULL,NULL,0,NULL,NULL,'User','User','2018-01-05 00:00:00','2018-01-05 00:00:00'),(2,7,7,1,'1000000002',10,'299.00','538.20','500.00','149.50','2990.00','3878.70',1,0,'2018-01-05',5,'NONE','Kishore','Villivakkam ',15,31,99,600049,'9898989898',0,0,'0',NULL,NULL,0,NULL,NULL,'User','User','2018-01-05 00:00:00','2018-01-05 00:00:00'),(3,2,7,1,'1000000003',10,'299.00','538.20','0.00','0.00','2990.00','3528.20',1,1,'2018-01-06',2,'None','Kishore','Villivakkam ',15,31,99,600049,'9898989898',0,0,'0',NULL,NULL,0,NULL,NULL,'vendor','vendor','2018-01-06 00:00:00','2018-01-06 00:00:00'),(4,7,7,1,'1000000004',10,'299.00','538.20','0.00','0.00','2990.00','3528.20',1,1,'2018-01-06',1,'NONE','Kishore','Villivakkam ',15,31,99,600049,'9898989898',0,0,'0',NULL,NULL,0,NULL,NULL,'User','User','2018-01-06 00:00:00','2018-01-06 00:00:00'),(5,7,7,1,'1000000005',10,'299.00','538.20','0.00','0.00','2990.00','3528.20',1,1,'2018-01-06',1,'NONE','Alagirivimal','Sidco Nagar, Villivakkam',15,31,99,600049,'9841486644',0,0,'0',NULL,NULL,0,'2018-01-06',NULL,'User','User','2018-01-06 00:00:00','2018-01-06 00:00:00');

/*Table structure for table `product_order_info` */

DROP TABLE IF EXISTS `product_order_info`;

CREATE TABLE `product_order_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `product_order_id` int(11) DEFAULT NULL,
  `product_unicode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_sealcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_exporter_id` int(11) unsigned DEFAULT NULL,
  `seal_type` int(11) DEFAULT NULL,
  `cfs_reach_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zone` int(11) DEFAULT NULL,
  `commissionerate` int(11) DEFAULT NULL,
  `shipping_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iec_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pan_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gst_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sealing_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sealing_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `destination_port` int(11) DEFAULT NULL,
  `terminal_name` int(11) DEFAULT NULL,
  `container_size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `container_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trailer_truck_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driver_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driver_licence` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driver_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eway_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `customs_approve_status` int(11) DEFAULT '0',
  `customs_approve_note` text COLLATE utf8_unicode_ci,
  `customs_approve_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customs_approve_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_item_status` int(11) DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_order_info` */

insert  into `product_order_info`(`id`,`user_id`,`product_id`,`product_order_id`,`product_unicode`,`product_sealcode`,`product_exporter_id`,`seal_type`,`cfs_reach_time`,`zone`,`commissionerate`,`shipping_no`,`shipping_date`,`iec_no`,`pan_no`,`gst_no`,`sealing_date`,`sealing_time`,`destination_port`,`terminal_name`,`container_size`,`container_no`,`trailer_truck_no`,`driver_name`,`driver_licence`,`driver_number`,`form_no`,`eway_no`,`notes`,`customs_approve_status`,`customs_approve_note`,`customs_approve_date`,`customs_approve_time`,`product_item_status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,7,1,1,'SSGA10000001','SSGA10000001',7,1,'12:59',NULL,NULL,'121212','2018-12-31','12121212','1212121212','121212121212121','2018-01-13','13:59',1,2,'1','1','123','Demo','123','123','123456','123456','None',0,NULL,NULL,NULL,1,'root','root','2018-01-05 00:00:00','2018-01-05 00:00:00'),(2,7,1,1,'SSGA10000002','SSGA10000002',7,1,'12:59',NULL,NULL,'1212','2018-12-31','12121212','1212121212','121212121212121','2018-01-13','12:59',1,2,'12','12','1212','Vimal','1212','1212','1212','1212','NONE',0,NULL,NULL,NULL,1,'root','root','2018-01-05 00:00:00','2018-01-05 00:00:00'),(3,7,1,1,'SSGA10000003','SSGA10000003',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-05 00:00:00','2018-01-05 00:00:00'),(4,7,1,1,'SSGA10000004','SSGA10000004',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-05 00:00:00','2018-01-05 00:00:00'),(5,7,1,1,'SSGA10000005','SSGA10000005',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-05 00:00:00','2018-01-05 00:00:00'),(6,7,1,1,'SSGA10000006','SSGA10000006',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-05 00:00:00','2018-01-05 00:00:00'),(7,7,1,1,'SSGA10000007','SSGA10000007',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-05 00:00:00','2018-01-05 00:00:00'),(8,7,1,1,'SSGA10000008','SSGA10000008',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-05 00:00:00','2018-01-05 00:00:00'),(9,7,1,1,'SSGA10000009','SSGA10000009',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-05 00:00:00','2018-01-05 00:00:00'),(10,7,1,1,'SSGA10000010','SSGA10000010',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-05 00:00:00','2018-01-05 00:00:00'),(11,7,1,3,'SSGA10000011','SSGA10000011',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'vendor','vendor','2018-01-06 00:00:00','2018-01-06 00:00:00'),(12,7,1,3,'SSGA10000012','SSGA10000012',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'vendor','vendor','2018-01-06 00:00:00','2018-01-06 00:00:00'),(13,7,1,3,'SSGA10000013','SSGA10000013',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'vendor','vendor','2018-01-06 00:00:00','2018-01-06 00:00:00'),(14,7,1,3,'SSGA10000014','SSGA10000014',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'vendor','vendor','2018-01-06 00:00:00','2018-01-06 00:00:00'),(15,7,1,3,'SSGA10000015','SSGA10000015',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'vendor','vendor','2018-01-06 00:00:00','2018-01-06 00:00:00'),(16,7,1,3,'SSGA10000016','SSGA10000016',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'vendor','vendor','2018-01-06 00:00:00','2018-01-06 00:00:00'),(17,7,1,3,'SSGA10000017','SSGA10000017',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'vendor','vendor','2018-01-06 00:00:00','2018-01-06 00:00:00'),(18,7,1,3,'SSGA10000018','SSGA10000018',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'vendor','vendor','2018-01-06 00:00:00','2018-01-06 00:00:00'),(19,7,1,3,'SSGA10000019','SSGA10000019',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'vendor','vendor','2018-01-06 00:00:00','2018-01-06 00:00:00'),(20,7,1,3,'SSGA10000020','SSGA10000020',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'vendor','vendor','2018-01-06 00:00:00','2018-01-06 00:00:00'),(21,7,1,4,'SSGA10000021','SSGA10000021',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(22,7,1,4,'SSGA10000022','SSGA10000022',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(23,7,1,4,'SSGA10000023','SSGA10000023',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(24,7,1,4,'SSGA10000024','SSGA10000024',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(25,7,1,4,'SSGA10000025','SSGA10000025',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(26,7,1,4,'SSGA10000026','SSGA10000026',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(27,7,1,4,'SSGA10000027','SSGA10000027',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(28,7,1,4,'SSGA10000028','SSGA10000028',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(29,7,1,4,'SSGA10000029','SSGA10000029',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(30,7,1,4,'SSGA10000030','SSGA10000030',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(31,7,1,5,'SSGA10000031','SSGA10000031',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(32,7,1,5,'SSGA10000032','SSGA10000032',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(33,7,1,5,'SSGA10000033','SSGA10000033',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(34,7,1,5,'SSGA10000034','SSGA10000034',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(35,7,1,5,'SSGA10000035','SSGA10000035',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(36,7,1,5,'SSGA10000036','SSGA10000036',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(37,7,1,5,'SSGA10000037','SSGA10000037',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(38,7,1,5,'SSGA10000038','SSGA10000038',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(39,7,1,5,'SSGA10000039','SSGA10000039',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00'),(40,7,1,5,'SSGA10000040','SSGA10000040',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'root','root','2018-01-06 00:00:00','2018-01-06 00:00:00');

/*Table structure for table `product_order_info_item` */

DROP TABLE IF EXISTS `product_order_info_item`;

CREATE TABLE `product_order_info_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `product_order_id` int(11) DEFAULT NULL,
  `product_unicode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_sealcode` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_exporter_id` int(11) unsigned DEFAULT NULL,
  `seal_type` int(11) DEFAULT NULL,
  `cfs_reach_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zone` int(11) DEFAULT NULL,
  `commissionerate` int(11) DEFAULT NULL,
  `shipping_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipping_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `iec_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pan_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gst_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sealing_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sealing_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `destination_port` int(11) DEFAULT NULL,
  `terminal_name` int(11) DEFAULT NULL,
  `container_size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `container_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `trailer_truck_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driver_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driver_licence` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `driver_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `form_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `eway_no` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `customs_approve_status` int(11) DEFAULT '0',
  `customs_approve_note` text COLLATE utf8_unicode_ci,
  `customs_approve_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customs_approve_time` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_item_status` int(11) DEFAULT '0',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_order_info_item` */

/*Table structure for table `product_setting` */

DROP TABLE IF EXISTS `product_setting`;

CREATE TABLE `product_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `product_gst` int(11) DEFAULT NULL,
  `product_discount` int(11) DEFAULT NULL,
  `product_shipping` int(11) DEFAULT NULL,
  `product_status` int(11) DEFAULT '1',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `product_setting` */

insert  into `product_setting`(`id`,`product_id`,`product_gst`,`product_discount`,`product_shipping`,`product_status`) values (1,1,18,5,50,1);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_info` text COLLATE utf8_unicode_ci,
  `product_photo` text COLLATE utf8_unicode_ci,
  `product_price` decimal(15,2) NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT '1',
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`user_id`,`product_name`,`product_info`,`product_photo`,`product_price`,`product_status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,2,'RFID E-SEAL','The other name is E-Seal(electronic seal) or RFID seal(Radio Frequency Identification).  The E-seal has many types that has active, passive and semi-active. The passive E-seal is without battery.\r\n\r\nIt can substitute for tradition seals that often applies on gas, oil, truck and container. It can prevent the goods to steal by thief when customer build the security system. It also can provide automatic identification and help you to manage  the trucks or containers. \r\n\r\nMany Customs will use it to implement certification system of authorized economic operator (AEO) and use E-seal to enhance the efficiency of Customs clearance. ','../uploads/book/1505824859_health-concern.png','299.00',1,'ADMIN','vendor','2017-11-29 12:12:12','2017-12-09 00:00:00'),(2,2,'RFID SCANNER','RFID SCANNER',NULL,'4999.00',1,'vendor','vendor','2018-01-06 00:00:00','2018-01-06 00:00:00');

/*Table structure for table `role_user` */

DROP TABLE IF EXISTS `role_user`;

CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `role_user_user_id_role_id_unique` (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`id`,`user_id`,`role_id`,`created_at`,`updated_at`) values (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(6,7,3,NULL,NULL),(7,8,3,NULL,NULL),(8,9,3,NULL,NULL),(9,10,3,NULL,NULL),(10,11,3,NULL,NULL),(11,12,3,NULL,NULL),(12,13,4,NULL,NULL),(14,15,6,NULL,NULL),(15,16,5,NULL,NULL),(16,17,3,NULL,NULL);

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `roles` */

insert  into `roles`(`id`,`name`,`display_name`,`description`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,'admin','admin','admin','Admin','Admin','2016-08-29 06:12:42','2016-08-29 06:12:42'),(2,'vendor','vendor','vendor','Admin','Admin','2016-08-29 06:12:42','2016-08-29 06:12:42'),(3,'exporter','exporter','exporter','Admin','Admin','2016-08-29 06:12:42','2016-08-29 06:12:42'),(4,'customs','customs','customs','Admin','Admin','2016-08-29 06:12:42','2016-08-29 06:12:42'),(5,'support','support','support','Admin','Admin','2016-08-29 06:12:42','2016-08-29 06:12:42'),(6,'brancher','brancher','brancher','Admin','Admin','2016-08-29 06:12:42','2016-08-29 06:12:42');

/*Table structure for table `states` */

DROP TABLE IF EXISTS `states`;

CREATE TABLE `states` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `state_status` tinyint(4) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `modified_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cities_country_foreign` (`country`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `states` */

insert  into `states`(`id`,`state_name`,`country`,`state_status`,`created_by`,`modified_by`,`created_at`,`updated_at`) values (1,'Andaman and Nicobar Islands',99,1,'admin','admin',NULL,NULL),(2,'Andhra Pradesh',99,1,'admin','admin',NULL,NULL),(3,'Arunachal Pradesh',99,1,'admin','admin',NULL,NULL),(4,'Assam',99,1,'admin','admin',NULL,NULL),(5,'Bihar',99,1,'admin','admin',NULL,NULL),(6,'Chandigarh',99,1,'admin','admin',NULL,NULL),(7,'Chhattisgarh',99,1,'admin','admin',NULL,NULL),(8,'Dadra and Nagar Haveli',99,1,'admin','admin',NULL,NULL),(9,'Daman and Diu',99,1,'admin','admin',NULL,NULL),(10,'Delhi',99,1,'admin','admin',NULL,NULL),(11,'Goa',99,1,'admin','admin',NULL,NULL),(12,'Gujarat',99,1,'admin','admin',NULL,NULL),(13,'Haryana',99,1,'admin','admin',NULL,NULL),(14,'Himachal Pradesh',99,1,'admin','admin',NULL,NULL),(15,'Jammu and Kashmir',99,1,'admin','admin',NULL,NULL),(16,'Jharkhand',99,1,'admin','admin',NULL,NULL),(17,'Karnataka',99,1,'admin','admin',NULL,NULL),(18,'Kerala',99,1,'admin','admin',NULL,NULL),(19,'Lakshadweep',99,1,'admin','admin',NULL,NULL),(20,'Madhya Pradesh',99,1,'admin','admin',NULL,NULL),(21,'Maharashtra',99,1,'admin','admin',NULL,NULL),(22,'Manipur',99,1,'admin','admin',NULL,NULL),(23,'Meghalaya',99,1,'admin','admin',NULL,NULL),(24,'Mizoram',99,1,'admin','admin',NULL,NULL),(25,'Nagaland',99,1,'admin','admin',NULL,NULL),(26,'Orissa',99,1,'admin','admin',NULL,NULL),(27,'Pondicherry',99,1,'admin','admin',NULL,NULL),(28,'Punjab',99,1,'admin','admin',NULL,NULL),(29,'Rajasthan',99,1,'admin','admin',NULL,NULL),(30,'Sikkim',99,1,'admin','admin',NULL,NULL),(31,'Tamil Nadu',99,1,'admin','admin',NULL,NULL),(32,'Telungana',99,1,'admin','admin',NULL,NULL),(33,'Tripura',99,1,'admin','admin',NULL,NULL),(34,'Uttaranchal',99,1,'admin','admin',NULL,NULL),(35,'Uttar Pradesh',99,1,'admin','admin',NULL,NULL),(36,'West Bengal',99,1,'admin','admin',NULL,NULL);

/*Table structure for table `support_info` */

DROP TABLE IF EXISTS `support_info`;

CREATE TABLE `support_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name_support` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `city` int(10) unsigned NOT NULL,
  `state` int(10) NOT NULL,
  `country` int(10) unsigned NOT NULL,
  `pincode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `support_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `photo` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `doctor_doctor_id_foreign` (`user_id`),
  KEY `doctor_city_foreign` (`city`),
  KEY `doctor_country_foreign` (`country`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `support_info` */

insert  into `support_info`(`id`,`user_id`,`name_support`,`address`,`city`,`state`,`country`,`pincode`,`telephone`,`mobile`,`email`,`support_code`,`photo`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,16,'Aone Supporters','Gandhi Nagar',15,31,99,'600019','04420553423','9876543212','aonesupport@gmail.com','1212121212','','vendor','vendor','2017-12-28 00:00:00','2017-12-28 00:00:00');

/*Table structure for table `terminals` */

DROP TABLE IF EXISTS `terminals`;

CREATE TABLE `terminals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `terminals_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `terminals_status` tinyint(4) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `modified_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `terminals` */

insert  into `terminals`(`id`,`terminals_name`,`terminals_status`,`created_by`,`modified_by`,`created_at`,`updated_at`) values (1,'BANGALORE - ICD/WFD (WHITEFIELD)',1,'admin','vendor',NULL,'2017-12-18 00:00:00'),(2,'CHENNAI - CFS/TNPM (TONDIARPET)',1,'admin','admin',NULL,NULL),(3,'CHENNAI - HOM (HARBOUR)',1,'admin','admin',NULL,NULL),(4,'COCHIN - RCT/CHTS (COCHIN)',1,'admin','admin',NULL,NULL),(5,'TUTICORIN - CFS/MVN (MILAVITTAN)',1,'admin','admin',NULL,NULL),(6,'MADURAI - ICD/KON (KOODAL NAGAR)',1,'admin','admin',NULL,NULL),(7,'IRUGAR - ICD/IGU (IRUGUR)',1,'admin','admin',NULL,NULL),(8,'SALEM - CRT/SAMT (SALEM)',1,'admin','CHENNAI CUSTOMS',NULL,'2017-12-20 00:00:00'),(9,'TIRUPPUR - ICD/TUP (TIRUPPUR)',1,'admin','vendor',NULL,'2017-12-22 00:00:00');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmed` tinyint(4) DEFAULT NULL,
  `delete_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`confirmation_code`,`confirmed`,`delete_status`,`created_at`,`updated_at`) values (1,'admin','admin@ssgaeseal.com','e10adc3949ba59abbe56e057f20f883e','',NULL,1,1,NULL,'2017-11-29 09:31:51'),(2,'vendor','vendor@ssgaeseal.com','e10adc3949ba59abbe56e057f20f883e','',NULL,1,1,NULL,'2017-11-29 09:31:51'),(7,'EXP One India','alagirivimal@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,'2017-12-09 00:00:00','2017-12-09 00:00:00'),(8,'AK Exporter','akexporter@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,NULL,'2017-12-29 00:00:00'),(9,'SASI AND CO','sasiandco@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,0,NULL,'2017-12-29 00:00:00'),(10,'Kishore Export','kishore@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,NULL,NULL),(11,'KRISHNA EXPORTER','krishnan@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,NULL,NULL),(12,'AMMA EXPORTER','amma@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,'2017-12-11 00:00:00','2017-12-11 00:00:00'),(13,'CHENNAI CUSTOMS','customschennai@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,'2017-12-14 00:00:00','2017-12-29 00:00:00'),(15,'Vimal','vimal@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,NULL,NULL),(16,'Aone Support','aonesupport@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,'2017-12-28 00:00:00','2017-12-29 00:00:00'),(17,'RL Exporter','rajalakshmi612@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,'2017-12-29 00:00:00','2017-12-29 00:00:00');

/*Table structure for table `vendor_info` */

DROP TABLE IF EXISTS `vendor_info`;

CREATE TABLE `vendor_info` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `name_vendor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_person` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci,
  `city` int(10) unsigned DEFAULT NULL,
  `state` int(10) DEFAULT NULL,
  `country` int(10) unsigned DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gstin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pan_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vendor_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8_unicode_ci,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `vendor_info` */

insert  into `vendor_info`(`id`,`user_id`,`name_vendor`,`name_person`,`address`,`city`,`state`,`country`,`telephone`,`mobile`,`email`,`gstin`,`pan_number`,`vendor_code`,`photo`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,2,'Vendor Name','Person Name',NULL,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ADMIN','ADMIN','2017-11-29 12:12:12','2017-11-29 12:12:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
