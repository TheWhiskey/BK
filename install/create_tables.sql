-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Vært: 127.0.0.1
-- Genereringstid: 08. 02 2016 kl. 11:26:51
-- Serverversion: 5.5.44-0ubuntu0.14.04.1
-- PHP-version: 5.5.9-1ubuntu4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `BK`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `beer`
--

CREATE TABLE IF NOT EXISTS `beer` (
  `brewery` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `beer_type` varchar(256),
  `barcode` varchar(32) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user`
--

CREATE TABLE IF NOT EXISTS `user` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `username` VARCHAR(30) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` BINARY(60) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `user_beer`
--

CREATE TABLE IF NOT EXISTS `user_beer` (
  `user_id` int(11) NOT NULL,
  `beer_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`beer_id`),
  KEY `beer_id` (`beer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `user_beer`
--
ALTER TABLE `user_beer`
  ADD CONSTRAINT `user_beer_ibfk_2` FOREIGN KEY (`beer_id`) REFERENCES `beer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_beer_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
