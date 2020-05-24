-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: hotel
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

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
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'The Primary Key for the table.',
  `room_id` bigint(20) unsigned NOT NULL COMMENT 'The corresponding room.',
  `start` date NOT NULL COMMENT 'The start date of the booking.',
  `end` date NOT NULL COMMENT 'The end date of the booking.',
  `is_reservation` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If this booking is a reservation.',
  `is_paid` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If this booking has been paid.',
  `notes` text COLLATE utf8mb4_unicode_ci COMMENT 'Any notes for the reservation.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `room_id` (`room_id`),
  CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings`
--

LOCK TABLES `bookings` WRITE;
/*!40000 ALTER TABLE `bookings` DISABLE KEYS */;
INSERT INTO `bookings` VALUES (1,7,'2020-05-15','2020-05-22',1,1,'Z///////////',NULL,'2020-05-04 16:23:19','2020-05-04 16:23:19'),(5,6,'2020-05-16','2020-05-16',1,1,'/Csdc/',NULL,'2020-05-04 02:03:26',NULL),(6,12,'2020-05-20','2020-05-30',1,1,'/dscsd',NULL,NULL,NULL),(7,1,'2020-05-02','2020-05-19',1,1,'/Csdcd',NULL,NULL,NULL),(8,12,'2020-05-22','2020-05-27',1,1,'/das/',NULL,'2020-05-04 16:01:14',NULL),(9,6,'2020-05-09','2020-05-22',1,1,'/','2020-05-04 01:59:53','2020-05-04 01:59:53',NULL),(10,1,'2020-05-15','2020-05-22',1,1,'/','2020-05-04 02:00:20','2020-05-04 02:00:20',NULL),(11,9,'2020-05-17','2020-05-26',1,1,'/','2020-05-04 02:00:41','2020-05-04 02:00:41',NULL),(12,9,'2020-05-11','2020-05-19',1,1,'////','2020-05-04 15:56:18','2020-05-04 16:01:34',NULL),(13,8,'2020-05-18','2020-05-06',1,0,'/','2020-05-04 16:02:19','2020-05-04 16:02:19',NULL);
/*!40000 ALTER TABLE `bookings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bookings_users`
--

DROP TABLE IF EXISTS `bookings_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookings_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'The Primary Key for the table.',
  `booking_id` bigint(20) unsigned NOT NULL COMMENT 'The corresponding booking.',
  `user_id` bigint(20) unsigned NOT NULL COMMENT 'The corresponding user.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `booking_id` (`booking_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `bookings_users_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`),
  CONSTRAINT `bookings_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bookings_users`
--

LOCK TABLES `bookings_users` WRITE;
/*!40000 ALTER TABLE `bookings_users` DISABLE KEYS */;
INSERT INTO `bookings_users` VALUES (4,5,1,NULL,NULL),(5,6,1,NULL,NULL),(6,7,1,NULL,NULL),(7,8,1,NULL,NULL),(8,9,1,NULL,NULL),(9,10,1,NULL,NULL),(10,11,1,NULL,NULL),(11,12,1,'2020-05-04 15:56:19','2020-05-04 15:56:19'),(12,13,1,'2020-05-04 16:02:19','2020-05-04 16:02:19');
/*!40000 ALTER TABLE `bookings_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'The Primary Key for the table.',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The code someone would be expected to enter at checkout.',
  `discount` int(10) unsigned NOT NULL COMMENT 'The discount in whole cents for a room.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `discounts`
--

LOCK TABLES `discounts` WRITE;
/*!40000 ALTER TABLE `discounts` DISABLE KEYS */;
INSERT INTO `discounts` VALUES (1,'Savers Special','savers',2500,'2020-05-02 19:05:34','2020-05-02 19:05:34',NULL),(2,'Super Savers Special','super',5000,'2020-05-02 19:05:34','2020-05-02 19:05:34',NULL),(3,'The Boss Savers Special','boss',10000,'2020-05-02 19:05:34','2020-05-02 19:05:34',NULL);
/*!40000 ALTER TABLE `discounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2020_05_02_145728_create_hotel_tables',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'The Primary Key for the table.',
  `value` int(10) unsigned NOT NULL COMMENT 'The rate for the room in whole cents.',
  `room_type_id` bigint(20) unsigned NOT NULL COMMENT 'The corresponding room type.',
  `is_weekend` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'If this is the weekend rate or not.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `rates_room_type_id_is_weekend_unique` (`room_type_id`,`is_weekend`),
  KEY `room_type_id` (`room_type_id`),
  CONSTRAINT `rates_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` VALUES (1,10000,1,0,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(2,12000,1,1,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(3,10000,2,0,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(4,12000,2,1,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(5,12500,3,0,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(6,15000,3,1,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(7,13500,4,0,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(8,17000,4,1,'2020-05-02 19:05:34','2020-05-02 19:05:34');
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room_types`
--

DROP TABLE IF EXISTS `room_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room_types` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'The Primary Key for the table.',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The name of the room type, ie Double Queen, etc.',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'The full text description of the room type.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room_types`
--

LOCK TABLES `room_types` WRITE;
/*!40000 ALTER TABLE `room_types` DISABLE KEYS */;
INSERT INTO `room_types` VALUES (1,'Double Queen','Double Queen Beds','2020-05-02 19:05:30','2020-05-02 19:05:30',NULL),(2,'Single King','Single King Bed','2020-05-02 19:05:33','2020-05-02 19:05:33',NULL),(3,'Queen Suite','A single Queen Bed and a seating area','2020-05-02 19:05:34','2020-05-02 19:05:34',NULL),(4,'King Suite','A single King Bed and a seating area','2020-05-02 19:05:34','2020-05-02 19:05:34',NULL);
/*!40000 ALTER TABLE `room_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'The Primary Key for the table.',
  `number` int(11) NOT NULL COMMENT 'The room number in the hotel, a unique value.',
  `room_type_id` bigint(20) unsigned NOT NULL COMMENT 'The corresponding room type.',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `number` (`number`),
  KEY `room_type_id` (`room_type_id`),
  CONSTRAINT `rooms_room_type_id_foreign` FOREIGN KEY (`room_type_id`) REFERENCES `room_types` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,101,1,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(2,102,1,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(3,103,1,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(4,104,1,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(5,105,1,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(6,201,2,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(7,202,2,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(8,203,2,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(9,204,2,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(10,205,2,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(11,301,3,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(12,302,3,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(13,403,4,'2020-05-02 19:05:34','2020-05-02 19:05:34'),(14,404,4,'2020-05-02 19:05:34','2020-05-02 19:05:34');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'idan reicher','idanreicher@gmail.com',NULL,'$2y$10$h5s8V7ZOQS8iG82jduHUE.YUj0ASg7lJrjofm1qBUB44C/rfM48Ne',NULL,'2020-05-03 00:01:57','2020-05-03 00:01:57'),(2,'test','test@test.com',NULL,'$2y$10$b7voj6o/Fnbp3yKOQv8zOu2MceSY6VA6L3iotUavj5Bvx5UmFKUiW','OQJjk4YyhXoMHwwBME4ke2xp7RLZj5mDTds1QqUonrAxzUtWgYiE9tQdq9YC','2020-05-04 22:14:36','2020-05-04 22:14:36');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-24  5:34:45
