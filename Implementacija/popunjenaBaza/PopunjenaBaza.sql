-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Jun 02, 2022 at 09:23 PM
-- Server version: 8.0.18
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `psi_konacno`
--
CREATE DATABASE IF NOT EXISTS `psi_konacno` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `psi_konacno`;

-- --------------------------------------------------------

--
-- Table structure for table `cenausluge`
--

DROP TABLE IF EXISTS `cenausluge`;
CREATE TABLE IF NOT EXISTS `cenausluge` (
  `IdCenaUsluge` int(11) NOT NULL AUTO_INCREMENT,
  `IdSalon` int(11) NOT NULL,
  `IdUsluga` int(11) NOT NULL,
  `cenaVelikiPas` int(11) NOT NULL DEFAULT '0',
  `cenaSrednjiPas` int(11) NOT NULL DEFAULT '0',
  `cenaMaliPas` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdCenaUsluge`),
  UNIQUE KEY `IdCenaUsluge_UNIQUE` (`IdCenaUsluge`),
  KEY `IdUsluga_CenaUsluge_idx` (`IdUsluga`),
  KEY `IdSalon_CenaUsluge` (`IdSalon`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cenausluge`
--

INSERT INTO `cenausluge` (`IdCenaUsluge`, `IdSalon`, `IdUsluga`, `cenaVelikiPas`, `cenaSrednjiPas`, `cenaMaliPas`) VALUES
(1, 8, 1, 1000, 1300, 1500),
(2, 8, 5, 300, 400, 500),
(3, 9, 1, 1000, 1500, 2000),
(4, 9, 5, 300, 350, 400),
(5, 9, 6, 1800, 2000, 2200),
(6, 10, 3, 200, 200, 200),
(7, 10, 4, 200, 200, 200),
(8, 11, 8, 400, 500, 600),
(9, 11, 7, 200, 200, 200),
(10, 11, 1, 1000, 1300, 1500),
(11, 12, 8, 400, 500, 600),
(12, 12, 3, 200, 200, 200),
(13, 12, 7, 200, 200, 200),
(14, 12, 1, 1000, 1500, 2000),
(15, 12, 5, 400, 500, 600),
(16, 12, 6, 1500, 1800, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `korisnikmenadzer`
--

DROP TABLE IF EXISTS `korisnikmenadzer`;
CREATE TABLE IF NOT EXISTS `korisnikmenadzer` (
  `IdRK` int(11) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `prezime` varchar(45) NOT NULL,
  `pol` char(1) NOT NULL,
  PRIMARY KEY (`IdRK`),
  UNIQUE KEY `IdRK_UNIQUE` (`IdRK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnikmenadzer`
--

INSERT INTO `korisnikmenadzer` (`IdRK`, `ime`, `prezime`, `pol`) VALUES
(1, 'Sara', 'Jovanović', 'Ž'),
(4, 'Jovan', 'Petrović', 'M'),
(5, 'Milica', 'Lazić', 'Ž'),
(6, 'Nadja', 'Kostić', 'Ž'),
(7, 'Miloš', 'Danilović', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `ocenio`
--

DROP TABLE IF EXISTS `ocenio`;
CREATE TABLE IF NOT EXISTS `ocenio` (
  `IdOcenio` int(11) NOT NULL AUTO_INCREMENT,
  `IdKorisnik` int(11) NOT NULL,
  `IdSalon` int(11) NOT NULL,
  `Ocena` int(11) NOT NULL,
  `IdTretman` int(11) NOT NULL,
  PRIMARY KEY (`IdOcenio`),
  UNIQUE KEY `IdOcenio_UNIQUE` (`IdOcenio`),
  KEY `IdSalon_Ocenio_idx` (`IdSalon`),
  KEY `IdRK_Ocenio` (`IdKorisnik`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ocenio`
--

INSERT INTO `ocenio` (`IdOcenio`, `IdKorisnik`, `IdSalon`, `Ocena`, `IdTretman`) VALUES
(1, 7, 12, 5, 1),
(2, 4, 11, 4, 4),
(3, 7, 12, 5, 3),
(4, 5, 12, 4, 2),
(5, 5, 11, 5, 6),
(6, 4, 9, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ostaviorecenziju`
--

DROP TABLE IF EXISTS `ostaviorecenziju`;
CREATE TABLE IF NOT EXISTS `ostaviorecenziju` (
  `IdRecenzija` int(11) NOT NULL AUTO_INCREMENT,
  `IdKorisnik` int(11) NOT NULL,
  `IdSalon` int(11) NOT NULL,
  `sadrzaj` longtext NOT NULL,
  PRIMARY KEY (`IdRecenzija`),
  KEY `IdRK_OstavioRecenziju_idx` (`IdKorisnik`),
  KEY `IdSalon_OstavioRecenziju_idx` (`IdSalon`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ostaviorecenziju`
--

INSERT INTO `ostaviorecenziju` (`IdRecenzija`, `IdKorisnik`, `IdSalon`, `sadrzaj`) VALUES
(1, 7, 12, 'Salon je veoma čist,osoblje je veoma ljubazno i dobro rade svoj posao'),
(2, 5, 12, 'Svidelo mi se kako su mi sredili ljubimca'),
(3, 4, 9, 'Preporučujem salon, izvrsno rade svoj posao'),
(4, 5, 11, 'Jako mi se svidelo kako su mi doterali psa, pritom salon je veoma čist i nalazi se na dobroj lokaciji'),
(5, 4, 11, 'Odlican salon, sve preporuke');

-- --------------------------------------------------------

--
-- Table structure for table `registrovanikorisnik`
--

DROP TABLE IF EXISTS `registrovanikorisnik`;
CREATE TABLE IF NOT EXISTS `registrovanikorisnik` (
  `IdRK` int(11) NOT NULL AUTO_INCREMENT,
  `korisnickoIme` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tipKorisnika` char(1) NOT NULL,
  `lozinka` varchar(45) NOT NULL,
  `brojTelefona` varchar(45) NOT NULL,
  `adresa` varchar(45) NOT NULL,
  `jeObrisan` tinyint(4) DEFAULT NULL,
  `jeOdobrenZahtevZaRegistraciju` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`IdRK`),
  UNIQUE KEY `korisnickoIme_UNIQUE` (`korisnickoIme`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `brojTelefona_UNIQUE` (`brojTelefona`),
  UNIQUE KEY `IdRK_UNIQUE` (`IdRK`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registrovanikorisnik`
--

INSERT INTO `registrovanikorisnik` (`IdRK`, `korisnickoIme`, `email`, `tipKorisnika`, `lozinka`, `brojTelefona`, `adresa`, `jeObrisan`, `jeOdobrenZahtevZaRegistraciju`) VALUES
(1, 'sara', 'sara@gmail.com', 'K', 'Sara123', '+3816656721', 'Dalmatinska 41', NULL, NULL),
(3, 'admin', 'admin@gmail.com', 'A', 'Admin12345!', '+3812266789', 'Vojislava Ilića 57', NULL, 1),
(4, 'jovan', 'jovan@gmail.com', 'K', 'jovan#3', '+3817823567', 'Španskih boraca 23', NULL, 1),
(5, 'milica', 'milica@gmail.com', 'K', 'milica555', '+3819567492', 'Mileševska 10', NULL, 1),
(6, 'nadja', 'nadja@gmail.com', 'K', 'nadja777', '+3816223491', 'Bačка 8', NULL, NULL),
(7, 'milos', 'milos@gmail.com', 'K', 'milosD2', '+3819034718', 'Vitanovačка 88', 1, 1),
(8, 'petsBeaty', 'pets.beaty@gmail.com', 'S', 'petsBeaty111', '+3819467823', 'Braće Jerković 56', NULL, NULL),
(9, 'veselaNjuskica', 'vesela.njuskica@gmail.com', 'S', 'vesela123', '+3812390456', 'Palmotićeva 18', NULL, 1),
(10, 'petCare', 'pet.care@gmail.com', 'S', 'petCare123', '+3812678123', 'Beogradska 22', NULL, 1),
(11, 'teddyLand', 'teddy.land@gmail.com', 'S', 'teddyLand789', '+3815630234', 'Molerova 45', NULL, 1),
(12, 'petHouse', 'pet.house@gmail.com', 'S', 'petHouse123', '+3816093419', 'Terazije 5', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sadrzi`
--

DROP TABLE IF EXISTS `sadrzi`;
CREATE TABLE IF NOT EXISTS `sadrzi` (
  `IdSadrzi` int(11) NOT NULL AUTO_INCREMENT,
  `IdUsluga` int(11) NOT NULL,
  `IdTretman` int(11) NOT NULL,
  PRIMARY KEY (`IdSadrzi`),
  UNIQUE KEY `IdSadrzi_UNIQUE` (`IdSadrzi`),
  KEY `IdTretman_Izabrao_idx` (`IdTretman`),
  KEY `IdUsluga_Izabrao` (`IdUsluga`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sadrzi`
--

INSERT INTO `sadrzi` (`IdSadrzi`, `IdUsluga`, `IdTretman`) VALUES
(1, 3, 1),
(2, 5, 1),
(3, 8, 2),
(4, 1, 2),
(5, 6, 3),
(6, 7, 4),
(7, 5, 5),
(8, 1, 6),
(9, 8, 6);

-- --------------------------------------------------------

--
-- Table structure for table `salon`
--

DROP TABLE IF EXISTS `salon`;
CREATE TABLE IF NOT EXISTS `salon` (
  `IdSalon` int(11) NOT NULL,
  `naziv` varchar(45) NOT NULL,
  `slika` varchar(500) NOT NULL,
  `ponedeljak-petakOD` time NOT NULL,
  `ponedeljak-petakDO` time NOT NULL,
  `subotaOD` time DEFAULT NULL,
  `subotaDO` time DEFAULT NULL,
  `nedeljaOD` time DEFAULT NULL,
  `nedeljaDO` time DEFAULT NULL,
  `brojOcena` int(11) NOT NULL DEFAULT '0',
  `ukupanZbirOcena` int(11) NOT NULL DEFAULT '0',
  `brojUsluga` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdSalon`),
  UNIQUE KEY `IdSalon_UNIQUE` (`IdSalon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `salon`
--

INSERT INTO `salon` (`IdSalon`, `naziv`, `slika`, `ponedeljak-petakOD`, `ponedeljak-petakDO`, `subotaOD`, `subotaDO`, `nedeljaOD`, `nedeljaDO`, `brojOcena`, `ukupanZbirOcena`, `brojUsluga`) VALUES
(8, 'Pets Beaty', '/web/salon1.png', '10:00:00', '16:00:00', NULL, NULL, NULL, NULL, 0, 0, 2),
(9, 'Vesela Njuškica', '/web/salon2.png', '09:00:00', '17:00:00', '10:00:00', '14:00:00', NULL, NULL, 1, 5, 3),
(10, 'Pet Care', '/web/salon3.png', '10:00:00', '18:00:00', NULL, NULL, NULL, NULL, 0, 0, 2),
(11, 'Teddy Land', '/web/salon4.png', '11:00:00', '17:00:00', '11:00:00', '15:00:00', NULL, NULL, 2, 9, 3),
(12, 'Pet House', '/web/salon5.png', '09:30:00', '17:00:00', '10:00:00', '14:00:00', '10:00:00', '14:00:00', 3, 14, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tretman`
--

DROP TABLE IF EXISTS `tretman`;
CREATE TABLE IF NOT EXISTS `tretman` (
  `IdTretman` int(11) NOT NULL AUTO_INCREMENT,
  `IdSalon` int(11) NOT NULL,
  `rasa` varchar(45) NOT NULL,
  `ime` varchar(45) NOT NULL,
  `brojTelefona` varchar(45) NOT NULL,
  `velicina` varchar(45) NOT NULL,
  `idKorisnik` int(11) NOT NULL,
  `jePotvrdjenKrajUsluge` tinyint(4) DEFAULT NULL,
  `jePotvrdjenaRezervacija` tinyint(4) DEFAULT NULL,
  `DatumVreme` varchar(45) NOT NULL,
  `uzrast` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `napomena` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`IdTretman`),
  KEY `IdRK_Tretman_idx` (`idKorisnik`),
  KEY `IdSalon_Tretman_idx` (`IdSalon`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tretman`
--

INSERT INTO `tretman` (`IdTretman`, `IdSalon`, `rasa`, `ime`, `brojTelefona`, `velicina`, `idKorisnik`, `jePotvrdjenKrajUsluge`, `jePotvrdjenaRezervacija`, `DatumVreme`, `uzrast`, `napomena`) VALUES
(1, 12, 'Pudlica', 'Toto', '+3819034718', 'M', 7, 1, 1, '2021-04-02T12:12', '2 godine', 'nema'),
(2, 12, 'Čivava', 'Kiki', '+3819567492', 'S', 5, 1, 1, '2021-03-03T12:12', '3 godine', NULL),
(3, 12, 'Pudlica', 'Toto', '+3819034718', 'M', 7, 1, 1, '2021-12-10T13:00', '2 godine', NULL),
(4, 11, 'Mešanac', 'Badi', '+3817823567', 'M', 4, 1, 1, '2021-04-01T11:30', '6 meseci', NULL),
(5, 9, 'Mešanac', 'Badi', '+3817823567', 'M', 4, 1, 1, '2021-10-03T11:30', '1 godina', NULL),
(6, 11, 'Čivava', 'Kiki', '+3819567492', 'M', 5, 1, 1, '2022-02-12T11:30', ' 3 godine', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usluga`
--

DROP TABLE IF EXISTS `usluga`;
CREATE TABLE IF NOT EXISTS `usluga` (
  `IdUsluga` int(11) NOT NULL AUTO_INCREMENT,
  `Naziv` varchar(45) NOT NULL,
  PRIMARY KEY (`IdUsluga`),
  UNIQUE KEY `Naziv_UNIQUE` (`Naziv`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `usluga`
--

INSERT INTO `usluga` (`IdUsluga`, `Naziv`) VALUES
(8, 'Češljanje'),
(3, 'Čišćenje očiju'),
(4, 'Čišćenje ušiju'),
(6, 'Frizura'),
(5, 'Kupanje'),
(1, 'Šišanje'),
(7, 'Sređivanje noktiju');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cenausluge`
--
ALTER TABLE `cenausluge`
  ADD CONSTRAINT `IdSalon_CenaUsluge` FOREIGN KEY (`IdSalon`) REFERENCES `salon` (`IdSalon`) ON UPDATE CASCADE,
  ADD CONSTRAINT `IdUsluga_CenaUsluge` FOREIGN KEY (`IdUsluga`) REFERENCES `usluga` (`IdUsluga`) ON UPDATE CASCADE;

--
-- Constraints for table `korisnikmenadzer`
--
ALTER TABLE `korisnikmenadzer`
  ADD CONSTRAINT `IdRK_KorisnikMenadzer` FOREIGN KEY (`IdRK`) REFERENCES `registrovanikorisnik` (`IdRK`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `ocenio`
--
ALTER TABLE `ocenio`
  ADD CONSTRAINT `IdRK_Ocenio` FOREIGN KEY (`IdKorisnik`) REFERENCES `korisnikmenadzer` (`IdRK`) ON UPDATE CASCADE,
  ADD CONSTRAINT `IdSalon_Ocenio` FOREIGN KEY (`IdSalon`) REFERENCES `salon` (`IdSalon`) ON UPDATE CASCADE;

--
-- Constraints for table `ostaviorecenziju`
--
ALTER TABLE `ostaviorecenziju`
  ADD CONSTRAINT `IdRK_OstavioRecenziju` FOREIGN KEY (`IdKorisnik`) REFERENCES `korisnikmenadzer` (`IdRK`) ON UPDATE CASCADE,
  ADD CONSTRAINT `IdSalon_OstavioRecenziju` FOREIGN KEY (`IdSalon`) REFERENCES `salon` (`IdSalon`) ON UPDATE CASCADE;

--
-- Constraints for table `sadrzi`
--
ALTER TABLE `sadrzi`
  ADD CONSTRAINT `IdTretman_Izabrao` FOREIGN KEY (`IdTretman`) REFERENCES `tretman` (`IdTretman`) ON UPDATE CASCADE,
  ADD CONSTRAINT `IdUsluga_Izabrao` FOREIGN KEY (`IdUsluga`) REFERENCES `usluga` (`IdUsluga`) ON UPDATE CASCADE;

--
-- Constraints for table `salon`
--
ALTER TABLE `salon`
  ADD CONSTRAINT `IdRK_Salon` FOREIGN KEY (`IdSalon`) REFERENCES `registrovanikorisnik` (`IdRK`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `tretman`
--
ALTER TABLE `tretman`
  ADD CONSTRAINT `IdRK_Tretman` FOREIGN KEY (`idKorisnik`) REFERENCES `korisnikmenadzer` (`IdRK`) ON UPDATE CASCADE,
  ADD CONSTRAINT `IdSalon_Tretman` FOREIGN KEY (`IdSalon`) REFERENCES `salon` (`IdSalon`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
