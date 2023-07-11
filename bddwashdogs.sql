-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tienda
-- ------------------------------------------------------
-- Server version	8.0.30

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `mascotas`
--

DROP TABLE IF EXISTS `mascotas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mascotas` (
  `mascota_id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `id_user` bigint unsigned NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `raza` varchar(45) NOT NULL,
  `condicion` varchar(150) NOT NULL,
  `edad` int NOT NULL,
  `genero` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mascota_id`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mascotas`
--

LOCK TABLES `mascotas` WRITE;
/*!40000 ALTER TABLE `mascotas` DISABLE KEYS */;
INSERT INTO `mascotas` VALUES (1,2,'Lucky','Husky','Ninguna',10,'Hembra',NULL,'2023-06-14 18:09:52'),(3,2,'Almer','perro','pendejaso',25,'Macho','2023-06-14 16:18:14','2023-06-14 18:12:04'),(4,1,'Keilin','Canina','No',1,'Hembra','2023-06-15 16:29:17','2023-06-15 16:29:17');
/*!40000 ALTER TABLE `mascotas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2019_12_14_000001_create_personal_access_tokens_table',1),(5,'2022_11_14_175154_create_products_table',1),(6,'2022_11_14_225126_create_shopping_carts_table',1),(7,'2022_11_14_225338_create_product_shopping_cart_table',1),(8,'2022_11_15_182853_create_orders_table',1),(9,'2023_03_02_143757_create_solicitud_creditos_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shopping_cart_id` bigint unsigned DEFAULT NULL,
  `id_user` bigint unsigned NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Registrado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fecha` datetime NOT NULL,
  `mascota_id` bigint unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_shopping_cart_id_unique` (`shopping_cart_id`),
  KEY `orders_id_user_foreign` (`id_user`),
  KEY `orders_mascota_idx` (`mascota_id`),
  CONSTRAINT `orders_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_mascota` FOREIGN KEY (`mascota_id`) REFERENCES `mascotas` (`mascota_id`),
  CONSTRAINT `orders_shopping_cart_id_foreign` FOREIGN KEY (`shopping_cart_id`) REFERENCES `shopping_carts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (52,43,2,12400,'En proceso','2023-06-16 21:12:39','2023-06-16 22:09:55','l6UyPiLBaG1Q8enX1jiAXsKIrPSoW9dHCkV7Nr66l6hNHFhqlo',NULL,'2023-06-24 10:30:00',1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_shopping_cart`
--

DROP TABLE IF EXISTS `product_shopping_cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_shopping_cart` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `cantidad` int NOT NULL DEFAULT '1',
  `shopping_cart_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_shopping_cart_shopping_cart_id_foreign` (`shopping_cart_id`),
  CONSTRAINT `product_shopping_cart_shopping_cart_id_foreign` FOREIGN KEY (`shopping_cart_id`) REFERENCES `shopping_carts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_shopping_cart`
--

LOCK TABLES `product_shopping_cart` WRITE;
/*!40000 ALTER TABLE `product_shopping_cart` DISABLE KEYS */;
INSERT INTO `product_shopping_cart` VALUES (49,43,9,28,NULL,NULL),(50,40,2,29,NULL,NULL),(51,42,1,29,NULL,NULL),(52,41,2,30,NULL,NULL),(53,40,1,30,NULL,NULL),(54,39,2,31,NULL,NULL),(55,44,1,31,NULL,NULL),(56,39,2,32,NULL,NULL),(57,39,1,33,NULL,NULL),(58,39,1,34,NULL,NULL),(59,39,1,35,NULL,NULL),(60,42,1,36,NULL,NULL),(61,39,1,37,NULL,NULL),(62,50,1,38,NULL,NULL),(63,50,1,39,NULL,NULL),(64,72,1,40,NULL,NULL),(65,41,1,40,NULL,NULL),(66,39,2,41,NULL,NULL),(67,41,1,41,NULL,NULL),(68,39,1,42,NULL,NULL),(69,48,1,43,NULL,NULL),(70,43,1,43,NULL,NULL);
/*!40000 ALTER TABLE `product_shopping_cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL DEFAULT '0',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `thumbnail` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT 'ACTIVO',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `precio_oferta` double DEFAULT (`price`),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (39,'Juego de habitación','juego-de-habitacion',50000,'Tempur-Pedic - Cubrecolchón TEMPUR Supreme, 3 pulgadas, firmeza media, tamaño matrimonial, color blanco','public/images/ZwkLMak2lmUolb8erteAXEORkevOOBk3nGSKMq4Y.jpg','OFERTA','2023-02-24 07:16:21','2023-06-06 18:43:00',50000),(40,'Juego de Cocina','juego-de-cocina',11000,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','public/images/9eAdQoFv3J2ykbIXIokyziSVKuDRnl5TV8q8TyJD.jpg','ACTIVO','2023-02-24 07:17:17','2023-04-27 18:34:45',11000),(41,'Set de cucharones','set-de-cucharones',8900,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','public/images/RxoJ4DRQMtvJVBBiVWfcphYF7vFYJKxDyGQrXhn6.jpg','OFERTA','2023-02-24 07:17:55','2023-05-25 15:13:22',8100),(42,'Servicio de amueblamiento','servicio-de-amueblamiento',160700,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','public/images/GlFDjV7FixnlbCh02IgRs3D9yot4zNdczBycLtzE.jpg','OFERTA','2023-02-24 07:19:28','2023-04-27 17:39:35',16500),(43,'Acondicionador de aire','acondicionador-de-aire',10900,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','public/images/oew7O0mYgvboXmfAWoKrU4AiYLEjdfMT4uFDBDMV.jpg','OFERTA','2023-02-24 07:19:54','2023-04-27 18:36:27',10000),(44,'Juego de Cocina en Caoba','juego-de-cocina-en-caoba',45900,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','public/images/KpTIdSFoGLsvxXY1Aq6FmvMCkJxzQTXStZTkKuEz.jpg','ACTIVO','2023-02-24 07:20:41','2023-04-27 18:35:07',45900),(45,'Batidora','batidora',12300,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','public/images/O2F3HVYEXsKFtBWeHmucKBbRxVoeNpLcRPGkk7Gs.jpg','ACTIVO','2023-02-24 07:21:09','2023-03-09 22:15:58',12300),(46,'Mesa de sala','mesa-de-sala',15400,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','public/images/2SV4N4BkSfXdVoVLLifv6DEuQUkvSiZ0P71Dwl95.jpg','ACTIVO','2023-02-24 07:21:28','2023-02-24 13:14:33',15400),(47,'Horno de Cocina Integrado','horno-de-cocina-integrado',34600,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','public/images/vSeWzbtQX6AoV0VhZCCUy5mg8aJCDN4T58pNCjWn.jpg','ACTIVO','2023-02-24 07:21:50','2023-03-09 22:16:09',34600),(48,'Set de cucharones rústicos','set-de-cucharones-rusticos',2400,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','public/images/Ig8aHJQbSiRVIuyZ2zyTL3PFPYsYZtzDrUyV7oiG.jpg','ACTIVO','2023-02-24 07:22:22','2023-02-24 07:22:22',2400),(49,'Set de cucharones lujosos','set-de-cucharones-lujosos',5600,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','public/images/86Ns9BudFE2PeRbwFikGL2Jptny36zKrHvcuTK5w.jpg','ACTIVO','2023-02-24 07:22:43','2023-02-24 07:22:43',5600),(50,'Olla de Cocina lujosa','olla-de-cocina-lujosa',3560,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.','public/images/Z6pmdkpJw8SIN5TCptBzUgqjPQWLwgW976AueRAK.jpg','ACTIVO','2023-02-24 07:23:08','2023-04-27 18:27:19',3560),(57,'Juego de habitación rústico','juego-de-habitacion-rustico',25600,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','public/images/PyfyIXbiL9z3JGeISO6GesmFvNKLcvBxuX6QoheC.jpg','ACTIVO','2023-03-11 23:05:33','2023-03-11 23:05:33',25600),(58,'Juego de comedor pastel','juego-de-comedor-pastel',25400,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','public/images/7Psjqmm1LfFE4RHwXugHrRpPBVMGDP0OXHBp3NUc.jpg','ACTIVO','2023-03-11 23:06:46','2023-03-11 23:06:46',25400),(59,'Juego de comedor lujoso','juego-de-comedor-lujoso',35000,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','public/images/gH2WFd4SXbY4IDqaG4osNp2jeXtTUoxwCNDCHpTj.jpg','ACTIVO','2023-03-11 23:07:15','2023-03-11 23:07:15',35000),(60,'Escritorio de oficina','escritorio-de-oficina',19600,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','public/images/5gLLdothigA2nAtavLK35d4zvSmqdW2AFuJnvYFv.jpg','ACTIVO','2023-03-11 23:08:02','2023-03-11 23:08:02',19600),(61,'Set de oficina','set-de-oficina',15400,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','public/images/H9nnUkNH7XjQpZIQvTNtBThW75dx09n1fBGEmhtH.jpg','ACTIVO','2023-03-11 23:08:47','2023-03-11 23:08:47',15400),(62,'Juego de minisala','juego-de-minisala',15600,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','public/images/UyFmHkxRWggNSW7W6AyNqA5prvN8moO4qzyOIHYW.jpg','ACTIVO','2023-03-11 23:09:15','2023-03-11 23:09:15',15600),(63,'Microondas retro','microondas-retro',5900,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','public/images/lSVOWragt3CGasht2RP8dON83NiGudI7MoL4EiMY.jpg','ACTIVO','2023-03-11 23:10:06','2023-03-11 23:10:06',5900),(64,'Juego de sillones','juego-de-sillones',15000,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','public/images/uId2tnHknt7XoNhLa3maw1g2UUAbGv0vgakLQVxs.jpg','ACTIVO','2023-03-11 23:10:36','2023-03-11 23:10:36',15000),(65,'Juego de terraza','juego-de-terraza',35600,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','public/images/P2l7OyeB6zsGszDAPLY7emfISvTuyiCa6TeyPiX7.jpg','ACTIVO','2023-03-11 23:11:04','2023-03-11 23:11:04',35600),(66,'Macetas simples','macetas-simples',2300,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','public/images/JOcphmWoWvZk3h4zf8xqmLuDFpC63nd820vQyuds.jpg','ACTIVO','2023-03-11 23:11:26','2023-03-11 23:11:26',2300),(67,'Plantas decorativas','plantas-decorativas',4500,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.','public/images/ITs3TxBWTQ0opN71TUBHRirKeXbfpzaSEnMz6WZw.jpg','ACTIVO','2023-03-11 23:11:48','2023-03-11 23:11:48',4500),(72,'asdfgh','asdfgh',1200,'asd','public/images/EpK7y1vW6XBc3wDUTK95jMZHBw8FbppeOw6zSQNB.jpg','ACTIVO','2023-04-20 20:59:56','2023-05-25 15:13:22',1200);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_carts`
--

DROP TABLE IF EXISTS `shopping_carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shopping_carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL DEFAULT '0',
  `usuario` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shopping_carts_usuario_foreign` (`usuario`),
  CONSTRAINT `shopping_carts_usuario_foreign` FOREIGN KEY (`usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_carts`
--

LOCK TABLES `shopping_carts` WRITE;
/*!40000 ALTER TABLE `shopping_carts` DISABLE KEYS */;
INSERT INTO `shopping_carts` VALUES (23,1,2,'2023-04-20 12:26:02','2023-04-20 15:52:26'),(24,1,2,'2023-04-20 15:52:38','2023-04-20 18:46:13'),(25,1,1,'2023-04-20 16:18:12','2023-04-20 16:25:34'),(26,1,1,'2023-04-20 16:25:47','2023-04-20 18:21:47'),(27,0,1,'2023-04-20 18:21:57','2023-04-20 18:21:57'),(28,1,2,'2023-04-20 19:21:29','2023-04-20 19:56:05'),(29,1,2,'2023-04-20 20:06:14','2023-04-27 13:19:40'),(30,1,2,'2023-04-27 13:19:46','2023-04-27 13:37:28'),(31,1,2,'2023-04-27 13:39:01','2023-04-27 13:40:05'),(32,1,2,'2023-04-27 13:40:07','2023-04-27 13:51:22'),(33,1,2,'2023-04-27 13:51:25','2023-04-27 14:12:46'),(34,1,2,'2023-04-27 14:35:17','2023-04-27 14:36:26'),(35,1,2,'2023-04-27 17:37:10','2023-04-27 17:37:30'),(36,1,2,'2023-04-27 17:39:13','2023-04-27 17:39:35'),(37,1,2,'2023-04-27 17:43:09','2023-04-27 17:43:49'),(38,1,2,'2023-04-27 17:46:51','2023-04-27 18:22:39'),(39,1,2,'2023-04-27 18:22:46','2023-04-27 18:27:19'),(40,1,2,'2023-04-27 18:27:25','2023-05-25 15:11:09'),(41,1,2,'2023-05-25 15:13:30','2023-06-14 15:03:19'),(42,1,2,'2023-06-14 15:04:45','2023-06-14 15:05:52'),(43,1,2,'2023-06-14 15:06:00','2023-06-16 21:12:39'),(44,0,2,'2023-06-16 21:12:50','2023-06-16 21:12:50');
/*!40000 ALTER TABLE `shopping_carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
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
INSERT INTO `users` VALUES (1,'Almer Alvarez','almer@gmail.com','','','',NULL,'$2y$10$z2baBcBxMn.I8XEwvd0FeuIpKt4s3CKcuvhA.KL3SiovY1I7cGIWi',0,'x6TJfKktaSehxa068xqiRfon4mURNTI6S50RWuqm9XNrVWYxInNc0rpzIqbn','2023-03-16 21:31:46','2023-03-16 21:39:19'),(2,'Ransel Encarnación','raseleg2211@gmail.com','8297447031','87646536546','Praderas del Norte',NULL,'$2y$10$iOhjWcAcyCBzQwXEp5I5JOPl5PsoYY28bCJBtnjFW0EEmLmCr7.RO',1,'uWeFU2Hj5btz3iUPb7Ogo9BdNrsWtVy8OhiTITNlLlH2FiRggLhsccAcY5Xx','2023-03-17 01:49:57','2023-03-17 01:49:57');
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

-- Dump completed on 2023-06-16 18:11:23
