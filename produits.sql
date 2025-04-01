-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 28 sep. 2024 à 12:35
-- Version du serveur :  5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `produits`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `description`) VALUES
(1, 'Informatique', 'UC, PC, accessoires'),
(2, 'Electromenager', 'Appareils électroménagers'),
(3, 'Cuisine', 'Ustencils'),
(4, 'Mode', 'Chaussures et vetements ,etc'),
(5, 'Sport', 'Tenues de sport,accessoires'),
(6, 'Beaute', 'Skincare, parfum,etc');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `prix` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `categorie_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `categorie_id` (`categorie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `description`, `prix`, `image`, `categorie_id`) VALUES
(1, 'Smartphone', 'ANDROID 10 ', '50.00', 'images/informatique/informatique3.jpg', 1),
(2, 'Clavier et Souris', 'Clavier simple ,\r\nSouris sans fil', '30.00', 'images/informatique/informatique2.jpg', 1),
(3, 'Portable computer', 'Processeur Intel i7 de 11e generation, \r\nCarte graphique NVIDIA GeForce RTX 3060, \r\n16 Go de RAM et un SSD de 1 To\r\n', '100.99', 'images/informatique/informatique6.jpg', 1),
(4, 'Portable computer', 'Ecran de 14 pouces, processeur AMD Ryzen 5 et 12 Go de RAM, autonomie de 12 heures.', '70.00', 'images/informatique/informatique7.jpg', 1),
(5, 'IPhone', 'IPhone 13 PRO MAX', '200.99', 'images/informatique/informatique5.jpg', 1),
(6, 'Smartphone', 'HIGH QUALITY VECTOR EPS10', '95.99', 'images/informatique/informatique9.jpg', 1),
(7, 'DISQUE DUR', 'Disque Dur interne 1 To', '110.00', 'images/informatique/informatique4.jpg', 1),
(8, 'Casque', 'Casque hight quality', '40.99', 'images/informatique/informatique8.jpg', 1),
(9, 'Four electrique', 'Moulinex Four electrique 39 L', '129.99', 'images/electronique/electronique1.jpg', 2),
(10, 'Rice cooker', 'Cuisseur a riz electrique 2L ', '60.95', 'images/electronique/electronique2.jpg', 2),
(11, 'Bouilloire electrique', 'Philips Bouilloire electrique - 1.7 L, Couvercle a Ressort et Voyant Lumineux', '28.67', 'images/electronique/electronique3.jpg', 2),
(12, 'Ventilateur', 'Bestron Ventilateur sur pied avec trois niveaux de vitesse', '32.00', 'images/electronique/electronique4.jpg', 2),
(18, 'Pinceaux maquillage', '9 PCS Set Pinceaux synthetiques haut de gamme', '23.84', 'images/beaute/beaute1.jpg', 6),
(13, 'Machine a laver', 'Candy Smart CS 1482DE-S Machine a laver 8 kg, 1400 tr/min', '32.00', 'images/electronique/electronique5.jpg', 2),
(14, 'Refrigerateur', 'Gaz refrigerant : R290', '1535.00', 'images/electronique/electronique6.jpg', 2),
(15, 'Fouet & Rouleau', 'Rouleau a pate et fouet', '4.80', 'images/cuisine/cuisine1.jpg', 3),
(16, 'Couteau de cuisine', '5 Pieces', '3.50', 'images/cuisine/cuisine2.jpg', 3),
(17, 'Poele', 'Set de 3 poele a frire, a steak', '39.85', 'images/cuisine/cuisine3.jpg', 3),
(19, 'Eau de rose', 'Eau de rose parfume (24h) ', '50.00', 'images/beaute/beaute6.jpg', 6),
(20, 'Brand cosmetique', 'Shampooing,masque,serum et creme hydratant', '120.35', 'images/beaute/beaute7.jpg', 6),
(21, 'Parfum', '48h, orchidees et jasmine', '40.50', 'images/beaute/beaute3.jpg', 6),
(22, 'Ballon de volley', 'Ballon de beach volley soft touch ', '19.94', 'images/sport/sport1.jpg', 5),
(23, 'Genouillere', '20mm, eponge epaisse,confortable ', '39.00', 'images/sport/sport8.jpg', 5),
(24, 'Corde a sauter et Haltere', 'Corde a sauter de 2m50 et halter de 2kg', '15.00', 'images/sport/sport4.jpg', 5),
(25, 'Tenue de sport', 'Homme 3 Pièces tenue de sport:t-shit,short et tennis', '80.00', 'images/sport/sport2.jpg', 5),
(26, 'Tenue de sport femme', 'Femme 3 Pièces tenue de sport', '75.00', 'images/sport/sport9.jpg', 5),
(27, 'Tennis de sport', 'Tennis blanc tres legere', '120.35', 'images/sport/sport3.jpg', 5),
(28, 'Escarpin ', 'Escarpin rouge vif 12cm', '200.00', 'images/mode/mode1.jpg', 4),
(29, 'Clarks Homme', 'Simili-cuir, black leather', '74.00', 'images/mode/mode2.jpg', 4),
(30, 'Tennis enfant', 'Mini converse violet', '50.00', 'images/mode/mode4.jpg', 4),
(31, 'Chemise homme', 'Chemise en bleu,cotton ', '70.00', 'images/mode/mode6.jpg', 4),
(32, 'Montre femme', 'Montre dore ', '150.00', 'images/mode/mode16.jpg', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
