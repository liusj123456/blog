-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 09 月 16 日 07:41
-- 服务器版本: 5.5.8
-- PHP 版本: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `book`
--

-- --------------------------------------------------------

--
-- 表的结构 `ck_admin`
--

CREATE TABLE IF NOT EXISTS `ck_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `nickname` varchar(32) NOT NULL,
  `lastlogin` int(12) NOT NULL,
  `regdate` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ck_admin`
--


-- --------------------------------------------------------

--
-- 表的结构 `ck_caiji`
--

CREATE TABLE IF NOT EXISTS `ck_caiji` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caijiname` varchar(222) CHARACTER SET utf8 NOT NULL,
  `caijiurl` varchar(333) NOT NULL,
  `novelid` int(11) NOT NULL,
  `novelvolid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ck_caiji`
--


-- --------------------------------------------------------

--
-- 表的结构 `ck_class`
--

CREATE TABLE IF NOT EXISTS `ck_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classname` varchar(22) CHARACTER SET utf8 NOT NULL,
  `classpy` varchar(22) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `classname_2` (`classname`),
  UNIQUE KEY `classname_3` (`classname`),
  UNIQUE KEY `classname_4` (`classname`),
  UNIQUE KEY `classname_5` (`classname`),
  UNIQUE KEY `id_3` (`id`),
  UNIQUE KEY `classname_6` (`classname`),
  KEY `id_2` (`id`),
  KEY `classname` (`classname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `ck_class`
--

INSERT INTO `ck_class` (`id`, `classname`, `classpy`) VALUES
(1, '玄幻小说', 'xuanhuanxiaoshuo'),
(2, '修真小说', 'xiuzhenxiaoshuo'),
(3, '都市小说', 'dushixiaoshuo'),
(4, '穿越小说', 'chuanyuexiaoshuo'),
(5, '网游小说', 'wangyouxiaoshuo'),
(6, '科幻小说', 'kehuanxiaoshuo'),
(7, '其它小说', 'qitaxiaoshuo');

-- --------------------------------------------------------

--
-- 表的结构 `ck_content`
--

CREATE TABLE IF NOT EXISTS `ck_content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `con_nid` int(11) NOT NULL,
  `con_vid` int(11) NOT NULL,
  `con_name` varchar(222) CHARACTER SET utf8 NOT NULL,
  `con_namepy` varchar(555) CHARACTER SET utf8 NOT NULL,
  `con_text` longtext CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_3` (`id`),
  KEY `id_2` (`id`),
  KEY `id_4` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ck_content`
--


-- --------------------------------------------------------

--
-- 表的结构 `ck_links`
--

CREATE TABLE IF NOT EXISTS `ck_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linkname` varchar(55) CHARACTER SET utf8 NOT NULL,
  `linkurl` varchar(55) CHARACTER SET utf8 NOT NULL,
  `linkweight` int(11) NOT NULL COMMENT '权重',
  `times` int(12) NOT NULL,
  `remarks` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ck_links`
--


-- --------------------------------------------------------

--
-- 表的结构 `ck_novel`
--

CREATE TABLE IF NOT EXISTS `ck_novel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `novel_cid` int(11) NOT NULL,
  `novelname` varchar(55) NOT NULL,
  `novelpy` varchar(111) NOT NULL,
  `novelauthor` varchar(55) NOT NULL,
  `noveldes` varchar(300) NOT NULL,
  `novelstate` tinyint(1) NOT NULL DEFAULT '0',
  `clicktoday` int(11) NOT NULL DEFAULT '0',
  `clickmonth` int(11) NOT NULL DEFAULT '0',
  `clicksum` int(11) NOT NULL DEFAULT '0',
  `today` int(2) NOT NULL,
  `month` int(2) NOT NULL,
  `novelimg` varchar(222) NOT NULL,
  `update_time` int(12) NOT NULL,
  `tuitime` int(12) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `id_3` (`id`),
  KEY `id_2` (`id`),
  KEY `id_4` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ck_novel`
--


-- --------------------------------------------------------

--
-- 表的结构 `ck_site`
--

CREATE TABLE IF NOT EXISTS `ck_site` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(222) CHARACTER SET utf8 NOT NULL,
  `site_title` varchar(123) NOT NULL,
  `site_url` varchar(222) NOT NULL,
  `site_keywords` varchar(222) CHARACTER SET utf8 NOT NULL,
  `site_des` varchar(444) CHARACTER SET utf8 NOT NULL,
  `site_copyright` varchar(400) CHARACTER SET utf8 NOT NULL,
  `site_count` text NOT NULL,
  `urlrewrite_cls` varchar(222) NOT NULL COMMENT '栏目链接样式',
  `urlrewrite_book` varchar(234) NOT NULL COMMENT '书的伪静态链接',
  `urlrewrite_con` varchar(234) NOT NULL,
  `hotkeyopen` tinyint(1) NOT NULL COMMENT '取数据库词',
  `hotkey` varchar(300) CHARACTER SET utf8 NOT NULL,
  `searchurl` varchar(220) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `ck_site`
--

INSERT INTO `ck_site` (`id`, `site_name`, `site_title`, `site_url`, `site_keywords`, `site_des`, `site_copyright`, `site_count`, `urlrewrite_cls`, `urlrewrite_book`, `urlrewrite_con`, `hotkeyopen`, `hotkey`, `searchurl`) VALUES
(1, '爱书之人', '人皇_人皇吧_人皇最新章节', 'http://www.aishuzhiren.com', '人皇，人皇吧，人皇最新章节', '人皇吧提供人皇最新章节！希望大家观看', '精彩小说尽在爱书之人。爱书之人提供的小说类型有玄幻小说,修真小说,都市小说,穿越小说,网游小说,科幻小说,其它小说（包括历史小说,军事小说,恐怖小说等等）', '<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id=''cnzz_stat_icon_1819652''%3E%3C/span%3E%3Cscript src=''" + cnzz_protocol + "s6.cnzz.com/stat.php%3Fid%3D1819652'' type=''text/javascript''%3E%3C/script%3E"));</script>', '%siteurl%/%cls_py%/', '%siteurl%/book/%book_py%/', '%siteurl%/book/%book_py%/%post_id%', 1, '校园全能高手,人皇,剑道独尊,大主宰,莽荒纪,天蚕土豆,绝世唐门,', 'http://www.aishuzhiren.com/search/keyword/');

-- --------------------------------------------------------

--
-- 表的结构 `ck_vol`
--

CREATE TABLE IF NOT EXISTS `ck_vol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vol_nid` int(11) NOT NULL,
  `volname` varchar(222) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `ck_vol`
--

