-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 13 fév. 2020 à 16:52
-- Version du serveur :  5.7.24
-- Version de PHP :  7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `meteo`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `comment_date` datetime NOT NULL,
  `is_signaled` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `identifiant`
--

DROP TABLE IF EXISTS `identifiant`;
CREATE TABLE IF NOT EXISTS `identifiant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `identifiant` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `favori1` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favori2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favori3` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favori4` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `favori5` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=89 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `identifiant`
--

INSERT INTO `identifiant` (`id`, `lastname`, `firstname`, `identifiant`, `password`, `mail`, `is_admin`, `favori1`, `favori2`, `favori3`, `favori4`, `favori5`) VALUES
(66, NULL, NULL, NULL, 'admin', 'admin@poe.fr', 0, NULL, NULL, NULL, NULL, NULL),
(63, NULL, NULL, NULL, 'salut', 'aaa@gsm.com', 0, NULL, NULL, NULL, NULL, NULL),
(62, NULL, NULL, NULL, 'salut', 'aaa@gom.com', 0, NULL, NULL, NULL, NULL, NULL),
(84, NULL, NULL, NULL, '$2y$10$MFot6FYgy9.oLAQfOyvC2.3BHbxhYUio4gE59oMKa2QaS4OAHvQfS', 'ad@ad.com', 1, 'Boulogne-Billancourt', 'Le Palais', 'Canejan', 'Recanati', 'Auray'),
(83, NULL, NULL, NULL, '$2y$10$9joK6HqgMSgOdFdTZHEWEekLpcUP.ciwgyBqcnkWAasbzjxRLrGYu', 'adadadaadd@ad.com', 0, NULL, NULL, NULL, NULL, NULL),
(85, NULL, NULL, NULL, '$2y$10$6F5ou5M4W/i6oO6m5euZJeTP8DYxnedI4UMOpLnS2.mhOQiLSg5p6', 'adadad@ad.com', 0, 'Gap', 'Canejan', NULL, NULL, NULL),
(86, NULL, NULL, NULL, '$2y$10$uh4hffi27p9l.uTFSSIrH.C51M1dLiahUNGlnXuk5G3yBGMGiN7cW', 'ared@ad.com', 0, NULL, NULL, NULL, NULL, NULL),
(87, NULL, NULL, NULL, '$2y$10$JAWKlFEWyTfjdql4ktMyS.tVHEnTFUZ1INroF9tu1qG906.b8o5h.', 'aaddddd@ad.com', 0, NULL, NULL, NULL, NULL, NULL),
(88, NULL, NULL, NULL, '$2y$10$7iTajfVPYnHfMZ2EgR5Mi.6SZJZsbxqDyddr2FRj7UWUxnfh6deoK', 'adaaaad@ad.com', 0, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title_news` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content_news` text COLLATE utf8_unicode_ci NOT NULL,
  `creation_date_news` datetime NOT NULL,
  `img_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `news`
--

