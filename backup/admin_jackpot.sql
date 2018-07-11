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

INSERT INTO `betting` (`id`, `user_id`, `target_id`, `rate`, `pc_target`, `pc_jackpot`, `pc_transaction`, `pc_keep`, `pc_organizer`, `date_creation`, `status`) VALUES
(38,	2,	51,	0.03,	0,	0,	0,	0,	0,	'2018-07-10 12:42:57',	NULL),
(39,	2,	51,	0.03,	0,	0,	0,	0,	0,	'2018-07-10 12:44:09',	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `user_id` = VALUES(`user_id`), `target_id` = VALUES(`target_id`), `rate` = VALUES(`rate`), `pc_target` = VALUES(`pc_target`), `pc_jackpot` = VALUES(`pc_jackpot`), `pc_transaction` = VALUES(`pc_transaction`), `pc_keep` = VALUES(`pc_keep`), `pc_organizer` = VALUES(`pc_organizer`), `date_creation` = VALUES(`date_creation`), `status` = VALUES(`status`);

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

INSERT INTO `dispute` (`id`, `name`, `img`, `rate`, `total`, `type`, `active`, `executor_id`, `initiator_id`, `moderator_id`, `date_start`, `date_end`, `result`, `status`, `description`) VALUES
(5,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	3,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!')
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
(3,	879789,	1,	'2018-07-18 18:50:09',	NULL),
(4,	546,	0,	'2018-06-07 09:25:20',	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `total` = VALUES(`total`), `status` = VALUES(`status`), `date_start` = VALUES(`date_start`), `result` = VALUES(`result`);

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `activ` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `language` (`id`, `alias`, `name`, `activ`) VALUES
(1,	'ru',	'Русский',	'activ'),
(2,	'en',	'English',	'activ'),
(3,	'ch',	'中国',	'activ')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `alias` = VALUES(`alias`), `name` = VALUES(`name`), `activ` = VALUES(`activ`);

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
(51,	'id = 340,343,346,',	0,	1,	330,	NULL,	'id = 341,344,347,',	0.03,	'id = 342,345,348,',	'/../../common/uploads/lottery/iphone.png')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `total` = VALUES(`total`), `status` = VALUES(`status`), `currency_start` = VALUES(`currency_start`), `result` = VALUES(`result`), `description` = VALUES(`description`), `rate` = VALUES(`rate`), `name_prize` = VALUES(`name_prize`), `img` = VALUES(`img`);

DROP TABLE IF EXISTS `modification`;
CREATE TABLE `modification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `data` varchar(64) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `modification` (`id`, `name`, `data`, `description`) VALUES
(1,	'percent_lottery',	'2',	'Процентов от ставки плюхнется в фонд текшей лотереи'),
(2,	'percent_jackpot',	'0.2',	'% в Джекпот - общий фонд, будет разыгрываться, раз в месяц между всеми игроками'),
(3,	'percent_exchange',	'0.001',	'%  комиссия биржы https://bitshares.org/ за транзакцию'),
(4,	'percent_admin',	'5',	'5% на содержание сайта и на зп модераторам'),
(5,	'percent_organizer_dispute ',	'1',	'1 % организаторам споров.'),
(6,	'wallet_account',	'P5HxqgByoxPYbtYgdSAe9MWPRqbH4msAYL5T3QDQWuKYX',	'Кошелек администратора')
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
  `type` varchar(16) NOT NULL,
  `target_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `hash` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `transaction` (`id`, `user_id`, `type`, `target_id`, `amount`, `hash`) VALUES
(7,	2,	'not confirmed',	51,	0.03,	'P5HxqgByoxPYbtYgdSAe9MWPRqbH4msAYL5T3QDQWuKYX'),
(8,	2,	'not confirmed',	51,	0.03,	'cvbdfbffdb')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `user_id` = VALUES(`user_id`), `type` = VALUES(`type`), `target_id` = VALUES(`target_id`), `amount` = VALUES(`amount`), `hash` = VALUES(`hash`);

DROP TABLE IF EXISTS `translation`;
CREATE TABLE `translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_id` int(11) NOT NULL,
  `target_id` int(11) DEFAULT NULL,
  `alias` varchar(64) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `translation` (`id`, `language_id`, `target_id`, `alias`, `text`) VALUES
(340,	1,	51,	'name',	'iphone X'),
(341,	1,	51,	'description',	'Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum'),
(342,	1,	51,	'name_prize',	'iphone X'),
(343,	2,	51,	'name',	'iphone X'),
(344,	2,	51,	'description',	'Lorem Ipsum is text-a \"fish\", often used in print and web design. Lorem Ipsum is the standard \"fish\" for Latin texts from the beginning of the 16th century. At that time, some nameless printer created a large collection of font sizes and shapes using Lorem Ipsum to print samples. Lorem Ipsum not only successfully survived without noticeable changes five centuries, but also stepped into the electronic design. His popularization in modern times was the publication of Letraset sheets with samples of Lorem Ipsum in the 60\'s and, more recently, e-layout programs like Aldus PageMaker, in the templates of which Lorem Ipsum'),
(345,	2,	51,	'name_prize',	'iphone X'),
(346,	3,	51,	'name',	'iphone X'),
(347,	3,	51,	'description',	'Lorem Ipsum是文本 - 一种“鱼”，通常用于印刷和网页设计。 Lorem存有标准的“鱼”从16世纪初拉美文本。虽然一些不愿透露姓名的打印机已创建使用Lorem存有打印样品字体大小和形状的大集合。 Lorem存有已存活不仅没有显著变化五个百年，也跃入电子设计。它是普及近代是含Lorem存有通道，在60年代Letraset张，最近使用Lorem存有的出版，电子桌面出版软件，如奥尔德斯PageMaker中，模板'),
(348,	3,	51,	'name_prize',	'iphone X'),
(349,	2,	NULL,	'text_1_in_main',	'main pages taataat'),
(350,	1,	NULL,	'seo_block_title',	'Лорем ипсум'),
(351,	2,	NULL,	'seo_block_title',	'Lorem ipsum'),
(352,	3,	NULL,	'seo_block_title',	'中国'),
(353,	2,	NULL,	'seo_block_text',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque auctor velit elementum tristique. Ut in nibh convallis, dignissim sem vitae, pellentesque mi. Donec ut placerat elit, a tincidunt massa. Duis pulvinar mollis leo. In nec velit in sem porta dignissim vitae eget tortor. Aenean eu turpis quis odio efficitur scelerisque. Fusce dui est, pretium quis massa a, gravida efficitur augue. Praesent a purus quis enim vulputate ultricies. Curabitur venenatis lacus nec elementum facilisis. Sed nunc risus, accumsan ac semper in, vehicula at dolor. Vestibulum urna lorem, ornare sit amet rhoncus vitae, condimentum id urna. Aliquam consequat odio eu porttitor finibus. Fusce fringilla ante ac turpis mattis, a volutpat risus dictum. Morbi aliquet malesuada mi, ultrices accumsan diam aliquam in.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque auctor velit elementum tristique. Ut in nibh convallis, dignissim sem vitae, pellentesque mi. Donec ut placerat elit, a tincidunt massa. Duis pulvinar mollis leo. In nec velit in sem porta dignissim vitae eget tortor. Aenean eu turpis quis odio efficitur scelerisque. Fusce dui est, pretium quis massa a, gravida efficitur augue. Praesent a purus quis enim vulputate ultricies. Curabitur venenatis lacus nec elementum facilisis. Sed nunc risus, accumsan ac semper in, vehicula at dolor. Vestibulum urna lorem, ornare sit amet rhoncus vitae, condimentum id urna. Aliquam consequat odio eu porttitor finibus. Fusce fringilla ante ac turpis mattis, a volutpat risus dictum. Morbi aliquet malesuada mi, ultrices accumsan diam aliquam in.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum pellentesque auctor velit elementum tristique. Ut in nibh convallis, dignissim sem vitae, pellentesque mi. Donec ut placerat elit, a tincidunt massa. Duis pulvinar mollis leo. In nec velit in sem porta dignissim vitae eget tortor. Aenean eu turpis quis odio efficitur scelerisque. Fusce dui est, pretium quis massa a, gravida efficitur augue. Praesent a purus quis enim vulputate ultricies. Curabitur venenatis lacus nec elementum facilisis. Sed nunc risus, accumsan ac semper in, vehicula at dolor. Vestibulum urna lorem, ornare sit amet rhoncus vitae, condimentum id urna. Aliquam consequat odio eu porttitor finibus. Fusce fringilla ante ac turpis mattis, a volutpat risus dictum. Morbi aliquet malesuada mi, ultrices accumsan diam aliquam in.'),
(354,	1,	NULL,	'seo_block_text',	'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты).'),
(355,	3,	NULL,	'seo_block_text',	'无可否认，当读者在浏览一个页面的排版时，难免会被可阅读的内容所分散注意力。Lorem Ipsum的目的就是为了保持字母多多少少标准及平均的分配，而不是“此处有文本，此处有文本”，从而让内容更像可读的英语。如今，很多桌面排版软件以及网页编辑用Lorem Ipsum作为默认的示范文本，搜一搜“Lorem Ipsum”就能找到这些网站的雏形。这些年来Lorem Ipsum演变出了各式各样的版本，有些出于偶然，有些则是故意的（刻意的幽默之类的无可否认，当读者在浏览一个页面的排版时，难免会被可阅读的内容所分散注意力。Lorem Ipsum的目的就是为了保持字母多多少少标准及平均的分配，而不是“此处有文本，此处有文本”，从而让内容更像可读的英语。如今，很多桌面排版软件以及网页编辑用Lorem Ipsum作为默认的示范文本，搜一搜“Lorem Ipsum”就能找到这些网站的雏形。这些年来Lorem Ipsum演变出了各式各样的版本，有些出于偶然，有些则是故意的（刻意的幽默之类的）无可否认，当读者在浏览一个页面的排版时，难免会被可阅读的内容所分散注意力。Lorem Ipsum的目的就是为了保持字母多多少少标准及平均的分配，而不是“此处有文本，此处有文本”，从而让内容更像可读的英语。如今，很多桌面排版软件以及网页编辑用Lorem Ipsum作为默认的示范文本，搜一搜“Lorem Ipsum”就能找到这些网站的雏形。这些年来Lorem Ipsum演变出了各式各样的版本，有些出于偶然，有些则是故意的（刻意的幽默之类的'),
(356,	1,	NULL,	'jackpot_description',	'Давно выяснено, что при оценке дизайна и композиции читаемый текст мешает сосредоточиться. Lorem Ipsum используют потому, что тот обеспечивает более или менее стандартное заполнение шаблона, а также реальное распределение букв и пробелов в абзацах, которое не получается при простой дубликации \"Здесь ваш текст.. Здесь ваш текст.. Здесь ваш текст..\" Многие программы электронной вёрстки и редакторы HTML используют Lorem Ipsum в качестве текста по умолчанию, так что поиск по ключевым словам \"lorem ipsum\" сразу показывает, как много веб-страниц всё ещё дожидаются своего настоящего рождения. За прошедшие годы текст Lorem Ipsum получил много версий. Некоторые версии появились по ошибке, некоторые - намеренно (например, юмористические варианты)'),
(357,	2,	NULL,	'jackpot_description',	'jackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpotjackpot_ descriptionjackpot _descriptionjackpot'),
(358,	3,	NULL,	'jackpot_description',	'无可否认，当读者在浏览一个页面的排版时，难免会被可阅读的内容所分散注意力。Lorem Ipsum的目的就是为了保持字母多多少少标准及平均的分配，而不是“此处有文本，此处有文本”，从而让内容更像可读的英语。如今，很多桌面排版软件以及网页编辑用Lorem Ipsum作为默认的示范文本，搜一搜“Lorem Ipsum”就能找到这些网站的雏形。这些年来Lorem Ipsum演变出了各式各样的版本，有些出于偶然，有些则是故意的（刻意的幽默之类的'),
(359,	2,	NULL,	'main_T',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. '),
(360,	2,	NULL,	'main_bitcoin',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. '),
(361,	2,	NULL,	'main_hands',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'),
(362,	2,	NULL,	'main_play',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'),
(363,	2,	NULL,	'main_prize',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'),
(364,	2,	NULL,	'jackpot_view_text_1',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias animi aperiam aspernatur blanditiis consequuntur cupiditate debitis ea enim eveniet fuga illum inventore iste iure labore laborum, libero maxime molestias nesciunt nisi nobis numquam odit perspiciatis sunt totam, veniam voluptatem.'),
(365,	2,	NULL,	'jackpot_view_text_2',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias animi aperiam aspernatur blanditiis consequuntur cupiditate debitis ea enim eveniet fuga illum inventore iste iure labore laborum, libero maxime molestias nesciunt nisi nobis numquam odit perspiciatis sunt totam, veniam voluptatem.'),
(366,	2,	NULL,	'jackpot_view_text_3',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias animi aperiam aspernatur blanditiis consequuntur cupiditate debitis ea enim eveniet fuga illum inventore iste iure labore laborum, libero maxime molestias nesciunt nisi nobis numquam odit perspiciatis sunt totam, veniam voluptatem.'),
(367,	2,	NULL,	'jackpot_view_text_4',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias animi aperiam aspernatur blanditiis consequuntur cupiditate debitis ea enim eveniet fuga illum inventore iste iure labore laborum, libero maxime molestias nesciunt nisi nobis numquam odit perspiciatis sunt totam, veniam voluptatem.'),
(368,	2,	NULL,	'lottery_view_text',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ducimus ipsa nemo numquam quas quibusdam tempora voluptate! Consectetur distinctio eligendi ratione sapiente. Accusantium alias debitis, deserunt, dolor eveniet facilis ipsa laboriosam molestias nisi nobis quisquam quod repellat sapiente. A alias architecto aut cupiditate deleniti dolore ea error est explicabo in natus nostrum nulla numquam, perspiciatis reprehenderit soluta sunt unde velit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium aliquid aperiam asperiores aut autem consectetur consequatur cumque dicta doloribus esse et, eum eveniet explicabo fugit hic illo impedit iure iusto mollitia non nostrum obcaecati officiis optio porro, possimus quisquam recusandae rem repellat reprehenderit sapiente suscipit voluptas voluptatibus! Praesentium, sapiente? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem eum necessitatibus nulla quisquam ratione reprehenderit rerum voluptate? Ab doloremque, magnam minus nemo pariatur quia saepe vel vero! Distinctio dolores, earum magnam magn')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `language_id` = VALUES(`language_id`), `target_id` = VALUES(`target_id`), `alias` = VALUES(`alias`), `text` = VALUES(`text`);

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
(2,	29,	'lottery',	'pipp'),
(3,	47,	'lottery',	'test'),
(4,	49,	'lottery',	'test'),
(5,	50,	'lottery',	'rita'),
(6,	51,	'lottery',	'ritars')
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

-- 2018-07-10 12:51:01
