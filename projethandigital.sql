-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 29, 2023 at 02:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projethandigital`
--

-- --------------------------------------------------------

--
-- Table structure for table `amis`
--

CREATE TABLE `amis` (
  `id` int NOT NULL,
  `id_utilisateurs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amis`
--

INSERT INTO `amis` (`id`, `id_utilisateurs`) VALUES
(8, 5),
(8, 11);

-- --------------------------------------------------------

--
-- Table structure for table `commentaires`
--

CREATE TABLE `commentaires` (
  `id` int NOT NULL,
  `message` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date` date NOT NULL,
  `id_utilisateurs` int NOT NULL,
  `id_salons` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favori`
--

CREATE TABLE `favori` (
  `id` int NOT NULL,
  `id_utilisateurs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favori`
--

INSERT INTO `favori` (`id`, `id_utilisateurs`) VALUES
(8, 5),
(8, 11);

-- --------------------------------------------------------

--
-- Table structure for table `genrejeu`
--

CREATE TABLE `genrejeu` (
  `id` int NOT NULL,
  `id_jeux` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genrejeu`
--

INSERT INTO `genrejeu` (`id`, `id_jeux`) VALUES
(1, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `nom`, `description`) VALUES
(1, 'Action/Aventure', 'Action/Aventure'),
(2, 'RPG', 'RPG'),
(3, 'FPS', 'FPS'),
(4, 'MMORPG', 'MMORPG'),
(5, 'Gestion/RTS', 'Gestion/RTS'),
(6, 'Horreur', 'Horreur'),
(7, 'Simulation', 'Simulation'),
(8, 'Course', 'Course');

-- --------------------------------------------------------

--
-- Table structure for table `jeujouer`
--

