-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : sam. 05 mars 2022 à 18:49
-- Version du serveur : 8.0.28
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `real_estate`
--

-- --------------------------------------------------------

--
-- Structure de la table `advert`
--

CREATE TABLE `advert` (
  `id_advert` int UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `postcode` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `price` int UNSIGNED NOT NULL,
  `reservation_message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `category_id` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `advert`
--

INSERT INTO `advert` (`id_advert`, `title`, `description`, `postcode`, `city`, `price`, `reservation_message`, `category_id`, `created_at`) VALUES
(1, 'Bel appartement\r\n5 pièces\r\n3 chambres\r\n142,05 m²\r\nÉtage 5/5', 'Exceptionnel, avec terrasse majestueuse de 100 m2 et vue époustouflante, bel appartement aux espaces généreux, cheminée dans pièce de vie 50 m2, cuisine sortant sur terrasse, parquet chêne, trois grandes chambres dont une avec salle de bains, salle d\'eau, 2 wc. Un garage double et une cave complète ce bien rare. Ch/an : 2 200EUR.\r\nClasse énergie : C - Classe climat : C. Montant estimé des dépenses annuelles d\'énergie pour un usage standard : entre 1 300EUR et 1 800 EUR. Prix moyen des énergies indexés sur l\'année 2021 (abonnement compris).', '21240', 'Talant', 620000, 'réservé', 2, '2022-03-03 19:34:12'),
(2, 'Appartement 1 pièce', 'Appartement 1 pièce pour étudiant', '21000', 'Dijon', 650, 'disponible', 1, '2022-03-04 11:41:40');

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

CREATE TABLE `category` (
  `id_category` int NOT NULL,
  `value` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id_category`, `value`) VALUES
(1, 'location'),
(2, 'vente');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `advert`
--
ALTER TABLE `advert`
  ADD PRIMARY KEY (`id_advert`),
  ADD KEY `category_id` (`category_id`);

--
-- Index pour la table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `advert`
--
ALTER TABLE `advert`
  MODIFY `id_advert` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `advert`
--
ALTER TABLE `advert`
  ADD CONSTRAINT `advert_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
