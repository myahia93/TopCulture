-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 24, 2021 at 08:35 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `top_culture_data_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrateur`
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
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
                        `idAvis` int(11) NOT NULL,
                        `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avis`
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
(27, 4),
(28, 4),
(30, 4),
(31, 4),
(32, 4),
(39, 4),
(42, 4),
(45, 4),
(35, 5),
(44, 7),
(48, 7),
(49, 7),
(20, 10),
(21, 10),
(22, 10),
(24, 10),
(25, 10),
(26, 10),
(33, 10),
(34, 10),
(43, 10),
(46, 15),
(50, 16),
(53, 18);

-- --------------------------------------------------------

--
-- Table structure for table `avisoeuvre`
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
-- Dumping data for table `avisoeuvre`
--

INSERT INTO `avisoeuvre` (`idAvis`, `note`, `critique`, `dateEnvoi`, `titreAvis`, `idOeuvre`, `idUtilisateur`) VALUES
(9, 7, 'Un tres bon jeu surtout en coop', '2021-01-21', 'Pas mal !', 34, 4),
(10, 9, 'Quel jeu incroybale... mon premier fps', '2021-01-21', '360 no scope', 41, 4),
(11, 3, 'Jai essayé mais jpeut pas sah', '2021-01-21', 'Mouais', 39, 4),
(12, 10, 'Le plus grand jeu de l\'histoire', '2021-01-22', 'Masterpiece', 33, 4),
(13, 8, 'Le seul jeu ou fut était potable', '2021-01-21', 'Vive l\\\'achat revente', 45, 4),
(14, 9, 'Sous-cote', '2021-01-21', 'Excellent', 43, 4),
(15, 9, 'Classique', '2021-01-21', 'Révolutionnaire', 29, 4),
(16, 6, 'l\\\'opening est incroyable', '2021-01-21', 'pas mal', 50, 4),
(17, 8, 'sous-cote', '2021-01-21', 'Le film de mon enfance', 4, 4),
(18, 10, 'Ai-je vraiment besoin de parler ?', '2021-01-24', 'Kaizoku oni ore wa naru', 73, 4),
(19, 1, 'Dédicace à mestari', '2021-01-21', 'Mdr', 100, 4),
(20, 10, 'dinguerie', '2021-01-21', 'waw', 2, 10),
(21, 9, 'vezzr', '2021-01-21', 'fezvez', 1, 10),
(22, 9, 'rfbedde', '2021-01-21', 'fdbdef', 54, 10),
(24, 3, 'cszqvszvedzs', '2021-01-21', '3%', 75, 10),
(26, 9, 'l\'art du git good', '2021-01-21', 'Excellent', 32, 10),
(27, 5, 'heureusement ya jango fett', '2021-01-22', 'le pire star wars', 5, 4),
(28, 6, 'bof', '2021-01-22', 'mouais l\'époque quoi', 84, 4),
(30, 8, 'Vive los santos', '2021-01-22', 'Grandiose', 31, 4),
(31, 10, 'Rien n\'est meilleurs qu\'un bon couscous', '2021-01-23', 'Un classique', 104, 4),
(32, 10, 'Le plus grand des chauves', '2021-01-23', 'Le goat', 153, 4),
(34, 9, 'fdbfdgbf', '2021-01-23', 'fdhdf', 34, 10),
(42, 9, 'El gordo', '2021-01-23', 'R9', 145, 4),
(44, 3, 'Perte de temps', '2021-01-24', 'Immonde', 61, 7),
(45, 10, 'Le goat', '2021-01-24', 'Chef d\'oeuvre', 61, 4),
(46, 10, 'Meilleur oeuvre toute generation confondu', '2021-01-24', 'Fabuleux', 61, 15),
(48, 6, 'Bien mais sans plus, un peu trop long', '2021-01-24', 'Bof', 73, 7),
(49, 3, 'perte de temps', '2021-01-24', 'Immonde', 51, 7),
(50, 10, 'Superbe oeuvre extraordinaire', '2021-01-24', 'Génial', 51, 16),
(53, 9, 'Superbe jeux video', '2021-01-24', 'Genial', 51, 18);

-- --------------------------------------------------------

--
-- Table structure for table `avistop`
--

