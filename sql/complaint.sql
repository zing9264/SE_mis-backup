-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 30 日 21:42
-- 伺服器版本: 10.1.35-MariaDB
-- PHP 版本： 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `se_mis`
--

-- --------------------------------------------------------

--
-- 資料表結構 `complaint`
--

CREATE TABLE `complaint` (
  `id` int(10) NOT NULL,
  `sender` char(30) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `obj` char(10) NOT NULL,
  `intime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `complaint`
--

INSERT INTO `complaint` (`id`, `sender`, `title`, `content`, `obj`, `intime`) VALUES
(16, 'accountant', 'gfd', 'gfdg', '主管', '2018-12-24 01:09:05'),
(17, 'admin', 'fgh', 'fgh', '會計', '2018-12-24 01:32:29');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
