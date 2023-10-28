CREATE DATABASE `todoapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `todoapp`.`users` 
(`uid` BIGINT NOT NULL AUTO_INCREMENT ,
`user_name` VARCHAR(16) NOT NULL , 
`password` VARCHAR(200) NOT NULL , 
PRIMARY KEY (`uid`)) ENGINE = InnoDB;

ALTER TABLE `todoapp`.`users` ADD INDEX(`user_name`);
ALTER TABLE `todoapp`.`users` ADD INDEX(`password`);