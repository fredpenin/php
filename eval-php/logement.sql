-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 02 nov. 2018 à 17:09
-- Version du serveur :  10.1.31-MariaDB
-- Version de PHP :  7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `immobilier`
--

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `id_logement` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `cp` int(5) NOT NULL,
  `surface` float NOT NULL,
  `prix` float NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  `description` varchar(1023) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`id_logement`, `titre`, `adresse`, `ville`, `cp`, `surface`, `prix`, `photo`, `type`, `description`) VALUES
(2, 'Plein pied en centre ville - Lens', '123 rue Bidon', 'Lens', 62300, 60, 400, 'img/maison1.jpg', 'location', 'Petite maison très bien située en plein centre ville'),
(3, 'Maison coin tranquille à Béthune', '123 rue des pépitos', 'Béthune', 62400, 90, 500000, 'img/maison2.jpg', 'vente', 'Super maison, affaire à saisir'),
(4, 'Belle maison', '123 rue des shtroumpfs', 'Noeux les mines', 62290, 120, 600000, 'img/maison3.jpg', 'vente', 'Maison pleine de charme'),
(5, 'petit appart à Lille', '123 rue des petits apparts', 'Lille', 59000, 4, 300, 'img/maison4.jpg', 'location', 'Mini appart pour nains mais très bien agencé, blabla et description dépassant les 40 caractères.'),
(6, 'blabla', '123 rue de bill cosby', 'péquencourt', 62123, 60, 200, 'img/maison5.jpg', 'location', 'Test redimenssionnement');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`id_logement`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `logement`
--
ALTER TABLE `logement`
  MODIFY `id_logement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
