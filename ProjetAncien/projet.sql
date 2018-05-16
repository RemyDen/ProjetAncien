-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 15 Mai 2018 à 10:32
-- Version du serveur :  5.6.20-log
-- Version de PHP :  5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
`id` int(10) NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dateNaissance` date NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `typeUtilisateur` int(2) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codePostal` int(5) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `niveauEtude` varchar(5) DEFAULT NULL,
  `anneeDiplome` int(4) DEFAULT NULL,
  `entreprise` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `poste` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `anneePoste` int(4) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `dateNaissance`, `mail`, `typeUtilisateur`, `mdp`, `adresse`, `codePostal`, `ville`, `niveauEtude`, `anneeDiplome`, `entreprise`, `poste`, `anneePoste`) VALUES
(1, 'Naszalyi', '', '0000-00-00', '', 0, '', '', 0, '', NULL, NULL, NULL, NULL, NULL),
(2, 'Naszalyi', 'Paul', '0000-00-00', '', 0, '', '', 0, '', NULL, NULL, NULL, NULL, NULL),
(3, 'Naszalyi', 'Paul', '0000-00-00', '', 0, '', '', 0, '', NULL, NULL, NULL, NULL, NULL),
(4, 'Naszalyi', 'Paul', '0000-00-00', '', 0, '', '', 0, '', NULL, NULL, NULL, NULL, NULL),
(5, 'Naszalyi', 'Paul', '0000-00-00', '', 0, '', '10 bis rue du Ratrait', 0, '', NULL, NULL, NULL, NULL, NULL),
(6, 'Naszalyi', 'Paul', '0000-00-00', '', 0, '', '10 bis rue du Ratrait', 92150, '', NULL, NULL, NULL, NULL, NULL),
(7, 'Naszalyi', 'Paul', '0000-00-00', '', 0, '', '10 bis rue du Ratrait', 92150, 'Suresnes', NULL, NULL, NULL, NULL, NULL),
(8, 'Naszalyi', 'Paul', '0000-00-00', 'paulnaszalyi@yahoo.fr', 0, '', '10 bis rue du Ratrait', 92150, 'Suresnes', NULL, NULL, NULL, NULL, NULL),
(9, 'Naszalyi', 'Paul', '0000-00-00', 'paulnaszalyi@yahoo.fr', 0, 'test', '10 bis rue du Ratrait', 92150, 'Suresnes', NULL, NULL, NULL, NULL, NULL),
(10, 'Naszalyi', 'Paul', '0000-00-00', 'paulnaszalyi@yahoo.fr', 3, 'test', '10 bis rue du Ratrait', 92150, 'Suresnes', NULL, NULL, NULL, NULL, NULL),
(11, 'Naszalyi', 'Paul', '0000-00-00', 'paulnaszalyi@yahoo.fr', 3, 'test', '10 bis rue du Ratrait', 92150, 'Suresnes', '', NULL, NULL, NULL, NULL),
(12, 'Naszalyi', 'Paul', '0000-00-00', 'paulnaszalyi@yahoo.fr', 3, 'test', '10 bis rue du Ratrait', 92150, 'Suresnes', '', 0, NULL, NULL, NULL),
(13, 'Naszalyi', 'Paul', '0000-00-00', 'paulnaszalyi@yahoo.fr', 3, 'test', '10 bis rue du Ratrait', 92150, 'Suresnes', '', 0, '', NULL, NULL),
(14, 'Naszalyi', 'Paul', '0000-00-00', 'paulnaszalyi@yahoo.fr', 2, 'test', '10 bis rue du Ratrait', 92150, 'Suresnes', '', 125, '', '', NULL),
(15, 'Naszalyi', 'Paul', '0000-00-00', 'paulnaszalyi@yahoo.fr', 2, 'test', '10 bis rue du Ratrait', 92150, 'Suresnes', '', 125, '', '', NULL),
(16, 'Naszalyi', 'Paul', '0000-00-00', 'paulnaszalyi@yahoo.fr', 3, 'test', '10 bis rue du Ratrait', 92150, 'Suresnes', '', 0, '', '', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
