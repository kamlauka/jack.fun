-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin',	'2',	1533494582),
('moderator',	'51',	1533494582),
('superAdmin',	'1',	1533494582)
ON DUPLICATE KEY UPDATE `item_name` = VALUES(`item_name`), `user_id` = VALUES(`user_id`), `created_at` = VALUES(`created_at`);

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin',	1,	'Administrator',	NULL,	NULL,	1533494581,	1533494581),
('create',	2,	'Create',	NULL,	NULL,	1533494582,	1533494582),
('createLanguage',	2,	'Создание языков',	NULL,	NULL,	1533494582,	1533494582),
('createRoles',	2,	'Создание ролей',	NULL,	NULL,	1533494582,	1533494582),
('delete',	2,	'delete',	NULL,	NULL,	1533494582,	1533494582),
('deleteBanlist',	2,	'delete Ban list',	NULL,	NULL,	1533494582,	1533494582),
('deleteLanguage',	2,	'delete Language',	NULL,	NULL,	1533494582,	1533494582),
('deleteOnline',	2,	'delete Online',	NULL,	NULL,	1533494582,	1533494582),
('deleteRoles',	2,	'Удаление ролей',	NULL,	NULL,	1533494582,	1533494582),
('index',	2,	'Index',	NULL,	NULL,	1533494582,	1533494582),
('indexLanguage',	2,	'Главная Language',	NULL,	NULL,	1533494582,	1533494582),
('moderator',	1,	'Moderator',	NULL,	NULL,	1533494582,	1533494582),
('superAdmin',	1,	'SuperAdministrator',	NULL,	NULL,	1533494581,	1533494581),
('update',	2,	'Update',	NULL,	NULL,	1533494582,	1533494582),
('updateLanguage',	2,	'update Language',	NULL,	NULL,	1533494582,	1533494582),
('user',	1,	'user',	NULL,	NULL,	1533494581,	1533494581),
('view',	2,	'view',	NULL,	NULL,	1533494582,	1533494582),
('viewLanguage',	2,	'view Language',	NULL,	NULL,	1533494582,	1533494582)
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`), `type` = VALUES(`type`), `description` = VALUES(`description`), `rule_name` = VALUES(`rule_name`), `data` = VALUES(`data`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('superAdmin',	'admin'),
('moderator',	'create'),
('superAdmin',	'createLanguage'),
('admin',	'createRoles'),
('admin',	'delete'),
('moderator',	'deleteBanlist'),
('superAdmin',	'deleteLanguage'),
('moderator',	'deleteOnline'),
('admin',	'deleteRoles'),
('moderator',	'index'),
('superAdmin',	'indexLanguage'),
('admin',	'moderator'),
('superAdmin',	'moderator'),
('moderator',	'update'),
('superAdmin',	'updateLanguage'),
('moderator',	'view'),
('superAdmin',	'viewLanguage')
ON DUPLICATE KEY UPDATE `parent` = VALUES(`parent`), `child` = VALUES(`child`);

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('admin',	'<?php\n\nnamespace backend\\controllers;\n\nuse backend\\models\\Role;\n\nuse backend\\models\\RoleSearch;\nuse yii\\web\\Controller;\nuse yii\\web\\NotFoundHttpException;\nuse Yii;\n\n\n/**\n * LogController implements the CRUD actions for Log model.\n */\nclass RoleController extends Controller\n{\n\n    /**\n     * Lists all Log models.\n     * @return mixed\n     */\n    public function actionIndex()\n    {\n        $searchModel = new RoleSearch();\n        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);\n\n        return $this->render(\'index\', [\n            \'searchModel\' => $searchModel,\n            \'dataProvider\' => $dataProvider,\n        ]);\n    }\n\n    /**\n     * Creates a new Log model.\n     * If creation is successful, the browser will be redirected to the \'view\' page.\n     * @return mixed\n     */\n    public function actionCreate()\n    {\n        $model = new Role();\n\n        if ($model->load(Yii::$app->request->post()) && $model->save()) {\n            Yii::$app->session->setFlash(\'success\', \'Role added\');\n        }\n\n        return $this->render(\'create\', [\n            \'model\' => $model,\n        ]);\n    }\n\n    /**\n     * Deletes an existing Log model.\n     * If deletion is successful, the browser will be redirected to the \'index\' page.\n     * @param integer $id\n     * @return mixed\n     * @throws NotFoundHttpException if the model cannot be found\n     */\n    public function actionDelete($id)\n    {\n        if (!\\Yii::$app->user->can(\'Delete\')) {\n            throw new ForbiddenHttpException(\'Access denied\');\n        }\n\n        $this->findModel($id)->delete();\n\n        return $this->redirect([\'index\']);\n    }\n}\n',	NULL,	NULL)
ON DUPLICATE KEY UPDATE `name` = VALUES(`name`), `data` = VALUES(`data`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`);

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
(62,	2,	51,	0.0284397,	0,	0.00006,	0.0000003,	0.0015,	0,	'2018-07-24 02:25:45',	NULL),
(63,	2,	51,	0.0284397,	0,	0.00006,	0.0000003,	0.0015,	0,	'2018-07-31 02:52:00',	NULL),
(64,	2,	51,	0.0284397,	0,	0.00006,	0.0000003,	0.0015,	0,	'2018-07-31 03:10:23',	NULL),
(65,	2,	51,	0.284397,	0,	0.0006,	0.000003,	0.015,	0,	'2018-07-31 03:13:42',	NULL),
(66,	2,	51,	0.284397,	0,	0.0006,	0.000003,	0.015,	0,	'2018-07-31 03:16:32',	NULL)
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

