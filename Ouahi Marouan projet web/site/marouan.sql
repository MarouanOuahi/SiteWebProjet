SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `marouan`
--

-- --------------------------------------------------------

--
-- Structure de la table `chambre`
--

CREATE TABLE IF NOT EXISTS `chambre` (
  `id` int(11) NOT NULL,
  `titre` varchar(45) DEFAULT NULL,
  `description` text,
  `prix` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `chambre`
--

INSERT INTO `chambre` (`id`, `titre`, `description`, `prix`) VALUES
(1, 'CHAMBRE SINGLE', 'Ces chambres à l''élégance moderne sont équipées de meubles contemporains tout en dégageant une atmosphère de luxe. Vous y trouverez Télévisions Ecrans Plats avec différentes chaînes, téléphone, Accès Wifi, Minibar, et un Balcon équipé pour les chambres avec Vue sur Mer. Chambre Classique peut accueillir une seule personne.', 200),
(2, 'CHAMBRE DOUBLE', 'Somptueusement décorées, ces chambres sophistiquées offrent une vue splendide sur le bord de la plage. Ces chambres disposent d’un espace luxueux et résolument contemporain, espace idéal pour votre détente. Chambre Classique Vue Mer peut accueillir jusqu’à 2 personnes, y compris des enfants..', 400),
(3, 'SUITE', 'Ces Suites spacieuses offrent une élégance contemporaine ainsi qu''une vue exceptionnelle sur la Mer.. Elles sont équipées par toutes les accommodations pour votre détente : Lit à 2 personnes (avec possibilité d’en ajouter un ou 2 pour les enfants), TV plasma, Climatiseur, Minibar, Wifi haut débit, douche chauffée de luxe, terrasse sur la mer,… Suite peut accueillir jusqu''à 4 personnes, y compris des enfants.', 600),
(4, 'APPARTEMENT', 'Ces de 70 m² et leurs salons spacieux vous promettent un séjour inoubliable. Ils sont conçus pour répondre à votre bienêtre et bénéficient d’une terrasse offrant une vue imprenable sur la plage. Suite Terrasse peut accueillir jusqu''à 4 personnes, y compris des enfants.', 800);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(90) DEFAULT NULL,
  `adresse` text,
  `tel` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id`, `nom`, `adresse`, `tel`) VALUES
(1, 'Ouahi Marouan', 'Hay chemaou Rabat', '0537783098');

-- --------------------------------------------------------

--
-- Structure de la table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date DEFAULT NULL,
  `chambre` int(11) DEFAULT NULL,
  `client` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk1` (`client`),
  KEY `fk2` (`chambre`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `reservation`
--

INSERT INTO `reservation` (`id`, `date`, `chambre`, `client`) VALUES
(1, '2012-10-21', 3, 1),
(2, '2012-10-21', 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `sejour`
--

CREATE TABLE IF NOT EXISTS `sejour` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservation` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `duree` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk3` (`reservation`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `sejour`
--

INSERT INTO `sejour` (`id`, `reservation`, `date`, `duree`) VALUES
(1, 1, '2012-12-24', 3),
(2, 2, '2012-10-20', 10);

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`client`) REFERENCES `client` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk2` FOREIGN KEY (`chambre`) REFERENCES `chambre` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sejour`
--
ALTER TABLE `sejour`
  ADD CONSTRAINT `fk3` FOREIGN KEY (`reservation`) REFERENCES `reservation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
