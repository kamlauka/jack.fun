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
(3,	879789,	1,	'2018-06-01 17:00:09',	NULL),
(4,	546,	0,	'2018-06-07 09:25:20',	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `total` = VALUES(`total`), `status` = VALUES(`status`), `date_start` = VALUES(`date_start`), `result` = VALUES(`result`);

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` varchar(16) NOT NULL,
  `target_id` int(11) DEFAULT NULL,
  `alias` varchar(255) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `language` (`id`, `language_id`, `target_id`, `alias`, `text`) VALUES
(106,	'ru',	29,	'name',	'русский текст'),
(107,	'en',	29,	'name',	'engish text'),
(108,	'ch',	29,	'name',	'英文文本'),
(109,	'ru',	29,	'description',	'русский текст'),
(110,	'en',	29,	'description',	'engish text'),
(111,	'ch',	29,	'description',	'英文文本'),
(112,	'ru',	29,	'prize',	'русский текст'),
(113,	'en',	29,	'prize',	'engish text'),
(114,	'ch',	29,	'prize',	'英文文本')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `language_id` = VALUES(`language_id`), `target_id` = VALUES(`target_id`), `alias` = VALUES(`alias`), `text` = VALUES(`text`);

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
(29,	'106,107,108,',	0,	1,	'2018-05-30 19:30:10',	NULL,	'109,110,111,',	2,	'112,113,114,',	'hg')
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
(1,	'% в фонд текущей лотереи',	2,	'Процентов от ставки плюхнется в фонд текшей лотереи'),
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
  `phone` varchar(32) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `balance` float DEFAULT '0',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `wallet` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `phone`, `type`, `balance`, `avatar`, `wallet`, `file`) VALUES
(1,	'admin',	'A1qwgmpDchz5AztmbE-YOaTOLZZkQmDm',	'$2y$13$oMa6rChD.bP0pDJUlVQHr.eP5Lm8eqBzAW0rd3VCWVRqCFaYe.S1O',	NULL,	'admin@admin.com',	1,	1526915570,	1527671490,	'0969361424',	2,	NULL,	'',	'',	''),
(2,	'root',	'USa0h80IbiOH9p-lSFFfAl7yvFswoQ0I',	'$2y$13$HgHvhQyMWVROC04blcNrqukRyJQKtiHv1KOcf20DewLsKaJ.n20.a',	NULL,	'root@root.com',	1,	1526983224,	1526983224,	NULL,	1,	NULL,	NULL,	NULL,	NULL),
(4,	'stas',	'yqT1Xeh_9INiGRVGmPJG4JgSwCqq9BbM',	'$2y$13$q5U60U2xvEdyuE0CT9pSOOlasH6LtOSxsUNHV2FZGTevdM0dXFN9W',	NULL,	'sd@terlabs.com',	1,	1527671853,	1527673999,	'063-598-52-52',	0,	0,	'',	'dfgfdgdfgfdg',	'')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `username` = VALUES(`username`), `auth_key` = VALUES(`auth_key`), `password_hash` = VALUES(`password_hash`), `password_reset_token` = VALUES(`password_reset_token`), `email` = VALUES(`email`), `status` = VALUES(`status`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`), `phone` = VALUES(`phone`), `type` = VALUES(`type`), `balance` = VALUES(`balance`), `avatar` = VALUES(`avatar`), `wallet` = VALUES(`wallet`), `file` = VALUES(`file`);

-- 2018-05-30 09:57:28
