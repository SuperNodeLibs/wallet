-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2017-11-25 09:21:37
-- 服务器版本： 5.5.56-log
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wallet`
--

-- --------------------------------------------------------

--
-- 表的结构 `yuan_address`
--

CREATE TABLE `yuan_address` (
  `address_id` int(11) NOT NULL COMMENT 'ID',
  `user_id` int(11) NOT NULL COMMENT '所属人ID',
  `address_name` varchar(64) DEFAULT NULL COMMENT '名字',
  `address_account` varchar(56) NOT NULL COMMENT '账号',
  `address_datetime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yuan_admin`
--

CREATE TABLE `yuan_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(32) DEFAULT NULL COMMENT '用户名',
  `admin_pass` varchar(32) DEFAULT NULL COMMENT '密码',
  `admin_nickname` varchar(32) DEFAULT NULL COMMENT '昵称',
  `group_id` int(11) DEFAULT NULL COMMENT '角色',
  `admin_lock` int(1) DEFAULT NULL COMMENT '锁定标识',
  `admin_mobile` varchar(32) DEFAULT NULL COMMENT '电话号码',
  `admin_email` varchar(64) DEFAULT NULL COMMENT '电子邮箱',
  `admin_datetime` datetime DEFAULT NULL COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='管理员表';

--
-- 转存表中的数据 `yuan_admin`
--

