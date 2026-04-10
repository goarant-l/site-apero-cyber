-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 10 avr. 2026 à 08:58
-- Version du serveur : 11.4.2-MariaDB
-- Version de PHP : 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `site-apero`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `idAdresse` int(11) NOT NULL,
  `rue` varchar(32) NOT NULL,
  `codePostal` smallint(6) NOT NULL,
  `ville` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idCategorie` int(11) NOT NULL,
  `libelleCategorie` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idCategorie`, `libelleCategorie`) VALUES
(1, 'Combinaison'),
(2, 'Planche'),
(3, 'Palmes');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `idClient` int(11) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `pseudo` varchar(32) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `telephone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `idClient` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `login` varchar(100) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `mail` varchar(150) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`idClient`, `nom`, `prenom`, `login`, `mdp`, `mail`, `telephone`) VALUES
(1, 'GOARANT', 'Lorène', 'lorenegrt', 'test123*', 'goarant-l@saint-louis29.net', '0708301909098'),
(2, 'testnom', 'tesprenom', 'testlogin', 'testmdp', 'testmail', '0000000000');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `noCommande` int(11) NOT NULL,
  `idClient` int(11) NOT NULL,
  `idStatut` char(3) NOT NULL,
  `dateCommande` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `noCommande` int(11) NOT NULL,
  `numProduit` int(11) NOT NULL,
  `quantite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `habiter`
--

CREATE TABLE `habiter` (
  `idAdresse` int(11) NOT NULL,
  `idClient` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `numProduit` int(11) NOT NULL,
  `idCategorie` int(11) NOT NULL,
  `nomProduit` varchar(32) NOT NULL,
  `descriptif` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `prixUnitaire` decimal(8,2) DEFAULT NULL,
  `nomImage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`numProduit`, `idCategorie`, `nomProduit`, `descriptif`, `stock`, `prixUnitaire`, `nomImage`) VALUES
(1, 1, 'Combinaison bleue', 'Description combi b', 28, 75.00, 'combinaison_bleue.jpg'),
(2, 1, 'Combinaison rouge', 'Description combinaison rouge', 12, 76.00, 'combinaison_rouge.png'),
(3, 1, 'Combinaison verte', 'Description combinaison verte', 35, 119.95, 'combinaison_verte.png'),
(4, 2, 'Planche bleue', 'Description planche bleue', 54, 785.00, 'planche_bleue.png'),
(5, 2, 'Planche rouge', 'Description planche rouge', 32, 825.00, 'planche_rouge.png'),
(6, 2, 'Planche verte', 'Description planche verte', 21, 790.00, 'planche_verte.png'),
(7, 3, 'Palmes bleues', 'Description palmes bleues', 38, 86.00, 'palmes_bleues.png'),
(8, 3, 'Palmes rouges', 'Description palmes rouges', 19, 86.00, 'palmes_roses.jpg'),
(9, 3, 'Palmes vertes', 'Description palmes vertes', 15, 86.00, 'palmes_vertes.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `idStatut` char(3) NOT NULL,
  `libelleStatut` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `codeUser` int(11) NOT NULL,
  `login` varchar(15) NOT NULL,
  `mdp` varchar(32) NOT NULL,
  `nom` varchar(32) NOT NULL,
  `prenom` varchar(32) NOT NULL,
  `role` varchar(3) NOT NULL DEFAULT 'usr'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`codeUser`, `login`, `mdp`, `nom`, `prenom`, `role`) VALUES
(1, 'leroy-a', '123456', 'Leroy', 'Achille', 'adm'),
(2, 'denis-e', '654321', 'Denis', 'Emma', 'usr'),
(3, 'olsen-g', 'azerty', 'Olsen', 'Gabriel', 'usr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`idAdresse`);

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idCategorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`idClient`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`noCommande`),
  ADD KEY `FK_ETRE` (`idStatut`),
  ADD KEY `FK_PASSER` (`idClient`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`noCommande`,`numProduit`),
  ADD KEY `FK_CONTENIR` (`numProduit`);

--
-- Index pour la table `habiter`
--
ALTER TABLE `habiter`
  ADD PRIMARY KEY (`idAdresse`,`idClient`),
  ADD KEY `FK_HABITER` (`idClient`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`numProduit`),
  ADD KEY `FK_APPARTENIR` (`idCategorie`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`idStatut`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`codeUser`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `idAdresse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idCategorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `idClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `noCommande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `numProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `codeUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_ETRE` FOREIGN KEY (`idStatut`) REFERENCES `statut` (`idStatut`),
  ADD CONSTRAINT `FK_PASSER` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `FK_CONTENIR` FOREIGN KEY (`numProduit`) REFERENCES `produit` (`numProduit`),
  ADD CONSTRAINT `FK_CONTENIR2` FOREIGN KEY (`noCommande`) REFERENCES `commande` (`noCommande`);

--
-- Contraintes pour la table `habiter`
--
ALTER TABLE `habiter`
  ADD CONSTRAINT `FK_HABITER` FOREIGN KEY (`idClient`) REFERENCES `client` (`idClient`),
  ADD CONSTRAINT `FK_HABITER2` FOREIGN KEY (`idAdresse`) REFERENCES `adresse` (`idAdresse`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_APPARTENIR` FOREIGN KEY (`idCategorie`) REFERENCES `categorie` (`idCategorie`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
