-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:3306
-- Généré le :  Ven 18 Septembre 2020 à 20:01
-- Version du serveur :  10.3.23-MariaDB-0+deb10u1
-- Version de PHP :  7.3.19-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `teaos`
--

-- --------------------------------------------------------

--
-- Structure de la table `banned_ip`
--

CREATE TABLE `banned_ip` (
  `id` int(255) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `date` int(15) NOT NULL,
  `date_finish` int(15) NOT NULL,
  `reason` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `browser_visits`
--

CREATE TABLE `browser_visits` (
  `id` int(255) NOT NULL,
  `website_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `date` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `browser_websites`
--

CREATE TABLE `browser_websites` (
  `id` int(255) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `url` varchar(2000) NOT NULL,
  `date` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `ip_reg` varchar(100) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `navigateur` varchar(255) NOT NULL,
  `date_reg` int(15) NOT NULL,
  `date` int(15) NOT NULL,
  `json_reg` varchar(1000) NOT NULL,
  `json` varchar(1000) NOT NULL,
  `screen` varchar(255) NOT NULL,
  `perm` int(1) NOT NULL,
  `unik` varchar(255) NOT NULL,
  `reg_by_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `users_softwares`
--

CREATE TABLE `users_softwares` (
  `id` int(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `date` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `visits`
--

CREATE TABLE `visits` (
  `id` int(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `motor` varchar(1000) NOT NULL,
  `SCRIPT_NAME` varchar(1000) NOT NULL,
  `timestamp` int(20) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `banned_ip`
--
ALTER TABLE `banned_ip`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `browser_visits`
--
ALTER TABLE `browser_visits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `browser_websites`
--
ALTER TABLE `browser_websites`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users_softwares`
--
ALTER TABLE `users_softwares`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `banned_ip`
--
ALTER TABLE `banned_ip`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `browser_visits`
--
ALTER TABLE `browser_visits`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `browser_websites`
--
ALTER TABLE `browser_websites`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `users_softwares`
--
ALTER TABLE `users_softwares`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
