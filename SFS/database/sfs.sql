-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 13, 2017 at 07:29 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sfs`
--

-- --------------------------------------------------------

--
-- Table structure for table `cm_feed`
--

CREATE TABLE IF NOT EXISTS `cm_feed` (
  `u_id` int(4) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` varchar(5000) DEFAULT NULL,
  `year` varchar(10) NOT NULL,
  `42` int(1) NOT NULL,
  `43` int(1) NOT NULL,
  `44` int(1) NOT NULL,
  `45` int(1) NOT NULL,
  `46` int(1) NOT NULL,
  `47` int(1) NOT NULL,
  `48` int(1) NOT NULL,
  `49` int(1) NOT NULL,
  `50` int(1) NOT NULL,
  `51` int(1) NOT NULL,
  `52` int(1) NOT NULL,
  `53` int(1) NOT NULL,
  `54` int(1) NOT NULL,
  `55` int(1) NOT NULL,
  `56` int(1) NOT NULL,
  `57` int(1) NOT NULL,
  `58` int(1) NOT NULL,
  `59` int(1) NOT NULL,
  `60` int(1) NOT NULL,
  `61` int(1) NOT NULL,
  `62` int(1) NOT NULL,
  `63` int(1) NOT NULL,
  `64` int(1) NOT NULL,
  `65` int(1) NOT NULL,
  `66` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cm_feed`
--

INSERT INTO `cm_feed` (`u_id`, `subject`, `message`, `year`, `42`, `43`, `44`, `45`, `46`, `47`, `48`, `49`, `50`, `51`, `52`, `53`, `54`, `55`, `56`, `57`, `58`, `59`, `60`, `61`, `62`, `63`, `64`, `65`, `66`) VALUES
(2078, 'cs-412', '', 'FY', 0, 0, 0, 0, 5, 3, 1, 2, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2078, 'cs-413', '', 'FY', 0, 0, 0, 0, 5, 4, 1, 3, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2078, 'MC-411', '', 'FY', 0, 0, 0, 0, 3, 2, 2, 3, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2078, 'CY-411', '', 'FY', 0, 0, 0, 0, 1, 4, 2, 3, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2078, 'AM-411', '', 'FY', 0, 0, 0, 0, 3, 2, 4, 3, 2, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2078, 'ghhhhh', '', 'FY', 0, 0, 0, 0, 1, 4, 4, 4, 3, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cm_subject`
--

