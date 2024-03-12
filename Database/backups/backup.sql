-- MySQL dump 10.13  Distrib 8.0.36, for Linux (x86_64)
--
-- Host: localhost    Database: practice_db
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cars`
--

DROP TABLE IF EXISTS `cars`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `make` varchar(50) DEFAULT NULL,
  `model` varchar(50) DEFAULT NULL,
  `year` int DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `mileage` float DEFAULT NULL,
  `transmission` varchar(20) DEFAULT NULL,
  `engine` varchar(20) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cars`
--

LOCK TABLES `cars` WRITE;
/*!40000 ALTER TABLE `cars` DISABLE KEYS */;
/*!40000 ALTER TABLE `cars` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `categoryId` int NOT NULL AUTO_INCREMENT,
  `categoryName` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `commentLikes`
--

DROP TABLE IF EXISTS `commentLikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `commentLikes` (
  `userId` bigint NOT NULL,
  `commentId` int NOT NULL,
  PRIMARY KEY (`userId`,`commentId`),
  KEY `commentId` (`commentId`),
  CONSTRAINT `commentLikes_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  CONSTRAINT `commentLikes_ibfk_2` FOREIGN KEY (`commentId`) REFERENCES `comments` (`commentId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `commentLikes`
--

LOCK TABLES `commentLikes` WRITE;
/*!40000 ALTER TABLE `commentLikes` DISABLE KEYS */;
/*!40000 ALTER TABLE `commentLikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `commentId` int NOT NULL AUTO_INCREMENT,
  `commentText` varchar(250) DEFAULT NULL,
  `userId` bigint DEFAULT NULL,
  `postId` int DEFAULT NULL,
  `createdAt` datetime DEFAULT NULL,
  `updatedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`commentId`),
  KEY `userId` (`userId`),
  KEY `postId` (`postId`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `computer_parts`
--

DROP TABLE IF EXISTS `computer_parts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `computer_parts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model_number` varchar(100) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  `description` text,
  `performance_score` int DEFAULT NULL,
  `market_price` decimal(12,2) DEFAULT NULL,
  `rsm` decimal(12,2) DEFAULT NULL,
  `power_consumptionw` float DEFAULT NULL,
  `lengthm` double DEFAULT NULL,
  `widthm` double DEFAULT NULL,
  `heightm` double DEFAULT NULL,
  `lifespan` int DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `computer_parts`
--

LOCK TABLES `computer_parts` WRITE;
/*!40000 ALTER TABLE `computer_parts` DISABLE KEYS */;
/*!40000 ALTER TABLE `computer_parts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709640094_CreateUserTable1.php'),(2,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709640318_CreatePostTable1.php'),(3,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709644636_CreateCommentTable1.php'),(4,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709644786_CreatePostlikesTable1.php'),(5,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709644853_CreateCommentlikesTable1.php'),(6,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709645039_CreateCategoryTable1.php'),(7,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709645216_CreateTagTable1.php'),(8,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709645272_CreatePostTagTable1.php'),(9,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709645407_CreateUserSettingTable1.php'),(10,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709646626_IntroduceTaxonomyTable1.php'),(11,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709648338_IntroduceTaxonomyTermsTable1.php'),(12,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709648951_IntroducePostTaxonomiesTable1.php'),(13,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709649127_DropPostTagsTable1.php'),(14,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709649171_DropTagsTable1.php'),(15,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709651631_CreateStudentTable1.php'),(16,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-05_1709653869_CreateComputerPartsTable1.php'),(17,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-07_1709846502_CreateCarssTable1.php'),(18,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-07_1709846561_CreateCarPartsTable1.php'),(19,'/mnt/c/Users/kosam/OneDrive/ドキュメント/WebDevelopmentPractice/Recursion/TextSnippetSharingService/commands/programs/../../Database/Migrations/2024-03-11_1710187530_CreateSnippetTable1.php');
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parts`
--

DROP TABLE IF EXISTS `parts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `parts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `carId` int DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `price` float DEFAULT NULL,
  `quantityStock` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carId` (`carId`),
  CONSTRAINT `parts_ibfk_1` FOREIGN KEY (`carId`) REFERENCES `cars` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parts`
--

LOCK TABLES `parts` WRITE;
/*!40000 ALTER TABLE `parts` DISABLE KEYS */;
/*!40000 ALTER TABLE `parts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postLikes`
--

DROP TABLE IF EXISTS `postLikes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postLikes` (
  `userId` bigint NOT NULL,
  `postId` int NOT NULL,
  PRIMARY KEY (`userId`,`postId`),
  KEY `postId` (`postId`),
  CONSTRAINT `postLikes_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`),
  CONSTRAINT `postLikes_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postLikes`
--

LOCK TABLES `postLikes` WRITE;
/*!40000 ALTER TABLE `postLikes` DISABLE KEYS */;
/*!40000 ALTER TABLE `postLikes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postTaxonomies`
--

DROP TABLE IF EXISTS `postTaxonomies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `postTaxonomies` (
  `postTaxonomyId` int NOT NULL AUTO_INCREMENT,
  `postId` int DEFAULT NULL,
  `taxonomyTermId` int DEFAULT NULL,
  PRIMARY KEY (`postTaxonomyId`),
  KEY `postId` (`postId`),
  KEY `taxonomyTermId` (`taxonomyTermId`),
  CONSTRAINT `postTaxonomies_ibfk_1` FOREIGN KEY (`postId`) REFERENCES `posts` (`id`),
  CONSTRAINT `postTaxonomies_ibfk_2` FOREIGN KEY (`taxonomyTermId`) REFERENCES `taxonomyTerms` (`taxonomyTermId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postTaxonomies`
--

LOCK TABLES `postTaxonomies` WRITE;
/*!40000 ALTER TABLE `postTaxonomies` DISABLE KEYS */;
/*!40000 ALTER TABLE `postTaxonomies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` bigint DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `snippets`
--

DROP TABLE IF EXISTS `snippets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `snippets` (
  `id` int NOT NULL AUTO_INCREMENT,
  `cord` varchar(1000) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  `language` varchar(50) DEFAULT NULL,
  `expire_datetime` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `snippets`
--

LOCK TABLES `snippets` WRITE;
/*!40000 ALTER TABLE `snippets` DISABLE KEYS */;
INSERT INTO `snippets` VALUES (1,'<!DOCTYPE html><html><body><h1>My First Heading</h1><p>My first paragraph.</p></body></html>','58741710205383','html','2024-03-11 18:13:03','2024-03-11 18:03:04','2024-03-11 18:03:04');
/*!40000 ALTER TABLE `snippets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `students` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `major` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxonomies`
--

DROP TABLE IF EXISTS `taxonomies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxonomies` (
  `taxonomyId` int NOT NULL AUTO_INCREMENT,
  `taxonomyName` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`taxonomyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxonomies`
--

LOCK TABLES `taxonomies` WRITE;
/*!40000 ALTER TABLE `taxonomies` DISABLE KEYS */;
/*!40000 ALTER TABLE `taxonomies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `taxonomyTerms`
--

DROP TABLE IF EXISTS `taxonomyTerms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `taxonomyTerms` (
  `taxonomyTermId` int NOT NULL AUTO_INCREMENT,
  `taxonomyTermName` varchar(50) DEFAULT NULL,
  `taxonomyTypeId` int DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `parentTaxonomyTerm` int DEFAULT NULL,
  PRIMARY KEY (`taxonomyTermId`),
  KEY `taxonomyTypeId` (`taxonomyTypeId`),
  CONSTRAINT `taxonomyTerms_ibfk_1` FOREIGN KEY (`taxonomyTypeId`) REFERENCES `taxonomies` (`taxonomyId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `taxonomyTerms`
--

LOCK TABLES `taxonomyTerms` WRITE;
/*!40000 ALTER TABLE `taxonomyTerms` DISABLE KEYS */;
/*!40000 ALTER TABLE `taxonomyTerms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userSettings`
--

DROP TABLE IF EXISTS `userSettings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `userSettings` (
  `entryId` int NOT NULL AUTO_INCREMENT,
  `metaKey` char(1) DEFAULT NULL,
  `metaValue` varchar(255) DEFAULT NULL,
  `userId` bigint DEFAULT NULL,
  PRIMARY KEY (`entryId`),
  KEY `userId` (`userId`),
  CONSTRAINT `userSettings_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userSettings`
--

LOCK TABLES `userSettings` WRITE;
/*!40000 ALTER TABLE `userSettings` DISABLE KEYS */;
/*!40000 ALTER TABLE `userSettings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_confirmed_at` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2024-03-11 18:04:36
