-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 01 déc. 2022 à 00:53
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `amac`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

CREATE TABLE `annonce` (
  `id` int(11) NOT NULL,
  `titre` text NOT NULL,
  `contenu` longtext NOT NULL,
  `images_name` varchar(250) NOT NULL,
  `user_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id`, `titre`, `contenu`, `images_name`, `user_id`, `s_id`) VALUES
(1, 'Annonce 01', 'Voici la description de l\'annonce. Pour en savoir plus prenez contact avec le référent.', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Ffr.depositphotos.com%2Fvector-images%2Fannonce-musicale.html&psig=AOvVaw2Gb0r8NuaUJFJrBg05rw2Z&ust=1669937100976000&source=images&cd=vfe&ved=0CA8QjRxqFwoTCICSns-G1_sCFQAAAAAdAAAAABAE', 2, 0),
(2, 'Annonce 02', 'Voici la description de l\'annonce. Pour en savoir plus prenez contact avec le référent.', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Ffr.depositphotos.com%2Fvector-images%2Fannonce-musicale.html&psig=AOvVaw2Gb0r8NuaUJFJrBg05rw2Z&ust=1669937100976000&source=images&cd=vfe&ved=0CA8QjRxqFwoTCICSns-G1_sCFQAAAAAdAAAAABAE', 20, 2),
(3, 'Annonce 03', 'Voici la description de l\'annonce. Pour en savoir plus prenez contact avec le référent.', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Ffr.depositphotos.com%2Fvector-images%2Fannonce-musicale.html&psig=AOvVaw2Gb0r8NuaUJFJrBg05rw2Z&ust=1669937100976000&source=images&cd=vfe&ved=0CA8QjRxqFwoTCICSns-G1_sCFQAAAAAdAAAAABAE', 3, 5),
(4, 'Annonce 04', 'Voici la description de l\'annonce. Pour en savoir plus prenez contact avec le référent.', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Ffr.depositphotos.com%2Fvector-images%2Fannonce-musicale.html&psig=AOvVaw2Gb0r8NuaUJFJrBg05rw2Z&ust=1669937100976000&source=images&cd=vfe&ved=0CA8QjRxqFwoTCICSns-G1_sCFQAAAAAdAAAAABAE', 4, 3),
(5, 'Annonce 05', 'Voici la description de l\'annonce. Pour en savoir plus prenez contact avec le référent.', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Ffr.depositphotos.com%2Fvector-images%2Fannonce-musicale.html&psig=AOvVaw2Gb0r8NuaUJFJrBg05rw2Z&ust=1669937100976000&source=images&cd=vfe&ved=0CA8QjRxqFwoTCICSns-G1_sCFQAAAAAdAAAAABAE', 5, 4),
(6, 'Annonce 06', 'Voici la description de l\'annonce. Pour en savoir plus prenez contact avec le référent.', 'https://www.google.com/url?sa=i&url=https%3A%2F%2Ffr.depositphotos.com%2Fvector-images%2Fannonce-musicale.html&psig=AOvVaw2Gb0r8NuaUJFJrBg05rw2Z&ust=1669937100976000&source=images&cd=vfe&ved=0CA8QjRxqFwoTCICSns-G1_sCFQAAAAAdAAAAABAE', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `instrument`
--

CREATE TABLE `instrument` (
  `Nom` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `instrument`
--

INSERT INTO `instrument` (`Nom`) VALUES
('Batterie'),
('Guitare\r\n');

-- --------------------------------------------------------

--
-- Structure de la table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `admin` bit(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `mdp`, `mail`, `admin`) VALUES
(1, 'user01', '4099f2eb67521d1b8719517d5f7c7ba14e6c586c', 'user01@gmail.com', b'0'),
(31, 'user05', '4099f2eb67521d1b8719517d5f7c7ba14e6c586c', 'user05@gmail.com', b'0'),
(2, 'user02', '5c2ae3e02cb8e84a8273a3b7d270db026dd519ea', 'user02@gmail.com', b'0'),
(3, 'user03', '4099f2eb67521d1b8719517d5f7c7ba14e6c586c', 'user03@gmail.com', b'0'),
(30, 'user04', '4099f2eb67521d1b8719517d5f7c7ba14e6c586c', 'user04@gmail.com', b'0'),
(32, 'root', 'root', 'root@gmail.com', b'1');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `Texte` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `structure`
--

CREATE TABLE `structure` (
  `nom` varchar(50) NOT NULL,
  `mdp` varchar(150) NOT NULL,
  `tel` text NOT NULL,
  `ville` varchar(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `offre` varchar(50) DEFAULT NULL,
  `site` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `structure`
--

INSERT INTO `structure` (`nom`, `mdp`, `tel`, `ville`, `user_id`, `id`, `mail`, `offre`, `site`) VALUES
('structure01', '', '0601020304', 'Rodez', 1, 1, 'structure01@fr.fr', 'Atelier', 'google.com'),
('structure02', '', '0601020304', 'Espalion', 20, 2, 'structure02@fr.fr', 'Tremplin', 'google.com'),
('structure03', '', '0601020304', 'Onet', 2, 3, 'structure03@fr.fr', 'Eveil', 'google.com'),
('structure04', '', '0601020304', 'Figeac', 5, 4, 'structure04@fr.fr', 'Pratique', 'google.com'),
('structure05', '85e4e364774b92364df8bb6c1cc86c1cd9ca9163', '0601020304', 'Rodez', 3, 5, 'structure05@fr.fr', 'Diffusion', 'google.com'),
('structure06', '', '0601020304', 'Sébazac', 4, 6, 'structure06@fr.fr', 'Accompagnement', 'google.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `instrument`
--
ALTER TABLE `instrument`
  ADD PRIMARY KEY (`Nom`);

--
-- Index pour la table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`Texte`);

--
-- Index pour la table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `annonce`
--
ALTER TABLE `annonce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pour la table `structure`
--
ALTER TABLE `structure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
