-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : ven. 17 mars 2023 à 13:58
-- Version du serveur : 8.0.30
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projethandigital`
--

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE `amis` (
  `id` int NOT NULL,
  `id_utilisateurs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
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
-- Structure de la table `genrejeu`
--

CREATE TABLE `genrejeu` (
  `id` int NOT NULL,
  `id_jeux` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genrejeu`
--

INSERT INTO `genrejeu` (`id`, `id_jeux`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `genres`
--

CREATE TABLE `genres` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `genres`
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
-- Structure de la table `jeujouer`
--

CREATE TABLE `jeujouer` (
  `id` int NOT NULL,
  `id_utilisateurs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `jeux`
--

CREATE TABLE `jeux` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `date_de_sortie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`id`, `nom`, `description`, `image`, `date_de_sortie`) VALUES
(1, 'testnom', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque porro dicta, placeat aspernatur impedit eos. Porro pariatur quis minus esse quidem expedita sequi odit, facilis est quisquam voluptate praesentium ullam.', 'avatar.jpeg', '2023-03-01'),
(2, 'testnom', 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Doloremque porro dicta, placeat aspernatur impedit eos. Porro pariatur quis minus esse quidem expedita sequi odit, facilis est quisquam voluptate praesentium ullam.', 'avatar.jpeg', '2023-03-01');

-- --------------------------------------------------------

--
-- Structure de la table `salonrejoind`
--

CREATE TABLE `salonrejoind` (
  `id` int NOT NULL,
  `id_utilisateurs` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `salons`
--

CREATE TABLE `salons` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_jeux` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` int NOT NULL,
  `nom` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `e-mail` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `information` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `connexion` int NOT NULL COMMENT 'etat de la connexion.',
  `mdp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `e-mail`, `image`, `information`, `connexion`, `mdp`, `role`) VALUES
(1, 'test', 'test@test.test', 'test', '2023-03-01', 0, 'test', 0),
(5, 'a', 'a@a.fr', '', '2023-03-01', 0, 'a', 0),
(8, 'adminnom', 'adminmail@mail.fr', 'adminimage', '2023-03-01', 1, 'adminmdp', 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `amis`
--
ALTER TABLE `amis`
  ADD PRIMARY KEY (`id`,`id_utilisateurs`),
  ADD KEY `amie_utilisateurs0_FK` (`id_utilisateurs`);

--
-- Index pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentaires_utilisateurs_FK` (`id_utilisateurs`),
  ADD KEY `commentaires_salons0_FK` (`id_salons`);

--
-- Index pour la table `genrejeu`
--
ALTER TABLE `genrejeu`
  ADD PRIMARY KEY (`id`,`id_jeux`),
  ADD KEY `appartient_jeux0_FK` (`id_jeux`);

--
-- Index pour la table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `jeujouer`
--
ALTER TABLE `jeujouer`
  ADD PRIMARY KEY (`id`,`id_utilisateurs`),
  ADD KEY `jouer_utilisateurs0_FK` (`id_utilisateurs`);

--
-- Index pour la table `jeux`
--
ALTER TABLE `jeux`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `salonrejoind`
--
ALTER TABLE `salonrejoind`
  ADD PRIMARY KEY (`id`,`id_utilisateurs`),
  ADD KEY `rejoind_utilisateurs0_FK` (`id_utilisateurs`);

--
-- Index pour la table `salons`
--
ALTER TABLE `salons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `salons_jeux_FK` (`id_jeux`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nom` (`nom`),
  ADD UNIQUE KEY `e-mail` (`e-mail`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commentaires`
--
ALTER TABLE `commentaires`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `jeux`
--
ALTER TABLE `jeux`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `salons`
--
ALTER TABLE `salons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `amis`
--
ALTER TABLE `amis`
  ADD CONSTRAINT `amie_utilisateurs0_FK` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`),
  ADD CONSTRAINT `amie_utilisateurs_FK` FOREIGN KEY (`id`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `commentaires_salons0_FK` FOREIGN KEY (`id_salons`) REFERENCES `salons` (`id`),
  ADD CONSTRAINT `commentaires_utilisateurs_FK` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `genrejeu`
--
ALTER TABLE `genrejeu`
  ADD CONSTRAINT `appartient_genres_FK` FOREIGN KEY (`id`) REFERENCES `genres` (`id`),
  ADD CONSTRAINT `appartient_jeux0_FK` FOREIGN KEY (`id_jeux`) REFERENCES `jeux` (`id`);

--
-- Contraintes pour la table `jeujouer`
--
ALTER TABLE `jeujouer`
  ADD CONSTRAINT `jouer_jeux_FK` FOREIGN KEY (`id`) REFERENCES `jeux` (`id`),
  ADD CONSTRAINT `jouer_utilisateurs0_FK` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `salonrejoind`
--
ALTER TABLE `salonrejoind`
  ADD CONSTRAINT `rejoind_salons_FK` FOREIGN KEY (`id`) REFERENCES `salons` (`id`),
  ADD CONSTRAINT `rejoind_utilisateurs0_FK` FOREIGN KEY (`id_utilisateurs`) REFERENCES `utilisateurs` (`id`);

--
-- Contraintes pour la table `salons`
--
ALTER TABLE `salons`
  ADD CONSTRAINT `salons_jeux_FK` FOREIGN KEY (`id_jeux`) REFERENCES `jeux` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
