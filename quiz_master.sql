-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 29, 2016 at 02:44 PM
-- Server version: 5.5.38-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `quiz_master`
--

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE IF NOT EXISTS `master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` text NOT NULL,
  `name` text NOT NULL,
  `no_questions` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `available` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`id`, `table_name`, `name`, `no_questions`, `duration`, `available`) VALUES
(5, 'q5', 'Quiz e alam', 20, 7200, 1),
(7, 'q7', 'Dev', 100, 2044, 1),
(8, 'q8', 'Web quiz', 40, 7200, 0),
(12, 'q12', 'elimination', 100, 7200, 1),
(13, 'q13', 'newest', 100, 3600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `q5_main`
--

CREATE TABLE IF NOT EXISTS `q5_main` (
  `no` int(11) DEFAULT NULL,
  `question` text,
  `o1` text,
  `o2` text,
  `o3` text,
  `o4` text,
  `answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q5_main`
--

INSERT INTO `q5_main` (`no`, `question`, `o1`, `o2`, `o3`, `o4`, `answer`) VALUES
(1, 'Question 1', 'opt1', 'opt2', 'opt3', 'opt4', 3),
(2, 'Question 2', 'opt1', 'opt2', 'opt3', 'opt4', 2),
(3, 'Question 3', 'opt1', 'opt2', 'opt3', 'opt4', 1),
(4, 'Question 4', 'opt1', 'opt2', 'opt3', 'opt4', 4),
(1, 'Question 1', 'opt1', 'opt2', 'opt3', 'opt4', 3),
(2, 'Question 2', 'opt1', 'opt2', 'opt3', 'opt4', 2),
(3, 'Question 3', 'opt1', 'opt2', 'opt3', 'opt4', 1),
(4, 'Question 4', 'opt1', 'opt2', 'opt3', 'opt4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `q5_users`
--

CREATE TABLE IF NOT EXISTS `q5_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text,
  `lname` text,
  `username` text,
  `password` text,
  `start_time` int(11) DEFAULT NULL,
  `time_taken` int(11) DEFAULT NULL,
  `finished` int(11) DEFAULT '0',
  `score` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `q5_users`
--

INSERT INTO `q5_users` (`id`, `fname`, `lname`, `username`, `password`, `start_time`, `time_taken`, `finished`, `score`) VALUES
(1, 'h', '1', '1h', 'RE8UeY', 1463119440, 7, 1, 0),
(2, 'a', '3', '3a', 'ChxgdB', NULL, NULL, 0, 0),
(3, 'r', '6', '6r', 'lXkBPL', NULL, NULL, 0, 0),
(4, 'a', '6', '6a', 'zhi93n', 1463238712, 62148, 1, 0),
(5, 'harsh', 'sodiwala', 'sodiwalaharsh', '4TbawM', NULL, NULL, 0, 0),
(6, 'raj', 'naik', 'naikraj', 'qg9Jly', NULL, NULL, 0, 0),
(7, 'kashyap', 'sojitra', 'sojitrakashyap', 'x1FAen', NULL, NULL, 0, 0),
(8, 'harsh', 'sodiwala', 'sodiwalaharsh', 'JwHy7Q', NULL, NULL, 0, 0),
(9, 'raj', 'naik', 'naikraj', 'HdS9yk', 1463139272, 11, 1, 0),
(10, 'kashyap', 'sojitra', 'sojitrakashyap', '5MuFmO', NULL, NULL, 0, 0),
(11, 'harsh', 'sodiwala', 'sodiwalaharsh', 'WWeX7D', NULL, NULL, 0, 0),
(12, 'raj', 'naik', 'naikraj', 'jgDDKp', NULL, NULL, 0, 0),
(13, 'kashyap', 'sojitra', 'sojitrakashyap', '8Kixcp', NULL, NULL, 0, 0),
(14, 'harsh', 'sodiwala', 'sodiwalaharsh', '7Cz2sx', NULL, NULL, 0, 0),
(15, 'raj', 'naik', 'naikraj', 'odigHw', NULL, NULL, 0, 0),
(16, 'kashyap', 'sojitra', 'sojitrakashyap', 'hZJXcg', NULL, NULL, 0, 0),
(17, 'harsh', 'sodiwala', 'sodiwalaharsh', 'PR7KuX', NULL, NULL, 0, 0),
(18, 'raj', 'naik', 'naikraj', 'RRD6ly', NULL, NULL, 0, 0),
(19, 'kashyap', 'sojitra', 'sojitrakashyap', '1OCitk', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `q7_main`
--

CREATE TABLE IF NOT EXISTS `q7_main` (
  `no` int(11) DEFAULT NULL,
  `question` text,
  `o1` text,
  `o2` text,
  `o3` text,
  `o4` text,
  `answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q7_main`
--

INSERT INTO `q7_main` (`no`, `question`, `o1`, `o2`, `o3`, `o4`, `answer`) VALUES
(1, 'Question 1', 'opt1', 'opt2', 'opt3', 'opt4', 3),
(2, 'Question 2', 'opt1', 'opt2', 'opt3', 'opt4', 2),
(3, 'Question 3', 'opt1', 'opt2', 'opt3', 'opt4', 1),
(4, 'Question 4', 'opt1', 'opt2', 'opt3', 'opt4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `q7_users`
--

CREATE TABLE IF NOT EXISTS `q7_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text,
  `lname` text,
  `username` text,
  `password` text,
  `start_time` int(11) DEFAULT NULL,
  `time_taken` int(11) DEFAULT NULL,
  `finished` int(11) DEFAULT '0',
  `score` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `q7_users`
--

INSERT INTO `q7_users` (`id`, `fname`, `lname`, `username`, `password`, `start_time`, `time_taken`, `finished`, `score`) VALUES
(1, 'harsh', 'sodiwala', 'sodiwalaharsh', 'xqcsEf', 1463721837, NULL, 0, 0),
(2, 'raj', 'naik', 'naikraj', 'kTKkQZ', NULL, NULL, 0, 0),
(3, 'kashyap', 'sojitra', 'sojitrakashyap', 'puI84k', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `q8_main`
--

CREATE TABLE IF NOT EXISTS `q8_main` (
  `no` int(11) DEFAULT NULL,
  `question` text,
  `o1` text,
  `o2` text,
  `o3` text,
  `o4` text,
  `answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q8_main`
--

INSERT INTO `q8_main` (`no`, `question`, `o1`, `o2`, `o3`, `o4`, `answer`) VALUES
(1, 'Question 1', 'opt1', 'opt2', 'opt3', 'opt4', 3),
(2, 'Question 2', 'opt1', 'opt2', 'opt3', 'opt4', 2),
(3, 'Question 3', 'opt1', 'opt2', 'opt3', 'opt4', 1),
(4, 'Question 4', 'opt1', 'opt2', 'opt3', 'opt4', 4),
(1, 'Question 1', 'opt1', 'opt2', 'opt3', 'opt4', 3),
(2, 'Question 2', 'opt1', 'opt2', 'opt3', 'opt4', 2),
(3, 'Question 3', 'opt1', 'opt2', 'opt3', 'opt4', 1),
(4, 'Question 4', 'opt1', 'opt2', 'opt3', 'opt4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `q8_users`
--

CREATE TABLE IF NOT EXISTS `q8_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text,
  `lname` text,
  `username` text,
  `password` text,
  `start_time` int(11) DEFAULT NULL,
  `time_taken` int(11) DEFAULT NULL,
  `finished` int(11) DEFAULT '0',
  `score` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `q8_users`
--

INSERT INTO `q8_users` (`id`, `fname`, `lname`, `username`, `password`, `start_time`, `time_taken`, `finished`, `score`) VALUES
(1, 'harsh', 'sodiwala', 'sodiwalaharsh', 'ZONwNW', NULL, NULL, 0, 0),
(2, 'raj', 'naik', 'naikraj', 'oqWjm4', NULL, NULL, 0, 0),
(3, 'kashyap', 'sojitra', 'sojitrakashyap', 'PGKaij', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `q12_main`
--

CREATE TABLE IF NOT EXISTS `q12_main` (
  `no` int(11) DEFAULT NULL,
  `question` text,
  `o1` text,
  `o2` text,
  `o3` text,
  `o4` text,
  `answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q12_main`
--

INSERT INTO `q12_main` (`no`, `question`, `o1`, `o2`, `o3`, `o4`, `answer`) VALUES
(1, 'Question 1', 'opt1', 'opt2', 'opt3', 'opt4', 3),
(2, 'Question 2', 'opt1', 'opt2', 'opt3', 'opt4', 2),
(3, 'Question 3', 'opt1', 'opt2', 'opt3', 'opt4', 1),
(4, 'Question 4', 'opt1', 'opt2', 'opt3', 'opt4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `q12_users`
--

CREATE TABLE IF NOT EXISTS `q12_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text,
  `lname` text,
  `username` text,
  `password` text,
  `start_time` int(11) DEFAULT NULL,
  `time_taken` int(11) DEFAULT NULL,
  `finished` int(11) DEFAULT '0',
  `score` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `q12_users`
--

INSERT INTO `q12_users` (`id`, `fname`, `lname`, `username`, `password`, `start_time`, `time_taken`, `finished`, `score`) VALUES
(1, 'harsh', 'sodiwala', 'sodiwalaharsh', 'Y3g9hn', 1463728688, 33, 1, 3),
(2, 'raj', 'naik', 'naikraj', 'h402aW', NULL, NULL, 0, 0),
(3, 'kashyap', 'sojitra', 'sojitrakashyap', 'tHY8WN', NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `q13_main`
--

CREATE TABLE IF NOT EXISTS `q13_main` (
  `no` int(11) DEFAULT NULL,
  `question` text,
  `o1` text,
  `o2` text,
  `o3` text,
  `o4` text,
  `answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `q13_main`
--

INSERT INTO `q13_main` (`no`, `question`, `o1`, `o2`, `o3`, `o4`, `answer`) VALUES
(1, 'Question 1', 'opt1', 'opt2', 'opt3', 'opt4', 3),
(2, 'Question 2', 'opt1', 'opt2', 'opt3', 'opt4', 2),
(3, 'Question 3', 'opt1', 'opt2', 'opt3', 'opt4', 1),
(4, 'Question 4', 'opt1', 'opt2', 'opt3', 'opt4', 4);

-- --------------------------------------------------------

--
-- Table structure for table `q13_users`
--

CREATE TABLE IF NOT EXISTS `q13_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` text,
  `lname` text,
  `username` text,
  `password` text,
  `start_time` int(11) DEFAULT NULL,
  `time_taken` int(11) DEFAULT NULL,
  `finished` int(11) DEFAULT '0',
  `score` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `q13_users`
--

INSERT INTO `q13_users` (`id`, `fname`, `lname`, `username`, `password`, `start_time`, `time_taken`, `finished`, `score`) VALUES
(1, 'harsh', 'sodiwala', 'sodiwalaharsh', 'harsh', 1463902949, 39616, 1, 0),
(2, 'raj', 'naik', 'naikraj', 'akb9XX', NULL, NULL, 0, 0),
(3, 'kashyap', 'sojitra', 'sojitrakashyap', 'Egn2B5', NULL, NULL, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