INSERT INTO `news` (`id`, `title_news`, `content_news`, `creation_date_news`, `img_url`) VALUES
(3, 'deuxième news ! mais avant ...', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pellentesque, mauris ut ornare suscipit, ligula purus ultrices ipsum, eu egestas mauris orci et nisi. Duis vitae feugiat mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer vitae eros in odio bibendum pharetra. Aliquam luctus sem sed odio imperdiet, eu rhoncus tortor hendrerit. Donec hendrerit, ante in congue fringilla, est odio interdum lacus, convallis facilisis leo nisl nec ligula. In tempus nisi ac lacus gravida, ac tincidunt magna efficitur. Suspendisse at leo congue, laoreet nulla sed, congue tortor. Donec pulvinar euismod ex, sit amet suscipit purus fermentum semper. Nulla ut viverra odio.\r\n\r\nPellentesque pulvinar tempor finibus. Mauris volutpat eu magna at facilisis. Etiam ligula leo, pulvinar eget urna non, interdum hendrerit tortor. Vivamus vel erat pretium dui consequat ullamcorper sollicitudin sed mi. Curabitur dignissim ultricies magna quis ultricies. Phasellus eget orci bibendum, facilisis erat et, consequat tellus. Phasellus consequat dui at diam fringilla porta. Vivamus suscipit lectus lectus, in congue tortor fermentum eleifend. Nullam posuere iaculis libero, vitae rhoncus mauris interdum quis. Aliquam commodo, sapien quis blandit volutpat, ipsum quam scelerisque libero, et euismod est dui ac ante. Nam ac gravida ipsum. Vivamus odio est, dapibus ut gravida eu, varius ac justo.\r\n\r\nSed iaculis felis at metus condimentum, quis euismod elit placerat. Cras a diam ante. Aliquam erat volutpat. Morbi felis ex, dignissim at dictum eget, luctus ut nunc. Donec ullamcorper iaculis augue, vitae scelerisque tellus bibendum sed. Fusce vulputate nunc sit amet ligula aliquam fermentum. Aenean dignissim sem est, sed condimentum purus consectetur vel. Cras est quam, varius non molestie in, laoreet vitae sapien. Aliquam eu erat massa. Proin dictum lacinia elementum. Duis et augue nec lacus blandit consequat ac vitae sapien. Vivamus commodo tellus ac nibh rutrum blandit. Maecenas a pharetra orci. Vestibulum porttitor consectetur erat.\r\n\r\nEtiam consectetur mauris ac lorem aliquet, quis posuere ante convallis. Nunc ultricies ante at ornare suscipit. Nunc imperdiet commodo venenatis. Donec non eleifend purus. Nunc aliquam leo sit amet tortor dignissim vulputate. Phasellus vitae aliquam tellus, at interdum sem. Duis accumsan, nibh in pulvinar tincidunt, arcu purus cursus urna, non convallis urna justo at eros. Donec sodales felis semper, luctus nunc quis, faucibus neque. In laoreet, libero scelerisque faucibus imperdiet, ipsum diam convallis lectus, id elementum enim ante eget risus.\r\n\r\nSed iaculis turpis eget faucibus porttitor. Sed arcu dolor, rutrum vel porttitor eget, cursus id sem. Nullam elementum ac turpis efficitur condimentum. Fusce urna neque, feugiat at ante in, auctor bibendum orci. Duis nec justo at est fermentum efficitur. Quisque a ante sed turpis scelerisque interdum. Sed lobortis accumsan lorem, eu sollicitudin metus. Aenean sed dapibus velit. Praesent enim tortor, feugiat eget elit vitae, finibus vehicula sem. Sed purus nibh, rhoncus id metus non, hendrerit dictum velit. Fusce in eleifend nulla. Etiam et elit vitae sapien commodo mattis. Sed sit amet ante mauris. ', '2020-02-12 00:00:00', NULL),
(4, 'troisième new mais après...', '\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pellentesque, mauris ut ornare suscipit, ligula purus ultrices ipsum, eu egestas mauris orci et nisi. Duis vitae feugiat mauris. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Integer vitae eros in odio bibendum pharetra. Aliquam luctus sem sed odio imperdiet, eu rhoncus tortor hendrerit. Donec hendrerit, ante in congue fringilla, est odio interdum lacus, convallis facilisis leo nisl nec ligula. In tempus nisi ac lacus gravida, ac tincidunt magna efficitur. Suspendisse at leo congue, laoreet nulla sed, congue tortor. Donec pulvinar euismod ex, sit amet suscipit purus fermentum semper. Nulla ut viverra odio.\r\n\r\nPellentesque pulvinar tempor finibus. Mauris volutpat eu magna at facilisis. Etiam ligula leo, pulvinar eget urna non, interdum hendrerit tortor. Vivamus vel erat pretium dui consequat ullamcorper sollicitudin sed mi. Curabitur dignissim ultricies magna quis ultricies. Phasellus eget orci bibendum, facilisis erat et, consequat tellus. Phasellus consequat dui at diam fringilla porta. Vivamus suscipit lectus lectus, in congue tortor fermentum eleifend. Nullam posuere iaculis libero, vitae rhoncus mauris interdum quis. Aliquam commodo, sapien quis blandit volutpat, ipsum quam scelerisque libero, et euismod est dui ac ante. Nam ac gravida ipsum. Vivamus odio est, dapibus ut gravida eu, varius ac justo.\r\n\r\nSed iaculis felis at metus condimentum, quis euismod elit placerat. Cras a diam ante. Aliquam erat volutpat. Morbi felis ex, dignissim at dictum eget, luctus ut nunc. Donec ullamcorper iaculis augue, vitae scelerisque tellus bibendum sed. Fusce vulputate nunc sit amet ligula aliquam fermentum. Aenean dignissim sem est, sed condimentum purus consectetur vel. Cras est quam, varius non molestie in, laoreet vitae sapien. Aliquam eu erat massa. Proin dictum lacinia elementum. Duis et augue nec lacus blandit consequat ac vitae sapien. Vivamus commodo tellus ac nibh rutrum blandit. Maecenas a pharetra orci. Vestibulum porttitor consectetur erat.\r\n\r\nEtiam consectetur mauris ac lorem aliquet, quis posuere ante convallis. Nunc ultricies ante at ornare suscipit. Nunc imperdiet commodo venenatis. Donec non eleifend purus. Nunc aliquam leo sit amet tortor dignissim vulputate. Phasellus vitae aliquam tellus, at interdum sem. Duis accumsan, nibh in pulvinar tincidunt, arcu purus cursus urna, non convallis urna justo at eros. Donec sodales felis semper, luctus nunc quis, faucibus neque. In laoreet, libero scelerisque faucibus imperdiet, ipsum diam convallis lectus, id elementum enim ante eget risus.\r\n\r\nSed iaculis turpis eget faucibus porttitor. Sed arcu dolor, rutrum vel porttitor eget, cursus id sem. Nullam elementum ac turpis efficitur condimentum. Fusce urna neque, feugiat at ante in, auctor bibendum orci. Duis nec justo at est fermentum efficitur. Quisque a ante sed turpis scelerisque interdum. Sed lobortis accumsan lorem, eu sollicitudin metus. Aenean sed dapibus velit. Praesent enim tortor, feugiat eget elit vitae, finibus vehicula sem. Sed purus nibh, rhoncus id metus non, hendrerit dictum velit. Fusce in eleifend nulla. Etiam et elit vitae sapien commodo mattis. Sed sit amet ante mauris. ', '2020-02-13 14:00:00', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
