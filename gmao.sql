-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 03 sep. 2018 à 10:41
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gmao`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `adminref` int(11) NOT NULL AUTO_INCREMENT,
  `nomadmin` text NOT NULL,
  `mdp` text NOT NULL,
  PRIMARY KEY (`adminref`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`adminref`, `nomadmin`, `mdp`) VALUES
(1, 'admin', 'Oncf2018');

-- --------------------------------------------------------

--
-- Structure de la table `conduite`
--

DROP TABLE IF EXISTS `conduite`;
CREATE TABLE IF NOT EXISTS `conduite` (
  `N` int(11) NOT NULL AUTO_INCREMENT,
  `nref` text NOT NULL,
  `datec` date NOT NULL,
  `Heures` int(11) DEFAULT NULL,
  `conducteur` text NOT NULL,
  `qtelitres` int(11) DEFAULT NULL,
  `observation` text NOT NULL,
  PRIMARY KEY (`N`)
) ENGINE=MyISAM AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `conduite`
--

INSERT INTO `conduite` (`N`, `nref`, `datec`, `Heures`, `conducteur`, `qtelitres`, `observation`) VALUES
(87, 'TRR-A07', '2018-07-31', 1, 'X', 173, 'ras');

-- --------------------------------------------------------

--
-- Structure de la table `gasoil`
--

DROP TABLE IF EXISTS `gasoil`;
CREATE TABLE IF NOT EXISTS `gasoil` (
  `nref` text NOT NULL,
  `1` float DEFAULT NULL,
  `2` float DEFAULT NULL,
  `3` float DEFAULT NULL,
  `4` float DEFAULT NULL,
  `5` float DEFAULT NULL,
  `6` float DEFAULT NULL,
  `7` float DEFAULT NULL,
  `8` float DEFAULT NULL,
  `9` float DEFAULT NULL,
  `10` float DEFAULT NULL,
  `11` float DEFAULT NULL,
  `12` float DEFAULT NULL,
  PRIMARY KEY (`nref`(7))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `gasoil`
--

INSERT INTO `gasoil` (`nref`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`) VALUES
('TRR-A02', NULL, NULL, NULL, NULL, NULL, NULL, 480, NULL, NULL, NULL, NULL, NULL),
('TRR-A03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A01', -716, 303, 100, 10, 200, 300, 200, 200, NULL, NULL, NULL, 100),
('TRR-A04', 122, 203, NULL, 300, 500, 300, 107, 200, NULL, NULL, NULL, 100),
('TRR-A05', 98, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL),
('TRR-A06', NULL, NULL, NULL, 50, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A07', NULL, NULL, NULL, NULL, NULL, NULL, 173, NULL, NULL, NULL, NULL, NULL),
('TRR-A08', NULL, NULL, NULL, NULL, NULL, NULL, 330, NULL, NULL, NULL, NULL, NULL),
('TRR-A09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A11', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A12', 0, NULL, NULL, NULL, NULL, NULL, 160, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `huilesliquides`
--

DROP TABLE IF EXISTS `huilesliquides`;
CREATE TABLE IF NOT EXISTS `huilesliquides` (
  `CodeHuile` text NOT NULL,
  `qtlitres` int(11) DEFAULT NULL,
  PRIMARY KEY (`CodeHuile`(10))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `huilesliquides`
--

INSERT INTO `huilesliquides` (`CodeHuile`, `qtlitres`) VALUES
('15W40\r\n', 500);

-- --------------------------------------------------------

--
-- Structure de la table `intervention`
--

DROP TABLE IF EXISTS `intervention`;
CREATE TABLE IF NOT EXISTS `intervention` (
  `Num` int(11) NOT NULL AUTO_INCREMENT,
  `nref` text NOT NULL,
  `typeinter` text NOT NULL,
  `dateinter` date NOT NULL,
  `observation` text NOT NULL,
  `CodePiece` text,
  `nbpiece` int(11) DEFAULT NULL,
  `CodeHuile` text,
  `qtlitres` int(11) DEFAULT NULL,
  PRIMARY KEY (`Num`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `intervention`
--

INSERT INTO `intervention` (`Num`, `nref`, `typeinter`, `dateinter`, `observation`, `CodePiece`, `nbpiece`, `CodeHuile`, `qtlitres`) VALUES
(8, 'TRR-A01', 'prÃ©ventive', '2016-05-09', 'RAS', 'PJ75135', 2, '15W40', 10),
(9, 'TRR-A02', 'prÃ©ventive', '2016-08-09', 'RAS', 'PJ75135', 2, '15W40', 10),
(7, 'TRR-A01', 'curative', '2016-09-09', 'RAS', 'PJ75135', 2, '15W40', 10),
(10, 'TRR-A02', 'prÃ©ventive', '2016-06-09', 'RAS', 'PJ75135', 2, '15W40', 10),
(11, 'TRR-A01', 'prÃ©ventive', '2016-02-09', 'RAS', 'PJ75135', 2, '15W40', 10),
(12, 'TRR-A01', 'prÃ©ventive', '2016-07-09', 'RAS', 'PJ75135', 2, '15W40', 10),
(13, 'TRR-A01', 'curative', '2016-01-09', 'Bon fonctionnement', 'PJ75135', 2, '15W40', 10),
(14, 'TRR-A01', 'curative', '2016-01-09', 'Bon fonctionnement', 'PJ75135', 2, '15W40', 10),
(15, 'TRR-A01', 'curative', '2016-01-09', 'RAS', 'PJ75135', 1, '15W40', 1),
(16, 'TRR-A01', 'curative', '2016-01-09', 'ras', '\"\"', 0, '\"\"', 0);

-- --------------------------------------------------------

--
-- Structure de la table `locotracteur`
--

DROP TABLE IF EXISTS `locotracteur`;
CREATE TABLE IF NOT EXISTS `locotracteur` (
  `nref` text NOT NULL,
  `HeureUti` int(11) DEFAULT NULL,
  `dateint` date DEFAULT NULL,
  `lastint` int(11) DEFAULT NULL,
  `datereception` date DEFAULT NULL,
  `nbjrarret` int(11) DEFAULT NULL,
  PRIMARY KEY (`nref`(7))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `locotracteur`
--

INSERT INTO `locotracteur` (`nref`, `HeureUti`, `dateint`, `lastint`, `datereception`, `nbjrarret`) VALUES
('TRR-A01', 1950, '2018-07-19', 100, '2014-04-23', 0),
('TRR-A02', 878, '2018-07-21', 200, '2015-02-10', 11),
('TRR-A03', 1822, '2018-06-04', 20, '2015-02-10', 0),
('TRR-A04', 958, '2018-07-26', 20, '2015-02-10', 0),
('TRR-A05', 3105, '2018-05-30', 20, '2015-02-10', 0),
('TRR-A06', 1559, '2018-06-05', 100, '2015-02-10', 0),
('TRR-A07', 2315, '2018-06-26', NULL, '2016-09-08', 11),
('TRR-A08', 1396, '2018-06-04', NULL, '2016-09-08', 0),
('TRR-A09', 626, '2018-06-04', NULL, '2016-09-08', 0),
('TRR-A10', 649, '2018-06-20', NULL, '2016-09-08', 0),
('TRR-A12', 1630, '2018-07-10', NULL, '2016-08-02', 3);

-- --------------------------------------------------------

--
-- Structure de la table `piecrechange`
--

DROP TABLE IF EXISTS `piecrechange`;
CREATE TABLE IF NOT EXISTS `piecrechange` (
  `CodePiece` text NOT NULL,
  `designation` text NOT NULL,
  `prixunite` int(11) DEFAULT NULL,
  `enstock` int(11) NOT NULL,
  PRIMARY KEY (`CodePiece`(1000))
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `piecrechange`
--

INSERT INTO `piecrechange` (`CodePiece`, `designation`, `prixunite`, `enstock`) VALUES
('PJ75135\r\n', 'FILTRE SEPARATEUR PRIMAIRE EAU/CARBURANT PJ75135\r\n', NULL, 31);

-- --------------------------------------------------------

--
-- Structure de la table `production`
--

DROP TABLE IF EXISTS `production`;
CREATE TABLE IF NOT EXISTS `production` (
  `nref` text NOT NULL,
  `1` int(11) DEFAULT NULL,
  `2` int(11) DEFAULT NULL,
  `3` int(11) DEFAULT NULL,
  `4` int(11) DEFAULT NULL,
  `5` int(11) DEFAULT NULL,
  `6` int(11) DEFAULT NULL,
  `7` int(11) DEFAULT NULL,
  `8` int(11) DEFAULT NULL,
  `9` int(11) DEFAULT NULL,
  `10` int(11) DEFAULT NULL,
  `11` int(11) DEFAULT NULL,
  `12` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `production`
--

INSERT INTO `production` (`nref`, `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`) VALUES
('TRR-A01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A02', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A04', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A08', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A09', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('TRR-A10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `technicien`
--

DROP TABLE IF EXISTS `technicien`;
CREATE TABLE IF NOT EXISTS `technicien` (
  `code` int(11) NOT NULL AUTO_INCREMENT,
  `nomtech` text NOT NULL,
  `mdp` text NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `technicien`
--

INSERT INTO `technicien` (`code`, `nomtech`, `mdp`) VALUES
(1, 'tech', 'oncf2018');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
