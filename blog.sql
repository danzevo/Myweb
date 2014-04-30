-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2014 at 08:22 PM
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
  `ISI` text NOT NULL,
  `ID_USER` int(11) NOT NULL,
  PRIMARY KEY (`ID_ARTIKEL`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`ID_ARTIKEL`, `JUDUL`, `ISI`, `ID_USER`) VALUES
(2, 'test', 'tes dan', 5),
(3, 'test', 'test', 22),
(4, 'test', 'test', 1);

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
  `AKTIF` int(11) NOT NULL,
  `NUM_LOGIN` int(11) NOT NULL,
  `NUM_TAMBAH_ART` int(11) NOT NULL,
  `NUM_EDIT_ART` int(11) NOT NULL,
  `LEVEL_USER` int(11) NOT NULL,
  `kode` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `NAMA`, `USERNAME`, `EMAIL`, `PASSWORD`, `ALAMAT`, `KOTA`, `AKTIF`, `NUM_LOGIN`, `NUM_TAMBAH_ART`, `NUM_EDIT_ART`, `LEVEL_USER`, `kode`) VALUES
(1, 'dani', 'admin', 'admin@gmail.com', 'admin', '', '', 1, 0, 0, 0, 1, ''),
(25, 'dani', 'danzevo', 'dani.nugrahadi@gmail.com', 'danzevo', 'jl kircon', 'bandung', 1, 0, 0, 0, 2, 'f73610399828660b4cca02a0f711db1d');
