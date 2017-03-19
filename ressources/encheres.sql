-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2017 at 10:25 PM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encheres`
--

-- --------------------------------------------------------

--
-- Table structure for table `attribuer`
--

DROP TABLE IF EXISTS `attribuer`;
CREATE TABLE `attribuer` (
  `CodeV` int(11) NOT NULL,
  `CodePr` int(11) NOT NULL,
  `CodePar` int(11) NOT NULL,
  `PrixFinal` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `encherir`
--

DROP TABLE IF EXISTS `encherir`;
CREATE TABLE `encherir` (
  `CodePar` int(11) NOT NULL,
  `CodePr` int(11) NOT NULL,
  `CodeV` int(11) NOT NULL,
  `HeureE` time(3) NOT NULL,
  `PrixE` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `encherir`
--

INSERT INTO `encherir` (`CodePar`, `CodePr`, `CodeV`, `HeureE`, `PrixE`) VALUES
(7, 2, 1, '14:23:09.040', 22);

-- --------------------------------------------------------

--
-- Table structure for table `personne`
--

DROP TABLE IF EXISTS `personne`;
CREATE TABLE `personne` (
  `CodeP` int(11) NOT NULL,
  `NomP` varchar(45) DEFAULT NULL,
  `PrenomP` varchar(45) DEFAULT NULL,
  `EmailP` varchar(60) DEFAULT NULL,
  `LoginP` varchar(45) DEFAULT NULL,
  `MdpP` varchar(97) DEFAULT NULL,
  `RoleP` enum('propriétaire','participant','responsable','administrateur') DEFAULT 'propriétaire'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personne`
--

