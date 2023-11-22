CREATE DATABASE `todoapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE `todoapp`.`users` 
(`uid` BIGINT NOT NULL AUTO_INCREMENT ,
`user_name` VARCHAR(16) NOT NULL , 
`password` VARCHAR(200) NOT NULL , 
PRIMARY KEY (`uid`)) ENGINE = InnoDB;

ALTER TABLE `todoapp`.`users` ADD INDEX(`user_name`);
ALTER TABLE `todoapp`.`users` ADD INDEX(`password`);

CREATE TABLE `todoapp`.`todolist` 
(`id` INT NOT NULL AUTO_INCREMENT,
`user_id` BIGINT NOT NULL, 
`tasks` VARCHAR(200) NOT NULL, 
`status` TINYINT NOT NULL, 
`important` TINYINT NOT NULL, 
PRIMARY KEY (`id`), 
FOREIGN KEY (user_id) REFERENCES users(uid)) 
ENGINE = InnoDB;

CREATE TABLE todoapp.notes 
(`id` int(11) NOT NULL AUTO_INCREMENT,
`userid` bigint(20) NOT NULL,
`title` varchar(255) NOT NULL,
`description` text NOT NULL,
PRIMARY KEY (`id`), 
FOREIGN KEY (userid) REFERENCES users(uid)
)ENGINE = InnoDB;
