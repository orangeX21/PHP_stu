-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2023-06-01 20:48:05
-- 服务器版本： 5.7.26
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mybook`
--
CREATE DATABASE IF NOT EXISTS `mybook` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mybook`;

-- --------------------------------------------------------

--
-- 表的结构 `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(4) NOT NULL,
  `title` varchar(20) COLLATE utf8_bin NOT NULL,
  `author` varchar(20) COLLATE utf8_bin NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `publisherId` int(11) NOT NULL,
  `publishDate` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- 转存表中的数据 `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `price`, `publisherId`, `publishDate`) VALUES
(1, 'C语言程序设计', '张浩文', '39.00', 3, '2009-06-12'),
(2, 'Java从入门到精通', '刘梅、周靖', '49.00', 1, '2007-10-06'),
(3, '精通PHP程序设计（附光盘）', '周领田', '78.00', 1, '2016-07-04'),
(4, 'PHP宝典(含盘)', '周文彪', '79.00', 7, '2009-08-29'),
(5, 'java实用案例教程', '张文燕', '35.00', 2, '2017-08-16'),
(6, 'PHP动态网站开发', '赵文敏', '26.00', 3, '2009-05-16'),
(7, 'PHP框架技术', '孟宪文，张慧妍', '45.00', 1, '2012-11-10'),
(8, 'Java Web程序设计', '蒋培，王笑梅', '32.00', 2, '2012-03-01'),
(9, '信息技术', '张三', '54.00', 5, '2022-05-02'),
(10, 'Java程序设计', '李四', '38.90', 1, '2020-05-05'),
(11, 'PHP程序设计', '程文彬，朱佳美 主编', '69.00', 1, '2017-06-06'),
(12, 'PHP 实用教程（第2版）', '郑阿奇', '45.00', 1, '2016-07-13'),
(13, '软件开发与项目管理', '朱丽华、周伟', '49.50', 4, '2018-10-10');

-- --------------------------------------------------------

--
-- 表的结构 `publisher`
--

CREATE TABLE IF NOT EXISTS `publisher` (
  `publisherId` int(11) NOT NULL,
  `publisherName` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `publisher`
--

INSERT INTO `publisher` (`publisherId`, `publisherName`) VALUES
(1, '人民邮电出版社'),
(2, '铁道工业出版社'),
(3, '清华大学出版社'),
(4, '电子工业出版社'),
(5, '安徽教育出版社'),
(6, '天津大学出版社'),
(7, '机械工业出版社');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`username`, `password`, `email`) VALUES
('admin', '698d51a19d8a121ce581499d7b701668', 'admin@qq.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisherId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisherId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
