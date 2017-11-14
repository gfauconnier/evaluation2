-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mar 14 Novembre 2017 à 10:28
-- Version du serveur :  5.7.20-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `evaluation2`
--

-- --------------------------------------------------------

--
-- Structure de la table `accounts`
--

CREATE TABLE `accounts` (
  `id_account` int(10) UNSIGNED NOT NULL,
  `id_client` int(10) UNSIGNED NOT NULL,
  `account_name` varchar(50) NOT NULL,
  `balance` decimal(11,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `accounts`
--

INSERT INTO `accounts` (`id_account`, `id_client`, `account_name`, `balance`) VALUES
(1, 19, 'test', '5.82'),
(2, 19, 'test2', '205.86'),
(3, 19, 'test3', '0.00'),
(4, 19, 'test4', '-65.00'),
(5, 19, 'test5', '5508.40'),
(12, 19, 'test6', '0.00'),
(13, 20, 'PEL', '500000.00'),
(14, 20, 'LivretA', '-20.00');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) UNSIGNED NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clients`
--

INSERT INTO `clients` (`id_client`, `f_name`, `l_name`, `user_name`, `password`) VALUES
(18, 'Test', 'User', 'testuser', '$2y$10$c8bzdkJXwHnOcTYTLh56GOPEa7wcPMHUat6adAcxcZVAhKLs9OL0C'),
(19, 'test', 'test', 'test', '$2y$10$1mPA51SPBqmlu1QXMNKXwOriYqYuDuEZ2br7O069CqdGYwBGIZuYe'),
(20, 'Manu', 'Macron', 'elpresidente', '$2y$10$ta5YxKPHQVLTTS9sIz3hKOYv4KClBhmVnca/H.B3.sUwckna3h2em');

-- --------------------------------------------------------

--
-- Structure de la table `movements`
--

CREATE TABLE `movements` (
  `id_movement` int(10) UNSIGNED NOT NULL,
  `id_account` int(10) UNSIGNED NOT NULL,
  `movement_value` decimal(11,2) DEFAULT NULL,
  `movement_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `movements`
--

INSERT INTO `movements` (`id_movement`, `id_account`, `movement_value`, `movement_date`) VALUES
(1, 1, '-7.00', '2017-11-13 12:12:07'),
(2, 1, '10.00', '2017-11-13 12:13:56'),
(3, 1, '32.00', '2017-11-13 14:02:07'),
(4, 1, '54.00', '2017-11-13 14:02:12'),
(5, 1, '-12.00', '2017-11-13 14:02:22'),
(6, 1, '32.00', '2017-11-13 14:02:31'),
(7, 2, '-32.00', '2017-11-13 14:02:31'),
(8, 1, '-50.00', '2017-11-13 14:06:30'),
(9, 2, '50.00', '2017-11-13 14:06:31'),
(10, 1, '70.00', '2017-11-13 14:07:04'),
(11, 1, '-33.54', '2017-11-13 14:07:17'),
(12, 1, '-23.40', '2017-11-13 14:07:32'),
(13, 5, '23.40', '2017-11-13 14:07:32'),
(14, 1, '21.00', '2017-11-13 14:07:46'),
(15, 1, '1.00', '2017-11-13 14:07:53'),
(16, 1, '-50.00', '2017-11-13 15:18:29'),
(17, 2, '50.00', '2017-11-13 15:18:29'),
(18, 2, '33.54', '2017-11-13 15:18:49'),
(19, 2, '65.00', '2017-11-13 15:19:09'),
(20, 1, '-32.00', '2017-11-14 09:29:49'),
(21, 5, '32.00', '2017-11-14 09:29:49');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id_account`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Index pour la table `movements`
--
ALTER TABLE `movements`
  ADD PRIMARY KEY (`id_movement`),
  ADD KEY `id_account` (`id_account`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id_account` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT pour la table `movements`
--
ALTER TABLE `movements`
  MODIFY `id_movement` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `accounts_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `movements`
--
ALTER TABLE `movements`
  ADD CONSTRAINT `movements_ibfk_1` FOREIGN KEY (`id_account`) REFERENCES `accounts` (`id_account`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
