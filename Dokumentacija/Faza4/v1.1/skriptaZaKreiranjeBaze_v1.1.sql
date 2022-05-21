-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema psi_konacno
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema psi_konacno
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `psi_konacno` DEFAULT CHARACTER SET utf8 ;
USE `psi_konacno` ;

-- -----------------------------------------------------
-- Table `psi_konacno`.`Registrovanikorisnik`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `psi_konacno`.`Registrovanikorisnik` (
  `IdRK` INT NOT NULL AUTO_INCREMENT,
  `korisnickoIme` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `tipKorisnika` CHAR(1) NOT NULL,
  `lozinka` VARCHAR(45) NOT NULL,
  `brojTelefona` VARCHAR(45) NOT NULL,
  `adresa` VARCHAR(45) NOT NULL,
  `jeObrisan` TINYINT NULL DEFAULT NULL,
  `jeOdobrenZahtevZaRegistraciju` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`IdRK`),
  UNIQUE INDEX `korisnickoIme_UNIQUE` (`korisnickoIme` ASC) ,
  UNIQUE INDEX `email_UNIQUE` (`email` ASC) ,
  UNIQUE INDEX `brojTelefona_UNIQUE` (`brojTelefona` ASC) ,
  UNIQUE INDEX `IdRK_UNIQUE` (`IdRK` ASC) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `psi_konacno`.`KorisnikMenadzer`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `psi_konacno`.`KorisnikMenadzer` (
  `IdRK` INT NOT NULL,
  `ime` VARCHAR(45) NOT NULL,
  `prezime` VARCHAR(45) NOT NULL,
  `pol` CHAR(1) NOT NULL,
  PRIMARY KEY (`IdRK`),
  UNIQUE INDEX `IdRK_UNIQUE` (`IdRK` ASC) ,
  CONSTRAINT `IdRK_KorisnikMenadzer`
    FOREIGN KEY (`IdRK`)
    REFERENCES `psi_konacno`.`Registrovanikorisnik` (`IdRK`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `psi_konacno`.`Salon`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `psi_konacno`.`Salon` (
  `IdSalon` INT NOT NULL,
  `naziv` VARCHAR(45) NOT NULL,
  `slika` VARCHAR(500) NOT NULL,
  `ponedeljak-petakOD` TIME NOT NULL,
  `ponedeljak-petakDO` TIME NOT NULL,
  `subotaOD` TIME NULL DEFAULT NULL,
  `subotaDO` TIME NULL DEFAULT NULL,
  `nedeljaOD` TIME NULL DEFAULT NULL,
  `nedeljaDO` TIME NULL DEFAULT NULL,
  `brojOcena` INT NOT NULL DEFAULT '0',
  `ukupanZbirOcena` INT NOT NULL DEFAULT '0',
  `brojUsluga` INT NOT NULL DEFAULT '0',
  PRIMARY KEY (`IdSalon`),
  UNIQUE INDEX `IdSalon_UNIQUE` (`IdSalon` ASC) ,
  CONSTRAINT `IdRK_Salon`
    FOREIGN KEY (`IdSalon`)
    REFERENCES `psi_konacno`.`Registrovanikorisnik` (`IdRK`)
    ON DELETE RESTRICT
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb3;


-- -----------------------------------------------------
-- Table `psi_konacno`.`Usluga`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `psi_konacno`.`Usluga` (
  `IdUsluga` INT NOT NULL AUTO_INCREMENT,
  `Naziv` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`IdUsluga`),
  UNIQUE INDEX `Naziv_UNIQUE` (`Naziv` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `psi_konacno`.`CenaUsluge`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `psi_konacno`.`CenaUsluge` (
  `IdSalon` INT NOT NULL,
  `IdUsluga` INT NOT NULL,
  `cenaVelikiPas` INT NOT NULL DEFAULT 0,
  `cenaSrednjiPas` INT NOT NULL DEFAULT 0,
  `cenaMaliPas` INT NOT NULL DEFAULT 0,
  `IdCenaUsluge` INT NOT NULL,
  PRIMARY KEY (`IdCenaUsluge`),
  INDEX `IdUsluga_CenaUsluge_idx` (`IdUsluga` ASC) ,
  UNIQUE INDEX `IdCenaUsluge_UNIQUE` (`IdCenaUsluge` ASC) ,
  CONSTRAINT `IdSalon_CenaUsluge`
    FOREIGN KEY (`IdSalon`)
    REFERENCES `psi_konacno`.`Salon` (`IdSalon`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `IdUsluga_CenaUsluge`
    FOREIGN KEY (`IdUsluga`)
    REFERENCES `psi_konacno`.`Usluga` (`IdUsluga`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `psi_konacno`.`Ocenio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `psi_konacno`.`Ocenio` (
  `IdOcenio` INT NOT NULL,
  `IdKorisnik` INT NOT NULL,
  `IdSalon` INT NOT NULL,
  `Ocena` INT NOT NULL,
  PRIMARY KEY (`IdOcenio`),
  INDEX `IdSalon_Ocenio_idx` (`IdSalon` ASC) ,
  UNIQUE INDEX `IdOcenio_UNIQUE` (`IdOcenio` ASC) ,
  CONSTRAINT `IdRK_Ocenio`
    FOREIGN KEY (`IdKorisnik`)
    REFERENCES `psi_konacno`.`KorisnikMenadzer` (`IdRK`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `IdSalon_Ocenio`
    FOREIGN KEY (`IdSalon`)
    REFERENCES `psi_konacno`.`Salon` (`IdSalon`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `psi_konacno`.`OstavioRecenziju`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `psi_konacno`.`OstavioRecenziju` (
  `IdRecenzija` INT NOT NULL AUTO_INCREMENT,
  `IdKorisnik` INT NOT NULL,
  `IdSalon` INT NOT NULL,
  `sadrzaj` LONGTEXT NOT NULL,
  PRIMARY KEY (`IdRecenzija`),
  INDEX `IdRK_OstavioRecenziju_idx` (`IdKorisnik` ASC) ,
  INDEX `IdSalon_OstavioRecenziju_idx` (`IdSalon` ASC) ,
  CONSTRAINT `IdRK_OstavioRecenziju`
    FOREIGN KEY (`IdKorisnik`)
    REFERENCES `psi_konacno`.`KorisnikMenadzer` (`IdRK`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `IdSalon_OstavioRecenziju`
    FOREIGN KEY (`IdSalon`)
    REFERENCES `psi_konacno`.`Salon` (`IdSalon`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `psi_konacno`.`Tretman`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `psi_konacno`.`Tretman` (
  `IdTretman` INT NOT NULL AUTO_INCREMENT,
  `IdSalon` INT NOT NULL,
  `rasa` VARCHAR(45) NOT NULL,
  `ime` VARCHAR(45) NOT NULL,
  `brojTelefona` VARCHAR(45) NOT NULL,
  `velicina` VARCHAR(45) NOT NULL,
  `idKorisnik` INT NOT NULL,
  `jePotvrdjenKrajUsluge` TINYINT NULL,
  `jePotvrdjenaRezervacija` TINYINT NULL,
  `DatumVreme` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`IdTretman`),
  UNIQUE INDEX `brojTelefona_UNIQUE` (`brojTelefona` ASC) ,
  INDEX `IdRK_Tretman_idx` (`idKorisnik` ASC) ,
  INDEX `IdSalon_Tretman_idx` (`IdSalon` ASC) ,
  CONSTRAINT `IdRK_Tretman`
    FOREIGN KEY (`idKorisnik`)
    REFERENCES `psi_konacno`.`KorisnikMenadzer` (`IdRK`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `IdSalon_Tretman`
    FOREIGN KEY (`IdSalon`)
    REFERENCES `psi_konacno`.`Salon` (`IdSalon`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `psi_konacno`.`Sadrzi`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `psi_konacno`.`Sadrzi` (
  `IdUsluga` INT NOT NULL,
  `IdTretman` INT NOT NULL,
  `IdSadrzi` INT NOT NULL,
  PRIMARY KEY (`IdSadrzi`),
  INDEX `IdTretman_Izabrao_idx` (`IdTretman` ASC) ,
  UNIQUE INDEX `IdSadrzi_UNIQUE` (`IdSadrzi` ASC) ,
  CONSTRAINT `IdUsluga_Izabrao`
    FOREIGN KEY (`IdUsluga`)
    REFERENCES `psi_konacno`.`Usluga` (`IdUsluga`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `IdTretman_Izabrao`
    FOREIGN KEY (`IdTretman`)
    REFERENCES `psi_konacno`.`Tretman` (`IdTretman`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