CREATE TABLE `jeujouer` (
  `id` int NOT NULL,
  `id_utilisateurs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeujouer`
--

INSERT INTO `jeujouer` (`id`, `id_utilisateurs`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(3, 5),
(1, 8),
(3, 8),
(5, 12);

-- --------------------------------------------------------

--
-- Table structure for table `jeux`
--

CREATE TABLE `jeux` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_de_sortie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jeux`
--

INSERT INTO `jeux` (`id`, `nom`, `description`, `image`, `date_de_sortie`) VALUES
(1, 'jeux 1', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque porro dicta, placeat aspernatur impedit eos. Porro pariatur quis minus esse quidem expedita sequi odit, facilis est quisquam voluptate praesentium ullam.', 'avatar.jpeg', '2023-03-01'),
(2, 'jeux2', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque porro dicta, placeat aspernatur impedit eos. Porro pariatur quis minus esse quidem expedita sequi odit, facilis est quisquam voluptate praesentium ullam.', 'avatar.jpeg', '2023-03-01'),
(3, 'un grand nom de jeu 3', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque porro dicta, placeat aspernatur impedit eos. Porro pariatur quis minus esse quidem expedita sequi odit, facilis est quisquam voluptate praesentium ullam.', 'avatar.jpeg', '2023-03-01'),
(4, 'nom4', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque porro dicta, placeat aspernatur impedit eos. Porro pariatur quis minus esse quidem expedita sequi odit, facilis est quisquam voluptate praesentium ullam.', 'avatar.jpeg', '2023-03-01'),
(5, 'abra kadabra alakazam 5', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque porro dicta, placeat aspernatur impedit eos. Porro pariatur quis minus esse quidem expedita sequi odit, facilis est quisquam voluptate praesentium ullam.', 'avatar.jpeg', '2023-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `salonrejoind`
--

CREATE TABLE `salonrejoind` (
  `id` int NOT NULL,
  `id_utilisateurs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salonrejoind`
--

INSERT INTO `salonrejoind` (`id`, `id_utilisateurs`) VALUES
(1, 8),
(2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `salons`
--

CREATE TABLE `salons` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'avatar.jpeg',
  `id_jeux` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salons`
--

INSERT INTO `salons` (`id`, `nom`, `description`, `image`, `id_jeux`) VALUES
(1, 'unsalon', 'un salon de test', 'avatar.jpeg', 1),
(2, 'un salon de coiffure', 'un salon ou vous pouvez rencontrer des coiffeur', 'avatar.jpeg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `e-mail` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'avatar.jpeg',
  `information` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `connexion` int NOT NULL DEFAULT '1' COMMENT 'etat de la connexion.',
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `e-mail`, `image`, `information`, `connexion`, `mdp`, `role`) VALUES
(1, 'test', 'test@test.test', 'avatar.jpeg', '29 March 23', 0, 'test', 0),
(5, 'a', 'a@a.fr', 'avatar.jpeg', '29 March 23', 0, 'a', 0),
(8, 'adminnom', 'adminmail@mail.fr', 'avatar.jpeg', '29 March 23', 1, 'adminmdp', 1),
(9, 'babar', 'babar@elephant.com', 'avatar.jpeg', '29 March 23', 0, 'babar', 0),
(11, 'hercule', 'hercule@hero.com', 'avatar.jpeg', '29 March 23', 0, 'hercule', 0),
(12, 'pape', 'pape@vatican.com', 'avatar.jpeg', '29 March 23', 0, 'pape', 0),
(13, 'poppy', 'poppy@poppy.com', 'avatar.jpeg', '29 March 23', 0, 'poppy', 0),
(14, 'BobEponge', 'bob@eponge.com', 'avatar.jpeg', '29 March 23', 0, 'BobEponge', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amis`
--
ALTER TABLE `amis`
  ADD PRIMARY KEY (`id`,`id_utilisateurs`),
  ADD KEY `amie_utilisateurs0_FK` (`id_utilisateurs`);

--
-- Indexes for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaires_utilisateurs_FK` (`id_utilisateurs`),
  ADD KEY `commentaires_salons0_FK` (`id_salons`);

--
-- Indexes for table `favori`
--
ALTER TABLE `favori`
  ADD PRIMARY KEY (`id`,`id_utilisateurs`),
  ADD KEY `amie_utilisateurs0_FK` (`id_utilisateurs`);

--
-- Indexes for table `genrejeu`
--
ALTER TABLE `genrejeu`
  ADD PRIMARY KEY (`id`,`id_jeux`),
  ADD KEY `appartient_jeux0_FK` (`id_jeux`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jeujouer`
--
ALTER TABLE `jeujouer`
  ADD PRIMARY KEY (`id`,`id_utilisateurs`),
  ADD KEY `jouer_utilisateurs0_FK` (`id_utilisateurs`);

--
-- Indexes for table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salonrejoind`
--
ALTER TABLE `salonrejoind`
  ADD PRIMARY KEY (`id`,`id_utilisateurs`),
  ADD KEY `rejoind_utilisateurs0_FK` (`id_utilisateurs`);

--
-- Indexes for table `salons`
--
ALTER TABLE `salons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salons_jeux_FK` (`id_jeux`);

--
-- Indexes for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD UNIQUE KEY `e-mail` (`e-mail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `salons`
--
ALTER TABLE `salons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `amis`
--
ALTER TABLE `amis`
  ADD CONSTRAINT `amie_utilisateurs0_FK` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `amie_utilisateurs_FK` FOREIGN KEY (`id`) REFERENCES `utilisateurs` (`id`);

--
-- Constraints for table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_salons0_FK` FOREIGN KEY (`id_salons`) REFERENCES `salons` (`id`),
  ADD CONSTRAINT `commentaires_utilisateurs_FK` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`);

--
-- Constraints for table `genrejeu`
--
ALTER TABLE `genrejeu`
  ADD CONSTRAINT `appartient_genres_FK` FOREIGN KEY (`id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `appartient_jeux0_FK` FOREIGN KEY (`id_jeux`) REFERENCES `jeux` (`id`);

--
-- Constraints for table `jeujouer`
--
ALTER TABLE `jeujouer`
  ADD CONSTRAINT `jouer_jeux_FK` FOREIGN KEY (`id`) REFERENCES `jeux` (`id`),
  ADD CONSTRAINT `jouer_utilisateurs0_FK` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`);

--
-- Constraints for table `salonrejoind`
--
ALTER TABLE `salonrejoind`
  ADD CONSTRAINT `rejoind_salons_FK` FOREIGN KEY (`id`) REFERENCES `salons` (`id`),
  ADD CONSTRAINT `rejoind_utilisateurs0_FK` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`);

--
-- Constraints for table `salons`
--
ALTER TABLE `salons`
  ADD CONSTRAINT `salons_jeux_FK` FOREIGN KEY (`id_jeux`) REFERENCES `jeux` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
