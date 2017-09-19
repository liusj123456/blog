/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-09-19 17:07:09
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
  `pic` text COMMENT '图片链接',
  `likes` int(11) DEFAULT '0',
  `views` int(11) DEFAULT '0' COMMENT '浏览次数',
  `talk` int(11) DEFAULT '0' COMMENT '评论次数',
  `addUser` char(32) DEFAULT NULL,
  `addTime` int(11) DEFAULT NULL,
  `display` tinyint(1) DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_blogs
-- ----------------------------
INSERT INTO `blg_blogs` VALUES ('2', 'ceshi', '&lt;p&gt;1&lt;/p&gt;', 'cshi', 's:33:\"/Public/Uploads/59c08c2682f6b.jpg\";', '0', '0', '0', 'admin', '1505791037', '0', null);
INSERT INTO `blg_blogs` VALUES ('3', '2', '&lt;p&gt;2&lt;/p&gt;', '2', 's:33:\"/Public/Uploads/59c0b99f6b4e8.jpg\";', '0', '0', '0', 'admin', '1505802660', '0', null);
INSERT INTO `blg_blogs` VALUES ('4', '测试文章比套题', '&lt;p&gt;&lt;img src=&quot;/personal/uploads/image/20170919/1505809055561822.jpg&quot; title=&quot;1505809055561822.jpg&quot; alt=&quot;header.jpg&quot;/&gt;美图秀秀&lt;/p&gt;', '测试', 's:33:\"/Public/Uploads/59c0dcf08ba3a.jpg\";', '0', '0', '0', 'admin', '1505809068', '0', null);

-- ----------------------------
-- Table structure for blg_index
-- ----------------------------
DROP TABLE IF EXISTS `blg_index`;
CREATE TABLE `blg_index` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned DEFAULT '0',
  `url` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `name` varchar(20) CHARACTER SET utf8 DEFAULT '',
  `level` int(11) DEFAULT '1',
  `display` tinyint(4) DEFAULT '0',
  `sort` mediumint(4) DEFAULT NULL COMMENT '排序',
  `addUser` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `addTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blg_index
-- ----------------------------
INSERT INTO `blg_index` VALUES ('1', '0', '', '首页', '1', '1', '1', 'admin', '1505806795');
INSERT INTO `blg_index` VALUES ('2', '0', 'Index/about', '关于我', '1', '1', '2', 'admin', '1505806829');
INSERT INTO `blg_index` VALUES ('5', '0', '1', '文章', '1', '1', '3', 'admin', '1505807955');
INSERT INTO `blg_index` VALUES ('6', '0', '1', '心情', '1', '1', '4', 'admin', '1505807975');
INSERT INTO `blg_index` VALUES ('7', '0', '1', '相册', '1', '1', '5', 'admin', '1505807988');
INSERT INTO `blg_index` VALUES ('8', '0', '1', '留言', '1', '1', '6', 'admin', '1505807998');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_menu
-- ----------------------------
INSERT INTO `blg_menu` VALUES ('2', '0', '', '博客管理', '1', '1', '2', 'admin', '1505435477');
INSERT INTO `blg_menu` VALUES ('3', '0', '', '菜单管理', '1', '1', '1', 'admin', '1505435661');
INSERT INTO `blg_menu` VALUES ('7', '2', 'Blog/blogList', '博客列表', '2', '1', '1', 'admin', '1505438908');
INSERT INTO `blg_menu` VALUES ('8', '2', 'Blog/blogAdd', '博客添加', '2', '1', '2', 'admin', '1505438970');
INSERT INTO `blg_menu` VALUES ('9', '3', 'System/menus', '菜单列表', '2', '1', '1', 'admin', '1505443697');
INSERT INTO `blg_menu` VALUES ('11', '3', 'System/menuAdd', '添加顶级菜单', '2', '1', '2', 'admin', '1505443771');
INSERT INTO `blg_menu` VALUES ('12', '0', '', '前台页面管理', '1', '1', '3', 'admin', '1505792110');
INSERT INTO `blg_menu` VALUES ('13', '12', 'System/IndexList', '前台菜单列表', '2', '1', '1', 'admin', '1505792296');
INSERT INTO `blg_menu` VALUES ('14', '12', 'System/IndexAdd', '菜单添加', '2', '1', '2', 'admin', '1505792338');

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
