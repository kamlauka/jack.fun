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
(113,	'en',	29,	'prize',	'iphone X'),
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
(186,	'ch',	33,	'prize',	'234234'),
(187,	'ru',	NULL,	'name',	'fgryhfg'),
(188,	'en',	NULL,	'name',	'fghfgh'),
(189,	'ch',	NULL,	'name',	'fghfgh'),
(190,	'ru',	NULL,	'description',	'fghfg'),
(191,	'en',	NULL,	'description',	'fdgedfrgerg'),
(192,	'ch',	NULL,	'description',	'ergerg'),
(193,	'ru',	NULL,	'prize',	'ergerg'),
(194,	'en',	NULL,	'prize',	'erger'),
(195,	'ch',	NULL,	'prize',	'erger'),
(205,	'ru',	35,	'name',	'Name text ru'),
(206,	'en',	35,	'name',	'Name text en'),
(207,	'ch',	35,	'name',	'Name text ch'),
(208,	'ru',	35,	'description',	'Description ru'),
(209,	'en',	35,	'description',	'Description en'),
(210,	'ch',	35,	'description',	'Description ch'),
(211,	'ru',	35,	'prize',	'Name Prize ru'),
(212,	'en',	35,	'prize',	'Name Prize en'),
(213,	'ch',	35,	'prize',	'Name Prize ch'),
(214,	'ru',	36,	'name',	'Name text ru'),
(215,	'en',	36,	'name',	'Name text en'),
(216,	'ch',	36,	'name',	'Name text ch'),
(217,	'ru',	36,	'description',	'Description ru'),
(218,	'en',	36,	'description',	'Description en'),
(219,	'ch',	36,	'description',	'Description ch'),
(220,	'ru',	36,	'prize',	'Name Prize ru'),
(221,	'en',	36,	'prize',	'Name Prize en'),
(222,	'ch',	36,	'prize',	'Name Prize ch'),
(223,	'ru',	37,	'name',	'Name text ru'),
(224,	'en',	37,	'name',	'Name text en'),
(225,	'ch',	37,	'name',	'Name text ch'),
(226,	'ru',	37,	'description',	'Description ru'),
(227,	'en',	37,	'description',	'Description en'),
(228,	'ch',	37,	'description',	'Description ch'),
(229,	'ru',	37,	'prize',	'Name Prize ru'),
(230,	'en',	37,	'prize',	'Name Prize en'),
(231,	'ch',	37,	'prize',	'Name Prize ch'),
(232,	'ru',	38,	'name',	'Name text ru'),
(233,	'en',	38,	'name',	'Name text en'),
(234,	'ch',	38,	'name',	'Name text ch'),
(235,	'ru',	38,	'description',	'Description ru'),
(236,	'en',	38,	'description',	'Description en'),
(237,	'ch',	38,	'description',	'Description ch'),
(238,	'ru',	38,	'prize',	'Name Prize ru'),
(239,	'en',	38,	'prize',	'Name Prize en'),
(240,	'ch',	38,	'prize',	'Name Prize ch'),
(241,	'ru',	39,	'name',	'Name text ru'),
(242,	'en',	39,	'name',	'Name text en'),
(243,	'ch',	39,	'name',	'Name text ch'),
(244,	'ru',	39,	'description',	'Description ru'),
(245,	'en',	39,	'description',	'Description en'),
(246,	'ch',	39,	'description',	'Description ch'),
(247,	'ru',	39,	'prize',	'Name Prize ru'),
(248,	'en',	39,	'prize',	'Name Prize en'),
(249,	'ch',	39,	'prize',	'Name Prize ch'),
(250,	'ru',	40,	'name',	'Name text ru'),
(251,	'en',	40,	'name',	'Name text en'),
(252,	'ch',	40,	'name',	'Name text ch'),
(253,	'ru',	40,	'description',	'Description ru'),
(254,	'en',	40,	'description',	'Description en'),
(255,	'ch',	40,	'description',	'Description ch'),
(256,	'ru',	40,	'prize',	'Name Prize ru'),
(257,	'en',	40,	'prize',	'Name Prize en'),
(258,	'ch',	40,	'prize',	'Name Prize ch'),
(259,	'ru',	41,	'name',	'fghfdgdfg'),
(260,	'en',	41,	'name',	'dfgdfg'),
(261,	'ch',	41,	'name',	'dfgdfg'),
(262,	'ru',	41,	'description',	'fdgdfg'),
(263,	'en',	41,	'description',	'dfgdfg'),
(264,	'ch',	41,	'description',	'dfgdfg'),
(265,	'ru',	41,	'prize',	'435435'),
(266,	'en',	41,	'prize',	'43543543'),
(267,	'ch',	41,	'prize',	'534534'),
(268,	'ru',	42,	'name',	'fghfdgdfg'),
(269,	'en',	42,	'name',	'dfgdfg'),
(270,	'ch',	42,	'name',	'dfgdfg'),
(271,	'ru',	42,	'description',	'fdgdfg'),
(272,	'en',	42,	'description',	'dfgdfg'),
(273,	'ch',	42,	'description',	'dfgdfg'),
(274,	'ru',	42,	'prize',	'435435'),
(275,	'en',	42,	'prize',	'43543543'),
(276,	'ch',	42,	'prize',	'534534'),
(277,	'ru',	43,	'name',	'fghfdgdfg'),
(278,	'en',	43,	'name',	'dfgdfg'),
(279,	'ch',	43,	'name',	'dfgdfg'),
(280,	'ru',	43,	'description',	'fdgdfg'),
(281,	'en',	43,	'description',	'dfgdfg'),
(282,	'ch',	43,	'description',	'dfgdfg'),
(283,	'ru',	43,	'prize',	'435435'),
(284,	'en',	43,	'prize',	'43543543'),
(285,	'ch',	43,	'prize',	'534534'),
(286,	'ru',	44,	'name',	'fghfdgdfg'),
(287,	'en',	44,	'name',	'dfgdfg'),
(288,	'ch',	44,	'name',	'dfgdfg'),
(289,	'ru',	44,	'description',	'fdgdfg'),
(290,	'en',	44,	'description',	'dfgdfg'),
(291,	'ch',	44,	'description',	'dfgdfg'),
(292,	'ru',	44,	'prize',	'435435'),
(293,	'en',	44,	'prize',	'43543543'),
(294,	'ch',	44,	'prize',	'534534'),
(295,	'ru',	45,	'name',	'fghfdgdfg'),
(296,	'en',	45,	'name',	'dfgdfg'),
(297,	'ch',	45,	'name',	'dfgdfg'),
(298,	'ru',	45,	'description',	'fdgdfg'),
(299,	'en',	45,	'description',	'dfgdfg'),
(300,	'ch',	45,	'description',	'dfgdfg'),
(301,	'ru',	45,	'prize',	'435435'),
(302,	'en',	45,	'prize',	'43543543'),
(303,	'ch',	45,	'prize',	'534534'),
(304,	'ru',	46,	'name',	'fghfdgdfg'),
(305,	'en',	46,	'name',	'dfgdfg'),
(306,	'ch',	46,	'name',	'dfgdfg'),
(307,	'ru',	46,	'description',	'fdgdfg'),
(308,	'en',	46,	'description',	'dfgdfg'),
(309,	'ch',	46,	'description',	'dfgdfg'),
(310,	'ru',	46,	'prize',	'435435'),
(311,	'en',	46,	'prize',	'43543543'),
(312,	'ch',	46,	'prize',	'534534')
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
  `currency_start` float NOT NULL,
  `result` varchar(10) DEFAULT NULL,
  `description` text,
  `rate` float NOT NULL,
  `name_prize` varchar(32) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `lottery` (`id`, `name`, `total`, `status`, `currency_start`, `result`, `description`, `rate`, `name_prize`, `img`) VALUES
