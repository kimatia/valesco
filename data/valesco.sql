-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 13, 2018 at 09:07 AM
-- Server version: 5.7.18
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `valesco`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_action`
--

CREATE TABLE `tbl_action` (
  `id` int(11) NOT NULL,
  `valescoAction` varchar(255) NOT NULL,
  `block` int(11) DEFAULT '0',
  `display` int(11) NOT NULL DEFAULT '0',
  `postTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_action`
--

INSERT INTO `tbl_action` (`id`, `valescoAction`, `block`, `display`, `postTime`) VALUES
(10, 'Direct Transhipment', 0, 0, '04:28 AM.'),
(11, 'Verification', 0, 0, '08:50 AM.'),
(12, 'Re-Export', 0, 0, '11:10 AM.'),
(13, 'Clearing and Fowarding', 0, 0, '02:56 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billoflading`
--

CREATE TABLE `tbl_billoflading` (
  `id` int(10) NOT NULL,
  `stackNumber` varchar(100) NOT NULL,
  `billofLadingNumber` varchar(100) NOT NULL,
  `shippername` varchar(100) NOT NULL,
  `shipperadress` varchar(100) NOT NULL,
  `shipperlocation` varchar(100) NOT NULL,
  `consigneename` varchar(100) NOT NULL,
  `consigneeadress` varchar(100) NOT NULL,
  `consigneelocation` varchar(100) NOT NULL,
  `precariageBy` varchar(100) NOT NULL,
  `placeofReciept` varchar(100) NOT NULL,
  `vessel` varchar(100) NOT NULL,
  `voyno` varchar(100) NOT NULL,
  `loadingport` varchar(100) NOT NULL,
  `dischargeport` varchar(100) NOT NULL,
  `finalDestination` varchar(100) NOT NULL,
  `freightName` varchar(100) NOT NULL,
  `revenueTons` varchar(100) NOT NULL,
  `rate` varchar(100) NOT NULL,
  `per` varchar(100) NOT NULL,
  `prepaid` varchar(100) NOT NULL,
  `collect` varchar(100) NOT NULL,
  `markNumber` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `grossweight` varchar(100) NOT NULL,
  `measurement` varchar(100) NOT NULL,
  `packagesNo` varchar(100) NOT NULL,
  `freightPayable` varchar(100) NOT NULL,
  `numberOriginal` varchar(100) NOT NULL,
  `placeOfIssue` varchar(100) NOT NULL,
  `dateOfIssue` varchar(100) NOT NULL,
  `billofLading_file` varchar(100) NOT NULL,
  `userId` int(10) NOT NULL,
  `postTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_billoflading`
--

INSERT INTO `tbl_billoflading` (`id`, `stackNumber`, `billofLadingNumber`, `shippername`, `shipperadress`, `shipperlocation`, `consigneename`, `consigneeadress`, `consigneelocation`, `precariageBy`, `placeofReciept`, `vessel`, `voyno`, `loadingport`, `dischargeport`, `finalDestination`, `freightName`, `revenueTons`, `rate`, `per`, `prepaid`, `collect`, `markNumber`, `description`, `grossweight`, `measurement`, `packagesNo`, `freightPayable`, `numberOriginal`, `placeOfIssue`, `dateOfIssue`, `billofLading_file`, `userId`, `postTime`) VALUES
(2, 'VAL/45/2018', 'r6h', '67ugh', 'ggf', 'gh', 'fgtt', 'gh', 'hf', 'hggh', 'hgg', 'vv', 'ghg', 'hhgg', 'ghgh', 'hgh', 'hgh', 'ggh', 'hhg', 'ggh', 'hggh', 'ghgh', 'ggh', 'hg', 'ggh', 'ghg', 'ghgh', 'ggh', 'ghg', 'hggh', 'hgg', 'images (6).jpeg', 1, '2018-08-13 11:41:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bol`
--

CREATE TABLE `tbl_bol` (
  `id` int(11) NOT NULL,
  `bolID` varchar(255) NOT NULL,
  `manifestName` varchar(255) NOT NULL,
  `manifestFileNumber` varchar(255) NOT NULL,
  `bolNumber` varchar(255) NOT NULL,
  `relatedBolTotalNumber` varchar(255) NOT NULL,
  `arrivalVesselName` varchar(255) NOT NULL,
  `voyageNumber` varchar(255) NOT NULL,
  `dateOfArrival` varchar(255) NOT NULL,
  `containerNumber` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sealNumber` varchar(255) NOT NULL,
  `bolFile` varchar(255) NOT NULL DEFAULT 'img',
  `updated` varchar(255) NOT NULL DEFAULT 'NO',
  `postUser` varchar(255) NOT NULL DEFAULT 'user',
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bol`
--

INSERT INTO `tbl_bol` (`id`, `bolID`, `manifestName`, `manifestFileNumber`, `bolNumber`, `relatedBolTotalNumber`, `arrivalVesselName`, `voyageNumber`, `dateOfArrival`, `containerNumber`, `description`, `sealNumber`, `bolFile`, `updated`, `postUser`, `postDate`) VALUES
(91, '285', 'Direct Transhipment', 'DF45', 'DF45', '7', 'VVHYY67', 'VVHYY67', '2018-08-07', '567YH', 'GHGHGHGHGHHHG', '678H', '267895.jpg', 'YES', 'kimatia', '10:20 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_certificateofconformity`
--

CREATE TABLE `tbl_certificateofconformity` (
  `id` int(10) NOT NULL,
  `stackNumber` varchar(100) NOT NULL,
  `idfNumber` varchar(100) NOT NULL,
  `certificateofconformity_file` varchar(100) NOT NULL,
  `userId` int(10) NOT NULL,
  `postTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL,
  `commentID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentUser` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentValue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commentTime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userCountry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sendtime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_country`
--

INSERT INTO `tbl_country` (`id`, `userName`, `userCountry`, `sendtime`) VALUES
(1, 'kimatia', 'kenya', '2018-01-11 09:30:36'),
(3, 'kimatia', 'America', '2018-01-11 18:15:02'),
(4, 'kimatia', 'Malawi', '2018-01-11 18:32:30'),
(5, 'kimatia', 'Kongo DRC', '2018-01-11 18:36:58'),
(6, 'kimatia', 'Uganda', '2018-01-11 18:43:41'),
(7, 'kimatia', 'Uganda', '2018-01-11 18:43:41'),
(8, 'kimatia', 'Germany', '2018-01-11 18:45:27'),
(9, 'kimatia', 'Nigeria', '2018-01-11 18:46:57'),
(10, 'kimatia', 'Alaska', '2018-01-11 18:51:54'),
(11, 'kimatia', 'Togo', '2018-01-12 21:58:49'),
(12, 'kimatia', 'Benin', '2018-01-12 22:00:09'),
(13, 'kimatia', 'Tanzania', '2018-01-12 22:04:00'),
(14, 'kimatia', 'Tunisia', '2018-01-12 22:05:20'),
(15, 'kimatia', 'South Africa', '2018-01-12 22:06:18'),
(16, 'kimatia', 'China', '2018-01-12 22:07:28'),
(17, 'kimatia', 'Ethiopia', '2018-01-12 22:32:20'),
(18, 'kimatia', 'Eritrea', '2018-01-12 22:34:56'),
(19, 'kimatia', 'Mali', '2018-01-12 23:12:48'),
(20, 'joshua', 'Zimbabwe', '2018-01-13 13:23:44'),
(21, 'joshua', 'Niger', '2018-01-13 13:24:09'),
(22, 'joshua', 'England', '2018-01-13 13:24:29'),
(23, 'joshua', 'Malaysia', '2018-01-13 14:12:10'),
(24, 'joshua', 'Italy', '2018-01-13 14:12:25'),
(25, 'joshua', 'Rwanda', '2018-01-13 14:12:53'),
(26, 'kimatia', 'Ghana', '2018-01-13 16:31:45'),
(27, 'kimatia', 'Cameroon', '2018-01-13 16:32:40'),
(28, 'kimatia', 'Sudan', '2018-01-13 16:34:29'),
(29, 'kimatia', 'Burundi', '2018-01-14 21:52:35'),
(30, 'joshua', 'Bolivia', '2018-01-22 15:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ecert`
--

CREATE TABLE `tbl_ecert` (
  `id` int(10) NOT NULL,
  `stackNumber` varchar(100) NOT NULL,
  `ecertNo` varchar(100) NOT NULL,
  `ecert_file` varchar(100) NOT NULL,
  `userId` int(10) NOT NULL,
  `postTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_ecert`
--

INSERT INTO `tbl_ecert` (`id`, `stackNumber`, `ecertNo`, `ecert_file`, `userId`, `postTime`) VALUES
(7, 'VAL/45/2018', 'sscew', 'joel12.jpg', 1, '2018-08-13 11:34:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exportlogs`
--

CREATE TABLE `tbl_exportlogs` (
  `id` int(11) NOT NULL,
  `stackID` varchar(11) NOT NULL DEFAULT 'N/A',
  `userID` varchar(11) NOT NULL DEFAULT 'N/A',
  `postUser` varchar(255) NOT NULL DEFAULT 'N/A',
  `action` varchar(255) NOT NULL DEFAULT 'N/A',
  `postDate` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_exportlogs`
--

INSERT INTO `tbl_exportlogs` (`id`, `stackID`, `userID`, `postUser`, `action`, `postDate`) VALUES
(66, 'N/A', '1', 'kimatia', 'User kimatia inserted an invoice of number 678 and its image joel14.jpg on 10:25 AM.', '10:25 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_idf`
--

CREATE TABLE `tbl_idf` (
  `id` int(10) NOT NULL,
  `stackNumber` varchar(100) NOT NULL,
  `idfNo` varchar(100) NOT NULL,
  `idf_file` varchar(100) NOT NULL,
  `userId` int(10) NOT NULL,
  `postTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_idf`
--

INSERT INTO `tbl_idf` (`id`, `stackNumber`, `idfNo`, `idf_file`, `userId`, `postTime`) VALUES
(4, 'VAL/67/2018', 'MHJ', 'joel12.jpg', 1, '2018-08-13 12:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoice`
--

CREATE TABLE `tbl_invoice` (
  `id` int(10) NOT NULL,
  `stackNumber` varchar(100) NOT NULL,
  `invoiceNo` varchar(100) NOT NULL,
  `invoice_file` varchar(100) NOT NULL,
  `userId` int(10) NOT NULL,
  `postTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_invoice`
--

INSERT INTO `tbl_invoice` (`id`, `stackNumber`, `invoiceNo`, `invoice_file`, `userId`, `postTime`) VALUES
(3, 'VAL/45/2018', 'ghyjh', 'joel14.jpg', 1, '2018-08-13 11:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoiceexport`
--

CREATE TABLE `tbl_invoiceexport` (
  `id` int(11) NOT NULL,
  `stackID` int(11) NOT NULL,
  `invoiceNumber` varchar(255) NOT NULL,
  `invoiceFile` varchar(255) NOT NULL,
  `postUser` varchar(255) NOT NULL,
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_invoiceexport`
--

INSERT INTO `tbl_invoiceexport` (`id`, `stackID`, `invoiceNumber`, `invoiceFile`, `postUser`, `postDate`) VALUES
(17, 14, '678', 'joel14.jpg', 'kimatia', '10:25 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_invoiceverify`
--

CREATE TABLE `tbl_invoiceverify` (
  `id` int(11) NOT NULL,
  `stackID` int(11) NOT NULL,
  `invoiceNumber` varchar(255) NOT NULL,
  `invoiceFile` varchar(255) NOT NULL,
  `postUser` varchar(255) NOT NULL,
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kbs`
--

CREATE TABLE `tbl_kbs` (
  `id` int(10) NOT NULL,
  `stackNumber` varchar(100) NOT NULL,
  `kbsNo` varchar(100) NOT NULL,
  `kbs_file` varchar(100) NOT NULL,
  `userId` int(10) NOT NULL,
  `postTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_kbs`
--

INSERT INTO `tbl_kbs` (`id`, `stackNumber`, `kbsNo`, `kbs_file`, `userId`, `postTime`) VALUES
(4, 'VAL/45/2018', 'fthg', 'joel7.jpg', 1, '2018-08-13 11:38:16');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lbook`
--

CREATE TABLE `tbl_lbook` (
  `id` int(10) NOT NULL,
  `stackNumber` varchar(100) NOT NULL,
  `lbookNo` varchar(100) NOT NULL,
  `lbook_file` varchar(100) NOT NULL,
  `userId` int(10) NOT NULL,
  `postTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_lbook`
--

INSERT INTO `tbl_lbook` (`id`, `stackNumber`, `lbookNo`, `lbook_file`, `userId`, `postTime`) VALUES
(3, 'VAL/45/2018', 'ljfffg', 'joel5.jpg', 1, '2018-08-13 11:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id` int(11) NOT NULL,
  `userName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loginTime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logoutTime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'online',
  `loginUserIp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logoutUserIP` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'online'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`id`, `userName`, `loginTime`, `logoutTime`, `loginUserIp`, `logoutUserIP`) VALUES
(216, 'joshua', '2018-08-13 12:03:07', '12:40 PM.', '127.0.0.1', '127.0.0.1'),
(217, 'kimatia', '2018-08-13 12:49:38', '06:37 PM.', '::1', '::1'),
(218, 'kimatia', '2018-08-13 18:37:29', '06:37 PM.', '::1', '::1'),
(219, 'kimatia', '2018-08-13 18:38:01', 'online', '::1', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `stackNumber` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL,
  `postTime` varchar(100) NOT NULL,
  `updateData` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_logs`
--

INSERT INTO `tbl_logs` (`id`, `userId`, `stackNumber`, `file`, `postTime`, `updateData`) VALUES
(39, 1, 'pal/123/JULY/2014', 'kbs', '2017-08-01 17:27:25', NULL),
(40, 1, 'pal/123/JULY/2014', 'kbs', '2017-08-01 17:28:01', 'Yes'),
(41, 12, 'bbbbb', 'idf', '2018-03-16 14:30:12', NULL),
(42, 1, 'ppppp', 'idf', '2018-03-31 16:56:17', NULL),
(43, 1, '1234', 'kbs', '2018-03-31 17:50:02', NULL),
(44, 1, 'ppppp', 'kbs', '2018-03-31 17:51:43', NULL),
(45, 1, 'ppppp', 'kbs', '2018-03-31 17:51:44', NULL),
(46, 1, 'ppppp', 'ecert', '2018-03-31 17:53:20', NULL),
(47, 1, 'ppppp', 'ecert', '2018-03-31 17:53:20', NULL),
(48, 1, 'ppppp', 'invoice', '2018-03-31 17:54:58', NULL),
(49, 1, 'ppppp', 'invoice', '2018-03-31 17:54:58', NULL),
(50, 1, 'ppppp', 'treciept', '2018-03-31 18:01:32', NULL),
(51, 1, 'ppppp', 'treciept', '2018-03-31 18:01:32', NULL),
(52, 1, 'ppppp', 'quadruplicate', '2018-03-31 18:08:50', NULL),
(53, 1, 'ppppp', 'quadruplicate', '2018-03-31 18:08:50', NULL),
(54, 1, 'ppppp', 'lbook', '2018-03-31 18:11:24', NULL),
(55, 1, 'ppppp', 'lbook', '2018-03-31 18:11:24', NULL),
(56, 1, '1234', 'ecert', '2018-03-31 18:13:13', NULL),
(57, 1, '1234', 'ecert', '2018-03-31 18:13:13', NULL),
(58, 1, '1234', 'ecert', '2018-03-31 18:13:13', NULL),
(59, 1, '1234', 'ecert', '2018-03-31 18:13:13', NULL),
(60, 1, '', 'idf', '2018-03-31 20:14:07', 'Yes'),
(61, 1, '', 'kbs', '2018-03-31 20:14:24', 'Yes'),
(62, 1, 'ppppp', 'bol', '2018-03-31 20:16:02', NULL),
(63, 1, 'ppppp', 'bol', '2018-03-31 20:16:02', NULL),
(64, 1, 'ppppp', 'bol', '2018-03-31 20:16:02', NULL),
(65, 1, 'ppppp', 'bol', '2018-03-31 20:16:02', NULL),
(66, 1, '', 'idf', '2018-03-31 20:18:51', 'Yes'),
(67, 1, 'ppppp', 'idf', '2018-03-31 20:30:00', 'Yes'),
(68, 1, 'ppppp', 'quadruplicate', '2018-03-31 20:30:19', 'Yes'),
(69, 1, 'ppppp', 'kbs', '2018-03-31 20:41:57', 'Yes'),
(70, 1, 'ppppp', 'lbook', '2018-03-31 20:43:02', 'Yes'),
(71, 1, 'VAL/45/2018', 'kbs', '2018-08-13 11:25:44', NULL),
(72, 1, 'VAL/45/2018', 'kbs', '2018-08-13 11:26:04', NULL),
(73, 1, 'VAL/45/2018', 'kbs', '2018-08-13 11:26:04', 'Yes'),
(74, 1, 'VAL/45/2018', 'kbs', '2018-08-13 11:26:04', NULL),
(75, 1, 'VAL/45/2018', 'ecert', '2018-08-13 11:34:08', NULL),
(76, 1, 'VAL/45/2018', 'ecert', '2018-08-13 11:34:08', NULL),
(77, 1, 'VAL/45/2018', 'ecert', '2018-08-13 11:34:08', NULL),
(78, 1, 'VAL/45/2018', 'idf', '2018-08-13 11:38:16', NULL),
(79, 1, 'VAL/45/2018', 'idf', '2018-08-13 11:38:16', NULL),
(80, 1, 'VAL/45/2018', 'kbs', '2018-08-13 11:38:16', 'Yes'),
(81, 1, '', 'idf', '2018-08-13 11:38:34', NULL),
(82, 1, '', 'idf', '2018-08-13 11:38:34', NULL),
(83, 1, '', 'idf', '2018-08-13 11:38:34', 'Yes'),
(84, 1, 'VAL/45/2018', 'invoice', '2018-08-13 11:38:54', NULL),
(85, 1, 'VAL/45/2018', 'invoice', '2018-08-13 11:38:54', NULL),
(86, 1, 'VAL/45/2018', 'invoice', '2018-08-13 11:38:54', NULL),
(87, 1, 'VAL/45/2018', 'treciept', '2018-08-13 11:39:11', NULL),
(88, 1, 'VAL/45/2018', 'treciept', '2018-08-13 11:39:11', NULL),
(89, 1, 'VAL/45/2018', 'treciept', '2018-08-13 11:39:11', NULL),
(90, 1, 'VAL/45/2018', 'quadruplicate', '2018-08-13 11:39:31', NULL),
(91, 1, 'VAL/45/2018', 'quadruplicate', '2018-08-13 11:39:32', NULL),
(92, 1, 'VAL/45/2018', 'quadruplicate', '2018-08-13 11:39:32', NULL),
(93, 1, 'VAL/45/2018', 'lbook', '2018-08-13 11:39:52', NULL),
(94, 1, 'VAL/45/2018', 'lbook', '2018-08-13 11:39:52', NULL),
(95, 1, 'VAL/45/2018', 'lbook', '2018-08-13 11:39:52', NULL),
(96, 1, 'VAL/45/2018', 'bol', '2018-08-13 11:40:39', NULL),
(97, 1, 'VAL/45/2018', 'bol', '2018-08-13 11:40:39', NULL),
(98, 1, 'VAL/45/2018', 'bol', '2018-08-13 11:40:39', NULL),
(99, 1, 'VAL/45/2018', 'bol', '2018-08-13 11:41:12', NULL),
(100, 1, 'VAL/45/2018', 'bol', '2018-08-13 11:41:12', 'Yes'),
(101, 1, 'VAL/45/2018', 'bol', '2018-08-13 11:41:12', NULL),
(102, 1, '', 'idf', '2018-08-13 11:44:37', 'Yes'),
(103, 1, '', 'idf', '2018-08-13 11:48:17', 'Yes'),
(104, 1, '', 'idf', '2018-08-13 12:00:01', 'Yes'),
(105, 1, 'VAL/67/2018', 'idf', '2018-08-13 12:00:51', NULL),
(106, 1, 'VAL/67/2018', 'idf', '2018-08-13 12:01:07', NULL),
(107, 1, 'VAL/67/2018', 'idf', '2018-08-13 12:01:07', NULL),
(108, 1, 'VAL/67/2018', 'idf', '2018-08-13 12:01:07', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manifest`
--

CREATE TABLE `tbl_manifest` (
  `id` int(11) NOT NULL,
  `uniqueManifestCode` varchar(255) NOT NULL,
  `stackID` int(11) NOT NULL,
  `iterateTittle` int(11) NOT NULL DEFAULT '1',
  `manifestName` varchar(255) NOT NULL,
  `manifestFileNumber` varchar(255) NOT NULL,
  `billOfLadingNumber` int(255) NOT NULL,
  `block` int(11) NOT NULL DEFAULT '0',
  `display` int(11) NOT NULL DEFAULT '0',
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_manifest`
--

INSERT INTO `tbl_manifest` (`id`, `uniqueManifestCode`, `stackID`, `iterateTittle`, `manifestName`, `manifestFileNumber`, `billOfLadingNumber`, `block`, `display`, `postDate`) VALUES
(283, '8832ae39136fb470b3fbbf9f47b4570d', 61, 7, 'Direct Transhipment', 'DF45', 7, 0, 0, '10:18 AM.'),
(284, '8832ae39136fb470b3fbbf9f47b4570d', 61, 7, 'Direct Transhipment', 'DF45', 7, 0, 0, '10:18 AM.'),
(285, '8832ae39136fb470b3fbbf9f47b4570d', 61, 7, 'Direct Transhipment', 'DF45', 7, 0, 1, '10:18 AM.'),
(286, '8832ae39136fb470b3fbbf9f47b4570d', 61, 7, 'Direct Transhipment', 'DF45', 7, 0, 0, '10:18 AM.'),
(287, '8832ae39136fb470b3fbbf9f47b4570d', 61, 7, 'Direct Transhipment', 'DF45', 7, 0, 0, '10:18 AM.'),
(288, '8832ae39136fb470b3fbbf9f47b4570d', 61, 7, 'Direct Transhipment', 'DF45', 7, 0, 0, '10:18 AM.'),
(289, '8832ae39136fb470b3fbbf9f47b4570d', 61, 7, 'Direct Transhipment', 'DF45', 7, 0, 0, '10:18 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manifestinvoice`
--

CREATE TABLE `tbl_manifestinvoice` (
  `id` int(10) NOT NULL,
  `stackID` int(11) NOT NULL,
  `invoiceNumber` varchar(255) NOT NULL,
  `invoiceFile` varchar(255) NOT NULL,
  `postUser` varchar(255) NOT NULL,
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_manifestinvoice`
--

INSERT INTO `tbl_manifestinvoice` (`id`, `stackID`, `invoiceNumber`, `invoiceFile`, `postUser`, `postDate`) VALUES
(14, 61, '66787', 'joel20.jpg', 'kimatia', '10:22 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manifestlogs`
--

CREATE TABLE `tbl_manifestlogs` (
  `id` int(11) NOT NULL,
  `stackID` varchar(11) NOT NULL DEFAULT 'N/A',
  `userID` varchar(11) NOT NULL DEFAULT 'N/A',
  `postUser` varchar(255) NOT NULL DEFAULT 'N/A',
  `action` varchar(255) NOT NULL DEFAULT 'N/A',
  `postDate` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_manifestlogs`
--

INSERT INTO `tbl_manifestlogs` (`id`, `stackID`, `userID`, `postUser`, `action`, `postDate`) VALUES
(100, '61', '1', 'kimatia', 'User kimatia created a manifest of file DF45 containing 7 bill of lading files at 10:18 AM.', '10:18 AM.'),
(101, '61', '1', 'kimatia', 'User kimatia Inserted bill of lading file 5567 of DF45 which arrived on vessel VVHYY67 with F4577 voyage number and 678H seal number on 10:20 AM.', '10:20 AM.'),
(102, '61', '1', 'kimatia', 'User kimatia Inserted another page joel21.jpg of file DF45 at 10:21 AM.', '10:21 AM.'),
(103, '61', '1', 'kimatia', 'User kimatia created an outgoing vessel RTU7 with booking number 679H on 10:21 AM. 10:22 AM.', '10:22 AM.'),
(104, '61', '1', 'kimatia', 'User kimatia inserted an invoice of number 66787 and its image joel20.jpg on 10:22 AM.', '10:22 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_manifestview`
--

CREATE TABLE `tbl_manifestview` (
  `id` int(11) NOT NULL,
  `stackID` int(11) NOT NULL,
  `manifestImage` varchar(255) NOT NULL,
  `postUser` varchar(255) NOT NULL,
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_manifestview`
--

INSERT INTO `tbl_manifestview` (`id`, `stackID`, `manifestImage`, `postUser`, `postDate`) VALUES
(24, 61, 'joel21.jpg', 'kimatia', '10:21 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int(11) NOT NULL,
  `mid` int(255) NOT NULL,
  `sid` int(255) NOT NULL,
  `totalUniqueChatId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uniqueHashedChatId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notify` int(11) NOT NULL DEFAULT '0',
  `midTo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `midFrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `chatFrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chatTo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chatTime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`id`, `mid`, `sid`, `totalUniqueChatId`, `uniqueHashedChatId`, `notify`, `midTo`, `midFrom`, `chatFrom`, `chatTo`, `message`, `chatTime`) VALUES
(169, 14, 1, '15', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 1, '1', '1', 'kimatia', 'joshua', 'Hi Joshua', '12:01 PM.'),
(170, 1, 14, '15', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 1, '1', '1', 'joshua', 'kimatia', 'Hi too kimatia', '12:30 PM.'),
(171, 14, 1, '15', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 1, '1', '1', 'kimatia', 'joshua', 'How is the going?', '12:31 PM.'),
(172, 1, 14, '15', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 1, '1', '1', 'joshua', 'kimatia', 'The going is quite fine', '12:31 PM.'),
(173, 14, 1, '15', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 1, '1', '1', 'kimatia', 'joshua', 'Ok man', '12:31 PM.'),
(174, 14, 1, '15', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 1, '1', '1', 'kimatia', 'joshua', 'k', '03:17 PM.'),
(175, 14, 1, '15', '9bf31c7ff062936a96d3c8bd1f8f2ff3', 0, '1', '1', 'kimatia', 'joshua', 'k', '03:32 PM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quadruplicate`
--

CREATE TABLE `tbl_quadruplicate` (
  `id` int(10) NOT NULL,
  `stackNumber` varchar(100) NOT NULL,
  `quadruplicateNo` varchar(100) NOT NULL,
  `quadruplicate_file` varchar(100) NOT NULL,
  `userId` int(10) NOT NULL,
  `postTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quadruplicate`
--

INSERT INTO `tbl_quadruplicate` (`id`, `stackNumber`, `quadruplicateNo`, `quadruplicate_file`, `userId`, `postTime`) VALUES
(3, 'VAL/45/2018', '234esdfv', 'joel7.jpg', 1, '2018-08-13 11:39:31'),
(4, 'VAL/45/2018', '234esdfv', 'joel7.jpg', 1, '2018-08-13 11:39:31'),
(5, 'VAL/45/2018', '234esdfv', 'joel7.jpg', 1, '2018-08-13 11:39:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reexport`
--

CREATE TABLE `tbl_reexport` (
  `id` int(11) NOT NULL,
  `uniqueManifestCode` varchar(255) NOT NULL,
  `stackID` varchar(11) NOT NULL,
  `iterateTittle` varchar(11) NOT NULL DEFAULT '1',
  `manifestName` varchar(255) NOT NULL,
  `billOfLadingNumber` int(255) NOT NULL,
  `display` varchar(11) NOT NULL DEFAULT '0',
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_reexport`
--

INSERT INTO `tbl_reexport` (`id`, `uniqueManifestCode`, `stackID`, `iterateTittle`, `manifestName`, `billOfLadingNumber`, `display`, `postDate`) VALUES
(243, 'a3ec6dd8d538712a581e5b24726ce062', '14', '4', 'Re-Export', 4, '0', '10:24 AM.'),
(244, 'a3ec6dd8d538712a581e5b24726ce062', '14', '4', 'Re-Export', 4, '1', '10:24 AM.'),
(245, 'a3ec6dd8d538712a581e5b24726ce062', '14', '4', 'Re-Export', 4, '0', '10:24 AM.'),
(246, 'a3ec6dd8d538712a581e5b24726ce062', '14', '4', 'Re-Export', 4, '0', '10:24 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reexportbols`
--

CREATE TABLE `tbl_reexportbols` (
  `id` int(11) NOT NULL,
  `bolID` varchar(255) NOT NULL,
  `manifestFileNumber` varchar(255) NOT NULL DEFAULT 'N/A',
  `manifestName` varchar(255) NOT NULL,
  `bolNumber` varchar(255) NOT NULL,
  `relatedBolTotalNumber` varchar(255) NOT NULL,
  `arrivalVesselName` varchar(255) NOT NULL,
  `voyageNumber` varchar(255) NOT NULL,
  `dateOfArrival` varchar(255) NOT NULL,
  `containerNumber` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sealNumber` varchar(255) NOT NULL,
  `bolFile` varchar(255) NOT NULL DEFAULT 'img',
  `updated` varchar(255) NOT NULL DEFAULT 'NO',
  `postUser` varchar(255) NOT NULL DEFAULT 'user',
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_reexportbols`
--

INSERT INTO `tbl_reexportbols` (`id`, `bolID`, `manifestFileNumber`, `manifestName`, `bolNumber`, `relatedBolTotalNumber`, `arrivalVesselName`, `voyageNumber`, `dateOfArrival`, `containerNumber`, `description`, `sealNumber`, `bolFile`, `updated`, `postUser`, `postDate`) VALUES
(85, '244', 'N/A', 'Re-Export', '556', '4', 'EFR', '678', '2018-08-15', '677', 'GGDDSD', '689H', '291767.jpg', 'NO', 'kimatia', '10:26 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reexportlogs`
--

CREATE TABLE `tbl_reexportlogs` (
  `id` int(11) NOT NULL,
  `userIdentity` varchar(11) NOT NULL,
  `postUser` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_reexportlogs`
--

INSERT INTO `tbl_reexportlogs` (`id`, `userIdentity`, `postUser`, `action`, `postDate`) VALUES
(18, '1', 'kimatia', 'User kimatia created a verification file of container number 567 containing 4 bill of lading file(s). Its date of receipt was on  and verification date on  . It has old seal number  and new seal number  .It was posted on 10:24 AM.', '10:24 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stacks`
--

CREATE TABLE `tbl_stacks` (
  `id` int(10) NOT NULL,
  `stackNumber` varchar(100) NOT NULL,
  `bol` varchar(100) NOT NULL DEFAULT 'No',
  `idf` varchar(100) NOT NULL DEFAULT 'No',
  `kbs` varchar(100) NOT NULL DEFAULT 'No',
  `ecert` varchar(100) NOT NULL DEFAULT 'No',
  `invoice` varchar(100) NOT NULL DEFAULT 'No',
  `treciept` varchar(100) NOT NULL DEFAULT 'No',
  `quadruplicate` varchar(100) NOT NULL DEFAULT 'No',
  `lbook` varchar(100) NOT NULL DEFAULT 'No',
  `postDate` varchar(100) NOT NULL,
  `finalDate` varchar(100) NOT NULL DEFAULT 'pending',
  `status` varchar(100) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_stacks`
--

INSERT INTO `tbl_stacks` (`id`, `stackNumber`, `bol`, `idf`, `kbs`, `ecert`, `invoice`, `treciept`, `quadruplicate`, `lbook`, `postDate`, `finalDate`, `status`) VALUES
(4, 'VAL/45/2018', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', 'Yes', '2018-08-13 10:29:06', 'pending', 'No'),
(5, 'VAL/67/2018', 'No', 'Yes', 'No', 'No', 'No', 'No', 'No', 'No', '2018-08-13 12:00:39', 'pending', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stacksexport`
--

CREATE TABLE `tbl_stacksexport` (
  `id` int(11) NOT NULL,
  `manifestType` varchar(255) NOT NULL,
  `containerNumber` varchar(255) NOT NULL,
  `numberOfBillOfLading` int(11) NOT NULL,
  `cfsName` varchar(255) NOT NULL,
  `outgoingVessel` varchar(255) NOT NULL,
  `transportCharges` varchar(255) NOT NULL,
  `cfsCharges` varchar(255) NOT NULL,
  `customWarehouseCharges` varchar(255) NOT NULL,
  `kpaExportCharges` varchar(255) NOT NULL,
  `invoiceFile` varchar(255) NOT NULL DEFAULT 'file',
  `invoiceDisplay` int(11) NOT NULL DEFAULT '0',
  `postUser` varchar(255) NOT NULL,
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_stacksexport`
--

INSERT INTO `tbl_stacksexport` (`id`, `manifestType`, `containerNumber`, `numberOfBillOfLading`, `cfsName`, `outgoingVessel`, `transportCharges`, `cfsCharges`, `customWarehouseCharges`, `kpaExportCharges`, `invoiceFile`, `invoiceDisplay`, `postUser`, `postDate`) VALUES
(14, 'Re-Export', '567', 4, 'GGU', '7UGF', '5678', '6788', '66754', '54556', 'file', 1, 'kimatia', '10:24 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stackstranshipment`
--

CREATE TABLE `tbl_stackstranshipment` (
  `id` int(11) NOT NULL,
  `uniqueManifestCode` varchar(255) NOT NULL,
  `manifestName` varchar(255) NOT NULL,
  `manifestFileNumber` varchar(255) NOT NULL,
  `billOfLadingNumber` int(11) NOT NULL,
  `manifestFile` varchar(255) NOT NULL DEFAULT 'manifestImageFile',
  `manifestStatus` varchar(255) NOT NULL DEFAULT 'active',
  `display` int(11) NOT NULL DEFAULT '0',
  `tempVesselDisplay` int(11) NOT NULL DEFAULT '0',
  `invoiceDisplay` varchar(11) NOT NULL DEFAULT '0',
  `activeDeactive` int(11) NOT NULL DEFAULT '0',
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_stackstranshipment`
--

INSERT INTO `tbl_stackstranshipment` (`id`, `uniqueManifestCode`, `manifestName`, `manifestFileNumber`, `billOfLadingNumber`, `manifestFile`, `manifestStatus`, `display`, `tempVesselDisplay`, `invoiceDisplay`, `activeDeactive`, `postDate`) VALUES
(61, '8832ae39136fb470b3fbbf9f47b4570d', 'Direct Transhipment', 'DF45', 7, 'joel16.jpg', 'active', 1, 1, '1', 0, '10:18 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stacksverification`
--

CREATE TABLE `tbl_stacksverification` (
  `id` int(11) NOT NULL,
  `valescoAction` varchar(255) NOT NULL,
  `containerNumber` varchar(255) NOT NULL,
  `billOfLadingNumber` int(11) NOT NULL,
  `dateOfReceipt` varchar(255) NOT NULL,
  `dateOfVerification` varchar(255) NOT NULL,
  `oldSealNumber` varchar(255) NOT NULL,
  `newSealNumber` varchar(255) NOT NULL,
  `dateOfSubmission` varchar(255) NOT NULL,
  `invoiceFile` varchar(255) NOT NULL DEFAULT 'invoiceFile',
  `invoiceDisplay` int(11) NOT NULL DEFAULT '0',
  `postUser` varchar(255) NOT NULL,
  `postTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_stacksverification`
--

INSERT INTO `tbl_stacksverification` (`id`, `valescoAction`, `containerNumber`, `billOfLadingNumber`, `dateOfReceipt`, `dateOfVerification`, `oldSealNumber`, `newSealNumber`, `dateOfSubmission`, `invoiceFile`, `invoiceDisplay`, `postUser`, `postTime`) VALUES
(19, 'Verification', '67UH', 5, '2018-08-11', '2018-08-08', '567G', '446H', '568UG', 'invoiceFile', 0, 'kimatia', '10:27 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_treciept`
--

CREATE TABLE `tbl_treciept` (
  `id` int(10) NOT NULL,
  `stackNumber` varchar(100) NOT NULL,
  `trecieptNo` varchar(100) NOT NULL,
  `treciept_file` varchar(100) NOT NULL,
  `userId` int(10) NOT NULL,
  `postTime` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_treciept`
--

INSERT INTO `tbl_treciept` (`id`, `stackNumber`, `trecieptNo`, `treciept_file`, `userId`, `postTime`) VALUES
(3, 'VAL/45/2018', 'qwerff', 'joel6.jpg', 1, '2018-08-13 11:39:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userPass` varchar(100) NOT NULL,
  `userPhone` varchar(20) NOT NULL,
  `nationalId` varchar(100) DEFAULT NULL,
  `userCity` varchar(255) NOT NULL,
  `userCountry` varchar(255) NOT NULL,
  `userPic` varchar(255) NOT NULL,
  `loginType` varchar(100) DEFAULT 'user',
  `superType` varchar(255) NOT NULL DEFAULT 'useradmin',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `user_login` int(11) NOT NULL DEFAULT '0',
  `status` varchar(100) DEFAULT 'No',
  `online` varchar(100) NOT NULL DEFAULT 'Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userID`, `userName`, `userEmail`, `userPass`, `userPhone`, `nationalId`, `userCity`, `userCountry`, `userPic`, `loginType`, `superType`, `user_status`, `user_login`, `status`, `online`) VALUES
(1, 'kimatia', 'kimatiadaniel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2345678', '56789', 'Nairobi', 'kenya', '29512614_361711760996813_2045908663587045376_n.jpg', 'admin', 'superadmin', 1, 219, 'No', 'Yes'),
(14, 'joshua', 'joshua@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', '8765456', '7654567', 'kiembeni', 'America', 'user.png', 'admin', 'useradmin', 0, 216, 'No', 'Yes'),
(16, 'steve', 'steveomutuku1998@gmail.com', 'a15f1bca111f809a9565f7345c11df01', '0746718575', '35527117', 'mombasa', 'kenya', 'user.png', 'worker', 'useradmin', 0, 0, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_verification`
--

CREATE TABLE `tbl_verification` (
  `id` int(11) NOT NULL,
  `uniqueManifestCode` varchar(255) NOT NULL,
  `stackID` varchar(11) NOT NULL,
  `iterateTittle` varchar(11) NOT NULL DEFAULT '1',
  `manifestName` varchar(255) NOT NULL,
  `billOfLadingNumber` int(255) NOT NULL,
  `display` varchar(11) NOT NULL DEFAULT '0',
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_verification`
--

INSERT INTO `tbl_verification` (`id`, `uniqueManifestCode`, `stackID`, `iterateTittle`, `manifestName`, `billOfLadingNumber`, `display`, `postDate`) VALUES
(239, '98b418276d571e623651fc1d471c7811', '19', '5', 'Verification', 5, '0', '10:27 AM.'),
(240, '98b418276d571e623651fc1d471c7811', '19', '5', 'Verification', 5, '0', '10:27 AM.'),
(241, '98b418276d571e623651fc1d471c7811', '19', '5', 'Verification', 5, '0', '10:27 AM.'),
(242, '98b418276d571e623651fc1d471c7811', '19', '5', 'Verification', 5, '1', '10:27 AM.'),
(243, '98b418276d571e623651fc1d471c7811', '19', '5', 'Verification', 5, '0', '10:27 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_verificationbols`
--

CREATE TABLE `tbl_verificationbols` (
  `id` int(11) NOT NULL,
  `bolID` varchar(255) NOT NULL,
  `manifestFileNumber` varchar(255) NOT NULL DEFAULT 'N/A',
  `manifestName` varchar(255) NOT NULL,
  `bolNumber` varchar(255) NOT NULL,
  `relatedBolTotalNumber` varchar(255) NOT NULL,
  `arrivalVesselName` varchar(255) NOT NULL,
  `voyageNumber` varchar(255) NOT NULL,
  `dateOfArrival` varchar(255) NOT NULL,
  `containerNumber` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `sealNumber` varchar(255) NOT NULL,
  `bolFile` varchar(255) NOT NULL DEFAULT 'img',
  `updated` varchar(255) NOT NULL DEFAULT 'NO',
  `postUser` varchar(255) NOT NULL DEFAULT 'user',
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_verificationbols`
--

INSERT INTO `tbl_verificationbols` (`id`, `bolID`, `manifestFileNumber`, `manifestName`, `bolNumber`, `relatedBolTotalNumber`, `arrivalVesselName`, `voyageNumber`, `dateOfArrival`, `containerNumber`, `description`, `sealNumber`, `bolFile`, `updated`, `postUser`, `postDate`) VALUES
(94, '242', 'N/A', 'Verification', '7', '5', 'VVF', 'TGG', '2018-08-24', '56YG', 'GVGVFFD', 'DFRT', '45918.jpg', 'NO', 'kimatia', '10:28 AM.');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_verificationlogs`
--

CREATE TABLE `tbl_verificationlogs` (
  `id` int(11) NOT NULL,
  `userIdentity` varchar(11) NOT NULL,
  `postUser` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `postDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_verifylogs`
--

CREATE TABLE `tbl_verifylogs` (
  `id` int(11) NOT NULL,
  `stackID` varchar(11) NOT NULL DEFAULT 'N/A',
  `userID` varchar(11) NOT NULL DEFAULT 'N/A',
  `postUser` varchar(255) NOT NULL DEFAULT 'N/A',
  `action` varchar(255) NOT NULL DEFAULT 'N/A',
  `postDate` varchar(255) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vessel`
--

CREATE TABLE `tbl_vessel` (
  `id` int(11) NOT NULL,
  `stackID` int(11) NOT NULL,
  `vesselName` varchar(255) NOT NULL,
  `bookingNumber` varchar(255) NOT NULL,
  `bookingCopy` varchar(255) NOT NULL DEFAULT 'N/A',
  `bookingDate` varchar(255) NOT NULL,
  `postDate` varchar(255) NOT NULL DEFAULT 'N/A',
  `postTime` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vessel`
--

INSERT INTO `tbl_vessel` (`id`, `stackID`, `vesselName`, `bookingNumber`, `bookingCopy`, `bookingDate`, `postDate`, `postTime`) VALUES
(23, 61, 'RTU7', '679H', '863931.jpg', '10:21 AM.', '13:08:18', '10:22 AM.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_action`
--
ALTER TABLE `tbl_action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_billoflading`
--
ALTER TABLE `tbl_billoflading`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stackNumber_2` (`stackNumber`),
  ADD KEY `id` (`id`),
  ADD KEY `id_2` (`id`),
  ADD KEY `billofLadingNumber` (`billofLadingNumber`),
  ADD KEY `stackNumber` (`stackNumber`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `tbl_bol`
--
ALTER TABLE `tbl_bol`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_certificateofconformity`
--
ALTER TABLE `tbl_certificateofconformity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `stackNumber` (`stackNumber`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ecert`
--
ALTER TABLE `tbl_ecert`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `stackNumber` (`stackNumber`);

--
-- Indexes for table `tbl_exportlogs`
--
ALTER TABLE `tbl_exportlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_idf`
--
ALTER TABLE `tbl_idf`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `stackNumber` (`stackNumber`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `stackNumber` (`stackNumber`);

--
-- Indexes for table `tbl_invoiceexport`
--
ALTER TABLE `tbl_invoiceexport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_invoiceverify`
--
ALTER TABLE `tbl_invoiceverify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_kbs`
--
ALTER TABLE `tbl_kbs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `stackNumber` (`stackNumber`);

--
-- Indexes for table `tbl_lbook`
--
ALTER TABLE `tbl_lbook`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `stackNumber` (`stackNumber`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_manifest`
--
ALTER TABLE `tbl_manifest`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_manifestinvoice`
--
ALTER TABLE `tbl_manifestinvoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_manifestlogs`
--
ALTER TABLE `tbl_manifestlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_manifestview`
--
ALTER TABLE `tbl_manifestview`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_quadruplicate`
--
ALTER TABLE `tbl_quadruplicate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `stackNumber` (`stackNumber`);

--
-- Indexes for table `tbl_reexport`
--
ALTER TABLE `tbl_reexport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reexportbols`
--
ALTER TABLE `tbl_reexportbols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reexportlogs`
--
ALTER TABLE `tbl_reexportlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stacks`
--
ALTER TABLE `tbl_stacks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `stackNumber` (`stackNumber`);

--
-- Indexes for table `tbl_stacksexport`
--
ALTER TABLE `tbl_stacksexport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stackstranshipment`
--
ALTER TABLE `tbl_stackstranshipment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_stacksverification`
--
ALTER TABLE `tbl_stacksverification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_treciept`
--
ALTER TABLE `tbl_treciept`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `stackNumber` (`stackNumber`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userEmail` (`userEmail`),
  ADD UNIQUE KEY `nationalId` (`nationalId`),
  ADD KEY `userName` (`userName`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_verification`
--
ALTER TABLE `tbl_verification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_verificationbols`
--
ALTER TABLE `tbl_verificationbols`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_verificationlogs`
--
ALTER TABLE `tbl_verificationlogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_verifylogs`
--
ALTER TABLE `tbl_verifylogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vessel`
--
ALTER TABLE `tbl_vessel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_action`
--
ALTER TABLE `tbl_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tbl_billoflading`
--
ALTER TABLE `tbl_billoflading`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_bol`
--
ALTER TABLE `tbl_bol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `tbl_certificateofconformity`
--
ALTER TABLE `tbl_certificateofconformity`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_ecert`
--
ALTER TABLE `tbl_ecert`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_exportlogs`
--
ALTER TABLE `tbl_exportlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `tbl_idf`
--
ALTER TABLE `tbl_idf`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_invoiceexport`
--
ALTER TABLE `tbl_invoiceexport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_invoiceverify`
--
ALTER TABLE `tbl_invoiceverify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_kbs`
--
ALTER TABLE `tbl_kbs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_lbook`
--
ALTER TABLE `tbl_lbook`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=220;
--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT for table `tbl_manifest`
--
ALTER TABLE `tbl_manifest`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=290;
--
-- AUTO_INCREMENT for table `tbl_manifestinvoice`
--
ALTER TABLE `tbl_manifestinvoice`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_manifestlogs`
--
ALTER TABLE `tbl_manifestlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `tbl_manifestview`
--
ALTER TABLE `tbl_manifestview`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
--
-- AUTO_INCREMENT for table `tbl_quadruplicate`
--
ALTER TABLE `tbl_quadruplicate`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_reexport`
--
ALTER TABLE `tbl_reexport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `tbl_reexportbols`
--
ALTER TABLE `tbl_reexportbols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `tbl_reexportlogs`
--
ALTER TABLE `tbl_reexportlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_stacks`
--
ALTER TABLE `tbl_stacks`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_stacksexport`
--
ALTER TABLE `tbl_stacksexport`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_stackstranshipment`
--
ALTER TABLE `tbl_stackstranshipment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tbl_stacksverification`
--
ALTER TABLE `tbl_stacksverification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tbl_treciept`
--
ALTER TABLE `tbl_treciept`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_verification`
--
ALTER TABLE `tbl_verification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;
--
-- AUTO_INCREMENT for table `tbl_verificationbols`
--
ALTER TABLE `tbl_verificationbols`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;
--
-- AUTO_INCREMENT for table `tbl_verificationlogs`
--
ALTER TABLE `tbl_verificationlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_verifylogs`
--
ALTER TABLE `tbl_verifylogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `tbl_vessel`
--
ALTER TABLE `tbl_vessel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_billoflading`
--
ALTER TABLE `tbl_billoflading`
  ADD CONSTRAINT `fkstackNumberbol` FOREIGN KEY (`stackNumber`) REFERENCES `tbl_stacks` (`stackNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkuserIDtblusers` FOREIGN KEY (`userId`) REFERENCES `tbl_users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_certificateofconformity`
--
ALTER TABLE `tbl_certificateofconformity`
  ADD CONSTRAINT `fkstackNumberCOC` FOREIGN KEY (`stackNumber`) REFERENCES `tbl_stacks` (`stackNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkuserIDcoc` FOREIGN KEY (`userId`) REFERENCES `tbl_users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_ecert`
--
ALTER TABLE `tbl_ecert`
  ADD CONSTRAINT `fkstackNumberecert` FOREIGN KEY (`stackNumber`) REFERENCES `tbl_stacks` (`stackNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_idf`
--
ALTER TABLE `tbl_idf`
  ADD CONSTRAINT `fkstackNumberIDF` FOREIGN KEY (`stackNumber`) REFERENCES `tbl_stacks` (`stackNumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkuserIDidf` FOREIGN KEY (`userId`) REFERENCES `tbl_users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_invoice`
--
ALTER TABLE `tbl_invoice`
  ADD CONSTRAINT `fkstackNumberinvoice` FOREIGN KEY (`stackNumber`) REFERENCES `tbl_stacks` (`stackNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_kbs`
--
ALTER TABLE `tbl_kbs`
  ADD CONSTRAINT `fkstackNumberkbs` FOREIGN KEY (`stackNumber`) REFERENCES `tbl_stacks` (`stackNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_lbook`
--
ALTER TABLE `tbl_lbook`
  ADD CONSTRAINT `fkstackNumberlbook` FOREIGN KEY (`stackNumber`) REFERENCES `tbl_stacks` (`stackNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_quadruplicate`
--
ALTER TABLE `tbl_quadruplicate`
  ADD CONSTRAINT `fkstackNumberquadruplicate` FOREIGN KEY (`stackNumber`) REFERENCES `tbl_stacks` (`stackNumber`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbl_treciept`
--
ALTER TABLE `tbl_treciept`
  ADD CONSTRAINT `fkstackNumbertreciept` FOREIGN KEY (`stackNumber`) REFERENCES `tbl_stacks` (`stackNumber`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;