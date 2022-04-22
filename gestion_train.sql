-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 22 avr. 2022 à 02:46
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_train`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id_user` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$Lli65GMBXcOlJxs2P0RB6.EajlYZNjsNNZ9mbbp9BpYTNFNdVY34.');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `prenom`, `nom`, `email`, `tel`, `password`) VALUES
(1, 'Moubtahij', 'otmane', 'otman.moubtahij15@gmail.com', '0612122121', '$2y$10$ZJKZiwUZ9PREdtUe2IjqfOMnJk6Yk6So/hQqfthrg.I9T0Pk7x/K2'),
(2, 'hamza', 'hamza', 'hamza@gmail.com', '12122121', '$2y$10$ZbWohEhcpxRdcYa84eyzMeI2qrk7R/lcakcndh6RRxVM1wlt5t.lq'),
(3, 'amine', 'amine', 'amin@gmail.com', '121221', '$2y$10$80upKJfRAiRqmOGIJsv9pu7Se1ZuXSU41/LMMoVv51YGfL5opFmw2');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(100) NOT NULL,
  `date_reservation` date NOT NULL,
  `heure_reservation` time(2) NOT NULL,
  `nbr_places_reservation` int(100) NOT NULL,
  `id_voyage` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `id_client` int(100) NOT NULL,
  `date_voyage` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `date_reservation`, `heure_reservation`, `nbr_places_reservation`, `id_voyage`, `id_user`, `id_client`, `date_voyage`) VALUES
(4, '2022-04-21', '12:40:14.00', 0, 1, 1, 0, '2022-04-21'),
(5, '2022-04-21', '12:42:45.00', 0, 3, 0, 2, '2022-04-21'),
(6, '2022-04-21', '12:43:10.00', 0, 3, 0, 2, '2022-04-21'),
(7, '2022-04-21', '12:44:32.00', 0, 1, 0, 2, '2022-04-21');

-- --------------------------------------------------------

--
-- Structure de la table `train`
--

CREATE TABLE `train` (
  `id_train` int(100) NOT NULL,
  `nom_train` varchar(100) NOT NULL,
  `nbr_place` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `train`
--

INSERT INTO `train` (`id_train`, `nom_train`, `nbr_place`) VALUES
(1, 'Atlas', 2),
(2, 'BURAQ', 120);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `prenom`, `nom`, `email`, `tel`) VALUES
(1, 'AMINE', 'AMINE', 'otman@gmail.com', '0232323');

-- --------------------------------------------------------

--
-- Structure de la table `voyage`
--

CREATE TABLE `voyage` (
  `id_voyage` int(100) NOT NULL,
  `gare_depart` varchar(100) NOT NULL,
  `gare_arriver` varchar(100) NOT NULL,
  `prix` double(15,2) NOT NULL,
  `heure_depart` time(2) NOT NULL,
  `heure_arriver` time(2) NOT NULL,
  `id_train` int(100) NOT NULL,
  `etat_voyage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `voyage`
--

INSERT INTO `voyage` (`id_voyage`, `gare_depart`, `gare_arriver`, `prix`, `heure_depart`, `heure_arriver`, `id_train`, `etat_voyage`) VALUES
(1, 'casa', 'SETTAT', 29.00, '10:15:00.00', '11:20:00.00', 1, 'dispo'),
(2, 'Berrechid', 'casaport', 10.00, '00:30:00.00', '20:00:00.00', 1, 'dispo'),
(3, 'safi', 'marekesh', 20.00, '11:00:00.00', '16:00:00.00', 1, 'dispo');

-- --------------------------------------------------------

--
-- Structure de la table `voyage_anuuler`
--

CREATE TABLE `voyage_anuuler` (
  `id` int(100) NOT NULL,
  `id_voyage` int(100) NOT NULL,
  `dateVoyage` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id_reservation`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_voyage` (`id_voyage`);

--
-- Index pour la table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id_train`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Index pour la table `voyage`
--
ALTER TABLE `voyage`
  ADD PRIMARY KEY (`id_voyage`),
  ADD KEY `id_train` (`id_train`);

--
-- Index pour la table `voyage_anuuler`
--
ALTER TABLE `voyage_anuuler`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `train`
--
ALTER TABLE `train`
  MODIFY `id_train` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `voyage`
--
ALTER TABLE `voyage`
  MODIFY `id_voyage` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `voyage_anuuler`
--
ALTER TABLE `voyage_anuuler`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
