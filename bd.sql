-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 12 Juin 2017 à 18:38
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `site`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE IF NOT EXISTS `administrateur` (
  `user` varchar(5) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `administrateur`
--

INSERT INTO `administrateur` (`user`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `chef`
--

CREATE TABLE IF NOT EXISTS `chef` (
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `adress` text NOT NULL,
  `email` varchar(15) NOT NULL DEFAULT '',
  `password` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chef`
--

INSERT INTO `chef` (`nom`, `prenom`, `adress`, `email`, `password`) VALUES
('Atef', 'atef', 'oeb', 'atef@gmail.com', 'atef'),
('Atef', 'Aliat', 'Batna', 'atef@yahoo.fr', 'atef');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `nomc` text NOT NULL,
  `prenomc` text NOT NULL,
  `emailC` varchar(20) NOT NULL,
  `idc` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idc`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`nomc`, `prenomc`, `emailC`, `idc`) VALUES
('mezrag', 'faycel', 'faycel@yahoo.fr', 5),
('ahmed', 'hamlaoui', 'ahmed@yahoo.fr', 6);

-- --------------------------------------------------------

--
-- Structure de la table `creation`
--

CREATE TABLE IF NOT EXISTS `creation` (
  `emailChef` varchar(20) NOT NULL,
  `numProjet` int(100) NOT NULL,
  `emailClient` varchar(20) NOT NULL,
  `numcre` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`numcre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `creation`
--

INSERT INTO `creation` (`emailChef`, `numProjet`, `emailClient`, `numcre`) VALUES
('atef@yahoo.fr', 1, 'faycel@yahoo.fr', 1),
('atef@gmail.com', 1, 'ahmed@yahoo.fr', 2);

-- --------------------------------------------------------

--
-- Structure de la table `humaine`
--

CREATE TABLE IF NOT EXISTS `humaine` (
  `idrh` int(11) NOT NULL AUTO_INCREMENT,
  `responsable` text NOT NULL,
  `idtache` int(100) NOT NULL,
  `nbrequipe` int(255) NOT NULL,
  `salaire` double NOT NULL,
  PRIMARY KEY (`idrh`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `humaine`
--

INSERT INTO `humaine` (`idrh`, `responsable`, `idtache`, `nbrequipe`, `salaire`) VALUES
(1, 'mehdi', 1, 3, 12900);

-- --------------------------------------------------------

--
-- Structure de la table `materiel`
--

CREATE TABLE IF NOT EXISTS `materiel` (
  `idtache` int(100) NOT NULL,
  `nomm` text NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` double NOT NULL,
  `idrm` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`idrm`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `projet`
--

CREATE TABLE IF NOT EXISTS `projet` (
  `numProjet` int(100) NOT NULL AUTO_INCREMENT,
  `intitule` text NOT NULL,
  `description` text NOT NULL,
  `lieu` text NOT NULL,
  `datedebut` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `datefin` datetime NOT NULL,
  PRIMARY KEY (`numProjet`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `projet`
--

INSERT INTO `projet` (`numProjet`, `intitule`, `description`, `lieu`, `datedebut`, `datefin`) VALUES
(1, 'projet1', 'multimÃ©dia', 'oeb', '2017-01-01 00:00:00', '2018-01-01 00:00:00'),
(2, 'projet1', 'projet de gestion', 'oeb', '2017-01-01 00:00:00', '2018-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `rapport`
--

CREATE TABLE IF NOT EXISTS `rapport` (
  `numreunion` int(11) NOT NULL,
  `numrapport` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`numrapport`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ressource`
--

CREATE TABLE IF NOT EXISTS `ressource` (
  `idressource` int(100) NOT NULL AUTO_INCREMENT,
  `idtache` int(100) NOT NULL,
  `type` text NOT NULL,
  PRIMARY KEY (`idressource`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `ressource`
--

INSERT INTO `ressource` (`idressource`, `idtache`, `type`) VALUES
(1, 1, 'Humaine');

-- --------------------------------------------------------

--
-- Structure de la table `reunion`
--

CREATE TABLE IF NOT EXISTS `reunion` (
  `numReuinion` int(11) NOT NULL AUTO_INCREMENT,
  `responsable` varchar(20) NOT NULL,
  `sujet` text NOT NULL,
  `datereunion` datetime NOT NULL,
  `heurer` time NOT NULL,
  `emailChef` varchar(50) NOT NULL,
  PRIMARY KEY (`numReuinion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `reunion`
--

INSERT INTO `reunion` (`numReuinion`, `responsable`, `sujet`, `datereunion`, `heurer`, `emailChef`) VALUES
(1, 'Ahmed', 'dÃ©lai', '2017-06-12 00:00:00', '10:00:00', 'atef@yahoo.fr'),
(2, 'samir', 'gestion', '2017-02-06 00:00:00', '10:00:00', 'atef@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `tache`
--

CREATE TABLE IF NOT EXISTS `tache` (
  `idtache` int(11) NOT NULL AUTO_INCREMENT,
  `nomt` text NOT NULL,
  `datedebutt` datetime NOT NULL,
  `datefint` datetime NOT NULL,
  `numProjet` int(11) NOT NULL,
  PRIMARY KEY (`idtache`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `tache`
--

INSERT INTO `tache` (`idtache`, `nomt`, `datedebutt`, `datefint`, `numProjet`) VALUES
(1, 't1', '2017-01-01 00:00:00', '2017-03-02 00:00:00', 1),
(2, 't2', '2017-02-03 00:00:00', '2017-06-02 00:00:00', 1),
(3, 't3', '2017-04-01 00:00:00', '2017-09-01 00:00:00', 1),
(4, 't4', '2017-05-04 00:00:00', '2017-12-08 00:00:00', 1),
(5, 't1', '2017-02-28 00:00:00', '2017-04-04 00:00:00', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
