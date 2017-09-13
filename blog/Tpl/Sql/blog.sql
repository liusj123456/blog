/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-09-13 11:36:50
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blg_menu
-- ----------------------------
DROP TABLE IF EXISTS `blg_menu`;
CREATE TABLE `blg_menu` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT '0',
  `url` varchar(255) DEFAULT NULL,
  `name` varchar(20) DEFAULT '',
  `level` int(11) DEFAULT '1',
  `display` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_menu
-- ----------------------------

-- ----------------------------
-- Table structure for blg_user
-- ----------------------------
DROP TABLE IF EXISTS `blg_user`;
CREATE TABLE `blg_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` char(32) DEFAULT '',
  `logintime` int(11) DEFAULT NULL,
  `loginip` char(20) DEFAULT '',
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_user
-- ----------------------------
INSERT INTO `blg_user` VALUES ('3', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0', '', '0');
