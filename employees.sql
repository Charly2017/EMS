-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mer 11 Janvier 2017 à 18:57
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ems`
--

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `dateofbirth` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `jobtitle` varchar(150) NOT NULL,
  `salary` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `employees`
--

INSERT INTO `employees` (`id`, `firstname`, `lastname`, `dateofbirth`, `email`, `jobtitle`, `salary`) VALUES
(1, 'Barbara', 'Sanchez', '1997-11-20', 'bsanchez0@live.com', 'VP Product Management', 1500),
(2, 'Timothy', 'Woods', '1967-11-20', 'twoods1@behance.net', 'Marketing Assistant', 1200),
(3, 'Nancy', 'Kelly', '1985-11-20', 'nkelly3@vistaprint.com', 'Human Resources Manager', 1700),
(4, 'Donald', 'Warren', '1988-11-20', 'dwarren4@theglobeandmail.com', 'Software Consultant', 1900),
(5, 'Janice', 'Welch', '1980-11-20', 'jwelch5@dot.gov', 'Payment Adjustment Coordinator', 1200),
(6, 'Gregory', 'Johnston', '1983-11-20', 'gjohnston6@geocities.com', 'VP Accounting', 2000),
(7, 'Melissa', 'Kelley', '1985-11-20', 'mkelley7@jugem.jp', 'Sales Representative', 1700),
(8, 'Tammy', 'Freeman', '1987-11-20', 'tfreeman8@ask.com', 'Human Resources Assistant II', 1600),
(9, 'Donald', 'Warren', '1962-11-20', 'dwarren4@theglobeandmail.com', 'Environmental Specialist', 1300),
(10, 'Steve', 'Franklin', '1984-11-20', 'sfranklin2@jiathis.com', 'Software Engineer III', 1400);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
