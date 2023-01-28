CREATE SCHEMA `lb4`;

CREATE TABLE `lb4`.`users` (
  `id` INT NOT NULL,
  `login` VARCHAR(45) NULL,
  `password` VARCHAR(45) NULL,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

INSERT INTO `lb4`.`users` (`id`, `login`, `password`, `name`) VALUES ('1', 'XTer', '1', 'Alex');
INSERT INTO `lb4`.`users` (`id`, `login`, `password`, `name`) VALUES ('2', 'Impala68', '12', 'Din');
INSERT INTO `lb4`.`users` (`id`, `login`, `password`, `name`) VALUES ('3', 'Brain', '123', 'Sam');