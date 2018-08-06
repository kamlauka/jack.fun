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
  `date_creation` datetime NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `betting_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 707c4300b652bc688cedd71c7c8730ab4a1f2f6a
INSERT INTO `betting` (`id`, `user_id`, `target_id`, `rate`, `pc_target`, `pc_jackpot`, `pc_transaction`, `pc_keep`, `pc_organizer`, `date_creation`, `status`) VALUES
(42,	2,	51,	0.03,	0,	0,	0,	0,	0,	'2018-07-11 10:30:39',	NULL),
(47,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 12:33:36',	NULL),
(48,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 12:39:59',	NULL),
(49,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 12:46:12',	NULL),
(50,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 12:46:40',	NULL),
(51,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 12:48:36',	NULL),
(52,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 12:52:43',	NULL),
(53,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 12:55:45',	NULL),
(54,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 12:56:47',	NULL),
(55,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 12:59:44',	NULL),
(56,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 01:27:15',	NULL),
(57,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 01:31:06',	NULL),
(58,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 01:33:22',	NULL),
(59,	1,	51,	0.0284397,	0,	0,	0,	0,	0,	'2018-07-13 01:34:09',	NULL),
(60,	2,	51,	0.0284397,	0,	0.00006,	0.0000003,	0.0015,	0,	'2018-07-24 02:18:18',	NULL),
(61,	2,	51,	0.0284397,	0,	0.00006,	0.0000003,	0.0015,	0,	'2018-07-24 02:22:57',	NULL),
(62,	2,	51,	0.0284397,	0,	0.00006,	0.0000003,	0.0015,	0,	'2018-07-24 02:25:45',	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `user_id` = VALUES(`user_id`), `target_id` = VALUES(`target_id`), `rate` = VALUES(`rate`), `pc_target` = VALUES(`pc_target`), `pc_jackpot` = VALUES(`pc_jackpot`), `pc_transaction` = VALUES(`pc_transaction`), `pc_keep` = VALUES(`pc_keep`), `pc_organizer` = VALUES(`pc_organizer`), `date_creation` = VALUES(`date_creation`), `status` = VALUES(`status`);
<<<<<<< HEAD
>>>>>>> tests
=======
>>>>>>> 707c4300b652bc688cedd71c7c8730ab4a1f2f6a

DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dispute_id` int(11) NOT NULL,
  `text` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `dispute_id` (`dispute_id`),
  CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`dispute_id`) REFERENCES `dispute` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `comment` (`id`, `user_id`, `dispute_id`, `text`, `date`, `status`) VALUES
(1,	1,	5,	1,	'2016-09-09 00:00:00',	1)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `user_id` = VALUES(`user_id`), `dispute_id` = VALUES(`dispute_id`), `text` = VALUES(`text`), `date` = VALUES(`date`), `status` = VALUES(`status`);

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
  `total` double NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `date_start` datetime NOT NULL,
  `result` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 707c4300b652bc688cedd71c7c8730ab4a1f2f6a
