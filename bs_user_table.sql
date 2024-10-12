-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 10 月 12 日 06:17
-- サーバのバージョン： 10.4.28-MariaDB
-- PHP のバージョン: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `beshift`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `bs_user_table`
--

CREATE TABLE `bs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(255) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `bs_user_table`
--

INSERT INTO `bs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'ゆりあ', 'test1', 'test1', 0, 0),
(2, 'おたぎり', 'test2', 'test2', 0, 0),
(3, '管理人', 'test3', 'test3', 1, 0),
(4, '小田切ゆりあ', 'test1', '$2y$10$53DmuGXyDDvwsMyy9fm4qefJKTfs7BzrEVSnoevPpWBsKsdvKSER2', 1, 0),
(5, 'あいうえお', 'aiueo', '$2y$10$ueiysPOzW4Nqtg0kVYQOjeL1Qica4UtEFBwF5cJ6uZnURpJR.D27O', 0, 0),
(6, '小田切ゆりあ', 'test4', '$2y$10$xQP9bdaGkGzVaKkXX6G/cu/4Uw.hF7tV.Rp5osiFmxKlzfHG1.TvG', 0, 0),
(7, '小田切ゆりあ', 'test5', '$2y$10$bCt/WTclfVednfGBP1K4vuxOZy1aZgfv6Q990E81T0p2nX8WBa5x6', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `bs_user_table`
--
ALTER TABLE `bs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `bs_user_table`
--
ALTER TABLE `bs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
