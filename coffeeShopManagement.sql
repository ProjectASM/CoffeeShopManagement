-- MariaDB dump 10.19  Distrib 10.4.27-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: project_test
-- ------------------------------------------------------
-- Server version	10.4.27-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `project_test`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `project_test` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `project_test`;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20230215080945','2023-02-15 09:09:57',489),('DoctrineMigrations\\Version20230217074937','2023-02-17 08:49:44',56),('DoctrineMigrations\\Version20230218091246','2023-02-18 10:12:54',209),('DoctrineMigrations\\Version20230218091527','2023-02-18 10:15:34',47),('DoctrineMigrations\\Version20230218161355','2023-02-18 17:14:02',525),('DoctrineMigrations\\Version20230220101824','2023-02-20 11:18:32',537),('DoctrineMigrations\\Version20230220102001','2023-02-20 11:20:07',40),('DoctrineMigrations\\Version20230220102301','2023-02-20 11:23:08',36),('DoctrineMigrations\\Version20230226091935','2023-02-26 10:19:43',575);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredient` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingredient_name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient`
--

LOCK TABLES `ingredient` WRITE;
/*!40000 ALTER TABLE `ingredient` DISABLE KEYS */;
INSERT INTO `ingredient` VALUES (1,'Kopi Luwak Coffee',10),(2,'Jasmine Tea',15),(3,'3Q Bibi Jelly (White Pearl)',7);
/*!40000 ALTER TABLE `ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL,
  `available_at` datetime NOT NULL,
  `delivered_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `created` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salary_statistics`
--

DROP TABLE IF EXISTS `salary_statistics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salary_statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_salary` double NOT NULL,
  `coefficients_salary` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salary_statistics`
--

LOCK TABLES `salary_statistics` WRITE;
/*!40000 ALTER TABLE `salary_statistics` DISABLE KEYS */;
INSERT INTO `salary_statistics` VALUES (1,3500000,1.2);
/*!40000 ALTER TABLE `salary_statistics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shift`
--

DROP TABLE IF EXISTS `shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shift`
--

LOCK TABLES `shift` WRITE;
/*!40000 ALTER TABLE `shift` DISABLE KEYS */;
INSERT INTO `shift` VALUES (1,'Morning'),(2,'Afternoon'),(3,'Evening'),(4,'Night');
/*!40000 ALTER TABLE `shift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (2,'Tran Tran Huy','male','2003-09-22','Tra Vinh, Tieu Can','How-to-draw-a-cartoon-character-1-63f0ffba7569d.webp'),(3,'Danh The Nghi','male','2003-02-19','Ca Mau','handsome-man-long-black-hair-small-beard-illustration-vector-handsome-man-long-black-hair-small-beard-160160081-63f106408dcec.jpg'),(4,'Nguyen Hoai Phong','male','2003-07-14','TP Long Xuyen, An Giang','black-man-63f10701aa26b.jpg'),(5,'yzahk','female','2003-05-17','TP Long Xuyen, An Giang','0037bf05ccb0bf488fb92c7ceb756352-63fc6bccebbb5.jpg');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_shift`
--

DROP TABLE IF EXISTS `staff_shift`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `shift_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_D8EE9382D4D57CD` (`staff_id`),
  KEY `IDX_D8EE9382BB70BC0E` (`shift_id`),
  CONSTRAINT `FK_D8EE9382BB70BC0E` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`id`),
  CONSTRAINT `FK_D8EE9382D4D57CD` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_shift`
--

LOCK TABLES `staff_shift` WRITE;
/*!40000 ALTER TABLE `staff_shift` DISABLE KEYS */;
INSERT INTO `staff_shift` VALUES (1,2,1),(2,4,2),(3,3,3),(4,5,4);
/*!40000 ALTER TABLE `staff_shift` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timekeepiing`
--

DROP TABLE IF EXISTS `timekeepiing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timekeepiing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timekeepiing`
--

LOCK TABLES `timekeepiing` WRITE;
/*!40000 ALTER TABLE `timekeepiing` DISABLE KEYS */;
/*!40000 ALTER TABLE `timekeepiing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `timekeeping`
--

DROP TABLE IF EXISTS `timekeeping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `timekeeping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `salary_id` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B962EB21D4D57CD` (`staff_id`),
  KEY `IDX_B962EB21B0FDF16E` (`salary_id`),
  CONSTRAINT `FK_B962EB21B0FDF16E` FOREIGN KEY (`salary_id`) REFERENCES `salary_statistics` (`id`),
  CONSTRAINT `FK_B962EB21D4D57CD` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `timekeeping`
--

LOCK TABLES `timekeeping` WRITE;
/*!40000 ALTER TABLE `timekeeping` DISABLE KEYS */;
INSERT INTO `timekeeping` VALUES (3,2,1,'2023-02-01'),(4,3,1,'2023-02-01'),(5,4,1,'2023-02-01'),(6,2,1,'2023-02-02'),(7,3,1,'2023-02-02'),(8,4,1,'2023-02-02'),(9,2,1,'2023-02-03'),(10,4,1,'2023-02-03'),(11,2,1,'2023-02-04'),(12,3,1,'2023-02-04'),(13,3,1,'2023-02-01'),(14,3,1,'2023-02-01'),(15,3,1,'2023-02-01'),(16,3,1,'2023-02-01'),(17,3,1,'2023-02-01'),(18,3,1,'2023-02-01'),(19,3,1,'2023-02-01'),(20,3,1,'2023-02-01'),(21,3,1,'2023-02-01'),(22,3,1,'2023-02-01'),(23,3,1,'2023-02-01'),(24,3,1,'2023-02-01'),(25,3,1,'2023-02-01'),(26,3,1,'2023-02-01'),(27,3,1,'2023-02-01'),(28,3,1,'2023-02-01'),(29,3,1,'2023-02-01'),(30,3,1,'2023-02-01'),(31,3,1,'2023-02-01'),(32,3,1,'2023-02-01'),(33,3,1,'2023-02-01'),(34,3,1,'2023-02-01'),(35,3,1,'2023-02-01'),(36,3,1,'2023-02-01'),(37,3,1,'2023-02-01'),(38,3,1,'2023-02-01'),(39,3,1,'2023-03-02'),(40,2,1,'2023-03-01'),(41,2,1,'2023-03-02'),(42,2,1,'2023-03-03'),(43,2,1,'2023-03-04'),(44,2,1,'2023-03-05'),(45,2,1,'2023-03-06'),(46,2,1,'2023-03-07'),(47,2,1,'2023-03-08'),(48,2,1,'2023-03-09'),(49,2,1,'2023-03-10'),(50,2,1,'2023-03-11'),(51,2,1,'2023-03-12'),(52,2,1,'2023-03-13'),(53,2,1,'2023-03-14'),(54,2,1,'2023-03-15'),(55,2,1,'2023-03-16'),(56,2,1,'2023-03-17'),(57,2,1,'2023-03-18'),(58,2,1,'2023-03-19'),(59,2,1,'2023-03-20'),(60,2,1,'2023-03-21'),(61,2,1,'2023-03-22'),(62,2,1,'2023-03-23'),(63,2,1,'2023-03-24'),(64,2,1,'2023-03-25'),(65,2,1,'2023-03-26'),(66,2,1,'2023-03-27'),(67,2,1,'2023-03-28'),(68,2,1,'2023-03-29'),(69,2,1,'2023-03-30'),(70,2,1,'2023-03-31'),(71,5,1,'2023-02-27');
/*!40000 ALTER TABLE `timekeeping` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'phong1@gmail.com','[\"ROLE_USER\"]','$2y$13$aI.EA6POgFzrGug/NXu/muXLSuk3bzQi8sHUeLGrmFTOEz2tGBsIm','phong','0111111111','male','a'),(2,'','[\"ROLE_ADMIN\"]','$2y$13$aIz20/SRUUC0VX4BA6IjqeGKrk1NYbPYfUFCgU48bvwXA.5eZKxka','Admin1','','',''),(3,'admin1@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$GIJRIrXsfDLpSxQqVvvYweRVx.LyvR8IraO6JkGyLxN4.9Ck.hmbu','Admin2','','','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-28  9:05:45
