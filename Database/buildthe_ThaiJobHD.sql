-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 12, 2013 at 02:30 PM
-- Server version: 5.5.32
-- PHP Version: 5.3.10-1ubuntu3.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `buildthedot_24ThaiJobHD`
--

-- --------------------------------------------------------

--
-- Table structure for table `buildthedot_thaijobhd_ad`
--

CREATE TABLE IF NOT EXISTS `buildthedot_thaijobhd_ad` (
  `PictureID` int(11) NOT NULL AUTO_INCREMENT,
  `AdPic` text COLLATE utf8_unicode_ci NOT NULL,
  `AdLink` text COLLATE utf8_unicode_ci NOT NULL,
  `AdType` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `AdPosition` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`PictureID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `buildthedot_thaijobhd_ad`
--

INSERT INTO `buildthedot_thaijobhd_ad` (`PictureID`, `AdPic`, `AdLink`, `AdType`, `AdPosition`) VALUES
(1, '1', '1', '', ''),
(2, '1', '1', '', ''),
(3, '', 'weeerrr', 'Side_Ads', '2'),
(4, '', 'wert', 'Side_Ads', '3');

-- --------------------------------------------------------

--
-- Table structure for table `buildthedot_thaijobhd_job`
--

CREATE TABLE IF NOT EXISTS `buildthedot_thaijobhd_job` (
  `JobID` int(11) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `PositionThai` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `PositionEng` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `Place` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Saraly` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `JobDescription` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `Recomment` int(11) NOT NULL,
  `StartTime` datetime NOT NULL,
  `EndTime` datetime NOT NULL,
  `JobType` int(11) NOT NULL,
  PRIMARY KEY (`JobID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buildthedot_thaijobhd_job_attribute`
--

CREATE TABLE IF NOT EXISTS `buildthedot_thaijobhd_job_attribute` (
  `AttributeID` int(11) NOT NULL AUTO_INCREMENT,
  `JobID` int(11) NOT NULL,
  `AtrributDescription` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`AttributeID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buildthedot_thaijobhd_job_idea`
--

CREATE TABLE IF NOT EXISTS `buildthedot_thaijobhd_job_idea` (
  `CompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `MainIdea` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `Description1` text COLLATE utf8_unicode_ci NOT NULL,
  `Description2` text COLLATE utf8_unicode_ci NOT NULL,
  `Description3` text COLLATE utf8_unicode_ci NOT NULL,
  `Pic1` text COLLATE utf8_unicode_ci NOT NULL,
  `Pic2` text COLLATE utf8_unicode_ci NOT NULL,
  `Pic3` text COLLATE utf8_unicode_ci NOT NULL,
  `IdeaRecomment` int(11) NOT NULL,
  `IdeaTime` datetime NOT NULL,
  `Status` int(11) NOT NULL,
  PRIMARY KEY (`CompanyID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `buildthedot_thaijobhd_job_idea`
--

INSERT INTO `buildthedot_thaijobhd_job_idea` (`CompanyID`, `MainIdea`, `Description1`, `Description2`, `Description3`, `Pic1`, `Pic2`, `Pic3`, `IdeaRecomment`, `IdeaTime`, `Status`) VALUES
(1, 'Adrian Purdila test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'picture.png', 'picture.png', 'picture.png', 0, '2013-10-07 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buildthedot_thaijobhd_top_company`
--

CREATE TABLE IF NOT EXISTS `buildthedot_thaijobhd_top_company` (
  `TopCompanyID` int(11) NOT NULL AUTO_INCREMENT,
  `TopCompanyName` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `LinkAddress` text COLLATE utf8_unicode_ci NOT NULL,
  `Time` datetime NOT NULL,
  `Status` int(11) NOT NULL,
  `TopCompanyRecomment` int(11) NOT NULL,
  PRIMARY KEY (`TopCompanyID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `buildthedot_thaijobhd_user_account`
--

CREATE TABLE IF NOT EXISTS `buildthedot_thaijobhd_user_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `midname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `job_id` int(40) NOT NULL,
  `job_status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `admin_status` int(1) NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `buildthedot_thaijobhd_user_account`
--

INSERT INTO `buildthedot_thaijobhd_user_account` (`id`, `email`, `password`, `firstname`, `midname`, `lastname`, `job_id`, `job_status`, `admin_status`, `address`) VALUES
(1, 'a@a.com', '77de54ccf56eb6f7dbf99e4d3be949ab6f9b0a55df8ac28564cb9f63a10be8af6ab3f7c2', 'a', 'a', 'a', 1, '1', 0, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
