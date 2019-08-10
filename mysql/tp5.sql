/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : kanc

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-04-20 18:50:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for article
-- ----------------------------
DROP TABLE IF EXISTS `article`;
CREATE TABLE `article` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(120) DEFAULT NULL,
  `title` text,
  `des` text,
  `keywords` text,
  `content` text,
  `columid` int(11) DEFAULT NULL,
  `authorid` int(11) DEFAULT NULL,
  `time` varchar(100) DEFAULT NULL,
  `click` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of article
-- ----------------------------
INSERT INTO `article` VALUES ('7', '20190116\\45e61187f1d57b26a512042b780b827d.jpeg', '1', '1', '1', '<p>1<img src=\"http://img.baidu.com/hi/jx2/j_0002.gif\"/></p>', '19', '8', '1547653915', '4');
INSERT INTO `article` VALUES ('9', '20190116\\9e218076be660508559a93e3c2d70c75.jpg', '1', '1', '1', '<p>1</p>', '19', '10', '1547658498', '0');
INSERT INTO `article` VALUES ('10', '20190119\\bc9b4c44574fb714980c2e1ae40a1852.jpg', '吴敬昌啊', '3', '3', '<p><img src=\"http://img.baidu.com/hi/jx2/j_0013.gif\"/></p>', '19', '10', '1547881427', '0');
INSERT INTO `article` VALUES ('11', '20190119\\875a1237d5d37c3635c65b2454cae82a.jpg', '啊啊啊啊啊', '1', '1', '<p>1</p>', '22', '9', '1547881550', '0');

-- ----------------------------
-- Table structure for author
-- ----------------------------
DROP TABLE IF EXISTS `author`;
CREATE TABLE `author` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  `photo` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of author
-- ----------------------------
INSERT INTO `author` VALUES ('8', '陈俭', '20190116\\ba77c14716955a3a9307b33d5edaf798.png');
INSERT INTO `author` VALUES ('9', '发挥', '20190116\\6e50969ddf0313bc56c99fbd283b296f.png');
INSERT INTO `author` VALUES ('10', '吴敬昌', '20190116\\e45de75f7cb69e56a7544904e07d1b7e.png');

-- ----------------------------
-- Table structure for auth_group
-- ----------------------------
DROP TABLE IF EXISTS `auth_group`;
CREATE TABLE `auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group
-- ----------------------------
INSERT INTO `auth_group` VALUES ('9', '超级管理员', '1', '11,12,13,14,15,16');
INSERT INTO `auth_group` VALUES ('13', '44', '1', '14,15,16');

-- ----------------------------
-- Table structure for auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `auth_group_access`;
CREATE TABLE `auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_group_access
-- ----------------------------
INSERT INTO `auth_group_access` VALUES ('42', '9');
INSERT INTO `auth_group_access` VALUES ('44', '13');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  `pid` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT '0',
  `sort` int(11) DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('12', 'lunbo/add', '添加轮播', '1', '1', '', '11', '1', '1');
INSERT INTO `auth_rule` VALUES ('13', 'lunbo/update', '修改轮播', '1', '1', '', '11', '1', '1');
INSERT INTO `auth_rule` VALUES ('11', 'lunbo/index', '轮播管理', '1', '1', '', '0', '0', '0');
INSERT INTO `auth_rule` VALUES ('14', 'conf/index', '配置管理', '1', '1', '', '0', '0', '0');
INSERT INTO `auth_rule` VALUES ('15', 'conf/update', '修改配置', '1', '1', '', '14', '1', '0');
INSERT INTO `auth_rule` VALUES ('16', 'conf/list', '修改配置项', '1', '1', '', '14', '1', '0');

-- ----------------------------
-- Table structure for colum
-- ----------------------------
DROP TABLE IF EXISTS `colum`;
CREATE TABLE `colum` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `pid` int(11) DEFAULT NULL,
  `type` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of colum
-- ----------------------------
INSERT INTO `colum` VALUES ('17', '分类', '0', '0', '0');
INSERT INTO `colum` VALUES ('19', '金融', '0', '17', '0');
INSERT INTO `colum` VALUES ('22', '态度', '0', '17', '0');
INSERT INTO `colum` VALUES ('23', '快报', '0', '0', '1');
INSERT INTO `colum` VALUES ('24', '业界', '0', '23', '1');
INSERT INTO `colum` VALUES ('25', '手机', '0', '23', '0');

-- ----------------------------
-- Table structure for conf
-- ----------------------------
DROP TABLE IF EXISTS `conf`;
CREATE TABLE `conf` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cname` varchar(50) DEFAULT NULL,
  `ename` varchar(50) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `val` varchar(100) DEFAULT NULL,
  `vals` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of conf
-- ----------------------------
INSERT INTO `conf` VALUES ('11', '清除缓存2', 'cache', '5', '三个小时', '一个小时,两个小时,三个小时,四个小时');
INSERT INTO `conf` VALUES ('13', '是否关闭网站', 'web', '3', '是', '是,否');
INSERT INTO `conf` VALUES ('14', '是否开启验证码', 'code', '4', '是', '是');
INSERT INTO `conf` VALUES ('15', '关键字', 'keywords', '2', '吴敬昌', '吴敬昌');
INSERT INTO `conf` VALUES ('16', '描述', 'des', '2', '吴敬昌吴敬昌吴敬昌吴敬昌吴敬昌吴敬昌吴敬昌吴敬昌吴敬昌吴敬昌吴敬昌吴敬昌吴敬昌吴敬昌', '吴敬昌');
INSERT INTO `conf` VALUES ('17', '标题', 'title', '2', '吴敬昌的网站', '今天天气好好好好好好好');

-- ----------------------------
-- Table structure for lunbo
-- ----------------------------
DROP TABLE IF EXISTS `lunbo`;
CREATE TABLE `lunbo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(100) DEFAULT NULL,
  `sort` int(11) DEFAULT '0',
  `href` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lunbo
-- ----------------------------
INSERT INTO `lunbo` VALUES ('3', '20190116\\e242964a8e7218dc23073483e464dda7.jpg', '1', 'weradrffa');
INSERT INTO `lunbo` VALUES ('5', '20190116\\802ca00323effbd5cb6d2cea00d8cb49.jpg', '2', 'adfafga');
INSERT INTO `lunbo` VALUES ('6', '20190119\\78dbc2f56baa3c6a15fee3c1ea150a28.jpg', '0', 'https://blog.csdn.net/qq_42049445');

-- ----------------------------
-- Table structure for manger
-- ----------------------------
DROP TABLE IF EXISTS `manger`;
CREATE TABLE `manger` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastlogin` varchar(255) NOT NULL,
  `num` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of manger
-- ----------------------------
INSERT INTO `manger` VALUES ('42', '超级管理员', 'c4ca4238a0b923820dcc509a6f75849b', '', '0', '1');
INSERT INTO `manger` VALUES ('43', '轮播管理员', 'c4ca4238a0b923820dcc509a6f75849b', '', '0', '1');
INSERT INTO `manger` VALUES ('44', '配置管理员', 'c4ca4238a0b923820dcc509a6f75849b', '', '0', '1');
