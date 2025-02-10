-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 10, 2025 at 08:44 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_book`
--

CREATE TABLE `tb_book` (
  `b_id` varchar(6) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รหัสหนังสือ',
  `b_name` varchar(60) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อหนังสือ',
  `b_writer` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ชื่อผู้แต่ง',
  `b_category` int NOT NULL COMMENT 'หมวดหมู่',
  `b_price` double DEFAULT NULL COMMENT 'ราคา'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_book`
--

INSERT INTO `tb_book` (`b_id`, `b_name`, `b_writer`, `b_category`, `b_price`) VALUES
('B00001', 'คู่มือการสอบรับราชการ', 'สมศักดิ์ ตั้งใจ', 1, 299),
('B00002', 'แฮร์รี่ พอตเตอร์', 'J.K. Rowling', 2, 359),
('B00003', 'เย็บ ปัก ถักร้อย', ' สะอาด อิ่มสุข', 3, 249),
('B00004', 'เจ้าชายน้อย', 'อ็องตวน เดอ แซ็ง', 2, 355),
('B00005', 'การเขียนโปรแกรมคอมพิวเตอร์', ' กิ่งแก้ว กลิ่นหอม', 1, 329);

-- --------------------------------------------------------

--
-- Table structure for table `tb_borrow_book`
--

CREATE TABLE `tb_borrow_book` (
  `br_id` int NOT NULL,
  `br_date_br` date NOT NULL COMMENT 'วันที่ยืมหนังสือ',
  `br_date_rt` date DEFAULT NULL COMMENT 'วันที่คืนหนังสือ',
  `b_id` varchar(6) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'รหัสหนังสือ',
  `m_user` varchar(40) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อผู้ใช้',
  `br_fine` int NOT NULL COMMENT 'ค่าปรับ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `m_user` varchar(40) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อผู้ใช้',
  `m_name` varchar(20) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'รหัสผ่าน',
  `m_pass` varchar(50) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'ชื่อ-สกุล',
  `m_phone` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'เบอร์โทรศัพท์'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`m_user`, `m_name`, `m_pass`, `m_phone`) VALUES
('member01', 'สมหญิง จริงใจ', 'abc1111', '0811111111'),
('member02', 'สมชาย มั่นคง', 'abc2222', '0822222222'),
('member03', 'สมเกียรติ เก่งกล้า', 'abc3333', '0833333333'),
('member04', 'สมสมร อิ่มเอม', 'abc4444', '0844444444'),
('member05', 'สมรักษ์ สะอาด', 'abc5555', '0855555555');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_book`
--
ALTER TABLE `tb_book`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tb_borrow_book`
--
ALTER TABLE `tb_borrow_book`
  ADD PRIMARY KEY (`br_id`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`m_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_borrow_book`
--
ALTER TABLE `tb_borrow_book`
  MODIFY `br_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
