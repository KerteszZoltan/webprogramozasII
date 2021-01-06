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
    `Tleiras` TEXT CHARACTER SET utf8 COLLATE ut8f_hungarian_ci NOT NULL , 
    `TActive` INT NOT NULL DEFAULT '1' , 
PRIMARY KEY (`TID`)) ENGINE = InnoDB;