INSERT INTO `personne` (`CodeP`, `NomP`, `PrenomP`, `EmailP`, `LoginP`, `MdpP`, `RoleP`) VALUES
(2, 'Berghuis', 'Peter', 'peter.berghuis_13@hotmail.com', 'lolplayer101', '$2y$10$InZFBS68LLIGY.KopUpHW.wndVbUi.SR.6X7HQ8PwcnxfIzIguqiq', 'administrateur'),
(5, 'dupont', 'joseph', 'test@test', 'josephLogin', '$2y$10$Jf3wlW8ROlld.glZZ9S3He4tqiu7TErWs.FVj3CjwN4sEDhTPGL3C', 'responsable'),
(6, 'smith', 'john', 'test1@test', 'johnLogin', '$2y$10$bRNg2KKWI4u9L6EIjPX/GOHqOPzskonSPhm0QiS.Betxaa3RG119i', 'propriétaire'),
(7, 'flammenwerfer', 'hans', 'test2@test', 'hansLogin', '$2y$10$QjbocJnqHOK9Tm2hAJ6PEOV9lLdlCuN4SxccKZvxmkbuZA/9SjJeW', 'participant');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE `produit` (
  `CodePr` int(11) NOT NULL,
  `NomPr` varchar(45) DEFAULT NULL,
  `PhotoPr` varchar(60) DEFAULT NULL,
  `PrixInitial` double DEFAULT NULL,
  `CodeProp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`CodePr`, `NomPr`, `PhotoPr`, `PrixInitial`, `CodeProp`) VALUES
(1, 'dank meme - king rabbit', 'ressources/images/Capture.PNG', 50, 6),
(2, 'dank meme - pepe', 'ressources/images/pepe.jpg', 20, 5),
(3, 'dank meme - troll face', 'ressources/images/troll.jpg', 10, 6);

-- --------------------------------------------------------

--
-- Table structure for table `vendre`
--

DROP TABLE IF EXISTS `vendre`;
CREATE TABLE `vendre` (
  `CodeV` int(11) NOT NULL,
  `CodePr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vendre`
--

INSERT INTO `vendre` (`CodeV`, `CodePr`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `vente`
--

DROP TABLE IF EXISTS `vente`;
CREATE TABLE `vente` (
  `CodeV` int(11) NOT NULL,
  `DateV` date DEFAULT NULL,
  `NomV` varchar(45) DEFAULT NULL,
  `HeureDV` time(3) DEFAULT NULL,
  `HeureFV` time(3) DEFAULT NULL,
  `CodeResp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vente`
--

INSERT INTO `vente` (`CodeV`, `DateV`, `NomV`, `HeureDV`, `HeureFV`, `CodeResp`) VALUES
(1, '2017-03-19', 'venteTest1', '12:00:00.000', '23:59:00.000', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attribuer`
--
ALTER TABLE `attribuer`
  ADD PRIMARY KEY (`CodeV`,`CodePr`,`CodePar`),
  ADD KEY `fk_Vente_has_Produit_Produit3_idx` (`CodePr`),
  ADD KEY `fk_Vente_has_Produit_Vente3_idx` (`CodeV`),
  ADD KEY `fk_Attribuer_Personne1_idx` (`CodePar`);

--
-- Indexes for table `encherir`
--
ALTER TABLE `encherir`
  ADD PRIMARY KEY (`CodePar`,`CodePr`,`CodeV`,`HeureE`),
  ADD KEY `fk_Vente_has_Produit_Produit2_idx` (`CodePr`),
  ADD KEY `fk_Vente_has_Produit_Vente2_idx` (`CodeV`),
  ADD KEY `fk_Encherir_Personne1_idx` (`CodePar`);

--
-- Indexes for table `personne`
--
ALTER TABLE `personne`
  ADD PRIMARY KEY (`CodeP`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`CodePr`,`CodeProp`),
  ADD KEY `fk_Produit_Personne_idx` (`CodeProp`);

--
-- Indexes for table `vendre`
--
ALTER TABLE `vendre`
  ADD PRIMARY KEY (`CodeV`,`CodePr`),
  ADD KEY `fk_Vente_has_Produit_Produit1_idx` (`CodePr`),
  ADD KEY `fk_Vente_has_Produit_Vente1_idx` (`CodeV`);

--
-- Indexes for table `vente`
--
ALTER TABLE `vente`
  ADD PRIMARY KEY (`CodeV`,`CodeResp`),
  ADD KEY `fk_Vente_Personne1_idx` (`CodeResp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `personne`
--
ALTER TABLE `personne`
  MODIFY `CodeP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `CodePr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `vente`
--
ALTER TABLE `vente`
  MODIFY `CodeV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribuer`
--
ALTER TABLE `attribuer`
  ADD CONSTRAINT `fk_Attribuer_Personne1` FOREIGN KEY (`CodePar`) REFERENCES `personne` (`CodeP`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vente_has_Produit_Produit3` FOREIGN KEY (`CodePr`) REFERENCES `produit` (`CodePr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vente_has_Produit_Vente3` FOREIGN KEY (`CodeV`) REFERENCES `vente` (`CodeV`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `encherir`
--
ALTER TABLE `encherir`
  ADD CONSTRAINT `fk_Encherir_Personne1` FOREIGN KEY (`CodePar`) REFERENCES `personne` (`CodeP`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vente_has_Produit_Produit2` FOREIGN KEY (`CodePr`) REFERENCES `produit` (`CodePr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vente_has_Produit_Vente2` FOREIGN KEY (`CodeV`) REFERENCES `vente` (`CodeV`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `fk_Produit_Personne` FOREIGN KEY (`CodeProp`) REFERENCES `personne` (`CodeP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vendre`
--
ALTER TABLE `vendre`
  ADD CONSTRAINT `fk_Vente_has_Produit_Produit1` FOREIGN KEY (`CodePr`) REFERENCES `produit` (`CodePr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Vente_has_Produit_Vente1` FOREIGN KEY (`CodeV`) REFERENCES `vente` (`CodeV`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `vente`
--
ALTER TABLE `vente`
  ADD CONSTRAINT `fk_Vente_Personne1` FOREIGN KEY (`CodeResp`) REFERENCES `personne` (`CodeP`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
