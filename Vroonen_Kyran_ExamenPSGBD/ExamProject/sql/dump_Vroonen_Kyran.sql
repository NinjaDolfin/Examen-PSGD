-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 18, 2022 at 08:54 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examen_psgbd`
--

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
CREATE TABLE IF NOT EXISTS `animals` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Chip_ID` varchar(15) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Gender` tinyint(1) NOT NULL,
  `Sterilised` tinyint(1) NOT NULL,
  `Birthdate` date NOT NULL,
  `Race_FK` int(11) NOT NULL,
  `Last_Heat` date DEFAULT NULL,
  `Owner_FK` int(11) NOT NULL,
  `Vet_FK` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Chip_ID` (`Chip_ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`ID`, `Chip_ID`, `Name`, `Gender`, `Sterilised`, `Birthdate`, `Race_FK`, `Last_Heat`, `Owner_FK`, `Vet_FK`) VALUES
(5, '132456', 'Moby', 0, 0, '2022-06-05', 1, '2022-06-15', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `PK` int(11) NOT NULL AUTO_INCREMENT,
  `ID` varchar(15) NOT NULL,
  `Booking_Date` date NOT NULL,
  `Extra_Contact_FK` int(11) NOT NULL,
  PRIMARY KEY (`PK`),
  UNIQUE KEY `Chip_FK` (`ID`,`Booking_Date`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`PK`, `ID`, `Booking_Date`, `Extra_Contact_FK`) VALUES
(2, '1325', '2022-06-05', 1),
(3, '135', '2022-06-12', 1),
(4, '', '2022-06-28', 1),
(5, '135', '2022-06-09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Family_Name` varchar(100) NOT NULL,
  `E_Mail` varchar(100) NOT NULL,
  `Birthdate` date NOT NULL,
  `Phone_Number` varchar(100) NOT NULL,
  `Postal_FK` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`ID`, `Name`, `Family_Name`, `E_Mail`, `Birthdate`, `Phone_Number`, `Postal_FK`, `Address`) VALUES
(3, 'Hell', 'boy', 'hb@gmail.com', '2022-06-04', '666', 1, 'Tartarus');

-- --------------------------------------------------------

--
-- Table structure for table `extra_contacts`
--

DROP TABLE IF EXISTS `extra_contacts`;
CREATE TABLE IF NOT EXISTS `extra_contacts` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Family_Name` varchar(100) NOT NULL,
  `Phone_Number` varchar(100) NOT NULL,
  `Is_Vet` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extra_contacts`
--

INSERT INTO `extra_contacts` (`ID`, `Name`, `Family_Name`, `Phone_Number`, `Is_Vet`) VALUES
(1, 'bob', 'dylan', '987645331', 0),
(2, 'gdfh', 'qf', '737', 0),
(3, 'Elaine', 'Smith', '97602', 1);

-- --------------------------------------------------------

--
-- Table structure for table `postal_codes`
--

DROP TABLE IF EXISTS `postal_codes`;
CREATE TABLE IF NOT EXISTS `postal_codes` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Postal_Code` varchar(100) NOT NULL,
  `City_Name` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postal_codes`
--

INSERT INTO `postal_codes` (`ID`, `Postal_Code`, `City_Name`) VALUES
(1, '1300', 'Wavre'),
(2, '1300', 'Limal'),
(5, '3000', 'Louvain'),
(6, '3000', 'Louvain');

-- --------------------------------------------------------

--
-- Table structure for table `races`
--

DROP TABLE IF EXISTS `races`;
CREATE TABLE IF NOT EXISTS `races` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `races`
--

INSERT INTO `races` (`ID`, `Name`) VALUES
(1, 'Dog'),
(2, 'Mouse');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
