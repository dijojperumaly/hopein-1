/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `db_vidyadhiraja` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_vidyadhiraja`;

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `role` text,
  `createdat` date DEFAULT NULL,
  `createdby` int DEFAULT NULL,
  `updatedat` date DEFAULT NULL,
  `updatedby` int DEFAULT NULL,
  `isdeletd` int DEFAULT '0',
  `status` varchar(50) DEFAULT 'Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tbl_admin` (`id`, `name`, `username`, `password`, `role`, `createdat`, `createdby`, `updatedat`, `updatedby`, `isdeletd`, `status`) VALUES
	(1, 'Administrator', 'admin', '12345', 'AD', NULL, NULL, NULL, NULL, 0, 'Active');

CREATE TABLE IF NOT EXISTS `tbl_applications` (
  `appid` int NOT NULL AUTO_INCREMENT,
  `admissionyear` int DEFAULT '0',
  `appno` varchar(250) DEFAULT '0',
  `name` varchar(250) DEFAULT NULL,
  `regionallanguage` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `aadharno` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bloodgroup` varchar(50) DEFAULT NULL,
  `admissionstandard` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `alternatecontact` varchar(50) DEFAULT NULL,
  `email` text,
  `fathername` varchar(250) DEFAULT NULL,
  `fatheroccupation` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` text,
  `mothername` varchar(250) DEFAULT NULL,
  `motheroccupation` varchar(400) DEFAULT NULL,
  `guardianname` varchar(250) DEFAULT NULL,
  `guardianrelation` varchar(250) DEFAULT NULL,
  `guardianoccupation` varchar(250) DEFAULT NULL,
  `guardianaddress` text,
  `previousschool` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `yearstuded` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `standaredstuded` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dateadmission` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dateleaving` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `dateofbirth` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `age` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `religion` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `caste` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `placebirth` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nationality` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `state` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `community` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `mothertongue` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tcno` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `vaccinationdate` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bodymark1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `bodymark2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `createdat` datetime DEFAULT NULL,
  `createdby` int DEFAULT NULL,
  `updatedat` datetime DEFAULT NULL,
  `updatedby` int DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Active',
  `isdeleted` smallint DEFAULT '0',
  `isreaded` smallint DEFAULT '0',
  PRIMARY KEY (`appid`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tbl_applications` (`appid`, `admissionyear`, `appno`, `name`, `regionallanguage`, `sex`, `aadharno`, `bloodgroup`, `admissionstandard`, `contact`, `alternatecontact`, `email`, `fathername`, `fatheroccupation`, `address`, `mothername`, `motheroccupation`, `guardianname`, `guardianrelation`, `guardianoccupation`, `guardianaddress`, `previousschool`, `yearstuded`, `standaredstuded`, `dateadmission`, `dateleaving`, `remarks`, `dateofbirth`, `age`, `religion`, `caste`, `placebirth`, `nationality`, `state`, `community`, `mothertongue`, `tcno`, `vaccinationdate`, `bodymark1`, `bodymark2`, `createdat`, `createdby`, `updatedat`, `updatedby`, `status`, `isdeleted`, `isreaded`) VALUES
	(17, 0, '0', 'dasas', 'dasd', 'male', '234234234454', NULL, 'V', '3453453456', NULL, 'vjcet@admin.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '20-10-1986', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-06 16:08:00', NULL, NULL, NULL, 'Active', 0, 0),
	(21, 0, '0', 'manoj francis', 'fsdf', 'male', '345234234556', 'O+', 'UKG', '5451455655', NULL, 'mm@gmail.com', 'dsf', 'sdf', 'dfsgsdfsd\r\nfsdfsdf      ', 'sdfdsf', 'fsdf', 'fsdfsd', 'dfsgsdf', 'sdfsd', 'rewr', 'swrer', '1987', 'asdasd', '20-11-1992', '', 'asdasd', '20-01-1993', '345', 'asdsad', 'sdfdsf', 'sdf', 'sdf', 'sdf', 'sdfdsf', 'sdf', 'asdas', '10-05-2024', 'dfds ', 'asd asd', '2024-11-12 16:14:00', NULL, '2024-11-18 11:27:00', 1, 'Active', 0, 1),
	(23, 0, '0', 'asdsad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'adsdsad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 0, 0),
	(24, 0, '0', 'asdsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 0, 0),
	(27, 0, '0', 'adsad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 0, 1),
	(29, 0, '0', 'asdasds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 0, 1),
	(30, 0, '0', 'asdsadsad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 0, 0),
	(31, 0, '0', 'asdsad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 0, 0),
	(32, 0, '0', 'asdsdsa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 0, 1),
	(33, 0, '0', 'sadsads', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 0, 0),
	(34, 0, '0', 'sadsadsad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 0, 1),
	(35, 0, '0', 'asdsad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Active', 0, 1),
	(36, 0, '24111835914300', 'xfcvxc', 'vcxvcxv', 'female', '453553566784', 'AB+', 'II', '344534534545', NULL, 'vjcet@admin.com', 'kikku', 'private', 'sfdf ', 'vvva', 'sdf', 'ghf', 'rthyrty', 'ytujkjkjhkhj fgh gfh fgh fg', 'hrtytrytrytrtytettertert', 'tyutyu', '3453', 'dfgfg', '20-10-2024', '18-12-2024', 'sdffsdf', '22-02-2020', '2', 'sdfd', 'fsdf', 'ewrgthy', 'tey', 'tertr', 'etert', 'etyert', '657', '10-2-2024', 'fhbgghdf', 'gdfgfg', '2024-11-18 11:31:00', NULL, '2024-11-18 11:33:00', 1, 'Active', 0, 1),
	(37, 2025, '24111868657500', 'Thomas', 'fdgfgfg', 'male', '345435455454', 'dd', 'UKG', '345346355345', NULL, 'vjcet@admin.com', 'gfrhgt', 'dghdeg', 'dfgf   ', 'dg', 'ghj', 'hjhgj', 'ghjghj', 'hgj', 'hgjhj', 'ghj', '2222', '1', '12-1-2024', '10-10-2022', 'dgfdgf', '01-02-1999', '4', 'fghdeg', 'dgh', 'dfghrhgf', 'gjkjgiu', 'tuyt', 'yujikyujiui', 'yuiuy', '4545', '28-2-2023', 'cvgfd', 'gdg', '2024-11-18 12:06:00', NULL, '2024-11-18 12:32:00', 1, 'Active', 0, 1),
	(38, 2025, '24111985081300', 'dfgfg', 'dfgf', 'male', '342532442345', 'o+', 'IX', '4353454356', NULL, '', 'fafa', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10-8-2024', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-19 12:13:00', NULL, NULL, NULL, 'Active', 0, 0),
	(39, 2025, '24111913860500', 'dfgf', 'dfgfdg', 'male', '345345435667', 'fgh', 'II', '34534543577', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11-11-2024', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-19 12:17:00', NULL, NULL, NULL, 'Active', 0, 0),
	(40, 2025, '24111981331000', 'fghgh', 'ghgh', 'male', '345345345556', 'a', 'UKG', '3454354567', NULL, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '01-02-2024', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-19 12:41:00', NULL, NULL, NULL, 'Active', 0, 0),
	(41, 2025, '24111990184300', 'dfg', 'dfgf', 'female', '456546456457', '', 'I', '45646456456', '2323234545', '', '', '', ' ', '', '', '', '', '', '', '', '', '', '', '', '', '10-01-2020', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-19 12:47:00', NULL, '2024-11-19 14:49:00', 1, 'Active', 0, 1),
	(42, 2025, '24111984824600', 'dfgf', 'dfg', 'male', '345435465656', 'A-', 'UKG', '34543534566', '43543545435', 'fd@gmail.com', 'francsis', 'farmer', '', 'bindhu', '', '', '', '', '', '', '', '', '', '', '', '20-10-2020', '', 'dsf', '', '', '', '', '', '', '', '', '', '', '2024-11-19 14:20:00', NULL, NULL, NULL, 'Active', 0, 0),
	(43, 2025, '2411191864300', 'sadsd', 'sd', 'male', '456546676765', 'dsf', 'VII', '4564566765', '', '', '', 'francis', '', 'valssa', '', '', '', '', '', '', '', '', '', '', '', '2-2-2021', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-19 15:57:00', NULL, NULL, NULL, 'Active', 0, 1),
	(44, 2025, '24111985338700', 'tttttt', '', 'male', '345345345345', '', 'VII', '34534534545', '', '', '', '', '     ', '', '', '', '', '', '', '', '', '', '', '', '', '10-5-2021', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-19 17:00:00', NULL, '2024-11-21 17:43:00', 1, 'Active', 0, 1),
	(45, 2025, '2411218112700', 'sdfdas', 'asdas', 'female', '345345435667', '', 'II', '2132133434', '2343445566', '', 'were', 'sdfd', ' assdsa\r\nsdsd\r\nsds', 'mother', 'mother occ', '', '', '', 'asdsd\r\nsadas\r\ndasd\r\nasd', '', '', '', '', '', '', '22-10-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-21 17:16:00', NULL, '2024-11-21 17:21:00', 1, 'Active', 0, 1),
	(46, 2025, '2411212380700', 'sads', '', 'male', '345345565677', '', 'II', '3453453456', '3453454355', '', 'dsfvs', 'sdf', '', 'asds', 'asd', '', '', '', '', '', '', '', '', '', '', '34-1-1001', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-21 17:42:00', NULL, NULL, NULL, 'Active', 0, 0),
	(47, 2025, '24112630190499', 'manoj', '', 'female', '345345435565', 'A+', 'VIII', '8475474135', '3262451891', 'manoj@gmail.com', 'francis', 'planter', 'alackathadathil', 'valsa', 'house wife', '', '', '', '', '', '', '', '', '', '', '10-05-2024', '20', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 14:47:00', NULL, NULL, NULL, 'Active', 0, 0),
	(49, 2025, '24112694697800', 'manoj francis', 'mal', 'male', '123456789012', 'O+', 'LKG', '9497326073', '9497326072', '', 'francis', 'farmer', '', 'valsa', 'house wife', '', '', '', '', '', '', '', '', '', '', '20-01-2020', '4', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 16:32:00', NULL, NULL, NULL, 'Active', 0, 0),
	(52, 2025, '24112629878700', 'doc', '', 'male', '123456789123', '', 'UKG', '7877845152', '5645679678', '', 'www', 'eee', '', 'eee', 'errr', '', '', '', '', '', '', '', '', '', '', '20-01-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 17:04:00', NULL, NULL, NULL, 'Active', 0, 0),
	(53, 2025, '2411267522700', 'manoj francis', '', 'male', '', '', 'UKG', '7877845152', '5645679678', '', 'www', 'eee', '', 'eee', 'errr', '', '', '', '', '', '', '', '', '', '', '20-01-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 17:05:00', NULL, NULL, NULL, 'Active', 0, 0),
	(54, 2025, '24112653317600', 'johnson', '', 'male', '121212121212', '', 'UKG', '9497326073', '5645679678', '', 'www', 'eee', '', 'eee', 'errr', '', '', '', '', '', '', '', '', '', '', '20-01-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 17:07:00', NULL, NULL, NULL, 'Active', 0, 0),
	(55, 2025, '24112666183899', 'fff', '', 'male', '', '', 'UKG', '9874563210', '5645679678', '', 'www', 'eee', '', 'eee', 'errr', '', '', '', '', '', '', '', '', '', '', '20-01-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 17:09:00', NULL, NULL, NULL, 'Active', 0, 0),
	(56, 2025, '24112657332600', 'fff', '', 'male', '', '', 'UKG', '9874563210', '5645679678', '', 'www', 'eee', '', 'eee', 'errr', '', '', '', '', '', '', '', '', '', '', '20-01-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 17:11:00', NULL, NULL, NULL, 'Active', 0, 0),
	(57, 2025, '241126982800', 'fff', '', 'male', '', '', 'UKG', '9874563210', '5645679678', '', 'www', 'eee', '', 'eee', 'errr', '', '', '', '', '', '', '', '', '', '', '20-01-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 17:11:00', NULL, NULL, NULL, 'Active', 0, 0),
	(58, 2025, '24112676119000', 'aaa', '', 'male', '', '', 'UKG', '9874563210', '5645679678', '', 'www', 'eee', '', 'eee', 'errr', '', '', '', '', '', '', '', '', '', '', '20-01-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 17:16:00', NULL, NULL, NULL, 'Active', 0, 0),
	(59, 2025, '24112657667400', 'awaw', '', 'male', '', '', 'UKG', '122312231223', '5645679678', '', 'www', 'eee', '', 'eee', 'errr', '', '', '', '', '', '', '', '', '', '', '20-01-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 17:17:00', NULL, NULL, NULL, 'Active', 0, 0),
	(60, 2025, '24112684715800', 'kiran', '', 'male', '', '', 'LKG', '9497326073', '5645679678', '', 'www', 'agre', '', 'val', 'mo', '', '', '', '', '', '', '', '', '', '', '20-01-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 17:24:00', NULL, NULL, NULL, 'Active', 0, 0),
	(61, 2025, '24112686511300', 'kiran', '', 'male', '', '', 'LKG', '9497326078', '1234567890', '', 'myf', 'f', '', 'my mo', 'mo', '', '', '', '', '', '', '', '', '', '', '20-01-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 17:27:00', NULL, NULL, NULL, 'Active', 0, 0),
	(62, 2025, '24112690197200', 'fghg', '', 'male', '', '', 'LKG', '9497326073', '1234567890', '', 'myf', 'f', '', 'my mo', 'house', '', '', '', '', '', '', '', '', '', '', '20-01-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 18:26:00', NULL, NULL, NULL, 'Active', 0, 0),
	(63, 2025, '24112670147200', 'Thomas', '', 'male', '', '', 'LKG', '9497326073', '5645679678', '', 'www', 'agre', '', 'my mo', 'house', '', '', '', '', '', '', '', '', '', '', '20-01-2000', '', '', '', '', '', '', '', '', '', '', '', '', '2024-11-26 18:29:00', NULL, NULL, NULL, 'Active', 0, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
