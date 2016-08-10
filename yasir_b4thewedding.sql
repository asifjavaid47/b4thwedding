-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 23, 2016 at 11:38 AM
-- Server version: 5.5.42-37.1
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yasir_b4thewedding`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_cookies`
--

CREATE TABLE IF NOT EXISTS `ci_cookies` (
  `id` int(11) NOT NULL,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('7d7985db2213e284aedc2951215746fb', '69.143.23.62', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_4) AppleWebKit/601.5.17 (KHTML, like Gecko) Version/9.1 Safari/601.5.17', 1463976248, 'a:6:{s:9:"user_data";s:0:"";s:6:"userID";s:1:"1";s:5:"fName";s:6:"client";s:5:"lName";s:6:"prject";s:5:"email";s:28:"eminentdeveloper69@gmail.com";s:9:"logged_in";b:1;}'),
('064f812c2060222d8be1a74de5834dd7', '180.76.15.155', 'Mozilla/5.0 (compatible; Baiduspider/2.0; +http://www.baidu.com/search/spider.html)', 1463974918, 'a:2:{s:9:"user_data";s:0:"";s:5:"state";s:32:"5a930bc8e9634b0d42f6564eb5c5f5dc";}'),
('b6153756eeb9bbce9be8c05178fdb679', '100.43.91.4', 'Mozilla/5.0 (compatible; YandexBot/3.0; +http://yandex.com/bots)', 1463977503, ''),
('691a84eac739c9eff0f1777d7acd721e', '66.249.73.219', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', 1463992704, ''),
('857f86caf63fe16a9947b5ecae667cf7', '192.81.128.31', 'Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_0 like Mac OS X; en-us) AppleWebKit/528.18 (KHTML, like Gecko) Version/4.0 Mobil', 1464005552, ''),
('3c966e954f42ab68ef0738fd0ea585ba', '110.36.177.8', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1464007699, ''),
('3ce5b0f0446e14eb614a41c7740041f9', '5.9.137.227', 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4315)', 1464009187, ''),
('cc4d6278a4d89ca656fe4351893832ae', '182.189.35.126', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36', 1464019901, '');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `idCountry` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(45) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`idCountry`, `countryCode`, `countryName`) VALUES
(1, 'AD', 'Andorra'),
(2, 'AE', 'United Arab Emirates'),
(3, 'AF', 'Afghanistan'),
(4, 'AG', 'Antigua and Barbuda'),
(5, 'AI', 'Anguilla'),
(6, 'AL', 'Albania'),
(7, 'AM', 'Armenia'),
(8, 'AO', 'Angola'),
(9, 'AQ', 'Antarctica'),
(10, 'AR', 'Argentina'),
(11, 'AS', 'American Samoa'),
(12, 'AT', 'Austria'),
(13, 'AU', 'Australia'),
(14, 'AW', 'Aruba'),
(15, 'AX', 'Åland'),
(16, 'AZ', 'Azerbaijan'),
(17, 'BA', 'Bosnia and Herzegovina'),
(18, 'BB', 'Barbados'),
(19, 'BD', 'Bangladesh'),
(20, 'BE', 'Belgium'),
(21, 'BF', 'Burkina Faso'),
(22, 'BG', 'Bulgaria'),
(23, 'BH', 'Bahrain'),
(24, 'BI', 'Burundi'),
(25, 'BJ', 'Benin'),
(26, 'BL', 'Saint Barthélemy'),
(27, 'BM', 'Bermuda'),
(28, 'BN', 'Brunei'),
(29, 'BO', 'Bolivia'),
(30, 'BQ', 'Bonaire'),
(31, 'BR', 'Brazil'),
(32, 'BS', 'Bahamas'),
(33, 'BT', 'Bhutan'),
(34, 'BV', 'Bouvet Island'),
(35, 'BW', 'Botswana'),
(36, 'BY', 'Belarus'),
(37, 'BZ', 'Belize'),
(38, 'CA', 'Canada'),
(39, 'CC', 'Cocos [Keeling] Islands'),
(40, 'CD', 'Democratic Republic of the Congo'),
(41, 'CF', 'Central African Republic'),
(42, 'CG', 'Republic of the Congo'),
(43, 'CH', 'Switzerland'),
(44, 'CI', 'Ivory Coast'),
(45, 'CK', 'Cook Islands'),
(46, 'CL', 'Chile'),
(47, 'CM', 'Cameroon'),
(48, 'CN', 'China'),
(49, 'CO', 'Colombia'),
(50, 'CR', 'Costa Rica'),
(51, 'CU', 'Cuba'),
(52, 'CV', 'Cape Verde'),
(53, 'CW', 'Curacao'),
(54, 'CX', 'Christmas Island'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DE', 'Germany'),
(58, 'DJ', 'Djibouti'),
(59, 'DK', 'Denmark'),
(60, 'DM', 'Dominica'),
(61, 'DO', 'Dominican Republic'),
(62, 'DZ', 'Algeria'),
(63, 'EC', 'Ecuador'),
(64, 'EE', 'Estonia'),
(65, 'EG', 'Egypt'),
(66, 'EH', 'Western Sahara'),
(67, 'ER', 'Eritrea'),
(68, 'ES', 'Spain'),
(69, 'ET', 'Ethiopia'),
(70, 'FI', 'Finland'),
(71, 'FJ', 'Fiji'),
(72, 'FK', 'Falkland Islands'),
(73, 'FM', 'Micronesia'),
(74, 'FO', 'Faroe Islands'),
(75, 'FR', 'France'),
(76, 'GA', 'Gabon'),
(77, 'GB', 'United Kingdom'),
(78, 'GD', 'Grenada'),
(79, 'GE', 'Georgia'),
(80, 'GF', 'French Guiana'),
(81, 'GG', 'Guernsey'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GL', 'Greenland'),
(85, 'GM', 'Gambia'),
(86, 'GN', 'Guinea'),
(87, 'GP', 'Guadeloupe'),
(88, 'GQ', 'Equatorial Guinea'),
(89, 'GR', 'Greece'),
(90, 'GS', 'South Georgia and the South Sandwich Islands'),
(91, 'GT', 'Guatemala'),
(92, 'GU', 'Guam'),
(93, 'GW', 'Guinea-Bissau'),
(94, 'GY', 'Guyana'),
(95, 'HK', 'Hong Kong'),
(96, 'HM', 'Heard Island and McDonald Islands'),
(97, 'HN', 'Honduras'),
(98, 'HR', 'Croatia'),
(99, 'HT', 'Haiti'),
(100, 'HU', 'Hungary'),
(101, 'ID', 'Indonesia'),
(102, 'IE', 'Ireland'),
(103, 'IL', 'Israel'),
(104, 'IM', 'Isle of Man'),
(105, 'IN', 'India'),
(106, 'IO', 'British Indian Ocean Territory'),
(107, 'IQ', 'Iraq'),
(108, 'IR', 'Iran'),
(109, 'IS', 'Iceland'),
(110, 'IT', 'Italy'),
(111, 'JE', 'Jersey'),
(112, 'JM', 'Jamaica'),
(113, 'JO', 'Jordan'),
(114, 'JP', 'Japan'),
(115, 'KE', 'Kenya'),
(116, 'KG', 'Kyrgyzstan'),
(117, 'KH', 'Cambodia'),
(118, 'KI', 'Kiribati'),
(119, 'KM', 'Comoros'),
(120, 'KN', 'Saint Kitts and Nevis'),
(121, 'KP', 'North Korea'),
(122, 'KR', 'South Korea'),
(123, 'KW', 'Kuwait'),
(124, 'KY', 'Cayman Islands'),
(125, 'KZ', 'Kazakhstan'),
(126, 'LA', 'Laos'),
(127, 'LB', 'Lebanon'),
(128, 'LC', 'Saint Lucia'),
(129, 'LI', 'Liechtenstein'),
(130, 'LK', 'Sri Lanka'),
(131, 'LR', 'Liberia'),
(132, 'LS', 'Lesotho'),
(133, 'LT', 'Lithuania'),
(134, 'LU', 'Luxembourg'),
(135, 'LV', 'Latvia'),
(136, 'LY', 'Libya'),
(137, 'MA', 'Morocco'),
(138, 'MC', 'Monaco'),
(139, 'MD', 'Moldova'),
(140, 'ME', 'Montenegro'),
(141, 'MF', 'Saint Martin'),
(142, 'MG', 'Madagascar'),
(143, 'MH', 'Marshall Islands'),
(144, 'MK', 'Macedonia'),
(145, 'ML', 'Mali'),
(146, 'MM', 'Myanmar [Burma]'),
(147, 'MN', 'Mongolia'),
(148, 'MO', 'Macao'),
(149, 'MP', 'Northern Mariana Islands'),
(150, 'MQ', 'Martinique'),
(151, 'MR', 'Mauritania'),
(152, 'MS', 'Montserrat'),
(153, 'MT', 'Malta'),
(154, 'MU', 'Mauritius'),
(155, 'MV', 'Maldives'),
(156, 'MW', 'Malawi'),
(157, 'MX', 'Mexico'),
(158, 'MY', 'Malaysia'),
(159, 'MZ', 'Mozambique'),
(160, 'NA', 'Namibia'),
(161, 'NC', 'New Caledonia'),
(162, 'NE', 'Niger'),
(163, 'NF', 'Norfolk Island'),
(164, 'NG', 'Nigeria'),
(165, 'NI', 'Nicaragua'),
(166, 'NL', 'Netherlands'),
(167, 'NO', 'Norway'),
(168, 'NP', 'Nepal'),
(169, 'NR', 'Nauru'),
(170, 'NU', 'Niue'),
(171, 'NZ', 'New Zealand'),
(172, 'OM', 'Oman'),
(173, 'PA', 'Panama'),
(174, 'PE', 'Peru'),
(175, 'PF', 'French Polynesia'),
(176, 'PG', 'Papua New Guinea'),
(177, 'PH', 'Philippines'),
(178, 'PK', 'Pakistan'),
(179, 'PL', 'Poland'),
(180, 'PM', 'Saint Pierre and Miquelon'),
(181, 'PN', 'Pitcairn Islands'),
(182, 'PR', 'Puerto Rico'),
(183, 'PS', 'Palestine'),
(184, 'PT', 'Portugal'),
(185, 'PW', 'Palau'),
(186, 'PY', 'Paraguay'),
(187, 'QA', 'Qatar'),
(188, 'RE', 'Réunion'),
(189, 'RO', 'Romania'),
(190, 'RS', 'Serbia'),
(191, 'RU', 'Russia'),
(192, 'RW', 'Rwanda'),
(193, 'SA', 'Saudi Arabia'),
(194, 'SB', 'Solomon Islands'),
(195, 'SC', 'Seychelles'),
(196, 'SD', 'Sudan'),
(197, 'SE', 'Sweden'),
(198, 'SG', 'Singapore'),
(199, 'SH', 'Saint Helena'),
(200, 'SI', 'Slovenia'),
(201, 'SJ', 'Svalbard and Jan Mayen'),
(202, 'SK', 'Slovakia'),
(203, 'SL', 'Sierra Leone'),
(204, 'SM', 'San Marino'),
(205, 'SN', 'Senegal'),
(206, 'SO', 'Somalia'),
(207, 'SR', 'Suriname'),
(208, 'SS', 'South Sudan'),
(209, 'ST', 'São Tomé and Príncipe'),
(210, 'SV', 'El Salvador'),
(211, 'SX', 'Sint Maarten'),
(212, 'SY', 'Syria'),
(213, 'SZ', 'Swaziland'),
(214, 'TC', 'Turks and Caicos Islands'),
(215, 'TD', 'Chad'),
(216, 'TF', 'French Southern Territories'),
(217, 'TG', 'Togo'),
(218, 'TH', 'Thailand'),
(219, 'TJ', 'Tajikistan'),
(220, 'TK', 'Tokelau'),
(221, 'TL', 'East Timor'),
(222, 'TM', 'Turkmenistan'),
(223, 'TN', 'Tunisia'),
(224, 'TO', 'Tonga'),
(225, 'TR', 'Turkey'),
(226, 'TT', 'Trinidad and Tobago'),
(227, 'TV', 'Tuvalu'),
(228, 'TW', 'Taiwan'),
(229, 'TZ', 'Tanzania'),
(230, 'UA', 'Ukraine'),
(231, 'UG', 'Uganda'),
(232, 'UM', 'U.S. Minor Outlying Islands'),
(233, 'US', 'United States'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VA', 'Vatican City'),
(237, 'VC', 'Saint Vincent and the Grenadines'),
(238, 'VE', 'Venezuela'),
(239, 'VG', 'British Virgin Islands'),
(240, 'VI', 'U.S. Virgin Islands'),
(241, 'VN', 'Vietnam'),
(242, 'VU', 'Vanuatu'),
(243, 'WF', 'Wallis and Futuna'),
(244, 'WS', 'Samoa'),
(245, 'XK', 'Kosovo'),
(246, 'YE', 'Yemen'),
(247, 'YT', 'Mayotte'),
(248, 'ZA', 'South Africa'),
(249, 'ZM', 'Zambia'),
(250, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email_addres` varchar(255) DEFAULT NULL,
  `user_name` varchar(255) DEFAULT NULL,
  `pass_word` varchar(32) DEFAULT NULL,
  `adminType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`id`, `first_name`, `last_name`, `email_addres`, `user_name`, `pass_word`, `adminType`) VALUES
(1, 'raza', 'malik', 'raza@gmail.com', 'razamalik', '827ccb0eea8a706c4c34a16891f84e7b', ''),
(2, 'raza', 'malik', 'razamalik@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'superAdmin'),
(0, 'ijaz', 'aslam', 'ijaz@gmail.com', 'ijaz', '827ccb0eea8a706c4c34a16891f84e7b', 'subAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_acounts_information`
--

CREATE TABLE IF NOT EXISTS `tbl_acounts_information` (
  `accountID` int(11) NOT NULL,
  `userID` int(255) NOT NULL,
  `creditCardNumber` bigint(255) NOT NULL,
  `creditCardExpiremonth` varchar(255) NOT NULL,
  `creditCardExpireyear` varchar(255) NOT NULL,
  `accountType` varchar(255) NOT NULL,
  `cvv` varchar(255) NOT NULL,
  `paypalEmail` varchar(255) NOT NULL,
  `bankAccountType` varchar(255) NOT NULL,
  `bankName` varchar(255) NOT NULL,
  `bankCountry` varchar(255) NOT NULL,
  `abaRoutinNumber` varchar(255) NOT NULL,
  `bankAddress` varchar(255) NOT NULL,
  `bankAddress2` varchar(255) NOT NULL,
  `bankCity` varchar(255) NOT NULL,
  `bankState` varchar(255) NOT NULL,
  `bankZipCode` varchar(255) NOT NULL,
  `destinationCurrency` varchar(255) NOT NULL,
  `accountHolderName` varchar(255) NOT NULL,
  `bankAccountNumber` varchar(255) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `default` int(2) NOT NULL,
  `backup` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_acounts_information`
--

INSERT INTO `tbl_acounts_information` (`accountID`, `userID`, `creditCardNumber`, `creditCardExpiremonth`, `creditCardExpireyear`, `accountType`, `cvv`, `paypalEmail`, `bankAccountType`, `bankName`, `bankCountry`, `abaRoutinNumber`, `bankAddress`, `bankAddress2`, `bankCity`, `bankState`, `bankZipCode`, `destinationCurrency`, `accountHolderName`, `bankAccountNumber`, `fName`, `lName`, `default`, `backup`) VALUES
(1, 2, 4005519200000004, '4', '16', 'creditcard', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(2, 4, 4005519200000004, '9', '18', 'creditcard', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 1),
(3, 4, 0, '', '', 'paypal', '', 'franklekowitz@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 0),
(4, 1, 378282246310005, '4', '16', 'creditcard', '1234', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(5, 1, 0, '', '', 'bank', '', '', 'CHECKING', 'Alflah', 'Pakistan', '568', 'Gulber2', '30s', 'Lahore', 'usa', '0568', 'US Dollar', 'ijaz Aslam', '5501', '', '', 0, 0),
(6, 5, 0, '', '', 'bank', '', '', 'CHECKING', 'Bank of Pimpology', 'Isle of Man', '365975652', '1234 Pimp Cup Ln', '3025 s John st', 'Cannes', 'Yano', '6536161613', 'US Dollar', 'Don Juan', '63356232322', '', '', 0, 0),
(7, 40, 4005519200000004, '3', '26', 'creditcard', '395', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0),
(8, 48, 0, '', '', 'paypal', '', 'jimmy@gmail.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_awarded`
--

CREATE TABLE IF NOT EXISTS `tbl_awarded` (
  `awardedId` int(11) NOT NULL,
  `awardedJobId` int(255) NOT NULL,
  `awardedUserId` int(255) NOT NULL,
  `awardedClientId` int(255) NOT NULL,
  `awardedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `completedDate` varchar(255) NOT NULL,
  `deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_awarded`
--

INSERT INTO `tbl_awarded` (`awardedId`, `awardedJobId`, `awardedUserId`, `awardedClientId`, `awardedDate`, `completedDate`, `deleted`) VALUES
(1, 1, 2, 1, '2015-01-23 06:00:00', '', 0),
(5, 8, 5, 4, '2015-01-23 11:08:20', '', 0),
(6, 9, 5, 4, '2015-01-23 11:08:20', '', 0),
(9, 7, 2, 1, '2015-01-23 11:08:20', '', 0),
(10, 10, 5, 4, '2015-01-23 11:08:20', '', 0),
(11, 12, 5, 4, '2015-01-23 11:08:20', '', 0),
(12, 15, 31, 32, '2015-01-23 11:08:20', '', 0),
(13, 3, 2, 1, '2015-01-23 11:08:20', '', 0),
(14, 16, 5, 4, '2015-01-23 11:08:20', '', 0),
(15, 17, 5, 4, '2015-01-23 11:08:20', '', 0),
(16, 13, 5, 5, '2015-01-23 11:08:20', '', 0),
(17, 18, 5, 4, '2015-01-23 11:08:20', '', 0),
(18, 20, 2, 1, '2015-01-27 09:14:24', '', 0),
(19, 21, 2, 1, '2015-01-27 09:20:19', '', 0),
(20, 22, 2, 1, '2015-01-27 12:46:02', '', 0),
(21, 23, 5, 4, '2015-01-27 14:15:05', '', 0),
(22, 24, 5, 4, '2015-01-27 14:51:05', '', 0),
(23, 25, 2, 1, '2015-01-27 16:40:09', '', 0),
(24, 26, 2, 1, '2015-01-27 16:44:05', '', 0),
(25, 27, 2, 1, '2015-01-27 17:03:15', '', 0),
(26, 28, 2, 1, '2015-01-27 17:29:23', '', 0),
(27, 30, 2, 1, '2015-01-28 15:38:08', '', 0),
(28, 32, 41, 40, '2015-01-29 06:19:46', '', 0),
(29, 33, 42, 40, '2015-01-29 06:36:07', '', 0),
(30, 35, 2, 1, '2015-03-30 18:58:24', '', 0),
(31, 36, 49, 48, '2015-05-24 23:10:06', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_balance`
--

CREATE TABLE IF NOT EXISTS `tbl_balance` (
  `balanceID` int(11) NOT NULL,
  `transactionHistoryID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `amount` float NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `EndDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_balance`
--

INSERT INTO `tbl_balance` (`balanceID`, `transactionHistoryID`, `userID`, `amount`, `startDate`, `EndDate`) VALUES
(1, 0, 2, 9.13, '', '2015-01-09 21:39:19'),
(2, 0, 4, 35330, '', '2015-01-26 18:40:08'),
(3, 0, 5, -13.06, '', '2015-01-28 10:28:46'),
(4, 0, 1, 0.5, '', '2015-01-28 18:52:02'),
(5, 0, 40, 300, '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cancel_reason`
--

CREATE TABLE IF NOT EXISTS `tbl_cancel_reason` (
  `cancelReasonID` int(11) NOT NULL,
  `cancelReasonName` varchar(255) NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `updateDate` varchar(255) NOT NULL,
  `deleted` int(11) unsigned DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cancel_reason`
--

INSERT INTO `tbl_cancel_reason` (`cancelReasonID`, `cancelReasonName`, `startDate`, `updateDate`, `deleted`) VALUES
(1, 'tesss', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE IF NOT EXISTS `tbl_chat` (
  `chatID` int(11) NOT NULL,
  `projectId` int(255) NOT NULL,
  `projectTitle` varchar(255) NOT NULL,
  `freelancerId` int(255) NOT NULL,
  `clientId` int(255) NOT NULL,
  `deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_us`
--

CREATE TABLE IF NOT EXISTS `tbl_contact_us` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `attachement_file` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact_us`
--

INSERT INTO `tbl_contact_us` (`id`, `title`, `description`, `attachement_file`, `created_date`) VALUES
(1, 'adfsdaf', 'adsfadf', '', '2015-01-19 11:04:15'),
(2, 'sdfsdff', 'asdfsadasd', '', '2015-01-19 11:06:44'),
(3, 'Demo test', 'dfsdfs', '', '2015-01-19 11:07:27'),
(4, 'test job title new', 'asdasd', '', '2015-01-19 11:08:34'),
(5, 'sdfsdff', 'asda', 'Lighthouse.jpg', '2015-01-19 11:08:54'),
(6, 'EIoTMlRMAqEGOAlCYRX', 'kdSBJK http://www.FyLitCl7Pf7kjQdDUOLQOuaxTXbj5iNG.com', '', '2015-05-04 06:02:16'),
(7, 'Fuzail ur rehman  professional photographer', 'Hello sir/.madam\nIm professional photographer kindly pls contact me...', '', '2016-04-03 13:18:10'),
(8, 'Fuzail ur rehman  professional photographer', 'Hello sir/.madam\nIm professional photographer kindly pls contact me...', '', '2016-04-03 13:18:20'),
(9, 'Fuzail ur rehman  professional photographer', 'Hello sir/.madam\nIm professional photographer kindly pls contact me...', '', '2016-04-03 13:18:26'),
(10, 'Fuzail ur rehman  professional photographer', 'Hello sir/.madam\nIm professional photographer kindly pls contact me...', '', '2016-04-03 13:18:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE IF NOT EXISTS `tbl_feedback` (
  `feedbackID` int(11) NOT NULL,
  `projectID` int(255) NOT NULL,
  `senderID` int(255) NOT NULL,
  `receiverID` int(255) NOT NULL,
  `rating` varchar(255) NOT NULL,
  `quality` varchar(255) NOT NULL,
  `expertise` varchar(255) NOT NULL,
  `cost` varchar(255) NOT NULL,
  `schedule` varchar(255) NOT NULL,
  `response` varchar(255) NOT NULL,
  `professional` varchar(255) NOT NULL,
  `comments` longtext NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread',
  `sendDate` datetime NOT NULL,
  `deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedbackID`, `projectID`, `senderID`, `receiverID`, `rating`, `quality`, `expertise`, `cost`, `schedule`, `response`, `professional`, `comments`, `status`, `sendDate`, `deleted`) VALUES
(1, 1, 1, 2, '2.8', '3', '4', '3', '2', '3', '2', 'Good working ', 'unread', '2015-01-09 00:00:00', 0),
(2, 1, 2, 1, '2.3', '3', '2', '3', '2', '3', '1', 'Thank You', 'unread', '2015-01-09 00:00:00', 0),
(3, 4, 4, 5, '5', '5', '5', '5', '5', '5', '5', 'Great', 'unread', '2015-01-10 05:15:39', 0),
(4, 8, 4, 0, '5', '5', '5', '5', '5', '5', '5', 'Great!', 'unread', '2015-01-13 06:02:04', 0),
(5, 10, 4, 5, '5', '5', '5', '5', '5', '5', '5', 'Good', 'unread', '2015-01-15 05:08:58', 0),
(6, 16, 4, 5, '0', '', '', '', '', '', '', 'l', 'pending', '2015-01-19 12:04:41', 0),
(7, 16, 5, 4, '5', '5', '5', '5', '5', '5', '5', 'Good client, hope to get more jobs.', 'pending', '2015-01-19 17:33:37', 0),
(8, 17, 4, 5, '5', '5', '5', '5', '5', '5', '5', 'Excellent Work!', 'pending', '2015-01-21 11:55:35', 0),
(9, 18, 4, 5, '3.5', '2', '3', '4', '4', '4', '4', 'For the second year in a row, forwards and centers were lumped into one frontcourt category. Each conference’s starting five will include one of the Gasol brothers — Memphis’ Marc for the West and Chicago’s Pau for the East, in his first season as an Eastern Conference player. New Orleans big man Anthony Davis, who one year ago made his All-Star debut as a Western Conference reserve, will join Marc in the Western Conference starting lineup, giving the West plenty of size along the front line.', 'pending', '2015-01-23 11:46:37', 0),
(10, 3, 1, 2, '0', '', '', '', '', '', '', 'test completed', 'pending', '2015-01-23 12:05:30', 0),
(11, 12, 4, 5, '3.5', '3', '4', '3', '4', '3', '4', 'The perfect balance of Reliability, Uptime & Brutal Performance!', 'pending', '2015-01-26 12:22:09', 0),
(12, 20, 2, 1, '2.7', '2', '2', '3', '3', '3', '3', 'tr eryter y eryer', 'approved', '2015-01-27 03:15:29', 0),
(13, 20, 1, 2, '3', '3', '3', '3', '3', '3', '3', 'dfgdfgdf', 'approved', '2015-01-27 03:16:48', 0),
(14, 21, 1, 2, '2.7', '2', '2', '3', '3', '3', '3', 'dfewqfwe', 'approved', '2015-01-27 03:20:40', 0),
(15, 21, 2, 1, '2.7', '2', '2', '3', '3', '3', '3', 'fewfwe', 'approved', '2015-01-27 03:21:00', 0),
(16, 22, 1, 2, '3.7', '3', '3', '4', '4', '4', '4', 'hfhtrht', 'approved', '2015-01-27 06:47:01', 0),
(17, 22, 2, 1, '3.2', '2', '3', '3', '3', '4', '4', 'ttrjt', 'approved', '2015-01-27 06:47:31', 0),
(18, 18, 5, 4, '5', '5', '5', '5', '5', '5', '5', '.', 'pending', '2015-01-27 08:10:30', 0),
(19, 23, 4, 5, '4.2', '5', '4', '4', '4', '4', '4', 'df', 'approved', '2015-01-27 08:16:33', 0),
(20, 24, 4, 5, '4.8', '5', '5', '5', '5', '5', '4', 'Great', 'approved', '2015-01-27 08:51:45', 0),
(21, 26, 1, 2, '2', '2', '2', '2', '2', '4', '', 'greg', 'pending', '2015-01-27 10:46:36', 0),
(22, 26, 2, 1, '2.7', '2', '2', '3', '3', '3', '3', 'trjtr', 'pending', '2015-01-27 10:52:32', 0),
(23, 30, 2, 1, '4', '3', '3', '4', '4', '5', '5', 'hfdhdfh', 'pending', '2015-01-28 09:39:46', 0),
(24, 30, 1, 2, '3.8', '3', '4', '4', '4', '4', '4', 'hfdhd', 'pending', '2015-01-28 09:40:08', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_main_categories` (
  `ID` int(255) NOT NULL,
  `cName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `updateDate` varchar(255) NOT NULL,
  `orderNo` varchar(255) NOT NULL DEFAULT '',
  `delete` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_main_categories`
--

INSERT INTO `tbl_main_categories` (`ID`, `cName`, `description`, `imagePath`, `startDate`, `updateDate`, `orderNo`, `delete`) VALUES
(1, 'Mixologist', 'In Person     &   Virtual', 'img1.jpg', '', '2014-12-03', '', 0),
(2, 'Graphic Design', 'Graphic-design', 'graphic-designer.jpg', '', '', '', 0),
(3, 'Dresses', 'Bride    Bridesmaid', 'istock_wedding_dress.PNG', '', '', '', 1),
(6, 'Catering', 'Food & Menu', 'Capture10.PNG', '', '', '', 0),
(7, 'Law', 'law', 'law.jpg', '', '', '', 1),
(8, 'Jewerly', 'Purchase or Rental', 'Capture8.PNG', '', '', '7', 0),
(9, 'Wedding Vows', 'Writing & Ideas', 'writing.jpg', '', '', '', 0),
(10, 'Photogrophers', 'photogrophers & videogrophers', 'Capture1.PNG', '', '', '', 0),
(11, 'Fashion ', 'fashion', 'img2.jpg', '', '', '', 0),
(12, 'Tuxes', 'Suits', 'Capture.PNG', '', '', '1', 0),
(13, 'Car & Transport', 'Limousine & Shuttle Services', 'Capture3.PNG', '', '', '', 0),
(14, 'Designer', 'Interior & Exterior', 'Capture18.PNG', '', '', '', 0),
(15, 'Invitations', 'Design, Delivery & Evites', 'Capture5.PNG', '', '', '2', 0),
(16, 'Dresses', 'Brides & Bridesmaids', 'istock_wedding_dress1.PNG', '', '', '', 0),
(17, 'Floral Arrangements', 'Flowers', 'Capture4.PNG', '', '', '', 0),
(18, 'testing updated', 'testing description updated', 'Penguins.jpg', '', '', '', 1),
(19, 'sasas upd', 'sasas upd', 'Tulips.jpg', '', '', '', 1),
(20, 'Wedding Cakes', 'Cakes and Pastries', 'Capture2.PNG', '', '', '', 0),
(21, 'MC', 'In Person & Virtual (Web Cam)', 'Capture6.PNG', '', '', '', 0),
(22, 'Rent-A-Groomsman', 'Fill-in', 'Capture7.PNG', '', '', '', 0),
(23, 'Rent-A-Bridesmaid', 'Fill-in', 'Capture9.PNG', '', '', '', 0),
(24, 'Announcement Websites', 'Wedding Related websites', 'Capture11.PNG', '', '', '', 0),
(25, 'Last Minute', 'Last minute help', 'Capture12.PNG', '', '', '', 0),
(26, 'Host & Hostesses', 'Greeter', 'Capture13.PNG', '', '', '', 0),
(27, 'Favors', 'Created and Delivered', 'Capture14.PNG', '', '', '', 0),
(28, 'Place Cards', 'Created and Delivered', 'Capture15.PNG', '', '', '', 0),
(29, 'Music & Entertainment', 'In Person & Virtual', 'Capture16.PNG', '', '', '', 0),
(30, 'Wedding Planner', 'In person & Virtual', 'Capture17.PNG', '', '', '', 0),
(31, 'Testing', 'OK', 'istock_wedding_dress2.PNG', '', '', '', 0),
(32, 'Misc.', 'Not Listed', '3.jpg', '', '', '13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_main_slider`
--

CREATE TABLE IF NOT EXISTS `tbl_main_slider` (
  `ID` int(255) NOT NULL,
  `cName` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imagePath` varchar(255) NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `updateDate` varchar(255) NOT NULL,
  `delete` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_main_slider`
--

INSERT INTO `tbl_main_slider` (`ID`, `cName`, `description`, `imagePath`, `startDate`, `updateDate`, `delete`) VALUES
(1, 'cat title', 'sdfdsaf', 'b1.png', '', '', 0),
(2, 'b2', 'banner image 2', 'b2.png', '', '', 0),
(3, 'b3', 'banner image 3', 'b3.png', '', '', 0),
(4, 'b4', 'banner image 4', 'b4.png', '', '', 0),
(6, 'b5', 'banner image 4', 'rsz_image00002.jpg', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE IF NOT EXISTS `tbl_messages` (
  `msgID` int(11) NOT NULL,
  `projectID` int(255) NOT NULL,
  `senderID` int(255) NOT NULL,
  `receiverID` int(255) NOT NULL,
  `msgTypes` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread',
  `sendDate` datetime NOT NULL,
  `attachFiles` varchar(255) NOT NULL,
  `deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`msgID`, `projectID`, `senderID`, `receiverID`, `msgTypes`, `message`, `status`, `sendDate`, `attachFiles`, `deleted`) VALUES
(1, 1, 1, 2, 'message', 'hi you can work on this project', 'unread', '2015-01-09 14:58:28', 'GRIAK001_321.pdf', 0),
(2, 4, 4, 5, 'message', 'Hi Thank you. I will accept', 'unread', '2015-01-10 05:10:50', '', 0),
(3, 4, 5, 4, 'message', 'OK sounds good, thanks', 'unread', '2015-01-10 05:11:57', '', 0),
(4, 1, 2, 1, 'message', 'ewfgew', 'unread', '2015-01-13 06:25:52', 'Needed_Revisions_1-6-15.docx', 0),
(5, 14, 31, 32, 'message', 'hi', 'unread', '2015-01-16 09:56:14', '', 0),
(6, 14, 32, 31, 'message', 'yes', 'unread', '2015-01-16 09:58:03', 'bootstrap_sahil_work.txt', 0),
(7, 36, 48, 49, 'message', 'hello\n\ntest', 'unread', '2015-05-24 18:09:32', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE IF NOT EXISTS `tbl_notification` (
  `notificationID` int(11) NOT NULL,
  `projectID` int(255) NOT NULL,
  `senderID` int(255) NOT NULL,
  `receiverID` int(255) NOT NULL,
  `msgTypes` varchar(255) NOT NULL,
  `userTypes` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `readStatus` varchar(255) NOT NULL DEFAULT '0',
  `sendDate` datetime NOT NULL,
  `deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=185 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notificationID`, `projectID`, `senderID`, `receiverID`, `msgTypes`, `userTypes`, `message`, `readStatus`, `sendDate`, `deleted`) VALUES
(1, 1, 0, 1, 'addproject', '', 'You have successfully posted the job,Graphic Designer Needed', '1', '2015-01-09 14:27:35', 0),
(3, 1, 1, 2, 'message', '', 'hi you can work on this project', '1', '2015-01-09 14:58:28', 0),
(11, 4, 0, 4, 'addproject', '', 'You have successfully posted the job,Need a wedding venue for 150 people asap', '0', '2015-01-10 04:56:26', 0),
(12, 4, 5, 4, 'propsal', '', 'You receive new propsal for Need a wedding venue for 150 people ', '1', '2015-01-10 05:08:07', 0),
(13, 4, 4, 5, 'message', '', 'Hi Thank you. I will accept', '1', '2015-01-10 05:10:50', 0),
(14, 4, 5, 4, 'message', '', 'OK sounds good, thanks', '1', '2015-01-10 05:11:57', 0),
(15, 4, 4, 5, 'paymentRequestToAdmin', '', 'Client send payment request to admin', '1', '2015-01-10 05:13:54', 0),
(16, 4, 4, 5, 'feedBack', '', 'Client Finished The Project', '0', '2015-01-10 05:15:39', 0),
(17, 5, 0, 1, 'addproject', '', 'You have successfully posted the job,Food App', '0', '2015-01-12 11:11:04', 0),
(18, 6, 0, 1, 'addproject', '', 'You have successfully posted the job,Food App', '0', '2015-01-12 11:11:24', 0),
(21, 8, 0, 4, 'addproject', '', 'You have successfully posted the job,Wedding Invitations for 450 People', '0', '2015-01-12 20:22:35', 0),
(22, 8, 5, 4, 'propsal', '', 'You receive new propsal for Wedding Invitations for 450 People', '1', '2015-01-12 20:26:47', 0),
(23, 8, 4, 5, 'paymentRequestToAdmin', '', 'Client send payment request to admin', '1', '2015-01-12 20:49:34', 0),
(24, 8, 4, 5, 'paymentRequestToAdmin', '', 'Client send payment request to admin', '1', '2015-01-12 20:54:14', 0),
(25, 8, 2, 4, 'propsal', '', 'You receive new propsal for Wedding Invitations for 450 People', '1', '2015-01-13 03:28:42', 0),
(26, 8, 4, 0, 'feedBack', '', 'Client Finished The Project', '0', '2015-01-13 06:02:04', 0),
(28, 9, 0, 4, 'addproject', '', 'You have successfully posted the job,Wedding Dress', '0', '2015-01-13 23:54:15', 0),
(29, 9, 5, 4, 'propsal', '', 'You receive new propsal for Wedding Dress', '1', '2015-01-14 00:02:13', 0),
(30, 9, 4, 5, 'paymentRequestToAdmin', '', 'Client send payment request to admin', '1', '2015-01-14 00:13:20', 0),
(41, 10, 0, 4, 'addproject', '', 'You have successfully posted the job,Product copy writing - Mandarin', '1', '2015-01-15 00:42:45', 0),
(42, 10, 5, 4, 'propsal', '', 'You receive new propsal for Product copy writing - Mandarin', '1', '2015-01-15 00:51:34', 0),
(43, 10, 4, 5, 'awardedJob', '', 'Congratulations! You have been awarded the job. Product copy writing - Mandarin', '0', '2015-01-15 00:52:44', 0),
(44, 10, 4, 5, 'feedBack', '', 'Client Finished The Project', '0', '2015-01-15 05:08:58', 0),
(46, 11, 0, 29, 'addproject', '', 'You have successfully posted the job,Wedding Master', '1', '2015-01-15 12:27:09', 0),
(49, 12, 0, 4, 'addproject', '', 'You have successfully posted the job,I need wedding invitations for May Wedding', '0', '2015-01-15 17:46:33', 0),
(50, 12, 5, 4, 'propsal', '', 'You receive new propsal for I need wedding invitations for May Wedding', '0', '2015-01-15 17:51:35', 0),
(51, 12, 4, 5, 'awardedJob', '', 'Congratulations! You have been awarded the job. I need wedding invitations for May Wedding', '1', '2015-01-15 17:52:45', 0),
(52, 12, 4, 5, 'milestone', '', ' You Recieve new milestone', '1', '2015-01-15 17:58:18', 0),
(53, 13, 0, 4, 'addproject', '', 'You have successfully posted the job,Testing', '0', '2015-01-15 19:56:40', 0),
(54, 13, 5, 4, 'propsal', '', 'You receive new propsal for Testing', '1', '2015-01-15 21:48:19', 0),
(55, 12, 5, 4, 'milestone', '', ' Your Milestone Approved', '1', '2015-01-15 21:53:32', 0),
(56, 12, 5, 4, 'paymentRequest', '', '50.00', '1', '2015-01-15 22:01:32', 0),
(57, 12, 4, 5, 'Receive_project_payment', '', 'You receive 50', '1', '2015-01-15 22:23:38', 0),
(58, 13, 2, 4, 'propsal', '', 'You receive new propsal for Testing', '1', '2015-01-16 05:31:20', 0),
(59, 14, 0, 31, 'addproject', '', 'You have successfully posted the job,php developer', '1', '2015-01-16 09:23:48', 0),
(60, 14, 32, 31, 'propsal', '', 'You receive new propsal for php developer', '1', '2015-01-16 09:50:01', 0),
(61, 14, 31, 32, 'message', '', 'hi', '1', '2015-01-16 09:56:14', 0),
(62, 14, 32, 31, 'message', '', 'yes', '1', '2015-01-16 09:58:03', 0),
(63, 15, 0, 32, 'addproject', '', 'You have successfully posted the job,wed designer', '1', '2015-01-16 10:25:51', 0),
(64, 15, 31, 32, 'propsal', '', 'You receive new propsal for wed designer', '1', '2015-01-16 10:28:46', 0),
(65, 15, 32, 31, 'awardedJob', '', 'Congratulations! You have been awarded the job. wed designer', '1', '2015-01-16 10:40:09', 0),
(66, 15, 31, 32, 'milestone', '', ' You Recieve new milestone', '1', '2015-01-16 11:05:42', 0),
(67, 15, 31, 32, 'milestone', '', ' You Recieve new milestone', '1', '2015-01-16 11:06:47', 0),
(68, 15, 2, 32, 'propsal', '', 'You receive new propsal for wed designer', '1', '2015-01-16 11:12:57', 0),
(70, 15, 32, 31, 'milestone', '', ' Your Milestone Approved', '1', '2015-01-16 11:22:04', 0),
(71, 16, 0, 4, 'addproject', '', 'You have successfully posted the job,Friday Evening', '0', '2015-01-16 16:51:05', 0),
(72, 16, 5, 4, 'propsal', '', 'You receive new propsal for Friday Evening', '1', '2015-01-16 17:01:10', 0),
(73, 16, 4, 5, 'awardedJob', '', 'Congratulations! You have been awarded the job. Friday Evening', '0', '2015-01-16 17:06:37', 0),
(74, 16, 4, 5, 'feedBack', '', 'Client Finished The Project', '0', '2015-01-19 12:04:41', 0),
(75, 16, 5, 4, 'feedBack', '', 'User FeedBack Project', '0', '2015-01-19 17:33:37', 0),
(76, 17, 0, 4, 'addproject', '', 'You have successfully posted the job,Monday Evening', '0', '2015-01-19 18:59:20', 0),
(77, 17, 5, 4, 'propsal', '', 'You receive new propsal for Monday Evening', '0', '2015-01-19 19:02:34', 0),
(78, 17, 4, 5, 'awardedJob', '', 'Congratulations! You have been awarded the job. Monday Evening', '0', '2015-01-19 19:10:22', 0),
(79, 13, 5, 5, 'awardedJob', '', 'Congratulations! You have been awarded the job. Testing', '0', '2015-01-20 05:38:36', 0),
(80, 17, 4, 5, 'Receive_project_payment', '', 'You receive $460of Monday Evening', '0', '2015-01-20 18:09:33', 0),
(81, 17, 4, 5, 'feedBack', '', 'Client Finished The Project', '0', '2015-01-21 11:55:35', 0),
(84, 0, 0, 1, 'addBalance', '', 'Success! Your Withdarw Amount Aprroved by Admin.', '0', '2015-01-22 06:15:47', 0),
(85, 18, 0, 4, 'addproject', '', 'You have successfully posted the job,NAM NAM DJ', '0', '2015-01-22 14:38:16', 0),
(86, 18, 5, 4, 'propsal', '', 'You receive new propsal for NAM NAM DJ', '0', '2015-01-22 14:51:21', 0),
(87, 18, 4, 5, 'awardedJob', '', 'Congratulations! You have been awarded the job. NAM NAM DJ', '0', '2015-01-22 14:57:13', 0),
(88, 18, 5, 4, 'milestone', '', ' You Recieve new milestone', '0', '2015-01-22 15:03:30', 0),
(89, 18, 4, 5, 'milestone', '', ' Your Milestone Approved', '0', '2015-01-22 15:04:03', 0),
(90, 18, 5, 4, 'paymentRequest', '', 'Send me my money ', '0', '2015-01-22 15:23:54', 0),
(91, 18, 4, 5, 'Receive_project_payment', '', 'You receive $5of NAM NAM DJ', '0', '2015-01-22 15:30:12', 0),
(92, 4, 4, 5, 'cancelProject', '', 'Client cancelled project on which you post bid.', '0', '2015-01-23 07:50:31', 0),
(93, 18, 4, 5, 'feedBack', '', 'Client Finished The Project', '0', '2015-01-23 11:46:37', 0),
(95, 0, 0, 4, 'addBalance', '', 'Success! Your Withdarw Amount Aprroved by Admin.', '0', '2015-01-23 13:01:26', 0),
(96, 19, 0, 1, 'addproject', '', 'You have successfully posted the job,AAS', '0', '2015-01-26 07:41:20', 0),
(97, 12, 4, 5, 'feedBack', '', 'Client Finished The Project', '0', '2015-01-26 12:22:09', 0),
(98, 16, 5, 4, 'paymentRequest', '', 'Payment for completion of job', '0', '2015-01-26 12:31:25', 0),
(99, 16, 4, 5, 'Receive_project_payment', '', 'You have received a payment of $32', '0', '2015-01-26 12:40:38', 0),
(100, 0, 0, 2, 'addBalance', '', 'Success! Your Withdarw Amount Aprroved by Admin.', '0', '2015-01-26 23:04:18', 0),
(118, 23, 0, 4, 'addproject', '', 'You have successfully posted the job,I need wedding invitations for May Wedding', '0', '2015-01-27 07:48:55', 0),
(119, 18, 5, 4, 'feedBack', '', 'User FeedBack The Project', '0', '2015-01-27 08:10:30', 0),
(120, 23, 5, 4, 'propsal', '', 'You receive new propsal for I need wedding invitations for May Wedding', '0', '2015-01-27 08:14:48', 0),
(121, 23, 4, 5, 'awardedJob', '', 'Congratulations! You have been awarded the job. I need wedding invitations for May Wedding', '0', '2015-01-27 08:15:05', 0),
(122, 23, 4, 5, 'feedBack', '', 'Client Finished The Project', '0', '2015-01-27 08:16:33', 0),
(123, 24, 0, 4, 'addproject', '', 'You have successfully posted the job,Caring Spanish And English Speaking Nanny', '0', '2015-01-27 08:44:06', 0),
(124, 24, 5, 4, 'propsal', '', 'You receive new propsal for Caring Spanish And English Speaking Nanny', '0', '2015-01-27 08:48:08', 0),
(125, 24, 4, 5, 'awardedJob', '', 'Congratulations! You have been awarded the job. Caring Spanish And English Speaking Nanny', '0', '2015-01-27 08:51:05', 0),
(126, 24, 4, 5, 'feedBack', '', 'Client Finished The Project', '0', '2015-01-27 08:51:45', 0),
(147, 29, 0, 4, 'addproject', '', 'You have successfully posted the job,Rockstar', '0', '2015-01-27 12:23:10', 0),
(148, 23, 5, 4, 'canceldisputerefund', '', 'cancelDispute Request', '0', '2015-01-28 05:57:04', 0),
(149, 23, 5, 4, 'canceldisputerefund', '', 'cancelDispute Request', '0', '2015-01-28 06:02:49', 0),
(150, 30, 0, 1, 'addproject', '', 'You have successfully posted the job,Webpage design', '0', '2015-01-28 09:35:14', 0),
(151, 31, 0, 4, 'addproject', '', 'You have successfully posted the job,Testing', '0', '2015-01-28 09:35:22', 0),
(152, 30, 2, 1, 'propsal', '', 'You receive new propsal for Webpage design', '0', '2015-01-28 09:36:16', 0),
(153, 30, 1, 2, 'awardedJob', '', 'Congratulations! This jobWebpage designhas been awarded to you, Please proceed for further action', '0', '2015-01-28 09:38:08', 0),
(154, 30, 2, 1, 'awardedJob', '', 'User Accept Award. Webpage design', '0', '2015-01-28 09:38:41', 0),
(155, 30, 1, 2, 'feedBack', '', 'Client Finished The Project', '0', '2015-01-28 09:39:13', 0),
(156, 30, 2, 1, 'feedBack', '', 'User FeedBack The Project', '0', '2015-01-28 09:39:46', 0),
(157, 30, 1, 2, 'feedBack', '', 'Client FeedBack The Project', '0', '2015-01-28 09:40:08', 0),
(158, 32, 0, 40, 'addproject', '', 'You have successfully posted the job,community organizer contact info', '0', '2015-01-28 22:32:06', 0),
(159, 32, 41, 40, 'propsal', '', 'You receive new propsal for community organizer contact info', '0', '2015-01-29 00:19:06', 0),
(160, 32, 40, 41, 'awardedJob', '', 'Congratulations! This jobcommunity organizer contact infohas been awarded to you, Please proceed for further action', '0', '2015-01-29 00:19:46', 0),
(161, 32, 41, 40, 'awardedJob', '', 'User Accept Award. community organizer contact info', '0', '2015-01-29 00:20:45', 0),
(162, 33, 0, 40, 'addproject', '', 'You have successfully posted the job,asdkasdkl', '0', '2015-01-29 00:35:20', 0),
(163, 33, 42, 40, 'propsal', '', 'You receive new propsal for asdkasdkl', '0', '2015-01-29 00:35:42', 0),
(164, 33, 40, 42, 'awardedJob', '', 'Congratulations! This jobasdkasdklhas been awarded to you, Please proceed for further action', '0', '2015-01-29 00:36:07', 0),
(165, 33, 42, 40, 'awardedJob', '', 'User Accept Award. asdkasdkl', '0', '2015-01-29 00:36:23', 0),
(166, 34, 0, 45, 'addproject', '', 'You have successfully posted the job,How i met your mother', '0', '2015-02-16 06:58:22', 0),
(167, 35, 0, 1, 'addproject', '', 'You have successfully posted the job,This is test', '0', '2015-03-30 13:56:10', 0),
(168, 35, 2, 1, 'propsal', '', 'You receive new propsal for This is test', '0', '2015-03-30 13:57:22', 0),
(169, 35, 1, 2, 'awardedJob', '', 'Congratulations! This jobThis is testhas been awarded to you, Please proceed for further action', '0', '2015-03-30 13:58:24', 0),
(170, 35, 2, 1, 'awardedJob', '', 'User Accept Award. This is test', '0', '2015-03-30 13:59:37', 0),
(171, 35, 1, 2, 'milestone', '', ' You Recieve new milestone', '0', '2015-03-30 14:02:50', 0),
(172, 35, 2, 1, 'paymentRequest', '', '1st payment instalment', '0', '2015-04-21 17:57:09', 0),
(173, 35, 2, 1, 'milestone', '', ' Your Milestone Approved', '0', '2015-04-21 18:00:11', 0),
(174, 36, 0, 48, 'addproject', '', 'You have successfully posted the job,new job', '0', '2015-05-24 18:04:17', 0),
(175, 2, 48, 1, 'propsal', '', 'You receive new propsal for Addendum from Other Job', '0', '2015-05-24 18:06:18', 0),
(176, 36, 49, 48, 'propsal', '', 'You receive new propsal for new job', '0', '2015-05-24 18:09:05', 0),
(177, 36, 48, 49, 'message', '', 'hello\n\ntest', '0', '2015-05-24 18:09:32', 0),
(178, 36, 48, 49, 'awardedJob', '', 'Congratulations! This jobnew jobhas been awarded to you, Please proceed for further action', '0', '2015-05-24 18:10:06', 0),
(179, 36, 49, 48, 'awardedJob', '', 'User Accept Award. new job', '0', '2015-05-24 18:10:36', 0),
(180, 36, 49, 48, 'milestone', '', ' You Recieve new milestone', '0', '2015-05-24 18:12:12', 0),
(181, 36, 48, 49, 'milestone', '', ' Your Milestone Approved', '0', '2015-05-24 18:12:42', 0),
(182, 37, 0, 52, 'addproject', '', 'You have successfully posted the job,I Peter warui a photograph and video shooting from Kenya for 20 years.please I am looking to work in uk.please contact me waruip2002@yahoo.com. For best wedding photography Arrangements Catering Events posters', '0', '2015-11-02 07:18:54', 0),
(183, 38, 0, 1, 'addproject', '', 'You have successfully posted the job,test', '0', '2016-04-09 12:21:07', 0),
(184, 35, 2, 1, 'milestone', '', ' You Recieve updated milestone', '0', '2016-04-09 12:48:58', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_payment` (
  `paymentID` int(11) NOT NULL,
  `transactionID` int(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `creditCardNumber` int(255) NOT NULL,
  `creditCardExpireDate` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `paymentInformation` varchar(255) NOT NULL,
  `transactionDate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paymentrequest`
--

CREATE TABLE IF NOT EXISTS `tbl_paymentrequest` (
  `paymentRequestID` int(11) NOT NULL,
  `projectID` int(255) NOT NULL,
  `senderID` int(255) NOT NULL,
  `receiverID` int(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paymentrequest`
--

INSERT INTO `tbl_paymentrequest` (`paymentRequestID`, `projectID`, `senderID`, `receiverID`, `amount`, `date`, `status`) VALUES
(1, 1, 1, 2, '', '2015-01-09', 0),
(2, 4, 4, 5, '', '2015-01-10', 0),
(3, 9, 4, 5, '750', '2015-01-14', 0),
(4, 10, 4, 5, '500', '2015-01-15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_portfolio`
--

CREATE TABLE IF NOT EXISTS `tbl_portfolio` (
  `portfolioID` int(11) NOT NULL,
  `userID` int(255) NOT NULL,
  `portfolioTitle` varchar(255) NOT NULL,
  `portfolioDescription` varchar(255) NOT NULL,
  `portfolioImage` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_portfolio`
--

INSERT INTO `tbl_portfolio` (`portfolioID`, `userID`, `portfolioTitle`, `portfolioDescription`, `portfolioImage`, `date`) VALUES
(1, 1, 'this is portfolio', '0', 'Koala1.jpg', '2015-01-12'),
(2, 1, 'This is second Portfolio', '0', 'pay_icon1.png', '2015-01-12'),
(5, 2, 'This is second Portfolio', '0', 'pay_icon2.png', '2015-01-12'),
(7, 4, 'Worked Hard', '0', 'Admin_Panel_Error.PNG', '2015-01-22'),
(8, 1, 'AAS', '0', 'Civicme-RequirementV2.docx', '2015-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_private_messages`
--

CREATE TABLE IF NOT EXISTS `tbl_private_messages` (
  `msgID` int(11) NOT NULL,
  `projectID` int(255) NOT NULL,
  `senderID` int(255) NOT NULL,
  `receiverID` int(255) NOT NULL,
  `msgTypes` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'unread',
  `sendDate` datetime NOT NULL,
  `attachFiles` varchar(255) NOT NULL,
  `deleted` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_private_messages`
--

INSERT INTO `tbl_private_messages` (`msgID`, `projectID`, `senderID`, `receiverID`, `msgTypes`, `message`, `status`, `sendDate`, `attachFiles`, `deleted`) VALUES
(1, 2, 25, 19, 'message', 'tell you later', 'unread', '2015-01-12 11:12:54', '', 0),
(2, 3, 20, 19, 'message', 'hi darling', 'unread', '2015-01-12 11:36:20', '', 0),
(3, 3, 19, 20, 'message', 'thank you', 'unread', '2015-01-12 12:16:47', '', 0),
(4, 6, 25, 19, 'message', 'asdasd', 'unread', '2015-01-13 13:08:36', '', 0),
(5, 6, 19, 25, 'message', 'fedfvcvxcv', 'unread', '2015-01-13 13:08:46', '', 0),
(6, 6, 25, 19, 'message', 'xcvxcv', 'unread', '2015-01-13 13:08:57', '', 0),
(7, 6, 19, 25, 'message', 'erhtr ntdr', 'unread', '2015-01-13 13:13:31', 'Chrysanthemum.jpg', 0),
(8, 3, 20, 19, 'message', 'hhjtrjtr', 'unread', '2015-01-13 18:45:50', '', 0),
(9, 3, 0, 19, 'message', 'hi', 'unread', '2015-01-14 09:48:54', '', 0),
(10, 3, 0, 19, 'message', 'hi', 'unread', '2015-01-14 09:49:03', '', 0),
(11, 3, 20, 19, 'message', 'hi', 'unread', '2015-01-14 09:50:44', '', 0),
(12, 3, 20, 19, 'message', 'ttsdfjg dfjgf ljdsfjsdgh', 'unread', '2015-01-14 10:40:42', '', 0),
(13, 1, 19, 20, 'message', 'gdgf', 'unread', '2015-01-14 12:16:31', '', 0),
(14, 9, 4, 5, 'message', 'Hello', 'unread', '2015-01-14 10:29:50', '', 0),
(15, 1, 2, 1, 'message', 'feferfger', 'unread', '2015-01-14 10:57:25', '', 0),
(16, 7, 2, 1, 'message', 'hi', 'unread', '2015-01-14 10:58:38', '', 0),
(17, 15, 31, 32, 'message', 'hiii', 'unread', '2015-01-16 11:45:27', '', 0),
(18, 15, 32, 31, 'message', 'yess', 'unread', '2015-01-16 11:50:17', '', 0),
(19, 7, 1, 2, 'message', 'htrht', 'unread', '2015-01-19 11:14:39', '', 0),
(20, 16, 4, 5, 'message', 'Testing', 'unread', '2015-01-19 12:18:03', '', 0),
(21, 16, 4, 5, 'message', 'Testing\n', 'unread', '2015-01-19 16:02:15', '', 0),
(22, 16, 4, 5, 'message', 'testing', 'unread', '2015-01-19 16:02:21', '', 0),
(23, 16, 4, 5, 'message', 'testing', 'unread', '2015-01-19 16:02:28', '', 0),
(24, 16, 4, 5, 'message', 'testing\n', 'unread', '2015-01-19 16:02:36', '', 0),
(25, 16, 4, 5, 'message', 'testing', 'unread', '2015-01-19 16:02:43', '', 0),
(26, 16, 4, 5, 'message', 'testing', 'unread', '2015-01-19 16:03:01', '', 0),
(27, 16, 4, 5, 'message', 'y', 'unread', '2015-01-19 16:04:25', '', 0),
(28, 1, 1, 2, 'message', 'adsfasd', 'unread', '2015-01-20 04:24:48', 'Tulips.jpg', 0),
(29, 7, 2, 1, 'message', 'hi how r u', 'unread', '2015-01-20 10:12:48', '', 0),
(30, 7, 1, 2, 'message', 'ytrytr', 'unread', '2015-01-22 03:24:09', 'Koala1_thumb.jpg', 0),
(31, 17, 4, 5, 'message', 'hi\n', 'unread', '2015-01-22 07:25:44', '', 0),
(32, 17, 4, 5, 'message', 'ksdfls', 'unread', '2015-01-22 07:36:31', '', 0),
(33, 7, 1, 2, 'message', 'trhtgr', 'unread', '2015-01-22 08:11:53', '', 0),
(34, 7, 1, 2, 'message', 'yes', 'unread', '2015-01-22 08:13:13', '', 0),
(35, 7, 1, 2, 'message', 'no', 'unread', '2015-01-22 08:14:04', '', 0),
(36, 17, 5, 4, 'message', 'xfg', 'unread', '2015-01-22 10:57:20', '', 0),
(37, 18, 5, 4, 'message', 'Picture', 'unread', '2015-01-23 07:46:11', '20141111_151045~2.jpg', 0),
(38, 24, 4, 5, 'message', 'dSD', 'unread', '2015-01-27 13:38:19', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_posts`
--

CREATE TABLE IF NOT EXISTS `tbl_project_posts` (
  `ID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `attachFiles` varchar(255) NOT NULL,
  `mainCategoryId` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `workType` varchar(255) NOT NULL,
  `hourlyRate` int(11) NOT NULL,
  `fixedBudget` varchar(255) NOT NULL,
  `hrsPerWeeks` int(11) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  `cancelProject` int(2) NOT NULL DEFAULT '0',
  `runingProject` int(11) DEFAULT '0',
  `finishProject` int(11) DEFAULT '0',
  `clientFinishProject` int(11) DEFAULT '0',
  `freelancerFinishProject` int(11) DEFAULT '0',
  `startingDate` varchar(255) NOT NULL,
  `postDate` datetime NOT NULL,
  `completedDate` date NOT NULL,
  `updatingDate` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL,
  `paymentRequest` int(2) NOT NULL DEFAULT '0',
  `archive` int(5) NOT NULL,
  `agreement_document` varchar(255) NOT NULL,
  `clientAmount` int(255) NOT NULL,
  `feedback` int(50) NOT NULL,
  `awardStatus` varchar(255) NOT NULL,
  `states` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_posts`
--

INSERT INTO `tbl_project_posts` (`ID`, `title`, `description`, `attachFiles`, `mainCategoryId`, `skills`, `workType`, `hourlyRate`, `fixedBudget`, `hrsPerWeeks`, `duration`, `userID`, `cancelProject`, `runingProject`, `finishProject`, `clientFinishProject`, `freelancerFinishProject`, `startingDate`, `postDate`, `completedDate`, `updatingDate`, `deleted`, `paymentRequest`, `archive`, `agreement_document`, `clientAmount`, `feedback`, `awardStatus`, `states`) VALUES
(1, 'Graphic Designer Needed', 'Have you ever wondered why we can get fast-food delivered in an hour or less straight to our doorstep? Why can''t you pamper yourself in our own home, when you want to? The answer is you can. Pamper me is an', '', '13', '1,2,3', 'hourly', 15, '0', 5, '1-2 Weeks', 1, 0, 0, 1, 0, 0, '', '2015-01-09 14:27:35', '0000-00-00', '', 0, 1, 0, '17_Asif4.pdf', 0, 0, '', ''),
(2, 'Addendum from Other Job', 'Audio transcription No time stamps or text editing required, simple audio to text typing. Looking to hire several people to work on one-hour segments. Please quote price/hour and time taken to completion. Most competitive prices will be awarded job', '', '13', '1,2,3', 'fixedPrice', 0, '500', 0, '', 1, 0, 0, 0, 0, 0, '', '2015-01-09 15:16:29', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', '8,9'),
(3, 'Website Redesign', 'Looking for a website redesign, looking to build a visual template that will allow reuse through the pages. The site will consist of 7 pages, each page will consist of a banner, menu, main body which will expand to subsections and site map. Looking to keep the pages with purely html and javascript. I would also like to have form components in a few sections of the site. I would also be interested in a widget to post links to articles on the web. If your interested, I will provide design documents and notes for the proposed changes, so you can provide prices. Thanks... Job Description: Your responsibilities: - Translate business and user requirements into highly engaging and compelling design concepts - Conceptualize, design, and develop the User Interface/User Experience as well as the overall look and feel of web pages - Communicate design strategy and rationale to our team, including product managers and other key stakeholders - Collaborate with the marketing and product team in the production of captivating brand messages - Create designs including sketches, visual design mockups, visual assets and documentation required for proper implementation - Incorporate user interface design standards across the website, as needed - Ability to handle multiple projects and work quickly without sacrificing quality Your qualifications: ', '', '13', '1,2,3,4', 'hourly', 15, '', 5, '3-4 Weeks', 1, 0, 1, 0, 0, 0, '2015-01-16', '2015-01-09 17:07:19', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', ''),
(4, 'Wedding Invitations for 450 People', 'We need a wedding venue, for February 23rd. Preferred in the evening in the Chicago-land area.', '', '16', '5', 'fixedPrice', 0, '20', 0, '', 4, 1, 0, 0, 0, 0, '', '2015-01-10 04:56:26', '0000-00-00', '', 0, 1, 1, '', 0, 0, '', ''),
(7, 'Food App', 'Mobile Programming - IOS Development I want to build a dynamic app where users can add pictures and have accounts. Details will be provided upon request Job Description: Your responsibilities: - Review business requirements working with other team members - Perform a technical analysis of requirements - Produce a solid, detailed technical design - Write clean, modular, robust code to implement the desired requirements with little or no supervision - Work with the QA and Customer Support teams to triage and fix bugs with rapid turnaround - Contribute ideas for making the application better and easier to use Your qualifications: - A work style that is extremely detail oriented - Strong communication skills - A complete Elance profile - References or an established Elance reputation preferred', '', '13', '1,3,5', 'fixedPrice', 0, '500', 0, '', 1, 1, 2, 0, 0, 0, '', '2015-01-12 11:14:12', '0000-00-00', '', 0, 0, 1, '', 0, 0, '', ''),
(8, 'Wedding Invitations for 450 People', 'We need a wedding venue, for February 23rd. Preferred in the evening in the Chicago-land area.', '', '3', '8', 'fixedPrice', 0, '20', 0, '', 4, 0, 0, 1, 0, 0, '', '2015-01-12 20:22:35', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', ''),
(9, 'Wedding Dress', 'Need a custom wedding wedding dress for May Wedding. I have all of the measurements needed. Will need completed by April 1. Please contact me with any proposals.', '', '16', '2', 'fixedPrice', 0, '1000', 0, '', 4, 0, 0, 0, 0, 0, '', '2015-01-13 23:54:15', '0000-00-00', '', 0, 1, 0, '', 0, 0, '', ''),
(10, 'Product copy writing - Mandarin', 'We are looking for a native Chinese copywriter who can help us developing a compelling copy for our seafood product sold in China. We are NOT after simple translation from English to Mandarin,', '', '25', '2', 'fixedPrice', 0, '20', 0, '', 4, 0, 1, 1, 0, 0, '', '2015-01-15 00:42:45', '0000-00-00', '', 0, 1, 0, '', 0, 0, '', ''),
(11, 'Wedding Master', 'require a wedding master', '', '2', '2', 'hourly', 20, '', 10, '1-2 Weeks', 29, 0, 0, 0, 0, 0, '', '2015-01-15 12:27:09', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', ''),
(12, 'I need wedding invitations for May Wedding', 'logo design needed for fitness company. We are running bootcamps during the week at 5am I want the logo to be bold, two colours only (I would prefer Black/Blue or Black/Lime green) but im open to two colour to see what works The company is called "Peak 5 Performance" with the slogan "Strength and conditioning for the dedicated" Again, I am open to all suggestions for slogans and layou', '', '15', '8', 'fixedPrice', 0, '125', 0, '', 4, 1, 1, 0, 0, 0, '2015-01-15', '2015-01-15 17:46:33', '0000-00-00', '', 0, 0, 0, '', 288, 0, '', ''),
(13, 'Testing', 'Testing Thursday', '', '15', '2', 'fixedPrice', 0, 'Not Sure', 0, '', 4, 1, 1, 0, 0, 0, '2015-01-20', '2015-01-15 19:56:40', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', ''),
(14, 'php developer', 'i need a part time php developer', '', '2', '3', 'hourly', 10, '', 10, '3-4 Weeks', 31, 0, 0, 0, 0, 0, '', '2015-01-16 09:23:48', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', ''),
(15, 'wed designer', 'i need part time web designer', '', '2', '10', 'hourly', 10, '', 5, '2-3 Weeks', 32, 0, 1, 0, 0, 0, '2015-01-16', '2015-01-16 10:25:51', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', ''),
(16, 'Friday Evening', 'pdf;ldf;ls;l;slrdpgflspdrogfpsodgfposdkpofposkdfpgopsdkopgfoskdfpgokpsdofpgsdofkpgkspdfopgsodkfposdkfpgskodpgfosdogpsodkfgposdpgfksfdpgopsfpsofkdgposkdfpgkspdofgpksgdpfokpfkpfodkp', '', '25', '12', 'fixedPrice', 0, '21', 0, '', 4, 0, 1, 0, 0, 0, '2015-01-16', '2015-01-16 16:51:05', '0000-00-00', '', 0, 0, 0, '', 32, 0, '', ''),
(17, 'Monday Evening', 'Testing testing testing testing testing', '', '25', '13', 'fixedPrice', 0, '20000', 0, '', 4, 0, 1, 0, 0, 0, '2015-01-19', '2015-01-19 18:59:20', '0000-00-00', '', 0, 0, 0, '', 460, 0, '', ''),
(18, 'NAM NAM DJ', 'Testing', '', '21', '14', 'fixedPrice', 0, '500', 0, '', 4, 0, 1, 0, 0, 0, '2015-01-22', '2015-01-22 14:38:16', '0000-00-00', '', 0, 0, 0, '', 5, 0, '', ''),
(20, 'New Job For Testing', 'Audio transcription No time stamps or text editing required, simple audio to text typing. Looking to hire several people to work on one-hour segments. Please quote price/hour and time taken to completion. Most competitive prices will be awarded job', '', '13', '10,1,2,9', 'fixedPrice', 0, '1000', 0, '', 1, 0, 2, 1, 0, 0, '2015-01-27', '2015-01-27 03:13:28', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', '4'),
(21, 'testing', 'esting testing  esting testing  esting testing  esting testing', '', '13', '10,1,2,9', 'fixedPrice', 0, '5000', 0, '', 1, 0, 2, 1, 0, 0, '2015-01-27', '2015-01-27 03:19:30', '0000-00-00', '', 0, 0, 1, '', 0, 0, '', '4'),
(22, 'Project For Complete', 'rgey ery er  eyr  erye erye rer rgey ery er  eyr  erye erye rer rgey ery er  eyr  erye erye rer rgey ery er  eyr  erye erye rer rgey ery er  eyr  erye erye rer', '', '13', '10,1,2,9', 'fixedPrice', 0, '5000', 0, '', 1, 0, 2, 1, 0, 0, '2015-01-27', '2015-01-27 06:45:22', '2015-01-27', '', 0, 0, 0, '', 0, 1, '', '5'),
(23, 'I need wedding invitations for May Wedding', 'Connect with friends and the\nworld around you on Facebook.\nSee photos and updates from friends in News Feed.\nShare what''s new in your life on your Timeline.\nFind more of what you''re looking for with Graph Search.', '', '13', '2,15', 'fixedPrice', 0, '1000', 0, '', 4, 0, 2, 1, 0, 0, '2015-01-27', '2015-01-27 07:48:55', '2015-01-27', '', 0, 0, 1, '', 0, 1, '', '6,7,8'),
(24, 'Caring Spanish And English Speaking Nanny', 'tfydtyfyujtfyjfty', '', '28', '16', 'fixedPrice', 0, '500', 0, '', 4, 0, 2, 1, 0, 0, '2015-01-27', '2015-01-27 08:44:06', '2015-01-27', '', 0, 0, 0, '', 0, 1, '', '9,10,11'),
(25, 'HTML formatting needed', 'Our website currently has hundreds of products. We have exported the product descriptions to an excel file and noticed that our product descriptions have improper HTML (i.e html tags are incomplete). We want to import these product descriptions to a new website built on the Magento platform, but it is causing a lot of errors in the display (due to the ''bad; html code). We need someone to clean up the HTML for all these products so that the product descriptions will appear', '', '8', '4,1,2', 'fixedPrice', 0, '1000', 0, '', 1, 0, 2, 1, 0, 0, '2015-01-27', '2015-01-27 10:38:57', '2015-01-27', '', 0, 0, 0, '', 0, 0, '', '9,4'),
(26, 'WordPress Plug-in Work Order Request', 'I''m looking for a word press plugin for customers to request and keep track of work orders. 1. The customer will press a button. 2. A pop up will display asking the customer to login or register. If they register, billing info, job site info is entered. Additional job sites can be added. Emergency service is an option. 3. Once logged in they enter the description of the issue. A requested time and date for the work order provided. 4. Once submitted an email confirmation is sent to the customer with the information they submitted. 5. If it is an emergency, an email (or texts) will go out to selected individuals. 6. The work order is emailed to selected individuals. Optionally I would like the Work order to be automatically added to our Google calendar as an Invite based on the customers requested time and date. Once the invite is approved,', '', '27', '4,1,16', 'fixedPrice', 0, '1000', 0, '', 1, 0, 2, 1, 0, 0, '2015-01-27', '2015-01-27 10:43:11', '2015-01-27', '', 0, 0, 1, '', 0, 1, '', '9,6'),
(27, 'Email blast template', 'We need an email blast template created and designed that mimics our website...I have images from our website that I can send. It needs to be significant in size as we will need to display our pricing, packages, features, reporting, and other variables. We would like to stick with these colors that I have attached in a banner of ours. I will provide our website address as soon as we start the job, we would like information taken from this in designing and creating this template.', '', '6', '4,1,2', 'fixedPrice', 0, '1000', 0, '', 1, 0, 1, 0, 0, 0, '2015-01-27', '2015-01-27 10:56:46', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', '9,4,7'),
(28, 'testttttt', 'dsfsdfs', '', '2', '1', 'fixedPrice', 0, '1000', 0, '', 1, 0, 1, 0, 0, 0, '2015-01-27', '2015-01-27 11:28:23', '0000-00-00', '', 0, 0, 0, '', 78, 0, '', '10'),
(29, 'Rockstar', 'Post Your JobHaving the Wedding of Your Dreams Starts Here!\nPost Your Job: Describe It: \nAttach Files Select the category of work \nRequest specific skills\n \nCity, State, Country ex. Chicago, illinois, USA\n Set work arrangment \nWe value your privacy. Privacy Policy', '', '27', '17,18', 'fixedPrice', 0, '33000.00', 0, '', 4, 0, 0, 0, 0, 0, '', '2015-01-27 12:23:10', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', '9,10,11'),
(30, 'Webpage design', 'On my Joomla 3.6 test website, yect.info/oceanbrains2, I need one page to be redesigned. The Approach page. I have made a mockup, but the page needs to have the look and feel of the rest of the website. The mockup is attached as a PNG. It''s not that hard really, but I want it to be responsive and implemented on my site.', '', '1', '8,1,17', 'fixedPrice', 0, '1000', 0, '', 1, 0, 2, 1, 0, 0, '2015-01-28', '2015-01-28 09:35:14', '2015-01-28', '', 0, 0, 0, '', 0, 1, 'approved', '9,10,4'),
(31, 'Testing', 'Having the Wedding of Your Dreams Starts Here!', '', '28', '1', 'fixedPrice', 0, '24', 0, '', 4, 0, 0, 0, 0, 0, '', '2015-01-28 09:35:22', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', '15,16,17'),
(32, 'community organizer contact info', 'Hi there,\n\nI''m putting together some statistics for a startup company and need some data collected.\n\nWe need to gather the following data for all the community organizations in New York City:\n\n- community organizer contact info\n- president/ceo contact info\n- email\n- phone number\n- website', '', '25', '19,1', 'fixedPrice', 0, '20000', 0, '', 40, 0, 1, 0, 0, 0, '2015-01-29', '2015-01-28 22:32:06', '0000-00-00', '', 0, 0, 0, '', 0, 0, 'approved', '18,19,20'),
(33, 'asdkasdkl', 'lsadklaksd', '', '21', '20', 'fixedPrice', 0, '500', 0, '', 40, 0, 1, 0, 0, 0, '2015-01-29', '2015-01-29 00:35:20', '0000-00-00', '', 0, 0, 0, '', 0, 0, 'approved', '8'),
(34, 'How i met your mother', 'How i met your mother', '', '30', '17', 'fixedPrice', 0, '500', 0, '', 45, 0, 0, 0, 0, 0, '', '2015-02-16 06:58:22', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', '21'),
(35, 'This is test', 'Hello this is tesing', '', '8', '17', 'fixedPrice', 0, '500', 0, '', 1, 0, 1, 0, 0, 0, '2015-03-30', '2015-03-30 13:56:10', '0000-00-00', '', 0, 0, 0, '', 0, 0, 'approved', '5'),
(36, 'new job', 'sdsdsdp', '', '25', '11,9', 'fixedPrice', 0, '1000', 0, '', 48, 0, 1, 0, 0, 0, '2015-05-24', '2015-05-24 18:04:17', '0000-00-00', '', 0, 0, 0, '', 0, 0, 'approved', '5'),
(37, 'I Peter warui a photograph and video shooting from Kenya for 20 years.please I am looking to work in uk.please contact me waruip2002@yahoo.com. For best wedding photography Arrangements Catering Events posters', 'wedding.', '', '24', '21', 'fixedPrice', 0, '500', 0, '', 52, 0, 0, 0, 0, 0, '', '2015-11-02 07:18:54', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', '5'),
(38, 'test', 'testing', '', '13', '17,22', 'fixedPrice', 0, '12900', 0, '', 1, 0, 0, 0, 0, 0, '', '2016-04-09 12:21:07', '0000-00-00', '', 0, 0, 0, '', 0, 0, '', '9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_proposal`
--

CREATE TABLE IF NOT EXISTS `tbl_proposal` (
  `ID` int(11) NOT NULL,
  `describeYourSelf` longtext NOT NULL,
  `outlineApproch` longtext NOT NULL,
  `filePath` varchar(255) DEFAULT NULL,
  `projectId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `myEarning` int(255) NOT NULL,
  `myEarningUpdated` int(11) NOT NULL DEFAULT '0',
  `myEarningUpdatedStatus` int(11) NOT NULL,
  `billedToClient` varchar(255) NOT NULL,
  `awarded` varchar(255) NOT NULL,
  `estimateDilieveryDate` varchar(255) NOT NULL,
  `paymentRequest` tinyint(1) NOT NULL,
  `paymentRequestDate` date NOT NULL,
  `notes` longtext NOT NULL,
  `submitDate` datetime NOT NULL,
  `endDate` varchar(255) NOT NULL,
  `upDate` varchar(255) NOT NULL,
  `completedDate` date NOT NULL,
  `deleted` int(11) DEFAULT NULL,
  `archive` int(5) NOT NULL,
  `feedback` int(50) NOT NULL,
  `awardStatus` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_proposal`
--

INSERT INTO `tbl_proposal` (`ID`, `describeYourSelf`, `outlineApproch`, `filePath`, `projectId`, `userId`, `myEarning`, `myEarningUpdated`, `myEarningUpdatedStatus`, `billedToClient`, `awarded`, `estimateDilieveryDate`, `paymentRequest`, `paymentRequestDate`, `notes`, `submitDate`, `endDate`, `upDate`, `completedDate`, `deleted`, `archive`, `feedback`, `awardStatus`) VALUES
(1, 'Hello, I am a programmer and web developer living in Arcata, California, and I have been doing web development professionally for the past 15 years. I work with Wordpress extensively and have experience ', 'Hello, I am a programmer and web developer living in Arcata, California, and I have been doing web development professionally for the past 15 years. I work with Wordpress extensively and have experience ', 'GRIAK001_32.pdf', 1, 2, 100, 0, 0, '108.75', 'awarded', '7days', 1, '2015-01-09', '', '2015-01-09 14:56:30', '', '2015-01-09 15:28:25', '0000-00-00', NULL, 0, 0, ''),
(2, 'I live in Arcata, California and have been programming professionally for more than 16 years doing both web and application development. My current focus is on Wordpress development, PHP applications and online marketing.', 'I live in Arcata, California and have been programming professionally for more than 16 years doing both web and application development. My current focus is on Wordpress development, PHP applications and online marketing.', NULL, 3, 2, 50, 0, 0, '54.38', 'awarded', '30days', 0, '0000-00-00', '', '2015-01-09 17:09:13', '', '', '0000-00-00', NULL, 0, 0, ''),
(3, 'I own an elegant venue in to beautiful city of downtown Chicago. I can provide you what you need. \n\nPlease take a look at my portfolio and let''s talk about it. Thank you for your time.', 'Please refer to my portfolio.', 'B4theweddings_revisions.png', 4, 5, 12000, 0, 0, '13050', '', '1day', 0, '0000-00-00', '', '2015-01-10 05:08:07', '', '', '0000-00-00', NULL, 0, 0, ''),
(4, 'Well this is a pretty simple task, just repetitive, but I would be more than happy to do this job for you with the hourly rate you wish to pay. I have a great understanding of English (I am born and raised in easter Pennsylvania). There is not much that I can really put in here, but I do suggest adding a plugin to', 'Well this is a pretty simple task, just repetitive, but I would be more than happy to do this job for you with the hourly rate you wish to pay. I have a great understanding of English (I am born and raised in easter Pennsylvania). There is not much that I can really put in here, but I do suggest adding a plugin to', 'pdffile2.pdf', 7, 2, 100, 0, 0, '108.75', 'awarded', '7days', 0, '0000-00-00', 'dfgdsgdsgds', '2015-01-12 11:15:34', '', '2015-01-13 03:32:27', '0000-00-00', NULL, 0, 0, ''),
(5, 'Please allow me the chance to provide you the best invitations possible.', 'Please refer to proposal ', NULL, 8, 5, 400, 0, 0, '435', 'awarded', '7days', 0, '0000-00-00', '', '2015-01-12 20:26:47', '', '', '0000-00-00', NULL, 0, 0, ''),
(6, 'Well this is a pretty simple task, just repetitive, but I would be more than happy to do this job for you with the hourly rate you wish to pay. I have a great understanding of English (I am born and raised in easter Pennsylvania). There is not much that I can really put in here, but I do suggest adding a plugin', 'Well this is a pretty simple task, just repetitive, but I would be more than happy to do this job for you with the hourly rate you wish to pay. I have a great understanding of English (I am born and raised in easter Pennsylvania). There is not much that I can really put in here, but I do suggest adding a plugin', 'pdffile1.pdf', 8, 2, 20, 0, 0, '21.75', '', '14days', 0, '0000-00-00', '', '2015-01-13 03:28:42', '', '2015-01-13 03:31:08', '0000-00-00', NULL, 0, 0, ''),
(7, 'I can provide this for you. Please check my portfolio.', 'Portfolio provided.', 'CONTROLLER.png', 9, 5, 750, 0, 0, '815.63', 'awarded', '90days', 0, '0000-00-00', '', '2015-01-14 00:02:13', '', '', '0000-00-00', NULL, 0, 0, ''),
(8, 'Hi, I have over 8 years of experience in server administration and web site hosting. I have worked as the web support team lead with a web hosting and web development company for 8 years, thus got the chance to work on different kind of platforms. I am also a MCSE, CCNA and RHCT certified engineer. I am interested in doing this job for you. Please let me know when can we discus this further.', 'We have lot of experience in websites management and confident of doing this job in shortest possible time.', '1.PNG', 10, 5, 500, 0, 0, '543.75', 'awarded', '21days', 0, '0000-00-00', '', '2015-01-15 00:51:34', '', '', '0000-00-00', NULL, 0, 0, ''),
(9, 'sllogan "Strength and conditioning for the dedicated" Again, I am open to all suggestions for slogans and layou	', 'sllogan "Strength and conditioning for the dedicated" Again, I am open to all suggestions for slogans and layou	', 'FunctionalFLow.jpg', 12, 5, 144, 0, 0, '156.6', 'awarded', '7days', 1, '2015-01-15', '', '2015-01-15 17:51:35', '', '', '0000-00-00', NULL, 0, 0, ''),
(10, 'NA', 'NA', NULL, 13, 5, 36, 0, 0, '39.15', 'awarded', '1day', 0, '0000-00-00', '', '2015-01-15 21:48:19', '', '', '0000-00-00', NULL, 0, 0, ''),
(11, 'wadas', 'asdasd', NULL, 13, 2, 50, 0, 0, '54.38', '', '14days', 0, '0000-00-00', '', '2015-01-16 05:31:20', '', '', '0000-00-00', NULL, 0, 0, ''),
(12, 'abc\ndef\nghe', 'aaaaaaa', '116boys.docx', 14, 32, 5, 0, 0, '', '', '21days', 0, '0000-00-00', '', '2015-01-16 09:50:01', '', '', '0000-00-00', NULL, 0, 0, ''),
(13, '1 year in graphics designing', 'abc', 'Croudf_Funding_Aggregator.docx', 15, 31, 9, 0, 0, '', 'awarded', '3days', 0, '0000-00-00', 'abcabc', '2015-01-16 10:28:46', '', '', '0000-00-00', NULL, 0, 0, ''),
(14, 'zdfas', 'sdfsdf', NULL, 15, 2, 100, 0, 0, '108.75', '', '14days', 0, '0000-00-00', '', '2015-01-16 11:12:57', '', '2015-01-16 11:13:04', '0000-00-00', NULL, 0, 0, ''),
(15, 'dsfgserstsererrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', 'dsDFgggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 'Resized-LH9QB.jpg', 16, 5, 32, 0, 0, '34.8', 'awarded', '180days', 1, '2015-01-26', '', '2015-01-16 17:01:10', '', '', '0000-00-00', NULL, 0, 0, ''),
(16, 'sdf', 'zxdf', 'Image00002.jpg', 17, 5, 460, 0, 0, '500', 'awarded', '3days', 0, '0000-00-00', '', '2015-01-19 19:02:34', '', '', '0000-00-00', NULL, 0, 0, ''),
(17, 'Testing', 'Testing', '1-16_Revisons_Functions.docx', 18, 5, 460, 0, 0, '500', 'awarded', '1day', 1, '2015-01-22', '', '2015-01-22 14:51:21', '', '', '0000-00-00', NULL, 0, 0, ''),
(18, 'tyrt rt ytr r yrtyrytrytry rtytr', 'h dhhdfhdfyherh', NULL, 20, 2, 600, 600, 1, '543.75', 'awarded', '3days', 0, '0000-00-00', '', '2015-01-27 03:14:01', '', '', '0000-00-00', NULL, 0, 0, ''),
(19, 'fwefwe', 'fewf', NULL, 21, 2, 300, 0, 0, '326.25', 'completed', '14days', 0, '0000-00-00', '', '2015-01-27 03:19:53', '', '', '2015-01-27', NULL, 1, 1, ''),
(20, 'rreyhr', 'ryreyr', NULL, 22, 2, 100, 0, 0, '108.75', 'completed', '7days', 0, '0000-00-00', '', '2015-01-27 06:45:47', '', '', '2015-01-27', NULL, 0, 1, ''),
(21, ';]\\\n', 'ardzsf', NULL, 23, 5, 500, 0, 0, '543.75', 'completed', '1day', 0, '0000-00-00', '', '2015-01-27 08:14:48', '', '', '2015-01-27', NULL, 0, 1, ''),
(22, 'xghcgh', 'sdfgsdtrh', 'Paypal_instructions.docx', 24, 5, 500, 0, 0, '543.75', 'completed', '3days', 0, '0000-00-00', '', '2015-01-27 08:48:08', '', '', '2015-01-27', NULL, 1, 1, ''),
(23, 'I''ll work closely with our developer Andrew to have this project completed to your satisfaction. I would love to discuss this project in more detail with you in the workroom. We are available most hours of the day on Elance, Skype, by phone, and by email. We try to respond as quickly as we can (usually less than 30 minutes).', 'I''ll work closely with our developer Andrew to have this project completed to your satisfaction. I would love to discuss this project in more detail with you in the workroom. We are available most hours of the day on Elance, Skype, by phone, and by email. We try to respond as quickly as we can (usually less than 30 minutes).', NULL, 25, 2, 200, 0, 0, '217.5', 'completed', '14days', 0, '0000-00-00', '', '2015-01-27 10:39:55', '', '', '2015-01-27', NULL, 0, 0, ''),
(24, 'Pavithra, a Bangalore (India) based Freelance programmer specializing in Wordpress Customization, PHP, HTML, CSS, Mailing List Development, Internet research, Data Conversion services. As per the project requirement following tasks needs to be completed. a). Spam comments needs to be.', 'Pavithra, a Bangalore (India) based Freelance programmer specializing in Wordpress Customization, PHP, HTML, CSS, Mailing List Development, Internet research, Data Conversion services. As per the project requirement following tasks needs to be completed. a). Spam comments needs to be.', NULL, 26, 2, 200, 0, 0, '217.5', 'completed', '7days', 0, '0000-00-00', '', '2015-01-27 10:43:55', '', '', '2015-01-27', NULL, 0, 1, ''),
(25, ' Hi I am an experienced programmer I also am very familiar with SPAM and what the contents will be SPAM as I have worked with some affiliate marketers in the past. I have an excellent understanding of the English language as I am from the UK and I find myself free at the moment. You can Skype me at shadiadiph if you', ' Hi I am an experienced programmer I also am very familiar with SPAM and what the contents will be SPAM as I have worked with some affiliate marketers in the past. I have an excellent understanding of the English language as I am from the UK and I find myself free at the moment. You can Skype me at shadiadiph if you', NULL, 27, 2, 100, 0, 0, '108.75', 'awarded', '1day', 0, '0000-00-00', '', '2015-01-27 10:57:58', '', '', '0000-00-00', NULL, 0, 0, ''),
(26, 'sdas', 'sadsadasd', NULL, 28, 2, 333, 0, 0, '362.14', 'awarded', '1day', 0, '0000-00-00', '', '2015-01-27 11:29:14', '', '', '0000-00-00', NULL, 0, 0, ''),
(27, 'Hi I am an experienced programmer I also am very familiar with SPAM and what the contents will be SPAM as I have worked with some affiliate marketers in the past. I have an excellent understanding of the English language as I am from the UK and I find myself free at the moment. You can Skype me at shadiadiph if you', 'Hi I am an experienced programmer I also am very familiar with SPAM and what the contents will be SPAM as I have worked with some affiliate marketers in the past. I have an excellent understanding of the English language as I am from the UK and I find myself free at the moment. You can Skype me at shadiadiph if you', NULL, 30, 2, 100, 0, 0, '108.75', 'completed', '14days', 0, '0000-00-00', '', '2015-01-28 09:36:16', '', '', '2015-01-28', NULL, 0, 1, 'approved'),
(28, 'rends\n· Change\n\n    #RedneckABook\n    #BellLetsTaIk\n    #WeDontJudgeYouJustin\n    #ILostSleepBecause\n    #JustinOnEllen\n    Wtf Would You Do\n    I AM CRYING LMAOOOO Real\n    Pat Rafter\n    Fav GGS Couple ', 'rends\n· Change\n\n    #RedneckABook\n    #BellLetsTaIk\n    #WeDontJudgeYouJustin\n    #ILostSleepBecause\n    #JustinOnEllen\n    Wtf Would You Do\n    I AM CRYING LMAOOOO Real\n    Pat Rafter\n    Fav GGS Couple ', 'Steps_for_removal_and_addtion_freelancersetcc.docx', 32, 41, 276, 0, 0, '300', 'awarded', '21days', 0, '0000-00-00', '', '2015-01-29 00:19:06', '', '', '0000-00-00', NULL, 0, 0, 'approved'),
(29, 'asdf', 'ada', NULL, 33, 42, 460, 0, 0, '500', 'awarded', 'Select One', 0, '0000-00-00', '', '2015-01-29 00:35:42', '', '', '0000-00-00', NULL, 0, 0, 'approved'),
(30, 'This is proposal', 'This is testing proposal', NULL, 35, 2, 200, 0, 0, '217.5', 'awarded', '7days', 1, '2015-04-21', '', '2015-03-30 13:57:22', '', '', '0000-00-00', NULL, 0, 0, 'approved'),
(31, 'sadsdsad', 'fhfhghg', NULL, 2, 48, 120, 0, 0, '130.5', '', '14days', 0, '0000-00-00', '', '2015-05-24 18:06:18', '', '', '0000-00-00', NULL, 0, 0, ''),
(32, 'dsfsdfdsf\n\ndsfdsf', 'dsfdsfsdf\n\ndsfdsfdsf', NULL, 36, 49, 100, 0, 0, '108.75', 'awarded', '7days', 0, '0000-00-00', '', '2015-05-24 18:09:05', '', '', '0000-00-00', NULL, 0, 0, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_release_payment`
--

CREATE TABLE IF NOT EXISTS `tbl_release_payment` (
  `releasePaymentID` int(255) NOT NULL,
  `projectID` int(255) NOT NULL,
  `senderID` int(255) NOT NULL,
  `receiverID` int(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_release_payment`
--

INSERT INTO `tbl_release_payment` (`releasePaymentID`, `projectID`, `senderID`, `receiverID`, `amount`, `date`) VALUES
(1, 3, 20, 19, 10, '2015-01-15'),
(2, 3, 20, 19, 20, '2015-01-15'),
(3, 3, 20, 19, 10, '2015-01-15'),
(4, 3, 20, 19, 10, '2015-01-15'),
(5, 28, 1, 2, 10, '2015-01-15'),
(6, 12, 4, 5, 50, '2015-01-15'),
(7, 17, 4, 5, 460, '2015-01-20'),
(8, 18, 4, 5, 5, '2015-01-22'),
(9, 16, 4, 5, 32, '2015-01-26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE IF NOT EXISTS `tbl_settings` (
  `settingID` int(11) NOT NULL,
  `settingName` varchar(255) NOT NULL,
  `settingValue` varchar(255) NOT NULL,
  `startDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`settingID`, `settingName`, `settingValue`, `startDate`) VALUES
(1, 'commsion', '8.75', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE IF NOT EXISTS `tbl_skills` (
  `skillID` int(11) NOT NULL,
  `skillName` varchar(255) NOT NULL,
  `startDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) unsigned DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_states`
--

CREATE TABLE IF NOT EXISTS `tbl_states` (
  `ID` int(11) NOT NULL,
  `stateName` varchar(255) NOT NULL,
  `startDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) unsigned DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_states`
--

INSERT INTO `tbl_states` (`ID`, `stateName`, `startDate`, `updateDate`, `deleted`) VALUES
(4, 'pakistan', '2015-01-27 09:13:28', '0000-00-00 00:00:00', 0),
(5, '', '2015-01-27 12:17:39', '0000-00-00 00:00:00', 0),
(6, 'San Antonio', '2015-01-27 13:48:55', '0000-00-00 00:00:00', 0),
(7, 'Texas', '2015-01-27 13:48:55', '0000-00-00 00:00:00', 0),
(8, 'USA', '2015-01-27 13:48:55', '0000-00-00 00:00:00', 0),
(9, 'chicago', '2015-01-27 14:44:06', '0000-00-00 00:00:00', 0),
(10, 'IL', '2015-01-27 14:44:06', '0000-00-00 00:00:00', 0),
(11, 'United States', '2015-01-27 14:44:06', '0000-00-00 00:00:00', 0),
(12, 'The', '2015-01-28 15:35:22', '0000-00-00 00:00:00', 0),
(13, 'Moon', '2015-01-28 15:35:22', '0000-00-00 00:00:00', 0),
(14, 'Beyotch!', '2015-01-28 15:35:22', '0000-00-00 00:00:00', 0),
(15, 'Magic', '2015-01-28 19:58:18', '0000-00-00 00:00:00', 0),
(16, 'Bullet', '2015-01-28 19:58:18', '0000-00-00 00:00:00', 0),
(17, 'Equador', '2015-01-28 19:58:18', '0000-00-00 00:00:00', 0),
(18, 'Willie', '2015-01-29 04:32:06', '0000-00-00 00:00:00', 0),
(19, 'bobo', '2015-01-29 04:32:06', '0000-00-00 00:00:00', 0),
(20, 'Michigan', '2015-01-29 04:32:06', '0000-00-00 00:00:00', 0),
(21, 'NY', '2015-02-16 12:58:22', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_sub_categories` (
  `ID` int(11) NOT NULL,
  `skillName` varchar(255) NOT NULL,
  `startDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted` int(11) unsigned DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_categories`
--

INSERT INTO `tbl_sub_categories` (`ID`, `skillName`, `startDate`, `updateDate`, `deleted`) VALUES
(1, 'Audio & Video Editing', '2015-01-13 23:05:55', '0000-00-00 00:00:00', 0),
(2, 'Fashion', '2015-01-13 22:59:33', '0000-00-00 00:00:00', 0),
(3, 'PHP', '2015-01-09 20:27:35', '0000-00-00 00:00:00', 0),
(4, 'Javascript', '2015-01-09 23:07:19', '0000-00-00 00:00:00', 0),
(5, 'venue', '2015-01-10 10:56:26', '0000-00-00 00:00:00', 0),
(6, 'dasdasdasd', '2015-01-12 17:20:11', '0000-00-00 00:00:00', 1),
(7, 'adasdasd up', '2015-01-12 17:20:07', '0000-00-00 00:00:00', 1),
(8, 'Invitations', '2015-01-13 02:22:36', '0000-00-00 00:00:00', 0),
(9, 'Interior Exterior Designer', '2015-01-13 23:00:33', '0000-00-00 00:00:00', 0),
(10, 'Photoshop', '2015-01-13 23:16:24', '0000-00-00 00:00:00', 0),
(11, 'Culinary Arts', '2015-01-13 23:59:26', '0000-00-00 00:00:00', 0),
(12, 'sfsfd', '2015-01-16 22:51:05', '0000-00-00 00:00:00', 0),
(13, 'sdr', '2015-01-20 00:59:20', '0000-00-00 00:00:00', 0),
(14, 'This DJ', '2015-01-22 20:38:16', '0000-00-00 00:00:00', 0),
(15, 'Invitaions', '2015-01-27 13:48:55', '0000-00-00 00:00:00', 0),
(16, 'hujyu', '2015-01-27 14:44:06', '0000-00-00 00:00:00', 0),
(17, 'Dancing', '2015-01-27 18:23:10', '0000-00-00 00:00:00', 0),
(18, 'Exotic', '2015-01-27 18:23:10', '0000-00-00 00:00:00', 0),
(19, 'G', '2015-01-29 04:32:06', '0000-00-00 00:00:00', 0),
(20, 'ad', '2015-01-29 06:35:20', '0000-00-00 00:00:00', 0),
(21, '', '2015-11-02 13:18:54', '0000-00-00 00:00:00', 0),
(22, 'bar', '2016-04-09 17:23:47', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_categories_old`
--

CREATE TABLE IF NOT EXISTS `tbl_sub_categories_old` (
  `ID` int(11) NOT NULL,
  `mainCatID` int(255) DEFAULT NULL,
  `skillName` varchar(255) NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `updateDate` varchar(255) NOT NULL,
  `delete` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaction_history`
--

CREATE TABLE IF NOT EXISTS `tbl_transaction_history` (
  `transactionHistoryID` int(11) NOT NULL,
  `transactionID` varchar(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `creditCardNumber` int(255) NOT NULL,
  `creditCardExpireDate` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `commisions` varchar(255) NOT NULL,
  `transactionDate` date NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_transaction_history`
--

INSERT INTO `tbl_transaction_history` (`transactionHistoryID`, `transactionID`, `userID`, `creditCardNumber`, `creditCardExpireDate`, `amount`, `type`, `commisions`, `transactionDate`, `purpose`, `status`) VALUES
(1, '66z5s8', 2, 2147483647, '4/16', 20, 'creditcard', '', '2015-01-09', 'deposit', 1),
(2, '', 2, 0, '', 10, 'creditcard', '', '2015-01-09', 'withdraw', 1),
(3, 'js564d', 4, 2147483647, '9/18', 50, 'creditcard', '', '2015-01-09', 'deposit', 1),
(4, 'g5nswp', 4, 2147483647, '9/18', 500, 'creditcard', '', '2015-01-13', 'deposit', 1),
(5, '', 4, 0, '', 400, 'paypal', '', '2015-01-14', 'withdraw', 1),
(6, '3typdd', 4, 2147483647, '9/18', 36000, 'creditcard', '', '2015-01-14', 'deposit', 1),
(7, '', 4, 0, '', 144, 'Current Account', '', '2015-01-15', 'Add project Fund', 1),
(8, '', 4, 0, '', 144, 'Current Account', '', '2015-01-15', 'Add project Fund', 1),
(9, '', 4, 0, '', 50, 'Current Account', '', '2015-01-15', 'Release project Fund', 1),
(10, '', 4, 0, '', 460, 'Current Account', '', '2015-01-20', 'Release Project Fund', 1),
(11, '', 5, 0, '', 460, 'Project', '', '2015-01-20', 'Receive Project Fund', 1),
(12, 'dvq5kj', 1, 2147483647, '4/16', 50, 'creditcard', '', '2015-01-21', 'deposit', 1),
(14, '', 4, 0, '', 460, 'Current Account', '', '2015-01-21', 'Add project Fund', 1),
(15, '', 1, 0, '', 20, 'bank', '', '2015-01-22', 'withdraw', 1),
(16, '', 4, 0, '', 5, 'Current Account', '', '2015-01-22', 'Add project Fund', 1),
(17, '', 4, 0, '', 5, 'Current Account', '', '2015-01-22', 'Release Project Fund', 1),
(18, '', 5, 0, '', 5, 'Project', '', '2015-01-22', 'Receive Project Fund', 1),
(19, '', 4, 0, '', 30, 'Current Account', '', '2015-01-26', 'Add project Fund', 1),
(20, '', 4, 0, '', 2, 'Current Account', '', '2015-01-26', 'Add project Fund', 1),
(21, '', 4, 0, '', 32, 'Current Account', '', '2015-01-26', 'Release Project Fund', 1),
(22, '', 5, 0, '', 32, 'Project', '', '2015-01-26', 'Receive Project Fund', 1),
(23, 'bc9fwp', 1, 2147483647, '4/16', 50, 'creditcard', '', '2015-01-27', 'deposit', 1),
(24, '', 5, 0, '', 515, 'bank', '', '2015-01-28', 'withdraw', 0),
(25, '', 1, 0, '', 56, 'Current Account', '', '2015-01-28', 'Add project Fund', 1),
(26, '', 1, 0, '', 22, 'Current Account', '', '2015-01-28', 'Add project Fund', 1),
(27, 'j4xmb4', 40, 2147483647, '3/26', 300, 'creditcard', '', '2015-01-28', 'deposit', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE IF NOT EXISTS `tbl_users` (
  `ID` int(11) NOT NULL,
  `fbUserId` bigint(20) NOT NULL DEFAULT '0',
  `liUserId` varchar(255) NOT NULL,
  `gUserId` varchar(255) NOT NULL,
  `fName` varchar(255) NOT NULL,
  `lName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `accountType` varchar(255) NOT NULL,
  `hearAbout` varchar(255) NOT NULL,
  `userType` varchar(255) NOT NULL,
  `hourlyRate` int(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `mainCategory` varchar(255) NOT NULL,
  `delete` int(11) DEFAULT NULL,
  `overview` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `createdDate` date NOT NULL,
  `last_login` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` int(11) NOT NULL DEFAULT '0',
  `is_online` int(11) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`ID`, `fbUserId`, `liUserId`, `gUserId`, `fName`, `lName`, `email`, `userName`, `password`, `country`, `accountType`, `hearAbout`, `userType`, `hourlyRate`, `skills`, `mainCategory`, `delete`, `overview`, `image`, `createdDate`, `last_login`, `active`, `is_online`) VALUES
(1, 0, '', '', 'client', 'prject', 'eminentdeveloper69@gmail.com', 'client', '827ccb0eea8a706c4c34a16891f84e7b', 'Pakistan', 'on', 'facebook', 'Projects', 50, '', '', NULL, 'This is client account', 'liaqat2.jpg', '0000-00-00', '2016-05-22 22:18:20', 1, 1),
(2, 0, '', '', 'Freelancer', 'Free', 'eminentdeveloper69@gmail.com', 'customer', '827ccb0eea8a706c4c34a16891f84e7b', 'Pakistan', '', '', 'Freelancer', 30, '', '', NULL, 'I am web developer', 'Hydrangeas.jpg', '2015-01-09', '2016-04-18 07:54:04', 1, 0),
(3, 0, '', '', 'raza', 'malik', 'eminentdeveloper69@gmail.com', 'razamalik', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', 'Freelancer', 0, '', '', NULL, '', '', '2015-01-09', '0000-00-00 00:00:00', 1, 0),
(17, 1407534302871220, '', '', 'Mbleads', 'Mbleads', 'bilal@leadconcept.com', 'testfb', 'd41d8cd98f00b204e9800998ecf8427e', '', '', '', 'Freelancer', 0, '', '', NULL, '', '', '2015-01-13', '2015-01-22 09:55:56', 0, 0),
(25, 1602694469953512, '', '', 'Muhammad', 'Shoaib', 'mshoaib_36@yahoo.com', 'mshoaib', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', '', '2015-01-15', '2015-01-22 09:57:04', 0, 0),
(26, 10202201430397454, '', '', 'Ali', 'Kamboh', 'alimoon38@hotmail.com', 'wedding', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', '', '2015-01-15', '0000-00-00 00:00:00', 0, 0),
(29, 0, '', '', 'Bilal', 'Ahmad', 'bilalahmadue@gmail.com', 'bilalfreelancer', '827ccb0eea8a706c4c34a16891f84e7b', 'Andorra', '', '', 'Freelancer', 20, '', '', NULL, 'bilal  profile overview', '', '2015-01-15', '2015-01-15 12:13:06', 1, 0),
(30, 0, '', '', 'Bilal', 'Ahmad', 'bilalahmad_live@hotmail.com', 'Bilal12', '827ccb0eea8a706c4c34a16891f84e7b', 'Pakistan', 'on', 'facebook', 'Projects', 0, '', '', NULL, '', '', '2015-01-15', '0000-00-00 00:00:00', 0, 0),
(31, 0, '', '', 'sahil', 'mushtaq', 'sahilmushtaq827@gmail.com', 'sallo', 'ad39b16b4d0a83f7bd5470773a1cca94', 'Pakistan', '', '', 'Freelancer', 10, '', '', NULL, '', '80472281.jpg', '2015-01-16', '2015-01-16 11:32:12', 1, 1),
(32, 0, '', '', 'imran', 'abc', 'imranmani.numl@gmail.com', 'mani', 'ef0697a28073148dc0419ee45e76406b', 'Pakistan', 'on', 'facebook', 'Projects', 5, '', '', NULL, '', 'Penguins.jpg', '2015-01-16', '2015-01-16 11:59:11', 1, 1),
(33, 0, '', '', 'asim', 'sarwar', 'asim@gmail.com', 'asim97', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', 'Freelancer', 0, '', '', NULL, '', '', '2015-01-22', '0000-00-00 00:00:00', 0, 0),
(34, 0, '', '', 'Bob', 'Thebuilder', 'go2weddings@gmail.com', 'bobthebuilder', 'e8e06f998de6449ebd23fad343911490', 'Aruba', 'on', 'facebook', 'freelancer', 0, '', '', NULL, '', '', '2015-01-22', '2015-01-22 08:24:18', 1, 0),
(36, 0, '', '103528153665276248346', 'Asif', 'Mahmood', 'asifmahmooduos123@gmail.com', 'asifmahmooduos', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://lh4.googleusercontent.com/-GE2Yh4x6rbw/AAAAAAAAAAI/AAAAAAAAACU/536WR0A-eA8/photo.jpg', '2015-01-22', '0000-00-00 00:00:00', 0, 0),
(37, 0, '', '100563380854637080696', 'Sumair', 'Khokhar', 'pic.sumi@gmail.com', 'sairu786', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://lh5.googleusercontent.com/-lhU_qTOkavQ/AAAAAAAAAAI/AAAAAAAACd4/HsuVKef9FIQ/photo.jpg', '2015-01-22', '2015-01-22 10:26:11', 1, 0),
(39, 0, '', '', 'asif', 'mahmood', 'asifmahmooduos@gmail.com', 'asifmahmoodu', '827ccb0eea8a706c4c34a16891f84e7b', '', '', '', 'client', 0, '', '', NULL, '', '', '0000-00-00', '2015-01-28 10:19:54', 1, 0),
(40, 0, '', '', 'Brandon', 'Guess', 'bguess516@gmail.com', 'bguess', 'e8e06f998de6449ebd23fad343911490', '', '', '', 'client', 0, '', '', NULL, '', '', '0000-00-00', '2015-01-29 00:33:56', 1, 1),
(41, 0, '', '', 'Roy', 'Royerson', 'b4thewedding@gmail.com', 'guessb', 'e8e06f998de6449ebd23fad343911490', 'Belgium', 'company', 'facebook', 'freelancer', 0, '', '', NULL, '', '', '0000-00-00', '2015-01-28 22:52:36', 1, 0),
(42, 0, '', '', 'David', 'Bannor', 'brandonmguess@gmail.com', 'brandonmguess', 'e8e06f998de6449ebd23fad343911490', 'Angola', 'company', 'facebook', 'freelancer', 0, '', '', NULL, '', '', '0000-00-00', '2015-01-29 00:44:36', 1, 1),
(43, 0, 'SSQovAzy5t', '', 'Dariya', 'Zinchenko', 'dariya.ua@gmail.com', 'Dariya', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://media.licdn.com/mpr/mprx/0_bNwbMolTEXSZpwp75KuqMWrgQ5WvYw27LPx4MWljM8gkTfRfItUwcdL1eIdwjuD_QBWMna7f4r45', '2015-02-09', '2015-02-09 20:12:48', 1, 0),
(44, 0, '', '115601640518827632278', 'Jayadev', 'Neduvachalil', 'jayadev.n@gmail.com', 'jayadev', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://lh4.googleusercontent.com/-7k1Nz3TgDlM/AAAAAAAAAAI/AAAAAAAAHzk/Z_XUUU55HD0/photo.jpg', '2015-02-11', '2015-02-11 02:48:52', 1, 1),
(45, 848240918566752, '', '', 'Shahbaz', 'Shaukat', 'shahbazshaukat56@gmail.com', 'ted', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', '', '2015-02-16', '2015-02-16 09:45:20', 1, 1),
(46, 0, 'q6T0y5i9aT', '', 'Oscar', 'Alochi', 'osryancar@yahoo.com', 'papafavour', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://media.licdn.com/mpr/mprx/0_MC0ebCUpQawf4funJXOUb3RtkDYDqfjnRhIcb3whUHEjIwo9zkfkdT0aE_O-BHpsZTjneQzzBQQR', '2015-03-18', '0000-00-00 00:00:00', 0, 0),
(47, 0, 'LgAQPd6yvY', '', 'Apprem', 'Kumar', 'appremkumar@yahoo.in', 'appremkumar', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://media.licdn.com/mpr/mprx/0_tKNR-AMyCXk8BsSGjKusVLRy6T48tZaf43hRNL7g6_P3cexmZ3hRMcZgT-4pAJTfgKhRxtBjITWTNyX_jilFVLVAmTWhNyRfZil4AXfp58yuYEhPqtFnlK3DaqPrjyuOA8zcn96CW6T', '2015-04-25', '2015-04-25 03:48:44', 0, 0),
(48, 0, '', '', 'jim', 'ral', 'jimmyralston@gmail.com', 'jimsds', '5f4dcc3b5aa765d61d8327deb882cf99', '', '', '', 'client', 0, '', '', NULL, '', '', '0000-00-00', '2015-05-24 18:08:47', 1, 0),
(49, 0, '', '', 'jim', 'rsd', 'jimmy.ralston@gmail.com', 'jimmysds', '5f4dcc3b5aa765d61d8327deb882cf99', 'Andorra', 'individual', 'facebook', 'freelancer', 0, '', '', NULL, '', '', '0000-00-00', '2015-05-24 18:07:45', 1, 0),
(50, 0, '', '104134174318301470017', 'Lynn', 'Kingelin', 'lynnkingelin@brandstar.me', 'guest', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://lh4.googleusercontent.com/-xcI3Nhh_CMA/AAAAAAAAAAI/AAAAAAAAACs/PC_L96RSnbM/photo.jpg', '2015-07-15', '0000-00-00 00:00:00', 0, 0),
(51, 0, '', '', 'saqib', 'javed', 'saqib.javed@gminns.com', 'saqibmahay', '683b66efc77f333c644c0f3d5558e8d0', 'Pakistan', 'individual', 'facebook', 'freelancer', 0, '', '', NULL, '', '', '0000-00-00', '0000-00-00 00:00:00', 0, 0),
(52, 0, '', '', 'warui', 'warui', 'waruip2002@yahoo.com', '11408406', '8418a6060a10613434b0d527d77fa5eb', 'Kenya', 'individual', 'facebook', 'freelancer', 0, '', '', NULL, '', '', '0000-00-00', '2015-11-02 07:22:55', 1, 0),
(53, 0, '', '103436930915534388895', 'sheikh', 'abdullah', 'sheikhphoto10@gmail.com', 'sheikh abdullah.j', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://lh6.googleusercontent.com/-fhJr-g8_kvM/AAAAAAAAAAI/AAAAAAAAAYE/vxk8Bpc37kU/photo.jpg', '2015-12-10', '0000-00-00 00:00:00', 0, 0),
(54, 0, '', '105873325980416046493', 'ijaz', 'aslam', 'ijazmcs104@gmail.com', 'ijaz', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://lh5.googleusercontent.com/-2PHOCXfXclI/AAAAAAAAAAI/AAAAAAAAAB0/oHYvq5ZOsQw/photo.jpg', '2015-12-12', '2015-12-12 10:14:46', 1, 0),
(55, 0, '', '118148549152539828241', 'Siga', 'Manikandan', 'sigamanikandan@gmail.com', 'manikandan', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://lh3.googleusercontent.com/-XdUIqdMkCWA/AAAAAAAAAAI/AAAAAAAAAAA/4252rscbv5M/photo.jpg', '2016-01-08', '2016-01-08 18:27:02', 0, 1),
(56, 0, '', '116833560291480466957', 'fuzail', 'rehman', 'fuzail.rehman1988@gmail.com', 'fuzail', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://lh5.googleusercontent.com/-5N3nJdzgzCA/AAAAAAAAAAI/AAAAAAAAACo/KIG9dqXF_rE/photo.jpg', '2016-04-03', '0000-00-00 00:00:00', 0, 0),
(57, 0, '', '112786540814314745883', 'Suleman', 'Siddique', 'sulemansiddique88@gmail.com', 'Sulemaan88', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://lh5.googleusercontent.com/-wIwATVzZYq8/AAAAAAAAAAI/AAAAAAAAACM/nw483-YmigM/photo.jpg', '2016-04-06', '2016-04-06 04:17:42', 0, 0),
(58, 0, '', '115135481573622789049', 'zahid', 'devil', 'zahiddevil.444@gmail.com', 'zahid munir', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://lh5.googleusercontent.com/-0VCQpiK6fhg/AAAAAAAAAAI/AAAAAAAAACE/MBICcG8BVfA/photo.jpg', '2016-04-25', '0000-00-00 00:00:00', 0, 0),
(59, 0, '', '', 'abulkhair', 'umar', 'abulkhair90@gmail.com', 'khair-wed', '21232f297a57a5a743894a0e4a801fc3', '', '', '', 'client', 0, '', '', NULL, '', '', '0000-00-00', '0000-00-00 00:00:00', 0, 0),
(60, 0, '', '100663301110993647739', 'Zeshan', 'Qaiser', 'taj59studio@gmail.com', 'Zeshan Qaiser', '', '', '', '', 'Freelancer', 0, '', '', NULL, '', 'https://lh3.googleusercontent.com/-1y28lNUcHw0/AAAAAAAAAAI/AAAAAAAAACs/HmrfKIBV0gA/photo.jpg', '2016-05-07', '2016-05-07 17:55:24', 1, 0),
(61, 0, '', '', 'Muamer', 'Mustafic', 'muamer.mustafic.ets@gmail.com', 'muamer', 'dae7caa8cfc2c22d983bebf5c0853f0a', '', '', '', 'client', 0, '', '', NULL, '', '', '0000-00-00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_skills`
--

CREATE TABLE IF NOT EXISTS `tbl_users_skills` (
  `skillId` int(11) NOT NULL,
  `userSkill` varchar(255) NOT NULL,
  `userID` int(255) NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `updateDate` varchar(255) NOT NULL,
  `deleted` int(11) unsigned DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users_skills`
--

INSERT INTO `tbl_users_skills` (`skillId`, `userSkill`, `userID`, `startDate`, `updateDate`, `deleted`) VALUES
(1, 'HTML', 1, '', '', 0),
(2, 'CSS', 1, '', '', 0),
(3, 'php', 1, '', '', 0),
(4, 'php', 32, '', '', 0),
(5, 'html', 32, '', '', 0),
(6, 'you', 4, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wr_cancelrefnddsputeproject`
--

CREATE TABLE IF NOT EXISTS `tbl_wr_cancelrefnddsputeproject` (
  `cancelRefndDsputeID` int(11) NOT NULL,
  `projectID` int(255) NOT NULL,
  `senderID` int(255) NOT NULL,
  `receiverID` int(255) NOT NULL,
  `cancelReqBy` int(255) NOT NULL,
  `cancelRefndDsputeEscrow` int(255) NOT NULL,
  `cancelRefndDsputeFreelancer` int(255) NOT NULL,
  `cancelRefndDsputeReasion` varchar(255) NOT NULL,
  `cancelRefndDsputeStatus` varchar(255) NOT NULL,
  `cancelRefndDsputeDescribe` varchar(255) NOT NULL,
  `disputeFilesimagePath` varchar(255) NOT NULL,
  `cancelRefndDsputeDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `approvalBy` int(255) NOT NULL,
  `approval` int(22) DEFAULT '0',
  `disputeBy` int(255) NOT NULL DEFAULT '0',
  `dispute` int(22) DEFAULT '0',
  `disputeTwo` int(22) DEFAULT '0',
  `disputeByAdmin` int(22) DEFAULT '0',
  `doneDisputeTo` int(255) DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wr_cancelrefnddsputeproject`
--

INSERT INTO `tbl_wr_cancelrefnddsputeproject` (`cancelRefndDsputeID`, `projectID`, `senderID`, `receiverID`, `cancelReqBy`, `cancelRefndDsputeEscrow`, `cancelRefndDsputeFreelancer`, `cancelRefndDsputeReasion`, `cancelRefndDsputeStatus`, `cancelRefndDsputeDescribe`, `disputeFilesimagePath`, `cancelRefndDsputeDate`, `approvalBy`, `approval`, `disputeBy`, `dispute`, `disputeTwo`, `disputeByAdmin`, `doneDisputeTo`) VALUES
(37, 7, 1, 2, 1, 0, 22, 'test1', 'cancelRefund', 'testtttttt', '', '2015-01-22 08:25:42', 0, 1, 0, 0, 0, 0, 0),
(38, 1, 1, 2, 1, 0, 0, 'tesss', 'cancelJob', 'dsfsdf', '', '2015-01-27 11:22:25', 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wr_cancel_dispute`
--

CREATE TABLE IF NOT EXISTS `tbl_wr_cancel_dispute` (
  `cancelDisputeID` int(11) NOT NULL,
  `projectID` int(255) NOT NULL,
  `senderID` int(255) NOT NULL,
  `receiverID` int(255) NOT NULL,
  `refundAmountRequest` int(255) NOT NULL,
  `cancelRefndDsputeReasion` varchar(255) NOT NULL,
  `cancelRefndDsputeStatus` varchar(255) NOT NULL,
  `cancelRefndDsputeDescribe` varchar(255) NOT NULL,
  `disputeFilesimagePath` varchar(255) NOT NULL,
  `approval` int(22) DEFAULT '0',
  `dispute` int(22) DEFAULT '0',
  `approvalByAdmin` int(22) DEFAULT '0',
  `senderReqest` int(255) NOT NULL,
  `receiverRequest` int(255) NOT NULL,
  `createdDate` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wr_cancel_dispute`
--

INSERT INTO `tbl_wr_cancel_dispute` (`cancelDisputeID`, `projectID`, `senderID`, `receiverID`, `refundAmountRequest`, `cancelRefndDsputeReasion`, `cancelRefndDsputeStatus`, `cancelRefndDsputeDescribe`, `disputeFilesimagePath`, `approval`, `dispute`, `approvalByAdmin`, `senderReqest`, `receiverRequest`, `createdDate`) VALUES
(2, 1, 2, 1, 100, '', '', '', '', 0, 1, 0, 2, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wr_disputefiles`
--

CREATE TABLE IF NOT EXISTS `tbl_wr_disputefiles` (
  `disputeFilesID` int(255) NOT NULL,
  `cancelRefndDsputeDescribe` varchar(255) NOT NULL,
  `disputeFilesimagePath` varchar(255) NOT NULL,
  `projectID` int(255) NOT NULL,
  `senderID` int(255) NOT NULL,
  `receiverID` int(255) NOT NULL,
  `cancelDisputeID` int(255) NOT NULL,
  `userName` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wr_disputefiles`
--

INSERT INTO `tbl_wr_disputefiles` (`disputeFilesID`, `cancelRefndDsputeDescribe`, `disputeFilesimagePath`, `projectID`, `senderID`, `receiverID`, `cancelDisputeID`, `userName`) VALUES
(1, 'tesdaffdsfdssdaf', 'pdffile5.pdf', 1, 2, 1, 2, ''),
(2, 'rrrrrrrr', 'pdffile5.pdf', 1, 1, 2, 3, ''),
(3, 'testttttttttt', 'pdffile10.pdf', 1, 1, 2, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wr_disputefiles_old`
--

CREATE TABLE IF NOT EXISTS `tbl_wr_disputefiles_old` (
  `disputeFilesID` int(255) NOT NULL,
  `disputeFilesName` varchar(255) NOT NULL,
  `disputeFilesDescription` varchar(255) NOT NULL,
  `disputeFilesimagePath` varchar(255) NOT NULL,
  `projectID` int(255) NOT NULL,
  `senderID` int(255) NOT NULL,
  `receiverID` int(255) NOT NULL,
  `cancelrefunddsputeID` int(255) NOT NULL,
  `userName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wr_projects_milestone`
--

CREATE TABLE IF NOT EXISTS `tbl_wr_projects_milestone` (
  `milestoneID` int(11) NOT NULL,
  `projectID` int(11) NOT NULL,
  `milestoneDetail` varchar(255) NOT NULL DEFAULT '',
  `milestoneNotes` varchar(255) NOT NULL,
  `milestoneDeliveryDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `milestonecreateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `milestoneupdateDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `milestoneAmount` int(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `edit_by` int(11) NOT NULL,
  `approve_by` int(11) NOT NULL,
  `delete_by` int(11) NOT NULL,
  `milestoneStatus` int(11) NOT NULL COMMENT '0=pending 1=approve',
  `delete` int(11) NOT NULL,
  `releaseAmount` int(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wr_projects_milestone`
--

INSERT INTO `tbl_wr_projects_milestone` (`milestoneID`, `projectID`, `milestoneDetail`, `milestoneNotes`, `milestoneDeliveryDate`, `milestonecreateDate`, `milestoneupdateDate`, `milestoneAmount`, `created_by`, `edit_by`, `approve_by`, `delete_by`, `milestoneStatus`, `delete`, `releaseAmount`) VALUES
(1, 6, 'adasd', 'asdasd edfase', '2015-03-11 19:00:00', '2015-01-14 12:57:51', '2015-01-14 17:42:23', 25, 25, 25, 0, 25, 0, 1, 0),
(2, 1, 'sdasd', 'sadsdsadasd', '2015-01-13 19:00:00', '2015-01-14 13:37:51', '2015-01-14 17:37:51', 33, 20, 20, 0, 0, 0, 0, 0),
(3, 1, 'dsfdsf', 'esdfsdfdsf', '2015-01-13 19:00:00', '2015-01-14 13:38:45', '2015-01-14 17:38:45', 333, 20, 20, 0, 0, 0, 0, 0),
(4, 6, 'test milestone', 'hnbjhhuyh', '2015-03-11 19:00:00', '2015-01-14 13:40:21', '2015-01-14 17:50:01', 79, 25, 25, 0, 25, 0, 1, 0),
(5, 1, 'fsgdg', 'dsfsdfds', '2015-01-29 19:00:00', '2015-01-14 13:41:24', '2015-01-14 17:41:24', 333, 20, 20, 0, 0, 0, 0, 0),
(6, 6, 'tyytrty', 'huu yusad  da', '2015-01-23 19:00:00', '2015-01-14 13:43:27', '2015-01-15 17:10:24', 820, 25, 19, 0, 19, 0, 1, 0),
(7, 6, 'sdfsdf', 'adsadd', '2015-03-31 19:00:00', '2015-01-14 13:50:14', '2015-01-15 17:10:30', 123, 25, 25, 19, 0, 1, 0, 100),
(8, 3, 'ytrytryt', 'tytytr', '2015-01-15 19:00:00', '2015-01-15 12:42:48', '2015-01-15 17:51:56', 100, 20, 20, 19, 0, 1, 0, 100),
(9, 7, 'hi', 'gfgd', '2015-01-16 06:00:00', '2015-01-15 18:37:14', '2015-01-15 18:37:42', 20, 1, 1, 2, 0, 1, 0, 0),
(10, 12, '1st Draft', 'Testing', '2015-02-28 06:00:00', '2015-01-15 23:58:18', '2015-01-16 04:23:38', 50, 4, 4, 5, 0, 1, 0, 50),
(11, 15, 'abc', '', '2014-01-02 06:00:00', '2015-01-16 17:05:42', '2015-01-16 17:05:42', 7, 31, 31, 0, 0, 0, 0, 0),
(12, 15, 'def', '', '2015-01-19 06:00:00', '2015-01-16 17:06:47', '2015-01-16 17:22:04', 1, 31, 31, 32, 0, 1, 0, 0),
(13, 18, 'NAM', 'Have my money by monday...punk', '2015-02-11 06:00:00', '2015-01-22 21:03:30', '2015-01-22 21:30:12', 5, 5, 5, 4, 0, 1, 0, 5),
(14, 35, 'Milestone 2', 'Deliver final project.', '2016-04-23 05:00:00', '2015-03-30 19:02:50', '2016-04-09 17:48:58', 100, 1, 2, 2, 0, 1, 0, 0),
(15, 36, 'milestone', '', '2015-05-25 05:00:00', '2015-05-24 23:12:12', '2015-05-24 23:12:42', 7, 49, 49, 48, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wr_uploading_files`
--

CREATE TABLE IF NOT EXISTS `tbl_wr_uploading_files` (
  `wrUploadFileID` int(11) NOT NULL,
  `userID` int(255) NOT NULL,
  `projectID` int(255) NOT NULL,
  `wrUploadFileTitle` varchar(255) NOT NULL,
  `wrUploadFileDescription` varchar(255) NOT NULL,
  `wrUploadFileImage` varchar(255) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wr_uploading_files`
--

INSERT INTO `tbl_wr_uploading_files` (`wrUploadFileID`, `userID`, `projectID`, `wrUploadFileTitle`, `wrUploadFileDescription`, `wrUploadFileImage`, `date`) VALUES
(3, 19, 0, 'this is portfolio', '0', 'Koala1_thumb.jpg', '2015-01-12'),
(4, 19, 0, 'fewtrferwg', '0', 'GRIAK001_32.pdf', '2015-01-12'),
(13, 20, 0, 'fewf', '0', 'New_Text_Document.txt', '2015-01-13'),
(14, 20, 0, 'excel', '0', 'ie_data.xls', '2015-01-13'),
(15, 20, 0, 'pdf', '0', 'pdffile1.pdf', '2015-01-13'),
(16, 0, 0, 'ttttttt', '0', 'screenshot-4.jpg', '2015-01-13'),
(18, 20, 0, 'dsdfsds', '0', 'screenshot-41.jpg', '2015-01-13'),
(19, 20, 0, 'raza', '0', 'no-photo-64x80.jpg', '2015-01-13'),
(20, 20, 0, 'ssss', '0', 'screenshot-42.jpg', '2015-01-13'),
(21, 0, 3, 'sss', '0', 'screenshot-21.jpg', '2015-01-14'),
(22, 0, 3, 'sss', '0', 'screenshot-22.jpg', '2015-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `tz_who_is_online`
--

CREATE TABLE IF NOT EXISTS `tz_who_is_online` (
  `id` int(10) unsigned NOT NULL,
  `ip` int(11) NOT NULL DEFAULT '0',
  `country` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `countrycode` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `city` varchar(64) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upload_files`
--

CREATE TABLE IF NOT EXISTS `upload_files` (
  `ID` int(11) NOT NULL,
  `fileName` varchar(255) NOT NULL,
  `filePath` varchar(255) NOT NULL,
  `postId` int(11) NOT NULL,
  `startDate` varchar(255) NOT NULL,
  `updateDate` varchar(255) NOT NULL,
  `deleted` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_cookies`
--
ALTER TABLE `ci_cookies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_acounts_information`
--
ALTER TABLE `tbl_acounts_information`
  ADD PRIMARY KEY (`accountID`);

--
-- Indexes for table `tbl_awarded`
--
ALTER TABLE `tbl_awarded`
  ADD PRIMARY KEY (`awardedId`);

--
-- Indexes for table `tbl_balance`
--
ALTER TABLE `tbl_balance`
  ADD PRIMARY KEY (`balanceID`);

--
-- Indexes for table `tbl_cancel_reason`
--
ALTER TABLE `tbl_cancel_reason`
  ADD PRIMARY KEY (`cancelReasonID`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`chatID`);

--
-- Indexes for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `tbl_main_categories`
--
ALTER TABLE `tbl_main_categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_main_slider`
--
ALTER TABLE `tbl_main_slider`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`msgID`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notificationID`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`paymentID`);

--
-- Indexes for table `tbl_paymentrequest`
--
ALTER TABLE `tbl_paymentrequest`
  ADD PRIMARY KEY (`paymentRequestID`);

--
-- Indexes for table `tbl_portfolio`
--
ALTER TABLE `tbl_portfolio`
  ADD PRIMARY KEY (`portfolioID`);

--
-- Indexes for table `tbl_private_messages`
--
ALTER TABLE `tbl_private_messages`
  ADD PRIMARY KEY (`msgID`);

--
-- Indexes for table `tbl_project_posts`
--
ALTER TABLE `tbl_project_posts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_proposal`
--
ALTER TABLE `tbl_proposal`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_release_payment`
--
ALTER TABLE `tbl_release_payment`
  ADD PRIMARY KEY (`releasePaymentID`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`settingID`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD PRIMARY KEY (`skillID`);

--
-- Indexes for table `tbl_states`
--
ALTER TABLE `tbl_states`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_sub_categories`
--
ALTER TABLE `tbl_sub_categories`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_sub_categories_old`
--
ALTER TABLE `tbl_sub_categories_old`
  ADD PRIMARY KEY (`ID`), ADD KEY `tbl_sub_categories_ibfk_1` (`mainCatID`);

--
-- Indexes for table `tbl_transaction_history`
--
ALTER TABLE `tbl_transaction_history`
  ADD PRIMARY KEY (`transactionHistoryID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_users_skills`
--
ALTER TABLE `tbl_users_skills`
  ADD PRIMARY KEY (`skillId`);

--
-- Indexes for table `tbl_wr_cancelrefnddsputeproject`
--
ALTER TABLE `tbl_wr_cancelrefnddsputeproject`
  ADD PRIMARY KEY (`cancelRefndDsputeID`);

--
-- Indexes for table `tbl_wr_cancel_dispute`
--
ALTER TABLE `tbl_wr_cancel_dispute`
  ADD PRIMARY KEY (`cancelDisputeID`);

--
-- Indexes for table `tbl_wr_disputefiles`
--
ALTER TABLE `tbl_wr_disputefiles`
  ADD PRIMARY KEY (`disputeFilesID`);

--
-- Indexes for table `tbl_wr_disputefiles_old`
--
ALTER TABLE `tbl_wr_disputefiles_old`
  ADD PRIMARY KEY (`disputeFilesID`);

--
-- Indexes for table `tbl_wr_projects_milestone`
--
ALTER TABLE `tbl_wr_projects_milestone`
  ADD PRIMARY KEY (`milestoneID`);

--
-- Indexes for table `tbl_wr_uploading_files`
--
ALTER TABLE `tbl_wr_uploading_files`
  ADD PRIMARY KEY (`wrUploadFileID`);

--
-- Indexes for table `tz_who_is_online`
--
ALTER TABLE `tz_who_is_online`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `ip` (`ip`), ADD KEY `countrycode` (`countrycode`);

--
-- Indexes for table `upload_files`
--
ALTER TABLE `upload_files`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ci_cookies`
--
ALTER TABLE `ci_cookies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_acounts_information`
--
ALTER TABLE `tbl_acounts_information`
  MODIFY `accountID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_awarded`
--
ALTER TABLE `tbl_awarded`
  MODIFY `awardedId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_balance`
--
ALTER TABLE `tbl_balance`
  MODIFY `balanceID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_cancel_reason`
--
ALTER TABLE `tbl_cancel_reason`
  MODIFY `cancelReasonID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `chatID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_contact_us`
--
ALTER TABLE `tbl_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_main_categories`
--
ALTER TABLE `tbl_main_categories`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_main_slider`
--
ALTER TABLE `tbl_main_slider`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `msgID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notificationID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=185;
--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_paymentrequest`
--
ALTER TABLE `tbl_paymentrequest`
  MODIFY `paymentRequestID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_portfolio`
--
ALTER TABLE `tbl_portfolio`
  MODIFY `portfolioID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_private_messages`
--
ALTER TABLE `tbl_private_messages`
  MODIFY `msgID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_project_posts`
--
ALTER TABLE `tbl_project_posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_proposal`
--
ALTER TABLE `tbl_proposal`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `tbl_release_payment`
--
ALTER TABLE `tbl_release_payment`
  MODIFY `releasePaymentID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `settingID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `skillID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_states`
--
ALTER TABLE `tbl_states`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_sub_categories`
--
ALTER TABLE `tbl_sub_categories`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_sub_categories_old`
--
ALTER TABLE `tbl_sub_categories_old`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_transaction_history`
--
ALTER TABLE `tbl_transaction_history`
  MODIFY `transactionHistoryID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=62;
--
-- AUTO_INCREMENT for table `tbl_users_skills`
--
ALTER TABLE `tbl_users_skills`
  MODIFY `skillId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_wr_cancelrefnddsputeproject`
--
ALTER TABLE `tbl_wr_cancelrefnddsputeproject`
  MODIFY `cancelRefndDsputeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `tbl_wr_cancel_dispute`
--
ALTER TABLE `tbl_wr_cancel_dispute`
  MODIFY `cancelDisputeID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_wr_disputefiles`
--
ALTER TABLE `tbl_wr_disputefiles`
  MODIFY `disputeFilesID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_wr_disputefiles_old`
--
ALTER TABLE `tbl_wr_disputefiles_old`
  MODIFY `disputeFilesID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_wr_projects_milestone`
--
ALTER TABLE `tbl_wr_projects_milestone`
  MODIFY `milestoneID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_wr_uploading_files`
--
ALTER TABLE `tbl_wr_uploading_files`
  MODIFY `wrUploadFileID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tz_who_is_online`
--
ALTER TABLE `tz_who_is_online`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `upload_files`
--
ALTER TABLE `upload_files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_sub_categories_old`
--
ALTER TABLE `tbl_sub_categories_old`
ADD CONSTRAINT `tbl_sub_categories_old_ibfk_1` FOREIGN KEY (`mainCatID`) REFERENCES `tbl_main_categories` (`ID`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
