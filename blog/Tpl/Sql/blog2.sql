/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-09-15 16:31:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blg_blogs
-- ----------------------------
DROP TABLE IF EXISTS `blg_blogs`;
CREATE TABLE `blg_blogs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `content` text,
  `type` varchar(50) DEFAULT NULL COMMENT '博客类型',
  `addUser` char(32) DEFAULT NULL,
  `addTime` int(11) DEFAULT NULL,
  `pic` text COMMENT '图片链接',
  `views` int(11) DEFAULT '0' COMMENT '浏览次数',
  `talk` int(11) DEFAULT '0' COMMENT '评论次数',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_blogs
-- ----------------------------

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
  `sort` mediumint(4) DEFAULT NULL COMMENT '排序',
  `addUser` char(32) DEFAULT NULL,
  `addTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pid` (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_menu
-- ----------------------------
INSERT INTO `blg_menu` VALUES ('2', '0', '', '博客管理', '1', '1', '2', 'admin', '1505435477');
INSERT INTO `blg_menu` VALUES ('3', '0', '', '菜单管理', '1', '1', '1', 'admin', '1505435661');
INSERT INTO `blg_menu` VALUES ('5', '0', '', '用户管理', '1', '2', '3', 'admin', '1505436797');
INSERT INTO `blg_menu` VALUES ('6', '0', '', '系统管理', '1', '2', '4', 'admin', '1505437052');
INSERT INTO `blg_menu` VALUES ('7', '2', 'Blog/blog_list', '博客列表', '2', '1', '1', 'admin', '1505438908');
INSERT INTO `blg_menu` VALUES ('8', '2', 'Blog/blog_add', '博客添加', '2', '1', '2', 'admin', '1505438970');
INSERT INTO `blg_menu` VALUES ('9', '3', 'System/menu', '菜单列表', '2', '1', '1', 'admin', '1505443697');
INSERT INTO `blg_menu` VALUES ('11', '3', 'System/menuAdd', '添加顶级菜单', '2', '1', '2', 'admin', '1505443771');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_user
-- ----------------------------
INSERT INTO `blg_user` VALUES ('3', 'admin', '21232f297a57a5a743894a0e4a801fc3', '0', '', '0');
INSERT INTO `blg_user` VALUES ('4', 'liusj', '209a41b69a5a2b12b355e4a5a0576e13', '1505380367', '0.0.0.0', '0');
INSERT INTO `blg_user` VALUES ('5', 'liusj1', '81b4dd42849924133f061d89aa72b87f', '1505380438', '0.0.0.0', '0');
INSERT INTO `blg_user` VALUES ('6', 'liusj2', 'd6b980ad11d6fd0da6cbc23333b9269e', '1505380517', '0.0.0.0', '0');
INSERT INTO `blg_user` VALUES ('7', 'liusj3', '11edd209f04e33386306ed720d136700', '1505380665', '0.0.0.0', '0');
INSERT INTO `blg_user` VALUES ('8', 'liusj4', '6b96caf60033f75e3cc70e9de73997a4', '1505380777', '0.0.0.0', '0');
