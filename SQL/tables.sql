use beadando;

DROP table IF EXISTS `felhasznalok`;

CREATE TABLE `beadando`.`felhasznalok` ( 
    `FID` INT NOT NULL AUTO_INCREMENT , 
    `Fnev` VARCHAR(255) NOT NULL , 
    `Fjelszo` VARCHAR(255) NOT NULL , 
PRIMARY KEY (`FID`)) ENGINE = InnoDB;



DROP table IF EXISTS `todos`;

CREATE TABLE `beadando`.`todos` ( 
    `TID` INT NOT NULL AUTO_INCREMENT , 
    `FID` INT NOT NULL , 
    `Tnev` text CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL,
    `Tleiras` TEXT CHARACTER SET utf8 COLLATE ut8f_hungarian_ci NOT NULL , 
    `KID` int(11) NOT NULL,
    `TActive` INT NOT NULL DEFAULT '1' , 
PRIMARY KEY (`TID`)) ENGINE = InnoDB;

DROP table IF EXISTS `kepek`;
CREATE TABLE `beadando`.`kepek` ( 
    `KID` INT NOT NULL AUTO_INCREMENT , 
    `FID` INT NOT NULL , 
    `kep` VARCHAR(255) NOT NULL , 
PRIMARY KEY (`KID`)) ENGINE = InnoDB;

DROP table IF EXISTS `kategoriak`;
CREATE TABLE `beadando`.`kategoriak` ( 
    `KID` INT NOT NULL AUTO_INCREMENT , 
    `Knev` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_hungarian_ci NOT NULL ,
PRIMARY KEY (`KID`)) ENGINE = InnoDB;

DROP table IF EXISTS `bejegyzesek`
CREATE TABLE `beadando`.`bejegyzesek` ( 
    `BID` INT NOT NULL AUTO_INCREMENT , 
    `FID` INT NOT NULL , 
    `Btema` VARCHAR(255) NOT NULL , 
    `Bejegyzes` TEXT NOT NULL , 
    `Bletrehozas` TEXT NOT NULL , 
    `Bmodositas` TEXT NOT NULL , 
PRIMARY KEY (`BID`)) ENGINE = InnoDB;