(29,	'106,107,108,',	0,	1,	201,	NULL,	'109,110,111,',	0.2,	'112,113,114,',	'/../../common/uploads/lottery/687170_foto-ya-russkii-na-spine-na-avu.jpg'),
(30,	'115,116,117,',	0,	1,	2018,	NULL,	'118,119,120,',	4,	'121,122,123,',	''),
(31,	'160,161,162,',	0,	1,	500000000,	NULL,	'163,164,165,',	56,	'166,167,168,',	''),
(32,	'169,170,171,',	0,	1,	54.25,	NULL,	'172,173,174,',	1,	'175,176,177,',	''),
(33,	'178,179,180,',	0,	1,	2.01805,	NULL,	'181,182,183,',	1,	'184,185,186,',	'/../../common/uploads/lottery/Картинки-на-аву-Енот-крутые-классные-красивые-прикольные-8.jpg'),
(35,	'205,206,207,',	0,	0,	330,	NULL,	'208,209,210,',	33,	'211,212,213,',	'/../../common/uploads/lottery/43f1799dd0dd.png'),
(36,	'214,215,216,',	0,	0,	330,	NULL,	'217,218,219,',	33,	'220,221,222,',	'/../../common/uploads/lottery/43f1799dd0dd.png'),
(37,	'223,224,225,',	0,	0,	330,	NULL,	'226,227,228,',	33,	'229,230,231,',	'/../../common/uploads/lottery/43f1799dd0dd.png'),
(38,	'232,233,234,',	0,	0,	330,	NULL,	'235,236,237,',	33,	'238,239,240,',	'/../../common/uploads/lottery/43f1799dd0dd.png'),
(39,	'241,242,243,',	0,	0,	330,	NULL,	'244,245,246,',	33,	'247,248,249,',	'/../../common/uploads/lottery/43f1799dd0dd.png'),
(40,	'250,251,252,',	0,	0,	330,	NULL,	'253,254,255,',	33,	'256,257,258,',	'/../../common/uploads/lottery/43f1799dd0dd.png'),
(41,	'259,260,261,',	0,	0,	435,	NULL,	'262,263,264,',	534,	'265,266,267,',	'/../../common/uploads/lottery/Без названия.jpeg'),
(42,	'268,269,270,',	0,	0,	435,	NULL,	'271,272,273,',	534,	'274,275,276,',	'/../../common/uploads/lottery/Без названия.jpeg'),
(43,	'277,278,279,',	0,	0,	435,	NULL,	'280,281,282,',	534,	'283,284,285,',	'/../../common/uploads/lottery/Без названия.jpeg'),
(44,	'286,287,288,',	0,	0,	435,	NULL,	'289,290,291,',	534,	'292,293,294,',	'/../../common/uploads/lottery/Без названия.jpeg'),
(45,	'295,296,297,',	0,	0,	435,	NULL,	'298,299,300,',	534,	'301,302,303,',	'/../../common/uploads/lottery/Без названия.jpeg'),
(46,	'304,305,306,',	0,	0,	435,	NULL,	'307,308,309,',	534,	'310,311,312,',	'/../../common/uploads/lottery/Без названия.jpeg')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `total` = VALUES(`total`), `status` = VALUES(`status`), `currency_start` = VALUES(`currency_start`), `result` = VALUES(`result`), `description` = VALUES(`description`), `rate` = VALUES(`rate`), `name_prize` = VALUES(`name_prize`), `img` = VALUES(`img`);

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

