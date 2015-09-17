-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: globus
-- ------------------------------------------------------
-- Server version	5.5.44-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `AdminNavigation`
--

DROP TABLE IF EXISTS `AdminNavigation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `AdminNavigation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `sort` int(10) unsigned NOT NULL,
  `parent` int(10) unsigned DEFAULT '0',
  `menuType` tinyint(2) unsigned DEFAULT NULL COMMENT '1 - top \r\n2 - bottom\r \n3 - left',
  `icon` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `AdminNavigation`
--

LOCK TABLES `AdminNavigation` WRITE;
/*!40000 ALTER TABLE `AdminNavigation` DISABLE KEYS */;
INSERT INTO `AdminNavigation` VALUES (1,'Galleries','/gallery/index',1,0,NULL,''),(5,'Pages','/post/index',5,0,NULL,''),(8,'Users','/user/index',8,0,NULL,''),(10,'Dictionary','/message/index',7,0,NULL,''),(16,'Blueprints','/blueprint/index',2,NULL,NULL,'');
/*!40000 ALTER TABLE `AdminNavigation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Blueprint`
--

DROP TABLE IF EXISTS `Blueprint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Blueprint` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imgUrl` varchar(255) DEFAULT NULL,
  `defaultTitle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Blueprint`
--

LOCK TABLES `Blueprint` WRITE;
/*!40000 ALTER TABLE `Blueprint` DISABLE KEYS */;
INSERT INTO `Blueprint` VALUES (1,'1.jpg','I ЭТАЖ'),(2,'2.jpg','II ЭТАЖ'),(3,'3.jpg','III ЭТАЖ'),(4,'4.jpg','IV ЭТАЖ'),(5,'5.jpg','V ЭТАЖ'),(6,'6.jpg','VI ЭТАЖ'),(7,'7.jpg','VII ЭТАЖ'),(8,'8.jpg','РЕСТОРАННЫЙ ДВОРИК'),(9,'9.jpg','XI-XIV ЭТАЖИ'),(10,'10.jpg','XV-XVI ЭТАЖИ');
/*!40000 ALTER TABLE `Blueprint` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `BlueprintTranslation`
--

DROP TABLE IF EXISTS `BlueprintTranslation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `BlueprintTranslation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `blueprintID` int(10) unsigned DEFAULT NULL,
  `language` char(2) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blueprintID` (`blueprintID`),
  CONSTRAINT `B_FK1` FOREIGN KEY (`blueprintID`) REFERENCES `Blueprint` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `BlueprintTranslation`
--

LOCK TABLES `BlueprintTranslation` WRITE;
/*!40000 ALTER TABLE `BlueprintTranslation` DISABLE KEYS */;
INSERT INTO `BlueprintTranslation` VALUES (1,1,'ru','I ЭТАЖ','Полезная площадь – 1894 м2 / Торговая площадь – 1035 м2 / Коридоры – 860 м2'),(2,2,'ru','II ЭТАЖ','Полезная площадь – 1894 м2 / Торговая площадь – 1245 м2 / Коридоры – 860 м2'),(3,3,'ru','III ЭТАЖ','Полезная площадь – 1894 м2 / Торговая площадь – 1245 м2 / Коридоры – 860 м2'),(4,4,'ru','IV ЭТАЖ','Полезная площадь – 2103 м2 / Торговая площадь – 1267 м2 / Коридоры – 836 м2'),(5,5,'ru','V ЭТАЖ','Полезная площадь – 1894 м2 / Торговая площадь – 1565 м2 / Коридоры – 329 м2'),(6,6,'ru','VI ЭТАЖ','Полезная площадь – 1894 м2 / Торговая площадь – 1565 м2 / Коридоры – 329 м2'),(7,7,'ru','VII ЭТАЖ','Полезная площадь – 1894 м2 / Торговая площадь – 1565 м2 / Коридоры – 329 м2'),(8,8,'ru','РЕСТОРАННЫЙ ДВОРИК','Полезная площадь – 1894 м2 / Торговая площадь – 800 м2 / Коридоры – 860 м2'),(9,9,'ru','XI-XIV ЭТАЖИ','Полезная площадь – 2039 м2 / Торговая площадь – 1630 м2 / Коридоры – 409 м2'),(10,10,'ru','XV-XVI ЭТАЖИ','Полезная площадь – 1690 м2 / Торговая площадь – 1350 м2 / Коридоры – 340 м2');
/*!40000 ALTER TABLE `BlueprintTranslation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Gallery`
--

DROP TABLE IF EXISTS `Gallery`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Gallery` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `withContentOnly` tinyint(1) DEFAULT '0',
  `imgUrl` varchar(255) DEFAULT NULL,
  `defaultTitle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gallery`
--

LOCK TABLES `Gallery` WRITE;
/*!40000 ALTER TABLE `Gallery` DISABLE KEYS */;
INSERT INTO `Gallery` VALUES (36,'2015-05-03 18:22:25',1,NULL,'Торговый центр'),(37,'2015-05-05 22:04:11',1,NULL,'Бизнес центр');
/*!40000 ALTER TABLE `Gallery` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GalleryMedia`
--

DROP TABLE IF EXISTS `GalleryMedia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GalleryMedia` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(1) DEFAULT '1' COMMENT 'Tip',
  `url` varchar(255) DEFAULT NULL,
  `galleryID` int(10) unsigned DEFAULT NULL,
  `default` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `galleryID` (`galleryID`),
  CONSTRAINT `GM_FK1` FOREIGN KEY (`galleryID`) REFERENCES `Gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GalleryMedia`
--

LOCK TABLES `GalleryMedia` WRITE;
/*!40000 ALTER TABLE `GalleryMedia` DISABLE KEYS */;
INSERT INTO `GalleryMedia` VALUES (43,1,'36_5546688936bf8.jpg',36,0),(44,1,'36_5546688e1f001.jpg',36,0),(47,1,'37_5549d493f413d.jpg',37,0),(48,1,'37_5549d4a86eb4f.JPG',37,0),(49,1,'37_5549d4b9cfadb.JPG',37,0);
/*!40000 ALTER TABLE `GalleryMedia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `GalleryTranslation`
--

DROP TABLE IF EXISTS `GalleryTranslation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `GalleryTranslation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `galleryID` int(10) unsigned NOT NULL,
  `language` varchar(2) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `GT_UC1` (`galleryID`,`language`),
  CONSTRAINT `GT_FK1` FOREIGN KEY (`galleryID`) REFERENCES `Gallery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `GalleryTranslation`
--

LOCK TABLES `GalleryTranslation` WRITE;
/*!40000 ALTER TABLE `GalleryTranslation` DISABLE KEYS */;
INSERT INTO `GalleryTranslation` VALUES (41,36,'ru','Торговый центр','torgoviy-tsentr'),(42,37,'ru','Бизнес центр','biznes-tsentr');
/*!40000 ALTER TABLE `GalleryTranslation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Navigation`
--

DROP TABLE IF EXISTS `Navigation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Navigation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `parentID` int(10) unsigned DEFAULT NULL,
  `postID` int(10) unsigned DEFAULT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `defaultTitle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parentID` (`parentID`),
  KEY `postID` (`postID`),
  CONSTRAINT `Navigation_FK1` FOREIGN KEY (`parentID`) REFERENCES `Navigation` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `Navigation_FK2` FOREIGN KEY (`postID`) REFERENCES `Post` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Navigation`
--

LOCK TABLES `Navigation` WRITE;
/*!40000 ALTER TABLE `Navigation` DISABLE KEYS */;
/*!40000 ALTER TABLE `Navigation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `NavigationTranslation`
--

DROP TABLE IF EXISTS `NavigationTranslation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `NavigationTranslation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `navigationID` int(10) unsigned NOT NULL,
  `language` char(5) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `NT_UC1` (`navigationID`,`language`),
  CONSTRAINT `NT_FK1` FOREIGN KEY (`navigationID`) REFERENCES `Navigation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `NavigationTranslation`
--

LOCK TABLES `NavigationTranslation` WRITE;
/*!40000 ALTER TABLE `NavigationTranslation` DISABLE KEYS */;
/*!40000 ALTER TABLE `NavigationTranslation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Post`
--

DROP TABLE IF EXISTS `Post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Post` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `galleryID` int(11) unsigned DEFAULT NULL,
  `youtubeID` varchar(255) DEFAULT NULL,
  `type` tinyint(1) DEFAULT '1',
  `imgUrl` varchar(255) DEFAULT NULL,
  `publish` tinyint(1) DEFAULT '0',
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `defaultTitle` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleryID` (`galleryID`),
  CONSTRAINT `P_FK1` FOREIGN KEY (`galleryID`) REFERENCES `Gallery` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Post`
--

LOCK TABLES `Post` WRITE;
/*!40000 ALTER TABLE `Post` DISABLE KEYS */;
INSERT INTO `Post` VALUES (1,36,NULL,1,'64_55466c812d87f.jpg',1,'2015-05-03 18:17:15','Торговый центр'),(2,37,NULL,1,NULL,1,'2015-05-05 22:08:13','Бизнес центр');
/*!40000 ALTER TABLE `Post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `PostTranslation`
--

DROP TABLE IF EXISTS `PostTranslation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `PostTranslation` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `postID` int(11) unsigned NOT NULL,
  `language` varchar(5) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `preview` text,
  `slug` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `PT_UC1` (`postID`,`language`),
  CONSTRAINT `PT_FK1` FOREIGN KEY (`postID`) REFERENCES `Post` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `PostTranslation`
--

LOCK TABLES `PostTranslation` WRITE;
/*!40000 ALTER TABLE `PostTranslation` DISABLE KEYS */;
INSERT INTO `PostTranslation` VALUES (59,1,'ru','Торговый центр','<p>На первом этаже предполагается размещение следующих сегментов в стиле департмент-стор:</p>\r\n\r\n<ul>\r\n	<li>1 кафе в стиле кофе-шоп.</li>\r\n	<li>Специализированная подарочно-аксессуарная зона: парфюмерия, косметика, брендовые канцтовары, кожгалантерея, часы, украшения, аксессуары</li>\r\n</ul>\r\n\r\n<p><strong>2-й этаж</strong></p>\r\n\r\n<p>Мода (Fashion) &ndash; женская одежда, обувь, нижнее белье в стиле департмент-стор.</p>\r\n\r\n<p><strong>3-й этаж</strong></p>\r\n\r\n<p>Мужская одежда,обувь, нижнее белье,в стиле департмент-стор.</p>\r\n\r\n<p><strong>4-й этаж</strong></p>\r\n\r\n<p>Этаж детской одежды, игрушки, коляски и пр., детские развлечения, семейное<br />\r\nкафе, с залами для проведения детских мероприятий.</p>\r\n\r\n<p><strong>5-й этаж</strong></p>\r\n\r\n<p>Магазины ювелирных украшений, свадебных нарядов и аксессуаров.</p>\r\n\r\n<p><strong>6-й этаж</strong></p>\r\n\r\n<p>Магазины предметов интерьера, посуды, картинная галерея местных и иностранных художников.</p>\r\n\r\n<p><strong>7-й этаж</strong></p>\r\n\r\n<p>Магазины электроники и электротехники.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n','','torgoviy-tsentr'),(60,2,'ru','Бизнес центр','<p>Являющейся неотъемлемой частью бизнес-центра &ndash; Globus Business Club располагается на 11-16 этажах. Клуб предлагает арендаторам готовый, меблированный представительский офис, в размере необходимом для основной деятельности, позволяющий исключить дополнительные расходы.</p>\r\n\r\n<p>&laquo;Клуб&raquo; предлагает арендаторам услуги в виде оборудованных переговорных комнат, брейнсторминг комнат, конференцзалов, бизнес-гостиной и лаунж зоной для неформальных переговоров. Высоко скоростной интернет, всё необходимое офисное оборудование, персональный ассистент, IT-консультант и т.д.<br />\r\n&nbsp;</p>\r\n\r\n<p>В бизнес-гостиной и лаунж зоне члены клуба смогут поработать, а также провести неформальные переговоры. Высоко скоростной интернет, всё необходимое офисное оборудование,персональный ассистент, IT-консультант и т.д. будет предоставлен в распоряжение членов клуба.</p>\r\n\r\n<p>В &laquo;Бизнес-клубе&raquo; предполагается регулярно проводить дискуссионные клубы с участием ведущих деятелей бизнеса, политики и культуры. Члены клуба будут иметь возможность проводить презентации своих компаний для налаживания деловых связей друг с другом.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'biznes-tsentr'),(61,1,'az','Ticarət Mərkəzi','<p>1ci mərtəbədə department store şəkilində aşağıdaki seqmentlərin yerləşdirilməsi planlaşdırılır.</p>\r\n\r\n<ul>\r\n	<li>Cafe Shop stilində 1 kafe.</li>\r\n	<li>Hədiyyə-Aksesuar ərazisi: parfumeriya,kosmetika,saatlar,bəzədilmə aksesuarları.</li>\r\n</ul>\r\n\r\n<p><strong>2-ci mərtəbə</strong></p>\r\n\r\n<p>Moda (Fashion) &ndash; &quot;department store&quot; stilində&nbsp;qadın geyimləri,ayaqqabı, alt geyimləri.</p>\r\n\r\n<p><strong>3-c&uuml; mərtəbə</strong></p>\r\n\r\n<p>&quot;Department store&quot; stilində -&nbsp;Kişi geyimləri,ayaqqabı,alt geyimlər</p>\r\n\r\n<p><strong>4-c&uuml; mərtəbə</strong></p>\r\n\r\n<p><span style=\"color:rgb(102, 102, 102)\">Uşaq geyimləri,oyuncaqlar, Uşaqlar &uuml;&ccedil;&uuml;n əyləncə, banket ke&ccedil;irmək imkanı verən zallardan ibarət ailəvi kafe.</span></p>\r\n\r\n<p><strong>5-ci mərtəbə</strong></p>\r\n\r\n<p><span style=\"color:rgb(102, 102, 102)\">Yuvelir d&uuml;kanlar, toy geyimləri və aksesuarları.</span></p>\r\n\r\n<p><strong>6-cı mərtəbə</strong></p>\r\n\r\n<p><span style=\"color:rgb(102, 102, 102)\">İnteryer və m&uuml;xtəlif qab d&uuml;kanları, Yerli və xarici rəssamların şəkil qalereyası</span></p>\r\n\r\n<p><strong>7-ci mərtəbə&nbsp;</strong></p>\r\n\r\n<p>Elektronika və elektrotexnika d&uuml;kanları</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'ticaret-merkezi'),(62,2,'az','Biznes mərkəzi','<p>Biznes mərkəzin ayrılmaz hissəsi olan Global Business Club 11-16cı mərtəbələrdə yerləşir.</p>\r\n\r\n<p>Klub m&uuml;ştərilərə istəklərə uyğun,m&uuml;xtəlif variyasiyalarda fərqli sahəli,&nbsp;hazır, mebelli,g&ouml;zəl g&ouml;r&uuml;n&uuml;şl&uuml; ofislər təqdim edir.</p>\r\n\r\n<p>G&ouml;zləmə zalı və Launj hissədə qonaqlar işləyə, və g&ouml;r&uuml;şlərini ke&ccedil;irə bilər. Y&uuml;ksək s&uuml;rətli internet,şəxsi assisent, İT yardım&ccedil;ı və ofis&nbsp;&uuml;&ccedil;&uuml;n zəruri olan b&uuml;t&uuml;n avadanlıq,&nbsp;klub &uuml;zvlərinin sərəncamında olacaq.</p>\r\n\r\n<p>&laquo;Biznes Klub&raquo;-da m&uuml;təmadi olaraq,&nbsp;iqtisad,siyasət və mədəniyyət sektorunda &ccedil;alışan tanınmış simalarının iştirak edəcəyi diskussiya klubunun yaradılması planlaşdırılır. Biznes Klubun &uuml;zvləri &ouml;z şirkətləri haqqında informasiyayla paylaşa, eyni zamanda şirkətlərinin təqdimetmə mərasimini ke&ccedil;irə bilər,hansi ki, bu onlara işg&uuml;zar əlaqələrin qurulmasında b&ouml;y&uuml;k yardım&ccedil;ı ola bilər.</p>\r\n\r\n<p>&nbsp;</p>\r\n',NULL,'biznes-merkezi');
/*!40000 ALTER TABLE `PostTranslation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TranslationMessage`
--

DROP TABLE IF EXISTS `TranslationMessage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TranslationMessage` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) NOT NULL DEFAULT '',
  `translation` text,
  PRIMARY KEY (`id`,`language`),
  CONSTRAINT `TranslationMessage_ibfk_1` FOREIGN KEY (`id`) REFERENCES `TranslationSourceMessage` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TranslationMessage`
--

LOCK TABLES `TranslationMessage` WRITE;
/*!40000 ALTER TABLE `TranslationMessage` DISABLE KEYS */;
INSERT INTO `TranslationMessage` VALUES (50,'az','Biznes mərkəzi'),(50,'ru','Бизнес центр'),(51,'az','Ticarət mərkəzi'),(51,'ru','Торговый центр'),(52,'az','Reha Med'),(52,'ru','Reha Med'),(54,'az','Yerləşmə'),(54,'ru','Месторасположение'),(55,'az','Mərkəz şəhərin işgüzar rayonunda yerləşir'),(55,'ru','Центр расположен в деловом районе городского значения.'),(56,'az','Mərkəz bir sıra dövlət obyektləri və müasir tipli yaşayış kompleksləri ilə də qonşudur.Marketinq araşdırması nəticəsində aydın olmuşdur ki, 1 km radiusda:'),(56,'ru','Центр расположен в деловом районе городского значения, тесно соседствующего с густонаселенными жилыми комплексами современного типа. В результате проведенного маркетингового исследования было выявлено что в радиусе 1 км:'),(57,'az','insan'),(57,'ru','человек'),(58,'az','mərkəz ətrafında 65000dən çox insan yaşayır.'),(58,'ru','проживает более 65000 человек'),(59,'az','ətrafda 15000-dən çox insan çalışır'),(59,'ru','работает более 15 000 человек'),(60,'az','avtomobil'),(60,'ru','автомобилей'),(61,'az','ərazidə nəqliyyat axını təxminən 30000 avtomobil təşkil edir.'),(61,'ru','В среднем транспортный поток в районе «Плазы» составляет порядка 30 000 автомобилей в день.'),(62,'az','Mərkəzin ümumi konsepti'),(62,'ru','Общая Концепция центра'),(63,'az','Klinika'),(63,'ru','Клиникa'),(64,'az','Restoran'),(64,'ru','Ресторан\r\n'),(65,'az','Mərkəzin içindəkilər'),(65,'ru','Компоненты Центра'),(68,'az','Administrativ hissə, parkinq üçün 180 yer. Parkinq üçün həmçinin bina ətrafı yerlər də nəzərdə tutulmuşdur.'),(68,'ru','Административная часть, парковка на 180 мест. Также имеется возможность парковать машины в зоне вокруг здания'),(70,'az','Aksesuar və hədiyyələr: (Parfumeriya, kosmetika, saatlar və digər aksesuarlar)'),(70,'ru',' Специализированная подарочно аксессуарная\r\n                            зона: (парфюмерия, косметика,\r\n                            кожгалантерея, часы, украшения, аксессуары)'),(72,'az','Qadın geyimləri, ayaqqabı'),(72,'ru','Женская одежда, обувь, нижнее белье'),(73,'az','Mərtəbələr'),(73,'ru','Этажи'),(74,'az','Mərtəbə'),(74,'ru','Этаж'),(75,'az','Kişi geyimləri, ayaqqabı, alt geyimləri'),(75,'ru','Мужская одежда, обувь, нижнее белье'),(76,'az','Uşaq geyimləri,oyuncaqlar, Uşaqlar üçün əyləncə, banket keçirmək imkanı verən zallardan ibarət ailəvi kafe.'),(76,'ru','Детская одежда, игрушки, коляски и пр. детские\r\n                            развлечения, семейное кафе, с залами для проведения\r\n                            детских мероприятий.'),(77,'az','Yuvelir dükanlar, toy geyimləri və aksesuarları.'),(77,'ru','Магазины ювелирных изделий и свадебных нарядов и аксессуаров.'),(78,'az','İnteryer və müxtəlif qab dükanları, Yerli və xarici rəssamların şəkil qalereyası.'),(78,'ru','Магазин предметов интерьера, посуда, картинная галерея местных и иностранных художников.'),(79,'az','Elektronika mağazaları'),(79,'ru','Магазины электроники'),(80,'az','Bina administrasiyası, ofislər'),(80,'ru','Офисные зоны, администрация здания'),(81,'az','Reha-Med klinikası'),(81,'ru','Клиника Reha-Med Baku'),(82,'az','Ofislər'),(82,'ru','Oфисные зоны'),(83,'az','Restoran və Launj'),(83,'ru','Ресторан и лаунж'),(84,'az','Gecə Klubu'),(84,'ru','Ночной клуб'),(85,'az','Mərtəbələrin planı'),(85,'ru','Планировки этажей'),(86,'az','İnfrastruktur'),(86,'ru','ИНФРАСТРУКТУРА'),(87,'az','<ul>\r\n<li>Çap</li>\r\n<li>Faks</li>\r\n<li>Videokonferensiya</li>\r\n</ul>\r\n<p>\r\nXüsusi kanalla təmin edilmə, klubun operatorları tərəfindən zənglərə baxılma,\r\nmüştərilərin istəklərinə uyğun zənglərin yönləndirilməsi, Dünyanın istənilən nöqtəsinə zənglər, \r\nmesajların qəbulu və müştərilərin tapşırıqlarına uyğun olaraq bölüşdürülmə,\r\ngöndərilmə və qiyabi qəbul.\r\n</p>'),(87,'ru','        <ul>\r\n            <li>Печать</li>\r\n            <li>Факс</li>\r\n            <li>Видеоконференции</li>\r\n        </ul>\r\n        <p>\r\n            (предоставление выделенного канала, обработка звонков телефонными операторами клуба,\r\n            перевод телефонных звонков согласно инструкциям клиентов, переадресация звонков в\r\n            любую точку мира, прием сообщений и распределение их согласно инструкциям клиентов,\r\n            отправка и прием корреспонденции)\r\n        </p>'),(89,'az','Yerləşmə'),(89,'ru','Месторасположение'),(90,'az','Axtarılan səhifə mövcud deyil.'),(90,'ru',NULL),(91,'az','Konsept'),(91,'ru','Концепция'),(92,'az','Ticarət mərkəzi'),(92,'ru','Торговый центр'),(93,'az','Biznes mərkəzi'),(93,'ru','Бизнес центр'),(94,'az','Fudkort ərazisi'),(94,'ru','Food Court'),(95,'az','Əlaqə'),(95,'ru','Контакты');
/*!40000 ALTER TABLE `TranslationMessage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TranslationSourceMessage`
--

DROP TABLE IF EXISTS `TranslationSourceMessage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TranslationSourceMessage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TranslationSourceMessage`
--

LOCK TABLES `TranslationSourceMessage` WRITE;
/*!40000 ALTER TABLE `TranslationSourceMessage` DISABLE KEYS */;
INSERT INTO `TranslationSourceMessage` VALUES (50,'common','slider-text 1'),(51,'common','slider-text 2'),(52,'common','slider-text 3'),(54,'main-page','part1-title'),(55,'main-page','part1-subtitle'),(56,'main-page','part1-description'),(57,'main-page','part1-column1-title'),(58,'main-page','part1-column1-description'),(59,'main-page','part1-column2-description'),(60,'main-page','part1-column3-title'),(61,'main-page','part1-column3-description'),(62,'main-page','part2-title'),(63,'main-page','clinic'),(64,'main-page','Restaurant'),(65,'main-page','part3-title'),(68,'stages','-1-5-description'),(70,'stages','1-description'),(72,'stages','2-description'),(73,'common','stages'),(74,'common','stage'),(75,'stages','3-description'),(76,'stages','4-description'),(77,'stages','5-description'),(78,'stages','6-description'),(79,'stages','7-description'),(80,'stages','9-description'),(81,'stages','10-description'),(82,'stages','11-16-description'),(83,'stages','17-description'),(84,'stages','18-description'),(85,'main-page','part4-title'),(86,'main-page','part5-title'),(87,'main-page','part5-description'),(89,'nav','Location'),(90,'error','The requested page could not be found.'),(91,'nav','Concept'),(92,'nav','Mall'),(93,'nav','Business Center'),(94,'stages','8-description'),(95,'nav','Contact');
/*!40000 ALTER TABLE `TranslationSourceMessage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `User`
--

DROP TABLE IF EXISTS `User`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `User` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `User`
--

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;
INSERT INTO `User` VALUES (1,'tural','TnC_x9fUvy0RkF5IUT6ispy_i2pvUcs0','$2y$13$09NTiMEzhwPmDRaxtwhKq.SD3aSDfMBTH/KiP3B4KlB/DrmNjw0LK',NULL,'turalaliyev@live.com',10,10,1413407059,1413407059),(10,'admin','MB7EKXdyyVdaZ7WtJSAGETtSi9juh3Tj','$2y$13$lRmZtvHZ5CHYlBsrftpt0OG8l0LhS0c81WJp7mTyZlLAaA.4x3GTS',NULL,'info@globuscenter.az',10,10,1430847685,1430847685);
/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `session`
--

DROP TABLE IF EXISTS `session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `session` (
  `id` char(40) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `session`
--

LOCK TABLES `session` WRITE;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
/*!40000 ALTER TABLE `session` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-17 20:18:58
