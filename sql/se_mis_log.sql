-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 30 日 09:14
-- 伺服器版本: 10.1.33-MariaDB
-- PHP 版本： 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `se_mis_log`
--

-- --------------------------------------------------------

--
-- 資料表結構 `punchcard_accountant`
--

CREATE TABLE `punchcard_accountant` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `state` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `IP` char(15) NOT NULL,
  `leave_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `punchcard_admin`
--

CREATE TABLE `punchcard_admin` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `state` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `IP` char(15) NOT NULL,
  `leave_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `punchcard_admin`
--

INSERT INTO `punchcard_admin` (`id`, `time`, `state`, `latitude`, `longitude`, `IP`, `leave_id`) VALUES
(1, '2018-12-22 20:07:36', 1, 23.5521259, 120.46455479999999, '::1', 0),
(2, '2018-12-22 20:07:37', 2, 23.5521259, 120.46455479999999, '::1', 0),
(3, '2018-12-22 20:22:28', 128, 23.5521259, 120.46455479999999, '::1', 0),
(4, '2018-12-22 20:22:29', 128, 23.5521259, 120.46455479999999, '::1', 0),
(5, '2018-01-01 01:00:00', 1, 0, 0, '', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `punchcard_personnel`
--

CREATE TABLE `punchcard_personnel` (
  `id` int(11) NOT NULL,
  `time` datetime NOT NULL,
  `state` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `IP` char(15) NOT NULL,
  `leave_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `punchcard_accountant`
--
ALTER TABLE `punchcard_accountant`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `punchcard_admin`
--
ALTER TABLE `punchcard_admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `punchcard_personnel`
--
ALTER TABLE `punchcard_personnel`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `punchcard_accountant`
--
ALTER TABLE `punchcard_accountant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- 使用資料表 AUTO_INCREMENT `punchcard_admin`
--
ALTER TABLE `punchcard_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表 AUTO_INCREMENT `punchcard_personnel`
--
ALTER TABLE `punchcard_personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
