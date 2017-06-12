-- phpMyAdmin SQL Dump
-- version 3.3.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2016 at 09:23 PM
-- Server version: 5.1.63
-- PHP Version: 5.2.17p1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `carcase`
--

-- --------------------------------------------------------

--
-- Table structure for table `case_answer`
--

CREATE TABLE IF NOT EXISTS `case_answer` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '答案编号',
  `Uid` varchar(255) NOT NULL DEFAULT '' COMMENT '答案作者',
  `Qid` varchar(255) NOT NULL DEFAULT '' COMMENT '问题编号',
  `Content` text NOT NULL COMMENT '答案内容',
  `DateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '发表时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='答案列表' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `case_answer`
--

INSERT INTO `case_answer` (`Id`, `Uid`, `Qid`, `Content`, `DateTime`) VALUES
(1, '3', '1', '<p>这是个好东西啊<br></p>', '2016-01-25 11:04:37'),
(2, '2', '2', '<p>使用UB 研磨剂，·······<br></p>', '2016-01-25 11:18:28');

-- --------------------------------------------------------

--
-- Table structure for table `case_car_class`
--

CREATE TABLE IF NOT EXISTS `case_car_class` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类型编号',
  `Title` varchar(255) NOT NULL DEFAULT '' COMMENT '类型名称',
  `DateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='汽车类型' AUTO_INCREMENT=19 ;

--
-- Dumping data for table `case_car_class`
--

