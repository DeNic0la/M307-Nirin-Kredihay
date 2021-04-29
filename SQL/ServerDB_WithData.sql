-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 29. Apr 2021 um 14:15
-- Server-Version: 10.1.48-MariaDB-0+deb9u2
-- PHP-Version: 7.0.33-47+0~20210228.54+debian9~1.gbp7f60a9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `kurseictbz_30713`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `creditpackages`
--

CREATE TABLE `creditpackages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `creditpackages`
--

INSERT INTO `creditpackages` (`id`, `name`) VALUES
(1, 'Kredit Basic: 1k'),
(2, 'Kredit Basic: 2k'),
(3, 'Kredit Basic: 3k'),
(4, 'Kredit Basic: 4k'),
(5, 'Kredit Basic: 5k'),
(6, 'Kredit Basic: 6k'),
(7, 'Kredit Basic: 7k'),
(8, 'Kredit Basic: 8k'),
(9, 'Kredit Basic: 9k'),
(10, 'Kredit Basic: 10k'),
(11, 'Kredit Best: 1k'),
(12, 'Kredit Best: 2k'),
(13, 'Kredit Best: 3k'),
(14, 'Kredit Best: 4k'),
(15, 'Kredit Best: 5k'),
(16, 'Kredit Best: 6k'),
(17, 'Kredit Best: 7k'),
(18, 'Kredit Best: 8k'),
(19, 'Kredit Best: 9k'),
(20, 'Kredit Best: 10k'),
(21, 'Kredit Plus: 1k'),
(22, 'Kredit Plus: 2k'),
(23, 'Kredit Plus: 3k'),
(24, 'Kredit Plus: 4k'),
(25, 'Kredit Plus: 5k'),
(26, 'Kredit Plus: 6k'),
(27, 'Kredit Plus: 7k'),
(28, 'Kredit Plus: 8k'),
(29, 'Kredit Plus: 9k'),
(30, 'Kredit Plus: 10k'),
(31, 'Kredit Karma: 1k'),
(32, 'Kredit Karma: 2k'),
(33, 'Kredit Karma: 3k'),
(34, 'Kredit Karma: 4k'),
(35, 'Kredit Karma: 5k'),
(36, 'Kredit Karma: 6k'),
(37, 'Kredit Karma: 7k'),
(38, 'Kredit Karma: 8k'),
(39, 'Kredit Karma: 9k'),
(40, 'Kredit Karma: 10k');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `loans`
--

CREATE TABLE `loans` (
  `id` int(11) NOT NULL,
  `prename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `rate` int(11) NOT NULL,
  `fk_creditpackages_id` int(11) NOT NULL,
  `paidback` tinyint(1) NOT NULL DEFAULT '0',
  `startdate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `loans`
--

INSERT INTO `loans` (`id`, `prename`, `lastname`, `email`, `phone`, `rate`, `fk_creditpackages_id`, `paidback`, `startdate`) VALUES
(1, 'Shad Boyle', 'Leblanc', 'zysegaqa@mailinator.com', '', 10, 15, 0, '2021-04-29 14:12:00'),
(2, 'Gil Hood', 'Richard', 'hoqe@mailinator.com', '+41 76 761 03 99', 9, 40, 0, '2021-04-29 14:12:35'),
(3, 'Ashely Holmes', 'Mooney', 'gelopymex@mailinator.com', '+41 568 54 58', 5, 18, 0, '2021-04-29 14:12:43'),
(4, 'Gail Kidd', 'Curry', 'xigozet@mailinator.com', '', 1, 12, 0, '2021-04-29 14:12:54'),
(5, 'Samuel Alexander', 'Alexander', 'jujib@mailinator.com', '0041 569 82 46', 9, 39, 0, '2021-04-29 14:13:05'),
(6, 'Lisandra Hancock', 'Whitney', 'zotuvaf@mailinator.com', '053-234-23-21', 7, 25, 0, '2021-04-29 14:13:31'),
(7, 'Zahir Dillon', 'West', 'davi@mailinator.com', '+41 56 661 89 99', 5, 24, 0, '2021-04-29 14:13:41'),
(8, 'Tatiana Lucas', 'Harmon', 'soqyv@mailinator.com', '', 5, 13, 0, '2021-04-29 14:13:47'),
(9, 'Aileen Spencer', 'Harrell', 'hunyciwevu@mailinator.com', '', 5, 17, 0, '2021-04-29 14:14:04');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `creditpackages`
--
ALTER TABLE `creditpackages`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `loans`
--
ALTER TABLE `loans`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `creditpackages`
--
ALTER TABLE `creditpackages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT für Tabelle `loans`
--
ALTER TABLE `loans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
