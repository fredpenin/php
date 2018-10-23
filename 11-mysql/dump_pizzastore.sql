-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema pizzastore
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema pizzastore
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pizzastore` DEFAULT CHARACTER SET utf8 ;
USE `pizzastore` ;

-- -----------------------------------------------------
-- Table `pizzastore`.`pizza`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzastore`.`pizza` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `price` DECIMAL(11,2) NULL,
  `image` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pizzastore`.`size`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzastore`.`size` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `price` DECIMAL(11,2) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pizzastore`.`pizza_has_size`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzastore`.`pizza_has_size` (
  `pizza_id` INT NOT NULL,
  `size_id` INT NOT NULL,
  PRIMARY KEY (`pizza_id`, `size_id`),
  INDEX `fk_pizza_has_size_size1_idx` (`size_id` ASC),
  INDEX `fk_pizza_has_size_pizza_idx` (`pizza_id` ASC),
  CONSTRAINT `fk_pizza_has_size_pizza`
    FOREIGN KEY (`pizza_id`)
    REFERENCES `pizzastore`.`pizza` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_pizza_has_size_size1`
    FOREIGN KEY (`size_id`)
    REFERENCES `pizzastore`.`size` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pizzastore`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzastore`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `firstname` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pizzastore`.`address`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzastore`.`address` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `address` VARCHAR(45) NULL,
  `zip` VARCHAR(45) NULL,
  `city` VARCHAR(45) NULL,
  `phone` VARCHAR(45) NULL,
  `user_id` INT NOT NULL,
  PRIMARY KEY (`id`, `user_id`),
  INDEX `fk_address_user1_idx` (`user_id` ASC),
  CONSTRAINT `fk_address_user1`
    FOREIGN KEY (`user_id`)
    REFERENCES `pizzastore`.`user` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pizzastore`.`order`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzastore`.`order` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `ordered_at` DATETIME NULL,
  `reference` VARCHAR(45) NULL,
  `address_id` INT NOT NULL,
  PRIMARY KEY (`id`, `address_id`),
  INDEX `fk_order_address1_idx` (`address_id` ASC),
  CONSTRAINT `fk_order_address1`
    FOREIGN KEY (`address_id`)
    REFERENCES `pizzastore`.`address` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `pizzastore`.`order_detail`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pizzastore`.`order_detail` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `pizza_name` VARCHAR(45) NULL,
  `pizza_price` DECIMAL(11,2) NULL,
  `pizza_size` VARCHAR(45) NULL,
  `quantity` INT NULL,
  `order_id` INT NOT NULL,
  PRIMARY KEY (`id`, `order_id`),
  INDEX `fk_order_detail_order1_idx` (`order_id` ASC),
  CONSTRAINT `fk_order_detail_order1`
    FOREIGN KEY (`order_id`)
    REFERENCES `pizzastore`.`order` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;