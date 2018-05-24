-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `banlist`;
CREATE TABLE `banlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `moderator_id` int(11) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `moderator_id` (`moderator_id`),
  CONSTRAINT `banlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `banlist_ibfk_2` FOREIGN KEY (`moderator_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `betting`;
CREATE TABLE `betting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `rate` float NOT NULL,
  `pc_target` float NOT NULL,
  `pc_jackpot` float NOT NULL,
  `pc_transaction` float NOT NULL,
  `pc_keep` float NOT NULL,
  `pc_organizer` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `betting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `coment`;
CREATE TABLE `coment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dispute_id` int(11) NOT NULL,
  `text` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `dispute_id` (`dispute_id`),
  CONSTRAINT `coment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `coment_ibfk_2` FOREIGN KEY (`dispute_id`) REFERENCES `dispute` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `dispute`;
CREATE TABLE `dispute` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `img` varchar(255) NOT NULL,
  `rate` float NOT NULL,
  `total` float NOT NULL,
  `type` tinyint(2) NOT NULL,
  `active` tinyint(2) NOT NULL DEFAULT '0',
  `executor_id` int(11) DEFAULT NULL,
  `initiator_id` int(11) DEFAULT NULL,
  `moderator_id` int(11) NOT NULL,
  `date_start` datetime DEFAULT NULL,
  `date_end` datetime DEFAULT NULL,
  `result` tinyint(2) DEFAULT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `description` text,
  PRIMARY KEY (`id`),
  KEY `executor_id` (`executor_id`),
  KEY `initiator_id` (`initiator_id`),
  KEY `moderator_id` (`moderator_id`),
  CONSTRAINT `dispute_ibfk_1` FOREIGN KEY (`executor_id`) REFERENCES `user` (`id`),
  CONSTRAINT `dispute_ibfk_2` FOREIGN KEY (`initiator_id`) REFERENCES `user` (`id`),
  CONSTRAINT `dispute_ibfk_3` FOREIGN KEY (`moderator_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `dispute` (`id`, `name`, `img`, `rate`, `total`, `type`, `active`, `executor_id`, `initiator_id`, `moderator_id`, `date_start`, `date_end`, `result`, `status`, `description`) VALUES
(1,	'Спор 1',	'/var/www/public_html/backend/controllers/../../common/uploads/dispute/43f1799dd0dd.png',	1,	400,	3,	1,	NULL,	NULL,	1,	'2018-05-24 14:50:52',	'2018-05-24 15:10:53',	NULL,	0,	'))')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `img` = VALUES(`img`), `rate` = VALUES(`rate`), `total` = VALUES(`total`), `type` = VALUES(`type`), `active` = VALUES(`active`), `executor_id` = VALUES(`executor_id`), `initiator_id` = VALUES(`initiator_id`), `moderator_id` = VALUES(`moderator_id`), `date_start` = VALUES(`date_start`), `date_end` = VALUES(`date_end`), `result` = VALUES(`result`), `status` = VALUES(`status`), `description` = VALUES(`description`);

DROP TABLE IF EXISTS `jackpot`;
CREATE TABLE `jackpot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` float NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `date_start` datetime NOT NULL,
  `result` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `jackpot` (`id`, `total`, `status`, `date_start`, `result`) VALUES
(1,	1,	0,	'2000-01-01 12:12:00',	'0')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `total` = VALUES(`total`), `status` = VALUES(`status`), `date_start` = VALUES(`date_start`), `result` = VALUES(`result`);

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `language` (`id`, `language_id`, `alias`, `text`) VALUES
(1,	1,	'main',	'Информация на главной(какаято)'),
(2,	2,	'main',	'Information on the main\r\n'),
(3,	3,	'main',	'主要信息\r\n'),
(4,	0,	'main2',	'Тра тата))')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `language_id` = VALUES(`language_id`), `alias` = VALUES(`alias`), `text` = VALUES(`text`);

DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `user_id` int(11) NOT NULL,
  `target_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `result` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `lottery`;
CREATE TABLE `lottery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `total` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '1',
  `date_start` datetime NOT NULL,
  `result` varchar(10) DEFAULT NULL,
  `description` text,
  `rate` float NOT NULL,
  `name_prize` varchar(32) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lottery` (`id`, `name`, `total`, `status`, `date_start`, `result`, `description`, `rate`, `name_prize`, `img`) VALUES
(1,	'Розыгрыш ',	0,	1,	'2018-05-26 08:09:00',	NULL,	'Будет разыгран товар ))',	0.1,	'Iphone X 64Gb',	'/var/www/public_html/backend/controllers/../../common/uploads/lottery/43f1799dd0dd.png')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `total` = VALUES(`total`), `status` = VALUES(`status`), `date_start` = VALUES(`date_start`), `result` = VALUES(`result`), `description` = VALUES(`description`), `rate` = VALUES(`rate`), `name_prize` = VALUES(`name_prize`), `img` = VALUES(`img`);

DROP TABLE IF EXISTS `modification`;
CREATE TABLE `modification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `data` float NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `modification` (`id`, `name`, `data`, `description`) VALUES
(1,	'% в фонд текущей лотереи',	1,	'Процентов от ставки плюхнется в фонд текшей лотереи'),
(2,	'% в Джекпот ',	0.2,	'% в Джекпот - общий фонд, который будет разыгрываться, к примеру, раз в месяц между всеми игроками'),
(3,	'% комиссии за транзакцию от биржи',	0.001,	'биржа https://bitshares.org/ берет комиссию за транзакцию'),
(4,	'% на содержание сайта',	5,	'5% на содержание сайта и на зп модераторам'),
(5,	'% организаторам споров.',	1,	'1 % организаторам споров.')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `data` = VALUES(`data`), `description` = VALUES(`description`);

DROP TABLE IF EXISTS `online`;
CREATE TABLE `online` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dispute_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `dispute_id` (`dispute_id`),
  CONSTRAINT `online_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `online_ibfk_2` FOREIGN KEY (`dispute_id`) REFERENCES `dispute` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `tote`;
CREATE TABLE `tote` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dispute_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `winner_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `dispute_id` (`dispute_id`),
  KEY `user_id` (`user_id`),
  KEY `winner_id` (`winner_id`),
  CONSTRAINT `tote_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `tote_ibfk_4` FOREIGN KEY (`winner_id`) REFERENCES `user` (`id`),
  CONSTRAINT `tote_ibfk_5` FOREIGN KEY (`dispute_id`) REFERENCES `dispute` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `target_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `url`;
CREATE TABLE `url` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `target_id` int(11) NOT NULL,
  `type` varchar(32) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `auth_key` varchar(64) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `balance` float DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `wallet` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `phone`, `type`, `balance`, `avatar`, `wallet`, `file`) VALUES
(1,	'admin',	'aJjPiZZkc1KSFbGzqjot7kCMMPHAFATy',	'$2y$13$btNrg8M46QaHyxDeh6GVE.YuaY4u3Rbds5K2OubH7PZii2z8VaC/6',	NULL,	'admin@admin.com',	1,	1526915570,	1526915570,	NULL,	0,	NULL,	NULL,	NULL,	NULL),
(2,	'root',	'USa0h80IbiOH9p-lSFFfAl7yvFswoQ0I',	'$2y$13$HgHvhQyMWVROC04blcNrqukRyJQKtiHv1KOcf20DewLsKaJ.n20.a',	NULL,	'root@root.com',	1,	1526983224,	1526983224,	NULL,	0,	NULL,	NULL,	NULL,	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `username` = VALUES(`username`), `auth_key` = VALUES(`auth_key`), `password_hash` = VALUES(`password_hash`), `password_reset_token` = VALUES(`password_reset_token`), `email` = VALUES(`email`), `status` = VALUES(`status`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`), `phone` = VALUES(`phone`), `type` = VALUES(`type`), `balance` = VALUES(`balance`), `avatar` = VALUES(`avatar`), `wallet` = VALUES(`wallet`), `file` = VALUES(`file`);

-- 2018-05-24 15:16:17
