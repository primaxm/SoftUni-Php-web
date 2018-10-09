
--1. Create Database
CREATE TABLE `minions` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL,
	`age` TINYINT(4) NULL DEFAULT NULL,
	`town_id` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci';

CREATE TABLE `towns` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(50) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci';

--2. Insert Records in Both Tables
INSERT INTO `towns` (`id`, `name`) VALUES ('1', 'Sofia');
INSERT INTO `towns` (`id`, `name`) VALUES ('2', 'Plovdiv');
INSERT INTO `towns` (`id`, `name`) VALUES ('3', 'Varna');

INSERT INTO `minions` (`id`, `name`, `age`, `town_id`) VALUES ('1', 'Kevin', '22', '1');
INSERT INTO `minions` (`id`, `name`, `age`, `town_id`) VALUES ('2', 'Bob', '15', '3');
INSERT INTO `minions` (`id`, `name`, `age`, `town_id`) VALUES ('3', 'Steward', NULL, '2');

--3. Truncate Table Minions
TRUNCATE TABLE minions;

--4. Drop All Tables
drop table minions;
drop table towns;

--5. Create Table People
CREATE TABLE `people` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(200) NULL,
	`picture` LONGTEXT NULL,
	`height` FLOAT NULL,
	`weight` FLOAT NULL,
	`gender` ENUM('m','f') NOT NULL,
	`birthdate` DATE NULL,
	`biography` LONGTEXT NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='utf8_general_ci'
;

INSERT INTO `people` (`name`, `height`, `weight`, `gender`, `birthdate`, `biography`) VALUES ('Ivan', '177', '67' , 'm', '2018-10-09', 'kuku');
INSERT INTO `people` (`name`, `height`, `weight`, `gender`, `birthdate`, `biography`) VALUES ('Ivan', '178', '67', 'm', '2018-11-09', 'kuku');
INSERT INTO `people` (`name`, `height`, `weight`, `gender`, `birthdate`, `biography`) VALUES ('Ivan', '179', '67', 'm', '2018-12-09', 'kuku');
INSERT INTO `people` (`name`, `height`, `weight`, `gender`, `birthdate`, `biography`) VALUES ('Ivan', '180', '67', 'm', '2018-10-05', 'kuku');
INSERT INTO `people` (`name`, `height`, `weight`, `gender`, `birthdate`, `biography`) VALUES ('Ivan', '181', '67', 'm', '2018-10-08', 'kuku');

--6. Create Table Users
CREATE TABLE `users` (
	`id` BIGINT(20) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(30) NOT NULL COLLATE 'latin1_general_ci',
	`password` VARCHAR(26) NOT NULL COLLATE 'latin1_general_ci',
	`profile_picture` LONGTEXT NULL,
	`last_login_time` DATETIME NULL DEFAULT NULL,
	`Колона 6` DATETIME NULL DEFAULT NULL,
	`is_deleted` ENUM('TRUE','FALSE') NOT NULL,
	PRIMARY KEY (`id`)
)
ENGINE=InnoDB
;

--7. Change Primary Key
ALTER TABLE users CHANGE id id BIGINT(20) NOT NULL;
ALTER TABLE users
DROP PRIMARY KEY;
ALTER TABLE users
ADD CONSTRAINT pk_users PRIMARY KEY (id,username);

--8. Find All Information About Departments
SELECT * FROM departments ORDER BY department_id ASC;

--9. Find all Department Names
SELECT name FROM departments ORDER BY department_id ASC;

--10. Find salary of Each Employee
SELECT first_name, last_name, salary FROM employees ORDER BY employee_id ASC;

--11. Find Full Name of Each Employee
SELECT first_name, middle_name, last_name FROM employees ORDER BY employee_id ASC;

--12. Find Email Address of Each Employee
SELECT CONCAT(first_name, ".", last_name, "@softuni.bg") AS full_email_address FROM employees;

--13. Find All Different Employee’s Salaries
SELECT DISTINCT salary FROM employees

--14. Find all Information About Employees
SELECT * FROM employees WHERE job_title = 'Sales Representative' ORDER BY employee_id ASC;

--15. Find Names of All Employees by salary in Range
SELECT first_name, last_name, job_title AS JobTitle FROM employees WHERE salary >= "20000" AND salary <= "30000" ORDER BY employee_id ASC;

--16. Find Names of All Employees
SELECT CONCAT (first_name, " ", middle_name, " ", last_name) AS full_name FROM employees where
salary = "25000" OR salary = "14000" OR salary = "12500" OR salary = "23600";

--17. Find All Employees Without Manager
SELECT first_name, last_name FROM employees where manager_id IS NULL;

--18. Find All Employees with salary More Than 50000
SELECT first_name, last_name, salary FROM employees where salary > "50000" ORDER BY salary DESC;

--19. Find 5 Best Paid Employees
SELECT first_name, last_name FROM employees ORDER BY salary DESC limit 5;

--20. Find All Employees Except Marketing
SELECT first_name, last_name FROM employees WHERE NOT department_id = "4";

--21. Sort Employees Table
SELECT * FROM employees ORDER BY salary DESC, first_name ASC, last_name DESC, middle_name ASC;

--22. Distinct Job Titles
SELECT DISTINCT job_title FROM employees;

--23. Find First 10 Started Projects
SELECT * FROM projects ORDER BY start_date ASC, name ASC limit 10;

--24. Last 7 Hired Employees
SELECT first_name, last_name, hire_date FROM employees ORDER BY hire_date DESC LIMIT 7;

--25.*Increase Salaries
UPDATE employees SET salary = salary * 1.12 WHERE department_id IN (1, 2, 4, 11);
SELECT salary FROM employees WHERE department_id IN (1, 2, 4, 11);

--26. All Mountain Peaks
SELECT peak_name FROM peaks ORDER BY peak_name ASC;

--27. Biggest Countries by Population
SELECT country_name, population FROM countries WHERE continent_code = 'EU' ORDER BY population DESC, country_name ASC LIMIT 30;

--28. *Countries and Currency (Euro / Not Euro)
SELECT country_name, country_code, if (currency_code = 'EUR', 'Euro', 'Not Euro') AS currency FROM countries ORDER BY country_name ASC;


