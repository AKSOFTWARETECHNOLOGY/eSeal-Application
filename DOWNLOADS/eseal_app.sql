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
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `brancher_info` */

insert  into `brancher_info`(`id`,`user_id`,`exporter_id`,`name_person`,`address`,`city`,`state`,`country`,`pincode`,`telephone`,`mobile`,`email`,`photo`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,15,7,'Vimal','Villivakkam',15,31,99,'600049','','9841486644','vimal@gmail.com',NULL,'User','User','2017-12-15 00:00:00','2017-12-15 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `complaint_enquiry` */

insert  into `complaint_enquiry`(`id`,`sender_id`,`receiver_id`,`subject`,`message`,`enquiry_id`,`read_status`,`complaint_status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,7,2,'demo','demo',0,1,1,'User','vendor','2017-12-22 16:10:17','2017-12-22 00:00:00'),(2,7,2,'sample','sample demo',0,1,1,'User','vendor','2017-12-22 16:17:59','2017-12-22 00:00:00'),(4,2,7,'demo','reply message',1,0,1,'User','User','2017-12-18 17:22:57','2017-12-18 00:00:00'),(6,7,2,'demo','sdfsdgsdg',1,0,1,'User','User','2017-12-18 18:02:29','2017-12-18 00:00:00'),(7,2,7,'demo','NONE',1,0,1,'User','User','2017-12-18 00:00:00','2017-12-18 00:00:00'),(8,2,7,'demo','21122017',1,0,1,'User','User','2017-12-21 00:00:00','2017-12-21 00:00:00'),(9,2,7,'demo','121212',1,0,1,'User','User','2017-12-21 00:00:00','2017-12-21 00:00:00'),(10,2,7,'sample','NONE',2,0,1,'User','User','2017-12-21 00:00:00','2017-12-21 00:00:00'),(11,2,7,'sample','reply',2,0,1,'User','User','2017-12-22 00:00:00','2017-12-22 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `customs_info` */

insert  into `customs_info`(`id`,`user_id`,`name_customs`,`address`,`city`,`state`,`country`,`telephone`,`mobile`,`email`,`port`,`terminal`,`customs_code`,`photo`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,13,'CHENNAI CUSTOMS','CHENNAI',15,31,99,'','','customschennai@gmail.com',1,3,'INC123456','','vendor','vendor','2017-12-14 00:00:00','2017-12-22 00:00:00');

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
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `exporter_address` */

insert  into `exporter_address`(`id`,`user_id`,`name`,`address`,`city`,`state`,`country`,`pincode`,`mobile`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (3,8,'Alagirivimal Kottaimuthu','Villivakkam',15,31,99,'600049','','User','User','2017-12-09 00:00:00','2017-12-09 00:00:00'),(4,9,'SASIKALA','VIllivakkam',15,31,99,'600049','','User','User','2017-12-09 00:00:00','2017-12-09 00:00:00'),(5,10,'Kishore','Chetpet',15,31,99,'600031','','User','User','2017-12-10 00:00:00','2017-12-10 00:00:00'),(6,11,'KRISHNAN','ANNA NAGAR',15,31,99,'600040','9845698456','User','User','2017-12-10 00:00:00','2017-12-10 00:00:00'),(7,12,'AMMA','MADURAI',57,31,99,'625221','','vendor','vendor','2017-12-11 00:00:00','2017-12-11 00:00:00'),(8,7,'Kishore','Villivakkam ',15,31,99,'600049','9898989898','User','User','2017-12-11 00:00:00','2017-12-11 00:00:00'),(9,7,'Alagirivimal','Sidco Nagar, Villivakkam',15,31,99,'600049','9841486644','User','User','2017-12-15 00:00:00','2017-12-15 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `exporter_info` */

insert  into `exporter_info`(`id`,`user_id`,`name_exporter`,`name_person`,`address`,`city`,`state`,`country`,`pincode`,`telephone`,`mobile`,`email`,`gstin`,`pan_number`,`iec_code`,`photo`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (2,7,'EXP One India','Alagirivimal','Annanagar',15,31,99,'600040','9898989898','9898989898','alagirivimal@gmail.com','12121212','12121212','12121212','','vendor','vendor','2017-12-09 00:00:00','2017-12-09 00:00:00'),(3,8,'AK Exporter','Alagirivimal Kottaimuthu','Villivakkam',15,31,99,'600049','04443831118','9940143811','akexporter@gmail.com','','','1984198744','','User','User','2017-12-09 00:00:00','2017-12-09 00:00:00'),(4,9,'SASI AND CO','SASIKALA','VIllivakkam',15,31,99,'600049','04443831118','9898989898','sasiandco@gmail.com','','','1987198466','','User','User','2017-12-09 00:00:00','2017-12-09 00:00:00'),(5,10,'Kishore Export','Kishore','Chetpet',15,31,99,'600031','09898989898','9898989898','kishore@gmail.com','','','1994199494','','User','User','2017-12-10 00:00:00','2017-12-10 00:00:00'),(6,11,'KRISHNA EXPORTER','KRISHNAN','ANNA NAGAR',15,31,99,'600040','04445612389','9845698456','krishnan@gmail.com','','','1975197519',NULL,'User','User','2017-12-10 00:00:00','2017-12-10 00:00:00'),(7,12,'AMMA EXPORTER','AMMA','MADURAI',57,31,99,'625221','','','amma@gmail.com','12121212121221','121212121','12124578',NULL,'vendor','vendor','2017-12-11 00:00:00','2017-12-11 00:00:00');

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
  `ports_status` tinyint(4) NOT NULL,
  `created_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `modified_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `ports` */

insert  into `ports`(`id`,`ports_name`,`ports_status`,`created_by`,`modified_by`,`created_at`,`updated_at`) values (1,'Chennai Port',1,'admin','vendor',NULL,'2017-12-15 00:00:00'),(2,'Ennore Port',1,'admin','admin',NULL,NULL),(3,'Kattupalli Port',1,'admin','admin',NULL,NULL),(4,'Tuticorin Port',1,'admin','admin',NULL,NULL),(5,'Cochin Port',1,'admin','admin',NULL,NULL),(6,'Kolkata Port',0,'admin','admin',NULL,NULL),(7,'Paradip Port',0,'admin','admin',NULL,NULL),(8,'New Mangalore Port',0,'admin','admin',NULL,NULL),(9,'Jawaharlal Nehru Port',0,'admin','admin',NULL,NULL),(10,'Mumbai Port',0,'admin','admin',NULL,NULL),(11,'Kandla Port',0,'admin','admin',NULL,NULL),(12,'Vishakhapatnam Port',0,'admin','admin',NULL,NULL),(13,'Mormugao Port',0,'admin','admin',NULL,NULL),(14,'Port Blair Port',0,'admin','admin',NULL,NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=303 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_info` */

insert  into `product_info`(`id`,`user_id`,`product_id`,`product_unicode`,`product_sealcode`,`product_sale_price`,`product_exporter_id`,`product_sale_status`,`product_sale_date`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,2,1,'SSG100000001','SSGA10000001','0.00',7,1,'2017-12-20','ADMIN','vendor','2017-11-29 12:12:12','2017-12-09 00:00:00'),(2,2,1,'SSG100000002','SSGA10000002','0.00',7,1,'2017-12-20','ADMIN','vendor','2017-11-29 12:12:12','2017-12-09 00:00:00'),(4,2,1,'SSG100000003','SSGA10000003','0.00',7,1,'2017-12-20','vendor','vendor','2017-12-09 00:00:00','2017-12-09 00:00:00'),(5,2,1,'SSG100000004','SSGA10000004','0.00',7,1,'2017-12-20','vendor','vendor',NULL,NULL),(6,2,1,'SSG100000005','SSGA10000005','0.00',7,1,'2017-12-20','vendor','vendor',NULL,NULL),(7,2,1,'SSG100000006','SSGA10000006','0.00',7,1,'2017-12-20','vendor','vendor',NULL,NULL),(8,2,1,'SSG100000007','SSGA10000007','0.00',7,1,'2017-12-20','vendor','vendor',NULL,NULL),(9,2,1,'SSG100000008','SSGA10000008','0.00',7,1,'2017-12-20','vendor','vendor',NULL,NULL),(10,2,1,'SSG100000009','SSGA10000009','0.00',7,1,'2017-12-20','vendor','vendor',NULL,NULL),(11,2,1,'SSG100000010','SSGA10000010','0.00',7,1,'2017-12-20','vendor','vendor',NULL,NULL),(12,2,1,'SSG100000011','SSGA10000011','0.00',0,0,'','vendor','vendor',NULL,NULL),(13,2,1,'SSG100000012','SSGA10000012','0.00',0,0,'','vendor','vendor',NULL,NULL),(14,2,1,'SSG100000013','SSGA10000013','0.00',0,0,'','vendor','vendor',NULL,NULL),(15,2,1,'SSG100000014','SSGA10000014','0.00',0,0,'','vendor','vendor',NULL,NULL),(16,2,1,'SSG100000015','SSGA10000015','0.00',0,0,'','vendor','vendor',NULL,NULL),(17,2,1,'SSG100000016','SSGA10000016','0.00',0,0,'','vendor','vendor',NULL,NULL),(18,2,1,'SSG100000017','SSGA10000017','0.00',0,0,'','vendor','vendor',NULL,NULL),(19,2,1,'SSG100000018','SSGA10000018','0.00',0,0,'','vendor','vendor',NULL,NULL),(20,2,1,'SSG100000019','SSGA10000019','0.00',0,0,'','vendor','vendor',NULL,NULL),(21,2,1,'SSG100000020','SSGA10000020','0.00',0,0,'','vendor','vendor',NULL,NULL),(23,2,1,'','SSGA10000021','299.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(25,2,1,'SSGA10000022','SSGA10000022','299.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(26,2,1,'SSGA10000023','SSGA10000023','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(27,2,1,'SSGA10000024','SSGA10000024','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(28,2,1,'SSGA10000025','SSGA10000025','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(29,2,1,'SSGA10000026','SSGA10000026','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(30,2,1,'SSGA10000027','SSGA10000027','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(31,2,1,'SSGA10000028','SSGA10000028','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(32,2,1,'SSGA10000029','SSGA10000029','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(33,2,1,'SSGA10000030','SSGA10000030','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(34,2,1,'SSGA10000031','SSGA10000031','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(35,2,1,'SSGA10000032','SSGA10000032','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(36,2,1,'SSGA10000033','SSGA10000033','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(37,2,1,'SSGA10000034','SSGA10000034','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(38,2,1,'SSGA10000035','SSGA10000035','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(39,2,1,'SSGA10000036','SSGA10000036','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(40,2,1,'SSGA10000037','SSGA10000037','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(41,2,1,'SSGA10000038','SSGA10000038','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(42,2,1,'SSGA10000039','SSGA10000039','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(43,2,1,'SSGA10000040','SSGA10000040','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(44,2,1,'SSGA10000041','SSGA10000041','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(45,2,1,'SSGA10000042','SSGA10000042','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(46,2,1,'SSGA10000043','SSGA10000043','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(47,2,1,'SSGA10000044','SSGA10000044','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(48,2,1,'SSGA10000045','SSGA10000045','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(49,2,1,'SSGA10000046','SSGA10000046','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(50,2,1,'SSGA10000047','SSGA10000047','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(51,2,1,'SSGA10000048','SSGA10000048','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(52,2,1,'SSGA10000049','SSGA10000049','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(53,2,1,'SSGA10000050','SSGA10000050','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(54,2,1,'SSGA10000051','SSGA10000051','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(55,2,1,'SSGA10000052','SSGA10000052','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(56,2,1,'SSGA10000053','SSGA10000053','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(57,2,1,'SSGA10000054','SSGA10000054','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(58,2,1,'SSGA10000055','SSGA10000055','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(59,2,1,'SSGA10000056','SSGA10000056','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(60,2,1,'SSGA10000057','SSGA10000057','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(61,2,1,'SSGA10000058','SSGA10000058','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(62,2,1,'SSGA10000059','SSGA10000059','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(63,2,1,'SSGA10000060','SSGA10000060','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(64,2,1,'SSGA10000061','SSGA10000061','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(65,2,1,'SSGA10000062','SSGA10000062','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(66,2,1,'SSGA10000063','SSGA10000063','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(67,2,1,'SSGA10000064','SSGA10000064','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(68,2,1,'SSGA10000065','SSGA10000065','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(69,2,1,'SSGA10000066','SSGA10000066','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(70,2,1,'SSGA10000067','SSGA10000067','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(71,2,1,'SSGA10000068','SSGA10000068','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(72,2,1,'SSGA10000069','SSGA10000069','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(73,2,1,'SSGA10000070','SSGA10000070','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(74,2,1,'SSGA10000071','SSGA10000071','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(75,2,1,'SSGA10000072','SSGA10000072','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(76,2,1,'SSGA10000073','SSGA10000073','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(77,2,1,'SSGA10000074','SSGA10000074','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(78,2,1,'SSGA10000075','SSGA10000075','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(79,2,1,'SSGA10000076','SSGA10000076','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(80,2,1,'SSGA10000077','SSGA10000077','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(81,2,1,'SSGA10000078','SSGA10000078','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(82,2,1,'SSGA10000079','SSGA10000079','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(83,2,1,'SSGA10000080','SSGA10000080','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(84,2,1,'SSGA10000081','SSGA10000081','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(85,2,1,'SSGA10000082','SSGA10000082','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(86,2,1,'SSGA10000083','SSGA10000083','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(87,2,1,'SSGA10000084','SSGA10000084','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(88,2,1,'SSGA10000085','SSGA10000085','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(89,2,1,'SSGA10000086','SSGA10000086','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(90,2,1,'SSGA10000087','SSGA10000087','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(91,2,1,'SSGA10000088','SSGA10000088','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(92,2,1,'SSGA10000089','SSGA10000089','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(93,2,1,'SSGA10000090','SSGA10000090','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(94,2,1,'SSGA10000091','SSGA10000091','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(95,2,1,'SSGA10000092','SSGA10000092','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(96,2,1,'SSGA10000093','SSGA10000093','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(97,2,1,'SSGA10000094','SSGA10000094','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(98,2,1,'SSGA10000095','SSGA10000095','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(99,2,1,'SSGA10000096','SSGA10000096','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(100,2,1,'SSGA10000097','SSGA10000097','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(101,2,1,'SSGA10000098','SSGA10000098','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(102,2,1,'SSGA10000099','SSGA10000099','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(103,2,1,'SSGA10000100','SSGA10000100','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(104,2,1,'SSGA10000101','SSGA10000101','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(105,2,1,'SSGA10000102','SSGA10000102','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(106,2,1,'SSGA10000103','SSGA10000103','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(107,2,1,'SSGA10000104','SSGA10000104','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(108,2,1,'SSGA10000105','SSGA10000105','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(109,2,1,'SSGA10000106','SSGA10000106','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(110,2,1,'SSGA10000107','SSGA10000107','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(111,2,1,'SSGA10000108','SSGA10000108','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(112,2,1,'SSGA10000109','SSGA10000109','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(113,2,1,'SSGA10000110','SSGA10000110','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(114,2,1,'SSGA10000111','SSGA10000111','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(115,2,1,'SSGA10000112','SSGA10000112','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(116,2,1,'SSGA10000113','SSGA10000113','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(117,2,1,'SSGA10000114','SSGA10000114','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(118,2,1,'SSGA10000115','SSGA10000115','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(119,2,1,'SSGA10000116','SSGA10000116','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(120,2,1,'SSGA10000117','SSGA10000117','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(121,2,1,'SSGA10000118','SSGA10000118','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(122,2,1,'SSGA10000119','SSGA10000119','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(123,2,1,'SSGA10000120','SSGA10000120','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(124,2,1,'SSGA10000121','SSGA10000121','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(125,2,1,'SSGA10000122','SSGA10000122','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(126,2,1,'SSGA10000123','SSGA10000123','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(127,2,1,'SSGA10000124','SSGA10000124','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(128,2,1,'SSGA10000125','SSGA10000125','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(129,2,1,'SSGA10000126','SSGA10000126','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(130,2,1,'SSGA10000127','SSGA10000127','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(131,2,1,'SSGA10000128','SSGA10000128','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(132,2,1,'SSGA10000129','SSGA10000129','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(133,2,1,'SSGA10000130','SSGA10000130','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(134,2,1,'SSGA10000131','SSGA10000131','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(135,2,1,'SSGA10000132','SSGA10000132','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(136,2,1,'SSGA10000133','SSGA10000133','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(137,2,1,'SSGA10000134','SSGA10000134','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(138,2,1,'SSGA10000135','SSGA10000135','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(139,2,1,'SSGA10000136','SSGA10000136','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(140,2,1,'SSGA10000137','SSGA10000137','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(141,2,1,'SSGA10000138','SSGA10000138','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(142,2,1,'SSGA10000139','SSGA10000139','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(143,2,1,'SSGA10000140','SSGA10000140','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(144,2,1,'SSGA10000141','SSGA10000141','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(145,2,1,'SSGA10000142','SSGA10000142','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(146,2,1,'SSGA10000143','SSGA10000143','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(147,2,1,'SSGA10000144','SSGA10000144','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(148,2,1,'SSGA10000145','SSGA10000145','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(149,2,1,'SSGA10000146','SSGA10000146','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(150,2,1,'SSGA10000147','SSGA10000147','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(151,2,1,'SSGA10000148','SSGA10000148','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(152,2,1,'SSGA10000149','SSGA10000149','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(153,2,1,'SSGA10000150','SSGA10000150','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(154,2,1,'SSGA10000151','SSGA10000151','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(155,2,1,'SSGA10000152','SSGA10000152','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(156,2,1,'SSGA10000153','SSGA10000153','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(157,2,1,'SSGA10000154','SSGA10000154','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(158,2,1,'SSGA10000155','SSGA10000155','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(159,2,1,'SSGA10000156','SSGA10000156','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(160,2,1,'SSGA10000157','SSGA10000157','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(161,2,1,'SSGA10000158','SSGA10000158','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(162,2,1,'SSGA10000159','SSGA10000159','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(163,2,1,'SSGA10000160','SSGA10000160','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(164,2,1,'SSGA10000161','SSGA10000161','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(165,2,1,'SSGA10000162','SSGA10000162','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(166,2,1,'SSGA10000163','SSGA10000163','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(167,2,1,'SSGA10000164','SSGA10000164','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(168,2,1,'SSGA10000165','SSGA10000165','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(169,2,1,'SSGA10000166','SSGA10000166','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(170,2,1,'SSGA10000167','SSGA10000167','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(171,2,1,'SSGA10000168','SSGA10000168','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(172,2,1,'SSGA10000169','SSGA10000169','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(173,2,1,'SSGA10000170','SSGA10000170','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(174,2,1,'SSGA10000171','SSGA10000171','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(175,2,1,'SSGA10000172','SSGA10000172','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(176,2,1,'SSGA10000173','SSGA10000173','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(177,2,1,'SSGA10000174','SSGA10000174','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(178,2,1,'SSGA10000175','SSGA10000175','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(179,2,1,'SSGA10000176','SSGA10000176','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(180,2,1,'SSGA10000177','SSGA10000177','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(181,2,1,'SSGA10000178','SSGA10000178','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(182,2,1,'SSGA10000179','SSGA10000179','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(183,2,1,'SSGA10000180','SSGA10000180','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(184,2,1,'SSGA10000181','SSGA10000181','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(185,2,1,'SSGA10000182','SSGA10000182','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(186,2,1,'SSGA10000183','SSGA10000183','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(187,2,1,'SSGA10000184','SSGA10000184','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(188,2,1,'SSGA10000185','SSGA10000185','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(189,2,1,'SSGA10000186','SSGA10000186','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(190,2,1,'SSGA10000187','SSGA10000187','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(191,2,1,'SSGA10000188','SSGA10000188','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(192,2,1,'SSGA10000189','SSGA10000189','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(193,2,1,'SSGA10000190','SSGA10000190','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(194,2,1,'SSGA10000191','SSGA10000191','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(195,2,1,'SSGA10000192','SSGA10000192','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(196,2,1,'SSGA10000193','SSGA10000193','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(197,2,1,'SSGA10000194','SSGA10000194','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(198,2,1,'SSGA10000195','SSGA10000195','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(199,2,1,'SSGA10000196','SSGA10000196','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(200,2,1,'SSGA10000197','SSGA10000197','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(201,2,1,'SSGA10000198','SSGA10000198','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(202,2,1,'SSGA10000199','SSGA10000199','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(203,2,1,'SSGA10000200','SSGA10000200','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(204,2,1,'SSGA10000201','SSGA10000201','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(205,2,1,'SSGA10000202','SSGA10000202','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(206,2,1,'SSGA10000203','SSGA10000203','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(207,2,1,'SSGA10000204','SSGA10000204','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(208,2,1,'SSGA10000205','SSGA10000205','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(209,2,1,'SSGA10000206','SSGA10000206','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(210,2,1,'SSGA10000207','SSGA10000207','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(211,2,1,'SSGA10000208','SSGA10000208','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(212,2,1,'SSGA10000209','SSGA10000209','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(213,2,1,'SSGA10000210','SSGA10000210','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(214,2,1,'SSGA10000211','SSGA10000211','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(215,2,1,'SSGA10000212','SSGA10000212','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(216,2,1,'SSGA10000213','SSGA10000213','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(217,2,1,'SSGA10000214','SSGA10000214','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(218,2,1,'SSGA10000215','SSGA10000215','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(219,2,1,'SSGA10000216','SSGA10000216','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(220,2,1,'SSGA10000217','SSGA10000217','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(221,2,1,'SSGA10000218','SSGA10000218','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(222,2,1,'SSGA10000219','SSGA10000219','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(223,2,1,'SSGA10000220','SSGA10000220','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(224,2,1,'SSGA10000221','SSGA10000221','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(225,2,1,'SSGA10000222','SSGA10000222','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(226,2,1,'SSGA10000223','SSGA10000223','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(227,2,1,'SSGA10000224','SSGA10000224','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(228,2,1,'SSGA10000225','SSGA10000225','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(229,2,1,'SSGA10000226','SSGA10000226','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(230,2,1,'SSGA10000227','SSGA10000227','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(231,2,1,'SSGA10000228','SSGA10000228','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(232,2,1,'SSGA10000229','SSGA10000229','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(233,2,1,'SSGA10000230','SSGA10000230','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(234,2,1,'SSGA10000231','SSGA10000231','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(235,2,1,'SSGA10000232','SSGA10000232','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(236,2,1,'SSGA10000233','SSGA10000233','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(237,2,1,'SSGA10000234','SSGA10000234','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(238,2,1,'SSGA10000235','SSGA10000235','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(239,2,1,'SSGA10000236','SSGA10000236','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(240,2,1,'SSGA10000237','SSGA10000237','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(241,2,1,'SSGA10000238','SSGA10000238','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(242,2,1,'SSGA10000239','SSGA10000239','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(243,2,1,'SSGA10000240','SSGA10000240','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(244,2,1,'SSGA10000241','SSGA10000241','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(245,2,1,'SSGA10000242','SSGA10000242','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(246,2,1,'SSGA10000243','SSGA10000243','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(247,2,1,'SSGA10000244','SSGA10000244','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(248,2,1,'SSGA10000245','SSGA10000245','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(249,2,1,'SSGA10000246','SSGA10000246','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(250,2,1,'SSGA10000247','SSGA10000247','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(251,2,1,'SSGA10000248','SSGA10000248','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(252,2,1,'SSGA10000249','SSGA10000249','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(253,2,1,'SSGA10000250','SSGA10000250','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(254,2,1,'SSGA10000251','SSGA10000251','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(255,2,1,'SSGA10000252','SSGA10000252','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(256,2,1,'SSGA10000253','SSGA10000253','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(257,2,1,'SSGA10000254','SSGA10000254','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(258,2,1,'SSGA10000255','SSGA10000255','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(259,2,1,'SSGA10000256','SSGA10000256','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(260,2,1,'SSGA10000257','SSGA10000257','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(261,2,1,'SSGA10000258','SSGA10000258','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(262,2,1,'SSGA10000259','SSGA10000259','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(263,2,1,'SSGA10000260','SSGA10000260','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(264,2,1,'SSGA10000261','SSGA10000261','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(265,2,1,'SSGA10000262','SSGA10000262','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(266,2,1,'SSGA10000263','SSGA10000263','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(267,2,1,'SSGA10000264','SSGA10000264','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(268,2,1,'SSGA10000265','SSGA10000265','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(269,2,1,'SSGA10000266','SSGA10000266','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(270,2,1,'SSGA10000267','SSGA10000267','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(271,2,1,'SSGA10000268','SSGA10000268','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(272,2,1,'SSGA10000269','SSGA10000269','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(273,2,1,'SSGA10000270','SSGA10000270','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(274,2,1,'SSGA10000271','SSGA10000271','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(275,2,1,'SSGA10000272','SSGA10000272','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(276,2,1,'SSGA10000273','SSGA10000273','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(277,2,1,'SSGA10000274','SSGA10000274','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(278,2,1,'SSGA10000275','SSGA10000275','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(279,2,1,'SSGA10000276','SSGA10000276','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(280,2,1,'SSGA10000277','SSGA10000277','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(281,2,1,'SSGA10000278','SSGA10000278','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(282,2,1,'SSGA10000279','SSGA10000279','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(283,2,1,'SSGA10000280','SSGA10000280','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(284,2,1,'SSGA10000281','SSGA10000281','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(285,2,1,'SSGA10000282','SSGA10000282','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(286,2,1,'SSGA10000283','SSGA10000283','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(287,2,1,'SSGA10000284','SSGA10000284','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(288,2,1,'SSGA10000285','SSGA10000285','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(289,2,1,'SSGA10000286','SSGA10000286','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(290,2,1,'SSGA10000287','SSGA10000287','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(291,2,1,'SSGA10000288','SSGA10000288','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(292,2,1,'SSGA10000289','SSGA10000289','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(293,2,1,'SSGA10000290','SSGA10000290','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(294,2,1,'SSGA10000291','SSGA10000291','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(295,2,1,'SSGA10000292','SSGA10000292','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(296,2,1,'SSGA10000293','SSGA10000293','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(297,2,1,'SSGA10000294','SSGA10000294','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(298,2,1,'SSGA10000295','SSGA10000295','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(299,2,1,'SSGA10000296','SSGA10000296','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(300,2,1,'SSGA10000297','SSGA10000297','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(301,2,1,'SSGA10000298','SSGA10000298','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00'),(302,2,1,'SSGA10000299','SSGA10000299','0.00',NULL,0,NULL,'vendor','vendor','2017-12-22 00:00:00','2017-12-22 00:00:00');

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
  `product_sale_total` decimal(15,2) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_order` */

insert  into `product_order`(`id`,`user_id`,`product_exporter_id`,`product_id`,`product_order_id`,`product_sale_quantity`,`product_sale_price`,`product_sale_gst`,`product_sale_delivery`,`product_sale_total`,`product_sale_type`,`product_sale_status`,`product_sale_date`,`product_sale_payment_type`,`product_sale_payment_notes`,`product_delivery_name`,`product_delivery_address`,`product_delivery_city`,`product_delivery_state`,`product_delivery_country`,`product_delivery_pincode`,`product_delivery_mobile`,`product_delivery_type`,`product_delivery_status`,`product_delivery_date`,`product_estimate_delivery_days`,`product_estimate_delivery_charge`,`product_order_status`,`product_order_date`,`product_order_note`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (19,7,7,1,'100000001513769437',10,'299.00','0.00','0.00','2990.00',1,0,'2017-12-20',1,'NONE','Kishore','Villivakkam ',15,31,99,600049,'9898989898',0,0,'0',NULL,NULL,0,'2017-12-19',NULL,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_order_info` */

insert  into `product_order_info`(`id`,`user_id`,`product_id`,`product_order_id`,`product_unicode`,`product_sealcode`,`product_exporter_id`,`seal_type`,`cfs_reach_time`,`zone`,`commissionerate`,`shipping_no`,`shipping_date`,`iec_no`,`pan_no`,`gst_no`,`sealing_date`,`sealing_time`,`destination_port`,`terminal_name`,`container_size`,`container_no`,`trailer_truck_no`,`driver_name`,`driver_licence`,`driver_number`,`form_no`,`eway_no`,`notes`,`customs_approve_status`,`customs_approve_note`,`customs_approve_date`,`customs_approve_time`,`product_item_status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (61,7,1,19,'SSG100000001','SSGA10000001',7,1,'12:59',NULL,NULL,'123456','2017-12-23','12121212','12121212','12121212','2017-12-23','12:59',2,2,'1','2','124563','Vimal','54793121','7896554','111','111','NONE',1,NULL,'2017-12-20','01:29:53',1,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(62,7,1,19,'SSG100000002','SSGA10000002',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,'2007-12-21','02:55:53',1,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(63,7,1,19,'SSG100000003','SSGA10000003',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(64,7,1,19,'SSG100000004','SSGA10000004',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(65,7,1,19,'SSG100000005','SSGA10000005',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(66,7,1,19,'SSG100000006','SSGA10000006',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(67,7,1,19,'SSG100000007','SSGA10000007',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(68,7,1,19,'SSG100000008','SSGA10000008',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(69,7,1,19,'SSG100000009','SSGA10000009',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(70,7,1,19,'SSG100000010','SSGA10000010',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `product_order_info_item` */

insert  into `product_order_info_item`(`id`,`user_id`,`product_id`,`product_order_id`,`product_unicode`,`product_sealcode`,`product_exporter_id`,`seal_type`,`cfs_reach_time`,`zone`,`commissionerate`,`shipping_no`,`shipping_date`,`iec_no`,`pan_no`,`gst_no`,`sealing_date`,`sealing_time`,`destination_port`,`terminal_name`,`container_size`,`container_no`,`trailer_truck_no`,`driver_name`,`driver_licence`,`driver_number`,`form_no`,`eway_no`,`notes`,`customs_approve_status`,`customs_approve_note`,`customs_approve_date`,`customs_approve_time`,`product_item_status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (61,7,1,19,'SSG100000001','SSGA10000001',7,NULL,NULL,NULL,NULL,NULL,'((NULL)',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(62,7,1,19,'SSG100000002','SSGA10000002',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(63,7,1,19,'SSG100000003','SSGA10000003',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(64,7,1,19,'SSG100000004','SSGA10000004',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(65,7,1,19,'SSG100000005','SSGA10000005',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(66,7,1,19,'SSG100000006','SSGA10000006',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(67,7,1,19,'SSG100000007','SSGA10000007',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(68,7,1,19,'SSG100000008','SSGA10000008',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(69,7,1,19,'SSG100000009','SSGA10000009',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00'),(70,7,1,19,'SSG100000010','SSGA10000010',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL,0,'User','User','2017-12-20 00:00:00','2017-12-20 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`user_id`,`product_name`,`product_info`,`product_photo`,`product_price`,`product_status`,`created_by`,`updated_by`,`created_at`,`updated_at`) values (1,2,'RFID E-SEAL','The other name is E-Seal(electronic seal) or RFID seal(Radio Frequency Identification).  The E-seal has many types that has active, passive and semi-active. The passive E-seal is without battery.\r\n\r\nIt can substitute for tradition seals that often applies on gas, oil, truck and container. It can prevent the goods to steal by thief when customer build the security system. It also can provide automatic identification and help you to manage  the trucks or containers. \r\n\r\nMany Customs will use it to implement certification system of authorized economic operator (AEO) and use E-seal to enhance the efficiency of Customs clearance. ','../uploads/book/1505824859_health-concern.png','299.00',1,'ADMIN','vendor','2017-11-29 12:12:12','2017-12-09 00:00:00');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `role_user` */

insert  into `role_user`(`id`,`user_id`,`role_id`,`created_at`,`updated_at`) values (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(6,7,3,NULL,NULL),(7,8,3,NULL,NULL),(8,9,3,NULL,NULL),(9,10,3,NULL,NULL),(10,11,3,NULL,NULL),(11,12,3,NULL,NULL),(12,13,4,NULL,NULL),(14,15,6,NULL,NULL);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `support_info` */

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`password`,`remember_token`,`confirmation_code`,`confirmed`,`delete_status`,`created_at`,`updated_at`) values (1,'admin','admin@ssgaeseal.com','e10adc3949ba59abbe56e057f20f883e','',NULL,1,1,NULL,'2017-11-29 09:31:51'),(2,'vendor','vendor@ssgaeseal.com','e10adc3949ba59abbe56e057f20f883e','',NULL,1,1,NULL,'2017-11-29 09:31:51'),(7,'EXP One India','alagirivimal@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,'2017-12-09 00:00:00','2017-12-09 00:00:00'),(8,'AK Exporter','akexporter@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,NULL,NULL),(9,'SASI AND CO','sasiandco@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,NULL,NULL),(10,'Kishore Export','kishore@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,NULL,NULL),(11,'KRISHNA EXPORTER','krishnan@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,NULL,NULL),(12,'AMMA EXPORTER','amma@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,'2017-12-11 00:00:00','2017-12-11 00:00:00'),(13,'CHENNAI CUSTOMS','customschennai@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,1,'2017-12-14 00:00:00','2017-12-14 00:00:00'),(15,'Vimal','vimal@gmail.com','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,1,0,NULL,NULL);

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
