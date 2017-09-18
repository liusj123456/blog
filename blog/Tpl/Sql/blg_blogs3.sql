/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2017-09-18 19:00:51
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_blogs
-- ----------------------------
