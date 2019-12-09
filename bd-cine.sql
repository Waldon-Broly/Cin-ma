-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1.lucid~ppa.2
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Dim 07 Septembre 2014 à 18:55
-- Version du serveur: 5.1.47-1~bpo50+1
-- Version de PHP: 5.2.6-1+lenny16

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bd-cine`
--

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Structure de la table `cinema`
--

CREATE TABLE IF NOT EXISTS `CINEMAS` (
  `idcine` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `nomcine` varchar(100) NOT NULL,
  `adresse` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`idcine`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=46 ;

--
-- Contenu de la table `cinema`
--

INSERT INTO `CINEMAS` (`idcine`, `nomcine`, `adresse`) VALUES
(1, 'Cinémathèque - CCC de Grenoble ', 'Place Saint-André 38000 Grenoble'),
(2, 'Le Méliès - Grenoble', '28 allée Henri Frenay 38000 Grenoble'),
(3, 'Pathé Grenoble - Chavant', '21 bd Marechal Lyautey 38000 Grenoble'),
(4, 'La Nef', '18, bd Edouard Rey 38000 Grenoble'),
(5, 'Le Club', '9bis, rue du Phalanstere 38000 Grenoble'),
(6, 'Amphi', ' 8/10, rue Rochebrun 38200 Vienne'),
(7, 'Art et Plaisirs', 'Place Armand Pugnot 38340 Voreppe'),
(8, 'Association Culturelle et Loisirs Cinéma Le Montcelet', '134 Avenue du Montcelet 38380 Entre-deux-Guiers'),
(9, 'Bel''Donne', 'Place de Verdun 38580 Allevard'),
(10, 'Ciné7', 'Centre 7, Niveau 0, Prapoutel / Les 7 Laux 38190 Les Adrets'),
(11, 'cinebus Saint-Pierre-de-Chartreuse', 'Place de la Mairie 38380 Saint-Pierre-de-Chartreuse'),
(12, 'Cinéma Emilien Joly', 'Avenue de la Gare 38520 Le Bourg-d''Oisans'),
(13, 'Cinéma Equinoxe', ' 9, rue Pasteur 38110 La Tour-du-Pin'),
(14, 'Cinéma Fellini', 'Rue Serge Mauroit 38090 Villefontaine'),
(15, 'Cinéma Le Palais', 'Avenue de Brandes, Palais des sports 38750 L''Alpe-d''Huez '),
(16, 'Cinéma Le Scialet', 'Les Dolomites 38650 Gresse-en-Vercors'),
(17, 'Cinéma Le Signal', 'Route de Huez 38750 L''Alpe-d''Huez'),
(18, 'Cinéma l''Oron', '2 avenue Villaz 38270 Beaurepaire'),
(19, 'Club', ' 22, rue Tourtain 38260 La Côte-Saint-André'),
(20, 'Espace Aragon', '19 bis, boulevard Jules Ferry 38190 Villard-Bonnot'),
(21, 'Jean Renoir', 'Avenue de la gare 38530 Pontcharra'),
(22, 'Jeu de Paume', 'Square de la Révolution 38220 Vizille'),
(23, 'La Mure Cinéma Théâtre', 'Place du théâtre 38350 La Mure'),
(24, 'La Vence Scène', '1 avenue Général de Gaulle 38120 Saint-Égrève'),
(25, 'Le Cartus', '38380 Saint-Laurent-du-Pont'),
(26, 'Le Clos', '38880 Autrans'),
(27, 'Le Diamant', 'rue Alexandre Dumas 38480 Le Pont-de-Beauvoisin'),
(28, 'Le Laussy', 'Parc Michal (quartier mairie) 38610 Gières'),
(29, 'Le Rex', 'rue du Lycée Polonais 38250 Villard-de-Lans'),
(30, 'Le Saint Jean', '24, rue Jeanne d''Arc 38440 Saint-Jean-de-Bournay'),
(31, 'Le Schuss', 'Avenue du père Tasse 38410 Chamrousse'),
(32, 'Le Slalom', 'rue de la glisse 38860 Les Deux Alpes'),
(33, 'Les Mélies', '20 bld Riondel 38160 Saint-Marcellin'),
(34, 'MégaRoyal', 'Place Jean Jacques Rousseau 38300 Bourgoin-Jallieu'),
(35, 'Mon Ciné', '10, av. Ambroise-Croizat 38400 Saint-Martin-d''Hères'),
(36, 'Paradiso', '3 rue Pasteur 38210 Tullins'),
(37, 'PASSrL Le Mail', 'rue du Mail et rue des Fabriques 38500 Voiron'),
(38, 'PASSrL Les Ecrans', 'rue Georges Clémenceau 38500 Voiron'),
(39, 'Pathé Echirolles', '9, av. du 8 Mai 1945 38130 Échirolles'),
(40, 'Rex', '6, avenue Jules Ferry 38550 Le Péage-de-Roussillon'),
(41, 'Val 1 et 2', '73150 Val-d''Isère'),
(42, 'Variétés', '24, rue de la République 38230 Pont-de-Chéruy');

-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
