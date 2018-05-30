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
(5,	'Ты этого не мсожеш',	'/../../common/uploads/dispute/43f1799dd0dd.png',	1,	400,	3,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!')
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
(107,	'en',	29,	'name',	'The lottery will play the goods'),
(108,	'ch',	29,	'name',	'英文文本'),
(109,	'ru',	29,	'description',	'русский текст'),
(110,	'en',	29,	'description',	'engish text'),
(111,	'ch',	29,	'description',	'英文文本'),
(112,	'ru',	29,	'prize',	'русский текст'),
(113,	'en',	29,	'prize',	'engish text'),
(114,	'ch',	29,	'prize',	'英文文本'),
(115,	'ru',	30,	'name',	'Name text ru'),
(116,	'en',	30,	'name',	'Name text en'),
(117,	'ch',	30,	'name',	'Name text ch'),
(118,	'ru',	30,	'description',	'Description ru'),
(119,	'en',	30,	'description',	'Description en'),
(120,	'ch',	30,	'description',	'Description ch'),
(121,	'ru',	30,	'prize',	'Name Prize ru'),
(122,	'en',	30,	'prize',	'Name Prize en'),
(123,	'ch',	30,	'prize',	'Name Prize ch'),
(124,	'ru',	NULL,	'name',	'Name text ru'),
(125,	'en',	NULL,	'name',	'Name text en'),
(126,	'ch',	NULL,	'name',	'Name text ch'),
(127,	'ru',	NULL,	'description',	'Description ru'),
(128,	'en',	NULL,	'description',	'Description en'),
(129,	'ch',	NULL,	'description',	'Description ch'),
(130,	'ru',	NULL,	'prize',	'Name Prize ru'),
(131,	'en',	NULL,	'prize',	'Name Prize en'),
(132,	'ch',	NULL,	'prize',	'Name Prize ch'),
(133,	'ru',	NULL,	'name',	'Name text ru'),
(134,	'en',	NULL,	'name',	'Name text en'),
(135,	'ch',	NULL,	'name',	'Name text ch'),
(136,	'ru',	NULL,	'description',	'Description ru'),
(137,	'en',	NULL,	'description',	'Description en'),
(138,	'ch',	NULL,	'description',	'Description ch'),
(139,	'ru',	NULL,	'prize',	'Name Prize ru'),
(140,	'en',	NULL,	'prize',	'Name Prize en'),
(141,	'ch',	NULL,	'prize',	'Name Prize ch'),
(142,	'ru',	NULL,	'name',	'Name text ru'),
(143,	'en',	NULL,	'name',	'Name text en'),
(144,	'ch',	NULL,	'name',	'Name text ch'),
(145,	'ru',	NULL,	'description',	'Description ru'),
(146,	'en',	NULL,	'description',	'Description en'),
(147,	'ch',	NULL,	'description',	'Description ch'),
(148,	'ru',	NULL,	'prize',	'Name Prize ru'),
(149,	'en',	NULL,	'prize',	'Name Prize en'),
(150,	'ch',	NULL,	'prize',	'Name Prize ch'),
(151,	'ru',	NULL,	'name',	'Name text ru'),
(152,	'en',	NULL,	'name',	'Name text en'),
(153,	'ch',	NULL,	'name',	'Name text ch'),
(154,	'ru',	NULL,	'description',	'Description ru'),
(155,	'en',	NULL,	'description',	'Description en'),
(156,	'ch',	NULL,	'description',	'Description ch'),
(157,	'ru',	NULL,	'prize',	'Name Prize ru'),
(158,	'en',	NULL,	'prize',	'Name Prize en'),
(159,	'ch',	NULL,	'prize',	'Name Prize ch'),
(160,	'ru',	31,	'name',	'Name text ru'),
(161,	'en',	31,	'name',	'Name text en'),
(162,	'ch',	31,	'name',	'Name text ch'),
(163,	'ru',	31,	'description',	'Description ru'),
(164,	'en',	31,	'description',	'Description en'),
(165,	'ch',	31,	'description',	'Description ch'),
(166,	'ru',	31,	'prize',	'Name Prize ru'),
(167,	'en',	31,	'prize',	'Name Prize en'),
(168,	'ch',	31,	'prize',	'Name Prize ch'),
(169,	'ru',	32,	'name',	'12211'),
(170,	'en',	32,	'name',	'12211'),
(171,	'ch',	32,	'name',	'12211'),
(172,	'ru',	32,	'description',	'324'),
(173,	'en',	32,	'description',	'234324'),
(174,	'ch',	32,	'description',	'234'),
(175,	'ru',	32,	'prize',	'324324'),
(176,	'en',	32,	'prize',	'234234'),
(177,	'ch',	32,	'prize',	'234234'),
(178,	'ru',	33,	'name',	'12211'),
(179,	'en',	33,	'name',	'12211'),
(180,	'ch',	33,	'name',	'12211'),
(181,	'ru',	33,	'description',	'324'),
(182,	'en',	33,	'description',	'234324'),
(183,	'ch',	33,	'description',	'234'),
(184,	'ru',	33,	'prize',	'324324'),
(185,	'en',	33,	'prize',	'234234'),
(186,	'ch',	33,	'prize',	'234234')
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
(29,	'106,107,108,',	0,	1,	'2018-05-30 19:30:10',	NULL,	'109,110,111,',	2,	'112,113,114,',	'hg'),
(30,	'115,116,117,',	0,	1,	'2018-05-16 14:50:38',	NULL,	'118,119,120,',	4,	'121,122,123,',	'hg'),
(31,	'160,161,162,',	0,	1,	'2018-05-30 14:50:48',	NULL,	'163,164,165,',	56,	'166,167,168,',	'/var/www/public_html/backend/controllers/../../common/uploads/lottery/687170_foto-ya-russkii-na-spine-na-avu.jpg'),
(32,	'169,170,171,',	0,	1,	'2018-05-24 14:50:10',	NULL,	'172,173,174,',	1,	'175,176,177,',	'/var/www/public_html/backend/controllers/../../common/uploads/lottery/Картинки-на-аву-Енот-крутые-классные-красивые-прикольные-8.jpg'),
(33,	'178,179,180,',	0,	1,	'2018-05-24 14:50:10',	NULL,	'181,182,183,',	1,	'184,185,186,',	'/../../common/uploads/lottery/Картинки-на-аву-Енот-крутые-классные-красивые-прикольные-8.jpg')
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

-- 2018-05-30 11:46:07
