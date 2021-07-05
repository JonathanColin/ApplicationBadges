-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 30 juin 2021 à 09:27
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `application_badges`
--

-- --------------------------------------------------------

--
-- Structure de la table `alarme`
--

CREATE TABLE `alarme` (
  `Id_Alarme` enum('Noir-1','Noir-2','Noir-3','Noir-4','Noir-5','Noir-6','Noir-7','Noir-8','Noir-9','Blanc-1','Blanc-2','Blanc-3','Blanc-4','Blanc-5','Blanc-6','Blanc-7','Blanc-8','Blanc-9','Bleu-1','Bleu-2','Bleu-3','Bleu-4','Bleu-5','Bleu-6','Bleu-7','Bleu-8','Bleu-9','Vert-1','Vert-2','Vert-3','Vert-4','Vert-5','Vert-6','Vert-7','Vert-8','Vert-9','Rouge-1','Rouge-2','Rouge-3','Rouge-4','Rouge-5','Rouge-6','Rouge-7','Rouge-8','Rouge-9','OUI','NON') NOT NULL,
  `Statut` enum('ACTIF','PERDU','PRET','RENDU') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `alarme`
--

INSERT INTO `alarme` (`Id_Alarme`, `Statut`, `Id_Identité`) VALUES
('Noir-4', 'ACTIF', 2),
('Noir-5', 'ACTIF', NULL),
('Vert-5', 'ACTIF', 1);

-- --------------------------------------------------------

--
-- Structure de la table `badge_bleu`
--

CREATE TABLE `badge_bleu` (
  `Id_Badge_Bleu` varchar(10) NOT NULL,
  `Statut` enum('ACTIF','PERDU','PRET','RENDU') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `badge_bleu`
--

INSERT INTO `badge_bleu` (`Id_Badge_Bleu`, `Statut`, `Id_Identité`) VALUES
('C412190E', 'RENDU', NULL),
('C412190F', 'ACTIF', 1),
('C412190G', 'ACTIF', 32),
('C412190H', 'ACTIF', NULL),
('C412190i', 'PERDU', 1),
('C412190J', 'ACTIF', 2),
('C412190K', 'RENDU', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `badge_noir`
--

CREATE TABLE `badge_noir` (
  `Id_Badge_Noir` varchar(10) NOT NULL,
  `Statut` enum('ACTIF','PERDU','PRET','RENDU') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `badge_noir`
--

INSERT INTO `badge_noir` (`Id_Badge_Noir`, `Statut`, `Id_Identité`) VALUES
('0378002187', 'RENDU', NULL),
('0378002188', 'RENDU', NULL),
('0378002189', 'ACTIF', 2),
('0378002190', 'RENDU', NULL),
('0378002191', 'PRET', 1);

-- --------------------------------------------------------

--
-- Structure de la table `cafe`
--

CREATE TABLE `cafe` (
  `Id_Café` varchar(8) NOT NULL,
  `Statut` enum('ACTIF','PERDU','PRET','RENDU') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cafe`
--

INSERT INTO `cafe` (`Id_Café`, `Statut`, `Id_Identité`) VALUES
('61973201', 'ACTIF', 1),
('61973202', 'ACTIF', 2),
('61973203', 'PERDU', 1),
('61973204', 'RENDU', NULL),
('61973205', 'PRET', NULL),
('61973206', 'RENDU', NULL),
('61973207', 'RENDU', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `identites`
--

CREATE TABLE `identites` (
  `Id_Identité` int(11) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prénom` varchar(20) NOT NULL,
  `Parking` enum('OUI','NON','CODE') NOT NULL DEFAULT 'NON',
  `Pass` enum('OUI','NON') NOT NULL DEFAULT 'NON',
  `Accès_Bureau` enum('OUI','NON') NOT NULL DEFAULT 'NON',
  `Bureau_FZ` enum('OUI','NON') NOT NULL DEFAULT 'NON',
  `Période` enum('Du Lundi au Vendredi','Du Lundi au Dimanche') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `identites`
--

INSERT INTO `identites` (`Id_Identité`, `Nom`, `Prénom`, `Parking`, `Pass`, `Accès_Bureau`, `Bureau_FZ`, `Période`) VALUES
(1, 'aaa', 'aaa', 'OUI', 'NON', 'NON', 'OUI', 'Du Lundi au Vendredi'),
(2, 'bbb', 'bbb', 'NON', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(31, 'ccc', 'ccc', 'NON', 'NON', 'NON', 'NON', 'Du Lundi au Vendredi'),
(32, 'ESSAI', 'Essai', 'CODE', 'NON', 'OUI', 'NON', 'Du Lundi au Vendredi');

-- --------------------------------------------------------

--
-- Structure de la table `indigo`
--

CREATE TABLE `indigo` (
  `Id_Parking` varchar(10) NOT NULL,
  `Statut` enum('ACTIF','PERDU','PRET','RENDU') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `indigo`
--

INSERT INTO `indigo` (`Id_Parking`, `Statut`, `Id_Identité`) VALUES
('A12V85B470', 'PRET', 1),
('A12V85B471', 'RENDU', NULL),
('A12V85B472', 'RENDU', NULL),
('A12V85B473', 'RENDU', NULL),
('A12V85B474', 'RENDU', NULL),
('A12V85B475', 'RENDU', NULL),
('gfds45es', 'RENDU', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `telecommande`
--

CREATE TABLE `telecommande` (
  `Id_Télécommande` varchar(12) NOT NULL,
  `Statut` enum('ACTIF','PERDU','PRET','RENDU') NOT NULL,
  `Id_Identité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `telecommande`
--

INSERT INTO `telecommande` (`Id_Télécommande`, `Statut`, `Id_Identité`) VALUES
('458521', 'RENDU', NULL),
('A3702E6885J2', 'PERDU', 2),
('A3702E6885J3', 'PERDU', 31),
('A3702E6885J4', 'RENDU', NULL),
('A3702E6885J5', 'RENDU', NULL),
('A3702E6885J6', 'ACTIF', 1),
('A3702E6885J7', 'RENDU', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `Login` varchar(20) NOT NULL,
  `mdp` varchar(30) NOT NULL,
  `Nom` varchar(20) NOT NULL,
  `Prénom` varchar(20) NOT NULL,
  `Rôle` enum('Administrateur','Responsable','Invité','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Login`, `mdp`, `Nom`, `Prénom`, `Rôle`) VALUES
('admin', 'admin', 'ADMIN', 'Admin', 'Administrateur'),
('invite', 'invite', 'INVITE', 'Invite', 'Invité'),
('responsable', 'responsable', 'RESPONSABLE', 'Responsable', 'Responsable');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `alarme`
--
ALTER TABLE `alarme`
  ADD PRIMARY KEY (`Id_Alarme`),
  ADD KEY `relation identité-badge alarme` (`Id_Identité`);

--
-- Index pour la table `badge_bleu`
--
ALTER TABLE `badge_bleu`
  ADD PRIMARY KEY (`Id_Badge_Bleu`),
  ADD KEY `relation identité-badge bleu` (`Id_Identité`);

--
-- Index pour la table `badge_noir`
--
ALTER TABLE `badge_noir`
  ADD PRIMARY KEY (`Id_Badge_Noir`),
  ADD KEY `relation identité-badge noir` (`Id_Identité`);

--
-- Index pour la table `cafe`
--
ALTER TABLE `cafe`
  ADD PRIMARY KEY (`Id_Café`),
  ADD KEY `relation identité-badge café` (`Id_Identité`);

--
-- Index pour la table `identites`
--
ALTER TABLE `identites`
  ADD PRIMARY KEY (`Id_Identité`);

--
-- Index pour la table `indigo`
--
ALTER TABLE `indigo`
  ADD PRIMARY KEY (`Id_Parking`),
  ADD KEY `relation identité-badge parking` (`Id_Identité`);

--
-- Index pour la table `telecommande`
--
ALTER TABLE `telecommande`
  ADD PRIMARY KEY (`Id_Télécommande`),
  ADD KEY `relation identité-télécommande` (`Id_Identité`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`Login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `identites`
--
ALTER TABLE `identites`
  MODIFY `Id_Identité` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `alarme`
--
ALTER TABLE `alarme`
  ADD CONSTRAINT `relation identité-badge alarme` FOREIGN KEY (`Id_Identité`) REFERENCES `identites` (`Id_Identité`);

--
-- Contraintes pour la table `badge_bleu`
--
ALTER TABLE `badge_bleu`
  ADD CONSTRAINT `relation identité-badge bleu` FOREIGN KEY (`Id_Identité`) REFERENCES `identites` (`Id_Identité`);

--
-- Contraintes pour la table `badge_noir`
--
ALTER TABLE `badge_noir`
  ADD CONSTRAINT `relation identité-badge noir` FOREIGN KEY (`Id_Identité`) REFERENCES `identites` (`Id_Identité`);

--
-- Contraintes pour la table `cafe`
--
ALTER TABLE `cafe`
  ADD CONSTRAINT `relation identité-badge café` FOREIGN KEY (`Id_Identité`) REFERENCES `identites` (`Id_Identité`);

--
-- Contraintes pour la table `indigo`
--
ALTER TABLE `indigo`
  ADD CONSTRAINT `relation identité-badge parking` FOREIGN KEY (`Id_Identité`) REFERENCES `identites` (`Id_Identité`);

--
-- Contraintes pour la table `telecommande`
--
ALTER TABLE `telecommande`
  ADD CONSTRAINT `relation identité-télécommande` FOREIGN KEY (`Id_Identité`) REFERENCES `identites` (`Id_Identité`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
