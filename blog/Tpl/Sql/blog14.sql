/*
Navicat MySQL Data Transfer

Source Server         : 本地
Source Server Version : 50520
Source Host           : localhost:3306
Source Database       : blog

Target Server Type    : MYSQL
Target Server Version : 50520
File Encoding         : 65001

Date: 2017-09-29 17:10:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for blg_banner
-- ----------------------------
DROP TABLE IF EXISTS `blg_banner`;
CREATE TABLE `blg_banner` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `pic` text CHARACTER SET utf8 COMMENT '图片链接',
  `sort` int(11) DEFAULT NULL,
  `display` tinyint(1) DEFAULT '0',
  `addUser` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `addTime` int(11) DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `type` char(30) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blg_banner
-- ----------------------------
INSERT INTO `blg_banner` VALUES ('1', '手机', 's:33:\"/Public/Uploads/59c36b914ba8e.jpg\";', '1', '0', 'admin', '1505979289', '手机的危害不断增大', 'banner', null);
INSERT INTO `blg_banner` VALUES ('2', '书籍', 's:33:\"/Public/Uploads/59c36f6f8f8e0.jpg\";', '2', '0', 'admin', '1505980279', '成功学 总是倾向于那些人', 'banner', null);
INSERT INTO `blg_banner` VALUES ('3', 'mobiel行', 's:33:\"/Public/Uploads/59c3734161e7f.jpg\";', '3', '0', 'admin', '1505981262', '案多发发', 'banner', null);
INSERT INTO `blg_banner` VALUES ('4', 'pc未来人', 's:33:\"/Public/Uploads/59c373854f897.jpg\";', '4', '0', 'admin', '1505981329', '只有你想不到的 没有做不到', 'banner', '');
INSERT INTO `blg_banner` VALUES ('7', '', 's:33:\"/Public/Uploads/59c4c3b768598.jpg\";', '1', '0', 'admin', '1506067400', '', 'tuwenad', 'https://baike.baidu.com/item/??/73?fr=aladdin');
INSERT INTO `blg_banner` VALUES ('8', '', 's:33:\"/Public/Uploads/59c4ca297dbc5.jpg\";', '2', '1', 'admin', '1506069036', '', 'tuwenad', '');
INSERT INTO `blg_banner` VALUES ('9', '', 's:33:\"/Public/Uploads/59c4f9978c07a.jpg\";', '1', '0', 'admin', '1506081182', '', 'gzad', 'http://www.jueshitangmen.info/zhetian/');
INSERT INTO `blg_banner` VALUES ('10', '', 's:33:\"/Public/Uploads/59c4f9b3a233a.jpg\";', '2', '1', 'admin', '1506081207', '', 'gzad', '');

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
  `talks` int(11) DEFAULT NULL,
  `addUser` char(32) DEFAULT NULL,
  `addTime` int(11) DEFAULT NULL,
  `display` tinyint(1) DEFAULT '0',
  `sort` int(11) DEFAULT NULL,
  `intro` text,
  `adup` tinyint(1) DEFAULT '0' COMMENT '是否图文推荐',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_blogs
-- ----------------------------
INSERT INTO `blg_blogs` VALUES ('5', '教你怎样用欠费手机拨打电话', '&lt;p&gt;初次相识的喜悦，让你觉得似乎找到了知音。于是，对于投缘的人，开始了较频繁的交往。渐渐地，初识的喜悦退尽，接下来就是仅仅保持着联系，平淡到偶尔在节假曰发短信互致问候&lt;/p&gt;', '1', 's:33:\"/Public/Uploads/59c22a559cf10.jpg\";', '1', '3', '0', 'admin', '1505896915', '0', null, '大理白族自治州地处云南省中部偏西，海拔2090米，东邻楚雄州，南靠普洱市、临沧市，西与保山市、怒江州相连，北接丽江市。', '1');
INSERT INTO `blg_blogs` VALUES ('6', '住在手机里的朋友', '&lt;p&gt;&lt;span style=&quot;color: rgb(117, 111, 113); font-family: &amp;#39;Microsoft Yahei&amp;#39;, Simsun; font-size: 12px; line-height: 22px; background-color: rgb(255, 255, 255);&quot;&gt;通信时代，无论是初次相见还是老友重逢，交换联系方式，常常是彼此交换名片，然后郑重或是出于礼貌用手机记下对方的电话号码。在快节奏的生活里，我们不知不觉中就成为住在别人手机里的朋友。又因某些意外，变成了别人手机里匆忙的过客，这种快餐式的友谊&amp;nbsp;&lt;/span&gt;&lt;/p&gt;', '1', 's:33:\"/Public/Uploads/59c22a688665b.jpg\";', '2', '1', '0', 'admin', '1505897089', '0', null, '大理白族自治州地处云南省中部偏西，海拔2090米，东邻楚雄州，南靠普洱市、临沧市，西与保山市、怒江州相连，北接丽江市。', '1');
INSERT INTO `blg_blogs` VALUES ('7', '原来以为，一个人的勇敢是，删掉他的手机号码', '&lt;p&gt;&lt;span style=&quot;color: rgb(117, 111, 113); font-family: &amp;#39;Microsoft Yahei&amp;#39;, Simsun; font-size: 12px; line-height: 22px; background-color: rgb(255, 255, 255);&quot;&gt;原来以为，一个人的勇敢是，删掉他的手机号码、QQ号码等等一切，努力和他保持距离。等着有一天，习惯不想念他，习惯他不在身边,习惯时间把他在我记忆里的身影磨蚀干净&lt;/span&gt;&lt;/p&gt;', '1', 's:33:\"/Public/Uploads/59c22a9f7dfe2.jpg\";', '1', '0', '0', 'admin', '1505897137', '0', null, '大理白族自治州地处云南省中部偏西，海拔2090米，东邻楚雄州，南靠普洱市、临沧市，西与保山市、怒江州相连，北接丽江市。', '0');
INSERT INTO `blg_blogs` VALUES ('8', '手机的16个惊人小秘密，据说99.999%的人都不知', '&lt;p&gt;&lt;span style=&quot;color: rgb(117, 111, 113); font-family: &amp;#39;Microsoft Yahei&amp;#39;, Simsun; font-size: 12px; line-height: 22px; background-color: rgb(255, 255, 255);&quot;&gt;引导语：知道么，手机有备用电池，手机拨号码12593+电话号码=陷阱……手机具有很多你不知道的小秘密，说出来一定很惊奇！不信的话就来看看吧！&lt;/span&gt;&lt;/p&gt;', '1', 's:33:\"/Public/Uploads/59c22aeee43c5.jpg\";', '3', '4', '0', 'admin', '1505897171', '0', null, '大理白族自治州地处云南省中部偏西，海拔2090米，东邻楚雄州，南靠普洱市、临沧市，西与保山市、怒江州相连，北接丽江市。', '1');
INSERT INTO `blg_blogs` VALUES ('9', '你面对的是生活而不是手机', '&lt;p&gt;&lt;span style=&quot;color: rgb(117, 111, 113); font-family: &amp;#39;Microsoft Yahei&amp;#39;, Simsun; font-size: 12px; line-height: 22px; background-color: rgb(255, 255, 255);&quot;&gt;每一次与别人吃饭，总会有人会拿出手机。以为他们在打电话或者有紧急的短信，但用余光瞟了一眼之后发现无非就两件事：1、看小说，2、上人人或者QQ&lt;/span&gt;&lt;/p&gt;', '1', 's:33:\"/Public/Uploads/59c22b1524abe.jpg\";', '3', '3', '0', 'admin', '1505897257', '0', null, '大理白族自治州地处云南省中部偏西，海拔2090米，东邻楚雄州，南靠普洱市、临沧市，西与保山市、怒江州相连，北接丽江市。', '1');
INSERT INTO `blg_blogs` VALUES ('10', '豪雅手机正式发布! 在法国全手工打造的奢侈品', '&lt;p&gt;&lt;span style=&quot;color: rgb(117, 111, 113); font-family: &amp;#39;Microsoft Yahei&amp;#39;, Simsun; font-size: 12px; line-height: 22px; background-color: rgb(255, 255, 255);&quot;&gt;现在跨界联姻，时尚、汽车以及运动品牌联合手机制造商联合发布手机产品在行业里已经不再新鲜，上周我们给大家报道过著名手表制造商瑞士泰格·豪雅（Tag Heuer） 联合法国的手机制造商Modelabs发布的一款奢华手机的部分谍照，而近日该手机终于被正式发布了&lt;/span&gt;&lt;/p&gt;', '1', 's:33:\"/Public/Uploads/59c22b4b19cd0.jpg\";', '2', '3', '0', 'admin', '1505897303', '0', null, '大理白族自治州地处云南省中部偏西，海拔2090米，东邻楚雄州，南靠普洱市、临沧市，西与保山市、怒江州相连，北接丽江市。', '0');
INSERT INTO `blg_blogs` VALUES ('11', '一个程序员的生活', '&lt;p&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);&quot;&gt;如今的编程是一场&lt;/span&gt;&lt;span style=&quot;color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);&quot;&gt;程序员&lt;/span&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);&quot;&gt;和上帝的竞赛,&lt;/span&gt;&lt;span style=&quot;color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);&quot;&gt;程序员&lt;/span&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);&quot;&gt;要开发出更大更好、傻瓜都会用到软件。而上帝在努力创造出更大更傻的傻瓜。目前为止,上帝是赢的。&lt;/span&gt;&lt;/p&gt;', '8', 's:33:\"/Public/Uploads/59c22d2233179.jpg\";', '2', '4', '0', 'admin', '1505897820', '0', null, '大理白族自治州地处云南省中部偏西，海拔2090米，东邻楚雄州，南靠普洱市、临沧市，西与保山市、怒江州相连，北接丽江市。', '0');
INSERT INTO `blg_blogs` VALUES ('12', '时间如梭-光阴似箭', '&lt;p&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);&quot;&gt;热门专题:贾赦的故事 仙子的故事 四年级记事 龙的寓言故事&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;color: rgb(204, 0, 0); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);&quot;&gt;时间的故事&lt;/span&gt;&lt;span style=&quot;color: rgb(51, 51, 51); font-family: arial; font-size: 13px; line-height: 20.02px; background-color: rgb(255, 255, 255);&quot;&gt;...我们有自己的时间吗 有位老兄并非球迷,但4年一届的世界杯,场场不落,且备好&lt;/span&gt;&lt;/p&gt;', '1', 's:33:\"/Public/Uploads/59c22d7e61ad7.jpg\";', '2', '15', '0', 'admin', '1505897916', '0', null, '大理白族自治州地处云南省中部偏西，海拔2090米，东邻楚雄州，南靠普洱市、临沧市，西与保山市、怒江州相连，北接丽江市。', '0');
INSERT INTO `blg_blogs` VALUES ('13', '我在大理的生活', '&lt;p&gt;白族自治州地处云南省中部偏西，海拔2090米，东邻楚雄州，南靠普洱市、临沧市，西与保山市、怒江州相连，北接丽江市。地跨东经98°52′～101°03′，北纬24°41′～26°42&lt;/p&gt;', '8', 's:33:\"/Public/Uploads/59c22e4ad4c10.jpg\";', '1', '3', '0', 'admin', '1505898084', '0', null, '大理白族自治州地处云南省中部偏西，海拔2090米，东邻楚雄州，南靠普洱市、临沧市，西与保山市、怒江州相连，北接丽江市。', '1');
INSERT INTO `blg_blogs` VALUES ('14', '说书说书高级论', '', '1', 's:0:\"\";', '0', '0', '0', 'admin', '1505959902', '1', null, '', '0');
INSERT INTO `blg_blogs` VALUES ('15', '说书高级评语段高人', '&lt;p&gt;&lt;br/&gt;&lt;/p&gt;&lt;p style=&quot;text-indent:2em;&quot;&gt;\r\n	同事推荐的这本书，起初也是抱着看热闹的心态去看得。但是当看到结尾说一张白纸才可以随心所欲的描绘地图，随意描绘自己的生活，你心中想变成什么样子，你都是自由的。我还是重新审视作者的深意。&lt;/p&gt;&lt;p style=&quot;text-align:center;text-indent:2em;&quot;&gt;&lt;img src=&quot;https://static.yezismile.com/kindeditor/attached/image/20170915/20170915053311_25951.jpg&quot; alt=&quot;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-indent:2em;&quot;&gt;\r\n	我们可能没有迷途的小狗那样幸运，放弃一些事情去选择一条顺当的一条路生活；我们没有克郎那般幸运，为了音乐之梦一直到生命的最后一刻，那首《重生》还是会一直被世人传唱，看故事的我们总是希望克郎能有一个好的结局，可是生活就是这样，总是出乎意料的带给你遗憾；我们没有那个神奇的解忧杂货店，投一份信就可以得到回应，大多数的我们如同他们写信之前的样子，总是停留在迷茫的十字路口徘徊，心中有答案还是无法确信到底如何去做，我们没有那个温情的老爷爷去解答烦恼。或许即使有这个杂货店，国人也会写一些恶作剧的话去抖一下机灵。文中也有这样的人，可是杂货店的主人却认真的思考去回信，如果有人内心破了个洞，我们不是置之不理，而是让那个洞不要越变越大。&lt;/p&gt;&lt;p style=&quot;text-align:center;text-indent:2em;&quot;&gt;&lt;img src=&quot;https://static.yezismile.com/kindeditor/attached/image/20170915/20170915053410_78833.jpg&quot; alt=&quot;&quot;/&gt;&lt;/p&gt;&lt;p style=&quot;text-indent:2em;&quot;&gt;\r\n	试想，如果有一天你收到未来的回信，告诉你经济走势，告诉你未来智能的世界，你一定会觉得难以置信，一定是有人在故意恶作剧。有几个人能像书里写得那样，顺着别人的建议去生活呢！怎样解忧，决定权还是掌握在自己的手里，愿意过什么样的生活，都是自己的选择。尽管如此，我还是忍不住去幻想，如果身边真的有温情的老爷爷去解答烦恼，该多好！&lt;/p&gt;&lt;p style=&quot;text-align: center; text-indent: 2em;&quot;&gt;&lt;img src=&quot;https://static.yezismile.com/kindeditor/attached/image/20170915/20170915053421_24482.jpg&quot; alt=&quot;&quot;/&gt;&lt;/p&gt;', '1', 's:33:\"/Public/Uploads/59c320501318a.jpg\";', '1', '11', '0', 'admin', '1505960050', '0', null, '同事推荐的这本书，起初也是抱着看热闹的心态去看得。但是当看到结尾说一张白纸才可以随心所欲的描绘地图，随意描绘自己的生活，你心中想变成什么样子，你都是自由的。我还是重新审视作者的深意。', '1');
INSERT INTO `blg_blogs` VALUES ('16', 'mysql-sql语句大全', '&lt;p&gt;mysql-sql语句大全非常全面的sql语句大全&lt;/p&gt;', '5', 's:33:\"/Public/Uploads/59c5218015299.jpg\";', '2', '0', '0', 'admin', '1506091541', '0', null, 'mysql-sql语句大全非常全面的sql语句大全', '0');
INSERT INTO `blg_blogs` VALUES ('17', '我的生活', '&lt;p&gt;我的生活&lt;/p&gt;', '10', 's:33:\"/Public/Uploads/59c5d97545999.jpg\";', '2', '1', '0', 'admin', '1506138440', '0', null, '我的生活', '0');
INSERT INTO `blg_blogs` VALUES ('18', '玉龙雪山', '&lt;p&gt;玉龙雪山&lt;/p&gt;', '8', 's:33:\"/Public/Uploads/59cc6bb69ddb6.jpg\";', '3', '3', '11', 'admin', '1506569170', '0', null, '玉龙雪山', '1');
INSERT INTO `blg_blogs` VALUES ('19', '骚男', '&lt;p&gt;2&lt;/p&gt;', '5', 's:33:\"/Public/Uploads/59cc6ca24a3aa.jpg\";', '3', '8', '1', 'admin', '1506569391', '0', null, '22', '1');

-- ----------------------------
-- Table structure for blg_blogs_type
-- ----------------------------
DROP TABLE IF EXISTS `blg_blogs_type`;
CREATE TABLE `blg_blogs_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `pid` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `display` tinyint(1) DEFAULT '0',
  `addUser` char(32) DEFAULT NULL,
  `addTime` int(11) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_blogs_type
-- ----------------------------
INSERT INTO `blg_blogs_type` VALUES ('1', '个人博客', '0', '1', '0', 'admin', '1506047554', 'Index/lists');
INSERT INTO `blg_blogs_type` VALUES ('5', '技术讨论', '0', '2', '0', 'admin', '1506048462', null);
INSERT INTO `blg_blogs_type` VALUES ('8', '日常生活', '0', '3', '0', 'admin', '1506049800', '');
INSERT INTO `blg_blogs_type` VALUES ('9', '1测试', '0', '4', '1', 'admin', '1506049844', '');
INSERT INTO `blg_blogs_type` VALUES ('10', '关于我', '0', '5', '0', 'admin', '1506138379', '');

-- ----------------------------
-- Table structure for blg_friends
-- ----------------------------
DROP TABLE IF EXISTS `blg_friends`;
CREATE TABLE `blg_friends` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT '',
  `url` varchar(50) DEFAULT NULL,
  `beian` varchar(150) DEFAULT NULL,
  `addUser` char(32) DEFAULT NULL,
  `addTime` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `display` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_friends
-- ----------------------------
INSERT INTO `blg_friends` VALUES ('1', '大保健', 'http://www.baidu.com', '备案详情', 'admin', '1506004380', '1', '0');
INSERT INTO `blg_friends` VALUES ('2', '桑拿兄', 'www.google.com', '搭设', 'admin', '1506004871', '2', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blg_index
-- ----------------------------
INSERT INTO `blg_index` VALUES ('1', '0', 'Index/index', '首页', '1', '1', '1', 'admin', '1505806795');
INSERT INTO `blg_index` VALUES ('2', '0', 'Index/about', '关于我', '1', '1', '2', 'admin', '1505806829');
INSERT INTO `blg_index` VALUES ('5', '0', 'Index/lists', '文章', '1', '1', '3', 'admin', '1505807955');
INSERT INTO `blg_index` VALUES ('6', '0', 'Index/heart', '心情', '1', '2', '4', 'admin', '1505807975');
INSERT INTO `blg_index` VALUES ('7', '0', 'Index/photo', '相册', '1', '2', '5', 'admin', '1505807988');
INSERT INTO `blg_index` VALUES ('8', '0', 'Index/message', '留言', '1', '1', '6', 'admin', '1505807998');
INSERT INTO `blg_index` VALUES ('9', '0', '/Index/', '社区论坛', '1', '1', '5', 'admin', '1506653729');

-- ----------------------------
-- Table structure for blg_likes
-- ----------------------------
DROP TABLE IF EXISTS `blg_likes`;
CREATE TABLE `blg_likes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `likeip` char(40) DEFAULT NULL,
  `liketime` int(11) DEFAULT NULL,
  `likeblgId` int(11) DEFAULT NULL,
  `ipname` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blg_likes
-- ----------------------------
INSERT INTO `blg_likes` VALUES ('3', '127.0.0.1', '1506561663', '6', null);
INSERT INTO `blg_likes` VALUES ('4', '127.0.0.1', '1506566465', '9', '??IP??IP');
INSERT INTO `blg_likes` VALUES ('5', '127.0.0.1', '1506566469', '11', '??IP??IP');
INSERT INTO `blg_likes` VALUES ('6', '127.0.0.1', '1506566472', '13', '??IP??IP');
INSERT INTO `blg_likes` VALUES ('7', '127.0.0.1', '1506566544', '16', '??IP??IP');
INSERT INTO `blg_likes` VALUES ('8', '127.0.0.1', '1506566546', '17', '??IP??IP');
INSERT INTO `blg_likes` VALUES ('9', '127.0.0.1', '1506566560', '15', '??IP??IP');
INSERT INTO `blg_likes` VALUES ('10', '127.0.0.1', '1506566591', '12', '??IP??IP');
INSERT INTO `blg_likes` VALUES ('11', '127.0.0.1', '1506566592', '12', '??IP??IP');
INSERT INTO `blg_likes` VALUES ('12', '127.0.0.1', '1506566648', '10', '');
INSERT INTO `blg_likes` VALUES ('13', '127.0.0.1', '1506567026', '17', '');
INSERT INTO `blg_likes` VALUES ('14', '127.0.0.1', '1506567055', '16', '');
INSERT INTO `blg_likes` VALUES ('15', '127.0.0.1', '1506581516', '9', '');
INSERT INTO `blg_likes` VALUES ('16', '127.0.0.1', '1506645948', '8', '');
INSERT INTO `blg_likes` VALUES ('17', '127.0.0.1', '1506645951', '9', '');
INSERT INTO `blg_likes` VALUES ('18', '127.0.0.1', '1506645953', '10', '');
INSERT INTO `blg_likes` VALUES ('19', '127.0.0.1', '1506645956', '11', '');
INSERT INTO `blg_likes` VALUES ('20', '127.0.0.1', '1506649527', '19', '');
INSERT INTO `blg_likes` VALUES ('21', '127.0.0.1', '1506649643', '18', '');
INSERT INTO `blg_likes` VALUES ('22', '127.0.0.1', '1506649672', '18', '');

-- ----------------------------
-- Table structure for blg_loginlog
-- ----------------------------
DROP TABLE IF EXISTS `blg_loginlog`;
CREATE TABLE `blg_loginlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `loginuser` char(32) DEFAULT NULL,
  `logintime` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `loginip` char(50) DEFAULT NULL,
  `loginerror` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_loginlog
-- ----------------------------
INSERT INTO `blg_loginlog` VALUES ('1', '2', '23', null, null, null);
INSERT INTO `blg_loginlog` VALUES ('2', 'admin', '1506233345', null, '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('3', 'admin', '1506303454', null, '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('4', 'admin', '1506303514', null, '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('5', 'admin', '1506304486', null, '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('6', 'admin', '1506304582', null, '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('7', 'admin', '1506304599', null, '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('8', 'admin', '1506325729', null, '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('9', 'liusj', '1506326062', '0', '127.0.0.1', '账号或密码错误');
INSERT INTO `blg_loginlog` VALUES ('10', 'liusj', '1506326093', '0', '127.0.0.1', '账号或密码错误');
INSERT INTO `blg_loginlog` VALUES ('11', 'liusj', '1506326099', '0', '127.0.0.1', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('12', 'liusj', '1506326110', '0', '127.0.0.1', '账号或密码错误');
INSERT INTO `blg_loginlog` VALUES ('13', 'liusj', '1506326466', '失败', '127.0.0.1', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('14', 'admin', '1506331712', '失败', '127.0.0.1', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('15', 'admin', '1506387978', '成功', '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('16', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('17', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('18', 'admin', '1506389803', '成功', '0.0.0.0', null);
INSERT INTO `blg_loginlog` VALUES ('19', 'admin', '1506392222', '成功', '0.0.0.0', null);
INSERT INTO `blg_loginlog` VALUES ('20', 'admin', '1506392364', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('21', 'admin', '1506392370', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('22', 'admin', '1506392378', '成功', '0.0.0.0', null);
INSERT INTO `blg_loginlog` VALUES ('23', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('24', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('25', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('26', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('27', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('28', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('29', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('30', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('31', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('32', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('33', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('34', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('35', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('36', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('37', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('38', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('39', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('40', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('41', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('42', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('43', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('44', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('45', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('46', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('47', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('48', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('49', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('50', 'admin', '1506389793', '失败', '0.0.0.0', '验证码错误');
INSERT INTO `blg_loginlog` VALUES ('51', null, null, null, null, null);
INSERT INTO `blg_loginlog` VALUES ('52', 'admin', '1506394914', '成功', '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('53', 'admin', '1506474536', '成功', '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('54', 'admin', '1506494455', '成功', '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('55', 'admin', '1506567663', '成功', '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('56', 'admin', '1506568903', '成功', '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('57', 'admin', '1506587896', '成功', '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('58', 'admin', '1506588328', '成功', '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('59', 'admin', '1506649036', '成功', '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('60', 'admin', '1506649156', '成功', '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('61', 'admin', '1506652874', '成功', '127.0.0.1', null);
INSERT INTO `blg_loginlog` VALUES ('62', 'admin', '1506665707', '成功', '127.0.0.1', null);

-- ----------------------------
-- Table structure for blg_login_wrong
-- ----------------------------
DROP TABLE IF EXISTS `blg_login_wrong`;
CREATE TABLE `blg_login_wrong` (
  `username` char(32) DEFAULT NULL,
  `sessid` char(40) DEFAULT NULL,
  `times` tinyint(1) DEFAULT NULL COMMENT '错误次数',
  `expire` int(11) DEFAULT NULL COMMENT '错误时长'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_login_wrong
-- ----------------------------

-- ----------------------------
-- Table structure for blg_logo
-- ----------------------------
DROP TABLE IF EXISTS `blg_logo`;
CREATE TABLE `blg_logo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pic` text,
  `addUser` char(32) DEFAULT NULL,
  `addTime` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_logo
-- ----------------------------
INSERT INTO `blg_logo` VALUES ('6', 's:33:\"/Public/Uploads/59cdfbc017536.jpg\";', 'admin', '1506671553');

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_menu
-- ----------------------------
INSERT INTO `blg_menu` VALUES ('2', '0', '', '文章管理', '1', '1', '2', 'admin', '1506048299');
INSERT INTO `blg_menu` VALUES ('3', '0', '', '菜单管理', '1', '1', '1', 'admin', '1505435661');
INSERT INTO `blg_menu` VALUES ('7', '2', 'Blog/blogList', '文章列表', '2', '1', '1', 'admin', '1505438908');
INSERT INTO `blg_menu` VALUES ('9', '3', 'System/menus', '菜单列表', '2', '1', '1', 'admin', '1505443697');
INSERT INTO `blg_menu` VALUES ('12', '0', '', '前台页面管理', '1', '1', '3', 'admin', '1505792110');
INSERT INTO `blg_menu` VALUES ('13', '12', 'System/IndexList', '前台导航栏', '2', '1', '1', 'admin', '1505792296');
INSERT INTO `blg_menu` VALUES ('17', '12', 'System/bannerList', '前台banner', '2', '1', '2', 'admin', '1505976137');
INSERT INTO `blg_menu` VALUES ('18', '12', 'System/friendList', '前台友链', '2', '1', '3', 'admin', '1506004331');
INSERT INTO `blg_menu` VALUES ('19', '2', 'Blog/blogTypeList', '文章类型', '2', '1', '2', 'admin', '1506045999');
INSERT INTO `blg_menu` VALUES ('20', '12', 'System/adList', '前台图文ad', '2', '1', '4', 'admin', '1506065377');
INSERT INTO `blg_menu` VALUES ('21', '12', 'System/gzadList', '前台关注ad', '2', '1', '5', 'admin', '1506080134');
INSERT INTO `blg_menu` VALUES ('22', '12', 'System/tagList', '前台标签', '2', '1', '16', 'admin', '1506082738');
INSERT INTO `blg_menu` VALUES ('23', '0', '', '用户管理', '1', '1', '4', 'admin', '1506139695');
INSERT INTO `blg_menu` VALUES ('24', '23', 'User/userList', '用户列表', '2', '1', '1', 'admin', '1506140137');
INSERT INTO `blg_menu` VALUES ('25', '23', 'User/loginList', '用户登录', '2', '1', '2', 'admin', '1506140531');

-- ----------------------------
-- Table structure for blg_tags
-- ----------------------------
DROP TABLE IF EXISTS `blg_tags`;
CREATE TABLE `blg_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 DEFAULT '',
  `url` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `addUser` char(32) CHARACTER SET utf8 DEFAULT NULL,
  `addTime` int(11) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `display` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of blg_tags
-- ----------------------------
INSERT INTO `blg_tags` VALUES ('1', '个人博客', '', 'admin', '1506083275', '1', '0');
INSERT INTO `blg_tags` VALUES ('2', 'web开发', '', 'admin', '1506083328', '2', '0');
INSERT INTO `blg_tags` VALUES ('3', '前端设计', '', 'admin', '1506083367', '3', '0');
INSERT INTO `blg_tags` VALUES ('4', 'Html', '', 'admin', '1506083611', '4', '0');
INSERT INTO `blg_tags` VALUES ('5', 'css3', '', 'admin', '1506083632', '5', '0');
INSERT INTO `blg_tags` VALUES ('6', 'Html5+css3', '', 'admin', '1506083667', '6', '0');
INSERT INTO `blg_tags` VALUES ('7', '百度', '', 'admin', '1506083690', '7', '0');
INSERT INTO `blg_tags` VALUES ('8', 'JavaScript', '', 'admin', '1506083715', '8', '0');
INSERT INTO `blg_tags` VALUES ('9', 'web开发', '', 'admin', '1506083727', '9', '0');
INSERT INTO `blg_tags` VALUES ('10', '后端开发', '', 'admin', '1506083742', '10', '0');
INSERT INTO `blg_tags` VALUES ('11', 'jquery', '', 'admin', '1506083757', '11', '0');
INSERT INTO `blg_tags` VALUES ('12', 'php', '', 'admin', '1506083777', '12', '0');
INSERT INTO `blg_tags` VALUES ('13', 'js框架', '', 'admin', '1506083789', '13', '0');
INSERT INTO `blg_tags` VALUES ('14', 'php框架', '', 'admin', '1506083799', '14', '0');

-- ----------------------------
-- Table structure for blg_user
-- ----------------------------
DROP TABLE IF EXISTS `blg_user`;
CREATE TABLE `blg_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` char(32) DEFAULT '',
  `addIp` char(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `addUser` char(32) DEFAULT NULL,
  `addTime` int(11) DEFAULT NULL,
  `sessid` char(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of blg_user
-- ----------------------------
INSERT INTO `blg_user` VALUES ('3', 'admin', '21232f297a57a5a743894a0e4a801fc3', '', '0', 'reg', null, '5unmv0f6t3t4qef4pmcfv6fmi1');
INSERT INTO `blg_user` VALUES ('4', 'liusj', 'admin', '0.0.0.0', '0', 'reg', null, null);
INSERT INTO `blg_user` VALUES ('9', 'xiaoliu', 'xiaoliu', '127.0.0.1', '1', 'admin', '1506231410', null);
