create database SoftUni;

CREATE TABLE `students` (
	`First Name` VARCHAR(50) NOT NULL,
	`Second Name` VARCHAR(50) NOT NULL,
	`StudentNumber` INT(11) NOT NULL AUTO_INCREMENT,
	`Phone` VARCHAR(50) NOT NULL,
	`Add Date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
	`Last Change` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	`IsActive` ENUM('Y','N') NULL DEFAULT 'N',
	PRIMARY KEY (`StudentNumber`)
)
ENGINE=InnoDB
;

drop table Students;

drop database SoftUni;