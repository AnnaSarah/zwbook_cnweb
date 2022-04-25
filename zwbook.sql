-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 07:21 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zwbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ID_Account` int(6) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID_Account`, `Username`, `Password`) VALUES
(1, 'root', 'root'),
(4, 'user1', 'user1'),
(5, 'user2', 'user2');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `ID_Book` int(6) NOT NULL,
  `ID_Category` varchar(8) NOT NULL,
  `Name_Book` varchar(255) NOT NULL,
  `Cost` float NOT NULL,
  `Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`ID_Book`, `ID_Category`, `Name_Book`, `Cost`, `Link`) VALUES
(1, 'C1', 'Thám tử lừng danh Conan - Tập 97 ', 19500, 'img/tham-tu-lung-danh-conan-T97.jpg'),
(2, 'C1', 'Thám tử lừng danh Conan - Tập 98', 19500, 'img/tham-tu-lung-danh-conan-T98.jpg'),
(5, 'C1', 'Thám tử lừng danh Conan - Tập 99', 19500, 'img/tham-tu-lung-danh-conan-T99.jpg'),
(6, 'C1', 'Thám tử lừng danh Conan - Tập 100', 15000, 'img/tham-tu-lung-danh-conan-T100.jpg'),
(10, 'T2', 'Sách Tiếng Anh lớp 10 - Tập 1', 34500, 'img/sach-giao-khoa-tieng-anh-10T1.jpg'),
(12, 'L3', 'Vợ nhặt - Kim Lân', 28000, 'img/vonhat-kimlan.jpg'),
(13, 'L3', 'Tắt đèn - Ngô Tất Tố', 35000, 'img/tatden-ngotatto.jpg'),
(14, 'L3', 'Hoàng Tử Bé', 60000, 'img/hoangtube.png'),
(15, 'E4', 'Tinh hoa kinh tế học - Essentials of economics', 319000, 'img/tinh-hoa-kinh-te-hoc.jpg'),
(16, 'E4', 'Phương pháp Wyckoff hiện đại', 222000, 'img/phuong-phap-wyckoff.jpg'),
(17, 'E01', 'Thanh Tuyen', 19000, 'img/Doremon1.png'),
(18, 'T2', 'Sách giáo khoa tiếng Anh lớp 10 - Tập 2', 395000, 'img/sach-giao-khoa-tieng-anh-10T2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `ID_Account` int(6) NOT NULL,
  `ID_Book` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`ID_Account`, `ID_Book`) VALUES
(4, 1),
(4, 16);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id_category` varchar(8) NOT NULL,
  `name_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
('C1', 'Truyện tranh '),
('E01', 'Công  nghệ'),
('E4', 'Kinh tế'),
('L3', 'Văn học'),
('T2', 'Sách giáo khoa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID_Account`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`ID_Book`),
  ADD KEY `book_ibfk_1` (`ID_Category`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `fk` (`ID_Account`),
  ADD KEY `fk_idBook` (`ID_Book`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ID_Account` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `ID_Book` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_category ` FOREIGN KEY (`ID_Category`) REFERENCES `category` (`id_category`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk` FOREIGN KEY (`ID_Account`) REFERENCES `account` (`ID_Account`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_idBook` FOREIGN KEY (`ID_Book`) REFERENCES `book` (`ID_Book`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
