# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.17)
# Database: quiz_master
# Generation Time: 2017-06-27 04:40:24 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table master
# ------------------------------------------------------------

DROP TABLE IF EXISTS `master`;

CREATE TABLE `master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` text NOT NULL,
  `name` text NOT NULL,
  `no_questions` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `available` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `master` WRITE;
/*!40000 ALTER TABLE `master` DISABLE KEYS */;

INSERT INTO `master` (`id`, `table_name`, `name`, `no_questions`, `duration`, `available`)
VALUES
	(5,'q5','Quiz e alam',20,7200,1),
	(7,'q7','Dev',100,204400000,1),
	(8,'q8','Web quiz',40,7200,0),
	(12,'q12','elimination',100,7200,1),
	(13,'q13','newest',100,3600,1);

/*!40000 ALTER TABLE `master` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table q12_answers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q12_answers`;

CREATE TABLE `q12_answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `q4` text,
  `a4` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `q12_answers` WRITE;
/*!40000 ALTER TABLE `q12_answers` DISABLE KEYS */;

INSERT INTO `q12_answers` (`id`, `q4`, `a4`)
VALUES
	(1,'Question 4',''),
	(2,NULL,NULL),
	(3,NULL,NULL);

/*!40000 ALTER TABLE `q12_answers` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table q12_main
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q12_main`;

CREATE TABLE `q12_main` (
  `no` int(11) DEFAULT NULL,
  `question` text,
  `o1` text,
  `o2` text,
  `o3` text,
  `o4` text,
  `answer` int(11) DEFAULT NULL,
  `tag` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `q12_main` WRITE;
/*!40000 ALTER TABLE `q12_main` DISABLE KEYS */;

INSERT INTO `q12_main` (`no`, `question`, `o1`, `o2`, `o3`, `o4`, `answer`, `tag`)
VALUES
	(1,'Question 1','opt1','opt2','opt3','opt4',3,0),
	(2,'Question 2','opt1','opt2','opt3','opt4',2,0),
	(3,'Question 3','opt1','opt2','opt3','opt4',1,0),
	(4,'Question 4','opt1','opt2','opt3','opt4',4,1);

/*!40000 ALTER TABLE `q12_main` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table q12_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q12_users`;

CREATE TABLE `q12_users` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `q12_users` WRITE;
/*!40000 ALTER TABLE `q12_users` DISABLE KEYS */;

INSERT INTO `q12_users` (`id`, `fname`, `lname`, `username`, `password`, `start_time`, `time_taken`, `finished`, `score`)
VALUES
	(1,'harsh','sodiwala','abcd','abcd',1498483870,0,0,5),
	(2,'raj','naik','naikraj','h402aW',NULL,NULL,0,0),
	(3,'kashyap','sojitra','sojitrakashyap','tHY8WN',NULL,NULL,0,0);

/*!40000 ALTER TABLE `q12_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table q13_answers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q13_answers`;

CREATE TABLE `q13_answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table q13_main
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q13_main`;

CREATE TABLE `q13_main` (
  `no` int(11) DEFAULT NULL,
  `question` text,
  `o1` text,
  `o2` text,
  `o3` text,
  `o4` text,
  `answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `q13_main` WRITE;
/*!40000 ALTER TABLE `q13_main` DISABLE KEYS */;

INSERT INTO `q13_main` (`no`, `question`, `o1`, `o2`, `o3`, `o4`, `answer`)
VALUES
	(1,'Question 1','opt1','opt2','opt3','opt4',3),
	(2,'Question 2','opt1','opt2','opt3','opt4',2),
	(3,'Question 3','opt1','opt2','opt3','opt4',1),
	(4,'Question 4','opt1','opt2','opt3','opt4',4);

/*!40000 ALTER TABLE `q13_main` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table q13_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q13_users`;

CREATE TABLE `q13_users` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `q13_users` WRITE;
/*!40000 ALTER TABLE `q13_users` DISABLE KEYS */;

INSERT INTO `q13_users` (`id`, `fname`, `lname`, `username`, `password`, `start_time`, `time_taken`, `finished`, `score`)
VALUES
	(1,'harsh','sodiwala','sodiwalaharsh','harsh',1463902949,39616,1,0),
	(2,'raj','naik','naikraj','akb9XX',NULL,NULL,0,0),
	(3,'kashyap','sojitra','sojitrakashyap','Egn2B5',NULL,NULL,0,0);

/*!40000 ALTER TABLE `q13_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table q5_answers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q5_answers`;

CREATE TABLE `q5_answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table q5_main
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q5_main`;

CREATE TABLE `q5_main` (
  `no` int(11) DEFAULT NULL,
  `question` text,
  `o1` text,
  `o2` text,
  `o3` text,
  `o4` text,
  `answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `q5_main` WRITE;
/*!40000 ALTER TABLE `q5_main` DISABLE KEYS */;

INSERT INTO `q5_main` (`no`, `question`, `o1`, `o2`, `o3`, `o4`, `answer`)
VALUES
	(1,'Question 1','opt1','opt2','opt3','opt4',3),
	(2,'Question 2','opt1','opt2','opt3','opt4',2),
	(3,'Question 3','opt1','opt2','opt3','opt4',1),
	(4,'Question 4','opt1','opt2','opt3','opt4',4),
	(1,'Question 1','opt1','opt2','opt3','opt4',3),
	(2,'Question 2','opt1','opt2','opt3','opt4',2),
	(3,'Question 3','opt1','opt2','opt3','opt4',1),
	(4,'Question 4','opt1','opt2','opt3','opt4',4);

