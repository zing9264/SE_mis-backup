-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2019 年 01 月 01 日 09:57
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
-- 資料庫： `se_mis`
--

-- --------------------------------------------------------

--
-- 資料表結構 `announcement_list`
--

CREATE TABLE `announcement_list` (
  `id` int(10) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL,
  `istop` tinyint(1) NOT NULL,
  `alert` tinyint(1) NOT NULL,
  `intime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `stime` datetime NOT NULL,
  `etime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `announcement_list`
--

INSERT INTO `announcement_list` (`id`, `title`, `content`, `istop`, `alert`, `intime`, `stime`, `etime`) VALUES
(2, '公告第一則', '公告第一則', 0, 0, '2018-11-22 22:01:47', '2018-11-22 22:01:47', '9999-12-31 23:59:59'),
(3, '公告第二則', '公告第二則', 0, 0, '2018-11-22 22:01:59', '2018-11-22 22:01:59', '9999-12-31 23:59:59'),
(4, '公告第三則', '公告第三則', 0, 0, '2018-11-22 22:02:11', '2018-11-01 01:00:00', '0000-00-00 00:00:00'),
(5, '公告第四則', '公告第四則', 0, 0, '2018-11-22 22:02:25', '2018-11-22 22:02:25', '9999-12-31 23:59:59'),
(6, '公告第五則', '公告第五則', 0, 0, '2018-11-22 22:03:39', '2018-11-01 01:00:00', '2018-11-03 01:00:00'),
(7, '公告第六則', '公告第六則', 0, 0, '2018-11-22 22:04:23', '2018-11-21 01:00:00', '2018-11-22 22:05:00'),
(8, '公告第七則', '公告第七則', 0, 0, '2018-11-22 22:04:54', '2018-11-21 01:00:00', '2018-11-26 01:00:00'),
(48, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(49, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(50, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(51, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(52, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(53, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(54, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(55, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(56, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(57, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(58, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(59, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(60, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(61, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(62, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(63, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(64, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(65, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(66, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(67, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59'),
(68, '123', '123', 0, 0, '2018-11-22 22:06:58', '2018-11-22 22:06:58', '9999-12-31 23:59:59');

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

-- --------------------------------------------------------

--
-- 資料表結構 `leave_list`
--

CREATE TABLE `leave_list` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `location` char(255) NOT NULL,
  `reason` text NOT NULL,
  `document` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `leave_list`
--

INSERT INTO `leave_list` (`id`, `staff_id`, `state`, `category`, `date_start`, `date_end`, `location`, `reason`, `document`) VALUES
(1, 1, 2, 1, '2018-01-01 01:00:00', '2018-01-03 12:59:00', '家瑋家', '212', 'leave_reson_admin_1545237679.jpg'),
(2, 1, 1, 128, '2018-12-22 01:00:00', '2018-12-23 01:00:00', '家瑋家', '2K', ''),
(3, 1, 1, 128, '2018-12-30 12:00:00', '2018-12-30 17:00:00', '家瑋家', '\r\n\'\'\'\'', '');

-- --------------------------------------------------------

--
-- 資料表結構 `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL,
  `size` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `location`
--

INSERT INTO `location` (`id`, `latitude`, `longitude`, `size`) VALUES
(1, 23.563379, 120.474178, 10000);

-- --------------------------------------------------------

--
-- 資料表結構 `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `state` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `position_add` int(11) NOT NULL,
  `profession_add` int(11) NOT NULL,
  `area_add` int(11) NOT NULL,
  `other_add` int(11) NOT NULL,
  `mutual_funds` int(11) NOT NULL,
  `resignation_reserve` int(11) NOT NULL,
  `bonus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `salary`
--

INSERT INTO `salary` (`id`, `staff_id`, `state`, `year`, `month`, `salary`, `position_add`, `profession_add`, `area_add`, `other_add`, `mutual_funds`, `resignation_reserve`, `bonus`) VALUES
(2, 1, 2, 2018, 12, 200000, 0, 0, 0, 0, 0, 0, 0),
(3, 2, 2, 2018, 12, 70000, 1500, 1000, 0, 0, 0, 0, 0),
(4, 3, 2, 2018, 12, 50000, 1000, 1000, 0, 0, 0, 0, 123),
(5, 2, 2, 2017, 12, 70000, 1500, 1000, 0, 0, 0, 0, 0),
(6, 2, 2, 2016, 12, 70000, 1500, 1000, 0, 0, 0, 0, 0),
(7, 2, 2, 2016, 11, 70000, 1500, 1000, 0, 0, 0, 0, 0),
(8, 2, 2, 2016, 10, 70000, 1500, 1000, 0, 0, 0, 0, 0),
(9, 2, 2, 2016, 9, 70000, 1500, 1000, 0, 0, 0, 0, 0),
(10, 2, 2, 2016, 8, 70000, 1500, 1000, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `salary_base`
--

CREATE TABLE `salary_base` (
  `sid` int(11) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `salary_base`
--

INSERT INTO `salary_base` (`sid`, `value`) VALUES
(1, 200000),
(2, 70000),
(3, 50000);

-- --------------------------------------------------------

--
-- 資料表結構 `staff`
--

CREATE TABLE `staff` (
  `id` int(11) NOT NULL,
  `username` char(30) NOT NULL,
  `password` char(129) NOT NULL,
  `salt` char(62) NOT NULL,
  `permission` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `staff`
--

INSERT INTO `staff` (`id`, `username`, `password`, `salt`, `permission`) VALUES
(1, 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', '$2y$11$QEOVp.SGv/FDsMVr0nH/UOrg81a4HncUwHdxMUuu5N1aMX/MsqIW2', 136),
(2, 'accountant', '3be85577900873886781e8cfde3694047c8976e5d1935e6b79bfd1c8291263cc2004aebe00a7b8f27d0b27653155663ad0d8252383647c64672ab696721f1fb5', '$2y$11$/f0x3oPxCtsGn6/jhGzKXOxA7Li3pDB1NeMhhkPMlEPj4JI2VWLWG', 133),
(3, 'personnel', '2d468779b53b0e93bbbb6d4dd2f09cc7012a25d0e814f03bd0fcc544ef64205624022d5ddbc286d256e2c9d2ab2a5a4342774dbcd9bd0b85331772df66d2a5f4', '$2y$11$V8ggz32nssuWxh9fnCwqauC3UMUph4eQU.MwNUCWvg3VbwR4UQLXm', 131);

-- --------------------------------------------------------

--
-- 資料表結構 `staff_profile`
--

CREATE TABLE `staff_profile` (
  `staff_id` int(11) NOT NULL,
  `name` char(10) NOT NULL,
  `position_plus` int(11) NOT NULL,
  `birthday` date NOT NULL,
  `ID` char(20) NOT NULL,
  `hometown` char(10) NOT NULL,
  `address` char(255) NOT NULL,
  `phone_home` char(15) NOT NULL,
  `phone` char(15) NOT NULL,
  `phone_2` char(15) NOT NULL,
  `Email` char(255) NOT NULL,
  `emergency_contact` char(10) NOT NULL,
  `emergency_relationship` char(10) NOT NULL,
  `emergency_phone` char(15) NOT NULL,
  `detail` text NOT NULL,
  `custom_photo` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `staff_profile`
--

INSERT INTO `staff_profile` (`staff_id`, `name`, `position_plus`, `birthday`, `ID`, `hometown`, `address`, `phone_home`, `phone`, `phone_2`, `Email`, `emergency_contact`, `emergency_relationship`, `emergency_phone`, `detail`, `custom_photo`) VALUES
(1, '管理者', 5, '2018-12-23', 'A123456789', '加', '嘉義縣民雄鄉xxx號', '021234657', '0955555555', '012345', 'eas123@sfda.com', 'ssss', 'SM', '01234578', 'asdfas\r\n54\r\n\r\n5453404\r\ntrh\r\ngfdhfd\r\n\r\n\r\nfgh\r\n\r\nsfds', '13.png'),
(2, '會計', 0, '0000-00-00', '', '', '0', '0', '0', '0', '', '', '', '', '', ''),
(3, '人事', 0, '0000-00-00', '', '', '0', '0', '0', '0', '', '', '', '', '', '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `announcement_list`
--
ALTER TABLE `announcement_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `complaint`
--
ALTER TABLE `complaint`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `leave_list`
--
ALTER TABLE `leave_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `salary_base`
--
ALTER TABLE `salary_base`
  ADD PRIMARY KEY (`sid`);

--
-- 資料表索引 `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 資料表索引 `staff_profile`
--
ALTER TABLE `staff_profile`
  ADD PRIMARY KEY (`staff_id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `announcement_list`
--
ALTER TABLE `announcement_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- 使用資料表 AUTO_INCREMENT `complaint`
--
ALTER TABLE `complaint`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用資料表 AUTO_INCREMENT `leave_list`
--
ALTER TABLE `leave_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表 AUTO_INCREMENT `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表 AUTO_INCREMENT `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用資料表 AUTO_INCREMENT `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
