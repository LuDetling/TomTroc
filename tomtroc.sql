-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 mars 2024 à 06:45
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `tomtroc`
--

-- --------------------------------------------------------

--
-- Structure de la table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `img` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `description` text NOT NULL,
  `disponibility` tinyint(1) NOT NULL,
  `userId` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userId` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `img`, `description`, `disponibility`, `userId`) VALUES
(1, 'Ravage', 'René Barjavel', '65e145edf181e6.56088693.png', 'Ravage est un roman de science-fiction post-apocalyptique écrit par René Barjavel, paru en 1943. Le récit est une dystopie révélant le pessimisme de l&#039;auteur à l&#039;égard de l&#039;utilisation du progrès scientifique et des technologies par les hommes. Il s&#039;agit d&#039;un thème typique de la science-fiction post-apocalyptique, brossant le portrait de la fin de l&#039;humanité technologique et la reconstruction d&#039;une civilisation sur d&#039;autres bases. Grand succès populaire, le livre s&#039;est écoulé à plus d&#039;un million d&#039;exemplaires depuis sa sortie et il sert régulièrement de support à l&#039;étude au collège1.\r\n\r\nDans une société mature, un jour l&#039;électricité disparaît et plus aucune machine ne peut fonctionner. Les habitants, anéantis par la soudaineté de la catastrophe, sombrent dans le chaos, privés d&#039;eau courante, de lumière et de moyens de déplacement...\r\n\r\n                                        ', 0, 9),
(2, 'Ravage', 'René Barjavel', '65e145f4d24a72.99941615.png', 'Ravage est un roman de science-fiction post-apocalyptique écrit par René Barjavel, paru en 1943. Le récit est une dystopie révélant le pessimisme de l&#039;auteur à l&#039;égard de l&#039;utilisation du progrès scientifique et des technologies par les hommes. Il s&#039;agit d&#039;un thème typique de la science-fiction post-apocalyptique, brossant le portrait de la fin de l&#039;humanité technologique et la reconstruction d&#039;une civilisation sur d&#039;autres bases. Grand succès populaire, le livre s&#039;est écoulé à plus d&#039;un million d&#039;exemplaires depuis sa sortie et il sert régulièrement de support à l&#039;étude au collège1.\r\n\r\nDans une société mature, un jour l&#039;électricité disparaît et plus aucune machine ne peut fonctionner. Les habitants, anéantis par la soudaineté de la catastrophe, sombrent dans le chaos, privés d&#039;eau courante, de lumière et de moyens de déplacement...\r\n\r\n                                        ', 0, 9),
(3, 'Ravage', 'René Barjavel', '65e145fe25d382.08913667.png', 'Ravage est un roman de science-fiction post-apocalyptique écrit par René Barjavel, paru en 1943. Le récit est une dystopie révélant le pessimisme de l&#039;auteur à l&#039;égard de l&#039;utilisation du progrès scientifique et des technologies par les hommes. Il s&#039;agit d&#039;un thème typique de la science-fiction post-apocalyptique, brossant le portrait de la fin de l&#039;humanité technologique et la reconstruction d&#039;une civilisation sur d&#039;autres bases. Grand succès populaire, le livre s&#039;est écoulé à plus d&#039;un million d&#039;exemplaires depuis sa sortie et il sert régulièrement de support à l&#039;étude au collège1.\r\n\r\nDans une société mature, un jour l&#039;électricité disparaît et plus aucune machine ne peut fonctionner. Les habitants, anéantis par la soudaineté de la catastrophe, sombrent dans le chaos, privés d&#039;eau courante, de lumière et de moyens de déplacement...\r\n\r\n                                        ', 0, 9),
(4, 'Ravage', 'René la taupe', '65e145995fc9b3.33893385.jpg', 'Ravage est un roman de science-fiction post-apocalyptique écrit par René Barjavel, paru en 1943. Le récit est une dystopie révélant le pessimisme de l&#039;auteur à l&#039;égard de l&#039;utilisation du progrès scientifique et des technologies par les hommes. Il s&#039;agit d&#039;un thème typique de la science-fiction post-apocalyptique, brossant le portrait de la fin de l&#039;humanité technologique et la reconstruction d&#039;une civilisation sur d&#039;autres bases. Grand succès populaire, le livre s&#039;est écoulé à plus d&#039;un million d&#039;exemplaires depuis sa sortie et il sert régulièrement de support à l&#039;étude au collège1.\r\n\r\nDans une société mature, un jour l&#039;électricité disparaît et plus aucune machine ne peut fonctionner. Les habitants, anéantis par la soudaineté de la catastrophe, sombrent dans le chaos, privés d&#039;eau courante, de lumière et de moyens de déplacement...\r\n\r\n                                                                                ', 0, 10),
(5, 'Ravage', 'René Barjavel', '65e145d4f38d24.37058575.png', 'Ravage est un roman de science-fiction post-apocalyptique écrit par René Barjavel, paru en 1943. Le récit est une dystopie révélant le pessimisme de l&#039;auteur à l&#039;égard de l&#039;utilisation du progrès scientifique et des technologies par les hommes. Il s&#039;agit d&#039;un thème typique de la science-fiction post-apocalyptique, brossant le portrait de la fin de l&#039;humanité technologique et la reconstruction d&#039;une civilisation sur d&#039;autres bases. Grand succès populaire, le livre s&#039;est écoulé à plus d&#039;un million d&#039;exemplaires depuis sa sortie et il sert régulièrement de support à l&#039;étude au collège1.\r\n\r\nDans une société mature, un jour l&#039;électricité disparaît et plus aucune machine ne peut fonctionner. Les habitants, anéantis par la soudaineté de la catastrophe, sombrent dans le chaos, privés d&#039;eau courante, de lumière et de moyens de déplacement...\r\n\r\n                                                                                                    ', 0, 10);

-- --------------------------------------------------------

--
-- Structure de la table `messagerie`
--

DROP TABLE IF EXISTS `messagerie`;
CREATE TABLE IF NOT EXISTS `messagerie` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` text NOT NULL,
  `user_to` int NOT NULL,
  `user_from` int NOT NULL,
  `date_send` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `pseudo_from` (`user_from`),
  KEY `user_to` (`user_to`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_creation` datetime NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'default-avatar.png',
  PRIMARY KEY (`id`),
  UNIQUE KEY `pseudo` (`pseudo`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`, `date_creation`, `avatar`) VALUES
