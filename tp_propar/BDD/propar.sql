-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 21 fév. 2020 à 13:56
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `propar`
--

DELIMITER $$
--
-- Procédures
--
DROP PROCEDURE IF EXISTS `see_CA`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `see_CA` ()  BEGIN
        SELECT SUM(cout) FROM end_ope WHERE statut = 'Terminer';
    END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_client`),
  KEY `CLIENT_UTILISATEUR_FK` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `id_user`) VALUES
(1, 'Titi', 'coco', 1),
(3, 'TATA', 'CYNTHIA', 1),
(4, 'CARRE', 'MOT', 1);

--
-- Déclencheurs `client`
--
DROP TRIGGER IF EXISTS `maj_client`;
DELIMITER $$
CREATE TRIGGER `maj_client` BEFORE INSERT ON `client` FOR EACH ROW BEGIN
    SET NEW.nom = UPPER(NEW.nom);
    SET NEW.prenom = UPPER(NEW.prenom);
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `end_ope`
--

DROP TABLE IF EXISTS `end_ope`;
CREATE TABLE IF NOT EXISTS `end_ope` (
  `id_ope` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cout` int(11) NOT NULL,
  `date_comm` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_FAIT` int(11) DEFAULT NULL,
  `id_client` int(11) NOT NULL,
  `end_date` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_ope`),
  KEY `OPERATION_UTILISATEUR_FK` (`id_user`),
  KEY `OPERATION_UTILISATEUR0_FK` (`id_user_FAIT`),
  KEY `OPERATION_CLIENT1_FK` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `end_ope`
--

