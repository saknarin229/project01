-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 27, 2022 at 12:48 PM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reserve-data`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `adminName` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `adminName`, `status`) VALUES
(1, 'admin', '123456', 'myadmin@admin.admin', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_appointment`
--

CREATE TABLE `data_appointment` (
  `id` int(11) NOT NULL,
  `diagnose_id_code` int(11) DEFAULT NULL,
  `hospita_code` varchar(50) DEFAULT NULL,
  `appointment_date` datetime DEFAULT NULL,
  `appointment_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_appointment`
--

INSERT INTO `data_appointment` (`id`, `diagnose_id_code`, `hospita_code`, `appointment_date`, `appointment_status`) VALUES
(1, 12345677, '181120', '2022-02-28 07:07:16', 0),
(2, 12345677, '9055', '2022-03-31 02:12:17', 0),
(3, 12345677, '926137', '2022-02-23 03:08:07', 0),
(4, 12345677, '181120', '2022-08-26 03:16:11', 0),
(5, 12345677, '181120', '2022-04-30 23:04:18', 0);

-- --------------------------------------------------------

--
-- Table structure for table `data_diagnose_user`
--

CREATE TABLE `data_diagnose_user` (
  `diagnose_id` int(11) NOT NULL,
  `diagnose_fullname` varchar(50) DEFAULT NULL,
  `diagnose_id_code` varchar(50) DEFAULT NULL,
  `diagnose_idCrad` int(20) DEFAULT NULL,
  `diagnose_birthday` date DEFAULT NULL,
  `diagnose_age` varchar(50) DEFAULT NULL,
  `diagnose_province` varchar(50) DEFAULT NULL,
  `diagnose_district` varchar(50) DEFAULT NULL,
  `diagnose_sub_district` varchar(50) DEFAULT NULL,
  `diagnose_Date_first_admission` datetime DEFAULT NULL,
  `diagnose_right_reatment` varchar(50) DEFAULT NULL,
  `diagnose_sub_right` varchar(50) DEFAULT NULL,
  `diagnose_Filter1` varchar(50) DEFAULT NULL,
  `diagnose_Craniofacial_filter` varchar(50) DEFAULT NULL,
  `diagnose_Filtering_Craniofacial_Syndromic` varchar(50) DEFAULT NULL,
  `diagnose_syndrome` varchar(50) DEFAULT NULL,
  `diagnose_status` int(11) NOT NULL DEFAULT '0',
  `diagnose_latAndlong` varchar(100) DEFAULT NULL,
  `diagnose_more` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_diagnose_user`
--

INSERT INTO `data_diagnose_user` (`diagnose_id`, `diagnose_fullname`, `diagnose_id_code`, `diagnose_idCrad`, `diagnose_birthday`, `diagnose_age`, `diagnose_province`, `diagnose_district`, `diagnose_sub_district`, `diagnose_Date_first_admission`, `diagnose_right_reatment`, `diagnose_sub_right`, `diagnose_Filter1`, `diagnose_Craniofacial_filter`, `diagnose_Filtering_Craniofacial_Syndromic`, `diagnose_syndrome`, `diagnose_status`, `diagnose_latAndlong`, `diagnose_more`) VALUES
(1, 'saknarin thinsaphung', '12345677', 2147483647, '2021-04-04', '2', 'loei', 'wangsaphung', 'phanoy', '2022-02-01 19:43:31', 'MyTest01', 'MyTest02', '', '', '', 'MyTest03', 0, '17.49771130602951, 101.71937495859422', 'MyTest04');

-- --------------------------------------------------------

--
-- Table structure for table `data_hospita`
--

CREATE TABLE `data_hospita` (
  `hospita_id` int(11) NOT NULL,
  `hospita_code` int(11) DEFAULT NULL,
  `hospita_image` varchar(100) DEFAULT NULL,
  `hospita_name` varchar(100) DEFAULT NULL,
  `hospita_address` varchar(100) DEFAULT NULL,
  `hospita_agency` varchar(30) DEFAULT NULL,
  `hospita_province` varchar(30) DEFAULT NULL,
  `hospita_map` text,
  `hospita_status` int(11) DEFAULT '0',
  `hospita_latAndlong` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_hospita`
--

INSERT INTO `data_hospita` (`hospita_id`, `hospita_code`, `hospita_image`, `hospita_name`, `hospita_address`, `hospita_agency`, `hospita_province`, `hospita_map`, `hospita_status`, `hospita_latAndlong`) VALUES
(1, 42303, 'image/20220225-1951341175515573957658989.png', 'โรงพยาบาลมหาราชนครเชียงใหม่', 'เลขที่ 110 ถ.อินทวโรรส ต.ศรีภูมิ อ.เมือง จ.เชียงใหม่ 50200', 'หน่ายงานรัฐ', 'เชียงใหม่', 'https://www.google.co.th/maps/place/18%C2%B047\'22.6%22N+98%C2%B058\'21.9%22E/@18.7896195,98.9705638,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xcf9f6f3c16daa832!8m2!3d18.7896195!4d98.9727525?hl=th', 0, '18.7896195,98.9727525'),
(2, 926137, 'image/20220225-1951061175515573957658989.png', 'โรงพยาบาลนครพิงค์', '159 หมู่ที่ 10 ถนนโชตนา ตำบลดอนแก้ว อำเภอแม่ริม จังหวัดเชียงใหม่ 50180', 'หน่ายงานรัฐ', 'เชียงใหม่', 'https://www.google.co.th/maps/place/18%C2%B051\'07.7%22N+98%C2%B058\'06.1%22E/@18.85213,98.9661669,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x71a1fcff90495d95!8m2!3d18.85213!4d98.9683556?hl=th', 0, '18.8521300, 98.9683556'),
(3, 181120, 'image/20220225-1950501175515573957658989.png', 'โรงพยาบาลจอมทอง', '259 หมู่ 2 ถนนเชียงใหม่-ฮอด ตำบลแขวงดอยแก้ว อำเภอเขตจอมทอง จังหวัดเชียงใหม่ 50160', 'หน่ายงานรัฐ', 'เชียงใหม่', 'https://www.google.co.th/maps/place/18%C2%B024\'22.5%22N+98%C2%B040\'26.5%22E/@18.4062567,98.6718255,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0xaf7d0c113fcf9bac!8m2!3d18.4062567!4d98.6740142?hl=th', 0, '18.4062567, 98.6740142'),
(4, 9055, 'image/20220225-1951161175515573957658989.png', 'โรงพยาบาลฝาง', '30 ม.4 ถ. โซตนา ต.เวียง อ.ฝาง จ.เชียงใหม่ 50110', 'หน่ายงานรัฐ', 'เชียงใหม่', 'https://www.google.co.th/maps/place/19%C2%B054\'48.0%22N+99%C2%B012\'23.6%22E/@19.913323,99.2043748,17z/data=!3m1!4b1!4m5!3m4!1s0x0:0x31869319abaab489!8m2!3d19.913323!4d99.2065635?hl=th', 0, '19.9133230, 99.2065635');

-- --------------------------------------------------------

--
-- Table structure for table `data_subdis`
--

CREATE TABLE `data_subdis` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data_subdis`
--

INSERT INTO `data_subdis` (`id`, `name`, `location`, `status`) VALUES
(1, 'พระสิงห์', '18.785,98.985', 0),
(2, 'หายยา', '18.777,98.984', 0),
(3, 'ช้างม่อย', '18.796,98.996', 0),
(4, 'ป่าตัน', '18.811,98.999', 0),
(5, 'ศรีภูมิ', '18.796,98.985', 0),
(6, 'ทรายมูล', '18.735,99.136', 0),
(7, 'สบแม่ข่า', '18.689,98.98', 0),
(8, 'สันผีเสื้อ', '18.841,98.998', 0),
(9, 'ทุ่งหลวง', '19.359,99.202', 0),
(10, 'หนองป่าครั่ง', '18.788,99.034', 0),
(11, 'ช้างคลาน', '18.774,98.996', 0),
(12, 'ตลาดขวัญ', '18.841,99.088', 0),
(13, 'หนองหอย', '18.758,99.015', 0),
(14, 'ทุ่งรวงทอง', '18.554,98.849', 0),
(15, 'ป่าบง', '18.736,99.059', 0),
(16, 'สันทรายหลวง', '18.857,99.046', 0),
(17, 'ริมเหนือ', '18.929,98.948', 0),
(18, 'ตลาดใหญ่', '18.81,99.127', 0),
(19, 'หางดง', '18.692,98.915', 0),
(20, 'สง่าบ้าน', '18.832,99.12', 0),
(21, 'ฟ้าฮ่าม', '18.816,99.008', 0),
(22, 'ไชยสถาน', '18.745,99.043', 0),
(23, 'ป่าลาน', '18.836,99.106', 0),
(24, 'ดอนแก้ว', '18.697,98.997', 0),
(25, 'ท่ากว้าง', '18.659,98.998', 0),
(26, 'สันป่าเปา', '18.861,99.084', 0),
(27, 'สันพระเนตร', '18.808,99.038', 0),
(28, 'วัดเกต', '18.785,99.011', 0),
(29, 'แม่คือ', '18.782,99.101', 0),
(30, 'ท่าศาลา', '18.77,99.034', 0),
(31, 'เวียง', '19.378,99.203', 0),
(32, 'สันนาเม็ง', '18.842,99.062', 0),
(33, 'สันกลาง', '18.775,99.056', 0),
(34, 'สันทรายน้อย', '18.819,99.024', 0),
(35, 'แม่ฮ้อยเงิน', '18.805,99.149', 0),
(36, 'ริมใต้', '18.914,98.964', 0),
(37, 'ยางเนิ้ง', '18.707,99.036', 0),
(38, 'สองแคว', '18.504,98.841', 0),
(39, 'ขัวมุง', '18.678,98.991', 0),
(40, 'ขุนคง', '18.673,98.956', 0),
(41, 'สำราญราษฎร์', '18.807,99.095', 0),
(42, 'ช่อแล', '19.144,99.024', 0),
(43, 'สารภี', '18.681,99.047', 0),
(44, 'ท่าวังพร้าว', '18.531,98.864', 0),
(45, 'เมืองเล็น', '18.896,99.08', 0),
(46, 'หนองแฝก', '18.691,99.019', 0),
(47, 'มะขามหลวง', '18.601,98.907', 0),
(48, 'สันผักหวาน', '18.719,98.97', 0),
(49, 'สันทราย', '18.64,98.972', 0),
(50, 'หนองผึ้ง', '18.735,99.021', 0),
(51, 'ท่าวังตาล', '18.718,99.007', 0),
(52, 'หนองแก๋ว', '18.674,98.933', 0),
(53, 'ทุ่งต้อม', '18.613,98.92', 0),
(54, 'มะขุนหวาน', '18.574,98.907', 0),
(55, 'เหมืองแก้ว', '18.898,98.983', 0),
(56, 'บ้านแหวน', '18.701,98.944', 0),
(57, 'แม่สา', '18.894,98.945', 0),
(58, 'ป่าแดด', '18.742,98.978', 0),
(59, 'ปงตำ', '19.748,99.145', 0),
(60, 'ชมภู', '18.694,99.071', 0),
(61, 'หนองตอง', '18.613,98.945', 0),
(62, 'แม่ปูคา', '18.785,99.126', 0),
(63, 'หารแก้ว', '18.65,98.922', 0),
(64, 'หนองควาย', '18.731,98.923', 0),
(65, 'ยุหว่า', '18.62,98.875', 0),
(66, 'ต้นเปา', '18.76,99.082', 0),
(67, 'หนองจ๊อม', '18.852,99.023', 0),
(68, 'สันกลาง', '18.665,98.871', 0),
(69, 'ทุ่งสะโตก', '18.586,98.849', 0),
(70, 'บ้านแม', '18.626,98.854', 0),
(71, 'สันปูเลย', '18.808,99.072', 0),
(72, 'บ้านกลาง', '18.557,98.887', 0),
(73, 'ร้องวัวแดง', '18.746,99.206', 0),
(74, 'แม่ก๊า', '18.574,98.939', 0),
(75, 'สันโป่ง', '18.954,98.954', 0),
(76, 'ป่าป้อง', '18.85,99.16', 0),
(77, 'ออนกลาง', '18.758,99.263', 0),
(78, 'แช่ช้าง', '18.722,99.154', 0),
(79, 'บ้านแอ่น', '18.053,98.626', 0),
(80, 'สันมหาพน', '19.118,98.946', 0),
(81, 'สันกำแพง', '18.756,99.133', 0),
(82, 'ห้วยทราย', '18.967,98.915', 0),
(83, 'บวกค้าง', '18.704,99.107', 0),
(84, 'ขี้เหล็ก', '19.011,98.942', 0),
(85, 'น้ำบ่อหลวง', '18.674,98.841', 0),
(86, 'สันต้นหมื้อ', '19.948,99.28', 0),
(87, 'หนองแหย่ง', '18.911,99.101', 0),
(88, 'สันป่ายาง', '19.049,98.83', 0),
(89, 'บ้านโป่ง', '19.392,99.121', 0),
(90, 'แม่แตง', '19.155,98.91', 0),
(91, 'ยางคราม', '18.56,98.782', 0),
(92, 'บ้านกาด', '18.637,98.752', 0),
(93, 'ห้วยทราย', '18.781,99.189', 0),
(94, 'เขื่อนผาก', '19.308,99.164', 0),
(95, 'สันทราย', '19.879,99.209', 0),
(96, 'ช้างเผือก', '18.821,98.969', 0),
(97, 'บ้านช้าง', '19.147,98.861', 0),
(98, 'ป่าไผ่', '18.907,99.051', 0),
(99, 'แสนไห', '19.615,98.632', 0),
(100, 'แม่โป่ง', '18.847,99.196', 0),
(101, 'ข่วงเปา', '18.472,98.726', 0),
(102, 'หนองหาร', '18.93,99.014', 0),
(103, 'บงตัน', '18.017,98.661', 0),
(104, 'ทุ่งปี้', '18.587,98.741', 0),
(105, 'โป่งแยง', '18.885,98.82', 0),
(106, 'ดอนแก้ว', '18.86,98.939', 0),
(107, 'เวียง', '19.944,99.214', 0),
(108, 'บ้านสหกรณ์', '18.825,99.242', 0),
(109, 'ฮอด', '18.103,98.583', 0),
(110, 'เมืองก๋าย', '19.186,98.79', 0),
(111, 'สบเตี๊ยะ', '18.352,98.668', 0),
(112, 'ขี้เหล็ก', '19.071,98.916', 0),
(113, 'น้ำแพร่', '19.33,99.109', 0),
(114, 'เชิงดอย', '18.899,99.17', 0),
(115, 'ออนใต้', '18.7,99.229', 0),
(116, 'น้ำแพร่', '18.709,98.881', 0),
(117, 'สุเทพ', '18.768,98.921', 0),
(118, 'ป่าตุ้ม', '19.37,99.266', 0),
(119, 'โป่งน้ำร้อน', '20.061,99.121', 0),
(120, 'ห้วยแก้ว', '18.884,99.327', 0),
(121, 'สันติสุข', '18.581,98.682', 0),
(122, 'ออนเหนือ', '18.793,99.308', 0),
(123, 'หนองบัว', '19.736,99.073', 0),
(124, 'ดอยหล่อ', '18.488,98.798', 0),
(125, 'แม่ทะลบ', '19.73,99.247', 0),
(126, 'ดอยเต่า', '17.897,98.731', 0),
(127, 'ป่าไหน่', '19.44,99.261', 0),
(128, 'ดอนเปา', '18.679,98.783', 0),
(129, 'สบเปิง', '19.104,98.81', 0),
(130, 'บ้านปง', '18.769,98.868', 0),
(131, 'แม่ทา', '18.591,99.289', 0),
(132, 'ท่าผา', '18.485,98.416', 0),
(133, 'ทาเหนือ', '18.702,99.308', 0),
(134, 'แม่แรม', '18.911,98.893', 0),
(135, 'สะลวง', '19.005,98.837', 0),
(136, 'ท่าตอน', '20.066,99.387', 0),
(137, 'อินทขิล', '19.2,98.953', 0),
(138, 'ท่าเดื่อ', '17.959,98.676', 0),
(139, 'เทพเสด็จ', '18.956,99.326', 0),
(140, 'แม่อาย', '20.065,99.262', 0),
(141, 'ดอยแก้ว', '18.39,98.576', 0),
(142, 'แม่สาว', '20.06,99.168', 0),
(143, 'แม่แวน', '19.303,99.261', 0),
(144, 'บ้านหลวง', '19.871,99.343', 0),
(145, 'แม่แฝกใหม่', '19.026,99.007', 0),
(146, 'สะเมิงเหนือ', '18.977,98.739', 0),
(147, 'บ้านเป้า', '19.218,99.047', 0),
(148, 'เมืองงาย', '19.477,98.833', 0),
(149, 'แม่งอน', '19.793,99.124', 0),
(150, 'แม่แดด', '18.936,98.38', 0),
(151, 'ลวงเหนือ', '18.965,99.141', 0),
(152, 'แม่หอพระ', '19.117,99.072', 0),
(153, 'ป่าเมี่ยง', '18.935,99.243', 0),
(154, 'บ้านจันทร์', '19.11,98.281', 0),
(155, 'แม่สาบ', '18.945,98.641', 0),
(156, 'ช่างเคิ่ง', '18.552,98.401', 0),
(157, 'แม่นาวาง', '19.98,99.382', 0),
(158, 'แจ่มหลวง', '19.011,98.218', 0),
(159, 'เปียงหลวง', '19.692,98.693', 0),
(160, 'โปงทุ่ง', '17.836,98.736', 0),
(161, 'ทุ่งข้าวพวง', '19.552,98.906', 0),
(162, 'บ่อแก้ว', '18.791,98.604', 0),
(163, 'แม่สอย', '18.222,98.721', 0),
(164, 'หางดง', '18.16,98.483', 0),
(165, 'ยั้งเมิน', '19.001,98.464', 0),
(166, 'ม่อนปิ่น', '19.955,99.112', 0),
(167, 'เมืองนะ', '19.312,98.939', 0),
(168, 'บ่อสลี', '18.155,98.244', 0),
(169, 'ปางหินฝน', '18.451,98.136', 0),
(170, 'สันทราย', '19.504,99.204', 0),
(171, 'เชียงดาว', '19.389,98.947', 0),
(172, 'แม่ปั๋ง', '19.213,99.212', 0),
(173, 'ม่อนจอง', '17.43,98.5', 0),
(174, 'บ้านแปะ', '18.256,98.565', 0),
(175, 'แม่คะ', '19.821,99.213', 0),
(176, 'บ้านตาล', '18.088,98.709', 0),
(177, 'นาคอเรือ', '18.009,98.52', 0),
(178, 'กื้ดช้าง', '19.269,98.768', 0),
(179, 'เมืองคอง', '19.388,98.753', 0),
(180, 'สะเมิงใต้', '18.823,98.714', 0),
(181, 'โหล่งขอด', '19.074,99.225', 0),
(182, 'ศรีดงเย็น', '19.646,99.178', 0),
(183, 'ป่าแป๋', '19.179,98.671', 0),
(184, 'ปิงโค้ง', '19.507,99.066', 0),
(185, 'มืดกา', '17.873,98.593', 0),
(186, 'กองแขก', '18.358,98.376', 0),
(187, 'บ้านหลวง', '18.502,98.6', 0),
(188, 'สบโขง', '17.654,98.217', 0),
(189, 'นาเกียน', '17.864,98.156', 0),
(190, 'บ้านทับ', '18.342,98.234', 0),
(191, 'แม่วิน', '18.683,98.674', 0),
(192, 'บ่อหลวง', '18.158,98.379', 0),
(193, 'แม่ตื่น', '17.398,98.395', 0),
(194, 'เมืองแหง', '19.515,98.639', 0),
(195, 'แม่นะ', '19.687,98.9', 0),
(196, 'อมก๋อย', '17.915,98.335', 0),
(197, 'แม่ศึก', '18.738,98.224', 0),
(198, 'ยางเปียง', '17.682,98.392', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_appointment`
--
ALTER TABLE `data_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_diagnose_user`
--
ALTER TABLE `data_diagnose_user`
  ADD PRIMARY KEY (`diagnose_id`);

--
-- Indexes for table `data_hospita`
--
ALTER TABLE `data_hospita`
  ADD PRIMARY KEY (`hospita_id`);

--
-- Indexes for table `data_subdis`
--
ALTER TABLE `data_subdis`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_appointment`
--
ALTER TABLE `data_appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_diagnose_user`
--
ALTER TABLE `data_diagnose_user`
  MODIFY `diagnose_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `data_hospita`
--
ALTER TABLE `data_hospita`
  MODIFY `hospita_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `data_subdis`
--
ALTER TABLE `data_subdis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
