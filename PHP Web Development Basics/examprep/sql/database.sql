CREATE DATABASE `exam_prep` /*!40100 COLLATE 'utf8_general_ci' */;

USE `exam_prep`;

CREATE TABLE `users` (
  `user_id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE INDEX `username` (`username`)
)
  ENGINE=InnoDB
;

CREATE TABLE `categories` (
  `category_id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`category_id`)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB
;


CREATE TABLE `tasks` (
  `task_id` INT(35) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `description` TEXT NOT NULL,
  `location` VARCHAR(100) NOT NULL,
  `user_id` INT(11) NOT NULL,
  `category_id` INT(11) NOT NULL,
  `started_on` TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
  `due_date` TIMESTAMP NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`task_id`),
  INDEX `FK_tasks_users` (`user_id`),
  INDEX `FK_tasks_categories` (`category_id`),
  CONSTRAINT `FK_tasks_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`),
  CONSTRAINT `FK_tasks_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB
;


INSERT INTO `categories` (`name`) VALUES ('Anniversary');
INSERT INTO `categories` (`name`) VALUES ('Birthday');
INSERT INTO `categories` (`name`) VALUES ('Business');