INSERT INTO `end_ope` (`id_ope`, `description`, `type`, `statut`, `cout`, `date_comm`, `id_user`, `id_user_FAIT`, `id_client`, `end_date`) VALUES
(4, 'lololololo', 'Grosse manoeuvre', 'Terminer', 5000, '2020-02-13', 1, 2, 1, '2020-02-13'),
(5, 'lololololo', 'Grosse manoeuvre', 'Terminer', 5000, '2020-02-13', 1, 2, 1, '2020-02-13'),
(7, 'lololololo', 'Grosse manoeuvre', 'Terminer', 5000, '2020-02-13', 1, 2, 1, '2020-02-14'),
(8, 'lololololo', 'Grosse manoeuvre', 'Terminer', 5000, '2020-02-13', 1, 2, 1, '2020-02-13'),
(9, 'lololololo', 'Grosse manoeuvre', 'Terminer', 5000, '2020-02-13', 1, 2, 1, '2020-02-13'),
(10, 'lololololo', 'Grosse manoeuvre', 'Terminer', 5000, '2020-02-13', 1, 2, 1, '2020-02-13'),
(11, 'lololololo', 'Grosse manoeuvre', 'Terminer', 5000, '2020-02-13', 1, 2, 1, '2020-02-13'),
(12, 'lololololo', 'Grosse manoeuvre', 'Terminer', 5000, '2020-02-13', 1, 2, 1, '2020-02-13'),
(13, 'lilili', 'Petite manoeuvre', 'Terminer', 1000, '2020-02-13', 1, 1, 1, '2020-02-14'),
(14, 'lulululu', 'Grosse manoeuvre', 'Terminer', 5000, '2020-02-13', 1, 1, 1, '2020-02-14'),
(15, 'lnlnlnl', 'Petite manoeuvre', 'Terminer', 100, '2020-02-13', 1, 1, 1, '2020-02-14'),
(16, 'Nettoyage salle info', 'Grosse manoeuvre', 'Terminer', 15455, '2020-02-13', 1, 2, 1, '2020-02-14'),
(17, 'lalalaiakglkhdxgndx', 'Grosse manoeuvre', 'Terminer', 12121, '2020-02-13', 1, 2, 1, '2020-02-20'),
(18, 'Nettoyage Laurie', 'Petite manoeuvre', 'Terminer', 50, '2020-02-14', 1, 1, 1, '2020-02-17'),
(19, 'Nettoyage Laurie', 'Petite manoeuvre', 'Terminer', 50, '2020-02-14', 1, 1, 1, '2020-02-17'),
(20, 'Nettoyage Laurie', 'Petite manoeuvre', 'Terminer', 50, '2020-02-14', 1, 1, 1, '2020-02-17'),
(21, 'Nettoyage Laurie', 'Petite manoeuvre', 'Terminer', 50, '2020-02-14', 1, 1, 1, '2020-02-14'),
(22, 'Nettoyage Laurie', 'Petite manoeuvre', 'Terminer', 50, '2020-02-14', 1, 1, 1, '2020-02-17'),
(23, 'eteststsetes', 'Grosse manoeuvre', 'Terminer', 3870, '2020-02-14', 1, 1, 1, '2020-02-17'),
(24, 'dffdgdgd', 'Grosse manoeuvre', 'En cours', 3870, '2020-02-14', 1, 1, 1, '2020-02-21'),
(26, 'tstlaulau', 'Grosse manoeuvre', 'En cours', 4578, '2020-02-14', 2, 2, 1, '2020-02-21'),
(28, '^pjhgfdshgj', 'Moyenne manoeuvre', 'Terminer', 2454, '2020-02-14', 3, 1, 1, '2020-02-17'),
(29, 'gchghgchgc', 'Grosse manoeuvre', 'Terminer', 24545, '2020-02-14', 3, 2, 1, '2020-02-14'),
(31, 'fchfchfdhfdhfd', 'Grosse manoeuvre', 'Terminer', 4547, '2020-02-14', 3, 1, 2, '2020-02-17'),
(32, '1hgjhgjhg', 'Grosse manoeuvre', 'Terminer', 45412, '2020-02-17', 1, 2, 1, '2020-02-19'),
(33, 'dssdsdsdssd', 'Grosse manoeuvre', 'En cours', 4578, '2020-02-17', 1, 4, 1, '2020-02-21'),
(34, '1212112', 'Grosse manoeuvre', 'En cours', 21212, '2020-02-17', 1, 1, 2, '2020-02-21'),
(35, '45545454', 'Moyenne manoeuvre', 'Terminer', 2345, '2020-02-17', 1, 1, 1, '2020-02-17'),
(36, 'popopopopopop', 'Moyenne manoeuvre', 'En cours', 2457, '2020-02-17', 1, 1, 1, '2020-02-21'),
(37, 'nettoyage informatique', 'Petite manoeuvre', 'En cours', 50, '2020-02-18', 4, 4, 2, '2020-02-21'),
(38, 'mÃ©nage bureau senior', 'Moyenne manoeuvre', 'En cours', 2200, '2020-02-18', 4, 4, 1, '2020-02-21'),
(39, 'Nettoyage salle info', 'Petite manoeuvre', 'Terminer', 400, '2020-02-19', 2, 2, 1, '2020-02-20'),
(40, 'nettoyage bureau', 'Petite manoeuvre', 'Terminer', 400, '2020-02-20', 2, 2, 1, '2020-02-21'),
(41, 'Rangement et nettoyage immeuble', 'Grosse manoeuvre', 'Terminer', 2600, '2020-02-20', 2, 2, 2, '2020-02-20'),
(42, 'Rangement et nettoyage immeuble	', 'Moyenne manoeuvre', 'Terminer', 2400, '2020-02-20', 2, 2, 1, '2020-02-21'),
(43, 'Nettoyage bureau direction', 'Moyenne manoeuvre', 'Terminer', 2200, '2020-02-21', 1, 1, 2, '2020-02-21'),
(44, 'test adn', 'Petite manoeuvre', 'Terminer', 20, '2020-02-21', 1, 1, 3, '2020-02-21'),
(45, 'test laurie', 'Moyenne manoeuvre', 'Terminer', 2200, '2020-02-21', 2, 2, 3, '2020-02-21'),
(46, 'test laurie2', 'Moyenne manoeuvre', 'Terminer', 2200, '2020-02-21', 2, 2, 3, '2020-02-21'),
(47, 'test Mjuscule', 'Petite manoeuvre', 'Terminer', 50, '2020-02-21', 2, 2, 2, '2020-02-21'),
(48, 'Nettoyage Hall d entree', 'Moyenne manoeuvre', 'Terminer', 2200, '2020-02-21', 2, 2, 2, '2020-02-21'),
(49, 'nettoyage entrÃ©e', 'Petite manoeuvre', 'Terminer', 50, '2020-02-21', 2, 2, 1, '2020-02-21'),
(50, 'pressing', 'Petite manoeuvre', 'Terminer', 430, '2020-02-21', 1, 1, 2, '2020-02-21');

