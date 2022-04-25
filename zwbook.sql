-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 06:42 PM
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
-- Database: `zw`
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
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `idbanner` int(6) NOT NULL,
  `file` varchar(100) NOT NULL,
  `idbook` int(6) NOT NULL,
  `active` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`idbanner`, `file`, `idbook`, `active`) VALUES
(1, 'img/banner2.jpg', 12, 1),
(2, 'img/banner3.jpg', 1, 1),
(3, 'img/banner4.jpg', 2, 1),
(4, 'img/banner1.jpg', 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(6) NOT NULL,
  `id_account` int(6) DEFAULT NULL,
  `ten_kh` varchar(50) DEFAULT NULL,
  `sdt` int(11) DEFAULT NULL,
  `diachi` varchar(255) DEFAULT NULL,
  `giatien` int(11) DEFAULT NULL,
  `ngay` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id_bill`, `id_account`, `ten_kh`, `sdt`, `diachi`, `giatien`, `ngay`) VALUES
(1, 4, 'Nguyen Van A', 12345678, '201 Lý Tự Trọng, Ninh Kiều, TPCT', 34000, '2022-04-18'),
(2, 4, 'Sagaツ', 788987146, '201 Lý Tự Trọng, Ninh Kiều, TPCT', 261000, '2022-04-25');

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
(4, 1);

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
('E4', 'Kinh tế'),
('L3', 'Văn học'),
('T2', 'Sách giáo khoa');

-- --------------------------------------------------------

--
-- Table structure for table `infomation`
--

CREATE TABLE `infomation` (
  `id` int(4) NOT NULL,
  `Name` varchar(95) NOT NULL,
  `Address` varchar(355) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `id_account` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `infomation`
--

INSERT INTO `infomation` (`id`, `Name`, `Address`, `Phone`, `id_account`) VALUES
(1, 'Đặng Thu Thảo', 'Long An, Long Hồ, Vĩnh Long', '0365997401', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID_Account`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`idbanner`),
  ADD KEY `bbk` (`idbook`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `Idaccount_bill` (`id_account`);

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
-- Indexes for table `infomation`
--
ALTER TABLE `infomation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infor_acc` (`id_account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ID_Account` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `idbanner` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `ID_Book` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `infomation`
--
ALTER TABLE `infomation`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `bbk` FOREIGN KEY (`idbook`) REFERENCES `book` (`ID_Book`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `Idaccount_bill` FOREIGN KEY (`id_account`) REFERENCES `account` (`ID_Account`);

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

--
-- Constraints for table `infomation`
--
ALTER TABLE `infomation`
  ADD CONSTRAINT `infor_acc` FOREIGN KEY (`id_account`) REFERENCES `account` (`ID_Account`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