INSERT INTO `jackpot` (`id`, `total`, `status`, `date_start`, `result`) VALUES
(3,	88.0015103516,	1,	'2018-07-19 18:10:09',	NULL),
(4,	546,	0,	'2018-06-07 09:25:20',	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `total` = VALUES(`total`), `status` = VALUES(`status`), `date_start` = VALUES(`date_start`), `result` = VALUES(`result`);
<<<<<<< HEAD
>>>>>>> tests
=======
>>>>>>> 707c4300b652bc688cedd71c7c8730ab4a1f2f6a

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `local` varchar(8) NOT NULL,
  `activ` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `language` (`id`, `alias`, `name`, `local`, `activ`) VALUES
(1,	'ru',	'Русский',	'ru-RU',	'activ'),
(2,	'en',	'English',	'en-EN',	'activ'),
(3,	'ch',	'中国',	'zh-cn',	'activ')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `alias` = VALUES(`alias`), `name` = VALUES(`name`), `local` = VALUES(`local`), `activ` = VALUES(`activ`);

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
  `total` double NOT NULL DEFAULT '0',
  `status` char(16) NOT NULL DEFAULT 'Waiting',
  `currency_start` double NOT NULL,
  `result` varchar(16) DEFAULT NULL,
  `description` text,
  `rate` float NOT NULL,
  `name_prize` varchar(32) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
=======

INSERT INTO `lottery` (`id`, `name`, `total`, `status`, `currency_start`, `result`, `description`, `rate`, `name_prize`, `img`) VALUES
(51,	'id = 340,343,346,',	0.2275176,	'Active',	330,	NULL,	'id = 341,344,347,',	0.03,	'id = 342,345,348,',	'/../../common/uploads/lottery/iphone.png'),
(53,	'id = 340,343,346,',	0.1137588,	'Wait_participant',	330,	'1',	'id = 341,344,347,',	0.03,	'id = 342,345,348,',	'/../../common/uploads/lottery/iphone.png')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `total` = VALUES(`total`), `status` = VALUES(`status`), `currency_start` = VALUES(`currency_start`), `result` = VALUES(`result`), `description` = VALUES(`description`), `rate` = VALUES(`rate`), `name_prize` = VALUES(`name_prize`), `img` = VALUES(`img`);
>>>>>>> tests

INSERT INTO `lottery` (`id`, `name`, `total`, `status`, `currency_start`, `result`, `description`, `rate`, `name_prize`, `img`) VALUES
(51,	'id = 340,343,346,',	0.2275176,	'Active',	330,	NULL,	'id = 341,344,347,',	0.03,	'id = 342,345,348,',	'/../../common/uploads/lottery/iphone.png'),
(53,	'id = 340,343,346,',	0.1137588,	'Wait_participant',	330,	'1',	'id = 341,344,347,',	0.03,	'id = 342,345,348,',	'/../../common/uploads/lottery/iphone.png')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `total` = VALUES(`total`), `status` = VALUES(`status`), `currency_start` = VALUES(`currency_start`), `result` = VALUES(`result`), `description` = VALUES(`description`), `rate` = VALUES(`rate`), `name_prize` = VALUES(`name_prize`), `img` = VALUES(`img`);

DROP TABLE IF EXISTS `modification`;
CREATE TABLE `modification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `data` varchar(64) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
  `type` varchar(16) NOT NULL,
  `target_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `hash` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> 707c4300b652bc688cedd71c7c8730ab4a1f2f6a
INSERT INTO `transaction` (`id`, `user_id`, `type`, `target_id`, `amount`, `hash`) VALUES
(44,	1,	'not confirmed',	51,	0.03,	'65756756'),
(75,	2,	'not confirmed',	51,	0.03,	'P5HxqgByoxPYbtYgdSAe9MWPRqbH4msAYL5T3QDQWuKYX')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `user_id` = VALUES(`user_id`), `type` = VALUES(`type`), `target_id` = VALUES(`target_id`), `amount` = VALUES(`amount`), `hash` = VALUES(`hash`);

<<<<<<< HEAD
>>>>>>> tests
=======
>>>>>>> 707c4300b652bc688cedd71c7c8730ab4a1f2f6a

DROP TABLE IF EXISTS `translation`;
CREATE TABLE `translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `target_id` int(11) DEFAULT NULL,
  `alias` varchar(64) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
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
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `phone` varchar(32) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `balance` float DEFAULT '0',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `active` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `phone`, `type`, `balance`, `avatar`, `file`, `active`) VALUES
(1,	'admin',	'A1qwgmpDchz5AztmbE-YOaTOLZZkQmDm',	'$2y$13$oMa6rChD.bP0pDJUlVQHr.eP5Lm8eqBzAW0rd3VCWVRqCFaYe.S1O',	NULL,	'admin@admin.com',	1,	1526915570,	1531830606,	'000000000000',	2,	NULL,	'/../../common/uploads/avatar/Енот.jpg',	'/../../common/uploads/avatar/U1sILnSlyAQ.jpg',	NULL),
(2,	'root',	'USa0h80IbiOH9p-lSFFfAl7yvFswoQ0I',	'$2y$13$NJ.n66K1A42cpUe2PxbQ6u2hLL2iZzzrVwTyAEEEAzDyeqic9om86',	NULL,	'sd@terlabs.com',	1,	1526983224,	1531829679,	'0969361424',	1,	NULL,	'/../../common/uploads/avatar/smile.png',	'',	NULL),
(43,	'hkjhkhjk',	'7_6ydryZcxx-MOYpFvpr3A6gKpi9rIwR',	'$2y$13$gKaOxDOseH4Exo.SaCiSAeeDMy.ES/NBjideA3Dn5kzlv2qvR0QWq',	NULL,	'sd3@terlabs.com',	0,	1531406226,	1531406226,	NULL,	0,	0,	NULL,	NULL,	'2045179b80cd9ea6d4da82f0ce5e6859'),
(44,	'hkjhkhjk33',	'peoa_uE3PS7iXWgonnXdTK0Feyp8v1mu',	'$2y$13$faZq.aBEUAyNjKroEbPqyeIPNQgIW8ErzZguxmJKxKpSVow3sj7Ke',	NULL,	'sd33@terlabs.com3',	0,	1531406307,	1531406307,	NULL,	0,	0,	NULL,	NULL,	'bd9fffd883a2af3a6fcf88bf1c5db3a9'),
(45,	'hkjhkhjk334',	'ornOYkgBIjjuoGqRMiEdu4UAN0y1taX4',	'$2y$13$9PF4iUmN9QNI6XFJXINIFO5zqTdcBProZTQfWPuW3r5QAPQBCI8IW',	NULL,	'sd334@terlabs.com3',	0,	1531406337,	1531406337,	NULL,	0,	0,	NULL,	NULL,	'c34a9d2b2ba22fde4516f184522fdd0d'),
(46,	'hkjhkhjk3343',	'4qgdkfXkBXl19JjXck44MsVc1LME6ODL',	'$2y$13$VRMJN1YHHEQjOpi1LvzSve.6YSwprDU0JS9Sz93jH2s7RkCjhZ1jq',	NULL,	'sd334@terlabs.com33',	0,	1531406449,	1531406449,	NULL,	0,	0,	NULL,	NULL,	'b27b3d7a938f5bea53db2f1ca5f83baa'),
(47,	'hkjhkhjk33433',	'SG5w1-IrCyOp-QhCF9BaNUJT1cXWD-YM',	'$2y$13$U1AusbT9J9BRQvNLxUJVZuhYOh4J8Gs.OqZnOA.NVy3KvjNsydEoW',	NULL,	'sd334@terlabs.com3334',	0,	1531406511,	1531406511,	NULL,	0,	0,	NULL,	NULL,	'8fdb2966c6307002fbb190abf3a9a237'),
(48,	'hkjh3khjk33433',	'wPjSYsJ1CEBepaA9NOMj5IIJEZDePgdI',	'$2y$13$Geatx/Xejaye2VSM.HS7tes0I28yfvGVXY0reZYmqz4cA.ZgOHnZu',	NULL,	'sd3334@terlabs.com3334',	0,	1531406576,	1531406576,	NULL,	0,	0,	NULL,	NULL,	'16a831a3c396512151739aa88853738b'),
(49,	'fdgdfgdfg',	'dgqBUTbdcfQR35gMe6KIU8FbUUhvkUhu',	'$2y$13$iUnd8EaThN/1U1PLgL2ao.olbgpsCynmF.j4eBJuwtkdFF2pJ/k0y',	NULL,	'fgf@fgfdg.fg',	0,	1531406971,	1531406971,	NULL,	0,	0,	NULL,	NULL,	'9d43ffef4acba5abdbcebdec25ed7c30'),
(50,	'fdgdfgdfgw',	'ADLLzOgM4DT9ru64Dd2OPu3KmrayRrG-',	'$2y$13$aUU9lxGD/7q7IvJ5z4kds.MBBwU9o8o2.Q4tikaj2XgbAQwHNxiCy',	NULL,	'fgf@fgfdg.fgw',	0,	1531407037,	1531407037,	NULL,	0,	0,	NULL,	NULL,	'f37be569606db8bc6687f1df1b1554d3')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `username` = VALUES(`username`), `auth_key` = VALUES(`auth_key`), `password_hash` = VALUES(`password_hash`), `password_reset_token` = VALUES(`password_reset_token`), `email` = VALUES(`email`), `status` = VALUES(`status`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`), `phone` = VALUES(`phone`), `type` = VALUES(`type`), `balance` = VALUES(`balance`), `avatar` = VALUES(`avatar`), `file` = VALUES(`file`), `active` = VALUES(`active`);

<<<<<<< HEAD
<<<<<<< HEAD
-- 2018-07-17 14:24:59
>>>>>>> cc03a62d66436ca5fcc24a44b214fdbcf2fe9d95
=======

-- 2018-07-24 13:47:18
>>>>>>> sd
=======
>>>>>>> tests
=======
>>>>>>> 707c4300b652bc688cedd71c7c8730ab4a1f2f6a
