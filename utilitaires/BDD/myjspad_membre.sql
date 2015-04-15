-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 15 Avril 2015 à 17:10
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `myjspad_membre`
--

-- --------------------------------------------------------

--
-- Structure de la table `identifiant_membre`
--

CREATE TABLE IF NOT EXISTS `identifiant_membre` (
  `membre_id` int(11) NOT NULL AUTO_INCREMENT,
  `membre_pseudo` varchar(100) NOT NULL,
  `membre_email` varchar(100) NOT NULL,
  `membre_mdp` varchar(100) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`membre_id`),
  UNIQUE KEY `membre_pseudo` (`membre_pseudo`,`membre_email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `identifiant_membre`
--

INSERT INTO `identifiant_membre` (`membre_id`, `membre_pseudo`, `membre_email`, `membre_mdp`, `is_verified`) VALUES
(1, 'aze', '1d2ab164559aaf8a30eebf516d2f63ad', '0a5b3913cbc9a9092311630e869b4442', 0),
(2, 'sim', 'sim@sim.fr', 'e9064b74d28acc053231170bb8c858b3', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
