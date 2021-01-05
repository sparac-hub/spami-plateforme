-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: sparac
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT = @@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS = @@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION = @@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activity_log`
(
    `id`           int(10) unsigned                NOT NULL AUTO_INCREMENT,
    `log_name`     varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `description`  text COLLATE utf8mb4_unicode_ci NOT NULL,
    `subject_id`   int(11)                                 DEFAULT NULL,
    `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `causer_id`    int(11)                                 DEFAULT NULL,
    `causer_type`  varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `properties`   text COLLATE utf8mb4_unicode_ci         DEFAULT NULL,
    `created_at`   timestamp                       NULL    DEFAULT NULL,
    `updated_at`   timestamp                       NULL    DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `activity_log_log_name_index` (`log_name`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 11
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log`
    DISABLE KEYS */;
INSERT INTO `activity_log`
VALUES (1, 'default', 'created', 1, 'App\\Models\\Cms\\User', NULL, NULL,
        '{\"attributes\":{\"name\":\"Admin\",\"email\":\"admin@medianet.test\"}}', '2020-12-31 14:37:26',
        '2020-12-31 14:37:26'),
       (2, 'default', 'created', 2, 'App\\Models\\Cms\\User', NULL, NULL,
        '{\"attributes\":{\"name\":\"User\",\"email\":\"user@medianet.test\"}}', '2020-12-31 14:37:26',
        '2020-12-31 14:37:26'),
       (3, 'default', 'created', 1, 'App\\Models\\Cms\\Menu', NULL, NULL,
        '{\"attributes\":{\"menu_group_id\":1,\"module_id\":4,\"menu_id\":null,\"route_name\":null,\"route_parameters\":null,\"parent_id\":null,\"link_type_id\":null,\"http_protocol\":null,\"external_link\":null,\"internal_link\":null,\"link_target\":null,\"is_active\":1,\"icon\":\"\",\"order\":10,\"css_class\":\"\"}}',
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (4, 'default', 'created', 1, 'App\\Models\\Cms\\MenuTranslation', NULL, NULL,
        '{\"attributes\":{\"menu_id\":1,\"locale\":\"fr\",\"label\":\"fr Home\",\"slug\":\"fr-home\",\"meta_title\":\"fr Home\",\"meta_description\":\"fr Home\",\"content\":\"fr Home\"}}',
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (5, 'default', 'created', 2, 'App\\Models\\Cms\\MenuTranslation', NULL, NULL,
        '{\"attributes\":{\"menu_id\":1,\"locale\":\"en\",\"label\":\"en Home\",\"slug\":\"en-home\",\"meta_title\":\"en Home\",\"meta_description\":\"en Home\",\"content\":\"en Home\"}}',
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (6, 'default', 'created', 3, 'App\\Models\\Cms\\MenuTranslation', NULL, NULL,
        '{\"attributes\":{\"menu_id\":1,\"locale\":\"ar\",\"label\":\"ar Home\",\"slug\":\"ar-home\",\"meta_title\":\"ar Home\",\"meta_description\":\"ar Home\",\"content\":\"ar Home\"}}',
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (7, 'default', 'created', 2, 'App\\Models\\Cms\\Menu', NULL, NULL,
        '{\"attributes\":{\"menu_group_id\":5,\"module_id\":null,\"menu_id\":null,\"route_name\":null,\"route_parameters\":null,\"parent_id\":null,\"link_type_id\":3,\"http_protocol\":\"https:\\/\\/\",\"external_link\":\"www.google.com\",\"internal_link\":null,\"link_target\":\"_blank\",\"is_active\":0,\"icon\":\"\",\"order\":10,\"css_class\":\"\"}}',
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (8, 'default', 'created', 4, 'App\\Models\\Cms\\MenuTranslation', NULL, NULL,
        '{\"attributes\":{\"menu_id\":2,\"locale\":\"fr\",\"label\":\"fr google \",\"slug\":\"fr-google\",\"meta_title\":\"fr meta title \",\"meta_description\":\"fr meta description \",\"content\":\"fr menu content \"}}',
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (9, 'default', 'created', 5, 'App\\Models\\Cms\\MenuTranslation', NULL, NULL,
        '{\"attributes\":{\"menu_id\":2,\"locale\":\"en\",\"label\":\"en google \",\"slug\":\"en-google\",\"meta_title\":\"en meta title \",\"meta_description\":\"en meta description \",\"content\":\"en menu content \"}}',
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (10, 'default', 'created', 6, 'App\\Models\\Cms\\MenuTranslation', NULL, NULL,
        '{\"attributes\":{\"menu_id\":2,\"locale\":\"ar\",\"label\":\"ar google \",\"slug\":\"ar-google\",\"meta_title\":\"ar meta title \",\"meta_description\":\"ar meta description \",\"content\":\"ar menu content \"}}',
        '2020-12-31 14:37:28', '2020-12-31 14:37:28');
/*!40000 ALTER TABLE `activity_log`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspim_categories`
--

DROP TABLE IF EXISTS `aspim_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aspim_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned          DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `order`      int(11)                   DEFAULT NULL,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `aspim_categories_menu_id_foreign` (`menu_id`),
    CONSTRAINT `aspim_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspim_categories`
--

LOCK TABLES `aspim_categories` WRITE;
/*!40000 ALTER TABLE `aspim_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `aspim_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspim_category_translations`
--

DROP TABLE IF EXISTS `aspim_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aspim_category_translations`
(
    `id`                int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `aspim_category_id` int(10) unsigned                        NOT NULL,
    `locale`            varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`              varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`              varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`       text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`        timestamp                               NULL DEFAULT NULL,
    `created_at`        timestamp                               NULL DEFAULT NULL,
    `updated_at`        timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `aspim_category_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `aspim_category_translations_aspim_category_id_foreign` (`aspim_category_id`),
    CONSTRAINT `aspim_category_translations_aspim_category_id_foreign` FOREIGN KEY (`aspim_category_id`) REFERENCES `aspim_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspim_category_translations`
--

LOCK TABLES `aspim_category_translations` WRITE;
/*!40000 ALTER TABLE `aspim_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `aspim_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspim_translations`
--

DROP TABLE IF EXISTS `aspim_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aspim_translations`
(
    `id`                       int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `aspim_id`                 int(10) unsigned                        NOT NULL,
    `locale`                   varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`                     varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`                     text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `status`                   text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `creation_text`            text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `physical_features`        mediumtext COLLATE utf8mb4_unicode_ci        DEFAULT NULL,
    `ecological_features`      mediumtext COLLATE utf8mb4_unicode_ci        DEFAULT NULL,
    `threats_and_pressures`    mediumtext COLLATE utf8mb4_unicode_ci        DEFAULT NULL,
    `teritory`                 mediumtext COLLATE utf8mb4_unicode_ci        DEFAULT NULL,
    `mediterranean_importance` mediumtext COLLATE utf8mb4_unicode_ci        DEFAULT NULL,
    `management_body`          text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `geographic_position`      text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `meta_title`               varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `meta_description`         varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `deleted_at`               timestamp                               NULL DEFAULT NULL,
    `created_at`               timestamp                               NULL DEFAULT NULL,
    `updated_at`               timestamp                               NULL DEFAULT NULL,
    `schemas`                  mediumtext COLLATE utf8mb4_unicode_ci        DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `aspim_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `aspim_translations_aspim_id_foreign` (`aspim_id`),
    CONSTRAINT `aspim_translations_aspim_id_foreign` FOREIGN KEY (`aspim_id`) REFERENCES `aspims` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspim_translations`
--

LOCK TABLES `aspim_translations` WRITE;
/*!40000 ALTER TABLE `aspim_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `aspim_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspims`
--

DROP TABLE IF EXISTS `aspims`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aspims`
(
    `id`                   int(10) unsigned NOT NULL AUTO_INCREMENT,
    `website`              varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `included_at`          year(4)                                 DEFAULT NULL,
    `total_surface`        double(14, 2)                           DEFAULT NULL,
    `total_surface_marine` double(14, 2)                           DEFAULT NULL,
    `width`                double(14, 2)                           DEFAULT NULL,
    `aspim_category_id`    int(10) unsigned                        DEFAULT NULL,
    `creation_date`        int(11)                                 DEFAULT NULL,
    `geojson`              varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `is_mpa`               tinyint(1)       NOT NULL               DEFAULT 0,
    `mapamed_feature_id`   varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `business_plan`        text COLLATE utf8mb4_unicode_ci         DEFAULT NULL,
    `is_active`            tinyint(1)       NOT NULL               DEFAULT 0,
    `menu_id`              int(10) unsigned                        DEFAULT NULL,
    `deleted_by`           int(11)                                 DEFAULT NULL,
    `created_by`           int(11)                                 DEFAULT NULL,
    `updated_by`           int(11)                                 DEFAULT NULL,
    `deleted_at`           timestamp        NULL                   DEFAULT NULL,
    `created_at`           timestamp        NULL                   DEFAULT NULL,
    `updated_at`           timestamp        NULL                   DEFAULT NULL,
    `website_name`         varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `aspims_aspim_category_id_foreign` (`aspim_category_id`),
    KEY `aspims_menu_id_foreign` (`menu_id`),
    CONSTRAINT `aspims_aspim_category_id_foreign` FOREIGN KEY (`aspim_category_id`) REFERENCES `aspim_categories` (`id`),
    CONSTRAINT `aspims_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspims`
--

LOCK TABLES `aspims` WRITE;
/*!40000 ALTER TABLE `aspims`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `aspims`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspims_countries`
--

DROP TABLE IF EXISTS `aspims_countries`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aspims_countries`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `aspim_id`   int(10) unsigned NOT NULL,
    `country_id` int(10) unsigned NOT NULL,
    PRIMARY KEY (`id`),
    KEY `aspims_countries_aspim_id_foreign` (`aspim_id`),
    KEY `aspims_countries_country_id_foreign` (`country_id`),
    CONSTRAINT `aspims_countries_aspim_id_foreign` FOREIGN KEY (`aspim_id`) REFERENCES `aspims` (`id`),
    CONSTRAINT `aspims_countries_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspims_countries`
--

LOCK TABLES `aspims_countries` WRITE;
/*!40000 ALTER TABLE `aspims_countries`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `aspims_countries`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `aspims_gestionnaire_aspims`
--

DROP TABLE IF EXISTS `aspims_gestionnaire_aspims`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `aspims_gestionnaire_aspims`
(
    `id`                    int(10) unsigned NOT NULL AUTO_INCREMENT,
    `aspim_id`              int(10) unsigned NOT NULL,
    `gestionnaire_aspim_id` int(10) unsigned NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `aspims_gestionnaire_aspims`
--

LOCK TABLES `aspims_gestionnaire_aspims` WRITE;
/*!40000 ALTER TABLE `aspims_gestionnaire_aspims`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `aspims_gestionnaire_aspims`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner_translations`
--

DROP TABLE IF EXISTS `banner_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner_translations`
(
    `id`                int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `locale`            varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `banner_id`         int(10) unsigned                        NOT NULL,
    `back_office_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `title`             varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `title_2`           varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `description`       text COLLATE utf8mb4_unicode_ci                  DEFAULT NULL,
    `meta_title`        varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `meta_description`  varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `button_title`      varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `deleted_at`        timestamp                               NULL     DEFAULT NULL,
    `created_at`        timestamp                               NULL     DEFAULT NULL,
    `updated_at`        timestamp                               NULL     DEFAULT NULL,
    `link_type_id`      varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `link_target`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
    `http_protocol`     varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `external_link`     varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `internal_link`     varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `menu_id`           int(10) unsigned                                 DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `banner_translations_banner_id_locale_deleted_at_unique` (`banner_id`, `locale`, `deleted_at`),
    KEY `banner_translations_menu_id_foreign` (`menu_id`),
    CONSTRAINT `banner_translations_banner_id_foreign` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`id`) ON DELETE CASCADE,
    CONSTRAINT `banner_translations_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 67
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner_translations`
--

LOCK TABLES `banner_translations` WRITE;
/*!40000 ALTER TABLE `banner_translations`
    DISABLE KEYS */;
INSERT INTO `banner_translations`
VALUES (1, 'en', 1, 'Odit quidem fuga reiciendisen', 'en eligendi ut dolor ipsam ipsam quia tempore quo quis quas iden',
        NULL, 'en Desc event en Voluptatem quia corrupti veritatis ut.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (2, 'fr', 1, 'Totam occaecati consequatur qui nonfr',
        'fr inventore mollitia fugiat quia aut qui inventore id veritatis quofr', NULL,
        'fr Desc event fr Itaque rerum sint.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (3, 'ar', 1, 'Placeat nihil optio et molestiaear',
        'ar quo esse dolores praesentium eveniet nam expedita numquam earumar', NULL,
        'ar Desc event ar Consectetur aut sequi accusantium.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (4, 'en', 2, 'Et molestiaeen', 'en eius aut iure in mollitia sed sapiente omnis et molestiaeen', NULL,
        'en Desc event en Libero dolor autem.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (5, 'fr', 2, 'Vel quisquam asperiores eaquefr', 'fr modi quam omnis unde non omnis explicabofr', NULL,
        'fr Desc event fr Ut sit quo rem et quae.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (6, 'ar', 2, 'Qui voluptatem ipsaar', 'ar quidem sit dolorum ut aliquam commodi pariatur laborumar', NULL,
        'ar Desc event ar At consequatur doloremque impedit est sunt.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (7, 'en', 3, 'Esse et veniam et veniamen',
        'en quas impedit eligendi repellat sit iusto et fugiat expedita aut non voluptatemen', NULL,
        'en Desc event en Aut voluptatum quia aut deleniti.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (8, 'fr', 3, 'Occaecati quamfr', 'fr quasi consequuntur qui enim enim quo rerum voluptas minima liberofr', NULL,
        'fr Desc event fr Et et rerum ut voluptatem.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (9, 'ar', 3, 'Voluptates possimusar', 'ar dignissimos ab dignissimos quia quis rerum omnisar', NULL,
        'ar Desc event ar Accusamus aut blanditiis eius.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (10, 'en', 4, 'Dolores aden', 'en porro vel amet distinctio sapiente facere quia corporis omnisen', NULL,
        'en Desc event en Tenetur ut consequuntur asperiores qui.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (11, 'fr', 4, 'Officia voluptatem voluptatemfr',
        'fr neque aut voluptatem voluptates numquam dolorem sint deserunt illo totam vitaefr', NULL,
        'fr Desc event fr Magnam id dolorum numquam quaerat.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (12, 'ar', 4, 'Magni aut modiar',
        'ar rerum ea eveniet dolor iste laborum eius qui eos voluptatem laboriosam velitar', NULL,
        'ar Desc event ar Perspiciatis consequatur ut.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (13, 'en', 5, 'Quia et quas quien', 'en nulla at et corrupti a amet eiusen', NULL,
        'en Desc event en Vel illum porro occaecati rerum.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (14, 'fr', 5, 'Eum nihil facilisfr', 'fr fugit adipisci at nisi atque quae rerum aut asperiores perspiciatisfr',
        NULL, 'fr Desc event fr Alias impedit et dicta.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (15, 'ar', 5, 'Eligendi ea ipsam aliquid ipsumar',
        'ar vel exercitationem vitae blanditiis voluptas maiores voluptas eos qui fugiat quiar', NULL,
        'ar Desc event ar Accusamus mollitia esse deserunt et.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (16, 'en', 6, 'Quos occaecatien', 'en autem voluptas iure et ut ut aut voluptasen', NULL,
        'en Desc event en Maxime voluptate.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (17, 'fr', 6, 'Et vero modi odit etfr', 'fr et ratione voluptates omnis minus vero quos suntfr', NULL,
        'fr Desc event fr Autem sunt quo.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL,
        '_self', NULL, NULL, NULL, NULL),
       (18, 'ar', 6, 'Quibusdam estar', 'ar id voluptatibus dolores temporibus eius natus animi utar', NULL,
        'ar Desc event ar Labore explicabo modi quia est cupiditate.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (19, 'en', 7, 'Quae autem non deleniti rerumen',
        'en voluptas omnis incidunt repellat ipsum occaecati nobis sit quaerat unde blanditiis esten', NULL,
        'en Desc event en Ex atque quia.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL,
        '_self', NULL, NULL, NULL, NULL),
       (20, 'fr', 7, 'Culpa nulla exercitationemfr', 'fr ut consequatur non accusamus dolor ab hic essefr', NULL,
        'fr Desc event fr Maiores voluptatem aut maxime.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (21, 'ar', 7, 'Blanditiis cupiditate aut velit abar',
        'ar officiis neque numquam illo recusandae temporibus quis voluptatem maioresar', NULL,
        'ar Desc event ar Consectetur dicta quia et ipsum.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (22, 'en', 8, 'Maiores quien',
        'en fugiat tempore omnis ipsam ducimus quaerat dolores distinctio consequatur et nonen', NULL,
        'en Desc event en Ut ratione soluta.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (23, 'fr', 8, 'Nobis temporibus quifr',
        'fr molestiae quidem quo sed reiciendis sapiente non saepe praesentium eiusfr', NULL,
        'fr Desc event fr Quia ipsa non.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL,
        '_self', NULL, NULL, NULL, NULL),
       (24, 'ar', 8, 'Velit deserunt aperiamar', 'ar sunt illo iusto sit et est vero consequatur voluptatesar', NULL,
        'ar Desc event ar Voluptas voluptatem aut.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (25, 'en', 9, 'Ipsa exercitationem delectus nihil aspernaturen', 'en omnis ut perspiciatis quo id optio remen',
        NULL, 'en Desc event en Voluptatum fugit assumenda sed.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (26, 'fr', 9, 'Ut debitis magnifr', 'fr provident magni omnis commodi alias iure vel provident nemofr', NULL,
        'fr Desc event fr Omnis tenetur esse est.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (27, 'ar', 9, 'Recusandae nulla ea autar',
        'ar expedita totam sit omnis voluptatibus perferendis veritatis officiis enim numquamar', NULL,
        'ar Desc event ar Quaerat sapiente magnam modi.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (28, 'en', 10, 'Fugit voluptatesen',
        'en molestiae voluptas possimus fugit nemo voluptatem qui incidunt similiqueen', NULL,
        'en Desc event en Quo unde nesciunt.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (29, 'fr', 10, 'Ipsa doloremfr', 'fr non vel cum quia veniam nam dolorem et maximefr', NULL,
        'fr Desc event fr Impedit officia laboriosam amet quaerat.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (30, 'ar', 10, 'Enim pariatur atar',
        'ar alias mollitia inventore soluta sint quas qui est fuga qui expedita consequaturar', NULL,
        'ar Desc event ar Fuga nisi dolorem.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (31, 'en', 11, 'Ex eius siten', 'en error consequatur dolore officiis qui cumque evenieten', NULL,
        'en Desc event en Fuga earum et sed.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (32, 'fr', 11, 'Laudantium id perferendis dolor dictafr',
        'fr quidem praesentium autem incidunt est incidunt suntfr', NULL,
        'fr Desc event fr Totam natus ratione iusto voluptas.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (33, 'ar', 11, 'Incidunt cumquear', 'ar et facere sed architecto est ullam remar', NULL,
        'ar Desc event ar Reprehenderit nobis adipisci omnis alias.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (34, 'en', 12, 'Quaerat sunt delectus et numquamen',
        'en quisquam odit molestiae ab autem dolores ut sit non veliten', NULL,
        'en Desc event en Fuga quod quisquam eum.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (35, 'fr', 12, 'Quasi omnisfr', 'fr incidunt quo est odio similique qui possimusfr', NULL,
        'fr Desc event fr Dolorem commodi consequatur.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (36, 'ar', 12, 'Reprehenderit laudantium nonar',
        'ar sunt est dolores et repellendus molestias error aspernaturar', NULL,
        'ar Desc event ar Doloribus at dolores aut et.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (37, 'en', 13, 'Qui sapiente ipsumen', 'en consequatur accusamus reiciendis rerum est ipsa hic sapienteen', NULL,
        'en Desc event en Et amet asperiores.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (38, 'fr', 13, 'Voluptatem ut quisquam quifr', 'fr atque sint quasi commodi culpa quidem quam sitfr', NULL,
        'fr Desc event fr Neque autem.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL,
        '_self', NULL, NULL, NULL, NULL),
       (39, 'ar', 13, 'Accusantium pariaturar',
        'ar eum sed aliquam possimus dolore libero natus quam nihil error sequiar', NULL,
        'ar Desc event ar Veniam eius nesciunt.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (40, 'en', 14, 'A error voluptatem voluptates vitaeen',
        'en maxime tempora soluta aut nihil incidunt amet quis iste ex aben', NULL,
        'en Desc event en Minus occaecati at quia.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (41, 'fr', 14, 'Suscipit deserunt quaefr',
        'fr et omnis ut cupiditate repellat sequi dignissimos neque consequatur dolore et nonfr', NULL,
        'fr Desc event fr Delectus et velit.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (42, 'ar', 14, 'Earum autar',
        'ar quis similique consequatur explicabo delectus debitis et doloremque rem magnamar', NULL,
        'ar Desc event ar Alias eius vero.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL,
        '_self', NULL, NULL, NULL, NULL),
       (43, 'en', 15, 'Modi hicen', 'en porro autem recusandae aspernatur quia quia eaque consecteturen', NULL,
        'en Desc event en Placeat aut quo.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL,
        '_self', NULL, NULL, NULL, NULL),
       (44, 'fr', 15, 'Enim totam nihil error temporafr',
        'fr molestiae excepturi ratione mollitia quibusdam aut exercitationem voluptates ex est aut doloremfr', NULL,
        'fr Desc event fr Ut voluptas officiis ea.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (45, 'ar', 15, 'Inventore eaque vero quiar', 'ar quod labore aut quia quisquam aut estar', NULL,
        'ar Desc event ar Omnis laborum unde eos.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (46, 'en', 16, 'Dolorem vel molestiae minus auten',
        'en numquam cupiditate quasi nam voluptates aliquam culpa in aut odio sunten', NULL,
        'en Desc event en Ad et minima commodi.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (47, 'fr', 16, 'Tempora minimafr', 'fr et ipsum reiciendis sed repellendus occaecati rem aliquidfr', NULL,
        'fr Desc event fr Blanditiis ipsa ducimus quia est.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (48, 'ar', 16, 'Culpa mollitia corporis nemoar', 'ar omnis id corrupti et quia occaecati quo omnis adar', NULL,
        'ar Desc event ar Autem est et ea.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL,
        '_self', NULL, NULL, NULL, NULL),
       (49, 'en', 17, 'Et quo molestias quisquamen', 'en amet qui sit rem tempora nobis dolor aliasen', NULL,
        'en Desc event en Officia est doloribus recusandae corrupti.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (50, 'fr', 17, 'Consectetur et nobis voluptas quiafr',
        'fr blanditiis atque velit iusto vel ex perferendis iurefr', NULL,
        'fr Desc event fr Recusandae velit ut sapiente et.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28', NULL, '_self', NULL, NULL, NULL, NULL),
       (51, 'ar', 17, 'Eligendi laborum adipisci sintar', 'ar voluptatem aut nihil in laudantium qui dolore velitar',
        NULL, 'ar Desc event ar Quos enim ut voluptatem.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29', NULL, '_self', NULL, NULL, NULL, NULL),
       (52, 'en', 18, 'Voluptate architecto et quosen',
        'en ea doloremque id quas magni aut consequatur quasi sint quo perspiciatisen', NULL,
        'en Desc event en Est quis autem.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29', NULL,
        '_self', NULL, NULL, NULL, NULL),
       (53, 'fr', 18, 'Est deleniti eum estfr', 'fr aliquam sed quas ut eveniet ab in autfr', NULL,
        'fr Desc event fr Et quo sed amet quod enim.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29', NULL, '_self', NULL, NULL, NULL, NULL),
       (54, 'ar', 18, 'Neque autar',
        'ar impedit impedit eum est similique magni dignissimos nesciunt voluptatem sequi magnamar', NULL,
        'ar Desc event ar Ex quod id fuga nemo.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (55, 'en', 19, 'Ad est ad in quien', 'en nemo voluptate omnis ducimus beatae sed veliten', NULL,
        'en Desc event en Aut rem aliquid sed distinctio.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29', NULL, '_self', NULL, NULL, NULL, NULL),
       (56, 'fr', 19, 'Eveniet verofr',
        'fr quisquam soluta qui deleniti deserunt nihil sequi quo odio qui quo pariaturfr', NULL,
        'fr Desc event fr Perferendis vero.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29',
        NULL, '_self', NULL, NULL, NULL, NULL),
       (57, 'ar', 19, 'Eos doloremque sunt tempora quiar', 'ar et vitae ut necessitatibus quo est animiar', NULL,
        'ar Desc event ar Velit corrupti dicta animi quos.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29', NULL, '_self', NULL, NULL, NULL, NULL),
       (58, 'en', 20, 'Deleniti pariaturen', 'en sit natus reiciendis error reiciendis praesentium totam fugit seden',
        NULL, 'en Desc event en Voluptas animi aspernatur porro.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29', NULL, '_self', NULL, NULL, NULL, NULL),
       (59, 'fr', 20, 'Voluptas ut cum autfr', 'fr enim nulla quos tempore velit in aut qui esse quas autfr', NULL,
        'fr Desc event fr Id sit sunt reprehenderit velit.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29', NULL, '_self', NULL, NULL, NULL, NULL),
       (60, 'ar', 20, 'Nulla similique adar', 'ar dicta quia asperiores sed voluptas quia nobis undear', NULL,
        'ar Desc event ar Occaecati ad.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29', NULL,
        '_self', NULL, NULL, NULL, NULL),
       (61, 'en', 21, 'Laboriosam auten', 'en et vel velit totam sed quo natus dolores itaqueen', NULL,
        'en Desc event en Ut soluta nesciunt architecto.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29', NULL, '_self', NULL, NULL, NULL, NULL),
       (62, 'fr', 21, 'Et et ipsamfr', 'fr qui id dolor aliquam enim fuga quaerat nam sapiente repudiandae verofr',
        NULL, 'fr Desc event fr Error debitis excepturi ipsa veritatis.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29', NULL, '_self', NULL, NULL, NULL, NULL),
       (63, 'ar', 21, 'Qui nisi utar', 'ar ea quo cum ad eos aut qui alias et minusar', NULL,
        'ar Desc event ar Autem repellat pariatur et.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29', NULL, '_self', NULL, NULL, NULL, NULL),
       (64, 'en', 22, 'Aut quia voluptatibus vitaeen',
        'en aliquam ullam saepe tenetur aut tenetur quia consequatur exen', NULL, 'en Desc event en Est voluptas eum.',
        NULL, NULL, NULL, NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29', NULL, '_self', NULL, NULL, NULL, NULL),
       (65, 'fr', 22, 'Qui voluptasfr', 'fr maxime natus aut nesciunt libero aspernatur qui autfr', NULL,
        'fr Desc event fr Sequi consequuntur beatae sed doloremque.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29', NULL, '_self', NULL, NULL, NULL, NULL),
       (66, 'ar', 22, 'Harum fugitar', 'ar laborum odio nihil et ratione temporibus illo fugiat in temporaar', NULL,
        'ar Desc event ar Aperiam tempora quasi quas sint.', NULL, NULL, NULL, NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29', NULL, '_self', NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `banner_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banners`
(
    `id`             int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `type`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `image_filepath` varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `video_filepath` varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `script`         text COLLATE utf8mb4_unicode_ci                  DEFAULT NULL,
    `width`          int(11)                                          DEFAULT NULL,
    `height`         int(11)                                          DEFAULT NULL,
    `is_for_mobile`  tinyint(1)                              NOT NULL DEFAULT 0,
    `is_active`      tinyint(1)                              NOT NULL DEFAULT 0,
    `css_class`      varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `thumb`          text COLLATE utf8mb4_unicode_ci                  DEFAULT NULL,
    `deleted_by`     int(11)                                          DEFAULT NULL,
    `created_by`     int(11)                                          DEFAULT NULL,
    `updated_by`     int(11)                                          DEFAULT NULL,
    `deleted_at`     timestamp                               NULL     DEFAULT NULL,
    `created_at`     timestamp                               NULL     DEFAULT NULL,
    `updated_at`     timestamp                               NULL     DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 23
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banners`
--

LOCK TABLES `banners` WRITE;
/*!40000 ALTER TABLE `banners`
    DISABLE KEYS */;
INSERT INTO `banners`
VALUES (1, 'image_file', 'https://lorempixel.com/640/480/?65391', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (2, 'image_file', 'https://lorempixel.com/640/480/?16553', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (3, 'image_file', 'https://lorempixel.com/640/480/?18296', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (4, 'image_file', 'https://lorempixel.com/640/480/?13508', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (5, 'image_file', 'https://lorempixel.com/640/480/?47248', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (6, 'image_file', 'https://lorempixel.com/640/480/?27658', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (7, 'image_file', 'https://lorempixel.com/640/480/?87959', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (8, 'image_file', 'https://lorempixel.com/640/480/?86844', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (9, 'image_file', 'https://lorempixel.com/640/480/?45078', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (10, 'image_file', 'https://lorempixel.com/640/480/?54599', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (11, 'image_file', 'https://lorempixel.com/640/480/?40941', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (12, 'image_file', 'https://lorempixel.com/640/480/?21958', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (13, 'image_file', 'https://lorempixel.com/640/480/?33899', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (14, 'image_file', 'https://lorempixel.com/640/480/?81522', NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (15, 'image_file', 'https://lorempixel.com/640/480/?30386', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (16, 'image_file', 'https://lorempixel.com/640/480/?66957', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (17, 'image_file', 'https://lorempixel.com/640/480/?97724', NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (18, 'image_file', 'https://lorempixel.com/640/480/?64649', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (19, 'image_file', 'https://lorempixel.com/640/480/?63491', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (20, 'image_file', 'https://lorempixel.com/640/480/?99131', NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (21, 'image_file', 'https://lorempixel.com/640/480/?86211', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (22, 'image_file', 'https://lorempixel.com/640/480/?63406', NULL, NULL, NULL, NULL, 1, 0, NULL, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29');
/*!40000 ALTER TABLE `banners`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatter_categories`
--

DROP TABLE IF EXISTS `chatter_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatter_categories`
(
    `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `parent_id`  int(10) unsigned                                 DEFAULT NULL,
    `order`      int(11)                                 NOT NULL DEFAULT 1,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `color`      varchar(20) COLLATE utf8mb4_unicode_ci  NOT NULL,
    `slug`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp                               NULL     DEFAULT NULL,
    `updated_at` timestamp                               NULL     DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatter_categories`
--

LOCK TABLES `chatter_categories` WRITE;
/*!40000 ALTER TABLE `chatter_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `chatter_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatter_discussion`
--

DROP TABLE IF EXISTS `chatter_discussion`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatter_discussion`
(
    `id`                  int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `chatter_category_id` int(10) unsigned                        NOT NULL DEFAULT 1,
    `title`               varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `user_id`             int(10) unsigned                        NOT NULL,
    `sticky`              tinyint(1)                              NOT NULL DEFAULT 0,
    `views`               int(10) unsigned                        NOT NULL DEFAULT 0,
    `answered`            tinyint(1)                              NOT NULL DEFAULT 0,
    `created_at`          timestamp                               NULL     DEFAULT NULL,
    `updated_at`          timestamp                               NULL     DEFAULT NULL,
    `slug`                varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `color`               varchar(20) COLLATE utf8mb4_unicode_ci           DEFAULT '#232629',
    `deleted_at`          timestamp                               NULL     DEFAULT NULL,
    `last_reply_at`       timestamp                               NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`id`),
    UNIQUE KEY `chatter_discussion_slug_unique` (`slug`),
    KEY `chatter_discussion_chatter_category_id_foreign` (`chatter_category_id`),
    KEY `chatter_discussion_user_id_foreign` (`user_id`),
    CONSTRAINT `chatter_discussion_chatter_category_id_foreign` FOREIGN KEY (`chatter_category_id`) REFERENCES `chatter_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `chatter_discussion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `gestionnaire_aspims` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatter_discussion`
--

LOCK TABLES `chatter_discussion` WRITE;
/*!40000 ALTER TABLE `chatter_discussion`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `chatter_discussion`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatter_post`
--

DROP TABLE IF EXISTS `chatter_post`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatter_post`
(
    `id`                    int(10) unsigned                NOT NULL AUTO_INCREMENT,
    `chatter_discussion_id` int(10) unsigned                NOT NULL,
    `user_id`               int(10) unsigned                NOT NULL,
    `body`                  text COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at`            timestamp                       NULL     DEFAULT NULL,
    `updated_at`            timestamp                       NULL     DEFAULT NULL,
    `markdown`              tinyint(1)                      NOT NULL DEFAULT 0,
    `locked`                tinyint(1)                      NOT NULL DEFAULT 0,
    `deleted_at`            timestamp                       NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `chatter_post_chatter_discussion_id_foreign` (`chatter_discussion_id`),
    KEY `chatter_post_user_id_foreign` (`user_id`),
    CONSTRAINT `chatter_post_chatter_discussion_id_foreign` FOREIGN KEY (`chatter_discussion_id`) REFERENCES `chatter_discussion` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT `chatter_post_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `gestionnaire_aspims` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatter_post`
--

LOCK TABLES `chatter_post` WRITE;
/*!40000 ALTER TABLE `chatter_post`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `chatter_post`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chatter_user_discussion`
--

DROP TABLE IF EXISTS `chatter_user_discussion`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chatter_user_discussion`
(
    `user_id`       int(10) unsigned NOT NULL,
    `discussion_id` int(10) unsigned NOT NULL,
    PRIMARY KEY (`user_id`, `discussion_id`),
    KEY `chatter_user_discussion_user_id_index` (`user_id`),
    KEY `chatter_user_discussion_discussion_id_index` (`discussion_id`),
    CONSTRAINT `chatter_user_discussion_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `chatter_discussion` (`id`) ON DELETE CASCADE,
    CONSTRAINT `chatter_user_discussion_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `gestionnaire_aspims` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chatter_user_discussion`
--

LOCK TABLES `chatter_user_discussion` WRITE;
/*!40000 ALTER TABLE `chatter_user_discussion`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `chatter_user_discussion`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cities`
(
    `id`             int(10) unsigned NOT NULL AUTO_INCREMENT,
    `country_id`     int(10) unsigned          DEFAULT NULL,
    `governorate_id` int(10) unsigned NOT NULL,
    `is_active`      tinyint(1)       NOT NULL DEFAULT 0,
    `order`          int(11)                   DEFAULT NULL,
    `deleted_at`     timestamp        NULL     DEFAULT NULL,
    `created_at`     timestamp        NULL     DEFAULT NULL,
    `updated_at`     timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `cities_country_id_foreign` (`country_id`),
    KEY `cities_governorate_id_foreign` (`governorate_id`),
    CONSTRAINT `cities_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
    CONSTRAINT `cities_governorate_id_foreign` FOREIGN KEY (`governorate_id`) REFERENCES `governorates` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cities`
--

LOCK TABLES `cities` WRITE;
/*!40000 ALTER TABLE `cities`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `cities`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city_translations`
--

DROP TABLE IF EXISTS `city_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city_translations`
(
    `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `locale`     varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `city_id`    int(10) unsigned                        NOT NULL,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `deleted_at` timestamp                               NULL DEFAULT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `city_translations_city_id_foreign` (`city_id`),
    CONSTRAINT `city_translations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city_translations`
--

LOCK TABLES `city_translations` WRITE;
/*!40000 ALTER TABLE `city_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `city_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_messages`
--

DROP TABLE IF EXISTS `contact_messages`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_messages`
(
    `id`              int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `menu_id`         int(10) unsigned                             DEFAULT NULL,
    `email`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `subject`         varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `message`         text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `name`            varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `is_company`      tinyint(1)                                   DEFAULT NULL,
    `fiscal_code`     varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `domain`          varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `first_name`      varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `last_name`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `phone`           varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `fax`             varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `address`         text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `postal_code`     varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `nationality_str` varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `governorate_str` varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `governorate_id`  int(10) unsigned                             DEFAULT NULL,
    `type`            varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `other_type`      varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `read_at`         datetime                                     DEFAULT NULL,
    `deleted_by`      int(11)                                      DEFAULT NULL,
    `created_by`      int(11)                                      DEFAULT NULL,
    `updated_by`      int(11)                                      DEFAULT NULL,
    `deleted_at`      timestamp                               NULL DEFAULT NULL,
    `created_at`      timestamp                               NULL DEFAULT NULL,
    `updated_at`      timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `contact_messages_menu_id_foreign` (`menu_id`),
    KEY `contact_messages_governorate_id_foreign` (`governorate_id`),
    CONSTRAINT `contact_messages_governorate_id_foreign` FOREIGN KEY (`governorate_id`) REFERENCES `governorates` (`id`),
    CONSTRAINT `contact_messages_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_messages`
--

LOCK TABLES `contact_messages` WRITE;
/*!40000 ALTER TABLE `contact_messages`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_messages`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_recipients`
--

DROP TABLE IF EXISTS `contact_recipients`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contact_recipients`
(
    `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned                             DEFAULT NULL,
    `email`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `deleted_at` timestamp                               NULL DEFAULT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `contact_recipient_unique` (`email`, `menu_id`, `deleted_at`),
    KEY `contact_recipients_menu_id_foreign` (`menu_id`),
    CONSTRAINT `contact_recipients_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_recipients`
--

LOCK TABLES `contact_recipients` WRITE;
/*!40000 ALTER TABLE `contact_recipients`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `contact_recipients`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `countries`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `order`      int(11)                   DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 243
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `countries`
--

LOCK TABLES `countries` WRITE;
/*!40000 ALTER TABLE `countries`
    DISABLE KEYS */;
INSERT INTO `countries`
VALUES (1, 4, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:33', NULL),
       (2, 8, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:33', NULL),
       (3, 10, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:33', NULL),
       (4, 12, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:33', NULL),
       (5, 16, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:33', NULL),
       (6, 20, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:34', NULL),
       (7, 24, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:34', NULL),
       (8, 28, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:34', NULL),
       (9, 31, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:34', NULL),
       (10, 32, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:34', NULL),
       (11, 36, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:34', NULL),
       (12, 40, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:35', NULL),
       (13, 44, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:35', NULL),
       (14, 48, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:36', NULL),
       (15, 50, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:36', NULL),
       (16, 51, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:36', NULL),
       (17, 52, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:37', NULL),
       (18, 56, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:38', NULL),
       (19, 60, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:39', NULL),
       (20, 64, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:39', NULL),
       (21, 68, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:40', NULL),
       (22, 70, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:40', NULL),
       (23, 72, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:40', NULL),
       (24, 74, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:40', NULL),
       (25, 76, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:40', NULL),
       (26, 84, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:40', NULL),
       (27, 90, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:40', NULL),
       (28, 92, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:41', NULL),
       (29, 96, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:41', NULL),
       (30, 100, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:41', NULL),
       (31, 104, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:41', NULL),
       (32, 108, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:41', NULL),
       (33, 112, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:41', NULL),
       (34, 116, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:42', NULL),
       (35, 120, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:42', NULL),
       (36, 124, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:42', NULL),
       (37, 126, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:42', NULL),
       (38, 128, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:42', NULL),
       (39, 132, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:43', NULL),
       (40, 136, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:43', NULL),
       (41, 140, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:43', NULL),
       (42, 144, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:43', NULL),
       (43, 148, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:43', NULL),
       (44, 152, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:43', NULL),
       (45, 156, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:43', NULL),
       (46, 158, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:44', NULL),
       (47, 162, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:44', NULL),
       (48, 166, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:46', NULL),
       (49, 170, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:47', NULL),
       (50, 174, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:47', NULL),
       (51, 178, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:47', NULL),
       (52, 180, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:47', NULL),
       (53, 184, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:47', NULL),
       (54, 188, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:47', NULL),
       (55, 191, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:47', NULL),
       (56, 192, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:48', NULL),
       (57, 196, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:48', NULL),
       (58, 200, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:48', NULL),
       (59, 203, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:48', NULL),
       (60, 204, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:48', NULL),
       (61, 208, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:48', NULL),
       (62, 212, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:48', NULL),
       (63, 214, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:49', NULL),
       (64, 216, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:49', NULL),
       (65, 218, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:49', NULL),
       (66, 222, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:49', NULL),
       (67, 226, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:49', NULL),
       (68, 228, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:49', NULL),
       (69, 230, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:50', NULL),
       (70, 233, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:50', NULL),
       (71, 234, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:50', NULL),
       (72, 238, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:50', NULL),
       (73, 242, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:50', NULL),
       (74, 246, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:50', NULL),
       (75, 250, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:50', NULL),
       (76, 254, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:51', NULL),
       (77, 258, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:51', NULL),
       (78, 262, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:51', NULL),
       (79, 266, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:51', NULL),
       (80, 268, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:51', NULL),
       (81, 270, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:51', NULL),
       (82, 276, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:51', NULL),
       (83, 278, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:51', NULL),
       (84, 280, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:52', NULL),
       (85, 288, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:52', NULL),
       (86, 292, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:52', NULL),
       (87, 296, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:52', NULL),
       (88, 300, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:52', NULL),
       (89, 304, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:52', NULL),
       (90, 308, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:53', NULL),
       (91, 312, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:53', NULL),
       (92, 316, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:53', NULL),
       (93, 320, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:53', NULL),
       (94, 324, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:53', NULL),
       (95, 328, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:53', NULL),
       (96, 332, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:54', NULL),
       (97, 334, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:54', NULL),
       (98, 336, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:54', NULL),
       (99, 340, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:54', NULL),
       (100, 344, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:54', NULL),
       (101, 348, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:55', NULL),
       (102, 352, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:55', NULL),
       (103, 356, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:55', NULL),
       (104, 360, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:55', NULL),
       (105, 364, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:55', NULL),
       (106, 368, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:55', NULL),
       (107, 372, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:56', NULL),
       (108, 380, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:56', NULL),
       (109, 384, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:56', NULL),
       (110, 388, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:56', NULL),
       (111, 392, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:56', NULL),
       (112, 396, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:56', NULL),
       (113, 398, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:57', NULL),
       (114, 400, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:57', NULL),
       (115, 404, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:57', NULL),
       (116, 408, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:57', NULL),
       (117, 410, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:57', NULL),
       (118, 414, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:57', NULL),
       (119, 417, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:57', NULL),
       (120, 418, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:58', NULL),
       (121, 422, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:58', NULL),
       (122, 426, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:58', NULL),
       (123, 428, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:58', NULL),
       (124, 430, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:58', NULL),
       (125, 434, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:59', NULL),
       (126, 438, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:59', NULL),
       (127, 440, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:59', NULL),
       (128, 442, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:59', NULL),
       (129, 446, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:59', NULL),
       (130, 450, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:59', NULL),
       (131, 454, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:11:59', NULL),
       (132, 458, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:00', NULL),
       (133, 462, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:00', NULL),
       (134, 466, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:00', NULL),
       (135, 470, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:00', NULL),
       (136, 474, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:00', NULL),
       (137, 478, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:00', NULL),
       (138, 480, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:00', NULL),
       (139, 484, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:01', NULL),
       (140, 488, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:01', NULL),
       (141, 492, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:01', NULL),
       (142, 496, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:01', NULL),
       (143, 498, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:01', NULL),
       (144, 500, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:01', NULL),
       (145, 504, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:02', NULL),
       (146, 508, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:02', NULL),
       (147, 512, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:02', NULL),
       (148, 516, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:02', NULL),
       (149, 520, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:02', NULL),
       (150, 524, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:03', NULL),
       (151, 528, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:03', NULL),
       (152, 532, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:03', NULL),
       (153, 536, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:03', NULL),
       (154, 540, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:03', NULL),
       (155, 548, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:03', NULL),
       (156, 554, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:04', NULL),
       (157, 558, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:04', NULL),
       (158, 562, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:04', NULL),
       (159, 566, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:04', NULL),
       (160, 570, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:04', NULL),
       (161, 574, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:05', NULL),
       (162, 578, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:05', NULL),
       (163, 582, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:05', NULL),
       (164, 586, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:05', NULL),
       (165, 588, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:05', NULL),
       (166, 590, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:06', NULL),
       (167, 598, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:06', NULL),
       (168, 600, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:06', NULL),
       (169, 604, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:06', NULL),
       (170, 608, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:06', NULL),
       (171, 612, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:07', NULL),
       (172, 616, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:07', NULL),
       (173, 620, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:07', NULL),
       (174, 624, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:07', NULL),
       (175, 626, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:07', NULL),
       (176, 630, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:07', NULL),
       (177, 634, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:08', NULL),
       (178, 638, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:08', NULL),
       (179, 642, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:08', NULL),
       (180, 643, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:08', NULL),
       (181, 646, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:08', NULL),
       (182, 654, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:08', NULL),
       (183, 658, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:09', NULL),
       (184, 662, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:09', NULL),
       (185, 666, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:09', NULL),
       (186, 670, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:09', NULL),
       (187, 674, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:09', NULL),
       (188, 678, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:09', NULL),
       (189, 682, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:09', NULL),
       (190, 686, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:10', NULL),
       (191, 690, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:10', NULL),
       (192, 694, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:10', NULL),
       (193, 702, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:10', NULL),
       (194, 703, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:10', NULL),
       (195, 704, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:10', NULL),
       (196, 705, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:11', NULL),
       (197, 706, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:11', NULL),
       (198, 710, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:11', NULL),
       (199, 716, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:11', NULL),
       (200, 720, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:12', NULL),
       (201, 724, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:12', NULL),
       (202, 732, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:13', NULL),
       (203, 736, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:13', NULL),
       (204, 740, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:13', NULL),
       (205, 744, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:13', NULL),
       (206, 748, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:13', NULL),
       (207, 752, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:14', NULL),
       (208, 756, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:14', NULL),
       (209, 760, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:14', NULL),
       (210, 762, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:14', NULL),
       (211, 764, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:14', NULL),
       (212, 768, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:14', NULL),
       (213, 772, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:14', NULL),
       (214, 776, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:15', NULL),
       (215, 780, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:15', NULL),
       (216, 784, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:15', NULL),
       (217, 788, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:15', NULL),
       (218, 792, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:15', NULL),
       (219, 795, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:15', NULL),
       (220, 796, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:16', NULL),
       (221, 798, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:16', NULL),
       (222, 800, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:16', NULL),
       (223, 804, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:16', NULL),
       (224, 810, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:16', NULL),
       (225, 818, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:16', NULL),
       (226, 826, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:17', NULL),
       (227, 834, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:17', NULL),
       (228, 840, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:17', NULL),
       (229, 849, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:20', NULL),
       (230, 850, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:20', NULL),
       (231, 854, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:21', NULL),
       (232, 858, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:21', NULL),
       (233, 860, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:21', NULL),
       (234, 862, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:22', NULL),
       (235, 872, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:22', NULL),
       (236, 876, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:22', NULL),
       (237, 882, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:22', NULL),
       (238, 886, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:22', NULL),
       (239, 887, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:23', NULL),
       (240, 890, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:23', NULL),
       (241, 894, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:23', NULL),
       (242, 999, 1, NULL, NULL, NULL, NULL, '2018-06-12 06:12:23', NULL);
/*!40000 ALTER TABLE `countries`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country_translations`
--

DROP TABLE IF EXISTS `country_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country_translations`
(
    `id`          int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `name`        varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `nationality` varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `locale`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `country_id`  int(10) unsigned                        NOT NULL,
    `deleted_at`  timestamp                               NULL DEFAULT NULL,
    `created_at`  timestamp                               NULL DEFAULT NULL,
    `updated_at`  timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `ct_deletedAt_unique` (`country_id`, `locale`, `deleted_at`),
    UNIQUE KEY `country_translations_country_id_locale_deleted_at_unique` (`country_id`, `locale`, `deleted_at`),
    CONSTRAINT `country_translations_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 243
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country_translations`
--

LOCK TABLES `country_translations` WRITE;
/*!40000 ALTER TABLE `country_translations`
    DISABLE KEYS */;
INSERT INTO `country_translations`
VALUES (1, 'AFGHANISTAN', 'AFGHANE', 'fr', 1, NULL, NULL, NULL),
       (2, 'ALBANIE', 'ALBANAISE', 'fr', 2, NULL, NULL, NULL),
       (3, 'ANTARCTIQUE', 'ANTARCTIQUE', 'fr', 3, NULL, NULL, NULL),
       (4, 'ALGERIE', 'ALGERIENNE', 'fr', 4, NULL, NULL, NULL),
       (5, 'SAMOA AMERICAINES', 'SAMOANE', 'fr', 5, NULL, NULL, NULL),
       (6, 'ANDORRE', 'ANDORRANE', 'fr', 6, NULL, NULL, NULL),
       (7, 'ANGOLA', 'ANGOLAISE', 'fr', 7, NULL, NULL, NULL),
       (8, 'ANTIGUA', 'ANTIGUAISE', 'fr', 8, NULL, NULL, NULL),
       (9, 'AZERBAIJAN', 'AZERBAIJANAISE', 'fr', 9, NULL, NULL, NULL),
       (10, 'ARGENTINE', 'ARGENTINE', 'fr', 10, NULL, NULL, NULL),
       (11, 'AUSTRALIE', 'AUSTRALIENNE', 'fr', 11, NULL, NULL, NULL),
       (12, 'AUTRICHE', 'AUTRICHIENNE', 'fr', 12, NULL, NULL, NULL),
       (13, 'ILES BAHAMAS', 'BAHAMAS', 'fr', 13, NULL, NULL, NULL),
       (14, 'BAHREIN', 'BAHRANAISE', 'fr', 14, NULL, NULL, NULL),
       (15, 'BANGLADESH', 'BENGALE', 'fr', 15, NULL, NULL, NULL),
       (16, 'ARMENIE', 'ARMENIENNE', 'fr', 16, NULL, NULL, NULL),
       (17, 'ILES BARBADOS', 'ILES BARBADOS', 'fr', 17, NULL, NULL, NULL),
       (18, 'BELGIQUE', 'BELGE', 'fr', 18, NULL, NULL, NULL),
       (19, 'BERMUDES', 'BERMUDES', 'fr', 19, NULL, NULL, NULL),
       (20, 'BHOUTAN', 'BHOUTAN', 'fr', 20, NULL, NULL, NULL),
       (21, 'BOLIVIE', 'BOLIVIENNE', 'fr', 21, NULL, NULL, NULL),
       (22, 'BOSNIE HERZEGOVINE', 'BOSNIAQUE', 'fr', 22, NULL, NULL, NULL),
       (23, 'BOTSWANA', 'BOTSWANAISE', 'fr', 23, NULL, NULL, NULL),
       (24, 'ILE DE BOUVET', 'ILE DE BOUVET', 'fr', 24, NULL, NULL, NULL),
       (25, 'BRESIL', 'BRESILIENNE', 'fr', 25, NULL, NULL, NULL),
       (26, 'BELIZE', 'BELIZOISE', 'fr', 26, NULL, NULL, NULL),
       (27, 'ILES DE SALOMON', 'ILES DE SALOMON', 'fr', 27, NULL, NULL, NULL),
       (28, 'ILES DE VIERGES BRITANNIQUES', 'ILES DE VIERGES BRITANNIQUES', 'fr', 28, NULL, NULL, NULL),
       (29, 'BRUNEI', 'BRUNEI', 'fr', 29, NULL, NULL, NULL),
       (30, 'BULGARIE', 'BULGARE', 'fr', 30, NULL, NULL, NULL),
       (31, 'BIRMANIE', 'BIRMANIENNE', 'fr', 31, NULL, NULL, NULL),
       (32, 'BURUNDI', 'BURUNDI', 'fr', 32, NULL, NULL, NULL),
       (33, 'BIOLORUSSIE', 'RUSSE', 'fr', 33, NULL, NULL, NULL),
       (34, 'COMBODGE', 'COMBODGIENNE', 'fr', 34, NULL, NULL, NULL),
       (35, 'CAMEROUN', 'CAMEROUNAISE', 'fr', 35, NULL, NULL, NULL),
       (36, 'CANADA', 'CANADIENNE', 'fr', 36, NULL, NULL, NULL),
       (37, 'ILES CANARIES', 'ILES CANARIES', 'fr', 37, NULL, NULL, NULL),
       (38, 'ILES DE CANTON ET ENDERBURY', 'ILES DE CANTON ET ENDERBURY', 'fr', 38, NULL, NULL, NULL),
       (39, 'ILES DU CAP-VERT', 'ILES DU CAP-VERT', 'fr', 39, NULL, NULL, NULL),
       (40, 'ILES DE CAIMANES (GB)', 'CAIMANE', 'fr', 40, NULL, NULL, NULL),
       (41, 'REPUBLIQUE CENTRE AFRICAINE', 'CENTRAFRICAINE', 'fr', 41, NULL, NULL, NULL),
       (42, 'CEYLAN', 'CEYLAN', 'fr', 42, NULL, NULL, NULL),
       (43, 'TCHAD', 'TCHADIENNE', 'fr', 43, NULL, NULL, NULL),
       (44, 'CHILI', 'CHILIENNE', 'fr', 44, NULL, NULL, NULL),
       (45, 'CHINE CONTINENTALE', 'CHINOISE', 'fr', 45, NULL, NULL, NULL),
       (46, 'TAIWAN', 'TAIWANAISE', 'fr', 46, NULL, NULL, NULL),
       (47, 'ILE DE CHRISTMAS', 'ILE DE CHRISTMAS', 'fr', 47, NULL, NULL, NULL),
       (48, 'ILES DES COCOS', 'ILES DES COCOS', 'fr', 48, NULL, NULL, NULL),
       (49, 'COLOMBIE', 'COLOMBIENNE', 'fr', 49, NULL, NULL, NULL),
       (50, 'ILES COMORES', 'COMORIENNE', 'fr', 50, NULL, NULL, NULL),
       (51, 'CONGO', 'CONGOLAISE', 'fr', 51, NULL, NULL, NULL),
       (52, 'ZAIRE', 'ZAIROISE', 'fr', 52, NULL, NULL, NULL),
       (53, 'ILE DE COOK', 'ILE DE COOK', 'fr', 53, NULL, NULL, NULL),
       (54, 'COSTA RICA', 'COSTARICAINE', 'fr', 54, NULL, NULL, NULL),
       (55, 'CROATIE', 'CROATE', 'fr', 55, NULL, NULL, NULL),
       (56, 'CUBA', 'CUBAINE', 'fr', 56, NULL, NULL, NULL),
       (57, 'CHYPRE', 'CHYPRIOTE', 'fr', 57, NULL, NULL, NULL),
       (58, 'TCHECOSLOVAQUIE', 'TCHEQUE', 'fr', 58, NULL, NULL, NULL),
       (59, 'REPUBLIQUE TCHEQUE', 'TCHEQUE', 'fr', 59, NULL, NULL, NULL),
       (60, 'BENIN', 'BENINOISE', 'fr', 60, NULL, NULL, NULL),
       (61, 'DANEMARK', 'DANOISE', 'fr', 61, NULL, NULL, NULL),
       (62, 'DOMINICA', 'DOMONOCAINE', 'fr', 62, NULL, NULL, NULL),
       (63, 'REPUBLIQUE DOMINICAINE', 'DOMINICAINE', 'fr', 63, NULL, NULL, NULL),
       (64, 'TERRE DE LA REINE MAUD', 'TERRE DE LA REINE MAUD', 'fr', 64, NULL, NULL, NULL),
       (65, 'EQUATEUR', 'EQUATORIENNE', 'fr', 65, NULL, NULL, NULL),
       (66, 'SALVADOR', 'SALVADORIENNE', 'fr', 66, NULL, NULL, NULL),
       (67, 'GUINEE EQUATORIALE', 'GUINEE EQUATORIALE', 'fr', 67, NULL, NULL, NULL),
       (68, 'ERYTHREE', 'ERYTHREENNE', 'fr', 68, NULL, NULL, NULL),
       (69, 'ETHIOPIE', 'ETHIOPIENNE', 'fr', 69, NULL, NULL, NULL),
       (70, 'ESTONIE', 'ESTONIENNE', 'fr', 70, NULL, NULL, NULL),
       (71, 'ILES DE FEROE', 'ILES DE FEROE', 'fr', 71, NULL, NULL, NULL),
       (72, 'ILES DE FALKLAND', 'ILES DE FALKLAND', 'fr', 72, NULL, NULL, NULL),
       (73, 'FIDJI', 'FIDJI', 'fr', 73, NULL, NULL, NULL),
       (74, 'FINLANDE', 'FINLANDAISE', 'fr', 74, NULL, NULL, NULL),
       (75, 'FRANCE', 'FRANCAISE', 'fr', 75, NULL, NULL, NULL),
       (76, 'GUYANE FRANCAISE', 'GUYANE FRANCAISE', 'fr', 76, NULL, NULL, NULL),
       (77, 'POLYNESIE FRANCAISE', 'POLYNESIENNE', 'fr', 77, NULL, NULL, NULL),
       (78, 'DJIBOUTI', 'DJIBOUTIENNE', 'fr', 78, NULL, NULL, NULL),
       (79, 'REPUBLIQUE GABONAISE', 'GABONAISE', 'fr', 79, NULL, NULL, NULL),
       (80, 'GEORGIE', 'GEORGIENNE', 'fr', 80, NULL, NULL, NULL),
       (81, 'REPUBLIQUE DE GAMBIE', 'GAMBIENNE', 'fr', 81, NULL, NULL, NULL),
       (82, 'ALLEMAGNE', 'ALLEMANDE', 'fr', 82, NULL, NULL, NULL),
       (83, 'REP. DEMOCRATIQUE D\'ALLEMAGNE', 'ALLEMANDE', 'fr', 83, NULL, NULL, NULL),
       (84, 'REP. FEDERALE D\'ALLEMAGNE', 'ALLEMANDE DE L\'OUEST', 'fr', 84, NULL, NULL, NULL),
       (85, 'GHANA', 'GHANIENNE', 'fr', 85, NULL, NULL, NULL),
       (86, 'GIBRALTAR', 'GIBRALTAR', 'fr', 86, NULL, NULL, NULL),
       (87, 'KIRIBATI', 'KIRIBATI', 'fr', 87, NULL, NULL, NULL),
       (88, 'GRECE', 'GREQUE', 'fr', 88, NULL, NULL, NULL),
       (89, 'GROENLAND', 'GROENLANDAISE', 'fr', 89, NULL, NULL, NULL),
       (90, 'GRENADE', 'GRENADINE', 'fr', 90, NULL, NULL, NULL),
       (91, 'GUADELOUPE', 'GUADELOUPEENNE', 'fr', 91, NULL, NULL, NULL),
       (92, 'GUAM', 'GUAM', 'fr', 92, NULL, NULL, NULL),
       (93, 'GUATEMALA', 'GUATEMALTEQUE', 'fr', 93, NULL, NULL, NULL),
       (94, 'GUINEE', 'GUINIEENNE', 'fr', 94, NULL, NULL, NULL),
       (95, 'GUYANE', 'GUYANAISE', 'fr', 95, NULL, NULL, NULL),
       (96, 'HAITI', 'HAITIENNE', 'fr', 96, NULL, NULL, NULL),
       (97, 'ILES HEARD ET MC DONALD', 'ILES HEARD ET MC DONALD', 'fr', 97, NULL, NULL, NULL),
       (98, 'VATICAN', 'VATICANE', 'fr', 98, NULL, NULL, NULL),
       (99, 'HONDURAS', 'HONDURAS', 'fr', 99, NULL, NULL, NULL),
       (100, 'HONG KONG', 'HONG KONG', 'fr', 100, NULL, NULL, NULL),
       (101, 'HONGRIE', 'HONGROISE', 'fr', 101, NULL, NULL, NULL),
       (102, 'ISLANDE', 'ISLANDAISE', 'fr', 102, NULL, NULL, NULL),
       (103, 'INDE', 'INDIENNE', 'fr', 103, NULL, NULL, NULL),
       (104, 'INDONESIE', 'INDONESIENNE', 'fr', 104, NULL, NULL, NULL),
       (105, 'IRAN', 'IRANIENNE', 'fr', 105, NULL, NULL, NULL),
       (106, 'IRAK', 'IRAKIENNE', 'fr', 106, NULL, NULL, NULL),
       (107, 'IRLANDE', 'IRLANDAISE', 'fr', 107, NULL, NULL, NULL),
       (108, 'ITALIE', 'ITALIENNE', 'fr', 108, NULL, NULL, NULL),
       (109, 'COTE D IVOIRE', 'IVOIRIENNE', 'fr', 109, NULL, NULL, NULL),
       (110, 'JAMAIQUE', 'JAMAICAINE', 'fr', 110, NULL, NULL, NULL),
       (111, 'JAPON', 'JAPONAISE', 'fr', 111, NULL, NULL, NULL),
       (112, 'ILE DE JOHNSTON', 'ILE DE JOHNSTON', 'fr', 112, NULL, NULL, NULL),
       (113, 'KAZAKHISTAN', 'KAZAKHISTANAIE', 'fr', 113, NULL, NULL, NULL),
       (114, 'JORDANIE', 'JORDANIENNE', 'fr', 114, NULL, NULL, NULL),
       (115, 'KENYA', 'KENIENNE', 'fr', 115, NULL, NULL, NULL),
       (116, 'COREE DU NORD', 'NORD COREENNE', 'fr', 116, NULL, NULL, NULL),
       (117, 'COREE DU SUD', 'SUD COREENNE', 'fr', 117, NULL, NULL, NULL),
       (118, 'KOWEIT', 'KOWEITIENNE', 'fr', 118, NULL, NULL, NULL),
       (119, 'KIRGHIZISTAN', 'KIRGHIZISTANAIE', 'fr', 119, NULL, NULL, NULL),
       (120, 'LAOS', 'LAOS', 'fr', 120, NULL, NULL, NULL),
       (121, 'LIBAN', 'LIBANAISE', 'fr', 121, NULL, NULL, NULL),
       (122, 'LESOTHO', 'LESOTHO', 'fr', 122, NULL, NULL, NULL),
       (123, 'LETTONIE', 'LETTONIENNE', 'fr', 123, NULL, NULL, NULL),
       (124, 'LIBERIA', 'LIBERIENNE', 'fr', 124, NULL, NULL, NULL),
       (125, 'LYBIE', 'LIBYENNE', 'fr', 125, NULL, NULL, NULL),
       (126, 'LIECHTENSTEIN', 'LIECHTENSTEIN', 'fr', 126, NULL, NULL, NULL),
       (127, 'LITHUANIE', 'LITHUANIENNE', 'fr', 127, NULL, NULL, NULL),
       (128, 'LUXEMBOURG', 'LUXEMBOURGEOISE', 'fr', 128, NULL, NULL, NULL),
       (129, 'MACAO', 'MACAO', 'fr', 129, NULL, NULL, NULL),
       (130, 'REPUBLIQUE MALGACHE', 'MALGACHE', 'fr', 130, NULL, NULL, NULL),
       (131, 'MALAWIE', 'MALAWIE', 'fr', 131, NULL, NULL, NULL),
       (132, 'MALAISIE', 'MALAISIENNE', 'fr', 132, NULL, NULL, NULL),
       (133, 'MALDIVES', 'MALDIVES', 'fr', 133, NULL, NULL, NULL),
       (134, 'MALI', 'MALIENNE', 'fr', 134, NULL, NULL, NULL),
       (135, 'MALTE', 'MALTAISE', 'fr', 135, NULL, NULL, NULL),
       (136, 'MARTINIQUE', 'MARTINIQUAISE', 'fr', 136, NULL, NULL, NULL),
       (137, 'MAURITANIE', 'MAURITANIENNE', 'fr', 137, NULL, NULL, NULL),
       (138, 'ILE MAURICE', 'MAURICIENNE', 'fr', 138, NULL, NULL, NULL),
       (139, 'MEXIQUE', 'MEXICAINE', 'fr', 139, NULL, NULL, NULL),
       (140, 'ILES DE MIDWAY', 'ILES DE MIDWAY', 'fr', 140, NULL, NULL, NULL),
       (141, 'MONACO', 'MONEGASQUE', 'fr', 141, NULL, NULL, NULL),
       (142, 'MONGOLIE', 'MONGOLIENNE', 'fr', 142, NULL, NULL, NULL),
       (143, 'MOLDAVIE', 'MOLDAVE', 'fr', 143, NULL, NULL, NULL),
       (144, 'MONTSERRAT', 'MONTSERRAT', 'fr', 144, NULL, NULL, NULL),
       (145, 'MAROC', 'MAROCAINE', 'fr', 145, NULL, NULL, NULL),
       (146, 'MOZAMBIQUE', 'MOZAMBIQUAINE', 'fr', 146, NULL, NULL, NULL),
       (147, 'OMAN', 'OMANAISE', 'fr', 147, NULL, NULL, NULL),
       (148, 'NAMIBIE', 'NAMIBIENNE', 'fr', 148, NULL, NULL, NULL),
       (149, 'NAURU', 'NAURU', 'fr', 149, NULL, NULL, NULL),
       (150, 'NEPAL', 'NEPALAISE', 'fr', 150, NULL, NULL, NULL),
       (151, 'PAYS BAS', 'NEERLANDAISE', 'fr', 151, NULL, NULL, NULL),
       (152, 'ANTILLES NEERLANDAISES', 'ANTILLAISE', 'fr', 152, NULL, NULL, NULL),
       (153, 'ZONE NEUTRE', 'ZONE NEUTRE', 'fr', 153, NULL, NULL, NULL),
       (154, 'NOUVELLE-CALEDONIE', 'CALEDONIENNE', 'fr', 154, NULL, NULL, NULL),
       (155, 'VANUATU', 'VANUATU', 'fr', 155, NULL, NULL, NULL),
       (156, 'NOUVELLE ZELANDE', 'NEO ZELANDAISE', 'fr', 156, NULL, NULL, NULL),
       (157, 'NICARAGUA', 'NICARAGUAYNNE', 'fr', 157, NULL, NULL, NULL),
       (158, 'NIGER', 'NIGERIENNE', 'fr', 158, NULL, NULL, NULL),
       (159, 'NIGERIA', 'NIGERIANE', 'fr', 159, NULL, NULL, NULL),
       (160, 'NIOUE', 'NIOUE', 'fr', 160, NULL, NULL, NULL),
       (161, 'ILE DE NORFOLK', 'ILE DE NORFOLK', 'fr', 161, NULL, NULL, NULL),
       (162, 'NORVEGE', 'NORVEGIENNE', 'fr', 162, NULL, NULL, NULL),
       (163, 'ILES DU PACIFIQUE', 'ILES DU PACIFIQUE', 'fr', 163, NULL, NULL, NULL),
       (164, 'PAKISTAN', 'PAKISTANAISE', 'fr', 164, NULL, NULL, NULL),
       (165, 'PALESTINE', 'PALESTINIENNE', 'fr', 165, NULL, NULL, NULL),
       (166, 'PANAMA', 'PANAMIENNE', 'fr', 166, NULL, NULL, NULL),
       (167, 'PAPOUASIE NOUVELLE-GUINEE', 'PAPOUASIE NOUVELLE-GUINEE', 'fr', 167, NULL, NULL, NULL),
       (168, 'PARAGUAY', 'PARAGUYAENNE', 'fr', 168, NULL, NULL, NULL),
       (169, 'PEROU', 'PEROUVIENNE', 'fr', 169, NULL, NULL, NULL),
       (170, 'PHILIPPINE', 'PHILIPPINE', 'fr', 170, NULL, NULL, NULL),
       (171, 'ILE DE PITCAIRN', 'ILE DE PITCAIRN', 'fr', 171, NULL, NULL, NULL),
       (172, 'POLOGNE', 'POLONAISE', 'fr', 172, NULL, NULL, NULL),
       (173, 'PORTUGAL', 'PORTUGAISE', 'fr', 173, NULL, NULL, NULL),
       (174, 'GUINEE-BISSAU', 'GUINEE-BISSAU', 'fr', 174, NULL, NULL, NULL),
       (175, 'TIMOR ORIENTAL', 'TIMOR ORIENTAL', 'fr', 175, NULL, NULL, NULL),
       (176, 'PORTO RICO', 'PORTORICAINE', 'fr', 176, NULL, NULL, NULL),
       (177, 'QATAR', 'QATARIENNE', 'fr', 177, NULL, NULL, NULL),
       (178, 'REUNION', 'REUNIONNAISE', 'fr', 178, NULL, NULL, NULL),
       (179, 'ROUMANIE', 'ROUMANE', 'fr', 179, NULL, NULL, NULL),
       (180, 'RUSSIE', 'RUSSE', 'fr', 180, NULL, NULL, NULL),
       (181, 'RWANDA', 'RWANDAISE', 'fr', 181, NULL, NULL, NULL),
       (182, 'SAINTE-HELENE', 'SAINTE HELENIENNE', 'fr', 182, NULL, NULL, NULL),
       (183, 'ST-CHRISTOPHE NIEVES ANGUILLA', 'ST-CHRISTOPHE NIEVES ANGUILLA', 'fr', 183, NULL, NULL, NULL),
       (184, 'SAINT-LUCIE', 'SAINT LUCIENNE', 'fr', 184, NULL, NULL, NULL),
       (185, 'SAINT-PIERRE-ET-MIQUELON', 'SAINT-PIERRE-ET-MIQUELON', 'fr', 185, NULL, NULL, NULL),
       (186, 'SAINT-VINCENT-ET-GRENADINES', 'SAINT-VINCENT-ET-GRENADINES', 'fr', 186, NULL, NULL, NULL),
       (187, 'SAINT-MARIN', 'SAINT-MARIN', 'fr', 187, NULL, NULL, NULL),
       (188, 'SAO TOME-ET-PRINCIPE', 'SAO TOME-ET-PRINCIPE', 'fr', 188, NULL, NULL, NULL),
       (189, 'ARABIE SEOUDITE', 'SAOUDIENNE', 'fr', 189, NULL, NULL, NULL),
       (190, 'SENEGAL', 'SENEGALAISE', 'fr', 190, NULL, NULL, NULL),
       (191, 'SEYCHELLES', 'SEYCHELLES', 'fr', 191, NULL, NULL, NULL),
       (192, 'SIERRA LEONE', 'SIERRA LEONE', 'fr', 192, NULL, NULL, NULL),
       (193, 'SINGAPOUR', 'SINGAPOUR', 'fr', 193, NULL, NULL, NULL),
       (194, 'SLOVAQUIE', 'SLOVAQUE', 'fr', 194, NULL, NULL, NULL),
       (195, 'VIETNAM', 'VIETNAMIENNE', 'fr', 195, NULL, NULL, NULL),
       (196, 'SLOVENIE', 'SLOVENE', 'fr', 196, NULL, NULL, NULL),
       (197, 'SOMALIE', 'SOMALIENNE', 'fr', 197, NULL, NULL, NULL),
       (198, 'AFRIQUE DU SUD', 'SUD AFRICAINE', 'fr', 198, NULL, NULL, NULL),
       (199, 'ZIMBABWE', 'ZIMBABWEENNE', 'fr', 199, NULL, NULL, NULL),
       (200, 'YEMEN DU NORD', 'YEMENITE DU NORD', 'fr', 200, NULL, NULL, NULL),
       (201, 'ESPAGNE', 'ESPAGNOLE', 'fr', 201, NULL, NULL, NULL),
       (202, 'SAHARA OCCIDENTAL', 'SAHARA OCCIDENTAL', 'fr', 202, NULL, NULL, NULL),
       (203, 'SOUDAN', 'SOUDANAISE', 'fr', 203, NULL, NULL, NULL),
       (204, 'SURINAME', 'SURINAME', 'fr', 204, NULL, NULL, NULL),
       (205, 'SVALBARD ET ILE JAN MAYEN', 'SVALBARD ET ILE JAN MAYEN', 'fr', 205, NULL, NULL, NULL),
       (206, 'SWAZILAND', 'SWAZILANDAISE', 'fr', 206, NULL, NULL, NULL),
       (207, 'SUEDE', 'SUEDOISE', 'fr', 207, NULL, NULL, NULL),
       (208, 'SUISSE', 'SUISSE', 'fr', 208, NULL, NULL, NULL),
       (209, 'SYRIE', 'SYRIENNE', 'fr', 209, NULL, NULL, NULL),
       (210, 'TADJIKISTAN', 'TADJIKISTANAIE', 'fr', 210, NULL, NULL, NULL),
       (211, 'THAILAND', 'THAILANDAISE', 'fr', 211, NULL, NULL, NULL),
       (212, 'TOGO', 'TOGOLAISE', 'fr', 212, NULL, NULL, NULL),
       (213, 'TOKELAOU', 'TOKELAOU', 'fr', 213, NULL, NULL, NULL),
       (214, 'TONGA', 'TONGANAISE', 'fr', 214, NULL, NULL, NULL),
       (215, 'TRINITE-ET-TOBAGO', 'TRINITE-ET-TOBAGO', 'fr', 215, NULL, NULL, NULL),
       (216, 'ETATS DES EMIRATS ARABES UNIS', 'ETATS DES EMIRATS ARABES UNIS', 'fr', 216, NULL, NULL, NULL),
       (217, 'TUNISIE', 'TUNISIENNE', 'fr', 217, NULL, NULL, NULL),
       (218, 'TURQUIE', 'TURQUE', 'fr', 218, NULL, NULL, NULL),
       (219, 'TURKMENISTAN', 'TURKMENISTANAIE', 'fr', 219, NULL, NULL, NULL),
       (220, 'ILES DE TURKS ET CAIQUES', 'ILES DE TURKS ET CAIQUES', 'fr', 220, NULL, NULL, NULL),
       (221, 'TUVALU', 'TUVALU', 'fr', 221, NULL, NULL, NULL),
       (222, 'OUGANDA', 'OUGANDAISE', 'fr', 222, NULL, NULL, NULL),
       (223, 'UKRAINE', 'RUSSE', 'fr', 223, NULL, NULL, NULL),
       (224, 'U.R.S.S.', 'RUSSE', 'fr', 224, NULL, NULL, NULL),
       (225, 'EGYPTE', 'EGYPTIENNE', 'fr', 225, NULL, NULL, NULL),
       (226, 'GRANDE BRETAGNE', 'BRITANNIQUE', 'fr', 226, NULL, NULL, NULL),
       (227, 'TANZANIE', 'TANZANIENNE', 'fr', 227, NULL, NULL, NULL),
       (228, 'ETATS UNIS D\'AMERIQUE', 'AMERICAINE', 'fr', 228, NULL, NULL, NULL),
       (229, 'DIVERSE ILE DU PACIFIQUE (USA)', 'DIVERSE ILE DU PACIFIQUE (USA)', 'fr', 229, NULL, NULL, NULL),
       (230, 'ILES DE VIERGES AMERICAINES', 'ILES DE VIERGES AMERICAINES', 'fr', 230, NULL, NULL, NULL),
       (231, 'HAUTE VOLTA', 'VOLTAIQUE', 'fr', 231, NULL, NULL, NULL),
       (232, 'URUGUAY', 'URUGUAYENNE', 'fr', 232, NULL, NULL, NULL),
       (233, 'OUZBEKISTAN', 'OUZBEKISTANAIE', 'fr', 233, NULL, NULL, NULL),
       (234, 'VENEZUELA', 'VENEZUELIENNE', 'fr', 234, NULL, NULL, NULL),
       (235, 'ILE DE WAKE', 'ILE DE WAKE', 'fr', 235, NULL, NULL, NULL),
       (236, 'ILES DE WALIS ET FUTUNA', 'ILES DE WALIS ET FUTUNA', 'fr', 236, NULL, NULL, NULL),
       (237, 'SAMOA', 'SAMOANE', 'fr', 237, NULL, NULL, NULL),
       (238, 'YEMEN DU SUD', 'YEMENITE', 'fr', 238, NULL, NULL, NULL),
       (239, 'YEMEN', 'YEMENITE', 'fr', 239, NULL, NULL, NULL),
       (240, 'YOUGOSLAVIE', 'YOUGOSLAVE', 'fr', 240, NULL, NULL, NULL),
       (241, 'ZAMBIE', 'ZAMBIENNE', 'fr', 241, NULL, NULL, NULL),
       (242, 'REPRISE DE DONNEES', '', 'fr', 242, NULL, NULL, NULL);
/*!40000 ALTER TABLE `country_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_categories`
--

DROP TABLE IF EXISTS `event_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned          DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `order`      int(11)                   DEFAULT NULL,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `event_categories_menu_id_foreign` (`menu_id`),
    CONSTRAINT `event_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_categories`
--

LOCK TABLES `event_categories` WRITE;
/*!40000 ALTER TABLE `event_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `event_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_category_translations`
--

DROP TABLE IF EXISTS `event_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_category_translations`
(
    `id`                int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `event_category_id` int(10) unsigned                        NOT NULL,
    `locale`            varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`              varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`              varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`       text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`        timestamp                               NULL DEFAULT NULL,
    `created_at`        timestamp                               NULL DEFAULT NULL,
    `updated_at`        timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `event_category_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `event_category_translations_event_category_id_foreign` (`event_category_id`),
    CONSTRAINT `event_category_translations_event_category_id_foreign` FOREIGN KEY (`event_category_id`) REFERENCES `event_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_category_translations`
--

LOCK TABLES `event_category_translations` WRITE;
/*!40000 ALTER TABLE `event_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `event_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_translations`
--

DROP TABLE IF EXISTS `event_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `event_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `event_id`         int(10) unsigned                        NOT NULL,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`      text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `image`            varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `content`          longtext COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `meta_title`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `event_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `event_translations_event_id_foreign` (`event_id`),
    CONSTRAINT `event_translations_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_translations`
--

LOCK TABLES `event_translations` WRITE;
/*!40000 ALTER TABLE `event_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `event_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events`
(
    `id`                int(10) unsigned NOT NULL AUTO_INCREMENT,
    `is_active`         tinyint(1)       NOT NULL DEFAULT 0,
    `start_date`        datetime                  DEFAULT NULL,
    `end_date`          datetime                  DEFAULT NULL,
    `menu_id`           int(10) unsigned          DEFAULT NULL,
    `event_category_id` int(10) unsigned          DEFAULT NULL,
    `deleted_by`        int(11)                   DEFAULT NULL,
    `created_by`        int(11)                   DEFAULT NULL,
    `updated_by`        int(11)                   DEFAULT NULL,
    `deleted_at`        timestamp        NULL     DEFAULT NULL,
    `created_at`        timestamp        NULL     DEFAULT NULL,
    `updated_at`        timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `events_menu_id_foreign` (`menu_id`),
    KEY `events_event_category_id_foreign` (`event_category_id`),
    CONSTRAINT `events_event_category_id_foreign` FOREIGN KEY (`event_category_id`) REFERENCES `event_categories` (`id`),
    CONSTRAINT `events_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `events`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_categories`
--

DROP TABLE IF EXISTS `faq_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(11)                   DEFAULT NULL,
    `order`      int(11)                   DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_categories`
--

LOCK TABLES `faq_categories` WRITE;
/*!40000 ALTER TABLE `faq_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `faq_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_category_translations`
--

DROP TABLE IF EXISTS `faq_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_category_translations`
(
    `id`              int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `locale`          varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `faq_category_id` int(10) unsigned                        NOT NULL,
    `slug`            varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`            varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`     text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`      timestamp                               NULL DEFAULT NULL,
    `created_at`      timestamp                               NULL DEFAULT NULL,
    `updated_at`      timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `fct_deletedAt_unique` (`faq_category_id`, `locale`, `deleted_at`),
    UNIQUE KEY `faq_category_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    CONSTRAINT `faq_category_translations_faq_category_id_foreign` FOREIGN KEY (`faq_category_id`) REFERENCES `faq_categories` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_category_translations`
--

LOCK TABLES `faq_category_translations` WRITE;
/*!40000 ALTER TABLE `faq_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `faq_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_item_translations`
--

DROP TABLE IF EXISTS `faq_item_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_item_translations`
(
    `id`          int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `locale`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `faq_item_id` int(10) unsigned                        NOT NULL,
    `question`    text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `answer`      text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `image`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `thumb`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `deleted_at`  timestamp                               NULL DEFAULT NULL,
    `created_at`  timestamp                               NULL DEFAULT NULL,
    `updated_at`  timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `faq_item_translations_faq_item_id_locale_deleted_at_unique` (`faq_item_id`, `locale`, `deleted_at`),
    CONSTRAINT `faq_item_translations_faq_item_id_foreign` FOREIGN KEY (`faq_item_id`) REFERENCES `faq_items` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_item_translations`
--

LOCK TABLES `faq_item_translations` WRITE;
/*!40000 ALTER TABLE `faq_item_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `faq_item_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `faq_items`
--

DROP TABLE IF EXISTS `faq_items`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `faq_items`
(
    `id`              int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`         int(11)                   DEFAULT NULL,
    `order`           int(11)                   DEFAULT NULL,
    `is_active`       tinyint(1)       NOT NULL DEFAULT 0,
    `faq_category_id` int(10) unsigned          DEFAULT NULL,
    `deleted_by`      int(11)                   DEFAULT NULL,
    `created_by`      int(11)                   DEFAULT NULL,
    `updated_by`      int(11)                   DEFAULT NULL,
    `deleted_at`      timestamp        NULL     DEFAULT NULL,
    `created_at`      timestamp        NULL     DEFAULT NULL,
    `updated_at`      timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `faq_items_faq_category_id_foreign` (`faq_category_id`),
    CONSTRAINT `faq_items_faq_category_id_foreign` FOREIGN KEY (`faq_category_id`) REFERENCES `faq_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `faq_items`
--

LOCK TABLES `faq_items` WRITE;
/*!40000 ALTER TABLE `faq_items`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `faq_items`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file_categories`
--

DROP TABLE IF EXISTS `file_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned          DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `order`      int(11)          NOT NULL DEFAULT 0,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `file_categories_menu_id_foreign` (`menu_id`),
    CONSTRAINT `file_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file_categories`
--

LOCK TABLES `file_categories` WRITE;
/*!40000 ALTER TABLE `file_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `file_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file_category_translations`
--

DROP TABLE IF EXISTS `file_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file_category_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `file_category_id` int(10) unsigned                        NOT NULL,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`      text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `file_category_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `file_category_translations_file_category_id_foreign` (`file_category_id`),
    CONSTRAINT `file_category_translations_file_category_id_foreign` FOREIGN KEY (`file_category_id`) REFERENCES `file_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file_category_translations`
--

LOCK TABLES `file_category_translations` WRITE;
/*!40000 ALTER TABLE `file_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `file_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file_translations`
--

DROP TABLE IF EXISTS `file_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `file_id`          int(10) unsigned                        NOT NULL,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`      text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `image`            varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `content`          longtext COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `meta_title`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `file_translations_file_id_foreign` (`file_id`),
    CONSTRAINT `file_translations_file_id_foreign` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file_translations`
--

LOCK TABLES `file_translations` WRITE;
/*!40000 ALTER TABLE `file_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `file_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files`
(
    `id`               int(10) unsigned NOT NULL AUTO_INCREMENT,
    `is_active`        tinyint(1)       NOT NULL               DEFAULT 0,
    `order`            int(11)          NOT NULL               DEFAULT 0,
    `file_category_id` int(10) unsigned                        DEFAULT NULL,
    `path`             varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `extension`        varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `size`             varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `publication_date` datetime                                DEFAULT NULL,
    `data`             varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `menu_id`          int(10) unsigned                        DEFAULT NULL,
    `deleted_by`       int(11)                                 DEFAULT NULL,
    `created_by`       int(11)                                 DEFAULT NULL,
    `updated_by`       int(11)                                 DEFAULT NULL,
    `deleted_at`       timestamp        NULL                   DEFAULT NULL,
    `created_at`       timestamp        NULL                   DEFAULT NULL,
    `updated_at`       timestamp        NULL                   DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `files_file_category_id_foreign` (`file_category_id`),
    KEY `files_menu_id_foreign` (`menu_id`),
    CONSTRAINT `files_file_category_id_foreign` FOREIGN KEY (`file_category_id`) REFERENCES `file_categories` (`id`),
    CONSTRAINT `files_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `files`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestionnaire_aspim_translations`
--

DROP TABLE IF EXISTS `gestionnaire_aspim_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gestionnaire_aspim_translations`
(
    `id`                     int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `gestionnaire_aspim_id`  int(10) unsigned                        NOT NULL,
    `locale`                 varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`                   varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `nom_abrege_institution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `nom_institution`        varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `meta_title`             varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `meta_description`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `deleted_at`             timestamp                               NULL DEFAULT NULL,
    `created_at`             timestamp                               NULL DEFAULT NULL,
    `updated_at`             timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `gestionnaire_aspim_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `gestionnaire_aspim_translations_gestionnaire_aspim_id_foreign` (`gestionnaire_aspim_id`),
    CONSTRAINT `gestionnaire_aspim_translations_gestionnaire_aspim_id_foreign` FOREIGN KEY (`gestionnaire_aspim_id`) REFERENCES `gestionnaire_aspims` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestionnaire_aspim_translations`
--

LOCK TABLES `gestionnaire_aspim_translations` WRITE;
/*!40000 ALTER TABLE `gestionnaire_aspim_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `gestionnaire_aspim_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gestionnaire_aspims`
--

DROP TABLE IF EXISTS `gestionnaire_aspims`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gestionnaire_aspims`
(
    `id`                int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `menu_id`           int(10) unsigned                                 DEFAULT NULL,
    `civilite`          varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `is_active`         tinyint(1)                              NOT NULL DEFAULT 0,
    `name`              text COLLATE utf8mb4_unicode_ci                  DEFAULT NULL,
    `surname`           text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `email`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `other_email`       varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `email_verified_at` timestamp                               NULL     DEFAULT NULL,
    `password`          varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `tel`               varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `mobile`            varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `fax`               varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `langue`            varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `other_langue`      varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `adresse`           text COLLATE utf8mb4_unicode_ci                  DEFAULT NULL,
    `cite`              text COLLATE utf8mb4_unicode_ci                  DEFAULT NULL,
    `code_zip`          varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `countrie_id`       int(10) unsigned                                 DEFAULT NULL,
    `position`          text COLLATE utf8mb4_unicode_ci                  DEFAULT NULL,
    `website`           varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `skype`             varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `facebook`          varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `twitter`           varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `remember_token`    varchar(100) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `deleted_at`        timestamp                               NULL     DEFAULT NULL,
    `created_at`        timestamp                               NULL     DEFAULT NULL,
    `updated_at`        timestamp                               NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `gestionnaire_aspims_email_deleted_at_unique` (`email`, `deleted_at`),
    KEY `gestionnaire_aspims_menu_id_foreign` (`menu_id`),
    KEY `gestionnaire_aspims_countrie_id_foreign` (`countrie_id`),
    CONSTRAINT `gestionnaire_aspims_countrie_id_foreign` FOREIGN KEY (`countrie_id`) REFERENCES `countries` (`id`),
    CONSTRAINT `gestionnaire_aspims_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gestionnaire_aspims`
--

LOCK TABLES `gestionnaire_aspims` WRITE;
/*!40000 ALTER TABLE `gestionnaire_aspims`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `gestionnaire_aspims`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `governorate_translations`
--

DROP TABLE IF EXISTS `governorate_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `governorate_translations`
(
    `id`             int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `locale`         varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `governorate_id` int(10) unsigned                        NOT NULL,
    `name`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `deleted_at`     timestamp                               NULL DEFAULT NULL,
    `created_at`     timestamp                               NULL DEFAULT NULL,
    `updated_at`     timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `gov_trans_deletedAt_unique` (`governorate_id`, `locale`, `deleted_at`),
    CONSTRAINT `governorate_translations_governorate_id_foreign` FOREIGN KEY (`governorate_id`) REFERENCES `governorates` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `governorate_translations`
--

LOCK TABLES `governorate_translations` WRITE;
/*!40000 ALTER TABLE `governorate_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `governorate_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `governorates`
--

DROP TABLE IF EXISTS `governorates`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `governorates`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `country_id` int(10) unsigned NOT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `order`      int(11)                   DEFAULT NULL,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `governorates_country_id_foreign` (`country_id`),
    CONSTRAINT `governorates_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `governorates`
--

LOCK TABLES `governorates` WRITE;
/*!40000 ALTER TABLE `governorates`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `governorates`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_sections`
--

DROP TABLE IF EXISTS `home_sections`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_sections`
(
    `id`                 int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `name`               varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `reference`          varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `value`              text COLLATE utf8mb4_unicode_ci                  DEFAULT NULL,
    `parameter_group_id` int(10) unsigned                        NOT NULL DEFAULT 1,
    `module_id`          int(10) unsigned                                 DEFAULT NULL,
    `menu_id`            int(10) unsigned                                 DEFAULT NULL,
    `deleted_at`         timestamp                               NULL     DEFAULT NULL,
    `created_at`         timestamp                               NULL     DEFAULT NULL,
    `updated_at`         timestamp                               NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `home_sections_reference_unique` (`reference`),
    KEY `home_sections_parameter_group_id_foreign` (`parameter_group_id`),
    KEY `home_sections_module_id_foreign` (`module_id`),
    KEY `home_sections_menu_id_foreign` (`menu_id`),
    CONSTRAINT `home_sections_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
    CONSTRAINT `home_sections_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`),
    CONSTRAINT `home_sections_parameter_group_id_foreign` FOREIGN KEY (`parameter_group_id`) REFERENCES `home_sections` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_sections`
--

LOCK TABLES `home_sections` WRITE;
/*!40000 ALTER TABLE `home_sections`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `home_sections`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `language_lines`
--

DROP TABLE IF EXISTS `language_lines`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `language_lines`
(
    `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `group`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `key`        varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `text`       text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `language_lines_group_index` (`group`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 1496
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `language_lines`
--

LOCK TABLES `language_lines` WRITE;
/*!40000 ALTER TABLE `language_lines`
    DISABLE KEYS */;
INSERT INTO `language_lines`
VALUES (1, 'auth', 'failed',
        '{\"ar\":\"\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a \\u0627\\u0644\\u0627\\u0639\\u062a\\u0645\\u0627\\u062f \\u0647\\u0630\\u0647 \\u063a\\u064a\\u0631 \\u0645\\u062a\\u0637\\u0627\\u0628\\u0642\\u0629 \\u0645\\u0639 \\u0627\\u0644\\u0628\\u064a\\u0627\\u0646\\u0627\\u062a \\u0627\\u0644\\u0645\\u0633\\u062c\\u0644\\u0629 \\u0644\\u062f\\u064a\\u0646\\u0627.\",\"de\":\"Diese Kombination aus Zugangsdaten wurden nicht in unserer Datenbank gefunden.\",\"en\":\"These credentials do not match our records.\",\"es\":\"Estas credenciales no coinciden con nuestros registros.\",\"fr\":\"Ces identifiants ne correspondent pas \\u00e0 nos enregistrements\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (2, 'auth', 'throttle',
        '{\"ar\":\"\\u0639\\u062f\\u062f \\u0643\\u0628\\u064a\\u0631 \\u062c\\u062f\\u0627 \\u0645\\u0646 \\u0645\\u062d\\u0627\\u0648\\u0644\\u0627\\u062a \\u0627\\u0644\\u062f\\u062e\\u0648\\u0644. \\u064a\\u0631\\u062c\\u0649 \\u0627\\u0644\\u0645\\u062d\\u0627\\u0648\\u0644\\u0629 \\u0645\\u0631\\u0629 \\u0623\\u062e\\u0631\\u0649 \\u0628\\u0639\\u062f :seconds \\u062b\\u0627\\u0646\\u064a\\u0629.\",\"de\":\"Zu viele Loginversuche. Versuchen Sie es bitte in :seconds Sekunden nochmal.\",\"en\":\"Too many login attempts. Please try again in :seconds seconds.\",\"es\":\"Demasiados intentos de acceso. Por favor intente nuevamente en :seconds segundos.\",\"fr\":\"Tentatives de connexion trop nombreuses. Veuillez essayer de nouveau dans :seconds secondes.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (3, 'auth', 'reset_password_notification.line_1',
        '{\"en\":\"You are receiving this email because we received a password reset request for your account.\",\"fr\":\"Vous recevez cet email car nous avons re\\u00e7u une demande de r\\u00e9initialisation de mot de passe pour votre compte.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (4, 'auth', 'reset_password_notification.action',
        '{\"en\":\"Reset Password\",\"fr\":\"R\\u00e9initialiser le mot de passe\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (5, 'auth', 'reset_password_notification.line_2',
        '{\"en\":\"If you did not request a password reset, no further action is required.\",\"fr\":\"Si vous n\'avez pas demand\\u00e9 de r\\u00e9initialisation de mot de passe, aucune autre action n\'est requise.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (6, 'pagination', 'previous',
        '{\"ar\":\"&laquo; \\u0627\\u0644\\u0633\\u0627\\u0628\\u0642\",\"de\":\"&laquo; Zur\\u00fcck\",\"en\":\"&laquo; Previous\",\"es\":\"&laquo; Anterior\",\"fr\":\"&laquo; Pr\\u00e9c\\u00e9dent\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (7, 'pagination', 'next',
        '{\"ar\":\"\\u0627\\u0644\\u062a\\u0627\\u0644\\u064a &raquo;\",\"de\":\"Weiter &raquo;\",\"en\":\"Next &raquo;\",\"es\":\"Siguiente &raquo;\",\"fr\":\"Suivant &raquo;\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (8, 'passwords', 'password',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u0644\\u0627 \\u064a\\u0642\\u0644 \\u0637\\u0648\\u0644 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631 \\u0639\\u0646 \\u0633\\u062a\\u0629 \\u0623\\u062d\\u0631\\u0641\\u060c \\u0643\\u0645\\u0627 \\u064a\\u062c\\u0628 \\u0623\\u0646 \\u062a\\u062a\\u0637\\u0627\\u0628\\u0642 \\u0645\\u0639 \\u062d\\u0642\\u0644 \\u0627\\u0644\\u062a\\u0623\\u0643\\u064a\\u062f\",\"de\":\"Passw\\u00f6rter m\\u00fcssen mindestens 6 Zeichen lang sein und korrekt best\\u00e4tigt werden.\",\"en\":\"Passwords must be at least eight characters and match the confirmation.\",\"es\":\"Las contrase\\u00f1as deben coincidir y contener al menos 6 caracteres\",\"fr\":\"Les mots de passe doivent contenir au moins six caract\\u00e8res et \\u00eatre identiques.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (9, 'passwords', 'reset',
        '{\"ar\":\"\\u062a\\u0645\\u062a \\u0625\\u0639\\u0627\\u062f\\u0629 \\u062a\\u0639\\u064a\\u064a\\u0646 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631\",\"de\":\"Das Passwort wurde zur\\u00fcckgesetzt!\",\"en\":\"Your password has been reset!\",\"es\":\"\\u00a1Tu contrase\\u00f1a ha sido restablecida!\",\"fr\":\"Votre mot de passe a \\u00e9t\\u00e9 r\\u00e9initialis\\u00e9 !\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (10, 'passwords', 'sent',
        '{\"ar\":\"\\u062a\\u0645 \\u0625\\u0631\\u0633\\u0627\\u0644 \\u062a\\u0641\\u0627\\u0635\\u064a\\u0644 \\u0627\\u0633\\u062a\\u0639\\u0627\\u062f\\u0629 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631 \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643 \\u0625\\u0644\\u0649 \\u0628\\u0631\\u064a\\u062f\\u0643 \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\",\"de\":\"Passworterinnerung wurde gesendet!\",\"en\":\"We have e-mailed your password reset link!\",\"es\":\"\\u00a1Te hemos enviado por correo el enlace para restablecer tu contrase\\u00f1a!\",\"fr\":\"Nous vous avons envoy\\u00e9 par courriel le lien de r\\u00e9initialisation du mot de passe !\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (11, 'passwords', 'token',
        '{\"ar\":\".\\u0631\\u0645\\u0632 \\u0627\\u0633\\u062a\\u0639\\u0627\\u062f\\u0629 \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0645\\u0631\\u0648\\u0631 \\u0627\\u0644\\u0630\\u064a \\u0623\\u062f\\u062e\\u0644\\u062a\\u0647 \\u063a\\u064a\\u0631 \\u0635\\u062d\\u064a\\u062d\",\"de\":\"Der Passwort-Wiederherstellungs-Schl\\u00fcssel ist ung\\u00fcltig oder abgelaufen.\",\"en\":\"This password reset token is invalid.\",\"es\":\"El token de recuperaci\\u00f3n de contrase\\u00f1a es inv\\u00e1lido.\",\"fr\":\"Ce jeton de r\\u00e9initialisation du mot de passe n\'est pas valide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (12, 'passwords', 'user',
        '{\"ar\":\"\\u0644\\u0645 \\u064a\\u062a\\u0645 \\u0627\\u0644\\u0639\\u062b\\u0648\\u0631 \\u0639\\u0644\\u0649 \\u0623\\u064a\\u0651 \\u062d\\u0633\\u0627\\u0628\\u064d \\u0628\\u0647\\u0630\\u0627 \\u0627\\u0644\\u0639\\u0646\\u0648\\u0627\\u0646 \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\",\"de\":\"Es konnte leider kein Nutzer mit dieser E-Mail-Adresse gefunden werden.\",\"en\":\"We can\'t find a user with that e-mail address.\",\"es\":\"No podemos encontrar ning\\u00fan usuario con ese correo electr\\u00f3nico.\",\"fr\":\"Aucun utilisateur n\'a \\u00e9t\\u00e9 trouv\\u00e9 avec cette adresse courriel.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (13, 'validation', 'accepted',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0642\\u0628\\u0648\\u0644 :attribute\",\"de\":\":attribute muss akzeptiert werden.\",\"en\":\"The :attribute must be accepted.\",\"es\":\":attribute debe ser aceptado.\",\"fr\":\"Le champ :attribute doit \\u00eatre accept\\u00e9.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (14, 'validation', 'active_url',
        '{\"ar\":\":attribute \\u0644\\u0627 \\u064a\\u064f\\u0645\\u062b\\u0651\\u0644 \\u0631\\u0627\\u0628\\u0637\\u064b\\u0627 \\u0635\\u062d\\u064a\\u062d\\u064b\\u0627\",\"de\":\":attribute ist keine g\\u00fcltige Internet-Adresse.\",\"en\":\"The :attribute is not a valid URL.\",\"es\":\":attribute no es una URL v\\u00e1lida.\",\"fr\":\"Le champ :attribute n\'est pas une URL valide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (15, 'validation', 'after',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0639\\u0644\\u0649 :attribute \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u062a\\u0627\\u0631\\u064a\\u062e\\u064b\\u0627 \\u0644\\u0627\\u062d\\u0642\\u064b\\u0627 \\u0644\\u0644\\u062a\\u0627\\u0631\\u064a\\u062e :date.\",\"de\":\":attribute muss ein Datum nach dem :date sein.\",\"en\":\"The :attribute must be a date after :date.\",\"es\":\":attribute debe ser una fecha posterior a :date.\",\"fr\":\"Le champ :attribute doit \\u00eatre une date post\\u00e9rieure au :date.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (16, 'validation', 'after_or_equal',
        '{\"ar\":\":attribute \\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u062a\\u0627\\u0631\\u064a\\u062e\\u0627\\u064b \\u0644\\u0627\\u062d\\u0642\\u0627\\u064b \\u0623\\u0648 \\u0645\\u0637\\u0627\\u0628\\u0642\\u0627\\u064b \\u0644\\u0644\\u062a\\u0627\\u0631\\u064a\\u062e :date.\",\"de\":\":attribute muss ein Datum nach dem :date oder gleich dem :date sein.\",\"en\":\"The :attribute must be a date after or equal to :date.\",\"es\":\":attribute debe ser una fecha posterior o igual a :date.\",\"fr\":\"Le champ :attribute doit \\u00eatre une date post\\u00e9rieure ou \\u00e9gale au :date.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (17, 'validation', 'alpha',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u0644\\u0627 \\u064a\\u062d\\u062a\\u0648\\u064a :attribute \\u0633\\u0648\\u0649 \\u0639\\u0644\\u0649 \\u062d\\u0631\\u0648\\u0641\",\"de\":\":attribute darf nur aus Buchstaben bestehen.\",\"en\":\"The :attribute may only contain letters.\",\"es\":\":attribute s\\u00f3lo debe contener letras.\",\"fr\":\"Le champ :attribute doit contenir uniquement des lettres.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (18, 'validation', 'alpha_dash',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u0644\\u0627 \\u064a\\u062d\\u062a\\u0648\\u064a :attribute \\u0639\\u0644\\u0649 \\u062d\\u0631\\u0648\\u0641\\u060c \\u0623\\u0631\\u0642\\u0627\\u0645 \\u0648\\u0645\\u0637\\u0651\\u0627\\u062a.\",\"de\":\":attribute darf nur aus Buchstaben, Zahlen, Binde- und Unterstrichen bestehen.\",\"en\":\"The :attribute may only contain letters, numbers, dashes and underscores.\",\"es\":\":attribute s\\u00f3lo debe contener letras, n\\u00fameros y guiones.\",\"fr\":\"Le champ :attribute doit contenir uniquement des lettres, des chiffres et des tirets.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (19, 'validation', 'alpha_num',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u062d\\u062a\\u0648\\u064a :attribute \\u0639\\u0644\\u0649 \\u062d\\u0631\\u0648\\u0641\\u064d \\u0648\\u0623\\u0631\\u0642\\u0627\\u0645\\u064d \\u0641\\u0642\\u0637\",\"de\":\":attribute darf nur aus Buchstaben und Zahlen bestehen.\",\"en\":\"The :attribute may only contain letters and numbers.\",\"es\":\":attribute s\\u00f3lo debe contener letras y n\\u00fameros.\",\"fr\":\"Le champ :attribute doit contenir uniquement des chiffres et des lettres.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (20, 'validation', 'array',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 :attribute \\u064b\\u0645\\u0635\\u0641\\u0648\\u0641\\u0629\",\"de\":\":attribute muss ein Array sein.\",\"en\":\"The :attribute must be an array.\",\"es\":\":attribute debe ser un conjunto.\",\"fr\":\"Le champ :attribute doit \\u00eatre un tableau.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (21, 'validation', 'before',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0639\\u0644\\u0649 :attribute \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u062a\\u0627\\u0631\\u064a\\u062e\\u064b\\u0627 \\u0633\\u0627\\u0628\\u0642\\u064b\\u0627 \\u0644\\u0644\\u062a\\u0627\\u0631\\u064a\\u062e :date.\",\"de\":\":attribute muss ein Datum vor dem :date sein.\",\"en\":\"The :attribute must be a date before :date.\",\"es\":\":attribute debe ser una fecha anterior a :date.\",\"fr\":\"Le champ :attribute doit \\u00eatre une date ant\\u00e9rieure au :date.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (22, 'validation', 'before_or_equal',
        '{\"ar\":\":attribute \\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u062a\\u0627\\u0631\\u064a\\u062e\\u0627 \\u0633\\u0627\\u0628\\u0642\\u0627 \\u0623\\u0648 \\u0645\\u0637\\u0627\\u0628\\u0642\\u0627 \\u0644\\u0644\\u062a\\u0627\\u0631\\u064a\\u062e :date\",\"de\":\":attribute muss ein Datum vor dem :date oder gleich dem :date sein.\",\"en\":\"The :attribute must be a date before or equal to :date.\",\"es\":\":attribute debe ser una fecha anterior o igual a :date.\",\"fr\":\"Le champ :attribute doit \\u00eatre une date ant\\u00e9rieure ou \\u00e9gale au :date.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (23, 'validation', 'between.numeric',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u062a\\u0643\\u0648\\u0646 \\u0642\\u064a\\u0645\\u0629 :attribute \\u0628\\u064a\\u0646 :min \\u0648 :max.\",\"de\":\":attribute muss zwischen :min & :max liegen.\",\"en\":\"The :attribute must be between :min and :max.\",\"es\":\":attribute tiene que estar entre :min - :max.\",\"fr\":\"La valeur de :attribute doit \\u00eatre comprise entre :min et :max.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (24, 'validation', 'between.file',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u062d\\u062c\\u0645 \\u0627\\u0644\\u0645\\u0644\\u0641 :attribute \\u0628\\u064a\\u0646 :min \\u0648 :max \\u0643\\u064a\\u0644\\u0648\\u0628\\u0627\\u064a\\u062a.\",\"de\":\":attribute muss zwischen :min & :max Kilobytes gro\\u00df sein.\",\"en\":\"The :attribute must be between :min and :max kilobytes.\",\"es\":\":attribute debe pesar entre :min - :max kilobytes.\",\"fr\":\"La taille du fichier de :attribute doit \\u00eatre comprise entre :min et :max kilo-octets.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (25, 'validation', 'between.string',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u0639\\u062f\\u062f \\u062d\\u0631\\u0648\\u0641 \\u0627\\u0644\\u0646\\u0651\\u0635 :attribute \\u0628\\u064a\\u0646 :min \\u0648 :max\",\"de\":\":attribute muss zwischen :min & :max Zeichen lang sein.\",\"en\":\"The :attribute must be between :min and :max characters.\",\"es\":\":attribute tiene que tener entre :min - :max caracteres.\",\"fr\":\"Le texte :attribute doit contenir entre :min et :max caract\\u00e8res.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (26, 'validation', 'between.array',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u062d\\u062a\\u0648\\u064a :attribute \\u0639\\u0644\\u0649 \\u0639\\u062f\\u062f \\u0645\\u0646 \\u0627\\u0644\\u0639\\u0646\\u0627\\u0635\\u0631 \\u0628\\u064a\\u0646 :min \\u0648 :max\",\"de\":\":attribute muss zwischen :min & :max Elemente haben.\",\"en\":\"The :attribute must have between :min and :max items.\",\"es\":\":attribute tiene que tener entre :min - :max \\u00edtems.\",\"fr\":\"Le tableau :attribute doit contenir entre :min et :max \\u00e9l\\u00e9ments.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (27, 'validation', 'boolean',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u062a\\u0643\\u0648\\u0646 \\u0642\\u064a\\u0645\\u0629 :attribute \\u0625\\u0645\\u0627 true \\u0623\\u0648 false \",\"de\":\":attribute muss entweder \'true\' oder \'false\' sein.\",\"en\":\"The :attribute field must be true or false.\",\"es\":\"El campo :attribute debe tener un valor verdadero o falso.\",\"fr\":\"Le champ :attribute doit \\u00eatre vrai ou faux.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (28, 'validation', 'confirmed',
        '{\"ar\":\"\\u062d\\u0642\\u0644 \\u0627\\u0644\\u062a\\u0623\\u0643\\u064a\\u062f \\u063a\\u064a\\u0631 \\u0645\\u064f\\u0637\\u0627\\u0628\\u0642 \\u0644\\u0644\\u062d\\u0642\\u0644 :attribute\",\"de\":\":attribute stimmt nicht mit der Best\\u00e4tigung \\u00fcberein.\",\"en\":\"The :attribute confirmation does not match.\",\"es\":\"La confirmaci\\u00f3n de :attribute no coincide.\",\"fr\":\"Le champ de confirmation :attribute ne correspond pas.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (29, 'validation', 'date',
        '{\"ar\":\":attribute \\u0644\\u064a\\u0633 \\u062a\\u0627\\u0631\\u064a\\u062e\\u064b\\u0627 \\u0635\\u062d\\u064a\\u062d\\u064b\\u0627\",\"de\":\":attribute muss ein g\\u00fcltiges Datum sein.\",\"en\":\"The :attribute is not a valid date.\",\"es\":\":attribute no es una fecha v\\u00e1lida.\",\"fr\":\"Le champ :attribute n\'est pas une date valide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (30, 'validation', 'date_format',
        '{\"ar\":\"\\u0644\\u0627 \\u064a\\u062a\\u0648\\u0627\\u0641\\u0642 :attribute \\u0645\\u0639 \\u0627\\u0644\\u0634\\u0643\\u0644 :format.\",\"de\":\":attribute entspricht nicht dem g\\u00fcltigen Format f\\u00fcr :format.\",\"en\":\"The :attribute does not match the format :format.\",\"es\":\":attribute no corresponde al formato :format.\",\"fr\":\"Le champ :attribute ne correspond pas au format :format.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (31, 'validation', 'different',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u0627\\u0644\\u062d\\u0642\\u0644\\u0627\\u0646 :attribute \\u0648 :other \\u0645\\u064f\\u062e\\u062a\\u0644\\u0641\\u0627\\u0646\",\"de\":\":attribute und :other m\\u00fcssen sich unterscheiden.\",\"en\":\"The :attribute and :other must be different.\",\"es\":\":attribute y :other deben ser diferentes.\",\"fr\":\"Les champs :attribute et :other doivent \\u00eatre diff\\u00e9rents.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (32, 'validation', 'digits',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u062d\\u062a\\u0648\\u064a :attribute \\u0639\\u0644\\u0649 :digits \\u0631\\u0642\\u0645\\u064b\\u0627\\/\\u0623\\u0631\\u0642\\u0627\\u0645\",\"de\":\":attribute muss :digits Stellen haben.\",\"en\":\"The :attribute must be :digits digits.\",\"es\":\":attribute debe tener :digits d\\u00edgitos.\",\"fr\":\"Le champ :attribute doit contenir :digits chiffres.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (33, 'validation', 'digits_between',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u062d\\u062a\\u0648\\u064a :attribute \\u0628\\u064a\\u0646 :min \\u0648 :max \\u0631\\u0642\\u0645\\u064b\\u0627\\/\\u0623\\u0631\\u0642\\u0627\\u0645 \",\"de\":\":attribute muss zwischen :min und :max Stellen haben.\",\"en\":\"The :attribute must be between :min and :max digits.\",\"es\":\":attribute debe tener entre :min y :max d\\u00edgitos.\",\"fr\":\"Le champ :attribute doit contenir entre :min et :max chiffres.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (34, 'validation', 'dimensions',
        '{\"ar\":\"\\u0627\\u0644\\u0640 :attribute \\u064a\\u062d\\u062a\\u0648\\u064a \\u0639\\u0644\\u0649 \\u0623\\u0628\\u0639\\u0627\\u062f \\u0635\\u0648\\u0631\\u0629 \\u063a\\u064a\\u0631 \\u0635\\u0627\\u0644\\u062d\\u0629.\",\"de\":\":attribute hat ung\\u00fcltige Bildabmessungen.\",\"en\":\"The :attribute has invalid image dimensions.\",\"es\":\"Las dimensiones de la imagen :attribute no son v\\u00e1lidas.\",\"fr\":\"La taille de l\'image :attribute n\'est pas conforme.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (35, 'validation', 'distinct',
        '{\"ar\":\"\\u0644\\u0644\\u062d\\u0642\\u0644 :attribute \\u0642\\u064a\\u0645\\u0629 \\u0645\\u064f\\u0643\\u0631\\u0651\\u0631\\u0629.\",\"de\":\"Das Feld :attribute beinhaltet einen bereits vorhandenen Wert.\",\"en\":\"The :attribute field has a duplicate value.\",\"es\":\"El campo :attribute contiene un valor duplicado.\",\"fr\":\"Le champ :attribute a une valeur en double.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (36, 'validation', 'email',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 :attribute \\u0639\\u0646\\u0648\\u0627\\u0646 \\u0628\\u0631\\u064a\\u062f \\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0635\\u062d\\u064a\\u062d \\u0627\\u0644\\u0628\\u064f\\u0646\\u064a\\u0629\",\"de\":\":attribute muss eine g\\u00fcltige E-Mail-Adresse sein.\",\"en\":\"The :attribute must be a valid email address.\",\"es\":\":attribute no es un correo v\\u00e1lido\",\"fr\":\"Le champ :attribute doit \\u00eatre une adresse courriel valide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (37, 'validation', 'exists',
        '{\"ar\":\"\\u0627\\u0644\\u0642\\u064a\\u0645\\u0629 \\u0627\\u0644\\u0645\\u062d\\u062f\\u062f\\u0629 :attribute \\u063a\\u064a\\u0631 \\u0645\\u0648\\u062c\\u0648\\u062f\\u0629\",\"de\":\"Der gew\\u00e4hlte Wert f\\u00fcr :attribute ist ung\\u00fcltig.\",\"en\":\"The selected :attribute is invalid.\",\"es\":\":attribute es inv\\u00e1lido.\",\"fr\":\"Le champ :attribute s\\u00e9lectionn\\u00e9 est invalide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (38, 'validation', 'file',
        '{\"ar\":\"\\u0627\\u0644\\u0640 :attribute \\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u0645\\u0644\\u0641\\u0627.\",\"de\":\":attribute muss eine Datei sein.\",\"en\":\"The :attribute must be a file.\",\"es\":\"El campo :attribute debe ser un archivo.\",\"fr\":\"Le champ :attribute doit \\u00eatre un fichier.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (39, 'validation', 'filled',
        '{\"ar\":\":attribute \\u0625\\u062c\\u0628\\u0627\\u0631\\u064a\",\"de\":\":attribute muss ausgef\\u00fcllt sein.\",\"en\":\"The :attribute field must have a value.\",\"es\":\"El campo :attribute es obligatorio.\",\"fr\":\"Le champ :attribute doit avoir une valeur.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (40, 'validation', 'image',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 :attribute \\u0635\\u0648\\u0631\\u0629\\u064b\",\"de\":\":attribute muss ein Bild sein.\",\"en\":\"The :attribute must be an image.\",\"es\":\":attribute debe ser una imagen.\",\"fr\":\"Le champ :attribute doit \\u00eatre une image.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (41, 'validation', 'in',
        '{\"ar\":\":attribute \\u0644\\u0627\\u063a\\u064d\",\"de\":\"Der gew\\u00e4hlte Wert f\\u00fcr :attribute ist ung\\u00fcltig.\",\"en\":\"The selected :attribute is invalid.\",\"es\":\":attribute es inv\\u00e1lido.\",\"fr\":\"Le champ :attribute est invalide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (42, 'validation', 'in_array',
        '{\"ar\":\":attribute \\u063a\\u064a\\u0631 \\u0645\\u0648\\u062c\\u0648\\u062f \\u0641\\u064a :other.\",\"de\":\"Der gew\\u00e4hlte Wert f\\u00fcr :attribute kommt nicht in :other vor.\",\"en\":\"The :attribute field does not exist in :other.\",\"es\":\"El campo :attribute no existe en :other.\",\"fr\":\"Le champ :attribute n\'existe pas dans :other.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (43, 'validation', 'integer',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 :attribute \\u0639\\u062f\\u062f\\u064b\\u0627 \\u0635\\u062d\\u064a\\u062d\\u064b\\u0627\",\"de\":\":attribute muss eine ganze Zahl sein.\",\"en\":\"The :attribute must be an integer.\",\"es\":\":attribute debe ser un n\\u00famero entero.\",\"fr\":\"Le champ :attribute doit \\u00eatre un entier.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (44, 'validation', 'ip',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 :attribute \\u0639\\u0646\\u0648\\u0627\\u0646 IP \\u0635\\u062d\\u064a\\u062d\\u064b\\u0627\",\"de\":\":attribute muss eine g\\u00fcltige IP-Adresse sein.\",\"en\":\"The :attribute must be a valid IP address.\",\"es\":\":attribute debe ser una direcci\\u00f3n IP v\\u00e1lida.\",\"fr\":\"Le champ :attribute doit \\u00eatre une adresse IP valide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (45, 'validation', 'ipv4',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 :attribute \\u0639\\u0646\\u0648\\u0627\\u0646 IPv4 \\u0635\\u062d\\u064a\\u062d\\u064b\\u0627.\",\"de\":\":attribute muss eine g\\u00fcltige IPv4-Adresse sein.\",\"en\":\"The :attribute must be a valid IPv4 address.\",\"es\":\":attribute debe ser un direcci\\u00f3n IPv4 v\\u00e1lida\",\"fr\":\"Le champ :attribute doit \\u00eatre une adresse IPv4 valide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (46, 'validation', 'ipv6',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 :attribute \\u0639\\u0646\\u0648\\u0627\\u0646 IPv6 \\u0635\\u062d\\u064a\\u062d\\u064b\\u0627.\",\"de\":\":attribute muss eine g\\u00fcltige IPv6-Adresse sein.\",\"en\":\"The :attribute must be a valid IPv6 address.\",\"es\":\":attribute debe ser un direcci\\u00f3n IPv6 v\\u00e1lida.\",\"fr\":\"Le champ :attribute doit \\u00eatre une adresse IPv6 valide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (47, 'validation', 'json',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 :attribute \\u0646\\u0635\\u0622 \\u0645\\u0646 \\u0646\\u0648\\u0639 JSON.\",\"de\":\":attribute muss ein g\\u00fcltiger JSON-String sein.\",\"en\":\"The :attribute must be a valid JSON string.\",\"es\":\"El campo :attribute debe tener una cadena JSON v\\u00e1lida.\",\"fr\":\"Le champ :attribute doit \\u00eatre un document JSON valide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (48, 'validation', 'max.numeric',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u062a\\u0643\\u0648\\u0646 \\u0642\\u064a\\u0645\\u0629 :attribute \\u0645\\u0633\\u0627\\u0648\\u064a\\u0629 \\u0623\\u0648 \\u0623\\u0635\\u063a\\u0631 \\u0644\\u0640 :max.\",\"de\":\":attribute darf maximal :max sein.\",\"en\":\"The :attribute may not be greater than :max.\",\"es\":\":attribute no debe ser mayor a :max.\",\"fr\":\"La valeur de :attribute ne peut \\u00eatre sup\\u00e9rieure \\u00e0 :max.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (49, 'validation', 'max.file',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u0644\\u0627 \\u064a\\u062a\\u062c\\u0627\\u0648\\u0632 \\u062d\\u062c\\u0645 \\u0627\\u0644\\u0645\\u0644\\u0641 :attribute :max \\u0643\\u064a\\u0644\\u0648\\u0628\\u0627\\u064a\\u062a\",\"de\":\":attribute darf maximal :max Kilobytes gro\\u00df sein.\",\"en\":\"The :attribute may not be greater than :max kilobytes.\",\"es\":\":attribute no debe ser mayor que :max kilobytes.\",\"fr\":\"La taille du fichier de :attribute ne peut pas d\\u00e9passer :max kilo-octets.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (50, 'validation', 'max.string',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u0644\\u0627 \\u064a\\u062a\\u062c\\u0627\\u0648\\u0632 \\u0637\\u0648\\u0644 \\u0627\\u0644\\u0646\\u0651\\u0635 :attribute :max \\u062d\\u0631\\u0648\\u0641\\u064d\\/\\u062d\\u0631\\u0641\\u064b\\u0627\",\"de\":\":attribute darf maximal :max Zeichen haben.\",\"en\":\"The :attribute may not be greater than :max characters.\",\"es\":\":attribute no debe ser mayor que :max caracteres.\",\"fr\":\"Le texte de :attribute ne peut contenir plus de :max caract\\u00e8res.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (51, 'validation', 'max.array',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u0644\\u0627 \\u064a\\u062d\\u062a\\u0648\\u064a :attribute \\u0639\\u0644\\u0649 \\u0623\\u0643\\u062b\\u0631 \\u0645\\u0646 :max \\u0639\\u0646\\u0627\\u0635\\u0631\\/\\u0639\\u0646\\u0635\\u0631.\",\"de\":\":attribute darf nicht mehr als :max Elemente haben.\",\"en\":\"The :attribute may not have more than :max items.\",\"es\":\":attribute no debe tener m\\u00e1s de :max elementos.\",\"fr\":\"Le tableau :attribute ne peut contenir plus de :max \\u00e9l\\u00e9ments.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (52, 'validation', 'mimes',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u0645\\u0644\\u0641\\u064b\\u0627 \\u0645\\u0646 \\u0646\\u0648\\u0639 : :values.\",\"de\":\":attribute muss den Dateityp :values haben.\",\"en\":\"The :attribute must be a file of type: :values.\",\"es\":\":attribute debe ser un archivo con formato: :values.\",\"fr\":\"Le champ :attribute doit \\u00eatre un fichier de type : :values.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (53, 'validation', 'mimetypes',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u0645\\u0644\\u0641\\u064b\\u0627 \\u0645\\u0646 \\u0646\\u0648\\u0639 : :values.\",\"de\":\":attribute muss den Dateityp :values haben.\",\"en\":\"The :attribute must be a file of type: :values.\",\"es\":\":attribute debe ser un archivo con formato: :values.\",\"fr\":\"Le champ :attribute doit \\u00eatre un fichier de type : :values.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (54, 'validation', 'min.numeric',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u062a\\u0643\\u0648\\u0646 \\u0642\\u064a\\u0645\\u0629 :attribute \\u0645\\u0633\\u0627\\u0648\\u064a\\u0629 \\u0623\\u0648 \\u0623\\u0643\\u0628\\u0631 \\u0644\\u0640 :min.\",\"de\":\":attribute muss mindestens :min sein.\",\"en\":\"The :attribute must be at least :min.\",\"es\":\"El tama\\u00f1o de :attribute debe ser de al menos :min.\",\"fr\":\"La valeur de :attribute doit \\u00eatre sup\\u00e9rieure ou \\u00e9gale \\u00e0 :min.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (55, 'validation', 'min.file',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u062d\\u062c\\u0645 \\u0627\\u0644\\u0645\\u0644\\u0641 :attribute \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u0642\\u0644 :min \\u0643\\u064a\\u0644\\u0648\\u0628\\u0627\\u064a\\u062a\",\"de\":\":attribute muss mindestens :min Kilobytes gro\\u00df sein.\",\"en\":\"The :attribute must be at least :min kilobytes.\",\"es\":\"El tama\\u00f1o de :attribute debe ser de al menos :min kilobytes.\",\"fr\":\"La taille du fichier de :attribute doit \\u00eatre sup\\u00e9rieure \\u00e0 :min kilo-octets.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (56, 'validation', 'min.string',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u0637\\u0648\\u0644 \\u0627\\u0644\\u0646\\u0635 :attribute \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u0642\\u0644 :min \\u062d\\u0631\\u0648\\u0641\\u064d\\/\\u062d\\u0631\\u0641\\u064b\\u0627\",\"de\":\":attribute muss mindestens :min Zeichen lang sein.\",\"en\":\"The :attribute must be at least :min characters.\",\"es\":\":attribute debe contener al menos :min caracteres.\",\"fr\":\"Le texte :attribute doit contenir au moins :min caract\\u00e8res.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (57, 'validation', 'min.array',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u062d\\u062a\\u0648\\u064a :attribute \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0623\\u0642\\u0644 \\u0639\\u0644\\u0649 :min \\u0639\\u064f\\u0646\\u0635\\u0631\\u064b\\u0627\\/\\u0639\\u0646\\u0627\\u0635\\u0631\",\"de\":\":attribute muss mindestens :min Elemente haben.\",\"en\":\"The :attribute must have at least :min items.\",\"es\":\":attribute debe tener al menos :min elementos.\",\"fr\":\"Le tableau :attribute doit contenir au moins :min \\u00e9l\\u00e9ments.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (58, 'validation', 'not_in',
        '{\"ar\":\":attribute \\u0644\\u0627\\u063a\\u064d\",\"de\":\"Der gew\\u00e4hlte Wert f\\u00fcr :attribute ist ung\\u00fcltig.\",\"en\":\"The selected :attribute is invalid.\",\"es\":\":attribute es inv\\u00e1lido.\",\"fr\":\"Le champ :attribute s\\u00e9lectionn\\u00e9 n\'est pas valide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (59, 'validation', 'numeric',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0639\\u0644\\u0649 :attribute \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u0631\\u0642\\u0645\\u064b\\u0627\",\"de\":\":attribute muss eine Zahl sein.\",\"en\":\"The :attribute must be a number.\",\"es\":\":attribute debe ser num\\u00e9rico.\",\"fr\":\"Le champ :attribute doit contenir un nombre.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (60, 'validation', 'present',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u062a\\u0642\\u062f\\u064a\\u0645 :attribute\",\"de\":\"Das Feld :attribute muss vorhanden sein.\",\"en\":\"The :attribute field must be present.\",\"es\":\"El campo :attribute debe estar presente.\",\"fr\":\"Le champ :attribute doit \\u00eatre pr\\u00e9sent.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (61, 'validation', 'regex',
        '{\"ar\":\"\\u0635\\u064a\\u063a\\u0629 :attribute .\\u063a\\u064a\\u0631 \\u0635\\u062d\\u064a\\u062d\\u0629\",\"de\":\":attribute Format ist ung\\u00fcltig.\",\"en\":\"The :attribute format is invalid.\",\"es\":\"El formato de :attribute es inv\\u00e1lido.\",\"fr\":\"Le format du champ :attribute est invalide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (62, 'validation', 'required',
        '{\"ar\":\":attribute \\u0645\\u0637\\u0644\\u0648\\u0628.\",\"de\":\":attribute muss ausgef\\u00fcllt sein.\",\"en\":\"The :attribute field is required.\",\"es\":\"El campo :attribute es obligatorio.\",\"fr\":\"Le champ :attribute est obligatoire.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (63, 'validation', 'required_if',
        '{\"ar\":\":attribute \\u0645\\u0637\\u0644\\u0648\\u0628 \\u0641\\u064a \\u062d\\u0627\\u0644 \\u0645\\u0627 \\u0625\\u0630\\u0627 \\u0643\\u0627\\u0646 :other \\u064a\\u0633\\u0627\\u0648\\u064a :value.\",\"de\":\":attribute muss ausgef\\u00fcllt sein, wenn :other :value ist.\",\"en\":\"The :attribute field is required when :other is :value.\",\"es\":\"El campo :attribute es obligatorio cuando :other es :value.\",\"fr\":\"Le champ :attribute est obligatoire quand la valeur de :other est :value.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (64, 'validation', 'required_unless',
        '{\"ar\":\":attribute \\u0645\\u0637\\u0644\\u0648\\u0628 \\u0641\\u064a \\u062d\\u0627\\u0644 \\u0645\\u0627 \\u0644\\u0645 \\u064a\\u0643\\u0646 :other \\u064a\\u0633\\u0627\\u0648\\u064a :values.\",\"de\":\":attribute muss ausgef\\u00fcllt sein, wenn :other nicht :values ist.\",\"en\":\"The :attribute field is required unless :other is in :values.\",\"es\":\"El campo :attribute es obligatorio a menos que :other est\\u00e9 en :values.\",\"fr\":\"Le champ :attribute est obligatoire sauf si :other est :values.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (65, 'validation', 'required_with',
        '{\"ar\":\":attribute \\u0645\\u0637\\u0644\\u0648\\u0628 \\u0625\\u0630\\u0627 \\u062a\\u0648\\u0641\\u0651\\u0631 :values.\",\"de\":\":attribute muss angegeben werden, wenn :values ausgef\\u00fcllt wurde.\",\"en\":\"The :attribute field is required when :values is present.\",\"es\":\"El campo :attribute es obligatorio cuando :values est\\u00e1 presente.\",\"fr\":\"Le champ :attribute est obligatoire quand :values est pr\\u00e9sent.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (66, 'validation', 'required_with_all',
        '{\"ar\":\":attribute \\u0645\\u0637\\u0644\\u0648\\u0628 \\u0625\\u0630\\u0627 \\u062a\\u0648\\u0641\\u0651\\u0631 :values.\",\"de\":\":attribute muss angegeben werden, wenn :values ausgef\\u00fcllt wurde.\",\"en\":\"The :attribute field is required when :values are present.\",\"es\":\"El campo :attribute es obligatorio cuando :values est\\u00e1 presente.\",\"fr\":\"Le champ :attribute est obligatoire quand :values est pr\\u00e9sent.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (67, 'validation', 'required_without',
        '{\"ar\":\":attribute \\u0645\\u0637\\u0644\\u0648\\u0628 \\u0625\\u0630\\u0627 \\u0644\\u0645 \\u064a\\u062a\\u0648\\u0641\\u0651\\u0631 :values.\",\"de\":\":attribute muss angegeben werden, wenn :values nicht ausgef\\u00fcllt wurde.\",\"en\":\"The :attribute field is required when :values is not present.\",\"es\":\"El campo :attribute es obligatorio cuando :values no est\\u00e1 presente.\",\"fr\":\"Le champ :attribute est obligatoire quand :values n\'est pas pr\\u00e9sent.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (68, 'validation', 'required_without_all',
        '{\"ar\":\":attribute \\u0645\\u0637\\u0644\\u0648\\u0628 \\u0625\\u0630\\u0627 \\u0644\\u0645 \\u064a\\u062a\\u0648\\u0641\\u0651\\u0631 :values.\",\"de\":\":attribute muss angegeben werden, wenn keines der Felder :values ausgef\\u00fcllt wurde.\",\"en\":\"The :attribute field is required when none of :values are present.\",\"es\":\"El campo :attribute es obligatorio cuando ninguno de :values est\\u00e9n presentes.\",\"fr\":\"Le champ :attribute est requis quand aucun de :values n\'est pr\\u00e9sent.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (69, 'validation', 'same',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u062a\\u0637\\u0627\\u0628\\u0642 :attribute \\u0645\\u0639 :other\",\"de\":\":attribute und :other m\\u00fcssen \\u00fcbereinstimmen.\",\"en\":\"The :attribute and :other must match.\",\"es\":\":attribute y :other deben coincidir.\",\"fr\":\"Les champs :attribute et :other doivent \\u00eatre identiques.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (70, 'validation', 'size.numeric',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u062a\\u0643\\u0648\\u0646 \\u0642\\u064a\\u0645\\u0629 :attribute \\u0645\\u0633\\u0627\\u0648\\u064a\\u0629 \\u0644\\u0640 :size\",\"de\":\":attribute muss gleich :size sein.\",\"en\":\"The :attribute must be :size.\",\"es\":\"El tama\\u00f1o de :attribute debe ser :size.\",\"fr\":\"La valeur de :attribute doit \\u00eatre :size.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (71, 'validation', 'size.file',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 \\u062d\\u062c\\u0645 \\u0627\\u0644\\u0645\\u0644\\u0641 :attribute :size \\u0643\\u064a\\u0644\\u0648\\u0628\\u0627\\u064a\\u062a\",\"de\":\":attribute muss :size Kilobyte gro\\u00df sein.\",\"en\":\"The :attribute must be :size kilobytes.\",\"es\":\"El tama\\u00f1o de :attribute debe ser :size kilobytes.\",\"fr\":\"La taille du fichier de :attribute doit \\u00eatre de :size kilo-octets.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (72, 'validation', 'size.string',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u062d\\u062a\\u0648\\u064a \\u0627\\u0644\\u0646\\u0635 :attribute \\u0639\\u0644\\u0649 :size \\u062d\\u0631\\u0648\\u0641\\u064d\\/\\u062d\\u0631\\u0641\\u064b\\u0627 \\u0628\\u0627\\u0644\\u0638\\u0628\\u0637\",\"de\":\":attribute muss :size Zeichen lang sein.\",\"en\":\"The :attribute must be :size characters.\",\"es\":\":attribute debe contener :size caracteres.\",\"fr\":\"Le texte de :attribute doit contenir :size caract\\u00e8res.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (73, 'validation', 'size.array',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u062d\\u062a\\u0648\\u064a :attribute \\u0639\\u0644\\u0649 :size \\u0639\\u0646\\u0635\\u0631\\u064d\\/\\u0639\\u0646\\u0627\\u0635\\u0631 \\u0628\\u0627\\u0644\\u0638\\u0628\\u0637\",\"de\":\":attribute muss genau :size Elemente haben.\",\"en\":\"The :attribute must contain :size items.\",\"es\":\":attribute debe contener :size elementos.\",\"fr\":\"Le tableau :attribute doit contenir :size \\u00e9l\\u00e9ments.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (74, 'validation', 'string',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 :attribute \\u0646\\u0635\\u0622.\",\"de\":\":attribute muss ein String sein.\",\"en\":\"The :attribute must be a string.\",\"es\":\"El campo :attribute debe ser una cadena de caracteres.\",\"fr\":\"Le champ :attribute doit \\u00eatre une cha\\u00eene de caract\\u00e8res.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (75, 'validation', 'timezone',
        '{\"ar\":\"\\u064a\\u062c\\u0628 \\u0623\\u0646 \\u064a\\u0643\\u0648\\u0646 :attribute \\u0646\\u0637\\u0627\\u0642\\u064b\\u0627 \\u0632\\u0645\\u0646\\u064a\\u064b\\u0627 \\u0635\\u062d\\u064a\\u062d\\u064b\\u0627\",\"de\":\":attribute muss eine g\\u00fcltige Zeitzone sein.\",\"en\":\"The :attribute must be a valid zone.\",\"es\":\"El :attribute debe ser una zona v\\u00e1lida.\",\"fr\":\"Le champ :attribute doit \\u00eatre un fuseau horaire valide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (76, 'validation', 'unique',
        '{\"ar\":\"\\u0642\\u064a\\u0645\\u0629 :attribute \\u0645\\u064f\\u0633\\u062a\\u062e\\u062f\\u0645\\u0629 \\u0645\\u0646 \\u0642\\u0628\\u0644\",\"de\":\":attribute ist schon vergeben.\",\"en\":\"The :attribute has already been taken.\",\"es\":\":attribute ya ha sido registrado.\",\"fr\":\"La valeur du champ :attribute est d\\u00e9j\\u00e0 utilis\\u00e9e.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (77, 'validation', 'uploaded',
        '{\"ar\":\"\\u0641\\u0634\\u0644 \\u0641\\u064a \\u062a\\u062d\\u0645\\u064a\\u0644 \\u0627\\u0644\\u0640 :attribute\",\"de\":\"Der :attribute konnte nicht hochgeladen werden.\",\"en\":\"The :attribute failed to upload.\",\"es\":\"Subir :attribute ha fallado.\",\"fr\":\"Le fichier du champ :attribute n\'a pu \\u00eatre t\\u00e9l\\u00e9vers\\u00e9.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (78, 'validation', 'url',
        '{\"ar\":\"\\u0635\\u064a\\u063a\\u0629 \\u0627\\u0644\\u0631\\u0627\\u0628\\u0637 :attribute \\u063a\\u064a\\u0631 \\u0635\\u062d\\u064a\\u062d\\u0629\",\"de\":\"Das Format von :attribute ist ung\\u00fcltig.\",\"en\":\"The :attribute format is invalid.\",\"es\":\"El formato :attribute es inv\\u00e1lido.\",\"fr\":\"Le format de l\'URL de :attribute n\'est pas valide.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (79, 'validation', 'recaptcha',
        '{\"ar\":\"Please ensure that you are a human!\",\"en\":\"Please ensure that you are a human!\",\"fr\":\"Please ensure that you are a human!\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (80, 'validation', 'custom.attribute-name.rule-name',
        '{\"ar\":\"custom-message\",\"de\":\"custom-message\",\"en\":\"custom-message\",\"fr\":\"custom-message\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (81, 'validation', 'custom.*.label.required',
        '{\"ar\":\"\\u0627\\u0644\\u062d\\u0642\\u0644 :attribute \\u0645\\u0637\\u0644\\u0648\\u0628\",\"en\":\"The :attribute field is required.\",\"fr\":\"Le champ :attribute est requis.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (82, 'validation', 'attributes.name',
        '{\"ar\":\"\\u0627\\u0644\\u0627\\u0633\\u0645\",\"de\":\"Name\",\"en\":\"Name\",\"es\":\"nombre\",\"fr\":\"nom\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (83, 'validation', 'attributes.username',
        '{\"ar\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0645\\u064f\\u0633\\u062a\\u062e\\u062f\\u0645\",\"de\":\"Benutzername\",\"es\":\"usuario\",\"fr\":\"nom d\'utilisateur\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (84, 'validation', 'attributes.email',
        '{\"ar\":\"\\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0627\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\",\"de\":\"E-Mail-Adresse\",\"en\":\"Email\",\"es\":\"correo electr\\u00f3nico\",\"fr\":\"adresse courriel\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (85, 'validation', 'attributes.first_name',
        '{\"ar\":\"\\u0627\\u0644\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0623\\u0648\\u0644\",\"de\":\"Vorname\",\"es\":\"nombre\",\"fr\":\"pr\\u00e9nom\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (86, 'validation', 'attributes.last_name',
        '{\"ar\":\"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0639\\u0627\\u0626\\u0644\\u0629\",\"de\":\"Nachname\",\"es\":\"apellido\",\"fr\":\"nom\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (87, 'validation', 'attributes.password',
        '{\"ar\":\"\\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0633\\u0631\",\"de\":\"Passwort\",\"es\":\"contrase\\u00f1a\",\"fr\":\"mot de passe\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (88, 'validation', 'attributes.password_confirmation',
        '{\"ar\":\"\\u062a\\u0623\\u0643\\u064a\\u062f \\u0643\\u0644\\u0645\\u0629 \\u0627\\u0644\\u0633\\u0631\",\"de\":\"Passwordbest\\u00e4tigung\",\"es\":\"confirmaci\\u00f3n de la contrase\\u00f1a\",\"fr\":\"confirmation du mot de passe\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (89, 'validation', 'attributes.city',
        '{\"ar\":\"\\u0627\\u0644\\u0645\\u062f\\u064a\\u0646\\u0629\",\"de\":\"Stadt\",\"es\":\"ciudad\",\"fr\":\"ville\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (90, 'validation', 'attributes.country',
        '{\"ar\":\"\\u0627\\u0644\\u062f\\u0648\\u0644\\u0629\",\"de\":\"Land\",\"es\":\"pa\\u00eds\",\"fr\":\"pays\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (91, 'validation', 'attributes.address',
        '{\"ar\":\"\\u0639\\u0646\\u0648\\u0627\\u0646 \\u0627\\u0644\\u0633\\u0643\\u0646\",\"de\":\"Adresse\",\"es\":\"direcci\\u00f3n\",\"fr\":\"adresse\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (92, 'validation', 'attributes.phone',
        '{\"ar\":\"\\u0627\\u0644\\u0647\\u0627\\u062a\\u0641\",\"de\":\"Telefonnummer\",\"en\":\"Phone\",\"es\":\"tel\\u00e9fono\",\"fr\":\"t\\u00e9l\\u00e9phone\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (93, 'validation', 'attributes.mobile',
        '{\"ar\":\"\\u0627\\u0644\\u062c\\u0648\\u0627\\u0644\",\"de\":\"Handynummer\",\"es\":\"m\\u00f3vil\",\"fr\":\"portable\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (94, 'validation', 'attributes.age',
        '{\"ar\":\"\\u0627\\u0644\\u0639\\u0645\\u0631\",\"de\":\"Alter\",\"es\":\"edad\",\"fr\":\"\\u00e2ge\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (95, 'validation', 'attributes.sex',
        '{\"ar\":\"\\u0627\\u0644\\u062c\\u0646\\u0633\",\"de\":\"Geschlecht\",\"es\":\"sexo\",\"fr\":\"sexe\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (96, 'validation', 'attributes.gender',
        '{\"ar\":\"\\u0627\\u0644\\u0646\\u0648\\u0639\",\"de\":\"Geschlecht\",\"es\":\"g\\u00e9nero\",\"fr\":\"genre\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (97, 'validation', 'attributes.day',
        '{\"ar\":\"\\u0627\\u0644\\u064a\\u0648\\u0645\",\"de\":\"Tag\",\"es\":\"d\\u00eda\",\"fr\":\"jour\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (98, 'validation', 'attributes.month',
        '{\"ar\":\"\\u0627\\u0644\\u0634\\u0647\\u0631\",\"de\":\"Monat\",\"es\":\"mes\",\"fr\":\"mois\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (99, 'validation', 'attributes.year',
        '{\"ar\":\"\\u0627\\u0644\\u0633\\u0646\\u0629\",\"de\":\"Jahr\",\"es\":\"a\\u00f1o\",\"fr\":\"ann\\u00e9e\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (100, 'validation', 'attributes.hour',
        '{\"ar\":\"\\u0633\\u0627\\u0639\\u0629\",\"de\":\"Stunde\",\"es\":\"hora\",\"fr\":\"heure\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (101, 'validation', 'attributes.minute',
        '{\"ar\":\"\\u062f\\u0642\\u064a\\u0642\\u0629\",\"de\":\"Minute\",\"es\":\"minuto\",\"fr\":\"minute\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (102, 'validation', 'attributes.second',
        '{\"ar\":\"\\u062b\\u0627\\u0646\\u064a\\u0629\",\"de\":\"Sekunde\",\"es\":\"segundo\",\"fr\":\"seconde\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (103, 'validation', 'attributes.title',
        '{\"ar\":\"\\u0627\\u0644\\u0639\\u0646\\u0648\\u0627\\u0646\",\"de\":\"Titel\",\"es\":\"t\\u00edtulo\",\"fr\":\"titre\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (104, 'validation', 'attributes.content',
        '{\"ar\":\"\\u0627\\u0644\\u0645\\u064f\\u062d\\u062a\\u0648\\u0649\",\"de\":\"Inhalt\",\"es\":\"contenido\",\"fr\":\"contenu\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (105, 'validation', 'attributes.description',
        '{\"ar\":\"\\u0627\\u0644\\u0648\\u0635\\u0641\",\"de\":\"Beschreibung\",\"es\":\"descripci\\u00f3n\",\"fr\":\"description\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (106, 'validation', 'attributes.excerpt',
        '{\"ar\":\"\\u0627\\u0644\\u0645\\u064f\\u0644\\u062e\\u0635\",\"de\":\"Auszug\",\"es\":\"extracto\",\"fr\":\"extrait\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (107, 'validation', 'attributes.date',
        '{\"ar\":\"\\u0627\\u0644\\u062a\\u0627\\u0631\\u064a\\u062e\",\"de\":\"Datum\",\"es\":\"fecha\",\"fr\":\"date\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (108, 'validation', 'attributes.time',
        '{\"ar\":\"\\u0627\\u0644\\u0648\\u0642\\u062a\",\"de\":\"Uhrzeit\",\"es\":\"hora\",\"fr\":\"heure\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (109, 'validation', 'attributes.available',
        '{\"ar\":\"\\u0645\\u064f\\u062a\\u0627\\u062d\",\"de\":\"verf\\u00fcgbar\",\"fr\":\"disponible\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (110, 'validation', 'attributes.size',
        '{\"ar\":\"\\u0627\\u0644\\u062d\\u062c\\u0645\",\"de\":\"Gr\\u00f6\\u00dfe\",\"fr\":\"taille\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (111, 'validation', 'attributes.en.label',
        '{\"ar\":\"\\u0627\\u0644\\u062a\\u0633\\u0645\\u064a\\u0629 \\u0627\\u0644\\u0625\\u0646\\u062c\\u0644\\u064a\\u0632\\u064a\\u0629\",\"en\":\"English label\",\"fr\":\"Label anglais\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (112, 'validation', 'attributes.ar.label',
        '{\"ar\":\"\\u0627\\u0644\\u062a\\u0633\\u0645\\u064a\\u0629 \\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629\",\"en\":\"Arab label\",\"fr\":\"Label arabe\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (113, 'validation', 'attributes.fr.label',
        '{\"ar\":\"\\u0627\\u0644\\u062a\\u0633\\u0645\\u064a\\u0629 \\u0627\\u0644\\u0641\\u0631\\u0646\\u0633\\u064a\\u0629\",\"en\":\"French label\",\"fr\":\"Label fran\\u00e7ais\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (114, 'validation', 'date_equals', '{\"en\":\"The :attribute must be a date equal to :date.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (115, 'validation', 'ends_with', '{\"en\":\"The :attribute must end with one of the following: :values\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (116, 'validation', 'gt.numeric', '{\"en\":\"The :attribute must be greater than :value.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (117, 'validation', 'gt.file', '{\"en\":\"The :attribute must be greater than :value kilobytes.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (118, 'validation', 'gt.string', '{\"en\":\"The :attribute must be greater than :value characters.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (119, 'validation', 'gt.array', '{\"en\":\"The :attribute must have more than :value items.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (120, 'validation', 'gte.numeric', '{\"en\":\"The :attribute must be greater than or equal :value.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (121, 'validation', 'gte.file', '{\"en\":\"The :attribute must be greater than or equal :value kilobytes.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (122, 'validation', 'gte.string', '{\"en\":\"The :attribute must be greater than or equal :value characters.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (123, 'validation', 'gte.array', '{\"en\":\"The :attribute must have :value items or more.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (124, 'validation', 'lt.numeric', '{\"en\":\"The :attribute must be less than :value.\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (125, 'validation', 'lt.file', '{\"en\":\"The :attribute must be less than :value kilobytes.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (126, 'validation', 'lt.string', '{\"en\":\"The :attribute must be less than :value characters.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (127, 'validation', 'lt.array', '{\"en\":\"The :attribute must have less than :value items.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (128, 'validation', 'lte.numeric', '{\"en\":\"The :attribute must be less than or equal :value.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (129, 'validation', 'lte.file', '{\"en\":\"The :attribute must be less than or equal :value kilobytes.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (130, 'validation', 'lte.string', '{\"en\":\"The :attribute must be less than or equal :value characters.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (131, 'validation', 'lte.array', '{\"en\":\"The :attribute must not have more than :value items.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (132, 'validation', 'not_regex', '{\"en\":\"The :attribute format is invalid.\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (133, 'validation', 'starts_with', '{\"en\":\"The :attribute must start with one of the following: :values\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (134, 'validation', 'uuid', '{\"en\":\"The :attribute must be a valid UUID.\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (135, 'validation', 'current_password', '{\"en\":\"The :attribute is wrong.\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (136, 'validation', 'attributes.role_id', '{\"en\":\"Role\"}', '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (137, 'validation', 'attributes.message', '{\"en\":\"Message\",\"es\":\"mensaje\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (138, 'validation', 'custom.password.min',
        '{\"es\":\"La :attribute debe contener m\\u00e1s de :min caracteres\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (139, 'validation', 'custom.email.unique', '{\"es\":\"El :attribute ya ha sido registrado.\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (140, 'validation', 'attributes.body', '{\"es\":\"contenido\"}', '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (141, 'validation', 'attributes.subject', '{\"es\":\"asunto\"}', '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (142, 'breadcrumbs', 'back.admin', '{\"en\":\"Dashboard\",\"fr\":\"Dashboard\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (143, 'breadcrumbs', 'back.menus.index', '{\"en\":\"Menus management\",\"fr\":\"Menus management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (144, 'breadcrumbs', 'back.menus.create', '{\"en\":\"Create menu\",\"fr\":\"Create menu\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (145, 'breadcrumbs', 'back.menus.edit', '{\"en\":\"Edit menu\",\"fr\":\"Edit menu\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (146, 'breadcrumbs', 'back.front_home.index',
        '{\"en\":\"Accueil Widgets Management\",\"fr\":\"Accueil Widgets Management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (147, 'breadcrumbs', 'back.front_home.edit', '{\"en\":\"Edit accueil widget\",\"fr\":\"Edit accueil widget\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (148, 'breadcrumbs', 'back.front_home.show', '{\"en\":\"Accueil Widget\",\"fr\":\"Accueil Widget\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (149, 'breadcrumbs', 'back.governorates.index',
        '{\"en\":\"Governorates management\",\"fr\":\"Governorates management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (150, 'breadcrumbs', 'back.governorates.create', '{\"en\":\"Create governorate\",\"fr\":\"Create governorate\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (151, 'breadcrumbs', 'back.governorates.edit', '{\"en\":\"Edit governorate\",\"fr\":\"Edit governorate\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (152, 'breadcrumbs', 'back.countries.index', '{\"en\":\"Country management\",\"fr\":\"Country management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (153, 'breadcrumbs', 'back.countries.create', '{\"en\":\"Create country\",\"fr\":\"Create country\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (154, 'breadcrumbs', 'back.countries.edit', '{\"en\":\"Edit country\",\"fr\":\"Edit country\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (155, 'breadcrumbs', 'back.partners.index', '{\"en\":\"Partner management\",\"fr\":\"Partner management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (156, 'breadcrumbs', 'back.partners.create', '{\"en\":\"Create partner\",\"fr\":\"Create partner\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (157, 'breadcrumbs', 'back.partners.edit', '{\"en\":\"Edit partner\",\"fr\":\"Edit partner\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (158, 'breadcrumbs', 'back.partners.show', '{\"en\":\"Partner\",\"fr\":\"Partner\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (159, 'breadcrumbs', 'back.partner_categories.index',
        '{\"en\":\"Partner categories management\",\"fr\":\"Partner categories management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (160, 'breadcrumbs', 'back.partner_categories.create',
        '{\"en\":\"Create partner categories\",\"fr\":\"Create partner categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (161, 'breadcrumbs', 'back.partner_categories.edit',
        '{\"en\":\"Edit partner categories\",\"fr\":\"Edit partner categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (162, 'breadcrumbs', 'back.partner_categories.show', '{\"en\":\"Partner category\",\"fr\":\"Partner category\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (163, 'breadcrumbs', 'back.testimonials.index',
        '{\"en\":\"Testimonial management\",\"fr\":\"Testimonial management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (164, 'breadcrumbs', 'back.testimonials.create', '{\"en\":\"Create Testimonial\",\"fr\":\"Create Testimonial\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (165, 'breadcrumbs', 'back.testimonials.edit', '{\"en\":\"Edit Testimonial\",\"fr\":\"Edit Testimonial\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (166, 'breadcrumbs', 'back.testimonials.show', '{\"en\":\"Testimonial\",\"fr\":\"Testimonial\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (167, 'breadcrumbs', 'back.testimonial_categories.index',
        '{\"en\":\"Testimonial categories management\",\"fr\":\"Testimonial categories management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (168, 'breadcrumbs', 'back.testimonial_categories.create',
        '{\"en\":\"Create testimonial categories\",\"fr\":\"Create testimonial categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (169, 'breadcrumbs', 'back.testimonial_categories.edit',
        '{\"en\":\"Edit testimonial categories\",\"fr\":\"Edit testimonial categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (170, 'breadcrumbs', 'back.testimonial_categories.show',
        '{\"en\":\"Testimonial category\",\"fr\":\"Testimonial category\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (171, 'breadcrumbs', 'back.sitemaps.index', '{\"en\":\"Sitemaps management\",\"fr\":\"Sitemaps management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (172, 'breadcrumbs', 'back.sitemaps.create', '{\"en\":\"Create sitemaps\",\"fr\":\"Create sitemaps\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (173, 'breadcrumbs', 'back.sitemaps.edit', '{\"en\":\"Edit sitemaps\",\"fr\":\"Edit sitemaps\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (174, 'breadcrumbs', 'back.sitemaps.show', '{\"en\":\"Sitemaps\",\"fr\":\"Sitemaps\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (175, 'breadcrumbs', 'back.contact_messages.index', '{\"en\":\"Contact Messages\",\"fr\":\"Contact Messages\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (176, 'breadcrumbs', 'back.contact_recipients.index',
        '{\"en\":\"Contact recipient management\",\"fr\":\"Contact recipient management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (177, 'breadcrumbs', 'back.contact_recipients.create',
        '{\"en\":\"Create contact recipient\",\"fr\":\"Create contact recipient\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (178, 'breadcrumbs', 'back.contact_recipients.show',
        '{\"en\":\"Contact recipient\",\"fr\":\"Contact recipient\"}', '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (179, 'breadcrumbs', 'back.contact_recipients.edit',
        '{\"en\":\"Edit contact recipient\",\"fr\":\"Edit contact recipient\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (180, 'breadcrumbs', 'back.faq_categories.index',
        '{\"en\":\"FAQ categories management\",\"fr\":\"FAQ categories management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (181, 'breadcrumbs', 'back.faq_categories.create',
        '{\"en\":\"Create FAQ categories\",\"fr\":\"Create FAQ categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (182, 'breadcrumbs', 'back.faq_categories.edit',
        '{\"en\":\"Edit FAQ categories\",\"fr\":\"Edit FAQ categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (183, 'breadcrumbs', 'back.faq_categories.show', '{\"en\":\"FAQ category\",\"fr\":\"FAQ category\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (184, 'breadcrumbs', 'back.faq_items.index', '{\"en\":\"FAQ management\",\"fr\":\"FAQ management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (185, 'breadcrumbs', 'back.faq_items.create', '{\"en\":\"Create FAQ\",\"fr\":\"Create FAQ\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (186, 'breadcrumbs', 'back.faq_items.edit', '{\"en\":\"Edit FAQ\",\"fr\":\"Edit FAQ\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (187, 'breadcrumbs', 'back.faq_items.show', '{\"en\":\"FAQ\",\"fr\":\"FAQ\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (188, 'breadcrumbs', 'back.files.index', '{\"en\":\"File management\",\"fr\":\"File management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (189, 'breadcrumbs', 'back.files.create', '{\"en\":\"Create file\",\"fr\":\"Create file\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (190, 'breadcrumbs', 'back.files.edit', '{\"en\":\"Edit file\",\"fr\":\"Edit file\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (191, 'breadcrumbs', 'back.files.show', '{\"en\":\"File\",\"fr\":\"File\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (192, 'breadcrumbs', 'back.file_categories.index',
        '{\"en\":\"File categories management\",\"fr\":\"File categories management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (193, 'breadcrumbs', 'back.file_categories.create',
        '{\"en\":\"Create file categories\",\"fr\":\"Create file categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (194, 'breadcrumbs', 'back.file_categories.edit',
        '{\"en\":\"Edit file categories\",\"fr\":\"Edit file categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (195, 'breadcrumbs', 'back.file_categories.show', '{\"en\":\"File category\",\"fr\":\"File category\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (196, 'breadcrumbs', 'back.procedures.index',
        '{\"en\":\"Procedure management\",\"fr\":\"Procedure management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (197, 'breadcrumbs', 'back.procedures.create', '{\"en\":\"Create procedure\",\"fr\":\"Create procedure\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (198, 'breadcrumbs', 'back.procedures.edit', '{\"en\":\"Edit procedure\",\"fr\":\"Edit procedure\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (199, 'breadcrumbs', 'back.procedures.show', '{\"en\":\"Procedure\",\"fr\":\"Procedure\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (200, 'breadcrumbs', 'back.procedure_categories.index',
        '{\"en\":\"Procedure categories management\",\"fr\":\"Procedure categories management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (201, 'breadcrumbs', 'back.procedure_categories.create',
        '{\"en\":\"Create procedure categories\",\"fr\":\"Create procedure categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (202, 'breadcrumbs', 'back.procedure_categories.edit',
        '{\"en\":\"Edit procedure categories\",\"fr\":\"Edit procedure categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (203, 'breadcrumbs', 'back.procedure_categories.show',
        '{\"en\":\"Procedure category\",\"fr\":\"Procedure category\"}', '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (204, 'breadcrumbs', 'back.plans.index', '{\"en\":\"Plan management\",\"fr\":\"Plan management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (205, 'breadcrumbs', 'back.plans.create', '{\"en\":\"Create plan\",\"fr\":\"Create plan\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (206, 'breadcrumbs', 'back.plans.edit', '{\"en\":\"Edit plan\",\"fr\":\"Edit plan\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (207, 'breadcrumbs', 'back.plans.show', '{\"en\":\"Plan\",\"fr\":\"Plan\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (208, 'breadcrumbs', 'back.plan_categories.index',
        '{\"en\":\"Plan categories management\",\"fr\":\"Plan categories management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (209, 'breadcrumbs', 'back.plan_categories.create',
        '{\"en\":\"Create plan categories\",\"fr\":\"Create plan categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (210, 'breadcrumbs', 'back.plan_categories.edit',
        '{\"en\":\"Edit plan categories\",\"fr\":\"Edit plan categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (211, 'breadcrumbs', 'back.plan_categories.show', '{\"en\":\"plan category\",\"fr\":\"plan category\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (212, 'breadcrumbs', 'back.schemas.index', '{\"en\":\"schemas management\",\"fr\":\"schemas management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (213, 'breadcrumbs', 'back.schemas.create', '{\"en\":\"Create schemas\",\"fr\":\"Create schemas\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (214, 'breadcrumbs', 'back.schemas.edit', '{\"en\":\"Edit schemas\",\"fr\":\"Edit schemas\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (215, 'breadcrumbs', 'back.schemas.show', '{\"en\":\"Schemas\",\"fr\":\"Schemas\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (216, 'breadcrumbs', 'back.event_categories.index',
        '{\"en\":\"Event categories management\",\"fr\":\"Event categories management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (217, 'breadcrumbs', 'back.event_categories.create',
        '{\"en\":\"Create event categories\",\"fr\":\"Create event categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (218, 'breadcrumbs', 'back.event_categories.edit',
        '{\"en\":\"Edit event category\",\"fr\":\"Edit event category\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (219, 'breadcrumbs', 'back.event_categories.show', '{\"en\":\"Event category\",\"fr\":\"Event category\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (220, 'breadcrumbs', 'back.events.index', '{\"en\":\"Event management\",\"fr\":\"Event management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (221, 'breadcrumbs', 'back.events.create', '{\"en\":\"Create event\",\"fr\":\"Create event\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (222, 'breadcrumbs', 'back.events.edit', '{\"en\":\"Edit event\",\"fr\":\"Edit event\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (223, 'breadcrumbs', 'back.events.show', '{\"en\":\"Event\",\"fr\":\"Event\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (224, 'breadcrumbs', 'back.gestionnaire_aspim.index',
        '{\"en\":\"Gestionnaire Aspims\",\"fr\":\"Gestionnaire Aspims\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (225, 'breadcrumbs', 'back.gestionnaire_aspim.create',
        '{\"en\":\"Create gestionnaire\",\"fr\":\"Create gestionnaire\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (226, 'breadcrumbs', 'back.gestionnaire_aspim.edit',
        '{\"en\":\"Edit gestionnaire\",\"fr\":\"Edit gestionnaire\"}', '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (227, 'breadcrumbs', 'back.gestionnaire_aspim.show',
        '{\"en\":\"Gestionnaire Aspim\",\"fr\":\"Gestionnaire Aspim\"}', '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (228, 'breadcrumbs', 'back.training_categories.index',
        '{\"en\":\"Training categories management\",\"fr\":\"Training categories management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (229, 'breadcrumbs', 'back.training_categories.create',
        '{\"en\":\"Create training categories\",\"fr\":\"Create training categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (230, 'breadcrumbs', 'back.training_categories.edit',
        '{\"en\":\"Edit training category\",\"fr\":\"Edit training category\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (231, 'breadcrumbs', 'back.training_categories.show',
        '{\"en\":\"Training category\",\"fr\":\"Training category\"}', '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (232, 'breadcrumbs', 'back.trainings.index', '{\"en\":\"Training management\",\"fr\":\"Training management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (233, 'breadcrumbs', 'back.trainings.create', '{\"en\":\"Create training\",\"fr\":\"Create training\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (234, 'breadcrumbs', 'back.trainings.edit', '{\"en\":\"Edit training\",\"fr\":\"Edit training\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (235, 'breadcrumbs', 'back.trainings.show', '{\"en\":\"Training\",\"fr\":\"Training\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (236, 'breadcrumbs', 'back.news_categories.index',
        '{\"en\":\"News categories management\",\"fr\":\"News categories management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (237, 'breadcrumbs', 'back.news_categories.create',
        '{\"en\":\"Create news categories\",\"fr\":\"Create news categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (238, 'breadcrumbs', 'back.news_categories.edit',
        '{\"en\":\"Edit news category\",\"fr\":\"Edit news category\"}', '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (239, 'breadcrumbs', 'back.news_categories.show', '{\"en\":\"News category\",\"fr\":\"News category\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (240, 'breadcrumbs', 'back.news.index', '{\"en\":\"News management\",\"fr\":\"News management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (241, 'breadcrumbs', 'back.news.create', '{\"en\":\"Create news\",\"fr\":\"Create news\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (242, 'breadcrumbs', 'back.news.edit', '{\"en\":\"Edit news\",\"fr\":\"Edit news\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (243, 'breadcrumbs', 'back.news.show', '{\"en\":\"News\",\"fr\":\"News\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (244, 'breadcrumbs', 'back.widgets.index', '{\"en\":\"Widgets management\",\"fr\":\"Widgets management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (245, 'breadcrumbs', 'back.widgets.create', '{\"en\":\"Create widgets\",\"fr\":\"Create widgets\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (246, 'breadcrumbs', 'back.widgets.edit', '{\"en\":\"Edit widgets\",\"fr\":\"Edit widgets\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (247, 'breadcrumbs', 'back.widgets.show', '{\"en\":\"Widgets\",\"fr\":\"Widgets\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (248, 'breadcrumbs', 'back.banners.index', '{\"en\":\"Banners management\",\"fr\":\"Banners management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (249, 'breadcrumbs', 'back.banners.create', '{\"en\":\"Create banners\",\"fr\":\"Create banners\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (250, 'breadcrumbs', 'back.banners.edit', '{\"en\":\"Edit banners\",\"fr\":\"Edit banners\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (251, 'breadcrumbs', 'back.banners.show', '{\"en\":\"Banners\",\"fr\":\"Banners\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (252, 'breadcrumbs', 'back.useful_links.index',
        '{\"en\":\"Useful Links management\",\"fr\":\"Useful Links management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (253, 'breadcrumbs', 'back.useful_links.create', '{\"en\":\"Create useful link\",\"fr\":\"Create useful link\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (254, 'breadcrumbs', 'back.useful_links.edit', '{\"en\":\"Edit useful link\",\"fr\":\"Edit useful link\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (255, 'breadcrumbs', 'back.useful_links.show', '{\"en\":\"Useful Link\",\"fr\":\"Useful Link\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (256, 'breadcrumbs', 'back.useful_link_categories.index',
        '{\"en\":\"Useful Link categories management\",\"fr\":\"Useful Link categories management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (257, 'breadcrumbs', 'back.useful_link_categories.create',
        '{\"en\":\"Create useful Link categories\",\"fr\":\"Create useful Link categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (258, 'breadcrumbs', 'back.useful_link_categories.edit',
        '{\"en\":\"Edit useful Link categories\",\"fr\":\"Edit useful Link categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (259, 'breadcrumbs', 'back.useful_link_categories.show',
        '{\"en\":\"Useful Link category\",\"fr\":\"Useful Link category\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (260, 'breadcrumbs', 'back.media_album_categories.index',
        '{\"en\":\"Media album categories management\",\"fr\":\"Media album categories management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (261, 'breadcrumbs', 'back.media_album_categories.create',
        '{\"en\":\"Create media album categories\",\"fr\":\"Create media album categories\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (262, 'breadcrumbs', 'back.media_album_categories.edit',
        '{\"en\":\"Edit media album category\",\"fr\":\"Edit media album category\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (263, 'breadcrumbs', 'back.media_album_categories.show',
        '{\"en\":\"Media album category\",\"fr\":\"Media album category\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (264, 'breadcrumbs', 'back.media_albums.index',
        '{\"en\":\"Media albums management\",\"fr\":\"Media albums management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (265, 'breadcrumbs', 'back.media_albums.create',
        '{\"en\":\"Create media albums\",\"fr\":\"Create media albums\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (266, 'breadcrumbs', 'back.media_albums.edit', '{\"en\":\"Edit media album\",\"fr\":\"Edit media album\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (267, 'breadcrumbs', 'back.media_albums.show', '{\"en\":\"Media album\",\"fr\":\"Media album\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (268, 'breadcrumbs', 'back.media_files.index',
        '{\"en\":\"Media file management\",\"fr\":\"Media file management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (269, 'breadcrumbs', 'back.media_files.create', '{\"en\":\"Create media file\",\"fr\":\"Create media file\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (270, 'breadcrumbs', 'back.media_files.edit', '{\"en\":\"Edit media file\",\"fr\":\"Edit media file\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (271, 'breadcrumbs', 'back.media_files.show', '{\"en\":\"Media file\",\"fr\":\"Media file\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (272, 'breadcrumbs', 'back.outil_gestion_categories.index',
        '{\"en\":\"Outil de gestion categories management\",\"fr\":\"Outil de gestion categories management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (273, 'breadcrumbs', 'back.outil_gestion_categories.create',
        '{\"en\":\"Create outil de gestion categories\",\"fr\":\"Create outil de gestion categories\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (274, 'breadcrumbs', 'back.outil_gestion_categories.edit',
        '{\"en\":\"Edit outil de gestion category\",\"fr\":\"Edit outil de gestion category\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (275, 'breadcrumbs', 'back.outil_gestion_categories.show',
        '{\"en\":\"Outil de gestion category\",\"fr\":\"Outil de gestion category\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (276, 'breadcrumbs', 'back.outil_gestions.index',
        '{\"en\":\"Outil de gestion management\",\"fr\":\"Outil de gestion management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (277, 'breadcrumbs', 'back.outil_gestions.create',
        '{\"en\":\"Create outil de gestion\",\"fr\":\"Create outil de gestion\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (278, 'breadcrumbs', 'back.outil_gestions.edit',
        '{\"en\":\"Edit outil de gestion\",\"fr\":\"Edit outil de gestion\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (279, 'breadcrumbs', 'back.outil_gestions.show', '{\"en\":\"Outil de gestion\",\"fr\":\"Outil de gestion\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (280, 'breadcrumbs', 'back.aspim_categories.index',
        '{\"en\":\"Aspim Category management\",\"fr\":\"Aspim Category management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (281, 'breadcrumbs', 'back.aspim_categories.create',
        '{\"en\":\"Create aspim Category\",\"fr\":\"Create aspim Category\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (282, 'breadcrumbs', 'back.aspim_categories.edit',
        '{\"en\":\"Edit aspim Category\",\"fr\":\"Edit aspim Category\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (283, 'breadcrumbs', 'back.aspim_categories.show', '{\"en\":\"Aspim Category\",\"fr\":\"Aspim Category\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (284, 'breadcrumbs', 'back.aspims.index', '{\"en\":\"Aspims management\",\"fr\":\"Aspims management\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (285, 'breadcrumbs', 'back.aspims.create', '{\"en\":\"Create aspims\",\"fr\":\"Create aspims\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (286, 'breadcrumbs', 'back.aspims.edit', '{\"en\":\"Edit aspims\",\"fr\":\"Edit aspims\"}',
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (287, 'breadcrumbs', 'back.aspims.show', '{\"en\":\"Aspims\",\"fr\":\"Aspims\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (288, 'breadcrumbs', 'back.gestion_forums.index', '{\"en\":\"Gestion forum management\"}', '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (289, 'breadcrumbs', 'back.gestion_forums.create', '{\"en\":\"Create gestion forums\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (290, 'breadcrumbs', 'back.gestion_forums.edit', '{\"en\":\"Edit gestion forums\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (291, 'breadcrumbs', 'back.gestion_forums.show', '{\"en\":\"Gestion forums\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (292, 'breadcrumbs', 'back.category_forums.index', '{\"en\":\"Category forum management\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (293, 'breadcrumbs', 'back.category_forums.create', '{\"en\":\"Create category forums\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (294, 'breadcrumbs', 'back.category_forums.edit', '{\"en\":\"Edit category forums\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (295, 'breadcrumbs', 'back.category_forums.show', '{\"en\":\"Category forums\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (296, 'breadcrumbs', 'back.programs.index', '{\"en\":\"Programs management\",\"fr\":\"Programs management\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (297, 'breadcrumbs', 'back.programs.create', '{\"en\":\"Create program\",\"fr\":\"Create program\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (298, 'breadcrumbs', 'back.programs.edit', '{\"en\":\"Edit program\",\"fr\":\"Edit program\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (299, 'breadcrumbs', 'back.programs.show', '{\"en\":\"Program\",\"fr\":\"Program\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (300, 'breadcrumbs', 'back.map_layers.index',
        '{\"en\":\"Map layers management\",\"fr\":\"Map layers management\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (301, 'breadcrumbs', 'back.map_layers.create', '{\"en\":\"Create map layer\",\"fr\":\"Create map layer\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (302, 'breadcrumbs', 'back.map_layers.edit', '{\"en\":\"Edit map layer\",\"fr\":\"Edit map layer\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (303, 'breadcrumbs', 'back.map_layers.show', '{\"en\":\"Map layer\",\"fr\":\"Map layer\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (304, 'chatter', 'success.title', '{\"en\":\"Well done!\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (305, 'chatter', 'success.reason.submitted_to_post',
        '{\"en\":\"Response successfully submitted to discussion.\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (306, 'chatter', 'success.reason.updated_post', '{\"en\":\"Successfully updated the discussion.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (307, 'chatter', 'success.reason.destroy_post', '{\"en\":\"Successfully deleted the response and discussion.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (308, 'chatter', 'success.reason.destroy_from_discussion',
        '{\"en\":\"Successfully deleted the response from the discussion.\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (309, 'chatter', 'success.reason.created_discussion', '{\"en\":\"Successfully created a new discussion.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (310, 'chatter', 'info.title', '{\"en\":\"Heads Up!\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (311, 'chatter', 'warning.title', '{\"en\":\"Wuh Oh!\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (312, 'chatter', 'danger.title', '{\"en\":\"Oh Snap!\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (313, 'chatter', 'danger.reason.errors', '{\"en\":\"Please fix the following errors:\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (314, 'chatter', 'danger.reason.prevent_spam',
        '{\"en\":\"In order to prevent spam, please allow at least :minutes in between submitting content.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (315, 'chatter', 'danger.reason.trouble',
        '{\"en\":\"Sorry, there seems to have been a problem submitting your response.\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (316, 'chatter', 'danger.reason.update_post',
        '{\"en\":\"Nah ah ah... Could not update your response. Make sure you\'re not doing anything shady.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (317, 'chatter', 'danger.reason.destroy_post',
        '{\"en\":\"Nah ah ah... Could not delete the response. Make sure you\'re not doing anything shady.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (318, 'chatter', 'danger.reason.create_discussion',
        '{\"en\":\"Whoops :( There seems to be a problem creating your discussion.\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (319, 'chatter', 'danger.reason.title_required', '{\"en\":\"Please write a title\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (320, 'chatter', 'danger.reason.title_min', '{\"en\":\"The title has to have at least :min characters.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (321, 'chatter', 'danger.reason.title_max', '{\"en\":\"The title has to have no more than :max characters.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (322, 'chatter', 'danger.reason.content_required', '{\"en\":\"Please write some content\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (323, 'chatter', 'danger.reason.content_min', '{\"en\":\"The content has to have at least :min characters\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (324, 'chatter', 'danger.reason.category_required', '{\"en\":\"Please choose a category\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (325, 'chatter', 'titles.discussion', '{\"en\":\"Discussion\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (326, 'chatter', 'titles.discussions', '{\"en\":\"Discussions\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (327, 'chatter', 'headline', '{\"en\":\"Welcome to Chatter\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (328, 'chatter', 'description', '{\"en\":\"A simple forum package for your Laravel app.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (329, 'chatter', 'preheader',
        '{\"en\":\"Just wanted to let you know that someone has responded to a forum post.\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (330, 'chatter', 'greeting', '{\"en\":\"Hi there,\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (331, 'chatter', 'body',
        '{\"en\":\"Just wanted to let you know that someone has responded to a forum post at\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (332, 'chatter', 'view_discussion', '{\"en\":\"View the discussion.\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (333, 'chatter', 'farewell', '{\"en\":\"Have a great day!\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (334, 'chatter', 'unsuscribe.message',
        '{\"en\":\"If you no longer wish to be notified when someone responds to this form post be sure to uncheck the notification setting at the bottom of the page :)\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (335, 'chatter', 'unsuscribe.action', '{\"en\":\"Don\'t like these emails?\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (336, 'chatter', 'unsuscribe.link', '{\"en\":\"Unsubscribe to this discussion.\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (337, 'chatter', 'words.cancel', '{\"en\":\"Cancel\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (338, 'chatter', 'words.delete', '{\"en\":\"Delete\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (339, 'chatter', 'words.edit', '{\"en\":\"Edit\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (340, 'chatter', 'words.yes', '{\"en\":\"Yes\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (341, 'chatter', 'words.no', '{\"en\":\"No\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (342, 'chatter', 'words.minutes', '{\"en\":\"1 minute| :count minutes\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (343, 'chatter', 'discussion.new', '{\"en\":\"New discussion\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (344, 'chatter', 'discussion.all', '{\"en\":\"All discussion en\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (345, 'chatter', 'discussion.create', '{\"en\":\"Create discussion\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (346, 'chatter', 'discussion.posted_by', '{\"en\":\"Posted by\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (347, 'chatter', 'discussion.head_details', '{\"en\":\"Posted in Category\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (348, 'chatter', 'response.confirm', '{\"en\":\"Are you sure you want to delete this response?\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (349, 'chatter', 'response.yes_confirm', '{\"en\":\"Yes Delete It\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (350, 'chatter', 'response.no_confirm', '{\"en\":\"No Thanks\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (351, 'chatter', 'response.submit', '{\"en\":\"Submit response\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (352, 'chatter', 'response.update', '{\"en\":\"Update Response\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (353, 'chatter', 'editor.title', '{\"en\":\"Title of discussion\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (354, 'chatter', 'editor.select', '{\"en\":\"Select a Category\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (355, 'chatter', 'editor.tinymce_placeholder', '{\"en\":\"Type Your discussion Here...\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (356, 'chatter', 'editor.select_color_text', '{\"en\":\"Select a Color for this discussion (optional)\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (357, 'chatter', 'email.notify', '{\"en\":\"Notify me when someone replies\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (358, 'cms', 'access_denied', '{\"en\":\"Insufficient permissions\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (359, 'error_page', '403.title', '{\"en\":\"Access Denied\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (360, 'error_page', '403.message', '{\"en\":\"You don\'t have the right to access this page.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (361, 'error_page', '404.title', '{\"en\":\"Page Not Found\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (362, 'error_page', '404.message', '{\"en\":\"Sorry, the page you are looking for could not be found.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (363, 'error_page', '419.title', '{\"en\":\"Page Expired\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (364, 'error_page', '419.message',
        '{\"en\":\"The page has expired due to inactivity. <br\\/><br\\/> Please refresh and try again.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (365, 'error_page', '429.title', '{\"en\":\"Error\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (366, 'error_page', '429.message', '{\"en\":\"Too many requests.\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (367, 'error_page', '500.title', '{\"en\":\"Error\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (368, 'error_page', '500.message', '{\"en\":\"Whoops, looks like something went wrong.\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (369, 'error_page', '503.title', '{\"en\":\"Service Unavailable\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (370, 'error_page', '503.message', '{\"en\":\"Be right back.\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (371, 'http', '404.title', '{\"en\":\"Acc\\u00e8s refus\\u00e9\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (372, 'locales', 'fr', '{\"en\":\"Fran\\u00e7ais\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (373, 'locales', 'en', '{\"en\":\"English\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (374, 'locales', 'ar', '{\"en\":\"\\u0627\\u0644\\u0639\\u0631\\u0628\\u064a\\u0629\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (375, 'misc', 'contact.message_sent', '{\"en\":\"Your message has been successfully sent\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (376, 'misc', 'contact.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (377, 'misc', 'contact.phone', '{\"en\":\"Phone\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (378, 'misc', 'contact.email', '{\"en\":\"Email\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (379, 'misc', 'contact.message', '{\"en\":\"Message\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (380, 'misc', 'contact.created_at', '{\"en\":\"Sent at\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (381, 'misc', 'contact.read_at', '{\"en\":\"Read at\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (382, 'misc', 'log_out', '{\"en\":\"Logout\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (383, 'misc', 'my_profile', '{\"en\":\"My Profile\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (384, 'misc', 'actions', '{\"en\":\"Actions\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (385, 'misc', 'dashboard', '{\"en\":\"Dashboard\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (386, 'misc', 'box_title.create', '{\"en\":\"Create\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (387, 'misc', 'box_title.edit', '{\"en\":\"Edit\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (388, 'misc', 'box_title.list', '{\"en\":\"List : \"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (389, 'misc', 'box_title.details', '{\"en\":\"Details : \"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (390, 'misc', 'alert.success', '{\"en\":\"The operation proceeded successfully\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (391, 'misc', 'alert.error', '{\"en\":\"An error occured\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (392, 'misc', 'alert.confirm_deletion', '{\"en\":\"Do you really want to delete this record?\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (393, 'misc', 'button.create', '{\"en\":\"Create\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (394, 'misc', 'button.edit', '{\"en\":\"Edit\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (395, 'misc', 'button.save', '{\"en\":\"Save\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (396, 'misc', 'button.delete', '{\"en\":\"Delete\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (397, 'misc', 'button.tooltip.delete', '{\"en\":\"Delete\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (398, 'misc', 'button.tooltip.edit', '{\"en\":\"Edit\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (399, 'misc', 'cms_modules.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (400, 'misc', 'cms_modules.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (401, 'misc', 'menus.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (402, 'misc', 'menus.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (403, 'misc', 'menus.title', '{\"en\":\"Title\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (404, 'misc', 'menus.content', '{\"en\":\"Content\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (405, 'misc', 'menus.meta_title', '{\"en\":\"Meta title\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (406, 'misc', 'menus.meta_keywords', '{\"en\":\"Meta keywords\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (407, 'misc', 'menus.meta_description', '{\"en\":\"Meta description\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (408, 'misc', 'menus.link', '{\"en\":\"Link\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (409, 'misc', 'menus.class', '{\"en\":\"Class\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (410, 'misc', 'menus.icon', '{\"en\":\"Icon\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (411, 'misc', 'menus.parent_id', '{\"en\":\"Parent\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (412, 'misc', 'menus.link_target', '{\"en\":\"Link target\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (413, 'misc', 'menus.order', '{\"en\":\"Order\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (414, 'misc', 'menus.is_disabled', '{\"en\":\"Is disabled\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (415, 'misc', 'menus.content_type_id', '{\"en\":\"content type\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (416, 'misc', 'menus.menu_module_id', '{\"en\":\"Menu module\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (417, 'misc', 'menus.menu_group_id', '{\"en\":\"Menu group\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (418, 'misc', 'pages.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (419, 'misc', 'pages.content', '{\"en\":\"Content\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (420, 'misc', 'pages.meta_title', '{\"en\":\"Meta title\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (421, 'misc', 'pages.meta_description', '{\"en\":\"Meta description\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (422, 'misc', 'pages.meta_keywords', '{\"en\":\"Meta keywords\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (423, 'misc', 'pages.menu_id', '{\"en\":\"Menu\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (424, 'misc', 'menu_modules.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (425, 'misc', 'menu_modules.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (426, 'misc', 'menu_modules.label', '{\"en\":\"Label\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (427, 'misc', 'menu_modules.description', '{\"en\":\"Description\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (428, 'misc', 'menu_modules.back_route', '{\"en\":\"Back route\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (429, 'misc', 'menu_modules.front_route', '{\"en\":\"Front route\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (430, 'misc', 'menu_parents.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (431, 'misc', 'menu_parents.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (432, 'misc', 'menu_parents.description', '{\"en\":\"Description\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (433, 'misc', 'menu_groups.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (434, 'misc', 'menu_groups.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (435, 'misc', 'menu_groups.description', '{\"en\":\"Description\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (436, 'misc', 'images.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (437, 'misc', 'images.file_path', '{\"en\":\"File path\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (438, 'misc', 'images.alt', '{\"en\":\"Alt\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (439, 'misc', 'banners.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (440, 'misc', 'banners.file_path', '{\"en\":\"File path\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (441, 'misc', 'banners.is_hidden', '{\"en\":\"Is hidden\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (442, 'misc', 'banners.description', '{\"en\":\"Description\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (443, 'misc', 'banners.order', '{\"en\":\"Order\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (444, 'misc', 'banners.banner_group_id', '{\"en\":\"Banner Group Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (445, 'misc', 'content_types.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (446, 'misc', 'content_types.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (447, 'misc', 'content_types.description', '{\"en\":\"Description\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (448, 'misc', 'content_types.label', '{\"en\":\"Label\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (449, 'misc', 'banner_groups.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (450, 'misc', 'banner_groups.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (451, 'misc', 'banner_groups.description', '{\"en\":\"Description\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (452, 'misc', 'app_parameters.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (453, 'misc', 'app_parameters.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (454, 'misc', 'app_parameters.value', '{\"en\":\"Value\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (455, 'misc', 'app_parameters.menu_module_id', '{\"en\":\"Module\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (456, 'misc', 'app_parameters.description', '{\"en\":\"Description\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (457, 'misc', 'users.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (458, 'misc', 'users.name', '{\"en\":\"Nom\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (459, 'misc', 'users.email', '{\"en\":\"Email\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (460, 'misc', 'users.role', '{\"en\":\"Role\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (461, 'misc', 'organizations.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (462, 'misc', 'organizations.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (463, 'misc', 'organizations.description', '{\"en\":\"Description\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (464, 'misc', 'organizations.phone', '{\"en\":\"Phone\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (465, 'misc', 'organizations.email', '{\"en\":\"Email\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (466, 'misc', 'organizations.website', '{\"en\":\"Website\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (467, 'misc', 'organizations.address', '{\"en\":\"Address\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (468, 'misc', 'organizations.maps_lat', '{\"en\":\"Maps lat\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (469, 'misc', 'organizations.maps_lng', '{\"en\":\"Maps lng\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (470, 'misc', 'organizations.global_rating', '{\"en\":\"Global rating\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (471, 'misc', 'organizations.number_of_ratings', '{\"en\":\"Number of ratings\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (472, 'misc', 'organizations.total_visits', '{\"en\":\"Total visits\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (473, 'misc', 'organizations.image', '{\"en\":\"Image\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (474, 'misc', 'organizations.meta_title', '{\"en\":\"Meta title\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (475, 'misc', 'organizations.meta_description', '{\"en\":\"Meta description\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (476, 'misc', 'organizations.meta_keywords', '{\"en\":\"Meta keywords\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (477, 'misc', 'organizations.facebook', '{\"en\":\"Facebook\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (478, 'misc', 'organizations.instagram', '{\"en\":\"Instagram\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (479, 'misc', 'organizations.twitter', '{\"en\":\"Twitter\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (480, 'misc', 'organizations.youtube', '{\"en\":\"Youtube\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (481, 'misc', 'organizations.google_plus', '{\"en\":\"Google plus\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (482, 'misc', 'organizations.linkedin', '{\"en\":\"Linkedin\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (483, 'misc', 'organizations.city_id', '{\"en\":\"City\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (484, 'misc', 'organizations.governorate_id', '{\"en\":\"Governorate\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (485, 'misc', 'organizations.organization_category_id', '{\"en\":\"Organization Category\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (486, 'misc', 'organizations.tags', '{\"en\":\"Tags\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (487, 'misc', 'organization_categories.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (488, 'misc', 'organization_categories.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (489, 'misc', 'organization_categories.parent_id', '{\"en\":\"Parent\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (490, 'misc', 'organization_tags.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (491, 'misc', 'organization_tags.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (492, 'misc', 'governorates.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (493, 'misc', 'governorates.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (494, 'misc', 'cities.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (495, 'misc', 'cities.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (496, 'misc', 'cities.governorate_id', '{\"en\":\"Governorate\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (497, 'og', 'routes.filter', '{\"en\":\"filter\",\"fr\":\"filter\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (498, 'og', 'routes.category', '{\"en\":\"category\",\"fr\":\"category\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (499, 'og', 'actions', '{\"en\":\"Actions\",\"fr\":\"Actions\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (500, 'og', 'box_title.create', '{\"en\":\"Create\",\"fr\":\"Create\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (501, 'og', 'box_title.edit', '{\"en\":\"Edit\",\"fr\":\"Edit\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (502, 'og', 'box_title.list', '{\"en\":\"List : \",\"fr\":\"List : \"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (503, 'og', 'box_title.details', '{\"en\":\"Details : \",\"fr\":\"Details : \"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (504, 'og', 'alert.success',
        '{\"en\":\"The operation proceeded successfully\",\"fr\":\"The operation proceeded successfully\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (505, 'og', 'alert.error', '{\"en\":\"An error occured\",\"fr\":\"An error occured\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (506, 'og', 'alert.confirm_deletion',
        '{\"en\":\"Do you really want to delete this record?\",\"fr\":\"Do you really want to delete this record?\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (507, 'og', 'alert.email_exist', '{\"en\":\"Email already exists\",\"fr\":\"Email already exists\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (508, 'og', 'alert.invalid_password',
        '{\"en\":\"Current password invalid\",\"fr\":\"Current password invalid\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (509, 'og', 'alert.invalid_role',
        '{\"en\":\"The role should not be admin\",\"fr\":\"The role should not be admin\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (510, 'og', 'alert_title.congratulations', '{\"en\":\"Congratulations\",\"fr\":\"Congratulations\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (511, 'og', 'contact.email', '{\"en\":\"Email\",\"fr\":\"Email\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (512, 'og', 'contact.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (513, 'og', 'contact.phone', '{\"en\":\"Phone\",\"fr\":\"Phone\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (514, 'og', 'contact.message', '{\"en\":\"Message\",\"fr\":\"Message\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (515, 'og', 'contact.return', '{\"en\":\"Return\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (516, 'og', 'button.create', '{\"en\":\"Create\",\"fr\":\"Create\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (517, 'og', 'button.edit', '{\"en\":\"Edit\",\"fr\":\"Edit\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (518, 'og', 'button.edit_permissions', '{\"en\":\"Edit permissions\",\"fr\":\"Edit permissions\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (519, 'og', 'button.save', '{\"en\":\"Save\",\"fr\":\"Save\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (520, 'og', 'button.delete', '{\"en\":\"Delete\",\"fr\":\"Delete\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (521, 'og', 'button.cancel', '{\"en\":\"Cancel\",\"fr\":\"Cancel\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (522, 'og', 'button.tooltip.delete', '{\"en\":\"Delete\",\"fr\":\"Delete\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (523, 'og', 'button.tooltip.edit', '{\"en\":\"Edit\",\"fr\":\"Edit\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (524, 'og', 'button.tooltip.show', '{\"en\":\"Show\",\"fr\":\"Show\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (525, 'og', 'button.list', '{\"en\":\"Liste\",\"fr\":\"Liste\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (526, 'og', 'button.map', '{\"en\":\"Carte\",\"fr\":\"Carte\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (527, 'og', 'my_profile.my_profile', '{\"en\":\"My Profile\",\"fr\":\"My Profile\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (528, 'og', 'my_profile.general', '{\"en\":\"General\",\"fr\":\"General\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (529, 'og', 'my_profile.password', '{\"en\":\"Password\",\"fr\":\"Password\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (530, 'og', 'menus.content_type_id', '{\"en\":\"Type de contenu\",\"fr\":\"Type de contenu\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (531, 'og', 'menus.container.create', '{\"en\":\"Ajouter un menu\",\"fr\":\"Ajouter un menu\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (532, 'og', 'menus.container.edit', '{\"en\":\"Modifier menu\",\"fr\":\"Modifier menu\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (533, 'og', 'menus.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (534, 'og', 'menus.menu_group_id', '{\"en\":\"Menu group id\",\"fr\":\"Menu group id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (535, 'og', 'menus.module_id', '{\"en\":\"Module id\",\"fr\":\"Module id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (536, 'og', 'menus.parent_id', '{\"en\":\"Parent id\",\"fr\":\"Parent id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (537, 'og', 'menus.link_type_id', '{\"en\":\"Link type id\",\"fr\":\"Link type id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (538, 'og', 'menus.http_protocol', '{\"en\":\"Http protocol\",\"fr\":\"Http protocol\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (539, 'og', 'menus.external_link', '{\"en\":\"External link\",\"fr\":\"External link\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (540, 'og', 'menus.internal_link', '{\"en\":\"Internal link\",\"fr\":\"Internal link\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (541, 'og', 'menus.link_target', '{\"en\":\"link target\",\"fr\":\"link target\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (542, 'og', 'menus.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (543, 'og', 'menus.icon', '{\"en\":\"Icon\",\"fr\":\"Icon\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (544, 'og', 'menus.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (545, 'og', 'menus.css_class', '{\"en\":\"Css class\",\"fr\":\"Css class\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (546, 'og', 'menus.copyright',
        '{\"en\":\"\\u00a9 Mediterranean biodiversity Platform\",\"fr\":\"\\u00a9 Mediterranean biodiversity Platform\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (547, 'og', 'menus.copyright2',
        '{\"en\":\"Modified and improved by SPA\\/RAC\",\"fr\":\"Modified and improved by SPA\\/RAC\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (548, 'og', 'menus.menu_id', '{\"en\":\"Menu id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (549, 'og', 'menu_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (550, 'og', 'menu_translations.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (551, 'og', 'menu_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (552, 'og', 'menu_translations.label', '{\"en\":\"Label\",\"fr\":\"Label\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (553, 'og', 'menu_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (554, 'og', 'menu_translations.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (555, 'og', 'menu_translations.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (556, 'og', 'menu_translations.content', '{\"en\":\"Content\",\"fr\":\"Content\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (557, 'og', 'post_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (558, 'og', 'post_categories.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (559, 'og', 'post_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (560, 'og', 'post_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (561, 'og', 'post_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (562, 'og', 'post_category_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (563, 'og', 'post_category_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (564, 'og', 'banners.image_filepath', '{\"en\":\"Image File\",\"fr\":\"Image File\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (565, 'og', 'banners.url', '{\"en\":\"Url\",\"fr\":\"Url\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (566, 'og', 'banners.video_filepath', '{\"en\":\"Video File\",\"fr\":\"Video File\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (567, 'og', 'banners.script', '{\"en\":\"Script\",\"fr\":\"Script\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (568, 'og', 'banners.http_protocol', '{\"en\":\"Protocol HTTP\",\"fr\":\"Protocol HTTP\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (569, 'og', 'banners.link_type', '{\"en\":\"Link type\",\"fr\":\"Link type\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (570, 'og', 'banners.link_target', '{\"en\":\"Link target\",\"fr\":\"Link target\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (571, 'og', 'banners.external_link', '{\"en\":\"External link\",\"fr\":\"External link\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (572, 'og', 'banners.internal_link', '{\"en\":\"Internal link\",\"fr\":\"Internal link\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (573, 'og', 'banners.width', '{\"en\":\"Width\",\"fr\":\"Width\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (574, 'og', 'banners.height', '{\"en\":\"Height\",\"fr\":\"Height\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (575, 'og', 'banners.type', '{\"en\":\"Type\",\"fr\":\"Type\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (576, 'og', 'banners.thumb', '{\"en\":\"Thumb\",\"fr\":\"Thumb\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (577, 'og', 'banners.no_link', '{\"en\":\"No Link\",\"fr\":\"No Link\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (578, 'og', 'banners.css_class', '{\"en\":\"Css class\",\"fr\":\"Css class\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (579, 'og', 'banners.is_for_mobile', '{\"en\":\"Is for mobile?\",\"fr\":\"Is for mobile?\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (580, 'og', 'banners.is_active', '{\"en\":\"Is active?\",\"fr\":\"Is active?\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (581, 'og', 'banner_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (582, 'og', 'banner_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (583, 'og', 'banner_translations.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (584, 'og', 'banner_translations.title_2', '{\"en\":\"Title 2\",\"fr\":\"Title 2\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (585, 'og', 'banner_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (586, 'og', 'banner_translations.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (587, 'og', 'banner_translations.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (588, 'og', 'banner_translations.button_title', '{\"en\":\"Button title\",\"fr\":\"Button title\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (589, 'og', 'banner_translations.back_office_title',
        '{\"en\":\"Back office title\",\"fr\":\"Back office title\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (590, 'og', 'contact_recipients.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (591, 'og', 'contact_recipients.email', '{\"en\":\"Email\",\"fr\":\"Email\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (592, 'og', 'contact_messages.btn_send_message', '{\"en\":\"Send message\",\"fr\":\"Send message\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (593, 'og', 'contact_messages.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (594, 'og', 'contact_messages.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (595, 'og', 'contact_messages.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (596, 'og', 'contact_messages.first_name', '{\"en\":\"First name\",\"fr\":\"First name\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (597, 'og', 'contact_messages.last_name', '{\"en\":\"Last name\",\"fr\":\"Last name\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (598, 'og', 'contact_messages.phone', '{\"en\":\"Phone\",\"fr\":\"Phone\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (599, 'og', 'contact_messages.fax', '{\"en\":\"Fax\",\"fr\":\"Fax\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (600, 'og', 'contact_messages.address', '{\"en\":\"Address\",\"fr\":\"Address\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (601, 'og', 'contact_messages.governorate_id',
        '{\"en\":\"Country governorate id\",\"fr\":\"Country governorate id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (602, 'og', 'contact_messages.email', '{\"en\":\"Email\",\"fr\":\"Email\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (603, 'og', 'contact_messages.read_at', '{\"en\":\"Read at\",\"fr\":\"Read at\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (604, 'og', 'contact_messages.subject', '{\"en\":\"Subject\",\"fr\":\"Subject\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (605, 'og', 'contact_messages.message', '{\"en\":\"Message\",\"fr\":\"Message\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (606, 'og', 'quotation_recipients.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (607, 'og', 'quotations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (608, 'og', 'document_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (609, 'og', 'document_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (610, 'og', 'faq_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (611, 'og', 'faq_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (612, 'og', 'faq_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (613, 'og', 'faq_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (614, 'og', 'faq_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (615, 'og', 'faq_category_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (616, 'og', 'faq_category_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (617, 'og', 'faq_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (618, 'og', 'faq_category_translations.faq_category_id',
        '{\"en\":\"Faq category id\",\"fr\":\"Faq category id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (619, 'og', 'faq_items.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (620, 'og', 'faq_items.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (621, 'og', 'faq_items.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (622, 'og', 'faq_items.category', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (623, 'og', 'faq_items.faq_category_id', '{\"en\":\"Faq category id\",\"fr\":\"Faq category id\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (624, 'og', 'faq_item_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (625, 'og', 'faq_item_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (626, 'og', 'faq_item_translations.faq_item_id', '{\"en\":\"Faq item id\",\"fr\":\"Faq item id\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (627, 'og', 'faq_item_translations.question', '{\"en\":\"Question\",\"fr\":\"Question\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (628, 'og', 'faq_item_translations.answer', '{\"en\":\"Answer\",\"fr\":\"Answer\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (629, 'og', 'file_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (630, 'og', 'file_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (631, 'og', 'file_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (632, 'og', 'file_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (633, 'og', 'file_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (634, 'og', 'file_category_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (635, 'og', 'file_category_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (636, 'og', 'file_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (637, 'og', 'file_category_translations.files_category_id',
        '{\"en\":\"File category id\",\"fr\":\"File category id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (638, 'og', 'procedure_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (639, 'og', 'procedure_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (640, 'og', 'procedure_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (641, 'og', 'procedure_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (642, 'og', 'procedure_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (643, 'og', 'procedure_category_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (644, 'og', 'procedure_category_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (645, 'og', 'procedure_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (646, 'og', 'procedure_category_translations.files_category_id',
        '{\"en\":\"File category id\",\"fr\":\"File category id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (647, 'og', 'files.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (648, 'og', 'files.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (649, 'og', 'files.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (650, 'og', 'files.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (651, 'og', 'files.file_category_id', '{\"en\":\"File category id\",\"fr\":\"File category id\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (652, 'og', 'files.protocol', '{\"en\":\"Protocol\",\"fr\":\"Protocol\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (653, 'og', 'files.url', '{\"en\":\"Url\",\"fr\":\"Url\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (654, 'og', 'files.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (655, 'og', 'files.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (656, 'og', 'files.description', '{\"en\":\"Description\",\"fr\":\"Description\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (657, 'og', 'files.file', '{\"en\":\"File\",\"fr\":\"File\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (658, 'og', 'files.category', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (659, 'og', 'procedures.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (660, 'og', 'procedures.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (661, 'og', 'procedures.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (662, 'og', 'procedures.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (663, 'og', 'procedures.file_category_id', '{\"en\":\"File category id\",\"fr\":\"File category id\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (664, 'og', 'procedures.protocol', '{\"en\":\"Protocol\",\"fr\":\"Protocol\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (665, 'og', 'procedures.url', '{\"en\":\"Url\",\"fr\":\"Url\"}', '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (666, 'og', 'procedures.rapport', '{\"en\":\"Rapport\",\"fr\":\"Rapport\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (667, 'og', 'procedures.name', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (668, 'og', 'procedures.procedure_category_id', '{\"en\":\"Type\",\"fr\":\"Type\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (669, 'og', 'procedures.file', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (670, 'og', 'procedures.aspim', '{\"en\":\"Aspim\",\"fr\":\"Aspim\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (671, 'og', 'procedures.created_at', '{\"en\":\"Date\",\"fr\":\"Date\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (672, 'og', 'procedures.category', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (673, 'og', 'procedures.recherche', '{\"en\":\"RECHERCHE PAR MOT CLES\",\"fr\":\"RECHERCHE PAR MOT CLES\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (674, 'og', 'procedures.meta_description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (675, 'og', 'procedures.pays', '{\"en\":\"Pays\",\"fr\":\"Pays\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (676, 'og', 'procedures.date', '{\"en\":\"Date\",\"fr\":\"Date\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (677, 'og', 'procedure_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (678, 'og', 'procedure_translations.file_id', '{\"en\":\"File id\",\"fr\":\"File id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (679, 'og', 'procedure_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (680, 'og', 'procedure_translations.aspim', '{\"en\":\"Aspim\",\"fr\":\"Aspim\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (681, 'og', 'procedure_translations.name', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (682, 'og', 'procedure_translations.meta_description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:30', '2020-12-31 14:37:30'),
       (683, 'og', 'file_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:30',
        '2020-12-31 14:37:30'),
       (684, 'og', 'file_translations.file_id', '{\"en\":\"File id\",\"fr\":\"File id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (685, 'og', 'file_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (686, 'og', 'file_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (687, 'og', 'file_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (688, 'og', 'plan_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (689, 'og', 'plan_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (690, 'og', 'plan_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (691, 'og', 'plan_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (692, 'og', 'plan_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (693, 'og', 'plan_category_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (694, 'og', 'plan_category_translations.description', '{\"en\":\"Desgcription\",\"fr\":\"Desgcription\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (695, 'og', 'plan_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (696, 'og', 'plan_category_translations.files_category_id',
        '{\"en\":\"File category id\",\"fr\":\"File category id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (697, 'og', 'plans.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (698, 'og', 'plans.menu_id', '{\"en\":\"Menu id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (699, 'og', 'plans.is_active', '{\"en\":\"Is active\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (700, 'og', 'plans.order', '{\"en\":\"Order\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (701, 'og', 'plans.plan_category_id', '{\"en\":\"Plan category id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (702, 'og', 'plans.protocol', '{\"en\":\"Protocol\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (703, 'og', 'plans.url', '{\"en\":\"Url\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (704, 'og', 'plans.image', '{\"en\":\"Image\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (705, 'og', 'plans.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (706, 'og', 'plans.description', '{\"en\":\"Description\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (707, 'og', 'plans.plan', '{\"en\":\"Plan\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (708, 'og', 'plans.category', '{\"en\":\"Category\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (709, 'og', 'plans.aspim', '{\"en\":\"Aspim\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (710, 'og', 'plans.recherche', '{\"en\":\"Rechercher ressources\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (711, 'og', 'schemas.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (712, 'og', 'schemas.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (713, 'og', 'schemas.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (714, 'og', 'schemas.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (715, 'og', 'schemas.file_category_id', '{\"en\":\"File category id\",\"fr\":\"File category id\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (716, 'og', 'schemas.protocol', '{\"en\":\"Protocol\",\"fr\":\"Protocol\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (717, 'og', 'schemas.url', '{\"en\":\"Url\",\"fr\":\"Url\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (718, 'og', 'schemas.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (719, 'og', 'schemas.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (720, 'og', 'schemas.description', '{\"en\":\"Description\",\"fr\":\"Description\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (721, 'og', 'schemas.schema', '{\"en\":\"Schema\",\"fr\":\"Schema\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (722, 'og', 'schemas.category', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (723, 'og', 'schemas.aspim', '{\"en\":\"Aspim\",\"fr\":\"Aspim\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (724, 'og', 'plan_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (725, 'og', 'plan_translations.plan_id', '{\"en\":\"Plan id\",\"fr\":\"Plan id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (726, 'og', 'plan_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (727, 'og', 'plan_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (728, 'og', 'schema_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (729, 'og', 'schema_translations.file_id', '{\"en\":\"File id\",\"fr\":\"File id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (730, 'og', 'schema_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (731, 'og', 'schema_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (732, 'og', 'schema_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (733, 'og', 'galleries.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (734, 'og', 'galleries.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (735, 'og', 'galleries.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (736, 'og', 'gallery_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (737, 'og', 'gallery_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (738, 'og', 'gallery_translations.gallery_id', '{\"en\":\"Gallery id\",\"fr\":\"Gallery id\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (739, 'og', 'gallery_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (740, 'og', 'gallery_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (741, 'og', 'gallery_images.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (742, 'og', 'gallery_image_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (743, 'og', 'languages.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (744, 'og', 'menu_banners.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (745, 'og', 'modules.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (746, 'og', 'modules.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (747, 'og', 'modules.reference', '{\"en\":\"Reference\",\"fr\":\"Reference\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (748, 'og', 'modules.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (749, 'og', 'modules.is_menu_module', '{\"en\":\"Is Menu Module\",\"fr\":\"Is Menu Module\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (750, 'og', 'modules.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (751, 'og', 'modules.icon', '{\"en\":\"Icon\",\"fr\":\"Icon\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (752, 'og', 'modules.backend_route', '{\"en\":\"Backend route\",\"fr\":\"Backend route\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (753, 'og', 'modules.backend_uri', '{\"en\":\"Backend uri\",\"fr\":\"Backend uri\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (754, 'og', 'modules.backend_controller', '{\"en\":\"Backend controller\",\"fr\":\"Backend controller\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (755, 'og', 'modules.backend_action', '{\"en\":\"Backend action\",\"fr\":\"Backend action\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (756, 'og', 'modules.frontend_route', '{\"en\":\"Frontend route\",\"fr\":\"Frontend route\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (757, 'og', 'modules.frontend_uri', '{\"en\":\"Frontend uri\",\"fr\":\"Frontend uri\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (758, 'og', 'modules.frontend_controller', '{\"en\":\"Frontend controller\",\"fr\":\"Frontend controller\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (759, 'og', 'modules.frontend_action', '{\"en\":\"Frontend action\",\"fr\":\"Frontend action\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (760, 'og', 'modules.is_on_backend_sidebar', '{\"en\":\"On Backend sidebar\",\"fr\":\"On Backend sidebar\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (761, 'og', 'keywords.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (762, 'og', 'keyword_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (763, 'og', 'newsletter_subscriptions.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (764, 'og', 'newsletter_subscriptions.email', '{\"en\":\"Email\",\"fr\":\"Email\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (765, 'og', 'action_logs.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (766, 'og', 'pages.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (767, 'og', 'pages.index_button_show_menu', '{\"en\":\"Show Menu\",\"fr\":\"Show Menu\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (768, 'og', 'page_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (769, 'og', 'page_translations.page_id', '{\"en\":\"Page id\",\"fr\":\"Page id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (770, 'og', 'page_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (771, 'og', 'page_translations.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (772, 'og', 'page_translations.content', '{\"en\":\"Content\",\"fr\":\"Content\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (773, 'og', 'page_translations.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (774, 'og', 'page_translations.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (775, 'og', 'page_translations.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (776, 'og', 'parameter_groups.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (777, 'og', 'parameter_groups.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (778, 'og', 'parameters.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (779, 'og', 'parameters.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (780, 'og', 'parameters.reference', '{\"en\":\"Reference\",\"fr\":\"Reference\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (781, 'og', 'parameters.value', '{\"en\":\"Value\",\"fr\":\"Value\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (782, 'og', 'parameters.module_id', '{\"en\":\"Module id\",\"fr\":\"Module id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (783, 'og', 'parameters.parameter_group_id', '{\"en\":\"Parameter group id\",\"fr\":\"Parameter group id\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (784, 'og', 'countries.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (785, 'og', 'countries.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (786, 'og', 'countries.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (787, 'og', 'countries.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (788, 'og', 'countries.nationality', '{\"en\":\"Nationality\",\"fr\":\"Nationality\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (789, 'og', 'country_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (790, 'og', 'country_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (791, 'og', 'country_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (792, 'og', 'country_translations.country_id', '{\"en\":\"Country id\",\"fr\":\"Country id\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (793, 'og', 'governorates.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (794, 'og', 'governorates.country_id', '{\"en\":\"Country id\",\"fr\":\"Country id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (795, 'og', 'governorates.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (796, 'og', 'governorates.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (797, 'og', 'governorates.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (798, 'og', 'governorate_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (799, 'og', 'governorate_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (800, 'og', 'governorate_translations.governorate_id', '{\"en\":\"Governorate id\",\"fr\":\"Governorate id\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (801, 'og', 'governorate_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (802, 'og', 'prodcut_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (803, 'og', 'product_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (804, 'og', 'product_brands.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (805, 'og', 'product_brand_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (806, 'og', 'products.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (807, 'og', 'product_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (808, 'og', 'appointment_recipient.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (809, 'og', 'appointments.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (810, 'og', 'posts.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (811, 'og', 'posts.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (812, 'og', 'posts.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (813, 'og', 'posts.post_category_id', '{\"en\":\"Post category id\",\"fr\":\"Post category id\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (814, 'og', 'posts.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (815, 'og', 'posts.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (816, 'og', 'posts.content', '{\"en\":\"Content\",\"fr\":\"Content\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (817, 'og', 'posts.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (818, 'og', 'posts.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (819, 'og', 'post_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (820, 'og', 'post_translations.post_id', '{\"en\":\"Post id\",\"fr\":\"Post id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (821, 'og', 'post_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (822, 'og', 'post_translations.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (823, 'og', 'post_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (824, 'og', 'post_translations.content', '{\"en\":\"Content\",\"fr\":\"Content\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (825, 'og', 'post_translations.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (826, 'og', 'post_translations.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (827, 'og', 'documents.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (828, 'og', 'document_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (829, 'og', 'locales.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (830, 'og', 'locales.reference', '{\"en\":\"Reference\",\"fr\":\"Reference\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (831, 'og', 'locales.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (832, 'og', 'locales.is_default', '{\"en\":\"Is default\",\"fr\":\"Is default\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (833, 'og', 'locales.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (834, 'og', 'locales.is_rtl', '{\"en\":\"Direction\",\"fr\":\"Direction\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (835, 'og', 'users.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (836, 'og', 'users.email', '{\"en\":\"Email\",\"fr\":\"Email\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (837, 'og', 'users.password', '{\"en\":\"Password\",\"fr\":\"Password\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (838, 'og', 'users.old_password', '{\"en\":\"Old password\",\"fr\":\"Old password\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (839, 'og', 'users.confirm_password', '{\"en\":\"Confirm password\",\"fr\":\"Confirm password\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (840, 'og', 'users.role', '{\"en\":\"Role\",\"fr\":\"Role\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (841, 'og', 'words.menu', '{\"en\":\"Menu\",\"fr\":\"Menu\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (842, 'og', 'aspims.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (843, 'og', 'aspims.category', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (844, 'og', 'aspims.aspim_category_id', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (845, 'og', 'aspims.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (846, 'og', 'aspims.website', '{\"en\":\"Website Url\",\"fr\":\"Website\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (847, 'og', 'aspims.website_name', '{\"en\":\"Website name\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (848, 'og', 'aspims.included_at', '{\"en\":\"Ann\\u00e9e inclusion\",\"fr\":\"Ann\\u00e9e inclusion\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (849, 'og', 'aspims.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (850, 'og', 'aspims.total_surface', '{\"en\":\"Total surface\",\"fr\":\"Total surface\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (851, 'og', 'aspims.total_surface_marine', '{\"en\":\"Superficie marine\",\"fr\":\"Superficie marine\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (852, 'og', 'aspims.width',
        '{\"en\":\"Longeur de la cote principale\",\"fr\":\"Longeur de la cote principale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (853, 'og', 'aspims.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (854, 'og', 'aspims.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (855, 'og', 'aspims.description', '{\"en\":\"Description\",\"fr\":\"Description\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (856, 'og', 'aspims.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (857, 'og', 'aspims.creation_date', '{\"en\":\"Date de cr\\u00e9ation\",\"fr\":\"Date de cr\\u00e9ation\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (858, 'og', 'aspims.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (859, 'og', 'aspims.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (860, 'og', 'aspims.mapamed_feature_id', '{\"en\":\"Mapamed Feature\",\"fr\":\"Mapamed Feature\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (861, 'og', 'aspims.countries', '{\"en\":\"Pays\",\"fr\":\"Pays\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (862, 'og', 'aspim_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (863, 'og', 'aspim_translations.aspim_id', '{\"en\":\"Aspim id\",\"fr\":\"Aspim id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (864, 'og', 'aspim_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (865, 'og', 'aspim_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (866, 'og', 'aspim_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (867, 'og', 'aspim_translations.status', '{\"en\":\"Status\",\"fr\":\"Status\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (868, 'og', 'aspim_translations.schemas', '{\"en\":\"Schemas\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (869, 'og', 'aspim_translations.creation_text', '{\"en\":\"Creation Text\",\"fr\":\"Creation Text\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (870, 'og', 'aspim_translations.physical_features',
        '{\"en\":\"Physical features\",\"fr\":\"Physical features\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (871, 'og', 'aspim_translations.ecological_features',
        '{\"en\":\"Ecological features\",\"fr\":\"Ecological features\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (872, 'og', 'aspim_translations.threats_and_pressures',
        '{\"en\":\"Threats and pressures\",\"fr\":\"Threats and pressures\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (873, 'og', 'aspim_translations.teritory', '{\"en\":\"Territory\",\"fr\":\"Territory\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (874, 'og', 'aspim_translations.mediterranean_importance',
        '{\"en\":\"Mediterranean importance\",\"fr\":\"Mediterranean importance\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (875, 'og', 'aspim_translations.management_body', '{\"en\":\"Management Body\",\"fr\":\"Management Body\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (876, 'og', 'aspim_translations.geographic_position',
        '{\"en\":\"Geographic position\",\"fr\":\"Geographic position\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (877, 'og', 'aspim_translations.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (878, 'og', 'aspim_translations.document', '{\"en\":\"Document\",\"fr\":\"Document\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (879, 'og', 'aspim_translations.content', '{\"en\":\"Content\",\"fr\":\"Content\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (880, 'og', 'aspim_translations.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (881, 'og', 'aspim_translations.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (882, 'og', 'aspim_translations.gallery', '{\"en\":\"Galllery\",\"fr\":\"Galllery\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (883, 'og', 'gestionnaire_aspim.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (884, 'og', 'gestionnaire_aspim.is_active', '{\"en\":\"Is Active\",\"fr\":\"Is Active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (885, 'og', 'gestionnaire_aspim.gestionnaire_aspim_id',
        '{\"en\":\"gestionnaire aspim id\",\"fr\":\"gestionnaire aspim id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (886, 'og', 'gestionnaire_aspim.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (887, 'og', 'gestionnaire_aspim.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (888, 'og', 'gestionnaire_aspim.name', '{\"en\":\"Nom\",\"fr\":\"Nom\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (889, 'og', 'gestionnaire_aspim.email', '{\"en\":\"Email\",\"fr\":\"Email\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (890, 'og', 'gestionnaire_aspim.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (891, 'og', 'gestionnaire_aspim.civilite', '{\"en\":\"Civilit\\u00e9\",\"fr\":\"Civilit\\u00e9\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (892, 'og', 'gestionnaire_aspim.surname', '{\"en\":\"Pr\\u00e9nom\",\"fr\":\"Pr\\u00e9nom\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (893, 'og', 'gestionnaire_aspim.password', '{\"en\":\"Mot de passe\",\"fr\":\"Mot de passe\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (894, 'og', 'gestionnaire_aspim.confirm_password',
        '{\"en\":\"Confirmer Votre mot de passe\",\"fr\":\"Confirmer Votre mot de passe\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (895, 'og', 'gestionnaire_aspim.other_email', '{\"en\":\"Autre email\",\"fr\":\"Autre email\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (896, 'og', 'gestionnaire_aspim.tel', '{\"en\":\"T\\u00e9l\\u00e9phone\",\"fr\":\"T\\u00e9l\\u00e9phone\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (897, 'og', 'gestionnaire_aspim.mobile', '{\"en\":\"Mobile\",\"fr\":\"Mobile\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (898, 'og', 'gestionnaire_aspim.fax', '{\"en\":\"fax\",\"fr\":\"fax\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (899, 'og', 'gestionnaire_aspim.aspim', '{\"en\":\"Choisir une aspim\",\"fr\":\"Choisir une aspim\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (900, 'og', 'gestionnaire_aspim.langue',
        '{\"en\":\"Langue pr\\u00e9f\\u00e9r\\u00e9\",\"fr\":\"Langue pr\\u00e9f\\u00e9r\\u00e9\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (901, 'og', 'gestionnaire_aspim.other_langue', '{\"en\":\"Autre langue\",\"fr\":\"Autre langue\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (902, 'og', 'gestionnaire_aspim.adresse', '{\"en\":\"Adresse\",\"fr\":\"Adresse\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (903, 'og', 'gestionnaire_aspim.city', '{\"en\":\"Cit\\u00e9\",\"fr\":\"Cit\\u00e9\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (904, 'og', 'gestionnaire_aspim.code_zip', '{\"en\":\"Code Zip\",\"fr\":\"Code Zip\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (905, 'og', 'gestionnaire_aspim.pays', '{\"en\":\"Pays\",\"fr\":\"Pays\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (906, 'og', 'gestionnaire_aspim.position', '{\"en\":\"Position\",\"fr\":\"Position\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (907, 'og', 'gestionnaire_aspim.website', '{\"en\":\"Site web\",\"fr\":\"Site web\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (908, 'og', 'gestionnaire_aspim.skype', '{\"en\":\"Skype\",\"fr\":\"Skype\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (909, 'og', 'gestionnaire_aspim.facebook', '{\"en\":\"Facebook\",\"fr\":\"Facebook\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (910, 'og', 'gestionnaire_aspim.twitter', '{\"en\":\"Twitter\",\"fr\":\"Twitter\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (911, 'og', 'gestionnaire_aspim.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (912, 'og', 'gestionnaire_aspim.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (913, 'og', 'gestionnaire_aspim.gallery', '{\"en\":\"Galllery\",\"fr\":\"Galllery\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (914, 'og', 'gestionnaire_aspim.recherceh_aspim', '{\"en\":\"Rechercher des gestionnaires\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (915, 'og', 'gestionnaire_aspim_translation.nom_abrege_institution',
        '{\"en\":\"Nom abr\\u00e9ge d\'institution\",\"fr\":\"Nom abr\\u00e9ge d\'institution\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (916, 'og', 'gestionnaire_aspim_translation.nom_institution',
        '{\"en\":\"Nom d\'institution\",\"fr\":\"Nom d\'institution\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (917, 'og', 'aspim_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (918, 'og', 'aspim_categories.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (919, 'og', 'aspim_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (920, 'og', 'aspim_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (921, 'og', 'aspim_categories.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (922, 'og', 'aspim_categories.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (923, 'og', 'aspim_categories.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (924, 'og', 'aspim_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (925, 'og', 'aspim_category_translations.aspim_category_id',
        '{\"en\":\"Aspim category id\",\"fr\":\"Aspim category id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (926, 'og', 'aspim_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (927, 'og', 'aspim_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (928, 'og', 'aspim_category_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (929, 'og', 'aspim_category_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (930, 'og', 'gestion_forums.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (931, 'og', 'gestion_forums.post_tite', '{\"en\":\"Posts\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (932, 'og', 'gestion_forums.title', '{\"en\":\"Title\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (933, 'og', 'gestion_forums.user_name', '{\"en\":\"User Name\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (934, 'og', 'gestion_forums.views', '{\"en\":\"Views\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (935, 'og', 'gestion_forums.sticky', '{\"en\":\"Sticky\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (936, 'og', 'gestion_forums.answered', '{\"en\":\"Answered\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (937, 'og', 'gestion_forums.category', '{\"en\":\"Category\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (938, 'og', 'category_forums.id', '{\"en\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (939, 'og', 'category_forums.name', '{\"en\":\"Name\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (940, 'og', 'category_forums.color', '{\"en\":\"Color\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (941, 'og', 'category_forums.order', '{\"en\":\"Order\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (942, 'og', 'category_forums.parent_id', '{\"en\":\"Category parent\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (943, 'og', 'category_forums.slug', '{\"en\":\"Slug\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (944, 'og', 'events.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (945, 'og', 'events.category', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (946, 'og', 'events.event_category_id', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (947, 'og', 'events.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (948, 'og', 'events.start_date', '{\"en\":\"Start date\",\"fr\":\"Start date\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (949, 'og', 'events.end_date', '{\"en\":\"End date\",\"fr\":\"End date\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (950, 'og', 'events.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (951, 'og', 'events.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (952, 'og', 'events.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (953, 'og', 'events.description', '{\"en\":\"Description\",\"fr\":\"Description\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (954, 'og', 'events.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (955, 'og', 'events.content', '{\"en\":\"Content\",\"fr\":\"Content\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (956, 'og', 'events.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (957, 'og', 'events.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (958, 'og', 'event_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (959, 'og', 'event_translations.event_id', '{\"en\":\"Event id\",\"fr\":\"Event id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (960, 'og', 'event_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (961, 'og', 'event_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (962, 'og', 'event_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (963, 'og', 'event_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (964, 'og', 'event_translations.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (965, 'og', 'event_translations.content', '{\"en\":\"Content\",\"fr\":\"Content\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (966, 'og', 'event_translations.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (967, 'og', 'event_translations.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (968, 'og', 'event_translations.gallery', '{\"en\":\"Galllery\",\"fr\":\"Galllery\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (969, 'og', 'event_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (970, 'og', 'event_categories.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (971, 'og', 'event_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (972, 'og', 'event_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (973, 'og', 'event_categories.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (974, 'og', 'event_categories.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (975, 'og', 'event_categories.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (976, 'og', 'event_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (977, 'og', 'event_category_translations.event_category_id',
        '{\"en\":\"Event category id\",\"fr\":\"Event category id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (978, 'og', 'event_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (979, 'og', 'event_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (980, 'og', 'event_category_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (981, 'og', 'event_category_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (982, 'og', 'media_files.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (983, 'og', 'media_files.album', '{\"en\":\"Album\",\"fr\":\"Album\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (984, 'og', 'media_files.media_album_id', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (985, 'og', 'media_files.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (986, 'og', 'media_files.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (987, 'og', 'media_files.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (988, 'og', 'media_files.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (989, 'og', 'media_files.description', '{\"en\":\"Description\",\"fr\":\"Description\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (990, 'og', 'media_files.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (991, 'og', 'media_file_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (992, 'og', 'media_file_translations.media_file_id', '{\"en\":\"Media file id\",\"fr\":\"Media file id\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (993, 'og', 'media_file_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (994, 'og', 'media_file_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (995, 'og', 'media_file_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (996, 'og', 'media_file_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:31', '2020-12-31 14:37:31'),
       (997, 'og', 'media_file_translations.url', '{\"en\":\"Url\",\"fr\":\"Url\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (998, 'og', 'media_album_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (999, 'og', 'media_album_categories.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:31',
        '2020-12-31 14:37:31'),
       (1000, 'og', 'media_album_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1001, 'og', 'media_album_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1002, 'og', 'media_album_categories.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1003, 'og', 'media_album_categories.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1004, 'og', 'media_album_categories.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1005, 'og', 'media_album_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1006, 'og', 'media_album_category_translations.media_album_category_id',
        '{\"en\":\"Media album category id\",\"fr\":\"Media album category id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1007, 'og', 'media_album_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1008, 'og', 'media_album_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1009, 'og', 'media_album_category_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1010, 'og', 'media_album_category_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1011, 'og', 'media_albums.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1012, 'og', 'media_albums.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1013, 'og', 'media_albums.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1014, 'og', 'media_albums.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1015, 'og', 'media_albums.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1016, 'og', 'media_albums.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1017, 'og', 'media_albums.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1018, 'og', 'media_albums.category', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1019, 'og', 'media_album_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1020, 'og', 'media_album_translations.media_album_category_id',
        '{\"en\":\"Media album id\",\"fr\":\"Media album id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1021, 'og', 'media_album_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1022, 'og', 'media_album_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1023, 'og', 'media_album_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1024, 'og', 'media_album_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1025, 'og', 'trainings.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1026, 'og', 'trainings.category', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1027, 'og', 'trainings.training_category_id', '{\"en\":\"Category\",\"fr\":\"Category\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1028, 'og', 'trainings.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1029, 'og', 'trainings.lien_video', '{\"en\":\"Lien vid\\u00e9o\",\"fr\":\"Lien vid\\u00e9o\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1030, 'og', 'trainings.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1031, 'og', 'trainings.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1032, 'og', 'trainings.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1033, 'og', 'trainings.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1034, 'og', 'trainings.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1035, 'og', 'trainings.rechercher', '{\"en\":\"Rechercher ressources\",\"fr\":\"Rechercher ressources\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1036, 'og', 'training_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1037, 'og', 'training_translations.training_id', '{\"en\":\"Training id\",\"fr\":\"Training id\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1038, 'og', 'training_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1039, 'og', 'training_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1040, 'og', 'training_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1041, 'og', 'training_translations.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1042, 'og', 'training_translations.meta_description',
        '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1043, 'og', 'training_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1044, 'og', 'training_categories.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1045, 'og', 'training_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1046, 'og', 'training_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1047, 'og', 'training_categories.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1048, 'og', 'training_categories.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1049, 'og', 'training_categories.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1050, 'og', 'training_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1051, 'og', 'training_category_translations.training_category_id',
        '{\"en\":\"Training category id\",\"fr\":\"Training category id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1052, 'og', 'training_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1053, 'og', 'training_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1054, 'og', 'training_category_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1055, 'og', 'training_category_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1056, 'og', 'news.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1057, 'og', 'news.category', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1058, 'og', 'news.news_category_id', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1059, 'og', 'news.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1060, 'og', 'news.start_date', '{\"en\":\"Start date\",\"fr\":\"Start date\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1061, 'og', 'news.end_date', '{\"en\":\"End date\",\"fr\":\"End date\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1062, 'og', 'news.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1063, 'og', 'news.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1064, 'og', 'news.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1065, 'og', 'news.description', '{\"en\":\"Description\",\"fr\":\"Description\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1066, 'og', 'news.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1067, 'og', 'news.content', '{\"en\":\"Content\",\"fr\":\"Content\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1068, 'og', 'news.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1069, 'og', 'news.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1070, 'og', 'news.updated_at', '{\"en\":\"Updated at\",\"fr\":\"Updated at\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1071, 'og', 'news.media_album_id', '{\"en\":\"Media Album\",\"fr\":\"Media Album\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1072, 'og', 'news_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1073, 'og', 'news_translations.event_id', '{\"en\":\"Event id\",\"fr\":\"Event id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1074, 'og', 'news_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1075, 'og', 'news_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1076, 'og', 'news_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1077, 'og', 'news_translations.pays', '{\"en\":\"Pays\",\"fr\":\"Pays\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1078, 'og', 'news_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1079, 'og', 'news_translations.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1080, 'og', 'news_translations.content', '{\"en\":\"Content\",\"fr\":\"Content\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1081, 'og', 'news_translations.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1082, 'og', 'news_translations.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1083, 'og', 'news_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1084, 'og', 'news_categories.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1085, 'og', 'news_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1086, 'og', 'news_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1087, 'og', 'news_categories.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1088, 'og', 'news_categories.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1089, 'og', 'news_categories.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1090, 'og', 'news_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1091, 'og', 'news_category_translations.event_category_id',
        '{\"en\":\"News category id\",\"fr\":\"News category id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1092, 'og', 'news_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1093, 'og', 'news_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1094, 'og', 'news_category_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1095, 'og', 'news_category_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1096, 'og', 'useful_link_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1097, 'og', 'useful_link_categories.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1098, 'og', 'useful_link_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1099, 'og', 'useful_link_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1100, 'og', 'useful_link_categories.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1101, 'og', 'useful_link_categories.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1102, 'og', 'useful_link_categories.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1103, 'og', 'useful_link_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1104, 'og', 'useful_link_category_translations.useful_link_category_id',
        '{\"en\":\"Useful link category id\",\"fr\":\"Useful link category id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1105, 'og', 'useful_link_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1106, 'og', 'useful_link_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1107, 'og', 'useful_link_category_translations.title', '{\"en\":\"Title\",\"fr\":\"Title\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1108, 'og', 'useful_link_category_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1109, 'og', 'useful_links.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1110, 'og', 'useful_links.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1111, 'og', 'useful_links.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1112, 'og', 'useful_links.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1113, 'og', 'useful_links.useful_link_category_id',
        '{\"en\":\"Useful link category id\",\"fr\":\"Useful link category id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1114, 'og', 'useful_links.protocol', '{\"en\":\"Protocol\",\"fr\":\"Protocol\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1115, 'og', 'useful_links.url', '{\"en\":\"Url\",\"fr\":\"Url\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1116, 'og', 'useful_links.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1117, 'og', 'useful_links.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1118, 'og', 'useful_links.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1119, 'og', 'useful_link_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1120, 'og', 'useful_link_translations.useful_link_id', '{\"en\":\"Useful link id\",\"fr\":\"Useful link id\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1121, 'og', 'useful_link_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1122, 'og', 'useful_link_translations.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1123, 'og', 'useful_link_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1124, 'og', 'partners_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1125, 'og', 'partners_categories.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1126, 'og', 'partners_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1127, 'og', 'partners_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1128, 'og', 'partners_categories.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1129, 'og', 'partners_categories.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1130, 'og', 'partners_categories.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1131, 'og', 'partners_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1132, 'og', 'partners_category_translations.partners_category_id',
        '{\"en\":\"Partner category id\",\"fr\":\"Partner category id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1133, 'og', 'partners_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1134, 'og', 'partners_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1135, 'og', 'partners_category_translations.title', '{\"en\":\"Title\",\"fr\":\"Title\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1136, 'og', 'partners_category_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1137, 'og', 'partners.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1138, 'og', 'partners.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1139, 'og', 'partners.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1140, 'og', 'partners.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1141, 'og', 'partners.partner_category_id', '{\"en\":\"Partner category id\",\"fr\":\"Partner category id\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1142, 'og', 'partners.protocol', '{\"en\":\"Protocol\",\"fr\":\"Protocol\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1143, 'og', 'partners.url', '{\"en\":\"Url\",\"fr\":\"Url\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1144, 'og', 'partners.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1145, 'og', 'partners.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1146, 'og', 'partners.description', '{\"en\":\"Description\",\"fr\":\"Description\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1147, 'og', 'partner_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1148, 'og', 'partner_translations.partner_id', '{\"en\":\"Partner id\",\"fr\":\"Partner id\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1149, 'og', 'partner_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1150, 'og', 'partner_translations.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1151, 'og', 'partner_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1152, 'og', 'app_texts.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1153, 'og', 'app_texts.group', '{\"en\":\"Group\",\"fr\":\"Group\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1154, 'og', 'app_texts.key', '{\"en\":\"Key\",\"fr\":\"Key\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1155, 'og', 'app_texts.text', '{\"en\":\"Text\",\"fr\":\"Text\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1156, 'og', 'cities.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1157, 'og', 'cities.country_id', '{\"en\":\"Country id\",\"fr\":\"Country id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1158, 'og', 'cities.governorate_id', '{\"en\":\"Governorate id\",\"fr\":\"Governorate id\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1159, 'og', 'cities.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1160, 'og', 'cities.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1161, 'og', 'cities.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1162, 'og', 'city_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1163, 'og', 'city_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1164, 'og', 'city_translations.city_id', '{\"en\":\"City id\",\"fr\":\"City id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1165, 'og', 'city_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1166, 'og', 'zones.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1167, 'og', 'zones.city_id', '{\"en\":\"City id\",\"fr\":\"City id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1168, 'og', 'zones.governorate_id', '{\"en\":\"Governorate id\",\"fr\":\"Governorate id\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1169, 'og', 'zones.country_id', '{\"en\":\"Country id\",\"fr\":\"Country id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1170, 'og', 'zones.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1171, 'og', 'zones.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1172, 'og', 'zones.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1173, 'og', 'zones.postal_code', '{\"en\":\"Postal code\",\"fr\":\"Postal code\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1174, 'og', 'zone_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1175, 'og', 'zone_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1176, 'og', 'zone_translations.zone_id', '{\"en\":\"Zone id\",\"fr\":\"Zone id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1177, 'og', 'zone_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1178, 'og', 'widgets_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1179, 'og', 'widgets_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1180, 'og', 'widgets_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1181, 'og', 'widgets_translations.button_title', '{\"en\":\"Button title\",\"fr\":\"Button title\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1182, 'og', 'widgets.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1183, 'og', 'widgets.is_active', '{\"en\":\"Active\",\"fr\":\"Active\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1184, 'og', 'widgets.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1185, 'og', 'widgets.home_id', '{\"en\":\"home ID\",\"fr\":\"home ID\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1186, 'og', 'widgets.menu_id', '{\"en\":\"Menu ID\",\"fr\":\"Menu ID\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1187, 'og', 'widgets.module_id', '{\"en\":\"Module\",\"fr\":\"Module\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1188, 'og', 'widgets.reference', '{\"en\":\"Reference\",\"fr\":\"Reference\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1189, 'og', 'widgets.placement', '{\"en\":\"Emplacement\",\"fr\":\"Emplacement\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1190, 'og', 'widgets.type', '{\"en\":\"Affichage dans les pages\",\"fr\":\"Affichage dans les pages\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1191, 'og', 'widgets.select_type',
        '{\"en\":\"S\\u00e9lection des articles (derni\\u00e8rs artciels ou choix personnel)\",\"fr\":\"S\\u00e9lection des articles (derni\\u00e8rs artciels ou choix personnel)\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1192, 'og', 'widgets.number_for_latest',
        '{\"en\":\"Nombre des derni\\u00e8res articles\",\"fr\":\"Nombre des derni\\u00e8res articles\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1193, 'og', 'widgets.order_column', '{\"en\":\"Order Column\",\"fr\":\"Order Column\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1194, 'og', 'widgets.order_column_type',
        '{\"en\":\"Order Type for columns\",\"fr\":\"Order Type for columns\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1195, 'og', 'widgets.ajouter_widget', '{\"en\":\"Ajouter une widget\",\"fr\":\"Ajouter une widget\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1196, 'og', 'widgets.module_text', '{\"en\":\"Module :\",\"fr\":\"Module :\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1197, 'og', 'widgets.reference_text', '{\"en\":\"Ref :\",\"fr\":\"Ref :\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1198, 'og', 'widgets.placement_text', '{\"en\":\"Emplacement :\",\"fr\":\"Emplacement :\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1199, 'og', 'widgets.save_order', '{\"en\":\"Sauvegarder l\'ordre\",\"fr\":\"Sauvegarder l\'ordre\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1200, 'og', 'widgets.widget_edit_info',
        '{\"en\":\"Si vous modifiez le module ou le type de s\\u00e9lection d\'\\u00e9l\\u00e9ment, les \\u00e9l\\u00e9ments affect\\u00e9s seront supprim\\u00e9s.\",\"fr\":\"Si vous modifiez le module ou le type de s\\u00e9lection d\'\\u00e9l\\u00e9ment, les \\u00e9l\\u00e9ments affect\\u00e9s seront supprim\\u00e9s.\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1201, 'og', 'widgets.top', '{\"en\":\"Top\",\"fr\":\"Top\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1202, 'og', 'widgets.right', '{\"en\":\"Right\",\"fr\":\"Right\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1203, 'og', 'widgets.left', '{\"en\":\"left\",\"fr\":\"left\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1204, 'og', 'widgets.bottom', '{\"en\":\"Bottom\",\"fr\":\"Bottom\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1205, 'og', 'widgets.middle', '{\"en\":\"Middle\",\"fr\":\"Middle\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1206, 'og', 'widgets.ascendant', '{\"en\":\"Ascendant\",\"fr\":\"Ascendant\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1207, 'og', 'widgets.descendant', '{\"en\":\"Descendant\",\"fr\":\"Descendant\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1208, 'og', 'widgets.all_pages', '{\"en\":\"All Pages\",\"fr\":\"All Pages\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1209, 'og', 'widgets.per_page', '{\"en\":\"Per Page\",\"fr\":\"Per Page\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1210, 'og', 'widgets.latest', '{\"en\":\"Latest\",\"fr\":\"Latest\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1211, 'og', 'widgets.free_select', '{\"en\":\"Free select\",\"fr\":\"Free select\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1212, 'og', 'widgets.active', '{\"en\":\"Activ\\u00e9\",\"fr\":\"Activ\\u00e9\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1213, 'og', 'widgets.desactive', '{\"en\":\"D\\u00e9sactiv\\u00e9\",\"fr\":\"D\\u00e9sactiv\\u00e9\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1214, 'og', 'front_filter.submit', '{\"en\":\"Recherche\",\"fr\":\"Recherche\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1215, 'og', 'front_filter.validation', '{\"en\":\"Valider\",\"fr\":\"Valider\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1216, 'og', 'front_filter.reset', '{\"en\":\"R\\u00e9initialiser\",\"fr\":\"R\\u00e9initialiser\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1217, 'og', 'front_filter.keywords', '{\"en\":\"Motes cl\\u00e9s\",\"fr\":\"Motes cl\\u00e9s\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1218, 'og', 'front_filter.alerts', '{\"en\":\"Les alertes\",\"fr\":\"Les alertes\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1219, 'og', 'front_filter.publish_date', '{\"en\":\"Date publication\",\"fr\":\"Date publication\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1220, 'og', 'front_filter.signature_date', '{\"en\":\"Date signature\",\"fr\":\"Date signature\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1221, 'og', 'front_filter.theme', '{\"en\":\"Th\\u00e8mes\",\"fr\":\"Th\\u00e8mes\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1222, 'og', 'front_filter.discover_latest_images',
        '{\"en\":\"D\\u00e9couvrez les derni\\u00e8res photos\",\"fr\":\"D\\u00e9couvrez les derni\\u00e8res photos\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1223, 'og', 'front_filter.date_du', '{\"en\":\"Date du\",\"fr\":\"Date du\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1224, 'og', 'front_filter.date', '{\"en\":\"Date\",\"fr\":\"Date\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1225, 'og', 'front_filter.date_au', '{\"en\":\"Au\",\"fr\":\"Au\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1226, 'og', 'front_filter.code_postal', '{\"en\":\"Code Postal\",\"fr\":\"Code Postal\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1227, 'og', 'front_filter.adresse', '{\"en\":\"Adresse\",\"fr\":\"Adresse\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1228, 'og', 'front_filter.site_web', '{\"en\":\"Site Web\",\"fr\":\"Site Web\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1229, 'og', 'front_filter.nom_prenom', '{\"en\":\"Nom et pr\\u00e9nom\",\"fr\":\"Nom et pr\\u00e9nom\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1230, 'og', 'front_filter.email', '{\"en\":\"E-mail\",\"fr\":\"E-mail\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1231, 'og', 'front_filter.fonction', '{\"en\":\"Fonction\",\"fr\":\"Fonction\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1232, 'og', 'front_filter.dept', '{\"en\":\"D\\u00e9partement\",\"fr\":\"D\\u00e9partement\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1233, 'og', 'front_filter.tel_fixe',
        '{\"en\":\"N\\u00b0 de t\\u00e9l\\u00e9phone fixe\",\"fr\":\"N\\u00b0 de t\\u00e9l\\u00e9phone fixe\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1234, 'og', 'front_filter.faxe', '{\"en\":\"N\\u00b0 de fax\",\"fr\":\"N\\u00b0 de fax\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1235, 'og', 'front_filter.tel_portable',
        '{\"en\":\"N\\u00b0 de t\\u00e9l\\u00e9phone portable\",\"fr\":\"N\\u00b0 de t\\u00e9l\\u00e9phone portable\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1236, 'og', 'front_filter.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1237, 'og', 'front_filter.btn_read_next', '{\"en\":\"Lire la suite\",\"fr\":\"Lire la suite\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1238, 'og', 'front_filter.category', '{\"en\":\"Cat\\u00e9gorie\",\"fr\":\"Cat\\u00e9gorie\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1239, 'og', 'front_filter.formations', '{\"en\":\"Formations\",\"fr\":\"Formations\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1240, 'og', 'front_filter.du', '{\"en\":\"Du\",\"fr\":\"Du\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1241, 'og', 'front_filter.au', '{\"en\":\"au\",\"fr\":\"au\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1242, 'og', 'front_filter.register', '{\"en\":\"S\'inscrire\",\"fr\":\"S\'inscrire\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1243, 'og', 'sitemaps.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1244, 'og', 'sitemaps.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1245, 'og', 'sitemaps.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1246, 'og', 'sitemaps.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1247, 'og', 'sitemaps.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1248, 'og', 'sitemaps.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1249, 'og', 'sitemaps.description', '{\"en\":\"Description\",\"fr\":\"Description\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1250, 'og', 'sitemaps.menu_group_ids', '{\"en\":\"Menu group IDs\",\"fr\":\"Menu group IDs\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1251, 'og', 'sitemap_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1252, 'og', 'sitemap_translations.sitemap_id', '{\"en\":\"Sitemap id\",\"fr\":\"Sitemap id\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1253, 'og', 'sitemap_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1254, 'og', 'sitemap_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1255, 'og', 'sitemap_translations.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1256, 'og', 'sitemap_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1257, 'og', 'testimonial_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1258, 'og', 'testimonial_categories.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1259, 'og', 'testimonial_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1260, 'og', 'testimonial_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1261, 'og', 'testimonial_categories.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1262, 'og', 'testimonial_categories.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1263, 'og', 'testimonial_categories.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1264, 'og', 'testimonial_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1265, 'og', 'testimonial_category_translations.testimonials_category_id',
        '{\"en\":\"Testimonial category id\",\"fr\":\"Testimonial category id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1266, 'og', 'testimonial_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1267, 'og', 'testimonial_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1268, 'og', 'testimonial_category_translations.title', '{\"en\":\"Title\",\"fr\":\"Title\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1269, 'og', 'testimonial_category_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1270, 'og', 'testimonials.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1271, 'og', 'testimonials.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1272, 'og', 'testimonials.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1273, 'og', 'testimonials.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1274, 'og', 'testimonials.testimonial_category_id',
        '{\"en\":\"Testimonial category\",\"fr\":\"Testimonial category\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1275, 'og', 'testimonials.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1276, 'og', 'testimonials.facebook', '{\"en\":\"Facebook\",\"fr\":\"Facebook\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1277, 'og', 'testimonials.instagram', '{\"en\":\"Instagram\",\"fr\":\"Instagram\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1278, 'og', 'testimonials.linkedin', '{\"en\":\"Linked-In\",\"fr\":\"Linked-In\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1279, 'og', 'testimonials.twitter', '{\"en\":\"Twitter\",\"fr\":\"Twitter\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1280, 'og', 'testimonials.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1281, 'og', 'testimonials.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1282, 'og', 'testimonial_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1283, 'og', 'testimonial_translations.testimonial_id', '{\"en\":\"Testimonial id\",\"fr\":\"Testimonial id\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1284, 'og', 'testimonial_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1285, 'og', 'testimonial_translations.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1286, 'og', 'testimonial_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1287, 'og', 'testimonial_translations.content', '{\"en\":\"Content\",\"fr\":\"Content\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1288, 'og', 'testimonial_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1289, 'og', 'home.home', '{\"en\":\"Home\",\"fr\":\"Home\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1290, 'og', 'home.menu', '{\"en\":\"Menu\",\"fr\":\"Menu\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1291, 'og', 'home.fermer', '{\"en\":\"fermer\",\"fr\":\"fermer\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1292, 'og', 'outil_gestions.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1293, 'og', 'outil_gestions.category', '{\"en\":\"Category\",\"fr\":\"Category\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1294, 'og', 'outil_gestions.outil_gestion_category_id', '{\"en\":\"Category\",\"fr\":\"Category\"}',
        '2020-12-31 14:37:32', '2020-12-31 14:37:32'),
       (1295, 'og', 'outil_gestions.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1296, 'og', 'outil_gestions.type', '{\"en\":\"Type\",\"fr\":\"Type\"}', '2020-12-31 14:37:32',
        '2020-12-31 14:37:32'),
       (1297, 'og', 'outil_gestions.url_video', '{\"en\":\"Url video\",\"fr\":\"Url video\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1298, 'og', 'outil_gestions.url_lien', '{\"en\":\"Url lien\",\"fr\":\"Url lien\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1299, 'og', 'outil_gestions.guideline', '{\"en\":\"Guideline\",\"fr\":\"Guideline\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1300, 'og', 'outil_gestions.manuel', '{\"en\":\"Manuel\",\"fr\":\"Manuel\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1301, 'og', 'outil_gestions.document', '{\"en\":\"Document\",\"fr\":\"Document\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1302, 'og', 'outil_gestions.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1303, 'og', 'outil_gestions.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1304, 'og', 'outil_gestions.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1305, 'og', 'outil_gestions.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1306, 'og', 'outil_gestions.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1307, 'og', 'outil_gestions.content', '{\"en\":\"Content\",\"fr\":\"Content\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1308, 'og', 'outil_gestions.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1309, 'og', 'outil_gestions.meta_description', '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1310, 'og', 'outil_gestions.aspim', '{\"en\":\"Aspim\",\"fr\":\"Aspim\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1311, 'og', 'outil_gestion_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1312, 'og', 'outil_gestion_translations.outil_gestion_id', '{\"en\":\"Event id\",\"fr\":\"Event id\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1313, 'og', 'outil_gestion_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1314, 'og', 'outil_gestion_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1315, 'og', 'outil_gestion_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1316, 'og', 'outil_gestion_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1317, 'og', 'outil_gestion_translations.image', '{\"en\":\"Image\",\"fr\":\"Image\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1318, 'og', 'outil_gestion_translations.content', '{\"en\":\"Content\",\"fr\":\"Content\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1319, 'og', 'outil_gestion_translations.meta_title', '{\"en\":\"Meta title\",\"fr\":\"Meta title\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1320, 'og', 'outil_gestion_translations.meta_description',
        '{\"en\":\"Meta description\",\"fr\":\"Meta description\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1321, 'og', 'outil_gestion_translations.gallery', '{\"en\":\"Galllery\",\"fr\":\"Galllery\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1322, 'og', 'outil_gestion_categories.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1323, 'og', 'outil_gestion_categories.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1324, 'og', 'outil_gestion_categories.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1325, 'og', 'outil_gestion_categories.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1326, 'og', 'outil_gestion_categories.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1327, 'og', 'outil_gestion_categories.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1328, 'og', 'outil_gestion_categories.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1329, 'og', 'outil_gestion_category_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1330, 'og', 'outil_gestion_category_translations.outil_gestion_category_id',
        '{\"en\":\"Event category id\",\"fr\":\"Event category id\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1331, 'og', 'outil_gestion_category_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1332, 'og', 'outil_gestion_category_translations.slug', '{\"en\":\"Slug\",\"fr\":\"Slug\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1333, 'og', 'outil_gestion_category_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1334, 'og', 'outil_gestion_category_translations.description',
        '{\"en\":\"Description\",\"fr\":\"Description\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1335, 'og', 'programs.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1336, 'og', 'programs.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1337, 'og', 'programs.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1338, 'og', 'programs.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1339, 'og', 'programs.program_page_id', '{\"en\":\"Linked page\",\"fr\":\"Linked page\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1340, 'og', 'programs.established_at', '{\"en\":\"Established at\",\"fr\":\"Established at\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1341, 'og', 'programs.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1342, 'og', 'programs.description', '{\"en\":\"Description\",\"fr\":\"Description\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1343, 'og', 'programs.aspims', '{\"en\":\"Aspims\",\"fr\":\"Aspims\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1344, 'og', 'programs.title_content_map', '{\"en\":\"Liste des couches\",\"fr\":\"Liste des couches\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1345, 'og', 'programs.title_header_map',
        '{\"en\":\"SPAMI Collaborative Platform\",\"fr\":\"Plateforme Collaborative ASPIM\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1346, 'og', 'program_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1347, 'og', 'program_translations.program_id', '{\"en\":\"Program id\",\"fr\":\"Program id\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1348, 'og', 'program_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1349, 'og', 'program_translations.title', '{\"en\":\"Title\",\"fr\":\"Title\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1350, 'og', 'program_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1351, 'og', 'map_layers.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1352, 'og', 'map_layers.create', '{\"en\":\"Create\",\"fr\":\"Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1353, 'og', 'map_layers.edit', '{\"en\":\"Edit\",\"fr\":\"Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1354, 'og', 'map_layers.menu_id', '{\"en\":\"Menu id\",\"fr\":\"Menu id\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1355, 'og', 'map_layers.is_active', '{\"en\":\"Is active\",\"fr\":\"Is active\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1356, 'og', 'map_layers.layer', '{\"en\":\"Layer\",\"fr\":\"Layer\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1357, 'og', 'map_layers.order', '{\"en\":\"Order\",\"fr\":\"Order\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1358, 'og', 'map_layers.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1359, 'og', 'map_layers.description', '{\"en\":\"Description\",\"fr\":\"Description\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1360, 'og', 'map_layers.created_at', '{\"en\":\"Created at\",\"fr\":\"Created at\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1361, 'og', 'map_layer_translations.id', '{\"en\":\"Id\",\"fr\":\"Id\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1362, 'og', 'map_layer_translations.map_layer_id', '{\"en\":\"Map layer id\",\"fr\":\"Map layer id\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1363, 'og', 'map_layer_translations.locale', '{\"en\":\"Locale\",\"fr\":\"Locale\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1364, 'og', 'map_layer_translations.name', '{\"en\":\"Name\",\"fr\":\"Name\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1365, 'og', 'map_layer_translations.description', '{\"en\":\"Description\",\"fr\":\"Description\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1366, 'og', 'forum_login.login_to_forum', '{\"en\":\"Connexion au forum\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1367, 'og', 'forum_login.home', '{\"en\":\"Accueil\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1368, 'og', 'forum_login.connexion', '{\"en\":\"CONNEXION\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1369, 'og', 'forum_login.email', '{\"en\":\"Adresse email\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1370, 'og', 'forum_login.password', '{\"en\":\"Mot de passe\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1371, 'og', 'forum_login.btn', '{\"en\":\"Connexion\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1372, 'og', 'footer.copyright', '{\"en\":\"\\u00a9 2019 PNUE-MAP-SPA\\/RAC\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1373, 'og', 'footer.site', '{\"en\":\"Site web d\\u00e9velopp\\u00e9 par\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1374, 'og', 'footer.medianet', '{\"en\":\"MEDIANET\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1375, 'og', '404.message', '{\"en\":\"Il semble que rien ne se trouve pas ici\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1376, 'og', '404.contact', '{\"en\":\"vous pouvez nous contacter aux num\\u00e9ros suivants:\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1377, 'og', '404.retour', '{\"en\":\"Retour \\u00e0 l\'accueil\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1378, 'og', 'plans', '{\"fr\":\"\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1379, 'og', 'aspims.publication_date', '{\"fr\":\"Date\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1380, 'permissions', 'faq_categories_index', '{\"en\":\"Faq Categories Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1381, 'permissions', 'faq_categories_create', '{\"en\":\"Faq Categories Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1382, 'permissions', 'faq_categories_edit', '{\"en\":\"Faq Categories Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1383, 'permissions', 'faq_items_index', '{\"en\":\"Faq Items Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1384, 'permissions', 'faq_items_create', '{\"en\":\"Faq Items Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1385, 'permissions', 'faq_items_edit', '{\"en\":\"Faq Items Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1386, 'permissions', 'parameters_index', '{\"en\":\"Parameters Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1387, 'permissions', 'parameters_create', '{\"en\":\"Parameters Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1388, 'permissions', 'parameters_edit', '{\"en\":\"Parameters Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1389, 'permissions', 'quotations_index', '{\"en\":\"Quotations Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1390, 'permissions', 'quotations_create', '{\"en\":\"Quotations Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1391, 'permissions', 'quotations_edit', '{\"en\":\"Quotations Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1392, 'permissions', 'menus_index', '{\"en\":\"Menus Index\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1393, 'permissions', 'menus_create', '{\"en\":\"Menus Create\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1394, 'permissions', 'menus_edit', '{\"en\":\"Menus Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1395, 'permissions', 'banners_index', '{\"en\":\"Banners Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1396, 'permissions', 'banners_create', '{\"en\":\"Banners Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1397, 'permissions', 'banners_edit', '{\"en\":\"Banners Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1398, 'permissions', 'cities_index', '{\"en\":\"Cities Index\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1399, 'permissions', 'cities_create', '{\"en\":\"Cities Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1400, 'permissions', 'cities_edit', '{\"en\":\"Cities Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1401, 'permissions', 'countries_index', '{\"en\":\"Countries Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1402, 'permissions', 'countries_create', '{\"en\":\"Countries Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1403, 'permissions', 'countries_edit', '{\"en\":\"Countries Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1404, 'permissions', 'events_index', '{\"en\":\"Events Index\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1405, 'permissions', 'events_create', '{\"en\":\"Events Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1406, 'permissions', 'events_edit', '{\"en\":\"Events Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1407, 'permissions', 'faqs_index', '{\"en\":\"Faqs Index\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1408, 'permissions', 'faqs_create', '{\"en\":\"Faqs Create\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1409, 'permissions', 'faqs_edit', '{\"en\":\"Faqs Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1410, 'permissions', 'modules_index', '{\"en\":\"Modules Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1411, 'permissions', 'modules_create', '{\"en\":\"Modules Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1412, 'permissions', 'modules_edit', '{\"en\":\"Modules Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1413, 'permissions', 'notifications_index', '{\"en\":\"Notifications Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1414, 'permissions', 'notifications_create', '{\"en\":\"Notifications Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1415, 'permissions', 'notifications_edit', '{\"en\":\"Notifications Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1416, 'permissions', 'news_index', '{\"en\":\"News Index\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1417, 'permissions', 'news_create', '{\"en\":\"News Create\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1418, 'permissions', 'news_edit', '{\"en\":\"News Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1419, 'permissions', 'widgets_index', '{\"en\":\"Widgets Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1420, 'permissions', 'widgets_create', '{\"en\":\"Widgets Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1421, 'permissions', 'widgets_edit', '{\"en\":\"Widgets Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1422, 'permissions', 'zones_index', '{\"en\":\"Zones Index\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1423, 'permissions', 'zones_create', '{\"en\":\"Zones Create\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1424, 'permissions', 'zones_edit', '{\"en\":\"Zones Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1425, 'permissions', 'lfm_index', '{\"en\":\"File Manager Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1426, 'permissions', 'lfm_create', '{\"en\":\"File Manager Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1427, 'permissions', 'lfm_edit', '{\"en\":\"File Manager Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1428, 'permissions', 'galleries_index', '{\"en\":\"Galleries Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1429, 'permissions', 'galleries_create', '{\"en\":\"Galleries Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1430, 'permissions', 'galleries_edit', '{\"en\":\"Galleries Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1431, 'permissions', 'governorates_index', '{\"en\":\"Governorates Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1432, 'permissions', 'governorates_create', '{\"en\":\"Governorates Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1433, 'permissions', 'governorates_edit', '{\"en\":\"Governorates Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1434, 'permissions', 'home_index', '{\"en\":\"Home Index\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1435, 'permissions', 'home_create', '{\"en\":\"Home Create\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1436, 'permissions', 'home_edit', '{\"en\":\"Home Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1437, 'permissions', 'locales_index', '{\"en\":\"Locales Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1438, 'permissions', 'locales_create', '{\"en\":\"Locales Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1439, 'permissions', 'locales_edit', '{\"en\":\"Locales Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1440, 'permissions', 'locations_index', '{\"en\":\"Locations Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1441, 'permissions', 'locations_create', '{\"en\":\"Locations Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1442, 'permissions', 'locations_edit', '{\"en\":\"Locations Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1443, 'permissions', 'pages_index', '{\"en\":\"Pages Index\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1444, 'permissions', 'pages_create', '{\"en\":\"Pages Create\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1445, 'permissions', 'pages_edit', '{\"en\":\"Pages Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1446, 'permissions', 'posts_index', '{\"en\":\"Posts Index\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1447, 'permissions', 'posts_create', '{\"en\":\"Posts Create\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1448, 'permissions', 'posts_edit', '{\"en\":\"Posts Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1449, 'permissions', 'partners_index', '{\"en\":\"Partners Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1450, 'permissions', 'partners_create', '{\"en\":\"Partners Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1451, 'permissions', 'partners_edit', '{\"en\":\"Partners Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1452, 'permissions', 'products_index', '{\"en\":\"Products Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1453, 'permissions', 'products_create', '{\"en\":\"Products Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1454, 'permissions', 'products_edit', '{\"en\":\"Products Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1455, 'permissions', 'appointments_index', '{\"en\":\"Appointments Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1456, 'permissions', 'appointments_create', '{\"en\":\"Appointments Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1457, 'permissions', 'appointments_edit', '{\"en\":\"Appointments Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1458, 'permissions', 'documents_index', '{\"en\":\"Documents Index\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1459, 'permissions', 'documents_create', '{\"en\":\"Documents Create\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1460, 'permissions', 'documents_edit', '{\"en\":\"Documents Edit\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1461, 'permissions', 'files_index', '{\"en\":\"Files Index\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1462, 'permissions', 'files_create', '{\"en\":\"Files Create\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1463, 'permissions', 'files_edit', '{\"en\":\"Files Edit\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1464, 'permissions', 'users.manage', '{\"en\":\"Manage Users\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1465, 'permissions', 'users.create', '{\"en\":\"Create Users\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1466, 'routes', 'front.pages.show', '{\"en\":\"page\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1467, 'routes', 'front.contact_message.show', '{\"en\":\"contact\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1468, 'routes', 'front.contact_message.submit', '{\"en\":\"contact\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1469, 'routes', 'front.organization', '{\"en\":\"organisation\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1470, 'sparac', 'aspims.statut', '{\"en\":\"Statut:\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1471, 'sparac', 'aspims.creation_date', '{\"en\":\"Ann\\u00e9e de Cr\\u00e9ation :\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1472, 'sparac', 'aspims.creation_text', '{\"en\":\"Texte de cr\\u00e9ation :\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1473, 'sparac', 'aspims.total_surface_marine', '{\"en\":\"Superficie Marine:\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1474, 'sparac', 'aspims.total_surface', '{\"en\":\"Superficie :\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1475, 'sparac', 'aspims.category', '{\"en\":\"Categorie :\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1476, 'sparac', 'aspims.countries', '{\"en\":\"Pays :\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1477, 'sparac', 'aspims.status', '{\"en\":\"Statut : \"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1478, 'sparac', 'aspims.width', '{\"en\":\"Longueur de la c\\u00f4te principal : \"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1479, 'sparac', 'aspims.included_at', '{\"en\":\"Date d\\u2019inclusion dans la liste : \"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1480, 'sparac', 'aspims.teritory', '{\"en\":\"Territoire : \"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1481, 'sparac', 'aspims.physical_features', '{\"en\":\"Caract\\u00e9ristique physique : \"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1482, 'sparac', 'aspims.mediterranean_importance', '{\"en\":\"Sp\\u00e9cificit\\u00e9 et importance :\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1483, 'sparac', 'aspims.threats_and_pressures', '{\"en\":\"Menaces et Pressions :\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1484, 'sparac', 'aspims.ecological_features', '{\"en\":\"Caract\\u00e9ristiques \\u00e9cologiques :\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1485, 'sparac', 'aspims.management_body', '{\"en\":\"Gestion :\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1486, 'sparac', 'aspims.geographic_position', '{\"en\":\"Position g\\u00e9ographique :\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1487, 'sparac', 'aspims.website', '{\"en\":\"Site web : \"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1488, 'sparac', 'aspims.download_pdf', '{\"en\":\"T\\u00e9l\\u00e9charger fiche PDF\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1489, 'sparac', 'aspims.keywords', '{\"en\":\"Rechercher dans la liste des ASPIM\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1490, 'sparac', 'aspims.filter_countries', '{\"en\":\"Pays\"}', '2020-12-31 14:37:33', '2020-12-31 14:37:33'),
       (1491, 'sparac', 'aspims.filter_included_at', '{\"en\":\"Ann\\u00e9 inscri.\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1492, 'sparac', 'aspims.filter_aspims', '{\"en\":\"Liste des aspims\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1493, 'sparac', 'aspims.no_result', '{\"en\":\"No element is found for your search\"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1494, 'sparac', 'aspims.schemas', '{\"en\":\"Sch\\u00e9ma ISEA : \"}', '2020-12-31 14:37:33',
        '2020-12-31 14:37:33'),
       (1495, 'sparac', 'aspims.download_the_schemas', '{\"en\":\"T\\u00e9l\\u00e9charger le sch\\u00e9ma ISEA\"}',
        '2020-12-31 14:37:33', '2020-12-31 14:37:33');
/*!40000 ALTER TABLE `language_lines`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `languages`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `deleted_by` int(11)               DEFAULT NULL,
    `created_by` int(11)               DEFAULT NULL,
    `updated_by` int(11)               DEFAULT NULL,
    `deleted_at` timestamp        NULL DEFAULT NULL,
    `created_at` timestamp        NULL DEFAULT NULL,
    `updated_at` timestamp        NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `languages`
--

LOCK TABLES `languages` WRITE;
/*!40000 ALTER TABLE `languages`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `languages`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link_types`
--

DROP TABLE IF EXISTS `link_types`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `link_types`
(
    `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `reference`  varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `deleted_at` timestamp                               NULL DEFAULT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link_types`
--

LOCK TABLES `link_types` WRITE;
/*!40000 ALTER TABLE `link_types`
    DISABLE KEYS */;
INSERT INTO `link_types`
VALUES (1, 'module', 'Module', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (2, 'internal_link', 'Internal Link', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (3, 'external_link', 'External Link', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26');
/*!40000 ALTER TABLE `link_types`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locales`
--

DROP TABLE IF EXISTS `locales`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locales`
(
    `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `reference`  varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `is_default` tinyint(1)                              NOT NULL DEFAULT 0,
    `is_active`  tinyint(1)                              NOT NULL DEFAULT 0,
    `is_rtl`     tinyint(1)                              NOT NULL DEFAULT 0,
    `deleted_by` int(11)                                          DEFAULT NULL,
    `created_by` int(11)                                          DEFAULT NULL,
    `updated_by` int(11)                                          DEFAULT NULL,
    `deleted_at` timestamp                               NULL     DEFAULT NULL,
    `created_at` timestamp                               NULL     DEFAULT NULL,
    `updated_at` timestamp                               NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `loc_name_unique` (`reference`, `deleted_at`),
    UNIQUE KEY `loc_ref_unique` (`name`, `deleted_at`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 4
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locales`
--

LOCK TABLES `locales` WRITE;
/*!40000 ALTER TABLE `locales`
    DISABLE KEYS */;
INSERT INTO `locales`
VALUES (1, 'fr', 'Français', 1, 1, 0, NULL, NULL, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (2, 'en', 'English', 0, 1, 0, NULL, NULL, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (3, 'ar', 'العربية', 0, 1, 1, NULL, NULL, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25');
/*!40000 ALTER TABLE `locales`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_layer_translations`
--

DROP TABLE IF EXISTS `map_layer_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_layer_translations`
(
    `id`           int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `map_layer_id` int(10) unsigned                        NOT NULL,
    `locale`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`         varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`  text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`   timestamp                               NULL DEFAULT NULL,
    `created_at`   timestamp                               NULL DEFAULT NULL,
    `updated_at`   timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `map_layer_translations_map_layer_id_foreign` (`map_layer_id`),
    CONSTRAINT `map_layer_translations_map_layer_id_foreign` FOREIGN KEY (`map_layer_id`) REFERENCES `map_layers` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_layer_translations`
--

LOCK TABLES `map_layer_translations` WRITE;
/*!40000 ALTER TABLE `map_layer_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `map_layer_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `map_layers`
--

DROP TABLE IF EXISTS `map_layers`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `map_layers`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned                        DEFAULT NULL,
    `layer`      varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL               DEFAULT 0,
    `order`      int(11)                                 DEFAULT NULL,
    `deleted_by` int(11)                                 DEFAULT NULL,
    `created_by` int(11)                                 DEFAULT NULL,
    `updated_by` int(11)                                 DEFAULT NULL,
    `deleted_at` timestamp        NULL                   DEFAULT NULL,
    `created_at` timestamp        NULL                   DEFAULT NULL,
    `updated_at` timestamp        NULL                   DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `map_layers_menu_id_foreign` (`menu_id`),
    CONSTRAINT `map_layers_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `map_layers`
--

LOCK TABLES `map_layers` WRITE;
/*!40000 ALTER TABLE `map_layers`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `map_layers`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media`
(
    `id`                int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `model_type`        varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `model_id`          bigint(20) unsigned                     NOT NULL,
    `collection_name`   varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`              varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `file_name`         varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `mime_type`         varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `disk`              varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `size`              int(10) unsigned                        NOT NULL,
    `manipulations`     varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `custom_properties` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `responsive_images` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `order_column`      int(10) unsigned                             DEFAULT NULL,
    `created_at`        timestamp                               NULL DEFAULT NULL,
    `updated_at`        timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `media_model_type_model_id_index` (`model_type`, `model_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `media`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_album_categories`
--

DROP TABLE IF EXISTS `media_album_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_album_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned          DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `order`      int(11)                   DEFAULT NULL,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `media_album_categories_menu_id_foreign` (`menu_id`),
    CONSTRAINT `media_album_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_album_categories`
--

LOCK TABLES `media_album_categories` WRITE;
/*!40000 ALTER TABLE `media_album_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `media_album_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_album_category_translations`
--

DROP TABLE IF EXISTS `media_album_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_album_category_translations`
(
    `id`                      int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `media_album_category_id` int(10) unsigned                        NOT NULL,
    `locale`                  varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`                    varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`                    varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`             text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`              timestamp                               NULL DEFAULT NULL,
    `created_at`              timestamp                               NULL DEFAULT NULL,
    `updated_at`              timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `media_album_category_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `fk_med_alb_cat` (`media_album_category_id`),
    CONSTRAINT `fk_med_alb_cat` FOREIGN KEY (`media_album_category_id`) REFERENCES `media_album_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_album_category_translations`
--

LOCK TABLES `media_album_category_translations` WRITE;
/*!40000 ALTER TABLE `media_album_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `media_album_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_album_translations`
--

DROP TABLE IF EXISTS `media_album_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_album_translations`
(
    `id`             int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `media_album_id` int(10) unsigned                        NOT NULL,
    `locale`         varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`    text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`     timestamp                               NULL DEFAULT NULL,
    `created_at`     timestamp                               NULL DEFAULT NULL,
    `updated_at`     timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `media_album_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `media_album_translations_media_album_id_foreign` (`media_album_id`),
    CONSTRAINT `media_album_translations_media_album_id_foreign` FOREIGN KEY (`media_album_id`) REFERENCES `media_albums` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_album_translations`
--

LOCK TABLES `media_album_translations` WRITE;
/*!40000 ALTER TABLE `media_album_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `media_album_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_albums`
--

DROP TABLE IF EXISTS `media_albums`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_albums`
(
    `id`                      int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`                 int(10) unsigned                        DEFAULT NULL,
    `is_active`               tinyint(1)       NOT NULL               DEFAULT 0,
    `order`                   int(11)                                 DEFAULT NULL,
    `url`                     varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `media_album_category_id` int(10) unsigned                        DEFAULT NULL,
    `deleted_by`              int(11)                                 DEFAULT NULL,
    `created_by`              int(11)                                 DEFAULT NULL,
    `updated_by`              int(11)                                 DEFAULT NULL,
    `deleted_at`              timestamp        NULL                   DEFAULT NULL,
    `created_at`              timestamp        NULL                   DEFAULT NULL,
    `updated_at`              timestamp        NULL                   DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `media_albums_menu_id_foreign` (`menu_id`),
    KEY `media_albums_media_album_category_id_foreign` (`media_album_category_id`),
    CONSTRAINT `media_albums_media_album_category_id_foreign` FOREIGN KEY (`media_album_category_id`) REFERENCES `media_album_categories` (`id`),
    CONSTRAINT `media_albums_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_albums`
--

LOCK TABLES `media_albums` WRITE;
/*!40000 ALTER TABLE `media_albums`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `media_albums`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_file_translations`
--

DROP TABLE IF EXISTS `media_file_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_file_translations`
(
    `id`            int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `media_file_id` int(10) unsigned                        NOT NULL,
    `locale`        varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`          varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`          varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`   text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`    timestamp                               NULL DEFAULT NULL,
    `created_at`    timestamp                               NULL DEFAULT NULL,
    `updated_at`    timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `media_file_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `media_file_translations_media_file_id_foreign` (`media_file_id`),
    CONSTRAINT `media_file_translations_media_file_id_foreign` FOREIGN KEY (`media_file_id`) REFERENCES `media_files` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_file_translations`
--

LOCK TABLES `media_file_translations` WRITE;
/*!40000 ALTER TABLE `media_file_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `media_file_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media_files`
--

DROP TABLE IF EXISTS `media_files`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media_files`
(
    `id`             int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `is_active`      tinyint(1)                              NOT NULL DEFAULT 0,
    `type`           varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `url`            varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `order`          int(11)                                          DEFAULT NULL,
    `menu_id`        int(10) unsigned                                 DEFAULT NULL,
    `media_album_id` int(10) unsigned                                 DEFAULT NULL,
    `deleted_by`     int(11)                                          DEFAULT NULL,
    `created_by`     int(11)                                          DEFAULT NULL,
    `updated_by`     int(11)                                          DEFAULT NULL,
    `deleted_at`     timestamp                               NULL     DEFAULT NULL,
    `created_at`     timestamp                               NULL     DEFAULT NULL,
    `updated_at`     timestamp                               NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `media_files_menu_id_foreign` (`menu_id`),
    KEY `media_files_media_album_id_foreign` (`media_album_id`),
    CONSTRAINT `media_files_media_album_id_foreign` FOREIGN KEY (`media_album_id`) REFERENCES `media_albums` (`id`),
    CONSTRAINT `media_files_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media_files`
--

LOCK TABLES `media_files` WRITE;
/*!40000 ALTER TABLE `media_files`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `media_files`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_banners`
--

DROP TABLE IF EXISTS `menu_banners`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_banners`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `deleted_by` int(11)               DEFAULT NULL,
    `created_by` int(11)               DEFAULT NULL,
    `updated_by` int(11)               DEFAULT NULL,
    `deleted_at` timestamp        NULL DEFAULT NULL,
    `created_at` timestamp        NULL DEFAULT NULL,
    `updated_at` timestamp        NULL DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_banners`
--

LOCK TABLES `menu_banners` WRITE;
/*!40000 ALTER TABLE `menu_banners`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `menu_banners`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_groups`
--

DROP TABLE IF EXISTS `menu_groups`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_groups`
(
    `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `reference`  varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `menu_groups_reference_unique` (`reference`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 8
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_groups`
--

LOCK TABLES `menu_groups` WRITE;
/*!40000 ALTER TABLE `menu_groups`
    DISABLE KEYS */;
INSERT INTO `menu_groups`
VALUES (1, 'Main menu', 'main-menu', '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (2, 'Secondary menu', 'secondary-menu', '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (3, 'Footer menu', 'footer-menu', '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (4, 'Other menu', 'other-menu', '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (5, 'Left menu', 'left-menu', '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (6, 'Right menu', 'right-menu', '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (7, 'Social menu', 'social-menu', '2020-12-31 14:37:26', '2020-12-31 14:37:26');
/*!40000 ALTER TABLE `menu_groups`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_translations`
--

DROP TABLE IF EXISTS `menu_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `menu_id`          int(10) unsigned                        NOT NULL,
    `label`            varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `meta_title`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `meta_description` text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `content`          longtext COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `menu_trans_slug_unique` (`slug`, `locale`, `deleted_at`),
    UNIQUE KEY `menu_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `menu_translations_menu_id_foreign` (`menu_id`),
    CONSTRAINT `menu_translations_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_translations`
--

LOCK TABLES `menu_translations` WRITE;
/*!40000 ALTER TABLE `menu_translations`
    DISABLE KEYS */;
INSERT INTO `menu_translations`
VALUES (1, 'fr', 1, 'fr Home', 'fr-home', 'fr Home', 'fr Home', 'fr Home', NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (2, 'en', 1, 'en Home', 'en-home', 'en Home', 'en Home', 'en Home', NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (3, 'ar', 1, 'ar Home', 'ar-home', 'ar Home', 'ar Home', 'ar Home', NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (4, 'fr', 2, 'fr google ', 'fr-google', 'fr meta title ', 'fr meta description ', 'fr menu content ', NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (5, 'en', 2, 'en google ', 'en-google', 'en meta title ', 'en meta description ', 'en menu content ', NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (6, 'ar', 2, 'ar google ', 'ar-google', 'ar meta title ', 'ar meta description ', 'ar menu content ', NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28');
/*!40000 ALTER TABLE `menu_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus`
(
    `id`               int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_group_id`    int(10) unsigned NOT NULL,
    `module_id`        int(10) unsigned                                       DEFAULT NULL,
    `route_name`       varchar(191) COLLATE utf8mb4_unicode_ci                DEFAULT NULL,
    `route_parameters` varchar(191) COLLATE utf8mb4_unicode_ci                DEFAULT NULL,
    `parent_id`        int(10) unsigned                                       DEFAULT NULL,
    `link_type_id`     int(11)                                                DEFAULT NULL,
    `http_protocol`    enum ('http://','https://') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `external_link`    varchar(191) COLLATE utf8mb4_unicode_ci                DEFAULT NULL,
    `internal_link`    varchar(191) COLLATE utf8mb4_unicode_ci                DEFAULT NULL,
    `link_target`      enum ('_blank','_self') COLLATE utf8mb4_unicode_ci     DEFAULT NULL,
    `is_active`        tinyint(1)       NOT NULL                              DEFAULT 1,
    `icon`             varchar(191) COLLATE utf8mb4_unicode_ci                DEFAULT NULL,
    `order`            int(11)                                                DEFAULT NULL,
    `css_class`        varchar(191) COLLATE utf8mb4_unicode_ci                DEFAULT NULL,
    `image1`           text COLLATE utf8mb4_unicode_ci                        DEFAULT NULL,
    `deleted_by`       int(11)                                                DEFAULT NULL,
    `created_by`       int(11)                                                DEFAULT NULL,
    `updated_by`       int(11)                                                DEFAULT NULL,
    `deleted_at`       timestamp        NULL                                  DEFAULT NULL,
    `created_at`       timestamp        NULL                                  DEFAULT NULL,
    `updated_at`       timestamp        NULL                                  DEFAULT NULL,
    `menu_id`          int(10) unsigned                                       DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `menus_module_id_foreign` (`module_id`),
    KEY `menus_parent_id_foreign` (`parent_id`),
    KEY `menus_menu_id_foreign` (`menu_id`),
    CONSTRAINT `menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
    CONSTRAINT `menus_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`),
    CONSTRAINT `menus_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus`
    DISABLE KEYS */;
INSERT INTO `menus`
VALUES (1, 1, 4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '', 10, '', '', NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (2, 5, NULL, NULL, NULL, NULL, 3, 'https://', 'www.google.com', NULL, '_blank', 0, '', 10, '', '', NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL);
/*!40000 ALTER TABLE `menus`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations`
(
    `id`        int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `batch`     int(11)                                 NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 90
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations`
    DISABLE KEYS */;
INSERT INTO `migrations`
VALUES (1, '2014_10_12_000000_create_users_table', 1),
       (2, '2014_10_12_100000_create_password_resets_table', 1),
       (3, '2018_01_08_232147_create_notifications_table', 1),
       (4, '2018_02_13_080300_create_modules_table', 1),
       (5, '2018_02_13_103757_create_permission_tables', 1),
       (6, '2018_02_13_103857_add_module_id_column_to_permissions_table', 1),
       (7, '2018_02_19_080327_create_menus_table', 1),
       (8, '2018_02_19_080935_create_post_categories_table', 1),
       (9, '2018_02_19_081820_create_banners_table', 1),
       (10, '2018_02_19_082228_create_contact_recipients_table', 1),
       (11, '2018_02_19_083647_create_faq_categories_table', 1),
       (12, '2018_02_19_084251_create_faq_items_table', 1),
       (13, '2018_02_19_085904_create_languages_table', 1),
       (14, '2018_02_19_090009_create_menu_banners_table', 1),
       (15, '2018_02_19_093453_create_newsletter_subscriptions_table', 1),
       (16, '2018_02_19_094136_create_pages_table', 1),
       (17, '2018_02_19_094300_create_parameter_groups_table', 1),
       (18, '2018_02_19_094334_create_parameters_table', 1),
       (19, '2018_02_19_094451_create_countries_table', 1),
       (20, '2018_02_19_094612_create_governorates_table', 1),
       (21, '2018_02_19_094757_create_contact_messages_table', 1),
       (22, '2018_02_19_100141_create_posts_table', 1),
       (23, '2018_02_21_145519_create_menu_groups_table', 1),
       (24, '2018_03_01_110732_create_link_types_table', 1),
       (25, '2018_03_02_085348_create_locales_table', 1),
       (26, '2018_03_12_143337_create_permission_route_name_table', 1),
       (27, '2018_03_23_132624_create_activity_log_table', 1),
       (28, '2018_03_27_140950_create_home_sections_table', 1),
       (29, '2018_06_27_075021_create_useful_link_categories_table', 1),
       (30, '2018_07_04_073821_create_event_categories_table', 1),
       (31, '2018_07_04_073821_create_file_categories_table', 1),
       (32, '2018_07_04_073821_create_news_categories_table', 1),
       (33, '2018_07_04_073821_create_procedure_categories_table', 1),
       (34, '2018_07_04_073821_create_training_categories_table', 1),
       (35, '2018_07_04_102029_create_media_table', 1),
       (36, '2018_07_04_102030_create_media_album_categories_table', 1),
       (37, '2018_07_04_102031_create_media_albums_table', 1),
       (38, '2018_07_04_102032_create_media_files_table', 1),
       (39, '2018_07_04_102033_create_news_table', 1),
       (40, '2018_07_05_083311_create_useful_links_table', 1),
       (41, '2018_07_05_102033_create_events_table', 1),
       (42, '2018_07_05_102033_create_files_table', 1),
       (43, '2018_07_05_102033_create_trainings_table', 1),
       (44, '2018_07_19_085333_add_column_has_access_bo_to_roles_table', 1),
       (45, '2018_07_19_085333_add_column_is_custom_app_role_to_roles_table', 1),
       (46, '2018_09_07_082637_create_cities_table', 1),
       (47, '2018_09_07_083748_create_zones_table', 1),
       (48, '2018_12_04_082510_create_language_lines_table', 1),
       (49, '2019_01_22_075021_create_partner_categories_table', 1),
       (50, '2019_01_22_075021_create_sitemaps_table', 1),
       (51, '2019_01_22_075021_create_testimonial_categories_table', 1),
       (52, '2019_01_22_083311_create_partners_table', 1),
       (53, '2019_01_22_083311_create_testimonials_table', 1),
       (54, '2019_01_27_093311_create_widgets_table', 1),
       (55, '2019_01_29_093311_create_widget_elements_table', 1),
       (56, '2019_02_12_093321_create_widget_menus_table', 1),
       (57, '2020_02_12_142633_create_plan_categories_table', 1),
       (58, '2020_02_13_073821_create_aspim_categories_table', 1),
       (59, '2020_02_13_102033_create_aspims_table', 1),
       (60, '2020_02_13_102033_update_trainings_table', 1),
       (61, '2020_02_13_103140_create_programs_table', 1),
       (62, '2020_02_13_135554_create_plans_table', 1),
       (63, '2020_02_14_092151_create_schemas_table', 1),
       (64, '2020_02_14_102032_create_outil_gestion_categories_table', 1),
       (65, '2020_02_14_102033_create_aspims_countries_table', 1),
       (66, '2020_02_14_102033_create_outil_gestions_table', 1),
       (67, '2020_02_18_121730_create_program_aspims_table', 1),
       (68, '2020_02_25_000000_create_gestionnaire_aspims_table', 1),
       (69, '2020_02_25_102033_create_aspims_gestionnaire_aspims_table', 1),
       (70, '2020_02_25_171118_create_chatter_categories_table', 1),
       (71, '2020_02_25_171118_create_chatter_discussion_table', 1),
       (72, '2020_02_25_171118_create_chatter_post_table', 1),
       (73, '2020_02_25_171128_create_foreign_keys', 1),
       (74, '2020_02_25_183143_add_slug_field_for_discussions', 1),
       (75, '2020_02_26_121747_add_color_row_to_chatter_discussions', 1),
       (76, '2020_02_26_121747_add_markdown_and_lock_to_chatter_posts', 1),
       (77, '2020_02_26_121747_create_chatter_user_discussion_pivot_table', 1),
       (78, '2020_02_26_165345_add_chatter_soft_deletes', 1),
       (79, '2020_02_26_221227_add_chatter_last_reply_at_discussion', 1),
       (80, '2020_02_27_092308_create_map_layers_table', 1),
       (81, '2020_03_24_221227_update_banners_table', 1),
       (82, '2020_03_24_221227_update_outil_gestions_table', 1),
       (83, '2020_03_27_221227_add_foreign_banners_table', 1),
       (84, '2020_03_27_221227_update_menus_table', 1),
       (85, '2020_04_13_102033_add_schema_aspims_table', 1),
       (86, '2020_04_13_102033_update_aspims_table', 1),
       (87, '2020_04_17_102033_update_creation_date_column_to_aspims_table', 1),
       (88, '2020_04_24_221227_add_menu_id_column_to_menus_table', 1),
       (89, '2020_12_13_102034_create_procedures_table', 1);
/*!40000 ALTER TABLE `migrations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_permissions`
(
    `permission_id` int(10) unsigned                        NOT NULL,
    `model_type`    varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `model_id`      bigint(20) unsigned                     NOT NULL,
    PRIMARY KEY (`permission_id`, `model_id`, `model_type`),
    KEY `model_has_permissions_model_type_model_id_index` (`model_type`, `model_id`),
    CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `model_has_roles`
(
    `role_id`    int(10) unsigned                        NOT NULL,
    `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `model_id`   bigint(20) unsigned                     NOT NULL,
    PRIMARY KEY (`role_id`, `model_id`, `model_type`),
    KEY `model_has_roles_model_type_model_id_index` (`model_type`, `model_id`),
    CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles`
    DISABLE KEYS */;
INSERT INTO `model_has_roles`
VALUES (1, 'App\\Models\\Cms\\User', 1),
       (2, 'App\\Models\\Cms\\User', 2);
/*!40000 ALTER TABLE `model_has_roles`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `module_translations`
--

DROP TABLE IF EXISTS `module_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `module_translations`
(
    `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `locale`     varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `module_id`  int(10) unsigned                        NOT NULL,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `deleted_at` timestamp                               NULL DEFAULT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `module_translations_module_id_locale_deleted_at_unique` (`module_id`, `locale`, `deleted_at`),
    CONSTRAINT `module_translations_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  AUTO_INCREMENT = 151
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `module_translations`
--

LOCK TABLES `module_translations` WRITE;
/*!40000 ALTER TABLE `module_translations`
    DISABLE KEYS */;
INSERT INTO `module_translations`
VALUES (1, 'fr', 1, 'Rendez-vous', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (2, 'en', 1, 'Rendez-vous', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (3, 'ar', 1, 'Rendez-vous', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (4, 'fr', 2, 'Gestion des aspims', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (5, 'en', 2, 'Gestion des aspims', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (6, 'ar', 2, 'Gestion des aspims', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (7, 'fr', 3, 'Gestionnaire des aspims', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (8, 'en', 3, 'Gestionnaire des aspims', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (9, 'ar', 3, 'Gestionnaire des aspims', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (10, 'fr', 4, 'Accueil', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (11, 'en', 4, 'Accueil', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (12, 'ar', 4, 'Accueil', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (13, 'fr', 5, 'Plan du site', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (14, 'en', 5, 'Plan du site', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (15, 'ar', 5, 'Plan du site', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (16, 'fr', 6, 'Contact Page', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (17, 'en', 6, 'Contact Page', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (18, 'ar', 6, 'Contact Page', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (19, 'fr', 7, 'Bannières', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (20, 'en', 7, 'Bannières', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (21, 'ar', 7, 'Bannières', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (22, 'fr', 8, 'Files', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (23, 'en', 8, 'Files', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (24, 'ar', 8, 'Files', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (25, 'fr', 9, 'FAQ', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (26, 'en', 9, 'FAQ', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (27, 'ar', 9, 'FAQ', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (28, 'fr', 10, 'Page', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (29, 'en', 10, 'Page', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (30, 'ar', 10, 'Page', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (31, 'fr', 11, 'Produit', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (32, 'en', 11, 'Produit', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (33, 'ar', 11, 'Produit', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (34, 'fr', 12, 'Devis', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (35, 'en', 12, 'Devis', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (36, 'ar', 12, 'Devis', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (37, 'fr', 13, 'Notifications', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (38, 'en', 13, 'Notifications', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (39, 'ar', 13, 'Notifications', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (40, 'fr', 14, 'Gestion Menus', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (41, 'en', 14, 'Gestion Menus', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (42, 'ar', 14, 'Gestion Menus', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (43, 'fr', 15, 'Paramètres', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (44, 'en', 15, 'Paramètres', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (45, 'ar', 15, 'Paramètres', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (46, 'fr', 16, 'File Manager', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (47, 'en', 16, 'File Manager', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (48, 'ar', 16, 'File Manager', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (49, 'fr', 17, 'Access Control List', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (50, 'en', 17, 'Access Control List', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (51, 'ar', 17, 'Access Control List', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (52, 'fr', 18, 'Gestion des utilisateurs', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (53, 'en', 18, 'Gestion des utilisateurs', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (54, 'ar', 18, 'Gestion des utilisateurs', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (55, 'fr', 19, 'Gestion des rôles', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (56, 'en', 19, 'Gestion des rôles', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (57, 'ar', 19, 'Gestion des rôles', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (58, 'fr', 20, 'Newsletter', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (59, 'en', 20, 'Newsletter', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (60, 'ar', 20, 'Newsletter', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (61, 'fr', 21, 'Locales', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (62, 'en', 21, 'Locales', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (63, 'ar', 21, 'Locales', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (64, 'fr', 22, 'Modules', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (65, 'en', 22, 'Modules', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (66, 'ar', 22, 'Modules', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (67, 'fr', 23, 'Posts', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (68, 'en', 23, 'Posts', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (69, 'ar', 23, 'Posts', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (70, 'fr', 24, 'Trainings', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (71, 'en', 24, 'Trainings', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (72, 'ar', 24, 'Trainings', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (73, 'fr', 25, 'Événements', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (74, 'en', 25, 'Événements', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (75, 'ar', 25, 'Événements', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (76, 'fr', 26, 'Useful Links', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (77, 'en', 26, 'Useful Links', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (78, 'ar', 26, 'Useful Links', NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (79, 'fr', 27, 'Traductions', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (80, 'en', 27, 'Traductions', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (81, 'ar', 27, 'Traductions', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (82, 'fr', 28, 'Gestion Localités', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (83, 'en', 28, 'Gestion Localités', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (84, 'ar', 28, 'Gestion Localités', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (85, 'fr', 29, 'Pays', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (86, 'en', 29, 'Pays', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (87, 'ar', 29, 'Pays', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (88, 'fr', 30, 'Gouvernorats', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (89, 'en', 30, 'Gouvernorats', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (90, 'ar', 30, 'Gouvernorats', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (91, 'fr', 31, 'Villes', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (92, 'en', 31, 'Villes', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (93, 'ar', 31, 'Villes', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (94, 'fr', 32, 'Zones', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (95, 'en', 32, 'Zones', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (96, 'ar', 32, 'Zones', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (97, 'fr', 33, 'Partenaires', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (98, 'en', 33, 'Partenaires', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (99, 'ar', 33, 'Partenaires', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (100, 'fr', 34, 'Actualités', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (101, 'en', 34, 'Actualités', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (102, 'ar', 34, 'Actualités', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (103, 'fr', 35, 'Widgets', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (104, 'en', 35, 'Widgets', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (105, 'ar', 35, 'Widgets', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (106, 'fr', 36, 'Média', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (107, 'en', 36, 'Média', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (108, 'ar', 36, 'Média', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (109, 'fr', 37, 'Témoignages', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (110, 'en', 37, 'Témoignages', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (111, 'ar', 37, 'Témoignages', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (112, 'fr', 38, 'Dev Tools', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (113, 'en', 38, 'Dev Tools', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (114, 'ar', 38, 'Dev Tools', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (115, 'fr', 39, 'Logs Dashboard', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (116, 'en', 39, 'Logs Dashboard', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (117, 'ar', 39, 'Logs Dashboard', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (118, 'fr', 40, 'Log files', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (119, 'en', 40, 'Log files', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (120, 'ar', 40, 'Log files', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (121, 'fr', 41, 'Cache cleaner', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (122, 'en', 41, 'Cache cleaner', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (123, 'ar', 41, 'Cache cleaner', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (124, 'fr', 42, 'Route list', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (125, 'en', 42, 'Route list', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (126, 'ar', 42, 'Route list', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (127, 'fr', 43, 'Programmes de jumelage', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (128, 'en', 43, 'Programmes de jumelage', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (129, 'ar', 43, 'Programmes de jumelage', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (130, 'fr', 44, 'Map layers', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (131, 'en', 44, 'Map layers', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (132, 'ar', 44, 'Map layers', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (133, 'fr', 45, 'Plans', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (134, 'en', 45, 'Plans', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (135, 'ar', 45, 'Plans', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (136, 'fr', 46, 'Schema Aspim', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (137, 'en', 46, 'Schema Aspim', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (138, 'ar', 46, 'Schema Aspim', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (139, 'fr', 47, 'Schemas', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (140, 'en', 47, 'Schemas', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (141, 'ar', 47, 'Schemas', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (142, 'fr', 48, 'Gestion Forum', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (143, 'en', 48, 'Gestion Forum', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (144, 'ar', 48, 'Gestion Forum', NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (145, 'fr', 49, 'Procedures', NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (146, 'en', 49, 'Procedures', NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (147, 'ar', 49, 'Procedures', NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (148, 'fr', 50, 'Outils de gestion', NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (149, 'en', 50, 'Outils de gestion', NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (150, 'ar', 50, 'Outils de gestion', NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28');
/*!40000 ALTER TABLE `module_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modules`
(
    `id`                       int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `reference`                varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `main_model`               varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `widget_orderable_columns` varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `is_active`                tinyint(1)                              NOT NULL DEFAULT 0,
    `is_menu_module`           tinyint(1)                              NOT NULL DEFAULT 0,
    `order`                    int(11)                                          DEFAULT NULL,
    `icon`                     varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `backend_route`            varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `frontend_route`           varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `front_namespace`          varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `front_controller`         varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `is_on_backend_sidebar`    tinyint(1)                              NOT NULL DEFAULT 0,
    `parent_id`                int(10) unsigned                                 DEFAULT NULL,
    `deleted_at`               timestamp                               NULL     DEFAULT NULL,
    `created_at`               timestamp                               NULL     DEFAULT NULL,
    `updated_at`               timestamp                               NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `modules_reference_unique` (`reference`),
    KEY `modules_parent_id_foreign` (`parent_id`),
    CONSTRAINT `modules_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `modules` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 51
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modules`
--

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules`
    DISABLE KEYS */;
INSERT INTO `modules`
VALUES (1, 'appointments', NULL, NULL, 1, 1, 150, '', 'back.appointments.index', 'back.appointments.index', 'Front',
        'AppointmentsController', 0, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (2, 'aspims', NULL, NULL, 1, 1, 150, '', 'back.aspims.index', 'back.aspims.index', 'Front', 'AspimsController',
        0, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (3, 'gestionnaire_aspims', NULL, NULL, 1, 1, 151, '', 'back.gestionnaire_aspim.index',
        'back.gestionnaire_aspim.index', 'Front', 'GestionnaireAspimController', 0, NULL, NULL, '2020-12-31 14:37:25',
        '2020-12-31 14:37:25'),
       (4, 'home', NULL, NULL, 0, 1, 50, '', 'back.front_home.index', 'back.home.index', 'Front', 'HomeController', 0,
        NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (5, 'sitemaps', 'App\\Models\\Cms\\Sitemap', NULL, 0, 1, 50, '', 'back.sitemaps.index', 'back.sitemaps.index',
        'Front', 'SitemapsController', 0, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (6, 'contact-messages', 'App\\Models\\Cms\\ContactMessage', NULL, 1, 1, 50, 'fa fa-envelope-o',
        'back.contact_messages.index', 'back.contact_messages.index', 'Front', 'ContactMessagesController', 1, NULL,
        NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (7, 'banners', 'App\\Models\\Cms\\Banner', '[\"created_at\",\"updated_at\"]', 1, 0, 150, '',
        'back.banners.index', 'back.banner.index', 'Front', 'BannersController', 1, NULL, NULL, '2020-12-31 14:37:25',
        '2020-12-31 14:37:25'),
       (8, 'files', 'App\\Models\\Cms\\File', NULL, 1, 1, 50, '', 'back.files.index', 'back.file.index', 'Front',
        'FilesController', 0, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (9, 'faqs', 'App\\Models\\Cms\\FaqItem', '[\"created_at\",\"updated_at\",\"order\"]', 1, 1, 50, '',
        'back.faq_items.index', 'back.faq_items.index', 'Front', 'FaqsController', 0, NULL, NULL, '2020-12-31 14:37:25',
        '2020-12-31 14:37:25'),
       (10, 'pages', 'App\\Models\\Cms\\Page', NULL, 1, 1, 50, '', 'back.pages.editByMenuId', 'back.pages.index',
        'Front', 'PagesController', 0, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (11, 'products', NULL, NULL, 1, 0, 50, '', 'back.products.index', 'back.products.index', 'Front',
        'ProductsController', 0, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (12, 'quotations', NULL, NULL, 1, 0, 150, '', 'back.quotations.index', 'back.quotations.index', 'Front',
        'QuotationsController', 0, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (13, 'notifications', NULL, NULL, 1, 0, 50, 'fa fa-bell', 'back.notifications.index', 'back.notifications.index',
        'Front', NULL, 1, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (14, 'menus', 'App\\Models\\Cms\\Menu', '[\"created_at\",\"updated_at\",\"order\"]', 1, 0, 10, '',
        'back.menus.index', 'back.menus.index', 'Front', 'MenusController', 1, NULL, NULL, '2020-12-31 14:37:25',
        '2020-12-31 14:37:25'),
       (15, 'parameters', NULL, NULL, 1, 0, 60, 'fa fa-cogs', 'back.parameters.index', 'back.parameters.index', 'Front',
        NULL, 1, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (16, 'lfm', NULL, NULL, 1, 0, 50, 'fa fa-image', 'back.custom-lfm', NULL, 'Front', NULL, 1, NULL, NULL,
        '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (17, 'acl', NULL, NULL, 1, 0, 50, 'fa fa-lock', NULL, NULL, 'Front', NULL, 1, NULL, NULL, '2020-12-31 14:37:25',
        '2020-12-31 14:37:25'),
       (18, 'users-management', NULL, NULL, 1, 0, 50, 'fa fa-user-plus', 'back.users.index', NULL, 'Front', NULL, 1, 17,
        NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (19, 'roles-management', NULL, NULL, 1, 0, 50, 'fa fa-users', 'back.roles.index', NULL, 'Front', NULL, 1, 17,
        NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (20, 'newsletter-subscriptions', NULL, NULL, 1, 0, 151, 'fa fa-envelope-o',
        'back.newsletter_subscriptions.index', NULL, 'Front', 'NewslettersController', 1, NULL, NULL,
        '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (21, 'locales', NULL, NULL, 1, 0, 51, 'fa fa-language', 'back.locales.index', NULL, 'Front', NULL, 1, NULL, NULL,
        '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (22, 'modules', NULL, NULL, 1, 0, 51, 'fa fa-industry', 'back.modules.index', NULL, 'Front', NULL, 0, NULL, NULL,
        '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (23, 'posts', NULL, NULL, 1, 0, 50, 'fa fa-file-text-o', 'back.post_categories.index', NULL, 'Front',
        'PostsController', 0, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (24, 'trainings', 'App\\Models\\Cms\\Training', '[\"created_at\",\"updated_at\",\"start_date\",\"end_date\"]', 1,
        1, 50, 'fa fa-calendar', 'back.trainings.index', NULL, 'Front', 'TrainingsController', 0, NULL, NULL,
        '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (25, 'events', 'App\\Models\\Cms\\Event', '[\"created_at\",\"updated_at\",\"start_date\",\"end_date\"]', 1, 1,
        50, 'fa fa-calendar', 'back.events.index', NULL, 'Front', 'EventsController', 0, NULL, NULL,
        '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (26, 'useful-links', 'App\\Models\\Cms\\UsefulLink', NULL, 1, 1, 50, 'fa fa-link', 'back.useful_links.index',
        NULL, 'Front', 'UsefulLinksController', 0, NULL, NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (27, 'app-texts', NULL, NULL, 1, 0, 50, 'fa fa-language', 'back.app_texts.index', NULL, 'Front', NULL, 1, NULL,
        NULL, '2020-12-31 14:37:25', '2020-12-31 14:37:25'),
       (28, 'location-management', NULL, NULL, 1, 0, 50, 'fa fa-globe', '#', NULL, 'Front', NULL, 1, NULL, NULL,
        '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (29, 'countries', NULL, NULL, 1, 0, 50, 'fa fa-globe', 'back.countries.index', NULL, 'Front', NULL, 1, 28, NULL,
        '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (30, 'governorates', NULL, NULL, 1, 0, 50, 'fa fa-globe', 'back.governorates.index', NULL, 'Front', NULL, 1, 28,
        NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (31, 'cities', NULL, NULL, 1, 0, 50, 'fa fa-globe', 'back.cities.index', NULL, 'Front', NULL, 1, 28, NULL,
        '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (32, 'zones', NULL, NULL, 1, 0, 50, 'fa fa-globe', 'back.zones.index', NULL, 'Front', NULL, 1, 28, NULL,
        '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (33, 'partners', 'App\\Models\\Cms\\Partner', '[\"created_at\",\"updated_at\",\"order\"]', 1, 1, 50,
        'fa fa-link', 'back.partners.index', NULL, 'Front', 'PartnersController', 0, NULL, NULL, '2020-12-31 14:37:26',
        '2020-12-31 14:37:26'),
       (34, 'news', 'App\\Models\\Cms\\News', '[\"created_at\",\"updated_at\",\"order\"]', 1, 1, 50, 'fa fa-calendar',
        'back.news.index', NULL, 'Front', 'NewsController', 0, NULL, NULL, '2020-12-31 14:37:26',
        '2020-12-31 14:37:26'),
       (35, 'widgets', NULL, NULL, 1, 0, 100, 'fa fa-puzzle-piece', 'back.widgets.index', NULL, NULL, NULL, 1, NULL,
        NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (36, 'media', 'App\\Models\\Cms\\MediaAlbum', '[\"created_at\",\"updated_at\",\"start_date\",\"end_date\"]', 1,
        1, 50, 'fa fa-image', 'back.media_albums.index', NULL, 'Front', 'MediaFilesController', 0, NULL, NULL,
        '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (37, 'testimonials', 'App\\Models\\Cms\\Testimonial', '[\"created_at\",\"updated_at\"]', 1, 1, 50, 'fa fa-image',
        'back.testimonials.index', NULL, 'Front', 'TestimonialsController', 0, NULL, NULL, '2020-12-31 14:37:26',
        '2020-12-31 14:37:26'),
       (38, 'dev-tools', NULL, NULL, 1, 0, 1000, 'fa fa-bug', NULL, NULL, NULL, NULL, 1, NULL, NULL,
        '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (39, 'logs-dashboard', NULL, NULL, 1, 0, 1000, 'fa fa-code', 'log-viewer::dashboard', NULL, NULL, NULL, 1, 38,
        NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (40, 'logs-list', NULL, NULL, 1, 0, 1000, 'fa fa-code', 'log-viewer::logs.list', NULL, NULL, NULL, 1, 38, NULL,
        '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (41, 'cache-cleaner', NULL, NULL, 1, 0, 1000, 'fa fa-code', 'back.cache-cleaner.index', NULL, NULL, NULL, 1, 38,
        NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (42, 'route-list', NULL, NULL, 1, 0, 1000, 'fa fa-code', 'back.routes.index', NULL, NULL, NULL, 1, 38, NULL,
        '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (43, 'programs', 'App\\Models\\Cms\\Program', '[\"created_at\",\"updated_at\",\"order\"]', 1, 1, 50,
        'fa fa-link', 'back.programs.index', NULL, 'Front', 'ProgramsController', 0, NULL, NULL, '2020-12-31 14:37:26',
        '2020-12-31 14:37:26'),
       (44, 'map_layers', 'App\\Models\\Cms\\MapLayer', '[\"created_at\",\"updated_at\",\"order\"]', 1, 1, 50,
        'fa fa-link', 'back.map_layers.index', NULL, 'Front', 'MapLayersController', 1, NULL, NULL,
        '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (45, 'plans', 'App\\Models\\Cms\\Plan', NULL, 1, 1, 50, '', 'back.plans.index', 'back.plan.index', 'Front',
        'PlansController', 0, NULL, NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (46, 'schema-aspim', NULL, NULL, 1, 0, 50, 'fa fa-globe', '#', NULL, 'Front', NULL, 1, NULL, NULL,
        '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (47, 'schemas', NULL, NULL, 1, 0, 150, '', 'back.schemas.index', NULL, 'Front', 'SchemasController', 1, 46, NULL,
        '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (48, 'gestion_forums', NULL, NULL, 1, 0, 150, '', 'back.gestion_forums.index', NULL, NULL, NULL, 1, NULL, NULL,
        '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (49, 'procedures', 'App\\Models\\Cms\\Procedure', NULL, 1, 1, 50, '', 'back.procedures.index',
        'back.procedures.index', 'Front', 'ProceduresController', 0, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (50, 'outil_gestions', 'App\\Models\\Cms\\OutilGestion', '[\"created_at\",\"updated_at\"]', 1, 1, 50,
        'fa fa-calendar', 'back.outil_gestions.index', NULL, 'Front', 'OutilGestionsController', 0, NULL, NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28');
/*!40000 ALTER TABLE `modules`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news`
(
    `id`               int(10) unsigned NOT NULL AUTO_INCREMENT,
    `is_active`        tinyint(1)       NOT NULL DEFAULT 0,
    `start_date`       datetime                  DEFAULT NULL,
    `end_date`         datetime                  DEFAULT NULL,
    `menu_id`          int(10) unsigned          DEFAULT NULL,
    `news_category_id` int(10) unsigned          DEFAULT NULL,
    `media_album_id`   int(10) unsigned          DEFAULT NULL,
    `deleted_by`       int(11)                   DEFAULT NULL,
    `created_by`       int(11)                   DEFAULT NULL,
    `updated_by`       int(11)                   DEFAULT NULL,
    `deleted_at`       timestamp        NULL     DEFAULT NULL,
    `created_at`       timestamp        NULL     DEFAULT NULL,
    `updated_at`       timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `news_menu_id_foreign` (`menu_id`),
    KEY `news_news_category_id_foreign` (`news_category_id`),
    KEY `news_media_album_id_foreign` (`media_album_id`),
    CONSTRAINT `news_media_album_id_foreign` FOREIGN KEY (`media_album_id`) REFERENCES `media_albums` (`id`),
    CONSTRAINT `news_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
    CONSTRAINT `news_news_category_id_foreign` FOREIGN KEY (`news_category_id`) REFERENCES `news_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `news`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_categories`
--

DROP TABLE IF EXISTS `news_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned          DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `order`      int(11)                   DEFAULT NULL,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `news_categories_menu_id_foreign` (`menu_id`),
    CONSTRAINT `news_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_categories`
--

LOCK TABLES `news_categories` WRITE;
/*!40000 ALTER TABLE `news_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `news_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_category_translations`
--

DROP TABLE IF EXISTS `news_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_category_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `news_category_id` int(10) unsigned                        NOT NULL,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`      text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `news_category_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `news_category_translations_news_category_id_foreign` (`news_category_id`),
    CONSTRAINT `news_category_translations_news_category_id_foreign` FOREIGN KEY (`news_category_id`) REFERENCES `news_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_category_translations`
--

LOCK TABLES `news_category_translations` WRITE;
/*!40000 ALTER TABLE `news_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `news_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news_translations`
--

DROP TABLE IF EXISTS `news_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news_translations`
(
    `id`          int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `news_id`     int(10) unsigned                        NOT NULL,
    `locale`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`        varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`        varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `pays`        varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `description` text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `image`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `deleted_at`  timestamp                               NULL DEFAULT NULL,
    `created_at`  timestamp                               NULL DEFAULT NULL,
    `updated_at`  timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `news_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `news_translations_news_id_foreign` (`news_id`),
    CONSTRAINT `news_translations_news_id_foreign` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news_translations`
--

LOCK TABLES `news_translations` WRITE;
/*!40000 ALTER TABLE `news_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `news_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletter_subscriptions`
--

DROP TABLE IF EXISTS `newsletter_subscriptions`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletter_subscriptions`
(
    `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `email`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `deleted_by` int(11)                                      DEFAULT NULL,
    `created_by` int(11)                                      DEFAULT NULL,
    `updated_by` int(11)                                      DEFAULT NULL,
    `deleted_at` timestamp                               NULL DEFAULT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `newsletter_subscriptions_email_deleted_at_unique` (`email`, `deleted_at`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletter_subscriptions`
--

LOCK TABLES `newsletter_subscriptions` WRITE;
/*!40000 ALTER TABLE `newsletter_subscriptions`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `newsletter_subscriptions`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications`
(
    `id`              char(36) COLLATE utf8mb4_unicode_ci     NOT NULL,
    `type`            varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `notifiable_id`   bigint(20) unsigned                     NOT NULL,
    `data`            text COLLATE utf8mb4_unicode_ci         NOT NULL,
    `read_at`         timestamp                               NULL DEFAULT NULL,
    `created_at`      timestamp                               NULL DEFAULT NULL,
    `updated_at`      timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`, `notifiable_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outil_gestion_categories`
--

DROP TABLE IF EXISTS `outil_gestion_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outil_gestion_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned          DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `order`      int(11)                   DEFAULT NULL,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `outil_gestion_categories_menu_id_foreign` (`menu_id`),
    CONSTRAINT `outil_gestion_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outil_gestion_categories`
--

LOCK TABLES `outil_gestion_categories` WRITE;
/*!40000 ALTER TABLE `outil_gestion_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `outil_gestion_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outil_gestion_category_translations`
--

DROP TABLE IF EXISTS `outil_gestion_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outil_gestion_category_translations`
(
    `id`                        int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `outil_gestion_category_id` int(10) unsigned                        NOT NULL,
    `locale`                    varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`                      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`                      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`               text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`                timestamp                               NULL DEFAULT NULL,
    `created_at`                timestamp                               NULL DEFAULT NULL,
    `updated_at`                timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `slug_local_deleted_unique` (`slug`, `locale`, `deleted_at`),
    KEY `category_id` (`outil_gestion_category_id`),
    CONSTRAINT `category_id` FOREIGN KEY (`outil_gestion_category_id`) REFERENCES `outil_gestion_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outil_gestion_category_translations`
--

LOCK TABLES `outil_gestion_category_translations` WRITE;
/*!40000 ALTER TABLE `outil_gestion_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `outil_gestion_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outil_gestion_translations`
--

DROP TABLE IF EXISTS `outil_gestion_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outil_gestion_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `outil_gestion_id` int(10) unsigned                        NOT NULL,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `meta_title`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    `type`             varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `url_video`        varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `url_lien`         varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `outil_gestion_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `outil_gestion_translations_outil_gestion_id_foreign` (`outil_gestion_id`),
    CONSTRAINT `outil_gestion_translations_outil_gestion_id_foreign` FOREIGN KEY (`outil_gestion_id`) REFERENCES `outil_gestions` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outil_gestion_translations`
--

LOCK TABLES `outil_gestion_translations` WRITE;
/*!40000 ALTER TABLE `outil_gestion_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `outil_gestion_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `outil_gestions`
--

DROP TABLE IF EXISTS `outil_gestions`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `outil_gestions`
(
    `id`                        int(10) unsigned NOT NULL AUTO_INCREMENT,
    `is_active`                 tinyint(1)       NOT NULL DEFAULT 0,
    `menu_id`                   int(10) unsigned          DEFAULT NULL,
    `outil_gestion_category_id` int(10) unsigned          DEFAULT NULL,
    `aspim_id`                  int(10) unsigned          DEFAULT NULL,
    `deleted_by`                int(11)                   DEFAULT NULL,
    `created_by`                int(11)                   DEFAULT NULL,
    `updated_by`                int(11)                   DEFAULT NULL,
    `deleted_at`                timestamp        NULL     DEFAULT NULL,
    `created_at`                timestamp        NULL     DEFAULT NULL,
    `updated_at`                timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `outil_gestions_menu_id_foreign` (`menu_id`),
    KEY `outil_gestion_category_id` (`outil_gestion_category_id`),
    KEY `aspim_id` (`aspim_id`),
    CONSTRAINT `aspim_id` FOREIGN KEY (`aspim_id`) REFERENCES `aspims` (`id`),
    CONSTRAINT `outil_gestion_category_id` FOREIGN KEY (`outil_gestion_category_id`) REFERENCES `outil_gestion_categories` (`id`),
    CONSTRAINT `outil_gestions_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `outil_gestions`
--

LOCK TABLES `outil_gestions` WRITE;
/*!40000 ALTER TABLE `outil_gestions`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `outil_gestions`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_translations`
--

DROP TABLE IF EXISTS `page_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `page_id`          int(10) unsigned                        NOT NULL,
    `title`            varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `content`          longtext COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `meta_title`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `meta_description` text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `pt_deletedAt_unique` (`page_id`, `locale`, `deleted_at`),
    CONSTRAINT `page_translations_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_translations`
--

LOCK TABLES `page_translations` WRITE;
/*!40000 ALTER TABLE `page_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `page_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned NOT NULL,
    `deleted_by` int(11)               DEFAULT NULL,
    `created_by` int(11)               DEFAULT NULL,
    `updated_by` int(11)               DEFAULT NULL,
    `deleted_at` timestamp        NULL DEFAULT NULL,
    `created_at` timestamp        NULL DEFAULT NULL,
    `updated_at` timestamp        NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `pages_menu_id_foreign` (`menu_id`),
    CONSTRAINT `pages_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `pages`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parameter_groups`
--

DROP TABLE IF EXISTS `parameter_groups`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parameter_groups`
(
    `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `reference`  varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `deleted_by` int(11)                                      DEFAULT NULL,
    `created_by` int(11)                                      DEFAULT NULL,
    `updated_by` int(11)                                      DEFAULT NULL,
    `deleted_at` timestamp                               NULL DEFAULT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `parameter_groups_name_unique` (`name`),
    UNIQUE KEY `parameter_groups_reference_deleted_at_unique` (`reference`, `deleted_at`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 10
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parameter_groups`
--

LOCK TABLES `parameter_groups` WRITE;
/*!40000 ALTER TABLE `parameter_groups`
    DISABLE KEYS */;
INSERT INTO `parameter_groups`
VALUES (1, 'general', 'General', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (2, 'logo', 'Logo', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (3, 'colors', 'Colors', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (4, 'location', 'Location', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (5, 'social', 'Social', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (6, 'misc', 'Misc', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (7, 'smtp', 'SMTP', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (8, 'google_apis', 'Google APIs', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (9, 'others', 'Others', NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28');
/*!40000 ALTER TABLE `parameter_groups`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `parameters`
--

DROP TABLE IF EXISTS `parameters`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `parameters`
(
    `id`                 int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `name`               varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `reference`          varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `value`              text COLLATE utf8mb4_unicode_ci                  DEFAULT NULL,
    `parameter_group_id` int(10) unsigned                        NOT NULL DEFAULT 1,
    `module_id`          int(10) unsigned                                 DEFAULT NULL,
    `deleted_by`         int(11)                                          DEFAULT NULL,
    `created_by`         int(11)                                          DEFAULT NULL,
    `updated_by`         int(11)                                          DEFAULT NULL,
    `deleted_at`         timestamp                               NULL     DEFAULT NULL,
    `created_at`         timestamp                               NULL     DEFAULT NULL,
    `updated_at`         timestamp                               NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `parameters_reference_deleted_at_unique` (`reference`, `deleted_at`),
    KEY `parameters_parameter_group_id_foreign` (`parameter_group_id`),
    KEY `parameters_module_id_foreign` (`module_id`),
    CONSTRAINT `parameters_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`),
    CONSTRAINT `parameters_parameter_group_id_foreign` FOREIGN KEY (`parameter_group_id`) REFERENCES `parameter_groups` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 44
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `parameters`
--

LOCK TABLES `parameters` WRITE;
/*!40000 ALTER TABLE `parameters`
    DISABLE KEYS */;
INSERT INTO `parameters`
VALUES (1, 'Website name', 'website_name', 'CMS Laravel', 1, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (2, 'Description', 'description',
        'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta. Mauris massa. Vestibulum lacinia arcu eget nulla. ',
        1, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (3, 'Main logo', 'main_logo', 'https://via.placeholder.com/150x40.png?text=Laravel', 2, NULL, NULL, NULL, NULL,
        NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (4, 'Mobile logo', 'mobile_logo', 'https://via.placeholder.com/150x40.png?text=Laravel', 2, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (5, 'Footer logo', 'footer_logo', 'https://via.placeholder.com/150x40.png?text=Laravel', 2, NULL, NULL, NULL,
        NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (6, 'Other Logo', 'other_logo', 'https://via.placeholder.com/150x40.png?text=Laravel', 2, NULL, NULL, NULL, NULL,
        NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (7, 'Backend Theme', 'backend_theme', 'darkblue', 3, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (8, 'Color', 'color', '#f651c7', 3, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (9, 'Color code', 'color_code', '#4d93b4', 3, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (10, 'Label color code', 'label_color_code', '#8f4f67', 3, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (11, 'Background color code', 'background_color_code', '#695de2', 3, NULL, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (12, 'Lang', 'lang', '', 1, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (13, 'Country', 'country', '', 1, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (14, 'Region', 'region', '', 1, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (15, 'Contact lat', 'contact_lat', '', 1, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (16, 'Contact lng', 'contact_lng', '', 1, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (17, 'Phone', 'phone', '+ 123 456 789', 1, 3, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (18, 'Email', 'email', 'contact@medianet.test', 1, 3, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (19, 'Website', 'website', NULL, 1, 3, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (20, 'Address', 'address', NULL, 1, 3, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (21, 'Map lat', 'map_lat', NULL, 4, 3, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (22, 'Map lng', 'map_lng', NULL, 4, 3, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (23, 'Map Image', 'map_image', '', 4, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (24, 'Facebook', 'facebook', 'https://fb.com/cms.laravel.dev', 5, 3, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (25, 'Vimeo', 'vimeo', 'https://vimeo.com/+CmsLaravelDev', 5, 3, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (26, 'RSS', 'rss', 'https://cms-laravel.test/rss', 5, 3, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (27, 'Instagram', 'instagram', 'https://instagram.com/cms.laravel.dev', 5, 3, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (28, 'Twitter', 'twitter', 'https://twitter.com/@CmsLaravelDev', 5, 3, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (29, 'Youtube', 'youtube', 'https://youtube.com/CmsLaravelDev', 5, 3, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (30, 'Google plus', 'google_plus', 'https://plus.google.com/+CmsLaravelDev', 5, 3, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (31, 'Linkedin', 'linkedin', 'https://linkdin.com/in/CmsLaravelDev', 5, 3, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (32, 'Mail driver', 'mail_driver', 'log', 7, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (33, 'Mail host', 'mail_host', 'smtp.mailtrap.io', 7, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (34, 'Mail port', 'mail_port', '2525', 7, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (35, 'Mail username', 'mail_username', NULL, 7, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (36, 'Mail From Address', 'mail_from_address', 'contact@medianet.test', 7, NULL, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (37, 'Mail From Name', 'mail_from_name', 'Contact CMS Laravel', 7, NULL, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (38, 'Mail password', 'mail_password', NULL, 7, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (39, 'Mail encryption', 'mail_encryption', NULL, 7, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (40, 'Analytics', 'analytics', NULL, 8, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (41, 'Analytics for backoffice', 'analytics_for_backoffice', NULL, 8, NULL, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (42, 'Tag Manager', 'tag_manager', NULL, 8, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (43, 'Maps key', 'maps_key', NULL, 8, NULL, NULL, NULL, NULL, NULL, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28');
/*!40000 ALTER TABLE `parameters`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner_categories`
--

DROP TABLE IF EXISTS `partner_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned          DEFAULT NULL,
    `order`      int(11)                   DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `partner_categories_menu_id_foreign` (`menu_id`),
    CONSTRAINT `partner_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner_categories`
--

LOCK TABLES `partner_categories` WRITE;
/*!40000 ALTER TABLE `partner_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `partner_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner_category_translations`
--

DROP TABLE IF EXISTS `partner_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_category_translations`
(
    `id`                  int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `partner_category_id` int(10) unsigned                        NOT NULL,
    `locale`              varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`                varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `title`               varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`         text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`          timestamp                               NULL DEFAULT NULL,
    `created_at`          timestamp                               NULL DEFAULT NULL,
    `updated_at`          timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `partner_category_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `partner_category_translations_partner_category_id_foreign` (`partner_category_id`),
    CONSTRAINT `partner_category_translations_partner_category_id_foreign` FOREIGN KEY (`partner_category_id`) REFERENCES `partner_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner_category_translations`
--

LOCK TABLES `partner_category_translations` WRITE;
/*!40000 ALTER TABLE `partner_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `partner_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partner_translations`
--

DROP TABLE IF EXISTS `partner_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partner_translations`
(
    `id`          int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `partner_id`  int(10) unsigned                        NOT NULL,
    `locale`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `title`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`  timestamp                               NULL DEFAULT NULL,
    `created_at`  timestamp                               NULL DEFAULT NULL,
    `updated_at`  timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `partner_translations_partner_id_foreign` (`partner_id`),
    CONSTRAINT `partner_translations_partner_id_foreign` FOREIGN KEY (`partner_id`) REFERENCES `partners` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partner_translations`
--

LOCK TABLES `partner_translations` WRITE;
/*!40000 ALTER TABLE `partner_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `partner_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `partners`
(
    `id`                  int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `menu_id`             int(10) unsigned                                 DEFAULT NULL,
    `is_active`           tinyint(1)                              NOT NULL DEFAULT 0,
    `order`               int(11)                                          DEFAULT NULL,
    `partner_category_id` int(10) unsigned                                 DEFAULT NULL,
    `protocol`            varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `url`                 varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `image`               varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `deleted_by`          int(11)                                          DEFAULT NULL,
    `created_by`          int(11)                                          DEFAULT NULL,
    `updated_by`          int(11)                                          DEFAULT NULL,
    `deleted_at`          timestamp                               NULL     DEFAULT NULL,
    `created_at`          timestamp                               NULL     DEFAULT NULL,
    `updated_at`          timestamp                               NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `partners_menu_id_foreign` (`menu_id`),
    KEY `partners_partner_category_id_foreign` (`partner_category_id`),
    CONSTRAINT `partners_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
    CONSTRAINT `partners_partner_category_id_foreign` FOREIGN KEY (`partner_category_id`) REFERENCES `partner_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partners`
--

LOCK TABLES `partners` WRITE;
/*!40000 ALTER TABLE `partners`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `partners`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets`
(
    `email`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    KEY `password_resets_email_index` (`email`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_route_name`
--

DROP TABLE IF EXISTS `permission_route_name`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_route_name`
(
    `id`            int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `route_name`    varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `permission_id` int(10) unsigned                             DEFAULT NULL,
    `module_id`     int(10) unsigned                             DEFAULT NULL,
    `is_active`     tinyint(1)                                   DEFAULT 0,
    `created_at`    timestamp                               NULL DEFAULT NULL,
    `updated_at`    timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `permission_route_name_permission_id_route_name_unique` (`permission_id`, `route_name`),
    KEY `permission_route_name_module_id_foreign` (`module_id`),
    CONSTRAINT `permission_route_name_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`),
    CONSTRAINT `permission_route_name_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 460
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_route_name`
--

LOCK TABLES `permission_route_name` WRITE;
/*!40000 ALTER TABLE `permission_route_name`
    DISABLE KEYS */;
INSERT INTO `permission_route_name`
VALUES (1, 'pretty-routes.show', 1, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (2, 'unisharp.lfm.show', 2, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (3, 'unisharp.lfm.getErrors', 3, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (4, 'unisharp.lfm.upload', 4, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (5, 'unisharp.lfm.getItems', 5, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (6, 'unisharp.lfm.getAddfolder', 6, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (7, 'unisharp.lfm.getDeletefolder', 7, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (8, 'unisharp.lfm.getFolders', 8, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (9, 'unisharp.lfm.getCrop', 9, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (10, 'unisharp.lfm.getCropimage', 10, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (11, 'unisharp.lfm.getRename', 11, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (12, 'unisharp.lfm.getResize', 12, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (13, 'unisharp.lfm.performResize', 13, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (14, 'unisharp.lfm.getDownload', 14, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (15, 'unisharp.lfm.getDelete', 15, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (16, 'unisharp.lfm.', 16, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (17, 'back.menu-module-redirection', 17, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (18, 'back.home', 18, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (19, 'back.front_home.index', 19, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (20, 'back.front_home.create', 20, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (21, 'back.front_home.store', 21, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (22, 'back.front_home.show', 22, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (23, 'back.front_home.edit', 23, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (24, 'back.front_home.update', 24, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (25, 'back.front_home.destroy', 25, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (26, 'back.routes.index', 26, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (27, 'back.cache-cleaner.index', 27, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (28, 'back.cache-cleaner.clear', 28, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (29, 'back.custom-lfm', 29, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (30, 'back.users.index', 30, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (31, 'back.users.create', 31, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (32, 'back.users.store', 32, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (33, 'back.users.show', 33, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (34, 'back.users.edit', 34, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (35, 'back.users.update', 35, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (36, 'back.users.destroy', 36, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (37, 'back.roles.index', 37, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (38, 'back.roles.store', 38, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (39, 'back.roles.show', 39, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (40, 'back.roles.edit', 40, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (41, 'back.roles.update', 41, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (42, 'back.roles.destroy', 42, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (43, 'back.roles.change-permission-status', 43, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (44, 'back.my-profile', 44, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (45, 'back.user_profile.update', 45, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (46, 'back.menu-groups.update-order', 46, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (47, 'back.menus.edit-module', 47, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (48, 'back.menus.datatables', 48, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (49, 'back.menus.toggle-status', 49, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (50, 'back.menus.index', 50, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (51, 'back.menus.create', 51, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (52, 'back.menus.store', 52, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (53, 'back.menus.show', 53, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (54, 'back.menus.edit', 54, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (55, 'back.menus.update', 55, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (56, 'back.menus.destroy', 56, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (57, 'back.locales.datatables', 57, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (58, 'back.locales.index', 58, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (59, 'back.locales.create', 59, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (60, 'back.locales.store', 60, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (61, 'back.locales.show', 61, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (62, 'back.locales.edit', 62, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (63, 'back.locales.update', 63, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (64, 'back.locales.destroy', 64, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (65, 'back.post_categories.datatables', 65, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (66, 'back.post_categories.index', 66, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (67, 'back.post_categories.create', 67, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (68, 'back.post_categories.store', 68, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (69, 'back.post_categories.show', 69, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (70, 'back.post_categories.edit', 70, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (71, 'back.post_categories.update', 71, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (72, 'back.post_categories.destroy', 72, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (73, 'back.banners.datatables', 73, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (74, 'back.banners.index', 74, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (75, 'back.banners.create', 75, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (76, 'back.banners.store', 76, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (77, 'back.banners.show', 77, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (78, 'back.banners.edit', 78, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (79, 'back.banners.update', 79, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (80, 'back.banners.destroy', 80, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (81, 'back.contact_recipients.datatables', 81, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (82, 'back.contact_recipients.index', 82, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (83, 'back.contact_recipients.create', 83, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (84, 'back.contact_recipients.store', 84, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (85, 'back.contact_recipients.show', 85, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (86, 'back.contact_recipients.edit', 86, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (87, 'back.contact_recipients.update', 87, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (88, 'back.contact_recipients.destroy', 88, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (89, 'back.contact_messages.datatables', 89, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (90, 'back.contact_messages.export', 90, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (91, 'back.contact_messages.index', 91, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (92, 'back.contact_messages.create', 92, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (93, 'back.contact_messages.store', 93, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (94, 'back.contact_messages.show', 94, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (95, 'back.contact_messages.edit', 95, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (96, 'back.contact_messages.update', 96, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (97, 'back.contact_messages.destroy', 97, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (98, 'back.faq_categories.index', 98, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (99, 'back.faq_categories.create', 99, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (100, 'back.faq_categories.store', 100, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (101, 'back.faq_categories.show', 101, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (102, 'back.faq_categories.edit', 102, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (103, 'back.faq_categories.update', 103, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (104, 'back.faq_categories.destroy', 104, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (105, 'back.faq_items.index', 105, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (106, 'back.faq_items.create', 106, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (107, 'back.faq_items.store', 107, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (108, 'back.faq_items.show', 108, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (109, 'back.faq_items.edit', 109, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (110, 'back.faq_items.update', 110, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (111, 'back.faq_items.destroy', 111, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (112, 'back.gestion_forums.index', 112, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (113, 'back.gestion_forums.create', 113, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (114, 'back.gestion_forums.store', 114, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (115, 'back.gestion_forums.show', 115, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (116, 'back.gestion_forums.edit', 116, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (117, 'back.gestion_forums.update', 117, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (118, 'back.gestion_forums.destroy', 118, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (119, 'back.post_forums.index', 119, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (120, 'back.post_forums.create', 120, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (121, 'back.post_forums.store', 121, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (122, 'back.post_forums.show', 122, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (123, 'back.post_forums.edit', 123, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (124, 'back.post_forums.update', 124, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (125, 'back.post_forums.destroy', 125, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (126, 'back.category_forums.index', 126, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (127, 'back.category_forums.create', 127, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (128, 'back.category_forums.store', 128, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (129, 'back.category_forums.show', 129, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (130, 'back.category_forums.edit', 130, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (131, 'back.category_forums.update', 131, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (132, 'back.category_forums.destroy', 132, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (133, 'back.languages.datatables', 133, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (134, 'back.languages.index', 134, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (135, 'back.languages.create', 135, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (136, 'back.languages.store', 136, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (137, 'back.languages.show', 137, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (138, 'back.languages.edit', 138, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (139, 'back.languages.update', 139, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (140, 'back.languages.destroy', 140, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (141, 'back.menu_banners.datatables', 141, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (142, 'back.menu_banners.index', 142, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (143, 'back.menu_banners.create', 143, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (144, 'back.menu_banners.store', 144, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (145, 'back.menu_banners.show', 145, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (146, 'back.menu_banners.edit', 146, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (147, 'back.menu_banners.update', 147, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (148, 'back.menu_banners.destroy', 148, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (149, 'back.modules.datatables', 149, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (150, 'back.modules.index', 150, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (151, 'back.modules.create', 151, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (152, 'back.modules.store', 152, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (153, 'back.modules.edit', 153, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (154, 'back.modules.update', 154, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (155, 'back.modules.destroy', 155, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (156, 'back.newsletter_subscriptions.datatables', 156, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (157, 'back.newsletter_subscriptions.index', 157, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (158, 'back.newsletter_subscriptions.store', 158, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (159, 'back.newsletter_subscriptions.destroy', 159, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (160, 'back.notifications.show', 160, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (161, 'back.notifications.index', 161, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (162, 'back.pages.datatables', 162, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (163, 'back.pages.editByMenuId', 163, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (164, 'back.pages.index', 164, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (165, 'back.pages.show', 165, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (166, 'back.pages.edit', 166, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (167, 'back.pages.update', 167, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (168, 'back.pages.destroy', 168, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (169, 'back.parameter_groups.datatables', 169, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (170, 'back.parameter_groups.index', 170, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (171, 'back.parameter_groups.create', 171, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (172, 'back.parameter_groups.store', 172, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (173, 'back.parameter_groups.show', 173, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (174, 'back.parameter_groups.edit', 174, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (175, 'back.parameter_groups.update', 175, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (176, 'back.parameter_groups.destroy', 176, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (177, 'back.parameters.datatables', 177, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (178, 'back.parameters.update-key-value-pairs', 178, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (179, 'back.parameters.index', 179, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (180, 'back.parameters.create', 180, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (181, 'back.parameters.store', 181, NULL, 0, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (182, 'back.parameters.show', 182, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (183, 'back.parameters.edit', 183, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (184, 'back.parameters.update', 184, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (185, 'back.parameters.destroy', 185, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (186, 'back.countries.datatables', 186, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (187, 'back.countries.index', 187, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (188, 'back.countries.create', 188, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (189, 'back.countries.store', 189, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (190, 'back.countries.show', 190, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (191, 'back.countries.edit', 191, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (192, 'back.countries.update', 192, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (193, 'back.countries.destroy', 193, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (194, 'back.posts.datatables', 194, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (195, 'back.posts.index', 195, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (196, 'back.posts.create', 196, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (197, 'back.posts.store', 197, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (198, 'back.posts.show', 198, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (199, 'back.posts.edit', 199, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (200, 'back.posts.update', 200, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (201, 'back.posts.destroy', 201, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (202, 'back.events.index', 202, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (203, 'back.events.create', 203, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (204, 'back.events.store', 204, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (205, 'back.events.show', 205, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (206, 'back.events.edit', 206, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (207, 'back.events.update', 207, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (208, 'back.events.destroy', 208, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (209, 'back.event_categories.index', 209, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (210, 'back.event_categories.create', 210, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (211, 'back.event_categories.store', 211, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (212, 'back.event_categories.show', 212, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (213, 'back.event_categories.edit', 213, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (214, 'back.event_categories.update', 214, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (215, 'back.event_categories.destroy', 215, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (216, 'back.aspims.datatables', 216, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (217, 'back.aspim_categories.datatables', 217, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (218, 'back.aspims.index', 218, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (219, 'back.aspims.create', 219, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (220, 'back.aspims.store', 220, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (221, 'back.aspims.show', 221, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (222, 'back.aspims.edit', 222, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (223, 'back.aspims.update', 223, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (224, 'back.aspims.destroy', 224, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (225, 'back.gestionnaire_aspim.datatables', 225, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (226, 'back.gestionnaire_aspim.index', 226, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (227, 'back.gestionnaire_aspim.create', 227, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (228, 'back.gestionnaire_aspim.store', 228, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (229, 'back.gestionnaire_aspim.show', 229, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (230, 'back.gestionnaire_aspim.edit', 230, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (231, 'back.gestionnaire_aspim.update', 231, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (232, 'back.gestionnaire_aspim.destroy', 232, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (233, 'back.aspim_categories.index', 233, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (234, 'back.aspim_categories.create', 234, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (235, 'back.aspim_categories.store', 235, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (236, 'back.aspim_categories.show', 236, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (237, 'back.aspim_categories.edit', 237, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (238, 'back.aspim_categories.update', 238, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (239, 'back.aspim_categories.destroy', 239, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (240, 'back.media_album_categories.index', 240, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (241, 'back.media_album_categories.create', 241, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (242, 'back.media_album_categories.store', 242, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (243, 'back.media_album_categories.show', 243, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (244, 'back.media_album_categories.edit', 244, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (245, 'back.media_album_categories.update', 245, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (246, 'back.media_album_categories.destroy', 246, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (247, 'back.media_albums.index', 247, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (248, 'back.media_albums.create', 248, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (249, 'back.media_albums.store', 249, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (250, 'back.media_albums.show', 250, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (251, 'back.media_albums.edit', 251, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (252, 'back.media_albums.update', 252, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (253, 'back.media_albums.destroy', 253, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (254, 'back.media_files.index', 254, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (255, 'back.media_files.create', 255, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (256, 'back.media_files.store', 256, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (257, 'back.media_files.show', 257, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (258, 'back.media_files.edit', 258, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (259, 'back.media_files.update', 259, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (260, 'back.media_files.destroy', 260, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (261, 'back.trainings.index', 261, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (262, 'back.trainings.create', 262, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (263, 'back.trainings.store', 263, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (264, 'back.trainings.show', 264, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (265, 'back.trainings.edit', 265, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (266, 'back.trainings.update', 266, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (267, 'back.trainings.destroy', 267, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (268, 'back.training_categories.index', 268, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (269, 'back.training_categories.create', 269, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (270, 'back.training_categories.store', 270, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (271, 'back.training_categories.show', 271, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (272, 'back.training_categories.edit', 272, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (273, 'back.training_categories.update', 273, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (274, 'back.training_categories.destroy', 274, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (275, 'back.news.index', 275, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (276, 'back.news.create', 276, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (277, 'back.news.store', 277, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (278, 'back.news.show', 278, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (279, 'back.news.edit', 279, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (280, 'back.news.update', 280, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (281, 'back.news.destroy', 281, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (282, 'back.news_categories.index', 282, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (283, 'back.news_categories.create', 283, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (284, 'back.news_categories.store', 284, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (285, 'back.news_categories.show', 285, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (286, 'back.news_categories.edit', 286, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (287, 'back.news_categories.update', 287, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (288, 'back.news_categories.destroy', 288, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (289, 'back.useful_link_categories.index', 289, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (290, 'back.useful_link_categories.create', 290, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (291, 'back.useful_link_categories.store', 291, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (292, 'back.useful_link_categories.show', 292, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (293, 'back.useful_link_categories.edit', 293, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (294, 'back.useful_link_categories.update', 294, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (295, 'back.useful_link_categories.destroy', 295, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (296, 'back.useful_links.index', 296, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (297, 'back.useful_links.create', 297, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (298, 'back.useful_links.store', 298, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (299, 'back.useful_links.show', 299, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (300, 'back.useful_links.edit', 300, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (301, 'back.useful_links.update', 301, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (302, 'back.useful_links.destroy', 302, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (303, 'back.app_texts.datatables', 303, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (304, 'back.app_texts.index', 304, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (305, 'back.app_texts.create', 305, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (306, 'back.app_texts.store', 306, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (307, 'back.app_texts.edit', 307, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (308, 'back.app_texts.update', 308, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (309, 'back.app_texts.destroy', 309, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (310, 'back.governorates.datatables', 310, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (311, 'back.governorates.index', 311, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (312, 'back.governorates.create', 312, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (313, 'back.governorates.store', 313, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (314, 'back.governorates.show', 314, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (315, 'back.governorates.edit', 315, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (316, 'back.governorates.update', 316, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (317, 'back.governorates.destroy', 317, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (318, 'back.cities.datatables', 318, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (319, 'back.cities.index', 319, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (320, 'back.cities.create', 320, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (321, 'back.cities.store', 321, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (322, 'back.cities.show', 322, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (323, 'back.cities.edit', 323, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (324, 'back.cities.update', 324, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (325, 'back.cities.destroy', 325, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (326, 'back.zones.datatables', 326, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (327, 'back.zones.index', 327, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (328, 'back.zones.create', 328, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (329, 'back.zones.store', 329, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (330, 'back.zones.show', 330, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (331, 'back.zones.edit', 331, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (332, 'back.zones.update', 332, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (333, 'back.zones.destroy', 333, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (334, 'back.partners.index', 334, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (335, 'back.partners.create', 335, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (336, 'back.partners.store', 336, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (337, 'back.partners.show', 337, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (338, 'back.partners.edit', 338, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (339, 'back.partners.update', 339, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (340, 'back.partners.destroy', 340, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (341, 'back.partner_categories.index', 341, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (342, 'back.partner_categories.create', 342, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (343, 'back.partner_categories.store', 343, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (344, 'back.partner_categories.show', 344, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (345, 'back.partner_categories.edit', 345, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (346, 'back.partner_categories.update', 346, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (347, 'back.partner_categories.destroy', 347, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (348, 'back.testimonials.index', 348, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (349, 'back.testimonials.create', 349, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (350, 'back.testimonials.store', 350, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (351, 'back.testimonials.show', 351, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (352, 'back.testimonials.edit', 352, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (353, 'back.testimonials.update', 353, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (354, 'back.testimonials.destroy', 354, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (355, 'back.sitemaps.index', 355, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (356, 'back.sitemaps.create', 356, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (357, 'back.sitemaps.store', 357, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (358, 'back.sitemaps.show', 358, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (359, 'back.sitemaps.edit', 359, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (360, 'back.sitemaps.update', 360, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (361, 'back.sitemaps.destroy', 361, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (362, 'back.testimonial_categories.index', 362, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (363, 'back.testimonial_categories.create', 363, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (364, 'back.testimonial_categories.store', 364, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (365, 'back.testimonial_categories.show', 365, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (366, 'back.testimonial_categories.edit', 366, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (367, 'back.testimonial_categories.update', 367, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (368, 'back.testimonial_categories.destroy', 368, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (369, 'back.files.index', 369, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (370, 'back.files.create', 370, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (371, 'back.files.store', 371, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (372, 'back.files.show', 372, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (373, 'back.files.edit', 373, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (374, 'back.files.update', 374, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (375, 'back.files.destroy', 375, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (376, 'back.schemas.index', 376, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (377, 'back.schemas.create', 377, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (378, 'back.schemas.store', 378, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (379, 'back.schemas.show', 379, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (380, 'back.schemas.edit', 380, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (381, 'back.schemas.update', 381, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (382, 'back.schemas.destroy', 382, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (383, 'back.file_categories.index', 383, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (384, 'back.file_categories.create', 384, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (385, 'back.file_categories.store', 385, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (386, 'back.file_categories.show', 386, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (387, 'back.file_categories.edit', 387, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (388, 'back.file_categories.update', 388, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (389, 'back.file_categories.destroy', 389, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (390, 'back.programs.index', 390, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (391, 'back.programs.create', 391, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (392, 'back.programs.store', 392, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (393, 'back.programs.show', 393, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (394, 'back.programs.edit', 394, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (395, 'back.programs.update', 395, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (396, 'back.programs.destroy', 396, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (397, 'back.map_layers.index', 397, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (398, 'back.map_layers.create', 398, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (399, 'back.map_layers.store', 399, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (400, 'back.map_layers.show', 400, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (401, 'back.map_layers.edit', 401, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (402, 'back.map_layers.update', 402, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (403, 'back.map_layers.destroy', 403, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (404, 'back.outil_gestions.index', 404, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (405, 'back.outil_gestions.create', 405, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (406, 'back.outil_gestions.store', 406, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (407, 'back.outil_gestions.show', 407, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (408, 'back.outil_gestions.edit', 408, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (409, 'back.outil_gestions.update', 409, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (410, 'back.outil_gestions.destroy', 410, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (411, 'back.outil_gestion_categories.index', 411, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (412, 'back.outil_gestion_categories.create', 412, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (413, 'back.outil_gestion_categories.store', 413, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (414, 'back.outil_gestion_categories.show', 414, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (415, 'back.outil_gestion_categories.edit', 415, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (416, 'back.outil_gestion_categories.update', 416, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (417, 'back.outil_gestion_categories.destroy', 417, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (418, 'back.procedures.index', 418, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (419, 'back.procedures.create', 419, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (420, 'back.procedures.store', 420, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (421, 'back.procedures.show', 421, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (422, 'back.procedures.edit', 422, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (423, 'back.procedures.update', 423, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (424, 'back.procedures.destroy', 424, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (425, 'back.procedure_categories.index', 425, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (426, 'back.procedure_categories.create', 426, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (427, 'back.procedure_categories.store', 427, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (428, 'back.procedure_categories.show', 428, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (429, 'back.procedure_categories.edit', 429, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (430, 'back.procedure_categories.update', 430, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (431, 'back.procedure_categories.destroy', 431, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (432, 'back.plans.index', 432, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (433, 'back.plans.create', 433, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (434, 'back.plans.store', 434, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (435, 'back.plans.show', 435, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (436, 'back.plans.edit', 436, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (437, 'back.plans.update', 437, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (438, 'back.plans.destroy', 438, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (439, 'back.plan_categories.index', 439, NULL, 0, '2020-12-31 14:37:27', '2020-12-31 14:37:27'),
       (440, 'back.plan_categories.create', 440, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (441, 'back.plan_categories.store', 441, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (442, 'back.plan_categories.show', 442, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (443, 'back.plan_categories.edit', 443, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (444, 'back.plan_categories.update', 444, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (445, 'back.plan_categories.destroy', 445, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (446, 'back.widgets.index', 446, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (447, 'back.widgets.create', 447, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (448, 'back.widgets.store', 448, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (449, 'back.widgets.show', 449, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (450, 'back.widgets.edit', 450, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (451, 'back.widgets.update', 451, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (452, 'back.widgets.destroy', 452, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (453, 'back.widget_elements.update_collection', 453, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (454, 'back.widget_elements.update_order', 454, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (455, 'back.widget_elements.module_orderable_columns', 455, NULL, 0, '2020-12-31 14:37:28',
        '2020-12-31 14:37:28'),
       (456, 'back.widget_menus.update_collection', 456, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (457, 'back.', 457, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (458, 'back.menus.get_form_by_link_type_id', 458, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28'),
       (459, 'back.banners.get_form_by_link_type_id', 459, NULL, 0, '2020-12-31 14:37:28', '2020-12-31 14:37:28');
/*!40000 ALTER TABLE `permission_route_name`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions`
(
    `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    `module_id`  int(10) unsigned                             DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `permissions_module_id_foreign` (`module_id`),
    CONSTRAINT `permissions_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 460
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions`
    DISABLE KEYS */;
INSERT INTO `permissions`
VALUES (1, 'pretty-routes.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (2, 'unisharp.lfm.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (3, 'unisharp.lfm.getErrors', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (4, 'unisharp.lfm.upload', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (5, 'unisharp.lfm.getItems', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (6, 'unisharp.lfm.getAddfolder', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (7, 'unisharp.lfm.getDeletefolder', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (8, 'unisharp.lfm.getFolders', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (9, 'unisharp.lfm.getCrop', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (10, 'unisharp.lfm.getCropimage', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (11, 'unisharp.lfm.getRename', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (12, 'unisharp.lfm.getResize', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (13, 'unisharp.lfm.performResize', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (14, 'unisharp.lfm.getDownload', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (15, 'unisharp.lfm.getDelete', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (16, 'unisharp.lfm.', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (17, 'back.menu-module-redirection', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (18, 'back.home', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (19, 'back.front_home.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (20, 'back.front_home.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (21, 'back.front_home.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (22, 'back.front_home.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (23, 'back.front_home.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (24, 'back.front_home.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (25, 'back.front_home.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (26, 'back.routes.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (27, 'back.cache-cleaner.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (28, 'back.cache-cleaner.clear', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (29, 'back.custom-lfm', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (30, 'back.users.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (31, 'back.users.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (32, 'back.users.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (33, 'back.users.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (34, 'back.users.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (35, 'back.users.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (36, 'back.users.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (37, 'back.roles.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (38, 'back.roles.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (39, 'back.roles.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (40, 'back.roles.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (41, 'back.roles.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (42, 'back.roles.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (43, 'back.roles.change-permission-status', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (44, 'back.my-profile', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (45, 'back.user_profile.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (46, 'back.menu-groups.update-order', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (47, 'back.menus.edit-module', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (48, 'back.menus.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (49, 'back.menus.toggle-status', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (50, 'back.menus.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (51, 'back.menus.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (52, 'back.menus.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (53, 'back.menus.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (54, 'back.menus.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (55, 'back.menus.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (56, 'back.menus.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (57, 'back.locales.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (58, 'back.locales.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (59, 'back.locales.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (60, 'back.locales.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (61, 'back.locales.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (62, 'back.locales.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (63, 'back.locales.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (64, 'back.locales.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (65, 'back.post_categories.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (66, 'back.post_categories.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (67, 'back.post_categories.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (68, 'back.post_categories.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (69, 'back.post_categories.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (70, 'back.post_categories.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (71, 'back.post_categories.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (72, 'back.post_categories.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (73, 'back.banners.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (74, 'back.banners.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (75, 'back.banners.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (76, 'back.banners.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (77, 'back.banners.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (78, 'back.banners.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (79, 'back.banners.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (80, 'back.banners.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (81, 'back.contact_recipients.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (82, 'back.contact_recipients.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (83, 'back.contact_recipients.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (84, 'back.contact_recipients.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (85, 'back.contact_recipients.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (86, 'back.contact_recipients.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (87, 'back.contact_recipients.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (88, 'back.contact_recipients.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (89, 'back.contact_messages.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (90, 'back.contact_messages.export', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (91, 'back.contact_messages.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (92, 'back.contact_messages.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (93, 'back.contact_messages.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (94, 'back.contact_messages.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (95, 'back.contact_messages.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (96, 'back.contact_messages.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (97, 'back.contact_messages.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (98, 'back.faq_categories.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (99, 'back.faq_categories.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (100, 'back.faq_categories.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (101, 'back.faq_categories.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (102, 'back.faq_categories.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (103, 'back.faq_categories.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (104, 'back.faq_categories.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (105, 'back.faq_items.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (106, 'back.faq_items.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (107, 'back.faq_items.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (108, 'back.faq_items.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (109, 'back.faq_items.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (110, 'back.faq_items.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (111, 'back.faq_items.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (112, 'back.gestion_forums.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (113, 'back.gestion_forums.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (114, 'back.gestion_forums.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (115, 'back.gestion_forums.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (116, 'back.gestion_forums.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (117, 'back.gestion_forums.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (118, 'back.gestion_forums.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (119, 'back.post_forums.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (120, 'back.post_forums.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (121, 'back.post_forums.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (122, 'back.post_forums.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (123, 'back.post_forums.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (124, 'back.post_forums.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (125, 'back.post_forums.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (126, 'back.category_forums.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (127, 'back.category_forums.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (128, 'back.category_forums.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (129, 'back.category_forums.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (130, 'back.category_forums.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (131, 'back.category_forums.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (132, 'back.category_forums.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (133, 'back.languages.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (134, 'back.languages.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (135, 'back.languages.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (136, 'back.languages.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (137, 'back.languages.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (138, 'back.languages.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (139, 'back.languages.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (140, 'back.languages.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (141, 'back.menu_banners.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (142, 'back.menu_banners.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (143, 'back.menu_banners.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (144, 'back.menu_banners.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (145, 'back.menu_banners.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (146, 'back.menu_banners.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (147, 'back.menu_banners.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (148, 'back.menu_banners.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (149, 'back.modules.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (150, 'back.modules.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (151, 'back.modules.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (152, 'back.modules.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (153, 'back.modules.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (154, 'back.modules.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (155, 'back.modules.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (156, 'back.newsletter_subscriptions.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (157, 'back.newsletter_subscriptions.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (158, 'back.newsletter_subscriptions.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (159, 'back.newsletter_subscriptions.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (160, 'back.notifications.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (161, 'back.notifications.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (162, 'back.pages.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (163, 'back.pages.editByMenuId', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (164, 'back.pages.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (165, 'back.pages.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (166, 'back.pages.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (167, 'back.pages.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (168, 'back.pages.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (169, 'back.parameter_groups.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (170, 'back.parameter_groups.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (171, 'back.parameter_groups.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (172, 'back.parameter_groups.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (173, 'back.parameter_groups.show', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (174, 'back.parameter_groups.edit', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (175, 'back.parameter_groups.update', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (176, 'back.parameter_groups.destroy', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (177, 'back.parameters.datatables', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (178, 'back.parameters.update-key-value-pairs', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (179, 'back.parameters.index', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (180, 'back.parameters.create', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (181, 'back.parameters.store', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', NULL),
       (182, 'back.parameters.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (183, 'back.parameters.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (184, 'back.parameters.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (185, 'back.parameters.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (186, 'back.countries.datatables', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (187, 'back.countries.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (188, 'back.countries.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (189, 'back.countries.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (190, 'back.countries.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (191, 'back.countries.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (192, 'back.countries.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (193, 'back.countries.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (194, 'back.posts.datatables', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (195, 'back.posts.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (196, 'back.posts.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (197, 'back.posts.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (198, 'back.posts.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (199, 'back.posts.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (200, 'back.posts.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (201, 'back.posts.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (202, 'back.events.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (203, 'back.events.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (204, 'back.events.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (205, 'back.events.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (206, 'back.events.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (207, 'back.events.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (208, 'back.events.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (209, 'back.event_categories.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (210, 'back.event_categories.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (211, 'back.event_categories.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (212, 'back.event_categories.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (213, 'back.event_categories.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (214, 'back.event_categories.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (215, 'back.event_categories.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (216, 'back.aspims.datatables', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (217, 'back.aspim_categories.datatables', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (218, 'back.aspims.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (219, 'back.aspims.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (220, 'back.aspims.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (221, 'back.aspims.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (222, 'back.aspims.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (223, 'back.aspims.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (224, 'back.aspims.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (225, 'back.gestionnaire_aspim.datatables', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (226, 'back.gestionnaire_aspim.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (227, 'back.gestionnaire_aspim.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (228, 'back.gestionnaire_aspim.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (229, 'back.gestionnaire_aspim.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (230, 'back.gestionnaire_aspim.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (231, 'back.gestionnaire_aspim.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (232, 'back.gestionnaire_aspim.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (233, 'back.aspim_categories.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (234, 'back.aspim_categories.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (235, 'back.aspim_categories.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (236, 'back.aspim_categories.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (237, 'back.aspim_categories.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (238, 'back.aspim_categories.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (239, 'back.aspim_categories.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (240, 'back.media_album_categories.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (241, 'back.media_album_categories.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (242, 'back.media_album_categories.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (243, 'back.media_album_categories.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (244, 'back.media_album_categories.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (245, 'back.media_album_categories.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (246, 'back.media_album_categories.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (247, 'back.media_albums.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (248, 'back.media_albums.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (249, 'back.media_albums.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (250, 'back.media_albums.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (251, 'back.media_albums.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (252, 'back.media_albums.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (253, 'back.media_albums.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (254, 'back.media_files.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (255, 'back.media_files.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (256, 'back.media_files.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (257, 'back.media_files.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (258, 'back.media_files.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (259, 'back.media_files.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (260, 'back.media_files.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (261, 'back.trainings.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (262, 'back.trainings.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (263, 'back.trainings.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (264, 'back.trainings.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (265, 'back.trainings.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (266, 'back.trainings.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (267, 'back.trainings.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (268, 'back.training_categories.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (269, 'back.training_categories.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (270, 'back.training_categories.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (271, 'back.training_categories.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (272, 'back.training_categories.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (273, 'back.training_categories.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (274, 'back.training_categories.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (275, 'back.news.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (276, 'back.news.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (277, 'back.news.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (278, 'back.news.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (279, 'back.news.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (280, 'back.news.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (281, 'back.news.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (282, 'back.news_categories.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (283, 'back.news_categories.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (284, 'back.news_categories.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (285, 'back.news_categories.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (286, 'back.news_categories.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (287, 'back.news_categories.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (288, 'back.news_categories.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (289, 'back.useful_link_categories.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (290, 'back.useful_link_categories.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (291, 'back.useful_link_categories.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (292, 'back.useful_link_categories.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (293, 'back.useful_link_categories.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (294, 'back.useful_link_categories.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (295, 'back.useful_link_categories.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (296, 'back.useful_links.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (297, 'back.useful_links.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (298, 'back.useful_links.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (299, 'back.useful_links.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (300, 'back.useful_links.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (301, 'back.useful_links.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (302, 'back.useful_links.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (303, 'back.app_texts.datatables', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (304, 'back.app_texts.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (305, 'back.app_texts.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (306, 'back.app_texts.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (307, 'back.app_texts.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (308, 'back.app_texts.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (309, 'back.app_texts.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (310, 'back.governorates.datatables', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (311, 'back.governorates.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (312, 'back.governorates.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (313, 'back.governorates.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (314, 'back.governorates.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (315, 'back.governorates.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (316, 'back.governorates.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (317, 'back.governorates.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (318, 'back.cities.datatables', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (319, 'back.cities.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (320, 'back.cities.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (321, 'back.cities.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (322, 'back.cities.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (323, 'back.cities.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (324, 'back.cities.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (325, 'back.cities.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (326, 'back.zones.datatables', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (327, 'back.zones.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (328, 'back.zones.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (329, 'back.zones.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (330, 'back.zones.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (331, 'back.zones.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (332, 'back.zones.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (333, 'back.zones.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (334, 'back.partners.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (335, 'back.partners.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (336, 'back.partners.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (337, 'back.partners.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (338, 'back.partners.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (339, 'back.partners.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (340, 'back.partners.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (341, 'back.partner_categories.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (342, 'back.partner_categories.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (343, 'back.partner_categories.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (344, 'back.partner_categories.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (345, 'back.partner_categories.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (346, 'back.partner_categories.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (347, 'back.partner_categories.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (348, 'back.testimonials.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (349, 'back.testimonials.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (350, 'back.testimonials.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (351, 'back.testimonials.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (352, 'back.testimonials.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (353, 'back.testimonials.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (354, 'back.testimonials.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (355, 'back.sitemaps.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (356, 'back.sitemaps.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (357, 'back.sitemaps.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (358, 'back.sitemaps.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (359, 'back.sitemaps.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (360, 'back.sitemaps.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (361, 'back.sitemaps.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (362, 'back.testimonial_categories.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (363, 'back.testimonial_categories.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (364, 'back.testimonial_categories.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (365, 'back.testimonial_categories.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (366, 'back.testimonial_categories.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (367, 'back.testimonial_categories.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (368, 'back.testimonial_categories.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (369, 'back.files.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (370, 'back.files.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (371, 'back.files.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (372, 'back.files.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (373, 'back.files.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (374, 'back.files.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (375, 'back.files.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (376, 'back.schemas.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (377, 'back.schemas.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (378, 'back.schemas.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (379, 'back.schemas.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (380, 'back.schemas.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (381, 'back.schemas.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (382, 'back.schemas.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (383, 'back.file_categories.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (384, 'back.file_categories.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (385, 'back.file_categories.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (386, 'back.file_categories.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (387, 'back.file_categories.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (388, 'back.file_categories.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (389, 'back.file_categories.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (390, 'back.programs.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (391, 'back.programs.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (392, 'back.programs.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (393, 'back.programs.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (394, 'back.programs.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (395, 'back.programs.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (396, 'back.programs.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (397, 'back.map_layers.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (398, 'back.map_layers.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (399, 'back.map_layers.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (400, 'back.map_layers.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (401, 'back.map_layers.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (402, 'back.map_layers.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (403, 'back.map_layers.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (404, 'back.outil_gestions.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (405, 'back.outil_gestions.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (406, 'back.outil_gestions.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (407, 'back.outil_gestions.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (408, 'back.outil_gestions.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (409, 'back.outil_gestions.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (410, 'back.outil_gestions.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (411, 'back.outil_gestion_categories.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (412, 'back.outil_gestion_categories.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (413, 'back.outil_gestion_categories.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (414, 'back.outil_gestion_categories.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (415, 'back.outil_gestion_categories.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (416, 'back.outil_gestion_categories.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (417, 'back.outil_gestion_categories.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (418, 'back.procedures.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (419, 'back.procedures.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (420, 'back.procedures.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (421, 'back.procedures.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (422, 'back.procedures.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (423, 'back.procedures.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (424, 'back.procedures.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (425, 'back.procedure_categories.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (426, 'back.procedure_categories.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (427, 'back.procedure_categories.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (428, 'back.procedure_categories.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (429, 'back.procedure_categories.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (430, 'back.procedure_categories.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (431, 'back.procedure_categories.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (432, 'back.plans.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (433, 'back.plans.create', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (434, 'back.plans.store', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (435, 'back.plans.show', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (436, 'back.plans.edit', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (437, 'back.plans.update', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (438, 'back.plans.destroy', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (439, 'back.plan_categories.index', 'web', '2020-12-31 14:37:27', '2020-12-31 14:37:27', NULL),
       (440, 'back.plan_categories.create', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (441, 'back.plan_categories.store', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (442, 'back.plan_categories.show', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (443, 'back.plan_categories.edit', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (444, 'back.plan_categories.update', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (445, 'back.plan_categories.destroy', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (446, 'back.widgets.index', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (447, 'back.widgets.create', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (448, 'back.widgets.store', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (449, 'back.widgets.show', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (450, 'back.widgets.edit', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (451, 'back.widgets.update', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (452, 'back.widgets.destroy', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (453, 'back.widget_elements.update_collection', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (454, 'back.widget_elements.update_order', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (455, 'back.widget_elements.module_orderable_columns', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28',
        NULL),
       (456, 'back.widget_menus.update_collection', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (457, 'back.', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (458, 'back.menus.get_form_by_link_type_id', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL),
       (459, 'back.banners.get_form_by_link_type_id', 'web', '2020-12-31 14:37:28', '2020-12-31 14:37:28', NULL);
/*!40000 ALTER TABLE `permissions`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan_categories`
--

DROP TABLE IF EXISTS `plan_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned          DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `order`      int(11)          NOT NULL DEFAULT 0,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `plan_categories_menu_id_foreign` (`menu_id`),
    CONSTRAINT `plan_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_categories`
--

LOCK TABLES `plan_categories` WRITE;
/*!40000 ALTER TABLE `plan_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan_category_translations`
--

DROP TABLE IF EXISTS `plan_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan_category_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `plan_category_id` int(10) unsigned                        NOT NULL,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`      text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `plan_category_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `fk_plan_tra_categ_id` (`plan_category_id`),
    CONSTRAINT `fk_plan_tra_categ_id` FOREIGN KEY (`plan_category_id`) REFERENCES `plan_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_category_translations`
--

LOCK TABLES `plan_category_translations` WRITE;
/*!40000 ALTER TABLE `plan_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan_translations`
--

DROP TABLE IF EXISTS `plan_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `plan_id`          int(10) unsigned                        NOT NULL,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`      text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `image`            varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `content`          longtext COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `meta_title`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `plan_translations_plan_id_foreign` (`plan_id`),
    CONSTRAINT `plan_translations_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan_translations`
--

LOCK TABLES `plan_translations` WRITE;
/*!40000 ALTER TABLE `plan_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `plan_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plans`
--

DROP TABLE IF EXISTS `plans`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plans`
(
    `id`               int(10) unsigned NOT NULL AUTO_INCREMENT,
    `is_active`        tinyint(1)       NOT NULL               DEFAULT 0,
    `order`            int(11)          NOT NULL               DEFAULT 0,
    `plan_category_id` int(10) unsigned                        DEFAULT NULL,
    `path`             varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `extension`        varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `size`             varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `publication_date` datetime                                DEFAULT NULL,
    `data`             varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `menu_id`          int(10) unsigned                        DEFAULT NULL,
    `aspim_id`         int(10) unsigned                        DEFAULT NULL,
    `deleted_by`       int(11)                                 DEFAULT NULL,
    `created_by`       int(11)                                 DEFAULT NULL,
    `updated_by`       int(11)                                 DEFAULT NULL,
    `deleted_at`       timestamp        NULL                   DEFAULT NULL,
    `created_at`       timestamp        NULL                   DEFAULT NULL,
    `updated_at`       timestamp        NULL                   DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `plans_plan_category_id_foreign` (`plan_category_id`),
    KEY `plans_menu_id_foreign` (`menu_id`),
    CONSTRAINT `plans_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
    CONSTRAINT `plans_plan_category_id_foreign` FOREIGN KEY (`plan_category_id`) REFERENCES `plan_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plans`
--

LOCK TABLES `plans` WRITE;
/*!40000 ALTER TABLE `plans`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `plans`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(11)                   DEFAULT NULL,
    `order`      int(11)                   DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_categories`
--

LOCK TABLES `post_categories` WRITE;
/*!40000 ALTER TABLE `post_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `post_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_category_translations`
--

DROP TABLE IF EXISTS `post_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_category_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `post_category_id` int(10) unsigned                        NOT NULL,
    `name`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`      text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `pct_deletedAt_unique` (`post_category_id`, `locale`, `deleted_at`),
    CONSTRAINT `post_category_translations_post_category_id_foreign` FOREIGN KEY (`post_category_id`) REFERENCES `post_categories` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_category_translations`
--

LOCK TABLES `post_category_translations` WRITE;
/*!40000 ALTER TABLE `post_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `post_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_translations`
--

DROP TABLE IF EXISTS `post_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `post_id`          int(10) unsigned                        NOT NULL,
    `title`            varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `content`          longtext COLLATE utf8mb4_unicode_ci     NOT NULL,
    `meta_title`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `pos_tran_deletedAt_unique` (`post_id`, `locale`, `deleted_at`),
    UNIQUE KEY `post_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    CONSTRAINT `post_translations_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_translations`
--

LOCK TABLES `post_translations` WRITE;
/*!40000 ALTER TABLE `post_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `post_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts`
(
    `id`               int(10) unsigned NOT NULL AUTO_INCREMENT,
    `post_category_id` int(10) unsigned NOT NULL,
    `order`            int(11)                   DEFAULT NULL,
    `is_active`        tinyint(1)       NOT NULL DEFAULT 0,
    `deleted_by`       int(11)                   DEFAULT NULL,
    `created_by`       int(11)                   DEFAULT NULL,
    `updated_by`       int(11)                   DEFAULT NULL,
    `deleted_at`       timestamp        NULL     DEFAULT NULL,
    `created_at`       timestamp        NULL     DEFAULT NULL,
    `updated_at`       timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `posts_post_category_id_foreign` (`post_category_id`),
    CONSTRAINT `posts_post_category_id_foreign` FOREIGN KEY (`post_category_id`) REFERENCES `post_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `posts`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedure_categories`
--

DROP TABLE IF EXISTS `procedure_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procedure_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned          DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `order`      int(11)          NOT NULL DEFAULT 0,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `procedure_categories_menu_id_foreign` (`menu_id`),
    CONSTRAINT `procedure_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedure_categories`
--

LOCK TABLES `procedure_categories` WRITE;
/*!40000 ALTER TABLE `procedure_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `procedure_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedure_category_translations`
--

DROP TABLE IF EXISTS `procedure_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procedure_category_translations`
(
    `id`                    int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `procedure_category_id` int(10) unsigned                        NOT NULL,
    `locale`                varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`                  varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`                  varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`           text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`            timestamp                               NULL DEFAULT NULL,
    `created_at`            timestamp                               NULL DEFAULT NULL,
    `updated_at`            timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `procedure_category_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `procedure_category_translations_procedure_category_id_foreign` (`procedure_category_id`),
    CONSTRAINT `procedure_category_translations_procedure_category_id_foreign` FOREIGN KEY (`procedure_category_id`) REFERENCES `procedure_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedure_category_translations`
--

LOCK TABLES `procedure_category_translations` WRITE;
/*!40000 ALTER TABLE `procedure_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `procedure_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedure_translations`
--

DROP TABLE IF EXISTS `procedure_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procedure_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `procedure_id`     int(10) unsigned                        NOT NULL,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `meta_title`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `procedure_translations_procedure_id_foreign` (`procedure_id`),
    CONSTRAINT `procedure_translations_procedure_id_foreign` FOREIGN KEY (`procedure_id`) REFERENCES `procedures` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedure_translations`
--

LOCK TABLES `procedure_translations` WRITE;
/*!40000 ALTER TABLE `procedure_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `procedure_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `procedures`
--

DROP TABLE IF EXISTS `procedures`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `procedures`
(
    `id`                    int(10) unsigned NOT NULL AUTO_INCREMENT,
    `is_active`             tinyint(1)       NOT NULL               DEFAULT 0,
    `order`                 int(11)          NOT NULL               DEFAULT 0,
    `procedure_category_id` int(10) unsigned                        DEFAULT NULL,
    `publication_date`      datetime                                DEFAULT NULL,
    `data`                  varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `aspim`                 int(10) unsigned NOT NULL,
    `menu_id`               int(10) unsigned                        DEFAULT NULL,
    `deleted_by`            int(11)                                 DEFAULT NULL,
    `created_by`            int(11)                                 DEFAULT NULL,
    `updated_by`            int(11)                                 DEFAULT NULL,
    `deleted_at`            timestamp        NULL                   DEFAULT NULL,
    `created_at`            timestamp        NULL                   DEFAULT NULL,
    `updated_at`            timestamp        NULL                   DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `procedures_procedure_category_id_foreign` (`procedure_category_id`),
    KEY `procedures_aspim_foreign` (`aspim`),
    KEY `procedures_menu_id_foreign` (`menu_id`),
    CONSTRAINT `procedures_aspim_foreign` FOREIGN KEY (`aspim`) REFERENCES `aspims` (`id`),
    CONSTRAINT `procedures_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
    CONSTRAINT `procedures_procedure_category_id_foreign` FOREIGN KEY (`procedure_category_id`) REFERENCES `procedure_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `procedures`
--

LOCK TABLES `procedures` WRITE;
/*!40000 ALTER TABLE `procedures`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `procedures`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_aspims`
--

DROP TABLE IF EXISTS `program_aspims`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_aspims`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `aspim_id`   int(10) unsigned NOT NULL,
    `program_id` int(10) unsigned NOT NULL,
    `created_at` timestamp        NULL DEFAULT NULL,
    `updated_at` timestamp        NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `program_aspims_aspim_id_foreign` (`aspim_id`),
    KEY `program_aspims_program_id_foreign` (`program_id`),
    CONSTRAINT `program_aspims_aspim_id_foreign` FOREIGN KEY (`aspim_id`) REFERENCES `aspims` (`id`),
    CONSTRAINT `program_aspims_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_aspims`
--

LOCK TABLES `program_aspims` WRITE;
/*!40000 ALTER TABLE `program_aspims`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `program_aspims`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `program_translations`
--

DROP TABLE IF EXISTS `program_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `program_translations`
(
    `id`          int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `program_id`  int(10) unsigned                        NOT NULL,
    `locale`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `title`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`  timestamp                               NULL DEFAULT NULL,
    `created_at`  timestamp                               NULL DEFAULT NULL,
    `updated_at`  timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `program_translations_program_id_foreign` (`program_id`),
    CONSTRAINT `program_translations_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `program_translations`
--

LOCK TABLES `program_translations` WRITE;
/*!40000 ALTER TABLE `program_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `program_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `programs`
--

DROP TABLE IF EXISTS `programs`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `programs`
(
    `id`             int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`        int(10) unsigned          DEFAULT NULL,
    `is_active`      tinyint(1)       NOT NULL DEFAULT 0,
    `established_at` date                      DEFAULT NULL,
    `page_id`        int(10) unsigned          DEFAULT NULL,
    `order`          int(11)                   DEFAULT NULL,
    `deleted_by`     int(11)                   DEFAULT NULL,
    `created_by`     int(11)                   DEFAULT NULL,
    `updated_by`     int(11)                   DEFAULT NULL,
    `deleted_at`     timestamp        NULL     DEFAULT NULL,
    `created_at`     timestamp        NULL     DEFAULT NULL,
    `updated_at`     timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `programs_menu_id_foreign` (`menu_id`),
    KEY `programs_page_id_foreign` (`page_id`),
    CONSTRAINT `programs_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
    CONSTRAINT `programs_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `programs`
--

LOCK TABLES `programs` WRITE;
/*!40000 ALTER TABLE `programs`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `programs`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_has_permissions`
(
    `permission_id` int(10) unsigned NOT NULL,
    `role_id`       int(10) unsigned NOT NULL,
    PRIMARY KEY (`permission_id`, `role_id`),
    KEY `role_has_permissions_role_id_foreign` (`role_id`),
    CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
    CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions`
    DISABLE KEYS */;
INSERT INTO `role_has_permissions`
VALUES (1, 1),
       (2, 1),
       (3, 1),
       (4, 1),
       (5, 1),
       (6, 1),
       (7, 1),
       (8, 1),
       (9, 1),
       (10, 1),
       (11, 1),
       (12, 1),
       (13, 1),
       (14, 1),
       (15, 1),
       (16, 1),
       (17, 1),
       (18, 1),
       (19, 1),
       (20, 1),
       (21, 1),
       (22, 1),
       (23, 1),
       (24, 1),
       (25, 1),
       (26, 1),
       (27, 1),
       (28, 1),
       (29, 1),
       (30, 1),
       (31, 1),
       (32, 1),
       (33, 1),
       (34, 1),
       (35, 1),
       (36, 1),
       (37, 1),
       (38, 1),
       (39, 1),
       (40, 1),
       (41, 1),
       (42, 1),
       (43, 1),
       (44, 1),
       (45, 1),
       (46, 1),
       (47, 1),
       (48, 1),
       (49, 1),
       (50, 1),
       (51, 1),
       (52, 1),
       (53, 1),
       (54, 1),
       (55, 1),
       (56, 1),
       (57, 1),
       (58, 1),
       (59, 1),
       (60, 1),
       (61, 1),
       (62, 1),
       (63, 1),
       (64, 1),
       (65, 1),
       (66, 1),
       (67, 1),
       (68, 1),
       (69, 1),
       (70, 1),
       (71, 1),
       (72, 1),
       (73, 1),
       (74, 1),
       (75, 1),
       (76, 1),
       (77, 1),
       (78, 1),
       (79, 1),
       (80, 1),
       (81, 1),
       (82, 1),
       (83, 1),
       (84, 1),
       (85, 1),
       (86, 1),
       (87, 1),
       (88, 1),
       (89, 1),
       (90, 1),
       (91, 1),
       (92, 1),
       (93, 1),
       (94, 1),
       (95, 1),
       (96, 1),
       (97, 1),
       (98, 1),
       (99, 1),
       (100, 1),
       (101, 1),
       (102, 1),
       (103, 1),
       (104, 1),
       (105, 1),
       (106, 1),
       (107, 1),
       (108, 1),
       (109, 1),
       (110, 1),
       (111, 1),
       (112, 1),
       (113, 1),
       (114, 1),
       (115, 1),
       (116, 1),
       (117, 1),
       (118, 1),
       (119, 1),
       (120, 1),
       (121, 1),
       (122, 1),
       (123, 1),
       (124, 1),
       (125, 1),
       (126, 1),
       (127, 1),
       (128, 1),
       (129, 1),
       (130, 1),
       (131, 1),
       (132, 1),
       (133, 1),
       (134, 1),
       (135, 1),
       (136, 1),
       (137, 1),
       (138, 1),
       (139, 1),
       (140, 1),
       (141, 1),
       (142, 1),
       (143, 1),
       (144, 1),
       (145, 1),
       (146, 1),
       (147, 1),
       (148, 1),
       (149, 1),
       (150, 1),
       (151, 1),
       (152, 1),
       (153, 1),
       (154, 1),
       (155, 1),
       (156, 1),
       (157, 1),
       (158, 1),
       (159, 1),
       (160, 1),
       (161, 1),
       (162, 1),
       (163, 1),
       (164, 1),
       (165, 1),
       (166, 1),
       (167, 1),
       (168, 1),
       (169, 1),
       (170, 1),
       (171, 1),
       (172, 1),
       (173, 1),
       (174, 1),
       (175, 1),
       (176, 1),
       (177, 1),
       (178, 1),
       (179, 1),
       (180, 1),
       (181, 1),
       (182, 1),
       (183, 1),
       (184, 1),
       (185, 1),
       (186, 1),
       (187, 1),
       (188, 1),
       (189, 1),
       (190, 1),
       (191, 1),
       (192, 1),
       (193, 1),
       (194, 1),
       (195, 1),
       (196, 1),
       (197, 1),
       (198, 1),
       (199, 1),
       (200, 1),
       (201, 1),
       (202, 1),
       (203, 1),
       (204, 1),
       (205, 1),
       (206, 1),
       (207, 1),
       (208, 1),
       (209, 1),
       (210, 1),
       (211, 1),
       (212, 1),
       (213, 1),
       (214, 1),
       (215, 1),
       (216, 1),
       (217, 1),
       (218, 1),
       (219, 1),
       (220, 1),
       (221, 1),
       (222, 1),
       (223, 1),
       (224, 1),
       (225, 1),
       (226, 1),
       (227, 1),
       (228, 1),
       (229, 1),
       (230, 1),
       (231, 1),
       (232, 1),
       (233, 1),
       (234, 1),
       (235, 1),
       (236, 1),
       (237, 1),
       (238, 1),
       (239, 1),
       (240, 1),
       (241, 1),
       (242, 1),
       (243, 1),
       (244, 1),
       (245, 1),
       (246, 1),
       (247, 1),
       (248, 1),
       (249, 1),
       (250, 1),
       (251, 1),
       (252, 1),
       (253, 1),
       (254, 1),
       (255, 1),
       (256, 1),
       (257, 1),
       (258, 1),
       (259, 1),
       (260, 1),
       (261, 1),
       (262, 1),
       (263, 1),
       (264, 1),
       (265, 1),
       (266, 1),
       (267, 1),
       (268, 1),
       (269, 1),
       (270, 1),
       (271, 1),
       (272, 1),
       (273, 1),
       (274, 1),
       (275, 1),
       (276, 1),
       (277, 1),
       (278, 1),
       (279, 1),
       (280, 1),
       (281, 1),
       (282, 1),
       (283, 1),
       (284, 1),
       (285, 1),
       (286, 1),
       (287, 1),
       (288, 1),
       (289, 1),
       (290, 1),
       (291, 1),
       (292, 1),
       (293, 1),
       (294, 1),
       (295, 1),
       (296, 1),
       (297, 1),
       (298, 1),
       (299, 1),
       (300, 1),
       (301, 1),
       (302, 1),
       (303, 1),
       (304, 1),
       (305, 1),
       (306, 1),
       (307, 1),
       (308, 1),
       (309, 1),
       (310, 1),
       (311, 1),
       (312, 1),
       (313, 1),
       (314, 1),
       (315, 1),
       (316, 1),
       (317, 1),
       (318, 1),
       (319, 1),
       (320, 1),
       (321, 1),
       (322, 1),
       (323, 1),
       (324, 1),
       (325, 1),
       (326, 1),
       (327, 1),
       (328, 1),
       (329, 1),
       (330, 1),
       (331, 1),
       (332, 1),
       (333, 1),
       (334, 1),
       (335, 1),
       (336, 1),
       (337, 1),
       (338, 1),
       (339, 1),
       (340, 1),
       (341, 1),
       (342, 1),
       (343, 1),
       (344, 1),
       (345, 1),
       (346, 1),
       (347, 1),
       (348, 1),
       (349, 1),
       (350, 1),
       (351, 1),
       (352, 1),
       (353, 1),
       (354, 1),
       (355, 1),
       (356, 1),
       (357, 1),
       (358, 1),
       (359, 1),
       (360, 1),
       (361, 1),
       (362, 1),
       (363, 1),
       (364, 1),
       (365, 1),
       (366, 1),
       (367, 1),
       (368, 1),
       (369, 1),
       (370, 1),
       (371, 1),
       (372, 1),
       (373, 1),
       (374, 1),
       (375, 1),
       (376, 1),
       (377, 1),
       (378, 1),
       (379, 1),
       (380, 1),
       (381, 1),
       (382, 1),
       (383, 1),
       (384, 1),
       (385, 1),
       (386, 1),
       (387, 1),
       (388, 1),
       (389, 1),
       (390, 1),
       (391, 1),
       (392, 1),
       (393, 1),
       (394, 1),
       (395, 1),
       (396, 1),
       (397, 1),
       (398, 1),
       (399, 1),
       (400, 1),
       (401, 1),
       (402, 1),
       (403, 1),
       (404, 1),
       (405, 1),
       (406, 1),
       (407, 1),
       (408, 1),
       (409, 1),
       (410, 1),
       (411, 1),
       (412, 1),
       (413, 1),
       (414, 1),
       (415, 1),
       (416, 1),
       (417, 1),
       (418, 1),
       (419, 1),
       (420, 1),
       (421, 1),
       (422, 1),
       (423, 1),
       (424, 1),
       (425, 1),
       (426, 1),
       (427, 1),
       (428, 1),
       (429, 1),
       (430, 1),
       (431, 1),
       (432, 1),
       (433, 1),
       (434, 1),
       (435, 1),
       (436, 1),
       (437, 1),
       (438, 1),
       (439, 1),
       (440, 1),
       (441, 1),
       (442, 1),
       (443, 1),
       (444, 1),
       (445, 1),
       (446, 1),
       (447, 1),
       (448, 1),
       (449, 1),
       (450, 1),
       (451, 1),
       (452, 1),
       (453, 1),
       (454, 1),
       (455, 1),
       (456, 1),
       (457, 1),
       (458, 1),
       (459, 1);
/*!40000 ALTER TABLE `role_has_permissions`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles`
(
    `id`                 int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `name`               varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `guard_name`         varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at`         timestamp                               NULL     DEFAULT NULL,
    `updated_at`         timestamp                               NULL     DEFAULT NULL,
    `has_access_bo`      tinyint(1)                              NOT NULL DEFAULT 0,
    `is_custom_app_role` tinyint(1)                              NOT NULL DEFAULT 0,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles`
    DISABLE KEYS */;
INSERT INTO `roles`
VALUES (1, 'Admin', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:28', 1, 0),
       (2, 'User', 'web', '2020-12-31 14:37:26', '2020-12-31 14:37:26', 0, 0);
/*!40000 ALTER TABLE `roles`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schema_translations`
--

DROP TABLE IF EXISTS `schema_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schema_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `schema_id`        int(10) unsigned                        NOT NULL,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`      text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `image`            varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `content`          longtext COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `meta_title`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `schema_translations_schema_id_foreign` (`schema_id`),
    CONSTRAINT `schema_translations_schema_id_foreign` FOREIGN KEY (`schema_id`) REFERENCES `schemas` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schema_translations`
--

LOCK TABLES `schema_translations` WRITE;
/*!40000 ALTER TABLE `schema_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `schema_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schemas`
--

DROP TABLE IF EXISTS `schemas`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schemas`
(
    `id`               int(10) unsigned NOT NULL AUTO_INCREMENT,
    `is_active`        tinyint(1)       NOT NULL               DEFAULT 0,
    `order`            int(11)          NOT NULL               DEFAULT 0,
    `path`             varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `extension`        varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `size`             varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `publication_date` datetime                                DEFAULT NULL,
    `data`             varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `aspim_id`         int(10) unsigned                        DEFAULT NULL,
    `deleted_by`       int(11)                                 DEFAULT NULL,
    `created_by`       int(11)                                 DEFAULT NULL,
    `updated_by`       int(11)                                 DEFAULT NULL,
    `deleted_at`       timestamp        NULL                   DEFAULT NULL,
    `created_at`       timestamp        NULL                   DEFAULT NULL,
    `updated_at`       timestamp        NULL                   DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schemas`
--

LOCK TABLES `schemas` WRITE;
/*!40000 ALTER TABLE `schemas`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `schemas`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sitemap_translations`
--

DROP TABLE IF EXISTS `sitemap_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sitemap_translations`
(
    `id`          int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `sitemap_id`  int(10) unsigned                        NOT NULL,
    `locale`      varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`        varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `title`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description` text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`  timestamp                               NULL DEFAULT NULL,
    `created_at`  timestamp                               NULL DEFAULT NULL,
    `updated_at`  timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `sitemap_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `sitemap_translations_sitemap_id_foreign` (`sitemap_id`),
    CONSTRAINT `sitemap_translations_sitemap_id_foreign` FOREIGN KEY (`sitemap_id`) REFERENCES `sitemaps` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sitemap_translations`
--

LOCK TABLES `sitemap_translations` WRITE;
/*!40000 ALTER TABLE `sitemap_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `sitemap_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sitemaps`
--

DROP TABLE IF EXISTS `sitemaps`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sitemaps`
(
    `id`             int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`        int(10) unsigned                        DEFAULT NULL,
    `order`          int(11)                                 DEFAULT NULL,
    `menu_group_ids` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `is_active`      tinyint(1)       NOT NULL               DEFAULT 0,
    `deleted_by`     int(11)                                 DEFAULT NULL,
    `created_by`     int(11)                                 DEFAULT NULL,
    `updated_by`     int(11)                                 DEFAULT NULL,
    `deleted_at`     timestamp        NULL                   DEFAULT NULL,
    `created_at`     timestamp        NULL                   DEFAULT NULL,
    `updated_at`     timestamp        NULL                   DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `sitemaps_menu_id_foreign` (`menu_id`),
    CONSTRAINT `sitemaps_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sitemaps`
--

LOCK TABLES `sitemaps` WRITE;
/*!40000 ALTER TABLE `sitemaps`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `sitemaps`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonial_categories`
--

DROP TABLE IF EXISTS `testimonial_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonial_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned          DEFAULT NULL,
    `order`      int(11)                   DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `testimonial_categories_menu_id_foreign` (`menu_id`),
    CONSTRAINT `testimonial_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonial_categories`
--

LOCK TABLES `testimonial_categories` WRITE;
/*!40000 ALTER TABLE `testimonial_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonial_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonial_category_translations`
--

DROP TABLE IF EXISTS `testimonial_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonial_category_translations`
(
    `id`                      int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `testimonial_category_id` int(10) unsigned                        NOT NULL,
    `locale`                  varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`                    varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `title`                   varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`             text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`              timestamp                               NULL DEFAULT NULL,
    `created_at`              timestamp                               NULL DEFAULT NULL,
    `updated_at`              timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `testimonial_category_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `fk_tstm_categ_trans` (`testimonial_category_id`),
    CONSTRAINT `fk_tstm_categ_trans` FOREIGN KEY (`testimonial_category_id`) REFERENCES `testimonial_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonial_category_translations`
--

LOCK TABLES `testimonial_category_translations` WRITE;
/*!40000 ALTER TABLE `testimonial_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonial_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonial_translations`
--

DROP TABLE IF EXISTS `testimonial_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonial_translations`
(
    `id`             int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `testimonial_id` int(10) unsigned                        NOT NULL,
    `locale`         varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`           varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `title`          varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`    text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`     timestamp                               NULL DEFAULT NULL,
    `created_at`     timestamp                               NULL DEFAULT NULL,
    `updated_at`     timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `testimonial_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `testimonial_translations_testimonial_id_foreign` (`testimonial_id`),
    CONSTRAINT `testimonial_translations_testimonial_id_foreign` FOREIGN KEY (`testimonial_id`) REFERENCES `testimonials` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonial_translations`
--

LOCK TABLES `testimonial_translations` WRITE;
/*!40000 ALTER TABLE `testimonial_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonial_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimonials`
(
    `id`                      int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`                 int(10) unsigned                        DEFAULT NULL,
    `is_active`               tinyint(1)       NOT NULL               DEFAULT 0,
    `order`                   int(11)                                 DEFAULT NULL,
    `testimonial_category_id` int(10) unsigned                        DEFAULT NULL,
    `image`                   varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `linkedin`                varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `facebook`                varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `instagram`               varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `twitter`                 varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    `deleted_by`              int(11)                                 DEFAULT NULL,
    `created_by`              int(11)                                 DEFAULT NULL,
    `updated_by`              int(11)                                 DEFAULT NULL,
    `deleted_at`              timestamp        NULL                   DEFAULT NULL,
    `created_at`              timestamp        NULL                   DEFAULT NULL,
    `updated_at`              timestamp        NULL                   DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `testimonials_menu_id_foreign` (`menu_id`),
    KEY `fk_tstm_tstm_categ` (`testimonial_category_id`),
    CONSTRAINT `fk_tstm_tstm_categ` FOREIGN KEY (`testimonial_category_id`) REFERENCES `testimonial_categories` (`id`),
    CONSTRAINT `testimonials_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimonials`
--

LOCK TABLES `testimonials` WRITE;
/*!40000 ALTER TABLE `testimonials`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `testimonials`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_categories`
--

DROP TABLE IF EXISTS `training_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `training_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned          DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `order`      int(11)                   DEFAULT NULL,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `training_categories_menu_id_foreign` (`menu_id`),
    CONSTRAINT `training_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_categories`
--

LOCK TABLES `training_categories` WRITE;
/*!40000 ALTER TABLE `training_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `training_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_category_translations`
--

DROP TABLE IF EXISTS `training_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `training_category_translations`
(
    `id`                   int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `training_category_id` int(10) unsigned                        NOT NULL,
    `locale`               varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`                 varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`                 varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`          text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`           timestamp                               NULL DEFAULT NULL,
    `created_at`           timestamp                               NULL DEFAULT NULL,
    `updated_at`           timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `training_category_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `training_category_translations_training_category_id_foreign` (`training_category_id`),
    CONSTRAINT `training_category_translations_training_category_id_foreign` FOREIGN KEY (`training_category_id`) REFERENCES `training_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_category_translations`
--

LOCK TABLES `training_category_translations` WRITE;
/*!40000 ALTER TABLE `training_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `training_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `training_translations`
--

DROP TABLE IF EXISTS `training_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `training_translations`
(
    `id`               int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `training_id`      int(10) unsigned                        NOT NULL,
    `locale`           varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `meta_title`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `meta_description` varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `deleted_at`       timestamp                               NULL DEFAULT NULL,
    `created_at`       timestamp                               NULL DEFAULT NULL,
    `updated_at`       timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `training_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `training_translations_training_id_foreign` (`training_id`),
    CONSTRAINT `training_translations_training_id_foreign` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training_translations`
--

LOCK TABLES `training_translations` WRITE;
/*!40000 ALTER TABLE `training_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `training_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trainings`
--

DROP TABLE IF EXISTS `trainings`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trainings`
(
    `id`                   int(10) unsigned NOT NULL AUTO_INCREMENT,
    `is_active`            tinyint(1)       NOT NULL               DEFAULT 0,
    `menu_id`              int(10) unsigned                        DEFAULT NULL,
    `training_category_id` int(10) unsigned                        DEFAULT NULL,
    `deleted_by`           int(11)                                 DEFAULT NULL,
    `created_by`           int(11)                                 DEFAULT NULL,
    `updated_by`           int(11)                                 DEFAULT NULL,
    `deleted_at`           timestamp        NULL                   DEFAULT NULL,
    `created_at`           timestamp        NULL                   DEFAULT NULL,
    `updated_at`           timestamp        NULL                   DEFAULT NULL,
    `url`                  varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `trainings_menu_id_foreign` (`menu_id`),
    KEY `trainings_training_category_id_foreign` (`training_category_id`),
    CONSTRAINT `trainings_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
    CONSTRAINT `trainings_training_category_id_foreign` FOREIGN KEY (`training_category_id`) REFERENCES `training_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trainings`
--

LOCK TABLES `trainings` WRITE;
/*!40000 ALTER TABLE `trainings`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `trainings`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useful_link_categories`
--

DROP TABLE IF EXISTS `useful_link_categories`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useful_link_categories`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned          DEFAULT NULL,
    `order`      int(11)                   DEFAULT NULL,
    `is_active`  tinyint(1)       NOT NULL DEFAULT 0,
    `deleted_by` int(11)                   DEFAULT NULL,
    `created_by` int(11)                   DEFAULT NULL,
    `updated_by` int(11)                   DEFAULT NULL,
    `deleted_at` timestamp        NULL     DEFAULT NULL,
    `created_at` timestamp        NULL     DEFAULT NULL,
    `updated_at` timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `useful_link_categories_menu_id_foreign` (`menu_id`),
    CONSTRAINT `useful_link_categories_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useful_link_categories`
--

LOCK TABLES `useful_link_categories` WRITE;
/*!40000 ALTER TABLE `useful_link_categories`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `useful_link_categories`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useful_link_category_translations`
--

DROP TABLE IF EXISTS `useful_link_category_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useful_link_category_translations`
(
    `id`                      int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `useful_link_category_id` int(10) unsigned                        NOT NULL,
    `locale`                  varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `slug`                    varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `title`                   varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`             text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`              timestamp                               NULL DEFAULT NULL,
    `created_at`              timestamp                               NULL DEFAULT NULL,
    `updated_at`              timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `useful_link_category_translations_slug_locale_deleted_at_unique` (`slug`, `locale`, `deleted_at`),
    KEY `ulc_translations_ul_category_id_foreign` (`useful_link_category_id`),
    CONSTRAINT `ulc_translations_ul_category_id_foreign` FOREIGN KEY (`useful_link_category_id`) REFERENCES `useful_link_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useful_link_category_translations`
--

LOCK TABLES `useful_link_category_translations` WRITE;
/*!40000 ALTER TABLE `useful_link_category_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `useful_link_category_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useful_link_translations`
--

DROP TABLE IF EXISTS `useful_link_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useful_link_translations`
(
    `id`             int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `useful_link_id` int(10) unsigned                        NOT NULL,
    `locale`         varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `title`          varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`    text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `deleted_at`     timestamp                               NULL DEFAULT NULL,
    `created_at`     timestamp                               NULL DEFAULT NULL,
    `updated_at`     timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `useful_link_translations_useful_link_id_foreign` (`useful_link_id`),
    CONSTRAINT `useful_link_translations_useful_link_id_foreign` FOREIGN KEY (`useful_link_id`) REFERENCES `useful_links` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useful_link_translations`
--

LOCK TABLES `useful_link_translations` WRITE;
/*!40000 ALTER TABLE `useful_link_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `useful_link_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `useful_links`
--

DROP TABLE IF EXISTS `useful_links`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `useful_links`
(
    `id`                      int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `menu_id`                 int(10) unsigned                                 DEFAULT NULL,
    `is_active`               tinyint(1)                              NOT NULL DEFAULT 0,
    `order`                   int(11)                                          DEFAULT NULL,
    `useful_link_category_id` int(10) unsigned                                 DEFAULT NULL,
    `protocol`                varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `url`                     varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `image`                   varchar(191) COLLATE utf8mb4_unicode_ci          DEFAULT NULL,
    `deleted_by`              int(11)                                          DEFAULT NULL,
    `created_by`              int(11)                                          DEFAULT NULL,
    `updated_by`              int(11)                                          DEFAULT NULL,
    `deleted_at`              timestamp                               NULL     DEFAULT NULL,
    `created_at`              timestamp                               NULL     DEFAULT NULL,
    `updated_at`              timestamp                               NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `useful_links_menu_id_foreign` (`menu_id`),
    KEY `useful_links_useful_link_category_id_foreign` (`useful_link_category_id`),
    CONSTRAINT `useful_links_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
    CONSTRAINT `useful_links_useful_link_category_id_foreign` FOREIGN KEY (`useful_link_category_id`) REFERENCES `useful_link_categories` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `useful_links`
--

LOCK TABLES `useful_links` WRITE;
/*!40000 ALTER TABLE `useful_links`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `useful_links`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users`
(
    `id`                int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `name`              varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email`             varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email_verified_at` timestamp                               NULL DEFAULT NULL,
    `password`          varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `remember_token`    varchar(100) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `deleted_at`        timestamp                               NULL DEFAULT NULL,
    `created_at`        timestamp                               NULL DEFAULT NULL,
    `updated_at`        timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_deleted_at_unique` (`email`, `deleted_at`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 3
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users`
    DISABLE KEYS */;
INSERT INTO `users`
VALUES (1, 'Admin', 'admin@medianet.test', NULL, '$2y$10$viQ340kQWegWcYg2Rz/6M.E8ip3p0.QRCwvsScGEEF3cy4rMVttgS', NULL,
        NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26'),
       (2, 'User', 'user@medianet.test', NULL, '$2y$10$VDtUBVjFm8J1PVSsBTR6cuUl9m4rMX65pA5bwLe76zKA5kacD258W', NULL,
        NULL, '2020-12-31 14:37:26', '2020-12-31 14:37:26');
/*!40000 ALTER TABLE `users`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widget_elements`
--

DROP TABLE IF EXISTS `widget_elements`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `widget_elements`
(
    `id`                int(10) unsigned NOT NULL AUTO_INCREMENT,
    `widget_id`         int(10) unsigned NOT NULL,
    `widget_element_id` int(10) unsigned NOT NULL,
    `is_active`         tinyint(1)       NOT NULL DEFAULT 1,
    `order`             int(11)                   DEFAULT NULL,
    `deleted_by`        int(11)                   DEFAULT NULL,
    `created_by`        int(11)                   DEFAULT NULL,
    `updated_by`        int(11)                   DEFAULT NULL,
    `deleted_at`        timestamp        NULL     DEFAULT NULL,
    `created_at`        timestamp        NULL     DEFAULT NULL,
    `updated_at`        timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `widget_elements_widget_id_foreign` (`widget_id`),
    CONSTRAINT `widget_elements_widget_id_foreign` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widget_elements`
--

LOCK TABLES `widget_elements` WRITE;
/*!40000 ALTER TABLE `widget_elements`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `widget_elements`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widget_menus`
--

DROP TABLE IF EXISTS `widget_menus`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `widget_menus`
(
    `id`         int(10) unsigned NOT NULL AUTO_INCREMENT,
    `menu_id`    int(10) unsigned NOT NULL,
    `widget_id`  int(10) unsigned NOT NULL,
    `deleted_by` int(11)               DEFAULT NULL,
    `created_by` int(11)               DEFAULT NULL,
    `updated_by` int(11)               DEFAULT NULL,
    `deleted_at` timestamp        NULL DEFAULT NULL,
    `created_at` timestamp        NULL DEFAULT NULL,
    `updated_at` timestamp        NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `widget_menus_menu_id_foreign` (`menu_id`),
    KEY `widget_menus_widget_id_foreign` (`widget_id`),
    CONSTRAINT `widget_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
    CONSTRAINT `widget_menus_widget_id_foreign` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widget_menus`
--

LOCK TABLES `widget_menus` WRITE;
/*!40000 ALTER TABLE `widget_menus`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `widget_menus`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widget_translations`
--

DROP TABLE IF EXISTS `widget_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `widget_translations`
(
    `id`           int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `widget_id`    int(10) unsigned                        NOT NULL,
    `locale`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `name`         varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `description`  text COLLATE utf8mb4_unicode_ci              DEFAULT NULL,
    `button_title` varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT 'Lire la suite',
    `deleted_at`   timestamp                               NULL DEFAULT NULL,
    `created_at`   timestamp                               NULL DEFAULT NULL,
    `updated_at`   timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `widget_translations_widget_id_foreign` (`widget_id`),
    CONSTRAINT `widget_translations_widget_id_foreign` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 19
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widget_translations`
--

LOCK TABLES `widget_translations` WRITE;
/*!40000 ALTER TABLE `widget_translations`
    DISABLE KEYS */;
INSERT INTO `widget_translations`
VALUES (1, 1, 'fr', 'first_banners fr', 'first_banners fr', 'Lire la suite fr', NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (2, 1, 'en', 'first_banners en', 'first_banners en', 'Lire la suite en', NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (3, 1, 'ar', 'first_banners ar', 'first_banners ar', 'Lire la suite ar', NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (4, 2, 'fr', 'second_banners fr', 'second_banners fr', 'Lire la suite fr', NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (5, 2, 'en', 'second_banners en', 'second_banners en', 'Lire la suite en', NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (6, 2, 'ar', 'second_banners ar', 'second_banners ar', 'Lire la suite ar', NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (7, 3, 'fr', 'events fr', 'events fr', 'Lire la suite fr', NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (8, 3, 'en', 'events en', 'events en', 'Lire la suite en', NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (9, 3, 'ar', 'events ar', 'events ar', 'Lire la suite ar', NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (10, 4, 'fr', 'news fr', 'news fr', 'Lire la suite fr', NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (11, 4, 'en', 'news en', 'news en', 'Lire la suite en', NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (12, 4, 'ar', 'news ar', 'news ar', 'Lire la suite ar', NULL, '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (13, 5, 'fr', 'banners fr', 'banners fr', 'Lire la suite fr', NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (14, 5, 'en', 'banners en', 'banners en', 'Lire la suite en', NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (15, 5, 'ar', 'banners ar', 'banners ar', 'Lire la suite ar', NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (16, 6, 'fr', 'banners_bottom fr', 'banners_bottom fr', 'Lire la suite fr', NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (17, 6, 'en', 'banners_bottom en', 'banners_bottom en', 'Lire la suite en', NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29'),
       (18, 6, 'ar', 'banners_bottom ar', 'banners_bottom ar', 'Lire la suite ar', NULL, '2020-12-31 14:37:29',
        '2020-12-31 14:37:29');
/*!40000 ALTER TABLE `widget_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widgets`
--

DROP TABLE IF EXISTS `widgets`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `widgets`
(
    `id`                int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `reference`         varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `placement`         varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `home_id`           int(11)                                      DEFAULT NULL,
    `module_id`         int(10) unsigned                             DEFAULT NULL,
    `order_column`      varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `order_column_type` varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `type`              varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT 'single',
    `select_type`       varchar(191) COLLATE utf8mb4_unicode_ci      DEFAULT 'select',
    `number_for_latest` int(11)                                      DEFAULT NULL,
    `is_active`         tinyint(1)                                   DEFAULT 1,
    `order`             int(11)                                      DEFAULT 0,
    `deleted_by`        int(11)                                      DEFAULT NULL,
    `created_by`        int(11)                                      DEFAULT NULL,
    `updated_by`        int(11)                                      DEFAULT NULL,
    `deleted_at`        timestamp                               NULL DEFAULT NULL,
    `created_at`        timestamp                               NULL DEFAULT NULL,
    `updated_at`        timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `widgets_reference_unique` (`reference`),
    KEY `widgets_module_id_foreign` (`module_id`),
    CONSTRAINT `widgets_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`)
) ENGINE = InnoDB
  AUTO_INCREMENT = 7
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widgets`
--

LOCK TABLES `widgets` WRITE;
/*!40000 ALTER TABLE `widgets`
    DISABLE KEYS */;
INSERT INTO `widgets`
VALUES (1, 'first_banners', 'middle', 1, 7, 'id', 'desc', 'free', 'latest', 2, 1, 25, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (2, 'second_banners', 'middle', 1, 7, 'id', 'desc', 'free', 'free_select', NULL, 1, 25, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (3, 'events', 'right', NULL, 25, 'id', 'desc', 'free', 'latest', 2, 1, 25, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (4, 'news', 'right', NULL, 34, 'id', 'desc', 'free', 'latest', 2, 1, 25, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (5, 'banners', 'right', NULL, 7, 'id', 'desc', 'free', 'latest', 2, 1, 25, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:29', '2020-12-31 14:37:29'),
       (6, 'banners_bottom', 'bottom', NULL, 7, 'id', 'desc', 'free', 'latest', 2, 1, 25, NULL, NULL, NULL, NULL,
        '2020-12-31 14:37:29', '2020-12-31 14:37:29');
/*!40000 ALTER TABLE `widgets`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zone_translations`
--

DROP TABLE IF EXISTS `zone_translations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zone_translations`
(
    `id`         int(10) unsigned                        NOT NULL AUTO_INCREMENT,
    `locale`     varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `zone_id`    int(10) unsigned                        NOT NULL,
    `name`       varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
    `deleted_at` timestamp                               NULL DEFAULT NULL,
    `created_at` timestamp                               NULL DEFAULT NULL,
    `updated_at` timestamp                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `zone_translations_zone_id_foreign` (`zone_id`),
    CONSTRAINT `zone_translations_zone_id_foreign` FOREIGN KEY (`zone_id`) REFERENCES `zones` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zone_translations`
--

LOCK TABLES `zone_translations` WRITE;
/*!40000 ALTER TABLE `zone_translations`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `zone_translations`
    ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zones`
--

DROP TABLE IF EXISTS `zones`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zones`
(
    `id`             int(10) unsigned NOT NULL AUTO_INCREMENT,
    `postal_code`    int(11)                   DEFAULT NULL,
    `city_id`        int(10) unsigned NOT NULL,
    `governorate_id` int(10) unsigned NOT NULL,
    `country_id`     int(10) unsigned NOT NULL,
    `is_active`      tinyint(1)       NOT NULL DEFAULT 0,
    `order`          int(11)                   DEFAULT NULL,
    `deleted_at`     timestamp        NULL     DEFAULT NULL,
    `created_at`     timestamp        NULL     DEFAULT NULL,
    `updated_at`     timestamp        NULL     DEFAULT NULL,
    PRIMARY KEY (`id`),
    KEY `zones_city_id_foreign` (`city_id`),
    KEY `zones_governorate_id_foreign` (`governorate_id`),
    KEY `zones_country_id_foreign` (`country_id`),
    CONSTRAINT `zones_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
    CONSTRAINT `zones_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`),
    CONSTRAINT `zones_governorate_id_foreign` FOREIGN KEY (`governorate_id`) REFERENCES `governorates` (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zones`
--

LOCK TABLES `zones` WRITE;
/*!40000 ALTER TABLE `zones`
    DISABLE KEYS */;
/*!40000 ALTER TABLE `zones`
    ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT = @OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS = @OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION = @OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

-- Dump completed on 2020-12-31 16:40:28
