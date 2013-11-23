-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2013 at 04:49 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `portal`
--
CREATE DATABASE `portal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `portal`;

-- --------------------------------------------------------

--
-- Table structure for table `forum_comments`
--

CREATE TABLE IF NOT EXISTS `forum_comments` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `comment` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(50) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `forum_comments`
--

INSERT INTO `forum_comments` (`cid`, `pid`, `comment`, `datetime`, `username`, `deleted`) VALUES
(29, 16, 'Ok i will give it', '2011-07-21 11:47:48', 'sathish', 0),
(30, 17, 'This is a test comment', '2011-07-25 14:21:17', 'sug', 0),
(31, 18, 'This post is good. Sending this test comment from Conference Room', '2011-07-27 12:08:56', 'sug', 0),
(32, 18, 'Yes it is working da.', '2011-07-27 12:10:45', 'ilam', 0),
(33, 18, 'Ok da.', '2011-07-27 12:11:57', 'sathish', 1),
(34, 20, 'ffcnggxd/,.,m', '2011-07-28 07:03:16', 'admin', 0),
(35, 20, 'jhjh', '2011-07-28 07:08:55', 'admin', 1),
(36, 20, 'It is good commenting', '2011-07-28 11:12:26', 'sug', 0),
(37, 20, 'yup', '2011-07-28 11:12:49', 'sug', 0),
(38, 21, 'google', '2011-07-29 12:06:24', 'admin', 0),
(39, 20, 'kdjfksdjf', '2011-08-04 16:20:55', 'sug', 0),
(40, 22, 'dajdjassgduayg', '2011-08-08 23:15:04', 'sug', 0),
(41, 22, 'what the hell ra', '2012-01-02 22:29:52', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `forum_posts`
--

CREATE TABLE IF NOT EXISTS `forum_posts` (
  `pid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(50) NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='Forum Table' AUTO_INCREMENT=23 ;

--
-- Dumping data for table `forum_posts`
--

INSERT INTO `forum_posts` (`pid`, `title`, `body`, `type`, `datetime`, `username`) VALUES
(4, 'JDKJfk', 'ksdjfkjjsdfksjd', '0', '2011-07-19 11:44:41', ''),
(16, 'HCL Form', 'I want the form', 'General', '2011-07-21 11:47:10', 'sathish'),
(17, 'This is a test post', 'This is a test body', 'General', '2011-07-25 14:19:24', 'sug'),
(18, 'This is my first post in HCL Infosystems', 'This post is done for testing purposes using multiple users in the HCL Forum.\r\nPlease comment on my post.\r\nThank you,\r\nIlambharathi', 'General', '2011-07-27 12:04:57', 'ilam'),
(20, 'ghc', 'fhfdgfnd', 'General', '2011-07-28 07:03:06', 'admin'),
(21, 'abc', 'abc', 'FileTransfer,Updates', '2011-07-29 12:06:09', 'admin'),
(22, 'Hey machine 201 not working', 'dhabdjhadjv', 'General', '2011-08-08 23:14:49', 'sug');

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

CREATE TABLE IF NOT EXISTS `notices` (
  `nid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `type` varchar(20) NOT NULL DEFAULT 'General',
  `files` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`nid`, `title`, `body`, `datetime`, `type`, `files`) VALUES
(43, 'Sample', 'This is the first notice under General Category which has been added by admin for testing purposes.', '2011-07-25 09:12:43', 'General', ''),
(42, 'Sample 4', 'This is sample 4 body.\r\nThis is Info Portal of HCL Infosystems', '2011-07-27 11:51:35', 'General', ''),
(12, 'jnkj', 'jnn', '2011-07-12 11:30:04', 'Internal', '114579156.jpg'),
(46, 'abc', 'abc', '2011-07-29 12:05:06', 'FileTransfer', ''),
(47, 'This is a new notice', 'Something', '2011-08-04 16:19:50', 'Internal', ''),
(38, 'Sample 1', 'Sample Body Text with hyperlinks \r\n<a href="www.google.com">Google</a>\r\n\r\n', '2011-07-26 16:03:53', 'General', ''),
(39, 'Sample 2', 'This Notice also has a file uploaded.\r\nThe file is ERF form of HCL Infosystems.', '2011-07-27 11:47:25', 'General', '1311747469_ERF_Form.txt'),
(41, 'Sample 3', 'This is a General Notice showing the timestamp and hyperlinks\r\n<a href="www.hcl.in">HCL</a>\r\n\r\n', '2011-07-27 11:50:19', 'General', ''),
(24, 'JDSKFJSDK', 'KDSFKSJ', '2011-07-14 14:33:03', 'Employee', '1310634207_New_Skoda_Fabia.pdf'),
(49, 'Hello', 'Hello\r\nwhate kdsfl\r\n\r\nkldsjf\r\nasdfasf\r\n', '2012-01-02 22:28:55', 'Internal', '1325523559_instiwebsite_discussions.txt'),
(27, 'problem', 'asdhbsadjhbsackzxc', '2011-07-14 18:12:41', 'Internal', '1310647385_118065887.jpg'),
(32, 'Meeting at design section tomorrow', 'There is to be a meeting....', '2011-07-22 17:52:25', 'Security', ''),
(35, 'jsdkfj', 'ksdjflksdj', '2011-07-25 12:13:17', 'Internal', ''),
(37, 'This is a new notice', 'Notice Body', '2011-07-26 10:12:29', 'Employee', '1311655373_Capture.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(50) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `name` varchar(100) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Users Table';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `pass`, `name`, `department`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin'),
('sug', '1dbc90bdaada4a0613566d32ebb2ca41', 'Suganth Krishna', 'Manufacturing');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
