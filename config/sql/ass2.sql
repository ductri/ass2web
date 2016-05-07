-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2016 at 10:48 AM
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
  `noslide` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Info about slide';

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slideid`, `userid`, `topicid`, `title`, `description`, `timeupload`, `filename`, `noslide`) VALUES
(20, 14, 1, 'Radial Basis Function', 'Slide from Subject Machine Learning', '2016-05-07 14:59:24', '8303.pptx', 10);

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
(5, 'Entertainment'),
(7, 'Military'),
(8, 'Others');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` char(20) DEFAULT NULL,
  `password` char(40) DEFAULT NULL,
  `userright` char(10) DEFAULT 'user',
  `avatar` char(255) NOT NULL,
  `firstname` char(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `lastname` char(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` char(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `userright`, `avatar`, `firstname`, `lastname`, `email`) VALUES
(14, 'ductri', 'bb90e17bfa3087d2f920e09cbf1214e8b191c3fe', 'user', 'default.png', 'Nguyen', 'Tri', 'ductricse@gmail.com'),
(15, 'ductuan', '8ec7012ae70b511012d280dba6ae3df3b0ace935', 'user', 'default.png', 'Nguyen', 'Tuan', 'ductuan@gmail.com'),
(16, 'quangpham', '409ac02bd065f4bb96f5b9afdc7b3f5e8950b2ae', 'user', 'default.png', 'Pham', 'Quang', 'quangpham@gmail.com'),
(17, 'keophuong', 'bd88e0b64d178fe63a0e538f9b31243215b7e8c0', 'user', 'default.png', 'Keo', 'Phuong', 'keophuong@gmail.com'),
(19, 'admin', 'd4e8e6deaa7b1f8381e09e3e6b83e36f0b681c5c', 'admin', 'default.png', 'Naruto', 'Kun', 'admin@gmail.com');

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
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ct1` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `slideid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topicid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_slide` FOREIGN KEY (`slideid`) REFERENCES `slide` (`slideid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `slide`
--
ALTER TABLE `slide`
  ADD CONSTRAINT `FK_slide_topic` FOREIGN KEY (`topicid`) REFERENCES `topic` (`topicid`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `FK_slide_user` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
