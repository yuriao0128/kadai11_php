-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 10 月 05 日 07:44
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
-- テーブルの構造 `bs_comments`
--

CREATE TABLE `bs_comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `bs_comments`
--

INSERT INTO `bs_comments` (`id`, `post_id`, `user_id`, `comment`, `created_at`) VALUES
(1, 2, 1, 'ssss', '2024-10-02 16:23:24'),
(2, 3, 1, 'aaa', '2024-10-04 14:56:39'),
(3, 4, 1, 'ohayo', '2024-10-04 14:57:00'),
(4, 7, 1, 'aaaaa', '2024-10-04 15:54:19'),
(5, 7, 1, 'ああああ', '2024-10-04 16:46:39'),
(6, 7, 1, 'ああああ', '2024-10-04 16:46:43'),
(7, 7, 1, 'qaaa', '2024-10-04 23:42:39'),
(8, 10, 1, '参加希望', '2024-10-05 00:01:59'),
(9, 10, 1, 'aaa', '2024-10-05 00:20:10'),
(10, 10, 1, 'ああああ', '2024-10-05 01:21:55'),
(11, 10, 1, 'aaaa', '2024-10-05 04:01:54'),
(12, 7, 1, 'よろしくおねがいしますね\r\n', '2024-10-05 04:50:15'),
(13, 13, 1, '日程次第で参加したいです！', '2024-10-05 05:18:17'),
(14, 13, 1, '一人参加でも問題ないでしょうか？よければ参加希望です。', '2024-10-05 05:18:50'),
(15, 14, 1, '10月5日（日）18:00〜参加希望です。', '2024-10-05 05:20:52'),
(16, 14, 1, 'リモートなら気軽に参加できそうですね！今回はタイミングが合わないので、また次回参加します。', '2024-10-05 05:21:07'),
(17, 14, 1, '何時から参加可能でしょうか？', '2024-10-05 05:21:17'),
(18, 15, 1, '朝ヨガいいですね！ぜひ参加したいです！', '2024-10-05 05:22:28'),
(19, 15, 1, '公園でのヨガ、気持ちよさそう…', '2024-10-05 05:22:39'),
(20, 15, 1, '初心者でも大丈夫ですか？興味あります。', '2024-10-05 05:22:51'),
(21, 16, 1, '添削してほしいです、よろしくお願いします。', '2024-10-05 05:24:08'),
(22, 16, 1, '作成中なので、アドバイスをもらいたいです！', '2024-10-05 05:24:13'),
(23, 16, 1, '初めての就活で不安です。', '2024-10-05 05:24:23'),
(24, 17, 1, '横浜なら参加できます！', '2024-10-05 05:27:00'),
(25, 17, 1, 'お酒好きなので、参加したいですが、2時間くらいの参加でも問題ないでしょうか。', '2024-10-05 05:27:18'),
(26, 17, 1, '仕事帰りに行けそうであれば、参加希望です！', '2024-10-05 05:27:34');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `bs_comments`
--
ALTER TABLE `bs_comments`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `bs_comments`
--
ALTER TABLE `bs_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
