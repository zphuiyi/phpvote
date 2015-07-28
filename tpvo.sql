-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 06 月 24 日 13:57
-- 服务器版本: 5.1.50-log
-- PHP 版本: 5.3.3-pl1-gentoo

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `tpvo`
--

-- --------------------------------------------------------

--
-- 表的结构 `think_admin`
--

CREATE TABLE IF NOT EXISTS `think_admin` (
  `aname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `apwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `usetime` datetime NOT NULL,
  `gonggao` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dlip` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '127.0.0.1',
  PRIMARY KEY (`aname`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `think_admin`
--

INSERT INTO `think_admin` (`aname`, `apwd`, `usetime`, `gonggao`, `dlip`) VALUES
('admin', '93c3953354e5fd6477fed64324e11ada', '2013-03-21 18:34:29', '欢迎您来到投票吧。如果您对各种事情有各种看法，来吧，投票吧。 您还在跟周围的人对某件事讨论吗？想听听大家的看法吗？来吧，投票吧 ', '127.0.0.1');

-- --------------------------------------------------------

--
-- 表的结构 `think_option`
--

CREATE TABLE IF NOT EXISTS `think_option` (
  `xid` int(8) NOT NULL AUTO_INCREMENT,
  `extend` int(8) NOT NULL,
  `cho` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `num` int(80) DEFAULT '0',
  PRIMARY KEY (`xid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=24 ;

--
-- 转存表中的数据 `think_option`
--

INSERT INTO `think_option` (`xid`, `extend`, `cho`, `num`) VALUES
(1, 1, '苹果', 3),
(2, 1, '桔子', 4),
(3, 1, '香蕉', 4),
(4, 2, '不会', 3),
(5, 1, '草莓', 3),
(6, 2, '会', 1),
(20, 7, 'GHTHTYH', 2),
(7, 3, '开卷加上机测试', 21),
(8, 3, '传统考试', 15),
(9, 4, '应该加其他选项', 5),
(10, 4, '完全没有必要', 19),
(21, 24, 'bnbn', 0),
(22, 24, 'bnbnbnnb', 7),
(23, 24, 'bnbnbnnbbnnb', 3);

-- --------------------------------------------------------

--
-- 表的结构 `think_theme`
--

CREATE TABLE IF NOT EXISTS `think_theme` (
  `tid` int(8) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `startime` date NOT NULL,
  `endtime` date NOT NULL,
  `choice` int(2) NOT NULL DEFAULT '0',
  `zt` int(2) NOT NULL DEFAULT '2',
  `count` int(80) DEFAULT '0',
  `opnum` int(8) NOT NULL DEFAULT '0',
  `fqname` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`tid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- 转存表中的数据 `think_theme`
--

INSERT INTO `think_theme` (`tid`, `title`, `startime`, `endtime`, `choice`, `zt`, `count`, `opnum`, `fqname`) VALUES
(1, '哪种水果好', '2013-03-06', '2013-03-28', 1, 0, 38, 4, '管理'),
(2, '你会选择吗', '2013-03-06', '2013-03-19', 0, 1, 4, 2, '测试人员'),
(3, '关于期末考试', '2013-03-07', '2013-03-29', 0, 0, 7, 2, '学校兰老师'),
(4, '投票系统是否要加上其他选项让大家发表观点', '2013-03-06', '2013-03-27', 0, 0, 2, 2, '管理员'),
(7, '测试投票', '2013-03-19', '2013-04-04', 0, 0, 2, 1, '测试人员'),
(23, '老师', '2013-03-22', '2013-04-02', 0, 2, 0, 0, '老师'),
(24, 'bbnbn', '2013-03-25', '2013-03-26', 0, 0, 9, 3, '人人呢'),
(25, '研发部最温柔的', '2013-05-10', '2013-05-29', 1, 2, 0, 0, '研发部');

-- --------------------------------------------------------

--
-- 表的结构 `think_ucenter`
--

CREATE TABLE IF NOT EXISTS `think_ucenter` (
  `userid` int(80) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sex` set('男','女') COLLATE utf8_unicode_ci DEFAULT NULL,
  `phon` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `workr` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thnum` int(20) NOT NULL DEFAULT '0',
  `opnum` int(100) NOT NULL DEFAULT '0',
  `addr` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `think_ucenter`
--

INSERT INTO `think_ucenter` (`userid`, `name`, `sex`, `phon`, `workr`, `thnum`, `opnum`, `addr`) VALUES
(1, '风生水起', '男', '15030583193', '学生', 0, 0, '北京丰台'),
(2, '人人呢', '男', '15030583193', '还在上学', 0, 0, '北京'),
(3, '王赛杰', '女', '15236985415', '已经工作', 0, 0, '石家庄'),
(4, 'fdfdfd', '男', '', '没有填写身份', 0, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `think_users`
--

CREATE TABLE IF NOT EXISTS `think_users` (
  `uid` int(80) NOT NULL AUTO_INCREMENT,
  `uname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `upwd` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `utime` datetime NOT NULL,
  `uip` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '127.0.0.1',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `think_users`
--

INSERT INTO `think_users` (`uid`, `uname`, `upwd`, `utime`, `uip`) VALUES
(1, '435328801@qq.com', 'admin', '2013-03-21 18:53:32', '127.0.0.1'),
(2, 'ren_435328801@hotmail.com', '5d0642da194ae7258558a5a7e790d2e6', '2013-03-25 17:56:52', '10.0.0.72'),
(3, '2459921933@qq.com', 'e10adc3949ba59abbe56e057f20f883e', '2013-03-28 18:09:32', '111.11.85.23'),
(4, 'hhh@qq.com', '5d793fc5b00a2348c3fb9ab59e5ca98a', '2013-03-28 18:21:39', '10.0.0.72');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
