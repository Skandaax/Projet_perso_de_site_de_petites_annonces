-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  Dim 31 mai 2020 à 13:20
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site_de_petites_annonces`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonce`
--

DROP TABLE IF EXISTS `annonce`;
CREATE TABLE IF NOT EXISTS `annonce` (
  `id_annonce` int(11) NOT NULL AUTO_INCREMENT,
  `Titre_annonce` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `prix` varchar(50) NOT NULL,
  `fichier` varchar(100) NOT NULL,
  `idutilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id_annonce`),
  KEY `Annonce_Utilisateur_FK` (`idutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonce`
--

INSERT INTO `annonce` (`id_annonce`, `Titre_annonce`, `description`, `prix`, `fichier`, `idutilisateur`) VALUES
(1, 'processeur', 'pppp', '250', 'http:', 1),
(2, 'Carte mère', 'ccc', '500', 'http://', 2),
(3, 'Unité central', 'ccc', '500', 'http://', 3),
(4, 'Alimentation', 'ccc', '100', 'http://', 4);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `Categorie` varchar(70) NOT NULL,
  `id_annonce` int(11) NOT NULL,
  PRIMARY KEY (`id_categorie`),
  KEY `Categorie_Annonce_FK` (`id_annonce`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `idutilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `Pseudo` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `role` int(11) DEFAULT NULL,
  PRIMARY KEY (`idutilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idutilisateur`, `Pseudo`, `email`, `phone`, `Password`, `role`) VALUES
(1, '	Rébecca', '	Rébecca@free.fr', '607080901', '11234', NULL),
(2, 'Aimée', '		Aimée@free.fr', '607080901', '11234', NULL),
(3, 'Marielle', 'Marielle@orange.fr', '708091054', '1234', NULL),
(4, 'Hilaire', 'Hilaire@sfr.fr', '708091034', '1234', NULL),
(5, 'Skandaax', 'nith-haiah@outlook.fr', '0600558877', '$2y$10$jN4OARd.e5BweEUSgwkbW.F7JxRyEHZRRjv8Z3fy46f1i5LU4xAU6', NULL),
(11, 'admin', 'yannick.couillin@free.fr', '0673970462', '$2y$10$Y9EoXZO7W7tWx1eQm.hgfOZZO.PYd2pXNZP29JAsK4bUd/o7T8D82', NULL),
(13, 'roberta', 'contact@free.fr', '0680009900', '$2y$10$RP0uR42hdPDrK5a4nou2FOKqEcY.Mn3oI5imiOXnR5imR9m.4okQW', NULL),
(14, 'Too', 'toto@free.fr', '0644030817', '$2y$10$JsCksF3V0RIYdJvI0CL6fOcIDHYcGrzcZ4qdcESuZ7BT.WeCjyaFi', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonce`
--
ALTER TABLE `annonce`
  ADD CONSTRAINT `Annonce_Utilisateur_FK` FOREIGN KEY (`idutilisateur`) REFERENCES `utilisateur` (`idutilisateur`);

--
-- Contraintes pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD CONSTRAINT `Categorie_Annonce_FK` FOREIGN KEY (`id_annonce`) REFERENCES `annonce` (`id_annonce`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