CREATE TABLE IF NOT EXISTS `cm_subject` (
  `s_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `year` varchar(20) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `cm_subject`
--

INSERT INTO `cm_subject` (`s_id`, `name`, `year`) VALUES
(17, 'cs-412', 'FY'),
(18, 'cs-413', 'FY'),
(19, 'MC-411', 'FY'),
(20, 'CY-411', 'FY'),
(21, 'AM-411', 'FY'),
(22, 'sdd', 'FY');

-- --------------------------------------------------------

--
-- Table structure for table `cv_feed`
--

CREATE TABLE IF NOT EXISTS `cv_feed` (
  `u_id` int(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `year` varchar(1000) NOT NULL,
  `44` int(10) NOT NULL,
  `45` int(10) NOT NULL,
  `46` int(10) NOT NULL,
  `47` int(10) NOT NULL,
  `48` int(10) NOT NULL,
  `49` int(10) NOT NULL,
  `50` int(10) NOT NULL,
  `51` int(10) NOT NULL,
  `52` int(10) NOT NULL,
  `53` int(10) NOT NULL,
  `54` int(10) NOT NULL,
  `55` int(10) NOT NULL,
  `56` int(10) NOT NULL,
  `57` int(10) NOT NULL,
  `58` int(10) NOT NULL,
  `59` int(10) NOT NULL,
  `60` int(10) NOT NULL,
  `61` int(10) NOT NULL,
  `62` int(10) NOT NULL,
  `63` int(10) NOT NULL,
  `64` int(10) NOT NULL,
  `65` int(10) NOT NULL,
  `66` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cv_feed`
--


-- --------------------------------------------------------

--
-- Table structure for table `cv_subject`
--

CREATE TABLE IF NOT EXISTS `cv_subject` (
  `s_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `year` varchar(1000) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cv_subject`
--


-- --------------------------------------------------------

--
-- Table structure for table `c_feed`
--

CREATE TABLE IF NOT EXISTS `c_feed` (
  `u_id` int(100) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `44` int(10) NOT NULL,
  `45` int(10) NOT NULL,
  `46` int(10) NOT NULL,
  `47` int(10) NOT NULL,
  `48` int(10) NOT NULL,
  `49` int(10) NOT NULL,
  `50` int(10) NOT NULL,
  `51` int(10) NOT NULL,
  `52` int(10) NOT NULL,
  `53` int(10) NOT NULL,
  `54` int(10) NOT NULL,
  `55` int(10) NOT NULL,
  `56` int(10) NOT NULL,
  `57` int(10) NOT NULL,
  `58` int(10) NOT NULL,
  `59` int(10) NOT NULL,
  `60` int(10) NOT NULL,
  `61` int(10) NOT NULL,
  `62` int(10) NOT NULL,
  `63` int(10) NOT NULL,
  `64` int(10) NOT NULL,
  `65` int(10) NOT NULL,
  `66` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `c_feed`
--


-- --------------------------------------------------------

--
-- Table structure for table `c_subject`
--

CREATE TABLE IF NOT EXISTS `c_subject` (
  `s_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `year` varchar(1000) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `c_subject`
--


-- --------------------------------------------------------

--
-- Table structure for table `ec_feed`
--

CREATE TABLE IF NOT EXISTS `ec_feed` (
  `u_id` int(100) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `year` varchar(1000) NOT NULL,
  `44` int(10) NOT NULL,
  `45` int(10) NOT NULL,
  `46` int(10) NOT NULL,
  `47` int(10) NOT NULL,
  `48` int(10) NOT NULL,
  `49` int(10) NOT NULL,
  `50` int(10) NOT NULL,
  `51` int(10) NOT NULL,
  `52` int(10) NOT NULL,
  `53` int(10) NOT NULL,
  `54` int(10) NOT NULL,
  `55` int(10) NOT NULL,
  `56` int(10) NOT NULL,
  `57` int(10) NOT NULL,
  `58` int(10) NOT NULL,
  `59` int(10) NOT NULL,
  `60` int(10) NOT NULL,
  `61` int(10) NOT NULL,
  `62` int(10) NOT NULL,
  `63` int(10) NOT NULL,
  `64` int(10) NOT NULL,
  `65` int(10) NOT NULL,
  `66` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ec_feed`
--


-- --------------------------------------------------------

--
-- Table structure for table `ec_subject`
--

CREATE TABLE IF NOT EXISTS `ec_subject` (
  `s_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `year` varchar(1000) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ec_subject`
--


-- --------------------------------------------------------

--
-- Table structure for table `ee_feed`
--

CREATE TABLE IF NOT EXISTS `ee_feed` (
  `u_id` int(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `year` varchar(1000) NOT NULL,
  `44` int(10) NOT NULL,
  `45` int(10) NOT NULL,
  `46` int(10) NOT NULL,
  `47` int(10) NOT NULL,
  `48` int(10) NOT NULL,
  `49` int(10) NOT NULL,
  `50` int(10) NOT NULL,
  `51` int(10) NOT NULL,
  `52` int(10) NOT NULL,
  `53` int(10) NOT NULL,
  `54` int(10) NOT NULL,
  `55` int(10) NOT NULL,
  `56` int(10) NOT NULL,
  `57` int(10) NOT NULL,
  `58` int(10) NOT NULL,
  `59` int(10) NOT NULL,
  `60` int(10) NOT NULL,
  `61` int(10) NOT NULL,
  `62` int(10) NOT NULL,
  `63` int(10) NOT NULL,
  `64` int(10) NOT NULL,
  `65` int(10) NOT NULL,
  `66` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ee_feed`
--


-- --------------------------------------------------------

--
-- Table structure for table `ee_subject`
--

CREATE TABLE IF NOT EXISTS `ee_subject` (
  `s_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `year` varchar(1000) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `ee_subject`
--


-- --------------------------------------------------------

--
-- Table structure for table `if_feed`
--

CREATE TABLE IF NOT EXISTS `if_feed` (
  `u_id` int(4) NOT NULL,
  `subject` varchar(20) NOT NULL,
  `message` varchar(5000) DEFAULT NULL,
  `year` varchar(10) NOT NULL,
  `42` int(1) NOT NULL,
  `43` int(1) NOT NULL,
  `44` int(1) NOT NULL,
  `45` int(1) NOT NULL,
  `46` int(1) NOT NULL,
  `47` int(1) NOT NULL,
  `48` int(1) NOT NULL,
  `49` int(1) NOT NULL,
  `50` int(1) NOT NULL,
  `51` int(1) NOT NULL,
  `52` int(1) NOT NULL,
  `53` int(1) NOT NULL,
  `54` int(1) NOT NULL,
  `55` int(1) NOT NULL,
  `56` int(1) NOT NULL,
  `57` int(1) NOT NULL,
  `58` int(1) NOT NULL,
  `59` int(1) NOT NULL,
  `60` int(1) NOT NULL,
  `61` int(1) NOT NULL,
  `62` int(1) NOT NULL,
  `63` int(1) NOT NULL,
  `64` int(1) NOT NULL,
  `65` int(1) NOT NULL,
  `66` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `if_feed`
--


-- --------------------------------------------------------

--
-- Table structure for table `if_subject`
--

CREATE TABLE IF NOT EXISTS `if_subject` (
  `s_id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `year` varchar(20) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `if_subject`
--

INSERT INTO `if_subject` (`s_id`, `name`, `year`) VALUES
(2, 'Basic Chem', 'FY'),
(3, 'Basic Phy', 'FY'),
(4, 'Math2', 'SY'),
(5, 'DSU', 'SY'),
(6, 'RDBMS', 'SY'),
(7, 'AJP', 'TY'),
(8, 'DCN', 'TY'),
(9, 'OOMD', 'TY'),
(10, 'EDE', 'TY'),
(11, 'MC-521', 'FY'),
(12, 'MC-521', 'FY'),
(13, 'CS-521', 'FY'),
(14, '678888', 'FY'),
(15, 'ME-421', 'FY');

-- --------------------------------------------------------

--
-- Table structure for table `me_feed`
--

CREATE TABLE IF NOT EXISTS `me_feed` (
  `u_id` int(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(100) DEFAULT NULL,
  `year` varchar(1000) NOT NULL,
  `44` int(10) NOT NULL,
  `45` int(10) NOT NULL,
  `46` int(10) NOT NULL,
  `47` int(10) NOT NULL,
  `48` int(10) NOT NULL,
  `49` int(10) NOT NULL,
  `50` int(10) NOT NULL,
  `51` int(10) NOT NULL,
  `52` int(10) NOT NULL,
  `53` int(10) NOT NULL,
  `54` int(10) NOT NULL,
  `55` int(10) NOT NULL,
  `56` int(10) NOT NULL,
  `57` int(10) NOT NULL,
  `58` int(10) NOT NULL,
  `59` int(10) NOT NULL,
  `60` int(10) NOT NULL,
  `61` int(10) NOT NULL,
  `62` int(10) NOT NULL,
  `63` int(10) NOT NULL,
  `64` int(10) NOT NULL,
  `65` int(10) NOT NULL,
  `66` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `me_feed`
--


-- --------------------------------------------------------

--
-- Table structure for table `me_subject`
--

CREATE TABLE IF NOT EXISTS `me_subject` (
  `s_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(1000) NOT NULL,
  `year` varchar(100) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `me_subject`
--

INSERT INTO `me_subject` (`s_id`, `name`, `year`) VALUES
(1, 'ghhh', 'FY');

-- --------------------------------------------------------

--
-- Table structure for table `mh_feed`
--

CREATE TABLE IF NOT EXISTS `mh_feed` (
  `u_id` int(100) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `year` varchar(100) NOT NULL,
  `44` int(10) NOT NULL,
  `45` int(10) NOT NULL,
  `46` int(10) NOT NULL,
  `47` int(10) NOT NULL,
  `48` int(10) NOT NULL,
  `49` int(10) NOT NULL,
  `50` int(10) NOT NULL,
  `51` int(10) NOT NULL,
  `52` int(10) NOT NULL,
  `53` int(10) NOT NULL,
  `54` int(10) NOT NULL,
  `55` int(10) NOT NULL,
  `56` int(10) NOT NULL,
  `57` int(10) NOT NULL,
  `58` int(10) NOT NULL,
  `59` int(10) NOT NULL,
  `60` int(10) NOT NULL,
  `61` int(10) NOT NULL,
  `62` int(10) NOT NULL,
  `63` int(10) NOT NULL,
  `64` int(10) NOT NULL,
  `65` int(10) NOT NULL,
  `66` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mh_feed`
--


-- --------------------------------------------------------

--
-- Table structure for table `mh_subject`
--

CREATE TABLE IF NOT EXISTS `mh_subject` (
  `s_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `year` varchar(1000) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `mh_subject`
--

INSERT INTO `mh_subject` (`s_id`, `name`, `year`) VALUES
(1, 'MC-411', 'FY');

-- --------------------------------------------------------

--
-- Table structure for table `ques`
--

CREATE TABLE IF NOT EXISTS `ques` (
  `q_id` int(2) NOT NULL AUTO_INCREMENT,
  `question` varchar(900) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `ques`
--

INSERT INTO `ques` (`q_id`, `question`) VALUES
(46, 'Come on time and leaves on time'),
(47, 'Practical classes are well planned and provides relevant procedures and gives guidance for the presentation of report'),
(48, 'Teacher makes the basic clear and makes the practical understandable'),
(49, 'Teacher comes well prepared and takes the practical class'),
(50, 'Teacher covers the list of practicals in time');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(4) NOT NULL AUTO_INCREMENT,
  `chk` int(1) NOT NULL,
  `user` varchar(80) NOT NULL,
  `pass` varchar(80) NOT NULL,
  `branch` varchar(10) NOT NULL,
  `post` varchar(10) NOT NULL,
  `year` varchar(10) NOT NULL,
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `user` (`user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2082 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `chk`, `user`, `pass`, `branch`, `post`, `year`) VALUES
(1, 0, 'admin', '202cb962ac59075b964b07152d234b70', '', 'admin', ''),
(2, 0, 'cmhod', '695513d5c4a69e83cfcc0cda7255b374', '', 'cmhod', ''),
(3, 0, 'ifhod', 'eb568688256110f7fdbef8b9d079e58b', '', 'ifhod', ''),
(21, 0, '17', '70efdf2ec9b086079795c442636b55fb', 'IF', 'student', 'FY'),
(25, 0, '21', '3c59dc048e8850243be8079a5c74d079', 'IF', 'student', 'SY'),
(35, 0, '67', '35f4a8d465e6e1edc05f3d8ab658c551', 'CSE', 'cr', 'akash@gami'),
(36, 0, '56', '202cb962ac59075b964b07152d234b70', 'CSE', 'aachal', 'akash@gami'),
(37, 0, '45', '202cb962ac59075b964b07152d234b70', 'CSE', 'student', 'akash@gami'),
(638, 0, 'csehod', '271226cb355bdda491d38bfaf40f675d', '0', 'HOD', '0'),
(645, 0, '780000', '9c3b257ab4ad1fdfd892a35ff9ce3bd5', 'ME', 'student', 'FY'),
(646, 0, '4566666', 'fc3f694c2f797e4ea65364aa67557632', 'ME', 'student', 'FY'),
(649, 0, '890000000', 'ec3ae13487534ca2535166c8b3bbf7ed', 'ME', 'student', 'FY'),
(650, 0, 'yu', '385d04e7683a033fcc6c6654529eb7e9', 'ME', 'student', 'FY'),
(651, 0, 'yui', '4eff0335928a2d0e92f38ea9bb56d72b', 'C', 'student', 'FY'),
(653, 0, 'yuui', '1d5de5e5516cd3d5bd11f9889aa76aa2', 'C', 'student', 'FY'),
(656, 0, '7ddd', '5342b0217537578bbaec1363b88e6d3c', 'ME', 'student', 'FY'),
(657, 0, 'yuuuu78', '2916927abe523ba0692792a3e2302ed0', 'C', 'student', 'FY'),
(659, 0, '6790jk', 'ffebaff904c716810abab4921767c4a3', 'EC', 'student', 'FY'),
(2078, 1, 'gcs1540030', '4db1bfa5db86a924458677ec6d8f9124', 'CM', 'student', 'FY'),
(2079, 0, 'gcs14', 'd975eb5a81a05a205f7714577132aa5a', 'CM', 'student', 'FY'),
(2080, 0, 'gcs1340024', '17bc22afa50f748a0e2455cc76f904d3', 'CM', 'student', 'SY'),
(2081, 0, '1', 'c4ca4238a0b923820dcc509a6f75849b', 'CV', 'student', 'FY');
