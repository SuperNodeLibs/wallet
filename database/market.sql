# Host: localhost  (Version: 5.5.40)
# Date: 2017-05-20 18:06:07
# Generator: MySQL-Front 5.3  (Build 4.120)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "yuan_min"
#

DROP TABLE IF EXISTS `yuan_min`;
CREATE TABLE `yuan_min` (
  `min_id` int(11) NOT NULL AUTO_INCREMENT,
  `min_open` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '开盘价',
  `min_high` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '最高价',
  `min_low` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '最低价',
  `min_close` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '收盘价',
  `min_volume` int(11) DEFAULT '0' COMMENT '成交量',
  `min_timestamp` int(11) DEFAULT NULL COMMENT '时间戳（秒）',
  `min_pagetoken` varchar(64) DEFAULT NULL COMMENT '分页Token',
  `min_datetime` datetime DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`min_id`),
  KEY `min_id` (`min_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "yuan_min"
#

/*!40000 ALTER TABLE `yuan_min` DISABLE KEYS */;
/*!40000 ALTER TABLE `yuan_min` ENABLE KEYS */;

#
# Structure for table "yuan_min_000002"
#

DROP TABLE IF EXISTS `yuan_min_000002`;
CREATE TABLE `yuan_min_000002` (
  `min_id` int(11) NOT NULL AUTO_INCREMENT,
  `min_open` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '开盘价',
  `min_high` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '最高价',
  `min_low` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '最低价',
  `min_close` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '收盘价',
  `min_volume` int(11) DEFAULT '0' COMMENT '成交量',
  `min_timestamp` int(11) DEFAULT NULL COMMENT '时间戳（秒）',
  `min_pagetoken` varchar(64) DEFAULT NULL COMMENT '分页Token',
  `min_datetime` datetime DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`min_id`),
  KEY `min_id` (`min_id`)
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

#
# Data for table "yuan_min_000002"
#

/*!40000 ALTER TABLE `yuan_min_000002` DISABLE KEYS */;
/*!40000 ALTER TABLE `yuan_min_000002` ENABLE KEYS */;

#
# Structure for table "yuan_min_000003"
#

DROP TABLE IF EXISTS `yuan_min_000003`;
CREATE TABLE `yuan_min_000003` (
  `min_id` int(11) NOT NULL AUTO_INCREMENT,
  `min_open` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '开盘价',
  `min_high` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '最高价',
  `min_low` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '最低价',
  `min_close` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '收盘价',
  `min_volume` int(11) DEFAULT '0' COMMENT '成交量',
  `min_timestamp` int(11) DEFAULT NULL COMMENT '时间戳（秒）',
  `min_pagetoken` varchar(64) DEFAULT NULL COMMENT '分页Token',
  `min_datetime` datetime DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`min_id`),
  KEY `min_id` (`min_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "yuan_min_000003"
#

/*!40000 ALTER TABLE `yuan_min_000003` DISABLE KEYS */;
/*!40000 ALTER TABLE `yuan_min_000003` ENABLE KEYS */;

#
# Structure for table "yuan_min_mbs"
#

DROP TABLE IF EXISTS `yuan_min_mbs`;
CREATE TABLE `yuan_min_mbs` (
  `min_id` int(11) NOT NULL AUTO_INCREMENT,
  `min_open` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '开盘价',
  `min_high` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '最高价',
  `min_low` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '最低价',
  `min_close` decimal(11,4) NOT NULL DEFAULT '0.0000' COMMENT '收盘价',
  `min_volume` int(11) DEFAULT '0' COMMENT '成交量',
  `min_timestamp` int(11) DEFAULT NULL COMMENT '时间戳（秒）',
  `min_pagetoken` varchar(64) DEFAULT NULL COMMENT '分页Token',
  `min_datetime` datetime DEFAULT NULL COMMENT '时间',
  PRIMARY KEY (`min_id`),
  KEY `min_id` (`min_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

#
# Data for table "yuan_min_mbs"
#

/*!40000 ALTER TABLE `yuan_min_mbs` DISABLE KEYS */;
/*!40000 ALTER TABLE `yuan_min_mbs` ENABLE KEYS */;
