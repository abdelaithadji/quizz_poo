-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Lun 19 Mai 2014 à 00:14
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `questionnaire2`
--
CREATE DATABASE IF NOT EXISTS `e1395013` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `e1395013`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `titre_categorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`),
  UNIQUE KEY `titre_categorie` (`titre_categorie`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `titre_categorie`) VALUES
(2, 'CSS'),
(1, 'Internet et web'),
(3, 'XHTML');

-- --------------------------------------------------------

--
-- Structure de la table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `id_question` int(11) NOT NULL AUTO_INCREMENT,
  `titre_question` varchar(100) NOT NULL,
  `categorie_question` varchar(50) NOT NULL,
  PRIMARY KEY (`id_question`),
  UNIQUE KEY `titre_question` (`titre_question`),
  KEY `categorie_question` (`categorie_question`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Contenu de la table `question`
--

INSERT INTO `question` (`id_question`, `titre_question`, `categorie_question`) VALUES
(1, 'Quel est le protocole de communication de l''''internet?', 'Internet et web'),
(2, 'Lequel parmi les protocoles suivants n''''est pas un protocole de communication du web?', 'Internet et web'),
(3, 'Lequel parmi les adresses suivants n''''est pas un adresse internet?', 'Internet et web'),
(4, 'L''internet et le web sont-ils la meme chose?', 'Internet et web'),
(5, 'Que signifie ADSL?', 'Internet et web'),
(6, 'Combien Vaut 1MB?', 'Internet et web'),
(7, 'Internet Explorer est un ...', 'Internet et web'),
(8, 'Que veut dire ''''HTML''''?', 'XHTML'),
(9, 'Quel organisme definit les normes pour le web?', 'XHTML'),
(10, 'Quelle est la balise correcte pour le titre avec la taille de caractere la plus grande', 'XHTML'),
(11, 'Quelle est la balise corecte pour faire un saut de ligne?', 'XHTML'),
(12, 'Que fait la balise <blockquote> ?', 'XHTML'),
(13, 'Il existe une balise <forme> en XHTML', 'XHTML'),
(14, 'Que veut dire ''''CSS''''?', 'CSS'),
(15, 'Quel est le code correct pour associer une feuille de style externe dans un fichier HTML?''', 'CSS'),
(16, 'A quel endroit dans un fichier HTML faut-il faire référence a une feuille de style externe?', 'CSS'),
(17, 'Quelle est la balise HTML pour definir une feuille de style interne?', 'CSS'),
(18, 'la balise <STYLE> necessite une balise fermante?', 'CSS');

-- --------------------------------------------------------

--
-- Structure de la table `reponse`
--

CREATE TABLE IF NOT EXISTS `reponse` (
  `id_reponse` int(11) NOT NULL AUTO_INCREMENT,
  `titre_reponse` varchar(100) NOT NULL,
  `categorie_reponse` varchar(100) NOT NULL,
  `bonne_reponse` int(1) unsigned NOT NULL,
  PRIMARY KEY (`id_reponse`),
  KEY `categorie_reponse` (`categorie_reponse`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Contenu de la table `reponse`
--

INSERT INTO `reponse` (`id_reponse`, `titre_reponse`, `categorie_reponse`, `bonne_reponse`) VALUES
(1, 'IP', 'Quel est le protocole de communication de l''''internet?', 0),
(2, 'TCP/IP', 'Quel est le protocole de communication de l''''internet?', 1),
(3, 'HTTP', 'Quel est le protocole de communication de l''''internet?', 0),
(4, 'MAILTO', 'Quel est le protocole de communication de l''''internet?', 0),
(5, 'FTP', 'Lequel parmi les protocoles suivants n''''est pas un protocole de communication du web?', 0),
(6, 'HTTP', 'Lequel parmi les protocoles suivants n''''est pas un protocole de communication du web?', 0),
(7, 'SNMP', 'Lequel parmi les protocoles suivants n''''est pas un protocole de communication du web?', 1),
(8, 'MAILTO', 'Lequel parmi les protocoles suivants n''''est pas un protocole de communication du web?', 0),
(9, '192.68.20.50', 'Lequel parmi les adresses suivants n''''est pas un adresse internet?', 0),
(10, '67.71.157.151', 'Lequel parmi les adresses suivants n''''est pas un adresse internet?', 0),
(11, '055.17.257.139', 'Lequel parmi les adresses suivants n''''est pas un adresse internet?', 1),
(12, '127.0.0.1', 'Lequel parmi les adresses suivants n''''est pas un adresse internet?', 0),
(13, 'Vrai', 'L''internet et le web sont-ils la meme chose?', 0),
(14, 'Faux', 'L''internet et le web sont-ils la meme chose?', 1),
(15, 'Acces Digital Sur Ligne', 'Que signifie ADSL?', 1),
(16, 'Asymmetric Digital Subscriber Line', 'Que signifie ADSL?', 0),
(17, 'Assemblee Des Surfeurs du Lac', 'Que signifie ADSL?', 0),
(18, '24 KB', 'Combien Vaut 1MB?', 0),
(19, '124 KB', 'Combien Vaut 1MB?', 0),
(20, '1024 KB', 'Combien Vaut 1MB?', 1),
(21, 'Furteur', 'Internet Explorer est un ...', 1),
(22, 'Script', 'Internet Explorer est un ...', 0),
(23, 'FLOP total', 'Internet Explorer est un ...', 0),
(24, 'Hyperlinks and Text Markup Language', 'Que veut dire ''''HTML''''?', 0),
(25, 'Hyper Text Markup Language', 'Que veut dire ''''HTML''''?', 1),
(26, 'Home Tool Markup Language', 'Que veut dire ''''HTML''''?', 0),
(27, 'The World Wide Web C', 'Quel organisme definit les normes pour le web?', 1),
(28, 'Netscape', 'Quel organisme definit les normes pour le web?', 0),
(29, 'Microsoft', 'Quel organisme definit les normes pour le web?', 0),
(30, '<h6>', 'Quelle est la balise correcte pour le titre avec la taille de caractere la plus grande', 0),
(31, '<head>', 'Quelle est la balise correcte pour le titre avec la taille de caractere la plus grande', 0),
(32, '<heading>', 'Quelle est la balise correcte pour le titre avec la taille de caractere la plus grande', 0),
(33, '<h1>', 'Quelle est la balise correcte pour le titre avec la taille de caractere la plus grande', 1),
(34, '<br>', 'Quelle est la balise corecte pour faire un saut de ligne?', 0),
(35, '<br />', 'Quelle est la balise corecte pour faire un saut de ligne?', 1),
(36, '<break>', 'Quelle est la balise corecte pour faire un saut de ligne?', 0),
(37, '<break />', 'Quelle est la balise corecte pour faire un saut de ligne?', 0),
(38, 'Ajoute un retrait de paragraphe', 'Que fait la balise <blockquote> ?', 1),
(39, 'Ajoute des guillements', 'Que fait la balise <blockquote> ?', 0),
(40, 'Aucune de ces reponses', 'Que fait la balise <blockquote> ?', 0),
(41, 'Vrai', 'Il existe une balise <forme> en XHTML', 0),
(42, 'Faux', 'Il existe une balise <forme> en XHTML', 1),
(43, 'Cascading Style Sheets', 'Que veut dire ''''CSS''''?', 1),
(44, 'Computer Style Sheets', 'Que veut dire ''''CSS''''?', 0),
(45, 'Creative Style Sheets', 'Que veut dire ''''CSS''''?', 0),
(46, 'Colorful Style Sheets', 'Que veut dire ''''CSS''''?', 0),
(47, '<style src="mystyle.css" />', 'Quel est le code correct pour associer une feuille de style externe dans un fichier HTML?''', 0),
(48, '<link rel="stylesheet" type="text/css" href="mystyle.css" />', 'Quel est le code correct pour associer une feuille de style externe dans un fichier HTML?''', 1),
(49, '<stylesheet>mystyle.css</stylesheet>', 'Quel est le code correct pour associer une feuille de style externe dans un fichier HTML?''', 0),
(50, '<link rel="stylesheet" type="text/css" href="mystyle.css">', 'Quel est le code correct pour associer une feuille de style externe dans un fichier HTML?''', 0),
(51, 'A la fin du document', 'A quel endroit dans un fichier HTML faut-il faire référence a une feuille de style externe?', 0),
(52, 'Dans l''''element <head>', 'A quel endroit dans un fichier HTML faut-il faire référence a une feuille de style externe?', 1),
(53, 'Au debut du document.', 'A quel endroit dans un fichier HTML faut-il faire référence a une feuille de style externe?', 0),
(54, 'Dans l''''element <body>', 'A quel endroit dans un fichier HTML faut-il faire référence a une feuille de style externe?', 0),
(55, '<style>', 'Quelle est la balise HTML pour definir une feuille de style interne?', 1),
(56, '<script>', 'Quelle est la balise HTML pour definir une feuille de style interne?', 0),
(57, '<css>', 'Quelle est la balise HTML pour definir une feuille de style interne?', 0),
(58, 'Aucune parmi les précédentes.', 'Quelle est la balise HTML pour definir une feuille de style interne?', 0),
(59, 'Vrai', 'la balise <STYLE> necessite une balise fermante?', 1),
(60, 'Faux', 'la balise <STYLE> necessite une balise fermante?', 0);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `categorie_titre` FOREIGN KEY (`categorie_question`) REFERENCES `categorie` (`titre_categorie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `reponse`
--
ALTER TABLE `reponse`
  ADD CONSTRAINT `question_reponse` FOREIGN KEY (`categorie_reponse`) REFERENCES `question` (`titre_question`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