DROP TABLE IF EXISTS `copy_auth_rule`;
CREATE TABLE `copy_auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `copy_migration`;
CREATE TABLE `copy_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `copy_migration` (`version`, `apply_time`) VALUES
('m000000_000000_base',	1533420273),
('m140506_102106_rbac_init',	1533420278),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id',	1533420278)
ON DUPLICATE KEY UPDATE `version` = VALUES(`version`), `apply_time` = VALUES(`apply_time`);

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
(5,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(6,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(7,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(8,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(9,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(10,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(11,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-06-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(12,	'Сделай',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(13,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(15,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(16,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(17,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(18,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(19,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(20,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(21,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(22,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(23,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-06-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(24,	'Сделай',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(25,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(26,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(27,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(32,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(33,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(34,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(35,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(36,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(37,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(38,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-06-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(39,	'Сделай',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(40,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(41,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(42,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(43,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(44,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(45,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(46,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(47,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(48,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(49,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-06-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(50,	'Сделай',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(51,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(52,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(53,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(63,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(64,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(65,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(66,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(67,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(68,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(69,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-06-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(70,	'Сделай',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(71,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(72,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(73,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(74,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(75,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(76,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(77,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(78,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(79,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(80,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-06-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(81,	'Сделай',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(82,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(83,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(84,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(85,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(86,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(87,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(88,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(89,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(90,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(91,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-06-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(92,	'Сделай',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(93,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(94,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(95,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(96,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(97,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(98,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(99,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(100,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(101,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(102,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-06-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(103,	'Сделай',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(104,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(105,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(106,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(126,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(127,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(128,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(129,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(130,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(131,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(132,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-06-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(133,	'Сделай',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(134,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(135,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(136,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(137,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(138,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(139,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(140,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(141,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(142,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(143,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-06-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(144,	'Сделай',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(145,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(146,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(147,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(148,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(149,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(150,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(151,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(152,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(153,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(154,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-06-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(155,	'Сделай',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(156,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(157,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(158,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(159,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(160,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(161,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(162,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(163,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(164,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(165,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-06-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(166,	'Сделай',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(167,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(168,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(169,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(170,	'Спр',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	12,	400,	2,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(171,	'Спор',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(172,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	43,	45,	2,	'2018-06-11 10:33:30',	'2018-06-11 10:33:30',	NULL,	0,	'Нужно укусить себя за локоть!'),
(173,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	1,	1,	44,	45,	2,	'2018-05-24 15:35:30',	'2018-05-25 15:35:35',	NULL,	0,	'Нужно засунуть что-то куда-то!'),
(174,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	2,	1,	43,	44,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!'),
(175,	'Ты этого не сможеш',	'/../../common/uploads/dispute/arm-tattoo-tattoos.jpg',	1,	400,	0,	1,	NULL,	NULL,	2,	'2018-05-24 14:35:30',	'2018-05-25 14:35:30',	NULL,	0,	'Нужно засунуть лампочку в рот!')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `img` = VALUES(`img`), `rate` = VALUES(`rate`), `total` = VALUES(`total`), `type` = VALUES(`type`), `active` = VALUES(`active`), `executor_id` = VALUES(`executor_id`), `initiator_id` = VALUES(`initiator_id`), `moderator_id` = VALUES(`moderator_id`), `date_start` = VALUES(`date_start`), `date_end` = VALUES(`date_end`), `result` = VALUES(`result`), `status` = VALUES(`status`), `description` = VALUES(`description`);

DROP TABLE IF EXISTS `jackpot`;
CREATE TABLE `jackpot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` double NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `date_start` datetime NOT NULL,
  `result` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `jackpot` (`id`, `total`, `status`, `date_start`, `result`) VALUES
(3,	88.0028903516,	1,	'2018-07-19 18:10:09',	NULL),
(4,	546,	0,	'2018-06-07 09:25:20',	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `total` = VALUES(`total`), `status` = VALUES(`status`), `date_start` = VALUES(`date_start`), `result` = VALUES(`result`);

DROP TABLE IF EXISTS `language`;
CREATE TABLE `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(8) NOT NULL,
  `name` varchar(32) NOT NULL,
  `local` varchar(8) NOT NULL,
  `active` varchar(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `language` (`id`, `alias`, `name`, `local`, `active`) VALUES
(1,	'ru',	'Русский',	'ru-RU',	'active'),
(2,	'en',	'English',	'en-EN',	'active'),
(3,	'ch',	'中国',	'zh-cn',	'active')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `alias` = VALUES(`alias`), `name` = VALUES(`name`), `local` = VALUES(`local`), `active` = VALUES(`active`);

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

INSERT INTO `log` (`id`, `type`, `user_id`, `target_id`, `amount`, `result`) VALUES
(1,	3,	1,	21,	1,	1)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `type` = VALUES(`type`), `user_id` = VALUES(`user_id`), `target_id` = VALUES(`target_id`), `amount` = VALUES(`amount`), `result` = VALUES(`result`);

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

INSERT INTO `lottery` (`id`, `name`, `total`, `status`, `currency_start`, `result`, `description`, `rate`, `name_prize`, `img`) VALUES
(51,	'id = 340,343,346,',	0.853191,	'Active',	330,	NULL,	'id = 341,344,347,',	0.3,	'id = 342,345,348,',	'/../../common/uploads/lottery/iphone.png'),
(53,	'id = 340,343,346,',	0.1137588,	'Wait_participant',	330,	'1',	'id = 341,344,347,',	0.03,	'id = 342,345,348,',	'/../../common/uploads/lottery/iphone.png')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `total` = VALUES(`total`), `status` = VALUES(`status`), `currency_start` = VALUES(`currency_start`), `result` = VALUES(`result`), `description` = VALUES(`description`), `rate` = VALUES(`rate`), `name_prize` = VALUES(`name_prize`), `img` = VALUES(`img`);

DROP TABLE IF EXISTS `modification`;
CREATE TABLE `modification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `data` varchar(64) NOT NULL,
  `description` text,
  `role` varchar(16) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `modification` (`id`, `name`, `data`, `description`, `role`) VALUES
(1,	'percent_target',	'2',	'Процентов от ставки плюхнется в фонд текшей лотереи',	'superAdmin'),
(2,	'percent_jackpot',	'0.2',	'% в Джекпот - общий фонд, будет разыгрываться, раз в месяц между всеми игроками',	'superAdmin'),
(3,	'percent_exchange',	'0.001',	'%  комиссия биржы https://bitshares.org/ за транзакцию',	'superAdmin'),
(4,	'percent_admin',	'5',	'5% на содержание сайта и на зп модераторам',	'superAdmin'),
(5,	'percent_organizer_dispute ',	'1',	'1 % организаторам споров.',	'superAdmin'),
(6,	'wallet_account',	'P5HxqgByoxPYbtYgdSAe9MWPRqbH4msAYL5T3QDQWuKYX',	'Кошелек администратора',	'superAdmin'),
(7,	'dispute',	'11',	'Спор на главной',	'moderator'),
(8,	'dispute',	'8',	'Спор на главной',	'moderator'),
(9,	'dispute',	'7',	'Спор на главной',	'moderator')
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `name` = VALUES(`name`), `data` = VALUES(`data`), `description` = VALUES(`description`), `role` = VALUES(`role`);

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
(97,	2,	'not confirmed',	51,	0.3,	'P5HxqgByoxPYbtYgdSAe9MWPRqbH4msAYL5T3QDQWuKYX')
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
(360,	2,	NULL,	'main_bitcoin',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor. '),
(361,	2,	NULL,	'main_hands',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'),
(362,	2,	NULL,	'main_play',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'),
(363,	2,	NULL,	'main_prize',	'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.'),
(364,	2,	NULL,	'jackpot_view_text_1',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias animi aperiam aspernatur blanditiis consequuntur cupiditate debitis ea enim eveniet fuga illum inventore iste iure labore laborum, libero maxime molestias nesciunt nisi nobis numquam odit perspiciatis sunt totam, veniam voluptatem.'),
(365,	2,	NULL,	'jackpot_view_text_2',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias animi aperiam aspernatur blanditiis consequuntur cupiditate debitis ea enim eveniet fuga illum inventore iste iure labore laborum, libero maxime molestias nesciunt nisi nobis numquam odit perspiciatis sunt totam, veniam voluptatem.'),
(366,	2,	NULL,	'jackpot_view_text_3',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias animi aperiam aspernatur blanditiis consequuntur cupiditate debitis ea enim eveniet fuga illum inventore iste iure labore laborum, libero maxime molestias nesciunt nisi nobis numquam odit perspiciatis sunt totam, veniam voluptatem.'),
(367,	2,	NULL,	'jackpot_view_text_4',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A adipisci alias animi aperiam aspernatur blanditiis consequuntur cupiditate debitis ea enim eveniet fuga illum inventore iste iure labore laborum, libero maxime molestias nesciunt nisi nobis numquam odit perspiciatis sunt totam, veniam voluptatem.'),
(368,	2,	NULL,	'lottery_view_text',	'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ducimus ipsa nemo numquam quas quibusdam tempora voluptate! Consectetur distinctio eligendi ratione sapiente. Accusantium alias debitis, deserunt, dolor eveniet facilis ipsa laboriosam molestias nisi nobis quisquam quod repellat sapiente. A alias architecto aut cupiditate deleniti dolore ea error est explicabo in natus nostrum nulla numquam, perspiciatis reprehenderit soluta sunt unde velit! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab accusantium aliquid aperiam asperiores aut autem consectetur consequatur cumque dicta doloribus esse et, eum eveniet explicabo fugit hic illo impedit iure iusto mollitia non nostrum obcaecati officiis optio porro, possimus quisquam recusandae rem repellat reprehenderit sapiente suscipit voluptas voluptatibus! Praesentium, sapiente? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolorem eum necessitatibus nulla quisquam ratione reprehenderit rerum voluptate? Ab doloremque, magnam minus nemo pariatur quia saepe vel vero! Distinctio dolores, earum magnam magn'),
(369,	1,	NULL,	'main_bitcoin',	'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли'),
(370,	1,	NULL,	'main_hands',	'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли'),
(371,	1,	NULL,	'main_play',	'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли '),
(372,	1,	NULL,	'main_prize',	'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI сторіччя, коли '),
(373,	3,	NULL,	'main_bitcoin',	'Lorem Ipsum，也称乱数假文或者哑元文本， 是印刷及排版领域所常用的虚拟文字。由于曾经一台匿名的打印机刻意打乱了一盒印刷字体从而造出一本字体样品书，'),
(374,	1,	NULL,	'main_T',	'Lorem Ipsum - це текст-\"риба\", що використовується в друкарстві та дизайні. Lorem Ipsum є, фактично, стандартною \"рибою\" аж з XVI'),
(375,	3,	NULL,	'main_hands',	'也称乱数假文或者哑元文本， 是印刷及排版领域所常用的虚拟文字。由于曾经一台匿名的打印机刻意打乱了一盒印刷字体从而造出一本字体样品书，Lorem Ipsum从西元15世纪起就被作为此领域的标准文本使用。它不仅延'),
(376,	3,	NULL,	'main_play',	'也称乱数假文或者哑元文本， 是印刷及排版领域所常用的虚拟文字。由于曾经一台匿名的打印机刻意打乱了一盒印刷字体从而造出一本字体样品书，Lorem Ipsum从西元15世纪起就被作为此领域的标准文本使用。它不仅延'),
(377,	3,	NULL,	'main_prize',	'无可否认，当读者在浏览一个页面的排版时，难免会被可阅读的内容所分散注意力。无可否认，当读者在浏览一个页面的排版时，难免会被可阅读的内容所分散注意力。')
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
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `phone` varchar(32) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `file` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  `active` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `phone`, `avatar`, `file`, `active`) VALUES
(1,	'superAdmin',	'A1qwgmpDchz5AztmbE-YOaTOLZZkQmDm',	'$2y$13$oMa6rChD.bP0pDJUlVQHr.eP5Lm8eqBzAW0rd3VCWVRqCFaYe.S1O',	NULL,	'admin@admin.com',	1,	1526915570,	1531830606,	'000000000000',	'/../../common/uploads/avatar/Енот.jpg',	'/../../common/uploads/avatar/U1sILnSlyAQ.jpg',	NULL),
(2,	'admin',	'USa0h80IbiOH9p-lSFFfAl7yvFswoQ0I',	'$2y$13$NnR4kE/Vuy7NQnhqtdHUquOpIn2rPASouXd1O6xiTztXJmO8bU2mC',	'UcnjVhK_ECeJB9FzDka_b5cXuNxqqXt__1533038737',	'sd@terlabs.com',	1,	1526983224,	1533560101,	'0969361424',	'/../../common/uploads/avatar/smile.png',	'',	NULL),
(43,	'dzybenko',	'7_6ydryZcxx-MOYpFvpr3A6gKpi9rIwR',	'$2y$13$NJ.n66K1A42cpUe2PxbQ6u2hLL2iZzzrVwTyAEEEAzDyeqic9om86',	NULL,	'sd3@terlabs.com',	1,	1531406226,	1531406226,	NULL,	NULL,	NULL,	'2045179b80cd9ea6d4da82f0ce5e6859'),
(44,	'hkjhkhjk33',	'peoa_uE3PS7iXWgonnXdTK0Feyp8v1mu',	'$2y$13$faZq.aBEUAyNjKroEbPqyeIPNQgIW8ErzZguxmJKxKpSVow3sj7Ke',	NULL,	'sd33@terlabs.com3',	1,	1531406307,	1531406307,	NULL,	NULL,	NULL,	'bd9fffd883a2af3a6fcf88bf1c5db3a9'),
(45,	'hkjhkhjk334',	'ornOYkgBIjjuoGqRMiEdu4UAN0y1taX4',	'$2y$13$9PF4iUmN9QNI6XFJXINIFO5zqTdcBProZTQfWPuW3r5QAPQBCI8IW',	NULL,	'sd334@terlabs.com3',	1,	1531406337,	1531406337,	NULL,	NULL,	NULL,	'c34a9d2b2ba22fde4516f184522fdd0d'),
(46,	'hkjhkhjk3343',	'4qgdkfXkBXl19JjXck44MsVc1LME6ODL',	'$2y$13$VRMJN1YHHEQjOpi1LvzSve.6YSwprDU0JS9Sz93jH2s7RkCjhZ1jq',	NULL,	'sd334@terlabs.com33',	1,	1531406449,	1531406449,	NULL,	NULL,	NULL,	'b27b3d7a938f5bea53db2f1ca5f83baa'),
(47,	'hkjhkhjk33433',	'SG5w1-IrCyOp-QhCF9BaNUJT1cXWD-YM',	'$2y$13$U1AusbT9J9BRQvNLxUJVZuhYOh4J8Gs.OqZnOA.NVy3KvjNsydEoW',	NULL,	'sd334@terlabs.com3334',	1,	1531406511,	1531406511,	NULL,	NULL,	NULL,	'8fdb2966c6307002fbb190abf3a9a237'),
(48,	'hkjh3khjk33433',	'wPjSYsJ1CEBepaA9NOMj5IIJEZDePgdI',	'$2y$13$Geatx/Xejaye2VSM.HS7tes0I28yfvGVXY0reZYmqz4cA.ZgOHnZu',	NULL,	'sd3334@terlabs.com3334',	1,	1531406576,	1531406576,	NULL,	NULL,	NULL,	'16a831a3c396512151739aa88853738b'),
(49,	'fdgdfgdfg',	'dgqBUTbdcfQR35gMe6KIU8FbUUhvkUhu',	'$2y$13$iUnd8EaThN/1U1PLgL2ao.olbgpsCynmF.j4eBJuwtkdFF2pJ/k0y',	NULL,	'fgf@fgfdg.fg',	1,	1531406971,	1531406971,	NULL,	NULL,	NULL,	'9d43ffef4acba5abdbcebdec25ed7c30'),
(50,	'fdgdfgdfgw',	'ADLLzOgM4DT9ru64Dd2OPu3KmrayRrG-',	'$2y$13$aUU9lxGD/7q7IvJ5z4kds.MBBwU9o8o2.Q4tikaj2XgbAQwHNxiCy',	NULL,	'fgf@fgfdg.fgw',	1,	1531407037,	1531407037,	NULL,	NULL,	NULL,	'f37be569606db8bc6687f1df1b1554d3'),
(51,	'stas',	'USa0h80IbiOH9p-lSFFfAl7yvFswoQ0I',	'$2y$13$NJ.n66K1A42cpUe2PxbQ6u2hLL2iZzzrVwTyAEEEAzDyeqic9om86',	'UcnjVhK_ECeJB9FzDka_b5cXuNxqqXt__1533038737',	'sd@terlabs.com',	1,	1526983224,	1533038737,	'0969361424',	'/../../common/uploads/avatar/smile.png',	'',	NULL)
ON DUPLICATE KEY UPDATE `id` = VALUES(`id`), `username` = VALUES(`username`), `auth_key` = VALUES(`auth_key`), `password_hash` = VALUES(`password_hash`), `password_reset_token` = VALUES(`password_reset_token`), `email` = VALUES(`email`), `status` = VALUES(`status`), `created_at` = VALUES(`created_at`), `updated_at` = VALUES(`updated_at`), `phone` = VALUES(`phone`), `avatar` = VALUES(`avatar`), `file` = VALUES(`file`), `active` = VALUES(`active`);

-- 2018-08-07 13:41:59
