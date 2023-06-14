-- Adminer 4.8.1 MySQL 10.11.2-MariaDB-1 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `auto`;
CREATE DATABASE `auto` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `auto`;

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(500) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(500) NOT NULL,
  `gender` varchar(500) NOT NULL,
  `dob` text NOT NULL,
  `contact` text NOT NULL,
  `address` varchar(500) NOT NULL,
  `image` varchar(2000) NOT NULL,
  `created_on` date NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `allot`;
CREATE TABLE `allot` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `exam_id` int(50) NOT NULL,
  `room_type_id` int(60) NOT NULL,
  `class_id` int(50) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `modify_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `allot_student`;
CREATE TABLE `allot_student` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `allot_id` int(60) NOT NULL,
  `exam_id` int(50) NOT NULL,
  `start_time` varchar(20) DEFAULT NULL,
  `end_time` varchar(20) DEFAULT NULL,
  `room_id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL,
  `teacher_id` int(50) DEFAULT NULL,
  `stud_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `exam`;
CREATE TABLE `exam` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `p_id` varchar(20) NOT NULL,
  `session` varchar(20) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `exam_date` date NOT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `added_date` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `manage_website`;
CREATE TABLE `manage_website` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(600) NOT NULL,
  `short_title` varchar(600) NOT NULL,
  `logo` text NOT NULL,
  `footer` text NOT NULL,
  `currency_code` varchar(600) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `currency_symbol` varchar(10) NOT NULL,
  `login_logo` text NOT NULL,
  `invoice_logo` text NOT NULL,
  `background_login_image` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `type_id` int(60) NOT NULL,
  `name` varchar(30) NOT NULL,
  `strenght` int(11) NOT NULL,
  `alacated` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `room_type`;
CREATE TABLE `room_type` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `roomname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `tbl_class`;
CREATE TABLE `tbl_class` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `dept_id` int(11) NOT NULL,
  `classname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `tbl_department`;
CREATE TABLE `tbl_department` (
  `dept_id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(200) NOT NULL,
  `dept_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`dept_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `tbl_email_config`;
CREATE TABLE `tbl_email_config` (
  `e_id` int(21) NOT NULL AUTO_INCREMENT,
  `name` varchar(500) NOT NULL,
  `mail_driver_host` varchar(5000) NOT NULL,
  `mail_port` int(50) NOT NULL,
  `mail_username` varchar(50) NOT NULL,
  `mail_password` varchar(35) NOT NULL,
  `smtp_sec_type` varchar(30) NOT NULL,
  `mail_encrypt` varchar(300) NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `tbl_group`;
CREATE TABLE `tbl_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `tbl_payment`;
CREATE TABLE `tbl_payment` (
  `pay_Id` int(100) NOT NULL AUTO_INCREMENT,
  `stud_Id` varchar(50) DEFAULT '0',
  `MID` varchar(255) DEFAULT NULL,
  `WEBSITE` varchar(255) DEFAULT NULL,
  `INDUSTRY_TYPE_ID` varchar(255) DEFAULT NULL,
  `CHANNEL_ID` varchar(255) DEFAULT NULL,
  `ORDER_ID` varchar(255) DEFAULT NULL,
  `MOBILE_NO` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `TXN_AMOUNT` varchar(255) DEFAULT NULL,
  `CALLBACK_URL` varchar(255) DEFAULT NULL,
  `MERCHANT_KEY` varchar(255) DEFAULT NULL,
  `CHECKSUMHASH` varchar(255) DEFAULT NULL,
  `TXNID` varchar(255) DEFAULT NULL,
  `BANKTXNID` varchar(255) DEFAULT NULL,
  `TXNAMOUNT` varchar(255) DEFAULT NULL,
  `STATUS` varchar(255) DEFAULT NULL,
  `TXNTYPE` varchar(255) DEFAULT NULL,
  `GATEWAYNAME` varchar(255) DEFAULT NULL,
  `RESPCODE` varchar(255) DEFAULT NULL,
  `RESPMSG` varchar(255) DEFAULT NULL,
  `BANKNAME` varchar(255) DEFAULT NULL,
  `PAYMENTMODE` varchar(255) DEFAULT NULL,
  `REFUNDAMT` varchar(255) DEFAULT NULL,
  `TXNDATE` varchar(255) DEFAULT NULL,
  `pay_amount` int(10) DEFAULT NULL,
  `payment_status` varchar(10) DEFAULT NULL,
  `pay_type` varchar(30) DEFAULT NULL,
  `delete_pay` varchar(10) DEFAULT NULL,
  `entry_date` datetime DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `orgId` int(100) DEFAULT NULL,
  `userId` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`pay_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `tbl_permission`;
CREATE TABLE `tbl_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `operation` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `tbl_permission_role`;
CREATE TABLE `tbl_permission_role` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `permission_id` int(30) NOT NULL,
  `role_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `tbl_sms_config`;
CREATE TABLE `tbl_sms_config` (
  `smsid` int(20) NOT NULL AUTO_INCREMENT,
  `senderid` int(20) NOT NULL,
  `sms_username` varchar(30) NOT NULL,
  `sms_password` varchar(20) NOT NULL,
  `auth_key` varchar(80) NOT NULL,
  PRIMARY KEY (`smsid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` varchar(50) NOT NULL,
  `sfname` varchar(30) NOT NULL,
  `slname` varchar(30) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `class_id` varchar(30) NOT NULL,
  `semail` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `sgender` varchar(30) NOT NULL,
  `sdob` date NOT NULL,
  `scontact` varchar(10) NOT NULL,
  `saddress` varchar(50) NOT NULL,
  `sstatus` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `tbl_subasign`;
CREATE TABLE `tbl_subasign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cls_id` varchar(10) NOT NULL,
  `p_id` varchar(10) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


DROP TABLE IF EXISTS `tbl_subject`;
CREATE TABLE `tbl_subject` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `part` varchar(10) NOT NULL,
  `paper_code` varchar(10) NOT NULL,
  `subjectname` varchar(500) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


DROP TABLE IF EXISTS `tbl_teacher`;
CREATE TABLE `tbl_teacher` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `tfname` varchar(50) NOT NULL,
  `tlname` varchar(50) NOT NULL,
  `Designation` varchar(50) NOT NULL,
  `temail` varchar(50) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `password` varchar(250) NOT NULL,
  `tgender` varchar(50) NOT NULL,
  `tdob` date NOT NULL,
  `tcontact` varchar(11) NOT NULL,
  `taddress` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


-- 2023-06-14 13:47:14
