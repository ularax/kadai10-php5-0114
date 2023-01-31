-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 31 日 11:28
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_bm`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `date` datetime NOT NULL COMMENT '登録日時',
  `update_time` datetime DEFAULT NULL COMMENT '更新日（NULL許容）',
  `pet` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT 'ペットの名前',
  `item` varchar(64) CHARACTER SET utf8 NOT NULL COMMENT '項目',
  `comment` varchar(256) CHARACTER SET utf8 NOT NULL COMMENT 'メモ',
  `img` varchar(256) CHARACTER SET utf8 DEFAULT NULL COMMENT '画像のPATH'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `date`, `update_time`, `pet`, `item`, `comment`, `img`) VALUES
(14, '2023-01-20 22:50:21', NULL, 'LOLA', 'bbb', 'ccc', NULL),
(16, '2023-01-05 12:22:40', NULL, 'ggg', 'ggg', 'ggg', NULL),
(17, '2023-01-05 15:38:15', NULL, 'HHH', 'HHH', 'HHH', NULL),
(19, '2023-01-05 15:59:22', NULL, 'JJJ', 'JJJ', 'JJJ', NULL),
(20, '2023-01-05 15:59:49', NULL, 'SSS', 'SSS', 'SSS', NULL),
(21, '2023-01-05 16:01:14', NULL, 'KKK', 'KKK', 'KKK', NULL),
(24, '2023-01-05 16:36:35', NULL, 'ddd', 'ddd', 'ddd', NULL),
(25, '2023-01-05 16:50:57', NULL, 'BBBzzz', 'BBB', 'BBB', NULL),
(30, '2023-01-12 22:51:05', NULL, 'DDD', 'DDD', 'DDD', NULL),
(31, '2023-01-18 12:36:05', NULL, 'rocco', '病院', 'ダグタリ', NULL),
(32, '2023-01-18 13:07:34', NULL, 'lola', 'food', 'よく食べた', NULL),
(33, '2023-01-18 13:09:08', NULL, 'lola', 'food', 'よく食べた', NULL),
(34, '2023-01-18 13:09:29', NULL, 'LOLA', 'ごはん', '食べた', NULL),
(35, '2023-01-18 13:44:37', NULL, 'ROCCO', 'ごはん', '低分子プロテイン40cc\r\nやきいも２切れ', NULL),
(36, '2023-01-18 14:39:08', NULL, 'ROCCO', 'ごはん', '低分子プロティン40cc\r\nやきいも１切れ', NULL),
(37, '2023-01-18 15:39:44', NULL, 'ROCCO', 'うんち', '少し柔らかめだが正常', NULL),
(44, '2023-01-19 14:17:42', NULL, 'ROCCO', 'ごはん', 'チュール', NULL),
(45, '2023-01-19 17:22:29', NULL, '', '', '10分', NULL),
(46, '2023-01-20 00:06:45', NULL, 'ROCCO', 'ごはん', '低分子プロテイン20cc', NULL),
(47, '2023-01-20 00:15:54', NULL, '', '', 'アトピカ', NULL),
(48, '2023-01-20 00:18:18', NULL, 'LUKE', '病院', 'ダグタリ', NULL),
(49, '2023-01-20 00:21:12', NULL, 'LOLA', 'トリミング', 'フレンズ', NULL),
(50, '2023-01-20 00:57:16', NULL, 'ROCCO', '', '', NULL),
(51, '2023-01-20 01:10:32', NULL, 'ROCCO', '病院', '', NULL),
(52, '2023-01-20 01:18:31', NULL, 'ROCCO', '', '', NULL),
(53, '2023-01-20 01:19:42', NULL, 'ROCCO', '', '', NULL),
(54, '2023-01-20 01:20:59', NULL, '', '', '', NULL),
(55, '2023-01-20 01:24:34', NULL, 'LUKE', '病院', '', NULL),
(56, '2023-01-20 01:35:38', NULL, 'LOLA', '', '', NULL),
(57, '2023-01-20 01:56:59', NULL, 'LULU', '', '', NULL),
(58, '2023-01-20 01:57:39', NULL, 'LULU', '', '', NULL),
(59, '2023-01-20 02:06:37', NULL, 'LULU', '', '', NULL),
(60, '2023-01-20 02:07:14', NULL, '', '', '', NULL),
(61, '2023-01-20 02:16:04', NULL, '', '', '', NULL),
(62, '2023-01-20 12:40:54', NULL, 'LOLA', 'ごはん', 'ココグルメ完食', NULL),
(63, '2023-01-20 12:42:34', NULL, 'LOLA', 'ごはん', 'ココグルメ完食', NULL),
(64, '2023-01-20 14:58:25', NULL, 'LULU', 'その他', 'fff', NULL),
(65, '2023-01-20 14:58:36', NULL, 'LULU', 'その他', 'fff', NULL),
(66, '2023-01-20 15:02:15', NULL, 'LUKE', 'ホテル', 'uuu', NULL),
(67, '2023-01-20 15:02:37', NULL, 'LUKE', 'ホテル', 'uuu', NULL),
(68, '2023-01-20 15:03:03', NULL, 'ROCCO', 'おしっこ', 'ppp', NULL),
(69, '2023-01-20 15:03:32', NULL, '', '', 'ppp', NULL),
(70, '2023-01-20 17:24:55', NULL, 'ROCCO', 'うんち', '正常', '20230120092455_20210516.jpg'),
(71, '2023-01-20 17:29:45', NULL, '', '', 'HALU', '20230120092926_20210516.jpg'),
(72, '2023-01-20 18:58:54', NULL, 'LOLA', 'ごはん', 'xxx', '20230120103611_20210225.jpg'),
(73, '2023-01-20 19:03:38', NULL, 'LOLA', '嘔吐', '2', NULL),
(74, '2023-01-20 19:09:14', NULL, 'LOLA', 'トリミング', 'JASMINE', '20230120110722_20220114.jpg'),
(76, '2023-01-20 19:41:03', NULL, 'LOLA', 'ごはん', 'aaa', '20230120113919_20210516.jpg'),
(77, '2023-01-20 21:29:34', NULL, 'LOLA', 'ごはん', 'aaa', '20230120132934_20210516.jpg'),
(78, '2023-01-20 21:37:04', NULL, 'LOLA', 'くすり', 'bbb', '20230120133704_20210504.jpg'),
(79, '2023-01-20 21:39:06', NULL, 'LOLA', '病院', 'HALU', '20230120133906_20210406.jpg'),
(80, '2023-01-20 21:40:30', NULL, 'ROCCO', 'ホテル', 'DDD', '20230120134030_20210504.jpg'),
(81, '2023-01-20 21:50:08', NULL, 'LOLA', 'ごはん', 'RRRRRR', '20230120135008_20210501.jpg'),
(82, '2023-01-20 22:34:43', NULL, 'LULU', 'おしっこ', 'ddd', '20230120143443_20210501.jpg'),
(83, '2023-01-20 22:52:05', NULL, 'LOLA', 'その他', 'YYY', '20230120145149_20210501.jpg'),
(84, '2023-01-20 23:07:54', NULL, 'LUKE', 'ホテル', 'GGGGGGGGGGGGG', '20230120150754_'),
(85, '2023-01-20 23:09:08', NULL, 'LUKE', 'ホテル', 'GGGGGGGGGGGGG', '20230120150908_20210406.jpg'),
(86, '2023-01-20 23:09:58', NULL, 'LOLA', 'くすり', 'BBBBB', '20230120150958_'),
(87, '2023-01-20 23:19:33', NULL, 'LULU', 'おさんぽ', 'いかない', ''),
(88, '2023-01-21 00:20:00', NULL, 'LOLA', 'くすり', 'EEE', ''),
(89, '2023-01-21 00:38:04', NULL, 'LOLA', 'ごはん', 'RRRRRRRR', '20230120163100_20210516.jpg'),
(90, '2023-01-21 00:38:41', NULL, 'LOLA', 'おしっこ', 'ooo', '20230120163841_20210504.jpg'),
(91, '2023-01-21 01:02:51', NULL, 'LOLA', 'ごはん', 'BBB', ''),
(92, '2023-01-21 01:41:59', NULL, 'LOLA', 'ごはん', 'eee                                                     ', '20230120173644_20210406.jpg'),
(93, '2023-01-21 01:56:23', NULL, 'LOLA', 'ごはん', 'uuuuuuuuu                    ', ''),
(94, '2023-01-21 01:58:53', NULL, 'ROCCO', 'トリミング', 'AAAA', '20230120175853_20210911.jpg'),
(95, '2023-01-21 02:26:09', NULL, 'LOLA', 'ごはん', 'FOOD', ''),
(96, '2023-01-24 15:54:55', NULL, 'LOLA', 'くすり', 'ddd', ''),
(97, '2023-01-24 16:44:08', NULL, 'LOLA', 'ごはん', 'FFF', '');

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, '管理者', 'ularax', 'bookmark', 1, 0),
(2, 'ROCCO', 'rocco', 'rocco', 0, 0),
(3, 'LOLA', 'lola', 'lola', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
