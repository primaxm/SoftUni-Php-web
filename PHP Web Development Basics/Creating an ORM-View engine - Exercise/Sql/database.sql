CREATE TABLE `users` (
  `id` INT(60) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(50) NOT NULL,
  `last_name` VARCHAR(50) NOT NULL,
  `birth_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
)
  COLLATE='utf8_general_ci'
;

ALTER TABLE `users`
  ADD UNIQUE INDEX `username` (`username`);