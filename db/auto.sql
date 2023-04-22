-- Adminer 4.8.1 MySQL 10.6.11-MariaDB-1 dump

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

TRUNCATE `admin`;
INSERT INTO `admin` (`id`, `username`, `email`, `password`, `fname`, `lname`, `gender`, `dob`, `contact`, `address`, `image`, `created_on`, `group_id`) VALUES
(1,	'admin',	'admin@admin.in',	'aa7f019c326413d5b8bcad4314228bcd33ef557f5d81c7cc977f7728156f4357',	'Nikhil',	'Bhalerao',	'Male',	'1988-05-29',	'9423979339',	'Nashik',	'20141025_004121_918_Developer.png',	'2018-04-30',	1);

DROP TABLE IF EXISTS `allot`;
CREATE TABLE `allot` (
  `id` int(60) NOT NULL AUTO_INCREMENT,
  `exam_id` int(50) NOT NULL,
  `room_type_id` int(60) NOT NULL,
  `class_id` int(50) NOT NULL,
  `added_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

TRUNCATE `allot`;
INSERT INTO `allot` (`id`, `exam_id`, `room_type_id`, `class_id`, `added_date`) VALUES
(1,	20,	1,	1,	'2023-03-26'),
(2,	20,	2,	1,	'2023-03-26'),
(3,	20,	1,	1,	'2023-03-26');

DROP TABLE IF EXISTS `allot_student`;
CREATE TABLE `allot_student` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `allot_id` int(60) NOT NULL,
  `exam_id` int(50) NOT NULL,
  `exam_date` date NOT NULL,
  `start_time` varchar(20) DEFAULT NULL,
  `end_time` varchar(20) DEFAULT NULL,
  `room_id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL,
  `teacher_id` int(50) DEFAULT NULL,
  `stud_id` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

TRUNCATE `allot_student`;
INSERT INTO `allot_student` (`id`, `allot_id`, `exam_id`, `exam_date`, `start_time`, `end_time`, `room_id`, `student_id`, `teacher_id`, `stud_id`) VALUES
(1,	1,	20,	'2022-12-06',	'',	'',	1,	1,	3,	'1001'),
(2,	1,	20,	'2022-12-06',	'',	'',	1,	2,	3,	'1002'),
(3,	1,	20,	'2022-12-06',	'',	'',	1,	3,	3,	'1003'),
(4,	1,	20,	'2022-12-06',	'',	'',	1,	4,	3,	'1004');

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

TRUNCATE `exam`;

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

TRUNCATE `manage_website`;
INSERT INTO `manage_website` (`id`, `title`, `short_title`, `logo`, `footer`, `currency_code`, `currency_symbol`, `login_logo`, `invoice_logo`, `background_login_image`) VALUES
(1,	'GOVT ARTS SALEM-7 EXAM CONTROL',	'EXAM CONTROL',	'images.jpg',	'Upturn India Technology',	'INR',	'$',	'images.jpg',	'',	'1.jpg');

DROP TABLE IF EXISTS `room`;
CREATE TABLE `room` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `type_id` int(60) NOT NULL,
  `name` varchar(30) NOT NULL,
  `alacated` varchar(10) NOT NULL,
  `strenght` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

TRUNCATE `room`;
INSERT INTO `room` (`id`, `type_id`, `name`, `alacated`, `strenght`) VALUES
(1,	1,	'science-1',	'0',	'23'),
(2,	2,	'maths-1',	'0',	'28'),
(3,	1,	'science-2',	'0',	'25'),
(4,	3,	'MC-1',	'0',	'30');

DROP TABLE IF EXISTS `room_type`;
CREATE TABLE `room_type` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `roomname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

TRUNCATE `room_type`;
INSERT INTO `room_type` (`id`, `roomname`) VALUES
(1,	'Building-1'),
(2,	'Building-2'),
(3,	'Building-3');

DROP TABLE IF EXISTS `tbl_class`;
CREATE TABLE `tbl_class` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `classname` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

TRUNCATE `tbl_class`;

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

TRUNCATE `tbl_email_config`;
INSERT INTO `tbl_email_config` (`e_id`, `name`, `mail_driver_host`, `mail_port`, `mail_username`, `mail_password`, `smtp_sec_type`, `mail_encrypt`) VALUES
(1,	'<student register> ',	'smtp.gmail.com',	587,	'ndbhalerao91@gmail.com',	'abc@123',	'TLS',	'sdsad');

DROP TABLE IF EXISTS `tbl_group`;
CREATE TABLE `tbl_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

TRUNCATE `tbl_group`;
INSERT INTO `tbl_group` (`id`, `name`, `description`) VALUES
(1,	'admin',	'admin');

DROP TABLE IF EXISTS `tbl_permission`;
CREATE TABLE `tbl_permission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `operation` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

TRUNCATE `tbl_permission`;
INSERT INTO `tbl_permission` (`id`, `name`, `display_name`, `operation`) VALUES
(1,	'manage_student',	'Manage Student',	'manage_student'),
(2,	'add_student',	'Add Student',	'add_student'),
(3,	'edit_student',	'Edit Student',	'edit_student'),
(4,	'delete_student',	'Delete Student',	'delete_student'),
(5,	'manage_teacher',	'Manage Teacher',	'manage_teacher'),
(6,	'add_teacher',	'Add Teacher',	'add_teacher'),
(7,	'edit_teacher',	'Edit Teacher',	'edit_teacher'),
(8,	'delete_teacher',	'Delete Teacher',	'delete_teacher'),
(9,	'manage_subject',	'Manage Subject',	'manage_subject'),
(10,	'add_subject',	'Add Subject',	'add_subject'),
(11,	'edit_subject',	'Edit Subject',	'edit_subject'),
(12,	'delete_subject',	'Delete Subject',	'delete_subject'),
(13,	'manage_class',	'Manage Class',	'manage_class'),
(14,	'add_class',	'Add Class',	'add_class'),
(15,	'edit_class',	'Edit Class',	'edit_class'),
(16,	'delete_class',	'Delete Class',	'delete_class'),
(17,	'manage_user',	'Manage User',	'manage_user'),
(18,	'add_user',	'Add User',	'add_user'),
(19,	'edit_user',	'Edit User',	'edit_user'),
(20,	'delete_user',	'Delete User',	'delete_user'),
(21,	'manage_exam',	'Manage Exam',	'manage_exam'),
(22,	'manage_Sub_asign',	'Manage Subject Asign',	'manage_Sub_asign'),
(26,	'manage_attendence',	'Manage Attendence',	'manage_attendence');

DROP TABLE IF EXISTS `tbl_permission_role`;
CREATE TABLE `tbl_permission_role` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `permission_id` int(30) NOT NULL,
  `role_id` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

TRUNCATE `tbl_permission_role`;
INSERT INTO `tbl_permission_role` (`id`, `permission_id`, `role_id`) VALUES
(1,	1,	1),
(2,	2,	1),
(3,	3,	1),
(4,	4,	1),
(5,	5,	1),
(6,	6,	1),
(7,	7,	1),
(8,	8,	1),
(9,	9,	1),
(10,	10,	1),
(11,	11,	1),
(12,	12,	1),
(13,	13,	1),
(14,	14,	1),
(15,	15,	1),
(16,	16,	1),
(17,	17,	1),
(18,	18,	1),
(21,	21,	1),
(22,	22,	1),
(23,	23,	1),
(24,	24,	1),
(25,	25,	1),
(26,	26,	1);

DROP TABLE IF EXISTS `tbl_sms_config`;
CREATE TABLE `tbl_sms_config` (
  `smsid` int(20) NOT NULL AUTO_INCREMENT,
  `senderid` int(20) NOT NULL,
  `sms_username` varchar(30) NOT NULL,
  `sms_password` varchar(20) NOT NULL,
  `auth_key` varchar(80) NOT NULL,
  PRIMARY KEY (`smsid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

TRUNCATE `tbl_sms_config`;
INSERT INTO `tbl_sms_config` (`smsid`, `senderid`, `sms_username`, `sms_password`, `auth_key`) VALUES
(1,	101,	'username',	'password',	'authkey');

DROP TABLE IF EXISTS `tbl_student`;
CREATE TABLE `tbl_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` varchar(50) NOT NULL,
  `sfname` varchar(30) NOT NULL,
  `slname` varchar(30) NOT NULL,
  `classname` varchar(30) NOT NULL,
  `semail` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `sgender` varchar(30) NOT NULL,
  `sdob` date NOT NULL,
  `scontact` varchar(10) NOT NULL,
  `saddress` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

TRUNCATE `tbl_student`;

DROP TABLE IF EXISTS `tbl_subasign`;
CREATE TABLE `tbl_subasign` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cls_id` varchar(10) NOT NULL,
  `p_id` varchar(10) NOT NULL,
  `status` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

TRUNCATE `tbl_subasign`;
INSERT INTO `tbl_subasign` (`id`, `cls_id`, `p_id`, `status`) VALUES
(19,	'1',	'1',	0),
(20,	'1',	'2',	0),
(21,	'1',	'4',	0),
(22,	'4',	'1',	0);

DROP TABLE IF EXISTS `tbl_subject`;
CREATE TABLE `tbl_subject` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `paper_code` varchar(10) NOT NULL,
  `subjectname` varchar(54) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

TRUNCATE `tbl_subject`;

DROP TABLE IF EXISTS `tbl_teacher`;
CREATE TABLE `tbl_teacher` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `tfname` varchar(50) NOT NULL,
  `tlname` varchar(50) NOT NULL,
  `temail` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `tgender` varchar(50) NOT NULL,
  `tdob` date NOT NULL,
  `tcontact` varchar(11) NOT NULL,
  `taddress` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

TRUNCATE `tbl_teacher`;

-- 2023-04-22 13:53:51
