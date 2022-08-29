-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 29 août 2022 à 10:16
-- Version du serveur : 5.7.36
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sanru`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categorie_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `articles_nom_unique` (`nom`),
  KEY `articles_categorie_id_foreign` (`categorie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `nom`, `categorie_id`) VALUES
(1, 'Tecno', 1),
(2, 'Samsung', 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id`, `nom`) VALUES
(1, 'telephone'),
(2, 'power bank'),
(3, 'Chargeurs');

-- --------------------------------------------------------

--
-- Structure de la table `entite_admins`
--

DROP TABLE IF EXISTS `entite_admins`;
CREATE TABLE IF NOT EXISTS `entite_admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_entite_admin` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entite_admins_nom_unique` (`nom`),
  KEY `entite_admins_type_entite_admin_foreign` (`type_entite_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entite_admins`
--

INSERT INTO `entite_admins` (`id`, `nom`, `type_entite_admin`) VALUES
(1, 'Bunia', 1),
(2, 'Ilebo', 1),
(3, 'Butembo', 1),
(4, 'Kinshasa', 1);

-- --------------------------------------------------------

--
-- Structure de la table `entrepots`
--

DROP TABLE IF EXISTS `entrepots`;
CREATE TABLE IF NOT EXISTS `entrepots` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entite_admin` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `entrepots_nom_unique` (`nom`),
  KEY `entrepots_entite_admin_foreign` (`entite_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `entrepots`
--

INSERT INTO `entrepots` (`id`, `nom`, `entite_admin`) VALUES
(1, 'Entrepot-1', 1),
(2, 'Entrepot-2', 2),
(3, 'Entrepot-3', 4);

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `instances`
--

DROP TABLE IF EXISTS `instances`;
CREATE TABLE IF NOT EXISTS `instances` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero_serie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `utilisable` tinyint(1) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `entrepot_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `instances_numero_serie_unique` (`numero_serie`),
  KEY `instances_article_id_foreign` (`article_id`),
  KEY `instances_location_courante_foreign` (`entrepot_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `instances`
--

INSERT INTO `instances` (`id`, `numero_serie`, `utilisable`, `status`, `article_id`, `entrepot_id`) VALUES
(3, '1445588888885555544', 1, NULL, 1, 2),
(4, '1235678765678900', 1, NULL, 2, 3),
(5, 'SN1233455454322', 0, NULL, 1, 2),
(6, '14455888888855555555555', 1, NULL, 2, 1),
(7, '142554445555844445844002', 0, NULL, 2, 2),
(8, 'SN1233455454', 1, NULL, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `ligne_mouvements`
--

DROP TABLE IF EXISTS `ligne_mouvements`;
CREATE TABLE IF NOT EXISTS `ligne_mouvements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `numero_serie` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantite` int(11) NOT NULL,
  `mouvement_id` bigint(20) UNSIGNED NOT NULL,
  `article_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ligneMouvement_num_serie` (`numero_serie`),
  KEY `ligne_mouvements_mouvement_id_foreign` (`mouvement_id`),
  KEY `ligne_mouvements_article_id_foreign` (`article_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `ligne_mouvements`
--

INSERT INTO `ligne_mouvements` (`id`, `numero_serie`, `quantite`, `mouvement_id`, `article_id`) VALUES
(4, '1235678765678900', 11, 12, 2);

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_08_23_143950_create_categories_table', 1),
(6, '2022_08_23_144730_create_type_entite_admins_table', 2),
(7, '2022_08_23_145505_create_type_mouvements_table', 3),
(9, '2022_08_23_145723_create_articles_table', 4),
(10, '2022_08_23_150612_create_entite_admins_table', 5),
(11, '2022_08_23_151058_create_entrepots_table', 6),
(12, '2022_08_23_151443_create_mouvements_table', 7),
(13, '2022_08_23_153706_create_ligne_mouvements_table', 8),
(14, '2022_08_23_154350_create_instances_table', 9);

-- --------------------------------------------------------

--
-- Structure de la table `mouvements`
--

DROP TABLE IF EXISTS `mouvements`;
CREATE TABLE IF NOT EXISTS `mouvements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'Envoyé',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type_mouvement_id` bigint(20) UNSIGNED NOT NULL,
  `expediteur` bigint(20) UNSIGNED NOT NULL,
  `beneficiaire` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mouvements_type_mouvement_id_foreign` (`type_mouvement_id`),
  KEY `mouvements_expediteur_foreign` (`expediteur`),
  KEY `mouvements_beneficiaire_foreign` (`beneficiaire`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `mouvements`
--

INSERT INTO `mouvements` (`id`, `nom`, `status`, `date`, `type_mouvement_id`, `expediteur`, `beneficiaire`) VALUES
(12, 'MVT-0', 'Envoyé', '2022-08-27 00:47:24', 1, 1, 2),
(13, 'MVT-1', 'Envoyé', '2022-08-27 00:48:04', 1, 3, 2);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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

-- --------------------------------------------------------

--
-- Structure de la table `type_entite_admins`
--

DROP TABLE IF EXISTS `type_entite_admins`;
CREATE TABLE IF NOT EXISTS `type_entite_admins` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_entite_admins_nom_unique` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_entite_admins`
--

INSERT INTO `type_entite_admins` (`id`, `nom`) VALUES
(4, 'Kinshasa'),
(3, 'Nationale'),
(1, 'Province');

-- --------------------------------------------------------

--
-- Structure de la table `type_mouvements`
--

DROP TABLE IF EXISTS `type_mouvements`;
CREATE TABLE IF NOT EXISTS `type_mouvements` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_mouvements_intitule_unique` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `type_mouvements`
--

INSERT INTO `type_mouvements` (`id`, `nom`) VALUES
(4, 'Declassement'),
(2, 'Reception'),
(1, 'Transfert');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Admin', 'admin@white.com', '2022-08-24 06:27:02', '$2y$10$kD0s1XEGXQc8UBMQmYaVRe6bPLPiFERmaNvCuJmPb9Ohw8aYAeT2S', NULL, '2022-08-24 06:27:03', '2022-08-24 06:27:03');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_categorie_id_foreign` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entite_admins`
--
ALTER TABLE `entite_admins`
  ADD CONSTRAINT `entite_admins_type_entite_admin_foreign` FOREIGN KEY (`type_entite_admin`) REFERENCES `type_entite_admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `entrepots`
--
ALTER TABLE `entrepots`
  ADD CONSTRAINT `entrepots_entite_admin_foreign` FOREIGN KEY (`entite_admin`) REFERENCES `entite_admins` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `instances`
--
ALTER TABLE `instances`
  ADD CONSTRAINT `instances_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `instances_location_courante_foreign` FOREIGN KEY (`entrepot_id`) REFERENCES `entrepots` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `ligne_mouvements`
--
ALTER TABLE `ligne_mouvements`
  ADD CONSTRAINT `ligne_mouvements_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ligne_mouvements_mouvement_id_foreign` FOREIGN KEY (`mouvement_id`) REFERENCES `mouvements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `mouvements`
--
ALTER TABLE `mouvements`
  ADD CONSTRAINT `mouvements_beneficiaire_foreign` FOREIGN KEY (`beneficiaire`) REFERENCES `entrepots` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mouvements_expediteur_foreign` FOREIGN KEY (`expediteur`) REFERENCES `entrepots` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mouvements_type_mouvement_id_foreign` FOREIGN KEY (`type_mouvement_id`) REFERENCES `type_mouvements` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
