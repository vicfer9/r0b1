-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 01 mai 2018 à 15:03
-- Version du serveur :  5.7.19
-- Version de PHP :  5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `r0b1`
--

-- --------------------------------------------------------

--
-- Structure de la table `connexion`
--

DROP TABLE IF EXISTS `connexion`;
CREATE TABLE IF NOT EXISTS `connexion` (
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  PRIMARY KEY (`id_user1`,`id_user2`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `cv`
--

DROP TABLE IF EXISTS `cv`;
CREATE TABLE IF NOT EXISTS `cv` (
  `id_publication` int(11) NOT NULL,
  `nom_fichier` varchar(50) NOT NULL,
  `titre` varchar(30) NOT NULL,
  PRIMARY KEY (`id_publication`),
  UNIQUE KEY `nom_fichier` (`nom_fichier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `emplois`
--

DROP TABLE IF EXISTS `emplois`;
CREATE TABLE IF NOT EXISTS `emplois` (
  `id_emploi` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(80) NOT NULL,
  `entreprise` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `date_debut` date NOT NULL,
  `id_proprio` int(11) NOT NULL,
  PRIMARY KEY (`id_emploi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id_publication` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `titre` varchar(40) NOT NULL,
  `description` text NOT NULL,
  `lieu` varchar(80) NOT NULL,
  `date_heure` datetime NOT NULL,
  PRIMARY KEY (`id_publication`),
  UNIQUE KEY `id_event` (`id_event`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participation`
--

DROP TABLE IF EXISTS `participation`;
CREATE TABLE IF NOT EXISTS `participation` (
  `id_user` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_event`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `photo_video`
--

DROP TABLE IF EXISTS `photo_video`;
CREATE TABLE IF NOT EXISTS `photo_video` (
  `id_publication` int(11) NOT NULL,
  `nom_fichier` varchar(50) NOT NULL,
  `video` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_publication`),
  UNIQUE KEY `id_publication` (`id_publication`),
  UNIQUE KEY `nom_fichier` (`nom_fichier`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE IF NOT EXISTS `publication` (
  `id_publication` int(11) NOT NULL AUTO_INCREMENT,
  `id_proprio` int(11) NOT NULL,
  `date_ajout` datetime NOT NULL,
  `visibilité` enum('Tout le monde','Mes amis','Privé') NOT NULL,
  `description` text NOT NULL,
  `titre` varchar(30) NOT NULL,
  PRIMARY KEY (`id_publication`),
  UNIQUE KEY `id_publication` (`id_publication`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_user`, `nom`, `prenom`, `email`, `mdp`, `admin`) VALUES
(1, 'kakpo', 'nelson', 'nk@edu.ece.fr', 'tekken5', 0),
(7, '', '', '', '', 0),
(6, 'n', 'k', 'pokak@edu.ece.fr', 'tekken5', 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
