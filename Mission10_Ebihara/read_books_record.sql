-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 2019 年 6 月 13 日 22:22
-- サーバのバージョン： 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `read_books_record`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `books_record`
--

CREATE TABLE `books_record` (
  `record_id` int(12) NOT NULL,
  `title` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `reed_date` date NOT NULL,
  `judge` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
  `impression` text COLLATE utf8_unicode_ci NOT NULL,
  `quotation_01` text COLLATE utf8_unicode_ci NOT NULL,
  `quotation_02` text COLLATE utf8_unicode_ci NOT NULL,
  `quotation_03` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `books_record`
--

INSERT INTO `books_record` (`record_id`, `title`, `author`, `genre`, `reed_date`, `judge`, `impression`, `quotation_01`, `quotation_02`, `quotation_03`, `indate`) VALUES
(17, '海辺のカフカ', '芥川龍之介', '純文学', '2019-06-02', 'とても面白い', '感想のテスト', 'テストのフレーズ', 'テストのフレーズ', 'テストのフレーズ', '2019-06-05 20:41:15');

-- --------------------------------------------------------

--
-- テーブルの構造 `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(12) NOT NULL,
  `user_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `login_id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `login_pass` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `admin_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `user_table`
--

INSERT INTO `user_table` (`user_id`, `user_name`, `login_id`, `login_pass`, `admin_flg`, `life_flg`) VALUES
(1, '海老原', 'testid', 'testpw', 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books_record`
--
ALTER TABLE `books_record`
  ADD PRIMARY KEY (`record_id`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books_record`
--
ALTER TABLE `books_record`
  MODIFY `record_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
