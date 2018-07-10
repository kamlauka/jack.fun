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


DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `activ` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


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
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `phone` varchar(32) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `type` tinyint(2) NOT NULL DEFAULT '0',
  `balance` float DEFAULT '0',
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `phone`, `type`, `balance`, `avatar`, `file`) VALUES
(1,	'admin',	'A1qwgmpDchz5AztmbE-YOaTOLZZkQmDm',	'$2y$13$oMa6rChD.bP0pDJUlVQHr.eP5Lm8eqBzAW0rd3VCWVRqCFaYe.S1O',	NULL,	'admin@admin.com',	1,	1526915570,	1527671490,	'0969361424',	2,	NULL,	'',	''),
(2,	'root',	'USa0h80IbiOH9p-lSFFfAl7yvFswoQ0I',	'$2y$13$3fFtAmzSzdA7k8AeA3ggOuLso3YIEy21MzNOomH4j1v0Mnajh92RO',	NULL,	'sd@terlabs.com',	1,	1526983224,	1531127087,	'0969361424',	1,	NULL,	'/../../common/uploads/avatar/cherno-belye_kartinki_na_avu_dla_devushek_01.jpg',	''),
(4,	'stas',	'yqT1Xeh_9INiGRVGmPJG4JgSwCqq9BbM',	'$2y$13$q5U60U2xvEdyuE0CT9pSOOlasH6LtOSxsUNHV2FZGTevdM0dXFN9W',	NULL,	'sd@terlabs.com',	1,	1527671853,	1527673999,	'063-598-52-52',	0,	0,	'',	''),
(5,	'antoshka',	'cob2oHjSdtFVGq0iOoM4ADjWH6JMYL1v',	'$2y$13$3yqII9CCzCyECY85LGF.cuWY9M3wqK7SVY7aP73xLqkaV2Unt6J6q',	NULL,	NULL,	1,	1527771944,	1527771944,	NULL,	0,	0,	NULL,	NULL),
(6,	'12345678',	'cCo_FPRm9fIljH9zJ5VpTvtBWadyLiW4',	'$2y$13$Op74koF1nyEHYAjZO7ou..q.fd1oT/WNXF5VDY6I6I/5ajK7W1Vsq',	NULL,	NULL,	1,	1527777279,	1527777279,	NULL,	0,	0,	NULL,	NULL),
(7,	'admin_jackpot',	'_Rmatu9LUxcd7dqQKh_bYGHsV6h7SMV9',	'$2y$13$WlkXYVpSVAIsk.Bdnh4mgunEuxcMQ0jqnU1XUTIdey6HdBaDgk3I.',	NULL,	'',	0,	1527780296,	1528206002,	'',	0,	0,	'',	''),
(8,	'tttt',	'CnL9k00DLJv-I20MUqJCnRAMRsmJHhh5',	'$2y$13$6qHpmGZZGUi8VdRn0qw0mu4gX9/INEXifZgYHEc78Ku7hjrAawoUK',	NULL,	NULL,	1,	1528472050,	1528472050,	NULL,	0,	0,	NULL,	NULL),
(9,	'admin_jackpot22',	'O78HRIei8_Isa_BPQD1GUm6zpehmqP90',	'$2y$13$pU/bpP9LXk9.ANVq8HXMd.oz/D0BxAZP6t9cEObgJpdtEfk4XATHG',	NULL,	NULL,	1,	1530522134,	1530522134,	NULL,	0,	0,	NULL,	NULL),
(10,	'dzystas1988',	'50rKL-NpBWysIPJYszZ7Bv1w9hmcwdx4',	'$2y$13$3yYWz/NFAVwqs4Azqoqb5OAM.l99VIfkmt5ywfNWi9HFFIcmtanCC',	NULL,	NULL,	1,	1530529470,	1530529470,	NULL,	0,	0,	NULL,	NULL),
(11,	'root22222',	'bGQjhkr-fMwFTWoOFqaD3ymr0LgRLt4n',	'$2y$13$QsLPJ.pO4QcFJVScCUB.meDwGU1H4TjxyO1KB/ll.eCSGrg9QH2PC',	NULL,	NULL,	1,	1530529568,	1530529568,	NULL,	0,	0,	NULL,	NULL),
(12,	'root2211',	'Pum6FlJCnh9od5NvW-JWICgfXhX2Gejh',	'$2y$13$PPr3hxdqXC2ofVk1dyoNwehpL7Ugkog2lX8ZqRtcm6qSMhBHx45Ou',	NULL,	NULL,	1,	1530535530,	1530535530,	NULL,	0,	0,	NULL,	NULL),
(13,	'fdgdfgdfg',	'1BLpXWX7_RLep7cfTELAjQCRk9PD_XF4',	'$2y$13$uYDRtKVbY/tRw0GL9asgnu4UW10HAT/DaJpciK/B51ZU94OG5Fr/.',	NULL,	NULL,	1,	1530538977,	1530538977,	NULL,	0,	0,	NULL,	NULL),
(14,	'admin_jackpotddd',	'K9vsekWqiM26ibsSTpUb83vuhQPfB7gG',	'$2y$13$eu.eURg5EGo.mkOh5NdZQOcFxvk5l/pvA39LIXsj69AhiDdU.3HIG',	NULL,	NULL,	1,	1530539949,	1530539949,	NULL,	0,	0,	NULL,	NULL),
(15,	'sdfsdfdsfsdfsdfsdf',	'IC7Xy3D7oMppzyHlP9kJEvfmlgO4QVbQ',	'$2y$13$M..vWpDX3pJQY4FGdiDsfOmy2lhGvX1jdgsIE7mCF3/s.MHUPP31y',	NULL,	NULL,	1,	1530539988,	1530539988,	NULL,	0,	0,	NULL,	NULL),
(16,	'asdasdasdasdasdasd',	'02QpThbtJMYUKUEdqWIcDnjVVuaRi0Xk',	'$2y$13$71nDNAgfrxU/88q9dx7LM.bnrPtOIaQZ0e/pAYIM98y5TherXY30O',	NULL,	NULL,	1,	1530540271,	1530540271,	NULL,	0,	0,	NULL,	NULL),
(17,	'qwdeqw',	'DUFlAoQHMo3uXEsge8w2hYE5lV83YfwZ',	'$2y$13$8mFbdWD9eeZQf4ID5XE8ku7F9KeqZV44PEE5aikUR5UPrknrU7JDy',	NULL,	NULL,	1,	1530540299,	1530540299,	NULL,	0,	0,	NULL,	NULL),
(18,	'wefwefewf',	'Sju2mDT95XANG4P9aIxd88DoSeIxl0-p',	'$2y$13$JrpO0hgFyVmnWfnuAF4xbekaHEygzNmf/uevVWS8XCbGyfBWSaxSK',	NULL,	NULL,	1,	1530698944,	1530698944,	NULL,	0,	0,	NULL,	NULL),
(19,	'wefwefwefewfew',	'wrUyGUvf12c423KD6r5h88MYVl6SbpJ6',	'$2y$13$GkfkplPi3wrNK6hNSzwVuukR0T67xpd1cLKnh0LX3sf37OQ.mR9q.',	NULL,	NULL,	1,	1530699085,	1530699085,	NULL,	0,	0,	NULL,	NULL),
(20,	'frf',	'dtvP1aBdyPbHdRCNMohahbqSqXJ3MP6i',	'$2y$13$gjXMr3w2EMdWknAReUDD1OaRLCEvMWxHL2vu5SeIucDgxa3YqCYA6',	NULL,	NULL,	1,	1530783363,	1530783363,	NULL,	0,	0,	NULL,	NULL),
(21,	'sdfsdfsdfdsf',	'WfNOc9tThhHTW9WEY4xwxmFmCurmm3SA',	'$2y$13$STEPVo1Eys8711nVv9a4XOrD9ThjPtgXDJT3uMSgsUm1W550ShPiG',	NULL,	'sdfsdfsdfdsf@dfds.sdf',	1,	1531218797,	1531218797,	NULL,	0,	0,	NULL,	NULL),
(22,	'asdasdasd',	'WHBloFvJJrljBxoBRBrgKKOaIEioVKN9',	'$2y$13$UctOZwLlusm0NaVcxBewz.agGB.Q5fOnIW8oDLG3A58kezUhzgTtK',	NULL,	'asdasdasd@fgdh.f',	1,	1531218838,	1531218838,	NULL,	0,	0,	NULL,	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `username` = VALUES(`username`), `auth_key` = VALUES(`auth_key`), `password_hash` = VALUES(`password_hash`), `password_reset_token` = VALUES(`password_reset_token`), `email` = VALUES(`email`), `status` = VALUES(`status`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`), `phone` = VALUES(`phone`), `type` = VALUES(`type`), `balance` = VALUES(`balance`), `avatar` = VALUES(`avatar`), `file` = VALUES(`file`);

-- 2018-07-10 11:05:17