INSERT INTO `yuan_admin` (`admin_id`, `admin_name`, `admin_pass`, `admin_nickname`, `group_id`, `admin_lock`, `admin_mobile`, `admin_email`, `admin_datetime`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '管理员', 1, 0, '13800138000', 'pingyou.jiang@wonhe.net', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `yuan_asset`
--

CREATE TABLE `yuan_asset` (
  `asset_id` int(11) NOT NULL COMMENT 'ID',
  `asset_issuer` varchar(56) NOT NULL COMMENT '资产发行方',
  `asset_code` varchar(12) NOT NULL COMMENT '资产代码',
  `asset_amount` int(11) DEFAULT '0' COMMENT '资产数量',
  `asset_price` decimal(10,4) DEFAULT '0.0000' COMMENT '无限资产价格',
  `asset_date` date DEFAULT NULL COMMENT '资产发行时间',
  `asset_desc` varchar(255) DEFAULT NULL COMMENT '资产描述',
  `gateway_id` int(11) NOT NULL COMMENT '所属网关ID',
  `asset_datetime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yuan_bank`
--

CREATE TABLE `yuan_bank` (
  `bank_id` int(11) NOT NULL COMMENT 'ID',
  `bank_name` varchar(32) NOT NULL COMMENT '银行或支付名称',
  `bank_datetime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yuan_bank`
--

INSERT INTO `yuan_bank` (`bank_id`, `bank_name`, `bank_datetime`) VALUES
(2, '中国工商银行', '2017-04-25 16:55:18'),
(3, '中国农业银行', '2017-04-25 16:56:02'),
(4, '中国银行', '2017-04-25 16:57:02'),
(5, '中国建设银行', '2017-04-25 16:57:19'),
(6, '支付宝', '2017-04-25 16:57:31'),
(7, '比特币支付', '2017-04-25 22:18:04'),
(8, '莱特币支付', '2017-04-25 22:18:12'),
(9, '瑞波币支付', '2017-04-25 22:18:27');

-- --------------------------------------------------------

--
-- 表的结构 `yuan_config`
--

CREATE TABLE `yuan_config` (
  `config_id` int(11) NOT NULL COMMENT 'ID',
  `config_key` varchar(64) NOT NULL COMMENT '关键词',
  `config_value` varchar(255) DEFAULT NULL COMMENT '内容',
  `config_comment` varchar(255) DEFAULT NULL COMMENT '说明',
  `config_datetime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yuan_config`
--

INSERT INTO `yuan_config` (`config_id`, `config_key`, `config_value`, `config_comment`, `config_datetime`) VALUES
(3, 'MAIL_SERVER', 'smtp.163.com', '邮件服务器地址', '0000-00-00 00:00:00'),
(4, 'MAIL_USER', 'japleak@163.com', '邮件服务器账号', '0000-00-00 00:00:00'),
(5, 'MAIL_PASS', 'jpy123', '邮件服务器密码', '0000-00-00 00:00:00'),
(6, 'MAIL_FROM', 'japleak@163.com', '发件人名称', '0000-00-00 00:00:00'),
(7, 'MAIL_FROM_NAME', '钱包服务中心', '发件人昵称', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 表的结构 `yuan_exchange_info`
--

CREATE TABLE `yuan_exchange_info` (
  `info_id` int(11) NOT NULL COMMENT 'ID',
  `user_account` varchar(56) NOT NULL COMMENT '用户账号',
  `bank_id` int(11) NOT NULL COMMENT '支持的银行',
  `bank_account` varchar(255) NOT NULL COMMENT '银行账号',
  `bank_member` varchar(255) NOT NULL COMMENT '开户名',
  `bank_ext` varchar(255) DEFAULT NULL COMMENT '银行开户行',
  `asset_id` varchar(255) NOT NULL DEFAULT '0' COMMENT '支持的资产列表',
  `info_comment` varchar(255) DEFAULT NULL COMMENT '备注信息',
  `info_datetime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yuan_exchange_record`
--

CREATE TABLE `yuan_exchange_record` (
  `record_id` int(11) NOT NULL COMMENT 'ID',
  `user_account_src` varchar(56) NOT NULL COMMENT '支付发起方',
  `user_account_obj` varchar(56) NOT NULL COMMENT '支付接收方',
  `user_account` varchar(56) DEFAULT NULL COMMENT '操作用户',
  `info_id` int(11) NOT NULL COMMENT '支付信息',
  `asset_id` int(11) NOT NULL COMMENT '资产ID',
  `record_amount` decimal(11,4) NOT NULL COMMENT '支付金额',
  `record_status` int(1) NOT NULL COMMENT '支付状态',
  `record_start` datetime NOT NULL COMMENT '申请时间',
  `record_end` datetime DEFAULT NULL COMMENT '审核时间',
  `record_datetime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yuan_gateway`
--

CREATE TABLE `yuan_gateway` (
  `gateway_id` int(11) NOT NULL COMMENT 'ID',
  `gateway_account` varchar(56) NOT NULL COMMENT '关键词',
  `gateway_name` varchar(255) NOT NULL COMMENT '网关名称',
  `gateway_company` varchar(255) DEFAULT NULL COMMENT '网关公司名称',
  `gateway_area` varchar(64) DEFAULT NULL COMMENT '网关所在区域',
  `gateway_contacts` varchar(255) DEFAULT NULL COMMENT '联系人',
  `gateway_phone` varchar(255) DEFAULT NULL COMMENT '网关联系电话',
  `gateway_email` varchar(64) DEFAULT NULL COMMENT '网关邮箱',
  `gateway_address` varchar(255) DEFAULT NULL COMMENT '办公地址',
  `gateway_service` varchar(255) DEFAULT NULL COMMENT '网关客服列表',
  `gateway_status` int(1) DEFAULT '0' COMMENT '网关状态',
  `gateway_default` int(1) NOT NULL COMMENT '默认网关',
  `gateway_date` date NOT NULL COMMENT '网关审核通过时间',
  `gateway_datetime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yuan_group`
--

CREATE TABLE `yuan_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(32) DEFAULT NULL COMMENT '组名',
  `group_permission` varchar(255) DEFAULT NULL COMMENT '菜单权限',
  `group_lock` int(1) DEFAULT NULL COMMENT '锁定标记（1为锁定，0为正常）',
  `group_datetime` datetime DEFAULT NULL COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户组';

--
-- 转存表中的数据 `yuan_group`
--

INSERT INTO `yuan_group` (`group_id`, `group_name`, `group_permission`, `group_lock`, `group_datetime`) VALUES
(1, '管理组', '1:0;2:15;3:15;4:15;32:0;38:15;37:15;36:15;35:15;33:15;34:15;', 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `yuan_help`
--

CREATE TABLE `yuan_help` (
  `help_id` int(11) NOT NULL COMMENT 'ID',
  `type_id` int(11) NOT NULL COMMENT '分类ID',
  `help_title` varchar(255) NOT NULL COMMENT '帮助标题',
  `help_content` text NOT NULL COMMENT '帮助内容',
  `help_datetime` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `yuan_help_type`
--

CREATE TABLE `yuan_help_type` (
  `type_id` int(11) NOT NULL COMMENT 'ID',
  `type_name` varchar(32) NOT NULL COMMENT '分类名称',
  `parent_type_id` int(11) NOT NULL COMMENT '父类ID',
  `type_datetime` datetime NOT NULL COMMENT '修改时间'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `yuan_help_type`
--

INSERT INTO `yuan_help_type` (`type_id`, `type_name`, `parent_type_id`, `type_datetime`) VALUES
(1, '入门必读', 0, '2017-05-09 23:24:39');

-- --------------------------------------------------------

--
-- 表的结构 `yuan_user`
--

CREATE TABLE `yuan_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(32) NOT NULL DEFAULT '' COMMENT '用户名',
  `user_email` varchar(64) NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `user_pass` varchar(32) DEFAULT NULL COMMENT '密码',
  `user_paypass` varchar(64) DEFAULT NULL COMMENT '用户支付密码',
  `user_siyao` varchar(56) NOT NULL COMMENT '私钥',
  `user_confirm` int(1) DEFAULT '0' COMMENT '邮箱确认',
  `user_code` varchar(64) DEFAULT NULL COMMENT '验证码',
  `user_account` varchar(56) DEFAULT NULL COMMENT '用户账号',
  `user_3des` varchar(255) DEFAULT NULL COMMENT '私钥加密值',
  `group_id` int(11) DEFAULT NULL COMMENT '角色',
  `user_lock` int(1) DEFAULT NULL COMMENT '锁定标记（1为锁定，0为正常）',
  `user_mobile` varchar(32) DEFAULT NULL COMMENT '电话号码',
  `user_datetime` datetime DEFAULT NULL COMMENT '修改时间',
  `user_activate` int(1) NOT NULL DEFAULT '0' COMMENT '用户是否经过自动激活(0未激活，1激活)',
  `user_setTrust` int(1) NOT NULL DEFAULT '0' COMMENT '用户已信任UKC'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='用户信息表';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `yuan_address`
--
ALTER TABLE `yuan_address`
  ADD PRIMARY KEY (`address_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `yuan_admin`
--
ALTER TABLE `yuan_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `yuan_asset`
--
ALTER TABLE `yuan_asset`
  ADD PRIMARY KEY (`asset_id`),
  ADD KEY `asset_id` (`asset_id`);

--
-- Indexes for table `yuan_bank`
--
ALTER TABLE `yuan_bank`
  ADD PRIMARY KEY (`bank_id`),
  ADD KEY `bank_id` (`bank_id`);

--
-- Indexes for table `yuan_config`
--
ALTER TABLE `yuan_config`
  ADD PRIMARY KEY (`config_id`),
  ADD KEY `config_id` (`config_id`);

--
-- Indexes for table `yuan_exchange_info`
--
ALTER TABLE `yuan_exchange_info`
  ADD PRIMARY KEY (`info_id`),
  ADD KEY `info_id` (`info_id`);

--
-- Indexes for table `yuan_exchange_record`
--
ALTER TABLE `yuan_exchange_record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `record_id` (`record_id`);

--
-- Indexes for table `yuan_gateway`
--
ALTER TABLE `yuan_gateway`
  ADD PRIMARY KEY (`gateway_id`),
  ADD KEY `gateway_id` (`gateway_id`);

--
-- Indexes for table `yuan_group`
--
ALTER TABLE `yuan_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `yuan_help`
--
ALTER TABLE `yuan_help`
  ADD PRIMARY KEY (`help_id`),
  ADD KEY `help_id` (`help_id`);

--
-- Indexes for table `yuan_help_type`
--
ALTER TABLE `yuan_help_type`
  ADD PRIMARY KEY (`type_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `yuan_user`
--
ALTER TABLE `yuan_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`),
  ADD UNIQUE KEY `user_account` (`user_account`),
  ADD KEY `group_id` (`group_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `yuan_address`
--
ALTER TABLE `yuan_address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=36;
--
-- 使用表AUTO_INCREMENT `yuan_admin`
--
ALTER TABLE `yuan_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `yuan_asset`
--
ALTER TABLE `yuan_asset`
  MODIFY `asset_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=30;
--
-- 使用表AUTO_INCREMENT `yuan_bank`
--
ALTER TABLE `yuan_bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=10;
--
-- 使用表AUTO_INCREMENT `yuan_config`
--
ALTER TABLE `yuan_config`
  MODIFY `config_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=8;
--
-- 使用表AUTO_INCREMENT `yuan_exchange_info`
--
ALTER TABLE `yuan_exchange_info`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=24;
--
-- 使用表AUTO_INCREMENT `yuan_exchange_record`
--
ALTER TABLE `yuan_exchange_record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=28;
--
-- 使用表AUTO_INCREMENT `yuan_gateway`
--
ALTER TABLE `yuan_gateway`
  MODIFY `gateway_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=20;
--
-- 使用表AUTO_INCREMENT `yuan_group`
--
ALTER TABLE `yuan_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- 使用表AUTO_INCREMENT `yuan_help`
--
ALTER TABLE `yuan_help`
  MODIFY `help_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID';
--
-- 使用表AUTO_INCREMENT `yuan_help_type`
--
ALTER TABLE `yuan_help_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=3;
--
-- 使用表AUTO_INCREMENT `yuan_user`
--
ALTER TABLE `yuan_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=548;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
