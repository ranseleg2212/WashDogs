-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para tienda
CREATE DATABASE IF NOT EXISTS `tienda` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `tienda`;

-- Volcando estructura para tabla tienda.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.orders
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `shopping_cart_id` bigint unsigned DEFAULT NULL,
  `total` double NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `id_user` bigint unsigned NOT NULL DEFAULT '0',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Registrado',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `token` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lugar_entrega` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hora_entrega` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `persona_entrega` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `recibido_entrega` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_shopping_cart_id_unique` (`shopping_cart_id`),
  KEY `orders_id_user_foreign` (`id_user`),
  CONSTRAINT `orders_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_shopping_cart_id_foreign` FOREIGN KEY (`shopping_cart_id`) REFERENCES `shopping_carts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
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

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.products
CREATE TABLE IF NOT EXISTS `products` (
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
  `cantidad_disponible` int DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.product_shopping_cart
CREATE TABLE IF NOT EXISTS `product_shopping_cart` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` bigint unsigned NOT NULL,
  `cantidad` int NOT NULL DEFAULT '1',
  `shopping_cart_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_shopping_cart_shopping_cart_id_foreign` (`shopping_cart_id`),
  CONSTRAINT `product_shopping_cart_shopping_cart_id_foreign` FOREIGN KEY (`shopping_cart_id`) REFERENCES `shopping_carts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.shopping_carts
CREATE TABLE IF NOT EXISTS `shopping_carts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `status` int NOT NULL DEFAULT '0',
  `usuario` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shopping_carts_usuario_foreign` (`usuario`),
  CONSTRAINT `shopping_carts_usuario_foreign` FOREIGN KEY (`usuario`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla tienda.solicitud_creditos
CREATE TABLE IF NOT EXISTS `solicitud_creditos` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `estado_solicitud` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` text COLLATE utf8mb4_unicode_ci,
  `monto_solicitado` double NOT NULL,
  `nombres_solicitante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos_solicitante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ocupacion_solicitante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacimiento_solicitante` date NOT NULL,
  `direccion_solicitante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_residencial_solicitante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia_ubicacion_solicitante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_celular_solicitante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto_alquiler_solicitante` double DEFAULT NULL,
  `tipo_vivienda_solicitante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `apodo_solicitante` text COLLATE utf8mb4_unicode_ci,
  `estado_civil_solicitante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cedula_pasaporte_solicitante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehiculo_solicitante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca_vehiculo_solicitante` text COLLATE utf8mb4_unicode_ci,
  `correo_solicitante` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_negocio_solicitante` text COLLATE utf8mb4_unicode_ci,
  `tel_negocio_solicitante` text COLLATE utf8mb4_unicode_ci,
  `tipo_garantia_negocio_solicitante` text COLLATE utf8mb4_unicode_ci,
  `direccion_negocio_solicitante` text COLLATE utf8mb4_unicode_ci,
  `empleados_negocio_solicitante` int DEFAULT NULL,
  `monto_alquiler_negocio_solicitante` double DEFAULT NULL,
  `tipo_local_negocio_solicitante` text COLLATE utf8mb4_unicode_ci,
  `tiempo_negocio_solicitante` text COLLATE utf8mb4_unicode_ci,
  `ventas_diarias_negocio_solicitante` int DEFAULT NULL,
  `otro_negocio_solicitante` text COLLATE utf8mb4_unicode_ci,
  `empresa_laboral_solicitante` text COLLATE utf8mb4_unicode_ci,
  `tipo_empresa_laboral_solicitante` text COLLATE utf8mb4_unicode_ci,
  `direccion_empresa_laboral_solicitante` text COLLATE utf8mb4_unicode_ci,
  `tel_empresa_laboral_solicitante` text COLLATE utf8mb4_unicode_ci,
  `cargo_laboral_solicitante` text COLLATE utf8mb4_unicode_ci,
  `salario_laboral_solicitante` double DEFAULT NULL,
  `tiempo_laboral_solicitante` text COLLATE utf8mb4_unicode_ci,
  `nombre_jefe_laboral_solicitante` text COLLATE utf8mb4_unicode_ci,
  `nombres_conyugue_solicitante` text COLLATE utf8mb4_unicode_ci,
  `apellidos_conyugue_solicitante` text COLLATE utf8mb4_unicode_ci,
  `cedula_conyugue_solicitante` text COLLATE utf8mb4_unicode_ci,
  `trabajo_conyugue_solicitante` text COLLATE utf8mb4_unicode_ci,
  `direccion_trabajo_conyugue_solicitante` text COLLATE utf8mb4_unicode_ci,
  `direccion_residencial_conyugue_solicitante` text COLLATE utf8mb4_unicode_ci,
  `tel_trabajo_conyugue_solicitante` text COLLATE utf8mb4_unicode_ci,
  `tel_celular_conyugue_solicitante` text COLLATE utf8mb4_unicode_ci,
  `ingresos_conyugue_solicitante` double DEFAULT NULL,
  `nombre_familiar_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentesco_familiar_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_familiar_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_familiar_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_familiar_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parentesco_familiar_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_familiar_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_familiar_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombres_codeudor_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos_codeudor_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacimiento_codeudor_uno` date NOT NULL,
  `direccion_codeudor_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia_ubicacion_codeudor_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_residencial_codeudor_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_celular_codeudor_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_vivienda_codeudor_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto_alquiler_codeudor_uno` double DEFAULT NULL,
  `apodo_codeudor_uno` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cedula_pasaporte_codeudor_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ocupacion_codeudor_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehiculo_codeudor_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca_vehiculo_codeudor_uno` text COLLATE utf8mb4_unicode_ci,
  `estado_civil_codeudor_uno` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_negocio_codeudor_uno` text COLLATE utf8mb4_unicode_ci,
  `direccion_negocio_codeudor_uno` text COLLATE utf8mb4_unicode_ci,
  `ventas_negocio_codeudor_uno` text COLLATE utf8mb4_unicode_ci,
  `tipo_local_negocio_codeudor_uno` text COLLATE utf8mb4_unicode_ci,
  `nombres_codeudor_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos_codeudor_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacimiento_codeudor_dos` date NOT NULL,
  `direccion_codeudor_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `referencia_ubicacion_codeudor_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_residencial_codeudor_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel_celular_codeudor_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_vivienda_codeudor_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto_alquiler_codeudor_dos` double DEFAULT NULL,
  `apodo_codeudor_dos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cedula_pasaporte_codeudor_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ocupacion_codeudor_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `vehiculo_codeudor_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `marca_vehiculo_codeudor_dos` text COLLATE utf8mb4_unicode_ci,
  `estado_civil_codeudor_dos` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_negocio_codeudor_dos` text COLLATE utf8mb4_unicode_ci,
  `direccion_negocio_codeudor_dos` text COLLATE utf8mb4_unicode_ci,
  `ventas_negocio_codeudor_dos` text COLLATE utf8mb4_unicode_ci,
  `tipo_local_negocio_codeudor_dos` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para procedimiento tienda.update_product_status
DELIMITER //
CREATE PROCEDURE `update_product_status`(
	IN `product_id` INT
)
BEGIN
DECLARE current_status VARCHAR(50);
    DECLARE new_status VARCHAR(50);

    SELECT status INTO current_status FROM products WHERE id = product_id;

    IF (SELECT cantidad_disponible FROM products WHERE id = product_id) <= 2 THEN
        SET new_status = 'INACTIVO';
    ELSE
        SET new_status = current_status;
    END IF;

    IF new_status <> current_status THEN
        UPDATE products SET status = new_status WHERE id = product_id;
    END IF;
END//
DELIMITER ;

-- Volcando estructura para tabla tienda.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- La exportación de datos fue deseleccionada.

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
tiendausers