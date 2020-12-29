-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : lun. 30 nov. 2020 à 10:15
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `afpa_test`
--

-- --------------------------------------------------------

--
-- Structure de la table `employe`
--

CREATE TABLE `employe` (
  `no_emp` int(4) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `emploi` varchar(30) DEFAULT NULL,
  `embauche` date DEFAULT NULL,
  `sal` float(9,2) DEFAULT NULL,
  `comm` float(9,2) DEFAULT NULL,
  `noserv` int(2) NOT NULL,
  `sup` int(4) DEFAULT NULL,
  `noproj` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`no_emp`, `nom`, `prenom`, `emploi`, `embauche`, `sal`, `comm`, `noserv`, `sup`, `noproj`) VALUES
(3, 'CC', NULL, NULL, '2020-11-16', NULL, NULL, 5, 1000, 102),
(12, NULL, NULL, NULL, '2020-11-26', NULL, NULL, 1, 1000, 102),
(22, 'Cnoooooooiiiooo', 'Cindy', 'reine', '0023-02-12', 122.00, 11.00, 2, 1000, 102),
(77, NULL, NULL, NULL, '2020-11-26', NULL, NULL, 2, 1000, 102),
(111, 'Cno', NULL, NULL, '2020-11-16', NULL, NULL, 2, 1000, 102),
(1000, NULL, 'paulo', 'president', '1987-10-25', 55005.50, 4.00, 1, NULL, 103),
(1101, 'dumont', 'louis', 'vendeur', '1987-10-25', 9047.90, 0.00, 1, 1300, 103),
(1102, 'minet', 'marc', 'vendeur', '1987-10-25', 8085.81, 17230.00, 1, 1300, 103),
(1104, 'nys', 'etienne', 'technicien', '1987-10-25', 12342.20, NULL, 1, 1200, 103),
(1105, 'denimal', 'jerome', 'comptable', '1987-10-25', 15746.60, NULL, 1, 1600, 103),
(1200, 'lemaire', 'guy', 'directeur', '1987-03-11', 36303.60, NULL, 2, 1000, 103),
(1201, 'martin', 'jean', 'technicien', '1987-06-25', 11235.10, NULL, 2, 1200, 103),
(1202, 'dupont', 'jacques', 'technicien', '1988-10-30', 10313.00, NULL, 2, 1200, 103),
(1211, NULL, NULL, NULL, '2020-11-26', NULL, NULL, 2, 1000, 102),
(1300, 'lenoir', 'gerard', 'directeur', '1987-04-02', 31353.10, 13071.00, 3, 1000, 103),
(1301, 'gerard', 'robert', 'vendeur', '1999-04-16', 7694.77, 12430.00, 3, 1300, 103),
(1303, 'masure', 'emile', 'technicien', '1988-06-17', 10451.10, NULL, 3, 1200, 103),
(1500, 'dupont', 'jean', 'directeur', '1987-10-23', 28434.80, NULL, 5, 1000, 102),
(1501, 'dupire', 'pierre', 'analyste', '1984-10-24', 23102.30, NULL, 5, 1500, 102),
(1502, 'durand', 'bernard', 'programmeur', '1987-07-30', 13201.30, 465451.00, 5, 1500, 102),
(1503, 'delnatte', 'luc', 'pupiteur', '1999-01-15', 8801.01, NULL, 5, 1500, 102),
(1600, 'lavare', 'paul', 'directeur', '1991-12-13', 31238.10, NULL, 6, 1000, 102),
(1601, 'caron', 'alain', 'comptable', '1985-09-16', 33003.30, NULL, 6, 1600, 102),
(1603, 'morel', 'robert', 'comptable', '1985-07-18', 33003.30, NULL, 6, 1600, 102),
(1604, 'havet', 'alain', 'vendeur', '1991-01-01', 9388.94, 33415.00, 6, 1300, 102),
(1605, 'richard', 'jules', 'comptable', '1985-10-22', 33503.40, NULL, 5, 1600, 102),
(1615, 'duprez', 'jean', 'balayeur', '1998-10-22', 6000.60, NULL, 5, 1000, 102),
(2343, NULL, NULL, NULL, '2020-11-26', NULL, NULL, 5, 1000, 102),
(12121, NULL, NULL, NULL, '2020-11-26', NULL, NULL, 2, 1000, 102);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `employe`
--
ALTER TABLE `employe`
  ADD PRIMARY KEY (`no_emp`),
  ADD KEY `sup` (`sup`),
  ADD KEY `noserv` (`noserv`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `employe`
--
ALTER TABLE `employe`
  ADD CONSTRAINT `employe_ibfk_1` FOREIGN KEY (`sup`) REFERENCES `employe` (`no_emp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
