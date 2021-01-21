-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : jeu. 21 jan. 2021 à 15:55
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `top_culture_data_base`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `idUtilisateur` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `date_creation` date NOT NULL,
  `niveau` int(11) NOT NULL,
  `description` text NOT NULL,
  `photo_de_profil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `idAvis` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avis`
--

INSERT INTO `avis` (`idAvis`, `idUtilisateur`) VALUES
(9, 4),
(10, 4),
(11, 4),
(12, 4),
(13, 4),
(14, 4),
(15, 4),
(16, 4),
(17, 4),
(18, 4),
(19, 4),
(8, 8);

-- --------------------------------------------------------

--
-- Structure de la table `avisoeuvre`
--

CREATE TABLE `avisoeuvre` (
  `idAvis` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `critique` text NOT NULL,
  `dateEnvoi` date DEFAULT NULL,
  `titreAvis` text NOT NULL,
  `idOeuvre` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avisoeuvre`
--

INSERT INTO `avisoeuvre` (`idAvis`, `note`, `critique`, `dateEnvoi`, `titreAvis`, `idOeuvre`, `idUtilisateur`) VALUES
(9, 7, 'Un tres bon jeu surtout en coop', '2021-01-21', 'Pas mal !', 34, 4),
(10, 9, 'Quel jeu incroybale... mon premier fps', '2021-01-21', '360 no scope', 41, 4),
(11, 3, 'Jai essayé mais jpeut pas sah', '2021-01-21', 'Mouais', 39, 4),
(12, 10, 'Le plus grand jeu de l\\\'histoire', '2021-01-21', 'Masterpiece', 33, 4),
(13, 8, 'Le seul jeu ou fut était potable', '2021-01-21', 'Vive l\\\'achat revente', 45, 4),
(14, 9, 'Sous-cote', '2021-01-21', 'Excellent', 43, 4),
(15, 9, 'Classique', '2021-01-21', 'Révolutionnaire', 29, 4),
(16, 6, 'l\\\'opening est incroyable', '2021-01-21', 'pas mal', 50, 4),
(17, 8, 'sous-cote', '2021-01-21', 'Le film de mon enfance', 4, 4),
(18, 10, 'Ai-je besoin de parler ?', '2021-01-21', 'Kaizoku oni ore wa naru', 73, 4),
(19, 1, 'Dédicace à mestari', '2021-01-21', 'Mdr', 100, 4);

-- --------------------------------------------------------

--
-- Structure de la table `avistop`
--

CREATE TABLE `avistop` (
  `idAvis` int(11) NOT NULL,
  `critique` text NOT NULL,
  `dateEnvoi` date DEFAULT NULL,
  `idTop` int(11) NOT NULL,
  `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avistop`
--

INSERT INTO `avistop` (`idAvis`, `critique`, `dateEnvoi`, `idTop`, `idUtilisateur`) VALUES
(8, 'Pas mal ! J\\\'aime bcp ark\r\n', '2021-01-21', 34, 8);

-- --------------------------------------------------------

--
-- Structure de la table `composer`
--

CREATE TABLE `composer` (
  `idTop_composer` int(11) NOT NULL,
  `idOeuvre_composer` int(11) NOT NULL,
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `composer`
--

INSERT INTO `composer` (`idTop_composer`, `idOeuvre_composer`, `position`) VALUES
(34, 32, 1);

-- --------------------------------------------------------

--
-- Structure de la table `oeuvre`
--

CREATE TABLE `oeuvre` (
  `idOeuvre` int(11) NOT NULL,
  `libelle` varchar(70) NOT NULL,
  `image` varchar(100) NOT NULL,
  `note` double DEFAULT NULL,
  `idTheme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `oeuvre`
--

INSERT INTO `oeuvre` (`idOeuvre`, `libelle`, `image`, `note`, `idTheme`) VALUES
(1, 'Star Wars : Le Retour du Jedi', 'Ressources\\Oeuvres\\Film\\Star_Wars_Le_Retour_du_Jedi.jpg', 9.5, 1),
(2, 'le Seigneur des Anneaux : Le retour du Roi', 'Ressources\\Oeuvres\\Film\\Le_Seigneur_des_Anneaux_Le_Retour_du_Roi.jpg', 9.5, 1),
(3, 'Batman Begins', 'Ressources\\Oeuvres\\Film\\Batman_Begins.jpg', NULL, 1),
(4, 'Star Wars : La Menace Fantôme', 'Ressources\\Oeuvres\\Film\\Star_Wars_La_Menace_Fantome.jpg', 8, 1),
(5, 'Star Wars : L\'Attaque des Clones', 'Ressources\\Oeuvres\\Film\\Star_Wars_LAttaque_des_Clones.jpg', 5.5, 1),
(6, 'Star Wars : La Revanche des Sith', 'Ressources\\Oeuvres\\Film\\Star_Wars_La_Revanche_des_Sith.jpg', NULL, 1),
(7, 'Star Wars : Un Nouvel Espoir', 'Ressources\\Oeuvres\\Film\\Star_Wars_Un_nouvel_espoir.jpg', NULL, 1),
(8, 'Star Wars : L\'Empire Contre Attaque', 'Ressources\\Oeuvres\\Film\\Star_Wars_LEmpire_Contre_Attaque.jpg', NULL, 1),
(9, 'Retour Vers Le Futur', 'Ressources\\Oeuvres\\Film\\Retour_vers_le_futur.jpg', NULL, 1),
(10, 'Harry Potter à l\'école des Sorciers', 'Ressources\\Oeuvres\\Film\\Harry_potter_à_lécole_des_sorciers.jpg', NULL, 1),
(11, 'Mad Max : Fury Road', 'Ressources\\Oeuvres\\Film\\Mad_Max_Fury_Road.jpg', NULL, 1),
(12, 'Inception', 'Ressources\\Oeuvres\\Film\\Inception.jpg', NULL, 1),
(13, 'Interstellar', 'Ressources\\Oeuvres\\Film\\Interstellar.jpg', NULL, 1),
(14, 'Shutter Island', 'Ressources\\Oeuvres\\Film\\Shutter_island.jpg', NULL, 1),
(15, 'Batman The Dark Knight', 'Ressources\\Oeuvres\\Film\\Batman_The_Dark_Knight.jpg', NULL, 1),
(16, 'Batman The Dark Knight Rises', 'Ressources\\Oeuvres\\Film\\Batman_The_Dark_Knight_Rises.jpg', NULL, 1),
(17, 'Les Indestructibles', 'Ressources\\Oeuvres\\Film\\Les_Indestructibles.jpg', NULL, 1),
(18, 'The Martian', 'Ressources\\Oeuvres\\Film\\The_Martian.jpg', NULL, 1),
(19, 'Gravity', 'Ressources\\Oeuvres\\Film\\Gravity.jpg', NULL, 1),
(20, 'Logan', 'Ressources\\Oeuvres\\Film\\Logan.jpg', NULL, 1),
(21, 'Avengers : Infinity War', 'Ressources\\Oeuvres\\Film\\Avengers_Infinity_War.jpg', NULL, 1),
(22, 'Avengers : End Game', 'Ressources\\Oeuvres\\Film\\Avengers_End_Game.jpg', NULL, 1),
(23, 'Avengers', 'Ressources\\Oeuvres\\Film\\Avengers.jpg', NULL, 1),
(24, 'Avengers : L\'Ère d\'Ultron', 'Ressources\\Oeuvres\\Film\\Avengers_Lere_dUltron.jpg', NULL, 1),
(25, 'Gone Girl', 'Ressources\\Oeuvres\\Film\\Gone_Girl.jpg', NULL, 1),
(26, 'Premier Contact', 'Ressources\\Oeuvres\\Film\\Premier_Contact.jpg', NULL, 1),
(27, 'Ad Astra', 'Ressources\\Oeuvres\\Film\\Ad_Astra.jpg', NULL, 1),
(28, 'The Help', 'Ressources\\Oeuvres\\Film\\The_Help.jpg', NULL, 1),
(29, 'Mario 64', 'Ressources\\Oeuvres\\Jeux\\Mario_64.jpg', 9, 3),
(30, 'The Legend of Zelda : Breath of the Wild', 'Ressources\\Oeuvres\\Jeux\\The_Legend_of_Zelda_Breath_of_the_Wild.jpg', NULL, 3),
(31, 'Grand Theft Auto V', 'Ressources\\Oeuvres\\Jeux\\Grand_Theft_Auto_V.jpg', 8, 3),
(32, 'Dark Souls', 'Ressources\\Oeuvres\\Jeux\\\r\nDark_Souls.jpg', NULL, 3),
(33, 'Bloodborne', 'Ressources\\Oeuvres\\Jeux\\\r\nBloodborne.jpg', 10, 3),
(34, 'ARK Survival Evolved', 'Ressources\\Oeuvres\\Jeux\\\r\nARK_Survival_Evolved.png', 7, 3),
(35, 'Red Dead Redemption II', 'Ressources\\Oeuvres\\Jeux\\\r\nRed_Dead_Redemption_II.png', NULL, 3),
(36, 'God of War', 'Ressources\\Oeuvres\\Jeux\\God_of_War.png', NULL, 3),
(37, 'The Witcher 3 Wild Hunt', 'Ressources\\Oeuvres\\Jeux\\The_Witcher_3_Wild_Hunt.png', NULL, 3),
(38, 'World of Warcraft', 'Ressources\\Oeuvres\\Jeux\\World_of_Warcraft.jpg', NULL, 3),
(39, 'League of Legends', 'Ressources\\Oeuvres\\Jeux\\League_of_Legends.jpg', 3, 3),
(40, 'Counter Strike : Global Offensive', 'Ressources\\Oeuvres\\Jeux\\Counter_Strike_Global_Offensive.png', NULL, 3),
(41, 'Call of Duty : Modern Warfare 2', 'Ressources\\Oeuvres\\Jeux\\Call_of_Duty_Modern_Warfare_2.png', 9, 3),
(42, 'The Last of Us', 'Ressources\\Oeuvres\\Jeux\\The_Last_of_Us.jpg', NULL, 3),
(43, 'NieR Automata', 'Ressources\\Oeuvres\\Jeux\\Nie_R_Automata.jpg', 9, 3),
(44, 'Dragon Age Inquisition', 'Ressources\\Oeuvres\\Jeux\\Dragon_Age_Inquisition.png', NULL, 3),
(45, 'FIFA 15', 'Ressources\\Oeuvres\\Jeux\\FIFA_15.jpg', 8, 3),
(46, 'Pro Evolution Soccer 6', 'Ressources\\Oeuvres\\Jeux\\Pro_Evolution_Soccer_6.jpg', NULL, 3),
(47, 'Dragon Ball Z : Budokai Tenkaichi 3', 'Ressources\\Oeuvres\\Jeux\\Dragon_Ball_Z_Budokai_Tenkaichi_3.jpg', NULL, 3),
(48, 'Rayman 3 : Hoodlum Havoc', 'Ressources\\Oeuvres\\Jeux\\Rayman_3_Hoodlum_Havoc.jpg', NULL, 3),
(49, 'Professeur Layton et la Boite de Pandore', 'Ressources\\Oeuvres\\Jeux\\Professeur_Layton_et_la_Boite_de_Pandore.jpg', NULL, 3),
(50, 'Sonic Mania', 'Ressources\\Oeuvres\\Jeux\\Sonic_Mania.png', 6, 3),
(51, 'Final Fantasy VII', 'Ressources\\Oeuvres\\Jeux\\Final_Fantasy_VII.png', NULL, 3),
(52, 'Metal Gear Solid', 'Ressources\\Oeuvres\\Jeux\\Metal_Gear_Solid.png', NULL, 3),
(53, 'Assasination Classroom', 'Ressources\\Oeuvres\\Anime\\assasination_classroom.jpg', NULL, 2),
(54, 'Attaque Des Titans', 'Ressources\\Oeuvres\\Anime\\attaque_on_titans.jpg', 9.5, 2),
(55, 'Black Clover', 'Ressources\\Oeuvres\\Anime\\black_clover.jpg', NULL, 2),
(56, 'Bleach', 'Ressources\\Oeuvres\\Anime\\Bleach.jpg', NULL, 2),
(57, 'Code Geass', 'Ressources\\Oeuvres\\Anime\\code_geass.jpg', NULL, 2),
(58, 'Death Note', 'Ressources\\Oeuvres\\Anime\\Death_Note.jpg', NULL, 2),
(59, 'Demon Slayer', 'Ressources\\Oeuvres\\Anime\\demon_slayer.jpg\r\n', NULL, 2),
(60, 'Dr Stone', 'Ressources\\Oeuvres\\Anime\\Dr_stone.jpg', NULL, 2),
(61, 'Dragon Ball Z', 'Ressources\\Oeuvres\\Anime\\dragon_ball_z.jpg', NULL, 2),
(62, 'Fire Force', 'Ressources\\Oeuvres\\Anime\\fire_force.jpg', NULL, 2),
(63, 'Full Metal Alchemist', 'Ressources\\Oeuvres\\Anime\\Full_Metal.jpg', NULL, 2),
(64, 'Gintama', 'Ressources\\Oeuvres\\Anime\\Gintama.jpg', NULL, 2),
(65, 'GTO', 'Ressources\\Oeuvres\\Anime\\gto.jpg', NULL, 2),
(66, 'Haikyu!!', 'Ressources\\Oeuvres\\Anime\\Haikyu.jpg', NULL, 2),
(67, 'Hunter X Hunter', 'Ressources\\Oeuvres\\Anime\\HXH.jpg', NULL, 2),
(68, 'Jojo\'s Bizarre Adventure', 'Ressources\\Oeuvres\\Anime\\jojo.jpg', NULL, 2),
(69, 'Kuroko\'s Basket', 'Ressources\\Oeuvres\\Anime\\kuroko.jpg', NULL, 2),
(70, 'Your Lie in April', 'Ressources\\Oeuvres\\Anime\\lie_inApril.jpg', NULL, 2),
(71, 'My Hero Academia', 'Ressources\\Oeuvres\\Anime\\mha.jpg', NULL, 2),
(72, 'Naruto', 'Ressources\\Oeuvres\\Anime\\naruto.jpg', NULL, 2),
(73, 'One Piece', 'Ressources\\Oeuvres\\Anime\\one_piece.jpg', 10, 2),
(74, 'Tokyo Ghoul', 'Ressources\\Oeuvres\\Anime\\tokyo_ghoul.jpg', NULL, 2),
(75, '3%', 'Ressources\\Oeuvres\\Série\\3.jpg', 3, 4),
(76, 'Arrow', 'Ressources\\Oeuvres\\Série\\Arrow.jpg', NULL, 4),
(77, 'Black Mirror', 'Ressources\\Oeuvres\\Série\\Black_Mirror.jpg', NULL, 4),
(78, 'Breaking Bad', 'Ressources\\Oeuvres\\Série\\Breaking_Bad.jpg', NULL, 4),
(79, 'Daredevil', 'Ressources\\Oeuvres\\Série\\Daredevil.jpg', NULL, 4),
(80, 'Dark', 'Ressources\\Oeuvres\\Série\\Dark.jpg', NULL, 4),
(81, 'Game Of Thrones', 'Ressources\\Oeuvres\\Série\\Game_Of_Thrones.jpg', NULL, 4),
(82, 'Locke And Key', 'Ressources\\Oeuvres\\Série\\Locke_And_Key.jpg', NULL, 4),
(83, 'Mr Robot', 'Ressources\\Oeuvres\\Série\\Mr_Robot.jpg', NULL, 4),
(84, 'Prison Break', 'Ressources\\Oeuvres\\Série\\Prison_Break.jpg', 6, 4),
(85, 'Ragnarok', 'Ressources\\Oeuvres\\Série\\Ragnarok.jpg', NULL, 4),
(86, 'Rick And Morty', 'Ressources\\Oeuvres\\Série\\Rick_And_Morty.jpg', NULL, 4),
(87, 'South Park', 'Ressources\\Oeuvres\\Série\\South_Park.jpg', NULL, 4),
(88, 'Star Trek Discovery', 'Ressources\\Oeuvres\\Série\\Star_Trek_Discovery.jpg', NULL, 4),
(89, 'Stranger Things', 'Ressources\\Oeuvres\\Série\\Stranger_Things.jpg', NULL, 4),
(90, 'The 100', 'Ressources\\Oeuvres\\Série\\The_100.jpg', NULL, 4),
(91, 'The Boys', 'Ressources\\Oeuvres\\Série\\The_Boys.jpg', NULL, 4),
(92, 'The Flash', 'Ressources\\Oeuvres\\Série\\The_Flash.jpg', 7.5, 4),
(93, 'The Mandalorian', 'Ressources\\Oeuvres\\Série\\The_Mandalorian.jpg', NULL, 4),
(94, 'The OA', 'Ressources\\Oeuvres\\Série\\The_OA.jpg', NULL, 4),
(95, 'The Umbrella Academy', 'Ressources\\Oeuvres\\Série\\The_Umbrella_Academy.jpg', NULL, 4),
(96, 'The Walking Dead', 'Ressources\\Oeuvres\\Série\\The_Walking_Dead.jpg', NULL, 4),
(97, 'The Witcher', 'Ressources\\Oeuvres\\Série\\The_Witcher.jpg', NULL, 4),
(98, 'Vikings', 'Ressources\\Oeuvres\\Série\\Vikings.jpg', NULL, 4),
(99, 'You', 'Ressources\\Oeuvres\\Série\\You.jpg', NULL, 4),
(100, 'Re Zero', 'Ressources\\Oeuvres\\Anime\\re_zero.jpg', 1, 2),
(101, 'One Punch Man', 'Ressources\\Oeuvres\\Anime\\one_punch.jpg', NULL, 2),
(102, 'The Promised Neverland', 'Ressources\\Oeuvres\\Anime\\promised_neverland.jpg', NULL, 2);

-- --------------------------------------------------------

--
-- Structure de la table `signalement`
--

CREATE TABLE `signalement` (
  `idSignalement` int(11) NOT NULL,
  `typeSignalement` varchar(200) NOT NULL,
  `message` text NOT NULL,
  `dateSignal` date DEFAULT NULL,
  `idUtilSignal` int(11) DEFAULT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idOeuvre` int(11) DEFAULT NULL,
  `idTop` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `signalement`
--

INSERT INTO `signalement` (`idSignalement`, `typeSignalement`, `message`, `dateSignal`, `idUtilSignal`, `idUtilisateur`, `idOeuvre`, `idTop`) VALUES
(4, 'message', 'Il y a quelques bug sur le site', '2021-01-21', NULL, 8, NULL, NULL),
(5, 'signalAvisTop', 'Signalement de l\'avis 8 écrit par achurafO datant du 2021-01-21 sur le top numero 34.', '2021-01-21', 4, 4, NULL, 34);

-- --------------------------------------------------------

--
-- Structure de la table `theme`
--

CREATE TABLE `theme` (
  `idTheme` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `theme`
--

INSERT INTO `theme` (`idTheme`, `nom`) VALUES
(1, 'Film'),
(2, 'Anime'),
(3, 'JeuxVideo'),
(4, 'Série');

-- --------------------------------------------------------

--
-- Structure de la table `top`
--

CREATE TABLE `top` (
  `idTop` int(11) NOT NULL,
  `nomTop` varchar(50) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idTheme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `top`
--

INSERT INTO `top` (`idTop`, `nomTop`, `idUtilisateur`, `idTheme`) VALUES
(34, 'top 10', 4, 3),
(35, 'top pire anime', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mot_de_passe` varchar(200) NOT NULL,
  `date_creation` date NOT NULL,
  `niveau` int(11) NOT NULL DEFAULT '1',
  `description` text,
  `photo_de_profil` varchar(50) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `pseudo`, `mot_de_passe`, `date_creation`, `niveau`, `description`, `photo_de_profil`, `admin`) VALUES
(4, 'myahia', '$2y$10$rsFAiu7FzZUHHqjBLm9AxOJ/L/hymID6KxwLGHY5x/iG/zCnyLe9u', '2020-12-26', 1, NULL, NULL, 0),
(5, 'bkebir', '$2y$10$rN25/9E/hJ3Vin5YUvBsYeVEnGP6mlO8QA3LEFe4.Kv/9AfDLvR0C', '2020-12-27', 1, NULL, NULL, 0),
(6, 'astaluego', '$2y$10$VfPAihH5Nt6VnractWj7h./XfeaVEWqaZ5aP3R0ASeluwzwZ.pIU6', '2020-12-27', 1, NULL, NULL, 0),
(7, 'mestari', '$2y$10$pbmaR9ucelzx2lPS3o80ZeXc.abQMcdol2gBLZlzxaB/aKdW.7Et2', '2020-12-28', 1, NULL, NULL, 0),
(8, 'achurafO', '$2y$10$la0BS/VL13i86pIiHAPAO.q8nq3cuC6LJSPlRzTuXeSXoeO9Hs4y2', '2020-12-28', 1, NULL, NULL, 0),
(9, 'eichiro', '$2y$10$QZ2qZ1zj4LeiKfUR6kEQrOgi8r3KMQ8QJE9ss2kAtgJrCGfEA3PkG', '2021-01-01', 1, NULL, NULL, 0),
(10, 'adminTest1', '$2y$10$KvAnWOEOSOTGmfhRVpqGrOkFo8QfCnRN9KH6fIHHn3t0oZj5KtvIS', '2021-01-14', 1, NULL, NULL, 1),
(11, 'testInscription', '$2y$10$huPmxtc0iaD4/OVcQ129oOkX4OuodCLgGec44kQI6N0k9E2TQLXVO', '2021-01-16', 1, NULL, NULL, 0),
(12, 'utilisateur33', '$2y$10$QHFq0h/CNg7KOjH1XQowzuSbJBRdBAdvK2OOYIWMOla8qksDqwSua', '2021-01-17', 1, NULL, NULL, 0),
(13, 'utilisateur44', '$2y$10$pdmfrpacccwM12ugjfxd.eYS7ptyQ/i9JuoxrJVSdpx5EXXAMWiya', '2021-01-17', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateursimple`
--

CREATE TABLE `utilisateursimple` (
  `idUtilisateur` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mot_de_passe` varchar(100) NOT NULL,
  `date_creation` date NOT NULL,
  `niveau` int(11) NOT NULL,
  `description` text NOT NULL,
  `photo_de_profil` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`idAvis`),
  ADD KEY `Avis_Utilisateur_FK` (`idUtilisateur`);

--
-- Index pour la table `avisoeuvre`
--
ALTER TABLE `avisoeuvre`
  ADD PRIMARY KEY (`idAvis`),
  ADD KEY `AvisOeuvre_Oeuvre0_FK` (`idOeuvre`),
  ADD KEY `AvisOeuvre_Utilisateur1_FK` (`idUtilisateur`);

--
-- Index pour la table `avistop`
--
ALTER TABLE `avistop`
  ADD PRIMARY KEY (`idAvis`),
  ADD KEY `AvisTop_Top0_FK` (`idTop`),
  ADD KEY `AvisTop_Utilisateur1_FK` (`idUtilisateur`);

--
-- Index pour la table `composer`
--
ALTER TABLE `composer`
  ADD PRIMARY KEY (`idTop_composer`,`idOeuvre_composer`),
  ADD KEY `composer_Oeuvre0_FK` (`idOeuvre_composer`);

--
-- Index pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD PRIMARY KEY (`idOeuvre`),
  ADD KEY `Oeuvre_Theme_FK` (`idTheme`);

--
-- Index pour la table `signalement`
--
ALTER TABLE `signalement`
  ADD PRIMARY KEY (`idSignalement`),
  ADD KEY `Signalement_Utilisateur_FK` (`idUtilisateur`),
  ADD KEY `idOeuvre` (`idOeuvre`),
  ADD KEY `idTop` (`idTop`);

--
-- Index pour la table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`idTheme`);

