-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 17 Juin 2015 à 09:21
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `symfony`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `auteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` datetime NOT NULL,
  `publication` tinyint(1) NOT NULL,
  `image_id` int(11) DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_23A0E66FF7747B4` (`titre`),
  UNIQUE KEY `UNIQ_23A0E66989D9B62` (`slug`),
  UNIQUE KEY `UNIQ_23A0E663DA5256D` (`image_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Contenu de la table `article`
--

INSERT INTO `article` (`id`, `titre`, `contenu`, `auteur`, `datecreation`, `publication`, `image_id`, `slug`) VALUES
(8, 'Magic! music', 'Magic! (stylized as MAGIC!) is a Canadian reggae fusion band, composed of songwriter and record producer Nasri, Mark Pellizzer, Alex Tanas and Ben Spivak.', 'Wam2', '2015-06-11 11:30:00', 1, 3, 'magic-music'),
(9, 'Météo France', 'Prévisions météo officielles et gratuites de Météo-France pour toutes les villes de France, l''outre mer, le monde, les plages, la montagne et la mer.', 'Grenouille', '2015-06-11 00:00:00', 1, NULL, 'meteo-france'),
(10, 'Google Ads', 'Want more online customers? Sign up to Google AdWords today and be discovered whenever people search the web for the things you sell. And only pay when they click or call.', 'Google', '2015-06-08 07:43:00', 1, 4, 'google-ads'),
(12, 'Francis Cabrel', 'Francis Cabrel is a French singer-songwriter and guitarist. He has released a number of albums falling mostly within the realm of folk, with occasional forays into blues or country.\r\n\r\nFrancis Cabrel (born 23 November 1953 in Astaffort, France) is a French singer-songwriter and guitarist. He has released a number of albums falling mostly within the realm of folk, with occasional forays into blues or country. Several of his songs, such as "L''encre de tes yeux," "Petite Marie," and "La corrida," have become enduring favorites in French music.\r\n\r\nHis first hit song was "Petite Marie,", in 1974; since then he has sold 21 million albums. The song was about the woman who soon became his wife, Mariette, with whom he was still married in 2015.\r\n\r\nAn unauthorized biography published in 2015. Cabrel, who is one of the most private French singers, attempted to have the book suppressed.', 'Francis C.', '2015-06-17 10:32:00', 1, 2, 'francis-cabrel'),
(14, 'Et mon orchestre...?', 'Marcel et son Orchestre est un groupe français de ska et chansons festives, originaire de Boulogne-sur-Mer dans le Pas-de-Calais.\r\n\r\nMarcel et son Orchestre mêle un punk rock aux mélodies entrainantes jouées au trombone, à la trompette et au saxophone (Tof et Tibal) ce qui rajoute des effets techniques et festifs.\r\n\r\nAlliant des chansons revendicatives (Si ça rapporte, Ramdam réclame…), des chansons à textes festifs (Ma sœur, La grosse madame), voire des chansons politiques, en soutien à Metaleurop notamment (Bad Trip Poker), leur volonté artistique s''exprime dans le triptyque « danse, déconne et dénonce ». À ce titre, le groupe n''hésite pas à s''engager lors de concerts de soutien (notamment lors d''un concert à Liévin en soutien aux salariés de l''usine Metaleurop).\r\n\r\nLes paroles racontent leurs escapades dans le nord de la France (62 Méfie-te), en hommage à leur région d''origine ou encore leur mépris pour les formules du type « y''a qu''à… » ou « faut qu''on… » (Arrête ton crin-crin).\r\n\r\nMarcel est devenu en quelques années un des ambassadeurs marquants de la région Nord-Pas-de-Calais.\r\n\r\nLe 23 novembre 2011, Mouloud annonce la séparation du groupe pour 2012 après une tournée d''adieu. Leur dernier concert a eu lieu le 15 décembre 2012 à Lille.', 'Marcel', '2015-06-16 04:17:00', 1, 6, 'et-mon-orchestre'),
(20, 'Symfony is a set of reusable PHP components... and a PHP framework for web projects', 'Symfony is a set of PHP Components, a Web Application framework, a Philosophy, and a Community — all working together in harmony.\r\n\r\n\r\nLa grande classe quoi.', 'Big Brother', '2015-06-16 13:19:00', 0, NULL, 'symfony-is-a-set-of-reusable-php-components-and-a-php-framework-for-web-projects'),
(22, 'Battle of the Coral Sea', 'May 4th-8th, 1942, the Imperial Japanese Navy plans to engage the U.S. Navy aircraft carries, but this time the U.S. and its allied forces are ready creating of the first naval battles in history. The Battle of the Coral Sea, fought during 4–8 May 1942, was a major naval battle in the Pacific Theater of World War II between the Imperial Japanese Navy and naval and air forces from the United States and Australia. The battle was the first action in which aircraft carriers engaged each other, as well as the first in which neither side''s ships sighted or fired directly upon the other. In an attempt to strengthen their defensive positioning for their empire in the South Pacific, Japanese forces decided to invade and occupy Port Moresby in New Guinea and Tulagi in the southeastern Solomon Islands. The plan to accomplish this, called Operation MO, involved several major units of Japan''s Combined Fleet, including two fleet carriers and a light carrier to provide air cover for the invasion fleets, under the overall command of Japanese Admiral Shigeyoshi Inoue. The US learned of the Japanese plan through signals intelligence and sent two United States Navy carrier task forces and a joint Australian-American cruiser force, under the overall command of American Admiral Frank J. Fletcher, to oppose the Japanese offensive. On 3–4 May, Japanese forces successfully invaded and occupied Tulagi, although several of their supporting warships were surprised and sunk or damaged by aircraft from the US fleet carrier Yorktown. Now aware of the presence of US carriers in the area, the Japanese fleet carriers advanced towards the Coral Sea with the intention of finding and destroying the Allied naval forces. Beginning on 7 May, the carrier forces from the two sides exchanged airstrikes over two consecutive days. The first day, the US sank the Japanese light carrier Shōhō, while the Japanese sank a US destroyer and heavily damaged a fleet oiler (which was later scuttled). The next day, the Japanese fleet carrier Shōkaku was heavily damaged, the US fleet carrier Lexington was critically damaged (and was scuttled as a result), and the Yorktown was damaged. With both sides having suffered heavy losses in aircraft and carriers damaged or sunk, the two fleets disengaged and retired from the battle area. Because of the loss of carrier air cover, Inoue recalled the Port Moresby invasion fleet, intending to try again later. Although a tactical victory for the Japanese in terms of ships sunk, the battle would prove to be a strategic victory for the Allies for several reasons. The battle marked the first time since the start of the war that a major Japanese advance had been checked by the Allies. More importantly, the Japanese fleet carriers Shōkaku and Zuikaku – one damaged and the other with a depleted aircraft complement – were unable to participate in the Battle of Midway, which took place the following month, ensuring a rough parity in aircraft between the two adversaries and contributing significantly to the US victory in that battle. The severe losses in carriers at Midway prevented the Japanese from reattempting to invade Port Moresby from the ocean. Two months later, the Allies took advantage of Japan''s resulting strategic vulnerability in the South Pacific and launched the Guadalcanal Campaign that, along with the New Guinea Campaign, eventually broke Japanese defenses in the South Pacific and was a significant contributing factor to Japan''s ultimate defeat in World War II.', 'Big Brother', '2015-06-17 09:11:00', 1, NULL, 'battle-of-the-coral-sea');

