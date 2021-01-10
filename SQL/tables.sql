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
    `TActive` INT NOT NULL DEFAULT '1' , 
PRIMARY KEY (`TID`)) ENGINE = InnoDB;

DROP table IF EXISTS `hatter`;
CREATE TABLE `beadando`.`hatter` ( 
    `KID` INT NOT NULL AUTO_INCREMENT , 
    `FID` INT NOT NULL , 
    `kep` VARCHAR(255) NOT NULL , 
PRIMARY KEY (`KID`)) ENGINE = InnoDB;
