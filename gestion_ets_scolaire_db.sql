-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mar. 18 oct. 2022 à 15:00
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
-- Base de données : `gestion_ets_scolaire_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `t_anneescolaire`
--

CREATE TABLE `t_anneescolaire` (
  `anneescolaire` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_anneescolaire`
--

INSERT INTO `t_anneescolaire` (`anneescolaire`) VALUES
('2022-2023');

-- --------------------------------------------------------

--
-- Structure de la table `t_classe`
--

CREATE TABLE `t_classe` (
  `id_classe` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_classe`
--

INSERT INTO `t_classe` (`id_classe`) VALUES
('1ème'),
('2ème'),
('3ème'),
('4ème'),
('7ème'),
('8ème');

-- --------------------------------------------------------

--
-- Structure de la table `t_ecole`
--

CREATE TABLE `t_ecole` (
  `id_ecole` varchar(10) NOT NULL,
  `nom_ecole` varchar(30) NOT NULL,
  `ville_ecole` varchar(30) NOT NULL,
  `province_ecole` varchar(30) NOT NULL,
  `tyoe_ecole` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_ecole`
--

INSERT INTO `t_ecole` (`id_ecole`, `nom_ecole`, `ville_ecole`, `province_ecole`, `tyoe_ecole`) VALUES
('ECO0012589', 'CERM SCHOOL', 'Kinshasa', 'Kinshasa', 'Privée');

-- --------------------------------------------------------

--
-- Structure de la table `t_eleve`
--

CREATE TABLE `t_eleve` (
  `id_eleve` varchar(16) NOT NULL,
  `nom_eleve` varchar(15) NOT NULL,
  `postnom_eleve` varchar(15) NOT NULL,
  `prenom_eleve` varchar(15) NOT NULL,
  `sexe_eleve` varchar(5) NOT NULL,
  `datenaisse_eleve` date NOT NULL,
  `lieunaisse_eleve` varchar(20) NOT NULL,
  `nationalite_eleve` varchar(15) NOT NULL,
  `id_tuteur` int(11) NOT NULL,
  `id_ecole` varchar(10) NOT NULL,
  `date_enreg` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_eleve`
--

INSERT INTO `t_eleve` (`id_eleve`, `nom_eleve`, `postnom_eleve`, `prenom_eleve`, `sexe_eleve`, `datenaisse_eleve`, `lieunaisse_eleve`, `nationalite_eleve`, `id_tuteur`, `id_ecole`, `date_enreg`) VALUES
('ELEV474981', 'MONONGO', 'KUKUMA', 'CHRIS', 'Homme', '2022-08-24', 'Kinshasa', 'Congolaise', 1, 'ECO0012589', '2022-10-17');

-- --------------------------------------------------------

--
-- Structure de la table `t_frais`
--

CREATE TABLE `t_frais` (
  `id_frais` varchar(100) NOT NULL,
  `montant_frais` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_frais`
--

INSERT INTO `t_frais` (`id_frais`, `montant_frais`) VALUES
('Frais d\'inscription', 10),
('Frais de 1er tranche', 150),
('Frais de 2er tranche', 200);

-- --------------------------------------------------------

--
-- Structure de la table `t_inscrire`
--

CREATE TABLE `t_inscrire` (
  `id_inscri` int(11) NOT NULL,
  `id_eleve` varchar(16) NOT NULL,
  `id_option` varchar(20) NOT NULL,
  `id_classe` varchar(15) NOT NULL,
  `aneescolaire` varchar(10) NOT NULL,
  `date_inscri` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_inscrire`
--

INSERT INTO `t_inscrire` (`id_inscri`, `id_eleve`, `id_option`, `id_classe`, `aneescolaire`, `date_inscri`) VALUES
(7, 'ELEV474981', 'Commercial', '4ème', '2022-2023', '2022-10-17');

-- --------------------------------------------------------

--
-- Structure de la table `t_option`
--

CREATE TABLE `t_option` (
  `id_option` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_option`
--

INSERT INTO `t_option` (`id_option`) VALUES
('Commercial'),
('Coupe et Couture'),
('Education de base'),
('Electricité'),
('Litteraire'),
('Pédagogie'),
('Primaire'),
('Scientifique');

-- --------------------------------------------------------

--
-- Structure de la table `t_paiement`
--

CREATE TABLE `t_paiement` (
  `id_eleve` varchar(16) NOT NULL,
  `id_frais` varchar(100) NOT NULL,
  `montant_paie` int(11) NOT NULL,
  `date_paie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_paiement`
--

INSERT INTO `t_paiement` (`id_eleve`, `id_frais`, `montant_paie`, `date_paie`) VALUES
('ELEV474981', 'Frais d\'inscription', 5000, '2022-10-18');

-- --------------------------------------------------------

--
-- Structure de la table `t_tuteur`
--

CREATE TABLE `t_tuteur` (
  `id_tuteur` int(11) NOT NULL,
  `nom_tuteur` varchar(15) NOT NULL,
  `prenom_tuteur` varchar(15) NOT NULL,
  `profession_tuteur` varchar(15) NOT NULL,
  `phone_tuteur` varchar(12) NOT NULL,
  `adresse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_tuteur`
--

INSERT INTO `t_tuteur` (`id_tuteur`, `nom_tuteur`, `prenom_tuteur`, `profession_tuteur`, `phone_tuteur`, `adresse`) VALUES
(1, 'MONONGO', 'Maick', 'Informaticien', '+24382109838', 'Kinshasa/RDC Q/1 Bitabe');

-- --------------------------------------------------------

--
-- Structure de la table `t_utilisateur`
--

CREATE TABLE `t_utilisateur` (
  `id_user` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_password` text NOT NULL,
  `user_role` varchar(15) NOT NULL,
  `token` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `t_utilisateur`
--

INSERT INTO `t_utilisateur` (`id_user`, `user_name`, `user_password`, `user_role`, `token`) VALUES
(1, 'admin', '$2y$10$cIJaCiE5KWCCr39BcFOL/uW3nWsCGZWReDty4hzzFg40l1LSlTIQS', 'Administrateur', '4382634e6d9eaba04687'),
(2, 'mchrisdev', '$2y$10$52mU21dpg4bYsJzraKqx7.vRw9RbyU7bEFTPkhylopoWmQDRoz9ei', 'Administrateur', '7004634e72e2c9351102'),
(3, 'Marcelin', '$2y$10$Hx98zHyj9SeL1Vto.L8KQuEwVLTLLujBcKvyVNaRpCFW6N66QGcEi', 'Réceptionniste', '2481634e72ec65c06293'),
(4, 'Ernestine', '$2y$10$mb8T48VGy57odGIOf2Jle.tngHNB5Jb/tqFP1YI/zjIR8Hb5YNS1m', 'Caissier', '54634e72f6521eb68744');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `t_anneescolaire`
--
ALTER TABLE `t_anneescolaire`
  ADD PRIMARY KEY (`anneescolaire`);

--
-- Index pour la table `t_classe`
--
ALTER TABLE `t_classe`
  ADD PRIMARY KEY (`id_classe`);

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
  ADD KEY `eleve_ecole` (`id_ecole`),
  ADD KEY `eleve_tuteur` (`id_tuteur`);

--
-- Index pour la table `t_frais`
--
ALTER TABLE `t_frais`
  ADD PRIMARY KEY (`id_frais`);

--
-- Index pour la table `t_inscrire`
--
ALTER TABLE `t_inscrire`
  ADD PRIMARY KEY (`id_inscri`),
  ADD KEY `inscire_eleve` (`id_eleve`),
  ADD KEY `inscrire_classe` (`id_classe`),
  ADD KEY `inscrire_annescolaire` (`aneescolaire`),
  ADD KEY `inscire_option` (`id_option`);

--
-- Index pour la table `t_option`
--
ALTER TABLE `t_option`
  ADD PRIMARY KEY (`id_option`);

--
-- Index pour la table `t_paiement`
--
ALTER TABLE `t_paiement`
  ADD KEY `paiement_eleve` (`id_eleve`),
  ADD KEY `paiement_frais` (`id_frais`);

--
-- Index pour la table `t_tuteur`
--
ALTER TABLE `t_tuteur`
  ADD PRIMARY KEY (`id_tuteur`),
  ADD UNIQUE KEY `phone_tuteur` (`phone_tuteur`);

--
-- Index pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `t_inscrire`
--
ALTER TABLE `t_inscrire`
  MODIFY `id_inscri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `t_tuteur`
--
ALTER TABLE `t_tuteur`
  MODIFY `id_tuteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `t_utilisateur`
--
ALTER TABLE `t_utilisateur`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `t_eleve`
--
ALTER TABLE `t_eleve`
  ADD CONSTRAINT `eleve_ecole` FOREIGN KEY (`id_ecole`) REFERENCES `t_ecole` (`id_ecole`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eleve_tuteur` FOREIGN KEY (`id_tuteur`) REFERENCES `t_tuteur` (`id_tuteur`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_inscrire`
--
ALTER TABLE `t_inscrire`
  ADD CONSTRAINT `inscire_eleve` FOREIGN KEY (`id_eleve`) REFERENCES `t_eleve` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscire_option` FOREIGN KEY (`id_option`) REFERENCES `t_option` (`id_option`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscrire_annescolaire` FOREIGN KEY (`aneescolaire`) REFERENCES `t_anneescolaire` (`anneescolaire`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscrire_classe` FOREIGN KEY (`id_classe`) REFERENCES `t_classe` (`id_classe`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `t_paiement`
--
ALTER TABLE `t_paiement`
  ADD CONSTRAINT `paiement_eleve` FOREIGN KEY (`id_eleve`) REFERENCES `t_eleve` (`id_eleve`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `paiement_frais` FOREIGN KEY (`id_frais`) REFERENCES `t_frais` (`id_frais`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
