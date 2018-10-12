/*
Navicat MySQL Data Transfer

Source Server         : MYSQL
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : ci-dempster2

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2015-04-12 19:50:20
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
INSERT INTO `gejala` VALUES ('1', 'G1', 'Bibit yang terkena mati', '', '0.75000', '2015-04-12 14:25:36');
INSERT INTO `gejala` VALUES ('2', 'G2', 'Tumbuh memanjang kurang wajar', null, '0.25000', '2015-03-31 09:50:50');
INSERT INTO `gejala` VALUES ('3', 'G3', 'Garis air pada batang', null, '0.60000', '2015-03-28 14:51:32');
INSERT INTO `gejala` VALUES ('4', 'G4', 'Tetesan embun seperti susu timbul di permukaan', null, '0.25000', '2015-03-28 14:51:29');
INSERT INTO `gejala` VALUES ('5', 'G5', 'Menghasilkan beberaoa anakan dengan malai kosong', null, '0.25000', '2015-03-31 09:51:21');
INSERT INTO `gejala` VALUES ('6', 'G6', 'Bakteri menetas pada luka baru', null, '0.50000', '2015-03-28 14:51:24');
INSERT INTO `gejala` VALUES ('7', 'G7', 'Daun kuning', null, '0.25000', '2015-03-28 14:51:19');
INSERT INTO `gejala` VALUES ('8', 'G8', 'Fungsi berbentuk bubuk keputihan', null, '0.50000', '2015-03-31 09:51:32');
INSERT INTO `gejala` VALUES ('9', 'G9', 'Kadang malai busuk', null, '0.50000', '2015-03-28 14:51:14');
INSERT INTO `gejala` VALUES ('10', 'G10', 'Tidak menghasilkan malai', null, '0.50000', '2015-03-28 14:51:11');

-- ----------------------------
-- Table structure for `gejala_backup`
-- ----------------------------
DROP TABLE IF EXISTS `gejala_backup`;
CREATE TABLE `gejala_backup` (
  `id_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) DEFAULT NULL,
  `gejala` varchar(100) DEFAULT NULL,
  `keterangan` varchar(250) DEFAULT NULL,
  `densitas` float(10,5) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_gejala`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gejala_backup
-- ----------------------------
INSERT INTO `gejala_backup` VALUES ('1', 'G1', 'Bibit yang terkena mati', null, '0.75000', '2015-03-14 16:53:17');
INSERT INTO `gejala_backup` VALUES ('2', 'G2', 'Tumbuh memanjang kurang wajar', null, '0.25000', '2015-03-14 16:53:37');
INSERT INTO `gejala_backup` VALUES ('3', 'G3', 'Garis air pada batang', null, '0.50000', '2015-03-14 16:53:40');
INSERT INTO `gejala_backup` VALUES ('4', 'G4', 'Tetesan embun seperti susu timbul di permukaan', null, '0.33000', '2015-03-14 16:54:25');
INSERT INTO `gejala_backup` VALUES ('5', 'G5', 'Menghasilkan beberaoa anakan dengan malai kosong', null, '0.25000', '2015-03-18 06:27:06');
INSERT INTO `gejala_backup` VALUES ('6', 'G6', 'Bakteri menetas pada luka baru', null, '0.25000', '2015-03-14 16:54:35');
INSERT INTO `gejala_backup` VALUES ('7', 'G7', 'Daun kuning', null, '0.70000', '2015-03-14 16:54:00');
INSERT INTO `gejala_backup` VALUES ('8', 'G8', 'Fungsi berbentuk bubuk keputihan', null, '0.50000', '2015-03-19 22:01:30');
INSERT INTO `gejala_backup` VALUES ('9', 'G9', 'Kadang malai busuk', null, '0.85000', '2015-03-14 16:54:10');
INSERT INTO `gejala_backup` VALUES ('10', 'G10', 'Tidak menghasilkan malai', null, '0.50000', '2015-03-19 22:01:52');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of gejala_index
-- ----------------------------
INSERT INTO `gejala_index` VALUES ('1', '1', '1', '1', '0.50000', '0.50000', '2015-03-28 19:23:13');
INSERT INTO `gejala_index` VALUES ('2', '2', '1', '2', '0.40000', '0.60000', '2015-03-28 19:23:13');
INSERT INTO `gejala_index` VALUES ('3', '3', '1', '3', '0.60000', '0.40000', '2015-03-28 19:23:13');
INSERT INTO `gejala_index` VALUES ('4', '1', '9', '4', '0.25000', '0.75000', '2015-03-28 19:23:13');

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
INSERT INTO `groups` VALUES ('8', 'memberbaru', 'anak baru datang');

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
  `isactive` enum('1','0') DEFAULT NULL,
  `isadmin` enum('1','2','3','4','5','6') DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_penyakit`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penyakit
-- ----------------------------
INSERT INTO `penyakit` VALUES ('1', 'P1sss', 'Bakanaea', '', '', 'Saran Penanggulangannya Ada disini', '1', '', '2015-03-26 15:22:57');
INSERT INTO `penyakit` VALUES ('2', 'P2', 'Busuk Pelepah Dauns', '', 'Ini Penyebab', 'Ini Penanggulangannya', '1', '2', '2015-03-26 20:19:07');
INSERT INTO `penyakit` VALUES ('3', 'P3', 'Kresek', '', '', '', '0', '3', '2015-03-26 20:19:10');
INSERT INTO `penyakit` VALUES ('4', 'P4', 'Kerdil Hampa', '', '', '', '0', '1', '2015-03-26 20:19:11');
INSERT INTO `penyakit` VALUES ('10', 'P5', 'Penyakit Baru', 'asd', 'asd', 'asd', '0', '2', '2015-03-26 20:19:12');
INSERT INTO `penyakit` VALUES ('12', 'P6', 'Penyakit Enam', 'Keterangan', 'Penyebab', 'Penanggulngan', '0', '', '2015-03-28 04:01:09');
INSERT INTO `penyakit` VALUES ('14', 'P7', 'Penyakit 7', '', '', '', '', '', '2015-03-28 13:22:07');

-- ----------------------------
-- Table structure for `penyakit_gejala`
-- ----------------------------
DROP TABLE IF EXISTS `penyakit_gejala`;
CREATE TABLE `penyakit_gejala` (
  `id_peny_gejala` int(11) NOT NULL AUTO_INCREMENT,
  `id_penyakit` int(11) NOT NULL,
  `id_gejala` int(11) DEFAULT NULL,
  `density` decimal(10,5) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_peny_gejala`)
) ENGINE=InnoDB AUTO_INCREMENT=194 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of penyakit_gejala
-- ----------------------------
INSERT INTO `penyakit_gejala` VALUES ('190', '1', '1', null, '2015-03-26 09:44:57');
INSERT INTO `penyakit_gejala` VALUES ('191', '1', '2', null, '2015-03-26 09:44:57');
INSERT INTO `penyakit_gejala` VALUES ('192', '1', '3', null, '2015-03-26 10:43:11');
INSERT INTO `penyakit_gejala` VALUES ('193', '9', '4', null, '2015-03-26 11:06:59');

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
  `densitas` decimal(10,5) DEFAULT NULL,
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_peny_gejala`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rule_inferensi
-- ----------------------------
INSERT INTO `rule_inferensi` VALUES ('1', '1', '1', '0.80000', '2015-04-11 01:00:17');
INSERT INTO `rule_inferensi` VALUES ('2', '1', '2', '0.25000', '2015-03-28 15:06:52');
INSERT INTO `rule_inferensi` VALUES ('3', '1', '5', '0.75000', '2015-03-28 15:06:55');
INSERT INTO `rule_inferensi` VALUES ('4', '1', '9', '0.25000', '2015-03-28 15:06:56');
INSERT INTO `rule_inferensi` VALUES ('5', '2', '1', '0.50000', '2015-03-28 15:07:00');
INSERT INTO `rule_inferensi` VALUES ('6', '2', '2', '0.50000', '2015-03-28 15:07:04');
INSERT INTO `rule_inferensi` VALUES ('7', '2', '5', '0.60000', '2015-03-28 15:07:06');
INSERT INTO `rule_inferensi` VALUES ('8', '2', '8', '0.40000', '2015-03-28 15:07:07');
INSERT INTO `rule_inferensi` VALUES ('9', '2', '9', '0.80000', '2015-03-28 15:07:09');
INSERT INTO `rule_inferensi` VALUES ('10', '2', '10', '0.20000', '2015-03-28 15:07:10');
INSERT INTO `rule_inferensi` VALUES ('11', '3', '1', '0.70000', '2015-03-28 15:07:12');
INSERT INTO `rule_inferensi` VALUES ('12', '3', '2', '0.30000', '2015-03-28 15:07:14');
INSERT INTO `rule_inferensi` VALUES ('13', '3', '3', null, '2015-03-19 23:03:57');
INSERT INTO `rule_inferensi` VALUES ('14', '3', '4', null, '2015-03-19 23:04:04');
INSERT INTO `rule_inferensi` VALUES ('15', '3', '5', null, '2015-03-19 23:04:05');
INSERT INTO `rule_inferensi` VALUES ('16', '3', '6', null, '2015-03-19 23:04:05');
INSERT INTO `rule_inferensi` VALUES ('17', '3', '7', null, '2015-03-19 23:04:06');
INSERT INTO `rule_inferensi` VALUES ('18', '4', '1', null, '2015-03-19 23:04:15');
INSERT INTO `rule_inferensi` VALUES ('19', '4', '2', null, '2015-03-19 23:04:18');
INSERT INTO `rule_inferensi` VALUES ('20', '4', '5', null, '2015-03-14 12:28:28');
INSERT INTO `rule_inferensi` VALUES ('21', '4', '6', '0.50000', '2015-04-11 00:59:32');
INSERT INTO `rule_inferensi` VALUES ('22', '4', '8', null, '2015-03-19 23:04:27');
INSERT INTO `rule_inferensi` VALUES ('23', '4', '9', null, '2015-03-19 23:04:28');
INSERT INTO `rule_inferensi` VALUES ('24', '10', '1', null, '2015-03-26 11:22:27');
INSERT INTO `rule_inferensi` VALUES ('25', '10', '5', null, '2015-03-26 11:22:53');
INSERT INTO `rule_inferensi` VALUES ('26', '12', '7', null, '2015-03-28 04:01:37');
INSERT INTO `rule_inferensi` VALUES ('27', '14', '1', '0.00000', '2015-03-28 13:22:33');
INSERT INTO `rule_inferensi` VALUES ('28', '14', '6', '0.00000', '2015-03-28 13:22:53');
INSERT INTO `rule_inferensi` VALUES ('29', '14', '8', '0.00000', '2015-03-28 13:24:12');

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
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', null, null, '3LyNKmDwSaFR4DNS9WQFKO', '1268889823', '1428841503', '1', 'Admin', 'istrator', 'ADMIN', '0');
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
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

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
INSERT INTO `users_groups` VALUES ('45', '29', '2');
INSERT INTO `users_groups` VALUES ('46', '29', '5');
INSERT INTO `users_groups` VALUES ('47', '29', '8');

-- ----------------------------
-- Table structure for `wizard`
-- ----------------------------
DROP TABLE IF EXISTS `wizard`;
CREATE TABLE `wizard` (
  `id_wizard` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `hp` varchar(15) DEFAULT NULL,
  `gejala_masukan` text,
  `hasil_id` int(11) DEFAULT NULL,
  `hasil_believe` double(11,2) DEFAULT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`id_wizard`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of wizard
-- ----------------------------
INSERT INTO `wizard` VALUES ('1', '456', '56', '0', '[\"8\",\"9\",\"10\"]', '2', '75.00', '2015-04-09 18:04:22');
INSERT INTO `wizard` VALUES ('2', 'asd', 'asd', '0', '[\"1\",\"7\"]', '3', '72.73', '2015-04-10 02:04:26');
INSERT INTO `wizard` VALUES ('3', 'dfsd', 'syahroni.w@gmail.com', '0', '[\"3\",\"5\",\"9\"]', '3', '64.71', '2015-04-10 02:04:19');
INSERT INTO `wizard` VALUES ('4', 'AngkasaLuas', 'roniwahyu@gmail.com', '0', '[\"1\",\"3\",\"5\"]', '3', '80.65', '2015-04-11 00:04:13');
INSERT INTO `wizard` VALUES ('5', 'Mikasa', 'mirasai@gmail.com', '0', '[\"1\",\"2\",\"3\",\"5\",\"8\",\"9\",\"10\"]', '2', '85.71', '2015-04-11 00:04:22');
INSERT INTO `wizard` VALUES ('6', 'SMAN 8 Malang', 'pembelaislam.cyber@gmail.com', '0', '[\"7\"]', '3', '25.00', '2015-04-11 00:04:40');
INSERT INTO `wizard` VALUES ('7', 'asd', 'asd', '0', '[\"3\",\"5\",\"7\",\"9\"]', '3', '68.42', '2015-04-11 00:04:17');
INSERT INTO `wizard` VALUES ('8', 'sdbn', 'bnvcxzcxv', '0', '[\"7\",\"8\",\"9\",\"10\"]', '2', '75.00', '2015-04-11 00:04:38');
INSERT INTO `wizard` VALUES ('9', 'asd', 'asd', '0', '[\"1\",\"7\"]', '3', '90.32', '2015-04-11 00:04:26');
INSERT INTO `wizard` VALUES ('10', 'xfg', 'dfg', '0', '[\"1\",\"7\"]', '3', '90.32', '2015-04-11 01:04:30');
INSERT INTO `wizard` VALUES ('11', 'asd', 'asd', '0', '[\"3\",\"5\"]', '3', '64.71', '2015-04-11 01:04:52');
INSERT INTO `wizard` VALUES ('12', 'scdvfbgnhm', 'cvbn', '0', '[\"1\",\"2\",\"3\",\"5\",\"8\",\"10\"]', '2', '92.11', '2015-04-12 14:04:58');
INSERT INTO `wizard` VALUES ('13', 'cvbnm', 'mnbnm', '0', '[\"1\",\"2\",\"3\",\"5\",\"8\",\"10\"]', '2', '85.00', '2015-04-12 14:04:50');

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
CREATE VIEW `03-0-view-all-gejala` AS select `a`.`id_peny_gejala` AS `id_peny_gejala`,`a`.`id_penyakit` AS `id_penyakit`,`a`.`id_gejala` AS `id_gejala`,`c`.`penyakit` AS `penyakit`,`c`.`kode` AS `kode_p`,`b`.`kode` AS `kode_g`,`b`.`gejala` AS `gejala`,`b`.`keterangan` AS `keterangan`,`a`.`density` AS `density` from ((`penyakit_gejala` `a` join `gejala` `b` on((`b`.`id_gejala` = `a`.`id_gejala`))) join `penyakit` `c` on((`c`.`id_penyakit` = `a`.`id_penyakit`))) ;

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
-- View structure for `03-3-view-gejala`
-- ----------------------------
DROP VIEW IF EXISTS `03-3-view-gejala`;
CREATE VIEW `03-3-view-gejala` AS select `a`.`id_gejala` AS `id_gejala`,`a`.`kode` AS `kode`,`a`.`gejala` AS `gejala`,`a`.`keterangan` AS `keterangan`,`a`.`densitas` AS `densitas` from `gejala` `a` ;

-- ----------------------------
-- View structure for `04-view-gejala-penyakit`
-- ----------------------------
DROP VIEW IF EXISTS `04-view-gejala-penyakit`;
CREATE VIEW `04-view-gejala-penyakit` AS select `a`.`id_penyakit` AS `id_penyakit`,`a`.`id_gejala` AS `id_gejala`,`b`.`kode` AS `kode`,`b`.`penyakit` AS `penyakit`,`b`.`keterangan` AS `keterangan`,`b`.`penyebab` AS `penyebab`,`b`.`penanggulangan` AS `penanggulangan`,`c`.`kode` AS `kode_g`,`c`.`gejala` AS `gejala`,`c`.`densitas` AS `densitas` from ((`penyakit_gejala` `a` join `penyakit` `b` on((`b`.`id_penyakit` = `a`.`id_penyakit`))) join `gejala` `c` on((`c`.`id_gejala` = `a`.`id_gejala`))) ;

-- ----------------------------
-- View structure for `04-view-inferensi`
-- ----------------------------
DROP VIEW IF EXISTS `04-view-inferensi`;
CREATE VIEW `04-view-inferensi` AS select `a`.`id_peny_gejala` AS `id_peny_gejala`,`b`.`kode` AS `kode_p`,`b`.`penyakit` AS `penyakit`,`c`.`kode` AS `kode_g`,`c`.`gejala` AS `gejala`,`a`.`datetime` AS `datetime`,`a`.`id_penyakit` AS `id_penyakit`,`a`.`id_gejala` AS `id_gejala`,`a`.`densitas` AS `densitas` from ((`rule_inferensi` `a` join `gejala` `c` on((`c`.`id_gejala` = `a`.`id_gejala`))) join `penyakit` `b` on((`b`.`id_penyakit` = `a`.`id_penyakit`))) ;

-- ----------------------------
-- View structure for `05-view-hasil-wizard`
-- ----------------------------
DROP VIEW IF EXISTS `05-view-hasil-wizard`;
CREATE VIEW `05-view-hasil-wizard` AS select `a`.`id_wizard` AS `id_wizard`,`a`.`nama_user` AS `nama_user`,`a`.`email` AS `email`,`a`.`hp` AS `hp`,`b`.`kode` AS `kode`,`b`.`penyakit` AS `penyakit`,`b`.`penyebab` AS `penyebab`,`b`.`penanggulangan` AS `penanggulangan`,`a`.`gejala_masukan` AS `gejala_masukan`,`a`.`hasil_believe` AS `hasil_believe`,`a`.`datetime` AS `datetime` from (`wizard` `a` join `penyakit` `b` on((`b`.`id_penyakit` = `a`.`hasil_id`))) ;
