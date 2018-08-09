-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 09 août 2018 à 11:14
-- Version du serveur :  5.7.21
-- Version de PHP :  5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site-photo`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`id`, `libelle`) VALUES
(6, 'Nature'),
(3, 'Paysages Urbains'),
(5, 'Animaux');

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

DROP TABLE IF EXISTS `photo`;
CREATE TABLE IF NOT EXISTS `photo` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(30) NOT NULL,
  `description` varchar(50) NOT NULL,
  `src` varchar(50) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idCategorie` int(6) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idCategorie` (`idCategorie`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`id`, `nom`, `description`, `src`, `reg_date`, `idCategorie`) VALUES
(31, 'La gourmande', 'Chat se léchant les babines', 'Animaux_photo 3.jpg', '2018-08-09 09:29:45', 5),
(30, 'Tour eiffel', 'tour eiffel vue du bas ', 'Paysages Urbains_photo 1.jpg', '2018-08-09 09:28:10', 3),
(26, 'Bord de l\'eau', 'Au bord du lac d\'aigubellette', 'Nature_photo 4.JPG', '2018-08-09 09:25:49', 6),
(27, 'Chemin enneigé', 'Chemin enneigé', 'Nature_photo 3.jpg', '2018-08-09 09:26:31', 6),
(28, 'Contre jour', 'Toit et végétation en contre jour', 'Nature_photo 6.JPG', '2018-08-09 09:27:08', 6),
(29, 'Ruelle', 'ruelle sombre en noir et blanc', 'Paysages Urbains_photo 6.JPG', '2018-08-09 09:27:49', 3),
(24, 'Couché de soleil', 'Vol d\'oiseau au soleil couchant', 'Nature_photo 1.JPG', '2018-08-09 09:22:46', 6),
(25, 'Chalet enneigé', 'Chalet derrière un arbre enneigé ', 'Nature_photo 2.jpg', '2018-08-09 09:24:28', 6),
(32, 'Ténébreux', 'Portrait d\'un chat ', 'Animaux_photo 6.jpg', '2018-08-09 09:30:33', 5);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `prenom` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `prenom`, `email`, `password`, `reg_date`) VALUES
(3, 'admin', 'admin@admin.fr', '$2y$10$Yo8zEz2m0cMyTVEonH1KPO1YLdVx4DX0oC/1w0jDpVY0F80HX3Kn2', '2018-08-08 09:12:30'),
(4, 'Marine', 'test@test.fr', '$2y$10$b5wLzCwfgKttTGs6qiZSruoPCyCCNaTil5RW.Doe8wijI9wLkXsxe', '2018-08-08 17:36:18');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
