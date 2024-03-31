-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 26 mai 2023 à 21:08
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_axe_roots`
--

-- --------------------------------------------------------

--
-- Structure de la table `formulaire_inscription`
--

CREATE TABLE `formulaire_inscription` (
  `id` int NOT NULL,
  `pseudo` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `user_mail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mdp` varchar(265) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_formulaire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `formulaire_inscription`
--

INSERT INTO `formulaire_inscription` (`id`, `pseudo`, `user_mail`, `mdp`, `date_formulaire`) VALUES
(23, 's', 's@s', '$2y$10$SyIEKTtd21NDfS7iHoyng.uix10HUv.Nfje7xsHkqEnolHhELHY2a', '2023-05-26 16:29:54'),
(24, 'egeg', 'egeg@e', '$2y$10$USeR1k439nMicyNkzjByQOMVb/wm1D0mPfnQvjDSt1T7RJaInwoxG', '2023-05-26 16:49:37'),
(25, 'MT', 'thanouksaget@gmail.com', '$2y$10$8gRSc.eVp3BgSLR7SYKuv..vEYPnQxBPOm7.XmE0fEaHkyi3SodRK', '2023-05-26 19:41:13'),
(26, 'ss', 'ethanxsaget@gmail.com', '$2y$10$uJsaHqdd6A/UTwYEWg9J6OegMEAlIXBYOCXuFrQJwIWkfhtBXjulm', '2023-05-26 21:08:34');

-- --------------------------------------------------------

--
-- Structure de la table `poste`
--

CREATE TABLE `poste` (
  `id_poste` int NOT NULL,
  `post_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_heure_message` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `poste`
--

INSERT INTO `poste` (`id_poste`, `post_text`, `date_heure_message`) VALUES
(54, 'allo', '2023-05-26 23:05:42'),
(55, 'allo', '2023-05-26 23:05:48');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `formulaire_inscription`
--
ALTER TABLE `formulaire_inscription`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `poste`
--
ALTER TABLE `poste`
  ADD PRIMARY KEY (`id_poste`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `formulaire_inscription`
--
ALTER TABLE `formulaire_inscription`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT pour la table `poste`
--
ALTER TABLE `poste`
  MODIFY `id_poste` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
