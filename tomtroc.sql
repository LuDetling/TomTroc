-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 05 avr. 2024 à 17:20
-- Version du serveur : 8.2.0
-- Version de PHP : 8.2.13

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `book`
--

INSERT INTO `book` (`id`, `title`, `author`, `img`, `description`, `disponibility`, `userId`) VALUES
(2, 'Company Of One', 'Paul Jarvis', 'company-of-one.jpeg', 'Company of One de Paul Jarvis est une vision rafraîchissante de l\'entrepreneuriat, suggérant que vous n\'avez pas toujours besoin de vous développer, mais que vous pouvez vous concentrer sur votre petite taille et votre rentabilité en donnant la priorité à la durabilité et à l\'indépendance créative .\r\n', 0, 12),
(3, 'Narnia', 'C.S Lewis', 'narnia.jpeg', 'Le Monde de Narnia est une œuvre littéraire en sept tomes de l\'écrivain britannique C. S. Lewis. Elle est considérée comme un classique de la littérature anglo-saxonne pour enfants et est l\'œuvre la plus connue de l\'auteur.', 1, 10),
(4, 'The Subtle Art of Not Giving a F*ck', 'Mark Manson', 'the-subtle-art.jpeg', 'L\'Art subtil de s\'en foutre : Un guide à contre-courant pour être soi-même est le deuxième livre du blogueur et écrivain américain Mark Manson.', 1, 11),
(5, 'A Book Full Of Hope', 'Rupi Kaur', 'a-book-full-of-hope.jpeg', '                test    ', 1, 9),
(6, 'Thinking, Fast & Slow', 'Daniel Kahneman', 'thinking-fast-slow.jpeg', 'Système 1 / Système 2 : Les deux vitesses de la pensée est la traduction d’un livre, Thinking, Fast and Slow, publié en 2011 par le lauréat du prix de la Banque de Suède en sciences économiques', 0, 12),
(7, 'Psalms', '', 'esther.jpeg', 'Des poèmes bruts et honnêtes racontant les histoires des humains et le désir de connaître Dieu. Ce livre ancien et intemporel de poésie et de chants met en lumière toute la gamme des expériences émotionnelles et spirituelles que nous vivons en tant qu\'êtres humains. Nous apprenons le deuil, le chagrin, les lamentations, l’amour, la joie, le pardon et ce que signifie se connecter avec Dieu au milieu de nos vies complexes.\r\n\r\n', 1, 9),
(8, 'Innovation', 'Matt Ridley', 'innovation.jpeg', 'L’innovation est l’événement principal de l’ère moderne, la raison pour laquelle nous assistons à la fois à des améliorations spectaculaires de notre niveau de vie et à des changements troublants dans notre société. Oubliez les symptômes à court terme comme ceux de Donald Trump et du Brexit, c’est l’innovation elle-même qui les explique et qui façonnera elle-même le 21e siècle, pour le meilleur et pour le pire. Pourtant, l’innovation reste un processus mystérieux, mal compris des décideurs politiques et des hommes d’affaires, difficile à mettre de l’ordre dans l’existence, mais pourtant inévitable et inexorable lorsqu’il se produit.\r\n\r\n', 1, 10),
(9, 'Hygge', 'Meik Wiking', 'hygge.jpeg', 'Découvrez le bonheur à la danoise !Pourquoi les Danois sont-ils les gens les plus heureux du monde ? Pour Meik Wiking, directeur de l\'Institut de recherche sur le bonheur à Copenhague, la réponse est simple : grâce au hygge.', 0, 10),
(10, 'Minimalist Graphics', 'Julia Schonlau', 'minimalist-graphics.jpeg', 'Maia Francisco présente une approche avant-gardiste de la conception graphique, axée sur la simplicité, dans le révolutionnaire Minimalist Graphics . Après son Sourcebook of Contemporary Graphic Design, acclamé par la critique , Francisco présente ce regard éclairant sur les dernières tendances et concepts de l\'industrie, les plus recherchés, une ressource efficace et indispensable pour le graphiste moderne.\r\n', 1, 9),
(11, 'Milwaukee Mission', 'Elder Cooper Low', 'milwaukee-mission.jpeg', 'Servir une mission pour l’Église de Jésus-Christ des Saints des Derniers Jours est vraiment une expérience unique ! Les histoires, les souvenirs et les idées spirituelles doivent être enregistrés pour la réflexion, la révélation et la postérité. Surtout ceux qui servent dans la mission Wisconsin Milwaukee ! Les couleurs vives et le design unique rendent ce journal de la mission du Wisconsin Milwaukee spécial pour tout missionnaire ou président de mission qui le porte !', 1, 11),
(12, 'Delight!', 'Justin Rossow', 'delight!.jpeg', 'Ce livre vous aidera à vous plonger dans le plaisir joyeux, le plaisir réfléchi, le plaisir ludique, le plaisir délicieux et le plaisir désirable dans votre vie avec Dieu. Plaisir! vous invite à vivre l\'aventure à la suite de Jésus de manière réelle, accessible et terre-à-terre.\r\n\r\nBien sûr, vous connaîtrez la lutte et l’échec. Bien sûr, vous connaîtrez le chagrin et la honte. Mais vous n\'avez pas à porter le fardeau de bien marcher dans la foi ; tu fais déjà sauter de joie Jésus et chanter son chant joyeux . Le Créateur de l\'Univers pense que vous êtes quelqu\'un de spécial. Même lorsque la vie est confuse ou difficile, l’Esprit vous façonne avec soin et plaisir.\r\n\r\n', 0, 12),
(13, 'Milk & honey', 'Rupi Kaur', 'milk-honey.jpeg', 'Préface inédite de Rupi Kaur« Le premier livre de Rupi Kaur, Lait et miel, est un recueil poétique que toutes les femmes devraient avoir sur leur table de nuit ou la table basse de leur salon.', 1, 9),
(14, 'Wabi Sabi', 'Beth Kempton', 'wabi-sabi.jpeg', 'Et si on arrêtait de se rendre malade à vouloir trop en faire, à se comparer constamment, à être trop exigeant envers soi-même ? Stoppons la course à la perfection en appliquant les principes du wabi sabi ! Car c\'est justement dans l\'imperfection que l\'on pourra trouver le bonheur. Dans la culture zen japonaise, le wabi sabi est l\'art d\'apprécier la patine laissée par le temps et prône le retour à la simplicité et la reconnexion à la nature. Il nous apprend à nous accepter tels que nous sommes avec bienveillance, à apprécier la beauté et la joie autour de nous . Il nous donne les outils nécessaires pour échapper à l\'agitation et aux pressions matérielles de la vie moderne, afin de nous permettre de nous contenter de moins, et donner plus de sens à notre vie.\r\n', 0, 9),
(15, 'The Kinfolk Table', 'Nathan Williams', 'the-kinfolk-table.jpeg', ', lancé avec un grand succès et un buzz instantané en 2011, est un journal trimestriel consacré au divertissement discret et sans prétention. La revue a captivé l\'imagination des lecteurs de tout le pays, avec un contenu et une esthétique qui reflètent un désir de revenir à des temps plus simples ; faire une pause dans nos vies bien remplies ; construire une communauté autour d’une sensibilité partagée ; et de favoriser la magie infinie et énergisante qui résulte du partage d\'un repas avec de bons amis. Il y a maintenant The Kinfolk Table , un livre de cuisine des créateurs du magazine, avec les profils de 45 créateurs de goût qui cuisinent et reçoivent d\'une manière belle, simple et peu coûteuse. Chacun de ces cuisiniers amateurs (artisans, blogueurs, chefs, écrivains, boulangers, artisans) a fourni une à trois des recettes qu\'ils aiment le plus partager avec les autres, qu\'il s\'agisse de simples petits-déjeuners pour deux, de dîners tout-en-un pour six ou un sandwich parfaitement composé pour un pique-nique en solo.\r\n', 0, 9),
(16, 'Esther', 'Alabaster', 'esther.jpeg', ' livre curieux et passionnant sur l\'expérience de Dieu à l\'œuvre au milieu des rencontres fortuites, du destin et de la providence divine. Aspects de conception : Ce livre est à couverture rigide, de 120 pages, parfaitement relié et imprimé en couleur sur du papier non couché au Canada. Les dimensions sont de 7,5 po x 9,5 po. Traductions NLT actuellement disponibles.\r\n', 1, 12),
(17, 'modifié', 'test', '660feac26265c1.61295267.png', 'test                                        ', 1, 14);

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `messagerie`
--