-- --------------------------------------------------------

--
-- Structure de la table `article_categorie`
--

CREATE TABLE IF NOT EXISTS `article_categorie` (
  `article_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  PRIMARY KEY (`article_id`,`categorie_id`),
  KEY `IDX_934886107294869C` (`article_id`),
  KEY `IDX_93488610BCF5E72D` (`categorie_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `article_categorie`
--

INSERT INTO `article_categorie` (`article_id`, `categorie_id`) VALUES
(8, 1),
(9, 3),
(10, 2),
(10, 4),
(12, 1),
(12, 2),
(14, 1),
(20, 2),
(20, 4),
(22, 3),
(22, 4);

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Musique'),
(2, 'Inutile'),
(3, 'Géographie'),
(4, 'Guerre');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL,
  `auteur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `datecreation` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_67F068BC7294869C` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `article_id`, `contenu`, `auteur`, `datecreation`) VALUES
(1, 12, 'OSEF !!', 'Francis Lalane', '2015-06-12 09:22:06'),
(2, 12, 'Toi aussi tu couches !!', 'Clara Bruni', '2015-06-11 10:13:39'),
(4, 10, 'Google is amazing !!', 'anonymous G.', '2015-06-08 07:32:01'),
(5, 10, 'I love Google', 'anonymous G.', '2015-06-10 05:36:13'),
(6, 10, 'I can''t live without Google !!', 'anonymous G.', '2015-06-03 18:43:35'),
(7, 10, 'Google is my life !!', 'anonymous G.', '2015-06-10 10:24:48'),
(8, 8, 'Don''t Kill the Magic is released today by Latium Entertainment and RCA Records. "Rude" is the lead single from the album. The song peaks at number one on the Billboard Hot 100, becoming MAGIC!''s most successful single in the U.S. to date.', 'Nasri', '2014-06-30 08:49:29'),
(15, 14, 'C''était mieux avant !', 'Francis C.', '2015-06-16 11:29:00'),
(16, 14, 'Dans la cabane au fond du jardin !', 'Francis C.', '2015-06-16 11:29:00'),
(17, 14, 'Olé !!', 'Francis C.', '2015-06-16 11:40:49'),
(19, 14, 'Mon orchestre il t''explose !', 'Marcel', '2015-06-16 11:49:53'),
(20, 20, 'Oui mais c''était mieux avant !!!', 'Francis C.', '2015-06-16 14:00:55'),
(21, 20, 'Moi j''y comprend rien.', 'Francis C.', '2015-06-16 15:14:22'),
(22, 20, 'mais quand j''te dis rien... C''est RIEN', 'Francis C.', '2015-06-16 15:15:58'),
(23, 22, '中国>所有', 'CIA''s fanboy', '2015-06-17 09:12:35');

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`id`, `url`, `alt`) VALUES
(1, 'cn.png', 'Voilà une jolie histoire à propos de cette image'),
(2, 'scooter.jpg', 'La cabane au fond du jardin...'),
(3, 'face.png', 'Oui mais non!'),
(4, 'Android1.png', 'PHP Symfony c''est de la balle'),
(6, 'marcel.jpg', 'Marcel et son orchestre');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `FK_23A0E663DA5256D` FOREIGN KEY (`image_id`) REFERENCES `image` (`id`);

--
-- Contraintes pour la table `article_categorie`
--
ALTER TABLE `article_categorie`
  ADD CONSTRAINT `FK_934886107294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_93488610BCF5E72D` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD CONSTRAINT `FK_67F068BC7294869C` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