CREATE TABLE `avistop` (
                           `idAvis` int(11) NOT NULL,
                           `critique` text NOT NULL,
                           `dateEnvoi` date DEFAULT NULL,
                           `idTop` int(11) NOT NULL,
                           `idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `avistop`
--

INSERT INTO `avistop` (`idAvis`, `critique`, `dateEnvoi`, `idTop`, `idUtilisateur`) VALUES
(33, 'test', '2021-01-23', 39, 10),
(35, 'Louuurd', '2021-01-23', 36, 5),
(39, 'trop la base sah louuurd !!', '2021-01-23', 36, 4),
(43, 'pas mal mais bon ', '2021-01-24', 42, 10);

-- --------------------------------------------------------

--
-- Table structure for table `composer`
--

CREATE TABLE `composer` (
                            `idTop_composer` int(11) NOT NULL,
                            `idOeuvre_composer` int(11) NOT NULL,
                            `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `composer`
--

INSERT INTO `composer` (`idTop_composer`, `idOeuvre_composer`, `position`) VALUES
(36, 1, 1),
(36, 2, 3),
(36, 4, 4),
(36, 16, 2),
(36, 17, 5),
(39, 104, 1),
(40, 125, 3),
(40, 133, 5),
(40, 134, 4),
(40, 141, 6),
(40, 153, 1),
(40, 155, 2),
(41, 3, 5),
(41, 10, 3),
(41, 15, 6),
(41, 17, 7),
(41, 20, 8),
(41, 21, 1),
(41, 23, 2),
(41, 24, 4),
(42, 78, 1),
(42, 81, 2),
(42, 86, 3),
(43, 54, 3),
(43, 61, 2),
(43, 73, 1),
(44, 63, 1),
(47, 22, 2),
(47, 27, 1),
(49, 54, 3),
(49, 61, 2),
(49, 73, 1),
(50, 54, 3),
(50, 61, 2),
(50, 73, 1),
(51, 33, 1),
(51, 34, 2),
(52, 32, 1),
(53, 54, 3),
(53, 61, 2),
(53, 73, 1),
(54, 61, 3),
(54, 72, 2),
(54, 73, 1),
(55, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `oeuvre`
--

CREATE TABLE `oeuvre` (
                          `idOeuvre` int(11) NOT NULL,
                          `libelle` varchar(70) NOT NULL,
                          `image` varchar(100) NOT NULL,
                          `note` double DEFAULT NULL,
                          `idTheme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `oeuvre`
--

INSERT INTO `oeuvre` (`idOeuvre`, `libelle`, `image`, `note`, `idTheme`) VALUES
(1, 'Star Wars : Le Retour du Jedi', 'Ressources\\Oeuvres\\Film\\Star_Wars_Le_Retour_du_Jedi.jpg', 9, 1),
(2, 'le Seigneur des Anneaux : Le retour du Roi', 'Ressources\\Oeuvres\\Film\\Le_Seigneur_des_Anneaux_Le_Retour_du_Roi.jpg', 10, 1),
(3, 'Batman Begins', 'Ressources\\Oeuvres\\Film\\Batman_Begins.jpg', NULL, 1),
(4, 'Star Wars : La Menace Fantôme', 'Ressources\\Oeuvres\\Film\\Star_Wars_La_Menace_Fantome.jpg', 8, 1),
(5, 'Star Wars : L Attaque des Clones', 'Ressources\\Oeuvres\\Film\\Star_Wars_LAttaque_des_Clones.jpg', 5, 1),
(6, 'Star Wars : La Revanche des Sith', 'Ressources\\Oeuvres\\Film\\Star_Wars_La_Revanche_des_Sith.jpg', NULL, 1),
(7, 'Star Wars : Un Nouvel Espoir', 'Ressources\\Oeuvres\\Film\\Star_Wars_Un_nouvel_espoir.jpg', NULL, 1),
(8, 'Star Wars : L\'Empire Contre Attaque', 'Ressources\\Oeuvres\\Film\\Star_Wars_LEmpire_Contre_Attaque.jpg', NULL, 1),
(9, 'Retour Vers Le Futur', 'Ressources\\Oeuvres\\Film\\Retour_vers_le_futur.jpg', NULL, 1),
(10, 'Harry Potter à l école des Sorciers', 'Ressources\\Oeuvres\\Film\\Harry_potter_à_lécole_des_sorciers.jpg', NULL, 1),
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
(24, 'Avengers : L Ère d\'Ultron', 'Ressources\\Oeuvres\\Film\\Avengers_Lere_dUltron.jpg', NULL, 1),
(25, 'Gone Girl', 'Ressources\\Oeuvres\\Film\\Gone_Girl.jpg', NULL, 1),
(26, 'Premier Contact', 'Ressources\\Oeuvres\\Film\\Premier_Contact.jpg', NULL, 1),
(27, 'Ad Astra', 'Ressources\\Oeuvres\\Film\\Ad_Astra.jpg', NULL, 1),
(28, 'The Help', 'Ressources\\Oeuvres\\Film\\The_Help.jpg', NULL, 1),
(29, 'Mario 64', 'Ressources\\Oeuvres\\Jeux\\Mario_64.jpg', 9, 3),
(30, 'The Legend of Zelda : Breath of the Wild', 'Ressources\\Oeuvres\\Jeux\\The_Legend_of_Zelda_Breath_of_the_Wild.jpg', NULL, 3),
(31, 'Grand Theft Auto V', 'Ressources\\Oeuvres\\Jeux\\Grand_Theft_Auto_V.jpg', 8, 3),
(32, 'Dark Souls', 'Ressources\\Oeuvres\\Jeux\\\r\nDark_Souls.jpg', 9, 3),
(33, 'Bloodborne', 'Ressources\\Oeuvres\\Jeux\\\r\nBloodborne.jpg', 10, 3),
(34, 'ARK Survival Evolved', 'Ressources\\Oeuvres\\Jeux\\\r\nARK_Survival_Evolved.png', 8, 3),
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
(51, 'Final Fantasy VII', 'Ressources\\Oeuvres\\Jeux\\Final_Fantasy_VII.png', 7.3333, 3),
(52, 'Metal Gear Solid', 'Ressources\\Oeuvres\\Jeux\\Metal_Gear_Solid.png', NULL, 3),
(53, 'Assasination Classroom', 'Ressources\\Oeuvres\\Anime\\assasination_classroom.jpg', NULL, 2),
(54, 'Attaque Des Titans', 'Ressources\\Oeuvres\\Anime\\attaque_on_titans.jpg', 9, 2),
(55, 'Black Clover', 'Ressources\\Oeuvres\\Anime\\black_clover.jpg', NULL, 2),
(56, 'Bleach', 'Ressources\\Oeuvres\\Anime\\Bleach.jpg', NULL, 2),
(57, 'Code Geass', 'Ressources\\Oeuvres\\Anime\\code_geass.jpg', NULL, 2),
(58, 'Death Note', 'Ressources\\Oeuvres\\Anime\\Death_Note.jpg', NULL, 2),
(59, 'Demon Slayer', 'Ressources\\Oeuvres\\Anime\\demon_slayer.jpg\r\n', NULL, 2),
(60, 'Dr Stone', 'Ressources\\Oeuvres\\Anime\\Dr_stone.jpg', NULL, 2),
(61, 'Dragon Ball Z', 'Ressources\\Oeuvres\\Anime\\dragon_ball_z.jpg', 7.6667, 2),
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
(73, 'One Piece', 'Ressources\\Oeuvres\\Anime\\one_piece.jpg', 8, 2),
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
(92, 'The Flash', 'Ressources\\Oeuvres\\Série\\The_Flash.jpg', NULL, 4),
(93, 'The Mandalorian', 'Ressources\\Oeuvres\\Série\\The_Mandalorian.jpg', NULL, 4),
(94, 'The OA', 'Ressources\\Oeuvres\\Série\\The_OA.jpg', NULL, 4),
(95, 'The Umbrella Academy', 'Ressources\\Oeuvres\\Série\\The_Umbrella_Academy.jpg', NULL, 4),
(96, 'The Walking Dead', 'Ressources\\Oeuvres\\Série\\The_Walking_Dead.jpg', NULL, 4),
(97, 'The Witcher', 'Ressources\\Oeuvres\\Série\\The_Witcher.jpg', NULL, 4),
(98, 'Vikings', 'Ressources\\Oeuvres\\Série\\Vikings.jpg', NULL, 4),
(99, 'You', 'Ressources\\Oeuvres\\Série\\You.jpg', NULL, 4),
(100, 'Re Zero', 'Ressources\\Oeuvres\\Anime\\re_zero.jpg', 1, 2),
(101, 'One Punch Man', 'Ressources\\Oeuvres\\Anime\\one_punch.jpg', NULL, 2),
(102, 'The Promised Neverland', 'Ressources\\Oeuvres\\Anime\\promised_neverland.jpg', NULL, 2),
(103, 'Chili con carne', 'Ressources/Oeuvres/Cuisine/chili_con_carne.jpg', NULL, 5),
(104, 'Couscous', 'Ressources/Oeuvres/Cuisine/couscous.jpg', 10, 5),
(105, 'Crepes', 'Ressources/Oeuvres/Cuisine/crepes.jpg', NULL, 5),
(106, 'Fraisier', 'Ressources/Oeuvres/Cuisine/fraisier.jpg', NULL, 5),
(107, 'Frites', 'Ressources/Oeuvres/Cuisine/frites.jpg', NULL, 5),
(108, 'Glace à litalienne', 'Ressources/Oeuvres/Cuisine/glace_italienne.jpg', NULL, 5),
(109, 'Gratin dauphinois', 'Ressources/Oeuvres/Cuisine/gratin_dauphinois.jpg', NULL, 5),
(110, 'Hamburger', 'Ressources/Oeuvres/Cuisine/hamburger.jpg', NULL, 5),
(111, 'Lasagnes', 'Ressources/Oeuvres/Cuisine/lasagnes.jpg', NULL, 5),
(112, 'Pates_carbonara', 'Ressources/Oeuvres/Cuisine/pates_carbonara.jpg', NULL, 5),
(113, 'Pizza', 'Ressources/Oeuvres/Cuisine/pizza.jfif', NULL, 5),
(114, 'Poulet rôti', 'Ressources/Oeuvres/Cuisine/poulet_roti.jpg', NULL, 5),
(115, 'Quiche lorraine', 'Ressources/Oeuvres/Cuisine/quiche_lorraine.jpg', NULL, 5),
(116, 'Raclette', 'Ressources/Oeuvres/Cuisine/raclette.jpg', NULL, 5),
(117, 'Ramen', 'Ressources/Oeuvres/Cuisine/ramen.jpg', NULL, 5),
(118, 'Riz thai', 'Ressources/Oeuvres/Cuisine/riz_thai.jpg', NULL, 5),
(119, 'Sandwich de la hess', 'Ressources/Oeuvres/Cuisine/sandwich_hess.jfif', NULL, 5),
(120, 'Chorba', 'Ressources/Oeuvres/Cuisine/soupe_chorba.jpg', NULL, 5),
(121, 'Spaghetti bolognaise', 'Ressources/Oeuvres/Cuisine/Spaghetti_Bolognaise.jpg', NULL, 5),
(122, 'Sushi', 'Ressources/Oeuvres/Cuisine/sushi.jpg', NULL, 5),
(123, 'Tacos', 'Ressources/Oeuvres/Cuisine/tacos.jpg', NULL, 5),
(124, 'Tajine', 'Ressources/Oeuvres/Cuisine/tajine.jpg', NULL, 5),
(125, 'Bruno Fernandes', 'Ressources/Oeuvres/Footballeurs/bruno_fernandes.jpg', NULL, 6),
(126, 'Cristiano Ronaldo', 'Ressources/Oeuvres/Footballeurs/cr7.jpg', NULL, 6),
(127, 'Diego Maradona', 'Ressources/Oeuvres/Footballeurs/Diego_Maradona.jpg', NULL, 6),
(128, 'Haaland', 'Ressources/Oeuvres/Footballeurs/haaland.jpg', NULL, 6),
(129, 'Joshua Kimmich', 'Ressources/Oeuvres/Footballeurs/joshua_kimmich.jpg', NULL, 6),
(130, 'Harry Kane', 'Ressources/Oeuvres/Footballeurs/harry_kane.jpg', NULL, 6),
(131, 'NGolo Kante', 'Ressources/Oeuvres/Footballeurs/kante.jpg', NULL, 6),
(132, 'Karim Benzema', 'Ressources/Oeuvres/Footballeurs/karim_benzema.jpg', NULL, 6),
(133, 'Kevin De Bruyne', 'Ressources/Oeuvres/Footballeurs/kevin_de_bruyne.jpg', NULL, 6),
(134, 'Lionel Messi', 'Ressources/Oeuvres/Footballeurs/lionel_messi.jpg', NULL, 6),
(135, 'Riyad Mahrez', 'Ressources/Oeuvres/Footballeurs/mahrez.jpg', NULL, 6),
(136, 'Marcus Rashford', 'Ressources/Oeuvres/Footballeurs/marcus_rashford.jpg', NULL, 6),
(137, 'Marquinhos', 'Ressources/Oeuvres/Footballeurs/marquinhos.jpg', NULL, 6),
(138, 'Killian Mbappe', 'Ressources/Oeuvres/Footballeurs/mbappe.jpg', NULL, 6),
(139, 'Keylor Navas', 'Ressources/Oeuvres/Footballeurs/navas.jpg', NULL, 6),
(140, 'Manuel Neuer', 'Ressources/Oeuvres/Footballeurs/neur.jpg', NULL, 6),
(141, 'Neymar.Jr', 'Ressources/Oeuvres/Footballeurs/neymar.jpg', NULL, 6),
(142, 'Pelé', 'Ressources/Oeuvres/Footballeurs/pelé.jpg', NULL, 6),
(143, 'Robert Lewandoski', 'Ressources/Oeuvres/Footballeurs/robert_lewandoski.jpg', NULL, 6),
(144, 'Ronaldinho Gaucho', 'Ressources/Oeuvres/Footballeurs/ronaldinho.jpg', NULL, 6),
(145, 'Ronaldo Nazario', 'Ressources/Oeuvres/Footballeurs/ronaldo_R9.jpg', 9, 6),
(146, 'Sadio Mane', 'Ressources/Oeuvres/Footballeurs/sadio_mane.jpg', NULL, 6),
(147, 'Mohammed Salah', 'Ressources/Oeuvres/Footballeurs/salah.jpg', NULL, 6),
(148, 'Sergio Ramos', 'Ressources/Oeuvres/Footballeurs/sergio_ramos.jpg', NULL, 6),
(149, 'Heug Min Son', 'Ressources/Oeuvres/Footballeurs/song_heung_min.jpg', NULL, 6),
(150, 'Thiago Alcantara', 'Ressources/Oeuvres/Footballeurs/thiago_alcantara.jpg', NULL, 6),
(151, 'Thiago Silva', 'Ressources/Oeuvres/Footballeurs/thiago_silva.jpg', NULL, 6),
(152, 'Thomas Muller', 'Ressources/Oeuvres/Footballeurs/thomas_muller.jpg', NULL, 6),
(153, 'Zinedine Zidane', 'Ressources/Oeuvres/Footballeurs/zidane.jpg', 10, 6),
(154, 'Zlatan Ibrahimovic', 'Ressources/Oeuvres/Footballeurs/zlatan_ibrahimovic.jpg', NULL, 6),
(155, 'Mesut Ozil', 'Ressources/Oeuvres/Footballeurs/mesut_ozil.jpg', NULL, 6);

-- --------------------------------------------------------

--
-- Table structure for table `signalement`
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
-- Dumping data for table `signalement`
--

INSERT INTO `signalement` (`idSignalement`, `typeSignalement`, `message`, `dateSignal`, `idUtilSignal`, `idUtilisateur`, `idOeuvre`, `idTop`) VALUES
(16, 'signalAvisTop', 'Signalement de l\'avis 54 écrit par mestari datant du 2021-01-24 sur le top numero 54.', '2021-01-24', 18, 18, NULL, 54);

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `idTheme` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`idTheme`, `nom`) VALUES
(1, 'Film'),
(2, 'Anime'),
(3, 'JeuxVideo'),
(4, 'Série'),
(5, 'Cuisine'),
(6, 'Football');

-- --------------------------------------------------------

--
-- Table structure for table `top`
--

CREATE TABLE `top` (
  `idTop` int(11) NOT NULL,
  `nomTop` varchar(50) NOT NULL,
  `idUtilisateur` int(11) NOT NULL,
  `idTheme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `top`
--

INSERT INTO `top` (`idTop`, `nomTop`, `idUtilisateur`, `idTheme`) VALUES
(36, 'Epoque de nos grand freres', 10, 1),
(39, 'top cuisine', 4, 5),
(40, 'Top meneur de jeu', 4, 6),
(41, 'test', 4, 1),
(42, 'Top série', 4, 4),
(43, 'The best', 15, 2),
(44, 'The real best !', 7, 2),
(47, 'top 57', 7, 1),
(49, 'Le sang', 17, 2),
(50, 'Naruto top', 17, 2),
(51, 'Top jeuuuu', 17, 3),
(52, 'Top jeux video', 7, 3),
(53, 'Top biaru', 16, 2),
(54, 'top test', 18, 2),
(55, 'best film ever', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
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
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `pseudo`, `mot_de_passe`, `date_creation`, `niveau`, `description`, `photo_de_profil`, `admin`) VALUES
(4, 'myahia', '$2y$10$rsFAiu7FzZUHHqjBLm9AxOJ/L/hymID6KxwLGHY5x/iG/zCnyLe9u', '2020-12-26', 1, 'Je m\'appelle Mohcine et je suis fan de jeux vidéo, de football et de ONE PIECE', NULL, 0),
(5, 'bkebir', '$2y$10$rN25/9E/hJ3Vin5YUvBsYeVEnGP6mlO8QA3LEFe4.Kv/9AfDLvR0C', '2020-12-27', 1, NULL, NULL, 0),
(6, 'astaluego', '$2y$10$VfPAihH5Nt6VnractWj7h./XfeaVEWqaZ5aP3R0ASeluwzwZ.pIU6', '2020-12-27', 1, NULL, NULL, 0),
(7, 'mestari', '$2y$10$pbmaR9ucelzx2lPS3o80ZeXc.abQMcdol2gBLZlzxaB/aKdW.7Et2', '2020-12-28', 1, NULL, NULL, 0),
(8, 'achurafO', '$2y$10$la0BS/VL13i86pIiHAPAO.q8nq3cuC6LJSPlRzTuXeSXoeO9Hs4y2', '2020-12-28', 1, NULL, NULL, 0),
(9, 'eichiro', '$2y$10$QZ2qZ1zj4LeiKfUR6kEQrOgi8r3KMQ8QJE9ss2kAtgJrCGfEA3PkG', '2021-01-01', 1, NULL, NULL, 0),
(10, 'adminTest1', '$2y$10$KvAnWOEOSOTGmfhRVpqGrOkFo8QfCnRN9KH6fIHHn3t0oZj5KtvIS', '2021-01-14', 1, NULL, NULL, 1),
(11, 'testInscription', '$2y$10$huPmxtc0iaD4/OVcQ129oOkX4OuodCLgGec44kQI6N0k9E2TQLXVO', '2021-01-16', 1, NULL, NULL, 0),
(12, 'utilisateur33', '$2y$10$QHFq0h/CNg7KOjH1XQowzuSbJBRdBAdvK2OOYIWMOla8qksDqwSua', '2021-01-17', 1, NULL, NULL, 0),
(13, 'utilisateur44', '$2y$10$pdmfrpacccwM12ugjfxd.eYS7ptyQ/i9JuoxrJVSdpx5EXXAMWiya', '2021-01-17', 1, NULL, NULL, 0),
(14, 'myahia02', '$2y$10$Y5WSrlTa9Crnv3M7fE/4C.fPeR.quWlw/DkPf0lsqhBgZVYdToEzO', '2021-01-24', 1, NULL, NULL, 0),
(15, 'Bilal93200', '$2y$10$z5ildNcAqwLGfeQAVbbOe.bfjw4ZtharkYWXx2BMI.LfQF6ozyVqu', '2021-01-24', 1, NULL, NULL, 0),
(16, 'Biaru93', '$2y$10$vPH4x/G8chGDSAwqbazs1OQACkhQtzVvmY9LLxoPeo8GVI1GRhjW2', '2021-01-24', 1, NULL, NULL, 0),
(17, 'Naruto93200', '$2y$10$LMvUwaL5kpXCHEVdLqMuZOgehYNCYRNv3fu201FbnC4NazCFKIWGC', '2021-01-24', 1, NULL, NULL, 0),
(18, 'testeur', '$2y$10$LJixa0dgmv325XxIfF1SXu8CODcjerVBYjkyFcN47aZ137lptpyAW', '2021-01-24', 1, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateursimple`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `administrateur`
--
ALTER TABLE `administrateur`
    ADD PRIMARY KEY (`idUtilisateur`);

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
    ADD PRIMARY KEY (`idAvis`),
  ADD KEY `Avis_Utilisateur_FK` (`idUtilisateur`);

--
-- Indexes for table `avisoeuvre`
--
ALTER TABLE `avisoeuvre`
    ADD PRIMARY KEY (`idAvis`),
  ADD KEY `AvisOeuvre_Oeuvre0_FK` (`idOeuvre`),
  ADD KEY `AvisOeuvre_Utilisateur1_FK` (`idUtilisateur`);

--
-- Indexes for table `avistop`
--
ALTER TABLE `avistop`
    ADD PRIMARY KEY (`idAvis`),
  ADD KEY `AvisTop_Top0_FK` (`idTop`),
  ADD KEY `AvisTop_Utilisateur1_FK` (`idUtilisateur`);

--
-- Indexes for table `composer`
--
ALTER TABLE `composer`
    ADD PRIMARY KEY (`idTop_composer`,`idOeuvre_composer`),
  ADD KEY `composer_Oeuvre0_FK` (`idOeuvre_composer`);

--
-- Indexes for table `oeuvre`
--
ALTER TABLE `oeuvre`
    ADD PRIMARY KEY (`idOeuvre`),
  ADD KEY `Oeuvre_Theme_FK` (`idTheme`);

--
-- Indexes for table `signalement`
--
ALTER TABLE `signalement`
    ADD PRIMARY KEY (`idSignalement`),
  ADD KEY `Signalement_Utilisateur_FK` (`idUtilisateur`),
  ADD KEY `idOeuvre` (`idOeuvre`),
  ADD KEY `idTop` (`idTop`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
    ADD PRIMARY KEY (`idTheme`);

--
-- Indexes for table `top`
--
ALTER TABLE `top`
    ADD PRIMARY KEY (`idTop`),
  ADD KEY `Top_Utilisateur_FK` (`idUtilisateur`),
  ADD KEY `Top_Theme0_FK` (`idTheme`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
    ADD PRIMARY KEY (`idUtilisateur`);

--
-- Indexes for table `utilisateursimple`
--
ALTER TABLE `utilisateursimple`
    ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
    MODIFY `idAvis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `oeuvre`
--
ALTER TABLE `oeuvre`
    MODIFY `idOeuvre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `signalement`
--
ALTER TABLE `signalement`
    MODIFY `idSignalement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
    MODIFY `idTheme` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `top`
--
ALTER TABLE `top`
    MODIFY `idTop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
    MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrateur`
--
ALTER TABLE `administrateur`
    ADD CONSTRAINT `Administrateur_Utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
    ADD CONSTRAINT `Avis_Utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Constraints for table `avisoeuvre`
--
ALTER TABLE `avisoeuvre`
    ADD CONSTRAINT `AvisOeuvre_Avis_FK` FOREIGN KEY (`idAvis`) REFERENCES `avis` (`idAvis`),
  ADD CONSTRAINT `AvisOeuvre_Oeuvre0_FK` FOREIGN KEY (`idOeuvre`) REFERENCES `oeuvre` (`idOeuvre`),
  ADD CONSTRAINT `AvisOeuvre_Utilisateur1_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Constraints for table `avistop`
--
ALTER TABLE `avistop`
    ADD CONSTRAINT `AvisTop_Avis_FK` FOREIGN KEY (`idAvis`) REFERENCES `avis` (`idAvis`),
  ADD CONSTRAINT `AvisTop_Top0_FK` FOREIGN KEY (`idTop`) REFERENCES `top` (`idTop`),
  ADD CONSTRAINT `AvisTop_Utilisateur1_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Constraints for table `composer`
--
ALTER TABLE `composer`
    ADD CONSTRAINT `composer_Oeuvre0_FK` FOREIGN KEY (`idOeuvre_composer`) REFERENCES `oeuvre` (`idOeuvre`),
  ADD CONSTRAINT `composer_Top_FK` FOREIGN KEY (`idTop_composer`) REFERENCES `top` (`idTop`);

--
-- Constraints for table `oeuvre`
--
ALTER TABLE `oeuvre`
    ADD CONSTRAINT `Oeuvre_Theme_FK` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`idTheme`);

--
-- Constraints for table `signalement`
--
ALTER TABLE `signalement`
    ADD CONSTRAINT `Signalement_Utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Constraints for table `top`
--
ALTER TABLE `top`
    ADD CONSTRAINT `Top_Theme0_FK` FOREIGN KEY (`idTheme`) REFERENCES `theme` (`idTheme`),
  ADD CONSTRAINT `Top_Utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);

--
-- Constraints for table `utilisateursimple`
--
ALTER TABLE `utilisateursimple`
    ADD CONSTRAINT `UtilisateurSimple_Utilisateur_FK` FOREIGN KEY (`idUtilisateur`) REFERENCES `utilisateur` (`idUtilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
