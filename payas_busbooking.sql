-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 06, 2015 at 10:56 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `payas_busbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE IF NOT EXISTS `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `captcha`
--


-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `countries_id` int(11) NOT NULL AUTO_INCREMENT,
  `countries_name` varchar(64) NOT NULL DEFAULT '',
  `countries_iso_code_2` char(2) NOT NULL DEFAULT '',
  `countries_iso_code_3` char(3) NOT NULL DEFAULT '',
  `address_format_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`countries_id`),
  KEY `IDX_COUNTRIES_NAME` (`countries_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=240 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`countries_id`, `countries_name`, `countries_iso_code_2`, `countries_iso_code_3`, `address_format_id`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 1),
(2, 'Albania', 'AL', 'ALB', 1),
(3, 'Algeria', 'DZ', 'DZA', 1),
(4, 'American Samoa', 'AS', 'ASM', 1),
(5, 'Andorra', 'AD', 'AND', 1),
(6, 'Angola', 'AO', 'AGO', 1),
(7, 'Anguilla', 'AI', 'AIA', 1),
(8, 'Antarctica', 'AQ', 'ATA', 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1),
(10, 'Argentina', 'AR', 'ARG', 1),
(11, 'Armenia', 'AM', 'ARM', 1),
(12, 'Aruba', 'AW', 'ABW', 1),
(13, 'Australia', 'AU', 'AUS', 1),
(14, 'Austria', 'AT', 'AUT', 5),
(15, 'Azerbaijan', 'AZ', 'AZE', 1),
(16, 'Bahamas', 'BS', 'BHS', 1),
(17, 'Bahrain', 'BH', 'BHR', 1),
(18, 'Bangladesh', 'BD', 'BGD', 1),
(19, 'Barbados', 'BB', 'BRB', 1),
(20, 'Belarus', 'BY', 'BLR', 1),
(21, 'Belgium', 'BE', 'BEL', 1),
(22, 'Belize', 'BZ', 'BLZ', 1),
(23, 'Benin', 'BJ', 'BEN', 1),
(24, 'Bermuda', 'BM', 'BMU', 1),
(25, 'Bhutan', 'BT', 'BTN', 1),
(26, 'Bolivia', 'BO', 'BOL', 1),
(27, 'Bosnia & Herzegowina', 'BA', 'BIH', 1),
(28, 'Botswana', 'BW', 'BWA', 1),
(29, 'Bouvet Island', 'BV', 'BVT', 1),
(30, 'Brazil', 'BR', 'BRA', 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1),
(33, 'Bulgaria', 'BG', 'BGR', 1),
(34, 'Burkina Faso', 'BF', 'BFA', 1),
(35, 'Burundi', 'BI', 'BDI', 1),
(36, 'Cambodia', 'KH', 'KHM', 1),
(37, 'Cameroon', 'CM', 'CMR', 1),
(38, 'Canada', 'CA', 'CAN', 1),
(39, 'Cape Verde', 'CV', 'CPV', 1),
(40, 'Cayman Islands', 'KY', 'CYM', 1),
(41, 'Central African Republic', 'CF', 'CAF', 1),
(42, 'Chad', 'TD', 'TCD', 1),
(43, 'Chile', 'CL', 'CHL', 1),
(44, 'China', 'CN', 'CHN', 1),
(45, 'Christmas Island', 'CX', 'CXR', 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1),
(47, 'Colombia', 'CO', 'COL', 1),
(48, 'Comoros', 'KM', 'COM', 1),
(49, 'Congo', 'CG', 'COG', 1),
(50, 'Cook Islands', 'CK', 'COK', 1),
(51, 'Costa Rica', 'CR', 'CRI', 1),
(52, 'Cote D''Ivoire', 'CI', 'CIV', 1),
(53, 'Croatia', 'HR', 'HRV', 1),
(54, 'Cuba', 'CU', 'CUB', 1),
(55, 'Cyprus', 'CY', 'CYP', 1),
(56, 'Czech Republic', 'CZ', 'CZE', 1),
(57, 'Denmark', 'DK', 'DNK', 1),
(58, 'Djibouti', 'DJ', 'DJI', 1),
(59, 'Dominica', 'DM', 'DMA', 1),
(60, 'Dominican Republic', 'DO', 'DOM', 1),
(61, 'East Timor', 'TP', 'TMP', 1),
(62, 'Ecuador', 'EC', 'ECU', 1),
(63, 'Egypt', 'EG', 'EGY', 1),
(64, 'El Salvador', 'SV', 'SLV', 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1),
(66, 'Eritrea', 'ER', 'ERI', 1),
(67, 'Estonia', 'EE', 'EST', 1),
(68, 'Ethiopia', 'ET', 'ETH', 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1),
(70, 'Faroe Islands', 'FO', 'FRO', 1),
(71, 'Fiji', 'FJ', 'FJI', 1),
(72, 'Finland', 'FI', 'FIN', 1),
(73, 'France', 'FR', 'FRA', 1),
(74, 'France, Metropolitan', 'FX', 'FXX', 1),
(75, 'French Guiana', 'GF', 'GUF', 1),
(76, 'French Polynesia', 'PF', 'PYF', 1),
(77, 'French Southern Territories', 'TF', 'ATF', 1),
(78, 'Gabon', 'GA', 'GAB', 1),
(79, 'Gambia', 'GM', 'GMB', 1),
(80, 'Georgia', 'GE', 'GEO', 1),
(81, 'Germany', 'DE', 'DEU', 5),
(82, 'Ghana', 'GH', 'GHA', 1),
(83, 'Gibraltar', 'GI', 'GIB', 1),
(84, 'Greece', 'GR', 'GRC', 1),
(85, 'Greenland', 'GL', 'GRL', 1),
(86, 'Grenada', 'GD', 'GRD', 1),
(87, 'Guadeloupe', 'GP', 'GLP', 1),
(88, 'Guam', 'GU', 'GUM', 1),
(89, 'Guatemala', 'GT', 'GTM', 1),
(90, 'Guinea', 'GN', 'GIN', 1),
(91, 'Guinea-bissau', 'GW', 'GNB', 1),
(92, 'Guyana', 'GY', 'GUY', 1),
(93, 'Haiti', 'HT', 'HTI', 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1),
(95, 'Honduras', 'HN', 'HND', 1),
(96, 'Hong Kong', 'HK', 'HKG', 1),
(97, 'Hungary', 'HU', 'HUN', 1),
(98, 'Iceland', 'IS', 'ISL', 1),
(99, 'India', 'IN', 'IND', 1),
(100, 'Indonesia', 'ID', 'IDN', 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1),
(102, 'Iraq', 'IQ', 'IRQ', 1),
(103, 'Ireland', 'IE', 'IRL', 1),
(104, 'Israel', 'IL', 'ISR', 1),
(105, 'Italy', 'IT', 'ITA', 1),
(106, 'Jamaica', 'JM', 'JAM', 1),
(107, 'Japan', 'JP', 'JPN', 1),
(108, 'Jordan', 'JO', 'JOR', 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1),
(110, 'Kenya', 'KE', 'KEN', 1),
(111, 'Kiribati', 'KI', 'KIR', 1),
(112, 'Korea, Democratic People''s Republic of', 'KP', 'PRK', 1),
(113, 'Korea, Republic of', 'KR', 'KOR', 1),
(114, 'Kuwait', 'KW', 'KWT', 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1),
(116, 'Lao People''s Democratic Republic', 'LA', 'LAO', 1),
(117, 'Latvia', 'LV', 'LVA', 1),
(118, 'Lebanon', 'LB', 'LBN', 1),
(119, 'Lesotho', 'LS', 'LSO', 1),
(120, 'Liberia', 'LR', 'LBR', 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1),
(122, 'Liechtenstein', 'LI', 'LIE', 1),
(123, 'Lithuania', 'LT', 'LTU', 1),
(124, 'Luxembourg', 'LU', 'LUX', 1),
(125, 'Macau', 'MO', 'MAC', 1),
(126, 'Macedonia', 'MK', 'MKD', 1),
(127, 'Madagascar', 'MG', 'MDG', 1),
(128, 'Malawi', 'MW', 'MWI', 1),
(129, 'Malaysia', 'MY', 'MYS', 1),
(130, 'Maldives', 'MV', 'MDV', 1),
(131, 'Mali', 'ML', 'MLI', 1),
(132, 'Malta', 'MT', 'MLT', 1),
(133, 'Marshall Islands', 'MH', 'MHL', 1),
(134, 'Martinique', 'MQ', 'MTQ', 1),
(135, 'Mauritania', 'MR', 'MRT', 1),
(136, 'Mauritius', 'MU', 'MUS', 1),
(137, 'Mayotte', 'YT', 'MYT', 1),
(138, 'Mexico', 'MX', 'MEX', 1),
(139, 'Micronesia', 'FM', 'FSM', 1),
(140, 'Moldova, Republic of', 'MD', 'MDA', 1),
(141, 'Monaco', 'MC', 'MCO', 1),
(142, 'Mongolia', 'MN', 'MNG', 1),
(143, 'Montserrat', 'MS', 'MSR', 1),
(144, 'Morocco', 'MA', 'MAR', 1),
(145, 'Mozambique', 'MZ', 'MOZ', 1),
(146, 'Myanmar', 'MM', 'MMR', 1),
(147, 'Namibia', 'NA', 'NAM', 1),
(148, 'Nauru', 'NR', 'NRU', 1),
(149, 'Nepal', 'NP', 'NPL', 1),
(150, 'Netherlands', 'NL', 'NLD', 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1),
(152, 'New Caledonia', 'NC', 'NCL', 1),
(153, 'New Zealand', 'NZ', 'NZL', 1),
(154, 'Nicaragua', 'NI', 'NIC', 1),
(155, 'Niger', 'NE', 'NER', 1),
(156, 'Nigeria', 'NG', 'NGA', 1),
(157, 'Niue', 'NU', 'NIU', 1),
(158, 'Norfolk Island', 'NF', 'NFK', 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1),
(160, 'Norway', 'NO', 'NOR', 1),
(161, 'Oman', 'OM', 'OMN', 1),
(162, 'Pakistan', 'PK', 'PAK', 1),
(163, 'Palau', 'PW', 'PLW', 1),
(164, 'Panama', 'PA', 'PAN', 1),
(165, 'Papua New Guinea', 'PG', 'PNG', 1),
(166, 'Paraguay', 'PY', 'PRY', 1),
(167, 'Peru', 'PE', 'PER', 1),
(168, 'Philippines', 'PH', 'PHL', 1),
(169, 'Pitcairn', 'PN', 'PCN', 1),
(170, 'Poland', 'PL', 'POL', 1),
(171, 'Portugal', 'PT', 'PRT', 1),
(172, 'Puerto Rico', 'PR', 'PRI', 1),
(173, 'Qatar', 'QA', 'QAT', 1),
(174, 'Reunion', 'RE', 'REU', 1),
(175, 'Romania', 'RO', 'ROM', 1),
(176, 'Russian Federation', 'RU', 'RUS', 1),
(177, 'Rwanda', 'RW', 'RWA', 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1),
(179, 'Saint Lucia', 'LC', 'LCA', 1),
(180, 'Saint Vincent', 'VC', 'VCT', 1),
(181, 'Samoa', 'WS', 'WSM', 1),
(182, 'San Marino', 'SM', 'SMR', 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1),
(184, 'Saudi Arabia', 'SA', 'SAU', 1),
(185, 'Senegal', 'SN', 'SEN', 1),
(186, 'Seychelles', 'SC', 'SYC', 1),
(187, 'Sierra Leone', 'SL', 'SLE', 1),
(188, 'Singapore', 'SG', 'SGP', 4),
(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 1),
(190, 'Slovenia', 'SI', 'SVN', 1),
(191, 'Solomon Islands', 'SB', 'SLB', 1),
(192, 'Somalia', 'SO', 'SOM', 1),
(193, 'South Africa', 'ZA', 'ZAF', 1),
(194, 'South Georgia', 'GS', 'SGS', 1),
(195, 'Spain', 'ES', 'ESP', 3),
(196, 'Sri Lanka', 'LK', 'LKA', 1),
(197, 'St. Helena', 'SH', 'SHN', 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1),
(199, 'Sudan', 'SD', 'SDN', 1),
(200, 'Suriname', 'SR', 'SUR', 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1),
(202, 'Swaziland', 'SZ', 'SWZ', 1),
(203, 'Sweden', 'SE', 'SWE', 1),
(204, 'Switzerland', 'CH', 'CHE', 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1),
(206, 'Taiwan', 'TW', 'TWN', 1),
(207, 'Tajikistan', 'TJ', 'TJK', 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1),
(209, 'Thailand', 'TH', 'THA', 1),
(210, 'Togo', 'TG', 'TGO', 1),
(211, 'Tokelau', 'TK', 'TKL', 1),
(212, 'Tonga', 'TO', 'TON', 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1),
(214, 'Tunisia', 'TN', 'TUN', 1),
(215, 'Turkey', 'TR', 'TUR', 1),
(216, 'Turkmenistan', 'TM', 'TKM', 1),
(217, 'Turks & Caicos Islands', 'TC', 'TCA', 1),
(218, 'Tuvalu', 'TV', 'TUV', 1),
(219, 'Uganda', 'UG', 'UGA', 1),
(220, 'Ukraine', 'UA', 'UKR', 1),
(221, 'United Arab Emirates', 'AE', 'ARE', 1),
(222, 'United Kingdom', 'GB', 'GBR', 1),
(223, 'United States', 'US', 'USA', 2),
(224, 'US Minor Outlying Islands', 'UM', 'UMI', 1),
(225, 'Uruguay', 'UY', 'URY', 1),
(226, 'Uzbekistan', 'UZ', 'UZB', 1),
(227, 'Vanuatu', 'VU', 'VUT', 1),
(228, 'Vatican City State', 'VA', 'VAT', 1),
(229, 'Venezuela', 'VE', 'VEN', 1),
(230, 'Viet Nam', 'VN', 'VNM', 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1),
(233, 'Wallis & Futuna Islands', 'WF', 'WLF', 1),
(234, 'Western Sahara', 'EH', 'ESH', 1),
(235, 'Yemen', 'YE', 'YEM', 1),
(236, 'Yugoslavia', 'YU', 'YUG', 1),
(237, 'Zaire', 'ZR', 'ZAR', 1),
(238, 'Zambia', 'ZM', 'ZMB', 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_adminuser`
--

CREATE TABLE IF NOT EXISTS `tbl_adminuser` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `compid` int(1) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `Address` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `usertype` char(1) NOT NULL,
  `Category` char(2) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`aid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=98 ;

--
-- Dumping data for table `tbl_adminuser`
--

INSERT INTO `tbl_adminuser` (`aid`, `compid`, `fullname`, `Address`, `email`, `phone`, `username`, `password`, `usertype`, `Category`, `status`) VALUES
(17, 34, 'Administrator', 'Pokhara', 'admin@yahoo.com', '9841617657', 'admin', 'admin', 'a', 'ad', 'Y'),
(96, 93, 'raj prakash', 'dhapasi', 'rajnp03@gmail.com', '21474836471', 'raj', 'raj', 'n', 'ag', 'Y'),
(95, 90, 'Dilip', 'Maitri Path', 'my', '8948438', 'dilip', 'dilip', 'n', 'ag', 'Y'),
(94, 78, 'Ganesh Jha', 'Kalanki, Kathmandu', 'ganesh@hotmail.com', '8787878', 'Ganesh', 'ganesh', 'n', 'br', 'Y'),
(93, 89, 'Rabin Deuda', 'Chabahil', 'zzz@zzz.com', '5454544', 'Rabin', 'rabin', 'a', 'ag', 'Y'),
(92, 88, 'Naren Limbu', 'Sundara kathmandu', 'aaa@aaa.com', '454545', 'Naren', 'naren', 'a', 'ag', 'Y'),
(91, 87, 'amit', 'new', 'amit', '', '', '', 'a', 'ag', 'Y'),
(90, 86, 'bimal pratap', 'pepsikhola-20', 'bimal43@hotmail.com', '87909080', ' ', 'bimal', 'a', 'ag', 'N'),
(89, 84, 'Rajesh Thapa', 'Kalanki, Kathmandu', 'thapa_rajesh@gmail.com', '454545', 'Rajesh', 'rajesh', 'a', 'ag', 'Y'),
(88, 83, 'fridey', 'kathmandu', 'dbioefk@kjhasdfi.com', '409854', 'fridey', 'fridey', 'n', 'ag', 'Y'),
(87, 82, 'raju', 'ca', 'mmmm', '333', 'raju', 'raju', 'a', 'ag', 'Y'),
(86, 80, 'Bidur Sir', 'Chitwan', 'bidur@gmail.com', '034544', 'bidur', 'bidur', 'a', 'br', 'Y'),
(85, 79, 'Anuj Sir', 'Lumbani', 'anuj@gmail.com', '0334433', 'anuj', 'anuj', 'a', 'br', 'Y'),
(84, 78, 'Raj Shrestha', 'Kathmandu', 'raj@yahoo.com', '03343333', 'raaz', 'raaz', 'a', 'br', 'Y'),
(83, 77, 'Bimal Chand', 'Pokhara', 'bimal@gmail.com', '02444433', 'bimal', 'bimal', 'a', 'br', 'Y'),
(97, 34, '', '', '', '', '', '', 'a', 'ad', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_busdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_busdetails` (
  `bus_id` int(11) NOT NULL AUTO_INCREMENT,
  `cmpid` varchar(20) DEFAULT NULL,
  `busNo` varchar(20) NOT NULL,
  `root_id` int(5) DEFAULT NULL,
  `fare` int(8) DEFAULT NULL,
  `totalSeat` int(11) NOT NULL,
  `seatplan` varchar(32) NOT NULL,
  `departure_time` time DEFAULT NULL,
  `ampm` varchar(2) NOT NULL,
  PRIMARY KEY (`bus_id`),
  UNIQUE KEY `bid` (`bus_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tbl_busdetails`
--

INSERT INTO `tbl_busdetails` (`bus_id`, `cmpid`, `busNo`, `root_id`, `fare`, `totalSeat`, `seatplan`, `departure_time`, `ampm`) VALUES
(1, '10001', 'A3', 1, 1200, 35, '', '08:40:00', 'AM'),
(31, '10001', 'A20', 37, 1550, 35, '', '04:00:00', 'AM'),
(26, '10001', 'A13', 38, 900, 35, '', '06:00:00', 'AM'),
(9, '10001', 'A8', 2, 1550, 35, '', '06:45:00', 'AM'),
(24, '10001', 'A11', 41, 900, 35, '', '06:10:00', 'AM'),
(27, '10001', 'A14', 36, 950, 35, '', '09:25:00', 'AM'),
(25, '10001', 'A12', 39, 1100, 35, '', '05:00:05', 'AM'),
(23, '10001', 'A10', 40, 900, 35, '', '05:00:00', 'AM'),
(22, '10001', 'A5', 35, 1500, 35, '', '06:10:00', 'AM'),
(21, '10001', 'A4', 34, 1000, 35, '', '08:40:00', 'AM'),
(20, '10001', 'A2', 33, 900, 35, '', '06:10:00', 'AM'),
(19, '10001', 'A1', 32, 900, 35, '', '06:00:00', 'AM'),
(28, '10001', '456', 38, 1470, 35, '', '08:00:00', 'AM'),
(29, '10001', 'GA22', 42, 1560, 35, '', '08:45:00', 'AM'),
(32, '10001', 'A30', 33, 420, 35, '', '06:00:00', 'AM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE IF NOT EXISTS `tbl_city` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_code` int(5) NOT NULL,
  `city_name` varchar(128) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`city_id`, `city_code`, `city_name`) VALUES
(1, 1, 'Pokhara'),
(2, 2, 'Kathmandu'),
(10, 4, 'Chitwan'),
(9, 3, 'Lumbani');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companyinfo`
--

CREATE TABLE IF NOT EXISTS `tbl_companyinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cmpid` varchar(20) DEFAULT NULL,
  `brid` int(8) NOT NULL,
  `agid` int(8) NOT NULL,
  `comp_name` varchar(64) DEFAULT NULL,
  `address` varchar(64) DEFAULT NULL,
  `city` varchar(32) NOT NULL,
  `country` varchar(16) DEFAULT NULL,
  `phoneNo` varchar(20) NOT NULL,
  `faxNo` varchar(20) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `username` varchar(32) DEFAULT NULL,
  `contact_person` varchar(32) NOT NULL,
  `desination` varchar(32) NOT NULL,
  `cnt_phone` varchar(20) NOT NULL,
  `cnt_mobile` varchar(20) NOT NULL,
  `password` varchar(52) NOT NULL,
  `pin_no` int(10) NOT NULL,
  `login_hit` int(5) NOT NULL,
  `last_password` varchar(52) NOT NULL,
  `login_failure` int(5) NOT NULL,
  `status` varchar(3) DEFAULT NULL,
  `Category` varchar(15) DEFAULT NULL,
  `pnrinitial` varchar(2) NOT NULL DEFAULT 'A',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Dumping data for table `tbl_companyinfo`
--

INSERT INTO `tbl_companyinfo` (`id`, `cmpid`, `brid`, `agid`, `comp_name`, `address`, `city`, `country`, `phoneNo`, `faxNo`, `email`, `username`, `contact_person`, `desination`, `cnt_phone`, `cnt_mobile`, `password`, `pin_no`, `login_hit`, `last_password`, `login_failure`, `status`, `Category`, `pnrinitial`) VALUES
(34, '1', 0, 0, 'Mountain Overland Travels and Tours(P) Ltd ', 'Pokhara', 'Pokhara', 'Nepal', '98444444444', '98444444444', 'moountainoverland@gmail.com', NULL, 'Som Thapa', 'Chairman', '88888', '88888', '', 0, 0, '', 0, 'Y', NULL, ''),
(77, '1', 1, 0, 'Pokhara Branch', 'Pokhara', 'Pokhara', 'Nepal', '01455444', '014565555', 'pokhara@gmail.com', NULL, 'Bimal Chand (CHAND)', 'Branch Manager', '035554444', '986544333', '', 0, 0, '', 0, 'Y', 'b', 'A'),
(78, '1', 2, 0, 'Kathmandu Branch', 'Kathmandu', 'Kathmandu', 'Nepal', '02665555', '0466666', 'kathmandu@gmail.com', NULL, 'Raj Shrestha', 'Branch Manager', '0455555', '9842665444', '', 0, 0, '', 0, 'Y', 'b', 'B'),
(79, '1', 3, 0, 'Lumbani Branch', 'Lumbini', 'Lumbini', 'Nepal', '03333322', '03344443', 'lumbani@gmail.com', NULL, 'Anuj Sir', 'Branch Manager', '0455544', '9854333', '', 0, 0, '', 0, 'Y', 'b', 'C'),
(80, '1', 4, 0, 'Chitwan Branch', 'Chitwan', 'Chitwan', 'Nepal', '04266655', '033444', 'chitwan@gmail.com', NULL, 'Bidur Maharjan', 'Branch Manager', '034444333', '98543323', '', 0, 0, '', 0, 'Y', 'b', 'D'),
(87, '1', 4, 2, 'Agency 2', 'Chitwan', 'Chitwan', 'Nepal', 'dfkjie', '930003', 'amit@yahoo.com', NULL, 'amit', 'kathmandu', '300039903', '399993993', '', 0, 0, '', 0, 'Y', 'a', 'D2'),
(82, '1', 3, 1, 'Rakesh travels', 'Bhairahawa', 'Bhairahawa', 'Nepal', '9838838', '88228', 'missile4u', NULL, 'rakesh', 'Agency Manager', '099888', '998888', '', 0, 0, '', 0, 'Y', 'a', 'C1'),
(83, '1', 4, 1, 'Agency 1', 'chitwan', 'chitwan', 'Nepal', '343343', '23434', 'dip@yahoo.com', NULL, 'diipuu', 'pokhara', '23234234', '123324234', '', 0, 0, '', 0, 'Y', 'a', 'D1'),
(84, '1', 2, 1, 'XYZ company ltd', 'Kalanki', 'Kathmandu', 'Nepal', '4561232', '4561231', 'thapa_rajesh@gmail.com', NULL, 'Rajesh Thapa', 'Agency Head', '4564564', '98989898', '', 0, 0, '', 0, 'Y', 'a', 'B1'),
(85, '1', 3, 2, 'Abc(Lumbani branch)', 'Kathmandu', 'Kathmandu', '149', '97665544', '', 'rajnp03@gmail.com', NULL, 'Raj Prakash', 'Agency manager', '97665544', '9887655', '', 0, 0, '', 0, 'N', 'a', 'C2'),
(86, '1', 1, 1, 'Bimal Taravels and tour pvt.ltd ', 'pulchok', 'kathmandu', 'Nepal', '9841617657', '4354345343', 'bimalchand3@gmail.com', NULL, 'Bimal Chand', 'Agency manager', '9841617657', '9841617657', '', 0, 0, '', 0, 'Y', 'a', 'A1'),
(88, '1', 2, 2, 'aaa company ltd', 'Sundara', 'Kathmandu', 'Nepal', '424545454', '45455545', 'aaa@aaa.com', NULL, 'Naren Limbu', 'Agency Head', '45454545', '454545445', '', 0, 0, '', 0, 'Y', 'a', 'B2'),
(89, '1', 2, 3, 'zzz company', 'Chabahil', 'Kathmandu', 'Nepal', '45545454', '45454545', 'zzz@zzz.com', NULL, 'Rabin Deuda', 'Agency Head', '5454544', '6565656', '', 0, 0, '', 0, 'Y', 'a', 'B3'),
(90, '1', 3, 3, 'Sai Travels Pvt. Ltd.', 'Bhairahawa', 'Bhairahawa', 'Nepal', '9843041987', '1212313', 'me', NULL, 'Dilip', 'Agency Manager', '984329243', '64363426', '', 0, 0, '', 0, 'Y', 'a', 'C3'),
(91, '1', 2, 4, 'nibus company', 'Kamalpokhari', 'Kathmandu', '149', '5454545', '4545', 'kapali_nitesh@gmail.com', NULL, 'Nitesh Kapali', 'Agency manager', '5454545', '655556', '', 0, 0, '', 0, 'Y', 'a', 'B4'),
(92, '1', 4, 3, 'second hand business', 'kiritpur', 'kathmandu', '149', '983748899', '', 'bid@yahoenkla.com', NULL, 'bidur maharjan', 'Agency manager', '983748899', '989809809', '', 0, 0, '', 0, 'Y', 'a', 'D3'),
(93, '1', 1, 2, 'Sita Taravels ', 'Rautahat', 'Rautahat', 'Nepal', '9841617657', '4354345343', 'bimal43@hotmail.com', NULL, 'Raj Prakash', 'Agency manager', '9841617657', '9841617657', '', 0, 0, '', 0, 'Y', 'a', 'A2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver`
--

CREATE TABLE IF NOT EXISTS `tbl_driver` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `age` int(3) NOT NULL,
  `joinDate` date NOT NULL,
  `leftDate` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `tbl_driver`
--

INSERT INTO `tbl_driver` (`id`, `name`, `address`, `mobile`, `age`, `joinDate`, `leftDate`) VALUES
(1, 'bimal chand', 'pepsikhola-20', '5345353', 24, '1970-01-01', '1970-01-01'),
(15, 'raja ram thapa', 'Kalanki-2', '534535343432', 30, '2012-12-19', '2012-12-28'),
(4, 'santosh', 'Kalanki', '32434345443', 24, '2012-12-11', '2012-12-21'),
(6, 'pradip chand', 'mahendranager, kanchanpur', '34343432', 16, '2012-12-02', '2012-12-18'),
(7, 'umesh chand', 'mahendranager, kanchanpur', '465677676543', 16, '2012-12-05', '2012-12-17'),
(8, 'ajay chaudhary', 'janakpur-23', '678686543542', 32, '2012-12-11', '2012-12-23'),
(9, 'raju shaha', 'mahendranager, kanchanpur', '465677676543', 23, '2012-12-12', '2012-12-22'),
(10, 'hikmat thapa', 'koteswor-4', '7698798776', 33, '2012-12-15', '2012-12-19'),
(14, 'raju katel', 'mahendranager, kanchanpur', '34343432', 16, '2012-12-09', '2012-12-28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expense`
--

CREATE TABLE IF NOT EXISTS `tbl_expense` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `bdId` int(4) NOT NULL,
  `busid` int(4) NOT NULL,
  `expBy` char(1) DEFAULT NULL,
  `route` int(4) NOT NULL,
  `remarks` varchar(256) NOT NULL,
  `amount` double(13,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `tbl_expense`
--

INSERT INTO `tbl_expense` (`id`, `date`, `bdId`, `busid`, `expBy`, `route`, `remarks`, `amount`) VALUES
(3, '2012-12-23', 4, 26, 'B', 38, 'disel expenses', 2000.00),
(7, '2012-12-18', 3, 23, 'D', 40, 'personal use', 400.00),
(9, '2012-12-23', 7, 22, 'B', 2, 'fuel expenses', 5000.00),
(10, '2012-12-23', 9, 7, 'D', 41, 'personal expenses', 3000.00),
(11, '2012-12-24', 8, 21, 'D', 40, 'personal expenses', 5000.00),
(12, '2012-12-24', 6, 20, 'D', 1, 'break repairing', 2000.00),
(13, '2012-12-25', 10, 1, 'D', 41, 'personal use', 2000.00),
(16, '2012-12-26', 7, 26, 'B', 38, 'bus repairing', 10000.00),
(15, '2012-12-25', 12, 26, 'D', 1, 'bus servicing', 4000.00),
(17, '2012-12-28', 4, 9, 'B', 40, 'bus servicing', 2000.00),
(18, '2012-12-28', 4, 9, 'D', 40, 'bus servicing', 2000.00),
(20, '2012-12-28', 14, 9, 'D', 42, 'khaja expenses...', 120.00),
(22, '2013-02-13', 1, 1, 'D', 1, '', 123333.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback_contactus`
--

CREATE TABLE IF NOT EXISTS `tbl_feedback_contactus` (
  `cfid` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `name` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `remarks` text NOT NULL,
  `type` char(1) NOT NULL,
  `ipaddress` varchar(32) NOT NULL,
  `verified` char(1) NOT NULL,
  `replied` char(1) NOT NULL,
  `verifiedby` char(1) NOT NULL,
  `repliedby` char(1) NOT NULL,
  `verifieddate` datetime NOT NULL,
  `replieddate` datetime NOT NULL,
  `replymessage` text NOT NULL,
  PRIMARY KEY (`cfid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tbl_feedback_contactus`
--

INSERT INTO `tbl_feedback_contactus` (`cfid`, `date_time`, `name`, `email`, `remarks`, `type`, `ipaddress`, `verified`, `replied`, `verifiedby`, `repliedby`, `verifieddate`, `replieddate`, `replymessage`) VALUES
(17, '2013-02-12 07:47:34', 'suresh', 'suresh@gmail.com', 'fdfdsf', 'f', '49.244.7.143', 'y', 'y', '0', '0', '2013-02-12 02:47:34', '2013-02-12 02:47:34', 'fdsafdsasfsd'),
(25, '2013-02-12 07:48:47', 'frendly', 'fdkal@fjdaslk.com', 'dfasflkdfjasfkjdsf''ljdsf;lafldsfdsfdsfds\\4dd\ndfdslfkjsfsdvjaljfka', 'F', '49.244.7.143', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(14, '2012-08-14 07:44:32', 'harish sir', 'harish@yahoo.com', 'hi harish', '', '', 'y', 'y', '0', '0', '2012-08-13 12:14:32', '2012-08-13 12:14:32', 'fsfds hi raj sir'),
(13, '2012-09-11 10:20:35', 'bimal', 'aryn_lucky@yahoo.com', 'gtghtrhtrhtr', 'f', '192.168.1.106', 'y', 'y', '0', '0', '2012-09-10 14:50:35', '2012-09-10 14:50:35', 'verified by bimal\n'),
(12, '2012-12-06 08:15:39', 'bimal', 'aryn.lucky1986@gmail.com', 'gtghtrhtrhtr', 'f', '49.244.121.237', 'y', 'y', '0', '0', '2012-12-06 00:15:39', '2012-12-06 00:15:39', 'hello sir how r u kata ho'),
(15, '2012-08-13 07:27:26', 'pradip', 'pradip@gmail.com', 'fdsfsd dsfd', '', '192.168.1.4', 'y', 'y', '0', '0', '2012-08-12 11:57:26', '2012-08-12 11:57:26', 'dsacf sadsa dsacsadc sdas'),
(16, '2013-01-08 06:38:05', 'pradip', 'rajnp03@gmail.com', 'fdsfsd dsfd', 'f', '49.244.71.91', 'y', 'y', '0', '0', '2013-01-08 00:38:05', '2013-01-08 00:38:05', 'Hello how r u'),
(18, '2012-12-04 08:24:18', 'Hari Baral', 'haribaral@yahoo.com', 'testingthanks', 'F', '49.244.186.242', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(19, '2012-12-04 08:31:00', 'Damodar Parajuli', 'damodarparajuli@yahoo.com', 'testing\n\nthanks', 'f', '49.244.186.242', 'y', 'y', '0', '0', '2012-12-04 00:31:00', '2012-12-04 00:31:00', 'thank u very much for your feedback'),
(20, '2012-12-16 06:53:12', 'Chhabi Sharma', 'chhabichandra@yahoo.com', 'Hitesting, testingthanks', 'f', '49.244.249.8', 'y', 'y', '0', '0', '2012-12-15 22:53:12', '2012-12-15 22:53:12', ''),
(21, '2012-12-26 06:08:28', 'satish rajbhandari', 'zays@hotmail.com', 'where is your branch in kathmandu located?', 'F', '110.44.113.253', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(22, '2013-01-02 13:34:27', 'narmalakandel', 'narmalakandel@hotmail.com', 'we like that', 'F', '182.50.65.67', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(23, '2013-02-05 07:24:21', 'som', 'info', 'test', 'F', '49.244.192.170', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(24, '2013-02-14 04:57:57', 'Anuj', 'rajnp03@gmail.com', 'Hi Jus its a Testing.............', 'f', '49.244.124.132', 'y', 'y', '0', '0', '2013-02-13 23:57:57', '2013-02-13 23:57:57', 'Hello Raj Ke ho???');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_for_agency`
--

CREATE TABLE IF NOT EXISTS `tbl_for_agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `business_name` varchar(256) NOT NULL,
  `person_name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `city` varchar(32) NOT NULL,
  `country` varchar(128) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `mobile` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `submit_date` date NOT NULL,
  `branchid` int(4) NOT NULL,
  `created` char(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tbl_for_agency`
--

INSERT INTO `tbl_for_agency` (`id`, `business_name`, `person_name`, `address`, `city`, `country`, `phone`, `mobile`, `email`, `submit_date`, `branchid`, `created`) VALUES
(18, 'second hand business', 'bidur maharjan', 'kiritpur', 'kathmandu', '149', '983748899', '989809809', 'bid@yahoenkla.com', '2013-02-12', 80, 'Y'),
(17, 'nibus company', 'Nitesh Kapali', 'Kamalpokhari', 'Kathmandu', '149', '5454545', '655556', 'kapali_nitesh@gmail.com', '2013-02-12', 78, 'Y'),
(16, 'Jack N John', 'Anuj Pandey', 'Bhairahawa', 'Bhairahawa', '149', '9804409262', '9804409262', 'mysteryman_anuj@yahoo.com', '2013-02-12', 79, 'N'),
(15, 'Abc', 'Raj Prakash', 'Kathmandu', 'Kathmandu', '149', '97665544', '9887655', 'rajnp03@gmail.com', '2013-02-11', 79, 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE IF NOT EXISTS `tbl_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(5) NOT NULL,
  `sales_id` int(8) NOT NULL,
  `date` date NOT NULL,
  `remarks` text NOT NULL,
  `logtype` varchar(24) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id`, `user_id`, `sales_id`, `date`, `remarks`, `logtype`) VALUES
(54, 94, 43, '2013-02-12', 'Partial Modified : Previous Seat :5,7,8,10,9->Current Seat :7,8,10,9', 'Cancel'),
(52, 87, 24, '2013-02-11', 'Full Cancel', 'Cancel'),
(53, 85, 41, '2013-02-12', 'Partial Modified : Previous Seat :4,6,8,10,12,14,16,18,17,15,13,11,9,7,5,3,1,2->Current Seat :4,6,8,10,12,14,16,15,11,9,7,5,3,1,2,13', 'Cancel'),
(51, 89, 21, '2013-02-11', 'Partial Modified : Previous Seat :34,32->Current Seat :34,32,30', 'Cancel'),
(50, 89, 17, '2013-02-11', 'Partial Modified : Previous Seat :5,6,7,8->Current Seat :5,6,7,8,20,21', 'Cancel'),
(49, 89, 17, '2013-02-11', 'Partial Modified : Previous Seat :5,6,7,8->Current Seat :5,6,7,8', 'Cancel'),
(48, 89, 17, '2013-02-11', 'Partial Modified : Previous Seat :5,6,32,33->Current Seat :5,6,7,8', 'Cancel'),
(47, 86, 3, '2013-02-11', 'Partial Modified : Previous Seat :12,8,34,35->Current Seat :8', 'Cancel'),
(46, 85, 7, '2013-02-11', 'Partial Modified : Previous Seat :17,18,19,20,21->Current Seat :17,18,19,21', 'Cancel'),
(45, 86, 8, '2013-02-11', 'Full Cancel', 'Cancel'),
(44, 85, 4, '2013-02-11', 'Partial Modified : Previous Seat :30,31->Current Seat :30', 'Cancel'),
(55, 95, 59, '2013-02-12', 'Full Cancel', 'Cancel'),
(56, 86, 64, '2013-02-12', 'Partial Modified : Previous Seat :25,26,27,28,29,31,30,33,35,2,1,3,4,6,5,8,7,12,9,11,13->Current Seat :25,26,27,28,29,31,30,33,35,2,1,3,4,6,5,8,7,12,9,11,13', 'Cancel'),
(57, 83, 68, '2013-02-12', 'Partial Modified : Previous Seat :7,8,30,31->Current Seat :7,8,31', 'Cancel'),
(58, 84, 50, '2013-02-12', 'Partial Modified : Previous Seat :11,12,15,16,22,23->Current Seat :15,16,22,23', 'Cancel'),
(59, 83, 69, '2013-02-12', 'Partial Modified : Previous Seat :9,10->Current Seat :9,10,12,11', 'Cancel'),
(60, 83, 73, '2013-02-13', 'Partial Modified : Previous Seat :3,4->Current Seat :3,5,6', 'Cancel');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passangerlist`
--

CREATE TABLE IF NOT EXISTS `tbl_passangerlist` (
  `pssg_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` varchar(20) NOT NULL,
  `fullname` varchar(32) NOT NULL,
  `address` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` int(20) NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `seatno` int(2) NOT NULL,
  `allseats` varchar(128) NOT NULL,
  `nationality` varchar(16) NOT NULL,
  `idno` varchar(20) NOT NULL,
  PRIMARY KEY (`pssg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=500 ;

--
-- Dumping data for table `tbl_passangerlist`
--

INSERT INTO `tbl_passangerlist` (`pssg_id`, `sales_id`, `fullname`, `address`, `email`, `phone`, `mobile`, `age`, `gender`, `seatno`, `allseats`, `nationality`, `idno`) VALUES
(430, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 31, '', '', ''),
(429, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 29, '', '', ''),
(428, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 28, '', '', ''),
(427, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 27, '', '', ''),
(449, '69', 'Roja Adhikari', 'fdsaf', 'fdsa', 'fdsa', 0, 15, 'M', 9, '', 'nepali', '221'),
(450, '69', 'Roja Adhikari', 'fdsaf', 'fdsa', 'fdsa', 0, 23, 'M', 10, '', 'nepali', '221'),
(448, '68', 'j', 'ktm', 'dhital20@gmail.com', '01', 0, 27, 'M', 31, '', 'k', 'l'),
(447, '68', 'd', 'ktm', 'dhital20@gmail.com', '01', 0, 54, 'F', 8, '', 'e', 'f'),
(446, '68', 'a', 'ktm', 'dhital20@gmail.com', '01', 0, 56, 'M', 7, '', 'b', 'c'),
(419, '67', 'umesh chand', 'pepsikhola-20', 'aryn_lucky@yahoo.com', '21474836471', 0, 23, 'M', 11, '10,9,11', 'nepali', '323'),
(418, '67', 'Yugesh Chand', 'pepsikhola-20', 'aryn_lucky@yahoo.com', '21474836471', 0, 23, 'M', 9, '10,9,11', 'nepali', '221'),
(417, '67', 'umesh chand', 'pepsikhola-20', 'aryn_lucky@yahoo.com', '21474836471', 0, 15, 'M', 10, '10,9,11', 'nepali', '221'),
(416, '66', 'Roja Adhikari', 'baneswor', 'aryn_lucky@yahoo.com', '87909080', 0, 23, 'M', 8, '5,7,8', 'nepali', '221'),
(415, '66', 'pradip chand', 'baneswor', 'aryn_lucky@yahoo.com', '87909080', 0, 15, 'M', 7, '5,7,8', 'nepali', '221'),
(414, '66', 'Roja Adhikari', 'baneswor', 'aryn_lucky@yahoo.com', '87909080', 0, 15, 'M', 5, '5,7,8', 'nepali', '221'),
(413, '65', 'Roja Adhikari', 'pepsikhola-20', 'aryn_lucky@yahoo.com', '87909080', 0, 15, 'M', 4, '3,4', 'nepali', '221'),
(412, '65', 'pradip chand', 'pepsikhola-20', 'aryn_lucky@yahoo.com', '87909080', 0, 15, 'M', 3, '3,4', 'nepali', '221'),
(425, '64', 'santosh', 'kathmandu', '', '29392', 0, 24, 'M', 25, '', 'nepali', ''),
(426, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 26, '', '', ''),
(410, '63', 'bidur', 'kathmandu', '', '2342423', 0, 23, 'M', 0, '6,8,10,12,14,16,24,22,26,28', 'nepali', ''),
(409, '62', 'Test', 'Test', '', '12435', 0, 0, 'M', 0, '11,12', '', ''),
(408, '61', 'Yugesh Chand', 'Kalanki', 'bimalchand43@gmail.com', '21474836471', 0, 23, 'M', 6, '8,7,6', 'nepali', '221'),
(407, '61', 'umesh chand', 'Kalanki', 'bimalchand43@gmail.com', '21474836471', 0, 23, 'M', 7, '8,7,6', 'nepali', '323'),
(406, '61', 'umesh chand', 'Kalanki', 'bimalchand43@gmail.com', '21474836471', 0, 15, 'M', 8, '8,7,6', 'nepali', '221'),
(405, '60', 'Sudeep', 'sjs', '', '78', 0, 0, 'M', 0, '17,21,33,5', '', ''),
(404, '59', 'Raj Kumar Shrestha', 'Dubai', '', '43443', 0, 0, 'M', 0, '1,2,4,3,5,6,7,8,9,10,11,12,13,14,15,16,18,17,19,20,22,24,26,28,30,34,32,35,33,31,29,27,25,23,21', '', ''),
(403, '58', 'Pawan', 'jhwjw', '', '121', 0, 0, 'M', 0, '16,14,6,5,3,4,1,2,18,19,20,22,24,26,28,30,32,34,35,33,31,29,27,25,23,21', '', ''),
(402, '57', 'gfhgfhfds', 'hgfs', '', 'gfds', 0, 0, 'O', 0, '9,10,7', '', ''),
(401, '56', 'Jass', 'Parasi', '', '373737', 0, 0, 'M', 0, '17,18,19,20,22,24,26,28,30,32,31,29,27,25,23,21,33', '', ''),
(400, '55', 'haku kale', 'fdsa', '', 'fdsa', 0, 0, 'M', 0, '28,30,31,29,25,24', '', ''),
(399, '54', 'Dayaram Yadav', 'Janakpur', 'rajnp03@gmail.com', '98343423344', 0, 24, 'M', 0, '3,4', 'Nepali', 'A098877'),
(398, '53', 'fasfsa', 'fa', '', 'fa', 0, 0, 'M', 0, '34,32,33,35', '', ''),
(397, '52', 'santosh Dhital', 'Gorkha', '30940', '330090', 0, 89, 'M', 0, '34,32,10,14,16,15,17,18,19,20,21,23,22,24', 'gorkhali', ''),
(396, '51', 'asd', 'pokhara ', '', '014351919', 0, 26, 'F', 28, '28', 'a', '345'),
(451, '69', 'umesh chand', 'fdsaf', 'fdsa', 'fdsa', 0, 23, 'M', 12, '', 'nepali', '323'),
(452, '69', 'pradip chand', 'fdsaf', 'fdsa', 'fdsa', 0, 15, 'M', 11, '', 'nepali', '323'),
(394, '49', 'Manoj yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 19, 'M', 35, '34,35', 'Nepali', 'A66666'),
(393, '49', 'Raj Prakash Yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 12, 'M', 34, '34,35', 'Nepali', 'A66666'),
(392, '48', 'i', 'b', '', '01', 0, 33, 'M', 2, '1,2', 'j', '1'),
(391, '48', 'a', 'b', '', '01', 0, 33, 'M', 1, '1,2', 'd', '12g'),
(390, '47', 'Amita Saxena', 'Delhi', 'saxena@san.com', '54545', 0, 45, 'F', 0, '27,26,14,13,17,18,19,20,21', 'Indian', '545'),
(388, '45', 'Anil Dhubedal', 'bhaktapur', 'dhital20@gmail.com', '014351919', 0, 22, 'M', 24, '24,25,23,22', 'nepali', '23RN'),
(387, '44', 'sabina dhakal', 'Pokhara-7, kaski', 'rajyad03@gmail.com', '2147483647', 0, 19, 'F', 4, '3,4', 'Nepali', 'Ah66544'),
(386, '44', 'Ram Dulari', 'Pokhara-7, kaski', 'rajyad03@gmail.com', '2147483647', 0, 34, 'F', 3, '3,4', 'Nepali', 'A66666'),
(389, '46', 'kailash nare', 'shoyambhu', 'nare@nare.com', 'dfaf', 0, 0, 'M', 0, '3,4,5', 'ffsa', 'fdssa'),
(384, '42', 'Mountain Overland Tours and Trav', 'nepal', 'dhital777', '014351919', 0, 20, 'M', 0, '26', 'Nepali', ''),
(382, '40', 'santosh', 'malekhu', '', 'no dinna', 0, 0, 'O', 1, '1,2,3,4,5,7,9,11,13,15,17,18,19,20,21,23,25,27,29,31,33,35,34,32,30', 'nepali', ''),
(381, '39', 'Anil Dhubedal', 'bhaktapur', '', '01', 0, 56, 'M', 0, '6,31,26', 'Nepali', ''),
(380, '38', 'bignesh', 'bhairahawa', 'big@big.com', '543', 0, 23, 'M', 0, '6', 'nepal', '564'),
(379, '37', 'Kamal Thapa', 'kathmandu', 'dfsafsa@fdaf.com', '6556565', 0, 50, 'M', 0, '1,2', 'nepal', '454'),
(378, '36', 'Ravi', 'Bhairahawa', '', '333333', 0, 0, 'M', 0, '8', '', ''),
(376, '34', 'aanuj', 'nakdfi', 'k', 'dksfneiill', 0, 0, 'M', 0, '4,6', '', ''),
(377, '35', 'Ranju', 'Butwal', '', '6668', 0, 0, 'M', 0, '12,11,13,15,17', '', ''),
(375, '33', 'anuj', 'chitwan', '0303', '8930033', 0, 0, 'M', 0, '13,15,17,18,19,20,21,23,25,27,24,22,16,14', '', ''),
(374, '32', 'soalti', 'chitwan', '', '30309230', 0, 0, 'M', 0, '28,29,30,31,32,33,34,35,9,10,26', '', ''),
(373, '31', 'amite', 'chitwan', '', '300390-3', 0, 23, 'M', 0, '1,2,3,5,7,8,11,12', 'nepali', '3'),
(372, '30', 'Rajan Shrestha', 'Lumbini', '', '9804409262', 0, 0, 'M', 0, '13,14,11,9,7,5,3,1,21,17,15,16,12,10,8,6,4,2,18,19,20,22,24,26,28,30,32,34,35,33,31,29,27,25,23', '', ''),
(371, '29', 'Bimal Chand', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 23, 'M', 2, '1,2', 'Nepali', 'A66666'),
(370, '29', 'Manoj yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 12, 'M', 1, '1,2', 'Nepali', 'A66666'),
(369, '28', 'Roja Adhikari', 'pepsikhola-20', 'aryn_lucky@yahoo.com', '21474836471', 0, 23, 'M', 1, '2,1', 'nepali', '221'),
(368, '28', 'pradip chand', 'pepsikhola-20', 'aryn_lucky@yahoo.com', '21474836471', 0, 15, 'M', 2, '2,1', 'nepali', '221'),
(367, '27', 'Yugesh Chand', 'pepsicola', 'bimal43@hotmail.com', '87909080', 0, 23, 'M', 8, '6,8,7', 'nepali', '323'),
(365, '26', 'fds', 'fdsa', '', 'fds', 0, 0, 'M', 32, '34,32', 'sfd', 'fds'),
(366, '27', 'Roja Adhikari', 'pepsicola', 'bimal43@hotmail.com', '87909080', 0, 15, 'M', 6, '6,8,7', 'nepali', '221'),
(364, '26', 'fds', 'fdsa', '', 'fds', 0, 0, 'M', 34, '34,32', 'fds', 'fsd'),
(363, '25', 'Anuj Sir', 'Kathmandu', 'anuj@gmail.com', '976554', 0, 23, 'M', 0, '1,2', 'Nepali', '9775444'),
(362, '24', 'Ranjana', 'bhairahawa', 'mklsd', '62367823', 0, 43, 'M', 0, '22,23,20,25,35,34', 'jhsdhjk', '794'),
(361, '23', 'bdur', 'jhhhh', '', '58789', 0, 23, 'M', 0, '29,27,24', 'nepali', ''),
(360, '22', 'Yugesh Chand', 'Kalanki', 'rajnp03@gmail.com', '87909080', 0, 23, 'M', 8, '6,5,7,8', 'nepali', '323'),
(359, '22', 'radhika bohara', 'Kalanki', 'rajnp03@gmail.com', '87909080', 0, 23, 'M', 7, '6,5,7,8', 'nepali', '323'),
(358, '22', 'vendam bohara', 'Kalanki', 'rajnp03@gmail.com', '87909080', 0, 24, 'M', 5, '6,5,7,8', 'nepali', '221'),
(356, '21', 'fdafs', 'fdfa', '', 'fda', 0, 0, 'M', 30, '', 'fda', 'fda'),
(357, '22', 'pradip chand', 'Kalanki', 'rajnp03@gmail.com', '87909080', 0, 15, 'M', 6, '6,5,7,8', 'nepali', '221'),
(355, '21', 'fdsf', 'fdfa', '', 'fda', 0, 0, 'M', 32, '', 'fda', 'fdsa'),
(354, '21', 'fdsfds', 'fdfa', '', 'fda', 0, 0, 'M', 34, '', 'fdsf', 'fdsa'),
(349, '18', 'ss', 'ss', '', 'ss', 0, 0, 'M', 0, '5', 'ss', ''),
(350, '19', 'dsfs', 'fds', '', 'fds', 0, 0, 'M', 0, '7,8,10,9', '', ''),
(351, '20', 'fdsa', 'fdsa', '', 'fds', 0, 0, 'M', 0, '1,2', '', ''),
(346, '15', 'kesab stapit', 'Kathmandu', 'kjjsd@yahoo.com', '656565', 0, 45, 'M', 0, '4', 'nepal', '4554'),
(345, '14', 'prashna Adhikari', 'pepsikhola-20', 'santosh@yahoo.com', '21474836471', 0, 15, 'F', 2, '1,2,3,4', 'nepali', '323'),
(344, '14', 'Roja Adhikari', 'pepsikhola-20', 'santosh@yahoo.com', '21474836471', 0, 15, 'F', 1, '1,2,3,4', 'nepali', '221'),
(343, '14', 'prashna Adhikari', 'pepsikhola-20', 'santosh@yahoo.com', '87909080', 0, 15, 'F', 2, '1,2,3,4', 'nepali', '323'),
(342, '14', 'Roja Adhikari', 'pepsikhola-20', 'santosh@yahoo.com', '87909080', 0, 23, 'F', 1, '1,2,3,4', 'nepali', '221'),
(341, '14', 'Prashna Adhikari', 'pepsikhola-20', 'santosh@yahoo.com', '21474836471', 0, 15, 'F', 2, '1,2,3,4', 'nepali', '221'),
(340, '14', 'Roja Adhikari', 'pepsikhola-20', 'santosh@yahoo.com', '21474836471', 0, 23, 'F', 1, '1,2,3,4', 'nepali', '221'),
(339, '13', 'pradip chand', 'baneswor', 'prakash@yahoo.com', '87909080', 0, 16, 'M', 31, '32,33,31', 'nepali', '323'),
(338, '13', 'Janaki Chand', 'baneswor', 'prakash@yahoo.com', '87909080', 0, 27, 'F', 33, '32,33,31', 'nepali', '323'),
(337, '13', 'Yugesh Chand', 'baneswor', 'prakash@yahoo.com', '87909080', 0, 23, 'M', 32, '32,33,31', 'nepali', '221'),
(336, '12', 'hemanti chand', 'dhapasi', 'harish@yahoo.com', '87909080', 0, 24, 'F', 15, '11,13,15,16', 'nepali', '221'),
(335, '12', 'dipa chand', 'dhapasi', 'harish@yahoo.com', '87909080', 0, 20, 'F', 13, '11,13,15,16', 'nepali', '323'),
(334, '12', 'umesh chand', 'dhapasi', 'harish@yahoo.com', '87909080', 0, 15, 'M', 11, '11,13,15,16', 'nepali', '323'),
(333, '11', 'harish chand', 'dhapasi', 'suresh@yahoo.com', '34324324', 0, 25, 'M', 2, '3,4,2', 'nepali', '34'),
(332, '11', 'umesh chand', 'dhapasi', 'suresh@yahoo.com', '34324324', 0, 16, 'M', 4, '3,4,2', 'nepali', '432'),
(331, '11', 'pradip chand', 'dhapasi', 'suresh@yahoo.com', '34324324', 0, 15, 'M', 3, '3,4,2', 'nepali', '323'),
(328, '8', 'dfafaf', 'sdffff', '', '2342423', 0, 0, 'M', 0, '14', '', ''),
(329, '9', 'Sandesh Kc', 'Bhairahawa', '', '7363636', 0, 0, 'M', 0, '14', '', ''),
(330, '10', 'keshab pandey', 'pokhara', 'keshab@gmail.com', '87877', 0, 40, 'M', 0, '34', 'India', '45621'),
(325, '5', 'raaj', 'malekhu', '', '8778309', 0, 13, 'M', 0, '28,26', 'nepali', ''),
(326, '6', 'Ravi Thapaa', 'Naxal', 'thapa@gmail.com', '787878', 0, 23, 'M', 1, '1', 'nepal', '45123'),
(347, '16', 'Ram Raja', 'Butwal', ',ms,s', 'qwyqw', 0, 0, 'M', 0, '12', 'nwn', ''),
(322, '2', 'Ram Sapkota', 'Kathmandu', 'ram@yahoo.com', '4545454545', 0, 50, 'M', 0, '10,9', 'nepal', '4545'),
(321, '1', 'bimal chand', 'pepsikhola-20', 'aryn_lucky@yahoo.com', '21474836471', 0, 43, 'M', 0, '1,5,6,7', 'nepali', '43243'),
(431, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 30, '', '', ''),
(432, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 33, '', '', ''),
(433, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 35, '', '', ''),
(434, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 2, '', '', ''),
(435, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 1, '', '', ''),
(436, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 3, '', '', ''),
(437, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 4, '', '', ''),
(438, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 6, '', '', ''),
(439, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 5, '', '', ''),
(440, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 8, '', '', ''),
(441, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 7, '', '', ''),
(442, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 12, '', '', ''),
(443, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 9, '', '', ''),
(444, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 11, '', '', ''),
(445, '64', 'santosh', 'kathmandu', '', '29392', 0, 0, 'M', 13, '', '', ''),
(453, '70', 'Prakash Bohara', 'pepsikhola-20', 'bimalchand43@gmail.com', '21474836471', 0, 43, 'M', 0, '12,13,14,15,16,17,18', 'nepali', '43243'),
(454, '71', 'Harish Chand', 'pepsikhola-20', 'aryn_lucky@yahoo.com', '21474836471', 0, 20, 'M', 0, '34,35,32,33,30,28,29,27', 'nepali', 'fdsa'),
(455, '72', 'bimal chand', 'Kalanki', 'aryn_lucky@yahoo.com', '87909080', 0, 25, 'M', 0, '24,25,22,23,19,20,21', 'nepali', '43243'),
(459, '73', 'Raj Prakash Yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 34, 'M', 5, '', 'Nepali', 'A666662'),
(458, '73', 'sabina dhakal', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 23, 'F', 3, '', 'Nepali', 'A66666'),
(460, '73', 'Manoj yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 21, 'M', 6, '', 'Nepali', 'A666664'),
(461, '74', 'fdssa', 'fdss', '', 'fdsf', 0, 0, 'M', 0, '34,6,7,10,26,25,22,19', '', ''),
(462, '75', 'Anuj', 'kjasd', 'jskdjk', 'jksjkds', 0, 0, 'M', 0, '7', '', ''),
(463, '76', 'Raj Prakash Yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 23, 'M', 1, '1,2', 'Nepali', 'A66666'),
(464, '76', 'Ram', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 34, 'M', 2, '1,2', 'Nepali', 'A66666'),
(465, '77', 'sabina dhakal', 'Kathmandu', 'rajyad03@gmail.com', '98343423344', 0, 25, 'M', 1, '1,2', 'Nepali', 'A66666'),
(466, '77', 'Ram', 'Kathmandu', 'rajyad03@gmail.com', '98343423344', 0, 23, 'M', 2, '1,2', 'Nepali', 'A66666'),
(467, '78', 'Manoj yadav', 'Janakpur', 'rajnp03@gmail.com', '2147483647', 0, 34, 'M', 1, '1,2', 'Nepali', 'A66666'),
(468, '78', 'Bimal Chand', 'Janakpur', 'rajnp03@gmail.com', '2147483647', 0, 19, 'M', 2, '1,2', 'Nepali', 'A66666'),
(469, '79', 'Raj Prakash Yadav', 'Pokhara', 'suresh@gmail.com', '98566655', 0, 23, 'M', 1, '1,2', 'Nepali', 'A66666'),
(470, '79', 'Bimal Chand', 'Pokhara', 'suresh@gmail.com', '98566655', 0, 23, 'M', 2, '1,2', 'Nepali', 'A66666'),
(471, '80', 'Bimal Chand', 'Kathmandu', 'rajnp03@gmail.com', '2147483647', 0, 19, 'M', 1, '1', 'Nepali', 'A66666'),
(472, '81', 'Bimal Chand', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 12, 'M', 1, '1,2', 'Nepali', 'A66666'),
(473, '81', 'sabina dhakal', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 34, 'M', 2, '1,2', 'Nepali', 'A66666'),
(474, '82', 'Bimal Chand', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 34, 'M', 3, '3', 'Nepali', 'A66666'),
(475, '83', 'Manoj yadav', 'Kathmandu', 'rajyad03@gmail.com', '98343423344', 0, 19, 'M', 4, '4', 'Nepali', 'A66666'),
(476, '84', 'Raj Prakash Yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 12, 'M', 34, '34', 'Nepali', 'A66666'),
(477, '85', 'Manoj yadav', 'Janakpur', 'rajnp12@gmail.com', '9841617657', 0, 19, 'M', 35, '35', 'Nepali', 'A66666'),
(478, '86', 'Manoj yadav', 'Pokhara', 'suresh@gmail.com', '9841617657', 0, 23, 'M', 5, '5', 'Nepali', 'A66666'),
(479, '87', 'Bimal Chand', 'Kathmandu', 'rajnp03@gmail.com', '98343423344', 0, 19, 'M', 6, '6', 'Nepali', 'A66666'),
(480, '88', 'Manoj yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 34, 'M', 32, '32,33', 'Nepali', 'A66666'),
(481, '88', 'Bimal Chand', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 23, 'M', 33, '32,33', 'Nepali', 'A66666'),
(482, '89', 'Bimal Chand', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 34, 'M', 31, '31', 'Nepali', 'A66666'),
(483, '90', 'Manoj yadav', 'Kathmandu', 'rajnp03@gmail.com', '2147483647', 0, 19, 'M', 30, '30', 'Nepali', 'A66666'),
(484, '91', 'Manoj yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 23, 'M', 7, '7', 'Nepali', 'A66666'),
(485, '92', 'Bimal Chand', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 34, 'M', 8, '8', 'Nepali', 'A66666'),
(486, '93', 'Bimal Chand', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 34, 'M', 9, '9', 'Nepali', 'A66666'),
(487, '94', 'Bimal Chand', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 12, 'M', 1, '1', 'Nepali', 'A66666'),
(488, '95', 'Bimal Chand', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 19, 'M', 2, '2', 'Nepali', 'A66666'),
(489, '96', 'Raj Prakash Yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 34, 'M', 1, '1', 'Nepali', 'A66666'),
(490, '97', 'Raj Prakash Yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 19, 'M', 3, '3', 'Nepali', 'A66666'),
(491, '98', 'Raj Prakash Yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 12, 'M', 4, '4', 'Nepali', 'A66666'),
(492, '99', 'sabina dhakal', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 23, 'M', 34, '34,35', 'Nepali', 'A66666'),
(493, '99', 'Manoj yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 23, 'M', 35, '34,35', 'Nepali', 'A66666'),
(494, '100', 'Bimal Chand', 'Kathmandu', 'rajyad03@gmail.com', '2147483647', 0, 12, 'M', 5, '5,6', 'Nepali', 'A66666'),
(495, '100', 'Ram', 'Kathmandu', 'rajyad03@gmail.com', '2147483647', 0, 23, 'M', 6, '5,6', 'Nepali', 'A66666'),
(496, '101', 'Raj Prakash Yadav', 'Rautahat', 'rajnp03@gmail.com', '2147483647', 0, 34, 'M', 1, '1', 'Nepali', 'A66666'),
(497, '102', 'Manoj yadav', 'Kathmandu', 'rajnp03@gmail.com', '98343423344', 0, 34, 'M', 2, '2,3', 'Nepali', 'A66666'),
(498, '102', 'sabina dhakal', 'Kathmandu', 'rajnp03@gmail.com', '98343423344', 0, 19, 'M', 3, '2,3', 'Nepali', 'A66666'),
(499, '103', 'Raj Prakash Yadav', 'Rautahat', 'rajnp03@gmail.com', '97765', 0, 31, 'M', 0, '1,2,3,4', 'Nepali', '91717');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_routdetails`
--

CREATE TABLE IF NOT EXISTS `tbl_routdetails` (
  `root_id` int(11) NOT NULL AUTO_INCREMENT,
  `rFrom` varchar(32) DEFAULT NULL,
  `rTo` varchar(32) DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  PRIMARY KEY (`root_id`),
  UNIQUE KEY `rid` (`root_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `tbl_routdetails`
--

INSERT INTO `tbl_routdetails` (`root_id`, `rFrom`, `rTo`, `departure_date`) VALUES
(1, 'Kathmandu', 'Pokhara', '2006-00-00'),
(2, 'Pokhara', 'Kathmandu', '2005-00-00'),
(41, 'Lumbani', 'Chitwan', '0000-00-00'),
(40, 'Lumbani', 'Kathmandu', '0000-00-00'),
(39, 'Lumbani', 'Pokhara', '0000-00-00'),
(38, 'Chitwan', 'Kathmandu', '0000-00-00'),
(37, 'Chitwan', 'Lumbani', '0000-00-00'),
(36, 'Chitwan', 'Pokhara', '0000-00-00'),
(35, 'Kathmandu', 'Lumbani', '0000-00-00'),
(34, 'Kathmandu', 'Chitwan', '0000-00-00'),
(33, 'Pokhara', 'Lumbani', '0000-00-00'),
(32, 'Pokhara', 'Chitwan', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sales`
--

CREATE TABLE IF NOT EXISTS `tbl_sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_id` int(11) DEFAULT NULL,
  `bus_id` int(20) NOT NULL DEFAULT '0',
  `root_id` int(10) DEFAULT '0',
  `compid` varchar(20) NOT NULL,
  `brid` int(1) NOT NULL,
  `agid` int(1) NOT NULL,
  `dept_date` date NOT NULL,
  `dept_time` time DEFAULT NULL,
  `ampm` varchar(2) NOT NULL,
  `reporting_time` time NOT NULL,
  `sfrom` varchar(32) DEFAULT NULL,
  `sto` varchar(32) DEFAULT NULL,
  `bus_no` varchar(10) NOT NULL,
  `seat_no` varchar(128) DEFAULT NULL,
  `no_of_seat` int(2) NOT NULL,
  `rate` int(8) NOT NULL,
  `name_on_ticket` varchar(32) NOT NULL,
  `passanger_list` varchar(10) NOT NULL,
  `contact_address` varchar(32) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `mobile` int(15) NOT NULL,
  `email` varchar(32) NOT NULL,
  `pickup_spot` varchar(32) NOT NULL,
  `ticket_issue_date` date NOT NULL,
  `cancelled_date` date NOT NULL,
  `cancelled_by` varchar(32) NOT NULL,
  `issued_by` varchar(32) NOT NULL,
  `payment_received` float NOT NULL,
  `sales_category_by` varchar(2) NOT NULL,
  `paid` char(1) NOT NULL DEFAULT 'N',
  `Cancelled` char(1) DEFAULT 'N',
  `pnr` varchar(8) NOT NULL,
  `reno` varchar(8) NOT NULL,
  `recdate` date NOT NULL,
  `age` int(3) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `nationality` varchar(16) NOT NULL,
  `idno` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sales_id` (`sales_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=330 ;

--
-- Dumping data for table `tbl_sales`
--

INSERT INTO `tbl_sales` (`id`, `sales_id`, `bus_id`, `root_id`, `compid`, `brid`, `agid`, `dept_date`, `dept_time`, `ampm`, `reporting_time`, `sfrom`, `sto`, `bus_no`, `seat_no`, `no_of_seat`, `rate`, `name_on_ticket`, `passanger_list`, `contact_address`, `phone`, `mobile`, `email`, `pickup_spot`, `ticket_issue_date`, `cancelled_date`, `cancelled_by`, `issued_by`, `payment_received`, `sales_category_by`, `paid`, `Cancelled`, `pnr`, `reno`, `recdate`, `age`, `gender`, `nationality`, `idno`) VALUES
(312, 86, 20, 33, '34', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '5', 1, 900, 'Surendra Chanda', '1', 'Pokhara', '9841617657', 2147483647, 'suresh@gmail.com', '', '2013-02-28', '0000-00-00', '', '0', 0, '0', 'N', 'N', 'CL00P49O', '', '0000-00-00', 23, 'M', 'Nepali', '9775444'),
(311, 85, 20, 33, '34', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '35', 1, 900, 'Dayaram Yadav', '1', 'Janakpur', '9841617657', 2147483647, 'rajnp12@gmail.com', '', '2013-02-28', '0000-00-00', '', '0', 0, '0', 'N', 'N', 'CL00NWWV', '', '0000-00-00', 24, 'M', 'Nepali', '9775444'),
(310, 84, 20, 33, '34', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '34', 1, 900, 'Raj Prakash Yadav', '1', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '0', 0, '0', 'N', 'N', 'CL00GVVE', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(309, 83, 20, 33, '34', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '4', 1, 900, 'Surendra Chanda', '1', 'Kathmandu', '98343423344', 2147483647, 'rajyad03@gmail.com', '', '2013-02-28', '0000-00-00', '', '0', 0, '0', 'N', 'N', 'CL0075RG', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(308, 82, 20, 33, '34', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '3', 1, 900, 'Raj Prakash ', '1', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C00V4YM4', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(307, 81, 20, 33, '0', 0, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '1,2', 2, 900, 'Bishawa Ranjan Sharma', '2', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C00YLMLV', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(306, 80, 19, 32, '34', 1, 0, '2013-03-01', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Chitwan', 'A1', '1', 1, 900, 'Raj Prakash Pd.Yadav', '1', 'Kathmandu', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C00NZ7B4', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(305, 79, 19, 32, '0', 0, 0, '2013-03-06', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Chitwan', 'A1', '1,2', 2, 900, 'Surendra Chanda', '2', 'Pokhara', '98566655', 2147483647, 'suresh@gmail.com', '', '2013-02-28', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C0066LZ0', '', '0000-00-00', 24, 'M', 'Nepali', '9775444'),
(304, 78, 22, 35, '77', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Kathmandu', 'Lumbani', 'A5', '1,2', 2, 1500, 'Dayaram Yadav', '2', 'Janakpur', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00XC1NR', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(303, 77, 32, 33, '79', 3, 0, '2013-02-28', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A30', '1,2', 2, 420, 'Bishawa Ranjan Sharma', '2', 'Kathmandu', '98343423344', 2147483647, 'rajyad03@gmail.com', '', '2013-02-27', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C00U1GMH', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(301, 75, 20, 33, '87', 4, 2, '2013-02-15', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '7', 1, 900, 'Anuj', '1', 'kjasd', 'jksjkds', 0, 'jskdjk', '', '2013-02-14', '0000-00-00', '', '91', 0, 'ag', 'N', 'N', 'DD25GR93', '', '0000-00-00', 0, 'M', '', ''),
(302, 76, 1, 1, '79', 3, 0, '2013-02-28', '08:40:00', 'AM', '00:00:00', 'Kathmandu', 'Pokhara', 'A3', '1,2', 2, 1200, 'Raj Prakash Yadav', '2', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-27', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C00IW9IN', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(300, 74, 23, 40, '78', 2, 0, '2013-02-15', '05:00:00', 'AM', '00:00:00', 'Lumbani', 'Kathmandu', 'A10', '34,6,7,10,26,25,22,19', 8, 900, 'fdssa', '8', 'fdss', 'fdsf', 0, '', '', '2013-02-14', '0000-00-00', '', '84', 0, 'br', 'N', 'N', 'B0016LFJ', '', '0000-00-00', 0, 'M', '', ''),
(299, 73, 19, 32, '77', 1, 0, '2013-02-15', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Chitwan', 'A1', '3,5,6', 3, 900, 'Raj Prakash Yadav', '3', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-13', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A000G4JW', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(298, 72, 9, 2, '77', 1, 0, '2013-02-13', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '24,25,22,23,19,20,21', 7, 1550, 'bimal chand', '7', 'Kalanki', '87909080', 2147483647, 'aryn_lucky@yahoo.com', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00AM50O', '', '0000-00-00', 25, 'M', 'nepali', '43243'),
(297, 71, 9, 2, '77', 1, 0, '2013-02-13', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '34,35,32,33,30,28,29,27', 8, 1550, 'Harish Chand', '8', 'pepsikhola-20', '21474836471', 2147483647, 'aryn_lucky@yahoo.com', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00UDGPS', '', '0000-00-00', 20, 'M', 'nepali', 'fdsa'),
(296, 70, 9, 2, '77', 1, 0, '2013-02-13', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '12,13,14,15,16,17,18', 7, 1550, 'Prakash Bohara', '7', 'pepsikhola-20', '21474836471', 2147483647, 'bimalchand43@gmail.com', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00SNDZQ', '', '0000-00-00', 43, 'M', 'nepali', '43243'),
(295, 69, 1, 1, '77', 1, 0, '2013-02-13', '08:40:00', 'AM', '00:00:00', 'Kathmandu', 'Pokhara', 'A3', '9,10,12,11', 4, 1200, 'fdsfdsf', '4', 'fdsaf', 'fdsa', 0, 'fdsa', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00NCVU0', '', '0000-00-00', 0, 'M', 'fsda', 'fdsa'),
(294, 68, 27, 36, '77', 1, 0, '2013-02-22', '09:25:00', 'AM', '00:00:00', 'Chitwan', 'Pokhara', 'A14', '7,8,31', 3, 950, 'rajan', '3', 'ktm', '01', 2147483647, 'dhital20@gmail.com', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A001QCJE', '', '0000-00-00', 29, 'M', 'Nepali', '9999'),
(293, 67, 9, 2, '93', 1, 2, '2013-02-13', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '10,9,11', 3, 1550, 'Santosh Adhikari', '3', 'pepsikhola-20', '21474836471', 2147483647, 'aryn_lucky@yahoo.com', '', '2013-02-12', '0000-00-00', '', '96', 0, 'ag', 'Y', 'N', 'AA2S3XKH', '4344', '2013-02-12', 43, 'M', 'nepali', '43243'),
(292, 66, 9, 2, '87', 4, 2, '2013-02-13', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '5,7,8', 3, 1550, 'Harish Chand', '3', 'baneswor', '87909080', 2147483647, 'aryn_lucky@yahoo.com', '', '2013-02-12', '0000-00-00', '', '91', 0, 'ag', 'N', 'N', 'DD2PM4EG', '', '0000-00-00', 20, 'M', 'nepali', '43243'),
(291, 65, 9, 2, '87', 4, 2, '2013-02-13', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '3,4', 2, 1550, 'bimal chand', '2', 'pepsikhola-20', '87909080', 2147483647, 'aryn_lucky@yahoo.com', '', '2013-02-12', '0000-00-00', '', '91', 0, 'ag', 'N', 'N', 'DD2OPBSE', '', '0000-00-00', 43, 'M', 'nepali', '43243'),
(290, 64, 27, 36, '80', 4, 0, '2013-02-13', '09:25:00', 'AM', '00:00:00', 'Chitwan', 'Pokhara', 'A14', '25,26,27,28,29,31,30,33,35,2,1,3,4,6,5,8,7,12,9,11,13', 21, 950, 'bdur', '21', 'kathmandu', '29392', 0, '', '', '2013-02-12', '0000-00-00', '', '86', 0, 'br', 'N', 'N', 'D00MMQND', '', '0000-00-00', 23, 'M', 'nepali', ''),
(288, 62, 20, 33, '90', 3, 3, '2013-02-14', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '11,12', 2, 900, 'Test', '2', 'Test', '12435', 0, '', '', '2013-02-12', '0000-00-00', '', '95', 0, 'ag', 'Y', 'N', 'CC3WN1K1', '62', '2013-02-12', 0, 'M', '', ''),
(289, 63, 26, 38, '80', 4, 0, '2013-02-14', '06:00:00', 'AM', '00:00:00', 'Chitwan', 'Kathmandu', 'A13', '6,8,10,12,14,16,24,22,26,28', 10, 900, 'bidur', '10', 'kathmandu', '2342423', 0, '', '', '2013-02-12', '0000-00-00', '', '86', 0, 'br', 'N', 'N', 'D00JI7R8', '', '0000-00-00', 23, 'M', 'nepali', ''),
(286, 60, 20, 33, '90', 3, 3, '2013-02-14', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '17,21,33,5', 4, 900, 'Sudeep', '4', 'sjs', '78', 0, '', '', '2013-02-12', '0000-00-00', '', '95', 0, 'ag', 'Y', 'N', 'CC35HI6J', '60', '2013-02-12', 0, 'M', '', ''),
(287, 61, 20, 33, '77', 1, 0, '2013-02-14', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '8,7,6', 3, 900, 'Santosh Adhikari', '3', 'Kalanki', '21474836471', 2147483647, 'bimalchand43@gmail.com', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00F93PW', '', '0000-00-00', 20, 'M', 'nepali', '43243'),
(285, 59, 20, 33, '90', 3, 3, '2015-12-31', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '1,2,4,3,5,6,7,8,9,10,11,12,13,14,15,16,18,17,19,20,22,24,26,28,30,34,32,35,33,31,29,27,25,23,21', 35, 900, 'Raj Kumar Shrestha', '35', 'Dubai', '43443', 0, '', '', '2013-02-12', '0000-00-00', '', '95', 0, 'ag', 'N', 'Y', 'CC3C1T7C', '', '0000-00-00', 0, 'M', '', ''),
(284, 58, 20, 33, '90', 3, 3, '2013-02-13', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '16,14,6,5,3,4,1,2,18,19,20,22,24,26,28,30,32,34,35,33,31,29,27,25,23,21', 26, 900, 'Pawan', '26', 'jhwjw', '121', 0, '', '', '2013-02-12', '0000-00-00', '', '95', 0, 'ag', 'Y', 'N', 'CC3G8C1J', '58', '2013-02-12', 0, 'M', '', ''),
(283, 57, 20, 33, '88', 2, 2, '2013-02-13', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '9,10,7', 3, 900, 'gfhgfhfds', '3', 'hgfs', 'gfds', 0, '', '', '2013-02-12', '0000-00-00', '', '92', 0, 'ag', 'N', 'N', 'BB2JXIF4', '', '0000-00-00', 0, 'O', '', ''),
(282, 56, 32, 33, '90', 3, 3, '2013-02-13', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A30', '17,18,19,20,22,24,26,28,30,32,31,29,27,25,23,21,33', 17, 420, 'Jass', '17', 'Parasi', '373737', 673636, '', '', '2013-02-12', '0000-00-00', '', '95', 0, 'ag', 'Y', 'N', 'CC3GULYB', '56', '2013-02-12', 0, 'M', '', ''),
(281, 55, 22, 35, '88', 2, 2, '2013-02-13', '06:10:00', 'AM', '00:00:00', 'Kathmandu', 'Lumbani', 'A5', '28,30,31,29,25,24', 6, 1500, 'haku kale', '6', 'fdsa', 'fdsa', 0, '', '', '2013-02-12', '0000-00-00', '', '92', 0, 'ag', 'Y', 'N', 'BB2562LO', '12', '2013-02-12', 0, 'M', '', ''),
(280, 54, 20, 33, '79', 3, 0, '2013-02-14', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '3,4', 2, 900, 'Dayaram Yadav', '2', 'Janakpur', '98343423344', 2147483647, 'rajnp03@gmail.com', '', '2013-02-12', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C00643PB', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(279, 53, 22, 35, '78', 2, 0, '2013-02-13', '06:10:00', 'AM', '00:00:00', 'Kathmandu', 'Lumbani', 'A5', '34,32,33,35', 4, 1500, 'fasfsa', '4', 'fa', 'fa', 0, '', '', '2013-02-12', '0000-00-00', '', '84', 0, 'br', 'N', 'N', 'B00F5XNX', '', '0000-00-00', 0, 'M', '', ''),
(278, 52, 27, 36, '80', 4, 0, '2013-02-13', '09:25:00', 'AM', '00:00:00', 'Chitwan', 'Pokhara', 'A14', '34,32,10,14,16,15,17,18,19,20,21,23,22,24', 14, 950, 'santosh Dhital', '14', 'Gorkha', '330090', 0, '30940', '', '2013-02-12', '0000-00-00', '', '86', 0, 'br', 'N', 'N', 'D00X9OEN', '', '0000-00-00', 89, 'M', 'gorkhali', ''),
(277, 51, 9, 2, '77', 1, 0, '2013-02-28', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '28', 1, 1550, 'kunti ', '1', 'pokhara ', '014351919', 2147483647, '', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00KQL8M', '', '0000-00-00', 56, 'F', 'Nepali', '44'),
(276, 50, 22, 35, '78', 2, 0, '2013-02-13', '06:10:00', 'AM', '00:00:00', 'Kathmandu', 'Lumbani', 'A5', '15,16,22,23', 4, 1500, 'nakul', '4', 'fdsa', 'fdsa', 0, 'fda', '', '2013-02-12', '0000-00-00', '', '84', 0, 'br', 'N', 'N', 'B00688E2', '', '0000-00-00', 0, 'M', 'da', 'fda'),
(275, 49, 32, 33, '90', 3, 3, '2013-02-13', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A30', '34,35', 2, 420, 'Raj Prakash Yadav', '2', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-12', '0000-00-00', '', '95', 0, 'ag', 'Y', 'N', 'CC3V7AVF', '1235', '2013-02-13', 24, 'M', 'Nepali', 'A098877'),
(274, 48, 23, 40, '77', 1, 0, '2013-02-13', '05:00:00', 'AM', '00:00:00', 'Lumbani', 'Kathmandu', 'A10', '1,2', 2, 900, 'a', '2', 'b', '01', 2, '', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00NYNY3', '', '0000-00-00', 33, 'M', 'd', '1234g'),
(273, 47, 22, 35, '89', 2, 3, '2013-02-13', '06:10:00', 'AM', '00:00:00', 'Kathmandu', 'Lumbani', 'A5', '27,26,14,13,17,18,19,20,21', 9, 1500, 'Amita Saxena', '9', 'Delhi', '54545', 454545, 'saxena@san.com', '', '2013-02-12', '0000-00-00', '', '93', 0, 'ag', 'Y', 'N', 'BB3BELSF', '455', '2013-02-14', 45, 'F', 'Indian', '545'),
(272, 46, 22, 35, '78', 2, 0, '2013-02-13', '06:10:00', 'AM', '00:00:00', 'Kathmandu', 'Lumbani', 'A5', '3,4,5', 3, 1500, 'kailash nare', '3', 'shoyambhu', 'dfaf', 0, 'nare@nare.com', '', '2013-02-12', '0000-00-00', '', '94', 0, 'br', 'N', 'N', 'B00H07UU', '', '0000-00-00', 0, 'M', 'ffsa', 'fdssa'),
(271, 45, 23, 40, '77', 1, 0, '2013-02-13', '05:00:00', 'AM', '00:00:00', 'Lumbani', 'Kathmandu', 'A10', '24,25,23,22', 4, 900, 'Anil Dhubedal', '4', 'bhaktapur', '014351919', 2147483647, 'dhital20@gmail.com', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00HA830', '', '0000-00-00', 56, 'M', 'Nepali', '2345RN'),
(270, 44, 32, 33, '77', 1, 0, '2013-02-14', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A30', '3,4', 2, 420, 'Bishawa Ranjan Sharma', '2', 'Pokhara-7, kaski', '2147483647', 2147483647, 'rajyad03@gmail.com', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00J452Y', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(269, 43, 22, 35, '78', 2, 0, '2013-02-13', '06:10:00', 'AM', '00:00:00', 'Kathmandu', 'Lumbani', 'A5', '7,8,10,9', 4, 1500, 'bidur maharjan', '4', 'kritipur', '45545', 54545, 'fdfas@fda.com', '', '2013-02-12', '0000-00-00', '', '94', 0, 'br', 'N', 'N', 'BB2VCTNE', '', '0000-00-00', 24, 'M', 'nepal', '545'),
(268, 42, 23, 40, '77', 1, 0, '2013-02-13', '05:00:00', 'AM', '00:00:00', 'Lumbani', 'Kathmandu', 'A10', '26', 1, 900, 'Mountain Overland Tours and Trav', '1', 'nepal', '014351919', 2147483647, 'dhital777', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00QY7SS', '', '0000-00-00', 20, 'M', 'Nepali', ''),
(267, 41, 32, 33, '79', 3, 0, '2013-02-13', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A30', '4,6,8,10,12,14,16,15,11,9,7,5,3,1,2,13', 16, 420, 'Santosh Dhital', '16', 'Sorokhutte', '9841091982', 0, '', '', '2013-02-12', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'CC3F84GC', '', '0000-00-00', 0, 'O', '323232332', ''),
(266, 40, 26, 38, '80', 4, 0, '2013-02-14', '06:00:00', 'AM', '00:00:00', 'Chitwan', 'Kathmandu', 'A13', '1,2,3,4,5,7,9,11,13,15,17,18,19,20,21,23,25,27,29,31,33,35,34,32,30', 25, 900, 'rah shrestha', '25', 'malekhu', 'no dinna', 0, '', '', '2013-02-12', '0000-00-00', '', '86', 0, 'br', 'N', 'N', 'D0038AI0', '', '0000-00-00', 90, 'M', 'ma nepali', ''),
(265, 39, 9, 2, '77', 1, 0, '2013-02-13', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '6,31,26', 3, 1550, 'Anil Dhubedal', '3', 'bhaktapur', '01', 2147483647, '', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A003J4WR', '', '0000-00-00', 56, 'M', 'Nepali', ''),
(264, 38, 22, 35, '78', 2, 0, '2013-02-13', '06:10:00', 'AM', '00:00:00', 'Kathmandu', 'Lumbani', 'A5', '6', 1, 1500, 'bignesh', '1', 'bhairahawa', '543', 533, 'big@big.com', '', '2013-02-12', '0000-00-00', '', '94', 0, 'br', 'N', 'N', 'B00L9IS6', '', '0000-00-00', 23, 'M', 'nepal', '564'),
(263, 37, 22, 35, '78', 2, 0, '2013-02-13', '06:10:00', 'AM', '00:00:00', 'Kathmandu', 'Lumbani', 'A5', '1,2', 2, 1500, 'Kamal Thapa', '2', 'kathmandu', '6556565', 54544545, 'dfsafsa@fdaf.com', '', '2013-02-12', '0000-00-00', '', '84', 0, 'br', 'N', 'N', 'B00UNUVS', '', '0000-00-00', 50, 'M', 'nepal', '454'),
(262, 36, 20, 33, '79', 3, 0, '2013-02-13', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '8', 1, 900, 'Ravi', '1', 'Bhairahawa', '333333', 0, '', '', '2013-02-12', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C006COU5', '', '0000-00-00', 0, 'M', '', ''),
(260, 34, 27, 36, '80', 4, 0, '2013-02-14', '09:25:00', 'AM', '00:00:00', 'Chitwan', 'Pokhara', 'A14', '4,6', 2, 950, 'aanuj', '2', 'nakdfi', 'dksfneiill', 0, 'k', '', '2013-02-12', '0000-00-00', '', '86', 0, 'br', 'N', 'N', 'D00CJNIO', '', '0000-00-00', 0, 'M', '', ''),
(261, 35, 20, 33, '79', 3, 0, '2013-02-13', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '12,11,13,15,17', 5, 900, 'Ranju', '5', 'Butwal', '6668', 0, '', '', '2013-02-12', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C008L7EF', '', '0000-00-00', 0, 'M', '', ''),
(259, 33, 27, 36, '80', 4, 0, '2013-02-14', '09:25:00', 'AM', '00:00:00', 'Chitwan', 'Pokhara', 'A14', '13,15,17,18,19,20,21,23,25,27,24,22,16,14', 14, 950, 'anuj', '14', 'chitwan', '8930033', 0, '0303', '', '2013-02-12', '0000-00-00', '', '86', 0, 'br', 'N', 'N', 'D00KOXN8', '', '0000-00-00', 0, 'M', '', ''),
(258, 32, 27, 36, '80', 4, 0, '2013-02-14', '09:25:00', 'AM', '00:00:00', 'Chitwan', 'Pokhara', 'A14', '28,29,30,31,32,33,34,35,9,10,26', 11, 950, 'soalti', '11', 'chitwan', '30309230', 0, '', '', '2013-02-12', '0000-00-00', '', '86', 0, 'br', 'N', 'N', 'D00BUWAI', '', '0000-00-00', 0, 'M', '', ''),
(257, 31, 27, 36, '80', 4, 0, '2013-02-14', '09:25:00', 'AM', '00:00:00', 'Chitwan', 'Pokhara', 'A14', '1,2,3,5,7,8,11,12', 8, 950, 'amite', '8', 'chitwan', '300390-3', 0, '', '', '2013-02-12', '0000-00-00', '', '86', 0, 'br', 'N', 'N', 'D00C5J3Z', '', '0000-00-00', 23, 'M', 'nepali', '3'),
(256, 30, 25, 39, '79', 3, 0, '2013-02-13', '05:00:05', 'AM', '00:00:00', 'Lumbani', 'Pokhara', 'A12', '13,14,11,9,7,5,3,1,21,17,15,16,12,10,8,6,4,2,18,19,20,22,24,26,28,30,32,34,35,33,31,29,27,25,23', 35, 1100, 'Rajan Shrestha', '35', 'Lumbini', '9804409262', 0, '', '', '2013-02-12', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C00U3X3X', '', '0000-00-00', 0, 'M', '', ''),
(255, 29, 20, 33, '77', 1, 0, '2013-02-14', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '1,2', 2, 900, 'Raj Prakash Yadav', '2', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00RQTQE', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(254, 28, 9, 2, '77', 1, 0, '2013-02-13', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '2,1', 2, 1550, 'Santosh Adhikari', '2', 'pepsikhola-20', '21474836471', 2147483647, 'aryn_lucky@yahoo.com', '', '2013-02-12', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A003J5HE', '', '0000-00-00', 43, 'M', 'nepali', '43243'),
(253, 27, 31, 37, '77', 1, 0, '2013-02-12', '04:00:00', 'AM', '00:00:00', 'Chitwan', 'Lumbani', 'A20', '6,8,7', 3, 1550, 'Ram Prashad Sharma', '3', 'pepsicola', '87909080', 2147483647, 'bimal43@hotmail.com', '', '2013-02-11', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00FT5P1', '', '0000-00-00', 25, 'M', 'nepali', '43243'),
(252, 26, 31, 37, '78', 2, 0, '2013-02-19', '04:00:00', 'AM', '00:00:00', 'Chitwan', 'Lumbani', 'A20', '34,32', 2, 1550, 'dfs', '2', 'fdsa', 'fds', 0, '', '', '2013-02-11', '0000-00-00', '', '84', 0, 'br', 'N', 'N', 'B0008ZQF', '', '0000-00-00', 0, 'M', '', ''),
(251, 25, 31, 37, '79', 3, 0, '2013-02-12', '04:00:00', 'AM', '00:00:00', 'Chitwan', 'Lumbani', 'A20', '1,2', 2, 1550, 'Anuj Sir', '2', 'Kathmandu', '976554', 97765444, 'anuj@gmail.com', '', '2013-02-11', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C00LWZ2N', '', '0000-00-00', 23, 'M', 'Nepali', '9775444'),
(250, 24, 9, 2, '82', 3, 1, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '22,23,20,25,35,34', 6, 1550, 'Ranjana', '6', 'bhairahawa', '62367823', 689462, 'mklsd', '', '2013-02-11', '0000-00-00', '', '87', 0, 'ag', 'N', 'Y', 'CC1KCHX3', '', '0000-00-00', 43, 'M', 'jhsdhjk', '794'),
(249, 23, 9, 2, '83', 4, 1, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '29,27,24', 3, 1550, 'bdur', '3', 'jhhhh', '58789', 0, '', '', '2013-02-11', '0000-00-00', '', '88', 0, 'ag', 'N', 'N', 'DD18WI6O', '', '0000-00-00', 23, 'M', 'nepali', ''),
(248, 22, 1, 1, '77', 1, 0, '2013-02-12', '08:40:00', 'AM', '00:00:00', 'Kathmandu', 'Pokhara', 'A3', '6,5,7,8', 4, 1200, 'Prakash Bohara', '4', 'Kalanki', '87909080', 2147483647, 'rajnp03@gmail.com', '', '2013-02-11', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00OH8U5', '', '0000-00-00', 20, 'M', 'nepali', '43243'),
(247, 21, 28, 38, '84', 2, 1, '2013-02-12', '08:00:00', 'AM', '00:00:00', 'Chitwan', 'Kathmandu', '456', '34,32,30', 3, 1470, 'fdsd', '3', 'fdfa', 'fda', 0, '', '', '2013-02-11', '0000-00-00', '', '89', 0, 'ag', 'Y', 'N', 'BB1TM9L2', 'll', '2013-02-11', 0, 'M', 'fda', ''),
(246, 20, 28, 38, '84', 2, 1, '2013-02-12', '08:00:00', 'AM', '00:00:00', 'Chitwan', 'Kathmandu', '456', '1,2', 2, 1470, 'fdsa', '2', 'fdsa', 'fds', 0, '', '', '2013-02-11', '0000-00-00', '', '89', 0, 'ag', 'N', 'N', 'BB1BARUV', '', '0000-00-00', 0, 'M', '', ''),
(245, 19, 28, 38, '84', 2, 1, '2013-02-12', '08:00:00', 'AM', '00:00:00', 'Chitwan', 'Kathmandu', '456', '7,8,10,9', 4, 1470, 'dsfs', '4', 'fds', 'fds', 0, '', '', '2013-02-11', '0000-00-00', '', '89', 0, 'ag', 'Y', 'N', 'BB1UAW2Q', '34', '2013-02-11', 0, 'M', '', ''),
(244, 18, 28, 38, '82', 3, 1, '2013-02-12', '08:00:00', 'AM', '00:00:00', 'Chitwan', 'Kathmandu', '456', '5', 1, 1470, 'ss', '1', 'ss', 'ss', 0, '', '', '2013-02-11', '0000-00-00', '', '87', 0, 'ag', 'Y', 'N', 'CC1WHG2T', '6', '2013-02-05', 0, 'M', 'ss', ''),
(243, 17, 26, 38, '84', 2, 1, '2013-02-12', '06:00:00', 'AM', '00:00:00', 'Chitwan', 'Kathmandu', 'A13', '5,6,7,8,20,21', 6, 900, 'Kamal Thapa Magar', '6', 'Narayanghat', 'fdsfa', 0, 'dfssfsa', '', '2013-02-11', '0000-00-00', '', '89', 0, 'ag', 'Y', 'N', 'BB1HY91L', '12', '2013-02-11', 0, 'M', 'dsfdsa', 'dsfadfsa'),
(241, 15, 1, 1, '78', 2, 0, '2013-02-13', '08:40:00', 'AM', '00:00:00', 'Kathmandu', 'Pokhara', 'A3', '4', 1, 1200, 'kesab stapit', '1', 'Kathmandu', '656565', 454545, 'kjjsd@yahoo.com', '', '2013-02-11', '0000-00-00', '', '84', 0, 'br', 'N', 'N', 'B000SUJ2', '', '0000-00-00', 45, 'M', 'nepal', '4554'),
(240, 14, 1, 1, '77', 1, 0, '2013-02-12', '08:40:00', 'AM', '00:00:00', 'Kathmandu', 'Pokhara', 'A3', '1,2,3,4', 4, 1200, 'Santosh Adhikari', '4', 'pepsikhola-20', '21474836471', 2147483647, 'santosh@yahoo.com', '', '2013-02-11', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00EXW8H', '', '0000-00-00', 43, 'M', 'nepali', '43243'),
(237, 13, 9, 2, '77', 1, 0, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '32,33,31', 3, 1550, 'Prakash Chand', '3', 'baneswor', '87909080', 2147483647, 'prakash@yahoo.com', '', '2013-02-11', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00QC4YA', '', '0000-00-00', 25, 'M', 'nepali', '43243'),
(236, 12, 9, 2, '77', 1, 0, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '11,13,15,16', 4, 1550, 'Harish Chand', '4', 'dhapasi', '87909080', 2147483647, 'harish@yahoo.com', '', '2013-02-11', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00T5X5B', '', '0000-00-00', 26, 'M', 'nepali', '43243'),
(235, 11, 9, 2, '77', 1, 0, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '3,4,2', 3, 1550, 'Suresh Chand', '3', 'dhapasi', '34324324', 354353423, 'suresh@yahoo.com', '', '2013-02-11', '0000-00-00', '', '83', 0, 'br', 'Y', 'N', 'A00RKZ0W', '1111', '2013-02-12', 20, 'M', 'nepali', '43243'),
(234, 10, 30, 1, '78', 2, 0, '2013-02-20', '00:11:00', 'AM', '00:00:00', 'Kathmandu', 'Pokhara', '345', '34', 1, 1400, 'keshab pandey', '1', 'pokhara', '87877', 878778, 'keshab@gmail.com', '', '2013-02-11', '0000-00-00', '', '84', 0, 'br', 'N', 'N', 'B00LUH6P', '', '0000-00-00', 40, 'M', 'India', '45621'),
(233, 9, 9, 2, '79', 3, 0, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '14', 1, 1550, 'Sandesh Kc', '1', 'Bhairahawa', '7363636', 0, '', '', '2013-02-11', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C00D1H20', '', '0000-00-00', 0, 'M', '', ''),
(232, 8, 9, 2, '80', 4, 0, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '14', 1, 1550, 'dfafaf', '1', 'sdffff', '2342423', 0, '', '', '2013-02-11', '0000-00-00', '', '86', 0, 'br', 'N', 'Y', 'D00ZRML5', '', '0000-00-00', 0, 'M', '', ''),
(231, 7, 9, 2, '79', 3, 0, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '17,18,19,21', 4, 1550, 'Raju Ghimire', '4', 'bhairahawa', '984321515', 0, '', '', '2013-02-11', '0000-00-00', '', '85', 0, 'br', 'N', 'N', 'C00Z5MI5', '', '0000-00-00', 0, 'M', '', ''),
(230, 6, 1, 1, '78', 2, 0, '2013-02-20', '08:40:00', 'AM', '00:00:00', 'Kathmandu', 'Pokhara', 'A3', '1', 1, 1200, 'Ravi Thapa', '1', 'Naxal', '787878', 45454545, 'thapa@gmail.com', '', '2013-02-11', '0000-00-00', '', '84', 0, 'br', 'N', 'N', 'B00UMJQ0', '', '0000-00-00', 32, 'M', 'nepal', '4512'),
(229, 5, 9, 2, '80', 4, 0, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '28,26', 2, 1550, 'raaj', '2', 'malekhu', '8778309', 0, '', '', '2013-02-11', '0000-00-00', '', '86', 0, 'br', 'N', 'N', 'D00Z9883', '', '0000-00-00', 13, 'M', 'nepali', ''),
(242, 16, 9, 2, '82', 3, 1, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '12', 1, 1550, 'Ram Raja', '1', 'Butwal', 'qwyqw', 0, ',ms,s', '', '2013-02-11', '0000-00-00', '', '87', 0, 'ag', 'Y', 'N', 'CC153QJU', '12', '2013-02-11', 0, 'M', 'nwn', ''),
(228, 4, 9, 2, '79', 3, 0, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '30', 1, 1550, 'Rajiv Shrestha', '1', 'Pokhara', '6454444', 0, '', '', '2013-02-11', '0000-00-00', '', '85', 0, 'br', 'Y', 'N', 'C00ZC3O7', '1235', '2013-02-12', 0, 'M', 'Nepali', ''),
(227, 3, 9, 2, '80', 4, 0, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '8', 1, 1550, 'mahesh', '1', 'Pokhara', '93900303', 345435345, '', '', '2013-02-11', '0000-00-00', '', '86', 0, 'br', 'N', 'N', 'D00ZDZ90', '', '0000-00-00', 42, 'M', 'nepali', ''),
(226, 2, 9, 2, '78', 2, 0, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '10,9', 2, 1550, 'Ram Sapkota', '2', 'Kathmandu', '4545454545', 58745544, 'ram@yahoo.com', '', '2013-02-11', '0000-00-00', '', '84', 0, 'br', 'N', 'N', 'B000HMJU', '', '0000-00-00', 50, 'M', 'nepal', '4545'),
(225, 1, 9, 2, '77', 1, 0, '2013-02-12', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '1,5,6,7', 4, 1550, 'bimal chand', '4', 'pepsikhola-20', '21474836471', 2147483647, 'aryn_lucky@yahoo.com', '', '2013-02-11', '0000-00-00', '', '83', 0, 'br', 'N', 'N', 'A00FXRBC', '', '0000-00-00', 43, 'M', 'nepali', '43243'),
(313, 87, 20, 33, '34', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '6', 1, 900, 'Surendra Chanda', '1', 'Kathmandu', '98343423344', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '17', 0, 'ad', 'N', 'N', 'CL00329U', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(314, 88, 20, 33, '34', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '32,33', 2, 900, 'Raj Prakash Yadav', '2', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '17', 0, 'ad', 'N', 'N', 'CL00WE3D', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(315, 89, 20, 33, '34', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '31', 1, 900, 'Dayaram Yadav', '1', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '17', 0, 'ad', 'N', 'N', 'CL00TRRU', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(316, 90, 20, 33, '34', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '30', 1, 900, 'Raj Prakash Pd.Yadav', '1', 'Kathmandu', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '17', 0, 'ad', 'N', 'N', 'CL00YZIH', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(317, 91, 20, 33, '34', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '7', 1, 900, 'Raj Prakash Yadav', '1', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '17', 0, 'ad', 'N', 'N', 'CL00MCSN', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(318, 92, 20, 33, '34', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '8', 1, 900, 'Raj Prakash Yadav', '1', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '17', 0, 'ad', 'N', 'N', 'CL00HF8H', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(319, 93, 20, 33, '34', 1, 0, '2013-03-01', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '9', 1, 900, 'Dayaram Yadav', '1', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '17', 0, 'ad', 'N', 'N', 'CL00MQ2C', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(320, 94, 32, 33, '34', 0, 0, '2013-03-01', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A30', '1', 1, 420, 'Raj Prakash Yadav', '1', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '17', 0, 'ad', 'N', 'N', 'CL00G3BL', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(321, 95, 32, 33, '34', 0, 0, '2013-03-01', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A30', '2', 1, 420, 'Raj Prakash Yadav', '1', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '17', 0, 'ad', 'N', 'N', 'CL00T1BN', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(322, 96, 20, 33, '34', 0, 0, '2013-03-02', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '1', 1, 900, 'Raj Prakash Yadav', '1', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '17', 0, 'ad', 'N', 'N', 'CL00IUYI', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(323, 97, 32, 33, '34', 0, 0, '2013-03-01', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A30', '3', 1, 420, 'Raj Prakash Yadav', '1', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '0', 0, 'OL', 'Y', 'N', 'CL00RCMK', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(324, 98, 32, 33, '34', 0, 0, '2013-03-01', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A30', '4', 1, 420, 'Bishawa Ranjan Sharma', '1', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '17', 0, 'ad', 'Y', 'N', 'CL00R0OW', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(325, 99, 32, 33, '34', 0, 0, '2013-03-01', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A30', '34,35', 2, 420, 'Bishawa Ranjan Sharma', '2', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-02-28', '0000-00-00', '', '0', 0, '0', 'Y', 'N', 'CL00HT1F', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(326, 100, 32, 33, '34', 0, 0, '2013-03-01', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A30', '5,6', 2, 420, 'Dayaram Yadav', '2', 'Kathmandu', '2147483647', 2147483647, 'rajyad03@gmail.com', '', '2013-03-01', '0000-00-00', '', '0', 0, '0', 'Y', 'N', 'CL00DNL7', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(327, 101, 32, 33, '34', 0, 0, '2013-03-02', '06:00:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A30', '1', 1, 420, 'Raj Prakash Yadav', '1', 'Rautahat', '2147483647', 2147483647, 'rajnp03@gmail.com', '', '2013-03-01', '0000-00-00', '', '0', 0, '0', 'Y', 'N', 'CL000CU8', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(328, 102, 20, 33, '34', 0, 0, '2013-03-02', '06:10:00', 'AM', '00:00:00', 'Pokhara', 'Lumbani', 'A2', '2,3', 2, 900, 'Dayaram Yadav', '2', 'Kathmandu', '98343423344', 2147483647, 'rajnp03@gmail.com', '', '2013-03-01', '0000-00-00', '', '0', 0, '0', 'Y', 'N', 'CL001N1X', '', '0000-00-00', 24, 'M', 'Nepali', 'A098877'),
(329, 103, 9, 2, '93', 1, 2, '2014-04-18', '06:45:00', 'AM', '00:00:00', 'Pokhara', 'Kathmandu', 'A8', '1,2,3,4', 1, 1550, 'Raj Prakash Yadav', '1', 'Rautahat', '97765', 2147483647, 'rajnp03@gmail.com', '', '2014-04-17', '0000-00-00', '', '96', 0, 'ag', 'N', 'N', 'AA2NR8EU', '', '0000-00-00', 31, 'M', 'Nepali', '91717');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_term_condition`
--

CREATE TABLE IF NOT EXISTS `tbl_term_condition` (
  `tc_id` int(11) NOT NULL AUTO_INCREMENT,
  `tc_desc` varchar(255) NOT NULL,
  `status` char(1) NOT NULL,
  PRIMARY KEY (`tc_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_term_condition`
--

INSERT INTO `tbl_term_condition` (`tc_id`, `tc_desc`, `status`) VALUES
(1, 'All seats are pre-assigned with numbers, seat assignment is based on a first come first serve basis after down', 'Y'),
(2, 'Passenger of 3 years or older must purchase ticket to occupy seats.', 'Y'),
(3, 'All cancellation or date change must be made at least two weeks prior to departure date with a penalty of $10/person.', 'Y'),
(4, 'All passengers must arrive 30 minutes before departure time.', 'Y');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
