/*
Navicat MySQL Data Transfer

Source Server         : MYSQL
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : ci-dempster

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2015-03-20 23:17:03
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `gejala`
-- ----------------------------
DROP TABLE IF EXISTS `gejala`;
CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) DEFAULT NULL,
  `gejala` varchar(100) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `densitas` float(10,5) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gejala
-- ----------------------------
INSERT INTO `gejala` VALUES ('1', 'G1', 'Bibit yang terkena mati', null, '0.75000', '2015-03-14 16:53:17');
INSERT INTO `gejala` VALUES ('2', 'G2', 'Tumbuh memanjang kurang wajar', null, '0.25000', '2015-03-14 16:53:37');
INSERT INTO `gejala` VALUES ('3', 'G3', 'Garis air pada batang', null, '0.50000', '2015-03-14 16:53:40');
INSERT INTO `gejala` VALUES ('4', 'G4', 'Tetesan embun seperti susu timbul di permukaan', null, '0.33000', '2015-03-14 16:54:25');
INSERT INTO `gejala` VALUES ('5', 'G5', 'Menghasilkan beberaoa anakan dengan malai kosong', null, '0.25000', '2015-03-18 06:27:06');
INSERT INTO `gejala` VALUES ('6', 'G6', 'Bakteri menetas pada luka baru', null, '0.25000', '2015-03-14 16:54:35');
INSERT INTO `gejala` VALUES ('7', 'G7', 'Daun kuning', null, '0.70000', '2015-03-14 16:54:00');
INSERT INTO `gejala` VALUES ('8', 'G8', 'Fungsi berbentuk bubuk keputihan', null, '0.50000', '2015-03-19 22:01:30');
INSERT INTO `gejala` VALUES ('9', 'G9', 'Kadang malai busuk', null, '0.85000', '2015-03-14 16:54:10');
INSERT INTO `gejala` VALUES ('10', 'G10', 'Tidak menghasilkan malai', null, '0.50000', '2015-03-19 22:01:52');

-- ----------------------------
-- Table structure for `gejala_index`
-- ----------------------------
DROP TABLE IF EXISTS `gejala_index`;
CREATE TABLE `gejala_index` (
  `id_g_index` int(11) NOT NULL AUTO_INCREMENT,
  `noindex` int(11) DEFAULT NULL,
  `id_p` int(11) NOT NULL,
  `id_g` int(11) DEFAULT NULL,
  `d` decimal(10,5) DEFAULT NULL,
  `t` decimal(10,5) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_g_index`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gejala_index
-- ----------------------------
INSERT INTO `gejala_index` VALUES ('1', '1', '1', '1', '0.75000', '0.25000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('2', '2', '1', '2', '0.25000', '0.75000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('3', '3', '1', '5', '0.25000', '0.75000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('4', '4', '1', '9', '0.85000', '0.15000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('5', '1', '2', '1', '0.75000', '0.25000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('6', '2', '2', '2', '0.25000', '0.75000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('7', '3', '2', '5', '0.25000', '0.75000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('8', '4', '2', '8', '0.50000', '0.50000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('9', '5', '2', '9', '0.85000', '0.15000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('10', '6', '2', '10', '0.50000', '0.50000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('11', '1', '3', '1', '0.75000', '0.25000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('12', '2', '3', '2', '0.25000', '0.75000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('13', '3', '3', '3', '0.50000', '0.50000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('14', '4', '3', '4', '0.33000', '0.67000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('15', '5', '3', '5', '0.25000', '0.75000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('16', '6', '3', '6', '0.25000', '0.75000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('17', '7', '3', '7', '0.70000', '0.30000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('18', '1', '4', '1', '0.75000', '0.25000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('19', '2', '4', '2', '0.25000', '0.75000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('20', '3', '4', '5', '0.25000', '0.75000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('21', '4', '4', '6', '0.25000', '0.75000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('22', '5', '4', '8', '0.50000', '0.50000', '2015-03-20 23:14:56');
INSERT INTO `gejala_index` VALUES ('23', '6', '4', '9', '0.85000', '0.15000', '2015-03-20 23:14:56');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `groups` VALUES ('2', 'members', 'General User');
INSERT INTO `groups` VALUES ('3', 'petugas', 'Petugas Pertandingan');
INSERT INTO `groups` VALUES ('4', 'pengawas', 'Pengawas Pertandingan');
INSERT INTO `groups` VALUES ('5', 'peserta', 'Peserta Pertandingan');
INSERT INTO `groups` VALUES ('6', 'official', 'Pengurus Tim');
INSERT INTO `groups` VALUES ('7', 'publik', 'Umum');

-- ----------------------------
-- Table structure for `penyakit`
-- ----------------------------
DROP TABLE IF EXISTS `penyakit`;
CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) DEFAULT NULL,
  `penyakit` varchar(150) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `penyebab` text,
  `penanggulangan` text,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penyakit
-- ----------------------------
INSERT INTO `penyakit` VALUES ('1', 'P1', 'Bakanaea', '', '', 'ok', '2015-03-20 17:13:52');
INSERT INTO `penyakit` VALUES ('2', 'P2', 'Busuk Pelepah Dauns', '', '', '', '2015-03-20 17:11:09');
INSERT INTO `penyakit` VALUES ('3', 'P3', 'Kresek', '', '', '', '2015-03-20 17:14:22');
INSERT INTO `penyakit` VALUES ('4', 'P4', 'Kerdil Hampa', '', '', '', '2015-03-20 17:14:55');

-- ----------------------------
-- Table structure for `penyakit_gejala`
-- ----------------------------
DROP TABLE IF EXISTS `penyakit_gejala`;
CREATE TABLE `penyakit_gejala` (
  `id_peny_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `density` decimal(10,0) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_peny_gejala`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penyakit_gejala
-- ----------------------------
INSERT INTO `penyakit_gejala` VALUES ('56', '2', '1', null, '2015-03-20 23:01:42');
INSERT INTO `penyakit_gejala` VALUES ('57', '2', '2', null, '2015-03-20 23:01:42');
INSERT INTO `penyakit_gejala` VALUES ('58', '2', '5', null, '2015-03-20 23:01:42');
INSERT INTO `penyakit_gejala` VALUES ('59', '2', '8', null, '2015-03-20 23:01:42');
INSERT INTO `penyakit_gejala` VALUES ('60', '2', '9', null, '2015-03-20 23:01:42');
INSERT INTO `penyakit_gejala` VALUES ('61', '2', '10', null, '2015-03-20 23:01:42');
INSERT INTO `penyakit_gejala` VALUES ('73', '1', '1', null, '2015-03-20 23:13:53');
INSERT INTO `penyakit_gejala` VALUES ('74', '1', '2', null, '2015-03-20 23:13:53');
INSERT INTO `penyakit_gejala` VALUES ('75', '1', '5', null, '2015-03-20 23:13:53');
INSERT INTO `penyakit_gejala` VALUES ('76', '1', '9', null, '2015-03-20 23:13:53');
INSERT INTO `penyakit_gejala` VALUES ('77', '3', '1', null, '2015-03-20 23:14:22');
INSERT INTO `penyakit_gejala` VALUES ('78', '3', '2', null, '2015-03-20 23:14:22');
INSERT INTO `penyakit_gejala` VALUES ('79', '3', '3', null, '2015-03-20 23:14:22');
INSERT INTO `penyakit_gejala` VALUES ('80', '3', '4', null, '2015-03-20 23:14:22');
INSERT INTO `penyakit_gejala` VALUES ('81', '3', '5', null, '2015-03-20 23:14:22');
INSERT INTO `penyakit_gejala` VALUES ('82', '3', '6', null, '2015-03-20 23:14:22');
INSERT INTO `penyakit_gejala` VALUES ('83', '3', '7', null, '2015-03-20 23:14:22');
INSERT INTO `penyakit_gejala` VALUES ('84', '4', '1', null, '2015-03-20 23:14:55');
INSERT INTO `penyakit_gejala` VALUES ('85', '4', '2', null, '2015-03-20 23:14:55');
INSERT INTO `penyakit_gejala` VALUES ('86', '4', '5', null, '2015-03-20 23:14:55');
INSERT INTO `penyakit_gejala` VALUES ('87', '4', '6', null, '2015-03-20 23:14:55');
INSERT INTO `penyakit_gejala` VALUES ('88', '4', '8', null, '2015-03-20 23:14:55');
INSERT INTO `penyakit_gejala` VALUES ('89', '4', '9', null, '2015-03-20 23:14:55');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id_role` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(255) NOT NULL,
  `role_json` tinytext,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_role`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'petugas', '[{\'player_info\':1}]', '0000-00-00 00:00:00');
INSERT INTO `role` VALUES ('2', 'official', '[{\'edit_tim\':1,\'add_player\':1}]', '0000-00-00 00:00:00');
INSERT INTO `role` VALUES ('3', 'peserta', '[{\'edit_profil\':1}]', '0000-00-00 00:00:00');

-- ----------------------------
-- Table structure for `rule_inferensi`
-- ----------------------------
DROP TABLE IF EXISTS `rule_inferensi`;
CREATE TABLE `rule_inferensi` (
  `id_peny_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_peny_gejala`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rule_inferensi
-- ----------------------------
INSERT INTO `rule_inferensi` VALUES ('1', '1', '1', '2015-03-14 12:25:39');
INSERT INTO `rule_inferensi` VALUES ('2', '1', '2', '2015-03-14 12:25:44');
INSERT INTO `rule_inferensi` VALUES ('3', '1', '5', '2015-03-14 12:25:44');
INSERT INTO `rule_inferensi` VALUES ('4', '1', '9', '2015-03-19 23:03:22');
INSERT INTO `rule_inferensi` VALUES ('5', '2', '1', '2015-03-19 23:03:33');
INSERT INTO `rule_inferensi` VALUES ('6', '2', '2', '2015-03-19 23:03:34');
INSERT INTO `rule_inferensi` VALUES ('7', '2', '5', '2015-03-19 23:03:37');
INSERT INTO `rule_inferensi` VALUES ('8', '2', '8', '2015-03-19 23:03:41');
INSERT INTO `rule_inferensi` VALUES ('9', '2', '9', '2015-03-19 23:03:42');
INSERT INTO `rule_inferensi` VALUES ('10', '2', '10', '2015-03-19 23:03:46');
INSERT INTO `rule_inferensi` VALUES ('11', '3', '1', '2015-03-19 22:44:48');
INSERT INTO `rule_inferensi` VALUES ('12', '3', '2', '2015-03-19 22:44:49');
INSERT INTO `rule_inferensi` VALUES ('13', '3', '3', '2015-03-19 23:03:57');
INSERT INTO `rule_inferensi` VALUES ('14', '3', '4', '2015-03-19 23:04:04');
INSERT INTO `rule_inferensi` VALUES ('15', '3', '5', '2015-03-19 23:04:05');
INSERT INTO `rule_inferensi` VALUES ('16', '3', '6', '2015-03-19 23:04:05');
INSERT INTO `rule_inferensi` VALUES ('17', '3', '7', '2015-03-19 23:04:06');
INSERT INTO `rule_inferensi` VALUES ('18', '4', '1', '2015-03-19 23:04:15');
INSERT INTO `rule_inferensi` VALUES ('19', '4', '2', '2015-03-19 23:04:18');
INSERT INTO `rule_inferensi` VALUES ('20', '4', '5', '2015-03-14 12:28:28');
INSERT INTO `rule_inferensi` VALUES ('21', '4', '6', '2015-03-14 12:28:28');
INSERT INTO `rule_inferensi` VALUES ('22', '4', '8', '2015-03-19 23:04:27');
INSERT INTO `rule_inferensi` VALUES ('23', '4', '9', '2015-03-19 23:04:28');

-- ----------------------------
-- Table structure for `temp`
-- ----------------------------
DROP TABLE IF EXISTS `temp`;
CREATE TABLE `temp` (
  `id_temp` int(11) NOT NULL AUTO_INCREMENT,
  `var1` float NOT NULL,
  `var2` float NOT NULL DEFAULT '0',
  `var3` float NOT NULL DEFAULT '0',
  `var4` float NOT NULL DEFAULT '0',
  `val1` float NOT NULL DEFAULT '0',
  `val2` float NOT NULL DEFAULT '0',
  `val3` float NOT NULL DEFAULT '0',
  `val4` float NOT NULL DEFAULT '0',
  `datetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id_temp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of temp
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', null, null, '3LyNKmDwSaFR4DNS9WQFKO', '1268889823', '1426855411', '1', 'Admin', 'istrator', 'ADMIN', '0');
INSERT INTO `users` VALUES ('2', '', 'petugas', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', null, 'petugas@gmail.com', null, null, null, 'UBHKS622uhF32j9h4uttjO', '0', '1423312036', '1', 'Petugas', 'Pertandingan', 'PERBASI', '123123');
INSERT INTO `users` VALUES ('3', '', 'pengawas', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', null, 'pengawas@gmail.com', null, null, null, null, '0', null, '1', 'Pengawas', 'Pertandingan', 'EO', null);
INSERT INTO `users` VALUES ('4', '', 'official', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', null, 'official@gmail.com', null, null, null, null, '0', null, '1', 'Official ', 'Team', 'Universitas', null);
INSERT INTO `users` VALUES ('5', '', 'peserta', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', null, 'peserta@gmail.com', null, null, null, 'mOyHQqmW2NEl5IGYGjE64e', '0', '1423314363', '1', 'Peserta', 'Team Player', 'Tim', '123123123');
INSERT INTO `users` VALUES ('27', '::1', 'syahroni', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', null, 'roniwahyu@gmail.com', '61025f038864db70d03704580ed3d305618fbc8b', null, null, null, '1420726628', '1420726628', '1', '0', '0', null, null);
INSERT INTO `users` VALUES ('28', '::1', 'admine', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', null, 'admine@gmail.com', 'c16412d8c085c9761c4be5f0f940dd5de6179c40', null, null, null, '1422161800', '1423093966', '1', '0', '0', null, null);
INSERT INTO `users` VALUES ('29', '::1', 'mirasai', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', null, 'mirasai@gmail.com', null, null, null, null, '1422162679', '1422162679', '1', '0', '0', null, null);

-- ----------------------------
-- Table structure for `users_groups`
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `users_groups_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `users_groups_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('1', '1', '1');
INSERT INTO `users_groups` VALUES ('37', '2', '3');
INSERT INTO `users_groups` VALUES ('4', '3', '4');
INSERT INTO `users_groups` VALUES ('5', '4', '6');
INSERT INTO `users_groups` VALUES ('39', '5', '2');
INSERT INTO `users_groups` VALUES ('40', '5', '5');
INSERT INTO `users_groups` VALUES ('33', '27', '2');
INSERT INTO `users_groups` VALUES ('41', '27', '5');
INSERT INTO `users_groups` VALUES ('34', '28', '2');
INSERT INTO `users_groups` VALUES ('43', '28', '5');
INSERT INTO `users_groups` VALUES ('35', '29', '2');
INSERT INTO `users_groups` VALUES ('44', '29', '5');

-- ----------------------------
-- View structure for `01-view-matriks-penyakit`
-- ----------------------------
DROP VIEW IF EXISTS `01-view-matriks-penyakit`;
CREATE VIEW `01-view-matriks-penyakit` AS select distinct `a`.`id_gejala` AS `id_gejala`,`a`.`kode` AS `kode`,sum(if((`b`.`id_penyakit` = 1),`a`.`id_gejala`,0)) AS `P1`,sum(if((`b`.`id_penyakit` = 2),`a`.`id_gejala`,0)) AS `P2`,sum(if((`b`.`id_penyakit` = 3),`a`.`id_gejala`,0)) AS `P3`,sum(if((`b`.`id_penyakit` = 4),`a`.`id_gejala`,0)) AS `P4`,sum(if((`b`.`id_penyakit` = 5),`a`.`id_gejala`,0)) AS `P5` from ((`gejala` `a` left join `penyakit_gejala` `b` on((`b`.`id_gejala` = `a`.`id_gejala`))) left join `penyakit` `c` on((`c`.`id_penyakit` = `b`.`id_penyakit`))) group by `a`.`id_gejala` ;

-- ----------------------------
-- View structure for `01-view-matriks-penyakit-densitas`
-- ----------------------------
DROP VIEW IF EXISTS `01-view-matriks-penyakit-densitas`;
CREATE VIEW `01-view-matriks-penyakit-densitas` AS select distinct `a`.`id_gejala` AS `id_gejala`,`a`.`kode` AS `kode`,sum(if((`b`.`id_penyakit` = 1),(1 - `a`.`densitas`),0)) AS `P1`,sum(if((`b`.`id_penyakit` = 2),(1 - `a`.`densitas`),0)) AS `P2`,sum(if((`b`.`id_penyakit` = 3),(1 - `a`.`densitas`),0)) AS `P3`,sum(if((`b`.`id_penyakit` = 4),(1 - `a`.`densitas`),0)) AS `P4`,`a`.`densitas` AS `densitas` from ((`gejala` `a` left join `penyakit_gejala` `b` on((`b`.`id_gejala` = `a`.`id_gejala`))) left join `penyakit` `c` on((`c`.`id_penyakit` = `b`.`id_penyakit`))) group by `a`.`id_gejala` ;

-- ----------------------------
-- View structure for `01-view-matriks-penyakit-logika`
-- ----------------------------
DROP VIEW IF EXISTS `01-view-matriks-penyakit-logika`;
CREATE VIEW `01-view-matriks-penyakit-logika` AS select distinct `a`.`id_gejala` AS `id_gejala`,`a`.`kode` AS `kode`,sum(if((`b`.`id_penyakit` = 1),1,0)) AS `P1`,sum(if((`b`.`id_penyakit` = 2),1,0)) AS `P2`,sum(if((`b`.`id_penyakit` = 3),1,0)) AS `P3`,sum(if((`b`.`id_penyakit` = 4),1,0)) AS `P4`,sum(if((`b`.`id_penyakit` = 5),1,0)) AS `P5` from ((`gejala` `a` left join `penyakit_gejala` `b` on((`b`.`id_gejala` = `a`.`id_gejala`))) left join `penyakit` `c` on((`c`.`id_penyakit` = `b`.`id_penyakit`))) group by `a`.`id_gejala` ;

-- ----------------------------
-- View structure for `01-view-teta`
-- ----------------------------
DROP VIEW IF EXISTS `01-view-teta`;
CREATE VIEW `01-view-teta` AS select `a`.`id_penyakit` AS `id_penyakit`,`a`.`id_gejala` AS `id_gejala`,`c`.`kode` AS `kode_p`,`b`.`kode` AS `kode_g`,`b`.`gejala` AS `gejala`,`b`.`densitas` AS `densitas`,(1 - `b`.`densitas`) AS `teta` from ((`penyakit_gejala` `a` left join `penyakit` `c` on((`c`.`id_penyakit` = `a`.`id_penyakit`))) left join `gejala` `b` on((`b`.`id_gejala` = `a`.`id_gejala`))) ;

-- ----------------------------
-- View structure for `02-view-teta-simple`
-- ----------------------------
DROP VIEW IF EXISTS `02-view-teta-simple`;
CREATE VIEW `02-view-teta-simple` AS select `a`.`kode_p` AS `kode_p`,`a`.`kode_g` AS `kode_g`,`a`.`densitas` AS `densitas`,`a`.`teta` AS `teta`,`a`.`id_penyakit` AS `id_penyakit`,`a`.`id_gejala` AS `id_gejala` from `01-view-teta` `a` group by `a`.`id_penyakit`,`a`.`id_gejala` order by `a`.`id_penyakit`,`a`.`id_gejala` ;

-- ----------------------------
-- View structure for `03-0-view-all-gejala`
-- ----------------------------
DROP VIEW IF EXISTS `03-0-view-all-gejala`;
CREATE VIEW `03-0-view-all-gejala` AS select `a`.`id_peny_gejala` AS `id_peny_gejala`,`a`.`id_penyakit` AS `id_penyakit`,`a`.`id_gejala` AS `id_gejala`,`b`.`kode` AS `kode`,`b`.`gejala` AS `gejala`,`b`.`keterangan` AS `keterangan`,`b`.`densitas` AS `densitas` from (`penyakit_gejala` `a` join `gejala` `b` on((`b`.`id_gejala` = `a`.`id_gejala`))) ;

-- ----------------------------
-- View structure for `03-1-get-all-index`
-- ----------------------------
DROP VIEW IF EXISTS `03-1-get-all-index`;
CREATE VIEW `03-1-get-all-index` AS select `a`.`id_g_index` AS `id_g_index`,`a`.`noindex` AS `noindex`,`a`.`id_p` AS `id_p`,`a`.`id_g` AS `id_g`,`a`.`d` AS `d`,`a`.`t` AS `t` from `gejala_index` `a` ;

-- ----------------------------
-- View structure for `03-2-define-m`
-- ----------------------------
DROP VIEW IF EXISTS `03-2-define-m`;
CREATE VIEW `03-2-define-m` AS select `a`.`id_g_index` AS `id_g_index`,`a`.`id_p` AS `id_p`,count(`a`.`noindex`) AS `jml`,sum(if((`a`.`noindex` = 1),`a`.`d`,0)) AS `m1`,sum(if((`a`.`noindex` = 1),`a`.`t`,0)) AS `mt1`,sum(if((`a`.`noindex` = 2),`a`.`d`,0)) AS `m2`,sum(if((`a`.`noindex` = 2),`a`.`t`,0)) AS `mt2`,sum(if((`a`.`noindex` = 3),`a`.`d`,0)) AS `m3`,sum(if((`a`.`noindex` = 3),`a`.`t`,0)) AS `mt3`,sum(if((`a`.`noindex` = 4),`a`.`d`,0)) AS `m4`,sum(if((`a`.`noindex` = 4),`a`.`t`,0)) AS `mt4`,sum(if((`a`.`noindex` = 5),`a`.`d`,0)) AS `m5`,sum(if((`a`.`noindex` = 5),`a`.`t`,0)) AS `mt5`,sum(if((`a`.`noindex` = 6),`a`.`d`,0)) AS `m6`,sum(if((`a`.`noindex` = 6),`a`.`t`,0)) AS `mt6`,sum(if((`a`.`noindex` = 7),`a`.`d`,0)) AS `m7`,sum(if((`a`.`noindex` = 7),`a`.`t`,0)) AS `mt7`,sum(if((`a`.`noindex` = 8),`a`.`d`,0)) AS `m8`,sum(if((`a`.`noindex` = 8),`a`.`t`,0)) AS `mt8`,sum(if((`a`.`noindex` = 9),`a`.`d`,0)) AS `m9`,sum(if((`a`.`noindex` = 9),`a`.`t`,0)) AS `mt9`,sum(if((`a`.`noindex` = 10),`a`.`d`,0)) AS `m10`,sum(if((`a`.`noindex` = 10),`a`.`t`,0)) AS `mt10`,`b`.`kode` AS `kode`,`b`.`penyakit` AS `penyakit`,`b`.`keterangan` AS `keterangan` from (`03-1-get-all-index` `a` join `penyakit` `b` on((`b`.`id_penyakit` = `a`.`id_p`))) group by `a`.`id_p` ;

-- ----------------------------
-- View structure for `04-view-gejala-penyakit`
-- ----------------------------
DROP VIEW IF EXISTS `04-view-gejala-penyakit`;
CREATE VIEW `04-view-gejala-penyakit` AS select `a`.`id_penyakit` AS `id_penyakit`,`a`.`id_gejala` AS `id_gejala`,`b`.`kode` AS `kode`,`b`.`penyakit` AS `penyakit`,`b`.`keterangan` AS `keterangan`,`b`.`penyebab` AS `penyebab`,`b`.`penanggulangan` AS `penanggulangan`,`c`.`kode` AS `kode_g`,`c`.`gejala` AS `gejala`,`c`.`densitas` AS `densitas` from ((`penyakit_gejala` `a` join `penyakit` `b` on((`b`.`id_penyakit` = `a`.`id_penyakit`))) join `gejala` `c` on((`c`.`id_gejala` = `a`.`id_gejala`))) ;

-- ----------------------------
-- Procedure structure for `getallgejala`
-- ----------------------------
DROP PROCEDURE IF EXISTS `getallgejala`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `getallgejala`()
BEGIN
   SELECT *  FROM gejala;
   END
;;
DELIMITER ;
