-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2020 at 08:00 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health assistant`
--

-- --------------------------------------------------------

--
-- Table structure for table `examine`
--

DROP TABLE IF EXISTS `examine`;
CREATE TABLE IF NOT EXISTS `examine` (
  `Disease` varchar(20) NOT NULL,
  `SkinAllergy` int(10) NOT NULL,
  `Conjuctives` int(10) NOT NULL,
  `Sweat` int(10) NOT NULL,
  `Distress` int(10) NOT NULL,
  `Tachycardia` int(10) NOT NULL,
  `Dehydration` int(10) NOT NULL,
  `SunkenEyes` int(10) NOT NULL,
  `prob` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examine`
--

INSERT INTO `examine` (`Disease`, `SkinAllergy`, `Conjuctives`, `Sweat`, `Distress`, `Tachycardia`, `Dehydration`, `SunkenEyes`, `prob`) VALUES
('Chicken Pox', 1, 0, 0, 0, 0, 0, 0, 0.142),
('Measles', 0, 1, 0, 0, 0, 0, 0, 0.142),
('Dengue Fever', 0, 0, 0, 0, 0, 0, 0, 0),
('Tuberculosis', 0, 0, 1, 0, 0, 0, 0, 0.142),
('Typhoid', 0, 0, 0, 1, 0, 0, 1, 0.285),
('Cholera', 0, 0, 0, 0, 1, 1, 1, 0.428),
('Malaria', 0, 0, 0, 1, 1, 0, 0, 0.285),
('Diabetes Mellitus', 0, 0, 0, 0, 0, 0, 0, 0),
('COVID-19', 0, 0, 0, 1, 0, 0, 1, 0.285);

-- --------------------------------------------------------

--
-- Table structure for table `lab_results`
--

DROP TABLE IF EXISTS `lab_results`;
CREATE TABLE IF NOT EXISTS `lab_results` (
  `Disease` varchar(20) NOT NULL,
  `HighBP` int(10) NOT NULL,
  `Sugar` int(10) NOT NULL,
  `LowBP` int(10) NOT NULL,
  `prob` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_results`
--

INSERT INTO `lab_results` (`Disease`, `HighBP`, `Sugar`, `LowBP`, `prob`) VALUES
('Chicken Pox', 0, 0, 0, 0),
('Measles', 0, 0, 0, 0),
('Dengue Fever', 0, 0, 0, 0),
('Tuberculosis', 0, 0, 0, 0),
('Typhoid', 0, 0, 1, 0.333),
('Cholera', 0, 0, 1, 0.333),
('Malaria', 0, 0, 1, 0.333),
('Diabetes Mellitus', 1, 1, 0, 0.666),
('COVID-19', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `symptoms`
--

DROP TABLE IF EXISTS `symptoms`;
CREATE TABLE IF NOT EXISTS `symptoms` (
  `Disease` varchar(30) NOT NULL,
  `Fever` int(11) NOT NULL,
  `Cold` int(11) NOT NULL,
  `Headache` int(11) NOT NULL,
  `Rashes` int(11) NOT NULL,
  `Pains` int(11) NOT NULL,
  `Loss of Appetite` int(11) NOT NULL,
  `Patches` int(11) NOT NULL,
  `Vomiting` int(11) NOT NULL,
  `Cough` int(11) NOT NULL,
  `prob` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `symptoms`
--

INSERT INTO `symptoms` (`Disease`, `Fever`, `Cold`, `Headache`, `Rashes`, `Pains`, `Loss of Appetite`, `Patches`, `Vomiting`, `Cough`, `prob`) VALUES
('Typhoid', 1, 0, 1, 1, 0, 0, 0, 0, 0, 0.333),
('Tuberculosis', 1, 0, 0, 0, 1, 0, 0, 0, 1, 0.333),
('Dengue Fever', 1, 1, 1, 0, 1, 0, 0, 1, 0, 0.555),
('Measles', 0, 1, 0, 1, 0, 0, 1, 0, 0, 0.333),
('Chicken Pox', 1, 0, 1, 1, 0, 1, 0, 0, 0, 0.444),
('Cholera', 0, 0, 0, 0, 1, 0, 0, 0, 0, 0.111),
('Malaria', 1, 1, 1, 0, 1, 0, 0, 0, 0, 0.444),
('Diabetes Mellitus', 1, 0, 0, 0, 1, 0, 0, 0, 0, 0.222),
('COVID-19', 1, 1, 1, 0, 1, 0, 0, 1, 1, 0.666);

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

DROP TABLE IF EXISTS `user_details`;
CREATE TABLE IF NOT EXISTS `user_details` (
  `uname` varchar(50) NOT NULL,
  `uemail` varchar(50) NOT NULL,
  `uage` int(100) NOT NULL,
  `ugen` varchar(10) NOT NULL,
  `psw` varchar(30) NOT NULL,
  `ubmi` float NOT NULL,
  `userid` varchar(20) NOT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`uname`, `uemail`, `uage`, `ugen`, `psw`, `ubmi`, `userid`) VALUES
('jaya', 'jayaditya369@gmail.com', 22, 'male', '12345', 19.9862, '5f2793fac5486'),
('rgv', 'kakaral@uwindsor.ca', 22, 'male', '12345', 0, '5f2754a4aa7a5');

-- --------------------------------------------------------

--
-- Table structure for table `user_examine`
--

DROP TABLE IF EXISTS `user_examine`;
CREATE TABLE IF NOT EXISTS `user_examine` (
  `user` varchar(30) NOT NULL,
  `SkinAllergy` int(10) NOT NULL,
  `Conjuctives` int(10) NOT NULL,
  `Sweat` int(10) NOT NULL,
  `Distress` int(10) NOT NULL,
  `Tachycardia` int(10) NOT NULL,
  `Dehydration` int(10) NOT NULL,
  `SunkenEyes` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_examine`
--

INSERT INTO `user_examine` (`user`, `SkinAllergy`, `Conjuctives`, `Sweat`, `Distress`, `Tachycardia`, `Dehydration`, `SunkenEyes`) VALUES
('jaya', 1, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_labresults`
--

DROP TABLE IF EXISTS `user_labresults`;
CREATE TABLE IF NOT EXISTS `user_labresults` (
  `user` varchar(30) NOT NULL,
  `HighBP` int(10) NOT NULL,
  `Sugar` int(10) NOT NULL,
  `LowBP` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_labresults`
--

INSERT INTO `user_labresults` (`user`, `HighBP`, `Sugar`, `LowBP`) VALUES
('jaya', 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_symptoms`
--

DROP TABLE IF EXISTS `user_symptoms`;
CREATE TABLE IF NOT EXISTS `user_symptoms` (
  `user` varchar(20) NOT NULL,
  `Fever` int(11) NOT NULL,
  `Cold` int(11) NOT NULL,
  `Headache` int(11) NOT NULL,
  `Rashes` int(11) NOT NULL,
  `Pains` int(11) NOT NULL,
  `LossofAppetite` int(11) NOT NULL,
  `Patches` int(11) NOT NULL,
  `Vomiting` int(11) NOT NULL,
  `Cough` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_symptoms`
--

INSERT INTO `user_symptoms` (`user`, `Fever`, `Cold`, `Headache`, `Rashes`, `Pains`, `LossofAppetite`, `Patches`, `Vomiting`, `Cough`) VALUES
('jaya', 1, 0, 0, 0, 0, 0, 0, 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
