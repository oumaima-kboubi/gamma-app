-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2023 at 01:48 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gammatest`
--

-- --------------------------------------------------------

--
-- Table structure for table `band`
--

CREATE TABLE `band` (
  `id` int(11) NOT NULL,
  `origine` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `annee_debut` double NOT NULL,
  `annee_separation` double DEFAULT NULL,
  `fondateurs` varchar(255) DEFAULT NULL,
  `membres` int(11) DEFAULT NULL,
  `courant_musical` varchar(255) DEFAULT NULL,
  `presentation` varchar(255) DEFAULT NULL,
  `nom_groupe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `band`
--

INSERT INTO `band` (`id`, `origine`, `ville`, `annee_debut`, `annee_separation`, `fondateurs`, `membres`, `courant_musical`, `presentation`, `nom_groupe`) VALUES
(499, 'Royaume-Uni ', 'Liverpool', 2022, 2023, 'John Lennon', 4, 'classique', 'The Beatles is the best!', 'The Beatles nouvelle version'),
(500, 'France', 'paris', 1981, 0, 'Nicola Sirkis et Dominique Nicolas', 5, 'pop rock', 'Indochine est un groupe de pop rock français originaire de Paris, formé par Nicola Sirkis et Dominique Nicolas en 1981. Le groupe est issu du courant new wave', 'Indochine'),
(501, 'France', 'bordeaux', 1980, 2010, 'Bertrand Cantat', 4, 'rock', 'Noir Désir est un groupe de rock français, originaire de Bordeaux, en Gironde. Formé dans les années 1980, et dissout en 2010, il se compose de Bertrand Cantat, Denis Barthe, Serge Teyssot-Gay et Frédéric Vidalenc remplacé par Jean-Paul Roy à partir de 19', 'Noir Désir'),
(502, 'Etats-unis', 'Aberdeen', 1987, 1994, 'Kurt Cobain', 3, 'grunge', 'Nirvana est un groupe de grunge américain, originaire d\'Aberdeen, dans l\'État de Washington, formé en 1987 par le chanteur-guitariste Kurt Cobain et le bassiste Krist Novoselic', 'Nirvana'),
(503, 'Royaume-Uni ', 'Londres', 1968, 1980, 'Jimmy Page', 0, 'rock', 'Led Zeppelin [lɛd ˈzɛpələn] est un groupe britannique de rock, originaire de Londres, en Angleterre. Il est fondé en 1968 par Jimmy Page, avec Robert Plant, John Paul Jones et John Bonham, et dissout à la suite de la mort de ce dernier, en 1980', 'Led Zeppelin'),
(504, 'Royaume-Uni ', 'Basildon', 1980, 0, '', 3, 'rock', 'Depeche Mode est un groupe britannique de new wave et rock alternatif, originaire de Basildon, dans l\'Essex, en Angleterre. Formé en 1980, le groupe apparait au sein du courant de la synthpop et devient rapidement influent et populaire sur la scène intern', 'Depeche Mode'),
(505, 'France', 'Paris', 1976, 1986, '', 4, 'rock', 'Téléphone est un groupe de rock français. Il est formé le 12 novembre 1976 et séparé le 21 avril 1986. Composé de Jean-Louis Aubert, Louis Bertignac, Corine Marienneau et Richard Kolinka, il connaît un énorme succès dès ses débuts avec plusieurs tubes et ', 'Téléphone'),
(506, 'Royaume-Uni ', 'bristol', 1987, 0, '', 0, 'Trip hop', 'Massive Attack est un groupe musical britannique, originaire de Bristol, précurseur de la musique trip hop. Il se compose, à l\'origine, de Robert Del Naja, Grant Marshall et Andrew Vowles', 'Massive Attack'),
(507, 'Royaume-Uni ', 'Londres', 1964, 2014, 'Syd Barrett,', 3, 'rock', 'Pink Floyd [pɪŋk flɔɪd] est un groupe britannique de rock originaire de Londres. Le groupe débute avec un premier album de musique psychédélique pour ensuite bifurquer vers le rock progressif. Formé en 1965, il est considéré comme un pionnier et représent', 'Pink Floyd');

-- --------------------------------------------------------

--
-- Table structure for table `doctrine_migration_versions`
--

CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `doctrine_migration_versions`
--

INSERT INTO `doctrine_migration_versions` (`version`, `executed_at`, `execution_time`) VALUES
('DoctrineMigrations\\Version20230818121544', '2023-08-18 14:15:57', 15),
('DoctrineMigrations\\Version20230818123355', '2023-08-18 14:34:13', 38),
('DoctrineMigrations\\Version20230818140148', '2023-08-18 16:02:00', 9),
('DoctrineMigrations\\Version20230818185134', '2023-08-18 20:51:52', 11),
('DoctrineMigrations\\Version20230818185604', '2023-08-18 20:56:09', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `band`
--
ALTER TABLE `band`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctrine_migration_versions`
--
ALTER TABLE `doctrine_migration_versions`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `band`
--
ALTER TABLE `band`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=508;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
