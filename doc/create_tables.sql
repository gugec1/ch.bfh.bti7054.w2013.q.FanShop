SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `fanshop` DEFAULT CHARACTER SET utf8 ;
USE `fanshop` ;

-- -----------------------------------------------------
-- Table `fanshop`.`categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fanshop`.`categorie` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 14
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `fanshop`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fanshop`.`user` (
  `userid` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(30) NOT NULL,
  `password` VARCHAR(30) NOT NULL,
  `lastname` VARCHAR(30) NOT NULL,
  `firstname` VARCHAR(30) NOT NULL,
  `street` VARCHAR(50) NOT NULL,
  `zip` INT(4) NOT NULL,
  `city` VARCHAR(30) NOT NULL,
  `email` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`userid`, `username`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `fanshop`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fanshop`.`order` (
  `orderid` INT(11) NOT NULL AUTO_INCREMENT,
  `userid` INT(11) NOT NULL,
  `order_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `shipping_address` VARCHAR(500) NOT NULL,
  `payment_method` VARCHAR(30) NOT NULL,
  `shipping_method` VARCHAR(30) NOT NULL,
  PRIMARY KEY (`orderid`),
  INDEX `userid` (`userid` ASC),
  CONSTRAINT `order_ibfk_1`
    FOREIGN KEY (`userid`)
    REFERENCES `fanshop`.`user` (`userid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 48
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `fanshop`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fanshop`.`products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `bezeichnung_de` VARCHAR(30) NOT NULL,
  `bezeichnung_en` VARCHAR(30) NOT NULL,
  `preis` FLOAT NOT NULL,
  `beschreibung_de` VARCHAR(1000) NOT NULL,
  `beschreibung_en` VARCHAR(1000) NOT NULL,
  `bild` VARCHAR(100) NOT NULL,
  `front` TINYINT(1) NOT NULL DEFAULT '0',
  `changeableSize` TINYINT(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  INDEX `id` (`id` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 19
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `fanshop`.`order_details`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fanshop`.`order_details` (
  `detail_id` INT(11) NOT NULL AUTO_INCREMENT,
  `order_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  `quantity` INT(11) NOT NULL,
  PRIMARY KEY (`detail_id`, `order_id`),
  INDEX `product_id` (`product_id` ASC),
  INDEX `order_id` (`order_id` ASC),
  CONSTRAINT `order_details_ibfk_2`
    FOREIGN KEY (`product_id`)
    REFERENCES `fanshop`.`products` (`id`),
  CONSTRAINT `order_details_ibfk_3`
    FOREIGN KEY (`order_id`)
    REFERENCES `fanshop`.`order` (`orderid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 229
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `fanshop`.`product_categorie`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fanshop`.`product_categorie` (
  `product_id` INT(11) NOT NULL,
  `categorie_id` INT(11) NOT NULL,
  PRIMARY KEY (`product_id`, `categorie_id`),
  INDEX `categorie_id` (`categorie_id` ASC),
  CONSTRAINT `product_categorie_ibfk_1`
    FOREIGN KEY (`categorie_id`)
    REFERENCES `fanshop`.`categorie` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `product_categorie_ibfk_2`
    FOREIGN KEY (`product_id`)
    REFERENCES `fanshop`.`products` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `fanshop`.`translations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `fanshop`.`translations` (
  `id` VARCHAR(20) NOT NULL,
  `de` VARCHAR(50) NOT NULL,
  `en` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