INSERT INTO `url` (`id`, `target_id`, `type`, `value`) VALUES
(1,	46,	'lottery',	'nameprize'),
(2,	29,	'lottery',	'pipp')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `target_id` = VALUES(`target_id`), `type` = VALUES(`type`), `value` = VALUES(`value`);

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
(2,	'root',	'USa0h80IbiOH9p-lSFFfAl7yvFswoQ0I',	'$2y$13$JPd9tIBbfdbrGCZ14P1asefCc0dNaYxLbTBWJuulYpCUchxEhF4vi',	NULL,	'root@terlabs.com',	1,	1526983224,	1527770540,	'0969361424',	1,	NULL,	'/../../common/uploads/avatar/687170_foto-ya-russkii-na-spine-na-avu.jpg',	'1111111111111111111111111111',	''),
(4,	'stas',	'yqT1Xeh_9INiGRVGmPJG4JgSwCqq9BbM',	'$2y$13$q5U60U2xvEdyuE0CT9pSOOlasH6LtOSxsUNHV2FZGTevdM0dXFN9W',	NULL,	'sd@terlabs.com',	1,	1527671853,	1527673999,	'063-598-52-52',	0,	0,	'',	'dfgfdgdfgfdg',	''),
(5,	'antoshka',	'cob2oHjSdtFVGq0iOoM4ADjWH6JMYL1v',	'$2y$13$3yqII9CCzCyECY85LGF.cuWY9M3wqK7SVY7aP73xLqkaV2Unt6J6q',	NULL,	NULL,	1,	1527771944,	1527771944,	NULL,	0,	0,	NULL,	'dsg43rt34v43vt4ftc43c34c43crt43',	NULL),
(6,	'12345678',	'cCo_FPRm9fIljH9zJ5VpTvtBWadyLiW4',	'$2y$13$Op74koF1nyEHYAjZO7ou..q.fd1oT/WNXF5VDY6I6I/5ajK7W1Vsq',	NULL,	NULL,	1,	1527777279,	1527777279,	NULL,	0,	0,	NULL,	'12345678',	NULL),
(7,	'admin_jackpot',	'_Rmatu9LUxcd7dqQKh_bYGHsV6h7SMV9',	'$2y$13$WlkXYVpSVAIsk.Bdnh4mgunEuxcMQ0jqnU1XUTIdey6HdBaDgk3I.',	NULL,	NULL,	1,	1527780296,	1527780296,	NULL,	0,	0,	NULL,	'compareValue',	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `username` = VALUES(`username`), `auth_key` = VALUES(`auth_key`), `password_hash` = VALUES(`password_hash`), `password_reset_token` = VALUES(`password_reset_token`), `email` = VALUES(`email`), `status` = VALUES(`status`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`), `phone` = VALUES(`phone`), `type` = VALUES(`type`), `balance` = VALUES(`balance`), `avatar` = VALUES(`avatar`), `wallet` = VALUES(`wallet`), `file` = VALUES(`file`);

-- 2018-06-01 15:31:50
