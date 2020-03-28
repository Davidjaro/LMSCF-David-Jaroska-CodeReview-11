-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 28. Mrz 2020 um 12:29
-- Server-Version: 10.4.11-MariaDB
-- PHP-Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_david_jaroska_petadoptation`
--
CREATE DATABASE IF NOT EXISTS `cr11_david_jaroska_petadoptation` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_david_jaroska_petadoptation`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `name` varchar(40) DEFAULT NULL,
  `adress` varchar(255) DEFAULT NULL,
  `hobbies` varchar(60) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `date_of_adoption` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `animals`
--

INSERT INTO `animals` (`id`, `type`, `img`, `name`, `adress`, `hobbies`, `website`, `description`, `age`, `date_of_adoption`) VALUES
(8, 'senior', 'img/lion-3576045_1920.jpg', 'Lion', 'Africa', 'Lying around', 'https://en.wikipedia.org/wiki/Lion', 'The lion is a species in the family Felidae; it is a muscular, deep-chested cat with a short, rounded head, a reduced neck and round ears, and a hairy tuft at the end of its tail.', '10', '2020-03-23'),
(9, 'senior', 'img/monkey-4788328_1920.jpg', 'Monkey', 'Asia', 'Monkeying around', 'https://en.wikipedia.org/wiki/Monkey', 'Monkey is a common name that may refer to groups or species of mammals, in part, the simians of infraorder Simiiformes.', '9', '2020-03-06'),
(10, 'senior', 'img/sea-2470908_1920.jpg', 'Turtle', 'Ocean', 'Swimming', 'https://en.wikipedia.org/wiki/Turtle', 'Turtles are reptiles of the order Testudines characterized by a special bony or cartilaginous shell developed from their ribs and acting as a shield.', '50', '2019-06-06'),
(11, 'senior', 'img/sloth-2759724_1920.jpg', 'Sloth', 'Forests in North-,South- and Central-America', 'Doing Nothing', 'https://en.wikipedia.org/wiki/Sloth', 'Sloths of the present day are arboreal mammals noted for slowness of movement and for spending most of their lives hanging upside down in the trees of the tropical rain forests of South America and Central America.', '12', '2020-02-28'),
(12, 'large', 'img/giraffe-4312090_1920.jpg', 'Giraffe', 'Africa', 'Walking around', 'https://en.wikipedia.org/wiki/Giraffe', 'The giraffe is an African artiodactyl mammal, the tallest living terrestrial animal and the largest ruminant.', '7', '2020-02-26'),
(13, 'large', 'img/grey-seal-3281160_1280.jpg', 'Sea Lion', 'Ocean', 'Catching fish', 'https://en.wikipedia.org/wiki/Sea_lion', 'Sea lions are pinnipeds characterized by external ear flaps, long foreflippers, the ability to walk on all fours, short, thick hair, and a big chest and belly.', '4', '2025-03-20'),
(14, 'large', 'img/white-horse-1136093_1920.jpg', 'Horse', 'Wildlife', 'Strolling', 'https://en.wikipedia.org/wiki/Horse', 'The horse is one of two extant subspecies of Equus ferus. It is an odd-toed ungulate mammal belonging to the taxonomic family Equidae.', '2', '2026-03-18'),
(15, 'large', 'img/bear-838688_1920.jpg', 'Grizzly Bear', 'Mountains', 'Sleeping', 'https://en.wikipedia.org/wiki/Grizzly_bear', 'The grizzly bear, also known as the North American brown bear or simply grizzly, is a large population or subspecies of the brown bear inhabiting North America.', '1', '2027-03-18'),
(16, 'small', 'img/dog-2785074_1920.jpg', 'Dog', 'Everywhere', 'Being a good boy', 'https://en.wikipedia.org/wiki/Dog', 'The domestic dog is a member of the genus Canis, which forms part of the wolf-like canids, and is the most widely abundant terrestrial carnivore.', '2', '2026-03-27'),
(17, 'small', 'img/cat-1045782_1920.jpg', 'Cat', 'Everywhere', 'Ignoring you', 'https://en.wikipedia.org/wiki/Cat', 'The cat is a domestic species of small carnivorous mammal.', '4', '2028-03-15'),
(18, 'small', 'img/guinea-pig-500236_1920.jpg', 'Guinea Pig', 'Household', 'Squeaking', 'https://en.wikipedia.org/wiki/Guinea_pig', 'The guinea pig or domestic guinea pig, also known as cavy or domestic cavy, is a species of rodent belonging to the family Caviidae and the genus Cavia.', '3', '2024-03-28'),
(19, 'small', 'img/rabbit-1882699_1920.jpg', 'Rabbit', 'Grassland', 'Jumping around', 'https://en.wikipedia.org/wiki/Rabbit', 'Rabbits are small mammals in the family Leporidae of the order Lagomorpha.', '2', '2022-03-23');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `hash`, `active`, `avatar`) VALUES
(42, 'Code', 'Factory', 'd@d.com', '$2y$10$D5FfGRPWl5BOpIOWymLlt.lct23sRYskljBbX/oBm1aaYOA88fvfa', 'c32d9bf27a3da7ec8163957080c8628e', 2, 'img/white-horse-1136093_1920.jpg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