INSERT INTO `messagerie` (`id`, `message`, `user_to`, `user_from`, `date_send`) VALUES
(2, 'Salut ça va ?', 9, 10, '2024-03-08 08:45:13'),
(3, 'Salut bien et toi ?', 10, 9, '2024-03-08 08:45:13'),
(4, 'Coucou !', 10, 11, '2024-03-08 09:52:21'),
(5, 'ça joue un peu cet aprem ?', 10, 9, '2024-03-08 08:45:13'),
(6, 'test', 10, 11, '2024-03-08 17:24:13'),
(7, 'test', 10, 11, '2024-03-08 17:24:17'),
(8, 'test', 10, 11, '2024-03-08 17:24:20'),
(9, 'c&#039;est à l&#039;envers', 10, 11, '2024-03-08 17:49:48'),
(11, 'c&#039;est bon ?', 11, 10, '2024-03-08 18:22:34'),
(12, 'continuons la discussion', 11, 10, '2024-03-08 18:29:20'),
(13, 'Ouep !', 9, 10, '2024-03-10 18:17:14'),
(14, 'Rocket league ?', 10, 9, '2024-03-10 17:17:30'),
(15, 'Toujours !', 9, 10, '2024-03-10 18:33:16'),
(16, 'Bonjour Marie', 11, 9, '2024-04-05 13:45:53'),
(17, 'bonjour', 9, 14, '2024-04-05 14:17:07');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `password`, `date_creation`, `avatar`) VALUES
(9, 'Pipas', 'lucas@gmail.com', '$2y$10$0P2AYfs13jhq4Gi83lh1KeQlJzaCAk5niQvHGjYpyUvfGi8.Ve6sG', '2024-01-09 09:42:47', '65e14f6128ef12.36064854.png'),
(10, 'Pipass', 'lucas.detling@gmail.com', '$2y$10$b7Pe4tZG/cK9z1RfYBXANeVhlSpN02Y.f9zdhCDDk.mrVfmz.etzO', '2024-03-08 09:42:33', 'default-avatar.png'),
(11, 'Marie', 'marie@gmail.com', '$2y$10$f7SjOuGG6PryAFvo.WM1JeErmg.9/X7QP5X6b6qfTV1MQmLnqYU5e', '2024-02-14 09:42:39', 'default-avatar.png'),
(12, 'Pipo', 'lulu@gmail.com', '$2y$10$hX.hR9KK6MQ4MfK6gQQ1GOaKUu4QgUxLrEAalkLTsl7inEd0oG8wS', '2024-03-01 04:51:31', '65e15fc288a933.41507810.png'),
(13, 'Joh', 'toto@gmail.com', '$2y$10$Ij/IL.Ckc3nAv61A0A9ZRubEyZDWMbRq/WcuVacsSKKgne3rlxX6W', '2024-04-05 13:46:47', '660fe5336434f4.41298573.jpg'),
(14, 'modifié', 'test@gmail.com', '$2y$10$vNZmzkc90I0v/cuz6xhU6.CKkWVWDrXWz91Wz3l70OOYs6XUBRzOu', '2024-04-05 14:11:55', '660feb84494e02.88674204.png'),
(15, 'root', 'root@gmail.com', '$2y$10$8ZEH/Y12l7roT78X/WQuqOMe3jlaLBnT6J5Qv.Lj2Irop/H.OhKAS', '2024-04-05 14:32:56', 'default-avatar.png'),
(16, 'gege', 'gege@gmail.com', '$2y$10$wSwl28RcRAuh8M0QIL/hjeGc3Dh4MkysnXlnDrTEL55Y4E2uHANHW', '2024-04-05 19:14:59', 'default-avatar.png');

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
