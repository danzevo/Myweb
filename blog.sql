-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
<<<<<<< HEAD
-- Generation Time: May 04, 2014 at 06:32 PM
=======
-- Generation Time: May 03, 2014 at 07:53 PM
>>>>>>> 3efa498c1fa084a285d3a579de3412dec2ce2ed0
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blog`
--
CREATE DATABASE `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `ID_ARTIKEL` int(11) NOT NULL AUTO_INCREMENT,
  `JUDUL` varchar(100) NOT NULL,
  `TGL_ARTIKEL` date NOT NULL,
  `ISI` text NOT NULL,
  `ID_USER` int(11) NOT NULL,
  PRIMARY KEY (`ID_ARTIKEL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`ID_ARTIKEL`, `JUDUL`, `TGL_ARTIKEL`, `ISI`, `ID_USER`) VALUES
(4, 'test', '2014-05-05', 'test', 1),
(7, 'test', '2014-05-08', 'test', 1),
(8, 'test 3', '2014-05-04', 'test 3', 25);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID_USER` int(11) NOT NULL AUTO_INCREMENT,
  `NAMA` varchar(50) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `ALAMAT` text NOT NULL,
  `KOTA` varchar(50) NOT NULL,
  `TANGGAL` date NOT NULL,
  `AKTIF` int(11) NOT NULL,
  `NUM_LOGIN` int(11) NOT NULL,
  `NUM_TAMBAH_ART` int(11) NOT NULL,
  `NUM_EDIT_ART` int(11) NOT NULL,
  `LEVEL_USER` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `IMAGE` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA`, `USERNAME`, `EMAIL`, `PASSWORD`, `ALAMAT`, `KOTA`, `TANGGAL`, `AKTIF`, `NUM_LOGIN`, `NUM_TAMBAH_ART`, `NUM_EDIT_ART`, `LEVEL_USER`, `kode`, `IMAGE`) VALUES
<<<<<<< HEAD
(1, 'dani Nugrahadi', 'admin', 'admin@gmail.com', 'admin', 'jl. Kircon ', 'bandung', '2014-05-01', 1, 7, 3, 6, 1, '', ''),
(25, 'dani', 'danzevo', 'dani.nugrahadi@gmail.com', 'danzevo', 'jl kircon', 'bandung', '2014-05-03', 1, 1, 6, 7, 2, '');
=======
(1, 'dani Nugrahadi', 'admin', 'admin@gmail.com', 'admin', 'jl. Kircon ', 'bandung', '2014-05-01', 1, 2, 2, 2, 1, '', 'application/../asset/upload/03052014-admin.jpg'),
(25, 'dani', 'danzevo', 'dani.nugrahadi@gmail.com', 'danzevo', 'jl kircon', 'bandung', '2014-05-03', 1, 0, 0, 0, 2, 'f73610399828660b4cca02a0f711db1d', 'application/../asset/upload/03052014-danzevo.jpg');
>>>>>>> 3efa498c1fa084a285d3a579de3412dec2ce2ed0