INSERT INTO `case_car_class` (`Id`, `Title`, `DateTime`) VALUES
(1, '奔驰', '2015-12-02 01:53:43'),
(2, '宝马', '2015-12-02 03:43:39'),
(3, '奥迪', '2015-12-02 03:43:47'),
(4, '路虎', '2016-01-25 12:49:08'),
(5, '玛莎拉蒂', '2016-01-25 12:49:56'),
(6, '广汽丰田', '2016-01-25 12:50:16'),
(7, '一汽丰田', '2016-01-25 12:50:43'),
(8, '别克', '2016-01-25 12:50:53'),
(9, '雷克萨斯', '2016-01-25 12:51:29'),
(10, '一汽大众', '2016-01-25 12:52:19'),
(11, 'jeep', '2016-01-25 12:52:37'),
(12, '进口大众', '2016-01-25 12:53:12'),
(13, '马自达', '2016-01-25 12:53:40'),
(14, '雪佛兰', '2016-01-25 12:54:34'),
(15, '广州本田', '2016-01-25 12:56:32'),
(16, '凯迪拉克', '2016-01-25 16:24:55'),
(17, 'mini', '2016-01-25 16:25:07'),
(18, '菲亚特', '2016-01-25 16:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `case_case`
--

CREATE TABLE IF NOT EXISTS `case_case` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '案例编号',
  `Uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户编号',
  `Title` varchar(255) NOT NULL DEFAULT '' COMMENT '案例标题',
  `Cid` int(11) NOT NULL DEFAULT '0' COMMENT '案例类型',
  `Carid` int(11) NOT NULL DEFAULT '0' COMMENT '汽车类型',
  `Content` text NOT NULL COMMENT '案例内容',
  `DateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='案例列表' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `case_case`
--

INSERT INTO `case_case` (`Id`, `Uid`, `Title`, `Cid`, `Carid`, `Content`, `DateTime`) VALUES
(2, 27, '内饰清洗如何更快', 4, 1, '<p>先判断是怎么样的脏<br></p>', '2016-01-25 15:50:09');

-- --------------------------------------------------------

--
-- Table structure for table `case_case_class`
--

CREATE TABLE IF NOT EXISTS `case_case_class` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类型编号',
  `Title` varchar(255) NOT NULL DEFAULT '' COMMENT '类型名称',
  `DateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='案例类型表' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `case_case_class`
--

INSERT INTO `case_case_class` (`Id`, `Title`, `DateTime`) VALUES
(1, '实践操作', '2015-12-02 02:01:20'),
(2, '理论知识', '2015-12-02 03:43:26'),
(3, '漆面类', '2016-01-25 12:59:30'),
(4, '健康类', '2016-01-25 13:00:12'),
(5, '安全类', '2016-01-25 13:00:23'),
(6, '底盘类', '2016-01-25 16:24:06');

-- --------------------------------------------------------

--
-- Table structure for table `case_question`
--

CREATE TABLE IF NOT EXISTS `case_question` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '问题编号',
  `Uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户编号',
  `Title` varchar(255) NOT NULL DEFAULT '' COMMENT '问题名称',
  `Cid` int(11) NOT NULL DEFAULT '0' COMMENT '问题类型',
  `Content` text NOT NULL COMMENT '问题描述',
  `DateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '提问时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='问题列表' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `case_question`
--

INSERT INTO `case_question` (`Id`, `Uid`, `Title`, `Cid`, `Content`, `DateTime`) VALUES
(1, 2, '刚发的合肥关怀', 1, '<p>奋斗过后奋斗过后奋斗过<br></p>', '2015-12-09 10:20:12'),
(2, 6, '抛光光圈问题', 1, '<p>XX车型&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;XX车系&nbsp; 使用什么材料不会出现光圈<br></p>', '2016-01-25 11:17:13');

-- --------------------------------------------------------

--
-- Table structure for table `case_question_class`
--

CREATE TABLE IF NOT EXISTS `case_question_class` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类型编号',
  `Title` varchar(255) NOT NULL DEFAULT '' COMMENT '类型名称',
  `DateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='问题类型表' AUTO_INCREMENT=6 ;

--
-- Dumping data for table `case_question_class`
--

INSERT INTO `case_question_class` (`Id`, `Title`, `DateTime`) VALUES
(1, '分类一', '2015-12-02 03:43:00'),
(2, '分类二', '2015-12-02 03:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `case_user`
--

CREATE TABLE IF NOT EXISTS `case_user` (
  `Uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户编号',
  `Username` varchar(255) NOT NULL DEFAULT '' COMMENT '用户名称',
  `Password` varchar(255) NOT NULL DEFAULT '' COMMENT '用户密码',
  `Email` varchar(255) NOT NULL DEFAULT '' COMMENT '电子邮箱',
  `Realname` varchar(255) NOT NULL DEFAULT '' COMMENT '真实姓名',
  `Faceimg` varchar(255) NOT NULL DEFAULT '' COMMENT '用户头像',
  `Typeid` int(11) NOT NULL DEFAULT '0' COMMENT '用户类型',
  `RegDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间',
  `RegIP` varchar(255) NOT NULL DEFAULT '' COMMENT '注册IP',
  PRIMARY KEY (`Uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='用户列表' AUTO_INCREMENT=31 ;

--
-- Dumping data for table `case_user`
--

INSERT INTO `case_user` (`Uid`, `Username`, `Password`, `Email`, `Realname`, `Faceimg`, `Typeid`, `RegDate`, `RegIP`) VALUES
(1, 'ShyComet', '0f0d4775c4ab6f63330ead973c9063ea', 'shycomet@qq.com', '夏慧新', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2015-11-25 19:00:13', '127.0.0.1'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@case.com', '管理员', '/Data/Uploads/Photo/Face/56678ff622d1d.jpg', 2, '2015-11-25 19:00:52', '127.0.0.1'),
(3, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@case.com', '系统测试', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2015-11-25 19:01:12', '127.0.0.1'),
(4, 'test2', 'ad0234829205b9033196ba818f7a872b', 'test2@case.com', '测试二', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2015-12-02 02:44:40', '127.0.0.1'),
(5, 'XCL', '81dc9bdb52d04dc20036dbd8313ed055', '1377083306@qq.com', '徐春玲', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 11:11:19', '39.180.49.170'),
(6, 'WZX', '81dc9bdb52d04dc20036dbd8313ed055', '1378927757@qq.com', '温在霞', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 11:15:56', '39.180.49.170'),
(7, 'XWY', '81dc9bdb52d04dc20036dbd8313ed055', '731257043@qq.com', '许万元', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:21:36', '125.115.252.166'),
(8, 'YXE', '81dc9bdb52d04dc20036dbd8313ed055', '824335408@qq.com', '叶幸恩', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:22:21', '125.115.252.166'),
(9, 'WQQ', '81dc9bdb52d04dc20036dbd8313ed055', '1160381422@qq.com', '王钱强', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:23:29', '125.115.252.166'),
(10, 'PRJ', '81dc9bdb52d04dc20036dbd8313ed055', '405598245@qq.com', '潘仁杰', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:24:25', '125.115.252.166'),
(11, 'YJ', '81dc9bdb52d04dc20036dbd8313ed055', '1292714054@qq.com', '严洁', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:25:08', '125.115.252.166'),
(12, 'WPF', '81dc9bdb52d04dc20036dbd8313ed055', '1456192868@qq.com', '温鹏飞', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:25:56', '125.115.252.166'),
(13, 'GYB', '81dc9bdb52d04dc20036dbd8313ed055', '1694912975@qq.com', '高永彪', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:26:58', '125.115.252.166'),
(14, 'WBG', '81dc9bdb52d04dc20036dbd8313ed055', '463401438@qq.com', '吴必恭', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:28:06', '125.115.252.166'),
(15, 'WEL', '81dc9bdb52d04dc20036dbd8313ed055', '444782757@qq.com', '王二亮', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:28:51', '125.115.252.166'),
(16, 'ZXH', '81dc9bdb52d04dc20036dbd8313ed055', '527270472@qq.com', '周学杭', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:29:53', '125.115.252.166'),
(17, 'MJB', '81dc9bdb52d04dc20036dbd8313ed055', '931952002@qq.com', '马加表', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:30:51', '125.115.252.166'),
(18, 'CSW', '81dc9bdb52d04dc20036dbd8313ed055', '389500531@qq.com', '陈守望', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:31:56', '125.115.252.166'),
(19, 'ZHL', '81dc9bdb52d04dc20036dbd8313ed055', '1056268308@qq.com', '査海龙', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:32:39', '125.115.252.166'),
(20, 'ZJX', '81dc9bdb52d04dc20036dbd8313ed055', '865504782@qq.com', '张箐溪', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:41:43', '125.115.252.166'),
(21, 'ZXC', '81dc9bdb52d04dc20036dbd8313ed055', '1714599531@qq.com', '曾小超', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:42:28', '125.115.252.166'),
(22, 'WLL', '81dc9bdb52d04dc20036dbd8313ed055', '984217836@qq.com', '王龙龙', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:42:53', '125.115.252.166'),
(23, 'LJQ', '81dc9bdb52d04dc20036dbd8313ed055', '798124921@qq.com', '刘军奇', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:45:04', '125.115.252.166'),
(24, 'ZLC', '81dc9bdb52d04dc20036dbd8313ed055', '626203664@qq.com', '张连超', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 12:46:06', '125.115.252.166'),
(25, 'GZQ', '81dc9bdb52d04dc20036dbd8313ed055', '674092172@qq.com', '郭志强', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 13:01:57', '125.115.252.166'),
(26, 'ZRS', '81dc9bdb52d04dc20036dbd8313ed055', '1059642857@qq.com', '郑瑞铄', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 13:02:56', '125.115.252.166'),
(27, 'QDC', '81dc9bdb52d04dc20036dbd8313ed055', '506457662@qq.com', '覃代才', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 13:10:06', '125.115.252.166'),
(28, 'WJW', '81dc9bdb52d04dc20036dbd8313ed055', '1763479740@qq.com', '温进伟', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 13:44:26', '125.115.252.166'),
(29, 'YEX', '81dc9bdb52d04dc20036dbd8313ed055', '243987402@qq.com', '杨尔献', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 13:45:20', '125.115.252.166'),
(30, 'ZHR', '81dc9bdb52d04dc20036dbd8313ed055', '852757290@qq.com', '周浩然', '/Data/Uploads/Photo/Face/98716679146.png', 1, '2016-01-25 16:49:44', '125.115.252.166');

-- --------------------------------------------------------

--
-- Table structure for table `case_user_class`
--

CREATE TABLE IF NOT EXISTS `case_user_class` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '类型编号',
  `Title` varchar(255) NOT NULL DEFAULT '' COMMENT '类型名称',
  `DateTime` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '添加时间',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='用户类型表' AUTO_INCREMENT=4 ;

--
-- Dumping data for table `case_user_class`
--

INSERT INTO `case_user_class` (`Id`, `Title`, `DateTime`) VALUES
(1, '普通用户', '2015-11-25 19:00:52'),
(2, '管理员', '2015-11-25 19:00:52');
