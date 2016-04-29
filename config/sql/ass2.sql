-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2016 at 05:58 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ass2`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `slideid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `content` text,
  `time` datetime DEFAULT NULL,
  `commentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`slideid`, `userid`, `content`, `time`, `commentid`) VALUES
(2, 4, 'Nice', '2016-04-14 00:00:00', 1),
(2, 4, 'Nice', '2016-04-14 00:00:00', 2),
(1, 3, 'Duc tri la vo dich', '0000-00-00 00:00:00', 3),
(1, 3, 'Duc tri la vo dich', '0000-00-00 00:00:00', 4),
(1, 3, 'Duc tri la vo dich', '0000-00-00 00:00:00', 5),
(1, 3, 'Duc tri la vo dich', '0000-00-00 00:00:00', 6),
(1, 3, 'Duc tri la vo dich', '0000-00-00 00:00:00', 7),
(1, 3, 'Duc tri la vo dich', '2016-04-19 11:30:23', 8);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `slideid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `topicid` int(11) DEFAULT NULL,
  `title` char(50) NOT NULL,
  `description` text NOT NULL,
  `timeupload` datetime NOT NULL,
  `filename` char(50) NOT NULL,
  `noslide` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Info about slide';

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slideid`, `userid`, `topicid`, `title`, `description`, `timeupload`, `filename`, `noslide`) VALUES
(1, 1, 1, 'Slide 1', 'DES s1', '2016-04-05 00:00:00', 'slide.pptx', 9),
(2, 1, 1, 'Slide 2', 'DES s2', '2016-04-06 00:00:00', 'slide.pptx', 9),
(3, 3, 3, 'Slide 3', 'DES s3', '2016-04-21 00:00:00', 'slide.pptx', 9),
(4, 5, 4, 'Slide 4', 'DES s4', '2016-04-21 00:00:00', 'slide.pptx', 9);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topicid` int(11) NOT NULL,
  `name` char(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topicid`, `name`) VALUES
(1, 'Education'),
(3, 'Science'),
(4, 'Economy'),
(5, 'conghoa'),
(7, 'ductri'),
(8, 'ductri topic');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` char(20) DEFAULT NULL,
  `password` char(20) DEFAULT NULL,
  `userright` char(10) DEFAULT 'user',
  `avatar` char(255) NOT NULL,
  `firstname` char(30) NOT NULL,
  `lastname` char(30) NOT NULL,
  `email` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `userright`, `avatar`, `firstname`, `lastname`, `email`) VALUES
(1, 'ductri', '123456', 'user', 'av1.jpg', '', '', ''),
(3, 'qwerty', '123456', 'user', 'av2.jpg', '', '', ''),
(4, 'aaaaa', '123456', 'user', 'av3.jpg', '', '', ''),
(5, 'admin', '123456', 'admin', 'av4.jpg', '', '', ''),
(6, 'ductriabc', '1234567', 'user', 'ductriabc.png', 'nguyen', 'tri', 'ductricse1@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`),
  ADD KEY `IXFK_comment_slide` (`slideid`),
  ADD KEY `IXFK_comment_user` (`userid`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slideid`),
  ADD KEY `IXFK_slide_topic` (`topicid`),
  ADD KEY `IXFK_slide_user` (`slideid`),
  ADD KEY `IXFK_slide_user_02` (`userid`),
  ADD KEY `IXFK_slide_user_03` (`userid`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topicid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `ct1` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `slideid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topicid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_slide` FOREIGN KEY (`slideid`) REFERENCES `slide` (`slideid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `slide`
--
ALTER TABLE `slide`
  ADD CONSTRAINT `FK_slide_topic` FOREIGN KEY (`topicid`) REFERENCES `topic` (`topicid`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_slide_user` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
