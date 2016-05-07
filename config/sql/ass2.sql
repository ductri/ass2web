-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2016 at 06:09 PM
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
  `content` text CHARACTER SET utf8 COLLATE utf8_bin,
  `time` datetime DEFAULT CURRENT_TIMESTAMP,
  `commentid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`slideid`, `userid`, `content`, `time`, `commentid`) VALUES
(52, 16, 'Sau 4 ngày làm việc, đoàn liên ngành với sự tham gia của 7 bộ đã đưa các số liệu, tài liệu ghi nhận ở Khu Kinh tế Vũng Áng về Hà Nội phân tích, từ đó có kết luận cuối cùng về việc chấp hành quy định bảo vệ môi trường của Formosa.', '2016-05-07 23:08:24', 20),
(51, 19, 'Chiều 7/5, đoàn kiểm tra liên ngành về việc chấp hành quy định bảo vệ môi trường tại công trường Formosa thuộc Khu kinh tế Vũng Áng (thị xã Kỳ Anh, Hà Tĩnh) đã họp phiên cuối cùng để thống nhất kết quả sau 4 ngày làm việc.', '2016-05-07 23:08:35', 21),
(51, 16, 'Sáng cùng ngày lãnh đạo đoàn liên ngành đã đến trụ sở của Formosa để chốt biên bản làm việc. Biên bản cuối cùng phải dịch ra song ngữ để đại diện Formosa xem và ký.', '2016-05-07 23:08:45', 22),
(53, 17, 'Một lãnh đạo Sở Tài nguyên và Môi trường Hà Tĩnh cho VnExpress biết, đoàn liên ngành đã ghi nhận số liệu, tài liệu và mang về Hà Nội để phân tích, hiện chưa có kết quả cuối cùng.', '2016-05-07 23:08:54', 23),
(45, 19, 'Đây là đoàn kiểm tra quy mô nhất, với sự tham dự của nhiều bộ nhất kể từ khi xuất hiện thông tin cá chết. Đoàn gồm đại diện của 7 bộ: Tài nguyên và Môi trường, Nông nghiệp và Phát triển nông thôn, Khoa học và Công nghệ, Xây dựng, Công Thương, Công an, Quốc phòng cùng Viện Hàn lâm Khoa học Công nghệ Việt Nam.', '2016-05-07 23:09:27', 24);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `slideid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `topicid` int(11) DEFAULT NULL,
  `title` char(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `timeupload` datetime NOT NULL,
  `filename` char(50) NOT NULL,
  `noslide` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Info about slide';

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slideid`, `userid`, `topicid`, `title`, `description`, `timeupload`, `filename`, `noslide`) VALUES
(44, 15, 1, 'GiÃ¡o Ã¡n Ä‘iá»‡n tá»­ Slide PowerPoint Ä‘áº¹p', 'GiÃ¡o Ã¡n Ä‘iá»‡n tá»­ Slide PowerPoint Ä‘áº¹p', '2016-05-07 23:04:41', '15932.ppt', 7),
(45, 15, 3, 'Download Slide PowerPoint Äáº¹p Thuyáº¿t trÃ¬nh O', 'Download Slide PowerPoint Äáº¹p Thuyáº¿t trÃ¬nh Office 2003 2010', '2016-05-07 23:05:27', '1973.pptx', 5),
(48, 17, 3, 'Download Máº«u PowerPoint Ä‘áº¹p, chuyÃªn nghiá»‡p', 'Download Máº«u PowerPoint Ä‘áº¹p, chuyÃªn nghiá»‡p lÃ m giÃ¡o Ã¡n, thuyáº¿t trÃ¬nh 2003', '2016-05-07 23:06:16', '27185.ppt', 12),
(51, 19, 1, 'Máº«u PowerPoint Äáº¹p Office 2003', 'Máº«u PowerPoint Äáº¹p Office 2003', '2016-05-07 23:06:53', '14468.ppt', 6),
(52, 19, 1, 'Ná»n PPT PowerPoint Ä‘áº¹p lÃ m thuyáº¿t trÃ¬nh p', 'Ná»n PPT PowerPoint Ä‘áº¹p lÃ m thuyáº¿t trÃ¬nh phÃ¢n tÃ­ch kinh doanh', '2016-05-07 23:07:16', '30829.pptx', 8),
(53, 16, 4, 'Ná»n PowerPoint Äáº¹p lÃ m slide giÃ¡o Ã¡n, thuy', 'Ná»n PowerPoint Äáº¹p lÃ m slide giÃ¡o Ã¡n, thuyáº¿t trÃ¬nh, luáº­n vÄƒn', '2016-05-07 23:07:46', '11426.ppt', 5);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topicid` int(11) NOT NULL,
  `name` char(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL
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
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `slideid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
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
