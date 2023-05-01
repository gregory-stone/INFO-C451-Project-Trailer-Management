-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 07:23 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trailer_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `CompanyId` char(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Street1` varchar(50) DEFAULT NULL,
  `Street2` varchar(50) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `State` char(2) DEFAULT NULL,
  `Zip` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CompanyId`, `Name`, `Street1`, `Street2`, `City`, `State`, `Zip`) VALUES
('1', 'ABC Logistics', '123 Corporate Drive', 'Suite 530', 'Lansing', 'MI', '48901');

-- --------------------------------------------------------

--
-- Table structure for table `dock_door`
--

CREATE TABLE `dock_door` (
  `DoorNo` int(11) NOT NULL,
  `WhGln` char(13) NOT NULL,
  `ShipOrRec` char(1) NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dock_door`
--

INSERT INTO `dock_door` (`DoorNo`, `WhGln`, `ShipOrRec`, `Active`) VALUES
(1, '123456789123', 'S', 1),
(2, '123456789123', 'S', 1),
(3, '123456789123', 'S', 0),
(4, '123456789123', 'S', 1),
(5, '123456789123', 'S', 1),
(6, '123456789123', 'S', 1),
(7, '123456789123', 'S', 1),
(8, '123456789123', 'S', 1),
(9, '123456789123', 'S', 1),
(10, '123456789123', 'S', 1),
(11, '123456789123', 'S', 1),
(12, '123456789123', 'S', 1),
(13, '123456789123', 'S', 1),
(14, '123456789123', 'S', 0),
(15, '123456789123', 'S', 0),
(16, '123456789123', 'S', 1),
(17, '123456789123', 'S', 1),
(18, '123456789123', 'S', 1),
(19, '123456789123', 'S', 1),
(20, '123456789123', 'S', 1),
(21, '123456789123', 'S', 1),
(22, '123456789123', 'S', 1),
(23, '123456789123', 'S', 1),
(24, '123456789123', 'S', 1),
(25, '123456789123', 'S', 1),
(26, '123456789123', 'S', 1),
(27, '123456789123', 'S', 1),
(28, '123456789123', 'S', 1),
(29, '123456789123', 'S', 1),
(30, '123456789123', 'S', 1),
(31, '123456789123', 'S', 0),
(32, '123456789123', 'S', 1),
(33, '123456789123', 'S', 1),
(34, '123456789123', 'S', 1),
(35, '123456789123', 'S', 1),
(36, '123456789123', 'S', 1),
(37, '123456789123', 'S', 1),
(38, '123456789123', 'S', 1),
(39, '123456789123', 'S', 1),
(40, '123456789123', 'S', 1),
(41, '123456789123', 'S', 1),
(42, '123456789123', 'R', 0),
(43, '123456789123', 'R', 0),
(44, '123456789123', 'R', 0),
(45, '123456789123', 'R', 1),
(46, '123456789123', 'R', 1),
(47, '123456789123', 'R', 1),
(48, '123456789123', 'R', 1),
(49, '123456789123', 'R', 1),
(50, '123456789123', 'R', 1),
(51, '123456789123', 'R', 1),
(52, '123456789123', 'R', 0),
(53, '123456789123', 'R', 1),
(54, '123456789123', 'R', 1),
(55, '123456789123', 'R', 1),
(56, '123456789123', 'R', 1),
(57, '123456789123', 'R', 1),
(58, '123456789123', 'R', 1),
(59, '123456789123', 'R', 1),
(60, '123456789123', 'R', 1),
(61, '123456789123', 'R', 1),
(62, '123456789123', 'R', 1),
(63, '123456789123', 'R', 0),
(64, '123456789123', 'R', 1),
(65, '123456789123', 'R', 1),
(66, '123456789123', 'R', 1),
(67, '123456789123', 'R', 1),
(68, '123456789123', 'R', 1),
(69, '123456789123', 'R', 1),
(70, '123456789123', 'R', 1),
(71, '123456789123', 'R', 1),
(72, '123456789123', 'R', 1),
(73, '123456789123', 'R', 1),
(74, '123456789123', 'R', 1),
(75, '123456789123', 'R', 1),
(76, '123456789123', 'R', 1),
(77, '123456789123', 'R', 1),
(78, '123456789123', 'R', 1),
(79, '123456789123', 'R', 1),
(80, '123456789123', 'R', 1),
(81, '123456789123', 'R', 1),
(82, '123456789123', 'R', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmployeeId` char(10) NOT NULL,
  `FName` varchar(20) NOT NULL,
  `LName` varchar(20) NOT NULL,
  `CompanyId` char(10) DEFAULT NULL,
  `WhGln` char(13) DEFAULT NULL,
  `WRole` varchar(30) DEFAULT NULL,
  `Pword` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmployeeId`, `FName`, `LName`, `CompanyId`, `WhGln`, `WRole`, `Pword`) VALUES
('101', 'James', 'McGill', '1', '123456789123', 'Supervisor', '123456'),
('102', 'Michael', 'Bolton', '1', '123456789123', 'Supervisor', '123456'),
('103', 'Peggy', 'Hill', '1', '123456789123', 'Spotter', '123456'),
('104', 'Randy', 'Marsh', '1', '123456789123', 'Operator', '123456'),
('105', 'Harry', 'Henderson', '1', '123456789123', 'Supervisor', '123456'),
('106', 'Johnny', 'Bravo', '1', '123456789123', 'Operator', '123456'),
('107', 'Nancy', 'Botwin', '1', '123456789123', 'Operator', '123456'),
('108', 'Jack', 'Reacher', '1', '123456789123', 'Operator', '123456'),
('109', 'Peter', 'Parker', '1', '123456789123', 'Spotter', '123456'),
('110', 'Sarah', 'Braverman', '1', '123456789123', 'Supervisor', '123456'),
('111', 'Ross', 'Gellar', '1', '123456789123', 'Gatekeeper', '123456'),
('112', 'Barney', 'Stinson', '1', '123456789123', 'Operator', '123456'),
('113', 'Heather', 'Brooks', '1', '123456789123', 'Operator', '123456'),
('114', 'Rod', 'Farva', '1', '123456789123', 'Gatekeeper', '123456'),
('115', 'Tony', 'Soprano', '1', '123456789123', 'Supervisor', '123456'),
('116', 'Jorah', 'Mormont', '1', '123456789123', 'Operator', '123456'),
('117', 'Andy', 'Bernard', '1', '123456789123', 'Spotter', '123456'),
('118', 'Lisa', 'Simpson', '1', '123456789123', 'Operator', '123456'),
('119', 'Yacko', 'Warner', '1', '123456789123', 'Operator', '123456'),
('120', 'Jack', 'Bauer', '1', '123456789123', 'Spotter', '123456'),
('121', 'Archie', 'Bunker', '1', '123456789123', 'Spotter', '123456'),
('122', 'Maxwell', 'Smart', '1', '123456789123', 'Spotter', '123456'),
('123', 'Kate', 'Beckett', '1', '123456789123', 'Supervisor', '123456'),
('124', 'Clair', 'Huxtable', '1', '123456789123', 'Operator', '123456'),
('125', 'Karen', 'Walker', '1', '123456789123', 'Spotter', '123456'),
('126', 'Jenna', 'Maroney', '1', '123456789123', 'Gatekeeper', '123456'),
('127', 'Fred', 'Flintstone', '1', '123456789123', 'Spotter', '123456'),
('admin', 'System', 'Administrator', '1', '123456789123', 'Supervisor', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `load_detail`
--

CREATE TABLE `load_detail` (
  `LoadNo` char(10) NOT NULL,
  `Sku` varchar(20) NOT NULL,
  `Qty` double(15,3) NOT NULL CHECK (`Qty` > 0),
  `ProdWeight` double(15,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `load_detail`
--

INSERT INTO `load_detail` (`LoadNo`, `Sku`, `Qty`, `ProdWeight`) VALUES
('100000001', 'HR11189', 15.000, 12810.000),
('100000002', 'HR11257', 2.000, 1824.000),
('100000002', 'MG58477', 1.000, 684.000),
('100000003', 'PN14586', 24.000, 35808.000),
('100000004', 'PN25843', 8.000, 6416.000),
('100000005', 'HR15264', 8.000, 10120.000),
('100000005', 'MG58477', 7.000, 4788.000),
('100000005', 'PN15948', 4.000, 2740.000),
('100000006', 'MG60201', 16.000, 11712.000),
('100000007', 'PN25843', 25.000, 20050.000),
('100000008', 'HR11189', 9.000, 7686.000),
('100000008', 'MG55746', 12.000, 6660.000),
('100000008', 'PN15948', 5.000, 3425.000),
('100000009', 'MG96351', 13.000, 21554.000),
('100000010', 'MG60201', 10.000, 7320.000),
('100000011', 'PN02514', 9.000, 9990.000),
('100000012', 'MG58477', 2.000, 1368.000);

-- --------------------------------------------------------

--
-- Table structure for table `load_master`
--

CREATE TABLE `load_master` (
  `LoadNo` char(10) NOT NULL,
  `InOrOut` char(1) NOT NULL,
  `PlanIn` datetime DEFAULT NULL,
  `ActualIn` datetime DEFAULT NULL,
  `PlanOut` datetime DEFAULT NULL,
  `ActualOut` datetime DEFAULT NULL,
  `Size` int(11) NOT NULL CHECK (`Size` > 0 and `Size` < 27),
  `Street1` varchar(50) DEFAULT NULL,
  `Street2` varchar(50) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `State` char(2) DEFAULT NULL,
  `Zip` char(5) DEFAULT NULL,
  `WhGln` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `load_master`
--

INSERT INTO `load_master` (`LoadNo`, `InOrOut`, `PlanIn`, `ActualIn`, `PlanOut`, `ActualOut`, `Size`, `Street1`, `Street2`, `City`, `State`, `Zip`, `WhGln`) VALUES
('100000001', 'I', '2023-04-30 16:00:00', '2023-04-30 22:18:19', NULL, NULL, 15, '456 Commerce Blvd', NULL, 'Plainfield', 'IN', '46168', '123456789123'),
('100000002', 'I', '2023-04-29 11:30:00', '2023-04-30 22:20:01', NULL, NULL, 3, '456 Commerce Blvd', NULL, 'Plainfield', 'IN', '46168', '123456789123'),
('100000003', 'I', '2023-05-01 22:00:00', NULL, NULL, NULL, 24, '456 Commerce Blvd', NULL, 'Plainfield', 'IN', '46168', '123456789123'),
('100000004', 'I', '2023-04-29 11:30:00', '2023-04-30 22:58:01', NULL, NULL, 8, '456 Commerce Blvd', NULL, 'Plainfield', 'IN', '46168', '123456789123'),
('100000005', 'I', '2023-04-30 23:00:00', '2023-04-30 22:59:16', NULL, NULL, 19, '456 Commerce Blvd', NULL, 'Plainfield', 'IN', '46168', '123456789123'),
('100000006', 'I', '2023-05-01 09:30:00', NULL, NULL, NULL, 16, '456 Commerce Blvd', NULL, 'Plainfield', 'IN', '46168', '123456789123'),
('100000007', 'O', NULL, NULL, '2022-03-12 11:00:00', NULL, 25, '124 Corporate Dr', NULL, 'Lansing', 'MI', '48901', '123456789123'),
('100000008', 'O', NULL, NULL, '2022-03-12 12:00:00', NULL, 26, '4677 Middle Harbor Rd', NULL, 'Portland', 'OR', '94607', '123456789123'),
('100000009', 'O', NULL, NULL, '2022-03-12 13:00:00', NULL, 13, '57 Holt Rd', NULL, 'North Andover', 'MA', '01845', '123456789123'),
('100000010', 'O', NULL, NULL, '2022-03-13 09:00:00', NULL, 10, '65724 Industrial Parkway', NULL, 'Columbus', 'OH', '43054', '123456789123'),
('100000011', 'O', NULL, NULL, '2022-03-13 10:00:00', NULL, 9, '3991 Mead Rd', NULL, 'Macon', 'GA', '31206', '123456789123'),
('100000012', 'O', NULL, NULL, '2022-03-14 13:00:00', NULL, 2, '4420 Cotton Flat Rd', NULL, 'Midland', 'TX', '79706', '123456789123');

-- --------------------------------------------------------

--
-- Table structure for table `parking_spot`
--

CREATE TABLE `parking_spot` (
  `SpotNo` int(11) NOT NULL,
  `WhGln` char(13) NOT NULL,
  `Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parking_spot`
--

INSERT INTO `parking_spot` (`SpotNo`, `WhGln`, `Active`) VALUES
(101, '123456789123', 0),
(102, '123456789123', 1),
(103, '123456789123', 1),
(104, '123456789123', 1),
(105, '123456789123', 0),
(106, '123456789123', 0),
(107, '123456789123', 1),
(108, '123456789123', 1),
(109, '123456789123', 1),
(110, '123456789123', 1),
(111, '123456789123', 1),
(112, '123456789123', 1),
(113, '123456789123', 1),
(114, '123456789123', 0),
(115, '123456789123', 0),
(116, '123456789123', 1),
(117, '123456789123', 1),
(118, '123456789123', 1),
(119, '123456789123', 1),
(120, '123456789123', 1),
(121, '123456789123', 1),
(122, '123456789123', 1),
(123, '123456789123', 1),
(124, '123456789123', 1),
(125, '123456789123', 1),
(126, '123456789123', 1),
(128, '123456789123', 1),
(129, '123456789123', 1),
(130, '123456789123', 1),
(131, '123456789123', 0),
(132, '123456789123', 1),
(133, '123456789123', 1),
(134, '123456789123', 1),
(135, '123456789123', 1),
(136, '123456789123', 1),
(137, '123456789123', 1),
(138, '123456789123', 1),
(139, '123456789123', 1),
(140, '123456789123', 1),
(141, '123456789123', 1),
(142, '123456789123', 0),
(143, '123456789123', 0),
(144, '123456789123', 0),
(145, '123456789123', 1),
(146, '123456789123', 1),
(147, '123456789123', 1),
(148, '123456789123', 1),
(149, '123456789123', 1),
(150, '123456789123', 1),
(151, '123456789123', 1),
(152, '123456789123', 0),
(153, '123456789123', 1),
(154, '123456789123', 1),
(155, '123456789123', 1),
(156, '123456789123', 1),
(157, '123456789123', 1),
(158, '123456789123', 1),
(159, '123456789123', 1),
(160, '123456789123', 1),
(161, '123456789123', 1),
(162, '123456789123', 1),
(163, '123456789123', 0),
(164, '123456789123', 1),
(165, '123456789123', 1),
(166, '123456789123', 1),
(167, '123456789123', 1),
(168, '123456789123', 1),
(169, '123456789123', 1),
(170, '123456789123', 1),
(171, '123456789123', 1),
(172, '123456789123', 1),
(173, '123456789123', 1),
(174, '123456789123', 1),
(175, '123456789123', 1),
(176, '123456789123', 1),
(177, '123456789123', 1),
(178, '123456789123', 1),
(179, '123456789123', 1),
(180, '123456789123', 1),
(181, '123456789123', 1),
(182, '123456789123', 1),
(183, '123456789123', 0),
(184, '123456789123', 1),
(185, '123456789123', 1),
(186, '123456789123', 1),
(187, '123456789123', 1),
(188, '123456789123', 1),
(189, '123456789123', 1),
(190, '123456789123', 1),
(191, '123456789123', 1),
(192, '123456789123', 1),
(193, '123456789123', 1),
(194, '123456789123', 1),
(195, '123456789123', 1),
(196, '123456789123', 1),
(197, '123456789123', 1),
(198, '123456789123', 1),
(199, '123456789123', 0),
(200, '123456789123', 1),
(201, '123456789123', 1),
(202, '123456789123', 1),
(203, '123456789123', 1),
(204, '123456789123', 1),
(205, '123456789123', 1),
(206, '123456789123', 1),
(207, '123456789123', 1),
(208, '123456789123', 1),
(209, '123456789123', 1),
(210, '123456789123', 0),
(211, '123456789123', 0),
(212, '123456789123', 0),
(213, '123456789123', 1),
(214, '123456789123', 1),
(215, '123456789123', 1),
(216, '123456789123', 1),
(217, '123456789123', 1),
(218, '123456789123', 1),
(219, '123456789123', 1),
(220, '123456789123', 0),
(221, '123456789123', 1),
(222, '123456789123', 1),
(223, '123456789123', 1),
(224, '123456789123', 1),
(225, '123456789123', 1),
(226, '123456789123', 1),
(227, '123456789123', 1),
(228, '123456789123', 1),
(229, '123456789123', 1),
(230, '123456789123', 1),
(231, '123456789123', 0),
(232, '123456789123', 1),
(233, '123456789123', 1),
(234, '123456789123', 1),
(235, '123456789123', 1),
(236, '123456789123', 1),
(237, '123456789123', 1),
(238, '123456789123', 1),
(239, '123456789123', 1),
(240, '123456789123', 1),
(241, '123456789123', 1),
(242, '123456789123', 1),
(243, '123456789123', 1),
(244, '123456789123', 0),
(245, '123456789123', 1),
(246, '123456789123', 1),
(247, '123456789123', 1),
(248, '123456789123', 1),
(249, '123456789123', 1),
(250, '123456789123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Sku` varchar(20) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `Uom` varchar(10) DEFAULT NULL,
  `UnitWeight` double(10,3) DEFAULT 0.000 CHECK (`UnitWeight` >= 0),
  `WhGln` char(13) NOT NULL,
  `OnHandQty` double(15,3) DEFAULT 0.000 CHECK (`OnHandQty` >= 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Sku`, `Name`, `Description`, `Uom`, `UnitWeight`, `WhGln`, `OnHandQty`) VALUES
('HR11189', 'Humdinger', 'Dinger that hums', 'PLT', 854.000, '123456789123', 1500.000),
('HR11257', 'Whatsit', 'Sorta like a whosit', 'PLT', 912.000, '123456789123', 10.000),
('HR15264', 'Thingamajig', 'Something like that', 'PLT', 1265.000, '123456789123', 2456.000),
('MG55746', 'Doohicky', 'Never seen one', 'PLT', 555.000, '123456789123', 123.000),
('MG58477', 'Thingy', 'Funny looking item', 'PLT', 684.000, '123456789123', 3887.000),
('MG60201', 'Widget', 'Functional device', 'PLT', 732.000, '123456789123', 253.000),
('MG96351', 'Bearing', 'Steel ball 0.125 inch', 'PLT', 1658.000, '123456789123', 4650.000),
('PN02514', 'Superball', 'Rubber bouncy ball', 'PLT', 1110.000, '123456789123', 225.000),
('PN14586', 'Jack', 'Old game piece', 'PLT', 1492.000, '123456789123', 3215.000),
('PN15948', 'Pen', 'Black ballpoint', 'PLT', 685.000, '123456789123', 450.000),
('PN25843', 'Hammer', 'Standard claw hammer', 'PLT', 802.000, '123456789123', 4578.000),
('PN81232', 'Sock', 'Foot gasket', 'PLT', 281.000, '123456789123', 645.000);

-- --------------------------------------------------------

--
-- Table structure for table `trailer`
--

CREATE TABLE `trailer` (
  `TrailerNo` varchar(10) NOT NULL,
  `Operator` char(10) DEFAULT NULL,
  `SpotNo` int(11) DEFAULT NULL,
  `SpotWh` char(13) DEFAULT NULL,
  `DoorNo` int(11) DEFAULT NULL,
  `DoorWh` char(13) DEFAULT NULL,
  `LoadNo` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trailer`
--

INSERT INTO `trailer` (`TrailerNo`, `Operator`, `SpotNo`, `SpotWh`, `DoorNo`, `DoorWh`, `LoadNo`) VALUES
('1201486', NULL, NULL, NULL, 30, NULL, NULL),
('23654895', NULL, 109, NULL, NULL, NULL, '100000005'),
('258LK', NULL, 107, NULL, NULL, NULL, '100000002'),
('321AA', NULL, 248, NULL, NULL, NULL, NULL),
('4456874', '113', NULL, NULL, 13, NULL, '100000009'),
('456454', NULL, 249, NULL, NULL, NULL, NULL),
('4564LD', NULL, 103, NULL, NULL, NULL, NULL),
('568425', NULL, 108, NULL, NULL, NULL, '100000004'),
('654987', NULL, 104, NULL, NULL, NULL, '100000001'),
('842566', NULL, 102, NULL, NULL, NULL, NULL),
('8426321', '112', 173, NULL, NULL, NULL, '100000011'),
('8462105', NULL, 246, NULL, NULL, NULL, NULL),
('86514', NULL, 245, NULL, NULL, NULL, NULL),
('987654321', NULL, 243, NULL, NULL, NULL, NULL),
('ADSF11221', NULL, 250, NULL, NULL, NULL, NULL),
('GK482111', NULL, NULL, NULL, 6, NULL, NULL),
('H45682', NULL, 247, NULL, NULL, NULL, NULL),
('JBH654802', '108', NULL, NULL, 25, NULL, '100000007'),
('JKA986', NULL, 151, NULL, NULL, NULL, NULL),
('LB546872', '112', 192, NULL, NULL, NULL, '100000012'),
('M100025', '112', 145, NULL, NULL, NULL, '100000006'),
('NH40205', NULL, 134, NULL, NULL, NULL, NULL),
('SNJ85643', NULL, NULL, NULL, 34, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `warehouse`
--

CREATE TABLE `warehouse` (
  `Gln` char(13) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Street1` varchar(50) DEFAULT NULL,
  `Street2` varchar(50) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `State` char(2) DEFAULT NULL,
  `Zip` char(5) DEFAULT NULL,
  `Capacity` int(11) NOT NULL,
  `CompanyId` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouse`
--

INSERT INTO `warehouse` (`Gln`, `Name`, `Street1`, `Street2`, `City`, `State`, `Zip`, `Capacity`, `CompanyId`) VALUES
('123456722265', 'Michigan', '124 Corporate Drive', NULL, 'Lansing', 'MI', '48901', 30000, '1'),
('123456789123', 'Indianapolis West', '456 Commerce Blvd', '', 'Plainfield', 'IN', '46168', 25000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_role`
--

CREATE TABLE `warehouse_role` (
  `JobTitle` varchar(30) NOT NULL,
  `Description` varchar(50) DEFAULT NULL,
  `WhGln` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warehouse_role`
--

INSERT INTO `warehouse_role` (`JobTitle`, `Description`, `WhGln`) VALUES
('Gatekeeper', 'Controls traffic in and out', '123456789123'),
('Operator', 'Loads and unloads trailers', '123456789123'),
('Spotter', 'Moves trailers on the property', '123456789123'),
('Supervisor', 'Oversees operators, spotters, and gatekeepers', '123456789123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`CompanyId`);

--
-- Indexes for table `dock_door`
--
ALTER TABLE `dock_door`
  ADD PRIMARY KEY (`DoorNo`,`WhGln`),
  ADD KEY `WhGln` (`WhGln`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmployeeId`),
  ADD KEY `CompanyId` (`CompanyId`),
  ADD KEY `WRole` (`WRole`),
  ADD KEY `employee_ibfk_2` (`WhGln`);

--
-- Indexes for table `load_detail`
--
ALTER TABLE `load_detail`
  ADD PRIMARY KEY (`LoadNo`,`Sku`),
  ADD KEY `Sku` (`Sku`);

--
-- Indexes for table `load_master`
--
ALTER TABLE `load_master`
  ADD PRIMARY KEY (`LoadNo`),
  ADD KEY `WhGln` (`WhGln`);

--
-- Indexes for table `parking_spot`
--
ALTER TABLE `parking_spot`
  ADD PRIMARY KEY (`SpotNo`,`WhGln`),
  ADD KEY `WhGln` (`WhGln`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Sku`,`WhGln`),
  ADD KEY `WhGln` (`WhGln`);

--
-- Indexes for table `trailer`
--
ALTER TABLE `trailer`
  ADD PRIMARY KEY (`TrailerNo`),
  ADD KEY `Operator` (`Operator`),
  ADD KEY `SpotNo` (`SpotNo`),
  ADD KEY `SpotWh` (`SpotWh`),
  ADD KEY `DoorNo` (`DoorNo`),
  ADD KEY `DoorWh` (`DoorWh`),
  ADD KEY `LoadNo` (`LoadNo`);

--
-- Indexes for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`Gln`),
  ADD KEY `CompanyId` (`CompanyId`);

--
-- Indexes for table `warehouse_role`
--
ALTER TABLE `warehouse_role`
  ADD PRIMARY KEY (`JobTitle`,`WhGln`),
  ADD KEY `WhGln` (`WhGln`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dock_door`
--
ALTER TABLE `dock_door`
  ADD CONSTRAINT `dock_door_ibfk_1` FOREIGN KEY (`WhGln`) REFERENCES `warehouse` (`Gln`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`CompanyId`) REFERENCES `company` (`CompanyId`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`WhGln`) REFERENCES `warehouse` (`Gln`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`WRole`) REFERENCES `warehouse_role` (`JobTitle`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `load_detail`
--
ALTER TABLE `load_detail`
  ADD CONSTRAINT `load_detail_ibfk_1` FOREIGN KEY (`LoadNo`) REFERENCES `load_master` (`LoadNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `load_detail_ibfk_2` FOREIGN KEY (`Sku`) REFERENCES `product` (`Sku`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `load_master`
--
ALTER TABLE `load_master`
  ADD CONSTRAINT `load_master_ibfk_1` FOREIGN KEY (`WhGln`) REFERENCES `warehouse` (`Gln`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parking_spot`
--
ALTER TABLE `parking_spot`
  ADD CONSTRAINT `parking_spot_ibfk_1` FOREIGN KEY (`WhGln`) REFERENCES `warehouse` (`Gln`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`WhGln`) REFERENCES `warehouse` (`Gln`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trailer`
--
ALTER TABLE `trailer`
  ADD CONSTRAINT `trailer_ibfk_1` FOREIGN KEY (`Operator`) REFERENCES `employee` (`EmployeeId`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `trailer_ibfk_2` FOREIGN KEY (`SpotNo`) REFERENCES `parking_spot` (`SpotNo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `trailer_ibfk_3` FOREIGN KEY (`SpotWh`) REFERENCES `parking_spot` (`WhGln`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `trailer_ibfk_4` FOREIGN KEY (`DoorNo`) REFERENCES `dock_door` (`DoorNo`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `trailer_ibfk_5` FOREIGN KEY (`DoorWh`) REFERENCES `dock_door` (`WhGln`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `trailer_ibfk_6` FOREIGN KEY (`LoadNo`) REFERENCES `load_master` (`LoadNo`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `warehouse_ibfk_1` FOREIGN KEY (`CompanyId`) REFERENCES `company` (`CompanyId`);

--
-- Constraints for table `warehouse_role`
--
ALTER TABLE `warehouse_role`
  ADD CONSTRAINT `warehouse_role_ibfk_1` FOREIGN KEY (`WhGln`) REFERENCES `warehouse` (`Gln`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
