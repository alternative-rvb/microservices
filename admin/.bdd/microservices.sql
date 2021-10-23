-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : sam. 23 oct. 2021 à 13:53
-- Version du serveur : 5.7.33
-- Version de PHP : 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `microservices`
--

-- --------------------------------------------------------

--
-- Structure de la table `microservices`
--

CREATE TABLE `microservices` (
  `microservice_id` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Contenu` text NOT NULL,
  `Prix` decimal(10,2) DEFAULT NULL,
  `Image` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `microservices`
--

INSERT INTO `microservices` (`microservice_id`, `Titre`, `Contenu`, `Prix`, `Image`, `user_id`) VALUES
(1, 'Microservice 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '5.99', 'placeholder-photo.jpg', 1),
(2, 'Microservice 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Fusce ut placerat orci nulla pellentesque.', '7.99', 'placeholder-photo.jpg', 1),
(3, 'Microservice 3', 'Consectetur adipiscing elit pellentesque habitant morbi tristique.', '5.50', 'placeholder-photo.jpg', 0),
(4, 'Microservice 4', 'Diam maecenas ultricies mi eget. Mattis ullamcorper velit sed ullamcorper morbi tincidunt. Vestibulum sed arcu non odio euismod lacinia at quis risus.', '2.99', 'placeholder-photo.jpg', 0),
(5, 'Microservice 5', 'Eu mi bibendum neque egestas congue quisque. Pellentesque elit ullamcorper dignissim cras.', '0.00', 'placeholder-photo.jpg', 0),
(43, 'Intégrer des icones', 'AAAA', '0.00', 'placeholder-photo.jpg', 0),
(48, 'MS', 'Lorem', '1.00', 'placeholder-photo.jpg', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `user_id` int(11) NOT NULL,
  `Nom` varchar(128) NOT NULL,
  `Prénom` varchar(128) NOT NULL,
  `Email` varchar(128) NOT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Rôle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`user_id`, `Nom`, `Prénom`, `Email`, `Password`, `Rôle`) VALUES
(1, 'Muche', 'Mich', 'michmuche@example.com', '123456', 1),
(9, 'D', 'Domi', '', NULL, NULL),
(10, 'Muche', 'Mich', '', NULL, NULL),
(19, '', '', '', NULL, NULL),
(20, '', '', '', NULL, NULL),
(22, 'E', '', '', NULL, NULL),
(23, '', '', '', NULL, NULL),
(24, 'AAA', '', '', NULL, NULL),
(25, '', '', '', NULL, NULL),
(26, 'AAAAAA', '', '', NULL, NULL),
(27, 'qssss', '', '', NULL, NULL),
(30, 'aaa', '', '', NULL, NULL),
(32, '', '', '', NULL, NULL),
(33, '', '', '', NULL, NULL),
(34, 'Azerty', '', '', NULL, NULL),
(35, 'Olaf', '', '', NULL, NULL),
(36, 'Test', '', '', NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `microservices`
--
ALTER TABLE `microservices`
  ADD PRIMARY KEY (`microservice_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `microservices`
--
ALTER TABLE `microservices`
  MODIFY `microservice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
