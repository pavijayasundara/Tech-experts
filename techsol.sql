-- phpMyAdmin SQL Dump
-- version 2.11.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 29, 2013 at 04:26 PM
-- Server version: 5.0.67
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `techsol`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `ID` smallint(5) unsigned NOT NULL auto_increment,
  `Name` varchar(200) collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`ID`, `Name`) VALUES
(1, 'Programming'),
(2, 'AutoMechanics'),
(3, 'Electricians'),
(4, 'Plumbing'),
(5, 'Construction');

-- --------------------------------------------------------

--
-- Table structure for table `chat1`
--

CREATE TABLE IF NOT EXISTS `chat1` (
  `id` int(11) NOT NULL auto_increment,
  `sender` varchar(50) NOT NULL,
  `receiver` varchar(50) NOT NULL,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `chat1`
--


-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `ID` smallint(5) unsigned NOT NULL auto_increment,
  `Name` varchar(200) collate latin1_general_ci NOT NULL,
  `UN` varchar(20) collate latin1_general_ci NOT NULL,
  `Password` varchar(20) collate latin1_general_ci NOT NULL,
  `Category` smallint(6) NOT NULL,
  `Level` tinyint(4) NOT NULL,
  `Mobile` varchar(20) collate latin1_general_ci NOT NULL,
  `Phone` varchar(20) collate latin1_general_ci NOT NULL,
  `Fax` varchar(20) collate latin1_general_ci NOT NULL,
  `Email` varchar(200) collate latin1_general_ci NOT NULL,
  `Address` tinytext collate latin1_general_ci NOT NULL,
  `Company` varchar(200) collate latin1_general_ci NOT NULL,
  `Price` double NOT NULL,
  `Comments` varchar(100) collate latin1_general_ci default NULL,
  `Rate` int(11) NOT NULL,
  `Qualifications` text collate latin1_general_ci NOT NULL,
  PRIMARY KEY  (`ID`),
  UNIQUE KEY `Username` (`UN`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=31 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`ID`, `Name`, `UN`, `Password`, `Category`, `Level`, `Mobile`, `Phone`, `Fax`, `Email`, `Address`, `Company`, `Price`, `Comments`, `Rate`, `Qualifications`) VALUES
(1, 'Administrator', 'Admin', 'admin321', 0, 3, '123456789', '0112765865', '0112765864', 'techsolad@yahoo.com', '39/6,Rail road,Colombo3', '', 0, '', 0, ''),
(2, 'Praveen', 'praveen', '12312345', 5, 2, '1125113811', '0112793141', '', 'qwe2@ert', '456/a,Galle Road,Colomo', 'CNConstruction', 1500, 'Price given for building construction per day.', 2, 'Being in the construction field for over 3 years.Main contractor of Nawaloka Hospitals PVT ltd.Price rates vary.'),
(3, 'Saman Kularathne', 'SamanK', '75841', 0, 1, '', '', '0122554546', 'samann@yahoo.com', '95/8,kirula rd,Piliyandala', '', 0, '', 0, ''),
(4, 'ABC company', 'abc', '789abc', 1, 2, '0784561230', '01123456789', '01123145621', 'abc@gmail.com', '85/a,Borella rd,Batththaramulla', 'Company', 15000, 'Starting price is 15000.Depends on the service.', 1, 'Leading programmer in Sri Lanka for over 5 years.Award winning national projects.'),
(5, 'Singer Sri Lanka', 'Singer', 'singer678', 3, 2, '', '0114510405', '', '', '445. Galle Rd.\r\nColombo', 'Singer', 0, 'Price rate depends on the service', 1, 'Singer is the leading provider of brand items in home appliances and electrical items for over 50 years. in Sri lanka Providing service with trusted excellence.'),
(6, 'Maga', 'Maga', 'Maga123', 5, 2, '', '0112808835', ' 0112808847', 'maga@maga.lk', 'Maga Engineering (Pvt) Ltd\r\n200, Nawala Road,Narahenpita,\r\nColombo 05\r\n', 'Maga Sri Lanka', 3000, 'Price is given for building construction per day.', 1, 'Maga Engineering was the recipient of 8 Awards at the 2012 National Construction Excellence Awards organized by Institute of Construction Training and Development (ICTAD).We build from roads,buildings,bridges.Price rates vary.'),
(11, 'Toyota', 'Toyotalanka', 'toyota', 2, 2, '', ' 0112939000', '0112941941', 'sales_inquiries@toyota.lk', 'Toyota Lanka (Private) Limited Toyota Plaza\r\nNo.337, Negombo Road, Wattala,\r\nSri Lanka.', 'Toyota Lanka PlC', 0, NULL, 1, 'Price rate varies from service to service.\r\nWe guarantee nothing but the best.Secured genuine parts always supplied.'),
(12, 'United Motors', 'Unitedmotors', 'united', 2, 2, '', '0114 797 200', ' 0112448112', ' info@unitedmotors.lk.', '100, Hyde Park Corner,\r\nColombo 2,\r\nSri Lanka.', 'United Motors Lanka Plc', 0, NULL, 1, 'Price rate varies from service to service. We guarantee nothing but the best.Secured genuine parts always supplied.'),
(13, 'Sri Lanka telecom', 'Telecom', 'telecom', 3, 2, '', ' 0112555555', '', 'info@peotv.com', 'P. O. Box 503, Lotus Road, Colombo 1, Sri Lanka.', 'Sri Lanka telecom', 18000, 'This price rate is for a basic connection.Price depends on the connection.', 1, ''),
(14, 'Abans', 'abans', 'abans123', 3, 2, '', '011493567', '011 4617444', 'inquire@abans.com', 'Abans(Pvt)Ltd, No 498, Galle Road, Colombo', 'Abans', 0, 'Price rate depends on the service', 1, ''),
(16, 'A.M.Sanjana', 'sanjana456', 'sanjana456', 4, 2, '', '0114988350', '', '', '22,1st lane,Siddamulla ,Piliyandala', '', 1750, '', 2, ''),
(15, 'uoc', 'uoc123', 'uoc123', 0, 1, '1234567890', '', '', 'uoc@yahoo.com', 'uoc,colombo', '', 0, '', 0, ''),
(17, 'A.J.M.Kaleel', 'Kaleel', 'Kaleelworks', 4, 2, '076628086', '0114562545', '', '', '53,Madapatha Lane,Galle', '', 1500, 'Price rate per day', 3, ''),
(18, 'C.Pathirana', 'Pathirana', '987Pathirana', 4, 2, '', '0114562354', '', '', '291/1,Suriyapaluwa,Kadawatha', '', 2000, NULL, 1, ''),
(19, 'DIMO PLC', 'dimolanka', 'dimo907lanka', 2, 2, '', '0112449797', '0112449080', 'dimo@dimolanka.com', 'No.65,Jetawana Road,Colombo 14', 'DIMO PLC', 0, 'Price depends on the service.', 1, '\r\nWinner of:National Business Excellence Awards 2011.Bronze winner at the SLIM brand awards Product Brand of the year'),
(20, 'G.Sumith.Nishantha', 'Sumith', '234sumith', 4, 2, '072 - 4346679', '01178564123', '', '', 'Thalagala, Meepagala Junction Gonapola', '', 1500, NULL, 3, 'Price rate given per day'),
(21, 'AMW', 'amwmotors', 'amw2345', 2, 2, '', '0112309300', '0112304646', 'mail@amwltd.com', 'No: 185, Union Place, Colombo 2, Sri Lanka.', 'AMW', 0, 'Price depends on the type of service provided', 1, ''),
(23, 'Kumar', 'kuma1233', '12332', 0, 1, '0774589634', '2578947989', '', 'kumar@gmail.com', '50/6,Ganemuula,Kadawatha', '', 0, '', 0, ''),
(25, 'Mahesh', 'Mahe789', '789963', 0, 1, '0784588958', '', '', 'mahesh@yahoo.com', '45/1,Anuradhapura', '', 0, '', 0, ''),
(22, 'Chamini', 'chami', 'chami456', 0, 1, '0784569870', '0112546789', '', 'chaminiperera@yahoo.com', '53/A,Makola road,Kiribathgoda', '', 0, '', 0, ''),
(24, 'S.D.Constructions', 'sdconstruct', '14789', 5, 2, ' 077305192', '0112886262', ' 011286862', 'info@sdcon.lk', 'No 145/1, Mampewatta\r\nBattaramulla.\r\nWestern\r\nSri Lanka', 'S.D.Constructions', 0, 'Depends on the type of service provided', 1, 'SD Engineering & construction(Pvt) Ltd has in house Construction Management staff, Quantity Surveying, Planning etc whom provide total solution for Industrial & Commercial Building sector.'),
(26, 'Sausiri Constructors', 'sausiri', 'sausiri456', 5, 2, '0718552462', '0118552460', '', 'sausiri@bellmail.lk', 'NO.325/1/1,\r\nNEGOMBO,\r\nCOLOMBO RD,\r\nWELIGAMPITIYA,\r\nJA-ELA,\r\nSRI LANKA', 'Sausiri Constructors', 0, 'Price depends on the service.', 3, ''),
(27, 'Thudawe brothers', 'thudawebrothers', 'thudawe', 5, 2, '', '0112368494', '112501922 ', 'tblinfo@tudawe.com', '505/2, Elvitigala Mawatha,Colombo 5 ', 'Thudawe brothers (Pvt) Ltd', 0, 'Price depends on the service.', 1, 'We are the leading buliding constructor in Sri Lnak.Our recent projects include U.S Embassy in Sri Lanka.Tudawe Brothers has been awarded the status of ''Chartered Building Company'' in recognition of the professionalism demonstrated in construction over the past seven decades.'),
(28, 'nalini', 'nalini', 'nalini789456', 0, 1, '0774897564', '0115875446', '', 'naliini123@gmail.com', '39/6,Main road,Athurugiriya', '', 0, NULL, 0, ''),
(29, 'roshan', 'roshan', 'roshan789', 0, 1, '0774168763', '0152464646', '0112486258', 'roshan789@gmail.com', 'galle', '', 0, NULL, 0, ''),
(30, 'mahasha', 'mahasha', 'mahasha789', 0, 1, '0114789545', '', '', 'mahasha@gmail.com', 'Kurunegala Rd,Kurunegala', '', 0, NULL, 0, '');
