-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost:8889
-- Généré le :  Mer 20 Avril 2016 à 10:29
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
-- Structure de la table `avis`
--

CREATE TABLE `avis` (
  `idAvis` int(11) NOT NULL,
  `nom` varchar(155) DEFAULT NULL,
  `message` text,
  `dateCreation` datetime DEFAULT NULL,
  `estSupprime` int(11) DEFAULT NULL,
  `gamme_idGamme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idFaq` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `reponse` text,
  `DateAjout` datetime DEFAULT NULL,
  `estSupprime` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `faq`
--

INSERT INTO `faq` (`idFaq`, `question`, `reponse`, `DateAjout`, `estSupprime`) VALUES
(1, 'Est-ce que mon GreenKub peut être autonome?', 'Oui, nous pouvons vous proposer des solutions permettant de rendre votre studio parfaitement autonome. Pour l’électricité, un kit photovoltaïque de 2kWc avec batterie permet un parfaite autonomie. Pour l’eau, un récupérateur d’eau de pluie vous permettra d’être automne en eau pour certains usages. Et enfin, un système d’assainissement non collectif vous permettra de vous passer de tout à l’égout pour les eaux usées. ', '2016-03-27 10:26:44', 0),
(2, 'Faut-il prévoir des fondations?', 'Les studios GreenKub sont posés sur un système de fondations métalliques. Elles se présentent sous forme de 12 platines de 50cm x 50cm en acier galvanisé encrées dans le sol après avoir décaissé le sol sur environ 30 cm de profondeur. Ce système nous permet d’éviter l’emploi de fondations maçonnées et ainsi de limiter l’impact sur les espaces paysagers et d’éviter les 21 jours de temps de séchage du béton.', '2016-03-27 10:35:00', 0),
(3, 'Faut-il une autorisation de la mairie?', 'L’installation d’un GreenKub comme d’une extension de maison de moins de 20M2 ne nécessite pas de permis de construire mais une simple déclaration de travaux. La déclaration de travaux est une démarche allégée nécessitant un mois de délais d’instruction. Notre service clients se charge d’effectuer pour vous cette démarche afin d’optimiser les chances de succès de l’opération de construction. Une déclaration rédigée par nos soins obtient, en moyenne, 80% d’acceptation. ', '2016-03-27 10:35:24', 0),
(4, 'Est-ce que je peux vivre dans un GreenKub toute l’année?', 'Oui, le procédé constructif que nous utilisons pour la construction de nos studios de jardin offre un niveau d’isolation hors norme. Votre extension de maison Greenkub dispose de 15cm d’isolation laine de roche sur la périphérie des murs et de 20cm au niveau du sol et du plafond. Soit un niveau d’isolation compatible avec celui exigé par la RT2012.', '2016-03-27 10:35:49', 0),
(5, 'Ca fait combien 2x2 ?', 'eh ben ça fait 6', '2016-03-27 10:55:35', 0);

-- --------------------------------------------------------

--
-- Structure de la table `galerie`
--

CREATE TABLE `galerie` (
  `idGalerie` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `galerie_has_image`
--

CREATE TABLE `galerie_has_image` (
  `galerie_idGalerie` int(11) NOT NULL,
  `image_idImage` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `gamme`
--

CREATE TABLE `gamme` (
  `idGamme` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  `couverture` varchar(45) DEFAULT NULL,
  `miniature` varchar(255) DEFAULT NULL,
  `specification` text,
  `url` varchar(255) DEFAULT NULL,
  `dateAjout` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL,
  `estSupprime` int(1) DEFAULT '0',
  `produit_idProduit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `gamme`
--

INSERT INTO `gamme` (`idGamme`, `nom`, `description`, `couverture`, `miniature`, `specification`, `url`, `dateAjout`, `dateModification`, `estSupprime`, `produit_idProduit`) VALUES
(26, 'OfficeCub 1', ' CONCEPTCUB offre un réponse pratique et  efficace aux problèmes sociétaux et sociaux  .\r\nVous êtes de plus en plus nombreux à travailler à votre domicile.\r\nNous sommes actuellement dans une société en perpétuelle évolution avec l''essor des nouvelles technologies et du numérique. ', 'officecub_1.jpg', 'officecub_1_miniature.jpg', 'Nous proposons 2 tailles d''OFFICECUB, 5 m² et 12 m².\r\nSolution très simple à mettre en oeuvre , ils sont fabriqués en atelier, livrés chez vous par camion et installés en quelques heures. Ils peuvent être livrés meublés ou vides selon les besoins de chacun. \r\nAprès réception de l''autorisation de votre déclaration préalable ( 1 mois) par votre mairie , notre délai de livraison est de 2 mois. ', 'officecub-1', '2016-03-26 17:51:44', '0000-00-00 00:00:00', 0, 3),
(27, 'Office Cub 2', '<p>Id&eacute;al pour les espaces restreints le CUBROOM 1 propose un espace int&eacute;rieur optimis&eacute; et fonctionnel regroupant toutes les commodit&eacute;s d''usage, tout en conservant une Architecture cosy et contemporaine.</p>', 'officecub_2.jpg', 'officecub_2_miniature.jpg', '<p style="text-align: left;">Surface Int&eacute;rieur 13 m&sup2;</p>\r\n<p style="text-align: left;">R&eacute;glementation : D&eacute;claration pr&eacute;alable</p>\r\n<p style="text-align: left;">Prix : &agrave; partir de 28 600&euro; HT</p>', 'office-cub-2', '2016-03-26 18:05:13', '0000-00-00 00:00:00', 0, 3),
(28, 'Gamme 3', 'une superbe description', 'gamme_3.jpg', 'gamme_3_miniature.jpg', 'Avec de super spécifications', 'gamme-3', '2016-04-04 09:35:07', '0000-00-00 00:00:00', 0, 3),
(29, 'nanna', 'hbchfbv', 'nanna.jpg', 'nanna_miniature.jpg', 'vfbvhfb', 'nanna', '2016-04-04 09:55:04', '0000-00-00 00:00:00', 0, 4);

-- --------------------------------------------------------

--
-- Structure de la table `image`
--

CREATE TABLE `image` (
  `idImage` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `dateAjout` datetime DEFAULT NULL,
  `estSupprime` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`idMembre`, `photo`, `prenom`, `nom`, `email`, `role`, `description`, `motDePasse`, `profil`, `dateAjout`, `estSupprime`) VALUES
(2, 'gomez_selena.jpg', 'Selena', 'Gomez', 'selena.gomez@gmail.com', 'Chanteuse', 'Selena Marie Gomez, née le 22 juillet 1992 à Grand Prairie, au Texas est une actrice et chanteuse américaine. Elle a fait ses débuts d''actrice très jeune en jouant dans la série pour enfants Barney & Friends mais c''est grâce à la série Les Sorciers de Waverly Place où elle interprète le rôle d''Alex Russo sur la chaîne pour enfant Disney Channel qu''elle se fait connaître du jeune public.', 'selena', 1, '2016-03-03 21:20:51', 0),
(3, 'pitt_brad.jpg', 'Brad', 'Pitt', 'brad.pitt@gmail.com', 'Acteur', 'William Bradley Pitt, dit Brad Pitt, est un acteur et producteur de cinéma américain né le 18 décembre 1963 à Shawnee (Oklahoma).\r\nRepéré dans une publicité pour Levi''s, Brad Pitt sort de l''anonymat grâce à un petit rôle dans le film Thelma et Louise de Ridley Scott. En très peu de temps, il devient une véritable star et sa collaboration avec le réalisateur David Fincher', 'brad', 2, '2016-03-03 21:33:40', 0),
(4, 'hazard_eden.jpg', 'Eden', 'Hazard', 'eden.hazard@gmail.com', 'Footballer', 'Eden Michael Hazard, né le 7 janvier 1991 à La Louvière en Belgique2, est un footballeur international belge. Il évolue actuellement a Chelsea comme milieu offensif gauche.\r\nArrivé de Belgique au Lille OSC en 2005 pour terminer sa formation, Hazard y explose au plus haut niveau au poste d''ailier gauche. Élu meilleur espoir de Ligue 1', 'eden', 3, '2016-03-03 21:43:01', 0),
(8, 'hardy_tom.jpg', 'Tom', 'Hardy', 'tom.hardy@gmail.com', 'Acteur', 'Tom Hardy est un acteur britannique né le 15 septembre 1977 à Hammersmith (Londres).\r\nIl est notamment connu pour avoir interprété le prisonnier Charles Bronson dans le film Bronson, Tommy Conlon dans Warrior, Forrest Bondurant dans Des hommes sans loi, Ricki Tarr dans La Taupe et Max Rockatansky dans Mad Max: Fury Road.', 'tom', 2, '2016-03-03 22:12:17', 0),
(9, 'portman_nathalie.png', 'Nathalie', 'Portman', 'natalie.portamn@gmail.com', 'Actrice', 'Natalie Portman est une actrice et productrice israélo-américaine, née le 9 juin 1981 à Jérusalem. Elle fait ses débuts au cinéma en 1993, à douze ans, en interprétant le rôle de Mathilda dans le film Léon de Luc Besson, aux côtés de Jean Reno.\r\nElle devient une vedette internationale à part entière en 1999, lors de la sortie de Star Wars, épisode I ', 'nathalie', 1, '2016-03-03 22:18:05', 0),
(12, 'efron_zac.jpg', 'Zac', 'Efron', 'zac.efron@gmail.com', 'Dév. Full Stack', 'Zachary David Alexander Efron dit Zac Efron, né le 18 octobre 1987 à San Luis Obispo en Californie, est un acteur et producteur américain. Sa maison de production se nomme Ninjas Runnin Wild Productions.', '2e4a3747418a6da627fb2222179aafaa34eb8cc6', 1, '2016-04-14 17:40:07', 0),
(13, 'delajungle_nigel.jpg', 'Nigel', 'Delajungle', 'nigel.delajungle@gmail.com', 'Chef de projet', 'La Famille Delajungle (The Wild Thornberrys) est une série télévisée d''animation américaine en 91 épisodes de 26 minutes, créée par Arlene Klasky et Gabor Csupo et diffusée entre le 1er septembre 1998 et le 11 juin 2004 sur Nickelodeon.', 'cfea2496442c091fddd1ba215d62a69ec34e94d0', 1, '2016-04-16 16:51:14', 0),
(14, 'delon_alain.jpg', 'Alain', 'Delon', 'alain.delon@gmail.com', 'Web Designer', 'Alain Delon, né le 8 novembre 1935 à Sceaux, est un acteur et homme d''affaires français ; il a également la nationalité suisse depuis 1999. Il a aussi été producteur et a réalisé deux films. Il est connu aussi pour la pub Dior et pour être le père de William', '8450103c06dbd58add9d047d761684096ac560ca', 2, '2016-04-16 19:02:04', 0);

-- --------------------------------------------------------

--
-- Structure de la table `partenaire`
--

CREATE TABLE `partenaire` (
  `idPartenaire` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `dateAjout` datetime DEFAULT NULL,
  `estSupprime` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `partenaire`
--

INSERT INTO `partenaire` (`idPartenaire`, `nom`, `logo`, `type`, `dateAjout`, `estSupprime`) VALUES
(1, 'Bower', 'bower.png', 'Task runner', '2016-03-27 17:55:20', 0),
(2, 'Burger King', 'burger_king.png', 'Fast food', '2016-03-27 17:56:08', 0),
(3, 'Playstation', 'playstation.png', 'Jeux vidéo', '2016-03-27 17:56:42', 0),
(4, 'Kinder', 'kinder.png', 'Dessert', '2016-03-27 17:56:26', 0),
(5, 'Youtube', 'youtube.png', 'Plateforme vidéo', '2016-03-27 17:56:59', 0),
(6, 'Master Card', 'master_card.png', 'Banque digitale', '2016-03-27 23:01:24', 0),
(7, 'Ebay', 'ebay.png', 'Plateforme d''enchère en ligne', '2016-03-27 23:01:35', 0),
(8, 'KFC', 'kfc.png', 'Fast food', '2016-03-27 23:01:48', 0),
(9, 'Nexity', 'nexity1.png', 'Promoteur immobilier', '2016-04-19 09:00:24', 0);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  `couverture` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `dateAjout` datetime DEFAULT NULL,
  `dateModification` datetime DEFAULT NULL,
  `estSupprime` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nom`, `description`, `couverture`, `url`, `dateAjout`, `dateModification`, `estSupprime`) VALUES
(3, 'Bureaux de jardin', 'Habiter un studio impose de maîtriser l''art de l''optimisation de l''espace. Rangements astucieux, petite cuisine bien aménagée, salle de bains avec douche pratique et fonctionnelle, salon avec coin clic-clac et bureau... Découvrez nos reportages pour vous aider à transformer votre studio en palace parfaitement aménagé.', 'bureaux_de_jardin.jpg', 'bureaux-de-jardin', '2016-03-01 21:23:02', '2016-03-01 21:23:02', 0),
(4, 'Studio de jardin', 'Habiter un studio impose de maîtriser l''art de l''optimisation de l''espace. Rangements astucieux, petite cuisine bien aménagée, salle de bains avec douche pratique et fonctionnelle, salon avec coin clic-clac et bureau... Découvrez nos reportages pour vous aider à transformer votre studio en palace parfaitement aménagé.', 'studio_de_jardin.jpg', 'studio-de-jardin', '2016-03-03 16:11:28', '2016-03-03 16:11:28', 0),
(9, 'Studio de luxe', 'Habiter un studio impose de maîtriser l''art de l''optimisation de l''espace. Rangements astucieux, petite cuisine bien aménagée, salle de bains avec douche pratique et fonctionnelle, salon avec coin clic-clac et bureau... Découvrez nos reportages pour vous aider à transformer votre studio en palace parfaitement aménagé.', 'studio_de_luxe.jpg', 'studio-de-luxe', '2016-04-19 13:10:45', '2016-04-19 13:10:45', 0);

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
  `dateAjout` datetime DEFAULT NULL,
  `estSupprime` int(1) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Contenu de la table `reseaux_sociaux`
--

INSERT INTO `reseaux_sociaux` (`idReseauxSociaux`, `nom`, `logo`, `lien`, `dateAjout`, `estSupprime`) VALUES
(1, 'Twitter', 'twitter.svg', 'https://twitter.com', '2016-03-28 14:00:15', 0),
(2, 'Facebook', 'facebook.svg', 'https://www.facebook.com', '2016-03-28 14:01:53', 0),
(3, 'Instagram', 'instagram.svg', 'https://www.instagram.com', '2016-03-28 14:02:13', 0),
(4, 'Pinterest', 'pinterest.svg', 'https://fr.pinterest.com', '2016-03-28 17:19:24', 0),
(6, 'Dribbble', 'dribbble.svg', ' https://dribbble.com', '2016-04-18 09:58:15', 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`idAvis`),
  ADD KEY `fk_avis_gamme1_idx` (`gamme_idGamme`);

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
  ADD PRIMARY KEY (`idGamme`),
  ADD KEY `fk_gamme_produit1_idx` (`produit_idProduit`);

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
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `avis`
--
ALTER TABLE `avis`
  MODIFY `idAvis` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idFaq` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `galerie`
--
ALTER TABLE `galerie`
  MODIFY `idGalerie` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `gamme`
--
ALTER TABLE `gamme`
  MODIFY `idGamme` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `image`
--
ALTER TABLE `image`
  MODIFY `idImage` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT pour la table `partenaire`
--
ALTER TABLE `partenaire`
  MODIFY `idPartenaire` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT pour la table `profil`
--
ALTER TABLE `profil`
  MODIFY `idProfil` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `reseaux_sociaux`
--
ALTER TABLE `reseaux_sociaux`
  MODIFY `idReseauxSociaux` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `fk_avis_gamme1` FOREIGN KEY (`gamme_idGamme`) REFERENCES `gamme` (`idGamme`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `galerie_has_image`
--
ALTER TABLE `galerie_has_image`
  ADD CONSTRAINT `fk_galerie_has_image_galerie1` FOREIGN KEY (`galerie_idGalerie`) REFERENCES `galerie` (`idGalerie`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_galerie_has_image_image1` FOREIGN KEY (`image_idImage`) REFERENCES `image` (`idImage`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `gamme`
--
ALTER TABLE `gamme`
  ADD CONSTRAINT `fk_gamme_produit1` FOREIGN KEY (`produit_idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `membre`
--
ALTER TABLE `membre`
  ADD CONSTRAINT `fk_membre_profil` FOREIGN KEY (`profil`) REFERENCES `profil` (`idProfil`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
