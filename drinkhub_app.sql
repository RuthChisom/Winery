-- Adminer 4.7.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `drink`;
CREATE TABLE `drink` (
  `drk_id` int(11) NOT NULL AUTO_INCREMENT,
  `drk_category_id` int(11) NOT NULL,
  `drk_name` text NOT NULL,
  `drk_price` float NOT NULL,
  `drk_description` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`drk_id`),
  KEY `drk_category_id` (`drk_category_id`),
  CONSTRAINT `drink_ibfk_1` FOREIGN KEY (`drk_category_id`) REFERENCES `category` (`cat_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_email` varchar(100) NOT NULL,
  `usr_password` varchar(200) NOT NULL,
  `usr_firstname` varchar(100) NOT NULL,
  `usr_lastname` varchar(100) NOT NULL,
  `usr_phone` varchar(50) NOT NULL,
  `usr_role` enum('default','admin') NOT NULL DEFAULT 'default',
  `usr_registered_date` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
  `usr_updated_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usr_last_login` datetime DEFAULT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`usr_id`, `usr_email`, `usr_password`, `usr_firstname`, `usr_lastname`, `usr_phone`, `usr_role`, `usr_registered_date`, `usr_updated_time`, `usr_last_login`) VALUES
(1,	'jerry@yahoo.com',	'nj123',	'Jerry',	'Ndukwe',	'08100591807',	'admin',	'2022-11-09 16:32:13',	'2022-11-09 16:32:13',	NULL);

-- 2022-11-09 16:32:36
