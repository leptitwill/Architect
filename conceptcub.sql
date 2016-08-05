-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Ven 05 Août 2016 à 20:12
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `conceptcub`
--

-- --------------------------------------------------------

--
-- Structure de la table `accueil`
--

CREATE TABLE `accueil` (
  `idAccueil` int(11) NOT NULL,
  `baseline` text NOT NULL,
  `introduction` text,
  `etape1` text,
  `etape2` text NOT NULL,
  `etape3` text NOT NULL,
  `etape4` text NOT NULL,
  `validation` text NOT NULL,
  `galerie_idGalerie` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `accueil`
--

INSERT INTO `accueil` (`idAccueil`, `baseline`, `introduction`, `etape1`, `etape2`, `etape3`, `etape4`, `validation`, `galerie_idGalerie`) VALUES
(1, '<blockquote>\n<p><span style="font-size: 24px;">La pi&egrave;ce qui vous manque sans les contraintes du chantier</span></p>\n</blockquote>', '<h1>Notre concept de pi&egrave;ce &agrave; vivres</h1>\n<p>Conceptcub offre une r&eacute;ponse efficace aux vraies probl&eacute;matiques sociales avec l''&eacute;volution du home working et soci&eacute;tales par la p&eacute;nurie et le co&ucirc;t du logement pour les jeunes et les senoirs.</p>\n<p>&nbsp;</p>\n<p><br /> Cr&eacute;ateur de pi&egrave;ces &agrave; vivre offrant une seconde vie &agrave; des containers maritimes, Conceptcub compl&egrave;te votre offre de logement de fa&ccedil;on temporaire ou d&eacute;finitive par la cr&eacute;ation d'' espaces &agrave; vivre am&eacute;nag&eacute;s et &eacute;quip&eacute;s dans votre jardin.</p>', '<h3>Premier rendez-vous t&eacute;l&eacute;phonique</h3>\n<p>&nbsp;</p>\n<p>En fonction de la superficie de votre terrain, vous serez conseill&eacute;s sur le choix du mod&egrave;le de bureau ou de studio de jardin ainsi que sur les diff&eacute;rentes options possibles.</p>', '<h3>Une &eacute;tude pr&eacute;l&eacute;minaire du projet</h3>\n<p>&nbsp;</p>\n<p>Cette &eacute;tape est la plus importante dans la mesure o&ugrave; votre projet doit avant tout respecter certaines r&egrave;gles du plan local d''urbanisme ( PLU) de votre commune.</p>', '<h3>R&eacute;alisation des documents administratifs</h3>\n<p>&nbsp;</p>\n<p>R&eacute;alisation des documents administratifs, d&eacute;claration pr&eacute;alable ou permis de construire pour un co&ucirc;t de 600 euros. vous &ecirc;tes d&eacute;gag&eacute;s des d&eacute;marches administratifs.</p>', '<h3>Nous pr&eacute;parons un avant projet regroupant</h3>\n<p>&nbsp;</p>\n<p>1. Un plan d''implantation</p>\n<p>2. Plan et descriptif&nbsp;</p>\n<p>3. Un devis d&eacute;taill&eacute;</p>\n<p>4. La liste des options</p>\n<p>Nous r&eacute;digeons un devis ferme et d&eacute;finitif.</p>', '<p>Une fois le feu vert de la Marie et le d&eacute;lai de recours des tiers pass&eacute;, la fabrication est alors lanc&eacute;.&nbsp;Un contrat sera sign&eacute; entre les 2 parties dans le but de clarifier les &eacute;tapes &agrave; venir et les obligations de chacun.</p>', 1);

-- --------------------------------------------------------

--
-- Structure de la table `avantage`
--

CREATE TABLE `avantage` (
  `idAvantage` int(11) NOT NULL,
  `nom` varchar(155) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `icone` varchar(255) DEFAULT NULL,
  `estSupprime` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `avantage`
--

INSERT INTO `avantage` (`idAvantage`, `nom`, `description`, `icone`, `estSupprime`) VALUES
(1, 'Confort de vie', 'Créer un espace dédié à votre activité professionnelle et améliorer votre confort de vie.\r\n\r\nIndépendant de votre maison l''officecub vous garantie les meilleurs condition de travail, afin d''exercer votre activité professionnelle.', 'confort_de_vie.svg', 0),
(4, 'Investissement', 'Économiser votre temps de trajet entre la maison et le travail et ainsi vos coûts.\r\n\r\nParticipez par ces petits gestes à la préservation de la nature, en investissant dans cette solution éco-responsable, pérenne et plus rentable.', 'investissement.svg', 0),
(5, 'Valorisation du bien', 'Investissez dans un bureau de jardin et apporter de la valeur sûre à votre bien immobilier.\r\n\r\nCette pièce supplémentaire peut contribuer à une augmentation de la valeur de votre bien de 5% à 9% (étude réaliser en 2008 par l''INSEE).', 'valorisation_du_bien.svg', 0);

-- --------------------------------------------------------

--
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `idAvis` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `estSupprime` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `avis`
--

INSERT INTO `avis` (`idAvis`, `message`, `auteur`, `estSupprime`) VALUES
(2, 'Je te signale que les flics ont une fâcheuse tendance à remarquer les véhicules pleins de sang !', 'Pulp fiction', 0),
(3, 'La vie c’est comme une boîte de chocolats, on ne sait jamais sur quoi on va tomber', 'Forrest Gump', 0),
(4, 'À la gare, y’avait trois manteaux, dans ces trois manteaux y’avait trois mecs et dans les trois mecs y’avait trois balles', 'Il était une fois dans l’ouest', 0),
(5, 'fff', 'fff', 1);

-- --------------------------------------------------------

--
-- Structure de la table `concept`
--

CREATE TABLE `concept` (
  `introduction` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `concept`
--

INSERT INTO `concept` (`introduction`) VALUES
('Conceptcub offre une réponse efficace aux vraies problématiques sociales avec l''évolution du home working et sociétales par la pénurie et le coût du logement pour les jeunes et les senoirs.\r\n \r\n\r\nCréateur de pièces à vivre offrant une seconde vie à des containers maritimes, Conceptcub complète votre offre de logement de façon temporaire ou définitive par la création d'' espaces à vivre aménagés et équipés dans votre jardin.');

-- --------------------------------------------------------

--
-- Structure de la table `email_client`
--

CREATE TABLE `email_client` (
  `idEmailClient` int(11) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `email_client`
--

INSERT INTO `email_client` (`idEmailClient`, `email`) VALUES
(19, 'a'),
(20, 'alain.delon@gmail.com'),
(21, 'ff'),
(22, 'h'),
(23, 'hf'),
(24, 'zac.efron@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

CREATE TABLE `entreprise` (
  `email` varchar(255) NOT NULL,
  `telephone1` varchar(255) NOT NULL,
  `telephone2` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `codePostal` int(11) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `pays` varchar(255) NOT NULL,
  `horaire` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `entreprise`
--

INSERT INTO `entreprise` (`email`, `telephone1`, `telephone2`, `adresse`, `codePostal`, `ville`, `pays`, `horaire`) VALUES
('william.westerloppe@gmail.com', '+33 6 07 50 34 86', '+33 6 07 50 34 86 (Belgique)', '59 avenue de L''Union', 59100, 'Tourcoing', 'France', 'Du lundi au vendredi\r\n9:00 - 12:00 - 14:00 - 18:00\r\nSamedi\r\n9:00 - 12:00');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idFaq` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `reponse` text,
  `estSupprime` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `faq`
--

INSERT INTO `faq` (`idFaq`, `question`, `reponse`, `estSupprime`) VALUES
(1, 'Quelle est la zone d''intervention de Conceptcub ?', 'Conceptcub est une sociéte implantée dans le Nord de la France , plus précisement à Tourcoing.\r\nNous intervenons sur l''ensemble du territoire français.', 0),
(2, 'Quel tarif pour un Cub ?', 'Les prix indiqués sont des prix de base de nos Cubs sortis d''atelier.\r\nNos fiches techniques indiquent les équipements de série et les options possibles.\r\nLes prix affichés ne prennent pas en compte le transport des modules jusqu''à votre domicile ni les raccordements aux réseaux .\r\nVous trouverez ci après une idée des prix des transports en fonction de votre situation géographique.\r\nPour les livraisons hors région Nord Pas de Calais, les tarifs concernant le transport seront  étudiés au cas par cas.', 0),
(3, 'Faut-il une autorisation de la mairie?', 'L’installation d’un Cub comme d’une extension de maison de moins de 20M2 ne nécessite pas de permis de construire mais une simple déclaration de travaux. La déclaration de travaux est une démarche allégée nécessitant un mois de délais d’instruction. Notre service clients se charge d’effectuer pour vous cette démarche afin d’optimiser les chances de succès de l’opération de construction. Une déclaration rédigée par nos soins obtient, en moyenne, 80% d’acceptation. ', 0),
(4, 'Est-ce que je peux vivre dans un Cub toute l’année?', 'Oui, le procédé constructif que nous utilisons pour la construction de nos studios de jardin offre un niveau d’isolation hors norme. Votre extension de maison conceptcub dispose de 15cm d’isolation laine de roche sur la périphérie des murs et de 20cm au niveau du sol et du plafond. Soit un niveau d’isolation compatible avec celui exigé par la RT2012.', 0),
(5, 'Ca fait combien 2x2 ?', 'eh ben ça fait 6', 1),
(6, 'Qu''est ce que la taxe d''aménagement ? Comment la calculer ?', 'La taxe d''aménagement est applicable pour toutes constructions de plus de 5 m²  et d''une hauteur de plafond supérieur oiu égale à 1.80 m.\r\nPour calculer cette taxe il faut tout d''abord calculer la valeur foncière de l''extension qui dépend du tarif forfaitaire national au mètre carré.\r\nToutes extensions de moins de 100 m² bénéficient d''un abattement fiscal de 50 %.\r\nL''imposition dépend de la commune et du département. Ce sont elles qui fixent les taux : entre 1 % et 5 % pour une commune et 1% et 2.5 % pour un département.', 0),
(7, 'test', 'test', 1),
(8, 'gddaaa', 'bxycddd', 1);

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `idGalerie` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `estSupprime` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `galerie`
--

INSERT INTO `galerie` (`idGalerie`, `nom`, `estSupprime`) VALUES
(1, 'studio de jardin', 0),
(2, 'test', 0);

-- --------------------------------------------------------

--
-- Structure de la table `galerie_has_image`
--

CREATE TABLE `galerie_has_image` (
  `galerie_idGalerie` int(11) NOT NULL,
  `image_idImage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `galerie_has_image`
--

INSERT INTO `galerie_has_image` (`galerie_idGalerie`, `image_idImage`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 13),
(1, 14),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(1, 22);

-- --------------------------------------------------------

--
-- Structure de la table `gamme`
--

CREATE TABLE `gamme` (
  `idGamme` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  `couverture` varchar(45) DEFAULT NULL,
  `plan` varchar(255) NOT NULL,
  `pdf` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `atout1` varchar(255) NOT NULL,
  `atout2` varchar(255) NOT NULL,
  `taille` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `equipementSerie` text NOT NULL,
  `equipementOption` text NOT NULL,
  `estSupprime` int(1) DEFAULT '0',
  `produit_idProduit` int(11) NOT NULL,
  `galerie_idGalerie` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gamme`
--

INSERT INTO `gamme` (`idGamme`, `nom`, `description`, `couverture`, `plan`, `pdf`, `url`, `atout1`, `atout2`, `taille`, `prix`, `equipementSerie`, `equipementOption`, `estSupprime`, `produit_idProduit`, `galerie_idGalerie`) VALUES
(50, 'Cubroom 1', '​Idéal pour les espaces restreints le Cubroom 1 propose un espace intérieur optimisé et fonctionnel regroupant toutes les commodités d''usage, tout en conservant une Architecture cosy et contemporaine.', 'cubroom_1.jpg', 'cubroom_1_plan.jpg', 'cubroom_1_pdf.pdf', 'cubroom-1', 'Idéale pour les particuliers au espace restreints', 'Pas de création préalable, ni de permis de construire', 13, 28600, 'Aménagements Exterieurs\r\n• Container maritime de 10 pieds.\r\n• Isolation parois, mousse polyuréthane + laine de verre.\r\n• Menuiseries PVC double vitrage, coloris au choix (Gris anthracite, Blanc, Noir).\r\n• Porte vitrée sécurisée, seuil PMR* Bardage extérieur:\r\n• Bardage bois à clairevoie style liteaux en mélèze.\r\nAménagements Intérieurs :\r\n• Finitions intérieures sols, murs et plafond.\r\n• Réseau éléctrique complet compris, interrupteurs, prises et éclairages.', '• Mobilier sur mesure comprenant un espace bureau et un espace de rangement.\r\n• Choix des revêtements intérieurs (murs et sols; finitions bois).\r\n• Choix de bardage extérieurs en fonction du PLU de votre commune : BARDAGE BOIS, RESPA, ZINC.\r\n• Menuiseries Aluminiums, double vitrage.\r\n• Volets roulants.\r\n• Terrasse avec emmarchements.', 0, 10, 2),
(51, 'Cubroom 2', '​Idéal pour les espaces restreints le Cubroom 1 propose un espace intérieur optimisé et fonctionnel regroupant toutes les commodités d''usage, tout en conservant une Architecture cosy et contemporaine.', 'cubroom_2.jpg', 'cubroom_1_plan.jpg', 'cubroom_2_pdf.pdf', 'cubroom-2', 'Idéale pour les particuliers au espace restreints', 'Pas de création préalable, ni de permis de construire', 13, 28600, 'Aménagements Exterieurs\r\n• Container maritime de 10 pieds.\r\n• Isolation parois, mousse polyuréthane + laine de verre.\r\n• Menuiseries PVC double vitrage, coloris au choix (Gris anthracite, Blanc, Noir).\r\n• Porte vitrée sécurisée, seuil PMR* Bardage extérieur:\r\n• Bardage bois à clairevoie style liteaux en mélèze.\r\nAménagements Intérieurs :\r\n• Finitions intérieures sols, murs et plafond.\r\n• Réseau éléctrique complet compris, interrupteurs, prises et éclairages.', '• Mobilier sur mesure comprenant un espace bureau et un espace de rangement.\r\n• Choix des revêtements intérieurs (murs et sols; finitions bois).\r\n• Choix de bardage extérieurs en fonction du PLU de votre commune : BARDAGE BOIS, RESPA, ZINC.\r\n• Menuiseries Aluminiums, double vitrage.\r\n• Volets roulants.\r\n• Terrasse avec emmarchements.', 0, 10, 1),
(52, 'Cubroom 3', '​Idéal pour les espaces restreints le Cubroom 1 propose un espace intérieur optimisé et fonctionnel regroupant toutes les commodités d''usage, tout en conservant une Architecture cosy et contemporaine.', 'cubroom_3.jpg', 'cubroom_1_plan.jpg', 'cubroom_3_pdf.pdf', 'cubroom-3', 'Idéale pour les particuliers au espace restreints', 'Pas de création préalable, ni de permis de construire', 13, 28600, 'Aménagements Exterieurs\r\n• Container maritime de 10 pieds.\r\n• Isolation parois, mousse polyuréthane + laine de verre.\r\n• Menuiseries PVC double vitrage, coloris au choix (Gris anthracite, Blanc, Noir).\r\n• Porte vitrée sécurisée, seuil PMR* Bardage extérieur:\r\n• Bardage bois à clairevoie style liteaux en mélèze.\r\nAménagements Intérieurs :\r\n• Finitions intérieures sols, murs et plafond.\r\n• Réseau éléctrique complet compris, interrupteurs, prises et éclairages.', '• Mobilier sur mesure comprenant un espace bureau et un espace de rangement.\r\n• Choix des revêtements intérieurs (murs et sols; finitions bois).\r\n• Choix de bardage extérieurs en fonction du PLU de votre commune : BARDAGE BOIS, RESPA, ZINC.\r\n• Menuiseries Aluminiums, double vitrage.\r\n• Volets roulants.\r\n• Terrasse avec emmarchements.', 0, 10, 1),
(53, 'OfficeCub 1', '​Idéal pour les espaces restreints le Cubroom 1 propose un espace intérieur optimisé et fonctionnel regroupant toutes les commodités d''usage, tout en conservant une Architecture cosy et contemporaine.', 'officecub_1.jpg', 'cubroom_1_plan.jpg', 'officecub_1_pdf.pdf', 'officecub-1', 'Idéale pour les particuliers au espace restreints', 'Pas de création préalable, ni de permis de construire', 13, 28600, 'Aménagements Exterieurs\r\n• Container maritime de 10 pieds.\r\n• Isolation parois, mousse polyuréthane + laine de verre.\r\n• Menuiseries PVC double vitrage, coloris au choix (Gris anthracite, Blanc, Noir).\r\n• Porte vitrée sécurisée, seuil PMR* Bardage extérieur:\r\n• Bardage bois à clairevoie style liteaux en mélèze.\r\nAménagements Intérieurs :\r\n• Finitions intérieures sols, murs et plafond.\r\n• Réseau éléctrique complet compris, interrupteurs, prises et éclairages.', '• Mobilier sur mesure comprenant un espace bureau et un espace de rangement.\r\n• Choix des revêtements intérieurs (murs et sols; finitions bois).\r\n• Choix de bardage extérieurs en fonction du PLU de votre commune : BARDAGE BOIS, RESPA, ZINC.\r\n• Menuiseries Aluminiums, double vitrage.\r\n• Volets roulants.\r\n• Terrasse avec emmarchements.', 0, 11, 1),
(54, 'Office Cub 2', '​Idéal pour les espaces restreints le Cubroom 1 propose un espace intérieur optimisé et fonctionnel regroupant toutes les commodités d''usage, tout en conservant une Architecture cosy et contemporaine.', 'office_cub_2.jpg', 'cubroom_1_plan.jpg', 'office_cub_2_pdf.pdf', 'office-cub-2', 'Idéale pour les particuliers au espace restreints', 'Pas de création préalable, ni de permis de construire', 13, 28600, 'Aménagements Exterieurs\r\n• Container maritime de 10 pieds.\r\n• Isolation parois, mousse polyuréthane + laine de verre.\r\n• Menuiseries PVC double vitrage, coloris au choix (Gris anthracite, Blanc, Noir).\r\n• Porte vitrée sécurisée, seuil PMR* Bardage extérieur:\r\n• Bardage bois à clairevoie style liteaux en mélèze.\r\nAménagements Intérieurs :\r\n• Finitions intérieures sols, murs et plafond.\r\n• Réseau éléctrique complet compris, interrupteurs, prises et éclairages.', '• Mobilier sur mesure comprenant un espace bureau et un espace de rangement.\r\n• Choix des revêtements intérieurs (murs et sols; finitions bois).\r\n• Choix de bardage extérieurs en fonction du PLU de votre commune : BARDAGE BOIS, RESPA, ZINC.\r\n• Menuiseries Aluminiums, double vitrage.\r\n• Volets roulants.\r\n• Terrasse avec emmarchements.', 0, 11, 1);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `idImage` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `image`
--

INSERT INTO `image` (`idImage`, `nom`) VALUES
(1, '1.jpg'),
(2, '2.jpg'),
(3, '3.jpg'),
(4, '4.jpg'),
(5, '5.jpg'),
(13, '10.jpg'),
(14, 'test.jpg'),
(17, 'slip.jpg'),
(18, 'slip_kangourou.jpg'),
(19, 'chemise.jpg'),
(20, 'bikine.jpg'),
(21, 'ca_marche.jpg'),
(22, 'dbvyfvbfy.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `idMembre` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `description` text,
  `motDePasse` varchar(255) DEFAULT NULL,
  `profil` int(11) NOT NULL,
  `estSupprime` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `photo`, `prenom`, `nom`, `email`, `role`, `description`, `motDePasse`, `profil`, `estSupprime`) VALUES
(2, 'gomez_selena.jpg', 'Selena', 'Gomez', 'selena.gomez@gmail.com', 'TMTC', 'Selena Marie Gomez, née le 22 juillet 1992 à Grand Prairie, au Texas est une actrice et chanteuse américaine. Elle a fait ses débuts d''actrice très jeune en jouant dans la série pour enfants Barney & Friends mais c''est grâce à la série Les Sorciers de Waverly Place où elle interprète le rôle d''Alex Russo sur la chaîne pour enfant Disney Channel qu''elle se fait connaître du jeune public.', '3f354c4d88673d86f861d5aac7a7123aff9e3b91', 1, 1),
(3, 'pitt_brad.jpg', 'Brad', 'Pitt', 'brad.pitt@gmail.com', 'Acteur', 'William Bradley Pitt, dit Brad Pitt, est un acteur et producteur de cinéma américain né le 18 décembre 1963 à Shawnee (Oklahoma).\r\nRepéré dans une publicité pour Levi''s, Brad Pitt sort de l''anonymat grâce à un petit rôle dans le film Thelma et Louise de Ridley Scott. En très peu de temps, il devient une véritable star et sa collaboration avec le réalisateur David Fincher', 'brad', 2, 1),
(4, 'hazard_eden.jpg', 'Eden', 'Hazard', 'eden.hazard@gmail.com', 'Footballer', 'Eden Michael Hazard, né le 7 janvier 1991 à La Louvière en Belgique2, est un footballeur international belge. Il évolue actuellement a Chelsea comme milieu offensif gauche.\r\nArrivé de Belgique au Lille OSC en 2005 pour terminer sa formation, Hazard y explose au plus haut niveau au poste d''ailier gauche. Élu meilleur espoir de Ligue 1', 'eden', 3, 1),
(8, 'hardy_tom.jpg', 'Tom', 'Hardy', 'tom.hardy@gmail.com', 'Acteur', 'Tom Hardy est un acteur britannique né le 15 septembre 1977 à Hammersmith (Londres).\r\nIl est notamment connu pour avoir interprété le prisonnier Charles Bronson dans le film Bronson, Tommy Conlon dans Warrior, Forrest Bondurant dans Des hommes sans loi, Ricki Tarr dans La Taupe et Max Rockatansky dans Mad Max: Fury Road.', 'tom', 2, 1),
(9, 'portman_nathalie.png', 'Nathalie', 'Portman', 'natalie.portamn@gmail.com', 'Actrice', 'Natalie Portman est une actrice et productrice israélo-américaine, née le 9 juin 1981 à Jérusalem. Elle fait ses débuts au cinéma en 1993, à douze ans, en interprétant le rôle de Mathilda dans le film Léon de Luc Besson, aux côtés de Jean Reno.\r\nElle devient une vedette internationale à part entière en 1999, lors de la sortie de Star Wars, épisode I ', 'nathalie', 1, 1),
(12, 'efron_zac.JPG', 'Zac', 'Efron', 'zac.efron@gmail.com', 'Dév. Full Stack', 'Zachary David Alexander Efron dit Zac Efron, né le 18 octobre 1987 à San Luis Obispo en Californie, est un acteur et producteur américain. Sa maison de production se nomme Ninjas Runnin Wild Productions.Il lance sa carrière d''acteur en 2002, devenu célèbre grâce à la saga de Disney Channel High School Musical. Avant de jouer dans la saga', '2e4a3747418a6da627fb2222179aafaa34eb8cc6', 1, 1),
(13, 'delajungle_nigel.jpg', 'Nigel', 'Delajungle', 'nigel.delajungle@gmail.com', 'Chef de projet', 'La Famille Delajungle (The Wild Thornberrys) est une série télévisée d''animation américaine en 91 épisodes de 26 minutes, créée par Arlene Klasky et Gabor Csupo et diffusée entre le 1er septembre 1998 et le 11 juin 2004 sur Nickelodeon.', 'cfea2496442c091fddd1ba215d62a69ec34e94d0', 1, 1),
(14, 'delon_alain.jpg', 'Alain', 'Delon', 'alain.delon@gmail.com', 'Web Designer', 'Alain Delon, né le 8 novembre 1935 à Sceaux, est un acteur et homme d''affaires français ; il a également la nationalité suisse depuis 19991. Il a aussi été producteur et a réalisé deux films. Ayant commencé à faire du cinéma à l''âge de 22 ans, il fut un temps l''acteur le plus rentable du cinéma français avec Louis de Funès et Jean-Paul Belmondo,', '8450103c06dbd58add9d047d761684096ac560ca', 2, 0),
(15, 'chirac_jacques.jpg', 'Jacques', 'Chirac', 'jacques.chirac@gmail.com', 'El président', 'Jacques Chirac, né le 29 novembre 1932 dans le 5ᵉ arrondissement de Paris, est un homme d''État français. Il est le 22ᵉ président de la République française du 17 mai 1995 au 16 mai 2007', 'ec6ec3924567984bc84d2db7380ff9c5ebe12af2', 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `mentions`
--

CREATE TABLE `mentions` (
  `contenu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `mentions`
--

INSERT INTO `mentions` (`contenu`) VALUES
('SIRET : 818 176 570 000 13\r\n\r\nCODE APE : 7111Z Activités d''Architecture\r\n\r\nSiège social : 131 boulevard de Reims - 59100 ROUBAIX - tel : 06 07 50 34 86\r\n\r\nAdresse entreprise : 59 avenue de l''union - BP 3200 - 59203 TOURCOING cedex \r\n\r\nResponsable de la publication : Priscilla Juin');

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `idPartenaire` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `estSupprime` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `partenaire`
--

INSERT INTO `partenaire` (`idPartenaire`, `nom`, `logo`, `type`, `estSupprime`) VALUES
(1, 'Bower', 'bower.png', 'Task runner', 0),
(2, 'Burger King', 'burger_king.png', 'Fast food', 0),
(3, 'Playstation', 'playstation.png', 'Jeux vidéo', 0),
(4, 'Kinder', 'kinder.png', 'Dessert', 0),
(5, 'Youtube', 'youtube.png', 'Plateforme vidéo', 0),
(6, 'Master Card', 'master_card.png', 'Banque digitale', 0),
(7, 'Ebay', 'ebay.png', 'Plateforme d''enchère en ligne', 0),
(8, 'KFC', 'kfc.png', 'Fast food', 0),
(9, 'Nexity', 'nexity1.png', 'Promoteur immobilier', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  `titre` varchar(255) DEFAULT NULL,
  `sousTitre` varchar(255) DEFAULT NULL,
  `couverture` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `estSupprime` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nom`, `description`, `titre`, `sousTitre`, `couverture`, `url`, `estSupprime`) VALUES
(10, 'Studio de jardin', 'Idéal pour les indépendants, les professions libérales ou les télétravailleurs, le studio de jardin s''intègre parfaitement dans votre quotidien. Installez un bureau de jardin et séparez votre espace de vie privé de votre espace de travail. Conceptcub vous propose une gamme innovante de studio de jardin à des prix qui répondent parfaitement à vos besoins professionnels.', 'Nos studios de jardin', 'Offrir une réponse efficace aux vraies problématiques sociétales', 'studio_de_jardin.jpg', 'studio-de-jardin', 0),
(11, 'Bureau de jardin', 'Idéal pour les indépendants, les professions libérales ou les télétravailleurs, le studio de jardin s''intègre parfaitement dans votre quotidien. Installez un bureau de jardin et séparez votre espace de vie privé de votre espace de travail. Conceptcub vous propose une gamme innovante de studio de jardin à des prix qui répondent parfaitement à vos besoins professionnels.', 'Nos bureaux de jardinette', 'Offrir une réponse efficace aux vraies problématiques sociétales', 'bureau_de_jardin.jpg', 'bureau-de-jardin', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit_has_avantage`
--

CREATE TABLE `produit_has_avantage` (
  `produit_idProduit` int(11) NOT NULL,
  `avantage_idAvantage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit_has_avantage`
--

INSERT INTO `produit_has_avantage` (`produit_idProduit`, `avantage_idAvantage`) VALUES
(10, 1),
(11, 1),
(10, 4),
(11, 4),
(10, 5),
(11, 5);

-- --------------------------------------------------------

--
-- Structure de la table `produit_has_solution`
--

CREATE TABLE `produit_has_solution` (
  `produit_idProduit` int(11) NOT NULL,
  `solution_idSolution` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit_has_solution`
--

INSERT INTO `produit_has_solution` (`produit_idProduit`, `solution_idSolution`) VALUES
(10, 1),
(11, 1),
(10, 2),
(11, 2);

-- --------------------------------------------------------

--
-- Structure de la table `profil`
--

CREATE TABLE `profil` (
  `idProfil` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `profil`
--

INSERT INTO `profil` (`idProfil`, `nom`) VALUES
(1, 'Administrateur'),
(2, 'Rédacteur'),
(3, 'Batman');

-- --------------------------------------------------------

--
-- Structure de la table `reseaux_sociaux`
--

CREATE TABLE `reseaux_sociaux` (
  `idReseauxSociaux` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `estSupprime` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reseaux_sociaux`
--

INSERT INTO `reseaux_sociaux` (`idReseauxSociaux`, `nom`, `logo`, `lien`, `estSupprime`) VALUES
(1, 'Twitter', 'twitter.svg', 'https://twitter.com', 0),
(2, 'Facebook', 'facebook.svg', 'https://www.facebook.com', 0),
(3, 'Instagram', 'instagram.svg', 'https://www.instagram.com', 0),
(4, 'Pinterest', 'pinterest.svg', 'https://fr.pinterest.com', 0),
(6, 'Dribbble', 'dribbble.svg', ' https://dribbble.com', 1),
(7, 'dd', 'dd.png', 'dddd', 1);

-- --------------------------------------------------------

--
-- Structure de la table `solution`
--

CREATE TABLE `solution` (
  `idSolution` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `icone` varchar(255) DEFAULT NULL,
  `description` text,
  `estSupprime` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `solution`
--

INSERT INTO `solution` (`idSolution`, `nom`, `icone`, `description`, `estSupprime`) VALUES
(1, 'Pour les particuliers', 'pour_les_particuliers.svg', 'Aux travailleurs indépendants/freelance travaillant à domicile, exerçant une profession libérale, aux artistes.\r\n\r\nAux propriétaires d''une maison possédant un jardin, une cour, un terrain, désirant installer chez eux un officecub de façon temporaire ou permanente.', 0),
(2, 'Pour les professionnels', 'pour_les_professionnels.svg', 'Aux pépinières d''entreprises, aux collectivités ou entreprises, désirant créer des Villages Entrepreneurs.\r\n\r\nDans le but de réunir des télétravailleurs et des indépendants pour favoriser le développement économique des territoires ruraux et péri-urbains.', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `accueil`
--
ALTER TABLE `accueil`
  ADD PRIMARY KEY (`idAccueil`),
  ADD KEY `fk_gamme_galerie1_idx` (`galerie_idGalerie`);

--
-- Index pour la table `avantage`
--
ALTER TABLE `avantage`
  ADD PRIMARY KEY (`idAvantage`);

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`idAvis`);

--
-- Index pour la table `email_client`
--
ALTER TABLE `email_client`
  ADD PRIMARY KEY (`idEmailClient`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idFaq`);

--
-- Index pour la table `galerie`
--
ALTER TABLE `galerie`
  ADD PRIMARY KEY (`idGalerie`);

--
-- Index pour la table `galerie_has_image`
--
ALTER TABLE `galerie_has_image`
  ADD PRIMARY KEY (`galerie_idGalerie`,`image_idImage`),
  ADD KEY `fk_galerie_has_image_image1_idx` (`image_idImage`),
  ADD KEY `fk_galerie_has_image_galerie1_idx` (`galerie_idGalerie`);

--
-- Index pour la table `gamme`
--
ALTER TABLE `gamme`
  ADD PRIMARY KEY (`idGamme`) USING BTREE,
  ADD KEY `fk_gamme_produit1_idx` (`produit_idProduit`),
  ADD KEY `fk_gamme_galerie1_idx` (`galerie_idGalerie`) USING BTREE;

--
-- Index pour la table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`idImage`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idMembre`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_membre_profil_idx` (`profil`);

--
-- Index pour la table `partenaire`
--
ALTER TABLE `partenaire`
  ADD PRIMARY KEY (`idPartenaire`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD UNIQUE KEY `couverture` (`couverture`);

--
-- Index pour la table `produit_has_avantage`
--
ALTER TABLE `produit_has_avantage`
  ADD PRIMARY KEY (`produit_idProduit`,`avantage_idAvantage`),
  ADD KEY `fk_produit_has_avantage_avantage1_idx` (`avantage_idAvantage`),
  ADD KEY `fk_produit_has_avantage_produit1_idx` (`produit_idProduit`);

--
-- Index pour la table `produit_has_solution`
--
ALTER TABLE `produit_has_solution`
  ADD PRIMARY KEY (`produit_idProduit`,`solution_idSolution`),
  ADD KEY `fk_produit_has_avantage_avantage1_idx` (`solution_idSolution`),
  ADD KEY `fk_produit_has_avantage_produit1_idx` (`produit_idProduit`);

--
-- Index pour la table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`idProfil`);

--
-- Index pour la table `reseaux_sociaux`
--
ALTER TABLE `reseaux_sociaux`
  ADD PRIMARY KEY (`idReseauxSociaux`);

--
-- Index pour la table `solution`
--
ALTER TABLE `solution`
  ADD PRIMARY KEY (`idSolution`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `accueil`
--
ALTER TABLE `accueil`
  MODIFY `idAccueil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `avantage`
--
ALTER TABLE `avantage`
  MODIFY `idAvantage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `idAvis` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `email_client`
--
ALTER TABLE `email_client`
  MODIFY `idEmailClient` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idFaq` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `idGalerie` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `gamme`
--
ALTER TABLE `gamme`
  MODIFY `idGamme` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `idPartenaire` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `idProfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `reseaux_sociaux`
--
ALTER TABLE `reseaux_sociaux`
  MODIFY `idReseauxSociaux` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `solution`
--
ALTER TABLE `solution`
  MODIFY `idSolution` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `accueil`
--
ALTER TABLE `accueil`
  ADD CONSTRAINT `fk_accueil_galerie1` FOREIGN KEY (`galerie_idGalerie`) REFERENCES `galerie` (`idGalerie`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `galerie_has_image`
--
ALTER TABLE `galerie_has_image`
  ADD CONSTRAINT `fk_galerie_has_image_galerie1` FOREIGN KEY (`galerie_idGalerie`) REFERENCES `galerie` (`idGalerie`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_galerie_has_image_image1` FOREIGN KEY (`image_idImage`) REFERENCES `image` (`idImage`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `gamme`
--
ALTER TABLE `gamme`
  ADD CONSTRAINT `fk_gamme_galerie1` FOREIGN KEY (`galerie_idGalerie`) REFERENCES `galerie` (`idGalerie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gamme_produit1` FOREIGN KEY (`produit_idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `fk_membre_profil` FOREIGN KEY (`profil`) REFERENCES `profil` (`idProfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produit_has_avantage`
--
ALTER TABLE `produit_has_avantage`
  ADD CONSTRAINT `fk_produit_has_avantage_avantage1` FOREIGN KEY (`avantage_idAvantage`) REFERENCES `avantage` (`idAvantage`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produit_has_avantage_produit1` FOREIGN KEY (`produit_idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `produit_has_solution`
--
ALTER TABLE `produit_has_solution`
  ADD CONSTRAINT `fk_produit_has_solution_produit1` FOREIGN KEY (`produit_idProduit`) REFERENCES `produit` (`idProduit`),
  ADD CONSTRAINT `fk_produit_has_solution_solution1` FOREIGN KEY (`solution_idSolution`) REFERENCES `solution` (`idSolution`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
