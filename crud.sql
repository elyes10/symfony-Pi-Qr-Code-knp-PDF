-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : dim. 06 mars 2022 à 17:20
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crud`
--

-- --------------------------------------------------------

--
-- Structure de la table `centrecamping`
--

CREATE TABLE `centrecamping` (
  `idc` int(11) NOT NULL,
  `nomc` varchar(255) NOT NULL,
  `descriptionc` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  `typec` varchar(255) NOT NULL,
  `idr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `centrecamping`
--

INSERT INTO `centrecamping` (`idc`, `nomc`, `descriptionc`, `prix`, `typec`, `idr`) VALUES
(5, 'ojhuiigy', 'uihkh', 2323320, 'huhuo', 8);

-- --------------------------------------------------------

--
-- Structure de la table `region`
--

CREATE TABLE `region` (
  `idr` int(11) NOT NULL,
  `nomr` varchar(255) NOT NULL,
  `descriptionr` varchar(255) NOT NULL,
  `caracteristique` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `gouvernorat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `region`
--

INSERT INTO `region` (`idr`, `nomr`, `descriptionr`, `caracteristique`, `ville`, `gouvernorat`) VALUES
(7, 'gsfh', 'ggsfrg', 'rgrag', 'hrhe', 'hehds'),
(8, 'Ocean', 'gh', 'fhsd', 'hrthz', 'ghsh'),
(12, 'Desert', 'fghqfdhdh', 'ghqgdshq', 'qghhq', 'qghq');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `centrecamping`
--
ALTER TABLE `centrecamping`
  ADD PRIMARY KEY (`idc`),
  ADD KEY `fk2` (`idr`);

--
-- Index pour la table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`idr`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `centrecamping`
--
ALTER TABLE `centrecamping`
  MODIFY `idc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `region`
--
ALTER TABLE `region`
  MODIFY `idr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `centrecamping`
--
ALTER TABLE `centrecamping`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`idr`) REFERENCES `region` (`idr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