/*!40000 ALTER TABLE `q5_main` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table q5_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q5_users`;

CREATE TABLE `q5_users` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `q5_users` WRITE;
/*!40000 ALTER TABLE `q5_users` DISABLE KEYS */;

INSERT INTO `q5_users` (`id`, `fname`, `lname`, `username`, `password`, `start_time`, `time_taken`, `finished`, `score`)
VALUES
	(1,'h','1','abcd','abcd',1463119440,NULL,0,0),
	(2,'a','3','3a','ChxgdB',NULL,NULL,0,0),
	(3,'r','6','6r','lXkBPL',NULL,NULL,0,0),
	(4,'a','6','6a','zhi93n',1463238712,62148,1,0),
	(5,'harsh','sodiwala','sodiwalaharsh','4TbawM',NULL,NULL,0,0),
	(6,'raj','naik','naikraj','qg9Jly',NULL,NULL,0,0),
	(7,'kashyap','sojitra','sojitrakashyap','x1FAen',NULL,NULL,0,0),
	(8,'harsh','sodiwala','sodiwalaharsh','JwHy7Q',NULL,NULL,0,0),
	(9,'raj','naik','naikraj','HdS9yk',1463139272,11,1,0),
	(10,'kashyap','sojitra','sojitrakashyap','5MuFmO',NULL,NULL,0,0),
	(11,'harsh','sodiwala','sodiwalaharsh','WWeX7D',NULL,NULL,0,0),
	(12,'raj','naik','naikraj','jgDDKp',NULL,NULL,0,0),
	(13,'kashyap','sojitra','sojitrakashyap','8Kixcp',NULL,NULL,0,0),
	(14,'harsh','sodiwala','sodiwalaharsh','7Cz2sx',NULL,NULL,0,0),
	(15,'raj','naik','naikraj','odigHw',NULL,NULL,0,0),
	(16,'kashyap','sojitra','sojitrakashyap','hZJXcg',NULL,NULL,0,0),
	(17,'harsh','sodiwala','sodiwalaharsh','PR7KuX',NULL,NULL,0,0),
	(18,'raj','naik','naikraj','RRD6ly',NULL,NULL,0,0),
	(19,'kashyap','sojitra','sojitrakashyap','1OCitk',NULL,NULL,0,0);

/*!40000 ALTER TABLE `q5_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table q7_answers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q7_answers`;

CREATE TABLE `q7_answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table q7_main
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q7_main`;

CREATE TABLE `q7_main` (
  `no` int(11) DEFAULT NULL,
  `question` text,
  `o1` text,
  `o2` text,
  `o3` text,
  `o4` text,
  `answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `q7_main` WRITE;
/*!40000 ALTER TABLE `q7_main` DISABLE KEYS */;

INSERT INTO `q7_main` (`no`, `question`, `o1`, `o2`, `o3`, `o4`, `answer`)
VALUES
	(1,'Question 1','opt1','opt2','opt3','opt4',3),
	(2,'Question 2','opt1','opt2','opt3','opt4',2),
	(3,'Question 3','opt1','opt2','opt3','opt4',1),
	(4,'Question 4','opt1','opt2','opt3','opt4',4);

/*!40000 ALTER TABLE `q7_main` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table q7_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q7_users`;

CREATE TABLE `q7_users` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `q7_users` WRITE;
/*!40000 ALTER TABLE `q7_users` DISABLE KEYS */;

INSERT INTO `q7_users` (`id`, `fname`, `lname`, `username`, `password`, `start_time`, `time_taken`, `finished`, `score`)
VALUES
	(1,'harsh','sodiwala','abcd','abcd',1496379008,NULL,NULL,0),
	(2,'raj','naik','bhargav','bhargav',1494659513,NULL,0,0),
	(3,'kashyap','sojitra','sojitrakashyap','puI84k',NULL,NULL,0,0);

/*!40000 ALTER TABLE `q7_users` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table q8_answers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q8_answers`;

CREATE TABLE `q8_answers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table q8_main
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q8_main`;

CREATE TABLE `q8_main` (
  `no` int(11) DEFAULT NULL,
  `question` text,
  `o1` text,
  `o2` text,
  `o3` text,
  `o4` text,
  `answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `q8_main` WRITE;
/*!40000 ALTER TABLE `q8_main` DISABLE KEYS */;

INSERT INTO `q8_main` (`no`, `question`, `o1`, `o2`, `o3`, `o4`, `answer`)
VALUES
	(1,'Question 1','opt1','opt2','opt3','opt4',3),
	(2,'Question 2','opt1','opt2','opt3','opt4',2),
	(3,'Question 3','opt1','opt2','opt3','opt4',1),
	(4,'Question 4','opt1','opt2','opt3','opt4',4),
	(1,'Question 1','opt1','opt2','opt3','opt4',3),
	(2,'Question 2','opt1','opt2','opt3','opt4',2),
	(3,'Question 3','opt1','opt2','opt3','opt4',1),
	(4,'Question 4','opt1','opt2','opt3','opt4',4);

/*!40000 ALTER TABLE `q8_main` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table q8_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `q8_users`;

CREATE TABLE `q8_users` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `q8_users` WRITE;
/*!40000 ALTER TABLE `q8_users` DISABLE KEYS */;

INSERT INTO `q8_users` (`id`, `fname`, `lname`, `username`, `password`, `start_time`, `time_taken`, `finished`, `score`)
VALUES
	(1,'harsh','sodiwala','sodiwalaharsh','ZONwNW',NULL,NULL,0,0),
	(2,'raj','naik','naikraj','oqWjm4',NULL,NULL,0,0),
	(3,'kashyap','sojitra','sojitrakashyap','PGKaij',NULL,NULL,0,0);

/*!40000 ALTER TABLE `q8_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
