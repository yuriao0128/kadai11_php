-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2024 年 10 月 05 日 07:45
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
-- テーブルの構造 `bs_posts`
--

CREATE TABLE `bs_posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `bs_posts`
--

INSERT INTO `bs_posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
(13, 1, '【ゆるぼ】年内にプチオフ会＠都内', '今年中に都内で、少人数のオフ会を開催します♪\r\n\r\n参加者同士で気軽に話せる場を作りたいと思っています。\r\nテーマは特に決めておらず、初めましての方も大歓迎！\r\nお茶やコーヒーを飲みながら、趣味や近況についてゆったりお話ししませんか？\r\n\r\n日程は週末を予定しており、\r\n参加可能な方はぜひコメントください。\r\nお待ちしています！', '2024-10-05 05:17:19'),
(14, 1, '【キャリア相談】年明けに壁打ち相談会＠リモート', '10月5日（日）にリモートでキャリア壁打ち相談会を開催します！\r\nキャリアに関する悩みや、転職・キャリアチェンジを考えている方、\r\nぜひ一度お話してみませんか？\r\n\r\n壁打ちの相手として、\r\n経験豊富なメンバーが相談に乗ります。\r\nリモート開催なので、場所を問わず全国どこからでも参加OKです！\r\n自分のキャリアを一度見直したいという方、ぜひ参加お待ちしています。\r\n参加は無料で、事前の申込も不要です。\r\n\r\nよろしくお願いします。', '2024-10-05 05:20:23'),
(15, 1, '【朝活ヨガ】週末の朝にリフレッシュ♩', '週末の朝、リフレッシュしながら心も体もリセットする朝活ヨガを開催します！\r\n初心者の方も大歓迎、呼吸を整えながらゆったりと体を動かします。\r\n一日の始まりに気持ちよくリラックスできるヨガの時間を一緒に楽しみましょう！\r\n場所は都内の公園（天気が良ければ屋外で実施予定）、もし雨天の場合は屋内で行います。\r\n参加費は無料で、ヨガマットは各自ご持参ください。\r\n朝の清々しい空気の中で、一緒に体を動かしませんか？\r\n皆さんの参加をお待ちしています！', '2024-10-05 05:22:17'),
(16, 1, '【就活応援】エントリーシート添削会＠オンライン', '就活中の皆さん、エントリーシートの内容に不安を感じていませんか？\r\nこの度、オンラインでエントリーシート添削会します。\r\n\r\n書き方のポイントや改善点をフィードバックし、企業に響く内容を目指しましょう。\r\n特に初めての就活や、どこをどう改善すればよいかわからないという方にオススメ。\r\n少人数制でしっかりとアドバイスが受けられます。\r\n\r\nリモート開催なので、自宅から気軽に参加可能です！参加費は無料です。\r\nぜひ自分のエントリーシートを持って参加してみてください。', '2024-10-05 05:23:49'),
(17, 1, '【飲み会＠野毛】初めての人も大歓迎！キャリア相談OK', '横浜で気軽な飲み会を企画しています！\r\nお仕事帰りや週末に、リフレッシュしながらキャリアについて語りましょう。\r\n初めての方も大歓迎、少人数で和やかな雰囲気で進めたいと思っています。\r\n\r\nお酒を飲みながら、仕事や趣味について気軽におしゃべりしましょう。\r\n横浜駅周辺のお店を予定しており、予算は3000〜4000円程度です。\r\n\r\n皆さんの予定が合う日を調整しますので、興味がある方はぜひコメントを！', '2024-10-05 05:26:49');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `bs_posts`
--
ALTER TABLE `bs_posts`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `bs_posts`
--
ALTER TABLE `bs_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