-- --------------------------------------------------------

--
-- Structure de la table `operation`
--

DROP TABLE IF EXISTS `operation`;
CREATE TABLE IF NOT EXISTS `operation` (
  `id_ope` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `statut` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cout` int(11) NOT NULL,
  `date_comm` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_user_FAIT` int(11) DEFAULT NULL,
  `id_client` int(11) NOT NULL,
  PRIMARY KEY (`id_ope`),
  KEY `OPERATION_UTILISATEUR_FK` (`id_user`),
  KEY `OPERATION_UTILISATEUR0_FK` (`id_user_FAIT`),
  KEY `OPERATION_CLIENT1_FK` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `operation`
--

INSERT INTO `operation` (`id_ope`, `description`, `type`, `statut`, `cout`, `date_comm`, `id_user`, `id_user_FAIT`, `id_client`) VALUES
(51, 'Nettoyage logement', 'Grosse manoeuvre', 'En cours', 2600, '2020-02-21', 1, 2, 4),
(52, 'Nettoyage du hall d&#039;entr&eacute;e', 'Grosse manoeuvre', 'En cours', 5000, '2020-02-21', 2, 2, 4),
(54, 'Nettoyage vitre', 'Petite manoeuvre', 'En cours', 20, '2020-02-21', 1, 1, 4),
(55, 'Pressing', 'Petite manoeuvre', 'En cours', 120, '2020-02-21', 1, 1, 4);

--
-- Déclencheurs `operation`
--
DROP TRIGGER IF EXISTS `end_of_ope`;
DELIMITER $$
CREATE TRIGGER `end_of_ope` BEFORE DELETE ON `operation` FOR EACH ROW BEGIN
    INSERT INTO end_ope (
        id_ope,
        description,
        type,
        statut,
        cout,
        date_comm,
        id_user,
        id_user_FAIT,
        id_client,
        end_date
        )
     VALUES (
         OLD.id_ope,
         OLD.description,
         OLD.type,
         OLD.statut,
         OLD.cout,
         OLD.date_comm,
         OLD.id_user,
         OLD.id_user_FAIT,
         OLD.id_client,
         DATE(NOW())
         );
      END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mdp` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nbOpe` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_user`, `nom`, `prenom`, `type`, `login`, `mdp`, `nbOpe`) VALUES
(1, 'BENOIT', 'ADRIEN', 'EXPERT', 'adnbnt', 'a88d4ae7dc2a22f8473938d5e6230ec6', NULL),
(2, 'BRUN', 'LAURIE', 'SENIOR', 'laulau', 'a88d4ae7dc2a22f8473938d5e6230ec6', NULL),
(7, 'DEMETSER', 'MICHAEL', 'APPRENTI', 'micha', 'a88d4ae7dc2a22f8473938d5e6230ec6', NULL);

--
-- Déclencheurs `utilisateur`
--
DROP TRIGGER IF EXISTS `maj_user`;
DELIMITER $$
CREATE TRIGGER `maj_user` BEFORE INSERT ON `utilisateur` FOR EACH ROW BEGIN
    SET NEW.nom = UPPER(NEW.nom);
    SET NEW.type = UPPER(NEW.type); 
    SET NEW.prenom = UPPER(NEW.prenom);
    END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `maj_user_update`;
DELIMITER $$
CREATE TRIGGER `maj_user_update` BEFORE UPDATE ON `utilisateur` FOR EACH ROW BEGIN
    SET NEW.nom = UPPER(NEW.nom);
    SET NEW.type = UPPER(NEW.type); 
    SET NEW.prenom = UPPER(NEW.prenom);
    END
$$
DELIMITER ;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `CLIENT_UTILISATEUR_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);

--
-- Contraintes pour la table `operation`
--
ALTER TABLE `operation`
  ADD CONSTRAINT `OPERATION_CLIENT1_FK` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `OPERATION_UTILISATEUR0_FK` FOREIGN KEY (`id_user_FAIT`) REFERENCES `utilisateur` (`id_user`),
  ADD CONSTRAINT `OPERATION_UTILISATEUR_FK` FOREIGN KEY (`id_user`) REFERENCES `utilisateur` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
