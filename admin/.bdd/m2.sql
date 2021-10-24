-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : dim. 24 oct. 2021 à 15:07
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
-- Base de données : `m2`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `Nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`category_id`, `Nom`) VALUES
(1, 'non-classé'),
(2, 'promo'),
(3, 'new');

-- --------------------------------------------------------

--
-- Structure de la table `microservices`
--

CREATE TABLE `microservices` (
  `microservice_id` int(11) NOT NULL,
  `Titre` varchar(255) NOT NULL,
  `Contenu` text NOT NULL,
  `Prix` decimal(10,2) DEFAULT NULL,
  `Image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `microservices`
--

INSERT INTO `microservices` (`microservice_id`, `Titre`, `Contenu`, `Prix`, `Image`, `user_id`, `category_id`) VALUES
(68, 'Microservice', 'Ut qui amet repellendus accusamus sint praesentium nobis. Ducimus cumque quidem est voluptatem voluptate quidem ipsum et delectus. Dolores et cumque quaerat quis non fugit ab quo qui. Itaque qui voluptatem dolor sit dolores expedita vero asperiores. Saepe sapiente eligendi ut.', '4.99', 'placeholder-photo.jpg', 1, 1),
(69, 'Microservice', 'Ut qui amet repellendus accusamus sint praesentium nobis. Ducimus cumque quidem est voluptatem voluptate quidem ipsum et delectus. Dolores et cumque quaerat quis non fugit ab quo qui. Itaque qui voluptatem dolor sit dolores expedita vero asperiores. Saepe sapiente eligendi ut.', '4.99', 'placeholder-photo.jpg', 1, 1),
(70, 'Microservice', 'Ut qui amet repellendus accusamus sint praesentium nobis. Ducimus cumque quidem est voluptatem voluptate quidem ipsum et delectus. Dolores et cumque quaerat quis non fugit ab quo qui. Itaque qui voluptatem dolor sit dolores expedita vero asperiores. Saepe sapiente eligendi ut.', '4.99', 'placeholder-photo.jpg', 1, 1),
(71, 'Microservice', 'Ut qui amet repellendus accusamus sint praesentium nobis. Ducimus cumque quidem est voluptatem voluptate quidem ipsum et delectus. Dolores et cumque quaerat quis non fugit ab quo qui. Itaque qui voluptatem dolor sit dolores expedita vero asperiores. Saepe sapiente eligendi ut.', '4.99', 'placeholder-photo.jpg', 1, 1),
(72, 'Microservice', 'Ut qui amet repellendus accusamus sint praesentium nobis. Ducimus cumque quidem est voluptatem voluptate quidem ipsum et delectus. Dolores et cumque quaerat quis non fugit ab quo qui. Itaque qui voluptatem dolor sit dolores expedita vero asperiores. Saepe sapiente eligendi ut.', '4.99', 'placeholder-photo.jpg', 1, 1),
(73, 'Microservice', 'Ut qui amet repellendus accusamus sint praesentium nobis. Ducimus cumque quidem est voluptatem voluptate quidem ipsum et delectus. Dolores et cumque quaerat quis non fugit ab quo qui. Itaque qui voluptatem dolor sit dolores expedita vero asperiores. Saepe sapiente eligendi ut.', '4.99', 'placeholder-photo.jpg', 1, 1),
(74, 'Microservice', 'Ut qui amet repellendus accusamus sint praesentium nobis. Ducimus cumque quidem est voluptatem voluptate quidem ipsum et delectus. Dolores et cumque quaerat quis non fugit ab quo qui. Itaque qui voluptatem dolor sit dolores expedita vero asperiores. Saepe sapiente eligendi ut.', '4.99', 'placeholder-photo.jpg', 1, 1);

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
(2, 'Toto', 'Riri', 'totoriri@example.com', '123456', 2),
(3, 'Fifi', 'loulou', 'fifiloulou', '123456', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Index pour la table `microservices`
--
ALTER TABLE `microservices`
  ADD PRIMARY KEY (`microservice_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `microservices`
--
ALTER TABLE `microservices`
  MODIFY `microservice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `microservices`
--
ALTER TABLE `microservices`
  ADD CONSTRAINT `microservices_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `utilisateurs` (`user_id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `microservices_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
