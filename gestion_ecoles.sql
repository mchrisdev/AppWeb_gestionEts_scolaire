-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 oct. 2022 à 14:59
-- Version du serveur : 10.4.19-MariaDB
-- Version de PHP : 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_ecoles`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_ecole`
--

CREATE TABLE `t_ecole` (
  `id_ecole` varchar(10) NOT NULL,
  `nom_ecole` varchar(30) NOT NULL,
  `ville_ecole` varchar(30) NOT NULL,
  `province_ecole` varchar(30) NOT NULL,
  `tyoe_ecole` varchar(15) NOT NULL,
  `id_eleve` varchar(16) NOT NULL,
  `nom_eleve` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_ecole`
--

INSERT INTO `t_ecole` (`id_ecole`, `nom_ecole`, `ville_ecole`, `province_ecole`, `tyoe_ecole`, `id_eleve`, `nom_eleve`) VALUES
('ECO0012589', 'CERM SCHOOL', 'Kinshasa', 'Kinshasa', 'Privée', '', ''),
('ECO0587781', 'MASAMBA', 'Kinshasa', 'Kinshasa', 'Privée', '', ''),
('ECO0745825', 'INSTITUT DE N\'DIJILI', 'Kinshasa', 'Kinshasa', 'Conventionnée', '', ''),
('ECO0778125', 'REVEREND KIM', 'Kinshasa', 'Kinshasa', 'Privée', '', ''),
('ECO0781258', 'COLLEGE BONSOMI', 'Kinshasa', 'Kinshasa', 'Conventionnée', '', '');

-- --------------------------------------------------------

--
-- Structure de la table `t_eleve`
--

CREATE TABLE `t_eleve` (
  `id_eleve` varchar(16) NOT NULL,
  `id_ecole` varchar(10) NOT NULL,
  `nom_eleve` varchar(15) NOT NULL,
  `postnom_eleve` varchar(15) NOT NULL,
  `prenom_eleve` varchar(15) NOT NULL,
  `sexe_eleve` varchar(5) NOT NULL,
  `datenaisse_eleve` date NOT NULL,
  `lieunaisse_eleve` varchar(20) NOT NULL,
  `nationalite_eleve` varchar(15) NOT NULL,
  `date_enreg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_eleve`
--

INSERT INTO `t_eleve` (`id_eleve`, `id_ecole`, `nom_eleve`, `postnom_eleve`, `prenom_eleve`, `sexe_eleve`, `datenaisse_eleve`, `lieunaisse_eleve`, `nationalite_eleve`, `date_enreg`) VALUES
('ELEV474981', 'ECO0012589', 'MONONGO', 'KUKUMA', 'CHRIS', 'Homme', '2022-08-24', 'Kinshasa', 'Congolaise', '2022-10-17');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_ecole`
--
ALTER TABLE `t_ecole`
  ADD PRIMARY KEY (`id_ecole`);

--
-- Index pour la table `t_eleve`
--
ALTER TABLE `t_eleve`
  ADD PRIMARY KEY (`id_eleve`),
  ADD KEY `eleve_ecole` (`id_ecole`);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_eleve`
--
ALTER TABLE `t_eleve`
  ADD CONSTRAINT `eleve_ecole` FOREIGN KEY (`id_ecole`) REFERENCES `t_ecole` (`id_ecole`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
