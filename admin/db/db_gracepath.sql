/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `db_gracepath` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_gracepath`;

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
  `regno` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT '0',
  `name` varchar(250) DEFAULT NULL,
  `contact` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `course` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `college` varchar(250) DEFAULT NULL,
  `parentname` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `parentoccupation` varchar(250) DEFAULT NULL,
  `parentcontact` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `dateofbirth` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `aadhar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `nationality` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `religion` varchar(250) DEFAULT NULL,
  `community` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `cast` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `bloodgroup` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `hseschoolname` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `hseboard` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `hsemark` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `passoutyear` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `cert_10th` varchar(255) DEFAULT NULL,
  `cert_12th` varchar(255) DEFAULT NULL,
  `aadhar_file` varchar(255) DEFAULT NULL,
  `passport_photo` varchar(255) DEFAULT NULL,
  `createdat` datetime DEFAULT NULL,
  `createdby` int DEFAULT NULL,
  `updatedat` datetime DEFAULT NULL,
  `updatedby` int DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'Active',
  `isdeleted` smallint DEFAULT '0',
  `isreaded` smallint DEFAULT '0',
  PRIMARY KEY (`appid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `tbl_applications` (`appid`, `admissionyear`, `regno`, `name`, `contact`, `email`, `course`, `college`, `parentname`, `parentoccupation`, `parentcontact`, `address`, `dateofbirth`, `aadhar`, `nationality`, `religion`, `community`, `cast`, `bloodgroup`, `hseschoolname`, `hseboard`, `hsemark`, `passoutyear`, `cert_10th`, `cert_12th`, `aadhar_file`, `passport_photo`, `createdat`, `createdby`, `updatedat`, `updatedby`, `status`, `isdeleted`, `isreaded`) VALUES
	(5, 2026, '26110280885700', 'manoj', '9497326073', 'manoj.a.francis@gmail.com', 'MCA', 'Santhigiri', 'Francis', 'Planter', '8292383892', 'Alackathadathil\r\nVazhakulam', '1983-01-20', '123456792236', 'India', 'Christian', 'RC', 'SC', 'O+', 'St Augustin', 'Kerala', '450', '1998', 'uploads/certificates/26110280885700_cert_10th_6ae858a5c5c05.jpeg', 'uploads/certificates/26110280885700_cert_12th_6ae858a5c5ddc.pdf', 'uploads/certificates/26110280885700_aadhar_file_6ae858a5c5f83.jpg', 'uploads/certificates/26110280885700_passport_photo_6ae858a5c607c.jpg', '2026-11-02 15:02:00', NULL, NULL, NULL, 'Active', 0, 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