--
-- Index pour la table `top`
--
ALTER TABLE `top`
  ADD PRIMARY KEY (`idTop`),
  ADD KEY `Top_Utilisateur_FK` (`idUtilisateur`),
  ADD KEY `Top_Theme0_FK` (`idTheme`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- Index pour la table `utilisateursimple`
--
ALTER TABLE `utilisateursimple`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `idAvis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  MODIFY `idOeuvre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT pour la table `signalement`
--
ALTER TABLE `signalement`
  MODIFY `idSignalement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `theme`
--
ALTER TABLE `theme`
  MODIFY `idTheme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `top`
--
ALTER TABLE `top`
  MODIFY `idTop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD CONSTRAINT `Administrateur_Utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `Avis_Utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `avisoeuvre`
--
ALTER TABLE `avisoeuvre`
  ADD CONSTRAINT `AvisOeuvre_Avis_FK` FOREIGN KEY (`idAvis`) REFERENCES `avis` (`idAvis`),
  ADD CONSTRAINT `AvisOeuvre_Oeuvre0_FK` FOREIGN KEY (`idOeuvre`) REFERENCES `oeuvre` (`idOeuvre`),
  ADD CONSTRAINT `AvisOeuvre_Utilisateur1_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `avistop`
--
ALTER TABLE `avistop`
  ADD CONSTRAINT `AvisTop_Avis_FK` FOREIGN KEY (`idAvis`) REFERENCES `avis` (`idAvis`),
  ADD CONSTRAINT `AvisTop_Top0_FK` FOREIGN KEY (`idTop`) REFERENCES `top` (`idTop`),
  ADD CONSTRAINT `AvisTop_Utilisateur1_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `composer`
--
ALTER TABLE `composer`
  ADD CONSTRAINT `composer_Oeuvre0_FK` FOREIGN KEY (`idOeuvre_composer`) REFERENCES `oeuvre` (`idOeuvre`),
  ADD CONSTRAINT `composer_Top_FK` FOREIGN KEY (`idTop_composer`) REFERENCES `top` (`idTop`);

--
-- Contraintes pour la table `oeuvre`
--
ALTER TABLE `oeuvre`
  ADD CONSTRAINT `Oeuvre_Theme_FK` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`idTheme`);

--
-- Contraintes pour la table `signalement`
--
ALTER TABLE `signalement`
  ADD CONSTRAINT `Signalement_Utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `top`
--
ALTER TABLE `top`
  ADD CONSTRAINT `Top_Theme0_FK` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`idTheme`),
  ADD CONSTRAINT `Top_Utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Contraintes pour la table `utilisateursimple`
--
ALTER TABLE `utilisateursimple`
  ADD CONSTRAINT `UtilisateurSimple_Utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
