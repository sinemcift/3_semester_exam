-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1:3306
-- Genereringstid: 11. 12 2019 kl. 00:00:07
-- Serverversion: 5.7.24
-- PHP-version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game-website`
--
CREATE DATABASE IF NOT EXISTS `game-website` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `game-website`;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_name` varchar(255) NOT NULL,
  `login_pasword` varchar(255) NOT NULL,
  `login_tm` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `login_age` int(11) NOT NULL,
  `login_adresse` varchar(255) NOT NULL,
  `login_last_name` varchar(255) NOT NULL,
  `login_email` varchar(255) NOT NULL,
  `login_first_name` varchar(255) NOT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `login`
--

INSERT INTO `login` (`login_id`, `login_name`, `login_pasword`, `login_tm`, `login_age`, `login_adresse`, `login_last_name`, `login_email`, `login_first_name`) VALUES
(93, 'hell', '1f0feb63209862785fec3c147fef550b6a80f03d31309edb72b891355f3da6127f798a9ac82aa592c6f2043b13e3425b56f1763e9688ba34789325eadea43730', '2019-12-10 23:40:09', 2, 'hiujok2', 'sinem', 'sinem@hj.com', 'sinem'),
(92, 'hello3', '172f712b658ea72195d1b14199fcd0982d7f41dbfaffb888772d5c89b3bf1260799c5d8817a190477b5e7a02cf6fd2797dedcdf6baff8672708591c74aa3512e', '2019-12-10 22:12:05', 1, 'hbjnkm', 'abe', 'abe@jf.dk', 'Abe'),
(90, 'hello', '18d79ae539c4a2d90f90f2a722dc5303ad3e6be1ee634ec537531750a0e9a55896cee1c9f8c5cdf7951a252e05309944adf1d813e54cb7e6021731093b5380ca', '2019-12-07 14:11:18', 24, 'hello vej123', 'World', 'hello@hello.dk', 'Hello'),
(91, 'hello1', '1f0feb63209862785fec3c147fef550b6a80f03d31309edb72b891355f3da6127f798a9ac82aa592c6f2043b13e3425b56f1763e9688ba34789325eadea43730', '2019-12-10 14:49:48', 12, 'hejvej3', 'Sinem2', 'sinem@nklrb.dk', 'Sinem');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
