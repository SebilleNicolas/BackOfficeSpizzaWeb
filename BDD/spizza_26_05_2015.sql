-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 26 Mai 2015 à 10:17
-- Version du serveur :  5.00.15
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `spizza`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `id` int(11) NOT NULL auto_increment,
  `login` varchar(10) NOT NULL,
  `mdp` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`id`, `login`, `mdp`) VALUES
(1, 'nico', 'nico'),
(2, 'erwan', 'erwan');

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE IF NOT EXISTS `adresse` (
  `CodeAdresse` int(11) NOT NULL auto_increment,
  `Rue` varchar(20) NOT NULL,
  `Complement` varchar(100) default NULL,
  `CodeVille` int(11) NOT NULL,
  PRIMARY KEY  (`CodeAdresse`),
  KEY `CodeVille` (`CodeVille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `boisson`
--

CREATE TABLE IF NOT EXISTS `boisson` (
  `CodeBoisson` int(11) NOT NULL auto_increment,
  `NomBoisson` varchar(30) NOT NULL,
  `PrixBoisson` double NOT NULL,
  PRIMARY KEY  (`CodeBoisson`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `boisson`
--

INSERT INTO `boisson` (`CodeBoisson`, `NomBoisson`, `PrixBoisson`) VALUES
(1, 'Cocaa', 2),
(2, 'orangina', 3);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `NumClient` int(11) NOT NULL auto_increment,
  `NomClient` varchar(30) NOT NULL,
  `PrenomClient` varchar(30) NOT NULL,
  `Tel` int(10) NOT NULL,
  `mdp` varchar(20) NOT NULL,
  `NbCommandes` int(5) NOT NULL,
  `idAdresse` int(11) NOT NULL,
  PRIMARY KEY  (`NumClient`),
  KEY `idAdresse` (`idAdresse`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `idCommande` int(11) NOT NULL auto_increment,
  `NumCommande` int(11) NOT NULL,
  `DateCommande` date NOT NULL,
  `PrixCommande` float NOT NULL,
  `NumClient` int(11) NOT NULL,
  `CodePizza` int(11) NOT NULL,
  `CodeLivreur` int(11) NOT NULL,
  `CodeTarification` int(11) NOT NULL,
  PRIMARY KEY  (`idCommande`),
  KEY `NumClient` (`NumClient`,`CodePizza`,`CodeLivreur`,`CodeTarification`),
  KEY `NumClient_2` (`NumClient`),
  KEY `CodePizza` (`CodePizza`),
  KEY `CodeLivreur` (`CodeLivreur`),
  KEY `CodeTarification` (`CodeTarification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `compose_panini`
--

CREATE TABLE IF NOT EXISTS `compose_panini` (
  `CodePanini` int(11) NOT NULL,
  `NumIngredient` int(11) NOT NULL,
  KEY `NomPanini` (`CodePanini`,`NumIngredient`),
  KEY `NumIngredient` (`NumIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `compose_pate`
--

CREATE TABLE IF NOT EXISTS `compose_pate` (
  `CodePate` int(11) NOT NULL,
  `NumIngredient` int(11) NOT NULL,
  KEY `NomPate` (`CodePate`,`NumIngredient`),
  KEY `NumIngredient` (`NumIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `compose_pate`
--

INSERT INTO `compose_pate` (`CodePate`, `NumIngredient`) VALUES
(13, 1),
(13, 2);

-- --------------------------------------------------------

--
-- Structure de la table `compose_pizza`
--

CREATE TABLE IF NOT EXISTS `compose_pizza` (
  `CodePizza` int(11) NOT NULL,
  `NumIngredient` int(10) NOT NULL,
  KEY `NomPizza` (`CodePizza`,`NumIngredient`),
  KEY `NumIngredient` (`NumIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `compose_pizza`
--

INSERT INTO `compose_pizza` (`CodePizza`, `NumIngredient`) VALUES
(13, 1),
(13, 2),
(15, 1);

-- --------------------------------------------------------

--
-- Structure de la table `compose_salade`
--

CREATE TABLE IF NOT EXISTS `compose_salade` (
  `CodeSalade` int(11) NOT NULL,
  `NumIngredient` int(11) NOT NULL,
  KEY `NomSalade` (`CodeSalade`,`NumIngredient`),
  KEY `NumIngredient` (`NumIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `dessert`
--

CREATE TABLE IF NOT EXISTS `dessert` (
  `CodeDessert` int(11) NOT NULL auto_increment,
  `NomDessert` varchar(30) NOT NULL,
  `PrixDessert` double NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY  (`CodeDessert`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `dessert`
--

INSERT INTO `dessert` (`CodeDessert`, `NomDessert`, `PrixDessert`, `image`) VALUES
(1, 'aaaaazzz', 44, '..\\images\\TOP.png');

-- --------------------------------------------------------

--
-- Structure de la table `ingredient`
--

CREATE TABLE IF NOT EXISTS `ingredient` (
  `CodeIngredient` int(11) NOT NULL auto_increment,
  `NomIngredient` varchar(30) default NULL,
  PRIMARY KEY  (`CodeIngredient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `ingredient`
--

INSERT INTO `ingredient` (`CodeIngredient`, `NomIngredient`) VALUES
(1, 'Jambon'),
(2, 'Gruyere');

-- --------------------------------------------------------

--
-- Structure de la table `livreur`
--

CREATE TABLE IF NOT EXISTS `livreur` (
  `CodeLivreur` int(11) NOT NULL auto_increment,
  `NomLivreur` varchar(30) NOT NULL,
  `TelLivreur` int(10) NOT NULL,
  PRIMARY KEY  (`CodeLivreur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `CodeMenu` int(11) NOT NULL auto_increment,
  `NomMenu` varchar(30) NOT NULL,
  `PrixMenu` float NOT NULL,
  `NbPizza` int(11) default NULL,
  `NbPanini` int(11) default NULL,
  `NbTexMex` int(11) default NULL,
  `NbDessert` int(11) default NULL,
  `NbSalade` int(11) default NULL,
  `NbBoisson` int(11) default NULL,
  `CodeTarification` int(11) NOT NULL,
  PRIMARY KEY  (`CodeMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `panini`
--

CREATE TABLE IF NOT EXISTS `panini` (
  `CodePanini` int(11) NOT NULL auto_increment,
  `NomPanini` varchar(30) NOT NULL,
  `PrixPanini` double NOT NULL,
  PRIMARY KEY  (`CodePanini`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `panini`
--

INSERT INTO `panini` (`CodePanini`, `NomPanini`, `PrixPanini`) VALUES
(1, 'jambon', 5),
(2, 'Nutella', 7);

-- --------------------------------------------------------

--
-- Structure de la table `pate`
--

CREATE TABLE IF NOT EXISTS `pate` (
  `CodePate` int(11) NOT NULL auto_increment,
  `NomPate` varchar(30) NOT NULL,
  `PrixPate` float NOT NULL,
  `Image` varchar(50) NOT NULL,
  PRIMARY KEY  (`CodePate`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `pate`
--

INSERT INTO `pate` (`CodePate`, `NomPate`, `PrixPate`, `Image`) VALUES
(13, 'bbbazdazd', 5, '  ..\\images\\pizza1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `pizza`
--

CREATE TABLE IF NOT EXISTS `pizza` (
  `CodePizza` int(11) NOT NULL auto_increment,
  `NomPizza` varchar(30) NOT NULL,
  `Prix` float NOT NULL,
  `Image` varchar(50) NOT NULL,
  PRIMARY KEY  (`CodePizza`),
  KEY `NomPizza` (`NomPizza`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Contenu de la table `pizza`
--

INSERT INTO `pizza` (`CodePizza`, `NomPizza`, `Prix`, `Image`) VALUES
(13, 'Vegetarienne', 88, '..\\images\\TOP.png'),
(15, 'azdazdazd', 88, '..\\images\\pizza3.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `salade`
--

CREATE TABLE IF NOT EXISTS `salade` (
  `CodeSalade` int(11) NOT NULL auto_increment,
  `NomSalade` varchar(30) NOT NULL,
  `PrixSalade` double NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY  (`CodeSalade`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `salade`
--

INSERT INTO `salade` (`CodeSalade`, `NomSalade`, `PrixSalade`, `image`) VALUES
(1, 'vegetarienne', 11, ''),
(2, 'olive', 8, ''),
(4, 'test ajout', 22, '..\\images\\pizza1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `sandwich`
--

CREATE TABLE IF NOT EXISTS `sandwich` (
  `CodeSandwich` int(11) NOT NULL auto_increment,
  `NomSandwich` varchar(30) NOT NULL,
  `Prix` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  PRIMARY KEY  (`CodeSandwich`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `sandwich`
--

INSERT INTO `sandwich` (`CodeSandwich`, `NomSandwich`, `Prix`, `image`) VALUES
(1, 'aaazz', 22, '..\\images\\');

-- --------------------------------------------------------

--
-- Structure de la table `tarification`
--

CREATE TABLE IF NOT EXISTS `tarification` (
  `CodeTarification` int(11) NOT NULL auto_increment,
  `Taille` varchar(30) NOT NULL,
  `Coefficient` float NOT NULL,
  PRIMARY KEY  (`CodeTarification`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `texmex`
--

CREATE TABLE IF NOT EXISTS `texmex` (
  `CodeTexmex` int(11) NOT NULL auto_increment,
  `NomTexmex` varchar(30) NOT NULL,
  `PrixTexmex` float NOT NULL,
  PRIMARY KEY  (`CodeTexmex`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `CodeVille` int(11) NOT NULL auto_increment,
  `NomVille` varchar(30) NOT NULL,
  `CodePostal` int(5) NOT NULL,
  PRIMARY KEY  (`CodeVille`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`CodeVille`, `NomVille`, `CodePostal`) VALUES
(1, 'Butry-sur-Oise', 95430),
(2, 'Mériel', 95630);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD CONSTRAINT `adresse_ibfk_1` FOREIGN KEY (`CodeVille`) REFERENCES `ville` (`CodeVille`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_ibfk_1` FOREIGN KEY (`idAdresse`) REFERENCES `adresse` (`CodeAdresse`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`CodePizza`) REFERENCES `pizza` (`CodePizza`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_3` FOREIGN KEY (`CodeLivreur`) REFERENCES `livreur` (`CodeLivreur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_4` FOREIGN KEY (`CodeTarification`) REFERENCES `tarification` (`CodeTarification`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `commande_ibfk_5` FOREIGN KEY (`NumClient`) REFERENCES `client` (`NumClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `compose_panini`
--
ALTER TABLE `compose_panini`
  ADD CONSTRAINT `compose_panini_ibfk_1` FOREIGN KEY (`CodePanini`) REFERENCES `panini` (`CodePanini`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compose_panini_ibfk_2` FOREIGN KEY (`NumIngredient`) REFERENCES `ingredient` (`CodeIngredient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `compose_pate`
--
ALTER TABLE `compose_pate`
  ADD CONSTRAINT `compose_pate_ibfk_1` FOREIGN KEY (`CodePate`) REFERENCES `pate` (`CodePate`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compose_pate_ibfk_2` FOREIGN KEY (`NumIngredient`) REFERENCES `ingredient` (`CodeIngredient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `compose_pizza`
--
ALTER TABLE `compose_pizza`
  ADD CONSTRAINT `compose_pizza_ibfk_1` FOREIGN KEY (`NumIngredient`) REFERENCES `ingredient` (`CodeIngredient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compose_pizza_ibfk_2` FOREIGN KEY (`CodePizza`) REFERENCES `pizza` (`CodePizza`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `compose_salade`
--
ALTER TABLE `compose_salade`
  ADD CONSTRAINT `compose_salade_ibfk_1` FOREIGN KEY (`CodeSalade`) REFERENCES `salade` (`CodeSalade`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compose_salade_ibfk_2` FOREIGN KEY (`NumIngredient`) REFERENCES `ingredient` (`CodeIngredient`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