(9, 'Pipas', 'lucas@gmail.com', '$2y$10$0P2AYfs13jhq4Gi83lh1KeQlJzaCAk5niQvHGjYpyUvfGi8.Ve6sG', '0000-00-00 00:00:00', '65e14f6128ef12.36064854.png'),
(10, 'Pipass', 'lucas.detling@gmail.com', '$2y$10$b7Pe4tZG/cK9z1RfYBXANeVhlSpN02Y.f9zdhCDDk.mrVfmz.etzO', '0000-00-00 00:00:00', 'default-avatar.png'),
(11, 'Marie', 'marie@gmail.com', '$2y$10$f7SjOuGG6PryAFvo.WM1JeErmg.9/X7QP5X6b6qfTV1MQmLnqYU5e', '0000-00-00 00:00:00', 'default-avatar.png'),
(12, 'Pipo', 'lulu@gmail.com', '$2y$10$hX.hR9KK6MQ4MfK6gQQ1GOaKUu4QgUxLrEAalkLTsl7inEd0oG8wS', '2024-03-01 04:51:31', '65e15fc288a933.41507810.png');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `userId` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `messagerie`
--
ALTER TABLE `messagerie`
  ADD CONSTRAINT `messagerie_ibfk_1` FOREIGN KEY (`user_from`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `messagerie_ibfk_2` FOREIGN KEY (`user_to`) REFERENCES `user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
