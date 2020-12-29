-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 30 nov. 2020 à 10:51
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
-- Base de données : `entreprise1`
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
  `sup` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employe`
--

INSERT INTO `employe` (`no_emp`, `nom`, `prenom`, `emploi`, `embauche`, `sal`, `comm`, `noserv`, `sup`) VALUES
(333, 'mml', 'llll', 'ppppp', '2015-12-31', 9888.00, 9.00, 3, 1000),
(1000, 'jean', 'paul', 'president', '1987-10-25', 55005.50, 114.00, 1, NULL),
(1100, 'delpierre', 'dorothee', 'secretaire', '1987-10-25', 12351.20, NULL, 1, 1000),
(1101, 'dumont', 'louis', 'vendeur', '1987-10-25', 9047.90, 0.00, 1, 1300),
(1102, 'minet', 'marc', 'vendeur', '1987-10-25', 8085.81, 17230.00, 1, 1300),
(1104, 'nys', 'etienne', 'technicien', '1987-10-25', 12342.20, NULL, 1, 1200),
(1105, 'denimal', 'jerome', 'comptable', '1987-10-25', 15746.60, NULL, 1, 1600),
(1111, 'Mohamed', 'ALI', 'rien', '2012-12-31', 10000000.00, 2.00, 3, 1000),
(1200, 'lemaire', 'guy', 'directeur', '1987-03-11', 36303.60, NULL, 2, 1000),
(1201, 'martin', 'jean', 'technicien', '1987-06-25', 11235.10, NULL, 2, 1200),
(1202, 'dupont', 'jacques', 'technicien', '1988-10-30', 10313.00, NULL, 2, 1200),
(1300, 'lenoir', 'gerard', 'directeur', '1987-04-02', 31353.10, 13071.00, 3, 1000),
(1301, 'gerard', 'robert', 'vendeur', '1999-04-16', 7694.77, 12430.00, 3, 1300),
(1303, 'masure', 'emile', 'technicien', '1988-06-17', 10451.10, NULL, 3, 1200),
(1500, 'dupont', 'jean', 'directeur', '1987-10-23', 28434.80, NULL, 5, 1000),
(1501, 'dupire', 'pierre', 'analyste', '1984-10-24', 23102.30, NULL, 5, 1500),
(1502, 'durand', 'bernard', 'programmeur', '1987-07-30', 13201.30, 465451.00, 5, 1500),
(1503, 'delnatte', 'luc', 'pupiteur', '1999-01-15', 8801.01, NULL, 5, 1500),
(1600, 'lavare', 'paul', 'directeur', '1991-12-13', 31238.10, NULL, 6, 1000),
(1601, 'caron', 'alain', 'comptable', '1985-09-16', 33003.30, NULL, 6, 1600),
(1603, 'morel', 'robert', 'comptable', '1985-07-18', 33003.30, NULL, 6, 1600),
(1604, 'alain', 'havet', 'vendeur', '1991-01-01', 1088.94, 1115.00, 6, 1300),
(5323, 'jean', 'reeeeeeeeeeeee', 'chaufferu', '2005-01-01', 21.00, 2.00, 2, 1000),
(5344, 'jean', 'b', 'lrgeeeee', '0058-05-01', NULL, 5.00, 3, 1000),
(5441, 'jean', 'b', 'lrgeeeee', '2000-12-22', 522222.00, 10.00, 3, 1000),
(12345, 'azert', 'qsdf', 'WXCV', '1990-02-14', 789.00, 456.00, 3, 1000),
(22222, 'ahmed', 'a', 'chauffeeur', '1999-11-01', 2000.00, 10.00, 3, 1000);

-- --------------------------------------------------------

--
-- Structure de la table `employe3`
--

CREATE TABLE `employe3` (
  `no_emp` int(4) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `prenom` varchar(30) NOT NULL,
  `emploi` varchar(30) DEFAULT NULL,
  `embauche` date DEFAULT NULL,
  `sal` float(9,2) DEFAULT NULL,
  `comm` float(9,2) DEFAULT NULL,
  `noserv` int(2) DEFAULT NULL,
  `sup` int(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `employe3`
--

INSERT INTO `employe3` (`no_emp`, `nom`, `prenom`, `emploi`, `embauche`, `sal`, `comm`, `noserv`, `sup`) VALUES
(1000, 'leroy', 'paul', 'president', '1987-10-25', 55005.50, NULL, 1, NULL),
(1010, 'moyen', 'toto', 'supérieur', '1999-12-12', 19527.30, NULL, 1000, 1),
(1101, 'dumont', 'louis', 'vendeur', '1987-10-25', 9047.90, 0.00, 1, 1300),
(1102, 'minet', 'marc', 'vendeur', '1987-10-25', 8085.81, 17230.00, 1, 1300),
(1104, 'nys', 'etienne', 'technicien', '1987-10-25', 12342.20, NULL, 1, 1200),
(1202, 'dupont', 'jacques', 'technicien', '1988-10-30', 10313.00, NULL, 2, 1200),
(1300, 'lenoir', 'gerard', 'directeur', '1987-04-02', 31353.10, 13071.00, 3, 1000),
(1500, 'dupont', 'jean', 'directeur', '1987-10-23', 28434.80, NULL, 5, 1000),
(1501, 'dupire', 'pierre', 'analyste', '1984-10-24', 23102.30, NULL, 5, 1500),
(1602, 'dubois', 'jules', 'vendeur', '1990-12-20', 9520.95, 35535.00, 6, 1300),
(1603, 'morel', 'robert', 'comptable', '1985-07-18', 33003.30, NULL, 6, 1600),
(1615, 'duprez', 'jean', 'balayeur', '1998-10-22', 6000.60, NULL, 5, 1000),
(2000, 'Cno', 'Cindy', 'reine', '2020-10-19', 7777777.50, 777777.69, 1, 2001);

-- --------------------------------------------------------

--
-- Structure de la table `proj`
--

CREATE TABLE `proj` (
  `noproj` int(3) DEFAULT NULL,
  `nomproj` varchar(10) DEFAULT NULL,
  `budget` int(12) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `proj`
--

INSERT INTO `proj` (`noproj`, `nomproj`, `budget`) VALUES
(101, 'alpha', 250000),
(102, 'beta', 175000),
(103, 'gamma', 1500000),
(101, 'alpha', 250000),
(102, 'beta', 175000),
(103, 'gamma', 950000);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

CREATE TABLE `service` (
  `noserv` int(2) NOT NULL,
  `service` varchar(20) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`noserv`, `service`, `ville`) VALUES
(2, 'Royauté', 'lille'),
(5, 'informatique', 'lille'),
(6, 'comptabilite', 'lille'),
(7, 'technique', 'roubaix'),
(12, 'Presidentielle', 'Monaco');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int(10) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `mail`, `password`, `profil`) VALUES
(2, 'mohali@yahoo.fr', '$2y$10$x8YQeHD6hQkfdCfKo5QqGeFzZh.lY93nuHx6.e/Iov8IuqsqpjXBG', 'user'),
(3, 'mohali@yahoo.fr', '$2y$10$IWYMK/1zUVrJ6e3T.cW1lesDLR08coCsiCO94WQtK.DL40CS8t2SO', 'user'),
(4, 'mohali@yahoo.fr', '$2y$10$Dx0IQRZyGBqGlDRaVqpwf.AI/lZLnV/U6iH.w65.MVpjzxM6CKH72', 'user'),
(5, 'mohali@yahoo.fr', '$2y$10$ilaYd2PXVbfflAuO8Hj5yOS65/i9lNchMuyDD.09D2wrywwbcU4mm', 'user'),
(6, 'mohali@yahoo.fr', '$2y$10$2i9RmUiWEkVc7Lv42lL/xulxLebvYeBaaP2QXEatdELiNJfQHIweq', 'administrateur'),
(7, 'mohali59@yahoo.fr', '$2y$10$LNfN9xqu.XTfQ8yqw3edJu3Q55iayY8i94/V0TFLJvQPNP/6sGvJe', 'administrateur');

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
-- Index pour la table `employe3`
--
ALTER TABLE `employe3`
  ADD PRIMARY KEY (`no_emp`),
  ADD KEY `sup` (`sup`);

--
-- Index pour la table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`noserv`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
